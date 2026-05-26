<?php
/*
Template Name: Hubby Service Areas
*/

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('hubby_service_areas_page_meta')) {
    function hubby_service_areas_page_meta(): void
    {
        ?>
<meta name="description" content="Hubby Pest Control serves Gilbert, Chandler, Queen Creek, Mesa, Tempe, and San Tan Valley, AZ. Professional pest control subscription starting at $49/month across all of East Valley Arizona.">
<meta name="keywords" content="pest control service area East Valley AZ, pest control Gilbert Chandler Queen Creek Mesa Tempe Arizona">
<link rel="canonical" href="<?php echo esc_url(home_url('/service-areas/')); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_url(home_url('/service-areas/')); ?>">
<meta property="og:title" content="Service Areas | Hubby Pest Control | East Valley Arizona">
<meta property="og:description" content="Hubby Pest Control serves Gilbert, Chandler, Queen Creek, Mesa, Tempe, and San Tan Valley, AZ. Professional pest control subscription starting at $49/month across all of East Valley Arizona.">
<meta property="og:site_name" content="Hubby Pest Control">
<meta name="twitter:card" content="summary_large_image">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
<meta name="geo.region" content="US-AZ">
<meta name="geo.placename" content="Gilbert, Arizona">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":["LocalBusiness","PestControlService"],
"name":"Hubby Pest Control, LLC","url":"https://www.hubbypestcontrol.com",
"telephone":"+14808453833","email":"blake@hubbypestcontrol.com",
"description":"Hubby Pest Control serves Gilbert, Chandler, Queen Creek, Mesa, Tempe, and San Tan Valley, AZ. Professional pest control subscription starting at $49/month across all of East Valley Arizona.",
"priceRange":"$49-$89/month",
"areaServed":[{"@type":"City","name":"Gilbert"},{"@type":"City","name":"Chandler"},{"@type":"City","name":"Queen Creek"},{"@type":"City","name":"Mesa"},{"@type":"City","name":"Tempe"},{"@type":"City","name":"San Tan Valley"}],
"address":{"@type":"PostalAddress","addressLocality":"Gilbert","addressRegion":"AZ","addressCountry":"US"},
"aggregateRating":{"@type":"AggregateRating","ratingValue":"4.9","reviewCount":"127","bestRating":"5"}}
</script>
        <?php
    }
}
add_action('wp_head', 'hubby_service_areas_page_meta', 1);

get_header();
get_template_part('template-parts/service-areas/content', 'service-areas');
get_footer();
