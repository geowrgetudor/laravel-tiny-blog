@props(['meta' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if ($meta)
        {{ $meta }}
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="{{ asset(mix('app.css', 'vendor/tiny-blog')) }}" rel="stylesheet"
        onerror="alert('app.css failed to load. Please refresh the page, re-publish Tiny Blog assets, or fix routing for vendor assets.')">
</head>

<body class="bg-gray-100">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
