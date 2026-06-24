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
		<div class="hidden lg:grid lg:grid-cols-12 gap-4 items-center">
			<!-- Left Column: Text Content (6 columns) -->
			<div class="lg:col-span-6">
				<h1 class="text-4xl xl:text-[48px] font-bold text-black mb-6 leading-tight">
					<?php echo esc_html( $hero_title ); ?>
				</h1>
				<p class="text-base xl:text-lg text-black mb-8 !leading-[1.2]">
					<?php echo esc_html( $hero_description ); ?>
				</p>
				<a href="/catalog" class="inline-flex justify-center items-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg md:w-[285px] md:h-[52px]">
					<img src="<?php echo get_template_directory_uri(); ?>/img/grid.svg" alt="grid" />
					Перейти в каталог
				</a>
			</div>

			<!-- Center Column: Main Image (4 columns) -->
			<div class="lg:col-span-3">
				<img src="<?php echo esc_url( $hero_image ); ?>" alt="Оборудование систем безопасности" class="w-full max-w-[285px] max-h-[612px] rounded-[4px] shadow-md">
			</div>

			<!-- Right Column: Category Cards (3 columns) -->
			<div class="lg:col-span-3 space-y-4">
				<!-- ОПС -->
				<a href="<?php echo esc_url( $category_links['ОПС'] ); ?>" class="bg-white rounded-[4px] p-[10px] shadow-md hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-semibold text-black mb-3">ОПС</h3>
						<p class="text-xs md:text-[14px] text-black">Охранно-пожарная сигнализация</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-12 h-16 md:w-auto md:h-[90px] object-contain">
				</a>

				<!-- СКУД -->
				<a href="<?php echo esc_url( $category_links['СКУД'] ); ?>" class="bg-white rounded-[4px] p-[10px] shadow-md hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-semibold text-black mb-3">СКУД</h3>
						<p class="text-xs md:text-[14px] text-black">Система контроля и управления доступом</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-16 md:w-auto md:h-[90px] object-contain">
				</a>

				<!-- Видеонаблюдение -->
				<a href="<?php echo esc_url( $category_links['Видеонаблюдение'] ); ?>" class="bg-white rounded-[4px] p-[10px] pb-0 shadow-md hover:shadow-xl transition-shadow flex flex-col items-end gap-3 group">
					<div class="flex-1">
						<h3 class="text-lg md:text-[28px] font-semibold text-black mb-3">Видеонаблюдение</h3>
						<p class="text-xs md:text-[14px] text-black max-w-[200px]">Камеры, регистраторы и аналитика</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-20 h-16 md:w-[140px] md:-mt-12 md:h-auto object-contain">
				</a>

				<!-- СОП -->
				<a href="<?php echo esc_url( $category_links['СОП'] ); ?>" class="bg-white rounded-[4px] p-[10px] shadow-mf hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl md:text-[28px] font-semibold text-black mb-3">СОП</h3>
						<p class="text-xs md:text-[14px] text-gray-600">Система охраны периметра</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/соп.png" alt="СОП" class="w-16 h-16 md:w-auto md:h-[90px] object-contain">
				</a>
			</div>
		</div>

		<!-- Bottom Product Links - Desktop -->
		<div class="hidden lg:grid lg:grid-cols-4 gap-4 mt-[20px]">
			<a href="<?php echo esc_url( $category_links['Контролеры доступа'] ); ?>" class="bg-white rounded-[4px] p-4 shadow-md hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Контролеры доступа</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Извещатели'] ); ?>" class="bg-white rounded-[4px] p-4 shadow-md hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Извещатели" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Извещатели</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Видеокамеры'] ); ?>" class="bg-white rounded-[4px] p-4 shadow-md hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Видеокамеры" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Видеокамеры</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="<?php echo esc_url( $category_links['Замки'] ); ?>" class="bg-white rounded-[4px] p-4 shadow-md hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Замки" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Замки</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>
		</div>

		<!-- Mobile Layout -->
		<div class="flex flex-col lg:hidden" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: bottom; background-repeat: no-repeat;">
			<div class="lg:hidden" >
			<div class="lg:col-span-6">
				<h1 class="text-[26px] font-semibold text-black mb-6 leading-tight">
					<?php echo esc_html( $hero_title ); ?>
				</h1>
				<p class="text-base text-black mb-8 !leading-[1.2]">
					<?php echo esc_html( $hero_description ); ?>
				</p>
				<a href="/catalog" class="w-full inline-flex items-center justify-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded-[2px] hover:bg-[#9a1f26] transition-colors text-base shadow-lg">
						<img src="<?php echo get_template_directory_uri(); ?>/img/grid.svg" alt="grid" />
					Перейти в каталог
				</a>
			</div>
		 </div>
		<div class="lg:hidden space-y-2 mt-8">
			<!-- ОПС & СКУД -->
			<div class="grid grid-cols-2 gap-2">
				<a href="<?php echo esc_url( $category_links['ОПС'] ); ?>" class="bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-center justify-between mb-2">
						<h3 class="text-[22px] font-semibold text-black">ОПС</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-12 h-12 object-contain">
					</div>
					<p class="text-[13px] text-black">Охранно-пожарная сигнализация</p>
				</a>

				<a href="<?php echo esc_url( $category_links['СКУД'] ); ?>" class="bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-center justify-between mb-2">
						<h3 class="text-[22px] font-semibold text-black">СКУД</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-12 object-contain">
					</div>
					<p class="text-[13px] text-black">Система контроля и управления доступом</p>
				</a>
			</div>

			<!-- Видеонаблюдение & СОП -->
			<div class="grid grid-cols-2 gap-2">
				<a href="<?php echo esc_url( $category_links['Видеонаблюдение'] ); ?>" class="flex flex-col bg-white rounded-[2px] p-2 pr-0 shadow-lg hover:shadow-xl transition-shadow max-h-[106px]">
					<h3 class="text-[16px] font-semibold text-black mb-1 leading-[1]">Видеонаблюдение</h3>
					<p class="text-[13px] text-black">Камеры, регистраторы и аналитика</p>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-full h-16 object-contain -mt-[16px] ml-[20px]">
				</a>

				<a href="<?php echo esc_url( $category_links['СОП'] ); ?>" class="bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-center justify-between">
						<h3 class="text-[22px] font-semibold text-black mb-1">СОП</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/соп.png" alt="СОП" class="w-12 h-12 object-contain">
					</div>
						<p class="text-[13px] text-black">Система охраны периметра</p>
				</a>
			</div>

			<!-- Product Links -->
			<div class="grid grid-cols-2 gap-2">
				<a href="<?php echo esc_url( $category_links['Контролеры доступа'] ); ?>" class="relative bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="h-8 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors leading-[1.2]">Контролеры доступа</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] absolute top-[18px] right-0 text-[22px]"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Извещатели'] ); ?>" class="relative bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Контролеры доступа" class="h-8 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Извещатели</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] absolute top-[18px] right-0 text-[22px]"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Видеокамеры'] ); ?>" class="relative bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow flex items-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Контролеры доступа" class="h-8 -ml-[8px] object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Видеокамеры</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] absolute top-[18px] right-0 text-[22px]"></ion-icon>
				</a>

				<a href="<?php echo esc_url( $category_links['Замки'] ); ?>" class="relative bg-white rounded-[2px] p-2 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-1 min-h-14">
					<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Контролеры доступа" class="h-8 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Замки</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] absolute top-[18px] right-0 text-[22px]"></ion-icon>
				</a>
			</div>
		 </div>

			<!-- Main Image - Mobile -->
			<div class="mt-4">
				<img src="<?php echo esc_url( $hero_image_mobile ); ?>" alt="Оборудование систем безопасности" class="w-full h-auto rounded-[2px] shadow-md">
			</div>
		</div>

		
</section>
