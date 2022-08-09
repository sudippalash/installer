<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installer</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        .vh-95 {
            height: 95vh!important;
        }

        #progress {
            padding: 0;
            list-style-type: none;
            font-family: arial;
            font-size: 12px;
            clear: both;
            line-height: 1em;
            margin: 0 -1px;
            text-align: center;
            display: flex;
            align-items: flex-start;
        }
        #progress li {
            float: left;
            padding: 10px 30px 10px 40px;
            background: #edebea;
            color: #000;
            position: relative;
            border-top: 1px solid #edebea;
            border-bottom: 1px solid #edebea;
            margin: 0 1px;
            flex: 1;
            cursor: pointer;
        }
        #progress li:before {
            content: '';
            border-left: 16px solid #fff;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            position: absolute;
            top: 0;
            left: 0;
        }
        #progress li:after {
            content: '';
            border-left: 16px solid #edebea;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 20;
        }
        #progress li:hover {
            background: #dddbda;
        }
        #progress li:hover::before {
            border-left: 16px solid #dddbda;
        }
        #progress li:hover::after {
            border-left: 16px solid #dddbda;
        }
        #progress li.done {
            background: #45c65a;
            color: #fff;
        }
        #progress li.done:after {
            border-left-color: #45c65a;
            color: #fff;
        }
        #progress li.done:hover {
            background: #2d844a;
        }
        #progress li.done:hover::after {
            border-left: 16px solid #2d844a;
        }
        #progress li.active {
            background: #004486;
            color: #fff;
        }
        #progress li.active:after {
            border-left-color: #004486;
            color: #fff;
        }
        #progress li.active:hover {
            background: #032d60;
        }
        #progress li.active:hover::after {
            border-left: 16px solid #032d60;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row vh-95 justify-content-center">
            <div class="col-sm-8 my-auto">
                <div class="card">
                    @stack('title')
                    
                    <div class="card-body">
                        @if($errors->has('error'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('error') }}</div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>