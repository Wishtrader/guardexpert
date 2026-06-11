<?php
/**
 * Template part for Consultation Popup
 *
 * @package guardexpert
 */
?>

<!-- Consultation Popup -->
<div id="consultation-popup" class="fixed inset-0 z-50 hidden">
	<div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" id="consultation-overlay"></div>
	<div class="absolute inset-0 flex items-center justify-center p-4">
		<div class="relative w-full max-w-[568px] bg-gradient-to-br from-[#f8f0ee] via-[#f5ebe8] to-[#ecdcdc] rounded-2xl shadow-2xl p-8 lg:p-10">
			
			<button type="button" id="consultation-close" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 outline-none border-none bg-transparent cursor-pointer">
				<i data-lucide="x" class="w-6 h-6"></i>
			</button>

			<h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">
				Оставьте заявку
			</h2>

			<p class="text-gray-600 mb-8">
				Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.
			</p>

			<form id="consultation-form" class="space-y-4">
				<input type="text" name="name" placeholder="Ваше имя" required
					class="w-full bg-white bg-opacity-80 border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-gray-500">
				
				<input type="tel" name="phone" id="consultation-phone" placeholder="Телефон" required
					class="w-full bg-white bg-opacity-80 border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-gray-500">
				
				<textarea name="comment" placeholder="Комментарий" rows="3"
					class="w-full bg-white bg-opacity-80 border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-gray-500 resize-none"></textarea>

				<label class="flex items-start gap-3 cursor-pointer" id="privacy-label">
					<div class="relative mt-0.5">
						<input type="checkbox" name="privacy" class="sr-only peer" checked required
							onchange="this.nextElementSibling.classList.toggle('bg-gray-300')">
						<div class="w-6 h-6 bg-[#B22234] rounded flex items-center justify-center transition-colors">
							<i data-lucide="check" class="w-4 h-4 text-white"></i>
						</div>
					</div>
					<span class="text-sm text-gray-600 leading-snug">Продолжая, вы соглашаетесь с политикой конфиденциальности</span>
				</label>

				<button type="submit" class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] shadow-md outline-none border-none cursor-pointer">
					Отправить
				</button>

				<p id="consultation-success" class="hidden text-green-700 text-center text-sm">Спасибо! Мы свяжемся с вами в ближайшее время.</p>
			</form>
		</div>
	</div>
</div>
