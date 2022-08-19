<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderDetails;

use App\Models\Products\Product;
use App\Models\Sales\Client;

use Illuminate\Support\Facades\Auth;

use App\Models\HumanResources\Workers;


class SalesOrderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sales-order-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|sales-order-create', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|sales-order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|sales-order-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){

        $conf = [
            'title-section' => 'Pedidos de venta',
            'group' => 'sales-order',
            'create' => ['route' =>'sales-order.create', 'name' => 'Nuevo pedido'],
        ];

        $data = SalesOrder::select('id_sales_order','ref_name_sales_order', 'name_client', 'total_amount_sales_order', 'os.name_order_state', 'c.name_client')
        ->join('clients as c', 'c.id_client', '=', 'sales_orders.id_client', 'left outer')
        ->join('order_states as os', 'os.id_order_state', '=', 'sales_orders.id_order_state', 'left outer')
        ->whereEnabledSalesOrder(1)
        ->orderBy('id_sales_order', 'ASC')
        ->paginate(10);

       // return $data;


        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 text-uppercase',
            'c_thead' => 'bg-dark text-white',
            'ths' => ['#', 'Pedido', 'Cliente', 'Estado', 'Total'],
            'w_ts' => ['3','10','63','12','12',],
            'c_ths' => 
                [
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',],
            'tds' => ['ref_name_sales_order', 'name_client', 'id_order_state', 'total_amount_sales_order'],
            'switch' => false,
            'edit' => false, 
            'show' => true,
            'url' => "/sales/sales-order",
            'id' => 'id_sales_order',
            'data' => $data,
            'i' => (($request->input('page', 1) - 1) * 5),
        ];
        return view('sales.sales-order.index', compact('conf', 'table'));

    }

    public function create(){

        $conf = [
            'title-section' => 'Nuevo pedido',
            'group' => 'sales-order',
            'back' => 'sales-order.index',
        ];

        $dataWorkers = \DB::select("SELECT workers.id_worker, workers.firts_name_worker, workers.last_name_worker, group_workers.name_group_worker
                                    FROM workers
                                    INNER JOIN group_workers ON group_workers.id_group_worker = workers.id_group_worker
                                    WHERE name_group_worker = 'VENDEDOR'");



        return view('sales.sales-order.create', compact('conf', 'dataWorkers'));
    }


    public function store(Request $request){


        $dataSalesOrder = $request->except('_token');
        $dataDetails = $request->except('_token',
                                        'id_client',
                                        'type_payment_sales_order',
                                        'subFac',
                                        'exento',
                                        'total_taxes',
                                        'total_con_tax',
                                        'noExento', 
                                        'subtotal', 
                                        'exempt_product', 
                                        'subtotal_exento',
                                        'id_worker');

      // return $dataDetails;

        $saveSalesOrder = new SalesOrder();

        $saveSalesOrder->type_payment = $dataSalesOrder['type_payment_sales_order'];
        $saveSalesOrder->id_client = $dataSalesOrder['id_client'];
        $saveSalesOrder->id_worker = $dataSalesOrder['id_worker'];
        $saveSalesOrder->id_user = Auth::id();
        $saveSalesOrder->total_amount_sales_order = $dataSalesOrder['total_con_tax'];
        $saveSalesOrder->exempt_amout_sales_order = $dataSalesOrder['exento'];
        $saveSalesOrder->no_exempt_amout_sales_order = $dataSalesOrder['subFac'];
        $saveSalesOrder->total_amount_tax_sales_order = $dataSalesOrder['total_taxes'];
        $saveSalesOrder->date_sales_order = date('Y-m-d');
        $saveSalesOrder->save();


        $saveDetails = new salesOrderDetails();

        $saveDetails->id_sales_order = $saveSalesOrder->id;
        $saveDetails->details_order_detail = json_encode($dataDetails);
        $saveDetails->save();
        
        return redirect()->route('sales-order.index')->with('success', 'Registro con exito');

    }

    public function show($id){

       

        //return $id;

       $data =  \DB::select("SELECT so.*, c.address_client, c.phone_client, c.idcard_client, c.name_client, w.firts_name_worker, w.last_name_worker
                                FROM sales_orders as so
                                INNER JOIN clients AS c ON c.id_client = so.id_client
                                INNER JOIN workers AS w ON w.id_worker = so.id_worker
                                WHERE so.id_sales_order = $id
       ")[0];

        $conf = [
            'title-section' => 'Pedido: ',
            'group' => 'sales-order',
            'back' => 'sales-order.index',
        ];


        $dataSalesOrderDetails = salesOrderDetails::whereIdSalesOrder($id)->get()[0];

        $obj = json_decode($dataSalesOrderDetails->details_order_detail, true);


       

        

        for($i = 0; $i<count($obj['id_product']); $i++){
            $dataProducts[$i] =  \DB::select("SELECT products.*, p.name_presentation_product, u.name_unit_product, u.short_unit_product
                                                FROM products 
                                                INNER JOIN presentation_products AS p ON p.id_presentation_product = products.id_presentation_product
                                                INNER JOIN unit_products AS u ON u.id_unit_product = products.id_unit_product
                                                WHERE products.id_product =".$obj['id_product'][$i]);
        }

            
        //return $dataProducts;


        return view('sales.sales-order.show', compact('conf', 'data', 'dataProducts', 'obj'));

    }



    public function listar(Request $request){

        //$dataTasa = TasaBCV::select('valor_tasa')->orderBy('fecha_tasa','DESC')->get()[0];

        if($request->texto == 'clientes'){
            if (isset($request->param)) {
                $dataClientes =  \DB::select("SELECT * 
                                                FROM clients 
                                                WHERE name_client LIKE '%".$request->param."%' 
                                                OR idcard_client LIKE '%".$request->param."%'");
                return response()->json(
                    [
                        'lista' => $dataClientes,
                        'th' => ['Cedula', 'Nombre o Razon social'],
                        'success' => true,
                        'title' => 'Lista de Clientes'
                    ]);
            }
        $dataClientes = Client::whereEnabledClient(1)->get();
        
        
        return response()->json(
            [
                'lista' => $dataClientes,
                'th' => ['Cedula', 'Nombre o Razon social'],
                'success' => true,
                'title' => 'Lista de Clientes'
            ]);
        }else{
            if(is_int($request->param) == true) {$request->param = "";}
            if ($request->param != "") {
                $dataProductos =  \DB::select("SELECT products.*, p.name_presentation_product, u.name_unit_product, u.short_unit_product
                                                FROM products 
                                                INNER JOIN presentation_products AS p ON p.id_presentation_product = products.id_presentation_product
                                                INNER JOIN unit_products AS u ON u.id_unit_product  = products.id_unit_product
                                                WHERE qty_product > 0 
                                                AND name_product LIKE '%".$request->param."%' 
                                                OR code_product LIKE '%".$request->param."%'
                                                ORDER BY products.name_product ASC");


                return response()->json(
                    [
                        
                        'lista' => $dataProductos,
                        'th' => ['Codigo', 'Descripcion', 'Unidad', 'Presentacion', 'Cantidad', 'Precio', 'Ref $'],
                        'success' => true,
                        'title' => 'Lista de Productos'
                        
                    ]
                );
            }else{

                $dataProductos =  \DB::select("SELECT products.*, p.name_presentation_product, u.name_unit_product, u.short_unit_product
                                                FROM products 
                                                INNER JOIN presentation_products AS p ON p.id_presentation_product = products.id_presentation_product
                                                INNER JOIN unit_products AS u ON u.id_unit_product = products.id_unit_product
                                                WHERE qty_product > 0 
                                                ORDER BY products.name_product ASC");
            
            return response()->json(
                [
                    
                    'lista' => $dataProductos,
                    'th' => ['Codigo', 'Descripcion', 'Unidad', 'Presentacion', 'Cantidad', 'Precio', 'Ref $'],
                    'success' => true,
                    'title' => 'Lista de Productos'
                    
                ]
            );
        }   
        }
    }


    public function disponible(Request $request){
        $data = $request;


        $actual = Product::select('qty_product', 'tax_exempt_product', 'product_usd_product')->whereIdProduct($data['producto'])->get();

    
        if($data['cantidad'] <= $actual[0]->qty_product){
            if($actual[0]->tax_exempt_product == 1){
                return response()->json(['respuesta' => true, 'exento' => true]);
            }else{
                return response()->json(['respuesta' => true, 'exento' => false]);
            }        
        }else{
            return response()->json(['respuesta' => false, 'cantid' => $actual[0]->qty_product]);
        }
        
       }
}
