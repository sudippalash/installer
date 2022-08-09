@extends('installerview::layouts.app')

@push('title')
    @component('installerview::components.title', ['step' => 3]) @endcomponent
@endpush

@section('content')
<div class="mt-3">        
    <ul class="list-group">
        @foreach ($permissions as $key => $val)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $key }}</span>
                <span>
                    @if ($val['value'] == 1)
                    <span class="text-success"><i class="fa fa-check-square"></i> {{ $val['permission'] }}</span>
                    @else
                    <span class="text-danger"><i class="fa fa-times"></i> {{ $val['permission'] }} (Required {{ $val['required'] }})</span>
                    @endif
                </span>
            </li>
        @endforeach
    </ul>

    <div class="text-center m-5">
        @if($grantPermission == 1)
            <a class="btn btn-secondary" href="{{ route('installer.database-setup') }}">Next <i class="fa fa-arrow-right"></i></a>
        @else
            <a class="btn btn-secondary" href="{{ route(request()->route()->getName()) }}">Recheck <i class="fa fa-refresh"></i></a>
        @endif
    </div>
</div>
@endsection
