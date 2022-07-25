@extends('installerview::layouts.app')

@push('title')
    @component('installerview::components.title', ['step' => 1]) @endcomponent
@endpush

@section('content')
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="mt-3">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between">
            <span>Cras justo odio</span>
            <span class="text-success"><i class="fa fa-check-square"></i> 0777</span>
        </li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
</div>
@endsection
