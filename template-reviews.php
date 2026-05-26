<?php
/*
Template Name: Hubby Reviews
*/

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="page-hero">
    <div class="section-label"><?php esc_html_e('Reviews', 'hubby-pest'); ?></div>
    <h1><?php esc_html_e('East Valley Homeowners Want Simple Protection.', 'hubby-pest'); ?></h1>
    <p class="section-sub"><?php esc_html_e('Clear, local feedback from homeowners who want reliable pest control without contracts or surprise fees.', 'hubby-pest'); ?></p>
</section>
<section class="reviews-section reveal">
    <div class="reviews-grid">
        <article class="review-card"><p class="review-text">"Clean communication, clear pricing, and no pressure. It feels like pest control finally caught up."</p><div class="reviewer"><div class="reviewer-av">SR</div><div><div class="reviewer-name">Sarah R.</div><div class="reviewer-sub">Mesa, AZ</div></div></div></article>
        <article class="review-card"><p class="review-text">"The monthly plan is easy to budget and they actually show up when they say they will."</p><div class="reviewer"><div class="reviewer-av">DL</div><div><div class="reviewer-name">David L.</div><div class="reviewer-sub">Tempe, AZ</div></div></div></article>
        <article class="review-card"><p class="review-text">"We signed up after seeing scorpions in the garage. The follow-up has been excellent."</p><div class="reviewer"><div class="reviewer-av">MN</div><div><div class="reviewer-name">Maya N.</div><div class="reviewer-sub">Chandler, AZ</div></div></div></article>
    </div>
</section>
<?php get_footer(); ?>
