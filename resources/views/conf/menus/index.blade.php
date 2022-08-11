@extends('layouts.app')

@section('title-section', 'Menús')

@if(Gate::check('adm-create') || Gate::check('menu-create'))
    @section('btn')
    <a href="{{ route('roles.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Nuevo grupo</span>
    </a>
    @endsection
@endcan

@section('content')


    <div class="row">
        @if ($message = Session::get('success'))
            <x-cards size="12" :table="$table" :message="$message" />
        @else
            <x-cards size="12" :table="$table" />
        @endif
    </div>


@endsection

