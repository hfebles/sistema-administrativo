@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :edit="$conf['edit']" :group="$conf['group']" />
@endsection

@section('content')




    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Almacen</h5>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td width="30%"  class="bg-dark text-white p-1">Nombre: </td>
                            <td class="p-1">{{$getDataWarehouse->name_warehouse}}</td>
                        </tr>

                        <tr>
                            <td width="30%" class="bg-dark text-white p-1">Código: </td>
                            <td class="p-1">{{$getDataWarehouse->code_warehouse}}</td>
                        </tr>

                        <tr>
                            <td width="30%" class="bg-dark text-white p-1">Activo:</td>
                            <td class="p-1">
                                @switch($getDataWarehouse->enabled_warehouse)
                                    @case(1)
                                        <div class="form-check form-switch p-0">
                                            <input class="form-check-input ml-0" type="checkbox" checked disabled>
                                        </div>
                                        @break
                                    @default
                                        <div class="form-check form-switch p-0">
                                            <input class="form-check-input ml-0" type="checkbox" disabled>
                                        </div>
                                @endswitch
                            </td>
                        </tr>
                        
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-9">

        <x-cards :table="$table" />

        </div>
        </div>
        </div>

        @endsection