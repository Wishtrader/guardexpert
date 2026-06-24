<?php
/**
 * Template Name: Returns
 *
 * @package guardexpert
 */

get_header();

$returns_hero_title        = get_field( 'returns_hero_title' ) ?: 'Возврат и обмен';
$returns_hero_description  = get_field( 'returns_hero_description' ) ?: 'На этой странице собрана основная информация о порядке возврата и обмена товара. Если у вас остались вопросы по конкретной позиции или условиям поставки, свяжитесь с нами — поможем уточнить детали.';
$returns_hero_bg           = get_field( 'returns_hero_bg' );
$returns_hero_bg_mobile   = get_field( 'returns_hero_bg_mobile' );
$returns_important_title   = get_field( 'returns_important_title' ) ?: 'Что важно знать';
$returns_important_description = get_field( 'returns_important_description' ) ?: 'Условия возврата и обмена зависят от состояния товара, его комплектности, сохранности упаковки и характера поставки. Для уточнения деталей по конкретному заказу рекомендуем связаться с нами до оформления возврата.';
$returns_terms_title       = get_field( 'returns_terms_title' ) ?: 'Условия возврата и обмена';
$returns_process_title     = get_field( 'returns_process_title' ) ?: 'Как происходит возврат и обмен';
$returns_process_description = get_field( 'returns_process_description' ) ?: 'Если у вас возник вопрос по возврату или обмену товара, рекомендуем предварительно связаться с нами. Мы поможем уточнить порядок действий по конкретной позиции, комплектности и условиям поставки.';
$returns_faq_title         = get_field( 'returns_faq_title' ) ?: 'Частые вопросы';
$returns_faq_description   = get_field( 'returns_faq_description' ) ?: 'Собрали ответы на вопросы, которые чаще всего возникают при возврате или обмене товара. Если вашей ситуации нет в списке, свяжитесь с нами — поможем уточнить детали.';

if ( empty( $returns_hero_bg ) ) {
	$returns_hero_bg = get_template_directory_uri() . '/img/return-bg.png';
}
?>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .hero-return-bg {
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

    <?php if ( ! empty( $returns_hero_bg_mobile ) ) : ?>
    <style>
        @media (max-width: 767px) {
            .returns-hero-section {
                background-image: url('<?php echo esc_url( $returns_hero_bg_mobile ); ?>') !important;
            }
        }
    </style>
    <?php endif; ?>

		<!-- Hero Section -->
    <section class="returns-hero-section relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( $returns_hero_bg ); ?>')] bg-cover bg-right">
        <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-1/2 relative z-10">
                    <nav class="text-sm text-gray-500 mb-6">
                        <a href="#" class="hover:text-[#B22234]">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">Возврат и обмен</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html( $returns_hero_title ); ?>
                    </h1>
                    <p class="text-black text-base lg:text-lg mb-8 max-w-lg !leading-[1.2]">
                        <?php echo esc_html( $returns_hero_description ); ?>
                    </p>
                    <a href="#" class="js-open-consultation inline-flex lg:w-[285px] lg:h-[52px] items-center justify-center gap-2 bg-[#B22234] text-white px-8 py-3 rounded-[2px] font-nornal text-[15px] hover:bg-[#8B1A2B] transition">
                        Получить консультацию
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Что важно знать -->
    <section class="py-10 md:pt-20">
        <div class="max-w-[1200px] mx-auto px-4 w-full">
            <div class="bg-white border border-gray-200 rounded-[4px] px-2 py-4 shadow-md">
                <h2 class="text-2xl md:text-[36px] font-bold text-gray-900 mb-4"><?php echo esc_html( $returns_important_title ); ?></h2>
                <p class="text-gray-600">
                    <?php echo esc_html( $returns_important_description ); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Условия возврата и обмена -->
    <section class="pb-12 lg:pb-16">
        <div class="max-w-[1180px] mx-auto bg-white border border-gray-200 rounded-[4px] px-2 py-4 shadow-sm">
            <h2 class="text-2xl md:text-[36px] font-bold text-gray-900 mb-8"><?php echo esc_html( $returns_terms_title ); ?></h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php
                $terms_cards = get_field( 'returns_terms_cards' );
                if ( $terms_cards ) :
                    foreach ( $terms_cards as $card ) :
                ?>
                <div class="bg-white border border-gray-200 rounded-[4px] px-4 py-5 shadow-md hover:shadow-md transition">
                    <h4 class="font-semibold text-black md:text-[22px] mb-3 leading-[1.2]"><?php echo esc_html( $card['card_title'] ); ?></h4>
                    <p class="text-black text-sm md:text-base"><?php echo esc_html( $card['card_description'] ); ?></p>
                </div>
                <?php
                    endforeach;
                else :
                    $default_cards = array(
                        array( 'title' => 'Товар надлежащего качества', 'desc' => 'Возврат или обмен возможен при сохранности товарного вида, комплектности и упаковки, если товар не был в эксплуатации и соответствует условия возврата.' ),
                        array( 'title' => 'Товар с недостатками', 'desc' => 'Если при получении или в процессе эксплуатации выявлены недостатки, свяжитесь с нами. Мы поможем уточнить порядок дальнейших действий по конкретной ситуации.' ),
                        array( 'title' => 'Документы и подтверждение', 'desc' => 'Для обращения по возврату или обмену желательно сохранить документы, подтверждающие покупку, а также информацию по заказу и товарной позиции.' ),
                        array( 'title' => 'Согласование обращения', 'desc' => 'Перед возвратом или обменом рекомендуем заранее связаться с менеджером, чтобы уточнить порядок передачи товара, комплектность и дальнейшие шаги.' ),
                    );
                    foreach ( $default_cards as $card ) :
                ?>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-3"><?php echo esc_html( $card['title'] ); ?></h4>
                    <p class="text-gray-600 text-sm"><?php echo esc_html( $card['desc'] ); ?></p>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Как происходит возврат и обмен -->
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-[48px] font-bold text-black mb-4"><?php echo esc_html( $returns_process_title ); ?></h2>
                <p class="text-black text-lg"><?php echo esc_html( $returns_process_description ); ?></p>
            </div>

            <?php
            $step_defaults = array(
                array(
                    'icon'        => 'file-text',
                    'title'       => 'Обращение',
                    'description' => 'Свяжитесь с нами по телефону или электронной почте и сообщите номер заказа либо наименование товара, по которому требуется возврат или обмен.',
                ),
                array(
                    'icon'        => 'sliders-horizontal',
                    'title'       => 'Уточнение деталей',
                    'description' => 'Мы уточним состояние товара, комплектность, наличие упаковки и документы по заказу, а также подскажем, какой порядок действий подходит в вашей ситуации. Для возврата товара надлежащего качества обычно важно, чтобы товар не был в употреблении, были сохранены его потребительские свойства и упаковка, если товар продавался в ней.',
                ),
                array(
                    'icon'        => 'file-check',
                    'title'       => 'Согласование передачи товара',
                    'description' => 'После уточнения деталей мы сообщим, куда и каким образом можно передать товар для рассмотрения обращения. Возврат или обмен производится в месте приобретения товара либо в иных местах, объявленных продавцом.',
                ),
                array(
                    'icon'        => 'truck',
                    'title'       => 'Проверка товара',
                    'description' => 'После получения товара мы проверяем его комплектность, состояние, упаковку и сопроводительную информацию, чтобы определить дальнейший порядок обмена или возврата.',
                ),
                array(
                    'icon'        => 'settings',
                    'title'       => 'Решение по обращению',
                    'description' => 'По результатам рассмотрения обращения мы сообщим, возможен ли обмен, возврат денежных средств или иное решение по вашей ситуации. Если речь идёт о возврате товара надлежащего качества, деньги возвращаются в той же форме, в которой была произведена оплата, если стороны не согласовали иной порядок; по общему правилу возврат суммы должен быть произведён незамедлительно, а если это невозможно — не позднее 7 дней.',
                ),
            );

            $cards = get_field( 'returns_process_cards' );
            $use_acf = ! empty( $cards ) && is_array( $cards );
            $items = $use_acf ? $cards : $step_defaults;
            $total = count( $items );
            ?>

            <!-- Mobile: horizontal slider -->
            <div class="flex overflow-x-auto snap-x snap-mandatory gap-2 pb-4 sm:hidden scroll-smooth" style="-webkit-overflow-scrolling: touch;">
                <?php foreach ( $items as $i => $item ) :
                    if ( $use_acf ) {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = ! empty( $item['step_icon'] ) ? $item['step_icon'] : $step_defaults[ $i ]['icon'];
                        $title = ! empty( $item['step_title'] ) ? $item['step_title'] : $step_defaults[ $i ]['title'];
                        $desc  = ! empty( $item['step_description'] ) ? $item['step_description'] : $step_defaults[ $i ]['description'];
                        $is_url = filter_var( $icon, FILTER_VALIDATE_URL );
                    } else {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = $item['icon'];
                        $title = $item['title'];
                        $desc  = $item['description'];
                        $is_url = false;
                    }
                ?>
                <div class="flex gap-0 shrink-0 snap-start w-[70%] min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-[10px] hover:shadow-md transition relative flex-1 min-w-0 h-full">
                        <div class="text-[48px] font-bold text-black/15 mb-3"><?php echo esc_html( $num ); ?></div>
                        <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                            <?php if ( $is_url ) : ?>
                                <img src="<?php echo esc_url( $icon ); ?>" alt="" class="w-auto h-[52px] object-contain" />
                            <?php else : ?>
                                <i data-lucide="<?php echo esc_attr( $icon ); ?>" class="w-6 h-6 text-[#B22234]"></i>
                            <?php endif; ?>
                        </div>
                        <h4 class="font-semibold text-[22px] leading-[1.2] text-black mb-2"><?php echo esc_html( $title ); ?></h4>
                        <p class="text-gray-600 text-sm"><?php echo esc_html( $desc ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Tablet: 2 columns grid -->
            <div class="hidden sm:grid sm:grid-cols-2 lg:hidden gap-4">
                <?php foreach ( $items as $i => $item ) :
                    if ( $use_acf ) {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = ! empty( $item['step_icon'] ) ? $item['step_icon'] : $step_defaults[ $i ]['icon'];
                        $title = ! empty( $item['step_title'] ) ? $item['step_title'] : $step_defaults[ $i ]['title'];
                        $desc  = ! empty( $item['step_description'] ) ? $item['step_description'] : $step_defaults[ $i ]['description'];
                        $is_url = filter_var( $icon, FILTER_VALIDATE_URL );
                    } else {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = $item['icon'];
                        $title = $item['title'];
                        $desc  = $item['description'];
                        $is_url = false;
                    }
                ?>
                <div class="bg-white border border-gray-200 rounded-[4px] p-[10px] hover:shadow-md transition relative flex-1 min-w-0 h-full">
                    <div class="text-[48px] font-bold text-black/15 mb-3"><?php echo esc_html( $num ); ?></div>
                    <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <?php if ( $is_url ) : ?>
                            <img src="<?php echo esc_url( $icon ); ?>" alt="" class="w-auto h-[52px] object-contain" />
                        <?php else : ?>
                            <i data-lucide="<?php echo esc_attr( $icon ); ?>" class="w-6 h-6 text-[#B22234]"></i>
                        <?php endif; ?>
                    </div>
                    <h4 class="font-semibold text-[22px] leading-[1.2] text-black mb-2"><?php echo esc_html( $title ); ?></h4>
                    <p class="text-gray-600 text-sm"><?php echo esc_html( $desc ); ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Desktop: grid with arrows -->
            <div class="hidden lg:flex gap-0">
                <?php foreach ( $items as $i => $item ) :
                    if ( $use_acf ) {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = ! empty( $item['step_icon'] ) ? $item['step_icon'] : $step_defaults[ $i ]['icon'];
                        $title = ! empty( $item['step_title'] ) ? $item['step_title'] : $step_defaults[ $i ]['title'];
                        $desc  = ! empty( $item['step_description'] ) ? $item['step_description'] : $step_defaults[ $i ]['description'];
                        $is_url = filter_var( $icon, FILTER_VALIDATE_URL );
                    } else {
                        $num   = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $icon  = $item['icon'];
                        $title = $item['title'];
                        $desc  = $item['description'];
                        $is_url = false;
                    }
                    $is_last = ( $i === $total - 1 );
                ?>
                <div class="flex gap-0 flex-1 min-w-0">
                    <div class="bg-white border border-gray-200 rounded-[4px] p-[10px] hover:shadow-md transition relative flex-1 min-w-0 h-full">
                        <div class="text-[48px] font-bold text-black/15 mb-3"><?php echo esc_html( $num ); ?></div>
                        <div class="w-[94px] h-[94px] rounded-full bg-red-50 flex items-center justify-center mb-4">
                            <?php if ( $is_url ) : ?>
                                <img src="<?php echo esc_url( $icon ); ?>" alt="" class="w-auto h-[52px] object-contain" />
                            <?php else : ?>
                                <i data-lucide="<?php echo esc_attr( $icon ); ?>" class="w-6 h-6 text-[#B22234]"></i>
                            <?php endif; ?>
                        </div>
                        <h4 class="font-semibold text-[22px] leading-[1.2] text-black mb-2"><?php echo esc_html( $title ); ?></h4>
                        <p class="text-gray-600 text-sm"><?php echo esc_html( $desc ); ?></p>
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
                <h2 class="text-3xl md:text-[48px] font-bold text-black mb-4"><?php echo esc_html( $returns_faq_title ); ?></h2>
                <p class="text-black text-[18px] leading-relaxed"><?php echo esc_html( $returns_faq_description ); ?></p>
            </div>

            <div class="w-full">
                <?php
                $faq_items = get_field( 'returns_faq_items' );
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
<?php get_template_part( 'template-parts/contact-form-section' ); ?>
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
