<?php
/**
 * @package guardexpert
 */
?>

<!-- Footer -->
<footer class="relative bg-[#2D2D2D] text-white" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.png'); background-size: cover; background-position: center;">
	<div class="max-w-[1200px] mx-auto px-4 py-12 md:py-8">
		<!-- Main Footer Content -->
		<div class="flex flex-col md:flex-row gap-12 md:gap-20">
			<!-- Column 1: Logo & Company Info -->
			<div class="lg:col-span-1">
				<img src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.png" alt="Gexpert - Системы безопасности" class="md:max-h-20 w-auto mb-6">
				<div class="space-y-2 text-sm">
					<p>УНП 171770720</p>
					<p>ОКПО 380799555000</p>
				</div>
			</div>

			<!-- Column 2: Catalog -->
			<div class="md:min-w-[310px]">
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
							<img src="<?php echo get_template_directory_uri(); ?>/img/phone2.svg" alt="phone">
							+375 29 701-64-02
						</a>
					</li>
					<li>
						<a href="tel:+375296257771" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<img src="<?php echo get_template_directory_uri(); ?>/img/phone2.svg" alt="phone">
							+375 29 625-77-71
						</a>
					</li>
					<li>
						<a href="tel:3798070" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<img src="<?php echo get_template_directory_uri(); ?>/img/phone2.svg" alt="phone">
							379-80-70
						</a>
					</li>
					<li>
						<a href="mailto:gexpertshop@mail.ru" class="flex items-center gap-3 hover:text-[#B3262E] transition-colors">
							<img src="<?php echo get_template_directory_uri(); ?>/img/mail2.svg" alt="mail">
							gexpertshop@mail.ru
						</a>
					</li>
					<li>
						<div class="flex items-center gap-3">
							<img src="<?php echo get_template_directory_uri(); ?>/img/pin2.svg" alt="pin">
							<span class="leading-[1.2]">220073 г.Минск<br>ул.Ольшевского 22,<br>помещение 7, каб.34</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Bottom Bar -->
	<div class="mt-2">
		<div class="max-w-[1200px] mx-auto px-4 py-6">
			<div class="flex flex-col lg:flex-row items-center justify-between gap-4 text-sm">
				<a href="/privacy-policy" class="hover:text-[#B3262E] transition-colors order-2 md:order-1">Политика конфиденциальности</a>
				<p class="order-3 md:order-2">©ГАРДЭКСПЕРТ, <?php echo date('Y'); ?>. Все права защищены.</p>
				<a href="/cookie-policy" class="hover:text-[#B3262E] transition-colors order-1 md:order-3">Политика обработки файлов cookie</a>
			</div>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/consultation-popup' ); ?>

</div><!-- #page -->

<style>
#consultation-popup:not(.hidden) { display: flex !important; }
.backdrop-blur-sm { backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
	if (typeof lucide !== 'undefined') lucide.createIcons();

	var popup = document.getElementById('consultation-popup');
	var overlay = document.getElementById('consultation-overlay');
	var closeBtn = document.getElementById('consultation-close');
	var form = document.getElementById('consultation-form');
	var success = document.getElementById('consultation-success');

	function openPopup(e) {
		e.preventDefault();
		popup.classList.remove('hidden');
		document.body.style.overflow = 'hidden';
		if (window._initPhoneMasks) setTimeout(window._initPhoneMasks, 100);
	}

	function closePopup() {
		popup.classList.add('hidden');
		document.body.style.overflow = '';
		form.reset();
		success.classList.add('hidden');
	}

	document.querySelectorAll('.js-open-consultation').forEach(function(btn) {
		btn.addEventListener('click', openPopup);
	});

	if (closeBtn) closeBtn.addEventListener('click', closePopup);
	if (overlay) overlay.addEventListener('click', closePopup);

	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && !popup.classList.contains('hidden')) {
			closePopup();
		}
	});

	if (form) {
		form.addEventListener('submit', function(e) {
			e.preventDefault();

			var data = new FormData(form);
			data.append('action', 'guardexpert_send_consultation');

			fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
				method: 'POST',
				body: data
			})
			.then(function(r) { return r.json(); })
			.then(function(response) {
				if (response.success) {
					success.classList.remove('hidden');
				}
			})
			.catch(function() {});
		});
	}
});
</script>

<?php wp_footer(); ?>

</body>
</html>
