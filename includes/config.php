<?php
/**
 * AccessiKey – Site Configuration & Helper Functions
 */

define('SITE_NAME', 'AccessiKey');
define('SITE_URL',  'https://accessikey.com');
define('SITE_VERSION', '1.0.0');

/**
 * Get asset URL with cache-busting version
 */
function asset_url(string $path): string {
    return '/assets/' . ltrim($path, '/') . '?v=' . SITE_VERSION;
}

/**
 * Render a button
 * @param string $text   Button label
 * @param string $href   Link
 * @param string $style  'gold' | 'outline'
 * @param string $size   '' | 'sm'
 */
function render_button(string $text, string $href = '#', string $style = 'gold', string $size = ''): void {
    $class = 'btn btn-' . esc_attr($style);
    if ($size) $class .= ' btn-' . esc_attr($size);
    echo '<a href="' . esc_url($href) . '" class="' . $class . '">' . esc_html($text) . '</a>';
}

/**
 * Basic HTML escaping
 */
function esc_html(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
function esc_attr(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
function esc_url(string $url): string {
    return filter_var($url, FILTER_SANITIZE_URL) ?: '#';
}

/* ============================================================
   PAGE DATA  – mirrors the ACF flexible content fields
   In a real WordPress build, these come from get_field() calls.
   Here we hard-code the content that maps to the ACF schema.
   ============================================================ */

$page_data = [

  /* --- HERO BLOCK (layout: hero_block) --- */
  'hero' => [
    'eyebrow_text'   => 'Accessibility Platform',
    'hero_heading'   => 'Accessibility that feels effortless — for',
    'hero_heading_2' => 'everyone',
    'hero_description' => 'AccessiKey helps your website become more inclusive with smart profiles, reading aids, contrast tools, and clear reporting — without complex setup.',
    'yellow_button'  => ['title' => 'Get Started Free', 'url' => '#get-started'],
    'white_button'   => ['title' => 'Free Demo',        'url' => '#demo'],
    'right_side_image_card' => null, // replaced by SVG illustration
    'stats' => [
      ['num' => 15000, 'suffix' => '+', 'label' => 'Websites protected'],
      ['num' => 99,    'suffix' => '%', 'label' => 'Compliance rate'],
      ['num' => 4,     'suffix' => 'M+','label' => 'Users reached'],
    ],
  ],

  /* --- FEATURES CARDS BLOCK --- */
  'features' => [
    'features_cards_heading' => 'Everything you need to build inclusive experiences',
    'description_' => 'Modern UI, ADA-friendly patterns, and flexible modes for every site type.',
    'explore_btn'  => ['title' => 'Explore More', 'url' => '#features'],
    'features_card_section' => [
      ['heading_icon' => '🔗', 'heading' => 'Full Accessibility Widget',   'description' => 'Reading aids, contrast modes, keyboard support, and user controls in a clear layout.'],
      ['heading_icon' => '🌐', 'heading' => 'Nano & Expandable Modes',     'description' => 'Lightweight options for speed-first sites — expand when the user needs it.'],
      ['heading_icon' => '👤', 'heading' => 'Smart Profiles',              'description' => 'One click profiles for low vision, dyslexia, color blindness, and focus support.'],
      ['heading_icon' => '📊', 'heading' => 'Detailed Reporting',          'description' => 'Exportable dashboards and audit logs to track and prove compliance over time.'],
      ['heading_icon' => '🎨', 'heading' => 'Widget Branding',             'description' => 'Match the accessibility widget to your brand colors, logo, and custom messaging.'],
      ['heading_icon' => '⚡', 'heading' => 'Zero-Config Setup',           'description' => 'Paste one script snippet or install the plugin — no rebuild or dev work required.'],
    ],
  ],

  /* --- OFFER / FREE TRIAL BLOCK --- */
  'offer' => [
    'tag'     => 'Latest Offer',
    'heading' => 'Start a free trial — unlock Pro features instantly',
    'desc'    => 'Try AccessiKey Pro on your site (branding, reports, and advanced controls). No complex setup — just add the script and go.',
    'bullets' => ['14-day Pro trial', 'Widget branding + modes', 'Exportable reports'],
    'yellow_button' => ['title' => 'Start Free Trial', 'url' => '#trial'],
    'white_button'  => ['title' => 'Free Demo',        'url' => '#demo'],
  ],

  /* --- HOW IT WORKS (steps) --- */
  'how_it_works' => [
    'heading' => 'How it works',
    'desc'    => 'Keep it simple: install, customize, and let users control their experience.',
    'steps'   => [
      ['num' => '01', 'title' => 'Add the script',     'desc' => 'Paste one snippet (or use a plugin). No heavy rebuild required.'],
      ['num' => '02', 'title' => 'Choose modes',       'desc' => 'Select Full / Nano / Expandable and brand the widget with your colors.'],
      ['num' => '03', 'title' => 'Support real users', 'desc' => 'Profiles and controls help visitors adjust reading, contrast, and navigation.'],
    ],
  ],

  /* --- COMPLIANCE SECTION --- */
  'compliance' => [
    'heading'     => 'Stay ahead of global accessibility laws',
    'description' => 'Our technology and services consistently align with the latest regulations in the U.S., Canada, and Europe, adhering to the highest global compliance standards for digital assets — WCAG 2.2 and EN 301 549.',
    'yellow_button' => ['title' => 'Learn More', 'url' => '#compliance'],
    'white_button'  => ['title' => 'Home',       'url'  => '/'],
    'compliance_points' => [
      ['icon' => '🇺🇸', 'title' => 'ADA & Section 508',   'desc' => 'Full alignment with U.S. federal digital accessibility law.'],
      ['icon' => '🇪🇺', 'title' => 'EAA & EN 301 549',    'desc' => 'European Accessibility Act & harmonized EU standards.'],
      ['icon' => '🌍', 'title' => 'WCAG 2.1 / 2.2 AA',    'desc' => 'World-class global guidelines — AA and AAA levels.'],
    ],
  ],

  /* --- FAQ BLOCK --- */
  'faq' => [
    'heading' => 'Common questions',
    'desc'    => 'Everything you need to know about AccessiKey and web accessibility.',
    'faq_section' => [
      ['faq_title' => 'What is AccessiKey?',
       'faq_content' => 'AccessiKey is a web accessibility platform that adds a smart widget to your site, giving visitors tools to adjust contrast, font size, reading mode, and much more — with zero configuration required on your end.'],
      ['faq_title' => 'How do I install AccessiKey on my website?',
       'faq_content' => 'Simply paste a single JavaScript snippet before the closing </body> tag on your pages. For WordPress users, we offer a one-click plugin that handles everything automatically.'],
      ['faq_title' => 'Does AccessiKey make my site fully WCAG compliant?',
       'faq_content' => 'AccessiKey significantly improves your compliance score and addresses the majority of WCAG 2.1/2.2 AA criteria. For a fully audited certification, we recommend pairing the widget with a professional accessibility audit.'],
      ['faq_title' => 'Can I customize the widget to match my brand?',
       'faq_content' => 'Yes — Pro plans allow full branding: custom colors, logo, widget position, and even the language of all labels.'],
      ['faq_title' => 'Is there a free plan available?',
       'faq_content' => 'Absolutely. Our free tier covers essential accessibility features for up to one website. Upgrade to Pro for unlimited sites, reports, and advanced modes.'],
    ],
  ],

];
