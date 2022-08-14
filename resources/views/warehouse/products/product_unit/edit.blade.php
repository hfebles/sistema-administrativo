@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :group="$conf['group']" />
@endsection


@section('content')
{!! Form::model($getData, ['method' => 'PATCH','route' => ['unit.update', $getData->id_unit_product]]) !!}
<div class="row g-3">
    <x-cards size="12">

    <div class="col-md-12">
        <label class="form-label">Nombre de la unidad</label>
        {!! Form::text('name_unit_product', null, array( 'autocomplete' => 'off','required', 'placeholder' => 'Ingrese el nombre de la unidad','class' => 'form-control form-control-sm')) !!}
        <div  class="invalid-feedback">
            Para guardar debe ingresar el nombre de la unidad
        </div>

    </div>
    <div class="col-md-12">
        <label class="form-label">Nombre de la unidad</label>
        {!! Form::text('short_unit_product', null, array( 'autocomplete' => 'off','required', 'placeholder' => 'Ingrese el nombre de la unidad','class' => 'form-control form-control-sm')) !!}
        <div  class="invalid-feedback">
            Para guardar debe ingresar el nombre de la unidad
        </div>

    </div>
    
    </x-cards>
    <x-cards size="12">
        <div class="text-center">
        <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
        <input class="btn btn-danger" type="reset" value="Deshacer">
        </div>
    </x-cards> 
</div>

{!! Form::close() !!}

@endsection