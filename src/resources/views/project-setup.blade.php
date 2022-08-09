@extends('installerview::layouts.app')

@section('title')
    @component('installerview::components.title', ['step' => 5]) @endcomponent
@endsection

@section('content')
<form method="POST" action="{{ route('installer.project-setup') }}">
    @csrf
    
    <div class="form-group">
        <label>APP_NAME</label>
        <input type="text" class="form-control" name="APP_NAME" value="{{ old('APP_NAME', $envConfig['APP_NAME']) }}">

        @if ($errors->has('APP_NAME'))
            <span class="invalid-feedback d-block">{{ $errors->first('APP_NAME') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label>APP_URL</label>
        <input type="url" class="form-control" name="APP_URL" value="{{ old('APP_URL', $envConfig['APP_URL']) }}">

        @if ($errors->has('APP_URL'))
            <span class="invalid-feedback d-block">{{ $errors->first('APP_URL') }}</span>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>LOG_CHANNEL</label>
                <select class="form-control" name="LOG_CHANNEL">
                    @foreach (["single", "daily", "slack", "syslog", "errorlog", "monolog", "custom", "stack"] as $log)
                        <option value="{{ $log }}" @if (old('LOG_CHANNEL', $envConfig['LOG_CHANNEL']) == $log) selected @endif>{{ $log }}</option>
                    @endforeach
                </select>
        
                @if ($errors->has('LOG_CHANNEL'))
                    <span class="invalid-feedback d-block">{{ $errors->first('LOG_CHANNEL') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>FILESYSTEM_DRIVER</label>
                <select class="form-control" name="FILESYSTEM_DRIVER">
                    @foreach (["public", "local", "ftp", "sftp", "s3"] as $drive)
                        <option value="{{ $drive }}" @if (old('FILESYSTEM_DRIVER', $envConfig['FILESYSTEM_DRIVER']) == $drive) selected @endif>{{ $drive }}</option>
                    @endforeach
                </select>
        
                @if ($errors->has('FILESYSTEM_DRIVER'))
                    <span class="invalid-feedback d-block">{{ $errors->first('FILESYSTEM_DRIVER') }}</span>
                @endif
            </div>
        </div>
    </div>
    
    <h5 class="text-center mt-5 mb-3"><u>MAIL DRIVER CONFIGARATION</u></h5>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>MAILER</label>
                <input type="text" class="form-control" name="MAIL_MAILER" value="{{ old('MAIL_MAILER', $envConfig['MAIL_MAILER']) }}">
        
                @if ($errors->has('MAIL_MAILER'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_MAILER') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>PORT</label>
                <input type="text" class="form-control" name="MAIL_PORT" value="{{ old('MAIL_PORT', $envConfig['MAIL_PORT']) }}">
        
                @if ($errors->has('MAIL_PORT'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_PORT') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>HOST</label>
                <input type="text" class="form-control" name="MAIL_HOST" value="{{ old('MAIL_HOST', $envConfig['MAIL_HOST']) }}">
        
                @if ($errors->has('MAIL_HOST'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_HOST') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>USERNAME</label>
                <input type="text" class="form-control" name="MAIL_USERNAME" value="{{ old('MAIL_USERNAME', $envConfig['MAIL_USERNAME']) }}">
        
                @if ($errors->has('MAIL_USERNAME'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_USERNAME') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{ old('MAIL_PASSWORD', $envConfig['MAIL_PASSWORD']) }}">
        
                @if ($errors->has('MAIL_PASSWORD'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_PASSWORD') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>ENCRYPTION</label>
                <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{ old('MAIL_ENCRYPTION', $envConfig['MAIL_ENCRYPTION']) }}">
        
                @if ($errors->has('MAIL_ENCRYPTION'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_ENCRYPTION') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label>FROM_NAME</label>
                <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ old('MAIL_FROM_NAME', $envConfig['MAIL_FROM_NAME']) }}">
        
                @if ($errors->has('MAIL_FROM_NAME'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_FROM_NAME') }}</span>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>FROM_ADDRESS</label>
                <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{ old('MAIL_FROM_ADDRESS', $envConfig['MAIL_FROM_ADDRESS']) }}">
        
                @if ($errors->has('MAIL_FROM_ADDRESS'))
                    <span class="invalid-feedback d-block">{{ $errors->first('MAIL_FROM_ADDRESS') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="text-center m-5">
        <button type="submit" class="btn btn-secondary">Set & Next <i class="fa fa-arrow-right"></i></button>
    </div>
</form>
@endsection
