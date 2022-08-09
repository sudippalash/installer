@extends('installerview::layouts.app')

@section('title')
    @component('installerview::components.title', ['step' => 1]) @endcomponent
@endsection

@section('content')
<div class="text-center m-5">
    <h5 class="mb-5">To setup your project please follow the following instructions.</h5>

    <a class="btn btn-secondary" href="{{ route('installer.server-requirements') }}">Next <i class="fa fa-arrow-right"></i></a>
</div>
@endsection
