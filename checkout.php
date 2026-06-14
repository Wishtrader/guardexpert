<?php
/**
 * Template Name: Checkout
 *
 * @package guardexpert
 */

get_header();

// Get cart contents
$cart_items = WC()->cart->get_cart();
$cart_count = WC()->cart->get_cart_contents_count();
$cart_subtotal = WC()->cart->get_cart_subtotal();
$cart_total = WC()->cart->get_total();
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
	.delivery-fields {
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.4s ease, opacity 0.3s ease, margin 0.3s ease;
		opacity: 0;
	}
	.delivery-fields.open {
		max-height: 300px;
		opacity: 1;
		margin-top: 1rem;
	}
</style>

<!-- Checkout Section -->
<section class="py-12 lg:py-16 bg-white">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-500 mb-6">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B22234]">Главная</a>
			<span class="mx-2">/</span>
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="hover:text-[#B22234]">Корзина</a>
			<span class="mx-2">/</span>
			<span class="text-gray-700">Оформление заказа</span>
		</nav>

		<h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Оформление заказа</h1>

		<?php if ( $cart_count > 0 ): ?>
		<div class="grid lg:grid-cols-3 gap-6">
			<!-- Left Column: Forms -->
			<div class="lg:col-span-2 space-y-6">
				
				<!-- Contact Data -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
					<h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Контактные данные</h2>
					<div class="grid sm:grid-cols-2 gap-4">
						<div>
							<label class="block text-sm text-gray-700 mb-2">Ваше имя</label>
							<input type="text" name="billing_name" id="billing_name" placeholder="Иван Иванов" required class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
						</div>
						<div>
							<label class="block text-sm text-gray-700 mb-2">Телефон</label>
							<input type="tel" name="billing_phone" id="billing_phone" placeholder="+375 (XX) XXX-XX-XX" required class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
						</div>
						<div>
							<label class="block text-sm text-gray-700 mb-2">E-mail</label>
							<input type="email" name="billing_email" id="billing_email" placeholder="example@mail.com" required class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
						</div>
						<div>
							<label class="block text-sm text-gray-700 mb-2">Комментарий (не обязательно)</label>
							<input type="text" name="billing_comment" id="billing_comment" placeholder="Дополнительная информация" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
						</div>
					</div>
				</div>

				<!-- Delivery Method -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
					<h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Способ получения</h2>
					<div class="space-y-3">
						<label class="block cursor-pointer">
							<input type="radio" name="delivery" class="radio-custom sr-only" checked onchange="toggleDeliveryFields()">
							<div class="radio-label border-2 border-gray-200 rounded-lg px-5 py-4 flex items-center gap-3 hover:border-gray-300 transition">
								<div class="radio-dot w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0"></div>
								<span class="font-medium text-gray-900">Согласовать с менеджером</span>
							</div>
						</label>
						<label class="block cursor-pointer">
							<input type="radio" name="delivery" class="radio-custom sr-only" onchange="toggleDeliveryFields()">
							<div class="radio-label border-2 border-gray-200 rounded-lg px-5 py-4 flex items-center gap-3 hover:border-gray-300 transition">
								<div class="radio-dot w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0"></div>
								<span class="font-medium text-gray-900">Доставка до объекта</span>
							</div>
						</label>

						<!-- Additional Delivery Fields -->
						<div id="deliveryFields" class="delivery-fields">
							<div class="grid sm:grid-cols-2 gap-4">
								<div>
									<label class="block text-sm text-gray-700 mb-2">Город</label>
									<input type="text" name="delivery_city" id="delivery_city" placeholder="Минск" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
								</div>
								<div>
									<label class="block text-sm text-gray-700 mb-2">Адрес</label>
									<input type="text" name="delivery_address" id="delivery_address" placeholder="пр-т Независимости 1" class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
								</div>
							</div>
							<div class="mt-4">
								<label class="block text-sm text-gray-700 mb-2">Дополнительная информация</label>
								<input type="text" name="delivery_info" id="delivery_info" placeholder="Код домофона, особенности проезда..." class="w-full border border-gray-300 rounded px-4 py-3 text-sm focus:outline-none focus:border-[#B22234]">
							</div>
						</div>
					</div>
				</div>

				<!-- Payment Method -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8">
					<h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-6">Способ оплаты</h2>
					<div class="space-y-3">
						<label class="block cursor-pointer">
							<input type="radio" name="payment" value="non-cash" class="radio-custom sr-only" checked>
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
						<?php foreach ( $cart_items as $cart_item ) : ?>
						<?php
						$_product = wc_get_product( $cart_item['product_id'] );
						if ( ! $_product ) continue;
						$product_url = get_permalink( $cart_item['product_id'] );
						$thumbnail = $_product->get_image( 'thumbnail' );
						if ( ! $thumbnail ) {
							$thumbnail = '<img src="https://placehold.co/80x80/f0ebe8/999?text=Product" alt="Товар" class="w-16 h-16 object-cover rounded flex-shrink-0">';
						}
						$categories = get_the_terms( $cart_item['product_id'], 'product_cat' );
						$cat_name = $categories && is_array( $categories ) ? $categories[0]->name : '';
						$price = $_product->get_price();
						?>
						<div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
							<div class="w-16 h-16 flex-shrink-0">
								<?php echo $thumbnail; ?>
							</div>
							<div class="flex-grow min-w-0">
								<?php if ( $cat_name ): ?>
								<p class="text-xs text-gray-500 mb-1"><?php echo esc_html( $cat_name ); ?></p>
								<?php endif; ?>
								<p class="text-sm font-medium text-gray-900 leading-tight">
									<a href="<?php echo esc_url( $product_url ); ?>" class="hover:text-[#B22234]"><?php echo esc_html( $_product->get_name() ); ?></a>
								</p>
							</div>
							<div class="text-right flex-shrink-0">
								<?php if ( $price ): ?>
									<p class="text-sm font-bold text-gray-900"><?php echo $_product->get_price_html(); ?></p>
								<?php else: ?>
									<p class="text-sm font-bold text-[#B22234]">Цена по запросу</p>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

					<!-- Totals -->
					<div class="space-y-3 mb-6">
						<div class="flex justify-between items-center pb-3 border-b border-gray-200">
							<span class="text-gray-700 text-sm">Товары (<?php echo $cart_count; ?>)</span>
							<span class="font-bold text-gray-900"><?php echo $cart_subtotal ? $cart_subtotal : 'Уточняется'; ?></span>
						</div>
						<div class="flex justify-between items-center pb-3 border-b border-gray-200">
							<span class="text-gray-700 text-sm">Доставка</span>
							<span class="font-bold text-gray-900"><?php echo WC()->cart->get_shipping_total() ? WC()->cart->get_shipping_total() : 'Уточняется'; ?></span>
						</div>
						<div class="flex justify-between items-center">
							<span class="text-gray-900 font-bold text-lg">Итого</span>
							<span class="font-bold text-[#B22234] text-lg"><?php echo $cart_total; ?></span>
						</div>
					</div>

					<!-- Checkboxes -->
					<div class="space-y-3 mb-6">
						<label class="flex items-start gap-3 cursor-pointer">
							<input type="checkbox" name="privacy" id="checkout-privacy" class="mt-1 w-4 h-4 text-[#B22234] border-gray-300 rounded focus:ring-[#B22234]" required>
							<span class="text-sm text-gray-600 leading-snug">Продолжая, вы соглашаетесь с политикой конфиденциальности</span>
						</label>
						<label class="flex items-start gap-3 cursor-pointer">
							<input type="checkbox" name="terms" id="checkout-terms" class="mt-1 w-4 h-4 text-[#B22234] border-gray-300 rounded focus:ring-[#B22234]" required>
							<span class="text-sm text-gray-600 leading-snug">Я ознакомлен с условиями оплаты и доставки</span>
						</label>
					</div>

					<?php wp_nonce_field( 'guardexpert_checkout', 'checkout_nonce' ); ?>

					<!-- Buttons -->
					<div class="space-y-3">
					<div id="checkout-error" class="hidden bg-red-50 border border-red-200 text-red-600 text-sm rounded p-3 mb-3"></div>
					<button type="button" id="checkout-submit" class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition inline-block text-center outline-none border-none cursor-pointer">
						Оформить заказ
					</button>
						<a href="#" class="js-open-consultation w-full bg-white border border-[#B22234] text-[#B22234] py-3 rounded font-medium hover:bg-[#B22234] hover:text-white transition text-center inline-block">
							Получить консультацию
						</a>
					</div>

					<!-- Back Link -->
					<div class="text-center mt-4">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="text-sm text-gray-700 hover:text-[#B22234] transition font-medium">
							Вернуться в корзину
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="text-center py-12">
			<p class="text-gray-600 text-lg mb-4">Ваша корзина пуста</p>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="inline-block bg-[#B22234] text-white px-6 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
				Перейти в каталог
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>

<script>
	lucide.createIcons();

	function toggleDeliveryFields() {
		const deliveryRadios = document.querySelectorAll('input[name="delivery"]');
		const deliveryFields = document.getElementById('deliveryFields');
		const isDeliveryToObject = deliveryRadios[1] && deliveryRadios[1].checked;

		if (isDeliveryToObject) {
			deliveryFields.classList.add('open');
		} else {
			deliveryFields.classList.remove('open');
		}
	}

	document.addEventListener('DOMContentLoaded', function() {
		var submitBtn = document.getElementById('checkout-submit');
		var errorBox = document.getElementById('checkout-error');

		function showError(input, message) {
			var wrapper = input.closest('div');
			if (!wrapper) return;
			input.classList.add('border-red-500', 'focus:border-red-500');

			var existing = wrapper.querySelector('.checkout-error');
			if (existing) return;

			var err = document.createElement('p');
			err.className = 'checkout-error text-red-500 text-xs mt-1';
			err.textContent = message;
			wrapper.appendChild(err);
		}

		function clearErrors() {
			document.querySelectorAll('.checkout-error').forEach(function(el) { el.remove(); });
			document.querySelectorAll('.border-red-500').forEach(function(el) {
				el.classList.remove('border-red-500', 'focus:border-red-500');
			});
			if (errorBox) {
				errorBox.classList.add('hidden');
				errorBox.textContent = '';
			}
		}

		function setSubmitLoading(loading) {
			if (loading) {
				submitBtn.disabled = true;
				submitBtn.textContent = 'Отправка...';
				submitBtn.classList.add('opacity-60', 'cursor-not-allowed');
			} else {
				submitBtn.disabled = false;
				submitBtn.textContent = 'Оформить заказ';
				submitBtn.classList.remove('opacity-60', 'cursor-not-allowed');
			}
		}

		submitBtn.addEventListener('click', function(e) {
			clearErrors();

			var name = document.getElementById('billing_name');
			var phone = document.getElementById('billing_phone');
			var email = document.getElementById('billing_email');
			var privacy = document.getElementById('checkout-privacy');
			var terms = document.getElementById('checkout-terms');
			var deliveryRadios = document.querySelectorAll('input[name="delivery"]');
			var isDelivery = deliveryRadios[1] && deliveryRadios[1].checked;
			var valid = true;

			if (!name.value.trim()) {
				showError(name, 'Укажите ваше имя');
				valid = false;
			}

			if (window.guardexpert && !window.guardexpert.isValidPhone(phone.value)) {
				showError(phone, 'Введите номер в формате +375 (XX) XXX-XX-XX');
				valid = false;
			}

			if (window.guardexpert && !window.guardexpert.isValidEmail(email.value)) {
				showError(email, 'Введите корректный email-адрес');
				valid = false;
			}

			if (!privacy.checked) {
				showError(privacy, 'Примите политику конфиденциальности');
				valid = false;
			}

			if (!terms.checked) {
				showError(terms, 'Подтвердите ознакомление с условиями');
				valid = false;
			}

			if (isDelivery) {
				var city = document.getElementById('delivery_city');
				var address = document.getElementById('delivery_address');
				if (!city.value.trim()) {
					showError(city, 'Укажите город доставки');
					valid = false;
				}
				if (!address.value.trim()) {
					showError(address, 'Укажите адрес доставки');
					valid = false;
				}
			}

			if (!valid) return;

			var deliveryValue = 'manager';
			if (isDelivery) {
				deliveryValue = 'delivery';
			}

			var formData = new FormData();
			formData.append('action', 'guardexpert_submit_order');
			formData.append('nonce', document.getElementById('checkout_nonce').value);
			formData.append('billing_name', name.value.trim());
			formData.append('billing_phone', phone.value.trim());
			formData.append('billing_email', email.value.trim());
			formData.append('billing_comment', document.getElementById('billing_comment').value.trim());
			formData.append('delivery', deliveryValue);
			formData.append('delivery_city', document.getElementById('delivery_city') ? document.getElementById('delivery_city').value.trim() : '');
			formData.append('delivery_address', document.getElementById('delivery_address') ? document.getElementById('delivery_address').value.trim() : '');
			formData.append('delivery_info', document.getElementById('delivery_info') ? document.getElementById('delivery_info').value.trim() : '');

			setSubmitLoading(true);

			fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
				method: 'POST',
				body: formData
			})
			.then(function(response) { return response.json(); })
			.then(function(data) {
				if (data.success) {
					window.location.href = '<?php echo esc_url( home_url( '/заказ-отправлен/' ) ); ?>?order_id=' + data.data.order_id;
				} else {
					setSubmitLoading(false);
					if (errorBox) {
						errorBox.textContent = data.data ? data.data.message : 'Ошибка отправки заказа';
						errorBox.classList.remove('hidden');
					}
				}
			})
			.catch(function() {
				setSubmitLoading(false);
				if (errorBox) {
					errorBox.textContent = 'Ошибка сети. Попробуйте ещё раз.';
					errorBox.classList.remove('hidden');
				}
			});
		});
	});
</script>
<?php
get_footer();