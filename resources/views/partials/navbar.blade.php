<a href="#main-content" class="sr-only focus:not-sr-only">Skip to content</a>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJ3CJZ2H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 shadow-2xl shadow-brand-teal/40 ..." x-data="{ open: false }">
      <div class="container mx-auto px-6 py-3 flex justify-between items-center">

        <a href="{{ route('home') }}" class="flex items-center gap-3 z-50 group">
            <img src="{{ asset('logo.png') }}" alt="Razi Teb" class="h-10 w-auto object-contain">

            <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

            <div class="w-2.5 h-2.5 bg-orange-500 rounded-sm mr-1 animate-pulse"></div>

            <div class="flex flex-col justify-center">
                <span class="text-xl font-bold text-gray-900 tracking-tight leading-none">
                    Razi<span class="text-brand-teal">Teb</span>
                </span>
                <span class="text-[10px] text-gray-500 font-bold tracking-widest uppercase mt-0.5">
                    {{ __('messages.slogan') }}
                </span>
            </div>
        </a>

        {{-- Desktop menu --}}
        <div class="hidden lg:flex absolute left-0 right-0 justify-center items-center space-x-8">

    <a href="{{ route('home') }}" class="pb-1 transition hover:-translate-y-0.5 transform {{ request()->routeIs('home') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
    {{ __('messages.home') }}
</a>


           <a href="{{ route('about') }}"
               class="pb-1 transition hover:-translate-y-0.5 transform {{ request()->routeIs('about') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
              {{ __('messages.about') }}
            </a>

            <a href="{{ route('products.index') }}"
               class="pb-1 transition hover:-translate-y-0.5 transform {{ request()->routeIs('products.index') || request()->routeIs('products.show') || request()->routeIs('products.category') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
               {{ __('messages.products') }}
            </a>

            {{-- Media Dropdown --}}
            <div class="relative" x-data="{ mediaOpen: false }" @mouseenter="mediaOpen = true" @mouseleave="mediaOpen = false">
                <button @click="mediaOpen = !mediaOpen"
                        class="pb-1 transition hover:-translate-y-0.5 transform flex items-center gap-1 {{ request()->routeIs('exhibitions') || request()->routeIs('news.*') || request()->routeIs('articles.*') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
                    Media
                    <svg class="w-3 h-3 transition-transform duration-200" :class="mediaOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="mediaOpen"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-1"
                     class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50">

                    <a href="{{ route('exhibitions') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold hover:bg-gray-50 transition-colors {{ request()->routeIs('exhibitions') ? 'text-brand-teal' : 'text-gray-700 hover:text-brand-teal' }}">
                        <span class="w-7 h-7 bg-teal-50 rounded-lg flex items-center justify-center text-brand-teal text-base">🏛️</span>
                        {{ __('messages.exhibitions') }}
                    </a>

                    <a href="{{ route('news.index') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold hover:bg-gray-50 transition-colors {{ request()->routeIs('news.*') ? 'text-brand-teal' : 'text-gray-700 hover:text-brand-teal' }}">
                        <span class="w-7 h-7 bg-teal-50 rounded-lg flex items-center justify-center text-brand-teal text-base">📰</span>
                        {{ __('messages.news') }}
                    </a>

                    <a href="{{ route('articles.index') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold hover:bg-gray-50 transition-colors {{ request()->routeIs('articles.*') ? 'text-brand-orange' : 'text-gray-700 hover:text-brand-orange' }}">
                        <span class="w-7 h-7 bg-orange-50 rounded-lg flex items-center justify-center text-brand-orange text-base">📝</span>
                        {{ __('messages.articles') }}
                    </a>
                </div>
            </div>

          <a href="{{ route('collaboration.show') }}"
               class="pb-1 transition hover:-translate-y-0.5 transform {{ request()->routeIs('collaboration.show') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
               {{ __('messages.collaboration') }}

            </a>

            <a href="{{ route('contact.show') }}"
               class="pb-1 transition hover:-translate-y-0.5 transform {{ request()->routeIs('contact.show') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold' }}">
               {{ __('messages.contact') }}

            </a>
        </div>

        <div class="flex items-center gap-4 z-50 ml-auto">

            <div class="flex items-center text-xs font-semibold text-gray-500 bg-gray-100 rounded-full px-2.5 py-0.5 shadow-sm">
    @foreach(['en' => 'EN', 'tg' => 'TJ', 'ru' => 'RU'] as $code => $label)
        @php
            $segments = request()->segments();
            $segments[0] = $code;
            $url = url(implode('/', $segments));
            if (request()->getQueryString()) { $url .= '?' . request()->getQueryString(); }
        @endphp
        <a href="{{ $url }}" class="{{ app()->getLocale() == $code ? 'text-gray-900 font-bold' : 'hover:text-brand-teal transition' }}">{{ $label }}</a>
        @if(! $loop->last) <span class="mx-2 text-gray-300">|</span> @endif
    @endforeach
</div>

            <a href="/admin" class="hidden md:block text-sm font-medium text-brand-orange hover:text-orange-700 transition">
            {{ __('messages.login') }}
            </a>

            {{-- Hamburger button (mobile only) --}}
            <button
                @click="open = !open"
                class="lg:hidden flex flex-col justify-center items-center w-9 h-9 rounded-lg hover:bg-gray-100 transition"
                aria-label="Toggle menu"
            >
                <span aria-hidden="true" class="block w-5 h-0.5 bg-gray-700 transition-all duration-300" :class="open ? 'rotate-45 translate-y-1.5' : ''"></span>
                <span aria-hidden="true" class="block w-5 h-0.5 bg-gray-700 my-1 transition-all duration-300" :class="open ? 'opacity-0' : ''"></span>
                <span aria-hidden="true" class="block w-5 h-0.5 bg-gray-700 transition-all duration-300" :class="open ? '-rotate-45 -translate-y-1.5' : ''"></span>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden border-t border-gray-100 bg-white/98 backdrop-blur-md"
        @click.outside="open = false"
    >
        <div class="container mx-auto px-6 py-4 flex flex-col gap-1">
            <a href="{{ route('home') }}" @click="open = false"
               class="px-3 py-3 rounded-lg font-semibold text-sm {{ request()->routeIs('home') ? 'text-brand-teal bg-teal-50' : 'text-gray-700 hover:text-brand-teal hover:bg-gray-50' }} transition">
                {{ __('messages.home') }}
            </a>
            <a href="{{ route('about') }}" @click="open = false"
               class="px-3 py-3 rounded-lg font-semibold text-sm {{ request()->routeIs('about') ? 'text-brand-teal bg-teal-50' : 'text-gray-700 hover:text-brand-teal hover:bg-gray-50' }} transition">
                {{ __('messages.about') }}
            </a>
            <a href="{{ route('products.index') }}" @click="open = false"
               class="px-3 py-3 rounded-lg font-semibold text-sm {{ request()->routeIs('products.index') || request()->routeIs('products.show') || request()->routeIs('products.category') ? 'text-brand-teal bg-teal-50' : 'text-gray-700 hover:text-brand-teal hover:bg-gray-50' }} transition">
                {{ __('messages.products') }}
            </a>
            {{-- Media section in mobile --}}
            <div class="px-3 pt-2 pb-1">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Media</span>
            </div>
            <a href="{{ route('exhibitions') }}" @click="open = false"
               class="px-5 py-2.5 rounded-lg font-semibold text-sm {{ request()->routeIs('exhibitions') ? 'text-brand-teal bg-teal-50' : 'text-gray-600 hover:text-brand-teal hover:bg-gray-50' }} transition flex items-center gap-2">
                🏛️ {{ __('messages.exhibitions') }}
            </a>
            <a href="{{ route('news.index') }}" @click="open = false"
               class="px-5 py-2.5 rounded-lg font-semibold text-sm {{ request()->routeIs('news.*') ? 'text-brand-teal bg-teal-50' : 'text-gray-600 hover:text-brand-teal hover:bg-gray-50' }} transition flex items-center gap-2">
                📰 {{ __('messages.news') }}
            </a>
            <a href="{{ route('articles.index') }}" @click="open = false"
               class="px-5 py-2.5 rounded-lg font-semibold text-sm {{ request()->routeIs('articles.*') ? 'text-brand-orange bg-orange-50' : 'text-gray-600 hover:text-brand-orange hover:bg-orange-50' }} transition flex items-center gap-2">
                📝 {{ __('messages.articles') }}
            </a>
            <a href="{{ route('collaboration.show') }}" @click="open = false"
               class="px-3 py-3 rounded-lg font-semibold text-sm {{ request()->routeIs('collaboration.show') ? 'text-brand-teal bg-teal-50' : 'text-gray-700 hover:text-brand-teal hover:bg-gray-50' }} transition">
                {{ __('messages.collaboration') }}
            </a>
            <a href="{{ route('contact.show') }}" @click="open = false"
               class="px-3 py-3 rounded-lg font-semibold text-sm {{ request()->routeIs('contact.show') ? 'text-brand-teal bg-teal-50' : 'text-gray-700 hover:text-brand-teal hover:bg-gray-50' }} transition">
                {{ __('messages.contact') }}
            </a>
            <div class="border-t border-gray-100 pt-3 mt-2">
                <a href="/admin" class="px-3 py-3 rounded-lg font-semibold text-sm text-brand-orange hover:bg-orange-50 transition block">
                    {{ __('messages.login') }}
                </a>
            </div>
        </div>
    </div>
</nav>
