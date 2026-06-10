<?php

namespace App\Filament\Resources\ProductPrices;

use App\Filament\Resources\ProductPrices\Pages\CreateProductPrice;
use App\Filament\Resources\ProductPrices\Pages\EditProductPrice;
use App\Filament\Resources\ProductPrices\Pages\ListProductPrices;
use App\Models\Product;
use App\Models\ProductPrice;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ProductPriceResource extends Resource
{
    protected static ?string $model = ProductPrice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;

    protected static ?string $navigationLabel = 'Product Prices';

    protected static ?string $modelLabel = 'Product Price';

    protected static ?string $pluralModelLabel = 'Product Prices';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Price Details')
                ->schema([
                    Select::make('product_id')
                        ->label('Product')
                        ->options(fn () => Product::query()->orderBy('name')->pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    TextInput::make('region')
                        ->helperText('Example: Tajikistan, UAE, Global')
                        ->nullable(),

                    TextInput::make('currency')
                        ->default('USD')
                        ->required(),

                    TextInput::make('price_from')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('price_to')
                        ->numeric()
                        ->nullable(),

                    TextInput::make('incoterms')
                        ->helperText('EXW / FOB / CIF ...')
                        ->nullable(),

                    Toggle::make('is_public')
                        ->label('Public (chat can show price)')
                        ->default(false),

                    Textarea::make('note')
                        ->rows(3)
                        ->columnSpanFull()
                        ->nullable(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')->label('Product')->searchable(),

                TextColumn::make('region')->badge()->toggleable(),

                TextColumn::make('currency')->sortable(),

                TextColumn::make('price_from')->label('From')->sortable(),
                TextColumn::make('price_to')->label('To')->sortable(),

                TextColumn::make('incoterms')->toggleable(),

                IconColumn::make('is_public')->boolean()->label('Public'),

                TextColumn::make('updated_at')->since()->label('Updated')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductPrices::route('/'),
            'create' => CreateProductPrice::route('/create'),
            'edit' => EditProductPrice::route('/{record}/edit'),
        ];
    }
}
