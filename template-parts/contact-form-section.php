<?php
/**
 * Template part for Contact Form Section
 *
 * @package guardexpert
 */
?>

<!-- Contact Form Section -->
<section class="relative py-16 md:py-20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/form-bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; margin-left: calc(-50vw + 50%);">
	<div class="max-w-[1200px] mx-auto px-4">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
			<!-- Left Column: Text Content -->
			<div>
				<h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-6 leading-tight">
					Подберем оборудование под вашу задачу
				</h2>
				<p class="text-base md:text-lg text-gray-700 mb-8 leading-relaxed">
					Поможем с выбором оборудования для ОПС, СКУД и видеонаблюдения, проконсультируем по совместимости и поставке по Беларуси.
				</p>
				<a href="/catalog" class="inline-flex items-center justify-center gap-3 bg-white text-[#B3262E] border-2 border-[#B3262E] px-8 py-4 rounded hover:bg-[#B3262E] hover:text-white transition-colors text-lg">
					Перейти в каталог
				</a>
			</div>

			<!-- Right Column: Contact Form -->
			<div class="bg-white rounded-lg p-6 md:p-8 shadow-xl">
				<h3 class="text-2xl md:text-3xl font-bold text-black mb-3">
					Оставьте заявку
				</h3>
				<p class="text-base text-gray-700 mb-6">
					Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.
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
						<textarea 
							name="comment" 
							id="form-comment" 
							placeholder="Комментарий" 
							rows="3"
							class="w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors resize-none"
						></textarea>
					</div>

					<!-- Privacy Checkbox -->
					<div class="flex items-start gap-3">
						<label class="flex items-start gap-3 cursor-pointer">
							<input 
								type="checkbox" 
								name="privacy" 
								id="form-privacy" 
								required
								class="mt-1 w-5 h-5 text-[#B3262E] border-gray-300 rounded focus:ring-[#B3262E] cursor-pointer"
							>
							<span class="text-sm text-gray-700">
								Продолжая, вы соглашаетесь с политикой конфиденциальности
							</span>
						</label>
					</div>

					<!-- Submit Button -->
					<button 
						type="submit" 
						class="w-full bg-[#B3262E] text-white px-8 py-4 rounded hover:bg-[#9a1f26] transition-colors text-lg shadow-lg outline-none border-none"
					>
						Отправить
					</button>
				</form>

				<!-- Success Message (Hidden by default) -->
				<div id="form-success" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
					<p class="text-green-800 text-center">Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.</p>
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
