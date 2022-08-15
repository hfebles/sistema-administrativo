<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Products\Product;
use App\Models\Warehouse\Warehouse;

use App\Models\Conf\Warehouse\PresentationProduct;
use App\Models\Conf\Warehouse\UnitProduct;
use App\Models\Conf\Warehouse\ProductCategory;


class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-product-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|product-product-create', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|product-product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|product-product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){


        //return $request;

        if($request->param == 1){
            $data = Product::select('products.*', 'warehouses.name_warehouse')->whereSalableProduct(1)->whereEnabledProduct(1)->join('warehouses', 'warehouses.id_warehouse', '=', 'products.id_warehouse')->paginate(15);
        }else{
            $data = Product::select('products.*', 'warehouses.name_warehouse')->whereEnabledProduct(1)->join('warehouses', 'warehouses.id_warehouse', '=', 'products.id_warehouse')->paginate(15);
        }

       // return Product::select('products.*', 'warehouses.name_warehouse')->where('enabled_product', '=', '1')->join('warehouses', 'warehouses.id_warehouse', '=', 'products.id_warehouse')->paginate(15);

        $conf = [
            'title-section' => 'Productos',
            'group' => 'product-product',
            'create' => ['route' =>'product.create', 'name' => 'Nueva producto'],
            'url' => '/products/product'
        ];

        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 text-uppercase',
            'c_thead' => 'bg-dark text-white',
            'ths' => ['#', 'Almacen', 'Código', 'Producto'],
            'w_ts' => ['3','7','7','70',],
            'c_ths' => 
                [
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'align-middle',],
            'tds' => ['name_warehouse', 'code_product', 'name_product',],
            'switch' => false,
            'edit' => false, 
            'show' => true,
            'url' => "/products/product",
            'id' => 'id_product',
            'data' => $data,
            'i' => (($request->input('page', 1) - 1) * 5),
        ];


        return view('products.product.index', compact('table', 'conf'));
    }



    public function create(){

        $conf = [
            'title-section' => 'Cargar un nuevo producto',
            'group' => 'product-product',
            'back' => 'product.index',
            'url' => '/products/product'
        ];
        
        $getCategories = ProductCategory::whereEnabledProductCategory(1)->pluck('name_product_category', 'id_product_category');
        $getUnits = UnitProduct::select(
            DB::raw("CONCAT(short_unit_product,' - ',name_unit_product) AS name_unit_product"),'id_unit_product')
            ->whereEnabledUnitProduct(1)
            ->pluck('name_unit_product', 'id_unit_product');

        $getPresentations = PresentationProduct::whereEnabledPresentationProduct(1)->pluck('name_presentation_product', 'id_presentation_product');
        $getWarehouses = Warehouse::select(
            DB::raw("CONCAT(code_warehouse,' - ',name_warehouse) AS name_warehouse"),'id_warehouse')
            ->whereEnabledWarehouse(1)
            ->pluck('name_warehouse', 'id_warehouse');


        //return $getWarehouses;



        return view('products.product.create', compact('conf', 'getCategories', 'getUnits', 'getPresentations', 'getWarehouses'));
    }


    public function store(Request $request){

        $data = $request->except('_token');
        $save = new Product();
      
        $save->name_product = strtoupper($data["name_product"]);
        $save->description_product = strtoupper($data["description_product"]);
        $save->code_product = strtoupper($data["code_product"]);
        $save->price_product = $data["price_product"];

        if(isset($data["salable_product"])){$save->salable_product = $data["salable_product"];}
        if(isset($data["tax_exempt_product"])){$save->tax_exempt_product = $data["tax_exempt_product"];}
        if(isset($data["product_usd_product"])){$save->product_usd_product = $data["product_usd_product"];}

        $save->id_warehouse = $data["id_warehouse"];
        $save->id_product_category = $data["id_product_category"];
        $save->id_unit_product = $data["id_unit_product"];
        $save->id_presentation_product = $data["id_presentation_product"];
        $save->save();

        return redirect()->route('product.index')->with('success', 'Se registro el producto: '.$save->name_product.' con exito');

        //return $data;

    }
    
    public function show($id){

        $data = Product::select('products.*', 'w.name_warehouse', 'w.code_warehouse', 'c.name_product_category', 'u.name_unit_product', 'u.short_unit_product', 'pp.name_presentation_product')
        ->join('warehouses as w', 'w.id_warehouse', '=', 'products.id_warehouse')
        ->join('unit_products as u', 'u.id_unit_product', '=', 'products.id_unit_product')
        ->join('product_categories as c', 'c.id_product_category', '=', 'products.id_product_category')
        ->join('presentation_products as pp', 'pp.id_presentation_product', '=', 'products.id_presentation_product')
        ->whereIdProduct($id)->get()[0];


        //return $data;
        
        $conf = [
            'title-section' => 'Producto: '.$data->code_product.' - '.$data->name_product,
            'group' => 'product-product',
            'back' => 'product.salable',
            'edit' => ['route' => 'product.edit', 'id' => $id,],
            'url' => '/products/product/salable'
        ];




        return view('products.product.show', compact('conf', 'data'));
    }

    function searchCode(Request $request){
        $data = Product::where('code_product', '=', $request->text)->get();
        if(count($data) > 0 ){
            return response()->json(['res' => false, 'msg' => 'El código ya fue registrado']);
        }else{
            return response()->json(['res' => true, 'msg' => 'El código es valido']);
        }
        return $data;
    }

    public function indexSalable(){
        return redirect()->route('product.index', ['param' => 1]);
    }
}
