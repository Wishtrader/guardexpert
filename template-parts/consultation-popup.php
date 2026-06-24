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
	<div class="relative w-full max-w-[568px] bg-[url('<?php echo get_template_directory_uri(); ?>/img/bgf.png')] rounded-lg shadow-2xl p-8 lg:p-10">
			
			<button type="button" id="consultation-close" class="absolute top-12 right-12 text-black hover:text-gray-600 outline-none border-none bg-transparent cursor-pointer">
				<i data-lucide="x" class="w-6 h-6"></i>
			</button>
			<div class="bg-white rounded-[4px] px-[35px] py-[25px]">

			<h2 class="text-3xl lg:text-4xl font-semibold text-black mb-2">
				Оставьте заявку
			</h2>

			<p class="text-black text-base mb-5 !leading-[1.2]">
				Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.
			</p>

			<form id="consultation-form" class="space-y-4">
				<input type="text" name="name" placeholder="Ваше имя" required
					class="w-full bg-[#FAF9F7] border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-black">
				
				<input type="tel" name="phone" id="consultation-phone" placeholder="Телефон" required
					class="w-full bg-[#FAF9F7] border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-black">
				
				<input name="comment" placeholder="Комментарий"
					class="w-full bg-[#FAF9F7] border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234] focus:ring-1 focus:ring-[#B22234] placeholder-black">

				<label class="flex items-center gap-3 cursor-pointer" id="privacy-label">
					<div class="relative mt-0.5">
						<input type="checkbox" name="privacy" class="sr-only peer rounded-[6px]" checked required
							onchange="this.nextElementSibling.classList.toggle('bg-gray-100')">
						<div class="w-11 h-11 bg-[#B22234] rounded-[6px] border border-[#B22234] flex items-center justify-center transition-colors">
							<i data-lucide="check" class="w-8 h-8 text-gray-100"></i>
						</div>
					</div>
					<span class="text-[14px] text-black leading-[1.2]">Продолжая, вы соглашаетесь с политикой конфиденциальности</span>
				</label>

				<button type="submit" class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] shadow-md outline-none border-none cursor-pointer">
					Отправить
				</button>

				<p id="consultation-success" class="hidden text-green-700 text-center text-sm">Спасибо! Мы свяжемся с вами в ближайшее время.</p>
			</form>
				</div>
		</div>
	</div>
</div>
