<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Conf\Sales\InvoicingConfigutarion;
use App\Models\Sales\Invoicing;
use App\Models\Sales\InvoicingDetails;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicingController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:sales-invoices-list|adm-list', ['only' => ['index', 'validarPedido']]);
         $this->middleware('permission:adm-create|sales-invoices-create', ['only' => ['create','store', 'validarPedido']]);
         $this->middleware('permission:adm-edit|sales-invoices-edit', ['only' => ['edit','update', 'validarPedido']]);
         $this->middleware('permission:adm-delete|sales-invoices-delete', ['only' => ['destroy', 'validarPedido']]);
    }


    public function index(Request $request){

        $conf = [
            'title-section' => 'Facturas',
            'group' => 'sales-order',
            'create' => ['route' =>'invoicing.create', 'name' => 'Nuevo pedido'],
        ];

        $data = Invoicing::select('id_invoicing','ref_name_invoicing', 'date_invoicing', 'name_client', 'total_amount_invoicing', 'os.name_order_state', 'c.name_client')
        ->join('clients as c', 'c.id_client', '=', 'invoicings.id_client', 'left outer')
        ->join('order_states as os', 'os.id_order_state', '=', 'invoicings.id_order_state', 'left outer')
        ->whereEnabledInvoicing(1)
        ->orderBy('id_invoicing', 'ASC')
        ->paginate(10);

       // return $data;


        $table = [
            'c_table' => 'table table-bordered table-hover mb-0 text-uppercase',
            'c_thead' => 'bg-dark text-white',
            'ths' => ['#', 'Factura', 'Fecha', 'Cliente', 'Estado', 'Total'],
            'w_ts' => ['3','10','10','53','12','12',],
            'c_ths' => 
                [
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',
                'text-center align-middle',],
            'tds' => ['ref_name_invoicing', 'date_invoicing', 'name_client', 'name_order_state', 'total_amount_invoicing'],
            'switch' => false,
            'edit' => false, 
            'show' => true,
            'edit_modal' => false, 
            'url' => "/sales/invoicing",
            'id' => 'id_invoicing',
            'data' => $data,
            'i' => (($request->input('page', 1) - 1) * 5),
        ];
        return view('sales.invoices.index', compact('conf', 'table'));

    }


    public function validarPedido($id)
    {

        $dataSalesOrder = SalesOrder::whereIdSalesOrder($id)->get()[0];
        $dataDetails = SalesOrderDetails::whereIdSalesOrder($id)->get()[0];

        $dataConfig = InvoicingConfigutarion::all();

        if(count($dataConfig) == 0){
            return redirect()->route('order-config.index')->with('success', 'Debe registrat una tasa');
        }else{
            $dataConfig = $dataConfig[0];
            $config = $dataConfig->control_number_invoicing_configutarion;
        }  

        $datax = Invoicing::whereEnabledInvoicing(1)->orderBy('id_invoicing', 'DESC')->get();

        if(count($datax) > 0){
            
            if( $config == $datax[0]->ctrl_num){
                
                $config = $datax[0]->ctrl_num+1;
                
            }else{
                
            }
        
        }

        $inv = new Invoicing();
        $invDetails = new InvoicingDetails();

            $inv->type_payment = $dataSalesOrder['type_payment'];
            $inv->id_client = $dataSalesOrder['id_client'];
            $inv->id_exchange = $dataSalesOrder['id_exchange'];
            $inv->ctrl_num = $config;
            $inv->ref_name_invoicing = $dataConfig->correlative_invoicing_configutarion.$dataConfig->control_number_invoicing_configutarion;

            if(isset($dataSalesOrder['id_worker'])){
                $inv->id_worker = $dataSalesOrder['id_worker'];
            }
            
            $inv->id_user = $dataSalesOrder['id_user'];
            $inv->total_amount_invoicing = $dataSalesOrder['total_amount_sales_order'];
            $inv->exempt_amout_invoicing = $dataSalesOrder['exempt_amout_sales_order'];
            $inv->id_order_state = 4;
            $inv->no_exempt_amout_invoicing = $dataSalesOrder['no_exempt_amout_sales_order'];
            $inv->total_amount_tax_invoicing = $dataSalesOrder['total_amount_tax_sales_order'];
            $inv->date_invoicing = date('Y-m-d');
            $inv->save();

            $invDetails->id_invoicing = $inv->id;
            $invDetails->details_invoicing_detail = $dataDetails['details_order_detail'];
            $invDetails->save();


            SalesOrder::whereIdSalesOrder($id)->update(['id_order_state' => 2]);


            
/*
            for($i = 0; $i<count($dataSalesOrder['id_product']); $i++){
                $restar =  Product::select('qty_product')->whereIdProduct($dataSalesOrder['id_product'][$i])->get();
                $operacion = $restar[0]->qty_product - $dataSalesOrder['cantidad'][$i];
                
                Product::whereIdProduct($dataSalesOrder['id_product'][$i])->update(['qty_product'=>$operacion]);
            }*/

        return redirect()->route('invoicing.show', $inv->id);
    }



    public function show($id){
        $data =  \DB::select("SELECT i.*, c.address_client, c.phone_client, c.idcard_client, c.name_client, w.firts_name_worker, w.last_name_worker, e.amount_exchange, e.date_exchange
        FROM invoicings as i
        INNER JOIN clients AS c ON c.id_client = i.id_client
        INNER JOIN exchanges AS e ON e.id_exchange = i.id_exchange
        LEFT OUTER JOIN workers AS w ON w.id_worker = i.id_worker
        WHERE i.id_invoicing = $id")[0];

        $conf = [
            'title-section' => 'Factura: '.$data->ref_name_invoicing,
            'group' => 'sales-order',
            'back' => 'sales-order.index',
        ];

        $dataDetails = InvoicingDetails::whereIdInvoicing($id)->get()[0];

        $obj = json_decode($dataDetails->details_invoicing_detail, true);

        for($i = 0; $i<count($obj['id_product']); $i++){
            $dataProducts[$i] =  \DB::select("SELECT products.*, p.name_presentation_product, u.name_unit_product, u.short_unit_product
                                                FROM products 
                                                INNER JOIN presentation_products AS p ON p.id_presentation_product = products.id_presentation_product
                                                INNER JOIN unit_products AS u ON u.id_unit_product = products.id_unit_product
                                                WHERE products.id_product =".$obj['id_product'][$i]);
        }

            
        return view('sales.invoices.show', compact('conf', 'data', 'dataProducts', 'obj'));

               

    }





    public function imprimirFactura($id){
        
        
        $data =  \DB::select("SELECT i.*, c.address_client, c.phone_client, c.idcard_client, c.name_client, w.firts_name_worker, w.last_name_worker, e.amount_exchange, e.date_exchange
        FROM invoicings as i
        INNER JOIN clients AS c ON c.id_client = i.id_client
        INNER JOIN exchanges AS e ON e.id_exchange = i.id_exchange
        LEFT OUTER JOIN workers AS w ON w.id_worker = i.id_worker
        WHERE i.id_invoicing = $id")[0];

        $dataDetails = InvoicingDetails::whereIdInvoicing($id)->get()[0];
        $obj = json_decode($dataDetails->details_invoicing_detail, true);

        $cantita = 0;
        foreach($obj['cantidad'] as $kk){
            $cantita = $cantita+$kk;
       }

        for($i = 0; $i<count($obj['id_product']); $i++){
            $dataProducts[$i] =  \DB::select("SELECT products.*, p.name_presentation_product, u.name_unit_product, u.short_unit_product
                                                FROM products 
                                                INNER JOIN presentation_products AS p ON p.id_presentation_product = products.id_presentation_product
                                                INNER JOIN unit_products AS u ON u.id_unit_product = products.id_unit_product
                                                WHERE products.id_product =".$obj['id_product'][$i]);
        }
        $dataGeneral = [ 'fecha' => date('d-m-Y'), 'cantidad' =>  $cantita];
        

        //return $data;
        
        $pdf = \PDF::loadView('sales.reportes.facturas', compact('data', 'dataProducts', 'obj', 'dataGeneral'));
        return $pdf->stream('ejemplo.pdf');
    }

    


    
}
