<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/reset.css', 'resources/js/app.js'])
    <title>Baltic</title>
</head>
<body style="background-color: @yield('content-bg-color', '#fff')">
    <header></header>
    @yield('menu')
    @yield('content')
    <footer></footer>
</body>
</html>
