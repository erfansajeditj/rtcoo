<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="ltr">
<head>
   <?php echo $__env->make('partials.head', ['title' => __('messages.collaboration') . ' - Rozi Tib', 'description' => __('messages.collab_subtitle')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<header class="relative overflow-hidden py-28 md:py-80 bg-cover bg-center md:bg-[center_top_-2rem]" style="background-image: url('<?php echo e(asset('images/headers/collabration-bg.webp')); ?>');">
    <div class="absolute inset-0 bg-brand-teal/60 z-0"></div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3 z-0">
         <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>
    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">

    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white drop-shadow-md"><?php echo e(__('messages.partner_with_us')); ?></h1>
            <p class="text-teal-100 text-lg max-w-2xl mx-auto"><?php echo e(__('messages.collab_subtitle')); ?></p>
        </div>
    </header>

    <div class="container mx-auto px-6 py-16 flex-grow">
        
        <div class="grid md:grid-cols-3 gap-8 mb-20 text-center">
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-brand-orange transition group">
                <div class="w-16 h-16 bg-orange-100 text-brand-orange rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">💎</div>
                <h3 class="text-xl font-bold mb-2"><?php echo e(__('messages.premium_quality')); ?></h3>
                <p class="text-gray-500 text-sm"><?php echo e(__('messages.premium_quality_desc')); ?></p>
            </div>
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-brand-teal transition group">
                <div class="w-16 h-16 bg-teal-100 text-brand-teal rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">📈</div>
                <h3 class="text-xl font-bold mb-2"><?php echo e(__('messages.high_profit_margin')); ?></h3>
                <p class="text-gray-500 text-sm"><?php echo e(__('messages.high_profit_margin_desc')); ?></p>
            </div>
            <div class="p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:border-blue-500 transition group">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition">🎓</div>
                <h3 class="text-xl font-bold mb-2"><?php echo e(__('messages.training_support')); ?></h3>
                <p class="text-gray-500 text-sm"><?php echo e(__('messages.training_support_desc')); ?></p>
            </div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            <div class="bg-gray-900 text-white p-10 md:w-1/3 flex flex-col justify-center relative overflow-hidden">
                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                <h3 class="text-2xl font-bold mb-4 relative z-10"><?php echo e(__('messages.become_distributor')); ?></h3>
                <p class="text-gray-300 text-sm mb-8 relative z-10"><?php echo e(__('messages.distributor_desc')); ?></p>
                <ul class="space-y-3 text-sm relative z-10">
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> <?php echo e(__('messages.exclusive_territories')); ?></li>
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> <?php echo e(__('messages.marketing_support')); ?></li>
                    <li class="flex items-center gap-2"><span class="text-brand-orange">✓</span> <?php echo e(__('messages.tech_assist')); ?></li>
                </ul>
            </div>

            <div class="p-10 md:w-2/3">


            
               <form action="<?php echo e(route('collaboration.store')); ?>" method="POST" class="w-full">
    
    <?php echo csrf_field(); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-6 bg-teal-50 border border-teal-200 text-teal-800 px-4 py-3 rounded-xl font-medium">
            ✅ <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        
        <div>
            <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.company_name')); ?></label>
            <input type="text" name="company_name" placeholder="MediCorp Ltd." required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.country_city')); ?></label>
            <input type="text" name="country_city" placeholder="Dushanbe" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.contact_person')); ?></label>
            <input type="text" name="contact_person" placeholder="Full Name" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.phone_number')); ?></label>
            <input type="text" name="phone" placeholder="+992..." required
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
        </div>
        
    </div>

    <div class="mb-6">
        <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.email_address')); ?></label>
        <input type="email" name="email" placeholder="partner@company.com" required
               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all">
    </div>

    <div class="mb-8">
        <label class="block text-sm text-gray-600 mb-2"><?php echo e(__('messages.business_proposal')); ?></label>
        <textarea name="proposal" rows="4" placeholder="<?php echo e(__('messages.proposal_placeholder')); ?>" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-brand-teal focus:ring-1 focus:ring-brand-teal transition-all resize-none"></textarea>
    </div>

    <button type="submit"
            class="w-full bg-brand-teal hover:bg-brand-dark text-white font-bold py-4 rounded-xl transition-colors duration-300 shadow-lg shadow-brand-teal/30">
        <?php echo e(__('messages.submit_application')); ?>

    </button>
    
</form>
            </div>
        </div>

    </div>

   
     <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\tajik-med\resources\views/collaboration.blade.php ENDPATH**/ ?>