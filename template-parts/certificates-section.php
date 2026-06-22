<?php
/**
 * Template part for Certificates Section
 *
 * @package guardexpert
 */

$page_id = get_queried_object_id();

$certificates_title = get_field( 'front_certificates_title', $page_id ) ?: 'Сертификаты и документы';
$certificates_description = get_field( 'front_certificates_description', $page_id ) ?: 'Подтверждающие материалы, сопроводительная документация и документы, которые помогают работать с оборудованием уверенно и прозрачно.';

$certificates = get_posts( array(
	'post_type'      => 'certificates',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'       => 'menu_order',
	'order'         => 'ASC',
) );
$certificate_images = array();
if ( $certificates ) {
	foreach ( $certificates as $cert ) {
		$image_id = get_post_meta( $cert->ID, 'image', true );
		
		if ( $image_id && is_numeric( $image_id ) ) {
			$image = wp_get_attachment_image_url( $image_id, 'full' );
		} elseif ( is_array( $image_id ) && isset( $image_id['url'] ) ) {
			$image = $image_id['url'];
		} elseif ( $image_id ) {
			$image = $image_id;
		} else {
			$image = '';
		}
		if ( $image ) {
			$certificate_images[] = $image;
		}
	}
}
?>

<!-- Certificates Section -->
<section class="bg-[#FAF9F7] py-16 md:py-20">
	<div class="max-w-[1200px] mx-auto px-4">
		<!-- Section Header -->
		<div class="text-center mb-12 md:mb-16">
			<h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-black mb-4">
				<?php echo esc_html( $certificates_title ); ?>
			</h2>
			<p class="text-base md:text-lg text-gray-700 max-w-5xl mx-auto">
				<?php echo esc_html( $certificates_description ); ?>
			</p>
		</div>

		<?php if ( count( $certificate_images ) > 0 ): ?>
		<!-- Certificates Grid / Mobile Slider -->
		<div class="hidden sm:grid grid-cols-2 lg:grid-cols-4 gap-6" id="certificates-grid">
			<?php foreach ( $certificate_images as $index => $image ): ?>
			<div class="certificate-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group" data-certificate="<?php echo esc_attr( $index + 1 ); ?>">
				<div class="aspect-[3/4] bg-gray-50 flex items-center justify-center">
					<img src="<?php echo esc_url( $image ); ?>" alt="Сертификат <?php echo esc_attr( $index + 1 ); ?>" class="w-full h-full object-contain">
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- Mobile Slider -->
		<div class="sm:hidden relative" id="certificates-slider-wrap">
			<div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 scroll-smooth" id="certificates-slider" style="-webkit-overflow-scrolling: touch;">
				<?php foreach ( $certificate_images as $index => $image ): ?>
				<div class="snap-start shrink-0 w-[70%] first:ml-auto last:mr-auto certificate-card bg-white rounded-lg overflow-hidden shadow-sm cursor-pointer" data-certificate="<?php echo esc_attr( $index + 1 ); ?>">
					<div class="aspect-[3/4] bg-gray-50 flex items-center justify-center">
						<img src="<?php echo esc_url( $image ); ?>" alt="Сертификат <?php echo esc_attr( $index + 1 ); ?>" class="w-full h-full object-contain">
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- Slider Arrows -->
			<div class="flex justify-center items-center gap-4 mt-4">
				<button id="cert-prev" class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:border-[#B22234] hover:text-[#B22234] transition-colors">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
				</button>
				<span id="cert-counter" class="text-sm text-gray-500">1 / <?php echo count( $certificate_images ); ?></span>
				<button id="cert-next" class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:border-[#B22234] hover:text-[#B22234] transition-colors">
					<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
				</button>
			</div>
		</div>

		<!-- Certificate Lightbox Modal -->
		<div id="certificate-modal" class="fixed inset-0 bg-black/90 z-[100] hidden flex items-center justify-center p-4">
			<!-- Close Button -->
			<button id="modal-close" class="absolute top-4 right-4 md:top-6 md:right-6 text-white hover:text-[#B22234] transition-colors z-10">
				<ion-icon name="close-outline" class="text-4xl md:text-5xl"></ion-icon>
			</button>

			<!-- Navigation: Previous -->
			<button id="modal-prev" class="absolute left-2 md:left-6 top-1/2 -translate-y-1/2 text-white hover:text-[#B22234] transition-colors">
				<ion-icon name="chevron-back-outline" class="text-4xl md:text-5xl"></ion-icon>
			</button>

			<!-- Navigation: Next -->
			<button id="modal-next" class="absolute right-2 md:right-6 top-1/2 -translate-y-1/2 text-white hover:text-[#B22234] transition-colors">
				<ion-icon name="chevron-forward-outline" class="text-4xl md:text-5xl"></ion-icon>
			</button>

			<!-- Certificate Image Container -->
			<div class="max-w-5xl max-h-[90vh] w-full flex items-center justify-center">
				<img id="modal-image" src="" alt="Сертификат" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
			</div>

			<!-- Counter -->
			<div class="absolute bottom-4 md:bottom-6 left-1/2 -translate-x-1/2 text-white text-lg md:text-xl">
				<span id="modal-counter">1</span> / <?php echo count( $certificate_images ); ?>
			</div>
		</div>

		<!-- Certificate Modal Script -->
		<script>
		document.addEventListener('DOMContentLoaded', function() {
			const modal = document.getElementById('certificate-modal');
			const modalImage = document.getElementById('modal-image');
			const modalClose = document.getElementById('modal-close');
			const modalPrev = document.getElementById('modal-prev');
			const modalNext = document.getElementById('modal-next');
			const modalCounter = document.getElementById('modal-counter');
			const certificateCards = document.querySelectorAll('.certificate-card');
			
			let currentCertificate = 1;
			const totalCertificates = <?php echo count( $certificate_images ); ?>;

			// Certificate image paths
			const certificateImages = <?php echo json_encode( $certificate_images ); ?>;

			// Open modal
			certificateCards.forEach(card => {
				card.addEventListener('click', function() {
					currentCertificate = parseInt(this.getAttribute('data-certificate'));
					openModal(currentCertificate);
				});
			});

			function openModal(index) {
				modalImage.src = certificateImages[index - 1];
				modalCounter.textContent = index;
				modal.classList.remove('hidden');
				document.body.style.overflow = 'hidden';
			}

			function closeModal() {
				modal.classList.add('hidden');
				document.body.style.overflow = '';
			}

			function navigateCertificate(direction) {
				currentCertificate += direction;
				if (currentCertificate < 1) {
					currentCertificate = totalCertificates;
				} else if (currentCertificate > totalCertificates) {
					currentCertificate = 1;
				}
				modalImage.src = certificateImages[currentCertificate - 1];
				modalCounter.textContent = currentCertificate;
			}

			// Close modal
			modalClose.addEventListener('click', closeModal);

			// Navigate
			modalPrev.addEventListener('click', function() {
				navigateCertificate(-1);
			});

			modalNext.addEventListener('click', function() {
				navigateCertificate(1);
			});

			// Close on background click
			modal.addEventListener('click', function(e) {
				if (e.target === modal) {
					closeModal();
				}
			});

			// Keyboard navigation
			document.addEventListener('keydown', function(e) {
				if (modal.classList.contains('hidden')) return;
				
				if (e.key === 'Escape') {
					closeModal();
				} else if (e.key === 'ArrowLeft') {
					navigateCertificate(-1);
				} else if (e.key === 'ArrowRight') {
					navigateCertificate(1);
				}
			});

			// Mobile Slider
			const slider = document.getElementById('certificates-slider');
			const sliderWrap = document.getElementById('certificates-slider-wrap');
			const prevBtn = document.getElementById('cert-prev');
			const nextBtn = document.getElementById('cert-next');
			const counter = document.getElementById('cert-counter');

			if (slider && prevBtn && nextBtn) {
				let currentSlide = 0;
				const slides = slider.querySelectorAll('.certificate-card');
				const totalSlides = slides.length;

				function updateSlider() {
					const slideWidth = slides[0].offsetWidth + 16; // gap-4 = 16px
					const maxScroll = slider.scrollWidth - slider.clientWidth;
					const centerOffset = (slider.clientWidth - slides[0].offsetWidth) / 2;
					const targetScroll = currentSlide * slideWidth - centerOffset;
					slider.scrollTo({ left: Math.max(0, Math.min(targetScroll, maxScroll)), behavior: 'smooth' });
					counter.textContent = (currentSlide + 1) + ' / ' + totalSlides;
				}

				prevBtn.addEventListener('click', function() {
					if (currentSlide > 0) {
						currentSlide--;
						updateSlider();
					}
				});

				nextBtn.addEventListener('click', function() {
					if (currentSlide < totalSlides - 1) {
						currentSlide++;
						updateSlider();
					}
				});

				// Update current slide on scroll
				slider.addEventListener('scroll', function() {
					const slideWidth = slides[0].offsetWidth + 16;
					const centerOffset = (slider.clientWidth - slides[0].offsetWidth) / 2;
					currentSlide = Math.round((slider.scrollLeft + centerOffset) / slideWidth);
					currentSlide = Math.max(0, Math.min(currentSlide, totalSlides - 1));
					counter.textContent = (currentSlide + 1) + ' / ' + totalSlides;
				});
			}
		});
		</script>
		<?php else: ?>
		<div class="text-center py-8">
			<p class="text-gray-600 mb-2">Сертификаты пока не добавлены или изображения не загружены. Добавьте их в пункте "Сертификаты" в админке.</p>
			<p class="text-xs text-gray-400">Найдено записей: <?php echo count($certificates); ?>. Изображений загружено: <?php echo count($certificate_images); ?></p>
		</div>
		<?php endif; ?>
</section>