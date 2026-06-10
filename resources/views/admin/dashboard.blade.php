<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Dashboard | RoziTib</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* استایل برای اسکرول‌بار اختصاصی جدول */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>

<body class="bg-gray-50 p-8 font-sans">

    <div class="max-w-7xl mx-auto">
        
        <header class="mb-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">داشبورد مارکتینگ تجهیزات پزشکی</h1>
                <p class="text-gray-500">گزارش لحظه‌ای از رفتار مشتریان و سرنخ‌های فروش (B2B)</p>
            </div>
            
            <div class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 text-center min-w-[200px]">
                <p class="text-sm text-gray-500 font-semibold mb-1">نرخ تعامل کل سایت</p>
                <p class="text-2xl font-black text-brand-teal text-teal-600">{{ $engagementRate }}%</p>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col">
                <h3 class="text-lg font-bold text-gray-700 mb-4">قیف تبدیل سرنخ (Sales Funnel)</h3>
                <div class="relative w-full h-64 flex-grow">
                    <canvas id="funnelChart"></canvas>
                </div>


            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-700 mb-4">مشتریان با پتانسیل بالا (۴۸ ساعت گذشته)</h3>
                <div class="overflow-y-auto max-h-64 pr-2 custom-scrollbar">
                    @forelse($highIntentUsers as $user)
                        <div class="mb-3 p-3 bg-orange-50 border border-orange-100 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="text-sm font-bold text-gray-800">{{ $user->product->name ?? 'محصول ناشناس' }}</p>
                                <p class="text-xs text-gray-500">آی‌پی هش شده: {{ substr($user->ip_hash, 0, 10) }}...</p>
                            </div>
                            <span class="bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-md">
                                {{ $user->actions_count }} تعامل
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm text-center py-4">فعلاً مشتری به شدت پیگیری یافت نشد.</p>
                    @endforelse
                </div>
            </div>
            
        </div>

        <div class="bg-white p-0 rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col mb-10">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">🏆 رتبه‌بندی جامع و عملکرد محصولات (Product Performance)</h3>
                <span class="text-xs font-semibold text-gray-500 bg-white px-3 py-1 rounded-full border border-gray-200 shadow-sm">
                    مجموع: {{ $allProductStats->count() }} دستگاه
                </span>
            </div>
            
            <div class="overflow-x-auto max-h-[500px] custom-scrollbar">
                <table class="w-full text-left border-collapse relative min-w-[800px]">
                    <thead class="sticky top-0 bg-white shadow-sm z-10">
                        <tr class="text-gray-500 text-sm border-b border-gray-100">
                            <th class="py-4 px-6 font-semibold text-center w-16">رتبه</th>
                            <th class="py-4 px-6 font-semibold text-right">نام دستگاه و دسته‌بندی</th>
                            <th class="py-4 px-6 font-semibold text-center">تعداد کلیک (View)</th>
                            <th class="py-4 px-6 font-semibold text-center">دانلود کاتالوگ</th>
                            <th class="py-4 px-6 font-semibold text-center text-orange-600">درخواست فاکتور</th>
                            <th class="py-4 px-6 font-semibold text-center">نرخ تبدیل</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-gray-700">
                        @forelse($allProductStats as $item)
                            
                            @php
                                $totalActions = $item->downloads_count + $item->quotes_count;
                                $conversionRate = $item->views_count > 0 ? round(($totalActions / $item->views_count) * 100, 1) : 0;
                            @endphp

                            <tr class="hover:bg-teal-50/30 transition-colors group">
                                <td class="py-4 px-6 text-center font-bold">
                                    @if($loop->iteration == 1) <span class="text-2xl" title="رتبه اول">🥇</span>
                                    @elseif($loop->iteration == 2) <span class="text-2xl" title="رتبه دوم">🥈</span>
                                    @elseif($loop->iteration == 3) <span class="text-2xl" title="رتبه سوم">🥉</span>
                                    @else <span class="text-gray-400">{{ $loop->iteration }}</span>
                                    @endif
                                </td>
                                
                                <td class="py-4 px-6 text-right">
                                    <p class="font-bold text-gray-900 mb-1 group-hover:text-teal-600 transition-colors">{{ $item->name }}</p>
                                    <span class="text-xs text-gray-500">{{ $item->category }}</span>
                                </td>
                                
                                <td class="py-4 px-6 text-center font-semibold text-gray-700">
                                    {{ $item->views_count }}
                                </td>
                                
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm font-medium">
                                        {{ $item->downloads_count }}
                                    </span>
                                </td>
                                
                                <td class="py-4 px-6 text-center">
            <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-md text-sm font-bold shadow-sm block mb-1">
                مجموع: {{ $item->quotes_count }}
            </span>
            
            @if($item->quotes_count > 0)
            <div class="text-[10.5px] flex justify-center gap-2 mt-1.5 font-bold">
                <span title="مستقیم از صفحه محصول اومده" class="text-teal-600">محصول: {{ $item->quote_product_count }}</span> 
                <span class="text-gray-300">|</span> 
                <span title="مستقیم تو صفحه تماس پر کرده" class="text-blue-600">تماس: {{ $item->quote_contact_count }}</span>
            </div>
            @endif
        </td>

                                <td class="py-4 px-6 text-center">
                                    @if($conversionRate > 15)
                                        <span class="text-green-600 font-bold bg-green-50 px-2 py-1 rounded border border-green-200">{{ $conversionRate }}% 🚀</span>
                                    @elseif($conversionRate > 0)
                                        <span class="text-teal-600 font-semibold">{{ $conversionRate }}%</span>
                                    @else
                                        <span class="text-gray-400 text-sm">0%</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-400">محصولی در دیتابیس یافت نشد.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        const funnelRawData = @json($funnelData);
        
        const viewCount = funnelRawData['view'] || 0;
        const downloadCount = funnelRawData['download'] || 0;
        const quoteCount = funnelRawData['quote'] || 0;

        const ctxFunnel = document.getElementById('funnelChart').getContext('2d');
        new Chart(ctxFunnel, {
            type: 'bar',
            data: {
                labels: ['بازدید کل', 'دانلود کاتالوگ', 'درخواست فاکتور'],
                datasets: [{
                    label: 'تعداد اکشن‌ها',
                    data: [viewCount, downloadCount, quoteCount],
                    backgroundColor: [
                        'rgba(156, 163, 175, 0.6)', 
                        'rgba(13, 148, 136, 0.7)',  
                        'rgba(249, 115, 22, 0.8)'   
                    ],
                    borderColor: [
                        'rgb(156, 163, 175)',
                        'rgb(13, 148, 136)',
                        'rgb(249, 115, 22)'
                    ],
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // برای اینکه تو ارتفاع 200px قشنگ جا بشه
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>