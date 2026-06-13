<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    @include('partials.head', ['title' => 'Rozi Tib - ' . __('messages.slogan'), 'description' => __('messages.hero_desc')])
</head>

<body class="bg-white text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')

    <div class="relative w-full h-screen overflow-hidden bg-gray-900">
    
    <video
        autoplay
        loop
        muted
        playsinline
        class="absolute inset-0 w-full h-full object-cover z-0 scale-105 transform motion-safe:animate-slow-zoom"
    >
        <source src="{{ asset('videos/hero.mp4') }}" type="video/mp4">
        <source src="{{ asset('videos/hero.webm') }}" type="video/webm">
        Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-brand-teal/20 to-black/80 z-10 pointer-events-none"></div>

    <div class="relative z-20 flex flex-col items-center justify-center h-full text-center px-6 max-w-5xl mx-auto mt-10">



            <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-4 block animate-pulse">{{ __('messages.innovating_healthcare') }}</span>
<h1 class="text-4xl md:text-7xl font-bold text-white mb-4 md:mb-6 leading-tight drop-shadow-lg">                {{ __('messages.future_of') }} <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-200 to-white">{{ __('messages.medical_equipment') }}</span>
            </h1>
            <p class="text-gray-200 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.hero_desc') }}
            </p>
            
            <div class="flex flex-col md:flex-row gap-4 justify-center">
<a href="{{ route('products.index') }}" class="w-full md:w-auto px-6 py-3 md:px-8 md:py-4 bg-brand-teal text-white font-bold rounded-full hover:bg-teal-600 transition shadow-lg hover:shadow-teal-500/30 transform hover:scale-105">
                        {{ __('messages.view_products') }}
                </a>
<a href="{{ route('contact.show') }}" class="w-full md:w-auto px-6 py-3 md:px-8 md:py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-gray-900 transition shadow-lg transform hover:scale-105">
                        {{ __('messages.contact_us') }}
                </a>
            </div>
        </div>
    </div>





<!-- ========================================== -->
<!-- 1. بخش ویژگی‌ها و مزایای رقابتی (چرا ما؟) -->
<!-- ========================================== -->
<div class="bg-gray-50/50 py-16 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <!-- خط زیر تیتر حذف شد -->
            <h2 class="text-3xl md:text-4xl font-extrabold text-teal-900 tracking-tight">{{ __('messages.why_choose_us') }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- کارت 1 -->
            <!-- با رفتن موس روی کارت، حاشیه نارنجی میشه -->
            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-orange-400 transition-all duration-300 transform hover:-translate-y-1 text-center">
                <!-- آیکون: در حالت عادی آبی‌سبز، با هاور نارنجی میشه -->
                <div class="w-16 h-16 mx-auto bg-teal-50 group-hover:bg-orange-50 rounded-2xl flex items-center justify-center mb-5 text-teal-600 group-hover:text-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.feature_hightech_title') }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ __('messages.feature_hightech_desc') }}</p>
            </div>

            <!-- کارت 2 -->
            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-orange-400 transition-all duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 mx-auto bg-teal-50 group-hover:bg-orange-50 rounded-2xl flex items-center justify-center mb-5 text-teal-600 group-hover:text-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.feature_delivery_title') }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ __('messages.feature_delivery_desc') }}</p>
            </div>

            <!-- کارت 3 -->
            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-orange-400 transition-all duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 mx-auto bg-teal-50 group-hover:bg-orange-50 rounded-2xl flex items-center justify-center mb-5 text-teal-600 group-hover:text-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.feature_warranty_title') }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ __('messages.feature_warranty_desc') }}</p>
            </div>

            <!-- کارت 4 -->
            <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-orange-400 transition-all duration-300 transform hover:-translate-y-1 text-center">
                <div class="w-16 h-16 mx-auto bg-teal-50 group-hover:bg-orange-50 rounded-2xl flex items-center justify-center mb-5 text-teal-600 group-hover:text-orange-500 transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('messages.feature_support_title') }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ __('messages.feature_support_desc') }}</p>
            </div>

        </div>
    </div>
</div>




<!-- ========================================== -->
<!-- 2. بخش دسته‌بندی محصولات -->
<!-- ========================================== -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <!-- عنوان بخش که جا مونده بود -->
    <div class="text-center mb-12 mt-4">
        <h2 class="text-3xl md:text-4xl font-extrabold text-teal-900 tracking-tight">{{ __('messages.product_categories') }}</h2>
    </div>

    <!-- گرید محصولات (کارت‌ها و عکس‌ها بزرگتر شدن) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach($categories as $categoryName => $product)
            <a href="{{ route('products.category', $categoryName) }}" 
               class="group flex items-center p-2 bg-white border-2 border-teal-500 rounded-xl shadow-sm hover:shadow-lg hover:border-orange-500 hover:-translate-y-1 transition-all duration-300">
                
                <!-- قاب عکس (بزرگ‌تر شد) -->
                <div class="flex-shrink-0 w-12 h-12 rounded-lg overflow-hidden bg-teal-50 border border-teal-200 group-hover:border-orange-200 transition-colors">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $categoryName }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    @else
                        <!-- آیکون پیش‌فرض -->
                        <div class="w-full h-full flex items-center justify-center text-teal-500 group-hover:text-orange-500 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <div class="ml-5 rtl:ml-0 rtl:mr-5 overflow-hidden">
                    <span class="block text-sm font-bold text-teal-700 group-hover:text-orange-600 transition-colors truncate" title="{{ $categoryName }}">
                        {{ $categoryName }}
                    </span>
                    <span class="block text-sm text-teal-600 mt-1 group-hover:text-orange-500 transition-colors">
                        {{ __('messages.view_products') }}
                    </span>
                </div>
            </a>
        @endforeach
    </div>
</div>





<div class="bg-white py-24 relative overflow-hidden border-t border-gray-100">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-full bg-gradient-to-b from-brand-teal/10 to-transparent opacity-60 blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-6 max-w-7xl relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6">
                Uncompromising <span class="text-brand-teal">Standards</span>
            </h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Quality is not just a promise; it is engineered into every device we build. We strictly adhere to national and international healthcare regulations to ensure absolute patient safety.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl text-center transition-all duration-300 group hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-teal-900/5 hover:border-brand-teal">
                <div class="w-12 h-12 mx-auto bg-gray-200 group-hover:bg-brand-teal/10 rounded-full flex items-center justify-center text-gray-500 group-hover:text-brand-teal transition-colors mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h4 class="text-gray-900 font-bold text-lg mb-1">IEC 60601-1</h4>
                <p class="text-gray-500 text-sm">Medical Electrical Safety</p>
            </div>

            <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl text-center transition-all duration-300 group hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-teal-900/5 hover:border-brand-teal">
                <div class="w-12 h-12 mx-auto bg-gray-200 group-hover:bg-brand-teal/10 rounded-full flex items-center justify-center text-gray-500 group-hover:text-brand-teal transition-colors mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4 class="text-gray-900 font-bold text-lg mb-1">ISO 13485</h4>
                <p class="text-gray-500 text-sm">Quality Management</p>
            </div>

            <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl text-center transition-all duration-300 group hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-orange-900/5 hover:border-brand-orange">
                <div class="w-12 h-12 mx-auto bg-gray-200 group-hover:bg-brand-orange/10 rounded-full flex items-center justify-center text-gray-500 group-hover:text-brand-orange transition-colors mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h4 class="text-gray-900 font-bold text-lg mb-1">IMED Approved</h4>
                <p class="text-gray-500 text-sm">National Health Certifications</p>
            </div>

            <div class="bg-gray-50 border border-gray-200 p-6 rounded-2xl text-center transition-all duration-300 group hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-orange-900/5 hover:border-brand-orange">
                <div class="w-12 h-12 mx-auto bg-gray-200 group-hover:bg-brand-orange/10 rounded-full flex items-center justify-center text-gray-500 group-hover:text-brand-orange transition-colors mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4 class="text-gray-900 font-bold text-lg mb-1">Global Export</h4>
                <p class="text-gray-500 text-sm">International Ready</p>
            </div>

        </div>
    </div>
</div>




<!-- ========================================== -->
<!-- FAQ Section (SEO + GEO: AI Engine Optimization) -->
<!-- ========================================== -->
<section class="bg-gray-50 py-20 border-t border-gray-100" id="faq">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-extrabold text-teal-900 tracking-tight mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-500 text-lg">Everything you need to know about Rozi Tib and our medical equipment.</p>
        </div>

        <div class="space-y-4" x-data="{ open: null }">

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <button @click="open = open === 1 ? null : 1" class="w-full flex items-center justify-between px-6 py-5 text-left font-bold text-gray-900 hover:text-brand-teal transition-colors">
                    <span>What types of medical equipment does Rozi Tib manufacture?</span>
                    <svg class="w-5 h-5 text-brand-teal shrink-0 transition-transform duration-300" :class="open === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 1" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">
                    Rozi Tib specializes in high-speed autoclaves, sterilization systems, and advanced medical devices for hospitals, clinics, and healthcare facilities. Our product range includes surgical sterilization units, diagnostic equipment, and critical care devices — all manufactured to IEC 60601-1 and ISO 13485 standards.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <button @click="open = open === 2 ? null : 2" class="w-full flex items-center justify-between px-6 py-5 text-left font-bold text-gray-900 hover:text-brand-teal transition-colors">
                    <span>Do you export medical equipment internationally?</span>
                    <svg class="w-5 h-5 text-brand-teal shrink-0 transition-transform duration-300" :class="open === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 2" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">
                    Yes. Rozi Tib is an internationally ready manufacturer based in Dushanbe, Tajikistan. We export our medical equipment across Central Asia, the Middle East, and beyond. Our products meet international certification requirements, making them suitable for use in healthcare facilities worldwide.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <button @click="open = open === 3 ? null : 3" class="w-full flex items-center justify-between px-6 py-5 text-left font-bold text-gray-900 hover:text-brand-teal transition-colors">
                    <span>What quality certifications do your products have?</span>
                    <svg class="w-5 h-5 text-brand-teal shrink-0 transition-transform duration-300" :class="open === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 3" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">
                    Our medical equipment complies with IEC 60601-1 (Medical Electrical Safety), ISO 13485 (Quality Management System for Medical Devices), and national IMED certification requirements. Every product undergoes rigorous in-house quality control testing before delivery.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <button @click="open = open === 4 ? null : 4" class="w-full flex items-center justify-between px-6 py-5 text-left font-bold text-gray-900 hover:text-brand-teal transition-colors">
                    <span>How can I request a price quote or product catalog?</span>
                    <svg class="w-5 h-5 text-brand-teal shrink-0 transition-transform duration-300" :class="open === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 4" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">
                    You can request a quote directly from any product page by clicking "Request Quote", or use our <a href="{{ route('contact.show') }}" class="text-brand-teal font-semibold hover:underline">Contact form</a>. For partnership inquiries and distributor catalogs, visit our <a href="{{ route('collaboration.show') }}" class="text-brand-teal font-semibold hover:underline">Collaboration page</a>. Our team typically responds within one business day.
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                <button @click="open = open === 5 ? null : 5" class="w-full flex items-center justify-between px-6 py-5 text-left font-bold text-gray-900 hover:text-brand-teal transition-colors">
                    <span>Do you provide after-sales support and warranty?</span>
                    <svg class="w-5 h-5 text-brand-teal shrink-0 transition-transform duration-300" :class="open === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 5" x-transition class="px-6 pb-5 text-gray-600 leading-relaxed">
                    Yes. Rozi Tib provides comprehensive after-sales support including 24/7 technical assistance, rapid spare parts supply, and extended warranties on all manufactured devices. We guarantee minimal downtime for all equipment delivered to healthcare facilities.
                </div>
            </div>

        </div>
    </div>
</section>

@php
    $faqSchema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => [
            [
                '@type'          => 'Question',
                'name'           => 'What types of medical equipment does Rozi Tib manufacture?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Rozi Tib specializes in high-speed autoclaves, sterilization systems, and advanced medical devices for hospitals, clinics, and healthcare facilities. Our product range includes surgical sterilization units, diagnostic equipment, and critical care devices — all manufactured to IEC 60601-1 and ISO 13485 standards.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Do you export medical equipment internationally?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Rozi Tib is an internationally ready manufacturer based in Dushanbe, Tajikistan. We export our medical equipment across Central Asia, the Middle East, and beyond. Our products meet international certification requirements, making them suitable for use in healthcare facilities worldwide.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'What quality certifications do your products have?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Our medical equipment complies with IEC 60601-1 (Medical Electrical Safety), ISO 13485 (Quality Management System for Medical Devices), and national IMED certification requirements. Every product undergoes rigorous in-house quality control testing before delivery.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'How can I request a price quote or product catalog?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'You can request a quote directly from any product page by clicking "Request Quote", or use our Contact form. For partnership inquiries and distributor catalogs, visit our Collaboration page. Our team typically responds within one business day.'],
            ],
            [
                '@type'          => 'Question',
                'name'           => 'Do you provide after-sales support and warranty?',
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Rozi Tib provides comprehensive after-sales support including 24/7 technical assistance, rapid spare parts supply, and extended warranties on all manufactured devices. We guarantee minimal downtime for all equipment delivered to healthcare facilities.'],
            ],
        ],
    ];

    $webpageSchema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'WebPage',
        'name'        => 'Rozi Tib - Medical Technologies',
        'description' => __('messages.hero_desc'),
        'url'         => url()->current(),
        'inLanguage'  => app()->getLocale(),
        'isPartOf'    => ['@type' => 'WebSite', 'url' => url('/')],
        'about'       => ['@type' => 'Organization', 'name' => 'Rozi Tib'],
        'breadcrumb'  => [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url()->current()],
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($webpageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>

@include('footer')




</body>
</html>