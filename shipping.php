<?php
/**
 * Template Name: Shipping
 *
 * @package guardexpert
 */

get_header();
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
    <section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( get_template_directory_uri() . '/img/shipping-bg.png' ); ?>')] bg-cover bg-center">
        <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-1/2 relative z-10">
                    <nav class="text-[15px] mb-6">
                        <a href="/" class="hover:text-[#66666B]">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-black">Оплата и доставка</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Оплата и доставка
                    </h1>
                    <p class="text-black text-base lg:text-lg mb-8 max-w-[590px]">
                        На этой странице собрана основная информация о способах оплаты, условиях поставки и порядке согласования доставки. Если у вас остались вопросы по конкретному заказу, свяжитесь с нами - поможем уточнить детали.
                    </p>
                    <a href="#" class="js-open-consultation inline-flex items-center justify-center gap-2 bg-[#B3262E] text-[#FAF9F7] px-8 py-3 rounded font-normal hover:bg-[#8B1A2B] transition shadow-md md:w-[285px] md:h-[52px] text-[15px]">
                        Получить консультацию
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Способы оплаты -->
    <section class="py-12 lg:py-[80px] bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-sm p-6 lg:p-[10px] shadow-md">
                <h2 class="text-2xl lg:text-4xl font-semibold text-gray-900 mb-6">Способы оплаты</h2>
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
                <h2 class="text-2xl lg:text-4xl font-semibold text-gray-900 mb-6">Условия доставки</h2>
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

    <!-- Как происходит оформление и поставка -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Как происходит оформление и поставка</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Выстроили процесс так, чтобы заказ был понятным и удобным: от выбора оборудования и согласования деталей до поставки на объект.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">01</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-text" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Выбор товара</h4>
                    <p class="text-gray-600 text-sm">Клиент выбирает оборудование в каталоге или обращается за консультацией, если нужна помощь с подбором.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">02</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="sliders-horizontal" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Уточнение заказа</h4>
                    <p class="text-gray-600 text-sm">Мы уточняем наличие, характеристики, комплектность и условия поставки по выбранным позициям.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">03</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-check" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Согласование оплаты</h4>
                    <p class="text-gray-600 text-sm">Согласовываем состав заказа, стоимость и порядок оплаты.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">04</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="truck" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Подготовка к поставке</h4>
                    <p class="text-gray-600 text-sm">Комплектуем заказ, уточняем адрес, формат доставки и организационные детали по передаче оборудования.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">05</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Доставка или передача заказа</h4>
                    <p class="text-gray-600 text-sm">Организуем поставку оборудования по всей Беларуси, при необходимости — непосредственно на объект.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Частые вопросы -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Частые вопросы</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Собрали ответы на основные вопросы по оформлению заказа, оплате и условиям поставки. Если нужной информации нет в списке, свяжитесь с нами — поможем уточнить детали.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 (open) -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Можно ли оформить заказ без регистрации?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0 rotated"></i>
                    </button>
                    <div class="faq-answer open px-5 pb-5">
                        <p class="text-gray-600 text-sm">Да, оформить заказ можно без регистрации. Для связи по заказу потребуется указать основные контактные данные.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Как уточнить стоимость доставки?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Стоимость доставки зависит от адреса, объема заказа и формата поставки. Уточнить детали можно при согласовании заказа с менеджером.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Можно ли согласовать поставку на объект?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Да, по согласованию возможна доставка оборудования непосредственно на объект. Адрес и формат поставки уточняются при оформлении заказа.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Какие способы оплаты доступны?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Оплата возможна по безналичному расчету. Детали оплаты уточняются при согласовании заказа.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Как узнать сроки поставки?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Сроки зависят от наличия оборудования, объема заказа и адреса доставки. Точные условия уточняются при согласовании.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Что делать, если нужна консультация до оформления заказа?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Свяжитесь с нами по телефону, электронной почте или оставьте заявку на сайте. Мы поможем подобрать оборудование и уточнить условия поставки.</p>
                    </div>
                </div>
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