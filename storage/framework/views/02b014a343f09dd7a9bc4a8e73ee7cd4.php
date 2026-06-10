<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="ltr">
<head>
   <?php echo $__env->make('partials.head', ['title' => __('messages.about_us') . ' - Rozi Tib'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<header class="relative overflow-hidden py-80 bg-cover bg-[center_top_-6rem]" style="background-image: url('<?php echo e(asset('images/headers/about-bg.webp')); ?>');">
    <div class="absolute inset-0 bg-brand-teal/60 z-0"></div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3 z-0">
         <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
            <h1 class="text-6xl md:text-7xl font-bold mb-5 text-white drop-shadow-md"><?php echo e(__('messages.about_rozi_tib')); ?></h1>
            <p class="text-teal-50 text-lg opacity-100 drop-shadow-sm"><?php echo e(__('messages.about_subtitle')); ?></p>
        </div>
    </header>





    <!-- ========================================== -->
    <!-- بخش معرفی، ماموریت و چشم‌انداز (About & Mission) -->
    <!-- ========================================== -->
    <div class="container mx-auto px-6 py-20 max-w-7xl flex-grow">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- ستون متن معرفی -->
            <div>
                <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                    <?php echo e(__('messages.who_we_are')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                    Engineering the Future of <span class="text-brand-teal">Healthcare</span>
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed mb-6">
                    RoziTib Medical Technologies is a pioneering manufacturer dedicated to engineering advanced, life-saving medical equipment. With a relentless focus on quality and innovation, we develop comprehensive healthcare solutions that meet the highest international standards, empowering medical professionals in critical care environments worldwide.
                </p>
                <div class="h-1 w-20 bg-brand-teal rounded"></div>
            </div>

            <!-- ستون ماموریت و چشم‌انداز (کارت‌ها) -->
            <div class="space-y-6">
                
                <!-- باکس مأموریت -->
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-brand-teal/30 transition-all duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-brand-teal/10 group-hover:bg-brand-teal group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center text-brand-teal mr-4 rtl:ml-4 rtl:mr-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">Our Mission</h3>
                    </div>
                    <p class="text-slate-600 leading-relaxed">
                        To empower healthcare professionals globally with reliable, accessible, and high-tech medical solutions that elevate patient safety and clinical outcomes.
                    </p>
                </div>

                <!-- باکس چشم‌انداز -->
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-lg hover:border-brand-orange/30 transition-all duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-brand-orange/10 group-hover:bg-brand-orange group-hover:text-white transition-colors duration-300 rounded-full flex items-center justify-center text-brand-orange mr-4 rtl:ml-4 rtl:mr-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800">Our Vision</h3>
                    </div>
                    <p class="text-slate-600 leading-relaxed">
                        To be at the forefront of medical technology, setting global standards in healthcare engineering and bridging the gap between digital innovation and physical care.
                    </p>
                </div>

            </div>
            
        </div>
    </div>





<!-- ========================================== -->
    <!-- بخش داستان ما (Our Journey - Timeline) -->
    <!-- ========================================== -->
    <div class="bg-slate-50 py-20 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-5xl">
            
            <div class="text-center mb-16">
                <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                    <?php echo e(__('messages.our_story')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">
                    The RoziTib <span class="text-brand-teal">Journey</span>
                </h2>
            </div>

            <!-- خط زمان عمودی با پشتیبانی از چپ‌چین و راست‌چین -->
            <div class="relative border-l-4 border-brand-teal/20 rtl:border-l-0 rtl:border-r-4 ml-6 rtl:ml-0 rtl:mr-6 space-y-12 pb-4">
                
                <!-- ۲۰۲۲ -->
                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <div class="absolute w-6 h-6 bg-white border-4 border-brand-teal rounded-full -left-[15px] rtl:left-auto rtl:-right-[15px] top-1 group-hover:bg-brand-teal transition-colors duration-300"></div>
                    <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm group-hover:shadow-md group-hover:border-brand-teal/30 transition-all duration-300">
                        <span class="text-brand-orange font-bold text-2xl block mb-2">2022</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">The Foundation</h3>
                        <p class="text-slate-600 leading-relaxed">
                            RoziTib was established with a commitment to redefining medical manufacturing. We set out with a clear vision to build reliable, high-precision healthcare solutions from the ground up, focusing on uncompromising quality.
                        </p>
                    </div>
                </div>

                <!-- ۲۰۲۴ -->
                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <div class="absolute w-6 h-6 bg-white border-4 border-brand-orange rounded-full -left-[15px] rtl:left-auto rtl:-right-[15px] top-1 group-hover:bg-brand-orange transition-colors duration-300"></div>
                    <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm group-hover:shadow-md group-hover:border-brand-orange/30 transition-all duration-300">
                        <span class="text-brand-teal font-bold text-2xl block mb-2">2024</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">R&D and Innovation Expansion</h3>
                        <p class="text-slate-600 leading-relaxed">
                            A major leap forward. We significantly expanded our capabilities by launching a dedicated Research & Development division. This milestone allowed us to integrate advanced engineering and smart technologies into our growing operations.
                        </p>
                    </div>
                </div>

                <!-- ۲۰۲۶ و آینده -->
                <div class="relative pl-10 rtl:pl-0 rtl:pr-10 group">
                    <!-- نقطه سال ۲۰۲۶ یه افکت چشمک‌زن ملایم داره که نشون‌دهنده "زمان حال" هست -->
                    <div class="absolute w-8 h-8 bg-brand-teal border-4 border-white rounded-full -left-[19px] rtl:left-auto rtl:-right-[19px] top-0 shadow-md flex items-center justify-center">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </div>
                    <div class="bg-gradient-to-br from-brand-teal/5 to-transparent p-8 rounded-2xl border border-brand-teal/20 shadow-sm group-hover:shadow-lg transition-all duration-300">
                        <span class="text-brand-orange font-bold text-2xl block mb-2">2026 & Beyond</span>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Shaping the Future</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Today, we stand as a trusted partner for medical professionals. We are continuously scaling our production capabilities and pushing the boundaries of modern healthcare technology worldwide.
                        </p>
                    </div>
                </div>

            </div>
            
        </div>
    </div>




<!-- ========================================== -->
    <!-- بخش تحقیق و توسعه و تولید (R&D & Manufacturing) -->
    <!-- ========================================== -->
    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <!-- هدرِ بخش -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-teal font-bold tracking-widest uppercase text-sm mb-3 block">
                    <?php echo e(__('messages.rd_and_manufacturing')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6 leading-tight">
                    Powered by <span class="text-brand-orange">In-House</span> Innovation
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed">
                    At RoziTib, we are proud to be true innovators, not merely assemblers. Our state-of-the-art Research & Development department is the beating heart of our operations. We take full ownership of the entire production lifecycle—from the initial blueprints and rigorous hardware engineering to custom software development and smart platform integration.
                </p>
            </div>

            <!-- ۳ تا ستون: سخت‌افزار، نرم‌افزار، کنترل کیفیت -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- 1. Hardware Engineering -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-teal/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-brand-teal mb-6 border border-slate-100">
                        <!-- آیکون میکروچیپ و سخت‌افزار -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Hardware Engineering</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Precision at every level. We design and manufacture durable, industrial-grade components and circuit boards, ensuring every device is built for maximum reliability in critical environments.
                    </p>
                </div>

                <!-- 2. Software & Digital Integration -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-brand-orange/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-brand-orange mb-6 border border-slate-100">
                        <!-- آیکون کد و نرم‌افزار -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Software Development</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Seamless intelligence. Our in-house team writes custom code and develops intuitive user interfaces, bridging the gap between mechanical power and smart, data-driven platforms.
                    </p>
                </div>

                <!-- 3. Uncompromising Quality Control -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:-translate-y-2 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-600 mb-6 border border-slate-100">
                        <!-- آیکون سپر و تاییدیه (کیفیت) -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Quality Control</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Every circuit, housing component, and line of code is meticulously tested. Our strict in-house QC protocols guarantee absolute safety and adherence to international medical standards.
                    </p>
                </div>

            </div>

        </div>
    </div>




<!-- ========================================== -->
    <!-- بخش استانداردها و گواهینامه‌ها (Certifications) -->
    <!-- ========================================== -->
    <div class="bg-slate-900 py-24 relative overflow-hidden">
        <!-- یه افکت نوری محو تو پس‌زمینه برای زیبایی -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-full bg-gradient-to-b from-brand-teal/10 to-transparent opacity-50 blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                    Uncompromising <span class="text-brand-teal">Standards</span>
                </h2>
                <p class="text-slate-400 text-lg leading-relaxed">
                    Quality is not just a promise; it is engineered into every device we build. We strictly adhere to national and international healthcare regulations to ensure absolute patient safety.
                </p>
            </div>

            <!-- گرید استانداردها (الان 4 تاست، میتونی کم و زیاد کنی) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                <!-- 1. استاندارد IEC 60601-1 -->
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-teal transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-teal/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-teal transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">IEC 60601-1</h4>
                    <p class="text-slate-500 text-sm">Medical Electrical Safety</p>
                </div>

                <!-- 2. استاندارد ISO 13485 -->
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-teal transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-teal/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-teal transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">ISO 13485</h4>
                    <p class="text-slate-500 text-sm">Quality Management</p>
                </div>

                <!-- 3. تاییدیه اداره کل تجهیزات پزشکی (IMED) -->
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-orange transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-orange/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-orange transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">IMED Approved</h4>
                    <p class="text-slate-500 text-sm">National Health Certifications</p>
                </div>

                <!-- 4. نشان CE (یا هر استاندارد دیگه) -->
                <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl text-center hover:bg-slate-800 hover:border-brand-orange transition-all duration-300 group">
                    <div class="w-12 h-12 mx-auto bg-slate-700/50 group-hover:bg-brand-orange/20 rounded-full flex items-center justify-center text-slate-300 group-hover:text-brand-orange transition-colors mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">Global Export</h4>
                    <p class="text-slate-500 text-sm">International Ready</p>
                </div>

            </div>
        </div>
    </div>




<!-- ========================================== -->
    <!-- بخش خدمات پس از فروش و تعهد (Support & Commitment) -->
    <!-- ========================================== -->
    <div class="bg-slate-50 py-24 border-t border-slate-200">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- ستون متن و تعهدنامه -->
                <div>
                    <span class="text-brand-orange font-bold tracking-widest uppercase text-sm mb-3 block">
                        <?php echo e(__('messages.our_commitment')); ?>

                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                        Beyond the Sale: Our <span class="text-brand-teal">Unwavering Support</span>
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8">
                        We believe that delivering a medical device is just the beginning of our partnership. Recognizing the critical nature of healthcare environments, RoziTib provides an uncompromising after-sales ecosystem. We guarantee rapid spare parts supply, comprehensive warranties, and 24/7 expert technical assistance. Our goal is to ensure zero downtime, so you can focus entirely on saving lives.
                    </p>
                    
                    <!-- یه دکمه تماس با پشتیبانی (اختیاری ولی به شدت کاربردی) -->
                    <a href="<?php echo e(route('contact.show')); ?>" class="inline-flex items-center px-6 py-3 bg-brand-orange hover:bg-orange-600 text-white font-bold rounded-xl transition-colors duration-300 shadow-lg shadow-brand-orange/30">
                        <svg class="w-5 h-5 mr-2 rtl:ml-2 rtl:mr-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Contact Technical Support
                    </a>
                </div>

                <!-- ستون آیکون‌های ۳ گانه (گارانتی، قطعات، ۲۴ساعته) -->
                <div class="space-y-6">
                    
                    <!-- 1. گارانتی معتبر -->
                    <div class="flex items-start bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-teal/10 rounded-xl flex items-center justify-center text-brand-teal mr-5 rtl:ml-5 rtl:mr-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2">Comprehensive Warranty</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">Long-term protection for your investment, ensuring your equipment operates at peak performance without unexpected costs.</p>
                        </div>
                    </div>

                    <!-- 2. تامین سریع قطعات -->
                    <div class="flex items-start bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-teal/10 rounded-xl flex items-center justify-center text-brand-teal mr-5 rtl:ml-5 rtl:mr-0">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-800 mb-2">Rapid Parts Supply</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">Direct access to genuine RoziTib spare parts with expedited shipping, eliminating critical delays in maintenance.</p>
                        </div>
                    </div>

                    <!-- 3. پشتیبانی ۲۴ ساعته (با رنگ نارنجی برای تاکید بیشتر) -->
                    <div class="flex items-start bg-white p-6 rounded-2xl border border-brand-orange/30 shadow-sm shadow-brand-orange/5 hover:shadow-md transition-shadow relative overflow-hidden">
                        <!-- یه نوار نارنجی نازک کنار کارت برای تاکید -->
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-brand-orange rtl:left-auto rtl:right-0"></div>
                        
                        <div class="flex-shrink-0 w-14 h-14 bg-brand-orange/10 rounded-xl flex items-center justify-center text-brand-orange mr-5 rtl:ml-5 rtl:mr-0 z-10">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div class="z-10">
                            <h4 class="text-xl font-bold text-slate-800 mb-2">24/7 Technical Assistance</h4>
                            <p class="text-slate-600 text-sm leading-relaxed">Our dedicated team of engineers is available around the clock to provide immediate remote troubleshooting and on-site support.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>






<!-- ========================================== -->
    <!-- بخش ارزش‌های بنیادین (Core Values) -->
    <!-- ========================================== -->
    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-teal font-bold tracking-widest uppercase text-sm mb-3 block">
                    <?php echo e(__('messages.core_values')); ?>

                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-6">
                    The Pillars of Our <span class="text-brand-orange">Promise</span>
                </h2>
                <p class="text-slate-600 text-lg leading-relaxed">
                    Everything we design, engineer, and manufacture is built upon three foundational principles. These values guide our mission to elevate global healthcare.
                </p>
            </div>

            <!-- گرید 3 کارته ارزش‌ها -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                
                <!-- 1. Precision (دقت) -->
                <div class="text-center group">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-teal rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-teal group-hover:bg-brand-teal/5 transition-all duration-300 mb-6 relative">
                        <!-- یه دایره محو پشت آیکون که موقع هاور شدن بزرگ میشه -->
                        <div class="absolute inset-0 bg-brand-teal/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Precision</h3>
                    <p class="text-slate-600 leading-relaxed px-4">
                        Engineering devices with zero margin for error, ensuring flawless performance in critical healthcare environments.
                    </p>
                </div>

                <!-- 2. Innovation (نوآوری) - رنگ نارنجی -->
                <div class="text-center group mt-8 md:mt-0">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-orange rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-orange group-hover:bg-brand-orange/5 transition-all duration-300 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-orange/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Innovation</h3>
                    <p class="text-slate-600 leading-relaxed px-4">
                        Harnessing the latest advancements in medical technology to design smart, forward-thinking healthcare solutions.
                    </p>
                </div>

                <!-- 3. Safety (ایمنی) -->
                <div class="text-center group mt-8 md:mt-0">
                    <div class="w-24 h-24 mx-auto bg-slate-50 border-2 border-slate-100 group-hover:border-brand-teal rounded-full flex items-center justify-center text-slate-400 group-hover:text-brand-teal group-hover:bg-brand-teal/5 transition-all duration-300 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-teal/20 rounded-full scale-0 group-hover:scale-150 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out blur-xl"></div>
                        <svg class="w-10 h-10 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Safety</h3>
                    <p class="text-slate-600 leading-relaxed px-4">
                        Prioritizing the ultimate protection and well-being of both patients and medical professionals in every product we build.
                    </p>
                </div>

            </div>

        </div>
    </div>




    
     <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


</body>
</html><?php /**PATH C:\xampp\htdocs\tajik-med\resources\views/about.blade.php ENDPATH**/ ?>