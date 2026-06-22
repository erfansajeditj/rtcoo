<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Section::make('اطلاعات اصلی')
                ->schema([
                    Select::make('type')
                        ->label('نوع')
                        ->options(['news' => 'خبر (News)', 'article' => 'مقاله (Article)'])
                        ->required()
                        ->default('news'),

                    TextInput::make('title')
                        ->label('عنوان')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                            if ($operation !== 'create') {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        })
                        ->columnSpanFull(),

                    TextInput::make('slug')
                        ->label('Slug (آدرس URL)')
                        ->required()
                        ->unique(Post::class, 'slug', ignoreRecord: true)
                        ->maxLength(255)
                        ->helperText('به‌صورت خودکار از عنوان ساخته می‌شود'),
                ])->columns(2),

            Section::make('محتوا')
                ->schema([
                    TextInput::make('excerpt')
                        ->label('خلاصه (Excerpt)')
                        ->maxLength(500)
                        ->helperText('جمله کوتاهی که روی کارت نمایش داده می‌شود')
                        ->columnSpanFull(),

                    RichEditor::make('content')
                        ->label('متن کامل')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'h2', 'h3',
                            'bulletList', 'orderedList', 'link', 'blockquote', 'strike',
                        ])
                        ->columnSpanFull(),
                ]),

            Section::make('تصویر و انتشار')
                ->schema([
                    FileUpload::make('cover_image')
                        ->label('تصویر کاور')
                        ->image()
                        ->directory('posts')
                        ->preserveFilenames()
                        ->columnSpanFull(),

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
        ]);
    }
}
