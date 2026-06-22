<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.collaboration') . ' - Razi Teb', 'description' => __('messages.collab_subtitle')])

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    @include('partials.navbar')

<header class="relative overflow-hidden py-28 md:py-80 bg-cover bg-center md:bg-[center_top_-2rem]" style="background-image: url('{{ asset('images/headers/collabration-bg.webp') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/55 to-black/30 z-0"></div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white [text-shadow:0_2px_20px_rgba(0,0,0,0.9)]">{{ __('messages.partner_with_us') }}</h1>
        <p class="text-white/85 text-lg max-w-2xl mx-auto [text-shadow:0_1px_10px_rgba(0,0,0,0.7)]">{{ __('messages.collab_subtitle') }}</p>
        </div>
    </header>

    <div class="container mx-auto px-6 py-16 flex-grow">
        
        <div class="grid md:grid-cols-3 gap-8 mb-20 text-center">
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-brand-orange transition group">
                <div class="w-16 h-16 bg-orange-100 text-brand-orange rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">💎</div>
                <h3 class="text-xl font-bold mb-2">{{ __('messages.premium_quality') }}</h3>
                <p class="text-gray-500 text-sm">{{ __('messages.premium_quality_desc') }}</p>
            </div>
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-brand-teal transition group">
                <div class="w-16 h-16 bg-teal-100 text-brand-teal rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">📈</div>
                <h3 class="text-xl font-bold mb-2">{{ __('messages.high_profit_margin') }}</h3>
                <p class="text-gray-500 text-sm">{{ __('messages.high_profit_margin_desc') }}</p>
            </div>
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-blue-500 transition group">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">🎓</div>
                <h3 class="text-xl font-bold mb-2">{{ __('messages.training_support') }}</h3>
                <p class="text-gray-500 text-sm">{{ __('messages.training_support_desc') }}</p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            <div class="bg-gray-900 text-white p-10 md:w-1/3 flex flex-col justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                <h3 class="text-2xl font-bold mb-4 relative z-10">{{ __('messages.become_distributor') }}</h3>
                <p class="text-gray-300 text-sm mb-8 relative z-10">{{ __('messages.distributor_desc') }}</p>
                <ul class="space-y-3 text-sm relative z-10">
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> {{ __('messages.exclusive_territories') }}</li>
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> {{ __('messages.marketing_support') }}</li>
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> {{ __('messages.tech_assist') }}</li>
                </ul>
            </div>

            <div class="p-10 md:w-2/3">


            
               <form action="{{ route('collaboration.store') }}" method="POST" class="w-full">
    
    @csrf

    @if(session('success'))
        <div class="mb-6 bg-teal-50 border border-teal-200 text-teal-800 px-4 py-3 rounded-xl font-medium">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        
        <div>
            <label class="block text-sm text-gray-600 mb-2">{{ __('messages.company_name') }}</label>
            <input type="text" name="company_name" placeholder="MediCorp Ltd." required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">{{ __('messages.country_city') }}</label>
            <input type="text" name="country_city" placeholder="Dushanbe" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">{{ __('messages.contact_person') }}</label>
            <input type="text" name="contact_person" placeholder="Full Name" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">{{ __('messages.phone_number') }}</label>
            <input type="text" name="phone" placeholder="+992..." required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>
        
    </div>

    <div class="mb-6">
        <label class="block text-sm text-gray-600 mb-2">{{ __('messages.email_address') }}</label>
        <input type="email" name="email" placeholder="partner@company.com" required
               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
    </div>

    <div class="mb-8">
        <label class="block text-sm text-gray-600 mb-2">{{ __('messages.business_proposal') }}</label>
        <textarea name="proposal" rows="4" placeholder="{{ __('messages.proposal_placeholder') }}" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all resize-none"></textarea>
    </div>

    <button type="submit"
            class="w-full bg-brand-teal hover:bg-brand-dark text-white font-bold py-4 rounded-xl transition-colors duration-300 shadow-lg shadow-brand-teal/30">
        {{ __('messages.submit_application') }}
    </button>
    
</form>
            </div>
        </div>

    </div>

   
     @include('footer')

</body>
</html>