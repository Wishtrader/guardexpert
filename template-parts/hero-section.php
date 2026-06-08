<?php
/**
 * Template part for Hero Section
 *
 * @package guardexpert
 */
?>

<!-- Hero Section -->
<section class="relative overflow-hidden" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/hero-bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; margin-left: calc(-50vw + 50%);">
	

	<div class="max-w-[1200px] mx-auto px-4 py-12 lg:pb-20 relative z-10">
		<!-- Desktop Layout -->
		<div class="hidden lg:grid lg:grid-cols-12 gap-8 items-center">
			<!-- Left Column: Text Content (5 columns) -->
			<div class="lg:col-span-5">
				<h1 class="text-4xl xl:text-5xl font-bold text-black mb-6 leading-tight">
					Оборудование систем безопасности для бизнеса и объектов по всей Беларуси
				</h1>
				<p class="text-base xl:text-lg text-gray-700 mb-8 leading-relaxed">
					Поставка оборудования для ОПС, СКУД и видеонаблюдения. Помогаем подобрать решения под объект, задачи и совместимость оборудования.
				</p>
				<a href="/catalog" class="inline-flex items-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg">
					<ion-icon name="apps-outline" class="text-2xl"></ion-icon>
					Перейти в каталог
				</a>
			</div>

			<!-- Center Column: Main Image (4 columns) -->
			<div class="lg:col-span-4">
				<img src="<?php echo get_template_directory_uri(); ?>/img/h1.png" alt="Оборудование систем безопасности" class="w-full max-w-[285px] max-h-[612px] rounded-lg shadow-xl">
			</div>

			<!-- Right Column: Category Cards (3 columns) -->
			<div class="lg:col-span-3 space-y-4">
				<!-- ОПС -->
				<a href="/catalog/fire-alarm" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl font-bold text-black mb-1">ОПС</h3>
						<p class="text-xs text-gray-600">Охранно-пожарная сигнализация</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-16 h-16 object-contain">
				</a>

				<!-- СКУД -->
				<a href="/catalog/access-control" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl font-bold text-black mb-1">СКУД</h3>
						<p class="text-xs text-gray-600">Система контроля и управления доступом</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-16 object-contain">
				</a>

				<!-- Видеонаблюдение -->
				<a href="/catalog/video-surveillance" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-lg font-bold text-black mb-1">Видеонаблюдение</h3>
						<p class="text-xs text-gray-600">Камеры, регистраторы и аналитика</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-20 h-16 object-contain">
				</a>

				<!-- СОП -->
				<a href="/catalog/perimeter-security" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<div class="flex-1">
						<h3 class="text-xl font-bold text-black mb-1">СОП</h3>
						<p class="text-xs text-gray-600">Система охраны периметра</p>
					</div>
					<img src="<?php echo get_template_directory_uri(); ?>/img/соп.png" alt="СОП" class="w-16 h-16 object-contain">
				</a>
			</div>
		</div>

		<!-- Bottom Product Links - Desktop -->
		<div class="hidden lg:grid lg:grid-cols-4 gap-4">
			<a href="/catalog/access-controllers" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Контролеры доступа</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="/catalog/detectors" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Извещатели" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Извещатели</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="/catalog/cameras" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Видеокамеры" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Видеокамеры</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>

			<a href="/catalog/locks" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-4 group">
				<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Замки" class="w-20 h-20 object-contain">
				<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors flex-1">Замки</span>
				<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
			</a>
		</div>

		<!-- Mobile Layout -->
		<div class="lg:hidden space-y-4 mt-8">
			<!-- ОПС & СКУД -->
			<div class="grid grid-cols-2 gap-4">
				<a href="/catalog/fire-alarm" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-start justify-between mb-2">
						<h3 class="text-xl font-bold text-black">ОПС</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/опс.png" alt="ОПС" class="w-12 h-12 object-contain">
					</div>
					<p class="text-xs text-gray-600">Охранно-пожарная сигнализация</p>
				</a>

				<a href="/catalog/access-control" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<div class="flex items-start justify-between mb-2">
						<h3 class="text-xl font-bold text-black">СКУД</h3>
						<img src="<?php echo get_template_directory_uri(); ?>/img/скуд.png" alt="СКУД" class="w-12 h-12 object-contain">
					</div>
					<p class="text-xs text-gray-600">Система контроля и управления доступом</p>
				</a>
			</div>

			<!-- Видеонаблюдение & СОП -->
			<div class="grid grid-cols-2 gap-4">
				<a href="/catalog/video-surveillance" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
					<h3 class="text-lg font-bold text-black mb-1">Видеонаблюдение</h3>
					<p class="text-xs text-gray-600 mb-2">Камеры, регистраторы и аналитика</p>
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеонаблюдение.png" alt="Видеонаблюдение" class="w-full h-16 object-contain">
				</a>

				<a href="/catalog/perimeter-security" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow">
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
				<a href="/catalog/access-controllers" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/контроллеры.png" alt="Контролеры доступа" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Контролеры доступа</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="/catalog/detectors" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/извещатели.png" alt="Извещатели" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Извещатели</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="/catalog/cameras" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/видеокамеры.png" alt="Видеокамеры" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Видеокамеры</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>

				<a href="/catalog/locks" class="bg-white rounded-lg p-4 shadow-lg hover:shadow-xl transition-shadow flex items-center gap-3 group">
					<img src="<?php echo get_template_directory_uri(); ?>/img/замки.png" alt="Замки" class="w-16 h-16 object-contain">
					<span class="font-medium text-black group-hover:text-[#B3262E] transition-colors">Замки</span>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] ml-auto"></ion-icon>
				</a>
			</div>

			<!-- Main Image - Mobile -->
			<div class="mt-4">
				<img src="<?php echo get_template_directory_uri(); ?>/img/hero-main.png" alt="Оборудование систем безопасности" class="w-full h-auto rounded-lg shadow-xl">
			</div>
		</div>

		
</section>
