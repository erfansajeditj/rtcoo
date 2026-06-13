@php
    // نگاشت کد زبان → فرمت og:locale
    $ogLocales = ['en' => 'en_US', 'tg' => 'tg_TJ', 'ru' => 'ru_RU'];
    $current   = app()->getLocale();

    // ساخت آدرس همین صفحه برای هر زبان (بخش اول URL را عوض می‌کند)
    $segments = request()->segments();
    $altUrl = function ($code) use ($segments) {
        $segs = $segments;
        $segs[0] = $code;
        return url(implode('/', $segs));
    };

    $canonical       = url(request()->path());
    $pageTitle       = $title ?? ('Rozi Tib - ' . __('messages.slogan'));
    $pageDescription = $description ?? __('messages.footer_about_desc');
    $ogImage         = $image ?? asset('logo.png');
@endphp

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">

{{-- Canonical --}}
<link rel="canonical" href="{{ $canonical }}">

{{-- Favicon --}}
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico?v=' . config('app.version', '1')) }}">
<link rel="icon" type="image/png" href="{{ asset('favicon.png?v=' . config('app.version', '1')) }}">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png?v=' . config('app.version', '1')) }}">

{{-- hreflang: به گوگل می‌گوید هر زبان کدام آدرس است --}}
@foreach($ogLocales as $code => $ogLocale)
    <link rel="alternate" hreflang="{{ $code }}" href="{{ $altUrl($code) }}">
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $altUrl(config('app.locale', 'en')) }}">

{{-- Open Graph (تلگرام/واتساپ/لینکدین) --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="Rozi Tib">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:locale" content="{{ $ogLocales[$current] ?? 'en_US' }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">

{{-- Alpine (فقط یک‌بار) + دارایی‌ها --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style> body { font-family: 'Inter', sans-serif; } </style>

@php
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Rozi Tib',
        'alternateName' => 'RoziTib Medical Technologies',
        'url'      => url('/'),
        'logo'     => asset('logo.png'),
        'description' => __('messages.footer_about_desc'),
        'email'    => 'info@rozitib.com',
        'telephone'=> '+992931102730',
        'address'  => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Dushanbe',
            'addressCountry'  => 'TJ',
        ],
        'sameAs' => [
            'https://linkedin.com/company/rozi-tib',
            'https://t.me/+992931102730',
            'https://wa.me/992931102730',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
