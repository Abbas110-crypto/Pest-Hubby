<?php
/**
 * Creates the required Phase 1 page shell on theme activation.
 */

if (!defined('ABSPATH')) {
    exit;
}

function hubby_seed_pages(): void
{
    $pages = [
        'home' => ['Home', 'front-page.php'],
        'pricing' => ['Pricing', 'template-pricing.php'],
        'about' => ['About', 'template-about.php'],
        'reviews' => ['Reviews', 'template-reviews.php'],
        'contact' => ['Contact', 'template-contact.php'],
        'service-areas' => ['Service Areas', 'template-service-areas.php'],
        'blog' => ['Blog', ''],
        'thank-you' => ['Thank You', 'template-thank-you.php'],
    ];

    foreach (hubby_services() as $slug => $service) {
        $pages[$slug] = [$service['title'], 'template-service.php'];
    }

    foreach (hubby_locations() as $slug => $city) {
        $pages[$slug . '-pest-control'] = [$city . ' Pest Control', 'template-location.php'];
    }

    foreach ($pages as $slug => [$title, $template]) {
        $existing = get_page_by_path($slug);
        if ($existing instanceof WP_Post) {
            continue;
        }

        $page_id = wp_insert_post([
            'post_title' => $title,
            'post_name' => $slug,
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ]);

        if (!is_wp_error($page_id) && $template !== '') {
            update_post_meta($page_id, '_wp_page_template', $template);
        }

        if ($slug === 'home' && !is_wp_error($page_id)) {
            update_option('page_on_front', $page_id);
            update_option('show_on_front', 'page');
        }

        if ($slug === 'blog' && !is_wp_error($page_id)) {
            update_option('page_for_posts', $page_id);
        }
    }
}
add_action('after_switch_theme', 'hubby_seed_pages');

