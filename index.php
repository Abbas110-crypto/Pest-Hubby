<?php
/**
 * Default template and blog index.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero compact">
    <div class="section-label"><?php esc_html_e('Hubby Pest Control', 'hubby-pest'); ?></div>
    <h1><?php echo esc_html(is_home() ? __('Pest Control Blog', 'hubby-pest') : get_the_title()); ?></h1>
</section>
<section class="content-section">
    <?php if (have_posts()) : ?>
        <div class="post-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('post-card'); ?>>
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p>
                    <a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read Article', 'hubby-pest'); ?></a>
                </article>
            <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('Content is coming soon.', 'hubby-pest'); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
