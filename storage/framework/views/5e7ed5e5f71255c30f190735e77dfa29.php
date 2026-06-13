<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="ltr">
<head>
   <?php echo $__env->make('partials.head', ['title' => __('messages.products') . ' - Rozi Tib', 'description' => __('messages.products_subtitle')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

   <?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<header class="relative overflow-hidden py-36 md:py-80 bg-cover bg-center md:bg-[center_top_-5rem]" style="background-image: url('<?php echo e(asset('images/headers/products-bg.webp')); ?>');">
        <div class="absolute inset-0 bg-brand-teal/60 z-0"></div>
    <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/3 -translate-y-1/3 z-0">
         <svg width="400" height="400" fill="currentColor" class="text-white" viewBox="0 0 200 200"><path d="M45,-76C58,-69,68,-59,76,-48C84,-36,90,-23,89,-10C88,3,80,16,71,27C62,38,52,48,41,56C30,64,18,71,5,72C-8,73,-19,68,-30,61C-41,54,-52,45,-61,34C-70,23,-77,10,-76,-3C-75,-16,-66,-28,-56,-38C-46,-48,-35,-56,-23,-63C-11,-70,1,-76,14,-78L45,-76Z" transform="translate(100 100)" /></svg>
    </div>



    <div class="container mx-auto px-6 text-center relative z-10 -mt-20">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-5 text-white drop-shadow-md"><?php echo e(__('messages.products')); ?></h1>
        <p class="text-teal-50 text-lg opacity-100 drop-shadow-sm"><?php echo e(__('messages.products_subtitle')); ?></p>
    </div>
</header>






    <!-- بخش جدید فیلتر (منوی کشویی) -->
    <div class="bg-white/95 backdrop-blur border-b border-gray-200 sticky top-[64px] md:top-[80px] z-40 shadow-sm py-4">
        <div class="container mx-auto px-6 flex flex-col sm:flex-row items-center md:justify-start gap-4">
            
            <!-- کلمه Filter با آیکون -->
            <div class="flex items-center text-sm font-bold text-gray-400 uppercase tracking-wider">
                <svg class="w-5 h-5 mr-2 rtl:ml-2 rtl:mr-0 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <?php echo e(__('messages.filter')); ?>:
            </div>

            <!-- باکس Dropdown با استایل نارنجی/آبی -->
            <div class="relative w-full sm:w-80 group">
                <select onchange="window.location.href=this.value" 
                        class="block w-full appearance-none bg-white border-2 border-brand-teal text-gray-800 font-bold py-2.5 px-4 pr-10 rtl:pr-4 rtl:pl-10 rounded-xl shadow-sm focus:outline-none focus:ring-4 focus:ring-brand-orange/20 focus:border-brand-orange hover:border-brand-orange transition-all duration-300 cursor-pointer">
                    
                    <!-- گزینه همه محصولات -->
                    <option value="/products" <?php echo e(!isset($currentCategory) ? 'selected' : ''); ?>>
                        <?php echo e(__('messages.all_products')); ?>

                    </option>
                    
                    <!-- لود کردن گروه‌ها -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="/products/category/<?php echo e($cat); ?>" <?php echo e((isset($currentCategory) && $currentCategory == $cat) ? 'selected' : ''); ?>>
                            <?php echo e($cat); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                </select>

                <!-- آیکون فلش (نارنجی) -->
                <div class="absolute inset-y-0 right-0 rtl:right-auto rtl:left-0 flex items-center px-4 pointer-events-none text-brand-orange transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            
        </div>
    </div>









    <div class="container mx-auto px-6 py-12 flex-grow">
        
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $categoryItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
           
            <div class="flex items-center mt-12 mb-8 group">
                <div class="w-1.5 h-6 bg-brand-orange rounded-full mr-3 rtl:ml-3 rtl:mr-0 shadow-sm shadow-brand-orange/30 group-hover:scale-y-110 transition-transform duration-300"></div>
                
                <h2 class="text-xl md:text-2xl font-bold text-slate-800 capitalize tracking-wide drop-shadow-sm">
                    <?php echo e(strtolower($categoryName)); ?>

                </h2>
                
                <div class="flex-grow h-px bg-gradient-to-r from-slate-300 to-transparent ml-6 rtl:mr-6 rtl:ml-0 opacity-70"></div>
            </div>
            
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-8 mb-12">
                
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categoryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-sm transition-all duration-500 border border-gray-100 hover:shadow-2xl hover:shadow-brand-orange/30 hover:-translate-y-1.5 group flex flex-col">
                    <div class="h-40 sm:h-52 md:h-64 overflow-hidden rounded-t-xl bg-white relative flex items-center justify-center p-4 border-b border-gray-50">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($product->image): ?>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500">
                        <?php else: ?>
                            <span class="text-gray-400"><?php echo e(__('messages.no_image')); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    
                    <div class="p-5 flex-grow flex flex-col">
                        <span class="inline-block text-brand-orange text-xs font-bold uppercase tracking-wide mb-1"><?php echo e($product->category); ?></span>
                        <h3 class="font-bold text-lg text-gray-900 mb-2 leading-tight"><?php echo e($product->name); ?></h3> 
                        <div class="text-sm text-gray-500 line-clamp-2 mb-4">
                            <?php echo strip_tags($product->description); ?> 
                        </div>

                        <div class="mt-auto">
                            <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="block w-full text-center py-2 border border-brand-teal text-brand-teal font-semibold rounded-lg hover:bg-brand-teal hover:text-white transition-colors duration-300">
                                <?php echo e(__('messages.view_details')); ?>

                            </a>

                            
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($products->isEmpty()): ?>
            <div class="text-center py-20 text-gray-500">
                <p><?php echo e(__('messages.no_products_found')); ?></p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

   

 <?php
    $itemListElements = [];
    $position = 1;
    foreach ($products as $categoryName => $categoryItems) {
        foreach ($categoryItems as $product) {
            $itemListElements[] = [
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => $product->name,
                'url'      => route('products.show', $product->slug),
                'image'    => $product->image ? asset('storage/' . $product->image) : null,
                'description' => strip_tags((string) $product->description),
            ];
        }
    }
    $itemListSchema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'ItemList',
        'name'            => __('messages.products') . ' - Rozi Tib',
        'description'     => __('messages.products_subtitle'),
        'url'             => url()->current(),
        'numberOfItems'   => $position - 1,
        'itemListElement' => $itemListElements,
    ];
?>
<script type="application/ld+json">
<?php echo json_encode($itemListSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>

</script>

   <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\tajik-med\resources\views/products.blade.php ENDPATH**/ ?>