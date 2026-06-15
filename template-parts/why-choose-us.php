<?php
/**
 * Template part for Why Choose Us Section
 *
 * @package guardexpert
 */
?>

<?php
// Per-page custom fields
$page_id = get_queried_object_id();

if ( is_page() && $page_id > 0 ) {
	$why_title = get_field( 'front_why_title', $page_id );
	$why_description = get_field( 'front_why_description', $page_id );
	$why_features = get_field( 'front_why_features', $page_id );
}
if ( empty( $why_title ) ) {
	$why_title = 'Почему выбирают Гардэксперт';
}
if ( empty( $why_description ) ) {
	$why_description = 'Надежная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.';
}

// Fallback features if repeater is empty
$fallback_features = array(
	array(
		'title' => 'С 2012 года на рынке',
		'description' => 'Более 14 лет работаем в сфере систем безопасности и поставок оборудования для объектов разного масштаба.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f1.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
	array(
		'title' => 'Подбор под задачу',
		'description' => 'Помогаем подобрать оборудование с учетом объекта, задач, совместимости и бюджета.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f2.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
	array(
		'title' => 'Поставка по всей Беларуси',
		'description' => 'Работаем с клиентами по всей РБ и организуем поставку оборудования на объект.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f3.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
	array(
		'title' => 'Сертификаты и документы',
		'description' => 'Предоставляем сопроводительную документацию и подтверждающие материалы по продукции.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f4.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
	array(
		'title' => 'Техническая экспертиза',
		'description' => 'Консультируем по ОПС, СКУД и видеонаблюдению, помогаем разобраться в характеристиках и выборе.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f5.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
	array(
		'title' => 'Поддержка после покупки',
		'description' => 'При необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию.',
		'icon_svg' => '<img src="' . esc_url( get_template_directory_uri() . '/img/f6.svg' ) . '" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain" />',
	),
);

$allowed_icon_svg = array(
	'img' => array(
		'src' => array(),
		'alt' => array(),
		'class' => array(),
	),
	'svg' => array(
		'class' => array(),
		'viewBox' => array(),
		'fill' => array(),
		'stroke' => array(),
		'stroke-width' => array(),
	),
	'path' => array(
		'd' => array(),
	),
	'line' => array(
		'x1' => array(),
		'y1' => array(),
		'x2' => array(),
		'y2' => array(),
	),
	'circle' => array(
		'cx' => array(),
		'cy' => array(),
		'r' => array(),
		'fill' => array(),
	),
);
?>

<!-- Why Choose Us Section -->
<section class="bg-[#FAF9F7] py-16 md:py-20">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Section Header -->
		<div class="text-center mb-12 md:mb-16">
			<h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-6">
				<?php echo esc_html( $why_title ); ?>
			</h2>
			<p class="text-base md:text-lg text-black leading-relaxed">
				<?php echo esc_html( $why_description ); ?>
			</p>
		</div>

		<!-- Features Grid -->
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
			<?php if ( ! empty( $why_features ) && is_array( $why_features ) ) : ?>
				<?php foreach ( $why_features as $feature ) : ?>
					<div class="bg-white rounded-lg p-6 md:p-8 shadow-lg hover:shadow-xl transition-shadow">
						<div class="flex items-start gap-4 md:gap-6">
							<?php if ( ! empty( $feature['icon'] ) ) : ?>
								<div class="flex">
									<img src="<?php echo esc_url( $feature['icon'] ); ?>" alt="" class="w-12 h-12 md:w-16 md:h-16 object-contain">
									<h3 class="text-xl md:text-2xl font-semibold text-black mb-3"><?php echo esc_html( $feature['title'] ); ?></h3>
								</div>
							<?php endif; ?>
							<div>
								
								<?php if ( ! empty( $feature['description'] ) ) : ?>
									<p class="text-sm md:text-base text-gray-700 leading-relaxed"><?php echo esc_html( $feature['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ( $fallback_features as $fb ) : ?>
				<div class="bg-white rounded-lg md:px-[30px] md:py-[20px] md:p-8 shadow-lg hover:shadow-xl transition-shadow">
						<div class="flex items-center gap-4">
							<div class="md:min-h-[52px] md:min-w-[52px] shrink-0">
								<?php echo wp_kses( $fb['icon_svg'], $allowed_icon_svg ); ?>
							</div>
							<h3 class="text-xl md:text-[22px] font-semibold text-black"><?php echo esc_html( $fb['title'] ); ?></h3>
						</div>
						<?php if ( ! empty( $fb['description'] ) ) : ?>
							<p class="text-sm md:text-base text-gray-700 leading-relaxed mt-4"><?php echo esc_html( $fb['description'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
