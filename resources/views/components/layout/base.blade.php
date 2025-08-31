<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="/css/{{ $style }}.css" />
        {{-- <link rel="stylesheet" href="{{asset('public/assets/backend/css/epa.css')}}"> --}}
    </head>

    {{ $slot }}

</html>