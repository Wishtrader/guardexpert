<?php
/**
 * Template part for Services Section
 *
 * @package guardexpert
 */

$page_id = get_queried_object_id();

$services_title = get_field( 'front_services_title', $page_id ) ?: 'Основные услуги';
$services_description = get_field( 'front_services_description', $page_id ) ?: 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.';
$big_image = get_field( 'front_services_big_image', $page_id );
$big_title = get_field( 'front_services_big_title', $page_id ) ?: 'Комплексный подход к объекту';
$big_description = get_field( 'front_services_big_description', $page_id ) ?: 'Подбираем оборудование, помогаем с проектированием, внедрением и дальнейшим сопровождением систем безопасности под задачи бизнеса и объекта.';
$big_button = get_field( 'front_services_big_button', $page_id ) ?: 'Получить консультацию';

if ( empty( $big_image ) ) {
	$big_image = get_template_directory_uri() . '/img/serv-i1.png';
}
?>

<!-- Основные услуги -->
    <section class="py-8 md:py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto p-2 md:px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-semibold text-black mb-4"><?php echo esc_html( $services_title ); ?></h2>
                <p class="text-black"><?php echo esc_html( $services_description ); ?></p>
            </div>

			<div class="grid lg:grid-cols-[488px_650px] gap-6">
				<!-- Large Card -->
				<div class="bg-white border border-gray-200 rounded-[2px] p-2 lg:p-4 flex flex-col shadow-md">
					<img src="<?php echo esc_url( $big_image ); ?>" alt="<?php echo esc_attr( $big_title ); ?>" class="w-full h-auto">
					<h3 class="text-[22px] lg:text-2xl font-bold text-black leading-[1.2] mb-3 mt-6"><?php echo esc_html( $big_title ); ?></h3>
					<p class="text-black mb-6 flex-grow"><?php echo esc_html( $big_description ); ?></p>
					<a href="#" class="js-open-consultation inline-block bg-[#B3262E] text-white px-6 py-3 rounded font-medium hover:bg-[#9a1f26] transition text-center mb-2"><?php echo esc_html( $big_button ); ?></a>
				</div>

				<!-- Small Cards Grid -->
				<?php
				$service_cards = get_posts( array(
					'post_type'      => 'services',
					'posts_per_page' => 5,
					'post_status'    => 'publish',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				) );

				if ( $service_cards ) :
				$total = count( $service_cards );
				?>
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
					<?php foreach ( $service_cards as $i => $service ) :
						$icon = get_field( 'service_card_icon', $service->ID );
						$hero_desc = get_field( 'service_hero_description', $service->ID );
						$is_last_full = ( $i === $total - 1 ) && $total % 2 !== 0;
					?>
					<a href="<?php echo esc_url( get_permalink( $service->ID ) ); ?>" class="flex flex-col gap-[10px] items-start bg-white border border-gray-200 rounded-[2px] p-2 md:p-5 shadow-md hover:shadow-lg transition <?php echo $is_last_full ? 'sm:col-span-2' : ''; ?>">
							<div class="flex flex-row md:flex-col justify-center items-start gap-4 md:gap-5">
								<?php if ( $icon ) : ?>
								<img src="<?php echo esc_url( $icon ); ?>" alt="" class="w-[26px] md:h-[52px] md:w-auto object-contain">
							<?php else : ?>
								<i data-lucide="file-text" class="w-5 h-5 text-primary"></i>
							<?php endif; ?>
							<h4 class="font-semibold text-[22px] text-black leading-[1.2]"><?php echo esc_html( $service->post_title ); ?></h4>
						<?php if ( $hero_desc ) : ?>
							</div>
						<p class="text-black pl-[42px] md:pl-0 text-base"><?php echo esc_html( $hero_desc ); ?></p>
						<?php endif; ?>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
        </div>
    </section>

<script>
	if (typeof lucide !== 'undefined') lucide.createIcons();
</script>
