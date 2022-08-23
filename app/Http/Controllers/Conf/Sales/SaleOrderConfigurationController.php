<?php

namespace App\Http\Controllers\Conf\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Conf\Sales\SaleOrderConfiguration;
use App\Models\Accounting\SubLedgerAccount;

class SaleOrderConfigurationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sales-order-conf-list|adm-list', ['only' => ['index']]);
         $this->middleware('permission:adm-create|sales-order-conf-create', ['only' => ['create','store']]);
         $this->middleware('permission:adm-edit|sales-order-conf-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:adm-delete|sales-order-conf-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request){

        


        $data = SaleOrderConfiguration::all();

        $conf = [
            'title-section' => 'Configuración de los pedidos de venta',
            'group' => 'sales-order-conf',
            'edit' => ['route' => 'order-config.edit', 'id' => $data[0]->id_sale_order_configuration,],

        ];

        //return $data;

        return view('conf.sales.sales-order-conf.index', compact('conf', 'data'));
    }

    public function edit($id){

        $data = SaleOrderConfiguration::whereIdSaleOrderConfiguration($id)->get();
        $dataSubAcc = SubLedgerAccount::where('enabled_sub_ledger_account', '=', '1')->pluck('name_sub_ledger_account', 'id_sub_ledger_account');


        //return $data;

        $conf = [
            'title-section' => 'Configuración de los pedidos de venta',
            'group' => 'sales-order-conf',
            'back' => 'order-config.index',

        ];

        //return $data;

        return view('conf.sales.sales-order-conf.edit', compact('conf', 'data', 'dataSubAcc'));
    }


    public function update(Request $request, $id){

        $data = $request->except('_token', '_method');
        SaleOrderConfiguration::whereIdSaleOrderConfiguration($id)->update($data);
        return redirect()->route('order-config.index');
    }

}
