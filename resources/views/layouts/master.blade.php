<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <hteml>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>@yield('title')|Blog</title>

            <!--Bootstrap Core CSS--> 
            <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

            <!--Theme CSS--> 
            <link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">

            <!--Custom Fonts--> 
            <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

            <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries--> 
            <!--WARNING: Respond.js doesn't work if you view the page via file://--> 
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <!-- Scripts -->
            <script>
                window.Laravel = {!! json_encode([
                        'csrfToken' => csrf_token(),
                ]) !!}
                ;
            </script>
        </head>
        <body>
            @include('layouts.partials.navigation')

            @yield('content')

            @include('layouts.partials.footer')

            <!--jQuery--> 
            <script src="{{asset('jquery/jquery.min.js')}}"></script>

            <!--Bootstrap Core JavaScript--> 
            <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

            <!--Contact Form JavaScript--> 
            <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
            <!--<script src="{{asset('js/contact_me.js')}}"></script>-->

            <!--Theme JavaScript--> 
            <script src="{{asset('js/clean-blog.js')}}"></script>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
            
            @yield('extraJs')
        </body>
    </hteml>