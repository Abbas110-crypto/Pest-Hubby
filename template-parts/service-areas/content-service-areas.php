<?php
/**
 * Enhanced Service Areas page content.
 */
if (!defined('ABSPATH')) {
    exit;
}

$areas = [
    [
        'slug'  => 'gilbert',
        'name'  => 'Gilbert',
        'pests' => 'Scorpions &amp; Bark Scorpions',
        'zips'  => '85234, 85233, 85295, 85296, 85297, 85298',
    ],
    [
        'slug'  => 'chandler',
        'name'  => 'Chandler',
        'pests' => 'Scorpions, Ants &amp; Cockroaches',
        'zips'  => '85224, 85225, 85226, 85248, 85286',
    ],
    [
        'slug'  => 'queen-creek',
        'name'  => 'Queen Creek',
        'pests' => 'Scorpions &amp; Roof Rats',
        'zips'  => '85142, 85140',
    ],
    [
        'slug'  => 'mesa',
        'name'  => 'Mesa',
        'pests' => 'Scorpions, Ants &amp; Roof Rats',
        'zips'  => '85201, 85202, 85203, 85204, 85205, 85206, 85207, 85208',
    ],
    [
        'slug'  => 'tempe',
        'name'  => 'Tempe',
        'pests' => 'Mosquitoes &amp; Cockroaches',
        'zips'  => '85281, 85282, 85283, 85284, 85285',
    ],
    [
        'slug'  => 'san-tan-valley',
        'name'  => 'San Tan Valley',
        'pests' => 'Scorpions',
        'zips'  => '85140, 85143',
    ],
];
?>

<style>

.service-card{
    background:#0d0d0d;
    border:1px solid rgba(255,255,255,.08);
    border-radius:14px;
    padding:30px;
    text-align:center;
    transition:all .35s ease;
    height:100%;
}

.service-card:hover{
    transform:translateY(-8px);
    border-color:var(--blue);
    box-shadow:0 10px 30px rgba(0,148,255,.15);
}

.service-card-title{
    font-family:'Bebas Neue',cursive;
    font-size:30px;
    color:#fff;
    margin-bottom:8px;
    letter-spacing:1px;
}

.service-card-pest{
    font-size:12px;
    color:var(--blue);
    font-weight:600;
    text-transform:uppercase;
    margin-bottom:14px;
    letter-spacing:.08em;
}

.service-card-zip{
    font-size:13px;
    color:var(--muted);
}

.service-link{
    display:inline-block;
    margin-top:16px;
    color:var(--blue);
    font-weight:700;
}

.service-card-icon{
    font-size:32px;
    margin-bottom:12px;
}

.service-area-link{
    text-decoration:none;
}

.coverage-box{
    margin-top:40px;
    padding:30px;
    background:#0d0d0d;
    border:1px solid rgba(0,148,255,.15);
    border-radius:12px;
    text-align:center;
}

</style>

<div class="page-hero">
    
    <div class="page-hero-label">
        Service Areas
    </div>

    <h1>
        Protecting Every Corner<br>
        <span>of East Valley AZ.</span>
    </h1>

    <p>
        Hubby Pest Control serves all of East Valley Arizona — 
        from Gilbert and Chandler to Queen Creek, Mesa, Tempe, 
        and San Tan Valley.
    </p>

</div>


<div class="breadcrumb">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        Home
    </a>
    →
    Service Areas
</div>


<section style="background:#080808">

    <div class="sec-lbl">
        Coverage Map
    </div>

    <h2 class="sec-h2">
        All Service Areas
    </h2>

    <p class="sec-sub">
        Click any city below for local pest information and coverage details.
    </p>


<div class="grid-3">

<?php foreach($areas as $area): 

$page_url = home_url('/'.$area['slug'].'-pest-control/');

?>

<a 
class="service-area-link"
href="<?php echo esc_url($page_url); ?>"
aria-label="<?php echo esc_attr('View '.$area['name'].' service page'); ?>"
>

<article class="service-card">

<div class="service-card-icon">
📍
</div>

<div class="service-card-title">
<?php echo esc_html($area['name']); ?>
</div>

<div class="service-card-pest">
<?php echo wp_kses_post($area['pests']); ?>
</div>

<p class="service-card-zip">
<?php esc_html_e('Zip:', 'hubby-pest'); ?>
<?php echo esc_html($area['zips']); ?>
</p>

<div class="service-link">
View Service Page →
</div>

</article>

</a>

<?php endforeach; ?>

</div>


<div class="coverage-box">

<p style="font-size:14px;color:var(--muted);margin-bottom:15px;">

<?php esc_html_e(
"Don't see your city listed? Call us — we may still cover your area.",
'hubby-pest'
); ?>

</p>

<a
href="<?php echo esc_url(hubby_get_phone_uri()); ?>"
style="font-size:18px;font-weight:700;color:var(--blue);text-decoration:none"
>

📞 <?php echo esc_html(hubby_get_phone()); ?>

</a>

</div>

</section>



<div class="cta-strip">

<h2>
<?php esc_html_e(
'Is Your Home in Our Service Area?',
'hubby-pest'
); ?>
</h2>

<p>
<?php esc_html_e(
"Call or fill out a quote and we'll confirm coverage for your address in minutes.",
'hubby-pest'
); ?>
</p>

<div class="cta-btns">

<a 
href="<?php echo esc_url(home_url('/contact/')); ?>" 
class="btn-white"
>
Get My Free Quote →
</a>

<a 
href="<?php echo esc_url(hubby_get_phone_uri()); ?>"
class="btn-outline-w"
>
📞 <?php echo esc_html(hubby_get_phone()); ?>
</a>

</div>

</div>