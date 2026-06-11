<?php
/**
 * Template Name: Cart
 *
 * @package guardexpert
 */

get_header();

// Check if WooCommerce is active
if ( ! class_exists( 'WooCommerce' ) ) {
	wc_placeholder_img();
	?>
	<section class="py-12 lg:py-16 bg-white">
		<div class="max-w-[1200px] mx-auto px-4">
			<h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Корзина</h1>
			<p class="text-gray-600">WooCommerce не активирован</p>
		</div>
	</section>
	<?php
	get_footer();
	return;
}
?>

<!-- Cart Section -->
<section class="py-12 lg:py-16 bg-white">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-500 mb-6">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B22234]">Главная</a>
			<span class="mx-2">/</span>
			<span class="text-gray-700">Корзина</span>
		</nav>

		<h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">Корзина</h1>

		<?php if ( WC()->cart->get_cart_contents_count() > 0 ): $currency = get_woocommerce_currency(); ?>
		<div class="grid lg:grid-cols-3 gap-6">
			<!-- Products List -->
			<div class="lg:col-span-2 space-y-4">
				<form class="woocommerce-cart-form" action="" method="post">
					<div class="space-y-4" id="js-cart-items">
						<?php foreach ( WC()->cart->get_cart() as $cart_item ): ?>
						<?php
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item['key'] );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item['key'] );
						?>
						<div class="bg-white border border-gray-200 rounded-lg p-4 lg:p-6 shadow-sm">
							<div class="flex flex-col sm:flex-row gap-4">
								<div class="w-full sm:w-32 lg:w-40 flex-shrink-0">
									<?php if ( $_product->get_image() ): ?>
										<?php echo $_product->get_image( 'medium', array( 'class' => 'w-full h-32 lg:h-40 object-cover rounded' ) ); ?>
									<?php else: ?>
										<img src="https://placehold.co/200x150/f0ebe8/999?text=Product" alt="<?php echo esc_attr( $_product->get_name() ); ?>" class="w-full h-32 lg:h-40 object-cover rounded">
									<?php endif; ?>
								</div>
								<div class="flex-grow">
									<p class="text-sm text-gray-500 mb-1">
										<?php echo strip_tags( wc_get_product_category_list( $product_id, ', ', '<span>', '</span>' ) ); ?>
									</p>
									<h3 class="font-bold text-gray-900 text-lg mb-3 lg:mb-4">
										<a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>" class="hover:text-[#B22234]">
											<?php echo esc_html( $_product->get_name() ); ?>
										</a>
									</h3>
									<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
										<div>
											<?php
											echo apply_filters( 'woocommerce_cart_item_quantity', 
												woocommerce_quantity_input(
													array(
														'input_name' => "cart[{$cart_item['key']}][qty]",
														'input_value' => $cart_item['quantity'],
														'max_value' => $_product->get_max_purchase_quantity(),
													),
													$_product,
													false
												),
												$cart_item,
												$cart_item['key']
											);
											?>
										</div>
										<div class="flex items-center gap-4">
											<?php if ( $_product->get_price() ): ?>
												<span class="js-cart-item-subtotal text-xl font-bold text-gray-900" data-unit-price="<?php echo esc_attr( $_product->get_price() ); ?>" data-item-key="<?php echo esc_attr( $cart_item['key'] ); ?>">
													<?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
												</span>
											<?php else: ?>
												<div class="text-right sm:text-left">
													<p class="text-lg font-bold text-[#B22234]">Цена по запросу</p>
													<p class="text-xs text-gray-500">Стоимость этой позиции будет уточнена менеджером</p>
												</div>
											<?php endif; ?>
											<a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item['key'] ) ); ?>" class="text-gray-400 hover:text-[#B22234] transition flex-shrink-0" title="Удалить">
												<i data-lucide="trash-2" class="w-5 h-5"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

					<button type="submit" name="update_cart" value="1" style="display:none"></button>
					<?php wp_nonce_field( 'woocommerce-cart', '_wpnonce' ); ?>
				</form>

				<!-- Links -->
				<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pt-4">
					<a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="text-gray-900 font-medium hover:text-[#B22234] transition underline">
						Продолжить покупки
					</a>
					<a href="<?php echo esc_url( wc_get_cart_url() ); ?>#order_comments" class="text-gray-900 font-medium hover:text-[#B22234] transition underline">
						Комментарий к заказу
					</a>
				</div>
			</div>

			<!-- Order Summary -->
			<div class="lg:col-span-1">
				<div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm sticky top-4">
					<h2 class="text-xl font-bold text-gray-900 mb-4">Ваш заказ</h2>
					
					<div class="space-y-4 mb-6" id="js-cart-summary">
						<div class="flex justify-between items-center pb-4 border-b border-gray-200">
							<span class="text-gray-700">Товары (<span id="js-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</span>
							<span id="js-cart-subtotal" class="font-bold text-gray-900 text-lg"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
						</div>
						<div class="flex justify-between items-center pb-4 border-b border-gray-200">
							<span class="text-gray-700">Доставка</span>
							<span class="font-bold text-gray-900 text-lg"><?php echo WC()->cart->get_shipping_total() ? WC()->cart->get_shipping_total() : 'Уточняется'; ?></span>
						</div>
						<div class="flex justify-between items-center">
							<span class="text-gray-900 font-bold text-xl">Итого</span>
							<span id="js-cart-total" class="font-bold text-[#B22234] text-xl"><?php echo WC()->cart->get_total(); ?></span>
						</div>
					</div>

					<div class="space-y-3">
						<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition text-center inline-block">
							Перейти к оформлению
						</a>
						<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="w-full bg-white border border-[#B22234] text-[#B22234] py-3 rounded font-medium hover:bg-[#B22234] hover:text-white transition text-center inline-block">
							Получить консультацию
						</a>
					</div>

					<p class="text-xs text-gray-500 text-center mt-4">
						Стоимость и сроки поставки уточняются после обработки заказа.
					</p>
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
document.addEventListener('DOMContentLoaded', function() {
	lucide.createIcons();

	var cartForm = document.querySelector('.woocommerce-cart-form');
	var cartItems = document.getElementById('js-cart-items');
	var cartSubtotal = document.getElementById('js-cart-subtotal');
	var cartTotal = document.getElementById('js-cart-total');
	var cartCount = document.getElementById('js-cart-count');
	var currency = '<?php echo esc_js( get_woocommerce_currency() ); ?>';

	if (!cartForm) return;

	function formatPrice(amount) {
		return amount.toLocaleString('ru-RU', {
			style: 'currency',
			currency: currency,
			minimumFractionDigits: 2,
			maximumFractionDigits: 2
		});
	}

	function updateItemSubtotal(input) {
		var itemRow = input.closest('.bg-white.border');
		if (!itemRow) return;
		var subtotalEl = itemRow.querySelector('.js-cart-item-subtotal');
		if (!subtotalEl) return;
		var unitPrice = parseFloat(subtotalEl.dataset.unitPrice);
		if (isNaN(unitPrice)) return;
		var qty = parseInt(input.value) || 0;
		subtotalEl.innerHTML = qty > 0 ? formatPrice(unitPrice * qty) : '0 ' + (currency === 'BYN' ? 'BYN' : '');
	}

	function updateSummary() {
		if (!cartItems || !cartCount || !cartSubtotal) return;
		var totalItems = 0;
		var subtotalSum = 0;
		cartItems.querySelectorAll('.js-cart-item-subtotal').forEach(function(el) {
			var unitPrice = parseFloat(el.dataset.unitPrice) || 0;
			var input = el.closest('.bg-white.border').querySelector('.qty');
			var qty = input ? parseInt(input.value) || 0 : 0;
			totalItems += qty;
			subtotalSum += unitPrice * qty;
		});
		cartCount.textContent = totalItems;
		var formatted = formatPrice(subtotalSum);
		cartSubtotal.innerHTML = formatted;
		var totalEl = document.getElementById('js-cart-total');
		if (totalEl) totalEl.innerHTML = formatted;
		var headerCounts = document.querySelectorAll('.cart-count');
		headerCounts.forEach(function(el) { el.textContent = totalItems; });
	}

	function debounce(fn, ms) {
		var timer;
		return function() {
			clearTimeout(timer);
			timer = setTimeout(fn, ms);
		};
	}

	var submitForm = debounce(function() {
		var btn = cartForm.querySelector('button[name="update_cart"]');
		if (btn) btn.click();
	}, 800);

	cartForm.addEventListener('change', function(e) {
		if (e.target.matches('.qty')) {
			updateItemSubtotal(e.target);
			updateSummary();
			if (typeof wc_cart_params === 'undefined') {
				submitForm();
			}
		}
	});

	cartForm.addEventListener('input', function(e) {
		if (e.target.matches('.qty')) {
			updateItemSubtotal(e.target);
			updateSummary();
		}
	});

	cartForm.addEventListener('click', function(e) {
		var btn = e.target.closest('.qty-btn');
		if (!btn) return;
		var container = btn.closest('.quantity');
		var input = container ? container.querySelector('.qty') : null;
		if (!input) return;
		var step = parseFloat(input.getAttribute('step')) || 1;
		var min = parseFloat(input.getAttribute('min')) || 1;
		var max = parseFloat(input.getAttribute('max')) || Infinity;
		var val = parseFloat(input.value) || 0;
		val = btn.classList.contains('qty-plus')
			? Math.min(val + step, max)
			: Math.max(val - step, min);
		input.value = val;
		input.dispatchEvent(new Event('change', { bubbles: true }));
	});
});
</script>
<?php
get_footer();