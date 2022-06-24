<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

    <title>
        CRUD PIZZERIA
    </title>
    <style>
        @font-face {
            font-family: 'RF Barbariska rough1 Oblique';
            src: url('../../../../../RF Barbariska rough1 Oblique.ttf');
            font-style: normal;
        }
        h1{
            font-family: "RF Barbariska rough1 Oblique";
            background-color: #000000;
            color: #ffffff;
            text-align: center;
            font-size: 5em;
        }
        #acciones{
            margin-top: 0.5em;
            align-items: baseline;
        }
        input{
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1> Sistema de ingredientes</h1>
        <div class="container">
            @yield('contenido')
        </div>
    </div>
</body>
</html>
