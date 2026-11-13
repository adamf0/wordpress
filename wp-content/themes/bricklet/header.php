<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon (6 versions) -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.webp" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.webp" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.webp" />
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome-192x192.webp" />
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome-512x512.webp" />

    <!-- LCP Preload for Hero Background (Mobile & Desktop) -->
    <?php if (is_front_page()) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_5b0daa7c91a4685f526611b90707ee34.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-company-profile.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/pdf/iida-hq-tokyo.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-development.php') || is_page_template('page-product.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/pdf/heartful-town-bekasi-facade.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-our-business.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_4e7dcb7a7dc7f918cf46601d23a5b81a.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-group-company.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_8fd019d8c64698e40616091ba7757ef7.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-product-construction-material.php') || is_page_template('page-news.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-product-osaka-strong-cb.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_e39e29fad1d5c71512e7e27847d133e5.webp" fetchpriority="high" />
    <?php endif; ?>

    <?php wp_head(); ?>

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Global Trusted Types Policy -->
    <script nonce="<?php echo bricklet_get_nonce(); ?>">
      if (window.trustedTypes && window.trustedTypes.createPolicy) {
        window.trustedTypes.createPolicy('default', {
          createHTML: (string) => string
        });
      }
    </script>

    <!-- Preload Material Symbols Font for Instant Icon Rendering -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/material-symbols-outlined.woff2" as="font" type="font/woff2" crossorigin />

    <!-- Google Fonts Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />

    <!-- Compiled Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/tailwind-build.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

    <!-- ============================================================
         DESIGN TOKENS — PT Perumnas Iida Group
         Palette derived from the official corporate profile (Nov 2023)
         and the existing brand logo (deep navy + cyan + gold).
         ============================================================ -->
    <style type="text/css">
        :root {
            /* Brand */
            --color-primary: #006491;
            --color-primary-strong: #004d70;
            --color-secondary: #00b3ff;
            --color-action-cyan: #03c5f0;
            --color-tertiary: #c49e2b;
            --color-deep-navy: #0a1f2c;

            /* Surfaces */
            --color-background: #f9fafb;
            --color-surface: #ffffff;
            --color-surface-sunken: #f3f5f7;
            --color-primary-container: #e0f2fe;
            --color-on-primary-container: #002e40;

            /* Text */
            --color-text-heading: #0a1f2c;
            --color-text-body: #334155;
            --color-text-muted: #475569;

            /* Lines */
            --color-border: #e5e9ee;
            --color-border-strong: #cbd5e1;

            /* Type scale (12 / 14 / 16 / 18 / 24 / 32 / 48 / 64) */
            --text-xs: 0.75rem;
            --text-sm: 0.875rem;
            --text-base: 1rem;
            --text-lg: 1.125rem;
            --text-xl: 1.5rem;
            --text-2xl: 2rem;
            --text-3xl: 3rem;
            --text-4xl: 4rem;

            --font-display: 'Hanken Grotesk', 'Inter', system-ui, sans-serif;
            --font-body: 'Inter', system-ui, -apple-system, sans-serif;

            /* Motion — natural easing, never linear for UI */
            --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
            --ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);
            --ease-spring: cubic-bezier(0.34, 1.4, 0.64, 1);
            --dur-fast: 150ms;
            --dur-base: 220ms;
            --dur-slow: 420ms;

            /* Layered micro-shadows (very low alpha) */
            --shadow-xs: 0 1px 2px rgba(10, 31, 44, 0.04);
            --shadow-sm: 0 1px 2px rgba(10, 31, 44, 0.04), 0 2px 6px rgba(10, 31, 44, 0.04);
            --shadow-md: 0 2px 4px rgba(10, 31, 44, 0.04), 0 8px 20px rgba(10, 31, 44, 0.06);
            --shadow-lg: 0 4px 8px rgba(10, 31, 44, 0.04), 0 16px 40px rgba(10, 31, 44, 0.08);

            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-pill: 999px;

            --container-max: 1280px;
            --gutter: 40px;
        }

        @media (max-width: 768px) {
            :root { --gutter: 24px; }
        }

        /* ---------- Base ---------- */
        body {
            font-family: var(--font-body);
            background-color: var(--color-background);
            color: var(--color-text-body);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-display);
            color: var(--color-text-heading);
            line-height: 1.15;
            letter-spacing: -0.015em;
        }
        p { line-height: 1.6; }
        img, video { max-width: 100%; height: auto; }

        .max-w-container-max { max-width: var(--container-max); }
        .px-margin-desktop-alt {
            padding-left: var(--gutter);
            padding-right: var(--gutter);
        }

        /* ---------- Scroll progress ---------- */
        .scroll-progress {
            height: 3px;
            background: var(--color-secondary);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 60;
            transition: width 100ms linear, background-color var(--dur-base) var(--ease-in-out);
        }
        .scroll-progress.is-scrolled { background: var(--color-tertiary); }
    </style>


    <!-- ============================================================
         HEADER / NAVIGATION
         ============================================================ -->
    <style type="text/css">
        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.82);
            -webkit-backdrop-filter: saturate(180%) blur(12px);
            backdrop-filter: saturate(180%) blur(12px);
            border-bottom: 1px solid var(--color-border);
            transition: background-color var(--dur-base) var(--ease-in-out),
                        border-color var(--dur-base) var(--ease-in-out),
                        box-shadow var(--dur-base) var(--ease-in-out);
        }
        .site-header.is-scrolled {
            background-color: rgba(10, 31, 44, 0.96);
            border-bottom-color: rgba(255, 255, 255, 0.14);
            box-shadow: var(--shadow-md);
        }

        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            height: 72px;
        }
        @media (min-width: 768px) { .header-bar { height: 84px; } }

        /* Menu toggle */
        .nav-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            margin-left: -12px;
            border: 0;
            border-radius: var(--radius-sm);
            background: transparent;
            color: var(--color-text-heading);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color var(--dur-fast) var(--ease-in-out),
                        color var(--dur-fast) var(--ease-in-out);
        }
        .nav-toggle:hover { background: var(--color-surface-sunken); }
        .nav-toggle:active { transform: scale(0.98); }
        .nav-toggle:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }
        .nav-toggle svg { width: 20px; height: 20px; }
        .site-header.is-scrolled .nav-toggle { color: #ffffff; }
        .site-header.is-scrolled .nav-toggle:hover { background: rgba(255, 255, 255, 0.12); }
        .site-header.is-scrolled .nav-toggle:focus-visible { outline-color: var(--color-action-cyan); }

        /* Logo */
        .header-logo {
            display: inline-flex;
            align-items: center;
            transition: opacity var(--dur-fast) var(--ease-in-out);
        }
        .header-logo:hover { opacity: 0.82; }
        .header-logo:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 4px;
            border-radius: var(--radius-sm);
        }
        .site-header.is-scrolled .header-logo:focus-visible { outline-color: var(--color-action-cyan); }
        .header-logo img {
            height: 34px;
            width: auto;
            object-fit: contain;
        }
        @media (min-width: 768px) { .header-logo img { height: 42px; } }
        .header-logo-img--dark { display: block; }
        .header-logo-img--light { display: none; }
        .site-header.is-scrolled .header-logo-img--dark { display: none; }
        .site-header.is-scrolled .header-logo-img--light { display: block; }

        /* Primary CTA */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius-pill);
            background: var(--color-primary);
            color: #ffffff;
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 600;
            letter-spacing: 0.01em;
            white-space: nowrap;
            text-decoration: none;
            box-shadow: var(--shadow-xs);
            transition: background-color var(--dur-fast) var(--ease-in-out),
                        color var(--dur-fast) var(--ease-in-out),
                        box-shadow var(--dur-fast) var(--ease-in-out),
                        transform var(--dur-fast) var(--ease-spring);
        }
        .btn-primary:hover {
            background: var(--color-primary-strong);
            color: #ffffff;
            box-shadow: var(--shadow-sm);
        }
        .btn-primary:active { transform: scale(0.98); }
        .btn-primary:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }
        .site-header.is-scrolled .btn-primary {
            background: #ffffff;
            color: var(--color-deep-navy);
        }
        .site-header.is-scrolled .btn-primary:hover {
            background: var(--color-primary-container);
            color: var(--color-on-primary-container);
        }
        .site-header.is-scrolled .btn-primary:focus-visible { outline-color: var(--color-action-cyan); }
        .btn-primary .cta-label-short { display: inline; }
        .btn-primary .cta-label-full { display: none; }
        @media (min-width: 640px) {
            .btn-primary .cta-label-short { display: none; }
            .btn-primary .cta-label-full { display: inline; }
        }
    </style>


    <!-- ============================================================
         DESKTOP NAV PANEL + DROPDOWNS
         ============================================================ -->
    <style type="text/css">
        /* Desktop nav panel — collapsed by default, opened by the Menu toggle.
           The .is-open class is the single source of truth on every viewport,
           so the CSS no longer force-opens the panel at >=1024px (which used to
           make the toggle a no-op on desktop). */
        .nav-panel {
            display: none;
            border-top: 1px solid var(--color-border);
            background: rgba(255, 255, 255, 0.96);
            transition: background-color var(--dur-base) var(--ease-in-out),
                        border-color var(--dur-base) var(--ease-in-out);
        }
        .site-header.is-scrolled .nav-panel {
            border-top-color: rgba(255, 255, 255, 0.14);
            background: rgba(10, 31, 44, 0.98);
        }
        .nav-panel.is-open { display: block; }
        @media (prefers-reduced-motion: no-preference) {
            .nav-panel.is-open {
                animation: navPanelReveal var(--dur-base) var(--ease-out-expo) both;
            }
        }
        @keyframes navPanelReveal {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: none; }
        }
        .nav-panel-inner {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 8px 32px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .nav-item { position: relative; }
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 0;
            color: var(--color-text-body);
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            transition: color var(--dur-fast) var(--ease-in-out),
                        border-color var(--dur-fast) var(--ease-in-out);
        }
        .nav-link:hover { color: var(--color-primary); }
        .nav-link.is-active {
            color: var(--color-primary);
            border-bottom-color: var(--color-primary);
        }
        .nav-link:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
            border-radius: var(--radius-sm);
        }
        .site-header.is-scrolled .nav-link { color: rgba(255, 255, 255, 0.88); }
        .site-header.is-scrolled .nav-link:hover { color: #ffffff; }
        .site-header.is-scrolled .nav-link.is-active {
            color: var(--color-action-cyan);
            border-bottom-color: var(--color-action-cyan);
        }
        .site-header.is-scrolled .nav-link:focus-visible { outline-color: var(--color-action-cyan); }
        /* Dropdown triggers are <button>s, not links — reset the UA button
           chrome so they render exactly like the plain .nav-link anchors. */
        .nav-link--toggle {
            margin: 0;
            border: 0;
            border-bottom: 2px solid transparent;
            background: transparent;
            font-family: var(--font-body);
            line-height: inherit;
            cursor: pointer;
            text-align: left;
            -webkit-appearance: none;
            appearance: none;
        }
        .nav-link--toggle:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
            border-radius: var(--radius-sm);
        }
        .site-header.is-scrolled .nav-link--toggle:focus-visible { outline-color: var(--color-action-cyan); }
        .nav-link svg {
            width: 10px;
            height: 10px;
            opacity: 0.6;
            transition: transform var(--dur-base) var(--ease-out-expo);
        }
        .site-header.is-scrolled .nav-link svg { opacity: 0.82; }
        .nav-item:hover .nav-link svg,
        .nav-item:focus-within .nav-link svg { transform: rotate(180deg); }

        /* Dropdown */
        .nav-dropdown {
            position: absolute;
            top: 100%;
            left: 50%;
            min-width: 220px;
            padding: 6px;
            background: var(--color-surface);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateX(-50%) translateY(4px);
            transition: opacity var(--dur-base) var(--ease-out-expo),
                        transform var(--dur-base) var(--ease-out-expo),
                        visibility var(--dur-base);
        }
        .nav-item:hover .nav-dropdown,
        .nav-item:focus-within .nav-dropdown,
        .nav-dropdown.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }
        .nav-dropdown a {
            display: block;
            padding: 9px 12px;
            border-radius: var(--radius-sm);
            color: var(--color-text-body);
            font-size: var(--text-sm);
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
            transition: background-color var(--dur-fast) var(--ease-in-out),
                        color var(--dur-fast) var(--ease-in-out);
        }
        .nav-dropdown a:hover {
            background: var(--color-surface-sunken);
            color: var(--color-primary);
        }
        .nav-dropdown a.is-active {
            color: var(--color-primary);
            font-weight: 600;
        }
        .nav-dropdown a:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: -2px;
        }
        .site-header.is-scrolled .nav-dropdown {
            background: #0f293a;
            border-color: rgba(255, 255, 255, 0.16);
            box-shadow: var(--shadow-lg);
        }
        .site-header.is-scrolled .nav-dropdown a { color: #e2e8f0; }
        .site-header.is-scrolled .nav-dropdown a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }
        .site-header.is-scrolled .nav-dropdown a.is-active { color: var(--color-action-cyan); }
        .site-header.is-scrolled .nav-dropdown a:focus-visible { outline-color: var(--color-action-cyan); }
    </style>


    <!-- ============================================================
         MOBILE DRAWER
         ============================================================ -->
    <style type="text/css">
        .mobile-drawer {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 70;
            width: min(360px, 88vw);
            display: flex;
            flex-direction: column;
            background: var(--color-surface);
            border-right: 1px solid var(--color-border);
            box-shadow: var(--shadow-lg);
            transform: translateX(-100%);
            visibility: hidden;
            transition: transform var(--dur-slow) var(--ease-out-expo),
                        visibility var(--dur-slow);
        }
        .mobile-drawer.is-open {
            transform: translateX(0);
            visibility: visible;
        }
        @media (min-width: 1024px) { .mobile-drawer { display: none; } }

        .mobile-drawer-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 20px;
            border-bottom: 1px solid var(--color-border);
        }
        .mobile-drawer-head img { height: 30px; width: auto; }
        .drawer-close {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border: 0;
            border-radius: var(--radius-sm);
            background: transparent;
            color: var(--color-text-muted);
            cursor: pointer;
            transition: background-color var(--dur-fast) var(--ease-in-out),
                        color var(--dur-fast) var(--ease-in-out);
        }
        .drawer-close:hover {
            background: var(--color-surface-sunken);
            color: var(--color-text-heading);
        }
        .drawer-close svg { width: 20px; height: 20px; }

        .mobile-drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 12px 12px 32px;
        }
        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 44px;
            padding: 12px 12px;
            border-radius: var(--radius-sm);
            color: var(--color-text-heading);
            font-size: var(--text-base);
            font-weight: 600;
            text-decoration: none;
            transition: background-color var(--dur-fast) var(--ease-in-out),
                        color var(--dur-fast) var(--ease-in-out);
        }
        .mobile-nav-link:hover,
        .mobile-nav-link.is-active {
            background: var(--color-surface-sunken);
            color: var(--color-primary);
        }
        /* Single accessible accordion toggle per mobile parent item */
        .mobile-nav-link--toggle {
            width: 100%;
            border: 0;
            background: transparent;
            font-family: var(--font-body);
            text-align: left;
            cursor: pointer;
            -webkit-appearance: none;
            appearance: none;
        }
        .mobile-nav-link--toggle svg {
            width: 18px;
            height: 18px;
            flex: 0 0 auto;
            color: var(--color-text-muted);
            transition: transform var(--dur-base) var(--ease-out-expo);
        }
        .mobile-nav-link--toggle[aria-expanded="true"] svg {
            transform: rotate(180deg);
            color: var(--color-primary);
        }
        .mobile-nav-link--toggle:focus-visible,
        .mobile-submenu a:focus-visible,
        .drawer-close:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }
        .mobile-submenu {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows var(--dur-base) var(--ease-out-expo);
        }
        .mobile-submenu > div { overflow: hidden; }
        .mobile-submenu.is-open { grid-template-rows: 1fr; }
        .mobile-submenu a {
            display: flex;
            align-items: center;
            min-height: 44px;
            padding: 10px 12px 10px 24px;
            color: var(--color-text-muted);
            font-size: var(--text-sm);
            font-weight: 500;
            text-decoration: none;
            border-left: 2px solid var(--color-border);
            margin-left: 12px;
            transition: color var(--dur-fast) var(--ease-in-out),
                        border-color var(--dur-fast) var(--ease-in-out);
        }
        .mobile-submenu a:hover,
        .mobile-submenu a.is-active {
            color: var(--color-primary);
            border-left-color: var(--color-primary);
        }
        .mobile-drawer-foot {
            padding: 16px 20px 24px;
            border-top: 1px solid var(--color-border);
        }
        .mobile-drawer-foot .btn-primary { width: 100%; }

        .drawer-overlay {
            position: fixed;
            inset: 0;
            z-index: 65;
            background: rgba(10, 31, 44, 0.42);
            opacity: 0;
            visibility: hidden;
            transition: opacity var(--dur-base) var(--ease-in-out),
                        visibility var(--dur-base);
        }
        .drawer-overlay.is-open {
            opacity: 1;
            visibility: visible;
        }
        @media (min-width: 1024px) { .drawer-overlay { display: none; } }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body <?php body_class('bg-background text-on-surface'); ?>>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="progressBar" style="width: 0%;"></div>


    <?php
    // ------------------------------------------------------------
    // Current page context
    // ------------------------------------------------------------
    global $post;
    $current_slug = '';
    if ( is_front_page() || is_home() ) {
        $current_slug = 'home';
    } elseif ( $post ) {
        $current_slug = $post->post_name;
    }
    $current_path = trim( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

    // ------------------------------------------------------------
    // Navigation mirroring the official corporate profile (Nov 2023)
    // and every active route in WordPress without 404 or dead menus.
    // ------------------------------------------------------------
    $nav_items = array(
        array(
            'title'    => 'About Us',
            'slug'     => 'about-us',
            'url'      => home_url( '/about-us/' ),
            'children' => array(
                array( 'title' => 'Overview',         'slug' => 'overview',        'url' => home_url( '/about-us/overview/' ) ),
                array( 'title' => 'Company Profile',  'slug' => 'company-profile', 'url' => home_url( '/company-profile/' ) ),
                array( 'title' => 'Vision & Mission', 'slug' => 'vision-mission',  'url' => home_url( '/about-us/vision-mission/' ) ),
                array( 'title' => 'Milestone',        'slug' => 'milestone',       'url' => home_url( '/about-us/milestone/' ) ),
                array( 'title' => 'Awards',           'slug' => 'awards',          'url' => home_url( '/about-us/awards/' ) ),
            ),
        ),
        array(
            'title'    => 'Our Business',
            'slug'     => 'our-business',
            'url'      => home_url( '/our-business/' ),
            'children' => array(),
        ),
        array(
            'title'    => 'Projects & Products',
            'slug'     => 'development',
            'url'      => home_url( '/development/' ),
            'children' => array(
                array( 'title' => 'Proyek Perumahan',       'slug' => 'development',                   'url' => home_url( '/development/' ) ),
                array( 'title' => 'IG Strong CB (Osaka)',   'slug' => 'product-osaka-strong-cb',       'url' => home_url( '/product-osaka-strong-cb/' ) ),
                array( 'title' => 'Material Konstruksi',    'slug' => 'product-construction-material', 'url' => home_url( '/product-construction-material/' ) ),
            ),
        ),
        array(
            'title'    => 'Group Network',
            'slug'     => 'group-company',
            'url'      => home_url( '/group-company/' ),
            'children' => array(),
        ),
        array(
            'title'    => 'Latest Updates',
            'slug'     => 'news',
            'url'      => home_url( '/news/' ),
            'children' => array(
                array( 'title' => 'News',          'slug' => 'news',          'url' => home_url( '/news/' ) ),
                array( 'title' => 'E-Newsletter',  'slug' => 'e-newsletter',  'url' => home_url( '/latest-updates/e-newsletter/' ) ),
                array( 'title' => 'Press Release', 'slug' => 'press-release', 'url' => home_url( '/news/?pressReleaseData=1' ) ),
            ),
        ),
        array(
            'title'    => 'Contact Us',
            'slug'     => 'contact',
            'url'      => home_url( '/contact/' ),
            'children' => array(),
        ),
    );

    // Helper: is a nav entry (or one of its children) the current page?
    $is_item_active = function( $item ) use ( $current_slug, $current_path ) {
        if ( $current_slug === $item['slug'] ) {
            return true;
        }
        if ( ! empty( $current_path ) && strpos( $current_path, $item['slug'] ) !== false ) {
            return true;
        }
        if ( ! empty( $item['children'] ) ) {
            foreach ( $item['children'] as $child ) {
                if ( $current_slug === $child['slug'] ) {
                    return true;
                }
                if ( ! empty( $current_path ) && strpos( $current_path, $child['slug'] ) !== false ) {
                    return true;
                }
            }
        }
        return false;
    };
    ?>


    <!-- ============================================================
         SITE HEADER
         ============================================================ -->
    <header id="site-header" class="site-header">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="header-bar">

                <!-- Left: menu toggle -->
                <button id="nav-toggle-btn"
                        class="nav-toggle"
                        type="button"
                        aria-label="Buka menu navigasi"
                        aria-expanded="false"
                        aria-controls="nav-panel mobile-drawer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                    <span>Menu</span>
                </button>

                <!-- Center: logo -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" aria-label="PT Perumnas Iida Group Beranda">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/PT_Perumnas_Iida_Group_Logo3_transparent.png' ); ?>"
                         alt="PT Perumnas Iida Group"
                         class="header-logo-img--dark"
                         width="1128" height="190"
                         decoding="async">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/PT_Perumnas_Iida_Group_Logo3_white_text.png' ); ?>"
                         alt=""
                         aria-hidden="true"
                         class="header-logo-img--light"
                         width="1128" height="190"
                         decoding="async">
                </a>

                <!-- Right: CTA -->
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">
                    <span class="cta-label-short">Kontak</span>
                    <span class="cta-label-full">Hubungi Kami</span>
                </a>
            </div>
        </div>

        <!-- Desktop navigation panel -->
        <div id="nav-panel" class="nav-panel" aria-hidden="true">
            <div class="max-w-container-max mx-auto px-margin-desktop-alt">
                <nav class="nav-panel-inner" aria-label="Navigasi utama">
                    <?php foreach ( $nav_items as $item ) :
                        $has_children = ! empty( $item['children'] );
                        $is_active    = $is_item_active( $item );
                    ?>
                        <div class="nav-item">
                            <?php if ( $has_children ) : ?>
                                <?php /* Parent items with children are dropdown triggers, not links. */ ?>
                                <button type="button"
                                        class="nav-link nav-link--toggle<?php echo $is_active ? ' is-active' : ''; ?>"
                                        aria-expanded="false"
                                        <?php echo $is_active ? 'aria-current="true"' : ''; ?>>
                                    <?php echo esc_html( $item['title'] ); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $item['url'] ); ?>"
                                   class="nav-link<?php echo $is_active ? ' is-active' : ''; ?>"
                                   <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                                    <?php echo esc_html( $item['title'] ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if ( $has_children ) : ?>
                                <div class="nav-dropdown">
                                    <?php foreach ( $item['children'] as $child ) :
                                        $child_active = ( $current_slug === $child['slug'] )
                                            || ( ! empty( $current_path ) && strpos( $current_path, $child['slug'] ) !== false );
                                    ?>
                                        <a href="<?php echo esc_url( $child['url'] ); ?>"
                                           class="<?php echo $child_active ? 'is-active' : ''; ?>">
                                            <?php echo esc_html( $child['title'] ); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
    </header>


    <!-- ============================================================
         MOBILE DRAWER
         ============================================================ -->
    <div id="drawer-overlay" class="drawer-overlay" hidden></div>

    <aside id="mobile-drawer"
           class="mobile-drawer"
           role="dialog"
           aria-modal="true"
           aria-label="Menu navigasi"
           aria-hidden="true">
        <div class="mobile-drawer-head">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="PT Perumnas Iida Group Beranda">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/PT_Perumnas_Iida_Group_Logo3_transparent.png' ); ?>"
                     alt="PT Perumnas Iida Group"
                     width="1128" height="190"
                     decoding="async">
            </a>
            <button id="drawer-close-btn" class="drawer-close" type="button" aria-label="Tutup menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="mobile-drawer-body">
            <?php foreach ( $nav_items as $item ) :
                $has_children = ! empty( $item['children'] );
                $is_active    = $is_item_active( $item );
                $submenu_id   = 'submenu-' . sanitize_title( $item['slug'] );
            ?>
                <div class="mobile-nav-group">
                    <?php if ( $has_children ) : ?>
                        <button type="button"
                                class="mobile-nav-link mobile-nav-link--toggle mobile-submenu-toggle<?php echo $is_active ? ' is-active' : ''; ?>"
                                aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>"
                                aria-controls="<?php echo esc_attr( $submenu_id ); ?>">
                            <span><?php echo esc_html( $item['title'] ); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                        <div id="<?php echo esc_attr( $submenu_id ); ?>" class="mobile-submenu<?php echo $is_active ? ' is-open' : ''; ?>">
                            <div>
                                <?php foreach ( $item['children'] as $child ) :
                                    $child_active = ( $current_slug === $child['slug'] )
                                        || ( ! empty( $current_path ) && strpos( $current_path, $child['slug'] ) !== false );
                                ?>
                                    <a href="<?php echo esc_url( $child['url'] ); ?>"
                                       class="<?php echo $child_active ? 'is-active' : ''; ?>">
                                        <?php echo esc_html( $child['title'] ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url( $item['url'] ); ?>"
                           class="mobile-nav-link<?php echo $is_active ? ' is-active' : ''; ?>">
                            <?php echo esc_html( $item['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mobile-drawer-foot">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">Hubungi Kami</a>
        </div>
    </aside>


    <script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
    (function () {
        'use strict';

        var header      = document.getElementById('site-header');
        var progressBar = document.getElementById('progressBar');
        var toggleBtn   = document.getElementById('nav-toggle-btn');
        var navPanel    = document.getElementById('nav-panel');
        var drawer      = document.getElementById('mobile-drawer');
        var overlay     = document.getElementById('drawer-overlay');
        var closeBtn    = document.getElementById('drawer-close-btn');
        var subToggles  = document.querySelectorAll('.mobile-submenu-toggle');

        function isDesktop() {
            return window.matchMedia('(min-width: 1024px)').matches;
        }

        /* ---------- Scroll state (rAF-throttled) ---------- */
        var ticking = false;
        function onScroll() {
            if (ticking) { return; }
            ticking = true;
            window.requestAnimationFrame(function () {
                var y = window.scrollY || document.documentElement.scrollTop || 0;
                var scrollable = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var pct = scrollable > 0 ? (y / scrollable) * 100 : 0;

                if (progressBar) {
                    progressBar.style.width = pct + '%';
                    progressBar.classList.toggle('is-scrolled', y > 40);
                }
                if (header) {
                    header.classList.toggle('is-scrolled', y > 8);
                }
                ticking = false;
            });
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        /* ---------- Mobile drawer ---------- */
        if (drawer) {
            drawer.inert = true;
        }
        function openDrawer() {
            if (!drawer) { return; }
            drawer.inert = false;
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            if (overlay) {
                overlay.hidden = false;
                void overlay.offsetWidth;
                overlay.classList.add('is-open');
            }
            if (toggleBtn) { toggleBtn.setAttribute('aria-expanded', 'true'); }
            document.body.style.overflow = 'hidden';
            if (closeBtn) { closeBtn.focus(); }
        }

        function closeDrawer() {
            if (!drawer) { return; }
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            drawer.inert = true;
            if (overlay) {
                overlay.classList.remove('is-open');
                window.setTimeout(function () { overlay.hidden = true; }, 240);
            }
            if (toggleBtn) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                if (!isDesktop()) { toggleBtn.focus(); }
            }
            document.body.style.overflow = '';
        }

        /* ---------- Desktop nav panel ---------- */
        function setNavPanel(open) {
            if (!navPanel) { return; }
            navPanel.classList.toggle('is-open', open);
            navPanel.setAttribute('aria-hidden', open ? 'false' : 'true');
            if (toggleBtn) {
                toggleBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
                toggleBtn.setAttribute('aria-label', open ? 'Tutup menu navigasi' : 'Buka menu navigasi');
            }
        }

        function isNavPanelOpen() {
            return !!(navPanel && navPanel.classList.contains('is-open'));
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                if (isDesktop()) {
                    setNavPanel(!isNavPanelOpen());
                } else {
                    openDrawer();
                }
            });
        }

        /* Close the desktop panel when a link inside it is followed */
        if (navPanel) {
            navPanel.addEventListener('click', function (e) {
                if (e.target.closest('a')) { setNavPanel(false); }
            });
        }

        /* ---------- Desktop dropdown triggers ----------
           The dropdown opens on :hover / :focus-within via CSS. Touch and
           fine-pointer-less devices have no hover, so let the trigger button
           toggle its own dropdown and keep aria-expanded in sync. */
        var desktopTriggers = navPanel ? navPanel.querySelectorAll('.nav-link--toggle') : [];
        desktopTriggers.forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                var item     = trigger.closest('.nav-item');
                var dropdown = item ? item.querySelector('.nav-dropdown') : null;
                if (!dropdown) { return; }

                var willOpen = !dropdown.classList.contains('is-open');

                // Only one dropdown open at a time.
                desktopTriggers.forEach(function (other) {
                    var otherItem = other.closest('.nav-item');
                    var otherMenu = otherItem ? otherItem.querySelector('.nav-dropdown') : null;
                    if (otherMenu && otherMenu !== dropdown) {
                        otherMenu.classList.remove('is-open');
                        other.setAttribute('aria-expanded', 'false');
                    }
                });

                dropdown.classList.toggle('is-open', willOpen);
                trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            });
        });

        /* Close the desktop panel on outside click */
        document.addEventListener('click', function (e) {
            if (!isNavPanelOpen()) { return; }
            if (navPanel.contains(e.target) || (toggleBtn && toggleBtn.contains(e.target))) {
                return;
            }
            setNavPanel(false);
        });

        if (closeBtn) { closeBtn.addEventListener('click', closeDrawer); }
        if (overlay)  { overlay.addEventListener('click', closeDrawer); }

        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') { return; }
            if (drawer && drawer.classList.contains('is-open')) {
                closeDrawer();
            } else if (isNavPanelOpen()) {
                setNavPanel(false);
                if (toggleBtn) { toggleBtn.focus(); }
            }
        });

        /* ---------- Mobile submenus ---------- */
        subToggles.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var target = document.getElementById(btn.getAttribute('aria-controls'));
                if (!target) { return; }
                var open = target.classList.toggle('is-open');
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                var icon = btn.querySelector('svg');
                if (icon) {
                    icon.style.transition = 'transform 220ms cubic-bezier(0.16, 1, 0.3, 1)';
                    icon.style.transform = open ? 'rotate(180deg)' : '';
                }
            });
        });

        /* ---------- Reset states when crossing the desktop breakpoint ---------- */
        var mq = window.matchMedia('(min-width: 1024px)');
        function onMqChange(e) {
            if (e.matches) {
                // Entering desktop: the drawer is no longer reachable.
                if (drawer && drawer.classList.contains('is-open')) {
                    closeDrawer();
                }
            } else {
                // Entering mobile: collapse the desktop panel so the next open
                // starts from a predictable state.
                setNavPanel(false);
            }
        }
        if (mq.addEventListener) { mq.addEventListener('change', onMqChange); }
        else if (mq.addListener) { mq.addListener(onMqChange); }
        onMqChange(mq);
    })();
    </script>

