<?php
/**
 * Template part for Services Section
 *
 * @package guardexpert
 */
?>

<!-- Services Section -->
<section class="bg-[#FAF9F7] py-16 md:py-20">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Section Header -->
		<div class="text-center mb-12 md:mb-16">
			<h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4">
				Услуги и сопровождение
			</h2>
			<p class="text-base md:text-lg text-gray-700 max-w-4xl mx-auto">
				Помогаем не только с поставкой оборудования, но и с подбором, внедрением и дальнейшей поддержкой систем безопасности.
			</p>
		</div>

		<!-- Services Grid -->
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
			<!-- Left Column: Main Card -->
			<div class="lg:col-span-5">
				<div class="bg-white rounded-lg overflow-hidden shadow-lg h-full flex flex-col">
					<div class="aspect-[4/3] bg-gray-50 p-6">
						<img src="<?php echo get_template_directory_uri(); ?>/img/s01.png" alt="Комплексный подход к объекту" class="w-full h-full object-contain">
					</div>
					<div class="p-6 md:p-8 flex flex-col flex-1">
						<h3 class="text-2xl md:text-3xl font-bold text-black mb-4">
							Комплексный подход к объекту
						</h3>
						<p class="text-base md:text-lg text-gray-700 mb-6 flex-1">
							Подбираем оборудование, помогаем с проектированием, внедрением и дальнейшим сопровождением систем безопасности под задачи бизнеса и объекта.
						</p>
						<a href="/consultation" class="inline-flex items-center justify-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg">
							Получить консультацию
						</a>
					</div>
				</div>
			</div>

			<!-- Right Column: Services Grid -->
			<div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
				<!-- Service 1: Design -->
				<div class="bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-[#B3262E] mb-4" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
						<rect x="8" y="12" width="36" height="44" rx="2"/>
						<line x1="44" y1="12" x2="44" y2="56"/>
						<line x1="16" y1="20" x2="36" y2="20"/>
						<line x1="16" y1="28" x2="36" y2="28"/>
						<line x1="16" y1="36" x2="28" y2="36"/>
						<rect x="16" y="40" width="12" height="8" rx="1"/>
						<path d="M48 20 L56 12 L52 8 L44 16 Z"/>
						<line x1="48" y1="20" x2="56" y2="28"/>
						<circle cx="24" cy="44" r="2" fill="currentColor"/>
					</svg>
					<h3 class="text-xl md:text-2xl font-bold text-black mb-3">Проектирование</h3>
					<p class="text-sm md:text-base text-gray-700">
						Подготовка решений с учетом задач объекта и требований системы.
					</p>
				</div>

				<!-- Service 2: Installation -->
				<div class="bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-[#B3262E] mb-4" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M16 16 L48 48"/>
						<path d="M48 16 L16 48"/>
						<path d="M12 48 L20 48"/>
						<path d="M44 16 L52 16"/>
						<path d="M20 48 L24 44"/>
						<path d="M44 16 L48 12"/>
					</svg>
					<h3 class="text-xl md:text-2xl font-bold text-black mb-3">Монтаж</h3>
					<p class="text-sm md:text-base text-gray-700">
						Установка оборудования и организация корректной работы системы.
					</p>
				</div>

				<!-- Service 3: Commissioning -->
				<div class="bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-[#B3262E] mb-4" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
						<circle cx="32" cy="32" r="20"/>
						<circle cx="32" cy="32" r="8"/>
						<line x1="32" y1="8" x2="32" y2="16"/>
						<line x1="32" y1="48" x2="32" y2="56"/>
						<line x1="8" y1="32" x2="16" y2="32"/>
						<line x1="48" y1="32" x2="56" y2="32"/>
						<line x1="32" y1="24" x2="32" y2="28"/>
						<line x1="32" y1="36" x2="32" y2="40"/>
						<line x1="24" y1="32" x2="28" y2="32"/>
						<line x1="36" y1="32" x2="40" y2="32"/>
					</svg>
					<h3 class="text-xl md:text-2xl font-bold text-black mb-3">Пусконаладка</h3>
					<p class="text-sm md:text-base text-gray-700">
						Настройка, проверка и запуск оборудования в рабочий режим.
					</p>
				</div>

				<!-- Service 4: Maintenance -->
				<div class="bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-[#B3262E] mb-4" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M32 8 C20 8 12 16 12 28 C12 44 32 56 32 56 C32 56 52 44 52 28 C52 16 44 8 32 8 Z"/>
						<path d="M24 32 L30 38 L40 26"/>
					</svg>
					<h3 class="text-xl md:text-2xl font-bold text-black mb-3">Обслуживание</h3>
					<p class="text-sm md:text-base text-gray-700">
						Техническое сопровождение и поддержание стабильной работы системы.
					</p>
				</div>

				<!-- Service 5: Modernization (Full Width) -->
				<div class="sm:col-span-2 bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-[#B3262E] mb-4" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M32 12 C24 12 18 18 18 26 C18 34 24 40 32 40"/>
						<path d="M32 40 C40 40 46 34 46 26 C46 18 40 12 32 12"/>
						<circle cx="32" cy="26" r="6"/>
						<path d="M12 44 L20 36"/>
						<path d="M52 44 L44 36"/>
						<path d="M20 36 L28 44"/>
						<path d="M44 36 L36 44"/>
						<circle cx="16" cy="40" r="4"/>
						<circle cx="48" cy="40" r="4"/>
						<path d="M20 44 L44 44"/>
					</svg>
					<h3 class="text-xl md:text-2xl font-bold text-black mb-3">Модернизация и поддержка</h3>
					<p class="text-sm md:text-base text-gray-700">
						Обновление решений, замена оборудования и помощь по техническим вопросам.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
