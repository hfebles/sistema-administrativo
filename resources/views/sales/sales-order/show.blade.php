@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :group="$conf['group']" />
@endsection

@section('content')

<div class="row">
    <x-cards>
        
            
        
        <div class="row g-3">
            
            @if ($data->id_order_state == 3)
           <span class="text-danger text-center fs-3">ORDEN CANCELADA</span>
           @elseif ($data->id_order_state == 2)
           <span class="text-info text-center fs-3">FACTURADA</span>
            @else
            <div class="col-sm-12 d-flex">
                <a href="" class="btn btn-sm btn-info btn-icon-split ml-auto">
                    <span class="icon text-white-50">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Imprimir</span>
                </a>
                <a href="" class="btn btn-sm btn-success btn-icon-split ml-3">
                    <span class="icon text-white-50">
                       <i class="fas fa-money-bill"></i>
                    </span>
                    <span class="text">Registrar pago</span>
                </a>
                <a href="/sales/cancel/{{$data->id_sales_order}}" class="btn btn-sm btn-danger btn-icon-split ml-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-times-circle"></i>
                    </span>
                    <span class="text">Anular</span>
                </a>
                </div>
         @endif
         

    <div class="col-sm-12">


    <table class="table table-sm table-bordered mb-4">
        <tr>
            <td width="25%">Razón social:</td>
            <td>
                <span id="razon_social">{{$data->name_client}}</span>
            </td>
        </tr>
        <tr>
            <td width="25%">Cédula ó R.I.F.:</td>
            <td>
                <span id="dni">{{$data->idcard_client}}</span>
            </td>
        </tr>
        <tr>
            <td width="25%">Teléfono: </td>
            <td>
                <span id="telefono">{{$data->phone_client}}</span>
            </td>
        </tr>
        <tr>
            <td width="25%">Dirección:  </td>
            <td>
                <span id="direccion">{{$data->address_client}}</span>
            </td>
        </tr>
        <tr>
            <td class="align-middle" width="25%">Tipo de Pago:  </td>
            <td>
                <span id="direccion">
                    @switch($data->type_payment)
                        @case(1)
                            Contado
                            @break
                    
                        @default
                            Credito
                            
                    @endswitch
                </span>
            </td>
        </tr>
        <tr>
            <td width="25%">Vendedor:  </td>
            <td>
            <span>{{$data->firts_name_worker}} {{$data->last_name_worker}}</span>
            </td>
        </tr>
    </table>
    <table class="table table-sm  table-bordered border-dark mb-4" id="myTable">
        <tr>
            
            <th scope="col" colspan="2" class="align-middle">DESCRIPCIÓN</th>
            <th scope="col" class="text-center align-middle" width="10%">CANTIDAD</th>
            <th scope="col" class="text-center align-middle" width="10%">P/U</th>
            <th scope="col" class="text-center align-middle " width="10%">SUB-TOTAL</th>
        </tr>
        
        @for ($i = 0; $i < count($dataProducts); $i++)
            
        
        @foreach ($dataProducts[$i] as $k => $products)
        <tr>
            
            <th scope="col" colspan="2" class="align-middle">{{$products->name_product}} {{$products->name_presentation_product}} {{$products->short_unit_product}} @if ($products->tax_exempt_product == 1) (E) @endif</th>
            <th scope="col" class="text-center align-middle" width="10%">{{number_format($obj['cantidad'][$i], 2, ',', '.')}}</th>
            <th scope="col" class="text-center align-middle" width="10%">{{number_format($obj['precio_producto'][$i], 2, ',', '.')}}</th>
            <th scope="col" class="text-center align-middle " width="10%">{{number_format($obj['precio_producto'][$i]*$obj['cantidad'][$i], 2, ',', '.')}}</th>
        </tr>
        @endforeach
        @endfor
    </table> 

    <table class="table table-sm table-bordered mb-0">
        <tr>
            <th  scope="col" class="text-end align-middle">TIPO DE TASA DE CAMBIO: <span class="text-danger">{{date('d-m-Y', strtotime($data->date_exchange))}}</span></th>
            <th  scope="col" class="text-end align-middle"><p class='align-middle mb-0'>$ {{number_format($data->amount_exchange, 2, ',', '.')}}</p></th>
            <th colspan="2" scope="col" class="text-end align-middle"></th>
        </tr>    
        <tr>
            <th scope="col" class="text-end align-middle">BASE IMPONIBLE: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="subFacs">$ {{number_format($data->no_exempt_amout_sales_order/$data->amount_exchange, 2, ',', '.')}}</p></th>
        
            <th scope="col" class="text-end align-middle">BASE IMPONIBLE: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="subFacs">Bs.D. {{number_format($data->no_exempt_amout_sales_order, 2, ',', '.')}}</p></th>
        </tr>
        <tr>
            <th scope="col" class="text-end align-middle">EXENTO: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="subFacs">$ {{number_format($data->exempt_amout_sales_order/$data->amount_exchange, 2, ',', '.')}}</p></th>
            
            <th scope="col" class="text-end align-middle">EXENTO: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="exentos"></p>Bs.D. {{number_format($data->exempt_amout_sales_order, 2, ',', '.')}}</th>
        </tr>
        <tr>
            <th scope="col" class="text-end align-middle">IVA: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="subFacs">$ {{number_format($data->total_amount_tax_sales_order/$data->amount_exchange, 2, ',', '.')}}</p></th>

            <th scope="col" class="text-end align-middle">IVA:</th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="totalIVaas">Bs.D. {{number_format($data->total_amount_tax_sales_order, 2, ',', '.')}}</p></th>
        </tr>
        <tr>
            <th scope="col" class="text-end align-middle">TOTAL A PAGAR: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="subFacs">$ {{number_format($data->total_amount_sales_order/$data->amount_exchange, 2, ',', '.')}}</p></th>
            
            <th scope="col" class="text-end align-middle">TOTAL A PAGAR: </th>
            <th scope="col" class="text-end align-middle"><p class='align-middle mb-0' id="totalTotals">Bs.D. {{number_format($data->total_amount_sales_order, 2, ',', '.')}}</p></th>
        </tr>
    </table> 

    </div>
    </div>

    </x-cards>
</div>
    
@endsection