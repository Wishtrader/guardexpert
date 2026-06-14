<?php
/**
 * Single Product Page Template
 *
 * @package guardexpert
 */

get_header();

// Get product properly
$product_id = get_the_ID();
$product = wc_get_product( $product_id );

if ( ! $product ) :
	?>
	<section class="py-12 lg:py-16 bg-white">
		<div class="max-w-[1200px] mx-auto px-4">
			<h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Товар не найден</h1>
			<p class="text-gray-600">Запрашиваемый товар не существует или недоступен.</p>
		</div>
	</section>
	<?php
	get_footer();
	return;
endif;

// Breadcrumbs
$breadcrumbs = array(
	array( 'name' => 'Главная', 'url' => home_url( '/' ) ),
	array( 'name' => 'Каталог', 'url' => guardexpert_get_catalog_url() ),
);
$terms = get_the_terms( $product_id, 'product_cat' );
if ( $terms && ! is_wp_error( $terms ) ) {
	$breadcrumbs[] = array( 'name' => $terms[0]->name, 'url' => guardexpert_get_category_url( $terms[0] ) );
}
$breadcrumbs[] = array( 'name' => get_the_title(), 'url' => '' );

// Product data
$product_title = $product->get_name();
$short_desc = $product->get_short_description();
$price_html = $product->get_price_html();
$has_price = $product->get_price();
$gallery_images = $product->get_gallery_image_ids();
$main_image_id = $product->get_image_id();
$all_images = array();
if ( $main_image_id ) {
	$all_images[] = $main_image_id;
}
$all_images = array_merge( $all_images, $gallery_images );
$categories = get_the_terms( $product_id, 'product_cat' );
$category_name = $categories && is_array( $categories ) ? $categories[0]->name : '';
$category_url = $categories ? guardexpert_get_category_url( $categories[0] ) : '';
?>

<!-- Single Product Section -->
<section class="bg-white py-6 md:py-10">
	<div class="max-w-[1200px] mx-auto px-4">

		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<?php foreach ( $breadcrumbs as $index => $crumb ) : ?>
					<?php if ( $index > 0 ) : ?>
						<li><span class="text-gray-400">/</span></li>
					<?php endif; ?>
					<li>
						<?php if ( $crumb['url'] && $index < count( $breadcrumbs ) - 1 ) : ?>
							<a href="<?php echo esc_url( $crumb['url'] ); ?>" class="hover:text-[#B22234] transition-colors"><?php echo esc_html( $crumb['name'] ); ?></a>
						<?php else : ?>
							<span class="text-black"><?php echo esc_html( $crumb['name'] ); ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</nav>

		<!-- Top Section: Gallery + Info -->
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 mb-12">

			<!-- Gallery -->
			<div>
				<div class="bg-white border border-gray-200 rounded-lg p-6 mb-4">
					<div class="aspect-square flex items-center justify-center">
						<?php if ( $all_images ) : ?>
							<img id="product-main-image" src="<?php echo esc_url( wp_get_attachment_image_url( $all_images[0], 'medium' ) ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" class="max-w-full max-h-full object-contain">
						<?php else : ?>
							<img id="product-main-image" src="https://placehold.co/400x400/f0ebe8/999?text=Product" alt="<?php echo esc_attr( $product_title ); ?>" class="max-w-full max-h-full object-contain">
						<?php endif; ?>
					</div>
				</div>
				<?php if ( count( $all_images ) > 1 ): ?>
				<div class="relative">
					<button type="button" id="gallery-prev" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center text-[#B22234] hover:bg-gray-100 rounded-full transition-colors outline-none border-none bg-white/80" aria-label="Предыдущее изображение">
						<ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon>
					</button>
					<div id="gallery-thumbs" class="flex items-center gap-2 overflow-x-auto px-8 scroll-smooth">
						<?php foreach ( $all_images as $index => $img_id ) : ?>
							<button type="button" class="gallery-thumb flex-shrink-0 w-20 h-20 md:w-24 md:h-24 bg-white border-2 <?php echo 0 === $index ? 'border-[#B22234]' : 'border-gray-200'; ?> rounded p-2 hover:border-[#B22234] transition-colors outline-none" data-image="<?php echo esc_attr( wp_get_attachment_image_url( $img_id, 'medium' ) ); ?>">
								<img src="<?php echo esc_url( wp_get_attachment_image_url( $img_id, 'thumbnail' ) ); ?>" alt="Thumbnail <?php echo esc_attr( $index + 1 ); ?>" class="w-full h-full object-contain">
							</button>
						<?php endforeach; ?>
					</div>
					<button type="button" id="gallery-next" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center text-[#B22234] hover:bg-gray-100 rounded-full transition-colors outline-none border-none bg-white/80" aria-label="Следующее изображение">
						<ion-icon name="chevron-forward-outline" class="text-2xl"></ion-icon>
					</button>
				</div>
				<?php endif; ?>
			</div>

			<!-- Product Info -->
			<div>
				<?php if ( $category_url && $category_name ): ?>
				<a href="<?php echo esc_url( $category_url ); ?>" class="text-sm text-[#B22234] hover:underline mb-2 inline-block">
					<?php echo esc_html( $category_name ); ?>
				</a>
				<?php endif; ?>
				<h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-black mb-4 leading-tight">
					<?php echo esc_html( $product_title ); ?>
				</h1>
				<?php if ( $short_desc ): ?>
				<p class="text-base text-gray-700 mb-6 leading-relaxed">
					<?php echo wp_kses_post( $short_desc ); ?>
				</p>
				<?php endif; ?>
				<p class="text-2xl font-bold text-[#B22234] mb-6" id="product-total-price" data-price="<?php echo esc_attr( $product->get_price() ); ?>" data-currency="BYN">
					<?php if ( $has_price ) : ?>
						<?php echo wc_price( $product->get_price(), array( 'currency' => 'BYN' ) ); ?> <span class="text-base font-normal text-gray-600">(Без НДС)</span>
					<?php else : ?>
						Цена по запросу
					<?php endif; ?>
				</p>

				<hr class="border-gray-200 mb-4">

				<?php
				$product_attributes = $product->get_attributes();
				if ( $product_attributes ) :
					$count = 0;
				?>
				<div class="mb-4 space-y-2">
					<?php foreach ( $product_attributes as $attr_name => $attr ) :
						if ( $count >= 4 ) break;
						$attr_value = $product->get_attribute( $attr_name );
						if ( is_array( $attr_value ) ) {
							$attr_value = implode( ', ', $attr_value );
						}
						$attr_value = urldecode( $attr_value );
						if ( empty( $attr_value ) ) continue;
						$count++;
					?>
					<div class="text-base text-gray-700">
						<span class="font-semibold text-black"><?php echo esc_html( str_replace( '-', ' ', urldecode( wc_attribute_label( $attr_name ) ) ) ); ?>:</span>
						<?php echo esc_html( $attr_value ); ?>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				
			<form class="cart mb-0" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
				<button type="submit" class="w-full bg-[#B22234] text-white px-8 py-4 rounded hover:bg-[#8B1A2B] transition-colors text-[15px] shadow-lg outline-none border-none mb-[10px] <?php echo $has_price ? '' : 'hidden'; ?>">
					В корзину
				</button>
				<input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>" />
				<input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>" />
				<input type="hidden" name="quantity" value="1" />
			</form>
				
				<a href="#" class="js-open-consultation w-full inline-flex items-center justify-center bg-white text-[#B22234] border-[1px] border-[#B22234] px-8 py-4 rounded hover:bg-[#B22234] hover:text-white transition-colors text-[15px]">
					Получить консультацию
				</a>
			</div>
		</div>

		<!-- Tabs -->
		<div class="border border-gray-200 rounded-lg overflow-hidden mb-12">
			<div class="flex border-b border-gray-200 overflow-x-auto" role="tablist">
				<button type="button" class="product-tab flex-1 min-w-[140px] px-6 py-4 text-base font-medium transition-colors outline-none border-none bg-white text-[#B22234] border-b-2 border-[#B22234] -mb-px" data-tab="description" role="tab" aria-selected="true">
					Описание
				</button>
				<button type="button" class="product-tab flex-1 min-w-[140px] px-6 py-4 text-base font-medium transition-colors outline-none border-none bg-white text-gray-700 hover:text-[#B22234]" data-tab="specs" role="tab" aria-selected="false">
					Характеристики
				</button>
				<button type="button" class="product-tab flex-1 min-w-[140px] px-6 py-4 text-base font-medium transition-colors outline-none border-none bg-white text-gray-700 hover:text-[#B22234]" data-tab="delivery" role="tab" aria-selected="false">
					Доставка и оплата
				</button>
			</div>
			
			<div class="product-tab-content p-6 md:p-8 text-base text-gray-700 leading-relaxed" data-tab-content="description" role="tabpanel">
				<?php the_content(); ?>
			</div>
			
			<div class="product-tab-content p-6 md:p-8 text-base text-gray-700 leading-relaxed hidden" data-tab-content="specs" role="tabpanel">
				<?php
				$attributes = $product->get_attributes();
				if ( $attributes ):
				?>
				<div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-3">
					<?php foreach ( $attributes as $attribute_name => $attribute ) : ?>
						<?php
						$attr_value = $product->get_attribute( $attribute_name );
						if ( is_array( $attr_value ) ) {
							$attr_value = implode( ', ', $attr_value );
						}
						$attr_value = urldecode( $attr_value );
						?>
						<div class="flex justify-between border-b border-gray-200 py-2">
							<span class="text-gray-700"><?php echo urldecode( wc_attribute_label( $attribute_name ) ); ?></span>
							<span class="font-semibold text-black"><?php echo esc_html( $attr_value ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
				<?php else: ?>
				<p>Характеристики не указаны</p>
				<?php endif; ?>
			</div>
			
			<div class="product-tab-content p-6 md:p-8 text-base text-gray-700 leading-relaxed hidden" data-tab-content="delivery" role="tabpanel">
				<?php
				$delivery_content = get_field( 'product_delivery_content' );
				if ( $delivery_content ) :
					echo wp_kses_post( $delivery_content );
				else :
				?>
					<p><strong>Доставка по Беларуси</strong></p>
					<p>Доставка осуществляется курьерской службой по всей территории Республики Беларусь. Срок доставки — от 1 до 5 рабочих дней в зависимости от региона.</p>
					<p><strong>Способы оплаты</strong></p>
					<ul class="list-disc pl-5 space-y-1">
						<li>Наличный расчёт при получении</li>
						<li>Безналичный расчёт для юридических лиц</li>
						<li>Оплата банковской картой онлайн</li>
						<li>Рассрочка и кредит (уточняйте у менеджера)</li>
					</ul>
					<p><strong>Самовывоз</strong></p>
					<p>г. Минск, ул. Ольшевского 22, помещение 7, каб. 34. Перед приездом согласуйте время с менеджером.</p>
				<?php endif; ?>
			</div>
		</div>

		<!-- Related Products -->
		<?php
		$related_products = wc_get_related_products( get_the_ID(), 3 );
		if ( $related_products ):
		?>
		<h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-black mb-8">Сопутствующие товары</h2>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
			<?php foreach ( $related_products as $related_id ) : ?>
				<?php
				$related = wc_get_product( $related_id );
				if ( ! $related ) continue;
				$related_price = $related->get_price_html();
				?>
				<div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">
					<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
						<?php echo $related->get_image( 'medium', array( 'class' => 'w-full h-full object-contain' ) ); ?>
					</a>
					<div class="p-4 md:p-5 flex flex-col flex-1">
						<h3 class="text-lg font-bold text-black mb-3">
							<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="hover:text-[#B22234] transition-colors"><?php echo esc_html( $related->get_name() ); ?></a>
						</h3>
						<p class="text-xl font-bold text-[#B22234] mb-4"><?php echo $related_price ? $related_price : 'Цена по запросу'; ?></p>
						<div class="mt-auto">
							<a href="<?php echo esc_url( get_permalink( $related_id ) ); ?>" class="w-full inline-flex items-center justify-center bg-white text-[#B22234] border-2 border-[#B22234] px-6 py-3 rounded hover:bg-[#B22234] hover:text-white transition-colors text-base font-medium">
								Подробнее
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>
</section>

<!-- Bottom CTA -->
<section class="bg-white border-t border-gray-200 py-8">
	<div class="max-w-[1200px] mx-auto px-4">
		<div class="flex flex-col lg:flex-row items-center gap-6 md:gap-8">
			<div class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 flex items-center justify-center text-[#B22234]">
				<ion-icon name="help-circle-outline" class="text-5xl md:text-6xl"></ion-icon>
			</div>
			<div class="flex-1 text-center md:text-left">
				<h3 class="text-xl md:text-2xl font-bold text-black mb-2">
					Нужна помощь с подбором оборудования?
				</h3>
				<p class="text-base text-gray-700">
					Поможем подобрать решение по задаче, совместимости, стоимости и поставке.
				</p>
			</div>
			<div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
					<a href="#" class="js-open-consultation inline-flex items-center justify-center gap-2 bg-[#B22234] text-white px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#8B1A2B] transition-colors text-base md:text-lg shadow-lg whitespace-nowrap">
					Получить консультацию
				</a>
				<a href="/contact" class="inline-flex items-center justify-center gap-2 bg-white text-[#B22234] border-2 border-[#B22234] px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#B22234] hover:text-white transition-colors text-base md:text-lg whitespace-nowrap">
					Связаться с нами
				</a>
			</div>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	// Tabs
	const tabButtons = document.querySelectorAll('.product-tab');
	const tabContents = document.querySelectorAll('.product-tab-content');

	tabButtons.forEach(function(btn) {
		btn.addEventListener('click', function() {
			const target = this.getAttribute('data-tab');

			tabButtons.forEach(function(b) {
				b.classList.remove('text-[#B22234]', 'border-b-2', 'border-[#B22234]', '-mb-px');
				b.classList.add('text-gray-700');
				b.setAttribute('aria-selected', 'false');
			});
			tabContents.forEach(function(c) { c.classList.add('hidden'); });

			this.classList.remove('text-gray-700');
			this.classList.add('text-[#B22234]', 'border-b-2', 'border-[#B22234]', '-mb-px');
			this.setAttribute('aria-selected', 'true');

			const content = document.querySelector('[data-tab-content="' + target + '"]');
			if (content) content.classList.remove('hidden');
		});
	});

	// Gallery
	const thumbs = document.querySelectorAll('.gallery-thumb');
	const mainImage = document.getElementById('product-main-image');

	if ( thumbs.length && mainImage ) {
		thumbs.forEach(function(thumb) {
			thumb.addEventListener('click', function() {
				const imgSrc = this.getAttribute('data-image');
				if ( imgSrc ) {
					mainImage.src = imgSrc;
				}
				thumbs.forEach(function(t) { t.classList.remove('border-[#B22234]'); t.classList.add('border-gray-200'); });
				this.classList.remove('border-gray-200');
				this.classList.add('border-[#B22234]');
			});
		});
	}

	// Gallery navigation
	const prevBtn = document.getElementById('gallery-prev');
	const nextBtn = document.getElementById('gallery-next');
	const thumbsContainer = document.getElementById('gallery-thumbs');
	let scrollAmount = 100;

	if (prevBtn && thumbsContainer) {
		prevBtn.addEventListener('click', function() {
			thumbsContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
		});
	}
	if (nextBtn && thumbsContainer) {
		nextBtn.addEventListener('click', function() {
			thumbsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
		});
	}


});
</script>

<?php
get_footer();