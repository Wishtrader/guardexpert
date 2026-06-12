<?php
/**
 * Template Name: About
 *
 * @package guardexpert
 */

get_header();
?>
<!-- Hero Section -->
    <section class="hero-about-bg relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( get_template_directory_uri() . '/img/about-bg.png' ); ?>')] bg-cover bg-right">
        <div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                <div class="lg:w-1/2 relative z-10">
                    <nav class="text-sm text-gray-500 mb-6">
                        <a href="#" class="hover:text-[#B22234]">Главная</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">О компании</span>
                    </nav>
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                        Гардэкспер - поставка оборудования и экспертная поддержка для систем безопасности
                    </h1>
                    <p class="text-gray-600 text-base lg:text-lg mb-8 max-w-lg">
                        С 2012 года работаем в сфере систем безопасности, поставляем оборудование для ОПС, СКУД и видеонаблюдения, консультируем по подбору, совместимости и сопровождению решений для бизнеса и объектов по всей Беларуси.
                    </p>
                    <a href="/" class="inline-flex items-center gap-2 bg-[#B22234] text-white px-6 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                        <i data-lucide="grid-3x3" class="w-5 h-5"></i>
                        Перейти в каталог
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="bg-white border-b">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-gray-200">
                <div class="flex items-center gap-3 py-6 px-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="calendar" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">С 2012 года</div>
                        <div class="text-gray-500 text-xs">на рынке</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 py-6 px-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="shield-check" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">14+ лет</div>
                        <div class="text-gray-500 text-xs">опыта</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 py-6 px-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="map-pin" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">Поставка по</div>
                        <div class="text-gray-500 text-xs">всей РБ</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 py-6 px-4">
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="headphones" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900 text-sm">Поддержка</div>
                        <div class="text-gray-500 text-xs">и сопровождение</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Кто мы? -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                <div class="grid lg:grid-cols-2">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Кто мы?</h2>
                        <p class="text-gray-600">
                            Гардэксперт - компания в сфере систем безопасности и поставок оборудования для объектов различного назначения. Мы помогаем клиентам подобрать оборудование под задачу, консультируем по характеристикам и совместимости, а при необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию
                        </p>
                    </div>
                    <div class="bg-gray-100">
                        <img class="w-full h-full object-cover" src="<?php echo esc_url( get_template_directory_uri() . '/img/who.png' ); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Почему выбирают Гардэксперт -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Почему выбирают Гардэксперт</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Надёжная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="calendar" class="w-5 h-5 text-[#B22234]"></i>
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
                            <i data-lucide="sliders-horizontal" class="w-5 h-5 text-[#B22234]"></i>
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
                            <i data-lucide="map-pin" class="w-5 h-5 text-[#B22234]"></i>
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
                            <i data-lucide="file-text" class="w-5 h-5 text-[#B22234]"></i>
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
                            <i data-lucide="shield-check" class="w-5 h-5 text-[#B22234]"></i>
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
                            <i data-lucide="wrench" class="w-5 h-5 text-[#B22234]"></i>
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

    <!-- Чем мы занимаемся -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Чем мы занимаемся</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-4 mb-4">
                <!-- Large Card -->
                <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 flex flex-col">
                    <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3">Поставка оборудования</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Подбираем и поставляем оборудование для ОПС, СКУД, видеонаблюдения и сопутствующих инженерных решений для объектов разного масштаба.</p>
                    <img src="https://placehold.co/500x250/f0ebe8/999?text=Security+Equipment" alt="Поставка оборудования" class="rounded-lg w-full h-auto">
                </div>

                <!-- Right Column Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-3">
                            <i data-lucide="file-text" class="w-5 h-5 text-[#B22234]"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Проектирование</h4>
                        <p class="text-gray-600 text-sm">Подготавливаем решения с учетом особенностей объекта и требований системы.</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-3">
                            <i data-lucide="wrench" class="w-5 h-5 text-[#B22234]"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Монтаж</h4>
                        <p class="text-gray-600 text-sm">Организуем установку оборудования и корректную работу системы на объекте.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-3">
                        <i data-lucide="zap" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Пусконаладка</h4>
                    <p class="text-gray-600 text-sm">Настраиваем оборудование, проверяем работу системы и вводим ее в эксплуатацию.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-3">
                        <i data-lucide="shield" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Подбор решений</h4>
                    <p class="text-gray-600 text-sm">Помогаем выбрать оборудование с учетом задачи, совместимости и бюджета.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition sm:col-span-2 lg:col-span-1">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-3">
                        <i data-lucide="refresh-cw" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Обслуживание и модернизация</h4>
                    <p class="text-gray-600 text-sm">Сопровождаем систему после запуска, помогаем с обновлением и техническими вопросами.</p>
                </div>
            </div>

            <div class="text-center">
                <a href="#" class="js-open-consultation inline-block bg-[#B22234] text-white px-12 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                    Получить консультацию
                </a>
            </div>
        </div>
    </section>

    <!-- С кем мы работаем -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">С кем мы работаем</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Подбираем оборудование и сопровождаем поставки для компаний, монтажных организаций и объектов разного масштаба по всей Беларуси.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="building-2" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Бизнес</h4>
                    <p class="text-gray-600 text-sm">Подбираем оборудование для офисов, магазинов, коммерческих помещений и других задач бизнеса, где важны безопасность, контроль и надёжность.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="wrench" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Монтажные организации</h4>
                    <p class="text-gray-600 text-sm">Поставляем оборудование для подрядчиков и специалистов, которым важно быстро подобрать совместимые решения под проект и объект.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="factory" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Производственные объекты</h4>
                    <p class="text-gray-600 text-sm">Помогаем с выбором оборудования для производственных площадок, складов и объектов с повышенными требованиями к безопасности.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="building" class="w-5 h-5 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Коммерческие и административные объекты</h4>
                    <p class="text-gray-600 text-sm">Подбираем решения для объектов, где важны стабильная работа системы, удобство эксплуатации и корректная документация.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Как строится работа -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Как строится работа</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">01</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-text" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Запрос</h4>
                    <p class="text-gray-600 text-sm">Клиент обращается с задачей, перечнем оборудования или описание объекта.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">02</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="sliders-horizontal" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Консультация и подбор</h4>
                    <p class="text-gray-600 text-sm">Помогаем подобрать оборудование с учетом требований, совместимости и бюджета.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">03</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="file-check" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Согласование решения</h4>
                    <p class="text-gray-600 text-sm">Уточняем состав поставки, характеристики, наличие и условия сотрудничества.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">04</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="truck" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Поставка оборудования</h4>
                    <p class="text-gray-600 text-sm">Организуем поставку оборудования по Минску и по всей Беларуси.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                    <div class="text-3xl font-bold text-gray-200 mb-3">05</div>
                    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-4">
                        <i data-lucide="settings" class="w-6 h-6 text-[#B22234]"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Поддержка и сопровождение</h4>
                    <p class="text-gray-600 text-sm">При необходимости консультируем дальше, подключаем обслуживание, модернизацию и техническую помощь.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Сертификаты и документы -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Сертификаты и документы</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Подтверждающие материалы, сопроводительная документация и документы, которые помогают работать с оборудованием уверенно и прозрачно.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:shadow-md transition">
                    <img src="https://placehold.co/300x400/f5f5f5/999?text=Certificate+1" alt="Сертификат" class="w-full h-auto rounded">
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:shadow-md transition">
                    <img src="https://placehold.co/300x400/f5f5f5/999?text=Certificate+2" alt="Сертификат" class="w-full h-auto rounded">
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:shadow-md transition">
                    <img src="https://placehold.co/300x400/f5f5f5/999?text=Certificate+3" alt="Сертификат" class="w-full h-auto rounded">
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:shadow-md transition">
                    <img src="https://placehold.co/300x400/f5f5f5/999?text=Certificate+4" alt="Сертификат" class="w-full h-auto rounded">
                </div>
            </div>
        </div>
    </section>

    <script>
        lucide.createIcons();
    </script>
<?php
get_footer();