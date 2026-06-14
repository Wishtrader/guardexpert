<?php
/**
 * Template Name: Confirm
 *
 * @package guardexpert
 */

get_header();

$order_id    = isset( $_GET['order_id'] ) ? absint( $_GET['order_id'] ) : 0;
$order       = $order_id ? wc_get_order( $order_id ) : null;
$order_items = $order ? $order->get_items() : array();
$order_total = $order ? $order->get_total() : '';
$order_num   = $order ? $order->get_order_number() : '';
?>

<!-- Order Success Section -->
<section class="py-12 lg:py-16 bg-white">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Breadcrumbs -->
		<nav class="text-sm text-gray-500 mb-6">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#B22234]">Главная</a>
			<span class="mx-2">/</span>
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="hover:text-[#B22234]">Корзина</a>
			<span class="mx-2">/</span>
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="hover:text-[#B22234]">Оформление заказа</a>
			<span class="mx-2">/</span>
			<span class="text-gray-700">Заказ отправлен</span>
		</nav>

		<?php if ( $order ) : ?>

		<!-- Success Message -->
		<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-10 shadow-sm text-center mb-8 max-w-2xl mx-auto">
			<h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Заказ отправлен</h1>
			<p class="text-gray-600 mb-4 max-w-md mx-auto">
				Спасибо! Мы получили ваш заказ и свяжемся с вами для уточнения наличия, стоимости и условий поставки.
			</p>
			<p class="text-lg font-bold text-gray-900">
				Номер заказа: <span class="text-[#B22234]">#<?php echo esc_html( $order_num ); ?></span>
			</p>
		</div>

		<div class="grid lg:grid-cols-3 gap-6">
			<!-- Left Column: Order Details -->
			<div class="lg:col-span-2 space-y-6">

				<!-- Order Composition -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 shadow-sm">
					<h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b border-gray-200">Состав заказа</h2>

					<div class="space-y-4">
						<?php foreach ( $order_items as $item ) :
							$product = $item->get_product();
							if ( ! $product ) continue;
							$thumbnail = $product->get_image( 'thumbnail' );
							if ( ! $thumbnail ) {
								$thumbnail = '<img src="https://placehold.co/80x80/f0ebe8/999?text=Product" alt="Товар" class="w-16 h-16 object-cover rounded flex-shrink-0">';
							}
							$cat_name = '';
							$categories = get_the_terms( $product->get_id(), 'product_cat' );
							if ( $categories && is_array( $categories ) ) {
								$cat_name = $categories[0]->name;
							}
						?>
						<div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
							<div class="w-16 h-16 flex-shrink-0">
								<?php echo $thumbnail; ?>
							</div>
							<div class="flex-grow min-w-0">
								<?php if ( $cat_name ) : ?>
								<p class="text-xs text-gray-500 mb-1"><?php echo esc_html( $cat_name ); ?></p>
								<?php endif; ?>
								<p class="text-sm font-medium text-gray-900 leading-tight"><?php echo esc_html( $item->get_name() ); ?></p>
							</div>
							<div class="text-right flex-shrink-0">
								<p class="text-sm font-bold text-gray-900"><?php echo $item->get_quantity(); ?> шт</p>
								<p class="text-xs text-gray-500"><?php echo wc_price( $item->get_total() ); ?></p>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- What's Next -->
				<div class="bg-white border border-gray-200 rounded-lg p-6 lg:p-8 shadow-sm">
					<h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b border-gray-200">Что дальше</h2>

					<div class="space-y-6">
						<div>
							<h3 class="text-lg font-bold text-gray-900 mb-2">1. Менеджер проверит состав заказа</h3>
							<p class="text-gray-600 text-sm">Убедится в наличии оборудования на складе.</p>
						</div>
						<div>
							<h3 class="text-lg font-bold text-gray-900 mb-2">2. Уточнит наличие и условия поставки</h3>
							<p class="text-gray-600 text-sm">Сформирует окончательную стоимость с учетом скидок.</p>
						</div>
						<div>
							<h3 class="text-lg font-bold text-gray-900 mb-2">3. Свяжется с вами для подтверждения</h3>
							<p class="text-gray-600 text-sm">Согласует дату отгрузки и подготовит документы.</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Right Column: Summary -->
			<div class="lg:col-span-1">
				<div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm lg:sticky lg:top-4">
					<h2 class="text-xl font-bold text-gray-900 mb-4 pb-4 border-b border-gray-200">Итого</h2>

					<div class="space-y-3 mb-6">
						<div class="flex justify-between items-center">
							<span class="text-gray-700">Товары (<?php echo $order->get_item_count(); ?>)</span>
							<span class="font-bold text-gray-900"><?php echo wc_price( $order->get_subtotal() ); ?></span>
						</div>
						<div class="flex justify-between items-center pb-3 border-b border-gray-200">
							<span class="text-gray-700">Доставка</span>
							<span class="font-bold text-gray-900"><?php echo $order->get_shipping_total() > 0 ? wc_price( $order->get_shipping_total() ) : 'Уточняется'; ?></span>
						</div>
						<div class="flex justify-between items-center">
							<span class="text-gray-900 font-bold text-lg">Итого</span>
							<span class="font-bold text-[#B22234] text-lg"><?php echo wc_price( $order_total ); ?> <span class="text-sm font-normal text-gray-600">(Без НДС)</span></span>
						</div>
					</div>

					<!-- Button -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block w-full bg-[#B22234] text-white py-3 rounded font-medium hover:bg-[#8B1A2B] transition text-center">
						Вернуться на главную
					</a>
				</div>
			</div>
		</div>

		<?php else : ?>

		<!-- Order not found -->
		<div class="text-center py-12">
			<h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Заказ не найден</h1>
			<p class="text-gray-600 text-lg mb-4">Заказ не существует или был удалён.</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block bg-[#B22234] text-white px-6 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
				Вернуться на главную
			</a>
		</div>

		<?php endif; ?>

		<!-- Back Button (Desktop) -->
		<div class="text-center mt-8 hidden lg:block">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block bg-[#B22234] text-white px-12 py-3 rounded font-medium hover:bg-[#8B1A2B] transition">
				Вернуться на главную
			</a>
		</div>
	</div>
</section>
<?php
get_footer();
