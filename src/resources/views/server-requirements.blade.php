@extends('installerview::layouts.app')

@section('title')
    @component('installerview::components.title', ['step' => 2]) @endcomponent
@endsection

@section('content')
<div class="mt-3">
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
            <span>Required PHP version {{ $version['php_require_version']}}</span>
            <span>
                Current version {{ $version['php_server_version']}}
                
                @if ($version['versionCompatibility'] == 1)
                <span class="text-success"><i class="fa fa-check-square"></i></span>
                @else
                <span class="text-danger"><i class="fa fa-times"></i></span>
                @endif
            </span>
        </li>
    </ul>
        
    <ul class="list-group">
        @foreach ($extensions as $key => $val)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $key }}</span>
                @if ($val == 1)
                <span class="text-success"><i class="fa fa-check-square"></i></span>
                @else
                <span class="text-danger"><i class="fa fa-times"></i></span>
                @endif
            </li>
        @endforeach
    </ul>

    <div class="text-center m-5">
        @if (!in_array(0, $extensions) && $version['versionCompatibility'] == 1)
            <a class="btn btn-secondary" href="{{ route('installer.file-permissions') }}">Next <i class="fa fa-arrow-right"></i></a>
        @else
            <a class="btn btn-secondary" href="{{ route(request()->route()->getName()) }}">Recheck <i class="fa fa-refresh"></i></a>
        @endif
    </div>
</div>
@endsection
