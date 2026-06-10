<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class QuoteRequestsStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalQuotes = Message::where('subject', 'request_quote')->count();

        $thisMonth = Message::where('subject', 'request_quote')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $thisWeek = Message::where('subject', 'request_quote')
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])
            ->count();

        $today = Message::where('subject', 'request_quote')
            ->whereDate('created_at', Carbon::today())
            ->count();

        return [
            Stat::make('امروز', $today)
                ->description('درخواست‌های امروز')
                ->color('success')
                ->icon('heroicon-o-clock'),

            Stat::make('این هفته', $thisWeek)
                ->description('درخواست‌های هفته جاری')
                ->color('info')
                ->icon('heroicon-o-calendar-days'),

            Stat::make('این ماه', $thisMonth)
                ->description('درخواست‌های ماه جاری')
                ->color('warning')
                ->icon('heroicon-o-chart-bar'),

            Stat::make('کل درخواست‌ها', $totalQuotes)
                ->description('از ابتدا تا الان')
                ->color('primary')
                ->icon('heroicon-o-document-text'),
        ];
    }
}