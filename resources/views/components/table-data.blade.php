



        <table class="{{$conf['c_table']}}">
            <thead class="{{$conf['c_thead']}}">
                <tr>
                    @foreach ($conf['ths'] as $k => $th)
                    <th class="text-uppercase font-weight-bolder"  width="{{$conf['w_ts'][$k]}}%">{{$th}}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody id="body-table">
            @for ($o = 0; $o < count($conf['data']); $o++)
            @if ($conf['edit'] == true)
                <tr onclick="window.location='{{$conf['url']}}/{{$conf['data'][$o][$conf['id']]}}/edit';">
            @elseif ($conf['show'] == true)
                <tr onclick="window.location='{{$conf['url']}}/{{$conf['data'][$o][$conf['id']]}}';">
            @else
                <tr>
            @endif    
                    <td class="{{$conf['c_ths'][0]}}" >{{++$conf['i']}}</td>
                    @for ($oa = 0; $oa < count($conf['tds']); $oa++)
                        <td class="{{$conf['c_ths'][$oa+1]}}" >{{$conf['data'][$o][$conf['tds'][$oa]]}}</td>
                    @endfor
                </tr>
            @endfor
            </tbody>
        </table>

<div id="paginacion" class="d-flex justify-content-center">
    {!! $conf['data']->render() !!}      
</div>
