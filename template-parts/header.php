<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="AccessiKey — Accessibility that feels effortless. Smart profiles, contrast tools, reading aids, and compliance reporting for every website." />
  <title><?= esc_html($page_title ?? 'AccessiKey — Accessibility for Everyone') ?></title>

  <!-- Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- CSS -->
  <link rel="stylesheet" href="<?= asset_url('css/style.css') ?>" />

  <!-- Favicon (inline SVG) -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='6' fill='%23F5C518'/><text y='22' x='6' font-size='18'>♿</text></svg>" />
</head>
<body>

<!-- ===================== NAVIGATION ===================== -->
<nav class="site-nav" role="navigation" aria-label="Main navigation">
  <div class="container">
    <div class="nav-inner">

      <a href="/" class="nav-logo" aria-label="AccessiKey Home">
        <span class="logo-icon" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 2L3 6v8l7 4 7-4V6L10 2z" fill="#0A0E1A" opacity="0.7"/>
            <circle cx="10" cy="10" r="3" fill="#0A0E1A"/>
            <path d="M10 7v6M7 10h6" stroke="#F5C518" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </span>
        Accessi<span class="accent">Key</span>
      </a>

      <ul class="nav-links" role="list">
        <li class="has-dropdown"><a href="#features">Product</a></li>
        <li class="has-dropdown"><a href="#how-it-works">Solutions</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li><a href="#compliance">Accessibility</a></li>
      </ul>

      <div class="nav-cta">
        <a href="#signin" class="link-signin">Sign In</a>
        <a href="#get-started" class="btn btn-gold btn-sm">Get Started</a>
      </div>

      <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>

    </div>
  </div>
</nav>

<!-- Mobile nav overlay -->
<nav class="mobile-nav" aria-label="Mobile navigation">
  <button class="mobile-nav-close" aria-label="Close menu">✕</button>
  <a href="#features">Product</a>
  <a href="#how-it-works">Solutions</a>
  <a href="#pricing">Pricing</a>
  <a href="#compliance">Accessibility</a>
  <a href="#signin">Sign In</a>
  <a href="#get-started" class="btn btn-gold">Get Started Free</a>
</nav>
