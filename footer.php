<?php
/**
 * Global site footer based on the approved homepage footer.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
</main>
<footer>
    <div class="footer-grid">
        <div>
            <a class="footer-brand-row" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(HUBBY_THEME_URI . '/assets/images/hubby-logo-v13.png'); ?>" alt="<?php esc_attr_e('Hubby', 'hubby-pest'); ?>">
                <span class="fb-name"><strong>Hubby</strong><span><?php esc_html_e('Pest Control', 'hubby-pest'); ?></span></span>
            </a>
            <p class="footer-about"><?php esc_html_e("Professional pest control on a flat monthly subscription. No contracts, no surprises, no price hikes. East Valley's top-rated pest protection. Licensed and insured in Arizona.", 'hubby-pest'); ?></p>
        </div>
        <div class="footer-col">
            <h6><?php esc_html_e('Services', 'hubby-pest'); ?></h6>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_services',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => 'hubby_footer_services_fallback_menu',
                'depth' => 1,
            ]);
            ?>
        </div>
        <div class="footer-col">
            <h6><?php esc_html_e('Company', 'hubby-pest'); ?></h6>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_company',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => 'hubby_footer_company_fallback_menu',
                'depth' => 1,
            ]);
            ?>
        </div>
        <div class="footer-col">
            <h6><?php esc_html_e('Contact', 'hubby-pest'); ?></h6>
            <ul>
                <li><a href="tel:4802700122">(480) 270-0122</a></li>
                <li><?php esc_html_e('East Valley, Arizona', 'hubby-pest'); ?></li>
                <li><a href="#"><?php esc_html_e('@hubby.pest', 'hubby-pest'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'hubby-pest'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© <?php echo esc_html(wp_date('Y')); ?> <?php esc_html_e('Hubby Pest Control LLC · Licensed & Insured · Arizona Office of Pest Management', 'hubby-pest'); ?></p>
        <div class="footer-social">
            <a href="#" class="fsoc" aria-label="<?php esc_attr_e('Instagram', 'hubby-pest'); ?>">📷</a><a href="#" class="fsoc" aria-label="<?php esc_attr_e('Facebook', 'hubby-pest'); ?>">f</a><a href="#" class="fsoc" aria-label="<?php esc_attr_e('TikTok', 'hubby-pest'); ?>">♪</a>
        </div>
    </div>
    <div class="footer-proof-row">
        <div class="footer-proof-item">
            <span class="footer-proof-icon">🛡</span>
            <div>
                <div class="footer-proof-title"><?php esc_html_e('LICENSED & INSURED', 'hubby-pest'); ?></div>
                <div class="footer-proof-sub"><?php esc_html_e('AZ Structural Pest Control Board', 'hubby-pest'); ?></div>
            </div>
        </div>
        <div class="footer-proof-divider"></div>
        <div class="footer-proof-item">
            <svg width="20" height="20" viewBox="0 0 48 48" fill="#4285F4" aria-hidden="true" focusable="false"><path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></svg>
            <div>
                <div style="display:flex;align-items:center;gap:4px">
                    <span style="font-size:13px;font-weight:700;color:#fff">4.9</span>
                    <span style="color:#FBBC04;font-size:12px">★★★★★</span>
                </div>
                <div class="footer-proof-sub"><?php esc_html_e('127 Google Reviews', 'hubby-pest'); ?></div>
            </div>
        </div>
        <div class="footer-proof-divider"></div>
        <div class="footer-proof-item">
            <span class="footer-proof-icon">🏠</span>
            <div>
                <div class="footer-proof-title"><?php esc_html_e('LOCALLY OWNED', 'hubby-pest'); ?></div>
                <div class="footer-proof-sub"><?php esc_html_e('East Valley, Arizona', 'hubby-pest'); ?></div>
            </div>
        </div>
        <div class="footer-proof-divider"></div>
        <div class="footer-proof-item">
            <span class="footer-proof-icon">✅</span>
            <div>
                <div class="footer-proof-title"><?php esc_html_e('BACKGROUND CHECKED', 'hubby-pest'); ?></div>
                <div class="footer-proof-sub"><?php esc_html_e('Every technician verified', 'hubby-pest'); ?></div>
            </div>
        </div>
    </div>
    <div class="footer-trustline">
        <span>🛡 <?php esc_html_e('LICENSED & INSURED · AZ', 'hubby-pest'); ?></span>
        <span class="sep">|</span>
        <span>⭐ <?php esc_html_e('4.9 · 127 GOOGLE REVIEWS', 'hubby-pest'); ?></span>
        <span class="sep">|</span>
        <span>✅ <?php esc_html_e('BACKGROUND-CHECKED TECHS', 'hubby-pest'); ?></span>
        <span class="sep">|</span>
        <span>🏠 <?php esc_html_e('LOCALLY OWNED · EAST VALLEY', 'hubby-pest'); ?></span>
    </div>
</footer>
<div id="sticky-cta">
    <div>
        <div style="font-size:14px;font-weight:700;color:#fff"><?php esc_html_e('Hubby Pest Control — East Valley AZ', 'hubby-pest'); ?></div>
        <div style="font-size:12px;color:rgba(255,255,255,.5)"><?php esc_html_e('Starting at $49/mo · No contracts · Price locked', 'hubby-pest'); ?></div>
    </div>
    <div style="display:flex;gap:12px;align-items:center">
        <a href="tel:4808453833" style="font-size:14px;font-weight:700;color:#0094FF;text-decoration:none">📞 480-845-3833</a>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" style="background:linear-gradient(135deg,#0094FF,#0077CC);color:#fff;padding:10px 24px;border-radius:4px;font-weight:700;font-size:13px;text-decoration:none;letter-spacing:.04em;text-transform:uppercase;box-shadow:0 4px 16px rgba(0,148,255,.3)"><?php esc_html_e('Get Free Quote →', 'hubby-pest'); ?></a>
    </div>
</div>
<script>
window.addEventListener('scroll',function(){
    var bar = document.getElementById('sticky-cta');
    if (!bar) return;
    if (window.scrollY > 400 && window.scrollY < document.body.scrollHeight - window.innerHeight - 200) {
        bar.style.bottom = '0';
    } else {
        bar.style.bottom = '-72px';
    }
});
</script>
<?php wp_footer(); ?>
</body>
</html>
