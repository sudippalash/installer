@extends('installerview::layouts.app')

@push('title')
    @component('installerview::components.title', ['step' => 6]) @endcomponent
@endpush

@section('content')
<div class="text-center m-5">
    <h5 class="mb-5">Your Project has been installed successfully.</h5>

    <a class="btn btn-secondary" href="{{ url('/') }}">Continue <i class="fa fa-home"></i></a>
</div>
@endsection
