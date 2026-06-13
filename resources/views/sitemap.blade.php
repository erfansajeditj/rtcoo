<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach($urls as $url)
    <url>
        <loc>{{ $url['locales']['en'] }}</loc>
        @foreach($url['locales'] as $lang => $href)
        <xhtml:link rel="alternate" hreflang="{{ $lang }}" href="{{ $href }}"/>
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $url['locales']['en'] }}"/>
        <changefreq>{{ $url['changefreq'] }}</changefreq>
        <priority>{{ $url['priority'] }}</priority>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </url>
@endforeach
</urlset>
