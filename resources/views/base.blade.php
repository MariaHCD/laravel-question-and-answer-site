<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A Site</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <a href="{{url('/')}}" class="text-dark btn">
                <h1>Q&A Website</h1>
            </a>
            <hr />
        </div>

        @yield('main')
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
