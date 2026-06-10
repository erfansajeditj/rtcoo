<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.exhibitions') . ' - Rozi Tib', 'description' => __('messages.exhibitions_subtitle')])

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')

<header class="relative overflow-hidden py-80 bg-cover bg-[center_top_-5rem]" style="background-image: url('{{ asset('images/headers/exhibitions-bg.webp') }}');">
    <div class="absolute inset-0 bg-brand-teal/60 z-0"></div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3 z-0">
         <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
            <h1 class="text-6xl md:text-7xl font-bold mb-5 text-white drop-shadow-md">{{ __('messages.events_exhibitions') }}</h1>
            <p class="text-teal-100 text-lg">{{ __('messages.exhibitions_subtitle') }}</p>
        </div>
    </header>

    <div class="container mx-auto px-6 py-16 flex-grow">
        <div class="max-w-4xl mx-auto">

            @php
                use App\Models\Exhibition;
                use Illuminate\Support\Facades\Storage;
                use Carbon\Carbon;

                // ✅ اگر route چیزی پاس نداد، خودمان از دیتابیس می‌گیریم
                $exhibitions = $exhibitions ?? Exhibition::query()
                    ->orderByRaw('start_date IS NULL')
                    ->orderBy('start_date', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->get();
            @endphp

            @if($exhibitions->isEmpty())
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-10 text-center">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.no_exhibitions_yet') }}</h2>
                    <p class="text-gray-600">{{ __('messages.add_exhibitions_admin') }}</p>
                </div>
            @else

                @foreach($exhibitions as $exhibition)
                    @php
                        $date = $exhibition->start_date ? Carbon::parse($exhibition->start_date) : null;
                        $year = $date ? $date->format('Y') : ($exhibition->created_at?->format('Y') ?? '');
                        $monthDay = $date ? $date->format('M d') : '';
                        $imageUrl = $exhibition->cover_image ? Storage::disk('public')->url($exhibition->cover_image) : null;
                    @endphp

                    <div class="flex flex-col md:flex-row gap-8 mb-16 relative group">
                        <div class="hidden md:block absolute left-[148px] top-0 bottom-0 w-0.5 bg-gray-200 -z-10"></div>

                        <div class="flex md:flex-col items-center md:items-end md:w-32 flex-shrink-0 gap-2">
                            <span class="text-2xl font-bold text-brand-orange">{{ $year }}</span>
                            @if($monthDay)
                                <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ $monthDay }}</span>
                            @endif
                        </div>



                       <div x-data="{ mainImage: '{{ $imageUrl }}' }" class="flex-grow bg-white rounded-3xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] border-t-4 border-brand-orange overflow-hidden hover:shadow-[0_20px_50px_-15px_rgba(13,148,136,0.2)] transition-all duration-300 relative group">

    <div class="absolute top-0 right-0 w-64 h-64 bg-brand-teal/10 blur-3xl rounded-full -mr-32 -mt-32 pointer-events-none group-hover:bg-brand-teal/20 transition-all"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-brand-orange/10 blur-3xl rounded-full -ml-32 -mb-20 pointer-events-none group-hover:bg-brand-orange/20 transition-all"></div>
    
    @if($imageUrl)
    <div class="h-[400px] md:h-[500px] bg-gray-100 relative overflow-hidden z-10"> 
         <img :src="mainImage" alt="{{ $exhibition->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
         <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </div>
    @endif

    <div class="p-8 relative z-10">
        <div class="flex items-center mb-4">
            <span class="block w-1.5 h-8 bg-brand-orange rounded-full mr-3"></span>
            <h3 class="text-2xl font-bold text-brand-dark tracking-tight">{{ $exhibition->title }}</h3>
        </div>

        <div class="flex flex-wrap items-center text-sm font-medium gap-3 mb-6">
            @if($exhibition->location)
                <span class="flex items-center gap-1.5 bg-teal-50 text-teal-800 px-4 py-1.5 rounded-full border border-teal-100 shadow-sm">
                    📍 {{ $exhibition->location }}
                </span>
            @endif
            @if($date)
                <span class="flex items-center gap-1.5 bg-orange-50 text-orange-800 px-4 py-1.5 rounded-full border border-orange-100 shadow-sm">
                    🗓️ {{ $date->format('M d, Y') }}
                </span>
            @endif
        </div>

        @if($exhibition->description)
            <div class="text-gray-600 mb-6 text-base leading-relaxed prose prose-teal max-w-none">
                {!! $exhibition->description !!}
            </div>
        @endif

        @if(is_array($exhibition->gallery) && count($exhibition->gallery) > 0)
        <div class="mt-4 pt-6 border-t border-gray-100/50">
            <h4 class="text-base font-bold text-brand-dark mb-4 flex items-center gap-2">
               
            </h4>
            
            <div class="flex gap-3 overflow-x-auto pb-2 no-scrollbar p-1">
                
                @if($imageUrl)
                <button @click="mainImage = '{{ $imageUrl }}'" 
                        class="flex-shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden border-[3px] transition-all duration-300 relative"
                        :class="mainImage === '{{ $imageUrl }}' ? 'border-brand-orange shadow-md scale-[1.02]' : 'border-transparent opacity-80 hover:opacity-100 hover:border-brand-teal/50'">
                    <img src="{{ $imageUrl }}" class="w-full h-full object-cover">
                </button>
                @endif

                @foreach($exhibition->gallery as $image)
                    <button @click="mainImage = '{{ asset('storage/' . $image) }}'" 
                            class="flex-shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden border-[3px] transition-all duration-300 relative"
                            :class="mainImage === '{{ asset('storage/' . $image) }}' ? 'border-brand-orange shadow-md scale-[1.02]' : 'border-transparent opacity-80 hover:opacity-100 hover:border-brand-teal/50'">
                        <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover">
                    </button>
                @endforeach

            </div>
        </div>
        @endif

    </div>
</div>




                    </div>
                @endforeach

            @endif

        </div>
    </div>

   

 @include('footer')

</body>
</html>