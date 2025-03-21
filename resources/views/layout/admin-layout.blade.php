@props(["header"])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="d-flex min-vh-100">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
            <h2 class="text-center">Admin Panel</h2>
            <hr />
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="{{url('/admin')}}"
                        class="nav-link link-dark {{request()->is('admin') ? 'active text-white' : ''}}">
                        Main
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/news')}}"
                        class="nav-link link-dark {{request()->is('admin/news') ? 'active text-white' : ''}}">
                        News
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/users')}}"
                        class="nav-link link-dark {{request()->is('admin/users') ? 'active text-white' : ''}}">
                        Users
                    </a>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            <div class="bg-light border-start p-3 d-flex justify-content-between align-items-center">
                <h2 class="my-0">{{$header}}</h2>
                <div class="d-flex justify-content-center align-items-center">
                    <p class="mx-3 mb-0 fs-3 d-inline-block">{{auth()->user()->name}}</p>
                    <a class="btn btn-danger" href="{{url('/')}}">Exit</a>
                </div>
            </div>
            <main class="flex-grow-1 p-3">
                {{$slot}}
            </main>
        </div>
    </div>
</body>

</html>