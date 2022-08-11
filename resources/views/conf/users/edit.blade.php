@extends('layouts.app')

@section('title-section', 'Editar usuario')
@section('btn')
    <a href="{{ route('users.index') }}" class="btn btn-dark btn-icon-split ml-auto">
        <span class="icon text-white-50">
        <i class="fas fa-chevron-circle-left"></i>
        </span>
        <span class="text">Atras</span>
    </a>
    @if(Gate::check('adm-delete') || Gate::check('user-delete'))
        <a class="btn btn-danger btn-icon-split ml-3" data-toggle="modal" data-target="#deleteModal">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Eliminar usuario</span>
        </a>
    @endif
@endsection

@section('content')


@if (count($errors) > 0)
<div class="row mb-3">
    <x-cards size="12">
        <div class="alert alert-danger mb-0">
            <strong>Whoops!</strong> a ocurrido un error.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </x-cards>
</div>
@endif


{!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-2 align-self-center pr-0">
                        <label class="form-label mb-0">Nombre del usuario:</label>
                    </div>
                    <div class="col-4 pl-0">
                        {!! Form::text('name', null, array('required', 'placeholder' => 'Nombre de usuario','class' => 'form-control')) !!}
                        <div  class="invalid-feedback">
                            Debe ingresar un nombre de usuario
                        </div>
                    </div>
                    <div class="col-2 align-self-center pr-0">
                        <label class="form-label mb-0">Correo electrónico:</label>
                    </div>
                    <div class="col-4 pl-0">
                        {!! Form::email('email', null, array('required', 'placeholder' => 'Correo Electrónico','class' => 'form-control')) !!}
                        <div  class="invalid-feedback">
                            Debe ingresar un correo electronico valido xxx@qqq.com
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-2 align-self-center pr-0">
                        <label class="form-label mb-0">Contraseña:</label>
                    </div>
                    <div class="col-4 pl-0">
                        {!! Form::password('password', array( 'placeholder' => 'Password','id' => 'p1','class' => 'form-control')) !!}
                        <div  class="invalid-feedback">
                            Debe ingresar una contraseña de minimo 8 caracteres y maximo 12
                        </div>
                    </div>
                    <div class="col-2 align-self-center pr-0">
                        <label class="form-label mb-0">Confirme su contraseña:</label>
                    </div>
                    <div class="col-4 pl-0">
                        {!! Form::password('confirm-password', array('onkeyup' =>'validatePassword()', 'id'=>'pswd',  'placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        <div id="comfirm" class="invalid-feedback">
                            <span id="text">la constraseña no coinciden</span>
                        </div>
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-2 align-self-center pr-0">
                        <label class="form-label mb-0">Grupo:</label>
                    </div>
                    <div class="col-4 pl-0">
                        {!! Form::select('roles[]', $roles, $userRole, array('required', 'class' => 'form-select')) !!}
                        <div  class="invalid-feedback">
                            Debe seleccionar un grupo
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>  

<div class="row text-center">
    <x-cards size="12">
        <button type="submit" class="btn btn-success">Guardar</button>
        <input class="btn btn-danger" type="reset" value="Deshacer">
    </x-cards> 
</div>
{!! Form::close() !!}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que desea eliminar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>A seleccionado eliminar al usuario: {{$user->name}}</p>
                    <p>Una vez eliminado no podra ser recuperado de nuevo</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        <button class="btn btn-danger btn-icon-split" type="submit">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Eliminar grupo</span>
                        </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

<script>
  

    function validatePassword(){

        var pw = document.getElementById("pswd").value;

        var p1 = document.getElementById("p1").value;
            

        
        
        
        if(pw.length <= 7) {
              
            document.getElementById("comfirm").style.display = "block"
            document.getElementById("text").innerHTML = "La contraseña debe contener minimo 8 caracteres"+pw.length+" - "+pw
            return false;

        }else if( pw.length >= 12) {  
                document.getElementById("comfirm").style.display = "block"
                document.getElementById("text").innerHTML = "La contraseña debe contener maximo 12 caracteres"
                return false;  
        } else {  
            if( p1 != pw) {
                document.getElementById("comfirm").style.display = "block"
                document.getElementById("text").innerHTML = "La contraseña no coinciden"+p1+" - "+pw
                return false;  
                
            }else{
                document.getElementById("comfirm").style.display = "none" 
            }
        } 
        
        
    }
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@endsection