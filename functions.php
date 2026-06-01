<?php
/**
 * Hubby Pest Control Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

define('HUBBY_THEME_VERSION', '1.0.7');
define('HUBBY_THEME_DIR', get_template_directory());
define('HUBBY_THEME_URI', get_template_directory_uri());

require_once HUBBY_THEME_DIR . '/inc/theme-data.php';
require_once HUBBY_THEME_DIR . '/inc/setup-pages.php';


/*
|--------------------------------------------------------------------------
| Theme Setup
|--------------------------------------------------------------------------
*/

function hubby_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

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


/*
|--------------------------------------------------------------------------
| Route Helpers
|--------------------------------------------------------------------------
*/

function hubby_get_request_path(): string
{
    $request = isset($_SERVER['REQUEST_URI'])
        ? sanitize_text_field(
            wp_unslash($_SERVER['REQUEST_URI'])
        )
        : '';

    $request_path = (string) parse_url(
        $request,
        PHP_URL_PATH
    );

    return trim($request_path, '/');
}

function hubby_is_route(string $route): bool
{
    return is_page($route)
        || get_query_var('hubby_route') === $route
        || hubby_get_request_path() === $route;
}

function hubby_is_contact_route(): bool
{
    return hubby_is_route('contact');
}

function hubby_is_service_areas_route(): bool
{
    return hubby_is_route('service-areas');
}


/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
*/

function hubby_enqueue_assets(): void
{
    wp_enqueue_style(
        'hubby-fonts',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'hubby-global',
        HUBBY_THEME_URI . '/assets/css/global.css',
        ['hubby-fonts'],
        HUBBY_THEME_VERSION
    );

    if (hubby_is_contact_route()) {

        wp_enqueue_style(
            'hubby-contact',
            HUBBY_THEME_URI . '/assets/css/contact.css',
            ['hubby-global'],
            HUBBY_THEME_VERSION
        );
    }

    if (hubby_is_service_areas_route()) {

        wp_enqueue_style(
            'hubby-service-areas',
            HUBBY_THEME_URI . '/assets/css/service-areas.css',
            ['hubby-global'],
            HUBBY_THEME_VERSION
        );
    }

    wp_enqueue_style(
        'hubby-theme',
        HUBBY_THEME_URI . '/assets/css/theme.css',
        ['hubby-global'],
        HUBBY_THEME_VERSION
    );

    wp_enqueue_script(
        'hubby-theme',
        HUBBY_THEME_URI . '/assets/js/theme.js',
        [],
        HUBBY_THEME_VERSION,
        true
    );
}

add_action(
    'wp_enqueue_scripts',
    'hubby_enqueue_assets'
);


/*
|--------------------------------------------------------------------------
| Logo + Phone
|--------------------------------------------------------------------------
*/

function hubby_get_header_logo_uri(): string
{
    $custom_logo_id = get_theme_mod(
        'custom_logo'
    );

    if ($custom_logo_id) {

        return wp_get_attachment_image_url(
            $custom_logo_id,
            'full'
        );
    }

    return HUBBY_THEME_URI . '/assets/images/logo.png';
}

function hubby_get_phone(): string
{
    return get_theme_mod(
        'hubby_phone',
        '(480) 270-0122'
    );
}

function hubby_get_phone_uri(): string
{
    return 'tel:' . preg_replace(
        '/[^0-9]/',
        '',
        hubby_get_phone()
    );
}


/*
|--------------------------------------------------------------------------
| Dynamic Titles
|--------------------------------------------------------------------------
*/

function hubby_document_title(string $title): string
{
    $titles = [

        'contact' =>
            'Contact Hubby Pest Control | Free Quote',

        'service-areas' =>
            'Service Areas | Hubby Pest Control'
    ];

    foreach($titles as $route=>$custom_title){

        if(hubby_is_route($route)){

            return $custom_title;
        }
    }

    return $title;
}

add_filter(
    'pre_get_document_title',
    'hubby_document_title'
);


/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

function hubby_register_virtual_routes(): void
{
    add_rewrite_rule(
        '^contact/?$',
        'index.php?hubby_route=contact',
        'top'
    );

    add_rewrite_rule(
        '^service-areas/?$',
        'index.php?hubby_route=service-areas',
        'top'
    );
}

add_action(
    'init',
    'hubby_register_virtual_routes'
);

function hubby_query_vars(array $vars): array
{
    $vars[]='hubby_route';

    return $vars;
}

add_filter(
    'query_vars',
    'hubby_query_vars'
);


/*
|--------------------------------------------------------------------------
| Flush Rules
|--------------------------------------------------------------------------
*/

function hubby_activate_theme(): void
{
    hubby_register_virtual_routes();

    flush_rewrite_rules();
}

add_action(
    'after_switch_theme',
    'hubby_activate_theme'
);


/*
|--------------------------------------------------------------------------
| Template Loader
|--------------------------------------------------------------------------
*/

function hubby_virtual_template(
    string $template
): string {

    $templates=[

        'contact' =>
        'template-contact.php',

        'service-areas' =>
        'template-service-areas.php'
    ];

    foreach($templates as $route=>$file){

        if(hubby_is_route($route)){

            global $wp_query;

            if($wp_query instanceof WP_Query){

                $wp_query->is_404=false;
                $wp_query->is_page=true;
            }

            status_header(200);

            return HUBBY_THEME_DIR.'/'.$file;
        }
    }

    return $template;
}

add_filter(
    'template_include',
    'hubby_virtual_template',
    99
);


/*
|--------------------------------------------------------------------------
| Reviews Post Type
|--------------------------------------------------------------------------
*/

function hubby_register_post_types(): void
{
    register_post_type(
        'hubby_review',
        [

            'labels'=>[
                'name'=>__('Reviews'),
                'singular_name'=>__('Review')
            ],

            'public'=>true,
            'menu_icon'=>'dashicons-star-filled',

            'supports'=>[
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'custom-fields'
            ],

            'show_in_rest'=>true
        ]
    );
}

add_action(
    'init',
    'hubby_register_post_types'
);


/*
|--------------------------------------------------------------------------
| Body Classes
|--------------------------------------------------------------------------
*/

function hubby_body_classes(
    array $classes
): array {

    $classes[]='hubby-site';

    return $classes;
}

add_filter(
    'body_class',
    'hubby_body_classes'
);