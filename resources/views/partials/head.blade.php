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
    $pageTitle       = $title ?? ('Razi Teb- ' . __('messages.slogan'));
    $pageDescription = $description ?? __('messages.footer_about_desc');
    $ogImage         = $image ?? asset('logo.png');
@endphp

<meta charset="UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NJ3CJZ2H');</script>
<!-- End Google Tag Manager -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">

{{-- Canonical --}}
<link rel="canonical" href="{{ $canonical }}">


{{-- Favicon --}}
<link rel="icon" type="image/png" href="{{ asset('logo.png?v=' . config('app.version', '1')) }}">
<link rel="apple-touch-icon" href="{{ asset('logo.png?v=' . config('app.version', '1')) }}">

{{-- hreflang: به گوگل می‌گوید هر زبان کدام آدرس است --}}
@foreach($ogLocales as $code => $ogLocale)
    <link rel="alternate" hreflang="{{ $code }}" href="{{ $altUrl($code) }}">
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $altUrl(config('app.locale', 'en')) }}">

{{-- Open Graph (تلگرام/واتساپ/لینکدین) --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="Razi Teb">
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

{{-- دارایی‌ها (Alpine + AOS از طریق Vite bundle) --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style> body { font-family: 'Inter', sans-serif; } </style>

@php
    $orgSchema = [
        '@context'      => 'https://schema.org',
        '@type'         => ['MedicalOrganization', 'LocalBusiness'],
        'name'          => 'Razi Teb',
        'alternateName' => 'Razi Teb Medical Technologies',
        'url'           => url('/'),
        'logo'          => [
            '@type' => 'ImageObject',
            'url'   => asset('logo.png'),
        ],
        'image'       => asset('logo.png'),
        'description' => __('messages.footer_about_desc'),
        'email'       => 'info@rtcoo.com',
        'telephone'   => '+992931102730',
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Rudaki Avenue',
            'addressLocality' => 'Dushanbe',
            'addressCountry'  => 'TJ',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => '38.5598',
            'longitude' => '68.7738',
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                'opens'     => '08:00',
                'closes'    => '17:00',
            ],
        ],
        'sameAs' => [
            'https://linkedin.com/company/rozi-tib',
            'https://t.me/+992931102730',
            'https://wa.me/992931102730',
        ],
        'knowsAbout' => [
            'Medical Equipment Manufacturing',
            'Autoclave Sterilization',
            'Hospital Equipment Supply',
            'Healthcare Technology',
        ],
    ];

    $websiteSchema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        'name'            => 'Razi Teb',
        'url'             => url('/'),
        'description'     => __('messages.footer_about_desc'),
        'inLanguage'      => ['en', 'tg', 'ru'],
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => [
                '@type'       => 'EntryPoint',
                'urlTemplate' => url('/') . '/' . app()->getLocale() . '/products?q={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
