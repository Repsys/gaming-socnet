<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>
<h1>@yield('title')</h1>
<div class="container">
    @yield('content')
</div>
<script src="/js/jquery-3.6.0.slim.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
