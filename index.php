<?php
/**
 * Template Name: HomePage
 * AccessiKey — Home Page
 * Mirrors the ACF flexible content layout: hero_block → features_cards_block →
 * offer → how_it_works → compliance → faq_block → cta + footer
 */

require_once __DIR__ . '/includes/config.php';

$page_title = 'AccessiKey — Accessibility that feels effortless';
$hero       = $page_data['hero'];
$features   = $page_data['features'];
$offer      = $page_data['offer'];
$hiw        = $page_data['how_it_works'];
$compliance = $page_data['compliance'];
$faq        = $page_data['faq'];

require_once __DIR__ . '/template-parts/header.php';
?>

<!-- ========================
     HERO BLOCK
     ACF layout: hero_block
     ======================== -->
<section class="hero" id="home" aria-label="Hero">
  <div class="hero-bg" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-orb hero-orb-1" aria-hidden="true"></div>
  <div class="hero-orb hero-orb-2" aria-hidden="true"></div>

  <div class="container">
    <div class="hero-inner">

      <!-- Left: content -->
      <div class="hero-content">
        <div class="hero-eyebrow">
          <span class="dot" aria-hidden="true"></span>
          <?= esc_html($hero['eyebrow_text']) ?>
        </div>

        <h1 class="hero-heading">
          <?= esc_html($hero['hero_heading']) ?><br>
          <span class="highlight hero-type"><?= esc_html($hero['hero_heading_2']) ?></span>
        </h1>

        <p class="hero-desc"><?= esc_html($hero['hero_description']) ?></p>

        <div class="hero-actions">
          <?php render_button($hero['yellow_button']['title'], $hero['yellow_button']['url'], 'gold'); ?>
          <?php render_button($hero['white_button']['title'], $hero['white_button']['url'], 'outline'); ?>
        </div>

        <div class="hero-stats" role="list" aria-label="Platform statistics">
          <?php foreach ($hero['stats'] as $stat): ?>
          <div class="stat-item" role="listitem">
            <div class="stat-num">
              <span data-count="<?= $stat['num'] ?>" data-suffix="<?= esc_attr($stat['suffix']) ?>">0</span>
            </div>
            <div class="stat-label"><?= esc_html($stat['label']) ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: visual card — mirrors ACF right_side_image_card -->
      <div class="hero-visual" aria-hidden="true">
        <div class="hero-card">
          <div class="card-shield">
            <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M40 4L8 18v22c0 18 13.6 34.8 32 39 18.4-4.2 32-21 32-39V18L40 4z" fill="rgba(245,197,24,0.15)" stroke="#F5C518" stroke-width="1.5"/>
              <circle cx="40" cy="30" r="8" fill="#F5C518" opacity="0.9"/>
              <path d="M30 48c0-5.5 4.5-10 10-10s10 4.5 10 10" stroke="#F5C518" stroke-width="2" stroke-linecap="round"/>
              <path d="M34 36l3 3 9-9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="card-title">Accessibility Shield</div>
          <div class="card-sub">Your site, protected & inclusive</div>

          <div class="card-features">
            <div class="card-feat">
              <div class="card-feat-icon" aria-hidden="true">👁️</div>
              <div class="card-feat-text">Low Vision Mode</div>
              <div class="card-feat-badge">Active</div>
            </div>
            <div class="card-feat">
              <div class="card-feat-icon" aria-hidden="true">🎨</div>
              <div class="card-feat-text">Contrast Booster</div>
              <div class="card-feat-badge">Ready</div>
            </div>
            <div class="card-feat">
              <div class="card-feat-icon" aria-hidden="true">⌨️</div>
              <div class="card-feat-text">Keyboard Navigation</div>
              <div class="card-feat-badge">Active</div>
            </div>
            <div class="card-feat">
              <div class="card-feat-icon" aria-hidden="true">📖</div>
              <div class="card-feat-text">Reading Guide</div>
              <div class="card-feat-badge">Ready</div>
            </div>
          </div>
        </div>

        <div class="hero-badge" aria-label="WCAG 2.2 Compliant">
          WCAG 2.2
          <small>Compliant ✓</small>
        </div>
      </div>

    </div><!-- /.hero-inner -->
  </div>
</section>

<!-- ========================
     PLATFORM SLIDING BAR
     ACF layout: sliding_image
     ======================== -->
<div class="platform-bar" aria-label="Platform integrations">
  <div class="container">
    <div class="platform-label">Platform</div>
    <div class="platform-track-wrap">
      <?php
      $platform_items = [
        ['label' => 'Team Lead',   'dot' => 'green',  'avatar' => 'TL'],
        ['label' => 'UX/UI',       'dot' => 'yellow', 'avatar' => 'UX'],
        ['label' => 'Team Lead',   'dot' => 'green',  'avatar' => 'TL'],
        ['label' => 'UX/UI',       'dot' => 'blue',   'avatar' => 'UX'],
        ['label' => 'Developer',   'dot' => 'green',  'avatar' => 'DE'],
        ['label' => 'QA Engineer', 'dot' => 'yellow', 'avatar' => 'QA'],
        ['label' => 'Product',     'dot' => 'green',  'avatar' => 'PM'],
        ['label' => 'Designer',    'dot' => 'blue',   'avatar' => 'DS'],
      ];
      // Duplicate for seamless loop
      $items_doubled = array_merge($platform_items, $platform_items);
      ?>
      <div class="platform-track" role="list" aria-label="Team roles">
        <?php foreach ($items_doubled as $item): ?>
        <div class="platform-item" role="listitem">
          <div class="pi-avatar" style="background:<?= $item['dot'] === 'green' ? '#22c55e' : ($item['dot'] === 'yellow' ? '#F5C518' : '#3b82f6') ?>">
            <?= esc_html($item['avatar']) ?>
          </div>
          <div class="pi-dot pi-dot-<?= esc_attr($item['dot']) ?>" aria-hidden="true"></div>
          <?= esc_html($item['label']) ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>


<!-- ========================
     OFFER / FREE TRIAL
     ACF layout: hero_block (offer variant)
     ======================== -->
<section class="section offer-section section-dark" id="trial" aria-label="Free trial offer">
  <div class="container">
    <div class="offer-inner reveal">
      <div class="offer-content">
        <div class="offer-tag"><?= esc_html($offer['tag']) ?></div>
        <h2 class="offer-heading">
          <?php
            // Bold first part, highlight key phrase
            $parts = explode(' — ', $offer['heading'], 2);
            echo esc_html($parts[0]);
            if (isset($parts[1])) {
              echo ' — <span class="highlight">' . esc_html($parts[1]) . '</span>';
            }
          ?>
        </h2>
        <p class="offer-desc"><?= esc_html($offer['desc']) ?></p>
        <ul class="offer-bullets" role="list">
          <?php foreach ($offer['bullets'] as $b): ?>
          <li role="listitem"><?= esc_html($b) ?></li>
          <?php endforeach; ?>
        </ul>
        <div class="offer-actions">
          <?php render_button($offer['yellow_button']['title'], $offer['yellow_button']['url'], 'gold'); ?>
          <?php render_button($offer['white_button']['title'],  $offer['white_button']['url'],  'outline'); ?>
        </div>
      </div>

      <!-- Offer image placeholder (ACF: hero_description image field) -->
      <div class="offer-image" aria-hidden="true">
        <div class="offer-image-placeholder">
          <span>💻</span>
          <p>Pro Dashboard</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ========================
     FEATURES CARDS BLOCK
     ACF layout: features_cards_block
     ======================== -->
<section class="section features-section" id="features" aria-label="Features">
  <div class="container">
    <div class="section-header reveal">
      <div class="text">
        <span class="eyebrow">Features</span>
        <h2>
          <?php
            $heading = $features['features_cards_heading'];
            // Split to highlight last part
            $pos = strrpos($heading, 'inclusive');
            if ($pos !== false) {
              echo esc_html(substr($heading, 0, $pos))
                 . '<span class="highlight">' . esc_html(substr($heading, $pos)) . '</span>';
            } else {
              echo esc_html($heading);
            }
          ?>
        </h2>
        <p><?= esc_html($features['description_']) ?></p>
      </div>
      <a href="<?= esc_url($features['explore_btn']['url']) ?>" class="btn btn-outline btn-sm">
        <?= esc_html($features['explore_btn']['title']) ?>
      </a>
    </div>

    <div class="features-grid" role="list">
      <?php foreach ($features['features_card_section'] as $i => $card): ?>
      <article class="feat-card reveal reveal-delay-<?= ($i % 3) + 1 ?> <?= $i === 0 ? 'featured' : '' ?>" role="listitem" aria-label="<?= esc_attr($card['heading']) ?>">
        <div class="feat-icon" aria-hidden="true"><?= $card['heading_icon'] ?></div>
        <h4><?= esc_html($card['heading']) ?></h4>
        <p><?= esc_html($card['description']) ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ========================
     HOW IT WORKS
     ACF layout: steps / content_section
     ======================== -->
<section class="section how-section" id="how-it-works" aria-label="How it works">
  <div class="container">
    <div class="section-header reveal" style="justify-content:space-between;align-items:center">
      <div class="text">
        <span class="eyebrow">Process</span>
        <h2><?= esc_html($hiw['heading']) ?></h2>
        <p><?= esc_html($hiw['desc']) ?></p>
      </div>
      <a href="/" class="btn btn-outline btn-sm">Home</a>
    </div>

    <div class="steps-grid" role="list">
      <?php foreach ($hiw['steps'] as $i => $step): ?>
      <div class="step-card reveal reveal-delay-<?= $i + 1 ?>" role="listitem">
        <div class="step-num" aria-label="Step <?= esc_html($step['num']) ?>"><?= esc_html($step['num']) ?></div>
        <h4><?= esc_html($step['title']) ?></h4>
        <p><?= esc_html($step['desc']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ========================
     GLOBAL COMPLIANCE
     ACF layout: content_section / cta_section
     ======================== -->
<section class="section compliance-section" id="compliance" aria-label="Global compliance">
  <div class="container">
    <div class="compliance-inner">

      <div class="compliance-visual reveal">
        <div class="compliance-img-placeholder" role="img" aria-label="Global accessibility compliance illustration">
          <span class="compliance-icon-large" aria-hidden="true">🌐</span>
          <div class="compliance-tags" aria-label="Standards covered">
            <span class="comp-tag">WCAG 2.2</span>
            <span class="comp-tag">ADA</span>
            <span class="comp-tag">EN 301 549</span>
            <span class="comp-tag">Section 508</span>
            <span class="comp-tag">EAA</span>
          </div>
        </div>
      </div>

      <div class="compliance-content reveal reveal-delay-1">
        <span class="eyebrow">Compliance</span>
        <h2><?= esc_html($compliance['heading']) ?></h2>
        <p><?= esc_html($compliance['description']) ?></p>

        <ul class="compliance-list" role="list">
          <?php foreach ($compliance['compliance_points'] as $pt): ?>
          <li role="listitem">
            <div class="comp-icon" aria-hidden="true"><?= $pt['icon'] ?></div>
            <div class="comp-text">
              <h5><?= esc_html($pt['title']) ?></h5>
              <p><?= esc_html($pt['desc']) ?></p>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>

        <div style="display:flex;gap:16px;flex-wrap:wrap">
          <?php render_button($compliance['yellow_button']['title'], $compliance['yellow_button']['url'], 'gold'); ?>
          <?php render_button($compliance['white_button']['title'],  $compliance['white_button']['url'],  'outline'); ?>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ========================
     FAQ BLOCK
     ACF layout: faq_block
     ======================== -->
<section class="section faq-section" id="faq" aria-label="Frequently asked questions">
  <div class="container">
    <div class="faq-layout">

      <div class="faq-sidebar reveal">
        <span class="eyebrow">FAQ</span>
        <h2><?= esc_html($faq['heading']) ?></h2>
        <p><?= esc_html($faq['desc']) ?></p>
        <?php render_button('Read the docs', '#docs', 'outline', 'sm'); ?>
      </div>

      <div class="faq-list reveal reveal-delay-1" role="list" aria-label="FAQ list">
        <?php foreach ($faq['faq_section'] as $i => $item): ?>
        <div class="faq-item <?= $i === 0 ? 'open' : '' ?>" role="listitem">
          <button
            class="faq-question"
            aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>"
            aria-controls="faq-answer-<?= $i ?>"
          >
            <?= esc_html($item['faq_title']) ?>
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-answer-<?= $i ?>" role="region">
            <div class="faq-answer-inner"><?= esc_html($item['faq_content']) ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>


<!-- ========================
     CTA BANNER
     ACF layout: cta_section
     ======================== -->
<section class="cta-banner" id="get-started" aria-label="Call to action">
  <div class="container">
    <div class="cta-inner reveal">
      <span class="eyebrow" style="justify-content:center;margin-bottom:20px">Get Started</span>
      <h2>Ready to make your website <span class="highlight">accessible to all?</span></h2>
      <p>Join 15,000+ websites that trust AccessiKey. No credit card required — set up in minutes.</p>
      <div class="cta-actions">
        <?php render_button('Start Free Trial', '#trial', 'gold'); ?>
        <?php render_button('Book a Demo',      '#demo',  'outline'); ?>
      </div>
      <div class="trust-pills" role="list" aria-label="Trust indicators">
        <div class="trust-pill" role="listitem"><span class="check">✓</span> No credit card</div>
        <div class="trust-pill" role="listitem"><span class="check">✓</span> 14-day free trial</div>
        <div class="trust-pill" role="listitem"><span class="check">✓</span> Cancel any time</div>
        <div class="trust-pill" role="listitem"><span class="check">✓</span> WCAG 2.2 compliant</div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/template-parts/footer.php'; ?>
