<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            // اطلاعات تک‌زبانه (نوع، انتشار)
            Section::make('اطلاعات اصلی')
                ->schema([
                    Select::make('type')
                        ->label('نوع')
                        ->options(['news' => 'خبر (News)', 'article' => 'مقاله (Article)'])
                        ->required()
                        ->default('news'),

                    Toggle::make('is_published')
                        ->label('منتشر شود؟')
                        ->default(false)
                        ->live()
                        ->afterStateUpdated(function ($state, Set $set) {
                            if ($state) {
                                $set('published_at', now());
                            }
                        }),

                    DateTimePicker::make('published_at')
                        ->label('تاریخ انتشار')
                        ->native(false)
                        ->displayFormat('Y/m/d H:i'),
                ])->columns(2),

            // محتوای چندزبانه (عنوان، اسلاگ، خلاصه، متن) — مثل فرم محصولات
            Section::make('محتوای چندزبانه (Translations)')
                ->schema([
                    Tabs::make('Languages')
                        ->tabs([
                            // 🇺🇸 English
                            Tab::make('🇺🇸 English')
                                ->schema([
                                    TextInput::make('title.en')
                                        ->label('Title')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                            if ($operation === 'create') {
                                                $set('slug.en', Str::slug((string) $state));
                                            }
                                        })
                                        ->columnSpanFull(),
                                    TextInput::make('slug.en')
                                        ->label('Slug / URL')
                                        ->required()
                                        ->maxLength(255)
                                        ->helperText('Auto-generated from the title'),
                                    Textarea::make('excerpt.en')
                                        ->label('Excerpt')
                                        ->maxLength(500)
                                        ->rows(2)
                                        ->columnSpanFull(),
                                    RichEditor::make('content.en')
                                        ->label('Content')
                                        ->toolbarButtons([
                                            'bold', 'italic', 'underline', 'h2', 'h3',
                                            'bulletList', 'orderedList', 'link', 'blockquote', 'strike',
                                        ])
                                        ->columnSpanFull(),
                                ]),

                            // 🇹🇯 Тоҷикӣ
                            Tab::make('🇹🇯 Тоҷикӣ')
                                ->schema([
                                    TextInput::make('title.tg')
                                        ->label('Сарлавҳа')
                                        ->maxLength(255)
                                        ->columnSpanFull(),
                                    TextInput::make('slug.tg')
                                        ->label('Slug (Тоҷикӣ)')
                                        ->maxLength(255),
                                    Textarea::make('excerpt.tg')
                                        ->label('Шарҳи кӯтоҳ')
                                        ->maxLength(500)
                                        ->rows(2)
                                        ->columnSpanFull(),
                                    RichEditor::make('content.tg')
                                        ->label('Матни пурра')
                                        ->toolbarButtons([
                                            'bold', 'italic', 'underline', 'h2', 'h3',
                                            'bulletList', 'orderedList', 'link', 'blockquote', 'strike',
                                        ])
                                        ->columnSpanFull(),
                                ]),

                            // 🇷🇺 Русский
                            Tab::make('🇷🇺 Русский')
                                ->schema([
                                    TextInput::make('title.ru')
                                        ->label('Заголовок')
                                        ->maxLength(255)
                                        ->columnSpanFull(),
                                    TextInput::make('slug.ru')
                                        ->label('Slug (Русский)')
                                        ->maxLength(255),
                                    Textarea::make('excerpt.ru')
                                        ->label('Краткое описание')
                                        ->maxLength(500)
                                        ->rows(2)
                                        ->columnSpanFull(),
                                    RichEditor::make('content.ru')
                                        ->label('Полный текст')
                                        ->toolbarButtons([
                                            'bold', 'italic', 'underline', 'h2', 'h3',
                                            'bulletList', 'orderedList', 'link', 'blockquote', 'strike',
                                        ])
                                        ->columnSpanFull(),
                                ]),
                        ]),
                ])->columnSpanFull(),

            Section::make('تصویر کاور')
                ->schema([
                    FileUpload::make('cover_image')
                        ->label('تصویر کاور')
                        ->image()
                        ->directory('posts')
                        ->preserveFilenames()
                        ->columnSpanFull(),
                ]),
        ]);
    }
}
