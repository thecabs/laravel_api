<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">

        <title>Document</title>   
    </head>
    <body>
        <h1> Confirmation d'inscription</h1>
        <h2> Confirmation d'inscription</h2>
        <ul>
            <li> Nom : <strong> {{$info["name"]}}<\strong></li>
            <li> Email : <strong> {{$info["email"]}}<\strong></li>
        </ul>
        

     
    </body>
</html>
