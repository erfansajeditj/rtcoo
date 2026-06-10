<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaboration;

class CollaborationController extends Controller
{
    public function store(Request $request)
    {

if ($request->filled('website')) {
        return back()->with('success', 'Your application has been submitted successfully! We will contact you soon.');
    }



        // 1. اعتبارسنجی اطلاعات (که طرف فیلدها رو خالی نفرسته)
        $validated = $request->validate([
            'company_name' => 'required|string|max:255|min:2',
'country_city' => 'required|string|max:255|min:2',
'contact_person' => 'required|string|max:255|min:2',
'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
'email' => 'required|email:rfc,dns|max:255',
'proposal' => 'required|string|min:20|max:5000',
        ]);

        // 2. ذخیره در دیتابیس
        Collaboration::create($validated);

        // 3. برگشت به همون صفحه با پیام موفقیت
        return back()->with('success', 'Your application has been submitted successfully! We will contact you soon.');
    }
}