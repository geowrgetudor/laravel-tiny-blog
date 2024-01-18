@props([
    'title' => '',
    'description' => '',
    'keywords' => '',
    'type' => '',
    'image' => '',
    'canonical' => '',
])

<title>{{ $title . ' - ' . config('app.name', 'Tiny Blog') }}</title>

<link rel="icon" type="image/png" href="{{ config('tiny-blog.favicon') }}">

<meta property="og:title" content="{{ $title }} | {{ config('app.name') }}" />
<meta property="og:description" content="{{ $description }}" />
<meta name="description" content="{{ $description }}" />
<meta name="keywords" content="{{ $keywords }}" />
<meta property="og:type" content="{{ $type }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:locale" content="{{ config('tiny-blog.blog.locale') }}" />

@if ($image)
    <meta property="og:image" content="{{ $image }}" />
@endif

@if ($canonical)
    <meta property="og:url" content="{{ $canonical }}" />
    <link rel="canonical" href="{{ $canonical }}" />
@endif
