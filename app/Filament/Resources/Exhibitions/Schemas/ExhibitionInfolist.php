<?php

namespace App\Filament\Resources\Exhibitions\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section; // <--- این همون تغییر طلاییه که آدرسش درست شد

class ExhibitionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('جزئیات نمایشگاه')
                ->columns(2)
                ->components([
                    ImageEntry::make('cover_image')
                        ->label('عکس کاور')
                        ->columnSpanFull(),

                    TextEntry::make('title')
                        ->label('عنوان')
                        ->columnSpanFull(),

                    TextEntry::make('start_date')
                        ->label('تاریخ برگزاری')
                        ->date('Y/m/d'),

                    TextEntry::make('location')
                        ->label('مکان'),

                    TextEntry::make('description')
                        ->label('توضیحات')
                        ->html() // چون تو فرم از RichEditor استفاده کردیم، اینجا باید html بخونه
                        ->columnSpanFull(),

                    TextEntry::make('created_at')
                        ->label('تاریخ ثبت')
                        ->since(),

                    TextEntry::make('updated_at')
                        ->label('آخرین ویرایش')
                        ->since(),
                ]),
        ]);
    }
}