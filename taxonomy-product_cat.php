<?php
/**
 * WooCommerce Archive Product Category Template
 *
 * @package guardexpert
 */

get_header();
?>

<?php
$queried_object = get_queried_object();
$category_title = $queried_object && isset( $queried_object->name ) ? $queried_object->name : '';
?>

<!-- Category Products Section -->
<section class="bg-white py-10 md:py-16">
	<div class="max-w-[1200px] mx-auto px-4">

		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B3262E] transition-colors">Главная</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li><a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="hover:text-[#B3262E] transition-colors">Каталог</a></li>
				<li><span class="text-gray-400">/</span></li>
				<li class="text-black"><?php echo esc_html( $category_title ); ?></li>
			</ol>
		</nav>

		<!-- Page Title -->
		<h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-8">
			<?php echo esc_html( $category_title ); ?>
		</h1>

		<!-- Search and Sort Bar -->
		<div class="border border-gray-200 rounded-lg p-3 md:p-4 flex flex-col md:flex-row items-stretch md:items-center gap-3 md:gap-4 mb-10">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative flex-1">
				<label for="category-search" class="sr-only">Поиск по каталогу</label>
				<span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
					<ion-icon name="search-outline" class="text-xl"></ion-icon>
				</span>
				<input
					type="search"
					id="category-search"
					name="s"
					placeholder="Поиск по каталогу"
					class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded bg-white focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors"
				>
			</form>
			<div class="relative md:w-64">
				<label for="category-sort" class="sr-only">Сортировка</label>
				<select
					id="category-sort"
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

		<!-- Products Grid (static for now) -->
		<?php
		$static_products = array(
			array(
				'slug'    => 'signal-20p-1',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
			array(
				'slug'    => 'signal-20p-2',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
			array(
				'slug'    => 'signal-20p-3',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
			array(
				'slug'    => 'signal-20p-4',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
			array(
				'slug'    => 'signal-20p-5',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
			array(
				'slug'    => 'signal-20p-6',
				'title'   => 'Прибор приемно-контрольный Сигнал-20П',
				'specs'   => array( '4 шлейфа сигнализации', 'Питание 12В', 'Память событий 2048' ),
				'image'   => 'product01.png',
			),
		);
		?>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
			<?php foreach ( $static_products as $static_product ) :
				$product_url = add_query_arg( 'static_product', $static_product['slug'], home_url( '/' ) );
			?>
			<div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">
				<a href="<?php echo esc_url( $product_url ); ?>" class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/' . $static_product['image'] ); ?>" alt="<?php echo esc_attr( $static_product['title'] ); ?>" class="w-full h-full object-contain">
				</a>
				<div class="p-4 md:p-5 flex flex-col flex-1">
					<h3 class="text-lg font-bold text-black mb-3">
						<a href="<?php echo esc_url( $product_url ); ?>" class="hover:text-[#B3262E] transition-colors"><?php echo esc_html( $static_product['title'] ); ?></a>
					</h3>
					<p class="text-sm text-gray-600 mb-2">Приборы приемно-контрольные</p>
					<ul class="space-y-1 mb-4 text-sm text-gray-700">
						<?php foreach ( $static_product['specs'] as $spec ) : ?>
							<li class="flex items-start gap-2">
								<span class="text-[#B3262E]">•</span>
								<span><?php echo esc_html( $spec ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<div class="mt-auto">
						<p class="text-xl font-bold text-[#B3262E] mb-4">ООО BYN</p>
						<button type="button" class="w-full bg-[#B3262E] text-white px-6 py-3 rounded hover:bg-[#9a1f26] transition-colors text-base font-medium shadow-lg outline-none border-none">
							В корзину
						</button>
						<a href="<?php echo esc_url( $product_url ); ?>" class="w-full inline-flex items-center justify-center bg-white text-[#B3262E] border-2 border-[#B3262E] px-6 py-3 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-base font-medium mt-3">
							Подробнее
						</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- Pagination -->
		<nav class="flex items-center justify-center gap-2 mb-12" aria-label="Pagination">
			<a href="#" class="flex items-center justify-center w-10 h-10 text-[#B3262E] hover:bg-gray-100 rounded transition-colors" aria-label="Назад">
				<ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>
			</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-white bg-[#B3262E] rounded font-semibold" aria-current="page">1</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-black hover:bg-gray-100 rounded transition-colors">2</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-black hover:bg-gray-100 rounded transition-colors">3</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-black hover:bg-gray-100 rounded transition-colors">4</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-black hover:bg-gray-100 rounded transition-colors">5</a>
			<a href="#" class="flex items-center justify-center w-10 h-10 text-[#B3262E] hover:bg-gray-100 rounded transition-colors" aria-label="Вперед">
				Вперед
				<ion-icon name="chevron-forward-outline" class="text-xl ml-1"></ion-icon>
			</a>
		</nav>

	</div>
</section>

<?php
get_footer();
