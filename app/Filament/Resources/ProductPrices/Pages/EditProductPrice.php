<?php

namespace App\Filament\Resources\ProductPrices\Pages;

use App\Filament\Resources\ProductPrices\ProductPriceResource;
use Filament\Resources\Pages\EditRecord;

class EditProductPrice extends EditRecord
{
    protected static string $resource = ProductPriceResource::class;
}
