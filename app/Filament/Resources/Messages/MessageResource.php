<?php

namespace App\Filament\Resources\Messages;

use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Message;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Repeater;
use BackedEnum;
use Filament\Support\Icons\Heroicon;


class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedDocumentText;
    
    protected static ?string $navigationLabel = 'Messages';



    // 👇 تغییر مهم: استفاده از Schema به جای Form
public static function form(Schema $schema): Schema
{
    return $schema->schema([
        TextInput::make('full_name')->label('نام و نام خانوادگی')->disabled(),
        TextInput::make('email')->label('ایمیل')->disabled(),
        TextInput::make('phone')->label('شماره تماس')->disabled(),
        TextInput::make('subject')->label('موضوع پیام')->disabled(),
        Textarea::make('content')
            ->label('متن پیام')
            ->columnSpanFull()
            ->disabled(),

        // بخش نمایش تاریخچه ایمیل‌های ارسالی
        Repeater::make('reply_history')
            ->label('تاریخچه پاسخ‌های شما')
            ->schema([
                TextInput::make('date')->label('تاریخ و ساعت')->disabled(),
                TextInput::make('subject')->label('موضوع ایمیل')->disabled(),
                Textarea::make('message')->label('متن پیام')->disabled(),
                FileUpload::make('attachment')
                    ->label('فایل ارسال شده')
                    ->disk('public')
                    ->disabled()
                    ->downloadable(),
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
                TextColumn::make('id')->sortable(),
                
                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable(),

                    TextColumn::make('content')
    ->label('Message') // برچسب ستون
    ->limit(50)        // فقط ۵۰ حرف اول را نشان بده که جدول شلوغ نشود
    ->searchable(),    // قابلیت سرچ در متن پیام
                
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope'),
                    
                TextColumn::make('phone'),

                \Filament\Tables\Columns\TextColumn::make('subject')
    ->label('Subject')
    ->sortable()
    ->searchable(),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Date')
                    ->sortable(),
            ])
            ->filters([
                //
            ])


            ->actions([
    // دکمه مشاهده پیام کاربر
    ViewAction::make()->label('مشاهده پیام'), 

    // دکمه ارسال ایمیل
    Action::make('reply')
        ->label('پاسخ (ایمیل)')
        ->icon('heroicon-o-paper-airplane')
        ->color('success')
        ->form([
            TextInput::make('subject')
                ->label('موضوع ایمیل')
                // به صورت خودکار عنوان پیام کاربر رو تو موضوع ایمیل میاره
                ->default(fn ($record) => 'پاسخ به پیام شما: ' . $record->subject) 
                ->required(),
                
            Textarea::make('message')
                ->label('متن پیام')
                ->placeholder('سلام، ممنون از تماس شما...')
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
            // منطق ارسال ایمیل
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

            // منطق ذخیره در تاریخچه
            $history = $record->reply_history ?? []; 
            $history[] = [
                'date' => now()->format('Y/m/d H:i'), 
                'subject' => $data['subject'],
                'message' => $data['message'],
                'attachment' => $data['attachment'] ?? null,
            ];
            $record->update(['reply_history' => $history]);
        })
        ->modalHeading('ارسال پاسخ به کاربر')
        ->modalSubmitActionLabel('ارسال ایمیل')
        ->successNotificationTitle('ایمیل و تاریخچه با موفقیت ثبت شد!'),
])




            ->bulkActions([
                // خالی شد
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}