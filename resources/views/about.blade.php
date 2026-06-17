<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.about_us') . ' - Razi Teb'])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')

<header class="relative overflow-hidden py-28 md:py-80 bg-cover bg-center md:bg-[center_top_-6rem]" style="background-image: url('{{ asset('images/headers/about-bg.webp') }}');">
    <div class="absolute inset-0 bg-brand-teal/60 z-0"></div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3 z-0">
         <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white drop-shadow-md">{{ __('messages.about_rozi_tib') }}</h1>
            <p class="text-teal-50 text-lg opacity-100 drop-shadow-sm">{{ __('messages.about_subtitle') }}</p>
        </div>
    </header>

    <div class="container mx-auto px-6 py-20 max-w-7xl flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                    {{ __('messages.who_we_are') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                    {!! __('messages.about_hero_title') !!}
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-6">
                    {{ __('messages.about_hero_desc') }}
                </p>
                <div class="h-1 w-20 bg-brand-teal rounded"></div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-brand-teal/30 transition-all duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-brand-teal/10 group-hover:bg-brand-teal group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center text-brand-teal mr-4 rtl:ml-4 rtl:mr-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">{{ __('messages.our_mission_title') }}</h3>
                    </div>
                    <p class="text-slate-600 leading-relaxed">{{ __('messages.our_mission_desc') }}</p>
                </div>

                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-brand-orange/30 transition-all duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-brand-orange/10 group-hover:bg-brand-orange group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center text-brand-orange mr-4 rtl:ml-4 rtl:mr-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">{{ __('messages.our_vision_title') }}</h3>
                    </div>
                    <p class="text-slate-600 leading-relaxed">{{ __('messages.our_vision_desc') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 py-20 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-16">
                <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                    {{ __('messages.our_story') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">
                    {!! __('messages.journey_title') !!}
                </h2>
            </div>

            <div class="relative border-l-4 border-brand-teal/20 rtl:border-l-0 rtl:border-r-4 ml-6 rtl:ml-0 rtl:mr-6 space-y-12 pb-4">
                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <div class="absolute w-6 h-6 bg-white border-4 border-brand-teal rounded-full -left-[15px] rtl:left-auto rtl:-right-[15px] top-1 group-hover:bg-brand-teal transition-colors duration-300"></div>
                    <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm group-hover:shadow-md group-hover:border-brand-teal/30 transition-all duration-300">
                        <span class="text-brand-orange font-bold text-2xl block mb-2">2022</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.timeline_2022_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ __('messages.timeline_2022_desc') }}</p>
                    </div>
                </div>

                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <div class="absolute w-6 h-6 bg-white border-4 border-brand-orange rounded-full -left-[15px] rtl:left-auto rtl:-right-[15px] top-1 group-hover:bg-brand-orange transition-colors duration-300"></div>
                    <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm group-hover:shadow-md group-hover:border-brand-orange/30 transition-all duration-300">
                        <span class="text-brand-teal font-bold text-2xl block mb-2">2024</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.timeline_2024_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ __('messages.timeline_2024_desc') }}</p>
                    </div>
                </div>

                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <div class="absolute w-8 h-8 bg-brand-teal border-4 border-white rounded-full -left-[19px] rtl:left-auto rtl:-right-[19px] top-0 shadow-md flex items-center justify-center">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    <div class="bg-gradient-to-br from-brand-teal/5 to-transparent p-8 rounded-2xl border border-brand-teal/20 shadow-sm group-hover:shadow-lg transition-all duration-300">
                        <span class="text-brand-orange font-bold text-2xl block mb-2">2026 & Beyond</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.timeline_2026_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ __('messages.timeline_2026_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-teal font-bold tracking-widest uppercase text-sm mb-3 block">
                    {{ __('messages.rd_and_manufacturing') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6 leading-tight">
                    {!! __('messages.rd_title') !!}
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed">{{ __('messages.rd_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-teal/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-brand-teal mb-6 border border-slate-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.hardware_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.hardware_desc') }}</p>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-orange/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-brand-orange mb-6 border border-slate-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.software_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.software_desc') }}</p>
                </div>

                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 mb-6 border border-slate-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.qc_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.qc_desc') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-900 py-24 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-full bg-gradient-to-b from-brand-teal/10 to-transparent opacity-50 blur-3xl pointer-events-none"></div>
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                    {!! __('messages.standards_title') !!}
                </h2>
                <p class="text-slate-400 text-lg leading-relaxed">{{ __('messages.standards_desc') }}</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-teal transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-teal/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-teal transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">IEC 60601-1</h4>
                    <p class="text-slate-500 text-sm">Medical Electrical Safety</p>
                </div>
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-teal transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-teal/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-teal transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">ISO 13485</h4>
                    <p class="text-slate-500 text-sm">Quality Management</p>
                </div>
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-orange transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-orange/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-orange transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">IMED Approved</h4>
                    <p class="text-slate-500 text-sm">National Health Certifications</p>
                </div>
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-orange transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-orange/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-orange transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">Global Export</h4>
                    <p class="text-slate-500 text-sm">International Ready</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 py-24 border-t border-slate-200">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                        {{ __('messages.our_commitment') }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                        {!! __('messages.support_title') !!}
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8">
                        {{ __('messages.support_desc') }}
                    </p>
                    <a href="{{ route('contact.show') }}" class="inline-flex items-center px-6 py-3 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded-xl transition-colors duration-300 shadow-lg shadow-brand-orange/30">
                        <svg class="w-5 h-5 mr-2 rtl:ml-2 rtl:mr-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        {{ __('messages.contact_support') }}
                    </a>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-teal/10 rounded-xl flex items-center justify-center text-brand-teal mr-5 rtl:ml-5 rtl:mr-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.warranty_title') }}</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.warranty_desc') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-teal/10 rounded-xl flex items-center justify-center text-brand-teal mr-5 rtl:ml-5 rtl:mr-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.parts_title') }}</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.parts_desc') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start bg-white p-6 rounded-2xl border border-brand-orange/30 shadow-sm shadow-brand-orange/5 hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-brand-orange rtl:left-auto rtl:right-0"></div>
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-orange/10 rounded-xl flex items-center justify-center text-brand-orange mr-5 rtl:ml-5 rtl:mr-0 z-10">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div class="z-10">
                            <h4 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.support_247_title') }}</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ __('messages.support_247_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-teal font-bold tracking-widest uppercase text-sm mb-3 block">
                    {{ __('messages.core_values') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6">
                    {!! __('messages.values_title') !!}
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed">{{ __('messages.values_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                <div class="text-center group">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-teal rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-teal group-hover:bg-brand-teal/5 transition-all duration-300 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-teal/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ __('messages.value_precision_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed px-4">{{ __('messages.value_precision_desc') }}</p>
                </div>

                <div class="text-center group mt-8 md:mt-0">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-orange rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-orange group-hover:bg-brand-orange/5 transition-all duration-300 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-orange/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ __('messages.value_innovation_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed px-4">{{ __('messages.value_innovation_desc') }}</p>
                </div>

                <div class="text-center group mt-8 md:mt-0">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-teal rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-teal group-hover:bg-brand-teal/5 transition-all duration-300 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-teal/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ __('messages.value_safety_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed px-4">{{ __('messages.value_safety_desc') }}</p>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

</body>
</html>
