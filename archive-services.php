<?php
/**
 * Archive for Services
 *
 * @package guardexpert
 */

get_header();

$services = get_posts( array(
	'post_type'      => 'services',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
) );
?>

<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Услуги</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Предлагаем полный спектр услуг по системам безопасности для бизнеса и объектов.</p>
        </div>

        <?php if ($services): ?>
        <div class="grid lg:grid-cols-2 gap-6">
            <?php foreach ($services as $service): ?>
            <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 flex flex-col">
                <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3">
                    <a href="<?php echo get_permalink($service->ID); ?>" class="hover:text-[#B22234]">
                        <?php echo esc_html($service->post_title); ?>
                    </a>
                </h3>
                <?php 
                $hero_desc = get_field('service_hero_description', $service->ID);
                if ($hero_desc): ?>
                <p class="text-gray-600 mb-6 flex-grow"><?php echo esc_html($hero_desc); ?></p>
                <?php endif; ?>
                <a href="<?php echo get_permalink($service->ID); ?>" class="inline-block bg-[#B22234] text-white px-6 py-3 rounded font-medium hover:bg-[#8B1A2B] transition text-center mb-6">
                    Подробнее
                </a>
                <?php 
                $hero_img = get_field('service_hero_image', $service->ID);
                if ($hero_img): ?>
                <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr($service->post_title); ?>" class="rounded-lg w-full h-auto">
                <?php else: ?>
                <img src="https://placehold.co/500x300/f0ebe8/999?text=Service" alt="<?php echo esc_attr($service->post_title); ?>" class="rounded-lg w-full h-auto">
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <p class="text-center text-gray-600">Услуг пока не добавлено.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer();