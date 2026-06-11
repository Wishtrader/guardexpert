<?php
/**
 * Single Service template
 *
 * @package guardexpert
 */

get_header();

$hero_title = get_field('service_hero_title') ?: get_the_title();
$hero_description = get_field('service_hero_description');
$hero_image = get_field('service_hero_image');
$hero_button_text = get_field('service_hero_button_text') ?: 'Получить консультацию';
$features = get_field('service_features');
$about_title = get_field('service_about_title') ?: 'Об услуге';
$about_content = get_field('service_about_content');
$about_image = get_field('service_about_image');
$audience_title = get_field('service_audience_title') ?: 'Для кого подойдут наши услуги';
$audience_content = get_field('service_audience_content');
$audience_items = get_field('service_audience_items');
$when_title = get_field('service_when_title') ?: 'Когда нужна услуга';
$when_content = get_field('service_when_content');
$when_items = get_field('service_when_items');
$steps_title = get_field('service_steps_title') ?: 'Как строится работа';
$steps_content = get_field('service_steps_content');
$steps = get_field('service_steps');
$why_title = get_field('service_why_title') ?: 'Почему это удобно для клиента';
$why_content = get_field('service_why_content');
$why_items = get_field('service_why_items');
$why_large_text = get_field('service_why_large_text');
$bottom_button = get_field('service_bottom_button') ?: 'Получить консультацию';
$hero_bg_image = get_field('service_hero_bg');
?>

<!-- Hero Section -->
<section class="hero-service-bg relative overflow-hidden" <?php if ($hero_bg_image): ?>style="background-image: url('<?php echo esc_url($hero_bg_image); ?>');"<?php endif; ?>>
    <div class="max-w-[1200px] mx-auto px-4 py-12 lg:py-20 relative z-10">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
            <div class="lg:w-1/2">
                <nav class="text-sm text-gray-500 mb-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-[#B22234]">Главная</a>
                    <span class="mx-2">/</span>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" class="hover:text-[#B22234]">Услуги</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-700"><?php echo esc_html($hero_title); ?></span>
                </nav>
                <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                    <?php echo esc_html($hero_title); ?>
                </h1>
                <?php if ($hero_description): ?>
                <p class="text-gray-600 text-base lg:text-lg mb-8 max-w-lg">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <?php endif; ?>
                <a href="#" class="js-open-consultation inline-flex items-center gap-2 bg-[#B22234] text-white px-8 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                    <?php echo esc_html($hero_button_text); ?>
                </a>
            </div>
            <?php if ($hero_image): ?>
            <div class="lg:w-1/2 flex justify-center lg:justify-end">
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>" class="rounded-lg shadow-lg max-w-full h-auto opacity-90">
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($features): ?>
<!-- Features Bar -->
<section class="bg-white border-b">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-gray-200">
            <?php foreach ($features as $feature): ?>
            <div class="flex items-center gap-3 py-6 px-4">
                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                    <?php if ($feature['icon']): ?>
                    <img src="<?php echo esc_url($feature['icon']); ?>" alt="<?php echo esc_attr($feature['title']); ?>" class="w-6 h-6 object-contain">
                    <?php endif; ?>
                </div>
                <div>
                    <div class="font-bold text-gray-900 text-sm"><?php echo esc_html($feature['title']); ?></div>
                    <div class="text-gray-500 text-xs"><?php echo esc_html($feature['subtitle']); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($about_content || $about_image): ?>
<!-- Об услуге -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
            <div class="grid lg:grid-cols-2">
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html($about_title); ?></h2>
                    <div class="text-gray-600">
                        <?php echo wp_kses_post($about_content); ?>
                    </div>
                </div>
                <?php if ($about_image): ?>
                <div class="bg-gray-100">
                    <img src="<?php echo esc_url($about_image); ?>" alt="Об услуге" class="w-full h-full object-cover">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($audience_items): ?>
<!-- Для кого подойдут наши услуги -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($audience_title); ?></h2>
            <?php if ($audience_content): ?>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($audience_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($audience_items as $item): ?>
            <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                    <?php if ($item['icon']): ?>
                    <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="w-5 h-5 object-contain">
                    <?php endif; ?>
                </div>
                <h4 class="font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h4>
                <p class="text-gray-600 text-sm"><?php echo esc_html($item['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($when_items): ?>
<!-- Когда нужна услуга -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($when_title); ?></h2>
            <?php if ($when_content): ?>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($when_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
            <?php foreach ($when_items as $item): ?>
            <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                <h4 class="font-bold text-gray-900 mb-3 text-lg"><?php echo esc_html($item['title']); ?></h4>
                <p class="text-gray-600 text-sm"><?php echo esc_html($item['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($steps): ?>
<!-- Как строится работа -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($steps_title); ?></h2>
            <?php if ($steps_content): ?>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($steps_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php foreach ($steps as $step): ?>
            <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                <div class="text-3xl font-bold text-gray-200 mb-3"><?php echo sprintf('%02d', $step['number']); ?></div>
                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                    <?php if ($step['icon']): ?>
                    <img src="<?php echo esc_url($step['icon']); ?>" alt="<?php echo esc_attr($step['title']); ?>" class="w-6 h-6 object-contain">
                    <?php endif; ?>
                </div>
                <h4 class="font-bold text-gray-900 mb-2"><?php echo esc_html($step['title']); ?></h4>
                <p class="text-gray-600 text-sm"><?php echo esc_html($step['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($why_items || $why_large_text): ?>
<!-- Почему это удобно для клиента -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($why_title); ?></h2>
            <?php if ($why_content): ?>
            <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html($why_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid lg:grid-cols-2 gap-4 mb-8">
            <?php if ($why_large_text): ?>
            <div class="bg-white border border-gray-200 rounded-lg p-8 lg:p-12 flex flex-col justify-center min-h-[300px]">
                <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-4">Понятная структура решения</h3>
                <div class="text-gray-600">
                    <?php echo wp_kses_post($why_large_text); ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($why_items): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                <?php foreach ($why_items as $item): ?>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-2"><?php echo esc_html($item['title']); ?></h4>
                    <p class="text-gray-600 text-sm"><?php echo esc_html($item['text']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="text-center">
            <a href="#" class="js-open-consultation inline-block bg-[#B22234] text-white px-12 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                <?php echo esc_html($bottom_button); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

    <?php get_template_part( 'template-parts/contact-form-section' ); ?>

<script>
    lucide.createIcons();
</script>
<?php
get_footer();