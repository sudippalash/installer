@extends('installerview::layouts.app')

@section('title')
    @component('installerview::components.title', ['step' => 4]) @endcomponent
@endsection

@section('content')
<form method="POST" action="{{ route('installer.database-setup') }}">
    @csrf
    
    <div class="form-group">
        <label>DATABASE HOST</label>
        <input type="text" class="form-control" name="database_host" placeholder="127.0.0.1" value="{{ old('database_host', $envConfig['DB_HOST']) }}" required>

        @if ($errors->has('database_host'))
            <span class="invalid-feedback d-block">{{ $errors->first('database_host') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label>DATABASE PORT</label>
        <input type="text" class="form-control" name="database_port" placeholder="3306" value="{{ old('database_port', $envConfig['DB_PORT']) }}" required>

        @if ($errors->has('database_port'))
            <span class="invalid-feedback d-block">{{ $errors->first('database_port') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label>DATABASE NAME</label>
        <input type="text" class="form-control" name="database_name" placeholder="project_db" required value="{{ old('database_name', $envConfig['DB_DATABASE']) }}">
        <small><strong>Note:</strong> before putting a database name you should create a database in your database server.</small>

        @if ($errors->has('database_name'))
            <span class="invalid-feedback d-block">{{ $errors->first('database_name') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label>DATABASE USERNAME</label>
        <input type="text" class="form-control" name="database_username" placeholder="root" required value="{{ old('database_username', $envConfig['DB_USERNAME']) }}">

        @if ($errors->has('database_username'))
            <span class="invalid-feedback d-block">{{ $errors->first('database_username') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label>DATABASE PASSWORD</label>
        <input type="text" class="form-control" name="database_password" placeholder="********" value="{{ old('database_password', $envConfig['DB_PASSWORD']) }}">

        @if ($errors->has('database_password'))
            <span class="invalid-feedback d-block">{{ $errors->first('database_password') }}</span>
        @endif
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="migrate" name="migrate" value="1">
        <label class="form-check-label" for="migrate">Database tables migrate and data seed</label>
        <br>
        <small><strong>Note:</strong> if you already import an SQL file in your database then no need to check this</small>
    </div>

    <div class="text-center m-5">
        <button type="submit" class="btn btn-secondary">Set & Next <i class="fa fa-arrow-right"></i></button>
    </div>
</form>
@endsection
