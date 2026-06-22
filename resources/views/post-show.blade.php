<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    @include('partials.head', [
        'title'       => $post->title . ' - Razi Teb',
        'description' => $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags((string) $post->content), 155),
        'image'       => $post->cover_image ? asset('storage/' . $post->cover_image) : asset('logo.png'),
    ])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    @include('partials.navbar')

    @php
        $isNews    = $post->type === 'news';
        $accentColor = $isNews ? 'brand-teal' : 'brand-orange';
        $backRoute  = $isNews ? route('news.index') : route('articles.index');
        $backLabel  = $isNews ? __('messages.news') : __('messages.articles');
        $typeLabel  = $isNews ? __('messages.news') : __('messages.articles');
    @endphp

    <div id="main-content" class="container mx-auto px-6 py-12 flex-grow max-w-4xl">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-400 mb-8">
            <a href="{{ route('home') }}" class="hover:text-brand-teal transition-colors">{{ __('messages.home') }}</a>
            <span>›</span>
            <a href="{{ $backRoute }}" class="hover:text-brand-teal transition-colors">{{ $backLabel }}</a>
            <span>›</span>
            <span class="text-gray-600 truncate max-w-xs">{{ $post->title }}</span>
        </nav>

        <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            {{-- Cover Image --}}
            @if($post->cover_image)
            <div class="w-full h-64 md:h-96 overflow-hidden">
                <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-full h-32 {{ $isNews ? 'bg-gradient-to-r from-brand-teal to-teal-600' : 'bg-gradient-to-r from-brand-orange to-orange-600' }}"></div>
            @endif

            <div class="p-8 md:p-12">

                {{-- Type + Date --}}
                <div class="flex items-center gap-4 mb-6">
                    <span class="inline-block {{ $isNews ? 'bg-teal-50 text-brand-teal border-teal-200' : 'bg-orange-50 text-brand-orange border-orange-200' }} text-xs font-bold px-3 py-1 rounded-full border uppercase tracking-wide">
                        {{ $typeLabel }}
                    </span>
                    @if($post->published_at)
                    <span class="text-sm text-gray-400">{{ $post->published_at->format('F d, Y') }}</span>
                    @endif
                </div>

                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                {{-- Excerpt --}}
                @if($post->excerpt)
                <p class="text-lg text-gray-500 leading-relaxed mb-8 pb-8 border-b border-gray-100">
                    {{ $post->excerpt }}
                </p>
                @endif

                {{-- Content --}}
                @if($post->content)
                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed">
                    {!! sanitize_html($post->content) !!}
                </div>
                @endif

            </div>
        </article>

        {{-- Back Button --}}
        <div class="mt-8">
            <a href="{{ $backRoute }}"
               class="inline-flex items-center gap-2 text-sm font-semibold {{ $isNews ? 'text-brand-teal hover:text-teal-700' : 'text-brand-orange hover:text-orange-700' }} transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                {{ __('messages.back_to') }} {{ $backLabel }}
            </a>
        </div>

    </div>

    @include('footer')
</body>
</html>
