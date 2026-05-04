<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <title>@yield('title', 'Polije Mart')</title>
    {{-- <style>
        * {
            border: 1px solid red;
        }
    </style> --}}
</head>
<body class="flex flex-col h-screen">
    <header class="bg-[#069BC0] flex justify-between p-4">
        <div class="flex items-center gap-2 ml-20">
            <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" width="60px">
            <h3 class="text-2xl font-bold text-white">POLIJE MART</h3>
        </div>
        <div class="flex gap-6 mr-20">
            <div class="flex items-center gap-4">
                <input type="text" name="" id="" class="outline-none border-gray-300 bg-white p-2 rounded-lg" placeholder="Search">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 24 24"><path fill="white" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
                </button>
            </div>
            <div class="flex items-center">
                <a href="#" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 24 24"><path fill="white" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
                </a>
            </div>
            <div class="flex items-center">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 16 16"><path fill="white" d="M8 2a6 6 0 1 0 0 12A6 6 0 0 0 8 2M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m7 4.25c1.933 0 3.5-1.214 3.5-3.036C11.5 8.543 10.956 8 10.286 8H5.715c-.671 0-1.214.544-1.214 1.214c0 1.821 1.567 3.036 3.5 3.036zm0-5a1.874 1.874 0 1 0 .001-3.749A1.874 1.874 0 0 0 8 7.25"/></svg>
                </a>
            </div>
        </div>
    </header>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">LOG OUT</button>
    </form>

    <main class="flex flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#069BC0] text-center text-white p-5">
        <div class="">
            <h1>2026. Polije Mart | All Right Reserved</h1>
        </div>
    </footer>
</body>
</html>