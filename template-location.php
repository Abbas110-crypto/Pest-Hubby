<?php
/*
Template Name: Hubby Location Page
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once HUBBY_THEME_DIR . '/template-parts/sections.php';
$slug = str_replace('-pest-control', '', get_post_field('post_name', get_queried_object_id()));
$locations = hubby_locations();
$city = $locations[$slug] ?? 'East Valley';

get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('Service Area', 'hubby-pest'); ?></div>
    <h1><?php echo esc_html($city . ' Pest Control'); ?></h1>
    <p class="section-sub"><?php echo esc_html('Monthly pest control for ' . $city . ' homes with scorpion, general pest, rodent, mosquito, and weed spray options.'); ?></p>
    <a class="btn-mint" href="<?php echo esc_url(home_url('/pricing/#free-quote')); ?>"><?php esc_html_e('Get a Free Quote', 'hubby-pest'); ?></a>
</section>
<section class="content-section split-section reveal">
    <div>
        <h2><?php echo esc_html('Local Pest Protection in ' . $city . '.'); ?></h2>
        <p><?php echo esc_html($city . ' homeowners deal with year-round pest pressure because warm weather, irrigation, garages, and block-wall yards create reliable shelter for pests. Hubby Pest Control keeps protection simple with a subscription model and scheduled maintenance.'); ?></p>
        <p><?php echo esc_html('Every ' . $city . ' plan includes clear service notes, consistent scheduling, and protection that fits the way East Valley homes are built.'); ?></p>
    </div>
    <div class="map-placeholder">
        <span><?php echo esc_html($city); ?></span>
        <strong><?php esc_html_e('Service Area Map', 'hubby-pest'); ?></strong>
    </div>
</section>
<section class="pricing-section reveal">
    <?php hubby_render_pricing_cards(); ?>
</section>
<?php hubby_render_quote_shell(); ?>
<?php get_footer(); ?>
