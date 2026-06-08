<?php
/**
 * WooCommerce Archive Product Category Template
 *
 * @package guardexpert
 */

get_header();

$queried_object = get_queried_object();
$category_title = $queried_object && isset( $queried_object->name ) ? $queried_object->name : '';
$category_id = $queried_object ? $queried_object->term_id : 0;

// Get products from current category
$products = get_posts( array(
	'post_type'      => 'product',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $category_id,
		),
	),
) );
?>

<!-- Category Products Section -->
<section class="bg-white py-10 md:py-16">
	<div class="max-w-[1200px] mx-auto px-4">

		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B22234] transition-colors">Главная</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li><a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="hover:text-[#B22234] transition-colors">Каталог</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li class="text-black"><?php echo esc_html( $category_title ); ?></li>
			</ol>
		</nav>

		<!-- Page Title -->
		<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-8">
			<?php echo esc_html( $category_title ); ?>
		</h1>

		<?php if ( $products ): ?>
		<!-- Products Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
			<?php foreach ( $products as $product_post ): ?>
			<?php
			$product = wc_get_product( $product_post->ID );
			if ( ! $product ) continue;
			$product_url = get_permalink( $product_post->ID );
			$thumbnail = get_the_post_thumbnail( $product_post->ID, 'medium', array( 'class' => 'w-full h-full object-contain' ) );
			if ( ! $thumbnail ) {
				$thumbnail = '<img src="https://placehold.co/300x300/f0ebe8/999?text=Product" alt="' . esc_attr( $product->get_name() ) . '" class="w-full h-full object-contain">';
			}
			$categories = get_the_terms( $product_post->ID, 'product_cat' );
			$category_name = $categories && is_array( $categories ) ? $categories[0]->name : '';
			$price_html = $product->get_price();
			?>
			<div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">
				<a href="<?php echo esc_url( $product_url ); ?>" class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<?php echo $thumbnail; ?>
				</a>
				<div class="p-4 md:p-5 flex flex-col flex-1">
					<h3 class="text-lg font-bold text-black mb-3">
						<a href="<?php echo esc_url( $product_url ); ?>" class="hover:text-[#B22234] transition-colors"><?php echo esc_html( $product->get_name() ); ?></a>
					</h3>
					<?php if ( $category_name ): ?>
					<p class="text-sm text-gray-600 mb-2"><?php echo esc_html( $category_name ); ?></p>
					<?php endif; ?>
					<?php if ( $price_html ): ?>
					<p class="text-xl font-bold text-[#B22234] mb-4"><?php echo $product->get_price_html(); ?></p>
					<?php else: ?>
					<p class="text-lg font-bold text-[#B22234] mb-4">Цена по запросу</p>
					<?php endif; ?>
					<div class="mt-auto space-y-2">
						<?php if ( $price_html ): ?>
						<a href="<?php echo esc_url( $product_url ); ?>?add-to-cart=<?php echo $product_post->ID; ?>" class="w-full bg-[#B22234] text-white px-6 py-3 rounded hover:bg-[#8B1A2B] transition-colors text-base font-medium shadow-lg outline-none border-none text-center inline-block" data-quantity="1">
							В корзину
						</a>
						<?php endif; ?>
						<a href="<?php echo esc_url( $product_url ); ?>" class="w-full inline-flex items-center justify-center bg-white text-[#B22234] border-2 border-[#B22234] px-6 py-3 rounded hover:bg-[#B22234] hover:text-white transition-colors text-base font-medium">
							Подробнее
						</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php else: ?>
		<div class="text-center py-12">
			<p class="text-gray-600 text-lg">В этой категории пока нет товаров</p>
		</div>
		<?php endif; ?>

	</div>
</section>

<script>
	lucide.createIcons();
</script>
<?php
get_footer();