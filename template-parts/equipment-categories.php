<?php
/**
 * Template part for Equipment Categories Section
 *
 * @package guardexpert
 */
?>

<!-- Equipment Categories Section -->
<section class="bg-[#FAF9F7] py-16 md:py-20">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Section Header -->
		<div class="text-center mb-12">
			<h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4">
				Категории оборудования
			</h2>
			<p class="text-base md:text-lg text-gray-700">
				Оборудование для систем безопасности
			</p>
		</div>

		<?php
		$product_categories = get_terms(array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'orderby'    => 'menu_order',
			'order'      => 'ASC',
		));
		?>

		<!-- Categories Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
			<?php foreach ($product_categories as $category) : 
				if ( $category->name === 'Uncategorized' ) continue;
				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$image_url = $thumbnail_id ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : '';
			?>
			<a href="<?php echo esc_url( guardexpert_get_category_url( $category ) ); ?>" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<?php if ( $image_url ) : ?>
						<img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-contain">
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/cat-placeholder.png" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-contain">
					<?php endif; ?>
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						<?php echo esc_html( $category->name ); ?>
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						<?php echo esc_html( $category->description ); ?>
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>
			<?php endforeach; ?>
		</div>

		<!-- Action Buttons -->
		<div class="flex flex-col sm:flex-row gap-4 justify-center">
			<a href="/catalog" class="inline-flex items-center justify-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg">
				<ion-icon name="apps-outline" class="text-2xl"></ion-icon>
				Смотреть весь каталог
			</a>
			<a href="#" class="js-open-consultation inline-flex items-center justify-center gap-3 bg-white text-[#B3262E] border-2 border-[#B3262E] px-8 py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-lg">
				Получить консультацию
			</a>
		</div>
	</div>
</section>
