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

$services_audience_items = get_field( 'services_audience_items' );
if ( empty( $services_audience_items ) || ! is_array( $services_audience_items ) ) {
	$services_audience_items = array(
		array( 'icon' => '', 'title' => 'Бизнес', 'description' => 'Подбираем оборудование для офисов, магазинов, коммерческих помещений и других задач бизнеса, где важны безопасность, контроль и надёжность.' ),
		array( 'icon' => '', 'title' => 'Монтажные организации', 'description' => 'Поставляем оборудование для подрядчиков и специалистов, которым важно быстро подобрать совместимые решения под проект и объект.' ),
		array( 'icon' => '', 'title' => 'Производственные объекты', 'description' => 'Помогаем с выбором оборудования для производственных площадок, складов и объектов с повышенными требованиями к безопасности.' ),
		array( 'icon' => '', 'title' => 'Коммерческие и административные объекты', 'description' => 'Подбираем решения для объектов, где важны стабильная работа системы, удобство эксплуатации и корректная документация.' ),
	);
}

$services_audience_lucide_icons = array( 'building-2', 'wrench', 'factory', 'building' );
$services_work_title        = get_field( 'services_work_title' ) ?: 'Как строится работа';
$services_work_description  = get_field( 'services_work_description' ) ?: 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.';

$services_work_items = get_field( 'services_work_items' );
if ( empty( $services_work_items ) || ! is_array( $services_work_items ) ) {
	$services_work_items = array(
		array( 'icon' => '', 'title' => 'Запрос', 'description' => 'Клиент обращается с задачей, перечнем оборудования или описание объекта.' ),
		array( 'icon' => '', 'title' => 'Консультация и подбор', 'description' => 'Помогаем подобрать оборудование с учетом требований, совместимости и бюджета.' ),
		array( 'icon' => '', 'title' => 'Согласование решения', 'description' => 'Уточняем состав поставки, характеристики, наличие и условия сотрудничества.' ),
		array( 'icon' => '', 'title' => 'Поставка оборудования', 'description' => 'Организуем поставку оборудования по Минску и по всей Беларуси.' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение', 'description' => 'При необходимости консультируем дальше, подключаем обслуживание, модернизацию и техническую помощь.' ),
	);
}

$services_work_lucide_icons = array( 'file-text', 'sliders-horizontal', 'file-check', 'truck', 'settings' );
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
                <?php foreach ( $services_audience_items as $i => $item ) :
                    $audience_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $audience_title = isset( $item['title'] ) ? $item['title'] : '';
                    $audience_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name    = isset( $services_audience_lucide_icons[ $i ] ) ? $services_audience_lucide_icons[ $i ] : 'circle';
                ?>
                <div class="flex flex-col gap-5 items-start bg-white border border-gray-200 rounded-[4px] p-5 shadow-md hover:shadow-lg transition">
                    <?php if ( ! empty( $audience_icon ) ) : ?>
                        <img src="<?php echo esc_url( $audience_icon ); ?>" alt="" class="h-[52px] object-contain">
                    <?php else : ?>
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                            <i data-lucide="<?php echo esc_attr( $lucide_name ); ?>" class="w-5 h-5 text-primary"></i>
                        </div>
                    <?php endif; ?>
                    <h4 class="font-semibold text-black text-[22px] leading-[1.2]"><?php echo esc_html( $audience_title ); ?></h4>
                    <p class="text-black text-base leading-[1.2]"><?php echo esc_html( $audience_desc ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Как строится работа -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html( $services_work_title ); ?></h2>
                <p class="text-black md:text-lg mx-auto"><?php echo esc_html( $services_work_description ); ?></p>
            </div>

            <?php $total_work = count( $services_work_items ); ?>
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-2 pb-4 sm:pb-0 sm:flex-row scroll-smooth" style="-webkit-overflow-scrolling: touch;">
                <?php foreach ( $services_work_items as $i => $item ) :
                    $step_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $step_title = isset( $item['title'] ) ? $item['title'] : '';
                    $step_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $services_work_lucide_icons[ $i ] ) ? $services_work_lucide_icons[ $i ] : 'circle';
                    $step_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                    $is_last = ( $i === $total_work - 1 );
                ?>
                <div class="flex gap-2 shrink-0 snap-start w-[70%] sm:w-auto sm:flex-1 min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-2 md:p-5 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                        <div class="md:text-[48px] font-semibold text-gray-200 mb-3"><?php echo esc_html( $step_num ); ?></div>
                        <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                            <?php if ( ! empty( $step_icon ) ) : ?>
                                <img src="<?php echo esc_url( $step_icon ); ?>" alt="" class="h-[52px] object-contain">
                            <?php else : ?>
                                <i data-lucide="<?php echo esc_attr( $lucide_name ); ?>" class="w-6 h-6 text-primary"></i>
                            <?php endif; ?>
                        </div>
                        <h4 class="font-semibold text-black text-[22px] leading-[1.2] mb-4"><?php echo esc_html( $step_title ); ?></h4>
                        <p class="text-black text-sm leading-[1.2]"><?php echo esc_html( $step_desc ); ?></p>
                    </div>
                    <?php if ( ! $is_last ) : ?>
                    <div class="hidden sm:flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#B22234" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m9 18 6-6-6-6"/></svg>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
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
