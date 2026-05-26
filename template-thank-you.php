<?php
/*
Template Name: Hubby Thank You
*/

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('Request Received', 'hubby-pest'); ?></div>
    <h1><?php esc_html_e('Thank You.', 'hubby-pest'); ?></h1>
    <p class="section-sub"><?php esc_html_e('Your quote request has been received. Our team will review the details and follow up with your next step.', 'hubby-pest'); ?></p>
    <a class="btn-mint" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back Home', 'hubby-pest'); ?></a>
</section>
<?php get_footer(); ?>
