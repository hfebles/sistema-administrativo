@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :edit="$conf['edit']" :group="$conf['group']" />
@endsection

@section('content')
<div class="row">
    <x-cards>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fs-4">Código: {{$data->code_product}}</label>
                
            </div>
            <div class="col-md-6">
                <label class="form-label fs-4">Nombre del producto: {{$data->name_product}}</label>
            </div>
            <div class="col-md-3">
                <label class="form-label fs-4">Numero de parte</label>
                {{$data->part_number_product ?? ''}}
            </div>
            <div class="col-md-12">
                <label class="form-label fs-4">Descripción del producto</label>
                <br>
                <label class="form-label fs-4">{{$data->description_product}}</label>
            </div>
            
            <div class="col-md-3">
                <label class="form-label fs-4">Precio del producto:
                    @switch($data->product_usd_product)
                        @case(1)
                            $ {{number_format($data->price_product, '2', ',', '.')}}
                            @break
                    
                        @default
                            {{number_format($data->price_product, '2', ',', '.')}} Bs
                    @endswitch
                    
                </label>
                
            </div>
            <div class="col-md-3">
                <label class="form-label fs-4">Disponible: {{number_format($data->qty_product, '2', ',', '.')}} {{$data->short_unit_product}}</label>
                
            </div>
            <div class="clearfix"></div>

            <div class="col-3 d-flex align-items-center justify-content-start">
                @switch($data->salable_product)
                    @case(1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled checked>
                            <label class="form-check-label fs-4">
                                ¿Producto Vendible?
                            </label>
                        </div>
                        @break
                    @default
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label fs-4">
                                ¿Producto Vendible?
                            </label>
                        </div>
                @endswitch
            </div>
            <div class="col-3 d-flex align-items-center justify-content-start">
                @switch($data->tax_exempt_product)
                    @case(1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled checked>
                            <label class="form-check-label fs-4">
                                ¿Producto exento de IVA?
                            </label>
                        </div>
                        @break
                    @default
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label fs-4">
                                ¿Producto exento de IVA?
                            </label>
                        </div>
                @endswitch
            </div>
            <div class="col-3 d-flex align-items-center justify-content-start">
                @switch($data->product_usd_product)
                    @case(1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled checked>
                            <label class="form-check-label fs-4">
                                ¿Producto en dolares?
                            </label>
                        </div>
                        @break
                    @default
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label fs-4">
                                ¿Producto en dolares?
                            </label>
                        </div>
                @endswitch
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <label class="form-label fs-4">Inventario: {{$data->code_warehouse}} - {{$data->name_warehouse}} </label>
            </div>
            <div class="col-md-12">
                <label class="form-label fs-4">Cateoría del producto: {{$data->name_product_category}}</label>
                
            </div>
            <div class="col-md-12">
                <label class="form-label fs-4">Unidad de medida: {{$data->short_unit_product}} - {{$data->name_unit_product}}</label>
                
            </div>
            <div class="col-md-12">
                <label class="form-label fs-4">Presentacion del producto: {{$data->name_presentation_product}}</label>
                
            </div>
        </div>
    </x-cards>
</div>

@endsection