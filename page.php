<?php
/**
 * Default page template.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero compact">
    <div class="section-label"><?php esc_html_e('Hubby Pest Control', 'hubby-pest'); ?></div>
    <h1><?php the_title(); ?></h1>
</section>
<section class="content-section">
    <?php while (have_posts()) : the_post(); ?>
        <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; ?>
</section>
<?php
get_footer();
