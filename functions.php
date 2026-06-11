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
		'supports'           => array( 'title', 'thumbnail' ),
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
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'contact.php',
				),
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