<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
    
<head>
   @include('partials.head', ['title' => __('messages.contact') . ' - Razi Teb', 'description' => __('messages.contact_subtitle')])

   <style>
       .map-filter { filter: grayscale(100%); transition: filter 0.3s; }
       .map-filter:hover { filter: grayscale(0%); }
   </style>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">



   @include('partials.navbar')

  <header class="relative overflow-hidden py-28 md:py-80 bg-cover bg-center" style="background-image: url('{{ asset('images/headers/contact-bg.webp') }}');">
    <div class="absolute inset-0 z-0" style="background:linear-gradient(to bottom,rgba(0,0,0,.60),rgba(0,0,0,.50),rgba(0,0,0,.25));"></div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white" style="text-shadow:0 2px 20px rgba(0,0,0,.9);">{{ __('messages.get_in_touch') }}</h1>
            <p class="text-white text-lg max-w-xl mx-auto" style="opacity:.9;text-shadow:0 1px 10px rgba(0,0,0,.7);">{{ __('messages.contact_subtitle') }}</p>
        </div>
    </header>

    <div class="container mx-auto px-6 py-16 flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="space-y-10">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-2 h-2 bg-brand-orange rounded-full mr-2"></span>
                        {{ __('messages.connect_instantly') }}
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="https://wa.me/992931102730" target="_blank" class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-whatsapp/10 text-brand-whatsapp hover:bg-brand-whatsapp hover:text-white transition-all font-semibold group">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            {{ __('messages.whatsapp') }}
                        </a>
                        <a href="https://t.me/+992931102730" target="_blank" class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-telegram/10 text-brand-telegram hover:bg-brand-telegram hover:text-white transition-all font-semibold">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 11.944 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                            {{ __('messages.telegram') }}
                        </a>
                        <a href="https://linkedin.com/company/rozi-tib" target="_blank" class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-linkedin/10 text-brand-linkedin hover:bg-brand-linkedin hover:text-white transition-all font-semibold">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            {{ __('messages.linkedin') }}
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 pl-3 border-l-4 border-brand-teal">{{ __('messages.headquarters') }}</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center text-xl flex-shrink-0" aria-hidden="true">📍</div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ __('messages.address') }}</h4>
                                <p class="text-gray-600">{!! __('messages.address_text') !!}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center text-xl flex-shrink-0" aria-hidden="true">📞</div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ __('messages.phone') }}</h4>
                                <p class="text-gray-600 font-mono">+992 93 110 2730</p>
                                <p class="text-gray-600 font-mono">+98 910 397 5459</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center text-xl flex-shrink-0" aria-hidden="true">⏰</div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ __('messages.working_hours') }}</h4>
                                <p class="text-gray-600">{{ __('messages.working_hours_text_1') }}</p>
                                <p class="text-gray-600">{{ __('messages.working_hours_text_2') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.send_message') }}</h3>



@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-right">
        <ul class="list-disc pr-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif





<form action="{{ route('contact.store') }}" method="POST" class="space-y-5"
      x-data='{
          subject: "",
          selectedCategory: "",
          products: @json($allProducts ?? []),
          get filteredProducts() {
              return this.products.filter(p => p.category === this.selectedCategory);
          },
          get uniqueCategories() {
              return [...new Set(this.products.map(p => p.category))];
          }
      }'>
      
   
    @csrf

     <input type="text" name="website" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
    <input type="hidden" name="source" value="{{ old('source', $source ?? 'quote_contact') }}">


    <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.full_name') }}</label>
        <input type="text" id="full_name" name="full_name" required autocomplete="name"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-teal focus:border-transparent outline-none transition"
               placeholder="John Doe">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.email_address') }}</label>
        <input type="email" id="email" name="email" autocomplete="email"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-teal focus:border-transparent outline-none transition"
               placeholder="name@company.com">
    </div>

    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.phone_number') }}</label>
        <input type="tel" id="phone" name="phone" autocomplete="tel"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-teal outline-none bg-white transition"
               placeholder="+992 ...">
    </div>

    <div>
        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.subject') }}</label>
        <div class="relative">
            <select id="subject" name="subject" x-model="subject" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-teal focus:border-transparent outline-none transition appearance-none bg-white">
                <option value="" disabled selected>{{ __('messages.select_topic') }}</option>
                <option value="Product Inquiry">{{ __('messages.topic_product') }}</option>
                <option value="Technical Support">{{ __('messages.topic_support') }}</option>
                <option value="Partnership">{{ __('messages.topic_partnership') }}</option>
                <option value="Other">{{ __('messages.topic_other') }}</option>
                <option value="request_quote" class="font-medium text-brand-black">Request Quote</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 rtl:left-0 rtl:right-auto">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>

    <template x-if="subject === 'request_quote'">
        <div class="p-5 bg-orange-50 border border-orange-100 rounded-xl space-y-4 transition-all duration-300">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <select x-model="selectedCategory" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-brand-orange outline-none transition">
                    <option value="">Select Category...</option>
                    <template x-for="cat in uniqueCategories" :key="cat">
                        <option :value="cat" x-text="cat"></option>
                    </template>
                </select>
            </div>

            <template x-if="selectedCategory !== ''">
                <div class="pt-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Model </label>
                    <select name="product_id" required class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-brand-orange outline-none transition shadow-inner">
                        <option value="">Select Product...</option>
                        <template x-for="prod in filteredProducts" :key="prod.id">
                            <option :value="prod.id" x-text="prod.name"></option>
                        </template>
                    </select>
                </div>
            </template>
        </div>
    </template>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.message') }}</label>
        <textarea id="content" name="content" rows="4" required
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-brand-teal focus:border-transparent outline-none transition"
                  placeholder="{{ __('messages.message_placeholder') }}"></textarea>
    </div>

    <button type="submit" class="w-full bg-brand-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg hover:shadow-orange-500/30">
        {{ __('messages.btn_send_message') }}
    </button>
</form>




</div>
        </div>
    </div>

    <section class="h-56 sm:h-72 md:h-96 w-full relative bg-gray-200">
        <iframe src="https://maps.google.com/maps?q=Dushanbe,Tajikistan&t=&z=13&ie=UTF8&iwloc=&output=embed" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
            class="map-filter"></iframe>
            
        <div class="absolute bottom-8 left-8 bg-white p-4 rounded-xl shadow-lg hidden md:block">
             <p class="font-bold text-brand-teal">{{ __('messages.hq_title') }}</p>
             <p class="text-xs text-gray-500">{{ __('messages.hq_desc') }}</p>
        </div>
    </section>


     @include('footer')


</body>
</html>