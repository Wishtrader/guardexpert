<?php
/**
 * Template part for displaying search results
 *
 * @package guardexpert
 */

$post_type = get_post_type();
$post_id   = get_the_ID();
$permalink = get_permalink();
$title     = get_the_title();
$thumbnail = get_the_post_thumbnail_url( $post_id, 'woocommerce_thumbnail' );

// For WooCommerce products
if ( 'product' === $post_type ) :
    $product = wc_get_product( $post_id );
    if ( ! $product ) return;

    $categories = get_the_terms( $post_id, 'product_cat' );
    $category_name = $categories && is_array( $categories ) ? $categories[0]->name : '';
    $category_url = $categories ? guardexpert_get_category_url( $categories[0] ) : '';
    $price_html = $product->get_price_html();
    $has_price = $product->get_price();
?>
<a href="<?php echo esc_url( $permalink ); ?>" class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group flex flex-col h-full">
    <div class="aspect-square bg-gray-50 p-6 flex items-center justify-center overflow-hidden">
        <?php if ( $thumbnail ) : ?>
            <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/cat-placeholder.png" alt="<?php echo esc_attr( $title ); ?>" class="w-full h-full object-contain">
        <?php endif; ?>
    </div>
    <div class="p-4 md:p-6 flex flex-col flex-1">
        <?php if ( $category_name ) : ?>
            <span class="text-xs text-[#B3262E] mb-2"><?php echo esc_html( $category_name ); ?></span>
        <?php endif; ?>
        <h3 class="text-lg font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors line-clamp-2">
            <?php echo esc_html( $title ); ?>
        </h3>
        <?php if ( $has_price ) : ?>
            <div class="mt-auto mb-2">
                <span class="text-xl font-bold text-[#B3262E]"><?php echo wp_kses_post( $price_html ); ?></span>
                <span class="text-sm text-gray-500 ml-1">(Без НДС)</span>
            </div>
        <?php else : ?>
            <div class="mt-auto mb-2">
                <span class="text-sm text-gray-500">Цена по запросу</span>
            </div>
        <?php endif; ?>
    </div>
</a>

<?php else : ?>

<!-- For non-product results (pages, posts, services) -->
<a href="<?php echo esc_url( $permalink ); ?>" class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group flex flex-col h-full">
    <div class="aspect-[4/3] bg-gray-50 flex items-center justify-center overflow-hidden">
        <?php if ( $thumbnail ) : ?>
            <img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        <?php else : ?>
            <?php if ( 'services' === $post_type ) : ?>
                <ion-icon name="briefcase-outline" class="text-5xl text-gray-300"></ion-icon>
            <?php elseif ( 'post' === $post_type ) : ?>
                <ion-icon name="document-text-outline" class="text-5xl text-gray-300"></ion-icon>
            <?php else : ?>
                <ion-icon name="document-outline" class="text-5xl text-gray-300"></ion-icon>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="p-4 md:p-6 flex flex-col flex-1">
        <?php
        $badge_class = 'bg-gray-100 text-gray-600';
        $badge_label = 'Страница';
        if ( 'services' === $post_type ) {
            $badge_class = 'bg-blue-50 text-blue-600';
            $badge_label = 'Услуга';
        } elseif ( 'post' === $post_type ) {
            $badge_class = 'bg-green-50 text-green-600';
            $badge_label = 'Статья';
        }
        ?>
        <span class="inline-block <?php echo esc_attr( $badge_class ); ?> text-xs font-medium px-2.5 py-1 rounded mb-3 self-start">
            <?php echo esc_html( $badge_label ); ?>
        </span>
        <h3 class="text-lg font-bold text-black mb-2 group-hover:text-[#B3262E] transition-colors line-clamp-2">
            <?php echo esc_html( $title ); ?>
        </h3>
        <span class="inline-flex items-center gap-1 text-[#B3262E] font-semibold text-base mt-auto">
            <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
        </span>
    </div>
</a>

<?php endif; ?>
