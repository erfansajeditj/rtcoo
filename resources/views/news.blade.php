<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.news') . ' - Razi Teb', 'description' => __('messages.news_subtitle')])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')

<header class="relative overflow-hidden py-36 md:py-72 bg-gradient-to-br from-brand-teal via-teal-600 to-teal-800">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
            <circle cx="80" cy="20" r="40" fill="white"/>
            <circle cx="10" cy="80" r="30" fill="white"/>
        </svg>
    </div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3">
        <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>
    <div class="container mx-auto px-6 text-center relative z-10">
        <span class="inline-block bg-white/20 text-white text-xs font-bold px-4 py-1.5 rounded-full mb-5 uppercase tracking-widest border border-white/30">Media</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white drop-shadow-md">{{ __('messages.news') }}</h1>
        <p class="text-teal-100 text-lg">{{ __('messages.news_subtitle') }}</p>
    </div>
</header>

<div id="main-content" class="container mx-auto px-6 py-16 flex-grow">

    @if($posts->isEmpty())
        <div class="max-w-lg mx-auto bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
            <div class="w-16 h-16 bg-teal-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.no_posts_yet') }}</h2>
            <p class="text-gray-500 text-sm">{{ __('messages.add_posts_admin') }}</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article data-aos="fade-up" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col group">

                @if($post->cover_image)
                <div class="h-52 overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @else
                <div class="h-52 bg-gradient-to-br from-teal-50 to-teal-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-brand-teal/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                @endif

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-xs font-bold text-brand-teal uppercase tracking-wide">{{ __('messages.news') }}</span>
                        @if($post->published_at)
                        <span class="text-xs text-gray-400">{{ $post->published_at->format('M d, Y') }}</span>
                        @endif
                    </div>

                    <h2 class="text-lg font-bold text-gray-900 mb-3 leading-tight group-hover:text-brand-teal transition-colors">
                        {{ $post->title }}
                    </h2>

                    @if($post->excerpt)
                    <p class="text-sm text-gray-500 leading-relaxed mb-4 flex-grow line-clamp-3">
                        {{ $post->excerpt }}
                    </p>
                    @endif

                    <div class="mt-auto pt-4 border-t border-gray-50">
                        <a href="{{ route('news.show', $post->slug) }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-brand-teal hover:text-teal-700 transition-colors">
                            {{ __('messages.read_more') }}
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    @endif
</div>

@include('footer')
</body>
</html>
