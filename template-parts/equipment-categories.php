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

		<!-- Categories Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
			<!-- Category 1: Control Panels -->
			<a href="/catalog/control-panels" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat01.png" alt="Приборы приемно-контрольные" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Приборы приемно-контрольные
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Оборудование для централизованного контроля и управления системой
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 2: Detectors -->
			<a href="/catalog/detectors" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat02.png" alt="Извещатели" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Извещатели
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Пожарные, охранные и комбинированные решения
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 3: Notifiers -->
			<a href="/catalog/notifiers" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat03.png" alt="Оповещатели" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Оповещатели
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Пожарные, охранные и комбинированные решения
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 4: Access Controllers -->
			<a href="/catalog/access-controllers" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat04.png" alt="Контроллеры доступа" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Контроллеры доступа
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Устройства управления проходом и доступом
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 5: Readers -->
			<a href="/catalog/readers" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat05.png" alt="Считыватели" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Считыватели
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						RFID, PIN и другие варианты идентификации
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 6: Cameras -->
			<a href="/catalog/cameras" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat06.png" alt="Видеокамеры" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Видеокамеры
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Внутренние, уличные и IP-камеры
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 7: Recorders -->
			<a href="/catalog/recorders" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat07.png" alt="Видеорегистраторы" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Видеорегистраторы
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Оборудование для записи и хранения видеоданных
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 8: Locks -->
			<a href="/catalog/locks" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat08.png" alt="Замки" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Замки
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Электромеханические и электромагнитные решения
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 9: Power Supply -->
			<a href="/catalog/power-supply" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat09.png" alt="Источник питания и аккумуляторы" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						Источник питания и аккумуляторы
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Питание и резервирование для сисем безопасности
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>

			<!-- Category 10: Perimeter Security -->
			<a href="/catalog/perimeter-security" class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow group">
				<div class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
					<img src="<?php echo get_template_directory_uri(); ?>/img/cat10.png" alt="СОП" class="w-full h-full object-contain">
				</div>
				<div class="p-4 md:p-6">
					<h3 class="text-lg md:text-xl font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors">
						СОП
					</h3>
					<p class="text-sm text-gray-600 mb-3">
						Питание и резервирование для сисем безопасности
					</p>
					<ion-icon name="chevron-forward-outline" class="text-[#B3262E] text-xl"></ion-icon>
				</div>
			</a>
		</div>

		<!-- Action Buttons -->
		<div class="flex flex-col sm:flex-row gap-4 justify-center">
			<a href="/catalog" class="inline-flex items-center justify-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg">
				<ion-icon name="apps-outline" class="text-2xl"></ion-icon>
				Смотреть весь каталог
			</a>
			<a href="/consultation" class="inline-flex items-center justify-center gap-3 bg-white text-[#B3262E] border-2 border-[#B3262E] px-8 py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-lg">
				Получить консультацию
			</a>
		</div>
	</div>
</section>
