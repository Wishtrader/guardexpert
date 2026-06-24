<?php
/**
 * Template Name: Thank You
 *
 * @package guardexpert
 */

get_header();

$thankyou_bg = get_template_directory_uri() . '/img/hero-bg.png';
?>

<!-- Thank You Section -->
<section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( $thankyou_bg ); ?>')] bg-cover bg-center">
	<div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-16 lg:pb-24 relative z-10">
		<div class="flex flex-col items-center text-center">
			<h1 class="text-3xl lg:text-5xl font-bold text-black leading-tight mb-4">
				Спасибо! Ваша заявка принята
			</h1>
			<p class="text-black text-base lg:text-[28px] font-['Geologica'] mb-5 max-w-[1200px] !leading-[1.2] font-semibold">
				Мы получили ваш запрос. Свяжемся с вами в ближайшее время, уточним детали и рассчитаем стоимость.
			</p>

			<p class="text-gray-600 text-sm mb-6">Проверьте правильность данных</p>

			<div class="w-full max-w-[400px] space-y-4">
				<div>
					<input type="text" id="thankyou-name" readonly
						class="w-full bg-[#FAF9F7] border border-gray-300 px-4 py-3 text-sm text-gray-900 rounded-[2px] cursor-default">
				</div>
				<div>
					<input type="text" id="thankyou-phone" readonly
						class="w-full bg-[#FAF9F7] border border-gray-300 px-4 py-3 text-sm text-gray-900 rounded-[2px] cursor-default">
				</div>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
					class="block w-full bg-[#B22234] text-white py-3 rounded-[2px] font-medium hover:bg-[#8B1A2B] transition text-center mt-6">
					Вернуться на главную
				</a>
			</div>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	var params = new URLSearchParams(window.location.search);
	var nameInput = document.getElementById('thankyou-name');
	var phoneInput = document.getElementById('thankyou-phone');
	if (nameInput) nameInput.value = params.get('client_name') || '';
	if (phoneInput) phoneInput.value = params.get('client_phone') || '';
});
</script>

<?php
get_footer();
