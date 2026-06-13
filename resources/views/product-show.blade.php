<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
    
<head>
    @include('partials.head', [
        'title'       => $product->name . ' - Rozi Tib',
        'description' => \Illuminate\Support\Str::limit(strip_tags((string) $product->description), 155),
        'image'       => $product->image ? asset('storage/' . $product->image) : asset('logo.png'),
    ])

    <style>
        .prose h2 { font-size: 1.5rem; font-weight: bold; margin-top: 1.5em; margin-bottom: 0.5em; color: #f97316; }
        .prose h3 { font-size: 1.25rem; font-weight: bold; margin-top: 1.2em; margin-bottom: 0.5em; color: #0d9488; }
        .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1em; }
        .prose p { margin-bottom: 1em; line-height: 1.7; }
    </style>
</head>


<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')



   <div class="container mx-auto px-6 py-12 flex-grow">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100">
            
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                <div class="bg-gray-50 p-8 border-r border-gray-100 relative h-full rounded-t-3xl lg:rounded-l-3xl lg:rounded-tr-none">
                    
                    <div class="absolute inset-0 overflow-hidden rounded-t-3xl lg:rounded-l-3xl lg:rounded-tr-none pointer-events-none">
                        <div class="absolute -top-20 -left-20 w-64 h-64 bg-orange-100 rounded-full opacity-50 blur-3xl"></div>
                    </div>
                    
<div class="sticky top-20 lg:top-32 w-full max-w-lg z-10 mx-auto">
                        @if($product->image)
                            
                            {{-- ساخت یک آرایه یکپارچه از تمام عکس‌ها با PHP --}}
                            @php
                                $allImages = [asset('storage/' . $product->image)];
                                if(is_array($product->gallery) && count($product->gallery) > 0) {
                                    foreach($product->gallery as $img) {
                                        $allImages[] = asset('storage/' . $img);
                                    }
                                }
                                $totalImages = count($allImages);
                                $slideDuration = 6000; // مدت زمان هر اسلاید (6 ثانیه)
                            @endphp

                            {{-- جادوی Alpine.js: مدیریت کامل اسلایدر --}}
                            <div x-data="{ 
                                    images: {{ json_encode($allImages) }},
                                    currentIndex: 0,
                                    timer: null,
                                    startTime: null,
                                    progress: 0,
                                    
                                    // تابع اصلی برای شروع اسلاید خودکار با شريط تقدم
                                    startAutoSlide() {
                                        if(this.images.length > 1) {
                                            clearInterval(this.timer);
                                            this.startTime = Date.now();
                                            this.progress = 0;
                                            
                                            this.timer = setInterval(() => {
                                                let elapsed = Date.now() - this.startTime;
                                                this.progress = (elapsed / {{ $slideDuration }}) * 100;
                                                
                                                if(this.progress >= 100) {
                                                    this.next();
                                                }
                                            }, 10); // بروزرسانی سریع برای حرکت نرم شريط
                                        }
                                    },
                                    
                                    // رفتن به عکس بعدی
                                    next() {
                                        this.currentIndex = (this.currentIndex + 1) % this.images.length;
                                        this.startAutoSlide(); // ریست تایمر
                                    },
                                    
                                    // برگشتن به عکس قبلی
                                    prev() {
                                        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                                        this.startAutoSlide(); // ریست تایمر
                                    },
                                    
                                    // انتخاب دستی کاربر از روی Thumbnails
                                    manualSelect(index) {
                                        this.currentIndex = index;
                                        this.startAutoSlide(); // ریست تایمر
                                    }
                                }" 
                                x-init="startAutoSlide()"
                                class="w-full relative group">
                                
<div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-3 h-64 sm:h-80 lg:h-[400px] flex flex-col items-center justify-center relative overflow-hidden group/main">
                                    <img :src="images[currentIndex]" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain drop-shadow-lg transition-opacity duration-500 ease-in-out">
                                    
                                    <button @click="prev()" 
                                            class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/70 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg border border-gray-100 hover:bg-brand-teal hover:text-white transition-all duration-300 opacity-0 group-hover/main:opacity-100 z-20 rtl:right-4 rtl:left-auto">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    </button>
                                    
                                    <button @click="next()" 
                                            class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/70 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg border border-gray-100 hover:bg-brand-teal hover:text-white transition-all duration-300 opacity-0 group-hover/main:opacity-100 z-20 rtl:left-4 rtl:right-auto">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </button>
                                </div>

                                @if($totalImages > 1)
                                <div class="w-full h-1 bg-gray-100 rounded-full mb-3 overflow-hidden group-hover:opacity-100 transition-opacity duration-300 z-20">
                                    <div class="h-full bg-brand-orange transition-all duration-100 ease-linear" :style="'width: ' + progress + '%'"></div>
                                </div>
                                @endif

                                <div class="flex gap-2 overflow-x-auto py-1 no-scrollbar">
                                    <template x-for="(img, index) in images" :key="index">
                                        <button @click="manualSelect(index)" 
                                                class="flex-shrink-0 w-16 h-16 rounded-xl bg-white overflow-hidden transition-all duration-300 border-2"
                                                :class="currentIndex === index ? 'border-brand-orange shadow-md scale-105' : 'border-gray-100 hover:border-brand-teal opacity-70 hover:opacity-100'">
                                            <img :src="img" class="w-full h-full object-contain p-2">
                                        </button>
                                    </template>
                                </div>
                                
                                

                            </div>
                        @else
                            <div class="w-full h-64 sm:h-96 bg-white border border-gray-100 shadow-sm rounded-2xl flex flex-col items-center justify-center text-gray-400">
                                <span class="text-4xl mb-2">📷</span>
                                <p>{{ __('messages.no_image_available') }}</p>
                            </div>
                        @endif
                    </div>
                </div>






                <div class="p-8 lg:p-12 relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-teal-50 rounded-bl-full opacity-60"></div>
                    <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold px-3 py-1 rounded-full mb-5 uppercase tracking-wide border border-orange-200">
                        {{ $product->category }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight relative z-10">{{ $product->name }}</h1>
                    
                    <div class="prose text-gray-600 mb-8 border-b border-gray-100 pb-8">
                        <h3 class="text-lg font-bold text-teal-700 mb-2 flex items-center gap-2">{{ __('messages.product_overview') }}</h3>
                        {!! sanitize_html($product->description) !!}
                    </div>

                    @if($product->youtube_video_id)
                    <div class="mb-8 bg-brand-warm p-6 rounded-2xl border border-orange-100 relative overflow-hidden group hover:border-orange-200 transition">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-orange-100 rounded-bl-full -mr-8 -mt-8 opacity-50"></div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center relative z-10">
                            <span class="w-8 h-8 bg-white text-brand-orange rounded-full flex items-center justify-center mr-3 shadow-sm text-sm border border-orange-100">▶️</span>
                        </h3>
                        <div class="relative w-full rounded-xl overflow-hidden shadow-inner border border-gray-200 bg-gray-900 z-10" style="padding-top: 56.25%;">
                            <iframe src="https://www.youtube.com/embed/{{ $product->youtube_video_id }}" class="absolute top-0 left-0 w-full h-full border-0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif

                    @if($product->specs)
                    <div class="mb-8 bg-brand-warm p-6 rounded-2xl border border-orange-100 relative overflow-hidden group hover:border-orange-200 transition">
                        <div class="absolute top-0 right-0 w-16 h-16 bg-orange-100 rounded-bl-full -mr-8 -mt-8 opacity-50"></div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center relative z-10">
                            <span class="w-8 h-8 bg-white text-brand-orange rounded-full flex items-center justify-center mr-3 shadow-sm text-sm border border-orange-100">⚙️</span>
                            {{ __('messages.technical_specs') }}
                        </h3>
                        <div class="text-gray-700 whitespace-pre-line leading-loose text-base font-sans relative z-10">{!! sanitize_html($product->specs) !!}</div>
                    </div>
                    @endif


                   @if($product->catalog_file)
                    <div class="mb-4">
                        <a href="{{ route('product.download', $product->id) }}" class="w-full bg-brand-teal text-white py-4 rounded-xl font-bold hover:bg-teal-600 transition shadow-md flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ __('messages.download_catalog') }}
                        </a>
                    </div>
                    @endif


                    <div class="flex flex-col sm:flex-row gap-4 mt-8">

    <a href="{{ route('contact.show', ['source' => 'quote_product']) }}" class="flex-1 bg-orange-500 text-white text-center py-4 rounded-xl font-bold hover:bg-orange-600 transition flex items-center justify-center gap-2 shadow-sm">
        {{ __('messages.request_quote') }}
    </a>
                           
    <a href="{{ route('products.index') }}" class="flex-1 bg-white border-2 border-brand-teal text-brand-teal text-center py-4 rounded-xl font-bold hover:bg-teal-50 transition flex items-center justify-center gap-2">
        {{ __('messages.back_to_list') }}
    </a>

</div>


                </div>

            </div>
        </div>
    </div>
@php
    $productImages = [asset('storage/' . $product->image)];
    if (is_array($product->gallery)) {
        foreach ($product->gallery as $img) {
            $productImages[] = asset('storage/' . $img);
        }
    }

    $productSchema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Product',
        'name'        => $product->name,
        'image'       => $productImages,
        'description' => \Illuminate\Support\Str::limit(strip_tags((string) $product->description), 300),
        'category'    => $product->category,
        'sku'         => (string) $product->id,
        'brand'       => ['@type' => 'Brand', 'name' => 'Rozi Tib'],
        'manufacturer'=> ['@type' => 'Organization', 'name' => 'Rozi Tib', 'url' => url('/')],
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => __('messages.home'),     'item' => route('home')],
            ['@type' => 'ListItem', 'position' => 2, 'name' => __('messages.products'), 'item' => route('products.index')],
            ['@type' => 'ListItem', 'position' => 3, 'name' => $product->category,      'item' => route('products.category', $product->category)],
            ['@type' => 'ListItem', 'position' => 4, 'name' => $product->name],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
    
 @include('footer')
    
</body>
</html>