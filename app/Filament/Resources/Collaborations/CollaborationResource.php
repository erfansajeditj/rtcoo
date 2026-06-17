<?php

namespace App\Filament\Resources\Collaborations;

use App\Filament\Resources\Collaborations\Pages\CreateCollaboration;
use App\Filament\Resources\Collaborations\Pages\EditCollaboration;
use App\Filament\Resources\Collaborations\Pages\ListCollaborations;
use App\Models\Collaboration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Repeater;

class CollaborationResource extends Resource
{
    protected static ?string $model = Collaboration::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('company_name')->label('نام شرکت')->disabled(),
            TextInput::make('country_city')->label('کشور / شهر')->disabled(),
            TextInput::make('contact_person')->label('نام شخص رابط')->disabled(),
            TextInput::make('phone')->label('شماره تماس')->disabled(),
            TextInput::make('email')->label('ایمیل')->disabled(),
            
            Textarea::make('proposal')
                ->label('متن درخواست همکاری')
                ->columnSpanFull()
                ->disabled(),

            Repeater::make('reply_history')
                ->label('تاریخچه پاسخ‌های شما (ایمیل‌های ارسال شده)')
                ->schema([
                    TextInput::make('date')->label('تاریخ و ساعت')->disabled(),
                    TextInput::make('subject')->label('موضوع ایمیل')->disabled(),
                    Textarea::make('message')->label('متن پیام')->disabled(),
                    
                    // ✅ این بخش اضافه شد تا فایل ارسالی رو نشون بده
                    FileUpload::make('attachment')
                        ->label('فایل ارسال شده')
                        ->disk('public')
                        ->disabled() // غیرفعال برای ویرایش
                        ->downloadable(), // قابلیت دانلود فایل از تو داشبورد
                ])
                ->addable(false)
                ->deletable(false)
                ->reorderable(false)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name')
                    ->label('نام شرکت')
                    ->searchable(),
                TextColumn::make('country_city')
                    ->label('کشور/شهر'),
                TextColumn::make('contact_person')
                    ->label('شخص رابط'),
                TextColumn::make('created_at')
                    ->label('تاریخ دریافت')
                    ->date('Y/m/d')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()->label('مشاهده پیام'), 

                Action::make('reply')
                    ->label('پاسخ (ایمیل)')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->form([
                        TextInput::make('subject')
                            ->label('موضوع ایمیل')
                            ->default('پاسخ به درخواست همکاری شما - Razi Teb')
                            ->required(),
                            
                        Textarea::make('message')
                            ->label('متن پیام')
                            ->placeholder('سلام، کاتالوگ محصولات به پیوست ارسال شد...')
                            ->required()
                            ->rows(5),
                            
                        FileUpload::make('attachment')
    ->label('فایل پیوست (کاتالوگ، پیش‌فاکتور و...)')
    ->disk('public')
    ->directory('emails/attachments')
    ->maxSize(51200) // <--- این خط اضافه شد (۵۰ مگابایت)
    ->preserveFilenames(),
                    ])
                    ->action(function ($record, array $data) {
                        
                        // ۱. ارسال ایمیل از طریق لاراول
                        Mail::raw($data['message'], function ($mail) use ($record, $data) {
                            $mail->to($record->email)
                                 ->subject($data['subject']);

                            if (!empty($data['attachment'])) {
                                $path = storage_path('app/public/' . $data['attachment']);
                                if (file_exists($path)) {
                                    $mail->attach($path);
                                }
                            }
                        });

                        // ۲. ذخیره تاریخچه
                        $history = $record->reply_history ?? []; 
                        
                        $history[] = [
                            'date' => now()->format('Y/m/d H:i'), 
                            'subject' => $data['subject'],
                            'message' => $data['message'],
                            'attachment' => $data['attachment'] ?? null, // ✅ فایل اینجا ذخیره می‌شه
                        ];
                        
                        $record->update(['reply_history' => $history]);
                    })
                    ->modalHeading('ارسال پاسخ به مشتری')
                    ->modalDescription('این پیام مستقیماً به ایمیل ثبت شده‌ی این شخص ارسال خواهد شد.')
                    ->modalSubmitActionLabel('ارسال ایمیل')
                    ->successNotificationTitle('ایمیل و تاریخچه با موفقیت ثبت شد!'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => ListCollaborations::route('/'),
            'create' => CreateCollaboration::route('/create'),
            'edit' => EditCollaboration::route('/{record}/edit'),
        ];
    }
}