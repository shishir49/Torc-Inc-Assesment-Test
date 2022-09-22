<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         
        <title>Torc Inc Test</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <h3>Welcome To the Dashboard</h3>
        <a href="{{url('test')}}">Participate the Test</a><br>
        <a href="{{url('department-result')}}">Check Result (Department wise)</a><br>
        <a href="{{url('all-result')}}">Check Result (All)</a>
    </body>
</html>
