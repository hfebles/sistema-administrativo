<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sales\Client;

class ClientController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sales-clients-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|sales-clientscreate', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|sales-clientsedit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|sales-clientsdelete', ['only' => ['destroy']]);

         
    }

    public function index(Request $request){

        $conf = [
            'title-section' => 'Gestion de clientes',
            'group' => 'sales-clients',
            'create' => ['route' =>'clients.create', 'name' => 'Nuevo cliente'],
            'url' => '/sales/clients/create'
        ];

        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 text-uppercase',
            'c_thead' => 'bg-dark text-white',
            'ths' => ['#', 'DNI / RIF', 'Nombre o Razón social', 'Telefono'],
            'w_ts' => ['3','10', '50', '10',],
            'c_ths' => 
                [
                'text-center align-middle p-1',
                'text-center align-middle p-1', 
                'align-middle p-1', 
                'text-center align-middle p-1',],
                
            'tds' => ['idcard_client', 'name_client', 'phone_client'],
            'switch' => false,
            'edit' => false,
            'show' => true,
            'url' => "/sales/clients",
            'id' => 'id_client',
            'data' => Client::where('enabled_client', '=', '1')->paginate(10),
            'i' => (($request->input('page', 1) - 1) * 5),
        ];

        return view('sales.clients.index', compact('conf', 'table'));
    }

    public function create(){}
    public function store(Request $request){}

    public function show($id){}

    public function edit($id){}
    public function update(Request $request, $id){}
    
    public function destroy($id){}
}
