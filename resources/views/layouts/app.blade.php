<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{--JQuery Datepicker--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{--link for fontawesome icons--}}
    <link rel="stylesheet" href="{{URL::asset('fontawesome/css/font-awesome.min.css')}}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Coding Task
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('clients.index') }}" class="href">Clients</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
        </div>
    </nav>

    {{--Flash Messages--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Well Done!</strong>
                        {{ Session::get('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--JQuery Datepicker--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--JQuery Validation--}}
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
{{--JQuery CDN--}}
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });

        $("#clientform").validate({
            rules: {
                name: "required",
                gender: "required",
                phone: "required",
                email: "required",
                address: "required",
                nationality: "required",
                date_of_birth: "required",
                education: "required",
                preferred_contact: "required"
            },
            messages: {
                name: "Please enter your name",
                gender: "Please select a gender",
                phone: "Please enter phone number",
                email: "Please enter your email",
                address: "Please enter your address",
                nationality: "Please enter your nationality",
                date_of_birth: "Please enter your date of birth",
                education: "Please select your education background",
                preferred_contact: "Please select your preferred contact"
            }
        });
    });
</script>
</body>
</html>
