<?php
/**
 * Template Name: Single Service 
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

$stats_items = get_field('service_features');
if ( empty( $stats_items ) || ! is_array( $stats_items ) ) {
	$stats_items = array(
		array( 'icon' => '', 'title' => 'С 2012 года', 'subtitle' => '' ),
		array( 'icon' => '', 'title' => '14+ лет', 'subtitle' => '' ),
		array( 'icon' => '', 'title' => 'Поставка по всей РБ', 'subtitle' => '' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение', 'subtitle' => '' ),
	);
}
$stats_lucide_icons = array( 'calendar', 'shield-check', 'map-pin', 'headphones' );
?>

<!-- Hero Section -->
<section class="hero-service-bg relative lg:min-h-[672px] overflow-hidden -mt-[120px] lg:-mt-[220px]" <?php if ($hero_bg_image): ?>style="background-image: url('<?php echo esc_url($hero_bg_image); ?>');"<?php endif; ?>>
    <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
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
                <p class="text-gray-600 text-base lg:text-lg mb-5 max-w-lg">
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

<!-- Stats Bar -->
<section class="relative md:mt-[-66px]">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="grid grid-cols-2 lg:grid-cols-4 bg-white shadow-md rounded-[2px] p-10">
            <?php foreach ( $stats_items as $i => $item ) :
                $stats_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                $stats_title = isset( $item['title'] ) ? $item['title'] : '';
                $lucide_name = isset( $stats_lucide_icons[ $i ] ) ? $stats_lucide_icons[ $i ] : 'circle'; ?>
            <div class="flex items-center gap-3">
                <?php if ( ! empty( $stats_icon ) ) : ?>
                    <img src="<?php echo esc_url( $stats_icon ); ?>" alt="" class="h-[52px] object-contain">
                <?php else : ?>
                    <i data-lucide="<?php echo esc_attr( $lucide_name ); ?>" class="w-6 h-6 text-[#B22234]"></i>
                <?php endif; ?>
                <div>
                    <div class="font-normal text-black md:max-w-[170px] text-sm"><?php echo esc_html( $stats_title ); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($about_content || $about_image): ?>
<!-- Об услуге -->
<section class="py-8 lg:py-16">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
            <div class="grid lg:grid-cols-2">
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <h2 class="text-2xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html($about_title); ?></h2>
                    <div class="text-black lg:text-lg !leading-[1.2]">
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
<section class="py-8 lg:py-16">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html($audience_title); ?></h2>
            <?php if ($audience_content): ?>
            <p class="text-black mx-auto px-4"><?php echo esc_html($audience_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($audience_items as $item): ?>
            <div class="bg-white border border-gray-200 rounded-[4px] p-6 shadow-md hover:shadow-lg transition">
                <?php if ($item['icon']): ?>
                    <img src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="w-auto md:h-[52px] object-contain mb-[10px]">
                    <?php endif; ?>
                <h4 class="font-semibold text-black text-[22px] leading-[1.2] mb-[10px]"><?php echo esc_html($item['title']); ?></h4>
                <p class="text-black text-base leading-[1.2]"><?php echo esc_html($item['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($when_items): ?>
<!-- Когда нужна услуга -->
<section class="py-8 lg:py-16">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-5xl font-bold text-black mb-5"><?php echo esc_html($when_title); ?></h2>
            <?php if ($when_content): ?>
            <p class="text-black text-lg mx-auto leading-[1.2]"><?php echo esc_html($when_content); ?></p>
            <?php endif; ?>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
            <?php foreach ($when_items as $item): ?>
            <div class="bg-white border border-gray-200 rounded-[4px] p-5 shadow-md hover:shadow-lg transition">
                <h4 class="font-semibold text-black mb-3 text-[22px] leading-[1.2]"><?php echo esc_html($item['title']); ?></h4>
                <p class="text-black text-base leading-[1.2]"><?php echo esc_html($item['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($steps): ?>
<!-- Как строится работа -->
<section class="py-8 lg:py-16">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-5xl font-bold text-black mb-5"><?php echo esc_html($steps_title); ?></h2>
            <?php if ($steps_content): ?>
            <p class="text-black text-lg mx-auto"><?php echo esc_html($steps_content); ?></p>
            <?php endif; ?>
        </div>

        <?php $total_steps = count($steps); ?>
        <!-- Mobile: horizontal slider -->
        <div class="flex overflow-x-auto snap-x snap-mandatory gap-2 pb-4 sm:hidden scroll-smooth" style="-webkit-overflow-scrolling: touch;">
            <?php foreach ($steps as $i => $step) : ?>
            <div class="flex gap-0 shrink-0 snap-start w-[70%] min-w-0">
                <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                    <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo sprintf('%02d', $step['number']); ?></div>
                    <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <?php if ($step['icon']): ?>
                        <img src="<?php echo esc_url($step['icon']); ?>" alt="<?php echo esc_attr($step['title']); ?>" class="h-[52px] object-contain">
                        <?php endif; ?>
                    </div>
                    <h4 class="font-semibold text-black text-[22px] leading-[1.2] mb-4"><?php echo esc_html($step['title']); ?></h4>
                    <p class="text-black text-sm leading-[1.2]"><?php echo esc_html($step['text']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Tablet: 2 columns grid -->
        <div class="hidden sm:grid sm:grid-cols-2 lg:hidden gap-4">
            <?php foreach ($steps as $step) : ?>
            <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo sprintf('%02d', $step['number']); ?></div>
                <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                    <?php if ($step['icon']): ?>
                    <img src="<?php echo esc_url($step['icon']); ?>" alt="<?php echo esc_attr($step['title']); ?>" class="h-[52px] object-contain">
                    <?php endif; ?>
                </div>
                <h4 class="font-semibold text-black text-[22px] leading-[1.2] mb-4"><?php echo esc_html($step['title']); ?></h4>
                <p class="text-black text-sm leading-[1.2]"><?php echo esc_html($step['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Desktop: grid with arrows -->
        <div class="hidden lg:flex gap-0">
            <?php foreach ($steps as $i => $step) :
                $is_last = ($i === $total_steps - 1);
            ?>
            <div class="flex gap-0 flex-1 min-w-0">
                <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                    <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo sprintf('%02d', $step['number']); ?></div>
                    <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <?php if ($step['icon']): ?>
                        <img src="<?php echo esc_url($step['icon']); ?>" alt="<?php echo esc_attr($step['title']); ?>" class="h-[52px] object-contain">
                        <?php endif; ?>
                    </div>
                    <h4 class="font-semibold text-black text-[22px] leading-[1.2] mb-4"><?php echo esc_html($step['title']); ?></h4>
                    <p class="text-black text-sm leading-[1.2]"><?php echo esc_html($step['text']); ?></p>
                </div>
                <?php if ( ! $is_last ) : ?>
                <div class="flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#B22234" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m9 18 6-6-6-6"/></svg>
                </div>
                <?php endif; ?>
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
