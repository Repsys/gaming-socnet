<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title') - {{env('APP_NAME')}}</title>
</head>
<body id="body" class="text-light">
@include('components.header')
@yield('back-btn')
<section id="contentSection" class="">
    @yield('content')
</section>
@include('components.footer')
<script src="/js/jquery-3.6.0.slim.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
