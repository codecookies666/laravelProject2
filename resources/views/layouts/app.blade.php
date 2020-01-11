<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--CSRF token--}}
    <meta name="csrf-token" conten="{{ csrf_token() }}">

    <title>@yield('title', 'Project2') - Laravel 进阶教程</title>

    {{--Style--}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @yield('styles')
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')

        <div class="container">
            @include('shared._messages')

            @yield('content')
        </div>

        @include('layouts._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    @yield('scripts')
</body>