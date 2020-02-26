<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Name - @yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="#">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <h2 class="display-6">Мой первый проект на lumen с применением bootstrap.</h2>
                <div>
                    <h3><a class="nav-link" href="/"><span class="badge badge-primary">Main page</span></a></h3>
                    <h3><a class="nav-link" href={{ route('domains') }}><span class="badge badge-primary">Domains</span></a></h3>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            @yield('analyzer')
        </div>
    </body>
</html>
