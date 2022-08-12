
@if ($item['submenu'] == [])
<hr class="sidebar-divider">
    <li class="nav-item">
        @if ($item['href'] == 1)
            @if(Gate::check('adm-list') || Gate::check($item['grupo'].'-list'))
                <a class="nav-link"  href="{{$item['slug']}}"><i class="fas fa-fw fa-cog"></i><span>{{ $item['name'] }}</span> </a>
            @endif
    
        @else
            <a class="nav-link" href="{{ route($item['slug']) }}"><i class="fas fa-fw fa-cog"></i><span>{{ $item['name'] }}</span> </a>
            
        @endif
    </li>
    <hr class="sidebar-divider">
@else
    @if(Gate::check('adm-list') || Gate::check($item['grupo'].'-list'))
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_{{$item['id']}}"
                    aria-expanded="true" aria-controls="collapse_{{$item['id']}}"><i class="fas fa-fw fa-cog"></i><span>{{ $item['name'] }}</span> </a>
        <div id="collapse_{{$item['id']}}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @foreach ($item['submenu'] as $submenu)
            
                @if ($submenu['submenu'] == [])
                    @if ($submenu['href'] == 1)
                    
                    @if(Gate::check('adm-list') || Gate::check($item['grupo'].'-list'))
                    
                            <a class="collapse-item" href="{{$submenu['slug']}}"><i class="{{$submenu['icono']}}"></i> {{ $submenu['name'] }} </a>
                            @endif

                        
                    @else

                    @if(Gate::check('adm-list') || Gate::check($item['grupo'].'-list'))
                            <a class="collapse-item" href="{{ route($submenu['slug']) }}"><i class="{{$submenu['icono']}}"></i>{{ $submenu['name'] }} </a>
                            
                            @endif
                    @endif
                @else
                    @if(Gate::check('adm-list') || Gate::check('$item["grupo"]-list'))
                        @include('conf.menu.partials.menu-item', [ 'item' => $submenu ])
                    @endif
                @endif
            @endforeach
            </div>
        </div>
    </li>
    @endif
@endif




