<?php
/**
 * Bricklet Theme Functions and Definitions - PT Iida Group Holdings Edition
 */

// Register Navigation Menus
function bricklet_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bricklet'),
    ));
}
add_action('init', 'bricklet_register_menus');

// Intercept sitemap.xml requests for SEO indexing
function bricklet_sitemap_init() {
    $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $path = parse_url($request_uri, PHP_URL_PATH);
    if (preg_match('/sitemap\.xml$/i', $path)) {
        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // 1. Homepage
        echo '  <url>' . "\n";
        echo '    <loc>' . esc_url(home_url('/')) . '</loc>' . "\n";
        echo '    <changefreq>daily</changefreq>' . "\n";
        echo '    <priority>1.0</priority>' . "\n";
        echo '  </url>' . "\n";
        
        // 2. Published Pages
        $pages = get_pages();
        foreach ($pages as $p) {
            if ($p->post_status === 'publish') {
                echo '  <url>' . "\n";
                echo '    <loc>' . esc_url(get_permalink($p->ID)) . '</loc>' . "\n";
                echo '    <changefreq>weekly</changefreq>' . "\n";
                echo '    <priority>0.8</priority>' . "\n";
                echo '  </url>' . "\n";
            }
        }
        
        // 3. Blog Posts (News & Topics)
        $posts = get_posts(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        foreach ($posts as $post) {
            echo '  <url>' . "\n";
            echo '    <loc>' . esc_url(get_permalink($post->ID)) . '</loc>' . "\n";
            echo '    <changefreq>weekly</changefreq>' . "\n";
            echo '    <priority>0.6</priority>' . "\n";
            echo '  </url>' . "\n";
        }
        
        echo '</urlset>';
        exit;
    }
}
add_action('parse_request', 'bricklet_sitemap_init');

// Theme Setup
function bricklet_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'bricklet_theme_setup');

// SEO Meta tags generator targeting PT Iida Group Holdings
function bricklet_seo_meta() {
    $description = "PT Iida Group Holdings is a Japanese Company that produces earthquake-resistant Concrete Blocks and Paving Blocks to support consumers in Indonesia.";
    $keywords = "PT Iida Group Holdings, IG Strong CB, concrete blocks, paving blocks, earthquake resistant, construction materials, Iida Sangyo, Perumnas Iida Group, Hajime, Indonesia";
    $og_title = "PT Iida Group Holdings - Japan Quality Concrete Blocks";
    $og_desc = $description;
    $og_image = get_template_directory_uri() . '/images/PT-iida-logo.webp';
    $og_url = home_url('/');
    
    if (is_front_page()) {
        $description = "PT Iida Group Holdings is a Japanese Company that produces earthquake-resistant Concrete Blocks. We also produce Paving Blocks to support consumers.";
        $og_title = "PT Iida Group Holdings Company Produces Concrete Blocks.";
        $og_desc = $description;
    } elseif (is_single()) {
        global $post;
        $og_title = get_the_title();
        $og_url = get_permalink();
        
        if ($post->post_excerpt) {
            $description = wp_strip_all_tags($post->post_excerpt);
        } else {
            $description = wp_strip_all_tags(wp_trim_words($post->post_content, 30));
        }
        $og_desc = $description;
        
        $img = get_post_meta($post->ID, '_featured_image_url', true);
        if (!empty($img)) {
            $og_image = $img;
        } elseif (has_post_thumbnail($post->ID)) {
            $og_image = get_the_post_thumbnail_url($post->ID, 'large');
        }
    } elseif (is_page()) {
        global $post;
        $og_title = get_the_title() . ' - PT. Iida Group Holdings';
        $og_url = get_permalink();
        $description = get_the_title() . " page on PT. Iida Group Holdings. Discover Japanese housing technology and earthquake resistant concrete products.";
        $og_desc = $description;
    }
    
    // Output meta tags
    echo "\n" . '<!-- SEO Meta Tags -->' . "\n";
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
    echo '<meta name="publisher" content="PT Iida Group Holdings">' . "\n";
    echo '<meta name="author" content="PT Iida Group Holdings">' . "\n";
    echo '<link class="yoast-seo-canonical" rel="canonical" href="' . esc_url($og_url) . '">' . "\n";
    
    // Open Graph
    echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og_url) . '">' . "\n";
    echo '<meta property="og:site_name" content="PT. Iida Group Holdings">' . "\n";
    
    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($og_image) . '">' . "\n";
    
    // JSON-LD Organization Schema
    echo '<script type="application/ld+json" nonce="' . bricklet_get_nonce() . '">' . "\n";
    echo json_encode(array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'PT. Iida Group Holdings',
        'url' => esc_url(home_url('/')),
        'logo' => get_template_directory_uri() . '/images/PT-iida-logo.webp',
        'description' => esc_attr($description),
    ), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . "\n";
    echo '</script>' . "\n";
    echo '<!-- End SEO Meta Tags -->' . "\n";
}
add_action('wp_head', 'bricklet_seo_meta');

// Corporate Setup Content and Settings
function bricklet_setup_content_and_settings() {
    // --- 1. Clean up old CPTs & posts ---
    $old_cpts = array('listing', 'service', 'testimonial', 'faq');
    foreach ($old_cpts as $cpt) {
        $posts = get_posts(array(
            'post_type' => $cpt,
            'posts_per_page' => -1,
            'post_status' => 'any'
        ));
        if ($posts) {
            foreach ($posts as $p) {
                wp_delete_post($p->ID, true);
            }
        }
    }

    // --- 2. Auto-Provision the 14 Pages ---
    $pages_to_create = array(
        'Home' => 'home',
        'About Us' => 'about-us',
        'Contact Us' => 'contact',
        'Our Products' => 'our-products',
        'Construction Material' => 'construction-material',
        'Company Data' => 'company-data',
        'Vision & Mission' => 'vision-mission',
        'Milestone' => 'milestone',
        'Main Factory' => 'main-factory',
        'Cileungsi Factory' => 'cileungsi-factory',
        'Hajime' => 'hajime',
        'Perumnas Iida Group' => 'perumnas-iida-group',
        'Tacthome' => 'tacthome',
        'Ione' => 'ione'
    );

    $created_page_ids = array();
    foreach ($pages_to_create as $page_title => $page_slug) {
        $pages = get_posts(array(
            'post_type' => 'page',
            'name' => $page_slug,
            'posts_per_page' => 1,
            'post_status' => 'any'
        ));
        
        if (empty($pages)) {
            $new_page_id = wp_insert_post(array(
                'post_title' => $page_title,
                'post_name' => $page_slug,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
            ));
            $created_page_ids[$page_slug] = $new_page_id;
        } else {
            $created_page_ids[$page_slug] = $pages[0]->ID;
        }
    }

    // Configure static front page reading settings
    if (isset($created_page_ids['home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $created_page_ids['home']);
    }

    // --- 3. Clean up old menus & recreate nested menus ---
    $old_menus = array('Primary Menu', 'Corporate Menu');
    foreach ($old_menus as $menu_name) {
        $old_menu = wp_get_nav_menu_object($menu_name);
        if ($old_menu) {
            wp_delete_nav_menu($old_menu->term_id);
        }
    }

    $menu_name = 'Corporate Menu';
    $menu_id = wp_create_nav_menu($menu_name);
    if ($menu_id && !is_wp_error($menu_id)) {
        // Map to primary theme location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
        
        // Define menu hierarchy
        
        // Home
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Home',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // About Us
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'About Us',
            'menu-item-url' => home_url('/about-us/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // Products (parent)
        $products_parent_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Products',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // Products -> IG Strong CB
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'IG Strong CB',
            'menu-item-url' => home_url('/our-products/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $products_parent_id,
        ));
        
        // Products -> Construction Material
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Construction Material',
            'menu-item-url' => home_url('/construction-material/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $products_parent_id,
        ));
        
        // Company Profile (parent)
        $profile_parent_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Company Profile',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // Company Profile -> Company Data
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Company Data',
            'menu-item-url' => home_url('/company-data/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $profile_parent_id,
        ));
        
        // Company Profile -> Vision & Mission
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Vision & Mission',
            'menu-item-url' => home_url('/vision-mission/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $profile_parent_id,
        ));
        
        // Company Profile -> Milestone
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Milestone',
            'menu-item-url' => home_url('/milestone/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $profile_parent_id,
        ));
        
        // Our Business (parent)
        $business_parent_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Our Business',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // Our Business -> Main Factory
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Main Factory',
            'menu-item-url' => home_url('/main-factory/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $business_parent_id,
        ));
        
        // Our Business -> Cileungsi Factory
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Cileungsi Factory',
            'menu-item-url' => home_url('/cileungsi-factory/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $business_parent_id,
        ));
        
        // Group Company (parent)
        $group_parent_id = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Group Company',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        
        // Group Company -> Hajime
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Hajime',
            'menu-item-url' => home_url('/hajime/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $group_parent_id,
        ));
        
        // Group Company -> Perumnas Iida Group
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Perumnas Iida Group',
            'menu-item-url' => home_url('/perumnas-iida-group/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $group_parent_id,
        ));
        
        // Group Company -> Tacthome
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Tacthome',
            'menu-item-url' => home_url('/tacthome/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $group_parent_id,
        ));
        
        // Group Company -> Ione
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Ione',
            'menu-item-url' => home_url('/ione/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
            'menu-item-parent-id' => $group_parent_id,
        ));
        
        // Contact Us
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Contact Us',
            'menu-item-url' => home_url('/contact/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
    }

    // --- 4. Clean up old posts & seed new corporate news ---
    // --- 4. Clean up old posts & seed new corporate news ---
    $all_posts = get_posts(array(
        'post_type' => 'post',
        'numberposts' => -1,
        'post_status' => 'any'
    ));
    if ($all_posts) {
        foreach ($all_posts as $post) {
            wp_delete_post($post->ID, true);
        }
    }
}
// Disable wpautop for news posts content to prevent it from breaking custom HTML layouts (like videos and grids)
add_filter('the_content', function($content) {
    if (is_singular('post')) {
        remove_filter('the_content', 'wpautop');
    }
    return $content;
}, 9);

// Send X-Robots-Tag HTTP header for search engine optimization
function bricklet_send_robots_headers() {
    if (!is_admin()) {
        header("X-Robots-Tag: index, follow, max-image-preview:large");
    }
}
add_action('send_headers', 'bricklet_send_robots_headers');

/**
 * Configure SMTP using constants defined in wp-config.php
 */
add_action('phpmailer_init', 'bricklet_configure_smtp');
function bricklet_configure_smtp($phpmailer) {
    if (defined('WP_SMTP_HOST') && defined('WP_SMTP_USER') && defined('WP_SMTP_PASS')) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = WP_SMTP_HOST;
        $phpmailer->SMTPAuth   = defined('WP_SMTP_AUTH') ? WP_SMTP_AUTH : true;
        $phpmailer->Port       = defined('WP_SMTP_PORT') ? WP_SMTP_PORT : 587;
        $phpmailer->Username   = WP_SMTP_USER;
        $phpmailer->Password   = WP_SMTP_PASS;
        $phpmailer->SMTPSecure = defined('WP_SMTP_SECURE') ? WP_SMTP_SECURE : 'tls';
    }
}

/**
 * Retrieve environment variables from the .env file in the WordPress root directory.
 */
function bricklet_get_env_var($key, $default = '') {
    $env_path = ABSPATH . '.env';
    if (file_exists($env_path)) {
        $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);
                // Strip quotes if present
                $value = trim($value, '"\'');
                if ($name === $key) {
                    return $value;
                }
            }
        }
    }
    return $default;
}

// Require admin CRUD and database integration
require_once get_template_directory() . '/inc/admin-crud.php';

// ----------------------------------------------------
// Obscure WordPress Tech Footprint
// ----------------------------------------------------

// 1. Remove WP head generator and links
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_resource_hints', 2);

// 2. Remove query strings (?ver=) from static CSS & JS
function bricklet_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'bricklet_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'bricklet_remove_wp_ver_css_js', 9999);

// 3. Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');


// ----------------------------------------------------
// Content Security Policy & Security Headers
// ----------------------------------------------------

// Generate a cryptographically secure random base64 nonce
function bricklet_get_nonce() {
    if (!defined('BRICKLET_CSP_NONCE')) {
        define('BRICKLET_CSP_NONCE', base64_encode(random_bytes(16)));
    }
    return BRICKLET_CSP_NONCE;
}

// Send Security Headers: CSP, COOP, Anti X-Frame-Options (XFO)
function bricklet_send_security_headers() {
    if (!is_admin()) {
        $nonce = bricklet_get_nonce();
        
        // Anti X-Frame-Options (XFO)
        header("X-Frame-Options: SAMEORIGIN");
        
        // COOP (Cross-Origin-Opener-Policy)
        header("Cross-Origin-Opener-Policy: same-origin");
        
        // Strict CSP:
        // script-src: 'nonce-{nonce}' 'strict-dynamic' 'unsafe-inline' https: http:;
        // object-src: 'none';
        // base-uri: 'none';
        // frame-ancestors: 'self';
        $csp = "default-src 'self'; "
             . "script-src 'nonce-" . $nonce . "' 'strict-dynamic' 'unsafe-inline' 'self'; "
             . "object-src 'none'; "
             . "base-uri 'none'; "
             . "require-trusted-types-for 'script'; "
             . "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; "
             . "img-src 'self' data: https://lh3.googleusercontent.com https://www.ighd.co.id https://www.ighd.co.jp https://www.iidasangyo.co.jp https://www.hajime-kensetsu.co.jp https://www.tacthome.co.id https://idhome.co.jp; "
             . "font-src 'self' data: https://fonts.gstatic.com https://fonts.googleapis.com; "
             . "frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com; "
             . "connect-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com https://www.ighd.co.id https://www.ighd.co.jp https://www.iidasangyo.co.jp https://www.hajime-kensetsu.co.jp https://www.tacthome.co.id https://idhome.co.jp; "
             . "media-src 'self' data: blob:; "
             . "form-action 'self' https://www.ighd.co.id https://www.ighd.co.jp https://www.iidasangyo.co.jp https://www.hajime-kensetsu.co.jp https://www.tacthome.co.id https://idhome.co.jp https://maps.app.goo.gl; "
             . "frame-ancestors 'self';";
             
        header("Content-Security-Policy: " . $csp);
    }
}
add_action('send_headers', 'bricklet_send_security_headers');

// Automatically add CSP nonce to all scripts enqueued by WordPress
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (is_admin()) {
        return $tag;
    }
    $nonce = bricklet_get_nonce();
    if (strpos($tag, 'nonce=') === false) {
        $tag = str_replace('<script ', '<script nonce="' . $nonce . '" ', $tag);
    }
    return $tag;
}, 9999, 3);

// Automatically add CSP nonce to inline scripts generated by WordPress
add_filter('wp_inline_script_attributes', function($attributes) {
    if (is_admin()) {
        return $attributes;
    }
    $attributes['nonce'] = bricklet_get_nonce();
    return $attributes;
}, 9999);

function bricklet_get_button_url($link) {
    if (empty($link)) {
        return '';
    }
    // If absolute URL, return as is
    if (wp_http_validate_url($link) || strpos($link, 'http://') === 0 || strpos($link, 'https://') === 0 || strpos($link, '#') === 0) {
        return esc_url($link);
    }
    // Otherwise, relative to home url
    return esc_url(home_url('/' . ltrim($link, '/')));
}
