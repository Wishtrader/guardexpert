<?php
/**
 * Template part for Contact Form Section
 *
 * @package guardexpert
 */

// Per-page custom fields
$page_id = get_queried_object_id();
$page_slug = get_page_uri( $page_id );

if ( is_page() && $page_id > 0 ) {
	// Check for page-specific fields first (e.g., returns_form_title)
	$form_title = get_field( $page_slug . '_form_title', $page_id );
	$form_description = get_field( $page_slug . '_form_description', $page_id );
	$form_form_title = get_field( $page_slug . '_form_form_title', $page_id );
	$form_form_description = get_field( $page_slug . '_form_form_description', $page_id );
	$form_success_text = get_field( $page_slug . '_form_success_text', $page_id );
	$form_bg = get_field( $page_slug . '_form_bg', $page_id );

	// Fallback to front_ fields
	if ( empty( $form_title ) ) $form_title = get_field( 'front_form_title', $page_id );
	if ( empty( $form_description ) ) $form_description = get_field( 'front_form_description', $page_id );
	if ( empty( $form_form_title ) ) $form_form_title = get_field( 'front_form_form_title', $page_id );
	if ( empty( $form_form_description ) ) $form_form_description = get_field( 'front_form_form_description', $page_id );
	if ( empty( $form_success_text ) ) $form_success_text = get_field( 'front_form_success_text', $page_id );
	if ( empty( $form_bg ) ) $form_bg = get_field( 'front_form_bg', $page_id );
}
if ( empty( $form_title ) ) {
	$form_title = 'Подберем оборудование под вашу задачу';
}
if ( empty( $form_description ) ) {
	$form_description = 'Поможем с выбором оборудования для ОПС, СКУД и видеонаблюдения, проконсультируем по совместимости и поставке по Беларуси.';
}
if ( empty( $form_form_title ) ) {
	$form_form_title = 'Оставьте заявку';
}
if ( empty( $form_form_description ) ) {
	$form_form_description = 'Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.';
}
if ( empty( $form_success_text ) ) {
	$form_success_text = 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.';
}
if ( empty( $form_bg ) ) {
	$form_bg = get_template_directory_uri() . '/img/form-bg.png';
}
?>

<!-- Contact Form Section -->
<section class="relative py-16 md:py-20" style="background-image: url('<?php echo esc_url( $form_bg ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; margin-left: calc(-50vw + 50%);">
	<div class="max-w-[1200px] mx-auto px-4">
		<div class="flex flex-col md:flex-row justify-between gap-[20px] w-full items-center">
			<!-- Left Column: Text Content -->
			<div class="flex flex-col gap-[20px]">
				<h2 class="text-[26px] md:text-[36px] font-semibold text-black leading-tight">
					<?php echo esc_html( $form_title ); ?>
				</h2>
				<p class="text-base md:text-[18px] font-normal text-black leading-relaxed">
					<?php echo esc_html( $form_description ); ?>
				</p>
				<a href="/catalog" class="inline-flex items-center justify-center gap-3 text-[#B3262E] border-[1px] border-[#B3262E] px-8 py-4 rounded-[2px] hover:bg-[#B3262E] hover:text-white transition-colors md:w-[285px] md:h-[52px] text-[15px]">
					Перейти в каталог
				</a>
			</div>

			<!-- Right Column: Contact Form -->
			<div class="bg-white rounded-[4px] p-6 md:p-8 shadow-sm max-w-[488px]">
				<h3 class="text-[26px] md:text-[36px] font-semibold text-black mb-3">
					<?php echo esc_html( $form_form_title ); ?>
				</h3>
				<p class="text-base text-black mb-6">
					<?php echo esc_html( $form_form_description ); ?>
				</p>

				<form id="contact-form" class="space-y-4">
					<!-- Name Field -->
					<div>
						<input 
							type="text" 
							name="name" 
							id="form-name" 
							placeholder="Ваше имя" 
							required
							class="w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors"
						>
					</div>

					<!-- Phone Field -->
					<div>
						<input 
							type="tel" 
							name="phone" 
							id="form-phone" 
							placeholder="+375 (XX) XXX-XX-XX" 
							required
							class="w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors"
						>
					</div>

					<!-- Comment Field -->
					<div>
						<input
							name="comment" 
							id="form-comment" 
							placeholder="Комментарий" 
							rows="3"
							class="w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors resize-none"
						></input>
					</div>

					<!-- Privacy Checkbox -->
					<div class="flex items-center gap-3">
						<label class="flex items-center gap-3 cursor-pointer">
							<input 
								type="checkbox" 
								name="privacy" 
								id="form-privacy" 
								required
								class="mt-1 w-5 md:w-[44px] h-5 md:h-[44px] text-[#B3262E] border-gray-300 rounded focus:ring-[#B3262E] cursor-pointer"
							>
							<span class="text-sm text-gray-700">
								Продолжая, вы соглашаетесь с политикой конфиденциальности
							</span>
						</label>
					</div>

					<!-- Submit Button -->
					<button 
						type="submit" 
						class="flex items-center justify-center w-full bg-[#B3262E] h-[52px] text-white px-8 py-4 rounded-[2px] hover:bg-[#9a1f26] transition-colors text-lg shadow-lg outline-none border-none"
					>
						Отправить
					</button>
				</form>

				<!-- Success Message (Hidden by default) -->
				<div id="form-success" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
					<p class="text-green-800 text-center"><?php echo esc_html( $form_success_text ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Contact Form Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('contact-form');
	const successMessage = document.getElementById('form-success');

	form.addEventListener('submit', function(e) {
		e.preventDefault();

		// Collect form data
		const formData = new FormData(form);
		const data = {
			name: formData.get('name'),
			phone: formData.get('phone'),
			comment: formData.get('comment'),
			privacy: formData.get('privacy')
		};

		// Validate
		if (!data.name || !data.phone || !data.privacy) {
			alert('Пожалуйста, заполните все обязательные поля');
			return;
		}

		if (window.guardexpert && !window.guardexpert.isValidPhone(data.phone)) {
			alert('Пожалуйста, введите корректный номер телефона в формате +375 (XX) XXX-XX-XX');
			return;
		}

		// Here you would normally send the data to your server
		// For now, we'll just show the success message
		console.log('Form data:', data);

		// Show success message
		form.style.display = 'none';
		successMessage.classList.remove('hidden');

		// Optional: Reset form after 5 seconds
		setTimeout(function() {
			form.reset();
			form.style.display = 'block';
			successMessage.classList.add('hidden');
		}, 5000);
	});

	// Reset phone input with IMask sync on form reset
	setTimeout(function() {
		form.addEventListener('reset', function() {
			var phoneEl = document.getElementById('form-phone');
			if (phoneEl) {
				phoneEl.value = '';
				if (phoneEl._imask) phoneEl._imask.value = '';
			}
		});
	}, 0);
});
</script>
