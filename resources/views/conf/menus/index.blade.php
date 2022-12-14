@extends('layouts.app')

@section('title-section', 'Menús')

@section('btn')
<x-btns :create="$conf['create']" :group="$conf['group']" />
@endsection

@section('content')


    <div class="row">
        @if ($message = Session::get('success'))
            <x-cards size="12" :table="$table" :message="$message" />
        @else
            <x-cards size="12" :table="$table" />
        @endif
    </div>


@endsection

