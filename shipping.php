<?php
/**
 * Template Name: Shipping
 *
 * @package guardexpert
 */

get_header();

$shipping_hero_title        = get_field( 'shipping_hero_title' ) ?: 'Оплата и доставка';
$shipping_hero_description  = get_field( 'shipping_hero_description' ) ?: 'На этой странице собрана основная информация о способах оплаты, условиях поставки и порядке согласования доставки. Если у вас остались вопросы по конкретному заказу, свяжитесь с нами — поможем уточнить детали.';
$shipping_hero_bg           = get_field( 'shipping_hero_bg' );
$shipping_payment_title     = get_field( 'shipping_payment_title' ) ?: 'Способы оплаты';
$shipping_delivery_title    = get_field( 'shipping_delivery_title' ) ?: 'Условия доставки';
$shipping_process_title     = get_field( 'shipping_process_title' ) ?: 'Как строится работа';
$shipping_process_description = get_field( 'shipping_process_description' ) ?: 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.';

$shipping_process_items = get_field( 'shipping_process_items' );
if ( empty( $shipping_process_items ) || ! is_array( $shipping_process_items ) ) {
	$shipping_process_items = array(
		array( 'icon' => '', 'title' => 'Запрос', 'description' => 'Клиент обращается с задачей, перечнем оборудования или описанием объекта.' ),
		array( 'icon' => '', 'title' => 'Консультация и подбор', 'description' => 'Помогаем подобрать оборудование с учетом требований, совместимости и бюджета.' ),
		array( 'icon' => '', 'title' => 'Согласование решения', 'description' => 'Уточняем состав поставки, характеристики, наличие и условия сотрудничества.' ),
		array( 'icon' => '', 'title' => 'Поставка оборудования', 'description' => 'Организуем поставку оборудования по Минску и по всей Беларуси.' ),
		array( 'icon' => '', 'title' => 'Поддержка и сопровождение', 'description' => 'При необходимости консультируем дальше, подключаем обслуживание, модернизацию и техническую помощь.' ),
	);
}

$shipping_process_lucide_icons = array( 'file-text', 'sliders-horizontal', 'file-check', 'truck', 'settings' );

$shipping_faq_title         = get_field( 'shipping_faq_title' ) ?: 'Частые вопросы';
$shipping_faq_description   = get_field( 'shipping_faq_description' ) ?: 'Собрали ответы на основные вопросы по оформлению заказа, оплате и условиям поставки. Если нужной информации нет в списке, свяжитесь с нами — поможем уточнить детали.';

if ( empty( $shipping_hero_bg ) ) {
	$shipping_hero_bg = get_template_directory_uri() . '/img/shipping-bg.png';
}
?>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .hero-delivery-bg {
            background: linear-gradient(135deg, #f5f0ec 0%, #ede6e0 50%, #e8dfd8 100%);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .faq-answer.open {
            max-height: 200px;
        }
        .faq-icon {
            transition: transform 0.3s ease;
        }
        .faq-icon.rotated {
            transform: rotate(180deg);
        }
    </style>
<!-- Hero Section -->
    <section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( $shipping_hero_bg ); ?>')] bg-cover bg-center">
        <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-1/2 relative z-10">
                    <nav class="text-[14px] mb-6">
                        <a href="/" class="hover:text-[#66666B] text-gray-500">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-black">Оплата и доставка</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html( $shipping_hero_title ); ?>
                    </h1>
                    <p class="text-black text-base lg:text-lg mb-8 max-w-[590px] !leading-[1.2]">
                        <?php echo esc_html( $shipping_hero_description ); ?>
                    </p>
                    <a href="#" class="js-open-consultation inline-flex items-center justify-center gap-2 bg-[#B3262E] text-[#FAF9F7] px-8 py-3 rounded-[2px] font-normal hover:bg-[#8B1A2B] transition shadow-md md:w-[285px] md:h-[52px] text-[15px]">
                        Получить консультацию
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Способы оплаты -->
    <section class="py-8 lg:py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-sm p-6 lg:p-[10px] shadow-md">
                <h2 class="text-2xl lg:text-4xl font-semibold text-gray-900 mb-6"><?php echo esc_html( $shipping_payment_title ); ?></h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px]  shadow-md hover:shadow-lg transition">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Безналичный расчет</h4>
                        <p class="text-black font-normal text-base">Оплата возможна по безналичному расчету. После согласования заказа уточняем состав поставки и необходимые данные для оформления.</p>
                    </div>
										<div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px]  shadow-md hover:shadow-lg transition">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Согласование по заказу</h4>
                        <p class="text-black font-normal text-base">Перед оплатой уточняем наличие оборудования, стоимость, комплектность и условия поставки по конкретной позиции или заказу.</p>
                    </div>

										<div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px]  shadow-md hover:shadow-lg transition">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Помощь по заказу</h4>
                        <p class="text-black font-normal text-base">Если у вас есть вопросы по оплате, составу заказа или условиям поставки, свяжитесь с нами - поможем уточнить детали.</p>
                    </div>
                </div>
            </div>

						<div class="bg-white border border-gray-200 rounded-sm p-6 lg:p-[10px] shadow-md md:mt-[40px]">
                <h2 class="text-2xl lg:text-4xl font-semibold text-gray-900 mb-6"><?php echo esc_html( $shipping_delivery_title ); ?></h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-[18px]">
                    <div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px] shadow-md hover:shadow-lg transition lg:px-[14px] lg:py-[24px]">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Доставка по Республике Беларусь</h4>
                        <p class="text-black font-normal text-base max-w-[180px]">Организуем поставку оборудования по всей территории Беларуси.</p>
                    </div>

										<div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px] shadow-md hover:shadow-lg transition lg:px-[14px] lg:py-[24px]">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Доставка до объекта</h4>
                        <p class="text-black font-normal text-base max-w-[227px]">По согласованию возможна доставка оборудования непосредственно на объект.</p>
                    </div>

										<div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px] shadow-md hover:shadow-lg transition lg:px-[14px] lg:py-[24px]">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Сроки поставки</h4>
                        <p class="text-black font-normal text-base max-w-[230px]">Сроки зависят от наличия оборудования, объема заказа и адреса доставки. Точные условия уточняются при согласовании.</p>
                    </div>

										<div class="bg-white border border-gray-200 rounded-[4px] py-[20px] px-[64px] shadow-md hover:shadow-lg transition lg:px-[14px] lg:py-[24px]">
                        <h4 class="font-semibold md:text-[22px] text-black mb-3">Предварительное согласование</h4>
                        <p class="text-black font-normal text-base max-w-[270px]">Перед доставкой уточняем состав закза, формат поставки, адрес и другие организационные детали.</p>
                    </div>
										
                </div>
            </div>
        </div>
    </section>

    <!-- Как строится работа -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-[48px] font-bold text-black mb-4"><?php echo esc_html( $shipping_process_title ); ?></h2>
                <p class="text-black md:text-lg mx-auto"><?php echo esc_html( $shipping_process_description ); ?></p>
            </div>

            <?php $total_work = count( $shipping_process_items ); ?>
            <!-- Mobile: horizontal slider -->
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-2 pb-4 sm:hidden scroll-smooth" style="-webkit-overflow-scrolling: touch;">
                <?php foreach ( $shipping_process_items as $i => $item ) :
                    $step_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $step_title = isset( $item['title'] ) ? $item['title'] : '';
                    $step_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $shipping_process_lucide_icons[ $i ] ) ? $shipping_process_lucide_icons[ $i ] : 'circle';
                    $step_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                ?>
                <div class="flex gap-0 shrink-0 snap-start w-[70%] min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                        <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo esc_html( $step_num ); ?></div>
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
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Tablet: 2 columns grid -->
            <div class="hidden sm:grid sm:grid-cols-2 lg:hidden gap-4">
                <?php foreach ( $shipping_process_items as $i => $item ) :
                    $step_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $step_title = isset( $item['title'] ) ? $item['title'] : '';
                    $step_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $shipping_process_lucide_icons[ $i ] ) ? $shipping_process_lucide_icons[ $i ] : 'circle';
                    $step_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                ?>
                <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                    <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo esc_html( $step_num ); ?></div>
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
                <?php endforeach; ?>
            </div>

            <!-- Desktop: grid with arrows -->
            <div class="hidden lg:flex gap-0">
                <?php foreach ( $shipping_process_items as $i => $item ) :
                    $step_icon  = isset( $item['icon'] ) ? $item['icon'] : '';
                    $step_title = isset( $item['title'] ) ? $item['title'] : '';
                    $step_desc  = isset( $item['description'] ) ? $item['description'] : '';
                    $lucide_name = isset( $shipping_process_lucide_icons[ $i ] ) ? $shipping_process_lucide_icons[ $i ] : 'circle';
                    $step_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                    $is_last = ( $i === $total_work - 1 );
                ?>
                <div class="flex gap-0 flex-1 min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-2 shadow-md hover:shadow-lg transition relative flex-1 min-w-0 h-full">
                        <div class="text-[48px] font-['Geologica'] font-semibold text-gray-200 mb-3"><?php echo esc_html( $step_num ); ?></div>
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
                    <div class="flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#B22234" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m9 18 6-6-6-6"/></svg>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Частые вопросы -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-[48px] font-bold text-black mb-4"><?php echo esc_html( $shipping_faq_title ); ?></h2>
                <p class="text-black text-[18px] leading-relaxed"><?php echo esc_html( $shipping_faq_description ); ?></p>
            </div>

            <div class="w-full">
                <?php
                $faq_items = get_field( 'shipping_faq_items' );
                if ( ! empty( $faq_items ) ) :
                    foreach ( $faq_items as $item ) :
                        $question = ! empty( $item['faq_question'] ) ? $item['faq_question'] : '';
                        $answer   = ! empty( $item['faq_answer'] ) ? $item['faq_answer'] : '';
                        if ( empty( $question ) && empty( $answer ) ) continue;
                ?>
                <div class="faq-item bg-white border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-semibold md:text-[22px] text-black pr-4"><?php echo esc_html( $question ); ?></span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-black text-sm md:text-lg pb-5"><?php echo esc_html( $answer ); ?></p>
                    </div>
                </div>
                <?php
                    endforeach;
                else :
                ?>
                <div class=""></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script>
        lucide.createIcons();

        function toggleFaq(button) {
            const faqItem = button.closest('.faq-item');
            const answer = faqItem.querySelector('.faq-answer');
            const icon = button.querySelector('.faq-icon');
            const isOpen = answer.classList.contains('open');

            // Close all
            document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
            document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotated'));

            // Open clicked if it was closed
            if (!isOpen) {
                answer.classList.add('open');
                icon.classList.add('rotated');
            }
        }
    </script>
<?php
get_footer();
