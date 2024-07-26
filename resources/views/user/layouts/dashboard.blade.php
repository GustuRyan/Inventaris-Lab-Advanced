<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>
        @yield('page')
    </title>
    <link rel="icon" href="/assets/img/SIIL-Rounded.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
    <style>
        .font-rhodium {
            font-family: 'Rhodium Libre', serif;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div>
        @include('user.components.navbar')
        <div>
            @yield('contents')
        </div>
        @include('user.components.cart')
        @include('user.components.footer')
    </div>
</body>

</html>
