@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :edit="$conf['edit']" :group="$conf['group']" />
@endsection

@section('content')

<div class="row">
    <x-cards size="12">
    <div class="row g-3">
        <div class="col-md-12">
            <label class="form-label">Nombre Apellido ó Razón Social: </label>
            <label class="form-label">{{$getClient->name_client}}</label>
            <div  class="invalid-feedback">
                Ingrese el Nombre y apellido ó la Razón social del cliente
            </div>

        </div>
        <div class="col-md-4">
            <label class="form-label">DNI / RIF:</label>
            <label class="form-label">{{$getClient->idcard_client}}</label>         
        </div>
        <div class="col-4">
            <label class="form-label">Teléfono:</label>
            <label class="form-label">{{$getClient->phone_client}}</label>
        </div>
        <div class="col-4">
            <label class="form-label">Correo Electrónico:</label>
            <label class="form-label">{{$getClient->email_client}}</label>
        </div>
        <div class="col-md-12">
            <label class="form-label">Dirección:</label>
            <label class="form-label">{{$getClient->address_client}}</label>

        </div>
        <div class="col-md-3">
            <label class="form-label">Estado de residencia:</label>
            <label class="form-label">{{$getState}}</label>

        </div>
        <div class="col-md-3">
            <label class="form-label">Código postal:</label>
            <label class="form-label">{{$getClient->zip_client}}</label>

        </div>
        <div class="col-3 d-flex align-items-center mt-auto mb-2 justify-content-center">
            <div class="form-check">
                @if ($getClient->taxpayer_client == 1)
                    <input class="form-check-input" type="checkbox" checked disabled>             
                @else
                    <input class="form-check-input" type="checkbox" disabled>            
                @endif
                    
                <label class="form-check-label">
                    ¿Agente de retención?
                </label>

            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">Porcentaje de Retención: </label>
            <label class="form-label">{{$getClient->porcentual_amount_tax_client}}%</label>
        </div>
    </div>
    </div>
    </x-cards>
</div>

@endsection