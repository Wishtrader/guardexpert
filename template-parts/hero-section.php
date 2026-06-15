<?php
/**
 * Template part for Hero Section
 *
 * @package guardexpert
 */
?>

<?php
/**
 * Template part for Hero Section
 *
 * @package guardexpert
 */

$category_names = array( 'ОПС', 'СКУД', 'Видеонаблюдение', 'СОП', 'Контролеры доступа', 'Извещатели', 'Видеокамеры', 'Замки' );
$category_links = array();
foreach ( $category_names as $name ) {
	$term = get_term_by( 'name', $name, 'product_cat' );
	$category_links[ $name ] = $term && ! is_wp_error( $term )
		? get_term_link( $term )
		: guardexpert_get_catalog_url();
}

// Per-page custom fields
$page_id = get_queried_object_id();

if ( is_page() && $page_id > 0 ) {
	$hero_title = get_field( 'front_hero_title', $page_id );
	$hero_description = get_field( 'front_hero_description', $page_id );
	$hero_image = get_field( 'front_hero_image', $page_id );
	$hero_image_mobile = get_field( 'front_hero_image_mobile', $page_id );
	$hero_bg = get_field( 'front_hero_bg', $page_id );
}
if ( empty( $hero_title ) ) {
	$hero_title = 'Оборудование систем безопасности для бизнеса и объектов по всей Беларуси';
}
if ( empty( $hero_description ) ) {
	$hero_description = 'Поставка оборудования для ОПС, СКУД и видеонаблюдения. Помогаем подобрать решения под объект, задачи и совместимость оборудования.';
}
if ( empty( $hero_image ) ) {
	$hero_image = get_template_directory_uri() . '/img/h1.png';
}
if ( empty( $hero_image_mobile ) ) {
	$hero_image_mobile = get_template_directory_uri() . '/img/hero-main.png';
}
if ( empty( $hero_bg ) ) {
	$hero_bg = get_template_directory_uri() . '/img/hero-bg.png';
}
?>

<!-- Hero Section -->
<section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px]" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; margin-left: calc(-50vw + 50%);">
	

	<div class="max-w-[1200px] mx-auto px-4 md:px-0 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
		<!-- Desktop Layout -->
		<div class="hidden lg:grid lg:grid-cols-12 gap-8 items-center">
			<!-- Left Column: Text Content (5 columns) -->
			<div class="lg:col-span-6">
				<h1 class="text-4xl xl:text-5xl font-bold text-black mb-6 leading-tight">
					<?php echo esc_html( $hero_title ); ?>
				</h1>
				<p class="text-base xl:text-lg text-gray-700 mb-8 leading-relaxed">
					<?php echo esc_html( $hero_description ); ?>
				</p>
				<a href="/catalog" class="inline-flex items-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg">
					<ion-icon name="grid-outline" class="text-2xl"></ion-icon>
					Перейти в каталог
				</a>
			</div>

			<!-- Center Column: Main Image (4 columns) -->
			<div class="lg:col-span-3">
				<img src="<?php echo esc_url( $hero_image ); ?>" alt="Оборудование систем безопасности" class="w-full max-w-[285px] max-h-[612px] rounded-lg shadow-xl">
			</div>

			<!-- Right Column: Category Cards (3 columns) -->
			<div class="lg:col-span-3 space-y-4">
				<!-- ОПС -->
				<a href="<?php echo esc_url( $category_links['ОПС'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-bold text-black mb-3">ОПС</h3>
						<p class="text-xs md:text-[14px] text-gray-600">Охранно-пожарная сигнализация</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-16 h-16 object-contain">
				</a>

				<!-- СКУД -->
				<a href="<?php echo esc_url( $category_links['СКУД'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-bold text-black mb-3">СКУД</h3>
						<p class="text-xs md:text-[14px] text-gray-600">Система контроля и управления доступом</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-16 object-contain">
				</a>

				<!-- Видеонаблюдение -->
				<a href="<?php echo esc_url( $category_links['Видеонаблюдение'] ); ?>" class="bg-white rounded-lg p-4 pb-0 shadow-lg hover:shadow-xl transition-shadow flex flex-col items-end gap-3 group">
					<div class="flex-1">
						<h3 class="text-lg md:text-[26px] font-bold text-black mb-3">Видеонаблюдение</h3>
						<p class="text-xs md:text-[14px] text-gray-600">Камеры, регистраторы и аналитика</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-20 h-16 md:w-[140px] md:-mt-12 md:h-auto object-contain">
				</a>

				<!-- СОП -->
				<a href="<?php echo esc_url( $category_links['СОП'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-bold text-black mb-3">СОП</h3>
						<p class="text-xs md:text-[14px] text-gray-600">Система охраны периметра</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/соп.png" alt="СОП" class="w-16 h-16 object-contain">
				</a>
			</div>
		</div>

		<!-- Bottom Product Links - Desktop -->
		<div class="hidden lg:grid lg:grid-cols-4 gap-4 mt-[20px]">
			<a href="<?php echo esc_url( $category_links['Контролеры доступа'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Контролеры доступа</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Извещатели'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Извещатели" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Извещатели</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Видеокамеры'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Видеокамеры" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Видеокамеры</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Замки'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Замки" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Замки</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>
		</div>

		<!-- Mobile Layout -->
		<div class="lg:hidden space-y-4 mt-8">
			<!-- ОПС & СКУД -->
			<div class="grid grid-cols-2 gap-4">
				<a href="<?php echo esc_url( $category_links['ОПС'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-start justify-between mb-2">
						<h3 class="text-xl font-bold text-black">ОПС</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-12 h-12 object-contain">
					</div>
					<p class="text-xs text-gray-600">Охранно-пожарная сигнализация</p>
				</a>

				<a href="<?php echo esc_url( $category_links['СКУД'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-start justify-between mb-2">
						<h3 class="text-xl font-bold text-black">СКУД</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-12 object-contain">
					</div>
					<p class="text-xs text-gray-600">Система контроля и управления доступом</p>
				</a>
			</div>

			<!-- Видеонаблюдение & СОП -->
			<div class="grid grid-cols-2 gap-4">
				<a href="<?php echo esc_url( $category_links['Видеонаблюдение'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<h3 class="text-lg font-bold text-black mb-1">Видеонаблюдение</h3>
					<p class="text-xs text-gray-600 mb-2">Камеры, регистраторы и аналитика</p>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-full h-16 object-contain">
				</a>

				<a href="<?php echo esc_url( $category_links['СОП'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-start justify-between">
						<div>
							<h3 class="text-xl font-bold text-black mb-1">СОП</h3>
							<p class="text-xs text-gray-600">Система охраны периметра</p>
						</div>
						<img src="<?php echo get_template_directory_uri(); ?>/img/соп.png" alt="СОП" class="w-12 h-12 object-contain">
					</div>
				</a>
			</div>

			<!-- Product Links -->
			<div class="grid grid-cols-2 gap-4">
				<a href="<?php echo esc_url( $category_links['Контролеры доступа'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Контролеры доступа</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Извещатели'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Извещатели" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Извещатели</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Видеокамеры'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Видеокамеры" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Видеокамеры</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Замки'] ); ?>" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Замки" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Замки</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>
			</div>

			<!-- Main Image - Mobile -->
			<div class="mt-4">
				<img src="<?php echo esc_url( $hero_image_mobile ); ?>" alt="Оборудование систем безопасности" class="w-full h-auto rounded-lg shadow-xl">
			</div>
		</div>

		
</section>
