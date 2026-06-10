<?php

namespace App\Filament\Resources\Exhibitions;

use App\Filament\Resources\Exhibitions\Pages\CreateExhibition;
use App\Filament\Resources\Exhibitions\Pages\EditExhibition;
use App\Filament\Resources\Exhibitions\Pages\ListExhibitions;
use App\Filament\Resources\Exhibitions\Pages\ViewExhibition;
use App\Filament\Resources\Exhibitions\Schemas\ExhibitionForm;
use App\Filament\Resources\Exhibitions\Schemas\ExhibitionInfolist;
use App\Filament\Resources\Exhibitions\Tables\ExhibitionsTable;
use App\Models\Exhibition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExhibitionResource extends Resource
{
    protected static ?string $model = Exhibition::class;

protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentText;

    public static function form(Schema $schema): Schema
    {
        return ExhibitionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExhibitionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExhibitionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExhibitions::route('/'),
            'create' => CreateExhibition::route('/create'),
            'view' => ViewExhibition::route('/{record}'),
            'edit' => EditExhibition::route('/{record}/edit'),
        ];
    }
}
