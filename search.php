<?php
/**
 * Search Results Template
 *
 * @package guardexpert
 */

get_header();

$search_query = get_search_query();
$total_results = $wp_query->found_posts;
?>

<!-- Hero Section -->
<section class="relative overflow-hidden -mt-[120px] lg:-mt-[220px]" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/hero-bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100vw; margin-left: calc(-50vw + 50%);">
    <div class="max-w-[1200px] mx-auto px-4 md:px-0 pt-[120px] lg:pt-[220px] pb-12 lg:pb-20 relative z-10">
        <div class="lg:w-1/2">
            <nav class="text-[15px] mb-6">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-[#66666B]">Главная</a>
                <span class="mx-2">/</span>
                <span class="text-black">Результаты поиска</span>
            </nav>
            <h1 class="text-3xl lg:text-5xl font-bold text-black leading-tight mb-6">
                Результаты поиска
            </h1>
            <?php if ( $total_results > 0 ) : ?>
                <p class="text-black text-base lg:text-lg mb-8 max-w-[590px]">
                    По запросу «<?php echo esc_html( $search_query ); ?>» найдено <?php echo esc_html( $total_results ); ?>
                    <?php
                    $last_digit = (int) substr( $total_results, -1 );
                    $last_two = (int) substr( $total_results, -2 );
                    if ( $last_two >= 11 && $last_two <= 19 ) {
                        echo 'результатов';
                    } elseif ( $last_digit === 1 ) {
                        echo 'результат';
                    } elseif ( $last_digit >= 2 && $last_digit <= 4 ) {
                        echo 'результата';
                    } else {
                        echo 'результатов';
                    }
                    ?>
                </p>
            <?php else : ?>
                <p class="text-black text-base lg:text-lg mb-8 max-w-[590px]">
                    По запросу «<?php echo esc_html( $search_query ); ?>» ничего не найдено
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Search Form -->
<section class="py-8 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="max-w-[590px]">
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                    <ion-icon name="search-outline" class="text-xl"></ion-icon>
                </span>
                <input
                    type="search"
                    name="s"
                    value="<?php echo esc_attr( $search_query ); ?>"
                    placeholder="Поиск по сайту..."
                    class="w-full pl-12 pr-4 py-4 border border-gray-200 rounded bg-white focus:border-[#B3262E] focus:outline-none focus:ring-2 focus:ring-[#B3262E]/20 transition-colors text-base"
                >
            </div>
        </form>
    </div>
</section>

<!-- Search Results -->
<section class="py-12 lg:py-16 bg-white">
    <div class="max-w-[1200px] mx-auto px-4">
        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'search' ); ?>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                    'class'     => '',
                ) );
                ?>
            </div>
        <?php else : ?>
            <div class="text-center py-16">
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <ion-icon name="search-outline" class="text-5xl text-gray-400"></ion-icon>
                </div>
                <h2 class="text-2xl font-bold text-black mb-4">Ничего не найдено</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    По запросу «<?php echo esc_html( $search_query ); ?>» ничего не найдено. Попробуйте изменить поисковый запрос или вернуться на главную.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url( guardexpert_get_catalog_url() ); ?>" class="inline-flex items-center justify-center gap-2 bg-[#B3262E] text-white px-8 py-3 rounded font-medium hover:bg-[#9a1f26] transition shadow-md">
                        Перейти в каталог
                    </a>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center gap-2 bg-white text-[#B3262E] border border-[#B3262E] px-8 py-3 rounded font-medium hover:bg-[#B3262E] hover:text-white transition">
                        На главную
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
