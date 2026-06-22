<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.products') . ' - Razi Teb', 'description' => __('messages.products_subtitle')])

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')

<header class="relative overflow-hidden py-36 md:py-80 bg-cover bg-center md:bg-[center_top_-5rem] -mb-px" style="background-image: url('{{ asset('images/headers/products-bg.webp') }}');">
    <div class="absolute inset-0 z-0" style="background:linear-gradient(to bottom,rgba(0,0,0,.40),rgba(0,0,0,.30),rgba(0,0,0,.5));"></div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white" style="text-shadow:0 2px 20px rgba(0,0,0,.9);">{{ __('messages.products') }}</h1>
        <p class="text-white text-lg" style="opacity:.9;text-shadow:0 1px 10px rgba(0,0,0,.7);">{{ __('messages.products_subtitle') }}</p>
    </div>
</header>






    <!-- بخش جدید فیلتر (منوی کشویی) -->
    <div class="bg-white/95 backdrop-blur border-b border-gray-200 sticky top-[64px] md:top-[80px] z-40 shadow-sm py-4">
        <div class="container mx-auto px-6 flex flex-col sm:flex-row items-center md:justify-start gap-4">
            
            <!-- کلمه Filter با آیکون -->
            <div class="flex items-center text-sm font-bold text-gray-400 uppercase tracking-wider">
                <svg class="w-5 h-5 mr-2 rtl:ml-2 rtl:mr-0 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                {{ __('messages.filter') }}:
            </div>

            <!-- باکس Dropdown با استایل نارنجی/آبی -->
            <div class="relative w-full sm:w-80 group">
                <select onchange="window.location.href=this.value" 
                        class="block w-full appearance-none bg-white border-2 border-brand-teal text-gray-800 font-bold py-2.5 px-4 pr-10 rtl:pr-4 rtl:pl-10 rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-brand-orange/20 focus:border-brand-orange hover:border-brand-orange transition-all duration-300 cursor-pointer">
                    
                    <!-- گزینه همه محصولات -->
                    <option value="{{ route('products.index') }}" {{ !isset($currentCategory) ? 'selected' : '' }}>
                        {{ __('messages.all_products') }}
                    </option>
                    
                    <!-- لود کردن گروه‌ها -->
                    @foreach($categories as $cat)
                        <option value="{{ route('products.category', $cat) }}" {{ (isset($currentCategory) && $currentCategory == $cat) ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                    
                </select>

                <!-- آیکون فلش (نارنجی) -->
                <div class="absolute inset-y-0 right-0 rtl:right-auto rtl:left-0 flex items-center px-4 pointer-events-none text-brand-orange transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            
        </div>
    </div>









    <div id="main-content" class="container mx-auto px-6 py-12 flex-grow">
        
        {{-- حلقه اول: چرخیدن روی دسته‌بندی‌ها --}}
        @foreach($products as $categoryName => $categoryItems)
            
           {{-- تیتر مینیمال و شیک دسته‌بندی --}}
            <div class="flex items-center mt-12 mb-8 group">
                <div class="w-1.5 h-6 bg-brand-orange rounded-full mr-3 rtl:ml-3 rtl:mr-0 shadow-sm shadow-brand-orange/30 group-hover:scale-y-110 transition-transform duration-300"></div>
                
                <h2 class="text-xl md:text-2xl font-bold text-slate-800 capitalize tracking-wide drop-shadow-sm">
                    {{ strtolower($categoryName) }}
                </h2>
                
                <div class="flex-grow h-px bg-gradient-to-r from-slate-300 to-transparent ml-6 rtl:mr-6 rtl:ml-0 opacity-70"></div>
            </div>
            
            {{-- گرید کارت‌ها --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-8 mb-12">
                
                {{-- حلقه دوم: چرخیدن روی محصولات همون دسته --}}
                @foreach($categoryItems as $product)
                <div data-aos="fade-up" class="bg-white rounded-xl shadow-sm transition-all duration-500 border border-gray-100 hover:shadow-2xl hover:shadow-brand-orange/30 hover:-translate-y-1.5 group flex flex-col">
                    <div class="h-40 sm:h-52 md:h-64 overflow-hidden rounded-t-xl bg-white relative flex items-center justify-center p-4 border-b border-gray-50">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" loading="lazy" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500">
                        @else
                            <span class="text-gray-400">{{ __('messages.no_image') }}</span>
                        @endif
                    </div>
                    
                    <div class="p-5 flex-grow flex flex-col">
                        <span class="inline-block text-brand-orange text-xs font-bold uppercase tracking-wide mb-1">{{ $product->category }}</span>
                        <h3 class="font-bold text-lg text-gray-900 mb-2 leading-tight">{{ $product->name }}</h3> 
                        <div class="text-sm text-gray-500 line-clamp-2 mb-4">
                            {!! strip_tags($product->description) !!} 
                        </div>

                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->slug) }}" class="block w-full text-center py-2 border border-brand-teal text-brand-teal font-semibold rounded-lg hover:bg-brand-teal hover:text-white transition-colors duration-300">
                                {{ __('messages.view_details') }}
                            </a>

                            
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- پایان حلقه دوم --}}

            </div>
        @endforeach
        {{-- پایان حلقه اول --}}

        @if($products->isEmpty())
            <div class="text-center py-20 text-gray-500">
                <p>{{ __('messages.no_products_found') }}</p>
            </div>
        @endif
    </div>

   

 @php
    $itemListElements = [];
    $position = 1;
    foreach ($products as $categoryName => $categoryItems) {
        foreach ($categoryItems as $product) {
            $itemListElements[] = [
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => $product->name,
                'url'      => route('products.show', $product->slug),
                'image'    => $product->image ? asset('storage/' . $product->image) : null,
                'description' => strip_tags((string) $product->description),
            ];
        }
    }
    $itemListSchema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'ItemList',
        'name'            => __('messages.products') . ' - Razi Teb',
        'description'     => __('messages.products_subtitle'),
        'url'             => url()->current(),
        'numberOfItems'   => $position - 1,
        'itemListElement' => $itemListElements,
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

   @include('footer')

</body>
</html>