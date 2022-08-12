@extends('layouts.app')

@section('title-section', 'Plan contable')

@if(Gate::check('adm-create') || Gate::check('accounting-ledger-create'))
    @section('btn')
    <a href="{!! route($conf['agregar']['url'].'.create') !!}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Nuevo grupo</span>
    </a>
    @endsection
@endcan

@section('content')

<table class="{{$table['c_table']}}">
    <thead class="{{$table['c_thead']}}">
        @foreach ($table['ths'] as $key_th =>  $th)
            <th class="{{$table['c_ths'][$key_th]}}">{{$th}}</th>
        @endforeach
    </thead>
@for ($g = 0; $g < count($table['data']); $g++)
    <tr onclick="window.location='{{ $table['url']}}/{{$table['data'][$g]->id_group }}';">
        <td>{{++$table['i']}}</td>
        @foreach ($table['tds1'] as $td)
            <td>{{$table['data'][$g]->$td}}</td>
        @endforeach
    </tr>
@endfor
</table>
<div id="paginacion" class="d-flex justify-content-center">
    {!! $table['data']->render() !!}      
</div>
@endsection

