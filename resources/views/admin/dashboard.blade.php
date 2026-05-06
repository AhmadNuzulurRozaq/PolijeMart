@extends('layouts.sidebar')

@section('title', 'Dashboard - Polije Mart')

@section('content')

<section class="flex mx-auto p-10 gap-10">
    <div class="flex-1 p-10 flex shadow-xl rounded-md gap-5 bg-[#0091D5] items-center">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18s-.41-.06-.57-.18l-7.9-4.44A.99.99 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18s.41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 4.15L6.04 7.5L12 10.85l5.96-3.35zM5 15.91l6 3.38v-6.71L5 9.21zm14 0v-6.7l-6 3.37v6.71z"/></svg>
        </div>
        <div>
            <span class="font-semibold">TOTAL PRODUCT</span>
            <h1 class="text-4xl font-bold text-[#202020]">{{ $total }}</h1>
        </div>
    </div>
    <div class="flex-1 p-10 flex shadow-xl rounded-md gap-5 bg-[#A5D8DD] items-center">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
        </div>
        <div>
            <span class="font-semibold">TOTAL ORDER</span>
            <h1 class="text-4xl font-bold text-[#202020]">{{ $order }}</h1>
        </div>
    </div>
</section>

<section>

</section>

@endsection