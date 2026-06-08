<?php
/**
 * @package guardexpert
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Lucide Icons CDN -->
	<script src="https://unpkg.com/lucide@latest"></script>
	<!-- Tailwind Play CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	
	<style type="text/tailwindcss">
		/* Предзагрузка базовых стилей, чтобы браузер знал шрифты заранее */
		@layer base {
			html {
				-webkit-tap-highlight-color: transparent;
				font-family: 'Golos Text', sans-serif;
			}
			body {
				@apply bg-[#FAF9F7] text-black;
				display: block !important;
			}
		}
	</style>

	<script>
		// Блокируем отображение до тех пор, пока Tailwind не добавит свои стили в DOM
		document.documentElement.className = 'invisible';
		window.addEventListener('DOMContentLoaded', () => {
			// Даем Tailwind микросекунду на инъекцию стилей
			setTimeout(() => {
				document.documentElement.classList.remove('invisible');
			}, 1);
		});
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header -->
<header class="bg-[#FAF9F7] text-black">
	<!-- Top Bar (Desktop Only) -->
	<div class="">
		<div class="max-w-[1200px] mx-auto px-4">
			<div class="flex items-center justify-between py-1 text-sm hidden md:flex">
				<!-- Left: Contact Info -->
				<div class="flex items-center">
					<div class="flex items-center gap-4 border-r border-black px-6 py-2">
						<ion-icon name="call-outline" class="text-[#2E2E33] text-2xl"></ion-icon>
						<a href="tel:+375297016402" class="hover:text-[#B3262E] text-base	 transition-colors">+375 29 701-64-02</a>
					</div>
					<div class="flex items-center gap-4 border-r border-black px-6 py-2">
						<ion-icon name="call-outline" class="text-[#2E2E33] text-2xl"></ion-icon>
						<a href="tel:+375296257771" class="hover:text-[#B3262E] text-base	 transition-colors">+375 29 625-77-71</a>
					</div>
					<div class="flex items-center gap-2 px-6 py-2">
						<ion-icon name="mail-outline" class="text-[#2E2E33] text-2xl"></ion-icon>
						<a href="mailto:gexpertshop@mail.ru" class="hover:text-[#B3262E] text-base transition-colors">gexpertshop@mail.ru</a>
					</div>
				</div>

				<!-- Right: Cart & Search -->
				<div class="flex items-center gap-4">
					<a href="/корзина" class="relative hover:text-[#B3262E] transition-colors">
						<ion-icon name="cart-outline" class="text-4xl"></ion-icon>
						<span class="absolute -top-1 -right-2 bg-[#B3262E] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">1</span>
					</a>
					<button id="search-toggle-desktop" class="hover:text-[#B3262E] transition-colors outline-none border-none bg-transparent">
						<ion-icon name="search-outline" class="text-4xl"></ion-icon>
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Main Header -->
	<div class="max-w-[1200px] mx-auto">
		<div class="flex items-center justify-between py-4 md:py-6">
			<!-- Logo -->
			<a href="/" class="flex-shrink-0">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Gexpert - Системы безопасности" class="h-12 md:h-[92px] w-auto">
			</a>

			<!-- Desktop Navigation -->
			<nav class="hidden md:flex items-center gap-4">
				<!-- Catalog Button -->
				<a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="flex items-center justify-center gap-2 bg-[#F2F2F0] rounded hover:bg-gray-100 transition-colors border-[1px] w-[184px] h-[55px]">
					<ion-icon name="grid-outline" class="text-[#B3262E] text-2xl"></ion-icon>
					<span class="font-medium text-base text-[#B3262E]">Каталог</span>
				</a>

				<!-- Navigation Links -->
				<div class="flex text-base items-center gap-4">
					<a href="/services" class="text-[#1F1F21] hover:text-[#B3262E] text-base transition-colors">Услуги</a>
					<a href="/about" class="text-[#1F1F21] hover:text-[#B3262E] text-base transition-colors">О компании</a>
					<a href="/returns" class="text-[#1F1F21] hover:text-[#B3262E] text-base transition-colors">Возврат и обмен</a>
					<a href="/shipping" class="text-[#1F1F21] hover:text-[#B3262E] text-base transition-colors">Оплата и доставка</a>
					<a href="/contacts" class="text-[#1F1F21] hover:text-[#B3262E] text-base transition-colors">Контакты</a>
				</div>

				<!-- CTA Button -->
				<a href="/consultation" class=" flex items-center justify-center border-[1px] border-[#B3262E] text-[#B3262E] w-[203px] h-[52px] rounded-[2px] hover:bg-[#B3262E] hover:text-white transition-colors">
					Получить консультацию
				</a>
			</nav>

			<!-- Mobile Actions -->
			<div class="flex items-center gap-4 md:hidden">
				<button id="search-toggle-mobile" class="hover:text-[#B3262E] transition-colors outline-none border-none bg-transparent">
					<ion-icon name="search-outline" class="text-2xl"></ion-icon>
				</button>
				<a href="/cart" class="relative hover:text-[#B3262E] transition-colors">
					<ion-icon name="cart-outline" class="text-2xl"></ion-icon>
					<span class="absolute -top-1 -right-2 bg-[#B3262E] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">1</span>
				</a>
				<button id="mobile-menu-toggle" class="hover:text-[#B3262E] transition-colors outline-none border-none bg-transparent">
					<ion-icon name="menu-outline" class="text-2xl"></ion-icon>
				</button>
			</div>
		</div>
	</div>
</header>

<!-- Search Overlay -->
<div id="search-overlay" class="fixed inset-0 bg-black/80 z-[60] hidden">
	<div class="max-w-[1200px] mx-auto px-4 pt-20 md:pt-32">
		<div class="bg-white rounded-lg shadow-2xl p-6 md:p-8">
			<div class="flex items-center gap-4">
				<form action="/" method="get" class="flex-1 flex items-center gap-4">
					<ion-icon name="search-outline" class="text-[#B3262E] text-2xl flex-shrink-0"></ion-icon>
					<input 
						type="search" 
						name="s" 
						id="search-input" 
						placeholder="Поиск по сайту..." 
						class="flex-1 text-lg outline-none border-none bg-transparent placeholder-gray-400"
						autocomplete="off"
					>
					<button type="submit" class="bg-[#B3262E] text-white px-6 py-3 rounded hover:bg-[#9a1f26] transition-colors whitespace-nowrap outline-none border-none">
						Найти
					</button>
				</form>
				<button id="search-close" class="text-gray-500 hover:text-[#B3262E] transition-colors flex-shrink-0 outline-none border-none bg-transparent">
					<ion-icon name="close-outline" class="text-2xl"></ion-icon>
				</button>
			</div>
		</div>
	</div>
</div>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 bg-[#FAF9F7] z-50 hidden">
	<div class="h-full overflow-y-auto">
		<!-- Mobile Menu Header -->
		<div class="flex items-center justify-between px-4 py-4 border-b border-gray-300">
			<a href="/">
				<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Gexpert" class="h-12 w-auto">
			</a>
			<div class="flex items-center gap-4">
				<button id="search-toggle-mobile-menu" class="hover:text-[#B3262E] transition-colors outline-none border-none bg-transparent">
					<ion-icon name="search-outline" class="text-2xl"></ion-icon>
				</button>
				<a href="/cart" class="relative hover:text-[#B3262E] transition-colors">
					<ion-icon name="cart-outline" class="text-2xl"></ion-icon>
					<span class="absolute -top-1 -right-2 bg-[#B3262E] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">1</span>
				</a>
				<button id="mobile-menu-close" class="hover:text-[#B3262E] transition-colors outline-none border-none bg-transparent">
					<ion-icon name="close-outline" class="text-2xl"></ion-icon>
				</button>
			</div>
		</div>

		<!-- Mobile Menu Content -->
		<div class="px-4 py-6">
			<!-- Catalog Button -->
			<a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="flex items-center justify-center gap-3 bg-[#B3262E] text-white px-6 py-4 rounded mb-8 hover:bg-[#9a1f26] transition-colors">
				<ion-icon name="apps-outline" class="text-2xl"></ion-icon>
				<span class="text-lg font-medium">Перейти в каталог</span>
			</a>

			<!-- Navigation -->
			<div class="mb-8">
				<h3 class="text-[#B3262E] text-xl mb-4 border-b border-[#B3262E] pb-2">Навигация</h3>
				<ul class="space-y-3">
					<li>
						<a href="/about" class="flex items-center gap-2 text-lg hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E]"></ion-icon>
							О компании
						</a>
					</li>
					<li>
						<a href="/services" class="flex items-center gap-2 text-lg hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E]"></ion-icon>
							Услуги
						</a>
					</li>
					<li>
						<a href="/shipping" class="flex items-center gap-2 text-lg hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E]"></ion-icon>
							Оплата и доставка
						</a>
					</li>
					<li>
						<a href="/contacts" class="flex items-center gap-2 text-lg hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E]"></ion-icon>
							Контакты
						</a>
					</li>
					<li>
						<a href="/returns" class="flex items-center gap-2 text-lg hover:text-[#B3262E] transition-colors">
							<ion-icon name="chevron-forward-outline" class="text-[#B3262E]"></ion-icon>
							Возврат и обмен
						</a>
					</li>
				</ul>
			</div>

			<!-- Contacts -->
			<div>
				<h3 class="text-[#B3262E] text-xl mb-4 border-b border-[#B3262E] pb-2">Контакты</h3>
				<ul class="space-y-4">
					<li>
						<a href="tel:+375297016402" class="flex items-center gap-3 text-lg hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-2">
								<ion-icon name="call-outline" class="text-[#B3262E] text-xl"></ion-icon>
							</div>
							+375 29 701-64-02
						</a>
					</li>
					<li>
						<a href="tel:+375296257771" class="flex items-center gap-3 text-lg hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-2">
								<ion-icon name="call-outline" class="text-[#B3262E] text-xl"></ion-icon>
							</div>
							+375 29 625-77-71
						</a>
					</li>
					<li>
						<a href="tel:3798070" class="flex items-center gap-3 text-lg hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-2">
								<ion-icon name="call-outline" class="text-[#B3262E] text-xl"></ion-icon>
							</div>
							379-80-70
						</a>
					</li>
					<li>
						<a href="mailto:gexpertshop@mail.ru" class="flex items-center gap-3 text-lg hover:text-[#B3262E] transition-colors">
							<div class="border border-[#B3262E] p-2">
								<ion-icon name="mail-outline" class="text-[#B3262E] text-xl"></ion-icon>
							</div>
							gexpertshop@mail.ru
						</a>
					</li>
					<li>
						<div class="flex items-start gap-3 text-lg">
							<div class="border border-[#B3262E] p-2">
								<ion-icon name="location-outline" class="text-[#B3262E] text-xl"></ion-icon>
							</div>
							<span>220073 г.Минск<br>ул.Ольшевского 22,<br>помещение 7, каб.34</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Search & Mobile Menu Toggle Script -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Mobile Menu Toggle
		const menuToggle = document.getElementById('mobile-menu-toggle');
		const menuClose = document.getElementById('mobile-menu-close');
		const mobileMenu = document.getElementById('mobile-menu');

		if (menuToggle && mobileMenu) {
			menuToggle.addEventListener('click', function() {
				mobileMenu.classList.remove('hidden');
				document.body.style.overflow = 'hidden';
			});
		}

		if (menuClose && mobileMenu) {
			menuClose.addEventListener('click', function() {
				mobileMenu.classList.add('hidden');
				document.body.style.overflow = '';
			});
		}

		// Search Overlay Toggle
		const searchToggles = [
			document.getElementById('search-toggle-desktop'),
			document.getElementById('search-toggle-mobile'),
			document.getElementById('search-toggle-mobile-menu')
		];
		const searchOverlay = document.getElementById('search-overlay');
		const searchClose = document.getElementById('search-close');
		const searchInput = document.getElementById('search-input');

		searchToggles.forEach(function(toggle) {
			if (toggle && searchOverlay) {
				toggle.addEventListener('click', function() {
					searchOverlay.classList.remove('hidden');
					document.body.style.overflow = 'hidden';
					if (searchInput) {
						setTimeout(function() {
							searchInput.focus();
						}, 100);
					}
				});
			}
		});

		if (searchClose && searchOverlay) {
			searchClose.addEventListener('click', function() {
				searchOverlay.classList.add('hidden');
				document.body.style.overflow = '';
				if (searchInput) {
					searchInput.value = '';
				}
			});
		}

		// Close search on Escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && searchOverlay && !searchOverlay.classList.contains('hidden')) {
				searchOverlay.classList.add('hidden');
				document.body.style.overflow = '';
				if (searchInput) {
					searchInput.value = '';
				}
			}
		});
	});
</script>