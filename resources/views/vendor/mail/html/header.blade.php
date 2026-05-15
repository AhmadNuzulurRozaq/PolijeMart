{{-- @props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo-v2.1.png" class="logo" alt="Laravel Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr> --}}

<!-- resources/views/vendor/mail/html/header.blade.php -->
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    @if (trim($slot) === 'Laravel')
        <img src="{{ asset('images/logoPolije.png') }}" class="logo" alt="Polije Mart Logo">
        
    @else
        {{ $slot }}
    @endif
</a>
</td>
</tr>

