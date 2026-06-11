<?php
/**
 * Template Name: Catalog
 *
 * @package guardexpert
 */

get_header();
?>

<!-- Catalog Section -->
<section class="bg-white py-10 md:py-16">
	<div class="max-w-[1200px] mx-auto px-4">

		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B3262E] transition-colors">Главная</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li class="text-black">Каталог</li>
			</ol>
		</nav>

		<!-- Page Title -->
		<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4">
			Каталог оборудования
		</h1>
		<p class="text-base md:text-lg text-gray-700 max-w-2xl mb-8">
			Оборудование для ОПС, СКУД, видеонаблюдения и сопутствующих инженерных решений с возможностью под задачу и объект.
		</p>

		<!-- Search and Sort Bar -->
		<div class="border border-gray-200 rounded-lg p-3 md:p-4 flex flex-col lg:flex-row items-stretch md:items-center gap-3 md:gap-4 mb-10">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative flex-1">
				<label for="catalog-search" class="sr-only">Поиск по каталогу</label>
				<span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
					<ion-icon name="search-outline" class="text-xl"></ion-icon>
				</span>
				<input
					type="search"
					id="catalog-search"
					name="s"
					placeholder="Поиск по каталогу"
					class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded bg-white focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors"
				>
			</form>
			<div class="relative md:w-64">
				<label for="catalog-sort" class="sr-only">Сортировка</label>
				<select
					id="catalog-sort"
					class="w-full appearance-none pl-4 pr-10 py-3 border border-gray-200 rounded bg-white focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors cursor-pointer"
				>
					<option value="popular">Сначала популярные</option>
					<option value="name-asc">По названию (А-Я)</option>
					<option value="name-desc">По названию (Я-А)</option>
				</select>
				<span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#B3262E] pointer-events-none">
					<ion-icon name="chevron-down-outline" class="text-xl"></ion-icon>
				</span>
			</div>
		</div>

		<?php
		$product_categories = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
			'orderby'    => 'menu_order',
			'order'      => 'ASC',
		) );
		?>

		<?php if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) : ?>
		<!-- Categories Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
			<?php foreach ( $product_categories as $category ) :
				if ( $category->name === 'Uncategorized' ) continue;
				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$image_url    = $thumbnail_id ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : '';
			?>
			<a href="<?php echo esc_url( guardexpert_get_category_url( $category ) ); ?>" class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group flex flex-col">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<?php if ( $image_url ) : ?>
						<img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-contain">
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/cat-placeholder.png" alt="<?php echo esc_attr( $category->name ); ?>" class="w-full h-full object-contain">
					<?php endif; ?>
				</div>
				<div class="p-4 md:p-6 flex flex-col flex-1">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						<?php echo esc_html( $category->name ); ?>
					</h3>
					<p class="text-sm text-gray-600 mb-4 flex-1">
						<?php echo esc_html( $category->description ); ?>
					</p>
					<span class="inline-flex items-center gap-1 text-[#B3262E] font-semibold text-base">
						<ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
					</span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>
		<?php else : ?>
		<p class="text-center text-gray-600 py-12">Категории пока не добавлены.</p>
		<?php endif; ?>

		<!-- Bottom CTA -->
		<div class="border-t border-gray-200 pt-10 mt-6">
			<div class="flex flex-col lg:flex-row items-center gap-6 md:gap-8">
				<div class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 flex items-center justify-center text-[#B3262E]">
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
					<a href="#" class="js-open-consultation inline-flex items-center justify-center gap-2 bg-[#B3262E] text-white px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#9a1f26] transition-colors text-base md:text-lg shadow-lg whitespace-nowrap">
						Получить консультацию
					</a>
					<a href="#contacts" class="inline-flex items-center justify-center gap-2 bg-white text-[#B3262E] border-2 border-[#B3262E] px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-base md:text-lg whitespace-nowrap">
						Связаться с нами
					</a>
				</div>
			</div>
		</div>

	</div>
</section>

<?php
get_footer();
