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

            .container {
               display:grid;
               grid-template-columns: "1fr 1fr";
               grid-template-rows: "1fr 0.2fr";
               grid-template-areas: 
               "login registration"
               "message message";
            }

            .login {
             grid-area:login;
            }

            .registration {
                grid-area:registration;
            }

            .message {
                grid-area:message;
            }
        </style>
    </head>
    <body>
       @yield('content')
    </body>
</html>
