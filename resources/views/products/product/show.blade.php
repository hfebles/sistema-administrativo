@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :edit="$conf['edit']" :group="$conf['group']" />
@endsection

@section('content')

<div class="row mb-5">
    <x-cards>
        <div class="table-responsive-lg">
            <table class="table table-bordered table-hover table-sm mb-0">
                <tr class="align-middle">
                    <td width="15%">Código:</td>
                    <td width="25%">{{$data->code_product}}</td>
                    <td width="20%">Nombre del producto:</td>
                    <td width="40%">{{$data->name_product}}</td>
                </tr>
                <tr class="align-middle">
                    <td>Numero de parte:</td>
                    <td>{{$data->part_number_product ?? ''}}</td>
                    <td>Descripción del producto:</td>
                    <td>{{$data->description_product}}</td>
                </tr>
                <tr class="align-middle">
                    <td>Precio del producto:</td>
                    <td>
                        @switch($data->product_usd_product)
                            @case(1)
                                $ {{number_format($data->price_product, '2', ',', '.')}}
                                @break
                        
                            @default
                                {{number_format($data->price_product, '2', ',', '.')}} Bs
                        @endswitch
                    </td>
                    <td>Disponible:</td>
                    <td>{{number_format($data->qty_product, '2', ',', '.')}} {{$data->short_unit_product}}</td>
                </tr>
                <tr class="align-middle">
                    <td>
                        @switch($data->salable_product)
                            @case(1)
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled checked>
                                    <label class="form-check-label">
                                        ¿Producto Vendible?
                                    </label>
                                </div>
                                @break
                            @default
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        ¿Producto Vendible?
                                    </label>
                                </div>
                        @endswitch
                    </td>
                    <td>
                        @switch($data->tax_exempt_product)
                            @case(1)
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled checked>
                                    <label class="form-check-label">
                                        ¿Producto exento de IVA?
                                    </label>
                                </div>
                                @break
                            @default
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        ¿Producto exento de IVA?
                                    </label>
                                </div>
                        @endswitch
                    </td>
                    <td>
                        @switch($data->product_usd_product)
                            @case(1)
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled checked>
                                    <label class="form-check-label">
                                        ¿Producto en dolares?
                                    </label>
                                </div>
                                @break
                            @default
                                <div class="form-check ml-1">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">
                                        ¿Producto en dolares?
                                    </label>
                                </div>
                        @endswitch
                    </td>
                </tr>
                <tr class="align-middle">
                    <td>Inventario:</td>
                    <td>{{$data->code_warehouse}} - {{$data->name_warehouse}}</td>
                    <td>Cateoría del producto:</td>
                    <td>{{$data->name_product_category}}</td>
                </tr>
                <tr class="align-middle">
                    <td>Unidad de medida:</td>
                    <td>{{$data->short_unit_product}} - {{$data->name_unit_product}}</td>
                    <td>Presentacion del productoo:</td>
                    <td>{{$data->name_presentation_product}}</td>
                </tr>
            </table>
        </div>
    </x-cards>
</div>



<div class="row mt-3">
    <x-cards :table="$table" />
</div>

@endsection