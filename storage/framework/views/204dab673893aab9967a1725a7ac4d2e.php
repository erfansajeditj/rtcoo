<nav class="bg-white/95 backdrop-blur-md sticky top-0 z-50 shadow-2xl shadow-brand-teal/40 ...">  
      <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 z-50 group">
            <img src="<?php echo e(asset('logo.png')); ?>" alt="Rozi Tib" class="h-10 w-auto object-contain">
            
            <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

            <div class="w-2.5 h-2.5 bg-orange-500 rounded-sm mr-1 animate-pulse"></div>

            <div class="flex flex-col justify-center">
                <span class="text-xl font-bold text-gray-900 tracking-tight leading-none">
                    Rozi<span class="text-brand-teal">Tib</span>
                </span>
                <span class="text-[10px] text-gray-500 font-bold tracking-widest uppercase mt-0.5">
                    <?php echo e(__('messages.slogan')); ?>

                </span>
            </div>
        </a>

        <div class="hidden lg:flex absolute left-0 right-0 justify-center items-center space-x-8">
            
    <a href="<?php echo e(route('home')); ?>" class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->routeIs('home') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
    <?php echo e(__('messages.home')); ?>

</a>

            
           <a href="<?php echo e(route('about')); ?>" 
               class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->is('about') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
              <?php echo e(__('messages.about')); ?>

            </a>

            <a href="<?php echo e(route('products.index')); ?>" 
               class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->is('products') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
               <?php echo e(__('messages.products')); ?>

            </a>

            <a href="<?php echo e(route('exhibitions')); ?>" 
               class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->is('exhibitions') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
               <?php echo e(__('messages.exhibitions')); ?>

            </a>

          <a href="<?php echo e(route('collaboration.show')); ?>" 
               class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->is('collaboration') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
               <?php echo e(__('messages.collaboration')); ?>

               
            </a>

            <a href="<?php echo e(route('contact.show')); ?>" 
               class="pb-1 transition hover:-translate-y-0.5 transform <?php echo e(request()->is('contact') ? 'text-brand-teal font-bold border-b-2 border-orange-500' : 'text-sm text-gray-700 hover:text-brand-teal font-bold'); ?>">
               <?php echo e(__('messages.contact')); ?>

               
            </a>
        </div>

        <div class="flex items-center gap-4 z-50 ml-auto">
            
            <div class="flex items-center text-xs font-semibold text-gray-500 bg-gray-100 rounded-full px-2.5 py-0.5 shadow-sm">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['en' => 'EN', 'tg' => 'TJ', 'ru' => 'RU']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $segments = request()->segments();
            $segments[0] = $code; // جایگزینی بخش زبان در URL
            $url = url(implode('/', $segments));
            if (request()->getQueryString()) { $url .= '?' . request()->getQueryString(); }
        ?>
        <a href="<?php echo e($url); ?>" class="<?php echo e(app()->getLocale() == $code ? 'text-gray-900 font-bold' : 'hover:text-brand-teal transition'); ?>"><?php echo e($label); ?></a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $loop->last): ?> <span class="mx-2 text-gray-300">|</span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

            <a href="/admin" class="hidden md:block text-sm font-medium text-brand-orange hover:text-orange-700 transition">
            <?php echo e(__('messages.login')); ?>    
            
            </a>
            
        </div>

    </div>
</nav><?php /**PATH C:\xampp\htdocs\tajik-med\resources\views/partials/navbar.blade.php ENDPATH**/ ?>