<?php
/**
 * Service Areas page content.
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
        'zips'  => '85201, 85202, 85203, 85204, 85205, 85206, 85207, 85208, 85209, 85210, 85212, 85213',
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
<div class="page-hero">
    <div class="page-hero-label">Service Areas</div>
    <h1>Protecting Every Corner<br><span>of East Valley AZ.</span></h1>
    <p>Hubby Pest Control serves all of East Valley Arizona — from Gilbert and Chandler to Queen Creek, Mesa, Tempe, and San Tan Valley. Same price, same quality, same technician everywhere we serve.</p>
</div>
<div class="breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> → Service Areas</div>

<section style="background:#080808">
    <div class="sec-lbl">Coverage Map</div>
    <h2 class="sec-h2">All Service Areas.</h2>
    <p class="sec-sub">Click any city below for local pest information, neighborhood coverage details, and to request a quote specific to your area.</p>

    <div class="grid-3">
        <?php foreach ($areas as $area) :
            $page_url = home_url('/' . $area['slug'] . '-pest-control/');
        ?>
        <a href="<?php echo esc_url($page_url); ?>" style="text-decoration:none">
            <div class="card" style="text-align:center;padding:28px;cursor:pointer">
                <div style="font-family:'Bebas Neue',cursive;font-size:28px;color:#fff;letter-spacing:1px;margin-bottom:6px">
                    <?php echo esc_html($area['name']); ?>
                </div>
                <div style="font-size:11px;color:var(--blue);font-weight:600;margin-bottom:10px;letter-spacing:.08em;text-transform:uppercase">
                    <?php echo $area['pests']; ?>
                </div>
                <p style="font-size:12px;color:var(--muted)">
                    <?php esc_html_e('Zip:', 'hubby-pest'); ?> <?php echo esc_html($area['zips']); ?>
                </p>
                <div style="font-size:12px;font-weight:700;color:var(--blue);margin-top:12px">
                    <?php esc_html_e('View service page →', 'hubby-pest'); ?>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>

    <div style="margin-top:32px;padding:24px;background:#0d0d0d;border:1px solid rgba(0,148,255,.15);border-radius:10px;text-align:center">
        <p style="font-size:14px;color:var(--muted);margin-bottom:12px">
            <?php esc_html_e("Don't see your city listed? Call us — we may still cover your area.", 'hubby-pest'); ?>
        </p>
        <a href="<?php echo esc_url(hubby_get_phone_uri()); ?>" style="font-size:16px;font-weight:700;color:var(--blue);text-decoration:none">
            📞 <?php echo esc_html(hubby_get_phone()); ?>
        </a>
    </div>
</section>

<div class="cta-strip">
    <h2><?php esc_html_e('Is Your Home in Our Service Area?', 'hubby-pest'); ?></h2>
    <p><?php esc_html_e("Call or fill out a quote and we'll confirm coverage for your address in minutes.", 'hubby-pest'); ?></p>
    <div class="cta-btns">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-white">
            <?php esc_html_e('Get My Free Quote →', 'hubby-pest'); ?>
        </a>
        <a href="<?php echo esc_url(hubby_get_phone_uri()); ?>" class="btn-outline-w">
            📞 <?php echo esc_html(hubby_get_phone()); ?>
        </a>
    </div>
</div>
