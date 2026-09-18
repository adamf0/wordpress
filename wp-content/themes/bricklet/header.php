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
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/timber-house-collaboration.webp" fetchpriority="high" />
    <?php elseif (is_page_template('page-product.php')) : ?>
        <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" />
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

    <!-- Google Fonts Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=architecture,arrow_back,arrow_forward,assignment_return,call,check_circle,chevron_left,chevron_right,close,corporate_fare,directions,domain,eco,engineering,error,foundation,group,handshake,home_work,inventory_2,landscape,list,location_city,location_on,mail,menu,north_east,phone,precision_manufacturing,public,rocket_launch,search,security,send,settings_suggest,shopping_cart,verified,visibility,volume_off,zoom_in&display=swap" />

    <!-- Compiled Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/tailwind-build.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

    <!-- Custom CSS for layout effects -->
    <style type="text/css">
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .text-gradient-primary {
            background: linear-gradient(135deg, #006491 0%, #03C5F0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .scroll-progress {
            height: 4px;
            background: #00b3ff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 60;
            transition: width 0.1s ease-out, background-color 0.3s ease;
        }
        .scroll-progress.is-scrolled {
            background: #d4af37; /* Gold progress bar on top of cyan header */
        }
        /* Scrolled Header Styling */
        header {
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }
        header.is-scrolled {
            background-color: #00b3ff !important;
            border-bottom-color: rgba(255, 255, 255, 0.25) !important;
            box-shadow: 0 4px 20px -2px rgba(0, 140, 200, 0.35) !important;
        }
        header.is-scrolled #nav-closed-state {
            color: #ffffff !important;
        }
        header.is-scrolled #nav-closed-state svg {
            stroke: #ffffff !important;
        }
        header.is-scrolled #nav-closed-state:hover {
            color: #f0f9ff !important;
            opacity: 0.95;
        }
        header.is-scrolled #nav-open-state {
            background-color: #ffffff !important;
            color: #008cc7 !important;
            border-color: #ffffff !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
        }
        header.is-scrolled #nav-cta-btn {
            background-color: #ffffff !important;
            color: #006491 !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15) !important;
        }
        header.is-scrolled #nav-cta-btn:hover {
            background-color: #f0f9ff !important;
            color: #004d70 !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2) !important;
        }
        header.is-scrolled #subnav-container {
            background-color: #00a2e8 !important;
            border-top-color: rgba(255, 255, 255, 0.2) !important;
        }
        header.is-scrolled #subnav-container nav a {
            color: #ffffff !important;
            transition: color 0.2s ease, border-color 0.2s ease;
        }
        header.is-scrolled #subnav-container nav a:hover {
            color: #e0f2fe !important;
        }
        header.is-scrolled #subnav-container nav a[class*="border-[#c49e2b]"] {
            color: #ffffff !important;
            border-color: #ffffff !important;
        }
        /* Mobile menu transitions */
        #mobile-menu-drawer {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        /* Reveal animations for pages */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-on-scroll.active {
            opacity: 1;
            transform: translateY(0);
        }
        .gap-2svw{
            gap: 2svw;
        }
    </style>
</head>
<body <?php body_class("bg-background text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed"); ?>>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="progressBar" style="width: 0%;"></div>

    <?php
    // Fetch current page slug
    global $post;
    $current_slug = '';
    if ( is_front_page() || is_home() ) {
        $current_slug = 'home';
    } elseif ( $post ) {
        $current_slug = $post->post_name;
    }

    // Dynamic menu data based on page slugs
    $nav_items = array(
        array( 'title' => 'BERANDA', 'slug' => 'home', 'url' => home_url('/') ),
        array( 'title' => 'OUR PROJECT', 'slug' => 'products', 'url' => home_url('/products/') ),
        array( 'title' => 'COMPANY PROFILE', 'slug' => 'company-profile', 'url' => home_url('/company-profile/') ),
        array( 'title' => 'OUR BUSINESS', 'slug' => 'our-business', 'url' => home_url('/our-business/') ),
        array( 'title' => 'GROUP COMPANY', 'slug' => 'group-company', 'url' => home_url('/group-company/') ),
        array( 'title' => 'KONTAK', 'slug' => 'contact', 'url' => home_url('/contact/') ),
    );
    ?>

    <!-- Navigation Header -->
    <header id="site-header" class="sticky top-0 w-full z-50 bg-white shadow-sm border-b border-gray-200">
        <!-- Top Bar -->
        <div class="max-w-container-max mx-auto px-4 md:px-8 h-16 md:h-20 flex justify-between items-center relative">
            <!-- Left: MENU / CLOSE Toggle Button -->
            <div class="flex items-center w-1/4 justify-start">
                <button id="nav-toggle-btn" class="flex items-center focus:outline-none transition-all duration-200" aria-label="Toggle Menu">
                    <!-- Closed State (Image 2) -->
                    <span id="nav-closed-state" class="flex items-center gap-2 text-gray-800 hover:text-gray-900 font-bold text-xs md:text-sm tracking-wider">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span>MENU</span>
                    </span>
                    
                    <!-- Open State (Image 3) -->
                    <span id="nav-open-state" class="hidden flex items-center gap-1.5 bg-[#faf8eb] text-[#c49e2b] border border-[#fef08a] px-3 py-1.5 rounded-md text-xs md:text-sm font-bold tracking-wider shadow-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-5 md:h-5 stroke-[2.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>CLOSE</span>
                    </span>
                </button>
            </div>

            <!-- Center: Logo -->
            <div class="flex items-center justify-center w-2/4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:opacity-90 transition-opacity flex items-center">
                    <img alt="PT Perumnas Iida Group Logo" class="h-10 md:h-12 object-contain max-h-12" src="<?php echo get_template_directory_uri(); ?>/PT_Perumnas_Iida_Group_Logo3_transparent.png">
                </a>
            </div>

            <!-- Right: Golden Button ("Hubungi Kami") -->
            <div class="flex items-center w-1/4 justify-end">
                <!-- <a id="nav-cta-btn" href="https://wa.me/6281288336230?text=Halo%20saya%20tertarik%20dengan%20info%20Perumnas%20Iida%20Group" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center bg-[#d4af37] hover:bg-[#c49e2b] text-white px-5 py-2 rounded-full font-medium text-xs md:text-sm shadow-sm transition-all duration-300 hover:shadow-md active:scale-95 whitespace-nowrap">
                    <span>Hubungi Kami</span>
                </a> -->
            </div>
        </div>

        <!-- Sub-Bar: Expandable Menu Links (Image 3) -->
        <div id="subnav-container" class="hidden border-t border-gray-200 bg-white transition-all duration-300">
            <div class="max-w-container-max mx-auto px-4 py-3 md:py-4">
                <nav class="flex flex-wrap justify-center items-center gap-5 md:gap-10">
                    <?php foreach ($nav_items as $item) : 
                        $is_active = ($current_slug === $item['slug']);
                        $class = $is_active 
                            ? 'text-[#c49e2b] font-bold uppercase tracking-widest text-xs md:text-sm pb-1 border-b-2 border-[#c49e2b]' 
                            : 'text-gray-700 hover:text-[#c49e2b] font-semibold uppercase tracking-widest text-xs md:text-sm transition-colors';
                        ?>
                        <a class="<?php echo esc_attr($class); ?>" href="<?php echo esc_url($item['url']); ?>">
                            <?php echo esc_html($item['title']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
    </header>

    <script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
        document.addEventListener("DOMContentLoaded", function() {
            const navToggleBtn = document.getElementById("nav-toggle-btn");
            const navClosedState = document.getElementById("nav-closed-state");
            const navOpenState = document.getElementById("nav-open-state");
            const subnavContainer = document.getElementById("subnav-container");

            if (navToggleBtn && subnavContainer) {
                navToggleBtn.addEventListener("click", function() {
                    const isHidden = subnavContainer.classList.contains("hidden");
                    if (isHidden) {
                        subnavContainer.classList.remove("hidden");
                        navClosedState.classList.add("hidden");
                        navOpenState.classList.remove("hidden");
                    } else {
                        subnavContainer.classList.add("hidden");
                        navClosedState.classList.remove("hidden");
                        navOpenState.classList.add("hidden");
                    }
                });
            }
        });
    </script>
