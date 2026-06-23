<?php
/**
 * guardexpert functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package guardexpert
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function guardexpert_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on guardexpert, use a find and replace
		* to change 'guardexpert' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'guardexpert', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'guardexpert' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'guardexpert_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'guardexpert_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function guardexpert_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'guardexpert_content_width', 640 );
}
add_action( 'after_setup_theme', 'guardexpert_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function guardexpert_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'guardexpert' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'guardexpert' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'guardexpert_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function guardexpert_scripts() {
	// Enqueue Ionicons
	wp_enqueue_script( 'ionicons', 'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js', array(), '7.1.0', true );
	wp_enqueue_script( 'ionicons-nomodule', 'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js', array(), '7.1.0', true );
	
	// Enqueue Google Fonts: Geologica (headings) and Golos Text (content)
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700;800;900&family=Golos+Text:wght@400;500;600;700;800;900&display=swap', array(), null );
	
	wp_enqueue_style( 'guardexpert-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'guardexpert-style', 'rtl', 'replace' );

	wp_enqueue_script( 'guardexpert-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// IMask phone mask
	wp_enqueue_script( 'imask', 'https://unpkg.com/imask', array(), null, true );
	wp_enqueue_script( 'guardexpert-phone-mask', get_template_directory_uri() . '/js/phone-mask.js', array( 'imask' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'guardexpert_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Preconnect to Google Fonts for better performance
 */
function guardexpert_preconnect_fonts() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'guardexpert_preconnect_fonts', 0 );

/**
 * ACF JSON helper
 */
add_action( 'acf/init', 'guardexpert_acf_init' );
function guardexpert_acf_init() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => 'Настройки темы',
			'menu_title' => 'Настройки',
			'menu_slug'  => 'theme-settings',
			'capability' => 'edit_posts',
			'redirect'   => false,
		) );
	}
}

/**
 * Load ACF field groups from theme JSON folder
 */
add_filter( 'acf/settings/load_json', 'guardexpert_acf_json_load' );
function guardexpert_acf_json_load( $paths ) {
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}


add_filter('woocommerce_validate_billing_email', function($valid, $email) {
    if (strpos($email, '@local') !== false) {
        return true;
    }
    return $valid;
}, 10, 2);

/**
 * Validate Belarus phone number (+375 XX XXX-XX-XX).
 */
function guardexpert_is_valid_phone( $phone ) {
	$phone  = trim( (string) $phone );
	$digits = preg_replace( '/[^\d]/', '', $phone );
	return strlen( $digits ) === 12 && strpos( $digits, '375' ) === 0;
}

/**
 * Validate email address.
 */
function guardexpert_is_valid_email( $email ) {
	return filter_var( trim( (string) $email ), FILTER_VALIDATE_EMAIL ) !== false;
}

/**
 * WooCommerce cart fragments — dynamically update header cart count and cart summary.
 */
add_filter('woocommerce_add_to_cart_fragments', 'guardexpert_cart_fragments');
function guardexpert_cart_fragments($fragments) {
    $count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;

    ob_start();
    ?>
    <span class="cart-count absolute -top-1 -right-2 bg-[#B3262E] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"><?php echo esc_html( $count ); ?></span>
    <?php
    $fragments['span.cart-count'] = ob_get_clean();

    if (is_cart()) {
        ob_start();
        ?>
        <span id="js-cart-count"><?php echo esc_html( $count ); ?></span>
        <?php
        $fragments['#js-cart-count'] = ob_get_clean();

        ob_start();
        ?>
        <span id="js-cart-subtotal" class="font-bold text-gray-900 text-lg"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
        <?php
        $fragments['#js-cart-subtotal'] = ob_get_clean();

        ob_start();
        ?>
        <span id="js-cart-total" class="font-bold text-[#B22234] text-xl"><?php echo WC()->cart->get_total(); ?></span>
        <?php
        $fragments['#js-cart-total'] = ob_get_clean();
    }

    return $fragments;
}

/**
 * Get the URL of the page assigned to the "Catalog" page template.
 *
 * @return string
 */
function guardexpert_get_catalog_url() {
	$pages = get_pages( array(
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'catalog.php',
		'number'     => 1,
	) );

	if ( ! empty( $pages ) ) {
		return get_permalink( $pages[0] );
	}

	return home_url( '/catalog' );
}

/**
 * Get a working URL for a WooCommerce product category.
 *
 * Falls back to a manually constructed permalink if the term link
 * is not available (e.g. when permalinks haven't been flushed).
 *
 * @param WP_Term $category Category term.
 * @return string
 */
function guardexpert_get_category_url( $category ) {
	if ( ! $category || is_wp_error( $category ) || empty( $category->term_id ) ) {
		return guardexpert_get_catalog_url();
	}

	$link = get_term_link( $category );

	if ( ! is_wp_error( $link ) && ! empty( $link ) ) {
		return $link;
	}

	$base = function_exists( 'WC' ) ? get_option( 'woocommerce_product_category_slug', 'product-category' ) : 'product-category';
	return home_url( '/' . $base . '/' . $category->slug . '/' );
}

/**
 * Flush rewrite rules on theme activation so WooCommerce category
 * permalinks (/product-category/slug/) work correctly.
 */
function guardexpert_flush_rewrites() {
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'guardexpert_flush_rewrites' );

/**
 * Register custom post type for Services
 */
function guardexpert_register_services_post_type() {
	$labels = array(
		'name'               => 'Услуги',
		'singular_name'      => 'Услуга',
		'menu_name'          => 'Услуги',
		'name_admin_bar'     => 'Услуги',
		'add_new'            => 'Добавить услугу',
		'add_new_item'       => 'Добавить новую услугу',
		'edit_item'          => 'Редактировать услугу',
		'new_item'           => 'Новая услуга',
		'view_item'          => 'Посмотреть услугу',
		'all_items'          => 'Все услуги',
		'search_items'       => 'Поиск услуг',
		'parent_item_colon'  => '',
		'not_found'          => 'Услуг не найдено',
		'not_found_in_trash' => 'Услуг не найдено в корзине',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'        => true,
		'has_archive'        => false,
		'rewrite'            => array( 'slug' => 'services', 'with_front' => false ),
		'capability_type'    => 'post',
		'capabilities'       => array(
			'edit_post'           => 'edit_post',
			'read_post'           => 'read_post',
			'delete_post'         => 'delete_post',
			'edit_posts'          => 'edit_posts',
			'edit_others_posts'   => 'edit_others_posts',
			'delete_posts'        => 'delete_posts',
			'publish_posts'       => 'publish_posts',
			'read_private_posts'  => 'read_private_posts',
		),
		'map_meta_cap'       => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-clipboard',
		'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
	);

	register_post_type( 'services', $args );
}
add_action( 'init', 'guardexpert_register_services_post_type' );

/**
 * Flush rewrite rules after registering services post type
 */
function guardexpert_flush_on_register() {
	if ( isset( $_GET['guardexpert_flush_services'] ) && current_user_can( 'manage_options' ) ) {
		flush_rewrite_rules();
	}
}
add_action( 'admin_init', 'guardexpert_flush_on_register' );

/**
 * Add "Duplicate" link to services post row actions.
 */
function guardexpert_duplicate_service_link( $actions, $post ) {
	if ( $post->post_type !== 'services' || ! current_user_can( 'edit_posts' ) ) {
		return $actions;
	}

	$actions['duplicate'] = '<a href="' . wp_nonce_url(
		admin_url( 'admin.php?action=duplicate_service&post=' . $post->ID ),
		'duplicate_service_' . $post->ID
	) . '">Дублировать</a>';

	return $actions;
}
add_filter( 'post_row_actions', 'guardexpert_duplicate_service_link', 10, 2 );

/**
 * Handle service duplication.
 */
function guardexpert_handle_duplicate_service() {
	if ( ! isset( $_GET['post'] ) || ! isset( $_GET['_wpnonce'] ) ) {
		wp_die( 'Неверный запрос' );
	}

	$post_id = intval( $_GET['post'] );
	$post = get_post( $post_id );

	if ( ! $post || $post->post_type !== 'services' ) {
		wp_die( 'Услуга не найдена' );
	}

	if ( ! wp_verify_nonce( $_GET['_wpnonce'], 'duplicate_service_' . $post_id ) ) {
		wp_die( 'Ошибка безопасности' );
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Недостаточно прав' );
	}

	$new_post_data = array(
		'post_title'   => $post->post_title . ' — копия',
		'post_status'  => 'draft',
		'post_type'    => 'services',
		'post_content' => $post->post_content,
	);

	$new_post_id = wp_insert_post( $new_post_data );

	if ( is_wp_error( $new_post_id ) ) {
		wp_die( 'Ошибка при дублировании' );
	}

	$thumbnail_id = get_post_thumbnail_id( $post_id );
	if ( $thumbnail_id ) {
		set_post_thumbnail( $new_post_id, $thumbnail_id );
	}

	wp_redirect( admin_url( 'edit.php?post_type=services&duplicated=1' ) );
	exit;
}
add_action( 'admin_action_duplicate_service', 'guardexpert_handle_duplicate_service' );

/**
 * Add reorder submenu page for services.
 */
function guardexpert_services_reorder_page() {
	add_submenu_page(
		'edit.php?post_type=services',
		'Порядок услуг',
		'Порядок',
		'edit_posts',
		'services-reorder',
		'guardexpert_render_services_reorder'
	);
}
add_action( 'admin_menu', 'guardexpert_services_reorder_page' );

/**
 * Render the reorder page.
 */
function guardexpert_render_services_reorder() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Недостаточно прав' );
	}

	wp_enqueue_script( 'jquery-ui-sortable' );

	$services = get_posts( array(
		'post_type'      => 'services',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	) );
	?>
	<div class="wrap">
		<h1>Порядок услуг</h1>
		<p>Перетащите услуги для изменения порядка отображения на сайте.</p>

		<?php if ( isset( $_GET['updated'] ) ) : ?>
		<div class="notice notice-success is-dismissible"><p>Порядок сохранён.</p></div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<?php wp_nonce_field( 'services_reorder', 'services_reorder_nonce' ); ?>
			<input type="hidden" name="action" value="save_services_order">

			<ul id="services-sortable" class="bg-white border border-gray-300 rounded">
				<?php foreach ( $services as $service ) : ?>
				<li class="flex items-center gap-3 p-4 border-b border-gray-200 last:border-0 cursor-move" data-id="<?php echo esc_attr( $service->ID ); ?>">
					<span class="dashicons dashicons-menu text-gray-400"></span>
					<span class="font-medium"><?php echo esc_html( $service->post_title ); ?></span>
				</li>
				<?php endforeach; ?>
			</ul>

			<input type="hidden" name="services_order" id="services-order" value="">
			<p class="submit">
				<button type="submit" class="button button-primary">Сохранить порядок</button>
			</p>
		</form>
	</div>

	<style>
		#services-sortable li:hover { background: #f0f0f1; }
		#services-sortable li.ui-sortable-helper { background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
	</style>

	<script>
	jQuery( function( $ ) {
		$( '#services-sortable' ).sortable( {
			axis: 'y',
			update: function() {
				var ids = [];
				$( '#services-sortable li' ).each( function() {
					ids.push( $( this ).data( 'id' ) );
				} );
				$( '#services-order' ).val( ids.join( ',' ) );
			}
		} );
	} );
	</script>
	<?php
}

/**
 * Save the reordered services.
 */
function guardexpert_save_services_order() {
	if ( ! isset( $_POST['services_reorder_nonce'] ) || ! wp_verify_nonce( $_POST['services_reorder_nonce'], 'services_reorder' ) ) {
		wp_die( 'Ошибка безопасности' );
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Недостаточно прав' );
	}

	if ( empty( $_POST['services_order'] ) ) {
		wp_redirect( admin_url( 'edit.php?post_type=services&page=services-reorder' ) );
		exit;
	}

	$ids = explode( ',', $_POST['services_order'] );

	foreach ( $ids as $index => $id ) {
		wp_update_post( array(
			'ID'         => intval( $id ),
			'menu_order' => $index + 1,
		) );
	}

	wp_redirect( admin_url( 'edit.php?post_type=services&page=services-reorder&updated=1' ) );
	exit;
}
add_action( 'admin_post_save_services_order', 'guardexpert_save_services_order' );

/**
 * Allow admins to flush rewrite rules manually via URL:
 * example.com/?guardexpert_flush_rewrites=1 (must be logged in as admin).
 */
function guardexpert_manual_flush_rewrites() {
	if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['guardexpert_flush_rewrites'] ) && '1' === $_GET['guardexpert_flush_rewrites'] ) {
		flush_rewrite_rules( true );
		$redirect = remove_query_arg( 'guardexpert_flush_rewrites' );
		if ( ! $redirect ) {
			$redirect = home_url( '/' );
		}
		wp_safe_redirect( $redirect );
		exit;
	}
}
add_action( 'init', 'guardexpert_manual_flush_rewrites' );

/**
 * One-time automatic rewrite flush to ensure WooCommerce taxonomies work.
 */
function guardexpert_maybe_flush_rewrites() {
	$flushed = get_option( 'guardexpert_rewrites_v2_flushed' );
	if ( ! $flushed ) {
		flush_rewrite_rules( true );
		update_option( 'guardexpert_rewrites_v2_flushed', 1 );
	}
}
add_action( 'init', 'guardexpert_maybe_flush_rewrites', 99 );

/**
 * Force the taxonomy template for product categories as a safety net.
 */
function guardexpert_force_taxonomy_template( $template ) {
	if ( is_tax( 'product_cat' ) ) {
		$theme_template = locate_template( array( 'taxonomy-product_cat.php', 'taxonomy.php' ) );
		if ( ! empty( $theme_template ) ) {
			return $theme_template;
		}
	}

	if ( ! empty( $_GET['static_product'] ) ) {
		$theme_template = locate_template( array( 'woocommerce/single-product.php' ) );
		if ( ! empty( $theme_template ) ) {
			return $theme_template;
		}
	}

	return $template;
}
add_filter( 'template_include', 'guardexpert_force_taxonomy_template', 99 );

/**
 * Admin notice instructing to flush permalinks for category archives to work.
 */
function guardexpert_permalink_flush_notice() {
	$permalinks = get_option( 'permalink_structure' );
	$flushed    = get_option( 'guardexpert_rewrites_flushed' );
	$screen     = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if ( ! $screen || $screen->id === 'settings_page_permalinks' ) {
		return;
	}

	$flush_url = admin_url( 'admin.php?page=guardexpert-flush' );
	$perma_url = admin_url( 'options-permalink.php' );

	if ( empty( $permalinks ) ) {
		echo '<div class="notice notice-error"><p><strong>Guardexpert:</strong> ';
		echo wp_kses(
			sprintf(
				/* translators: %s: permalink settings URL */
				__( 'Чтобы ссылки на категории товаров работали, перейдите в <a href="%s">Настройки → Постоянные ссылки</a> и выберите «Название записи».', 'guardexpert' ),
				esc_url( $perma_url )
			),
			array( 'a' => array( 'href' => array() ) )
		);
		echo '</p></div>';
		return;
	}

	if ( ! $flushed ) {
		echo '<div class="notice notice-warning"><p><strong>Guardexpert:</strong> ';
		echo esc_html__( 'Нажмите кнопку ниже один раз, чтобы обновить правила постоянных ссылок и активировать страницы категорий.', 'guardexpert' );
		echo ' <a href="' . esc_url( $flush_url ) . '" class="button button-primary">' . esc_html__( 'Обновить постоянные ссылки', 'guardexpert' ) . '</a>';
		echo '</p></div>';
	}
}
add_action( 'admin_notices', 'guardexpert_permalink_flush_notice' );

/**
 * Admin page for one-click rewrite flush.
 */
function guardexpert_register_flush_page() {
	add_menu_page(
		__( 'Guardexpert: Сброс ссылок', 'guardexpert' ),
		__( 'Сброс ссылок', 'guardexpert' ),
		'manage_options',
		'guardexpert-flush',
		'guardexpert_render_flush_page',
		'dashicons-update',
		100
	);
}
add_action( 'admin_menu', 'guardexpert_register_flush_page' );

function guardexpert_render_flush_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$flushed_now = false;
	if ( isset( $_POST['guardexpert_flush_action'] ) && check_admin_referer( 'guardexpert_flush_action' ) ) {
		flush_rewrite_rules( true );
		update_option( 'guardexpert_rewrites_flushed', 1 );
		$flushed_now = true;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Сброс правил постоянных ссылок', 'guardexpert' ); ?></h1>
		<?php if ( $flushed_now ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php esc_html_e( 'Правила обновлены. Теперь страницы категорий должны открываться корректно.', 'guardexpert' ); ?></p></div>
		<?php endif; ?>
		<p><?php esc_html_e( 'Если страницы категорий товаров не открываются или показывают главную — нажмите кнопку ниже, чтобы обновить правила перезаписи URL.', 'guardexpert' ); ?></p>
		<form method="post">
			<?php wp_nonce_field( 'guardexpert_flush_action' ); ?>
			<input type="hidden" name="guardexpert_flush_action" value="1">
			<button type="submit" class="button button-primary button-large"><?php esc_html_e( 'Обновить правила', 'guardexpert' ); ?></button>
		</form>
	</div>
	<?php
}

/**
 * Register ACF fields for Services post type
 */
add_action( 'acf/include_fields', 'guardexpert_register_service_fields' );
function guardexpert_register_service_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_service_fields',
		'title'    => 'Данные услуги',
		'fields'   => array(
			array(
				'key'   => 'field_service_hero_title',
				'label' => 'Заголовок (Hero)',
				'name'  => 'service_hero_title',
				'type'  => 'text',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_service_hero_description',
				'label' => 'Описание (Hero)',
				'name'  => 'service_hero_description',
				'type'  => 'textarea',
				'wrapper' => array( 'width' => '50' ),
				'rows'  => 4,
			),
			array(
				'key'   => 'field_service_hero_image',
				'label' => 'Изображение (Hero)',
				'name'  => 'service_hero_image',
				'type'  => 'image',
				'return_format' => 'url',
			),
			array(
				'key'   => 'field_service_hero_bg',
				'label' => 'Фоновое изображение (Hero)',
				'name'  => 'service_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
			),
			array(
				'key'   => 'field_service_hero_button_text',
				'label' => 'Текст кнопки',
				'name'  => 'service_hero_button_text',
				'type'  => 'text',
				'default_value' => 'Получить консультацию',
			),
			array(
				'key'   => 'field_service_card_icon',
				'label' => 'Иконка на карточке',
				'name'  => 'service_card_icon',
				'type'  => 'image',
				'return_format' => 'url',
				'instructions' => 'Изображение-иконка для карточки услуги на главной странице',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'      => 'field_service_features',
				'label'    => 'Преимущества (Features Bar)',
				'name'     => 'service_features',
				'type'     => 'repeater',
				'max'      => 4,
				'button_label' => 'Добавить преимущество',
				'sub_fields' => array(
					array(
						'key'   => 'field_service_feature_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
					),
					array(
						'key'   => 'field_service_feature_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_feature_subtitle',
						'label' => 'Подзаголовок',
						'name'  => 'subtitle',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_service_about_title',
				'label' => 'Заголовок секции',
				'name'  => 'service_about_title',
				'type'  => 'text',
				'default_value' => 'Об услуге',
			),
			array(
				'key'   => 'field_service_about_content',
				'label' => 'Содержание',
				'name'  => 'service_about_content',
				'type'  => 'wysiwyg',
				'toolbar' => 'basic',
			),
			array(
				'key'   => 'field_service_about_image',
				'label' => 'Изображение',
				'name'  => 'service_about_image',
				'type'  => 'image',
				'return_format' => 'url',
			),
			array(
				'key'   => 'field_service_audience_title',
				'label' => 'Заголовок секции',
				'name'  => 'service_audience_title',
				'type'  => 'text',
				'default_value' => 'Для кого подойдут наши услуги',
			),
			array(
				'key'   => 'field_service_audience_content',
				'label' => 'Подзаголовок секции',
				'name'  => 'service_audience_content',
				'type'  => 'textarea',
				'rows' => 2,
			),
			array(
				'key'      => 'field_service_audience_items',
				'label'    => 'Элементы',
				'name'     => 'service_audience_items',
				'type'     => 'repeater',
				'max'      => 4,
				'button_label' => 'Добавить элемент',
				'sub_fields' => array(
					array(
						'key'   => 'field_service_audience_item_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
					),
					array(
						'key'   => 'field_service_audience_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_audience_item_text',
						'label' => 'Текст',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows' => 3,
					),
				),
			),
			array(
				'key'   => 'field_service_when_title',
				'label' => 'Заголовок секции',
				'name'  => 'service_when_title',
				'type'  => 'text',
				'default_value' => 'Когда нужна услуга',
			),
			array(
				'key'   => 'field_service_when_content',
				'label' => 'Подзаголовок секции',
				'name'  => 'service_when_content',
				'type'  => 'textarea',
				'rows' => 2,
			),
			array(
				'key'      => 'field_service_when_items',
				'label'    => 'Сценарии',
				'name'     => 'service_when_items',
				'type'     => 'repeater',
				'max'      => 4,
				'button_label' => 'Добавить сценарий',
				'sub_fields' => array(
					array(
						'key'   => 'field_service_when_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_when_item_text',
						'label' => 'Текст',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows' => 3,
					),
				),
			),
			array(
				'key'   => 'field_service_steps_title',
				'label' => 'Заголовок секции',
				'name'  => 'service_steps_title',
				'type'  => 'text',
				'default_value' => 'Как строится работа',
			),
			array(
				'key'   => 'field_service_steps_content',
				'label' => 'Подзаголовок секции',
				'name'  => 'service_steps_content',
				'type'  => 'textarea',
				'rows' => 2,
			),
			array(
				'key'      => 'field_service_steps',
				'label'    => 'Этапы',
				'name'     => 'service_steps',
				'type'     => 'repeater',
				'max'      => 5,
				'button_label' => 'Добавить этап',
				'sub_fields' => array(
					array(
						'key'   => 'field_service_step_number',
						'label' => 'Номер',
						'name'  => 'number',
						'type'  => 'number',
						'min' => 1,
						'max' => 5,
					),
					array(
						'key'   => 'field_service_step_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
					),
					array(
						'key'   => 'field_service_step_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_step_text',
						'label' => 'Текст',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows' => 3,
					),
				),
			),
			array(
				'key'   => 'field_service_why_title',
				'label' => 'Заголовок секции',
				'name'  => 'service_why_title',
				'type'  => 'text',
				'default_value' => 'Почему это удобно для клиента',
			),
			array(
				'key'   => 'field_service_why_content',
				'label' => 'Подзаголовок секции',
				'name'  => 'service_why_content',
				'type'  => 'textarea',
				'rows' => 2,
			),
			array(
				'key'      => 'field_service_why_items',
				'label'    => 'Пункты',
				'name'     => 'service_why_items',
				'type'     => 'repeater',
				'max'      => 3,
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key'   => 'field_service_why_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_service_why_item_text',
						'label' => 'Текст',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows' => 3,
					),
				),
			),
			array(
				'key'   => 'field_service_why_large_text',
				'label' => 'Текст большой карточки',
				'name'  => 'service_why_large_text',
				'type'  => 'wysiwyg',
				'toolbar' => 'basic',
			),
			array(
				'key'   => 'field_service_stats_tab',
				'label' => 'Статистика',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'      => 'field_service_stats_items',
				'label'    => 'Пункты статистики',
				'name'     => 'service_stats_items',
				'type'     => 'repeater',
				'layout'   => 'table',
				'button_label' => 'Добавить пункт',
				'min'      => 1,
				'max'      => 4,
				'sub_fields' => array(
					array(
						'key'   => 'field_service_stats_item_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
					),
					array(
						'key'   => 'field_service_stats_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_service_bottom_button',
				'label' => 'Текст нижней кнопки',
				'name'  => 'service_bottom_button',
				'type'  => 'text',
				'default_value' => 'Получить консультацию',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'services',
				),
			),
		),
	) );
}

/**
 * Register ACF fields for Front Page (home page)
 * Fields are registered WITHOUT location — rendered manually via custom meta box
 */
add_action( 'acf/include_fields', 'guardexpert_register_page_fields' );
function guardexpert_register_page_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_page_fields',
		'title'    => 'Данные страницы',
		'fields'   => array(

			// ===== Tab: Hero Section =====
			array(
				'key'   => 'field_front_hero_tab',
				'label' => 'Шапка (Hero)',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_front_hero_title',
				'label' => 'Заголовок',
				'name'  => 'front_hero_title',
				'type'  => 'text',
				'default_value' => 'Оборудование систем безопасности для бизнеса и объектов по всей Беларуси',
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'   => 'field_front_hero_description',
				'label' => 'Описание',
				'name'  => 'front_hero_description',
				'type'  => 'textarea',
				'default_value' => 'Поставка оборудования для ОПС, СКУД и видеонаблюдения. Помогаем подобрать решения под объект, задачи и совместимость оборудования.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '70' ),
			),
			array(
				'key'   => 'field_front_hero_image',
				'label' => 'Изображение (десктоп)',
				'name'  => 'front_hero_image',
				'type'  => 'image',
				'return_format' => 'url',
				'instructions' => 'Основное изображение в шапке (десктоп)',
				'wrapper' => array( 'width' => '30' ),
			),
			array(
				'key'   => 'field_front_hero_image_mobile',
				'label' => 'Изображение (мобильное)',
				'name'  => 'front_hero_image_mobile',
				'type'  => 'image',
				'return_format' => 'url',
				'instructions' => 'Изображение для мобильных устройств',
				'wrapper' => array( 'width' => '30' ),
			),
			array(
				'key'   => 'field_front_hero_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'front_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'instructions' => 'Фоновое изображение для секции Hero',
				'wrapper' => array( 'width' => '30' ),
			),

			// ===== Tab: Why Choose Us =====
			array(
				'key'   => 'field_front_why_tab',
				'label' => 'Почему выбирают Гардэксперт',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_front_why_title',
				'label' => 'Заголовок секции',
				'name'  => 'front_why_title',
				'type'  => 'text',
				'default_value' => 'Почему выбирают Гардэксперт',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_why_description',
				'label' => 'Описание секции',
				'name'  => 'front_why_description',
				'type'  => 'textarea',
				'default_value' => 'Надежная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'      => 'field_front_why_features',
				'label'    => 'Преимущества',
				'name'     => 'front_why_features',
				'type'     => 'repeater',
				'max'      => 6,
				'button_label' => 'Добавить преимущество',
				'layout'   => 'block',
				'sub_fields' => array(
					array(
						'key'   => 'field_front_why_feature_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG)',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'   => 'field_front_why_feature_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
						'wrapper' => array( 'width' => '70' ),
					),
					array(
						'key'   => 'field_front_why_feature_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),

			// ===== Tab: Services Section =====
			array(
				'key'   => 'field_front_services_tab',
				'label' => 'Основные услуги',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_front_services_title',
				'label' => 'Заголовок секции',
				'name'  => 'front_services_title',
				'type'  => 'text',
				'default_value' => 'Основные услуги',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_services_description',
				'label' => 'Описание секции',
				'name'  => 'front_services_description',
				'type'  => 'textarea',
				'default_value' => 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_services_big_image',
				'label' => 'Большая карточка — изображение',
				'name'  => 'front_services_big_image',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_services_big_title',
				'label' => 'Большая карточка — заголовок',
				'name'  => 'front_services_big_title',
				'type'  => 'text',
				'default_value' => 'Комплексный подход к объекту',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_services_big_description',
				'label' => 'Большая карточка — описание',
				'name'  => 'front_services_big_description',
				'type'  => 'textarea',
				'default_value' => 'Подбираем оборудование, помогаем с проектированием, внедрением и дальнейшим сопровождением систем безопасности под задачи бизнеса и объекта.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_services_big_button',
				'label' => 'Большая карточка — текст кнопки',
				'name'  => 'front_services_big_button',
				'type'  => 'text',
				'default_value' => 'Получить консультацию',
				'wrapper' => array( 'width' => '50' ),
			),

			// ===== Tab: Certificates Section =====
			array(
				'key'   => 'field_front_certificates_tab',
				'label' => 'Сертификаты и документы',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_front_certificates_title',
				'label' => 'Заголовок секции',
				'name'  => 'front_certificates_title',
				'type'  => 'text',
				'default_value' => 'Сертификаты и документы',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_certificates_description',
				'label' => 'Описание секции',
				'name'  => 'front_certificates_description',
				'type'  => 'textarea',
				'default_value' => 'Подтверждающие материалы, сопроводительная документация и документы, которые помогают работать с оборудованием уверенно и прозрачно.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '50' ),
			),

			// ===== Tab: Contact Form =====
			array(
				'key'   => 'field_front_form_tab',
				'label' => 'Форма обратной связи',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_front_form_title',
				'label' => 'Заголовок секции',
				'name'  => 'front_form_title',
				'type'  => 'text',
				'default_value' => 'Подберем оборудование под вашу задачу',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_form_description',
				'label' => 'Описание секции',
				'name'  => 'front_form_description',
				'type'  => 'textarea',
				'default_value' => 'Поможем с выбором оборудования для ОПС, СКУД и видеонаблюдения, проконсультируем по совместимости и поставке по Беларуси.',
				'rows'  => 3,
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_front_form_form_title',
				'label' => 'Заголовок формы',
				'name'  => 'front_form_form_title',
				'type'  => 'text',
				'default_value' => 'Оставьте заявку',
				'wrapper' => array( 'width' => '33' ),
			),
			array(
				'key'   => 'field_front_form_form_description',
				'label' => 'Описание формы',
				'name'  => 'front_form_form_description',
				'type'  => 'textarea',
				'default_value' => 'Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.',
				'rows'  => 2,
				'wrapper' => array( 'width' => '33' ),
			),
			array(
				'key'   => 'field_front_form_success_text',
				'label' => 'Текст после отправки',
				'name'  => 'front_form_success_text',
				'type'  => 'text',
				'default_value' => 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.',
				'wrapper' => array( 'width' => '33' ),
			),
			array(
				'key'   => 'field_front_form_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'front_form_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'instructions' => 'Фоновое изображение для секции формы',
				'wrapper' => array( 'width' => '33' ),
			),
		),
	) );
}

/**
 * Determine which field group to show for a given page
 */
function guardexpert_get_page_field_group( $post_id ) {
	$template      = get_page_template_slug( $post_id );
	$front_page_id = (int) get_option( 'page_on_front' );

	if ( $post_id === $front_page_id ) {
		return 'group_page_fields';
	}

	$template_map = array(
		'about.php'    => 'group_about_fields',
		'services.php' => 'group_services_fields',
		'shipping.php' => 'group_shipping_fields',
		'returns.php'  => 'group_returns_fields',
		'catalog.php'  => 'group_catalog_fields',
		'contact.php'  => 'group_contact_fields',
	);

	return isset( $template_map[ $template ] ) ? $template_map[ $template ] : null;
}

/**
 * Register custom meta box for page fields (template-aware)
 */
add_action( 'add_meta_boxes', 'guardexpert_add_page_metabox' );
function guardexpert_add_page_metabox() {
	add_meta_box(
		'page_fields_metabox',
		'Данные страницы',
		'guardexpert_render_page_metabox',
		'page',
		'normal',
		'high'
	);
}

function guardexpert_render_page_metabox( $post ) {
	$group_key = guardexpert_get_page_field_group( $post->ID );

	if ( ! $group_key ) {
		echo '<p>Для этой страницы нет кастомных полей.</p>';
		return;
	}

	$field_group = acf_get_field_group( $group_key );
	if ( ! $field_group ) {
		echo '<p>Группа полей не найдена.</p>';
		return;
	}

	$fields = acf_get_fields( $field_group );
	if ( empty( $fields ) ) {
		echo '<p>Поля не найдены.</p>';
		return;
	}

	acf_form_data( array(
		'post_id' => $post->ID,
	) );

	acf_render_fields( $fields, $post->ID );
}

/**
 * Register ACF fields for About page
 */
add_action( 'acf/include_fields', 'guardexpert_register_about_fields' );
function guardexpert_register_about_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_about_fields',
		'title'  => 'Данные страницы About',
		'fields' => array(
			array(
				'key'   => 'field_about_hero_tab',
				'label' => 'Шапка (Hero)',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_about_hero_title',
				'label' => 'Заголовок',
				'name'  => 'about_hero_title',
				'type'  => 'text',
				'default_value' => 'Гардэкспер - поставка оборудования и экспертная поддержка для систем безопасности',
			),
			array(
				'key'   => 'field_about_hero_description',
				'label' => 'Описание',
				'name'  => 'about_hero_description',
				'type'  => 'textarea',
				'default_value' => 'С 2012 года работаем в сфере систем безопасности, поставляем оборудование для ОПС, СКУД и видеонаблюдения, консультируем по подбору, совместимости и сопровождению решений для бизнеса и объектов по всей Беларуси.',
			),
			array(
				'key'   => 'field_about_hero_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'about_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
			),

			array(
				'key'   => 'field_about_stats_tab',
				'label' => 'Полоса статистики',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_about_stats_items',
				'label'        => 'Элементы',
				'name'         => 'about_stats_items',
				'type'         => 'repeater',
				'max'          => 4,
				'button_label' => 'Добавить элемент',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_about_stats_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_about_stats_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
				),
			),

			array(
				'key'   => 'field_about_sections_tab',
				'label' => 'Основные секции',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_about_who_title',
				'label' => 'Кто мы — заголовок',
				'name'  => 'about_who_title',
				'type'  => 'text',
				'default_value' => 'Кто мы?',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_who_description',
				'label' => 'Кто мы — описание',
				'name'  => 'about_who_description',
				'type'  => 'textarea',
				'default_value' => 'Гардэксперт — компания в сфере систем безопасности и поставок оборудования для объектов различного назначения. Мы помогаем клиентам подобрать оборудование под задачу, консультируем по характеристикам и совместимости, а при необходимости подключаем проектирование, монтаж, пусконаладку, обслуживание и модернизацию.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_about_who_image',
				'label'        => 'Кто мы — изображение',
				'name'         => 'about_who_image',
				'type'         => 'image',
				'return_format' => 'url',
				'instructions' => 'Изображение для секции «Кто мы». Если не загружено — используется изображение по умолчанию.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_why_title',
				'label' => 'Почему выбирают — заголовок',
				'name'  => 'about_why_title',
				'type'  => 'text',
				'default_value' => 'Почему выбирают Гардэксперт',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_why_description',
				'label' => 'Почему выбирают — описание',
				'name'  => 'about_why_description',
				'type'  => 'textarea',
				'default_value' => 'Надёжная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_about_why_items',
				'label'        => 'Карточки',
				'name'         => 'about_why_items',
				'type'         => 'repeater',
				'max'          => 6,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_about_why_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_about_why_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_about_why_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'   => 'field_about_what_title',
				'label' => 'Чем занимаемся — заголовок',
				'name'  => 'about_what_title',
				'type'  => 'text',
				'default_value' => 'Чем мы занимаемся',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_what_description',
				'label' => 'Чем занимаемся — описание',
				'name'  => 'about_what_description',
				'type'  => 'textarea',
				'default_value' => 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_about_what_big_image',
				'label'        => 'Большая карточка — изображение',
				'name'         => 'about_what_big_image',
				'type'         => 'image',
				'return_format' => 'url',
				'instructions' => 'Изображение для большой карточки «Поставка оборудования».',
			),
			array(
				'key'          => 'field_about_what_items',
				'label'        => 'Маленькие карточки',
				'name'         => 'about_what_items',
				'type'         => 'repeater',
				'max'          => 5,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_about_what_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_about_what_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_about_what_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'   => 'field_about_work_with_title',
				'label' => 'С кем работаем — заголовок',
				'name'  => 'about_work_with_title',
				'type'  => 'text',
				'default_value' => 'С кем мы работаем',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_work_with_description',
				'label' => 'С кем работаем — описание',
				'name'  => 'about_work_with_description',
				'type'  => 'textarea',
				'default_value' => 'Подбираем оборудование и сопровождаем поставки для компаний, монтажных организаций и объектов разного масштаба по всей Беларуси.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_about_work_with_items',
				'label'        => 'Карточки',
				'name'         => 'about_work_with_items',
				'type'         => 'repeater',
				'max'          => 4,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_about_work_with_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_about_work_with_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_about_work_with_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'   => 'field_about_work_title',
				'label' => 'Как строится работа — заголовок',
				'name'  => 'about_work_title',
				'type'  => 'text',
				'default_value' => 'Как строится работа',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_work_description',
				'label' => 'Как строится работа — описание',
				'name'  => 'about_work_description',
				'type'  => 'textarea',
				'default_value' => 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_about_work_items',
				'label'        => 'Этапы',
				'name'         => 'about_work_items',
				'type'         => 'repeater',
				'max'          => 5,
				'button_label' => 'Добавить этап',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_about_work_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_about_work_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_about_work_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),

			array(
				'key'   => 'field_about_certificates_tab',
				'label' => 'Сертификаты',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_about_cert_title',
				'label' => 'Сертификаты — заголовок',
				'name'  => 'about_cert_title',
				'type'  => 'text',
				'default_value' => 'Сертификаты и документы',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_about_cert_description',
				'label' => 'Сертификаты — описание',
				'name'  => 'about_cert_description',
				'type'  => 'textarea',
				'default_value' => 'Подтверждающие материалы, сопроводительная документация и документы, которые помогают работать с оборудованием уверенно и прозрачно.',
				'wrapper' => array( 'width' => '50' ),
			),
		),
	) );
}

/**
 * Register ACF fields for Services page
 */
add_action( 'acf/include_fields', 'guardexpert_register_services_fields' );
function guardexpert_register_services_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_services_fields',
		'title'  => 'Данные страницы Services',
		'fields' => array(
			array(
				'key'   => 'field_services_hero_tab',
				'label' => 'Шапка (Hero)',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_services_hero_title',
				'label' => 'Заголовок',
				'name'  => 'services_hero_title',
				'type'  => 'text',
				'default_value' => 'Поддержка, внедрение и сопровождение систем безопасности',
			),
			array(
				'key'   => 'field_services_hero_description',
				'label' => 'Описание',
				'name'  => 'services_hero_description',
				'type'  => 'textarea',
				'default_value' => 'Помогаем не только с поставкой оборудования, но и с подбором решений, проектированием, монтажом, пусконаладкой, обслуживанием и модернизацией систем безопасности для бизнеса и объектов по всей Беларуси.',
			),
			array(
				'key'   => 'field_services_hero_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'services_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
			),

			array(
				'key'   => 'field_services_main_tab',
				'label' => 'Основные секции',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_services_main_title',
				'label' => 'Основные услуги — заголовок',
				'name'  => 'services_main_title',
				'type'  => 'text',
				'default_value' => 'Основные услуги',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_services_main_description',
				'label' => 'Основные услуги — описание',
				'name'  => 'services_main_description',
				'type'  => 'textarea',
				'default_value' => 'Поставляем оборудование систем безопасности и помогаем подобрать, внедрить и сопровождать решения под задачи бизнеса и объекта.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_services_audience_title',
				'label' => 'Для кого подойдут — заголовок',
				'name'  => 'services_audience_title',
				'type'  => 'text',
				'default_value' => 'Для кого подойдут наши услуги',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_services_audience_description',
				'label' => 'Для кого подойдут — описание',
				'name'  => 'services_audience_description',
				'type'  => 'textarea',
				'default_value' => 'Подбираем оборудование и сопровождаем поставки для компаний, монтажных организаций и объектов разного масштаба по всей Беларуси.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_services_audience_items',
				'label'        => 'Карточки',
				'name'         => 'services_audience_items',
				'type'         => 'repeater',
				'max'          => 4,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_services_audience_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_services_audience_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_services_audience_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),

			array(
				'key'   => 'field_services_stats_tab',
				'label' => 'Полоса статистики',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_services_stats_items',
				'label'        => 'Элементы',
				'name'         => 'services_stats_items',
				'type'         => 'repeater',
				'max'          => 4,
				'button_label' => 'Добавить элемент',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_services_stats_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_services_stats_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
				),
			),

			array(
				'key'   => 'field_services_additional_tab',
				'label' => 'Дополнительно',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_services_work_title',
				'label' => 'Как строится работа — заголовок',
				'name'  => 'services_work_title',
				'type'  => 'text',
				'default_value' => 'Как строится работа',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_services_work_description',
				'label' => 'Как строится работа — описание',
				'name'  => 'services_work_description',
				'type'  => 'textarea',
				'default_value' => 'Выстраиваем работу последовательно: от запроса и подбора оборудования до поставки и дальнейшего сопровождения.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_services_work_items',
				'label'        => 'Этапы',
				'name'         => 'services_work_items',
				'type'         => 'repeater',
				'max'          => 5,
				'button_label' => 'Добавить этап',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_services_work_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_services_work_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_services_work_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'   => 'field_services_trust_title',
				'label' => 'Почему нам доверяют — заголовок',
				'name'  => 'services_trust_title',
				'type'  => 'text',
				'default_value' => 'Почему нам доверяют выполнение задач',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_services_trust_description',
				'label' => 'Почему нам доверяют — описание',
				'name'  => 'services_trust_description',
				'type'  => 'textarea',
				'default_value' => 'Надёжная поставка оборудования систем безопасности, профессиональная консультация и поддержка для бизнеса, монтажных организаций и объектов по всей Беларуси.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_services_trust_items',
				'label'        => 'Карточки',
				'name'         => 'services_trust_items',
				'type'         => 'repeater',
				'max'          => 6,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_services_trust_item_icon',
						'label'        => 'Иконка',
						'name'         => 'icon',
						'type'         => 'image',
						'return_format' => 'url',
						'instructions' => 'Загрузите иконку (PNG или SVG). Если не загружена — используется Lucide-иконка по умолчанию.',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'   => 'field_services_trust_item_title',
						'label' => 'Заголовок',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_services_trust_item_description',
						'label' => 'Описание',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
		),
	) );
}

/**
 * Register ACF fields for Shipping page
 */
add_action( 'acf/include_fields', 'guardexpert_register_shipping_fields' );
function guardexpert_register_shipping_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_shipping_fields',
		'title'  => 'Данные страницы Shipping',
		'fields' => array(
			array(
				'key'   => 'field_shipping_hero_tab',
				'label' => 'Шапка (Hero)',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_shipping_hero_title',
				'label' => 'Заголовок',
				'name'  => 'shipping_hero_title',
				'type'  => 'text',
				'default_value' => 'Оплата и доставка',
			),
			array(
				'key'   => 'field_shipping_hero_description',
				'label' => 'Описание',
				'name'  => 'shipping_hero_description',
				'type'  => 'textarea',
				'default_value' => 'На этой странице собрана основная информация о способах оплаты, условиях поставки и порядке согласования доставки. Если у вас остались вопросы по конкретному заказу, свяжитесь с нами — поможем уточнить детали.',
			),
			array(
				'key'   => 'field_shipping_hero_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'shipping_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
			),

			array(
				'key'   => 'field_shipping_sections_tab',
				'label' => 'Секции',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_shipping_payment_title',
				'label' => 'Способы оплаты — заголовок',
				'name'  => 'shipping_payment_title',
				'type'  => 'text',
				'default_value' => 'Способы оплаты',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_shipping_delivery_title',
				'label' => 'Условия доставки — заголовок',
				'name'  => 'shipping_delivery_title',
				'type'  => 'text',
				'default_value' => 'Условия доставки',
				'wrapper' => array( 'width' => '50' ),
			),

			array(
				'key'   => 'field_shipping_process_tab',
				'label' => 'Процесс и FAQ',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_shipping_process_title',
				'label' => 'Как происходит оформление — заголовок',
				'name'  => 'shipping_process_title',
				'type'  => 'text',
				'default_value' => 'Как происходит оформление и поставка',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_shipping_process_description',
				'label' => 'Как происходит оформление — описание',
				'name'  => 'shipping_process_description',
				'type'  => 'textarea',
				'default_value' => 'Выстроили процесс так, чтобы заказ был понятным и удобным: от выбора оборудования и согласования деталей до поставки на объект.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_shipping_faq_title',
				'label' => 'Частые вопросы — заголовок',
				'name'  => 'shipping_faq_title',
				'type'  => 'text',
				'default_value' => 'Частые вопросы',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_shipping_faq_description',
				'label' => 'Частые вопросы — описание',
				'name'  => 'shipping_faq_description',
				'type'  => 'textarea',
				'default_value' => 'Собрали ответы на основные вопросы по оформлению заказа, оплате и условиям поставки. Если нужной информации нет в списке, свяжитесь с нами — поможем уточнить детали.',
				'wrapper' => array( 'width' => '50' ),
			),
		),
	) );
}

/**
 * Register ACF fields for Returns page
 */
add_action( 'acf/include_fields', 'guardexpert_register_returns_fields' );
function guardexpert_register_returns_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_returns_fields',
		'title'  => 'Данные страницы Returns',
		'fields' => array(
			array(
				'key'   => 'field_returns_hero_tab',
				'label' => 'Шапка (Hero)',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_returns_hero_title',
				'label' => 'Заголовок',
				'name'  => 'returns_hero_title',
				'type'  => 'text',
				'default_value' => 'Возврат и обмен',
			),
			array(
				'key'   => 'field_returns_hero_description',
				'label' => 'Описание',
				'name'  => 'returns_hero_description',
				'type'  => 'textarea',
				'default_value' => 'На этой странице собрана основная информация о порядке возврата и обмена товара. Если у вас остались вопросы по конкретной позиции или условиям поставки, свяжитесь с нами — поможем уточнить детали.',
			),
			array(
				'key'   => 'field_returns_hero_bg',
				'label' => 'Фоновое изображение',
				'name'  => 'returns_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_hero_bg_mobile',
				'label' => 'Фоновое изображение (мобилка)',
				'name'  => 'returns_hero_bg_mobile',
				'type'  => 'image',
				'return_format' => 'url',
				'wrapper' => array( 'width' => '50' ),
				'instructions' => 'Отображается на экранах менее 768px. Если не загружено — используется основное фоновое изображение.',
			),

			array(
				'key'   => 'field_returns_sections_tab',
				'label' => 'Основные секции',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_returns_important_title',
				'label' => 'Что важно знать — заголовок',
				'name'  => 'returns_important_title',
				'type'  => 'text',
				'default_value' => 'Что важно знать',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_important_description',
				'label' => 'Что важно знать — описание',
				'name'  => 'returns_important_description',
				'type'  => 'textarea',
				'default_value' => 'Условия возврата и обмена зависят от состояния товара, его комплектности, сохранности упаковки и характера поставки. Для уточнения деталей по конкретному заказу рекомендуем связаться с нами до оформления возврата.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_terms_title',
				'label' => 'Условия возврата — заголовок',
				'name'  => 'returns_terms_title',
				'type'  => 'text',
				'default_value' => 'Условия возврата и обмена',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_returns_terms_cards',
				'label'        => 'Карточки условий',
				'name'         => 'returns_terms_cards',
				'type'         => 'repeater',
				'max'          => 4,
				'button_label' => 'Добавить карточку',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'   => 'field_returns_card_title',
						'label' => 'Заголовок',
						'name'  => 'card_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_returns_card_description',
						'label' => 'Описание',
						'name'  => 'card_description',
						'type'  => 'textarea',
						'rows'  => 4,
					),
				),
			),

			array(
				'key'   => 'field_returns_process_tab',
				'label' => 'Процесс и FAQ',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_returns_process_title',
				'label' => 'Как происходит возврат — заголовок',
				'name'  => 'returns_process_title',
				'type'  => 'text',
				'default_value' => 'Как происходит возврат и обмен',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_process_description',
				'label' => 'Как происходит возврат — описание',
				'name'  => 'returns_process_description',
				'type'  => 'textarea',
				'default_value' => 'Если у вас возник вопрос по возврату или обмену товара, рекомендуем предварительно связаться с нами. Мы поможем уточнить порядок действий по конкретной позиции, комплектности и условиям поставки.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_returns_process_cards',
				'label'        => 'Шаги процесса',
				'name'         => 'returns_process_cards',
				'type'         => 'repeater',
				'max'          => 5,
				'button_label' => 'Добавить шаг',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'          => 'field_returns_step_icon',
						'label'        => 'Иконка',
						'name'         => 'step_icon',
						'type'         => 'image',
						'return_format' => 'url',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
						'instructions' => 'Загрузите SVG-иконку или PNG.',
					),
					array(
						'key'   => 'field_returns_step_title',
						'label' => 'Заголовок',
						'name'  => 'step_title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_returns_step_description',
						'label' => 'Описание',
						'name'  => 'step_description',
						'type'  => 'textarea',
						'rows'  => 4,
					),
				),
			),
			array(
				'key'   => 'field_returns_faq_title',
				'label' => 'Частые вопросы — заголовок',
				'name'  => 'returns_faq_title',
				'type'  => 'text',
				'default_value' => 'Частые вопросы',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_faq_description',
				'label' => 'Частые вопросы — описание',
				'name'  => 'returns_faq_description',
				'type'  => 'textarea',
				'default_value' => 'Собрали ответы на вопросы, которые чаще всего возникают при возврате или обмене товара. Если вашей ситуации нет в списке, свяжитесь с нами — поможем уточнить детали.',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_returns_faq_items',
				'label'        => 'Вопросы и ответы',
				'name'         => 'returns_faq_items',
				'type'         => 'repeater',
				'button_label' => 'Добавить вопрос',
				'layout'       => 'block',
				'sub_fields'   => array(
					array(
						'key'   => 'field_returns_faq_question',
						'label' => 'Вопрос',
						'name'  => 'faq_question',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_returns_faq_answer',
						'label' => 'Ответ',
						'name'  => 'faq_answer',
						'type'  => 'textarea',
						'rows'  => 4,
					),
				),
			),
			array(
				'key'   => 'field_returns_contact_tab',
				'label' => 'Контакты',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_returns_form_title',
				'label' => 'Заголовок',
				'name'  => 'returns_form_title',
				'type'  => 'text',
				'default_value' => 'Подберем оборудование под вашу задачу',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_returns_form_description',
				'label' => 'Описание',
				'name'  => 'returns_form_description',
				'type'  => 'textarea',
				'default_value' => 'Поможем с выбором оборудования для ОПС, СКУД и видеонаблюдения, проконсультируем по совместимости и поставке по Беларуси.',
				'wrapper' => array( 'width' => '50' ),
			),
		),
	) );
}

/**
 * Register ACF fields for Catalog page
 */
add_action( 'acf/include_fields', 'guardexpert_register_catalog_fields' );
function guardexpert_register_catalog_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_catalog_fields',
		'title'  => 'Данные страницы Catalog',
		'fields' => array(
			array(
				'key'   => 'field_catalog_main_tab',
				'label' => 'Основное',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_catalog_title',
				'label' => 'Заголовок страницы',
				'name'  => 'catalog_title',
				'type'  => 'text',
				'default_value' => 'Каталог оборудования',
			),
			array(
				'key'   => 'field_catalog_description',
				'label' => 'Описание страницы',
				'name'  => 'catalog_description',
				'type'  => 'textarea',
				'default_value' => 'Оборудование для ОПС, СКУД, видеонаблюдения и сопутствующих инженерных решений с возможностью подбора под задачу и объект.',
			),

			array(
				'key'   => 'field_catalog_cta_tab',
				'label' => 'Нижний CTA-блок',
				'name'  => '',
				'type'  => 'tab',
				'placement' => 'top',
			),
			array(
				'key'   => 'field_catalog_cta_title',
				'label' => 'Заголовок CTA',
				'name'  => 'catalog_cta_title',
				'type'  => 'text',
				'default_value' => 'Нужна помощь с подбором оборудования?',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_catalog_cta_description',
				'label' => 'Описание CTA',
				'name'  => 'catalog_cta_description',
				'type'  => 'textarea',
				'default_value' => 'Поможем подобрать решение по задаче, совместимости, стоимости и поставке.',
				'wrapper' => array( 'width' => '50' ),
			),
		),
	) );
}

/**
 * Register ACF fields for Contact page
 */
add_action( 'acf/include_fields', 'guardexpert_register_contact_fields' );
function guardexpert_register_contact_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_contact_fields',
		'title'    => 'Данные страницы контактов',
		'fields'   => array(
			array(
				'key'   => 'field_contact_hero_title',
				'label' => 'Заголовок (Hero)',
				'name'  => 'contact_hero_title',
				'type'  => 'text',
				'default_value' => 'Свяжитесь с нами удобным способом',
			),
			array(
				'key'   => 'field_contact_hero_description',
				'label' => 'Описание (Hero)',
				'name'  => 'contact_hero_description',
				'type'  => 'textarea',
				'rows' => 4,
			),
			array(
				'key'   => 'field_contact_hero_image',
				'label' => 'Изображение (Hero)',
				'name'  => 'contact_hero_image',
				'type'  => 'image',
				'return_format' => 'url',
			),
			array(
				'key'   => 'field_contact_hero_bg',
				'label' => 'Фоновое изображение (Hero)',
				'name'  => 'contact_hero_bg',
				'type'  => 'image',
				'return_format' => 'url',
			),
			array(
				'key'   => 'field_contact_hero_button_text',
				'label' => 'Текст кнопки',
				'name'  => 'contact_hero_button_text',
				'type'  => 'text',
				'default_value' => 'Получить консультацию',
			),
			array(
				'key'      => 'field_contact_items',
				'label'    => 'Контакты',
				'name'     => 'contact_items',
				'type'     => 'repeater',
				'max'      => 10,
				'button_label' => 'Добавить контакт',
				'sub_fields' => array(
					array(
						'key'   => 'field_contact_item_icon',
						'label' => 'Иконка',
						'name'  => 'icon',
						'type'  => 'image',
						'return_format' => 'url',
					),
					array(
						'key'   => 'field_contact_item_type',
						'label' => 'Тип',
						'name'  => 'type',
						'type'  => 'select',
						'choices' => array(
							'phone' => 'Телефон',
							'email' => 'Email',
							'address' => 'Адрес',
						),
						'default_value' => 'phone',
					),
					array(
						'key'   => 'field_contact_item_value',
						'label' => 'Значение',
						'name'  => 'value',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_contact_requisites_title',
				'label' => 'Заголовок реквизитов',
				'name'  => 'contact_requisites_title',
				'type'  => 'text',
				'default_value' => 'Реквизиты',
			),
			array(
				'key'      => 'field_contact_requisites_items',
				'label'    => 'Реквизиты',
				'name'     => 'contact_requisites_items',
				'type'     => 'repeater',
				'max'      => 10,
				'button_label' => 'Добавить реквизит',
				'sub_fields' => array(
					array(
						'key'   => 'field_contact_requisites_label',
						'label' => 'Название',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_contact_requisites_value',
						'label' => 'Значение',
						'name'  => 'value',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_contact_form_title',
				'label' => 'Заголовок формы',
				'name'  => 'contact_form_title',
				'type'  => 'text',
				'default_value' => 'Оставьте заявку',
			),
			array(
				'key'   => 'field_contact_form_description',
				'label' => 'Описание формы',
				'name'  => 'contact_form_description',
				'type'  => 'textarea',
				'rows' => 2,
				'default_value' => 'Свяжемся с вами, поможем подобрать оборудование и ответим на вопросы по поставке.',
			),
			array(
				'key'   => 'field_contact_form_button',
				'label' => 'Текст кнопки',
				'name'  => 'contact_form_button',
				'type'  => 'text',
				'default_value' => 'Отправить',
			),
			array(
				'key'   => 'field_contact_map_title',
				'label' => 'Заголовок карты',
				'name'  => 'contact_map_title',
				'type'  => 'text',
				'default_value' => 'Как нас найти',
			),
			array(
				'key'   => 'field_contact_map_description',
				'label' => 'Описание карты',
				'name'  => 'contact_map_description',
				'type'  => 'textarea',
				'rows' => 2,
				'default_value' => 'Наш офис находится в Минске. Перед визитом рекомендуем предварительно связаться с нами для уточнения деталей.',
			),
			array(
				'key'   => 'field_contact_map_address',
				'label' => 'Адрес на карте',
				'name'  => 'contact_map_address',
				'type'  => 'text',
				'default_value' => 'Минск, улица Ольшевского, 22',
			),
		),
	) );
}

/**
 * Register ACF options page fields for Certificates
 */
add_action( 'acf/include_fields', 'guardexpert_register_certificates_fields' );
function guardexpert_register_certificates_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_certificates_options',
		'title'    => 'Сертификаты',
		'fields'   => array(
			array(
				'key'      => 'field_certificates_items',
				'label'    => 'Сертификаты',
				'name'     => 'certificates_items',
				'type'     => 'repeater',
				'max'      => 20,
				'button_label' => 'Добавить сертификат',
				'sub_fields' => array(
					array(
						'key'   => 'field_certificate_image',
						'label' => 'Изображение',
						'name'  => 'image',
						'type'  => 'image',
						'return_format' => 'url',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'theme-settings',
				),
			),
		),
	) );
}

/**
 * Register custom post type for Certificates
 */
add_action( 'init', 'guardexpert_register_certificates_post_type' );
function guardexpert_register_certificates_post_type() {
	$labels = array(
		'name'               => 'Сертификаты',
		'singular_name'      => 'Сертификат',
		'menu_name'          => 'Сертификаты',
		'add_new'            => 'Добавить сертификат',
		'add_new_item'       => 'Добавить новый сертификат',
		'edit_item'          => 'Редактировать сертификат',
		'view_item'          => 'Посмотреть сертификат',
		'all_items'          => 'Все сертификаты',
		'search_items'       => 'Поиск сертификатов',
		'not_found'          => 'Сертификатов не найдено',
		'not_found_in_trash' => 'Сертификатов не найдено в корзине',
	);

	register_post_type( 'certificates', array(
		'labels'             => $labels,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'        => true,
		'menu_icon'          => 'dashicons-media-document',
		'supports'           => array( 'title', 'thumbnail' ),
	) );
}

/**
 * Register ACF fields for Certificates post type
 */
add_action( 'acf/init', 'guardexpert_register_certificate_fields' );
function guardexpert_register_certificate_fields() {
	acf_add_local_field_group( array(
		'key'      => 'group_certificate_fields',
		'title'    => 'Данные сертификата',
		'fields'   => array(
			array(
				'key'   => 'field_certificate_image',
				'label' => 'Изображение сертификата',
				'name'  => 'certificate_image',
				'type'  => 'image',
				'return_format' => 'url',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'certificates',
				),
			),
		),
	) );
}

/**
 * AJAX handler for consultation form submission.
 */
function guardexpert_send_consultation() {
	$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
	$comment = isset( $_POST['comment'] ) ? sanitize_textarea_field( $_POST['comment'] ) : '';

	if ( empty( $name ) || empty( $phone ) ) {
		wp_send_json_error( array( 'message' => 'Заполните обязательные поля' ) );
	}

	$to = get_option( 'admin_email' );
	$subject = 'Новая заявка на консультацию — ' . $name;
	$message = "Имя: $name\nТелефон: $phone\nКомментарий: $comment";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8' );

	wp_mail( $to, $subject, $message, $headers );

	wp_send_json_success( array( 'message' => 'Спасибо! Мы свяжемся с вами.' ) );
}
add_action( 'wp_ajax_guardexpert_send_consultation', 'guardexpert_send_consultation' );
add_action( 'wp_ajax_nopriv_guardexpert_send_consultation', 'guardexpert_send_consultation' );

/**
 * Save cart comment to session on AJAX update.
 */
function guardexpert_save_cart_comment() {
	if ( isset( $_POST['order_comments'] ) ) {
		WC()->session->set( 'order_comments', sanitize_textarea_field( $_POST['order_comments'] ) );
	}
	wp_send_json_success();
}
add_action( 'wp_ajax_guardexpert_save_cart_comment', 'guardexpert_save_cart_comment' );
add_action( 'wp_ajax_nopriv_guardexpert_save_cart_comment', 'guardexpert_save_cart_comment' );

/**
 * AJAX: Submit order from custom checkout.
 */
function guardexpert_submit_order() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		wp_send_json_error( array( 'message' => 'WooCommerce не активен' ) );
	}

	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'guardexpert_checkout' ) ) {
		wp_send_json_error( array( 'message' => 'Ошибка безопасности' ) );
	}

	$name             = isset( $_POST['billing_name'] ) ? sanitize_text_field( $_POST['billing_name'] ) : '';
	$phone            = isset( $_POST['billing_phone'] ) ? sanitize_text_field( $_POST['billing_phone'] ) : '';
	$email            = isset( $_POST['billing_email'] ) ? sanitize_email( $_POST['billing_email'] ) : '';
	$delivery         = isset( $_POST['delivery'] ) ? sanitize_text_field( $_POST['delivery'] ) : '';
	$delivery_city    = isset( $_POST['delivery_city'] ) ? sanitize_text_field( $_POST['delivery_city'] ) : '';
	$delivery_address = isset( $_POST['delivery_address'] ) ? sanitize_text_field( $_POST['delivery_address'] ) : '';
	$delivery_info    = isset( $_POST['delivery_info'] ) ? sanitize_text_field( $_POST['delivery_info'] ) : '';
	$checkout_comment = isset( $_POST['billing_comment'] ) ? sanitize_textarea_field( $_POST['billing_comment'] ) : '';
	$cart_comment     = WC()->session->get( 'order_comments', '' );

	if ( empty( $name ) || empty( $phone ) || empty( $email ) ) {
		wp_send_json_error( array( 'message' => 'Заполните обязательные поля' ) );
	}

	$order = wc_create_order();
	if ( is_wp_error( $order ) ) {
		wp_send_json_error( array( 'message' => 'Ошибка создания заказа: ' . $order->get_error_message() ) );
	}

	foreach ( WC()->cart->get_cart() as $cart_item ) {
		$product = $cart_item['data'];
		if ( $product ) {
			$order->add_product( $product, $cart_item['quantity'] );
		}
	}

	$order->set_billing_first_name( $name );
	$order->set_billing_phone( $phone );
	$order->set_billing_email( $email );

	if ( $delivery === 'delivery' && ! empty( $delivery_city ) && ! empty( $delivery_address ) ) {
		$full_address = $delivery_address . ', ' . $delivery_city;
		if ( ! empty( $delivery_info ) ) {
			$full_address .= ' (' . $delivery_info . ')';
		}
		$order->set_shipping_first_name( $name );
		$order->set_shipping_address_1( $full_address );
	} else {
		$order->set_shipping_first_name( $name );
		$order->set_shipping_address_1( 'Согласование с менеджером' );
	}

	$order->set_payment_method_title( 'Безналичный расчёт' );
	$order->set_currency( 'BYN' );
	$order->set_status( 'on-hold' );
	$order->calculate_totals();

	$note_parts = array();
	if ( ! empty( $cart_comment ) ) {
		$note_parts[] = $cart_comment;
	}
	if ( ! empty( $checkout_comment ) ) {
		$note_parts[] = $checkout_comment;
	}
	if ( ! empty( $note_parts ) ) {
		$order->add_order_note( implode( "\n\n", $note_parts ) );
	}

	$order->save();

	// Send email notifications manually
	$emails = WC()->mailer()->get_emails();
	if ( isset( $emails['WC_Email_New_Order'] ) ) {
		$emails['WC_Email_New_Order']->trigger( $order->get_id(), $order );
	}
	if ( isset( $emails['WC_Email_Customer_Processing_Order'] ) ) {
		$emails['WC_Email_Customer_Processing_Order']->trigger( $order->get_id(), $order );
	}

	WC()->cart->empty_cart();
	WC()->session->set( 'order_comments', '' );

	wp_send_json_success( array(
		'order_id'     => $order->get_id(),
		'order_number' => $order->get_order_number(),
	) );
}
add_action( 'wp_ajax_guardexpert_submit_order', 'guardexpert_submit_order' );
add_action( 'wp_ajax_nopriv_guardexpert_submit_order', 'guardexpert_submit_order' );

/**
 * Register ACF fields for WooCommerce products: Delivery & Payment tab.
 */
add_action( 'acf/include_fields', 'guardexpert_register_product_delivery_fields' );
function guardexpert_register_product_delivery_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_product_delivery',
		'title'    => 'Доставка и оплата',
		'fields'   => array(
			array(
				'key'          => 'field_product_delivery_content',
				'label'        => 'Содержимое вкладки',
				'name'         => 'product_delivery_content',
				'type'         => 'wysiwyg',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => false,
				'default_value' => '<p><strong>Доставка по Беларуси</strong></p>
<p>Доставка осуществляется курьерской службой по всей территории Республики Беларусь. Срок доставки — от 1 до 5 рабочих дней в зависимости от региона.</p>
<p><strong>Способы оплаты</strong></p>
<ul>
<li>Наличный расчёт при получении</li>
<li>Безналичный расчёт для юридических лиц</li>
<li>Оплата банковской картой онлайн</li>
<li>Рассрочка и кредит (уточняйте у менеджера)</li>
</ul>
<p><strong>Самовывоз</strong></p>
<p>г. Минск, ул. Ольшевского 22, помещение 7, каб. 34. Перед приездом согласуйте время с менеджером.</p>',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'product',
				),
			),
		),
	) );
}