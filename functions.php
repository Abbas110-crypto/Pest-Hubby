<?php
/**
 * Hubby Pest Control theme functions.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HUBBY_THEME_VERSION', '1.0.6');
define('HUBBY_THEME_DIR', get_template_directory());
define('HUBBY_THEME_URI', get_template_directory_uri());

require_once HUBBY_THEME_DIR . '/inc/theme-data.php';
require_once HUBBY_THEME_DIR . '/inc/setup-pages.php';

function hubby_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height' => 96,
        'width' => 96,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'hubby-pest'),
        'footer_services' => __('Footer Services', 'hubby-pest'),
        'footer_company' => __('Footer Company', 'hubby-pest'),
    ]);
}
add_action('after_setup_theme', 'hubby_setup');

function hubby_enqueue_assets(): void
{
    $is_contact_template = hubby_is_contact_route();
    $global_deps = ['hubby-fonts'];

    wp_enqueue_style(
        'hubby-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    if ($is_contact_template) {
        wp_enqueue_style(
            'hubby-contact',
            HUBBY_THEME_URI . '/assets/css/contact.css',
            ['hubby-fonts'],
            HUBBY_THEME_VERSION
        );

        $global_deps[] = 'hubby-contact';
    } else {
        wp_enqueue_style(
            'hubby-theme',
            HUBBY_THEME_URI . '/assets/css/theme.css',
            ['hubby-fonts'],
            HUBBY_THEME_VERSION
        );

        $global_deps[] = 'hubby-theme';

        wp_enqueue_script(
            'hubby-theme',
            HUBBY_THEME_URI . '/assets/js/theme.js',
            [],
            HUBBY_THEME_VERSION,
            true
        );
    }

    wp_enqueue_style(
        'hubby-global',
        HUBBY_THEME_URI . '/assets/css/global.css',
        $global_deps,
        HUBBY_THEME_VERSION
    );
}
add_action('wp_enqueue_scripts', 'hubby_enqueue_assets');

function hubby_get_request_path(): string
{
    $request_path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $home_path = (string) parse_url(home_url('/'), PHP_URL_PATH);
    $home_path = rtrim($home_path, '/');

    if ($home_path !== '' && $home_path !== '/' && str_starts_with($request_path, $home_path . '/')) {
        $request_path = substr($request_path, strlen($home_path));
    }

    return trim($request_path, '/');
}

function hubby_is_contact_route(): bool
{
    return is_page_template('template-contact.php')
        || is_page('contact')
        || get_query_var('hubby_route') === 'contact'
        || hubby_get_request_path() === 'contact';
}

function hubby_get_header_logo_uri(): string
{
    return content_url('/uploads/2026/05/hubby-pest-logo.png');
}

function hubby_header_fallback_menu(): void
{
    $items = [
        ['Home', home_url('/')],
        ['About', home_url('/about/')],
        ['Services', home_url('/#pests')],
        ['Pricing', home_url('/pricing/')],
        ['Reviews', home_url('/reviews/')],
        ['Contact', home_url('/contact/')],
    ];

    echo '<ul id="primary-menu" class="nav-links">';
    foreach ($items as [$label, $url]) {
        printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
    }
    echo '</ul>';
}

function hubby_footer_services_fallback_menu(): void
{
    echo '<ul>';
    foreach (hubby_services() as $slug => $service) {
        printf('<li><a href="%s">%s</a></li>', esc_url(home_url('/' . $slug . '/')), esc_html($service['title']));
    }
    echo '</ul>';
}

function hubby_footer_company_fallback_menu(): void
{
    $items = [
        ['About Hubby', home_url('/about/')],
        ['How It Works', home_url('/#process')],
        ['Service Areas', home_url('/gilbert-pest-control/')],
        ['Franchise Info', '#'],
        ['Careers', '#'],
    ];

    echo '<ul>';
    foreach ($items as [$label, $url]) {
        printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
    }
    echo '</ul>';
}

function hubby_document_title(string $title): string
{
    if (hubby_is_contact_route()) {
        return 'Contact Hubby Pest Control | Free Quote | East Valley AZ | 480-845-3833';
    }

    return $title;
}
add_filter('pre_get_document_title', 'hubby_document_title');

function hubby_enable_pretty_permalinks(): void
{
    if (!current_user_can('manage_options')) {
        return;
    }

    if (get_option('hubby_pretty_permalinks_version') === HUBBY_THEME_VERSION) {
        return;
    }

    if (get_option('permalink_structure') !== '/%postname%/') {
        update_option('permalink_structure', '/%postname%/');
    }

    flush_rewrite_rules(false);
    update_option('hubby_pretty_permalinks_version', HUBBY_THEME_VERSION);
}
add_action('admin_init', 'hubby_enable_pretty_permalinks');

function hubby_redirect_index_permalinks(): void
{
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';

    if (!is_string($request_uri) || !str_contains($request_uri, '/index.php/')) {
        return;
    }

    wp_safe_redirect(home_url(str_replace('/index.php/', '/', $request_uri)), 301);
    exit;
}
add_action('template_redirect', 'hubby_redirect_index_permalinks', 1);

function hubby_register_virtual_routes(): void
{
    add_rewrite_rule('^contact/?$', 'index.php?hubby_route=contact', 'top');
}
add_action('init', 'hubby_register_virtual_routes');

function hubby_query_vars(array $vars): array
{
    $vars[] = 'hubby_route';
    return $vars;
}
add_filter('query_vars', 'hubby_query_vars');

function hubby_virtual_template(string $template): string
{
    if (!hubby_is_contact_route()) {
        return $template;
    }

    global $wp_query;

    if ($wp_query instanceof WP_Query) {
        $wp_query->is_404 = false;
        $wp_query->is_page = true;
    }

    status_header(200);
    return HUBBY_THEME_DIR . '/template-contact.php';
}
add_filter('template_include', 'hubby_virtual_template', 99);

function hubby_register_post_types(): void
{
    register_post_type('hubby_review', [
        'labels' => [
            'name' => __('Reviews', 'hubby-pest'),
            'singular_name' => __('Review', 'hubby-pest'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'hubby_register_post_types');

function hubby_body_classes(array $classes): array
{
    $classes[] = 'hubby-site';
    return $classes;
}
add_filter('body_class', 'hubby_body_classes');

function hubby_get_phone(): string
{
    return '(480) 270-0122';
}

function hubby_get_phone_uri(): string
{
    return 'tel:4802700122';
}

