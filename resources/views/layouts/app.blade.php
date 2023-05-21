<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite('resources/js/app.js')

</head>

<body>

    @include('partials.header')

    <main>
        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success m-3">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('deleteStatus'))
                <div class="alert alert-danger m-3">
                    {{ session('deleteStatus') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    {{-- @include('partials.footer') --}}

</body>

</html>
