<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero compact">
    <div class="section-label"><?php esc_html_e('404', 'hubby-pest'); ?></div>
    <h1><?php esc_html_e('Page Not Found.', 'hubby-pest'); ?></h1>
    <p class="section-sub"><?php esc_html_e('The page you are looking for may have moved.', 'hubby-pest'); ?></p>
    <a class="btn-mint" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back Home', 'hubby-pest'); ?></a>
</section>
<?php
get_footer();
