<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" /> --}}
    <title>Plants</title>
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href="{{URL::to('css/styles.css')}}"> --}}
</head>

<body>
    @include('partials.header')
    <div class="container">
        @yield('content')
    </div>
    @include('partials.footer')
</body>

</html>
