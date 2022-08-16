
@if (isset($side))
<div class="row g-3 text-center mt-5">
    <div>
        <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
        <input class="btn btn-danger" type="reset" value="Deshacer">
        </div>
    </div>
@else
<x-cards>    
    
<div class="text-center">
            <button type="submit" id="btnGuardar" class="btn btn-sm btn-success">Guardar</button>
            <input class="btn btn-sm btn-danger" type="reset" value="Deshacer">
        </div>
    </x-cards>
    
        
    @endif
        