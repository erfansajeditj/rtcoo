<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('تصویر')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('type')
                    ->label('نوع')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'news'    => 'info',
                        'article' => 'warning',
                        default   => 'gray',
                    })
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'news'    => 'News',
                        'article' => 'Article',
                        default   => $state,
                    }),

                TextColumn::make('title')
                    ->label('عنوان')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                IconColumn::make('is_published')
                    ->label('منتشر؟')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('تاریخ انتشار')
                    ->dateTime('Y/m/d')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('ایجاد شده')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('نوع')
                    ->options(['news' => 'News', 'article' => 'Article']),

                SelectFilter::make('is_published')
                    ->label('وضعیت')
                    ->options([1 => 'منتشر شده', 0 => 'پیش‌نویس']),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
