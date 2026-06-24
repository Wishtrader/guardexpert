<?php
/**
 * Cookie consent popup.
 *
 * @package guardexpert
 */
?>
<div id="cookie-popup" class="fixed bottom-0 left-1/2 -translate-x-1/2 z-50 hidden w-full max-w-[852px] mx-auto px-4">
	<div class="bg-white border border-[#B3262E] shadow-lg p-5 flex flex-col md:flex-row items-start md:items-center gap-6">
		<div class="flex-1 min-w-0">
			<h3 class="text-lg font-semibold text-black mb-2 flex items-center gap-2">
				Мы используем файлы cookies <span class="">
				<img src="<?php echo get_template_directory_uri(); ?>/img/coolicon.svg" alt="cookie" />
				</span>
			</h3>
			<p class="text-black text-base leading-[1.2]">
				Этот сайт применяет файлы cookies для корректной работы, анализа использования и улучшения качества сервиса. Вы можете принять все файлы cookies или ограничиться только необходимыми.
			</p>
		</div>
		<div class="flex flex-col gap-3 w-full md:w-auto md:min-w-[240px] shrink-0">
			<button id="cookie-accept" class="w-full bg-[#B3262E] text-white py-3 px-6 rounded-[2px] font-normal hover:bg-[#8B1A2B] transition cursor-pointer text-[15px] md:w-[313px] md:height-[52px] ">
				Принять
			</button>
			<button id="cookie-reject" class="w-full bg-white text-[#B3262E] border border-[#B3262E] py-3 px-6 rounded-[2px] font-normal hover:bg-red-50 transition cursor-pointer text-[15px] md:w-[313px] md:height-[52px]">
				Отклонить
			</button>
		</div>
	</div>
</div>
