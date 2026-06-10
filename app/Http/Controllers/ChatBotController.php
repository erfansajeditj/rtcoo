<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function sendMessage(Request $request)
    {
        // شماره واتس‌اپ شرکت
        $whatsAppNumber = "992931102730"; 
        $whatsAppLink = "https://wa.me/{$whatsAppNumber}";

        usleep(500000); // نیم ثانیه مکث برای طبیعی شدن ربات

        // متن پاسخ (ترکیب متن ساده و لینک HTML)
        $botReply = "Thank you for your message! \n\n" .
                    "For technical specifications, pricing, and faster support, please contact our international sales team directly on WhatsApp:\n\n" .
                    "<a href='{$whatsAppLink}' target='_blank' style='color: #0d9488; font-weight: bold; text-decoration: underline;'>Click here to open WhatsApp</a>";

        return response()->json(['reply' => $botReply]);
    }
}