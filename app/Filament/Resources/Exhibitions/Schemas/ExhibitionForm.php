<?php

namespace App\Filament\Resources\Exhibitions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section; // <--- تغییر طلایی دقیقاً اینجاست!

class ExhibitionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('اطلاعات اصلی نمایشگاه')
                ->schema([
                    TextInput::make('title')
                        ->label('عنوان نمایشگاه')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),

                    TextInput::make('location')
                        ->label('محل برگزاری (شهر/کشور)')
                        ->maxLength(255),

                    DatePicker::make('start_date')
                        ->label('تاریخ برگزاری')
                        ->native(false)
                        ->displayFormat('Y/m/d'),
                ])->columns(2),

            Section::make('محتوا و تصاویر')
                ->schema([
                    FileUpload::make('cover_image')
                        ->label('پوستر یا عکس کاور نمایشگاه')
                        ->image()
                        ->disk('public')
                        ->directory('exhibitions')
                        ->preserveFilenames()
                        // فشرده‌سازی خودکار: حداکثر ضلع ۱۹۲۰px، بدون بزرگ‌کردن، با حفظ نسبت تصویر
                        ->imageResizeMode('contain')
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('1920')
                        ->imageResizeUpscale(false)
                        ->columnSpanFull(),

                        FileUpload::make('gallery')
    ->label('گالری تصاویر نمایشگاه (چند عکس)')
    ->image()
    ->disk('public')
    ->multiple() // <--- این کلمه جادویی باعث می‌شه بتونی چند تا عکس انتخاب کنی!
    ->directory('exhibitions/gallery')
    ->preserveFilenames()
    ->reorderable() // این امکان رو می‌ده که با موس جای عکس‌ها رو بالا پایین کنی و ترتیبشون رو عوض کنی
    // فشرده‌سازی خودکار: حداکثر ضلع ۱۹۲۰px، بدون بزرگ‌کردن، با حفظ نسبت تصویر
    ->imageResizeMode('contain')
    ->imageResizeTargetWidth('1920')
    ->imageResizeTargetHeight('1920')
    ->imageResizeUpscale(false)
    ->columnSpanFull(),
    

                    RichEditor::make('description')
                        ->label('توضیحات و گزارش نمایشگاه')
                        ->toolbarButtons([
                            'bold', 'italic', 'h2', 'h3', 'bulletList', 'orderedList', 'link'
                        ])
                        ->columnSpanFull(),
                ]),
        ]);
    }
}