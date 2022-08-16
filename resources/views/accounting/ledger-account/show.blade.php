@extends('layouts.app')

@section('title-section', 'Ver grupo y sus apuntes contables')

@section('btn')

    <a href="{!! route($conf['atras']['url'].'.index') !!}" class="btn btn-dark btn-icon-split">
        <span class="icon text-white-50">
        <i class="fas fa-chevron-circle-left"></i>
        </span>
        <span class="text">Atras</span>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grupo</h5>
                    <table class="table table-sm table-bordered table-hover">
                        <tr>
                            <td width="50%"  class="bg-dark text-white p-1 align-middle">Nombre del grupo: </td>
                            <td class="p-1">{{$dataG->name_group}}</td>
                        </tr>

                        <tr>
                            <td width="30%" class="bg-dark text-white p-1">Codigo: </td>
                            <td class="p-1">{{$dataG->code_group}}</td>
                        </tr>

                        <tr>
                            <td width="30%" class="bg-dark text-white p-1">Activo:</td>
                            <td class="p-1">
                                @switch($dataG->enabled_group)
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


    <div class="col-md-8 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                    <h5 class="card-title">Subelementos</h5>
                    @if(Gate::check('adm-create') || Gate::check('menu-create'))
                        <div ><a class="btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa fa-plus fa-lg"></i></a></div>
                    @endif
                </div>
                <table class="table table-sm table-hover table-bordered ">
                    <thead class="bg-dark text-white text-end text-uppercase align-middle">
                        <tr class="">
                            <td>#</td>
                            <td class="text-start">Grupo</td>
                            <td>#</td>
                            <td class="text-start">SubGrupo</td>
                            <td>#</td>
                            <td class="text-start">Cuenta</td>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                        <td class="p-1 text-end">{{$dataG->code_group}}</td>
                        <td class="p-1 " colspan="5">{{$dataG->name_group}}</td>
                        </tr>
                        @for ($i = 0; $i < count($dataSG); $i++)
                        <tr>
                            <td class="p-1  text-end" colspan="3">{{$dataG->code_group}}.{{$dataSG[$i]->code_sub_group}}</td>
                            <td class="p-1  text-start" colspan="4">{{$dataSG[$i]->name_sub_group}}</td>
                            @for ($o = 0; $o < count($dataLA[$i]); $o++)
                            <tr>

                                <td class="p-1  text-end" colspan="4">{{$dataG->code_group}}.{{$dataSG[$i]->code_sub_group}}.{{$dataLA[$i][$o]->code_ledger_account}}</td>
                                <td class="p-1  text-start" colspan="2">{{$dataLA[$i][$o]->name_ledger_account}}</td>
                            </tr>
                            @endfor
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
        
@endsection