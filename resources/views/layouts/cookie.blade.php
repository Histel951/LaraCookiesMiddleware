<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @yield('head')
    <title>@yield('title')</title>
</head>
<body>
@if(session('error') or session('errors'))
    <x-cookie-header :status="'failed'" />
@else
    <x-cookie-header />
@endif
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
    @yield('script')
</body>
</html>
