<?php
/**
 * Template Name: Thank You
 *
 * @package guardexpert
 */

get_header();

$thankyou_bg = get_template_directory_uri() . '/img/about-bg.png';
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
	body { font-family: 'Inter', sans-serif; }
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px] bg-[url('<?php echo esc_url( $thankyou_bg ); ?>')] bg-cover bg-center">
	<div class="max-w-[1200px] mx-auto px-4 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
		<div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
			<div class="lg:w-1/2 relative z-10">
				<nav class="text-[14px] mb-6">
					<a href="/" class="hover:text-[#66666B] text-gray-500">Главная</a>
					<span class="mx-2">/</span>
					<span class="text-black">Заявка отправлена</span>
				</nav>
				<h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
					Спасибо! Ваша заявка принята
				</h1>
				<p class="text-black text-base lg:text-lg mb-8 max-w-[590px] !leading-[1.2]">
					Мы получили ваш запрос. Свяжемся с вами в ближайшее время, уточним детали и рассчитаем стоимость.
				</p>
			</div>
		</div>
	</div>
</section>

<!-- Thank You Form Section -->
<section class="py-12 lg:py-16 bg-white">
	<div class="max-w-[568px] mx-auto px-4">
		<p class="text-center text-gray-600 text-sm mb-6">Проверьте правильность данных</p>

		<div class="space-y-4">
			<div>
				<label class="block text-sm text-gray-500 mb-1">Имя</label>
				<input type="text" id="thankyou-name" readonly
					class="w-full bg-[#FAF9F7] border border-gray-300 px-4 py-3 text-sm text-gray-900 rounded cursor-default">
			</div>
			<div>
				<label class="block text-sm text-gray-500 mb-1">Телефон</label>
				<input type="text" id="thankyou-phone" readonly
					class="w-full bg-[#FAF9F7] border border-gray-300 px-4 py-3 text-sm text-gray-900 rounded cursor-default">
			</div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
				class="block w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition text-center mt-6">
				Вернуться на главную
			</a>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
	var params = new URLSearchParams(window.location.search);
	var nameInput = document.getElementById('thankyou-name');
	var phoneInput = document.getElementById('thankyou-phone');
	if (nameInput) nameInput.value = params.get('name') || '';
	if (phoneInput) phoneInput.value = params.get('phone') || '';
});
</script>

<?php
get_footer();
