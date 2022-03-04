<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo App</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        <div class="container">
            <div class="wrapper">
                <header>
                    <div class="heading-title">
                        <h1>todos</h1>
                    </div>
                </header>
        
                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>

        <script>
            var csrf_token = '{{ csrf_token() }}';
            var page = '{{ str_replace('todo.', '', request()->route()->getName()) }}';
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
