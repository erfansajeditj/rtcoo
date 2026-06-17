
<!-- بخش فوتر (پاورقی) -->
<!-- ========================================== -->
<footer class="bg-slate-900 text-white pt-16 pb-8 border-t-4 border-teal-600 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            
            <!-- درباره ما -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-orange-500">RaziTeb</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">
                    {{ __('messages.footer_about_desc') }}
                </p>
            </div>

            <!-- اطلاعات تماس -->
            <div>
                <h3 class="text-lg font-bold mb-6 text-white">{{ __('messages.contact_us') }}</h3>
                <ul class="space-y-4 text-slate-300 text-sm">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 text-teal-400 rtl:ml-3 rtl:mr-0 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ __('messages.address_text') }}</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-teal-400 rtl:ml-3 rtl:mr-0 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span dir="ltr">+992 93 110 2730</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-teal-400 rtl:ml-3 rtl:mr-0 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>info@RaziTeb.com</span>
                    </li>
                </ul>
            </div>

            <!-- لینک‌های سریع با آدرس‌های واقعی -->
            <div>
                <h3 class="text-lg font-bold mb-6 text-white">{{ __('messages.quick_links') }}</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ url('/') }}" class="text-slate-400 hover:text-orange-400 transition-colors flex items-center"><span class="mr-2 rtl:ml-2 rtl:mr-0 text-teal-500">›</span> {{ __('messages.home') }}</a></li>
                    <li><a href="{{ url('/products') }}" class="text-slate-400 hover:text-orange-400 transition-colors flex items-center"><span class="mr-2 rtl:ml-2 rtl:mr-0 text-teal-500">›</span> {{ __('messages.products') }}</a></li>
                    <li><a href="{{ url('/about') }}" class="text-slate-400 hover:text-orange-400 transition-colors flex items-center"><span class="mr-2 rtl:ml-2 rtl:mr-0 text-teal-500">›</span> {{ __('messages.about_us') }}</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-slate-400 hover:text-orange-400 transition-colors flex items-center"><span class="mr-2 rtl:ml-2 rtl:mr-0 text-teal-500">›</span> {{ __('messages.contact') }}</a></li>
                </ul>
            </div>

        </div>




     <!-- بخش پایین فوتر -->
        <!-- کلاس flex-row-reverse کلید حل این مشکله -->
        <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row-reverse justify-between items-center gap-4">
            
            <!-- شبکه‌های اجتماعی (این میره سمت راست تو حالت RTL) -->
            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                <!-- LinkedIn -->
                <a href="https://linkedin.com/company/rozi-tib" target="_blank" class="text-slate-400 hover:text-orange-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
                
                <!-- Telegram -->
                <a href="https://t.me/+992931102730" target="_blank" class="text-slate-400 hover:text-orange-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 11.944 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/992931102730" target="_blank" class="text-slate-400 hover:text-orange-500 transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </a>
            </div>

            <!-- کپی‌رایت (این میره سمت چپ تو حالت RTL) -->
            <p class="text-sm text-slate-500" dir="ltr">&copy; 2026 RaziTeb Medical Technologies. All rights reserved.</p>
            
        </div>


        </div>
    </div>


    @include('partials.chatbot')
</footer>


