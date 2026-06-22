<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('اطلاعات اصلی')
                ->schema([
                    TextEntry::make('type')
                        ->label('نوع')
                        ->badge()
                        ->color(fn (string $state) => match ($state) {
                            'news'    => 'info',
                            'article' => 'warning',
                            default   => 'gray',
                        }),

                    TextEntry::make('title')->label('عنوان'),
                    TextEntry::make('slug')->label('Slug'),
                    TextEntry::make('is_published')->label('وضعیت')
                        ->badge()
                        ->color(fn (bool $state) => $state ? 'success' : 'gray')
                        ->formatStateUsing(fn (bool $state) => $state ? 'منتشر شده' : 'پیش‌نویس'),
                    TextEntry::make('published_at')->label('تاریخ انتشار')->dateTime(),
                ])->columns(2),

            Section::make('محتوا')
                ->schema([
                    TextEntry::make('excerpt')->label('خلاصه'),
                    TextEntry::make('content')->label('متن کامل')->html()->columnSpanFull(),
                ]),

            Section::make('تصویر')
                ->schema([
                    ImageEntry::make('cover_image')->label('کاور')->disk('public')->columnSpanFull(),
                ]),
        ]);
    }
}
