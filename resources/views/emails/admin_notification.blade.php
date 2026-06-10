<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background-color: #f4f4f5; padding: 20px; }
        .box { background-color: #ffffff; padding: 30px; border-radius: 10px; max-width: 600px; margin: 0 auto; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .header { border-bottom: 2px solid #0d9488; padding-bottom: 10px; margin-bottom: 20px; color: #115e59; font-size: 20px; font-weight: bold; }
        .item { margin-bottom: 15px; font-size: 15px; }
        .label { font-weight: bold; color: #64748b; }
        .value { color: #1e293b; margin-top: 5px; display: block; background: #f8fafc; padding: 10px; border-radius: 5px; border: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">📩 یک پیام جدید در سایت Rozi Tib ثبت شد!</div>
        
<div class="item"><span class="label">نام فرستنده:</span> <span class="value">{{ $msg->full_name }}</span></div>        <div class="item"><span class="label">ایمیل:</span> <span class="value">{{ $msg->email }}</span></div>
        <div class="item"><span class="label">شماره تماس:</span> <span class="value">{{ $msg->phone ?? 'ثبت نشده' }}</span></div>
        <div class="item"><span class="label">موضوع:</span> <span class="value">{{ $msg->subject }}</span></div>
<div class="item"><span class="label">متن پیام:</span> <span class="value">{!! nl2br(e($msg->content)) !!}</span></div>        
        <p style="margin-top: 30px; font-size: 12px; color: #94a3b8; text-align: center;">
            برای پاسخ به این پیام، وارد پنل مدیریت (بخش Messages) شوید.
        </p>
    </div>
</body>
</html>