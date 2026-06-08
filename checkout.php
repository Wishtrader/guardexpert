<?php
/**
 * Template Name: Checkout
 *
 * @package guardexpert
 */

get_header();
?>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .radio-custom:checked + .radio-label {
            border-color: #B22234;
        }
        .radio-custom:checked + .radio-label .radio-dot {
            border-color: #B22234;
        }
        .radio-custom:checked + .radio-label .radio-dot::after {
            content: '';
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #B22234;
        }
    </style>
		<!-- Checkout Section -->
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-[1200px] mx-auto px-4">
            <!-- Breadcrumbs -->
            <nav class="text-sm text-gray-500 mb-6">
                <a href="#" class="hover:text-[#B22234]">Главная</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-[#B22234]">Корзина</a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">Оформление заказа</span>
            </nav>

            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Оформление заказа</h1>

            <div class="grid lg:grid-cols-3 gap-6">
                <!-- Left Column: Forms -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Contact Data -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Контактные данные</h2>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Ваше имя</label>
                                <input type="text" placeholder="Иван Иванов" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Телефон</label>
                                <input type="tel" placeholder="+375 XX XXX-XX-XX" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">E-mail</label>
                                <input type="email" placeholder="example@mail.com" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700 mb-2">Комментарий (не обязательно)</label>
                                <input type="text" placeholder="Дополнительная информация" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Method -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Способ получения</h2>
                        <div class="space-y-3">
                            <label class="block cursor-pointer">
                                <input type="radio" name="delivery" class="radio-custom sr-only" checked>
                                <div class="radio-label border-2 border-gray-200 rounded-lg px-5 py-4 flex items-center gap-3 hover:border-gray-300 transition">
                                    <div class="radio-dot w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0"></div>
                                    <span class="font-medium text-gray-900">Согласовать с менеджером</span>
                                </div>
                            </label>
                            <label class="block cursor-pointer">
                                <input type="radio" name="delivery" class="radio-custom sr-only">
                                <div class="radio-label border-2 border-gray-200 rounded-lg px-5 py-4 flex items-center gap-3 hover:border-gray-300 transition">
                                    <div class="radio-dot w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0"></div>
                                    <span class="font-medium text-gray-900">Доставка до объекта</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Способ оплаты</h2>
                        <div class="space-y-3">
                            <label class="block cursor-pointer">
                                <input type="radio" name="payment" class="radio-custom sr-only" checked>
                                <div class="radio-label border-2 border-gray-200 rounded-lg px-5 py-4 flex items-center gap-3 hover:border-gray-300 transition">
                                    <div class="radio-dot w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0"></div>
                                    <span class="font-medium text-gray-900">Безналичный расчёт</span>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-600 mt-4">
                            После отправки заказа менеджер свяжется с вами для уточнения стоимости, наличия и условий поставки.
                        </p>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm sticky top-4">
                        <h2 class="text-xl font-bold text-gray-900 mb-4 pb-4 border-b border-gray-200">Состав заказа</h2>
                        
                        <!-- Products -->
                        <div class="space-y-3 mb-6">
                            <!-- Product 1 -->
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <img src="https://placehold.co/80x80/f0ebe8/999?text=Product" alt="Прибор" class="w-16 h-16 object-cover rounded flex-shrink-0">
                                <div class="flex-grow min-w-0">
                                    <p class="text-xs text-gray-500 mb-1">Приборы приемно-контрольные</p>
                                    <p class="text-sm font-medium text-gray-900 leading-tight">Прибор приемно-контрольный Сигнал-20П</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-sm font-bold text-gray-900">000 <span class="text-xs">BYN</span></p>
                                </div>
                            </div>

                            <!-- Product 2 -->
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <img src="https://placehold.co/80x80/f0ebe8/999?text=Product" alt="Прибор" class="w-16 h-16 object-cover rounded flex-shrink-0">
                                <div class="flex-grow min-w-0">
                                    <p class="text-xs text-gray-500 mb-1">Приборы приемно-контрольные</p>
                                    <p class="text-sm font-medium text-gray-900 leading-tight">Прибор приемно-контрольный Сигнал-20П</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-sm font-bold text-[#B22234]">Цена по запросу</p>
                                </div>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-700 text-sm">Товары (3)</span>
                                <span class="font-bold text-gray-900">Уточняется</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-700 text-sm">Доставка</span>
                                <span class="font-bold text-gray-900">Уточняется</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-900 font-bold text-lg">Итого</span>
                                <span class="text-gray-700 text-sm">Уточняется менеджером</span>
                            </div>
                        </div>

                        <!-- Checkboxes -->
                        <div class="space-y-3 mb-6">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-[#B22234] border-gray-300 rounded focus:ring-[#B22234]">
                                <span class="text-sm text-gray-600 leading-snug">Продолжая, вы соглашаетесь с политикой конфиденциальности</span>
                            </label>
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="checkbox" class="mt-1 w-4 h-4 text-[#B22234] border-gray-300 rounded focus:ring-[#B22234]">
                                <span class="text-sm text-gray-600 leading-snug">Я ознакомлен с условиями оплаты и доставки</span>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
                                Перейти к оформлению
                            </button>
                            <button class="w-full bg-white border border-[#B22234] text-[#B22234] py-3 rounded font-medium hover:bg-[#B22234] hover:text-white transition">
                                Получить консультацию
                            </button>
                        </div>

                        <!-- Back Link -->
                        <div class="text-center mt-4">
                            <a href="#" class="text-sm text-gray-700 hover:text-[#B22234] transition font-medium">
                                Вернуться в корзину
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        lucide.createIcons();
    </script>
<?php
get_footer();