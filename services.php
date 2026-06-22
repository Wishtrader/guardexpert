<?php
/**
 * Template Name: Services
 *
 * @package guardexpert
 */

get_header();

$services_hero_title        = get_field( 'services_hero_title' ) ?: 'Поддержка, внедрение и сопровождение систем безопасности';
$services_hero_description  = get_field( 'services_hero_description' ) ?: 'Помогаем не только с поставкой оборудования, но и с подбором решений, проектированием, монтажом, пусконаладкой, обслуживанием и модернизацией систем безопасности для бизнеса и объектов по всей Беларуси.';
$services_hero_bg           = get_field( 'services_hero_bg' );
$services_main_title        = get_field( 'services_main_title' ) ?: 'Основные услуги';
$services_main_description  = get_field( 'services_main_description' ) ?: 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.';
$services_audience_title    = get_field( 'services_audience_title' ) ?: 'Для кого подойдут наши услуги';
$services_audience_description = get_field( 'services_audience_description' ) ?: 'Подбираем оборудование и сопровождаем поставки для компаний, монтажных организаций и объектов разного масштаба по всей Беларуси.';
$services_work_title        = get_field( 'services_work_title' ) ?: 'Как строится работа';
$services_work_description  = get_field( 'services_work_description' ) ?: 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.';
$services_trust_title       = get_field( 'services_trust_title' ) ?: 'Почему нам доверяют выполнение задач';
$services_trust_description = get_field( 'services_trust_description' ) ?: 'Надёжная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.';

$services_stats_items = get_field( 'services_stats_items' );
if ( empty( $services_stats_items ) || ! is_array( $services_stats_items ) ) {
	$services_stats_items = array(
		array( 'icon' => '', 'title' => 'С 2012 года' ),
		array( 'icon' => '', 'title' => '14+ лет' ),
		array( 'icon' => '', 'title' => 'Поставка по всей РБ' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение' ),
	);
}

$stats_lucide_icons = array( 'calendar', 'shield-check', 'map-pin', 'headphones' );

if ( empty( $services_hero_bg ) ) {
	$services_hero_bg = get_template_directory_uri() . '/img/serv-bg.png';
}
?>
<script src="https://unpkg.com/lucide@latest"></script>
    <!-- Hero Section -->
    <section class="relative overflow-hidden -mt-[100px] lg:-mt-[200px] bg-[url('<?php echo esc_url( $services_hero_bg ); ?>')] bg-cover bg-right">
        <div class="max-w-[1200px] mx-auto px-4 pt-[100px] lg:pt-[200px] pb-12 lg:pb-32 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-[590px]">
                    <nav class="text-sm text-gray-500 mb-6">
                        <a href="/" class="hover:text-primary">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">Услуги</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-black !leading-[1.2] mb-6">
                        <?php echo esc_html( $services_hero_title ); ?>
                    </h1>
                    <p class="text-black font-normal text-base lg:text-lg mb-8 max-w-[590px] !leading-[1.2]">
                        <?php echo esc_html( $services_hero_description ); ?>
                    </p>
                    <a href="/catalog" class="inline-flex justify-center items-center gap-3 bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg md:w-[285px] md:h-[52px]">
                        <ion-icon name="grid-outline" class="text-2xl"></ion-icon>
                    Перейти в каталог 
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="relative md:mt-[-66px]">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 bg-white shadow-md rounded-[2px] p-10">
                <?php foreach ( $services_stats_items as $i => $item ) :
                    $stats_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $stats_title = isset( $item['title'] ) ? $item['title'] : '';
                    $lucide_name = isset( $stats_lucide_icons[ $i ] ) ? $stats_lucide_icons[ $i ] : 'circle'; ?>
                <div class="flex items-center gap-3">
                    <?php if ( ! empty( $stats_icon ) ) : ?>
                        <img src="<?php echo esc_url( $stats_icon ); ?>" alt="" class="h-[52px] object-contain">
                    <?php else : ?>
                            <i data-lucide="<?php echo esc_attr( $lucide_name ); ?>" class="w-6 h-6 text-[#B22234]"></i>
                    <?php endif; ?>
                    <div>
                        <div class="font-normal text-black md:max-w-[94px] text-sm"><?php echo esc_html( $stats_title ); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Основные услуги -->
    <section class="py-16 lg:py-24">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html( $services_main_title ); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $services_main_description ); ?></p>
            </div>

			<div class="grid lg:grid-cols-[488px_650px] gap-6">
				<!-- Large Card -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-[20px] flex flex-col">
					
					<h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3">Комплексный подход к объекту</h3>
					<p class="text-gray-600 mb-6">Подбираем оборудование, помогаем с проектированием, внедрением и дальнейшим сопровождением систем безопасности под задачи бизнеса и объекта.</p>
					<a href="#" class="js-open-consultation inline-block bg-[#B3262E] text-white px-6 py-3 rounded font-medium hover:bg-[#9a1f26] transition text-center mb-6">Получить консультацию</a>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/serv-i1.png' ); ?>" alt="Комплексный подход" class=w-full h-auto">
				</div>

				<!-- Small Cards Grid -->
				<?php
				$service_cards = get_posts( array(
					'post_type'      => 'services',
					'posts_per_page' => 5,
					'post_status'    => 'publish',
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
				) );

				if ( $service_cards ) :
				$total = count( $service_cards );
				?>
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
					<?php foreach ( $service_cards as $i => $service ) :
						$icon = get_field( 'service_card_icon', $service->ID );
						$hero_desc = get_field( 'service_hero_description', $service->ID );
						$is_last_full = ( $i === $total - 1 ) && $total % 2 !== 0;
					?>
					<a href="<?php echo esc_url( get_permalink( $service->ID ) ); ?>" class="flex flex-col gap-[20px] items-start bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition <?php echo $is_last_full ? 'sm:col-span-2' : ''; ?>">
							<?php if ( $icon ) : ?>
								<img src="<?php echo esc_url( $icon ); ?>" alt="" class="h-[52px] object-contain">
							<?php else : ?>
								<i data-lucide="file-text" class="w-5 h-5 text-primary"></i>
							<?php endif; ?>
						<div class="flex flex-col gap-[10px]">
							<h4 class="font-bold md:text-[22px] text-gray-900"><?php echo esc_html( $service->post_title ); ?></h4>
						<?php if ( $hero_desc ) : ?>
						<p class="text-gray-600 text-base"><?php echo esc_html( $hero_desc ); ?></p>
						</div>
						<?php endif; ?>
					</a>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
        </div>
    </section>

    <!-- Для кого подойдут наши услуги -->
    <section class="py-16 lg:py-24">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html( $services_audience_title ); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $services_audience_description ); ?></p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="building-2" class="w-5 h-5 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Бизнес</h4>
                    <p class="text-gray-600 text-sm">Подбираем оборудование для офисов, магазинов, коммерческих помещений и других задач бизнеса, где важны безопасность, контроль и надёжность.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="wrench" class="w-5 h-5 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Монтажные организации</h4>
                    <p class="text-gray-600 text-sm">Поставляем оборудование для подрядчиков и специалистов, которым важно быстро подобрать совместимые решения под проект и объект.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="factory" class="w-5 h-5 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Производственные объекты</h4>
                    <p class="text-gray-600 text-sm">Помогаем с выбором оборудования для производственных площадок, складов и объектов с повышенными требованиями к безопасности.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="building" class="w-5 h-5 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Коммерческие и административные объекты</h4>
                    <p class="text-gray-600 text-sm">Подбираем решения для объектов, где важны стабильная работа системы, удобство эксплуатации и корректная документация.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Как строится работа -->
    <section class="py-16 lg:py-24">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html( $services_work_title ); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $services_work_description ); ?></p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">01</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-text" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Запрос</h4>
                    <p class="text-gray-600 text-sm">Клиент обращается с задачей, перечнем оборудования или описание объекта.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">02</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="sliders-horizontal" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Консультация и подбор</h4>
                    <p class="text-gray-600 text-sm">Помогаем подобрать оборудование с учетом требований, совместимости и бюджета.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">03</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-check" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Согласование решения</h4>
                    <p class="text-gray-600 text-sm">Уточняем состав поставки, характеристики, наличие и условия сотрудничества.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">04</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="truck" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Поставка оборудования</h4>
                    <p class="text-gray-600 text-sm">Организуем поставку оборудования по Минску и по всей Беларуси.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">05</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-6 h-6 text-primary"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Поддержка и сопровождение</h4>
                    <p class="text-gray-600 text-sm">При необходимости консультируем дальше, подключаем обслуживание, модернизацию и техническую помощь.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Почему нам доверяют -->
    <section class="py-16 lg:py-24">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><?php echo esc_html( $services_trust_title ); ?></h2>
                <p class="text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $services_trust_description ); ?></p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="calendar" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">С 2012 года на рынке</h4>
                            <p class="text-gray-600 text-sm">Более 14 лет работаем в сфере систем безопасности и поставок оборудования для объектов разного масштаба.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="sliders-horizontal" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Подбор под задачу</h4>
                            <p class="text-gray-600 text-sm">Помогаем подобрать оборудование с учетом объекта, задач, совместимости и бюджета.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Поставка по всей Беларуси</h4>
                            <p class="text-gray-600 text-sm">Работаем с клиентами по всей РБ и организуем поставку оборудования на объект.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="file-text" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Сертификаты и документы</h4>
                            <p class="text-gray-600 text-sm">Предоставляем сопроводительную документацию и подтверждающие материалы по продукции.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="shield-check" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Техническая экспертиза</h4>
                            <p class="text-gray-600 text-sm">Консультируем по ОПС, СКУД и видеонаблюдению, помогаем разобраться в характеристиках и выборе.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="wrench" class="w-5 h-5 text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">Поддержка после покупки</h4>
                            <p class="text-gray-600 text-sm">При необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<?php get_template_part( 'template-parts/contact-form-section' ); ?>
		<script>
        lucide.createIcons();
    </script>

<?php
get_footer();
