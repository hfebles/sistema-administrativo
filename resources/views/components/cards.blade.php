@if (isset($message))
<div class="col-md-{{$size}} mb-3">
    <div class="card">
        <div class="card-body">
            <div class="col-md-{{$size}}">
                <div class="alert alert-success alert-dismissible fade show mb-0 p-3" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="col-md-{{$size}}">
    <div class="card card-frame">
        @if (isset($head))
            <div class="card-header">
            </div>
        @endif

        <div class="card-body">
            @if (isset($table))
                <x-table-data :conf="$table" />
            @endif

            @if (isset($slot))
                {{$slot}}
            @endif

            
        </div>

        @if (isset($foot)) 
            <div class="card-footer">
                {{$foot}}
            </div>
        @endif
    </div>
</div>