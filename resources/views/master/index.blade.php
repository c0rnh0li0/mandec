<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Themelight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasrole('Admin')
    <meta name="_token" content="{{ csrf_token() }}" />
    @endhasrole
    @include('engine.styles')
</head>
<body id="top">
    @include('engine.header')
    <div class="wrapper">

        @yield('content')

    </div>
    @include('engine.footer')

    @include('engine.scripts')
</body>
</html>