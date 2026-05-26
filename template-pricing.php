<?php
/*
Template Name: Hubby Pricing
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once HUBBY_THEME_DIR . '/template-parts/sections.php';
get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('Pricing', 'hubby-pest'); ?></div>
    <h1><?php esc_html_e('No Contracts. No Surprise Fees.', 'hubby-pest'); ?></h1>
    <p class="section-sub"><?php esc_html_e('Choose the monthly pest protection plan that matches your home size and risk level.', 'hubby-pest'); ?></p>
</section>
<?php hubby_render_pricing_prototype(); ?>
<?php hubby_render_quote_prototype(); ?>
<?php hubby_render_faqs(); ?>
<?php get_footer(); ?>
