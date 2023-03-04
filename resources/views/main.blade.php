<!doctype html>
<html class="fixed">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','Inicio')</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="{{ asset('css/notyJs.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('css/notyJs.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/validationEngine.jquery.css')}}" />
        <style>
            body {
                font-family: 'Roboto Light', arial;
                background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(white), to(black));
                background: -webkit-linear-gradient(top, #003E65, white);
                background: -moz-linear-gradient(top, #003E65, white);
                background: -o-linear-background(top, #003E65, white);
                background: -ms-linear-background(top, #003E65, white);
                background: linear-background(top, #003E65, white);
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .btn-primary{
             background-color: #003e65;
                border-color:#003e65;
                color: white;
            }
            label{
                color: #95999c;
            }
        </style>
    @yield('AddScritpHeader')
    </head>
    <body>
    <br>
    <div class="container" style="background-color: white">
        <div>
            <div class="row">
                <div class="col-12">
                    <section class="content-body">
                        <br>
                            @yield('content')
                        <br>
                    </section>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <small>
            <ul class="list-group list-group-horizontal-sm">
                <li class="list-group-item">GML Test <small class="text-muted"> V 0.0.1 </small></li>
                <li class="list-group-item">Bootstrap <small class="text-muted"> V 5.3.0 </small></li>
                <li class="list-group-item">Jquery <small class="text-muted"> V 3.6.3 </small></li>
                <li class="list-group-item">Laravel <small class="text-muted"> V 8.0.* </small></li>
            </ul></small>
        </div>
    </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="{{URL::asset('./js/notyJs.js')}}"></script>
    <script src="{{URL::asset('./js/jquery.validationEngine.js')}}"></script>
    <script src="{{URL::asset('./js/jquery.validationEngine-es.js')}}"></script>
    <script src="{{URL::asset('./js/local.js')}}"></script>
@yield('AddScriptFooter')

</html>