<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>BuyDay.cl - Preinscripcion Tiendas</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Staatliches&family=Montserrat&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
</head>
<body>
<main id="app">

</main>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
