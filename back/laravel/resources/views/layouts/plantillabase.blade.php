<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=DM+Sans&family=Indie+Flower&display=swap" rel="stylesheet">

    <title>
        CRUD PIZZERIA
    </title>
    <style>
        h1{
            font-family: 'Indie Flower', cursive;
            background-color: #000000;
            color: #EEBF75;
            text-align: center;
            font-size: 7vw;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
        }
        body{
            font-family: 'DM Sans', sans-serif;
        }
        #acciones{
            margin-top: 0.5em;
        }
        input{
            text-transform: capitalize;
        }
        .green{
            color:#1c7430;
        }
        h2{
            margin-top: 1em;
            margin-bottom: 1em;
            background-color: #D32F2F;
            color: #FFFFFF;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            text-align: center;
        }
        .delete{
            background-color: #D32F2F;
        }
        .create{
            background-color: #1c7430;

        }
        .yellow{
            background-color: #ba8b00;
            margin-top: 1em;
        }
        .principal{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h3{
            background-color: #CC2523;
            margin-top: 1em;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            color: #FFFFFF;
            text-align: center;
        }
        .form-label{
            color:#1c7430;
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
