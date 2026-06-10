<?php

namespace App\Filament\Resources\Exhibitions\Pages;

use App\Filament\Resources\Exhibitions\ExhibitionResource;
use Filament\Resources\Pages\ViewRecord;

class ViewExhibition extends ViewRecord
{
    protected static string $resource = ExhibitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\EditAction::make(), // اگر این خط خطا داد، نسخه پایین را بگذار
        ];
    }
}
