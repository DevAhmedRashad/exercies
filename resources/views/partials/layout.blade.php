<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{--Application style sheet--}}
    <link href="{{ URL::to('css/style.css') }}" rel="stylesheet">

    @yield('cssLinks')
</head>
<body>
@yield('content')

@yield('jsLinks')
</body>
</html>