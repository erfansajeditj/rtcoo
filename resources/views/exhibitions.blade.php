<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
   @include('partials.head', ['title' => __('messages.exhibitions') . ' - Razi Teb', 'description' => __('messages.exhibitions_subtitle')])

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   @include('partials.navbar')
<header class="relative overflow-hidden py-40 md:py-80 bg-cover bg-scroll md:bg-fixed bg-center md:bg-[center_top_2rem] -mb-px" style="background-image: url('{{ asset('images/headers/exhibitions-bg.webp') }}');">

<div class="absolute inset-0 z-0 bg-black/12"></div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white" style="text-shadow:0 2px 20px rgba(0,0,0,.9);">{{ __('messages.events_exhibitions') }}</h1>
        <p class="text-white text-lg" style="opacity:.9;text-shadow:0 1px 10px rgba(0,0,0,.7);">{{ __('messages.exhibitions_subtitle') }}</p>
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
    <div class="h-[220px] sm:h-[300px] md:h-[400px] lg:h-[500px] bg-gray-100 relative overflow-hidden z-10">
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
                {!! sanitize_html($exhibition->description) !!}
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

   

@if($exhibitions->isNotEmpty())
@php
    $eventSchemas = [];
    foreach ($exhibitions as $ex) {
        $eventStart = $ex->start_date ? \Carbon\Carbon::parse($ex->start_date)->toIso8601String() : null;
        $eventSchemas[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Event',
            'name'        => $ex->title,
            'description' => $ex->description ? strip_tags((string) $ex->description) : null,
            'startDate'   => $eventStart,
            'location'    => $ex->location ? [
                '@type' => 'Place',
                'name'  => $ex->location,
            ] : null,
            'organizer'   => [
                '@type' => 'Organization',
                'name'  => 'Razi Teb',
                'url'   => url('/'),
            ],
            'image'       => $ex->cover_image ? \Illuminate\Support\Facades\Storage::disk('public')->url($ex->cover_image) : asset('logo.png'),
            'url'         => url()->current(),
            'eventStatus' => $eventStart && \Carbon\Carbon::parse($eventStart)->isPast()
                ? 'https://schema.org/EventScheduled'
                : 'https://schema.org/EventScheduled',
        ];
    }
@endphp
@foreach($eventSchemas as $eventSchema)
<script type="application/ld+json">
{!! json_encode(array_filter($eventSchema), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endforeach
@endif

 @include('footer')

</body>
</html>