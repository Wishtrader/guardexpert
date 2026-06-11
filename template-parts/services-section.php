<?php
/**
 * Template part for Services Section
 *
 * @package guardexpert
 */
?>

<!-- Основные услуги -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Основные услуги</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.</p>
            </div>

			<div class="grid lg:grid-cols-[488px_650px] gap-6">
				<!-- Large Card -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 flex flex-col">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/serv-i1.png' ); ?>" alt="Комплексный подход" class=w-full h-auto">
					<h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 mt-6">Комплексный подход к объекту</h3>
					<p class="text-gray-600 mb-6 flex-grow">Подбираем оборудование, помогаем с проектированием, внедрением и дальнейшим сопровождением систем безопасности под задачи бизнеса и объекта.</p>
					<a href="#" class="js-open-consultation inline-block bg-[#B3262E] text-white px-6 py-3 rounded font-medium hover:bg-[#9a1f26] transition text-center mb-6">Получить консультацию</a>
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
					<a href="<?php echo esc_url( get_permalink( $service->ID ) ); ?>" class="flex flex-col gap-[20px] items-start bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition <?php echo $is_last_full ? 'sm:col-span-2' : ''; ?>">
							<?php if ( $icon ) : ?>
								<img src="<?php echo esc_url( $icon ); ?>" alt="" class="h-[52px] object-contain">
							<?php else : ?>
								<i data-lucide="file-text" class="w-5 h-5 text-primary"></i>
							<?php endif; ?>
						<div class="flex flex-col gap-[10px]">
							<h4 class="font-bold md:text-[22px] text-gray-900"><?php echo esc_html( $service->post_title ); ?></h4>
						<?php if ( $hero_desc ) : ?>
						<p class="text-gray-600 text-base"><?php echo esc_html( $hero_desc ); ?></p>
						</div>
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
