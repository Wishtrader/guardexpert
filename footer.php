<?php
/**
 * @package guardexpert
 */
?>

<!-- Footer -->
<footer class="relative bg-[#2D2D2D] text-white" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.png'); background-size: cover; background-position: center;">
	<div class="max-w-[1200px] mx-auto px-4 py-12 md:py-16">
		<!-- Main Footer Content -->
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
			<!-- Column 1: Logo & Company Info -->
			<div class="lg:col-span-1">
				<img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.png" alt="Gexpert - Системы безопасности" class="h-20 w-auto mb-6">
				<div class="space-y-2 text-sm">
					<p>УНП 171770720</p>
					<p>ОКПО 380799555000</p>
				</div>
			</div>

			<!-- Column 2: Catalog -->
			<div>
				<h3 class="text-lg mb-4 pb-2 border-b border-[#B3262E] inline-block">
					<a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="hover:text-[#B3262E] transition-colors">Каталог</a>
				</h3>
				<?php
				$footer_categories = get_terms( array(
					'taxonomy'   => 'product_cat',
					'hide_empty' => false,
					'number'     => 5,
					'orderby'    => 'menu_order',
					'order'      => 'ASC',
				) );
				if ( ! empty( $footer_categories ) && ! is_wp_error( $footer_categories ) ) : ?>
					<ul class="space-y-2">
						<?php foreach ( $footer_categories as $footer_category ) :
							if ( $footer_category->name === 'Uncategorized' ) continue;
						?>
							<li>
								<a href="<?php echo esc_url( guardexpert_get_category_url( $footer_category ) ); ?>" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
									<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
									<?php echo esc_html( $footer_category->name ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php else : ?>
					<p class="text-sm text-gray-400">Категории не добавлены</p>
				<?php endif; ?>
			</div>

			<!-- Column 3: Navigation -->
			<div>
				<h3 class="text-lg mb-4 pb-2 border-b border-[#B3262E] inline-block">Навигация</h3>
				<ul class="space-y-2">
					<li>
						<a href="/about" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
							О компании
						</a>
					</li>
					<li>
						<a href="/services" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
							Услуги
						</a>
					</li>
					<li>
						<a href="/shipping" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
							Оплата и доставка
						</a>
					</li>
					<li>
						<a href="/contacts" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
							Контакты
						</a>
					</li>
					<li>
						<a href="/returns" class="flex items-center gap-2 hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E] flex-shrink-0"></ion-icon>
							Возврат и обмен
						</a>
					</li>
				</ul>
			</div>

			<!-- Column 4: Contacts -->
			<div>
				<h3 class="text-lg mb-4 pb-2 border-b border-[#B3262E] inline-block">Контакты</h3>
				<ul class="space-y-3">
					<li>
						<a href="tel:+375297016402" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-1.5 flex-shrink-0">
								<ion-icon name="call-outline" class="text-[#B3262E] text-lg"></ion-icon>
							</div>
							+375 29 701-64-02
						</a>
					</li>
					<li>
						<a href="tel:+375296257771" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-1.5 flex-shrink-0">
								<ion-icon name="call-outline" class="text-[#B3262E] text-lg"></ion-icon>
							</div>
							+375 29 625-77-71
						</a>
					</li>
					<li>
						<a href="tel:3798070" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-1.5 flex-shrink-0">
								<ion-icon name="call-outline" class="text-[#B3262E] text-lg"></ion-icon>
							</div>
							379-80-70
						</a>
					</li>
					<li>
						<a href="mailto:gexpertshop@mail.ru" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-1.5 flex-shrink-0">
								<ion-icon name="mail-outline" class="text-[#B3262E] text-lg"></ion-icon>
							</div>
							gexpertshop@mail.ru
						</a>
					</li>
					<li>
						<div class="flex items-start gap-3">
							<div class="border border-[#B3262E] p-1.5 flex-shrink-0">
								<ion-icon name="location-outline" class="text-[#B3262E] text-lg"></ion-icon>
							</div>
							<span>220073 г.Минск<br>ул.Ольшевского 22,<br>помещение 7, каб.34</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Bottom Bar -->
	<div class="border-t border-gray-700 mt-12">
		<div class="max-w-[1200px] mx-auto px-4 py-6">
			<div class="flex flex-col lg:flex-row items-center justify-between gap-4 text-sm">
				<a href="/privacy-policy" class="hover:text-[#B3262E] transition-colors order-2 md:order-1">Политика конфиденциальности</a>
				<p class="order-3 md:order-2">©ГАРДЭКСПЕРТ, <?php echo date('Y'); ?>. Все права защищены.</p>
				<a href="/cookie-policy" class="hover:text-[#B3262E] transition-colors order-1 md:order-3">Политика обработки файлов cookie</a>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
