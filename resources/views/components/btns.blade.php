@if(isset($back))
    <a href="{{ route($back) }}" class="btn btn-dark btn-icon-split ml-auto">
        <span class="icon text-white-50">
            <i class="fas fa-chevron-circle-left"></i>
        </span>
        <span class="text">Atras</span>
    </a>
@endif

@if(isset($create))
    @if(Gate::check('adm-create') || Gate::check($group.'-create'))
        <a href="{!! route($create['route']) !!}" class="btn btn-success btn-icon-split @if(isset($back) || isset($edit)) ml-3 @else ml-auto @endif">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">{{$create['name']}}</span>
            
        </a>
    @endcan
@endif

@if(isset($edit))
    @if(Gate::check('adm-create') || Gate::check($group.'-edit'))
    <a href="{{ route($edit['route'], $edit['id']) }}" class="btn btn-warning btn-icon-split @if(isset($back) || isset($create)) ml-3 @else ml-auto @endif">
            <span class="icon text-white-50">
                <i class="fas fa-user-edit"></i>
            </span>
            <span class="text">Editar</span>
        </a>
    @endcan
@endif


@if(isset($delete) && $delete == true )
    @if(Gate::check('adm-create') || Gate::check($group.'-delete'))
        <a class="btn btn-danger btn-icon-split ml-3" data-toggle="modal" data-target="#deleteModal">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Eliminar usuario</span>
        </a>
    @endcan
@endif

