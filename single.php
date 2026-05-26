<?php
/**
 * Single post template.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class('single-article'); ?>>
        <header class="page-hero compact">
            <div class="section-label"><?php echo esc_html(get_the_date()); ?></div>
            <h1><?php the_title(); ?></h1>
        </header>
        <div class="content-section entry-content"><?php the_content(); ?></div>
    </article>
<?php endwhile; ?>
<?php
get_footer();
