<?php
/**
 * Generic Taxonomy Template (fallback for any custom taxonomy).
 *
 * @package guardexpert
 */

get_header();
?>

<section class="bg-white py-10 md:py-16">
	<div class="max-w-[1200px] mx-auto px-4">

		<?php
		$queried_object = get_queried_object();
		$term_title     = ( $queried_object && ! is_wp_error( $queried_object ) && isset( $queried_object->name ) ) ? $queried_object->name : 'Категория';
		$term_desc      = ( $queried_object && ! is_wp_error( $queried_object ) && ! empty( $queried_object->description ) ) ? $queried_object->description : '';
		?>

		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B3262E] transition-colors">Главная</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li><a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="hover:text-[#B3262E] transition-colors">Каталог</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li class="text-black"><?php echo esc_html( $term_title ); ?></li>
			</ol>
		</nav>

		<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4">
			<?php echo esc_html( $term_title ); ?>
		</h1>

		<?php if ( $term_desc ) : ?>
			<p class="text-base md:text-lg text-gray-700 max-w-2xl mb-8">
				<?php echo esc_html( $term_desc ); ?>
			</p>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">
						<a href="<?php the_permalink(); ?>" class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-contain' ) ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/img/cat-placeholder.png' ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-contain">
							<?php endif; ?>
						</a>
						<div class="p-4 md:p-5 flex flex-col flex-1">
							<h3 class="text-lg font-bold text-black mb-3">
								<a href="<?php the_permalink(); ?>" class="hover:text-[#B3262E] transition-colors"><?php the_title(); ?></a>
							</h3>
							<?php if ( has_excerpt() ) : ?>
								<p class="text-sm text-gray-600 mb-4"><?php echo esc_html( get_the_excerpt() ); ?></p>
							<?php endif; ?>
							<div class="mt-auto">
								<?php if ( function_exists( 'wc_get_product' ) ) : ?>
									<?php $product = wc_get_product( get_the_ID() ); ?>
									<?php if ( $product ) : ?>
										<p class="text-xl font-bold text-[#B3262E] mb-4"><?php echo $product->get_price_html(); ?></p>
									<?php endif; ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="w-full inline-flex items-center justify-center bg-white text-[#B3262E] border-2 border-[#B3262E] px-6 py-3 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-base font-medium">
									Подробнее
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

			<?php
			the_posts_pagination( array(
				'prev_text' => '<ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>',
				'next_text' => '<ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>',
				'mid_size'  => 2,
			) );
			?>

		<?php else : ?>
			<p class="text-center text-gray-600 py-12">В этой категории пока нет товаров.</p>
		<?php endif; ?>

	</div>
</section>

<?php
get_footer();
