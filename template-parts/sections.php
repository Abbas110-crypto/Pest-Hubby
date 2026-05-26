<?php
/**
 * Shared section renderers.
 */

if (!defined('ABSPATH')) {
    exit;
}

function hubby_section_label(string $label): void
{
    printf('<div class="section-label">%s</div>', esc_html($label));
}

function hubby_render_services_grid(): void
{
    echo '<div class="pests-grid">';
    foreach (hubby_services() as $slug => $service) {
        printf(
            '<a class="pest-card" href="%s"><div class="pest-icon">%s</div><div class="pest-info"><h3>%s</h3><p>%s</p><span class="pest-tag">%s</span></div></a>',
            esc_url(home_url('/' . $slug . '/')),
            esc_html(strtoupper(substr($service['title'], 0, 1))),
            esc_html($service['title']),
            esc_html($service['short']),
            esc_html($service['tag'])
        );
    }
    echo '</div>';
}

function hubby_render_pricing_cards(): void
{
    echo '<div class="pricing-grid">';
    foreach (hubby_plans() as $plan) {
        $classes = $plan['featured'] ? 'plan-card featured' : 'plan-card';
        printf('<article class="%s">', esc_attr($classes));
        if ($plan['featured']) {
            echo '<div class="plan-ribbon">Most Popular</div>';
        }
        printf('<div class="ptier">%s</div>', esc_html($plan['name'] . ' - ' . $plan['note']));
        printf('<div class="price"><span>$</span>%s</div><div class="plan-mo">per month</div>', esc_html($plan['price']));
        echo '<ul class="plan-feats">';
        foreach ($plan['features'] as $feature) {
            printf('<li><span class="pcheck">&check;</span>%s</li>', esc_html($feature));
        }
        echo '</ul>';
        printf('<a href="%s" class="pbt">%s</a>', esc_url(home_url('/pricing/#free-quote')), esc_html__('Get a Free Quote', 'hubby-pest'));
        echo '</article>';
    }
    echo '</div>';
}

function hubby_render_quote_shell(): void
{
    ?>
    <section id="free-quote" class="quote-section reveal">
        <?php hubby_section_label('Free Quote'); ?>
        <h2><?php esc_html_e('Tell Us About Your Home.', 'hubby-pest'); ?></h2>
        <p class="section-sub"><?php esc_html_e('Share a few details and choose your monthly protection plan. Our team will confirm your service address and first treatment window.', 'hubby-pest'); ?></p>
        <form class="quote-form" action="<?php echo esc_url(home_url('/thank-you/')); ?>" method="get">
            <div class="form-step is-active" data-step="1">
                <div class="form-grid">
                    <label>First Name<input name="first_name" autocomplete="given-name" required></label>
                    <label>Last Name<input name="last_name" autocomplete="family-name" required></label>
                    <label>Email<input type="email" name="email" autocomplete="email" required></label>
                    <label>Phone<input type="tel" name="phone" autocomplete="tel" data-phone required></label>
                    <label class="wide">Service Address<input name="address" autocomplete="street-address" required></label>
                    <label>City<select name="city" required><option value="">Choose city</option><?php foreach (hubby_locations() as $city) : ?><option><?php echo esc_html($city); ?></option><?php endforeach; ?></select></label>
                    <label>Home Size<select name="home_size" required><option value="">Choose size</option><option>Under 2,000 sq ft</option><option>2,000-3,500 sq ft</option><option>3,500+ sq ft</option></select></label>
                </div>
                <button type="button" class="pbt next-step">Choose Plan</button>
            </div>
            <div class="form-step" data-step="2">
                <div class="plan-options">
                    <?php foreach (hubby_plans() as $plan) : ?>
                        <label class="plan-option"><input type="radio" name="plan" value="<?php echo esc_attr($plan['name']); ?>" required><span><?php echo esc_html($plan['name']); ?></span><strong>$<?php echo esc_html($plan['price']); ?>/mo</strong></label>
                    <?php endforeach; ?>
                    <label class="addon-option"><input type="checkbox" name="weed_spray" value="yes"><span><?php esc_html_e('Add Weed Spray', 'hubby-pest'); ?></span><strong>$29/mo</strong></label>
                </div>
                <div class="form-actions"><button type="button" class="ghost-step prev-step">Back</button><button type="submit" class="pbt">Continue to Confirmation</button></div>
            </div>
        </form>
    </section>
    <?php
}

function hubby_render_faqs(): void
{
    echo '<section class="faq-section reveal" id="faq">';
    hubby_section_label('FAQ');
    echo '<h2>Questions Answered.</h2><p class="section-sub">Everything you want to know before getting started.</p><div class="faq-grid">';
    foreach (hubby_faqs() as [$question, $answer]) {
        printf('<div class="faq-item"><div class="faq-q">%s</div><p class="faq-a">%s</p></div>', esc_html($question), esc_html($answer));
    }
    echo '</div></section>';
}

function hubby_render_pricing_prototype(): void
{
    ?>
    <section class="pricing" id="pricing">
        <div class="kk">Subscription Plans</div>
        <h2>NO CONTRACTS.<br>NO SURPRISES.<br>NO FINE PRINT.</h2>
        <p class="sp">Flat monthly rate based on your home size. All chemicals, all materials, and free retreatments between visits - included. Price locked from day one. Cancel any time.</p>
        <div class="plg">
            <div class="pl">
                <div class="ptier">Essential - Up to 2,000 sq ft</div><div class="ppr">$49</div><div class="pmo">per month - bi-monthly service (6x/year)</div><div class="pdiv"></div>
                <ul class="pfl"><li><span class="pck">&check;</span>6 bi-monthly exterior treatments/year</li><li><span class="pck">&check;</span>General pest & scorpion barrier</li><li><span class="pck">&check;</span>All chemicals & materials included</li><li><span class="pck">&check;</span>AZ licensed technician</li><li><span class="pck">&check;</span>Digital service report every visit</li><li><span class="pck">&check;</span>Cancel any time - no contract</li></ul>
                <a href="#free-quote" class="pbt">Get a Free Quote &rarr;</a>
            </div>
            <div class="pl feat">
                <div class="pbadge">Most Popular</div>
                <div class="ptier">Plus - 2,000-3,500 sq ft</div><div class="ppr">$65</div><div class="pmo">per month - bi-monthly service (6x/year)</div><div class="pdiv"></div>
                <ul class="pfl"><li><span class="pck">&check;</span>Everything in Essential</li><li><span class="pck">&check;</span>Interior & exterior treatment</li><li><span class="pck">&check;</span>Spider web removal every visit</li><li><span class="pck">&check;</span>Same dedicated technician</li><li><span class="pck">&check;</span>Text updates & arrival window</li><li><span class="pck">&check;</span>Monthly service upgrade available</li></ul>
                <a href="#free-quote" class="pbt">Get a Free Quote &rarr;</a>
            </div>
            <div class="pl">
                <div class="ptier">Premium - 3,500+ sq ft / Custom</div><div class="ppr">$89</div><div class="pmo">per month - bi-monthly service (6x/year)</div><div class="pdiv"></div>
                <ul class="pfl"><li><span class="pck">&check;</span>Everything in Plus</li><li><span class="pck">&check;</span>Larger home full-perimeter treatment</li><li><span class="pck">&check;</span>Rodent monitoring stations</li><li><span class="pck">&check;</span>Same dedicated technician always</li><li><span class="pck">&check;</span>Priority emergency callback</li><li><span class="pck">&check;</span>Annual home pest assessment report</li></ul>
                <a href="#free-quote" class="pbt">Get a Free Quote &rarr;</a>
            </div>
        </div>
        <div class="addon-grid">
            <div class="addon-card"><div class="addon-icon">R</div><h3>Rodent Control</h3><p>Entry-point exclusion, monitoring station setup, and ongoing monthly monitoring. Available on any plan.</p><div class="addon-price">+$25<span>/mo</span></div><div class="addon-tag">Add to Any Plan</div></div>
            <div class="addon-card"><div class="addon-icon">M</div><h3>Mosquito Treatment</h3><p>Monthly larvicidal and adult population control. Yard stays comfortable all season - March through October.</p><div class="addon-price">+$49<span>/mo</span></div><div class="addon-tag">Mar - Oct Only</div></div>
            <div class="addon-card"><div class="addon-icon">W</div><h3>Weed Spray</h3><p>Pre-emergent and post-emergent spot spray for driveways, rock beds, and property perimeter. Same tech, same visit.</p><div class="addon-price">+$29<span>/mo</span></div><div class="addon-tag">Add to Any Plan</div></div>
        </div>
        <div class="price-lock"><span>LOCK</span><div><h3>Price-Lock Guarantee</h3><p>The rate you sign up at is the rate you keep - forever. We never raise prices on existing subscribers. If our pricing ever changes for new customers, you stay at your original rate. Period.</p></div></div>
    </section>
    <?php
}

function hubby_render_quote_prototype(): void
{
    ?>
    <section id="free-quote" class="free-quote-prototype">
        <div class="kk">Get Your Quote</div>
        <h2>FREE INSPECTION.<br>EXACT PRICE.<br>SAME DAY CALL.</h2>
        <p class="sp">Tell us about your home and we'll give you an exact monthly rate - no vague estimates, no surprise fees. Our team reviews every request within 2 hours during business hours.</p>
        <div class="quote-prototype-grid">
            <div class="quote-steps">
                <div><strong>01</strong><span><b>Submit Your Info</b>Name, address, home size, and what pests you're seeing. Takes 60 seconds.</span></div>
                <div><strong>02</strong><span><b>We Review & Call You</b>Our team reviews in person or via satellite view and calls you with your exact monthly rate within 2 hours.</span></div>
                <div><strong>03</strong><span><b>First Visit in 48 Hours</b>Once you approve your rate, your licensed Hubby technician is at your door within 48 hours.</span></div>
            </div>
            <form class="quote-visual-form" action="<?php echo esc_url(home_url('/thank-you/')); ?>" method="get">
                <label><span>Full Name</span><input name="name" placeholder="Your name" required></label>
                <label><span>Service Address</span><input name="address" placeholder="Street address, city, zip" required></label>
                <div class="quote-two"><label><span>Home Size</span><select name="home_size" required><option>Select sq footage</option><option>Up to 2,000 sq ft</option><option>2,000-3,500 sq ft</option><option>3,500+ sq ft</option></select></label><label><span>Phone Number</span><input type="tel" name="phone" data-phone placeholder="(480)" required></label></div>
                <label><span>Pests You're Seeing</span><input name="pests" placeholder="Scorpions, roaches, rodents, other..."></label>
                <button class="pbt submit-quote" type="submit">Submit for Free Quote &rarr;</button>
                <div class="quote-call">Or call us directly: (480) 270-0122</div>
            </form>
        </div>
    </section>
    <?php
}

function hubby_render_compare_prototype(): void
{
    ?>
    <section class="compare-section reveal" id="compare">
        <div class="section-label">How We Compare</div>
        <h2>Hubby vs.<br>The Other Guys.</h2>
        <p class="section-sub">The details most companies won't advertise - because they can't. Here's how Hubby stacks up against the biggest names in the East Valley.</p>
        <div class="compare-callout">
            <div class="competitor-card">
                <div class="mini-label">A Real 6,500 Sq Ft East Valley Home</div><h3>Green Mango</h3><div class="big-price">$268<span>/quarter</span></div><p>$1,072/year - 4 visits/year - Contract required<br>$268 per visit - Pricing hidden until you call</p>
                <ul><li>Price not shown on website</li><li>Annual contract required</li><li>Rotating technicians</li><li>Prices can increase after Year 1</li></ul>
            </div>
            <div class="hubby-card">
                <div class="mini-label">Same Home. Same Protection. Better Deal.</div><h3>Hubby Pest Control</h3><div class="big-price">$109<span>/month</span></div><p>$1,308/year - <strong>6 visits/year</strong> - No contract ever<br><strong>$218 per visit</strong> - Price shown right here</p>
                <ul><li><strong>$50 less per visit</strong> than Green Mango</li><li><strong>2 more visits per year</strong> included</li><li>Same licensed tech every single visit</li><li>Price locked - never increases</li></ul>
            </div>
        </div>
        <div class="math-banner"><div>The Math Nobody Talks About</div><span><b>$268</b><small>Green Mango / Visit</small></span><em>vs</em><span><b>$218</b><small>Hubby / Visit</small></span><strong>$50 Less Per Visit<br><small>+ 2 Extra Visits Per Year</small></strong></div>
        <table class="compare-table">
            <thead><tr><th></th><th class="hc">Hubby</th><th>Green Mango</th><th>Terminix</th><th>Bulwark</th><th>Hawx</th></tr></thead>
            <tbody>
                <tr><td>Pricing shown on website</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td></tr>
                <tr><td>Cost per visit (6,500 sq ft home)</td><td class="hc">$218</td><td>$268</td><td>Quote only</td><td>Quote only</td><td>Quote only</td></tr>
                <tr><td>Visits per year (standard plan)</td><td class="hc">6 visits</td><td>4 visits</td><td>4-6</td><td>4-6</td><td>4-6</td></tr>
                <tr><td>No contracts required</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td></tr>
                <tr><td>Price-lock guarantee</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td></tr>
                <tr><td>Same technician every visit</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td></tr>
                <tr><td>Digital service report after every visit</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td><td><span class="ico-no">-</span></td></tr>
                <tr><td>Local East Valley team</td><td class="hc"><span class="ico-yes">&check;</span></td><td><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td><td><span class="ico-yes">&check;</span></td><td><span class="ico-no">-</span></td></tr>
            </tbody>
        </table>
    </section>
    <?php
}
