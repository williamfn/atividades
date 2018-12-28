<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Atividades Duosystem</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Lista de Atividades Duosystem</h1>
            </div>

            <main class="main">
                <div class="main-content">
                    @yield('content')
                </div>
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>