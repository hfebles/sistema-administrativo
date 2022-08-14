<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Warehouse\Warehouse;

class WarehouseController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:warehouse-warehouse-list|adm-list', ['only' => ['index']]);
        $this->middleware('permission:adm-create|warehouse-warehouse-create', ['only' => ['create','store']]);
        $this->middleware('permission:adm-edit|warehouse-warehouse-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:adm-delete|warehouse-warehouse-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request){

        $conf = [
            'title-section' => 'Gestion de Almacenes',
            'group' => 'warehouse-warehouse',
            'create' => ['route' =>'warehouse.create', 'name' => 'Nuevo almacen', 'btn_type' => 'side'],
            'url' => '/warehouse/warehouse/create'
        ];

        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 text-uppercase',
            'c_thead' => 'bg-dark text-white',
            'ths' => ['#', 'Código', 'Almacen',],
            'w_ts' => ['3','10', '',],
            'c_ths' => 
                [
                'text-center align-middle',
                'text-center align-middle', 
                'align-middle',],
                
            'tds' => ['code_warehouse', 'name_warehouse',],
            'switch' => false,
            'edit' => false,
            'show' => true,
            'url' => "/warehouse/warehouse",
            'id' => 'id_warehouse',
            'data' => Warehouse::where('enabled_warehouse', '=', '1')->paginate(10),
            'i' => (($request->input('page', 1) - 1) * 5),
        ];

        return view('warehouse.warehouse.index', compact('conf', 'table'));
    }

    public function store(Request $request){
        
        $data = $request->except('token');

        $save = new Warehouse();
        $save->name_warehouse = strtoupper($data['name_warehouse']);
        $save->code_warehouse = strtoupper($data['code_warehouse']);
        $save->save();

        return redirect()->route('warehouse.index')->with('success', 'El almacen '.$save->name_warehouse.' se registro con exito');
    }

    public function show($id){

        $getDataWarehouse = Warehouse::whereEnabledWarehouse(1)->whereIdWarehouse($id)->get()[0];


        $conf = [
            'title-section' => 'Almacen: '.$getDataWarehouse->code_warehouse.'/'.$getDataWarehouse->name_warehouse,
            'group' => 'warehouse-warehouse',
            'back' => 'warehouse.index',
            'edit' => ['route' => 'warehouse.edit', 'id' => $getDataWarehouse->id_warehouse],
            'url' => '/warehouse/warehouse/create'
        ];


        return view('warehouse.warehouse.show', compact('conf', 'getDataWarehouse'));



    }


}
