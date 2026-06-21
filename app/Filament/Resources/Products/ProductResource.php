<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

   public static function form(Schema $schema): Schema
    {
        return $schema->components([
            
            // بخش ۱: اطلاعات عمومی (عکس‌ها و فایل‌ها)
            Section::make('General Information')
                ->schema([
                    TextInput::make('youtube_video_id')
                        ->label('شناسه ویدیوی یوتیوب (اختیاری)')
                        ->helperText('مثال: ABCDEFG1234')
                        ->maxLength(255),

                    FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->directory('products')
                        ->maxSize(20480),

                    FileUpload::make('gallery')
                        ->label('گالری تصاویر')
                        ->directory('products/gallery')
                        ->multiple()
                        ->reorderable()
                        ->panelLayout('grid'),

                    FileUpload::make('catalog_file')
                        ->label('فایل کاتالوگ')
                        ->directory('catalogs')
                        ->acceptedFileTypes(['application/pdf'])
                        ->downloadable()
                        ->preserveFilenames(),

                    // specs از اینجا برداشته شد رفت تو تب‌ها 👇

                    Toggle::make('is_active')
                        ->default(true),
                ])->columns(2),

            // بخش ۲: فرم‌های چندزبانه
            Section::make('Translations (چندزبانه)')
                ->schema([
                    Tabs::make('Languages')
                        ->tabs([
                            // تب انگلیسی
                            Tab::make('🇺🇸 English')
                                ->schema([
                                    TextInput::make('name.en')->label('Product Name')->required(),
                                    TextInput::make('category.en')->label('Category')->required(),
                                    TextInput::make('slug.en')->label('Slug / URL')->required(),
                                    Textarea::make('description.en')->label('Description')->rows(3),
                                    Textarea::make('specs.en')
                                        ->label('Technical Specifications')
                                        ->rows(4)
                                        ->columnSpanFull(),
                                ]),
                            
                            // تب تاجیکی
                            Tab::make('🇹🇯 Тоҷикӣ')
                                ->schema([
                                    TextInput::make('name.tg')->label('Номи Маҳсулот')->required(),
                                    TextInput::make('category.tg')->label('Категория')->required(),
                                    TextInput::make('slug.tg')->label('Slug (Тоҷикӣ)')->required(),
                                    Textarea::make('description.tg')->label('Тавсиф')->rows(3),
                                    Textarea::make('specs.tg')
                                        ->label('Хусусиятҳои техникӣ (Specs)')
                                        ->rows(4)
                                        ->columnSpanFull(),
                                ]),
                                
                            // تب روسی
                            Tab::make('🇷🇺 Русский')
                                ->schema([
                                    TextInput::make('name.ru')->label('Название продукта')->required(),
                                    TextInput::make('category.ru')->label('Категория')->required(),
                                    TextInput::make('slug.ru')->label('Slug (Русский)')->required(),
                                    Textarea::make('description.ru')->label('Описание')->rows(3),
                                    Textarea::make('specs.ru')
                                        ->label('Технические характеристики (Specs)')
                                        ->rows(4)
                                        ->columnSpanFull(),
                                ]),
                        ])
                ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                // پکیج Spatie خودش اتوماتیک تو جدول اسم رو به زبان فعال نشون می‌ده
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('category')->badge(),
                \Filament\Tables\Columns\IconColumn::make('is_active')->boolean(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}