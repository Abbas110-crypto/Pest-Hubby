<?php
/**
 * Global site header based on the approved contact page header.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e('Skip to content', 'hubby-pest'); ?></a>
<div class="top-bar">
    <div class="top-bar-left">
        <div class="tb-stars">
            <svg width="14" height="14" viewBox="0 0 48 48" fill="#4285F4" aria-hidden="true" focusable="false"><path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></svg>
            <span style="font-size:12px;font-weight:700;color:#fff">4.9</span>
            <span style="color:#FBBC04;font-size:11px">★★★★★</span>
            <span class="tb-item"><?php esc_html_e('127 Google Reviews', 'hubby-pest'); ?></span>
        </div>
        <span class="tb-item">✓ <?php esc_html_e('Licensed & Insured · AZ', 'hubby-pest'); ?></span>
        <span class="tb-item">✓ <?php esc_html_e('Background-Checked Techs', 'hubby-pest'); ?></span>
        <span class="tb-item">✓ <?php esc_html_e('Locally Owned · East Valley', 'hubby-pest'); ?></span>
    </div>
    <div class="tb-urgency">⚡ <?php esc_html_e('First visit within 48 hrs', 'hubby-pest'); ?> &nbsp;·&nbsp; <a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Lock your spot →', 'hubby-pest'); ?></a></div>
</div>
<nav aria-label="<?php esc_attr_e('Primary menu', 'hubby-pest'); ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo" aria-label="<?php esc_attr_e('Hubby Pest Control home', 'hubby-pest'); ?>">
        <img src="<?php echo esc_url(hubby_get_header_logo_uri()); ?>" width="180" height="77" alt="<?php esc_attr_e('Hubby Pest Control Logo', 'hubby-pest'); ?>">
    </a>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_id' => 'primary-menu',
        'menu_class' => 'nav-links',
        'depth' => 2,
        'fallback_cb' => 'hubby_header_fallback_menu',
    ]);
    ?>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="nav-cta"><?php esc_html_e('Get a Free Quote →', 'hubby-pest'); ?></a>
</nav>
<main id="content">
