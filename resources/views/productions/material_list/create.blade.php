@extends('layouts.app')

@section('title-section', $conf['title-section'])

@section('btn')
<x-btns :back="$conf['back']" :group="$conf['group']" />
@endsection



@section('content')
{!! Form::open(array('route' => 'material-list.store','method'=>'POST', 'novalidate', 'class' => 'needs-validation', 'id' => 'myForm')) !!}
<div class="row g-3">
    <x-cards size="12">
        <div class="row g-3">
        
            <div class="col-md-3">
                <label class="form-label">Nombre de la lista</label>
                {!! Form::text('name_materials_list', null, array( 'autocomplete' => 'off','required', 'placeholder' => 'Ingrese el nombre de la lista','class' => 'form-control form-control-sm')) !!}
                <div  class="invalid-feedback">
                    Ingrese el nombre de la lista
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-3">
                <label for="inputState" class="form-label">Producto</label>
                {!! Form::select('id_product', $products, null, ['required', 'class' => 'form-select form-control-sm', 'placeholder' => 'Seleccione']) !!}
                <div  class="invalid-feedback">
                    Seleccione un producto
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-3">
                <label class="form-label">Cantidad a producir</label>
                {!! Form::text('qty_materials_list', null, array( 'onkeypress' => 'return soloNumeros(event);', 'autocomplete' => 'off','required', 'placeholder' => 'Ingrese la cantidad a producir','class' => 'form-control form-control-sm')) !!}
                <div  class="invalid-feedback">
                    Ingrese la cantidad a producir
                </div>
            </div>

            <div class="col-md-3">
                <label for="inputState" class="form-label">Presentación</label>
                {!! Form::select('id_presentation_product', $presentations, null, ['required', 'class' => 'form-select form-control-sm', 'placeholder' => 'Seleccione']) !!}
                <div  class="invalid-feedback">
                Seleccione la presentación
                </div>
            </div>

        </div>
    </x-cards>

    <x-cards>
    <table class="table table-sm border-dark table-bordered mb-4" id="myTable">
        <tr>
            
            <th scope="col" class="align-middle">PRODUCTO</th>
            <th scope="col" class="text-center align-middle" width="10%">CANTIDAD</th>
            <th scope="col" class="text-center align-middle" width="10%">UNIDAD</th>
            <th scope="col" class="text-center align-middle bg-success" width="4%"><a onclick="addRow()" class="btn btn-success btn-sm mb-0 btn-block"><i class="fas fa-plus-circle fa-lg"></i></a></th> 
        </tr>   
    </table> 
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

@section('js')
<script type="text/javascript">
  var i = 0;


  function borrarRow(x){
 
 var i = x.parentNode.parentNode.rowIndex;
 document.getElementById("myTable").deleteRow(i);
}

function addRow(){

        var table = document.getElementById("myTable");
        var row = table.insertRow(-1);
        row.id = 'tr_'+i

        var cell2 = row.insertCell(-1);
        var cell3 = row.insertCell(-1);
        var cell4 = row.insertCell(-1);
        var cell5 = row.insertCell(-1);


        select = `{!! Form::select('id_product_details[]', $productos, null, ['required', 'class' => 'form-select form-control-sm', 'placeholder' => 'Seleccione']) !!}`;

        



        cell2.innerHTML = select;
        cell3.innerHTML = "<input type='text' name='qtys[]' required class='form-control form-control-sm' onkeypress='return soloNumeros(event);' autocomplete='off'>";


      

        cell4.innerHTML = `{!! Form::select('id_presentation_details[]', $presentaciones, null, ['required', 'class' => 'form-select form-control-sm', 'placeholder' => 'Seleccione']) !!}`;




        cell5.innerHTML = '<a onclick="borrarRow(this)" class="btn btn-block mb-0 btn-danger mb-0"><i class="fas fa-minus-circle"></i></a>'; 


        i++
    
   
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






  function soloNumeros(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = "1234567890";
      especiales = [];
  
      tecla_especial = false
      for(var i in especiales) {
          if(key == especiales[i]) {
              tecla_especial = true;
              break;
          }
      }
  
      if(letras.indexOf(tecla) == -1 && !tecla_especial)
          return false;
  }
</script>
@endsection