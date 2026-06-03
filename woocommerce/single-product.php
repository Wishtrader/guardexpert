<?php
/**
 * WooCommerce Single Product Page Template
 *
 * @package guardexpert
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php
// Static product data (will be replaced with WooCommerce data later).
$static_product = array(
	'breadcrumbs'   => array(
		array( 'name' => 'Главная', 'url' => home_url( '/' ) ),
		array( 'name' => 'Каталог', 'url' => guardexpert_get_catalog_url() ),
		array( 'name' => 'Приборы приемно-контрольные', 'url' => '#' ),
		array( 'name' => 'Прибор приемно-контрольный Сигнал-20П', 'url' => '' ),
	),
	'category_name' => 'Приборы приемно-контрольные',
	'category_url'  => '#',
	'title'         => 'Приборы приемно-контрольный Сигнал-20П',
	'short_desc'    => 'Оборудование для централизованного контроля и управления системой безопасности с возможностью подключения шлейфов и интеграции в общую систему.',
	'price'         => 'ООО BYN',
	'specs'         => array(
		array( 'label' => 'Количество шлейфов:', 'value' => '4' ),
		array( 'label' => 'Напряжение питания:', 'value' => '12В' ),
		array( 'label' => 'Тип установки:',       'value' => 'настенный' ),
		array( 'label' => 'Интерфейс:',           'value' => 'проводной' ),
	),
	'gallery'       => array(
		'product01.png',
		'product02.png',
		'product03.png',
		'product04.png',
		'product05.png',
	),
	'tabs'          => array(
		'description' => array(
			'title'   => 'Описание',
			'content' => '
				<p>Прибор приемно-контрольный Сигнал-20П предназначен для приема сигналов от охранных и пожарных извещателей, контроля состояния шлейфов сигнализации и управления исполнительными устройствами.</p>
				<p>Прибор обеспечивает круглосуточный контроль до 4 шлейфов сигнализации, формирования и передачу тревожных и служебных извещений, формирование и передачу тревожных и служебных извещений, индикацию состояния системы и управление внешними устройствами.</p>
				<p>Используется в системах охранно-пожарной сигнализации объектов различного назначения: офисов, магазинов, складов, производственных и административных зданий.</p>
				<p>Компактный корпус и настенное исполнение обеспечивают удобство монтажа и обслуживания.</p>
			',
		),
		'specs'       => array(
			'title'   => 'Характеристики',
			'content' => '
				<div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-3">
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Количество шлейфов</span><span class="font-semibold text-black">4</span></div>
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Напряжение питания</span><span class="font-semibold text-black">12В</span></div>
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Тип установки</span><span class="font-semibold text-black">настенный</span></div>
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Интерфейс</span><span class="font-semibold text-black">проводной</span></div>
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Память событий</span><span class="font-semibold text-black">2048</span></div>
					<div class="flex justify-between border-b border-gray-200 py-2"><span class="text-gray-700">Температура эксплуатации</span><span class="font-semibold text-black">от -10 до +50°C</span></div>
				</div>
			',
		),
		'delivery'    => array(
			'title'   => 'Доставка и оплата',
			'content' => '
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
			',
		),
	),
	'related'       => array(
		array(
			'title' => 'Прибор приемно-контрольный Сигнал-20П',
			'specs' => array( 'Питание 12В', 'Память событий 2048' ),
			'price' => 'ООО BYN',
			'image' => 'product01.png',
		),
		array(
			'title' => 'Прибор приемно-контрольный Сигнал-20П',
			'specs' => array( 'Питание 12В', 'Память событий 2048' ),
			'price' => 'Цена по запросу',
			'image' => 'product01.png',
		),
		array(
			'title' => 'Прибор приемно-контрольный Сигнал-20П',
			'specs' => array( 'Питание 12В', 'Память событий 2048' ),
			'price' => 'ООО BYN',
			'image' => 'product01.png',
		),
	),
);
?>

<!-- Single Product Section -->
<section class="bg-white py-6 md:py-10">
	<div class="max-w-[1200px] mx-auto px-4">

		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-600 mb-6" aria-label="Breadcrumb">
			<ol class="flex items-center gap-2 flex-wrap">
				<?php foreach ( $static_product['breadcrumbs'] as $index => $crumb ) : ?>
					<?php if ( $index > 0 ) : ?>
						<li><span class="text-gray-400">/</span></li>
					<?php endif; ?>
					<li>
						<?php if ( $crumb['url'] && $index < count( $static_product['breadcrumbs'] ) - 1 ) : ?>
							<a href="<?php echo esc_url( $crumb['url'] ); ?>" class="hover:text-[#B3262E] transition-colors"><?php echo esc_html( $crumb['name'] ); ?></a>
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
						<img id="product-main-image" src="<?php echo esc_url( get_template_directory_uri() . '/img/' . $static_product['gallery'][0] ); ?>" alt="<?php echo esc_attr( $static_product['title'] ); ?>" class="max-w-full max-h-full object-contain">
					</div>
				</div>
				<div class="relative">
					<button type="button" id="gallery-prev" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center text-[#B3262E] hover:bg-gray-100 rounded-full transition-colors outline-none border-none bg-white/80" aria-label="Предыдущее изображение">
						<ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon>
					</button>
					<div id="gallery-thumbs" class="flex items-center gap-2 overflow-x-auto px-8 scroll-smooth">
						<?php foreach ( $static_product['gallery'] as $index => $thumb ) : ?>
							<button type="button" class="gallery-thumb flex-shrink-0 w-20 h-20 md:w-24 md:h-24 bg-white border-2 <?php echo 0 === $index ? 'border-[#B3262E]' : 'border-gray-200'; ?> rounded p-2 hover:border-[#B3262E] transition-colors outline-none" data-image="<?php echo esc_attr( $thumb ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/img/' . $thumb ); ?>" alt="Thumbnail <?php echo esc_attr( $index + 1 ); ?>" class="w-full h-full object-contain">
							</button>
						<?php endforeach; ?>
					</div>
					<button type="button" id="gallery-next" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center text-[#B3262E] hover:bg-gray-100 rounded-full transition-colors outline-none border-none bg-white/80" aria-label="Следующее изображение">
						<ion-icon name="chevron-forward-outline" class="text-2xl"></ion-icon>
					</button>
				</div>
			</div>

			<!-- Product Info -->
			<div>
				<a href="<?php echo esc_url( $static_product['category_url'] ); ?>" class="text-sm text-[#B3262E] hover:underline mb-2 inline-block">
					<?php echo esc_html( $static_product['category_name'] ); ?>
				</a>
				<h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-black mb-4 leading-tight">
					<?php echo esc_html( $static_product['title'] ); ?>
				</h1>
				<p class="text-base text-gray-700 mb-6 leading-relaxed">
					<?php echo esc_html( $static_product['short_desc'] ); ?>
				</p>
				<p class="text-2xl font-bold text-[#B3262E] mb-6">
					<?php echo esc_html( $static_product['price'] ); ?>
				</p>
				<hr class="border-gray-200 mb-6">
				<div class="space-y-3 mb-8">
					<?php foreach ( $static_product['specs'] as $spec ) : ?>
						<div class="flex items-baseline gap-2 text-base">
							<span class="text-gray-700"><?php echo esc_html( $spec['label'] ); ?></span>
							<span class="font-semibold text-black"><?php echo esc_html( $spec['value'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
				<button type="button" class="w-full bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg outline-none border-none mb-3">
					В корзину
				</button>
				<a href="#consultation" class="w-full inline-flex items-center justify-center bg-white text-[#B3262E] border-2 border-[#B3262E] px-8 py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-lg">
					Получить консультацию
				</a>
			</div>
		</div>

		<!-- Tabs -->
		<div class="border border-gray-200 rounded-lg overflow-hidden mb-12">
			<div class="flex border-b border-gray-200 overflow-x-auto" role="tablist">
				<?php $first = true; foreach ( $static_product['tabs'] as $key => $tab ) : ?>
					<button
						type="button"
						class="product-tab flex-1 min-w-[140px] px-6 py-4 text-base font-medium transition-colors outline-none border-none bg-white <?php echo $first ? 'text-[#B3262E] border-b-2 border-[#B3262E] -mb-px' : 'text-gray-700 hover:text-[#B3262E]'; ?>"
						data-tab="<?php echo esc_attr( $key ); ?>"
						role="tab"
						aria-selected="<?php echo $first ? 'true' : 'false'; ?>"
					>
						<?php echo esc_html( $tab['title'] ); ?>
					</button>
				<?php $first = false; endforeach; ?>
			</div>
			<?php $first = true; foreach ( $static_product['tabs'] as $key => $tab ) : ?>
				<div
					class="product-tab-content p-6 md:p-8 text-base text-gray-700 leading-relaxed <?php echo $first ? '' : 'hidden'; ?>"
					data-tab-content="<?php echo esc_attr( $key ); ?>"
					role="tabpanel"
				>
					<?php echo $tab['content']; ?>
				</div>
			<?php $first = false; endforeach; ?>
		</div>

		<!-- Related Products -->
		<h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-black mb-8">Сопутствующие товары</h2>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
			<?php foreach ( $static_product['related'] as $related ) : ?>
				<div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">
					<a href="#" class="aspect-square bg-gray-50 p-6 flex items-center justify-center">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/' . $related['image'] ); ?>" alt="<?php echo esc_attr( $related['title'] ); ?>" class="w-full h-full object-contain">
					</a>
					<div class="p-4 md:p-5 flex flex-col flex-1">
						<h3 class="text-lg font-bold text-black mb-3">
							<a href="#" class="hover:text-[#B3262E] transition-colors"><?php echo esc_html( $related['title'] ); ?></a>
						</h3>
						<ul class="space-y-1 mb-4 text-sm text-gray-700">
							<?php foreach ( $related['specs'] as $spec ) : ?>
								<li class="flex items-start gap-2">
									<span class="text-[#B3262E]">•</span>
									<span><?php echo esc_html( $spec ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="mt-auto">
							<p class="text-xl font-bold text-[#B3262E] mb-4"><?php echo esc_html( $related['price'] ); ?></p>
							<a href="#" class="w-full inline-flex items-center justify-center bg-white text-[#B3262E] border-2 border-[#B3262E] px-6 py-3 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-base font-medium">
								Подробнее
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>

<!-- Bottom CTA -->
<section class="bg-white border-t border-gray-200 py-8">
	<div class="max-w-[1200px] mx-auto px-4">
		<div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
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
				<a href="#consultation" class="inline-flex items-center justify-center gap-2 bg-[#B3262E] text-white px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#9a1f26] transition-colors text-base md:text-lg shadow-lg whitespace-nowrap">
					Получить консультацию
				</a>
				<a href="#contacts" class="inline-flex items-center justify-center gap-2 bg-white text-[#B3262E] border-2 border-[#B3262E] px-6 md:px-8 py-3 md:py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-base md:text-lg whitespace-nowrap">
					Связаться с нами
				</a>
			</div>
		</div>
	</div>
</section>

<!-- Tabs & Gallery Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	// Tabs
	const tabButtons = document.querySelectorAll('.product-tab');
	const tabContents = document.querySelectorAll('.product-tab-content');

	tabButtons.forEach(function(btn) {
		btn.addEventListener('click', function() {
			const target = this.getAttribute('data-tab');

			tabButtons.forEach(function(b) {
				b.classList.remove('text-[#B3262E]', 'border-b-2', 'border-[#B3262E]', '-mb-px');
				b.classList.add('text-gray-700');
				b.setAttribute('aria-selected', 'false');
			});
			tabContents.forEach(function(c) { c.classList.add('hidden'); });

			this.classList.remove('text-gray-700');
			this.classList.add('text-[#B3262E]', 'border-b-2', 'border-[#B3262E]', '-mb-px');
			this.setAttribute('aria-selected', 'true');

			const content = document.querySelector('[data-tab-content="' + target + '"]');
			if (content) content.classList.remove('hidden');
		});
	});

	// Gallery
	const thumbs = document.querySelectorAll('.gallery-thumb');
	const mainImage = document.getElementById('product-main-image');

	thumbs.forEach(function(thumb) {
		thumb.addEventListener('click', function() {
			const img = this.querySelector('img');
			if (mainImage && img) {
				mainImage.src = img.src;
			}
			thumbs.forEach(function(t) { t.classList.remove('border-[#B3262E]'); t.classList.add('border-gray-200'); });
			this.classList.remove('border-gray-200');
			this.classList.add('border-[#B3262E]');
		});
	});

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
