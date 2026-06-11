<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'guardexpert_qty_style_added' ) ) {
	function guardexpert_qty_style_added() { return true; }
	?>
	<style>
		.quantity .qty::-webkit-inner-spin-button,
		.quantity .qty::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
	</style>
	<?php
}

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	$input_id = isset( $input_id ) ? $input_id : 'quantity_' . uniqid();
	?>
	<div class="quantity flex items-center border border-gray-300 rounded overflow-hidden">
		<button type="button" class="qty-btn qty-minus flex items-center justify-center w-[44px] h-[44px] text-gray-600 hover:text-[#B3262E] hover:bg-gray-100 transition-colors outline-none border-none bg-transparent cursor-pointer text-2xl leading-none select-none shrink-0" aria-label="Уменьшить количество">&minus;</button>
		<input
			type="number"
			id="<?php echo esc_attr( $input_id ); ?>"
			class="input-text qty text w-[60px] text-center text-lg font-medium outline-none border-x border-gray-300 py-2 h-[44px]" style="-moz-appearance:textfield; appearance:textfield"
			step="<?php echo esc_attr( $step ); ?>"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			title="<?php echo esc_attr_x( 'Кол-во', 'Product quantity input tooltip', 'woocommerce' ); ?>"
			size="4"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			autocomplete="off"
		/>
		<button type="button" class="qty-btn qty-plus flex items-center justify-center w-[44px] h-[44px] text-gray-600 hover:text-[#B3262E] hover:bg-gray-100 transition-colors outline-none border-none bg-transparent cursor-pointer text-2xl leading-none select-none shrink-0" aria-label="Увеличить количество">+</button>
	</div>
	<?php
}
