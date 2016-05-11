<!DOCTYPE html>
<html>
    <head>
        <title>Hoc truc tuyen</title>
        <meta charset="UTF-8">
        {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.css') }}
    </head>
    <body>
        <header>
        </header>
        <body>
            @yield('content')
        </body>
        {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    </body>
</html>
