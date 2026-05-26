<?php
/*
Template Name: Hubby Service Page
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once HUBBY_THEME_DIR . '/template-parts/sections.php';
$slug = get_post_field('post_name', get_queried_object_id());
$services = hubby_services();
$service = $services[$slug] ?? reset($services);

get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('Service', 'hubby-pest'); ?></div>
    <h1><?php echo esc_html($service['title']); ?></h1>
    <p class="section-sub"><?php echo esc_html($service['short']); ?></p>
    <a class="btn-mint" href="<?php echo esc_url(home_url('/pricing/#free-quote')); ?>"><?php esc_html_e('Get a Free Quote', 'hubby-pest'); ?></a>
</section>
<section class="content-section split-section reveal">
    <div>
        <h2><?php echo esc_html($service['title'] . ' Built for East Valley Homes.'); ?></h2>
        <p><?php esc_html_e('Hubby Pest Control protects homes across Gilbert, Chandler, Queen Creek, Mesa, and Tempe with consistent service, clear reporting, and flat monthly pricing.', 'hubby-pest'); ?></p>
        <p><?php esc_html_e('Every plan is designed around Arizona conditions: heat, block-wall yards, garages, irrigation lines, rooflines, and the pest pressure that changes through the year.', 'hubby-pest'); ?></p>
    </div>
    <div class="feature-list">
        <div><strong><?php esc_html_e('Included', 'hubby-pest'); ?></strong><span><?php esc_html_e('Materials, service notes, and retreatments between scheduled visits.', 'hubby-pest'); ?></span></div>
        <div><strong><?php esc_html_e('Scheduling', 'hubby-pest'); ?></strong><span><?php esc_html_e('First treatment targeted within 48 hours after signup.', 'hubby-pest'); ?></span></div>
        <div><strong><?php esc_html_e('Billing', 'hubby-pest'); ?></strong><span><?php esc_html_e('Flat monthly subscription with no long-term contract.', 'hubby-pest'); ?></span></div>
    </div>
</section>
<section class="pests-section reveal">
    <?php hubby_section_label('More Services'); ?>
    <h2><?php esc_html_e('Protection That Works Together.', 'hubby-pest'); ?></h2>
    <?php hubby_render_services_grid(); ?>
</section>
<?php hubby_render_quote_shell(); ?>
<?php get_footer(); ?>
