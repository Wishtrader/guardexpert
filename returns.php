<?php
/**
 * Template Name: Returns
 *
 * @package guardexpert
 */

get_header();
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

		<!-- Hero Section -->
    <section class="relative overflow-hidden bg-[url('<?php echo esc_url( get_template_directory_uri() . '/img/return-bg.png' ); ?>')] bg-cover bg-right">
        <div class="max-w-[1200px] mx-auto px-4 py-12 lg:py-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-1/2 relative z-10">
                    <nav class="text-sm text-gray-500 mb-6">
                        <a href="#" class="hover:text-[#B22234]">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">Возврат и обмен</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Возврат и обмен
                    </h1>
                    <p class="text-gray-600 text-base lg:text-lg mb-8 max-w-lg">
                        На этой странице собрана основная информация о порядке возврата и обмена товара. Если у вас остались вопросы по конкретной позиции или условиям поставки, свяжитесь с нами — поможем уточнить детали.
                    </p>
                    <a href="#" class="js-open-consultation inline-flex items-center gap-2 bg-[#B22234] text-white px-8 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                        Получить консультацию
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Что важно знать -->
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Что важно знать</h2>
                <p class="text-gray-600">
                    Условия возврата и обмена зависят от состояния товара, его комплектности, сохранности упаковки и характера поставки. Для уточнения деталей по конкретному заказу рекомендуем связаться с нами до оформления возврата.
                </p>
            </div>
        </div>
    </section>

    <!-- Условия возврата и обмена -->
    <section class="pb-12 lg:pb-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-8">Условия возврата и обмена</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-3">Товар надлежащего качества</h4>
                    <p class="text-gray-600 text-sm">Возврат или обмен возможен при сохранности товарного вида, комплектности и упаковки, если товар не был в эксплуатации и соответствует условия возврата.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-3">Товар с недостатками</h4>
                    <p class="text-gray-600 text-sm">Если при получении или в процессе эксплуатации выявлены недостатки, свяжитесь с нами. Мы поможем уточнить порядок дальнейших действий по конкретной ситуации.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-3">Документы и подтверждение</h4>
                    <p class="text-gray-600 text-sm">Для обращения по возврату или обмену желательно сохранить документы, подтверждающие покупку, а также информацию по заказу и товарной позиции.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition">
                    <h4 class="font-bold text-gray-900 mb-3">Согласование обращения</h4>
                    <p class="text-gray-600 text-sm">Перед возвратом или обменом рекомендуем заранее связаться с менеджером, чтобы уточнить порядок передачи товара, комплектность и дальнейшие шаги.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Как происходит возврат и обмен -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Как происходит возврат и обмен</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Если у вас возник вопрос по возврату или обмену товара, рекомендуем предварительно связаться с нами. Мы поможем уточнить порядок действий по конкретной позиции, комплектности и условиям поставки.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">01</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-text" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Обращение</h4>
                    <p class="text-gray-600 text-sm">Свяжитесь с нами по телефону или электронной почте и сообщите номер заказа либо наименование товара, по которому требуется возврат или обмен.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">02</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="sliders-horizontal" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Уточнение деталей</h4>
                    <p class="text-gray-600 text-sm">Мы уточним состояние товара, комплектность, наличие упаковки и документы по заказу, а также подскажем, какой порядок действий подходит в вашей ситуации. Для возврата товара надлежащего качества обычно важно, чтобы товар не был в употреблении, были сохранены его потребительские свойства и упаковка, если товар продавался в ней.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">03</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-check" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Согласование передачи товара</h4>
                    <p class="text-gray-600 text-sm">После уточнения деталей мы сообщим, куда и каким образом можно передать товар для рассмотрения обращения. Возврат или обмен производится в месте приобретения товара либо в иных местах, объявленных продавцом.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">04</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="truck" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Проверка товара</h4>
                    <p class="text-gray-600 text-sm">После получения товара мы проверяем его комплектность, состояние, упаковку и сопроводительную информацию, чтобы определить дальнейший порядок обмена или возврата.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition relative">
                    <div class="text-3xl font-bold text-gray-200 mb-3">05</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Решение по обращению</h4>
                    <p class="text-gray-600 text-sm">По результатам рассмотрения обращения мы сообщим, возможен ли обмен, возврат денежных средств или иное решение по вашей ситуации. Если речь идёт о возврате товара надлежащего качества, деньги возвращаются в той же форме, в которой была произведена оплата, если стороны не согласовали иной порядок; по общему правилу возврат суммы должен быть произведён незамедлительно, а если это невозможно — не позднее 7 дней.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Частые вопросы -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Частые вопросы</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Собрали ответы на вопросы, которые чаще всего возникают при возврате или обмене товара. Если вашей ситуации нет в списке, свяжитесь с нами — поможем уточнить детали.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 (open) -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Можно ли вернуть товар, если упаковка вскрыта?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0 rotated"></i>
                    </button>
                    <div class="faq-answer open px-5 pb-5">
                        <p class="text-gray-600 text-sm">Возможность возврата зависит от состояния товара, его комплектности и характера конкретной позиции. Чтобы уточнить детали по вашему заказу, рекомендуем предварительно связаться с нами.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Что делать, если у товара обнаружен недостаток?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Если при получении или в процессе эксплуатации выявлены недостатки, свяжитесь с нами. Мы поможем уточнить порядок дальнейших действий по конкретной ситуации.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Нужны ли документы для возврата или обмена?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Для обращения по возврату или обмену желательно сохранить документы, подтверждающие покупку, а также информацию по заказу и товарной позиции.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Можно ли обменять товар на другую модель?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Возможность обмена зависит от наличия товара на складе и условий конкретной ситуации. Свяжитесь с нами для уточнения деталей.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Куда обращаться по вопросам возврата и обмена?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Вы можете связаться с нами по телефону, электронной почте или оставить заявку на сайте. Мы поможем уточнить порядок действий по вашей ситуации.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item border border-gray-200 rounded-lg mb-3 overflow-hidden">
                    <button class="faq-toggle w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition" onclick="toggleFaq(this)">
                        <span class="font-bold text-gray-900 pr-4">Сколько времени занимает рассмотрение обращения?</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-[#B22234] flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer px-5">
                        <p class="text-gray-600 text-sm pb-5">Сроки рассмотрения зависят от конкретной ситуации. По общему правилу возврат суммы должен быть произведён незамедлительно, а если это невозможно — не позднее 7 дней.</p>
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