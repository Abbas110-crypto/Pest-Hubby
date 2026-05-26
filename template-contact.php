<?php
/*
Template Name: Hubby Contact
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('hubby_contact_page_meta')) {
    function hubby_contact_page_meta(): void
    {
        ?>
<meta name="description" content="Get a free pest control quote from Hubby Pest Control. Serving Gilbert, Chandler, Queen Creek, Mesa, Tempe & San Tan Valley AZ. Call 480-845-3833 or fill out our quick quote form.">
<meta name="keywords" content="contact Hubby Pest Control, pest control quote Gilbert AZ, free pest control estimate East Valley, pest control phone number Arizona">
<link rel="canonical" href="<?php echo esc_url(home_url('/contact/')); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_url(home_url('/contact/')); ?>">
<meta property="og:title" content="Contact Hubby Pest Control | Free Quote | East Valley AZ | 480-845-3833">
<meta property="og:description" content="Get a free pest control quote from Hubby Pest Control. Serving Gilbert, Chandler, Queen Creek, Mesa, Tempe & San Tan Valley AZ. Call 480-845-3833 or fill out our quick quote form.">
<meta property="og:site_name" content="Hubby Pest Control">
<meta name="twitter:card" content="summary_large_image">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<meta name="geo.region" content="US-AZ">
<meta name="geo.placename" content="Gilbert, Arizona">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":["LocalBusiness","PestControlService"],"name":"Hubby Pest Control, LLC","url":"https://www.hubbypestcontrol.com","telephone":"+14808453833","email":"blake@hubbypestcontrol.com","description":"Get a free pest control quote from Hubby Pest Control. Serving Gilbert, Chandler, Queen Creek, Mesa, Tempe & San Tan Valley AZ. Call 480-845-3833 or fill out our quick quote form.","priceRange":"$49-$89/month","areaServed":[{"@type":"City","name":"Gilbert"},{"@type":"City","name":"Chandler"},{"@type":"City","name":"Queen Creek"},{"@type":"City","name":"Mesa"},{"@type":"City","name":"Tempe"},{"@type":"City","name":"San Tan Valley"}],"address":{"@type":"PostalAddress","addressLocality":"Gilbert","addressRegion":"AZ","addressCountry":"US"},"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.9","reviewCount":"127","bestRating":"5"}}
</script>
<script type="application/ld+json">{"@context":"https://schema.org","@type":"ContactPage","name":"Contact Hubby Pest Control","url":"<?php echo esc_url(home_url('/contact/')); ?>"}</script>
        <?php
    }
}
add_action('wp_head', 'hubby_contact_page_meta', 1);

get_header();
get_template_part('template-parts/contact/content', 'contact');
get_footer();