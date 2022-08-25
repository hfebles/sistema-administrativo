<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
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


    public function validarPedido($id)
    {

        $dataSalesOrder = SalesOrder::whereIdSalesOrder($id)->get()[0];
        $dataDetails = SalesOrderDetails::whereIdSalesOrder($id)->get()[0];

       

        $inv = new Invoicing();
        $invDetails = new InvoicingDetails();

        $inv->type_payment = $dataSalesOrder['type_payment_sales_order'];
            $inv->id_client = $dataSalesOrder['id_client'];
            $inv->id_exchange = $dataSalesOrder['id_exchange'];
            $inv->ctrl_num = $dataSalesOrder['ctrl_num'];
            $inv->ref_name_invoicing = $dataSalesOrder['ref_name_sales_order'];

            if(isset($dataSalesOrder['id_worker'])){
                $inv->id_worker = $dataSalesOrder['id_worker'];
            }
            
            $inv->id_user = $dataSalesOrder['id_user'];
            $inv->total_amount_invoicing = $dataSalesOrder['total_amount_sales_order'];
            $inv->exempt_amout_invoicing = $dataSalesOrder['exempt_amout_sales_order'];
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
            'title-section' => 'Pedido: ',
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

    
}
