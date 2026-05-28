<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    @vite(['resources/js/app.js', 'resources/js/test.js'])
    <title>@yield('title', 'Polije Mart')</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.inventory') }}">Inventory</a></li>
            </ul>
        </nav>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>