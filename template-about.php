<?php
/*
Template Name: Hubby About
*/

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('About', 'hubby-pest'); ?></div>
    <h1><?php esc_html_e('Built Like A Neighborly Service Company.', 'hubby-pest'); ?></h1>
    <p class="section-sub"><?php esc_html_e('Hubby Pest Control gives East Valley homeowners a simpler way to stay protected without contracts, surprise fees, or inconsistent visits.', 'hubby-pest'); ?></p>
</section>
<section class="content-section split-section reveal">
    <div>
        <h2><?php esc_html_e('Subscription Pest Control, Done Cleanly.', 'hubby-pest'); ?></h2>
        <p><?php esc_html_e('The Hubby model is simple: clear monthly pricing, reliable scheduled visits, strong communication, and free retreatments when needed.', 'hubby-pest'); ?></p>
        <p><?php esc_html_e('The site is ready for final founder story, licensing details, and photography before launch.', 'hubby-pest'); ?></p>
    </div>
    <div class="feature-list">
        <div><strong>01</strong><span><?php esc_html_e('No contracts or cancellation traps.', 'hubby-pest'); ?></span></div>
        <div><strong>02</strong><span><?php esc_html_e('Price-lock guarantee for active subscribers.', 'hubby-pest'); ?></span></div>
        <div><strong>03</strong><span><?php esc_html_e('Licensed and insured Arizona service.', 'hubby-pest'); ?></span></div>
    </div>
</section>
<?php get_footer(); ?>
