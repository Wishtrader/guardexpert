<?php
/**
 * Template Name: About
 *
 * @package guardexpert
 */

get_header();

$about_hero_title       = get_field( 'about_hero_title' ) ?: 'Гардэкспер - поставка оборудования и экспертная поддержка для систем безопасности';
$about_hero_description = get_field( 'about_hero_description' ) ?: 'С 2012 года работаем в сфере систем безопасности, поставляем оборудование для ОПС, СКУД и видеонаблюдения, консультируем по подбору, совместимости и сопровождению решений для бизнеса и объектов по всей Беларуси.';
$about_hero_bg          = get_field( 'about_hero_bg' );
$about_who_title        = get_field( 'about_who_title' ) ?: 'Кто мы?';
$about_who_description  = get_field( 'about_who_description' ) ?: 'Гардэксперт — компания в сфере систем безопасности и поставок оборудования для объектов различного назначения. Мы помогаем клиентам подобрать оборудование под задачу, консультируем по характеристикам и совместимости, а при необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию.';
$about_who_image        = get_field( 'about_who_image' );
$about_why_title        = get_field( 'about_why_title' ) ?: 'Почему выбирают Гардэксперт';
$about_why_description  = get_field( 'about_why_description' ) ?: 'Надёжная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.';

$about_why_items = get_field( 'about_why_items' );
if ( empty( $about_why_items ) || ! is_array( $about_why_items ) ) {
	$about_why_items = array(
		array( 'icon' => '', 'title' => 'С 2012 года на рынке', 'description' => 'Более 14 лет работаем в сфере систем безопасности и поставок оборудования для объектов разного масштаба.' ),
		array( 'icon' => '', 'title' => 'Подбор под задачу', 'description' => 'Помогаем подобрать оборудование с учетом объекта, задач, совместимости и бюджета.' ),
		array( 'icon' => '', 'title' => 'Поставка по всей Беларуси', 'description' => 'Работаем с клиентами по всей РБ и организуем поставку оборудования на объект.' ),
		array( 'icon' => '', 'title' => 'Сертификаты и документы', 'description' => 'Предоставляем сопроводительную документацию и подтверждающие материалы по продукции.' ),
		array( 'icon' => '', 'title' => 'Техническая экспертиза', 'description' => 'Консультируем по ОПС, СКУД и видеонаблюдению, помогаем разобраться в характеристиках и выборе.' ),
		array( 'icon' => '', 'title' => 'Поддержка после покупки', 'description' => 'При необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию.' ),
	);
}

$about_why_lucide_icons = array( 'calendar', 'sliders-horizontal', 'map-pin', 'file-text', 'shield-check', 'wrench' );

$about_what_title        = get_field( 'about_what_title' ) ?: 'Чем мы занимаемся';
$about_what_description  = get_field( 'about_what_description' ) ?: 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.';
$about_what_big_image    = get_field( 'about_what_big_image' );

$about_what_items = get_field( 'about_what_items' );
if ( empty( $about_what_items ) || ! is_array( $about_what_items ) ) {
	$about_what_items = array(
		array( 'icon' => '', 'title' => 'Проектирование', 'description' => 'Подготавливаем решения с учетом особенностей объекта и требований системы.' ),
		array( 'icon' => '', 'title' => 'Монтаж', 'description' => 'Организуем установку оборудования и корректную работу системы на объекте.' ),
		array( 'icon' => '', 'title' => 'Пусконаладка', 'description' => 'Настраиваем оборудование, проверяем работу системы и вводим ее в эксплуатацию.' ),
		array( 'icon' => '', 'title' => 'Подбор решений', 'description' => 'Помогаем выбрать оборудование с учетом задачи, совместимости и бюджета.' ),
		array( 'icon' => '', 'title' => 'Обслуживание и модернизация', 'description' => 'Сопровождаем систему после запуска, помогаем с обновлением и техническими вопросами.' ),
	);
}

$about_what_lucide_icons = array( 'file-text', 'wrench', 'zap', 'shield', 'refresh-cw' );

$about_work_with_title        = get_field( 'about_work_with_title' ) ?: 'С кем мы работаем';
$about_work_with_description  = get_field( 'about_work_with_description' ) ?: 'Подбираем оборудование и сопровождаем поставки для компаний, монтажных организаций и объектов разного масштаба по всей Беларуси.';

$about_work_with_items = get_field( 'about_work_with_items' );
if ( empty( $about_work_with_items ) || ! is_array( $about_work_with_items ) ) {
	$about_work_with_items = array(
		array( 'icon' => '', 'title' => 'Бизнес', 'description' => 'Подбираем оборудование для офисов, магазинов, коммерческих помещений и других задач бизнеса, где важны безопасность, контроль и надёжность.' ),
		array( 'icon' => '', 'title' => 'Монтажные организации', 'description' => 'Поставляем оборудование для подрядчиков и специалистов, которым важно быстро подобрать совместимые решения под проект и объект.' ),
		array( 'icon' => '', 'title' => 'Производственные объекты', 'description' => 'Помогаем с выбором оборудования для производственных площадок, складов и объектов с повышенными требованиями к безопасности.' ),
		array( 'icon' => '', 'title' => 'Коммерческие и административные объекты', 'description' => 'Подбираем решения для объектов, где важны стабильная работа системы, удобство эксплуатации и корректная документация.' ),
	);
}

$about_work_with_lucide_icons = array( 'building-2', 'wrench', 'factory', 'building' );

$about_work_title        = get_field( 'about_work_title' ) ?: 'Как строится работа';
$about_work_description  = get_field( 'about_work_description' ) ?: 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.';

$about_work_items = get_field( 'about_work_items' );
if ( empty( $about_work_items ) || ! is_array( $about_work_items ) ) {
	$about_work_items = array(
		array( 'icon' => '', 'title' => 'Запрос', 'description' => 'Клиент обращается с задачей, перечнем оборудования или описание объекта.' ),
		array( 'icon' => '', 'title' => 'Консультация и подбор', 'description' => 'Помогаем подобрать оборудование с учетом требований, совместимости и бюджета.' ),
		array( 'icon' => '', 'title' => 'Согласование решения', 'description' => 'Уточняем состав поставки, характеристики, наличие и условия сотрудничества.' ),
		array( 'icon' => '', 'title' => 'Поставка оборудования', 'description' => 'Организуем поставку оборудования по Минску и по всей Беларуси.' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение', 'description' => 'При необходимости консультируем дальше, подключаем обслуживание, модернизацию и техническую помощь.' ),
	);
}

$about_work_lucide_icons = array( 'file-text', 'sliders-horizontal', 'file-check', 'truck', 'settings' );

$about_cert_title        = get_field( 'about_cert_title' ) ?: 'Сертификаты и документы';
$about_cert_description  = get_field( 'about_cert_description' ) ?: 'Подтверждающие материалы, сопроводительная документация и документы, которые помогают работать с оборудованием уверенно и прозрачно.';

$about_stats_items = get_field( 'about_stats_items' );
if ( empty( $about_stats_items ) || ! is_array( $about_stats_items ) ) {
	$about_stats_items = array(
		array( 'icon' => '', 'title' => 'С 2012 года' ),
		array( 'icon' => '', 'title' => '14+ лет' ),
		array( 'icon' => '', 'title' => 'Поставка по всей РБ' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение' ),
	);
}

$about_stats_lucide_icons = array( 'calendar', 'shield-check', 'map-pin', 'headphones' );

if ( empty( $about_hero_bg ) ) {
	$about_hero_bg = get_template_directory_uri() . '/img/about-bg.png';
}
?>
<!-- Hero Section -->
    <section class="hero-about-bg relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( $about_hero_bg ); ?>')] bg-cover bg-right lg:min-h-[775px]">
        <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:max-w-[720px] relative z-10">
                    <nav class="text-sm text-gray-500 mb-6">
                        <a href="/" class="hover:text-[#B22234]">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">О компании</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 !leading-[1.2] mb-6">
                        <?php echo esc_html( $about_hero_title ); ?>
                    </h1>
                    <p class="text-gray-600 text-base lg:text-lg mb-8 w-full leading-[1.2]">
                        <?php echo esc_html( $about_hero_description ); ?>
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
                <?php foreach ( $about_stats_items as $i => $item ) :
                    $stats_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $stats_title = isset( $item['title'] ) ? $item['title'] : '';
                    $lucide_name = isset( $about_stats_lucide_icons[ $i ] ) ? $about_stats_lucide_icons[ $i ] : 'circle';
                ?>
                <div class="flex items-center gap-3">
                    <?php if ( ! empty( $stats_icon ) ) : ?>
                        <img src="<?php echo esc_url( $stats_icon ); ?>" alt="" class="h-[52px] object-contain">
                    <?php else : ?>
                        <i data-lucide="<?php echo esc_attr( $lucide_name ); ?>" class="w-6 h-6 text-primary"></i>
                    <?php endif; ?>
                    <div>
                        <div class="font-normal text-black md:max-w-[94px] text-sm"><?php echo esc_html( $stats_title ); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Кто мы? -->
    <section class="py-16 lg:py-24">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                <div class="grid lg:grid-cols-2">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html( $about_who_title ); ?></h2>
                        <p class="text-gray-600">
                            <?php echo esc_html( $about_who_description ); ?>
                        </p>
                    </div>
                    <div class="bg-gray-100">
                        <?php
                        $who_img = ! empty( $about_who_image ) ? $about_who_image : get_template_directory_uri() . '/img/who.png';
                        ?>
                        <img class="w-full h-full object-cover" src="<?php echo esc_url( $who_img ); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Почему выбирают Гардэксперт -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html( $about_why_title ); ?></h2>
                <p class="text-black text-lg mx-auto"><?php echo esc_html( $about_why_description ); ?></p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php foreach ( $about_why_items as $i => $item ) :
                    $why_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $why_title = isset( $item['title'] ) ? $item['title'] : '';
                    $why_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $about_why_lucide_icons[ $i ] ) ? $about_why_lucide_icons[ $i ] : 'circle';
                ?>
                <div class="flex flex-col items-start justify-start bg-white border border-gray-200 rounded-[4px] md:py-5 md:px-[30px] hover:shadow-lg transition shadow-md md:gap-5">
                    <div class="flex items-center gap-4">
                        <img src="<?php echo esc_url( $why_icon ); ?>" alt="" class="h-[52px] object-contain">
                        <h4 class="font-medium text-[22px] text-black mb-2 leading-[1.2]"><?php echo esc_html( $why_title ); ?></h4>
                    </div>
                        <p class="text-black text-sm md:text-lg !leading-[1.2]"><?php echo esc_html( $why_desc ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Чем мы занимаемся -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html( $about_what_title ); ?></h2>
                <p class="text-black md:text-lg mx-auto"><?php echo esc_html( $about_what_description ); ?></p>
            </div>

            <div class="grid lg:grid-cols-2 gap-4 mb-4">
                <!-- Large Card -->
                <div class="bg-white border border-gray-200 rounded-[4px] p-5 flex gap-5 shadow-md hover:shadow-lg">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl lg:text-[28px] font-semibold text-black !leading-[1.2]">Поставка оборудования</h3>
                        <p class="text-black md:text-lg !leading-[1.2]">Подбираем и поставляем оборудование для ОПС, СКУД, видеонаблюдения и сопутствующих инженерных решений для объектов разного масштаба.</p>
                    </div>
                    <?php if ( ! empty( $about_what_big_image ) ) : ?>
                        <img src="<?php echo esc_url( $about_what_big_image ); ?>" alt="Поставка оборудования" class="rounded-lg w-1/2 h-auto">
                    <?php else : ?>
                        <img src="https://placehold.co/500x250/f0ebe8/999?text=Security+Equipment" alt="Поставка оборудования" class="rounded-lg w-1/2 h-auto">
                    <?php endif; ?>
                </div>

                <!-- Right Column Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php foreach ( array_slice( $about_what_items, 0, 2 ) as $i => $item ) :
                        $what_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                        $what_title = isset( $item['title'] ) ? $item['title'] : '';
                        $what_desc  = isset( $item['description'] ) ? $item['description'] : '';
                        $lucide_name = isset( $about_what_lucide_icons[ $i ] ) ? $about_what_lucide_icons[ $i ] : 'circle';
                    ?>
                    <div class="flex flex-col gap-5 items-start bg-white border border-gray-200 rounded-[4px] p-5 shadow-md hover:shadow-lg transition">
                        <img src="<?php echo esc_url( $what_icon ); ?>" alt="" class="h-[52px] object-contain">
                        <h4 class="font-semibold text-[22px] text-black"><?php echo esc_html( $what_title ); ?></h4>
                        <p class="text-black text-base leading-[1.2]"><?php echo esc_html( $what_desc ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <?php foreach ( array_slice( $about_what_items, 2, 3 ) as $i => $item ) :
                    $offset = $i + 2;
                    $what_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $what_title = isset( $item['title'] ) ? $item['title'] : '';
                    $what_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $about_what_lucide_icons[ $offset ] ) ? $about_what_lucide_icons[ $offset ] : 'circle';
                ?>
                <div class="flex flex-col gap-5 items-start bg-white border border-gray-200 rounded-[4px] md:p-5 shadow-md hover:shadow-lg transition">
                    <img src="<?php echo esc_url( $what_icon ); ?>" alt="" class="h-[52px] object-contain">
                    <h4 class="font-semibold text-black text-[22px] leading-[1.2]"><?php echo esc_html( $what_title ); ?></h4>
                    <p class="text-black text-base leading-[1.2]"><?php echo esc_html( $what_desc ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center">
                <a href="#" class="js-open-consultation inline-block bg-[#B22234] text-white  lg:w-[448px] px-12 py-3 rounded-[2px] font-regular hover:bg-[#8B1A2B] transition">
                    Получить консультацию
                </a>
            </div>
        </div>
    </section>

    <!-- С кем мы работаем -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html( $about_work_with_title ); ?></h2>
                <p class="text-black md:text-lg mx-auto"><?php echo esc_html( $about_work_with_description ); ?></p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ( $about_work_with_items as $i => $item ) :
                    $work_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $work_title = isset( $item['title'] ) ? $item['title'] : '';
                    $work_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $about_work_with_lucide_icons[ $i ] ) ? $about_work_with_lucide_icons[ $i ] : 'circle';
                ?>
                <div class="flex flex-col gap-5 items-start bg-white border border-gray-200 rounded-[4px] p-5 shadow-md hover:shadow-lg transition">
                    <img src="<?php echo esc_url( $work_icon ); ?>" alt="" class="h-[52px] object-contain">
                    <h4 class="font-semibold text-black text-[22px] leading-[1.2]"><?php echo esc_html( $work_title ); ?></h4>
                    <p class="text-black text-base leading-[1.2]"><?php echo esc_html( $work_desc ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Как строится работа -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-5xl font-bold text-black mb-4"><?php echo esc_html( $about_work_title ); ?></h2>
                <p class="text-black md:text-lg mx-auto"><?php echo esc_html( $about_work_description ); ?></p>
            </div>

            <?php $total_work = count( $about_work_items ); ?>
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-2 pb-4 sm:pb-0 sm:flex-row scroll-smooth" style="-webkit-overflow-scrolling: touch;">
                <?php foreach ( $about_work_items as $i => $item ) :
                    $step_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $step_title = isset( $item['title'] ) ? $item['title'] : '';
                    $step_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $about_work_lucide_icons[ $i ] ) ? $about_work_lucide_icons[ $i ] : 'circle';
                    $step_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                    $is_last = ( $i === $total_work - 1 );
                ?>
                <div class="flex gap-2 shrink-0 snap-start w-[70%] sm:w-auto sm:flex-1 min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-2 md:p-5 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                        <div class="md:text-[48px] font-semibold text-gray-200 mb-3"><?php echo esc_html( $step_num ); ?></div>
                        <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                            <img src="<?php echo esc_url( $step_icon ); ?>" alt="" class="h-[52px] object-contain">
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

    <?php get_template_part( 'template-parts/certificates-section' ); ?>
    <?php get_template_part( 'template-parts/contact-form-section' ); ?>

    <script>
        lucide.createIcons();
    </script>
<?php
get_footer();
