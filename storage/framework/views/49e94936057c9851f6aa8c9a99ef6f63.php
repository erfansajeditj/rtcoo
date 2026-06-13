<?php
    // نگاشت کد زبان → فرمت og:locale
    $ogLocales = ['en' => 'en_US', 'tg' => 'tg_TJ', 'ru' => 'ru_RU'];
    $current   = app()->getLocale();

    // ساخت آدرس همین صفحه برای هر زبان (بخش اول URL را عوض می‌کند)
    $segments = request()->segments();
    $altUrl = function ($code) use ($segments) {
        $segs = $segments;
        $segs[0] = $code;
        return url(implode('/', $segs));
    };

    $canonical       = url(request()->path());
    $pageTitle       = $title ?? ('Rozi Tib - ' . __('messages.slogan'));
    $pageDescription = $description ?? __('messages.footer_about_desc');
    $ogImage         = $image ?? asset('logo.png');
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title><?php echo e($pageTitle); ?></title>
<meta name="description" content="<?php echo e($pageDescription); ?>">


<link rel="canonical" href="<?php echo e($canonical); ?>">


<link rel="icon" type="image/png" href="<?php echo e(asset('logo.png.png?v=' . config('app.version', '1'))); ?>">
<link rel="apple-touch-icon" href="<?php echo e(asset('logo.png.png?v=' . config('app.version', '1'))); ?>">


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $ogLocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $ogLocale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="alternate" hreflang="<?php echo e($code); ?>" href="<?php echo e($altUrl($code)); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<link rel="alternate" hreflang="x-default" href="<?php echo e($altUrl(config('app.locale', 'en'))); ?>">


<meta property="og:type" content="website">
<meta property="og:site_name" content="Rozi Tib">
<meta property="og:title" content="<?php echo e($pageTitle); ?>">
<meta property="og:description" content="<?php echo e($pageDescription); ?>">
<meta property="og:url" content="<?php echo e($canonical); ?>">
<meta property="og:image" content="<?php echo e($ogImage); ?>">
<meta property="og:locale" content="<?php echo e($ogLocales[$current] ?? 'en_US'); ?>">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($pageTitle); ?>">
<meta name="twitter:description" content="<?php echo e($pageDescription); ?>">
<meta name="twitter:image" content="<?php echo e($ogImage); ?>">


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style> body { font-family: 'Inter', sans-serif; } </style>

<?php
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Rozi Tib',
        'alternateName' => 'RoziTib Medical Technologies',
        'url'      => url('/'),
        'logo'     => asset('logo.png'),
        'description' => __('messages.footer_about_desc'),
        'email'    => 'info@rozitib.com',
        'telephone'=> '+992931102730',
        'address'  => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Dushanbe',
            'addressCountry'  => 'TJ',
        ],
        'sameAs' => [
            'https://linkedin.com/company/rozi-tib',
            'https://t.me/+992931102730',
            'https://wa.me/992931102730',
        ],
    ];
?>
<script type="application/ld+json">
<?php echo json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>

</script>
<?php /**PATH C:\xampp\htdocs\tajik-med\resources\views/partials/head.blade.php ENDPATH**/ ?>