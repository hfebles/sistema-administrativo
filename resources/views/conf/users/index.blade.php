@extends('layouts.app')
@section('title-section', 'Usuarios')

@if(Gate::check('adm-create') || Gate::check('user-create'))
    @section('btn')
    <a href="{{ route('users.create') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">Nuevo usuario</span>
    </a>
    @endsection
@endcan

@section('content')
@if ($message = Session::get('success'))
<div class="row mb-3">
    <div class="col-12"> 
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success alert-dismissible fade show mb-0 p-3" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row mb-3">
    <div class="col-12"> 
        <div class="card">
            <div class="card-body">
            <table class="table table-bordered table-hover mb-0">
                <thead class="text-white bg-gray-900">
                    <tr>
                        <th width="3%" class="mb-0 text-center align-middle text-uppercase font-weight-bolder">#</th>
                        <th width="40%" class="mb-0 text-uppercase font-weight-bolder">Usuario</th>
                        <th width="40%" class="mb-0 text-uppercase font-weight-bolder">Email</th>
                        <th width="5%" class="mb-0 text-center align-middle text-uppercase font-weight-bolder">Roles</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $user)
                <tr onclick="window.location='{{route('users.show', $user->id)}}';">
                    <td class="text-center align-middle mb-0" >{{ ++$i }}</td>
                    <td class="align-middle mb-0">{{ $user->name }}</td>
                    <td class="align-middle mb-0">{{ $user->email }}</td>
                    <td class="align-middle text-center mb-0"> 
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <h5 class="align-middle mb-0"><label class="mb-0 badge badge-success">{{ $v }}</label></h5>
                            @endforeach
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>

            </div>
        </div>
    </div>
</div>








{!! $data->render() !!}

@endsection