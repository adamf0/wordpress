<?php
/**
 * Template Name: Overview / About Us
 * Description: Corporate Overview matching exact content from ighd.co.id with slider and Director & Management Team presentation (without profiling).
 */

get_header();
?>

<style>
/* ==========================================================================
   Overview / About Us Corporate Layout (PT Iida Group Holdings)
   ========================================================================== */

.ov-page-wrapper {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #1e293b;
    background-color: #ffffff;
    width: 100%;
    overflow-x: hidden;
}

/* --------------------------------------------------------------------------
   1. HERO BANNER
   -------------------------------------------------------------------------- */
.ov-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: #0a1f2c;
    overflow: hidden;
}
@media (min-width: 768px) {
    .ov-hero-banner {
        min-height: 380px;
    }
}
.ov-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    z-index: 1;
}
.ov-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(7, 23, 34, 0.90) 0%, rgba(10, 31, 44, 0.72) 50%, rgba(7, 23, 34, 0.65) 100%);
    z-index: 2;
}
.ov-hero-inner {
    position: relative;
    z-index: 3;
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 3.5rem 1.5rem;
}
@media (min-width: 1024px) {
    .ov-hero-inner {
        padding: 4.5rem 3rem;
    }
}
.ov-breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.8125rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 1.5rem;
}
.ov-breadcrumb a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: color 0.2s ease;
}
.ov-breadcrumb a:hover {
    color: #03c5f0;
}
.ov-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.35);
}
.ov-breadcrumb .current {
    color: #ffffff;
    font-weight: 600;
}
.ov-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0.85rem;
}
.ov-hero-tag-bar {
    width: 3px;
    height: 18px;
    background-color: #03c5f0;
    border-radius: 2px;
}
.ov-hero-tag-text {
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}
.ov-hero-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    font-weight: 800;
    line-height: 1.15;
    color: #ffffff;
    letter-spacing: -0.02em;
    margin: 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

/* --------------------------------------------------------------------------
   2. SECTION 1: ABOUT US OVERVIEW & RESIDENTIAL SLIDER
   -------------------------------------------------------------------------- */
.ov-main-section {
    padding: 4.5rem 1.5rem;
    background-color: #ffffff;
}
@media (min-width: 1024px) {
    .ov-main-section {
        padding: 6rem 3rem;
    }
}
.ov-container {
    max-width: 1240px;
    margin: 0 auto;
    width: 100%;
}

.ov-about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 3rem;
    align-items: center;
}
@media (min-width: 992px) {
    .ov-about-grid {
        grid-template-columns: 1fr 1fr;
        gap: 4.5rem;
    }
}

/* Slider Component */
.ov-slider-container {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    background-color: #0f172a;
    box-shadow: 0 16px 40px -10px rgba(15, 23, 42, 0.15), 0 4px 12px rgba(15, 23, 42, 0.05);
    border: 1px solid #e2e8f0;
}
.ov-slider-track {
    display: flex;
    transition: transform 0.55s cubic-bezier(0.25, 1, 0.5, 1);
    width: 100%;
}
.ov-slide {
    min-width: 100%;
    position: relative;
    aspect-ratio: 4 / 4;
}
@media (min-width: 768px) {
    .ov-slide {
        aspect-ratio: 1 / 1;
    }
}
.ov-slide-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Slider Controls */
.ov-slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.9);
    color: #0a1f2c;
    border: 1px solid rgba(0, 0, 0, 0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
.ov-slider-btn:hover {
    background-color: #03c5f0;
    color: #0a1f2c;
    transform: translateY(-50%) scale(1.08);
}
.ov-slider-prev {
    left: 16px;
}
.ov-slider-next {
    right: 16px;
}
.ov-slider-dots {
    position: absolute;
    bottom: 16px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 8px;
    z-index: 10;
}
.ov-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.25s ease;
}
.ov-dot.active {
    width: 24px;
    border-radius: 4px;
    background-color: #03c5f0;
}

/* Content Right Column */
.ov-about-content {
    display: flex;
    flex-direction: column;
}
.ov-section-tag {
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: #006491;
    margin-bottom: 0.75rem;
    display: block;
}
.ov-about-heading {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2rem, 3.5vw, 2.75rem);
    font-weight: 800;
    color: #0a1f2c;
    letter-spacing: -0.02em;
    margin: 0 0 1.5rem 0;
    line-height: 1.2;
}
.ov-desc-text {
    font-size: 0.95rem;
    line-height: 1.75;
    color: #475569;
    margin-bottom: 1.25rem;
}
.ov-company-list {
    list-style: none;
    padding: 0;
    margin: 0.75rem 0 1.5rem 0;
    display: flex;
    flex-direction: column;
    gap: 0.65rem;
}
.ov-company-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.04em;
    color: #1e293b;
}
.ov-bullet-chevron {
    color: #006491;
    font-weight: 800;
    font-size: 1.1rem;
    line-height: 1;
}
.ov-btn-discover {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0.9rem 2.25rem;
    background-color: #03c5f0;
    color: #0a1f2c;
    font-size: 0.8125rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.25s ease;
    align-self: flex-start;
    margin-top: 0.5rem;
    box-shadow: 0 4px 14px rgba(3, 197, 240, 0.3);
}
.ov-btn-discover:hover {
    background-color: #38d6fa;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(3, 197, 240, 0.4);
    color: #0a1f2c;
}

/* --------------------------------------------------------------------------
   3. SECTION 2: BOARD OF DIRECTORS & TEAM (WITHOUT PROFILING)
   -------------------------------------------------------------------------- */
.ov-leadership-section {
    padding: 4.5rem 1.5rem 6rem;
    background-color: #f8fafc;
    border-top: 1px solid #e2e8f0;
}
@media (min-width: 1024px) {
    .ov-leadership-section {
        padding: 5.5rem 3rem 7rem;
    }
}
/* --------------------------------------------------------------------------
   3. SECTION 2: BOARD OF DIRECTORS & TEAM (EXPANDING ACCORDION GALLERY)
   -------------------------------------------------------------------------- */
.ov-leadership-section {
    padding: 5rem 1.5rem 6rem;
    background-color: #ffffff;
    border-top: 1px solid #f1f5f9;
}
@media (min-width: 1024px) {
    .ov-leadership-section {
        padding: 6.5rem 3rem 7rem;
    }
}

.ov-team-showcase-split {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    align-items: center;
    margin-bottom: 4.5rem;
}
@media (min-width: 1024px) {
    .ov-team-showcase-split {
        grid-template-columns: 360px 1fr;
        gap: 3.5rem;
    }
}
@media (min-width: 1280px) {
    .ov-team-showcase-split {
        grid-template-columns: 390px 1fr;
        gap: 4.5rem;
    }
}

/* Left Column: Intro & Controls */
.ov-showcase-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.ov-showcase-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2rem, 3.5vw, 2.75rem);
    font-weight: 800;
    color: #0a1f2c;
    line-height: 1.15;
    letter-spacing: -0.025em;
    margin: 0 0 1.25rem 0;
}
.ov-showcase-desc {
    font-size: 1rem;
    color: #475569;
    line-height: 1.65;
    margin: 0 0 2rem 0;
}
.ov-showcase-actions {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}
.ov-team-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    background-color: rgb(10 31 44 / var(--tw-bg-opacity, 1)); /* deep-navy */
    color: #ffffff;
    font-size: 0.9375rem;
    font-weight: 600;
    padding: 0.85rem 1.85rem;
    border-radius: 9999px;
    text-decoration: none;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 14px rgba(10, 31, 44, 0.25);
    border: 1px solid transparent;
}
.ov-team-cta-btn:hover {
    background-color: #006491; /* primary */
    border-color: #00b3ff; /* theme action-cyan */
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0, 100, 145, 0.35);
}
.ov-team-cta-btn svg {
    transition: transform 0.2s ease;
}
.ov-team-cta-btn:hover svg {
    transform: translateX(3px);
}

/* Gallery Navigation Controls */
.ov-accordion-nav {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}
.ov-acc-nav-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1.5px solid #cbd5e1;
    background-color: #ffffff;
    color: #1e293b;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
}
.ov-acc-nav-btn:hover {
    border-color: #00b3ff;
    color: #006491;
    background-color: #f0f9ff;
    transform: scale(1.05);
}
.ov-acc-nav-counter {
    font-size: 0.875rem;
    font-weight: 600;
    color: #64748b;
    margin-left: 0.5rem;
    letter-spacing: 0.05em;
}

/* Right Column: Expanding Gallery */
.ov-showcase-gallery {
    width: 100%;
    overflow: hidden;
}
.ov-accordion-track {
    display: flex;
    gap: 1rem;
    height: 520px;
    width: 100%;
    align-items: stretch;
}
@media (max-width: 767px) {
    .ov-accordion-track {
        height: 480px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding-bottom: 1rem;
        -webkit-overflow-scrolling: touch;
    }
}

/* Accordion Card */
.ov-acc-card {
    position: relative;
    flex: 1;
    min-width: 80px;
    height: 100%;
    border-radius: 24px;
    overflow: hidden;
    cursor: pointer;
    background-color: #f1f5f9;
    transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s ease;
    user-select: none;
}
@media (max-width: 767px) {
    .ov-acc-card {
        flex: 0 0 280px;
        scroll-snap-align: center;
    }
}
.ov-acc-card:hover:not(.is-active) {
    box-shadow: 0 10px 25px -6px rgba(15, 23, 42, 0.12);
}
.ov-acc-card.is-active {
    flex: 3.4;
    min-width: 300px;
    max-width: 380px;
    cursor: default;
    box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.18);
}
@media (max-width: 767px) {
    .ov-acc-card.is-active {
        flex: 0 0 300px;
    }
}

.ov-acc-inner {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    background-color: #ffffff;
}

/* Portrait Image Container */
.ov-acc-image-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    background-color: #f1f5f9;
    transition: height 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    flex-shrink: 0;
}
.ov-acc-card.is-active .ov-acc-image-wrapper {
    height: 58%;
}
.ov-acc-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 18%;
    display: block;
    transition: transform 0.6s ease;
}
.ov-acc-card:hover .ov-acc-img {
    transform: scale(1.03);
}

/* Inactive Collapsed Name Tag (Subtle bottom overlay) */
.ov-acc-collapsed-hint {
    position: absolute;
    bottom: 16px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
    z-index: 2;
}
.ov-acc-card:not(.is-active):hover .ov-acc-collapsed-hint {
    opacity: 1;
}
.ov-acc-hint-text {
    background: rgba(10, 31, 44, 0.85);
    color: #ffffff;
    font-size: 0.6875rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
    white-space: nowrap;
    backdrop-filter: blur(4px);
}
.ov-acc-card.is-active .ov-acc-collapsed-hint {
    display: none;
}

/* Active Bottom Info Container (Theme Palette: Soft Cyan / Deep Navy) */
.ov-acc-card-info {
    width: 100%;
    height: 42%;
    background-color: #f0f9ff; /* Soft cyan surface matching #00b3ff theme */
    border-top: 2px solid #00b3ff; /* Theme action-cyan accent line */
    padding: 1.25rem 1.4rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-sizing: border-box;
    opacity: 0;
    transform: translateY(16px);
    pointer-events: none;
    transition: opacity 0.4s ease 0.15s, transform 0.4s cubic-bezier(0.25, 1, 0.5, 1) 0.15s;
}
.ov-acc-card.is-active .ov-acc-card-info {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

.ov-acc-info-header {
    margin-bottom: 0.25rem;
}
.ov-acc-member-name {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: rgb(10 31 44 / var(--tw-text-opacity, 1)); /* deep-navy */
    margin: 0 0 2px 0;
    line-height: 1.25;
    letter-spacing: -0.01em;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.ov-acc-member-role {
    font-size: 0.8125rem;
    font-weight: 600;
    color: #006491; /* primary corporate blue */
    margin: 0;
    line-height: 1.3;
}

/* Short Quote / Bio */
.ov-acc-quote {
    font-size: 0.8125rem;
    color: #374151;
    line-height: 1.45;
    margin: 0.5rem 0 0 0;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Team Metrics Strip */
.ov-metrics-strip {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 2rem 1.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
}
@media (min-width: 768px) {
    .ov-metrics-strip {
        grid-template-columns: repeat(3, 1fr);
        padding: 2.5rem 2rem;
    }
}
.ov-metric-box {
    text-align: center;
    padding: 0.5rem 1rem;
}
@media (min-width: 768px) {
    .ov-metric-box:not(:last-child) {
        border-right: 1px solid #e2e8f0;
    }
}
.ov-metric-number {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 2.25rem;
    font-weight: 800;
    color: #006491;
    line-height: 1;
    margin-bottom: 0.5rem;
}
.ov-metric-label {
    font-size: 0.8125rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #0a1f2c;
    margin-bottom: 0.25rem;
}
.ov-metric-desc {
    font-size: 0.75rem;
    color: #64748b;
}
</style>

<main class="ov-page-wrapper">

    <!-- ========================================================================
         1. HERO BANNER
         ======================================================================== -->
    <section class="ov-hero-banner">
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/vision-mission/bg-header-company-data.jpg'); ?>" 
            alt="PT. Iida Group Holdings Building" 
            class="ov-hero-bg" 
            fetchpriority="high"
            decoding="sync"
        />
        <div class="ov-hero-overlay"></div>
        <div class="ov-hero-inner">
            <nav class="ov-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/aboutus/')); ?>">About Us</a>
                <span class="separator">/</span>
                <span class="current">Overview</span>
            </nav>
            <h1 class="ov-hero-title">About Us</h1>
        </div>
    </section>

    <!-- ========================================================================
         2. SECTION 1: ABOUT US OVERVIEW & RESIDENTIAL SHOWCASE SLIDER
         ======================================================================== -->
    <section class="ov-main-section">
        <div class="ov-container">
            <div class="ov-about-grid">

                <!-- Left Column: Interactive Image Slider (4 Official Houses) -->
                <div class="ov-slider-container" id="ovSlider">
                    <div class="ov-slider-track" id="ovSliderTrack">
                        
                        <div class="ov-slide">
                            <img 
                                src="<?php echo esc_url(get_template_directory_uri() . '/images/about-us/img-home-1-new.jpg'); ?>" 
                                alt="Hikari Garden Denpasar by Ione" 
                                class="ov-slide-img" 
                                fetchpriority="high"
                            />
                        </div>

                        <div class="ov-slide">
                            <img 
                                src="<?php echo esc_url(get_template_directory_uri() . '/images/about-us/img-home-2.jpg'); ?>" 
                                alt="Iida Group Residential Development" 
                                class="ov-slide-img" 
                                loading="lazy"
                            />
                        </div>

                        <div class="ov-slide">
                            <img 
                                src="<?php echo esc_url(get_template_directory_uri() . '/images/about-us/img-home-3.jpg'); ?>" 
                                alt="Iida Group Housing Project" 
                                class="ov-slide-img" 
                                loading="lazy"
                            />
                        </div>

                        <div class="ov-slide">
                            <img 
                                src="<?php echo esc_url(get_template_directory_uri() . '/images/about-us/img-home-4.jpg'); ?>" 
                                alt="Iida Group Modern Architecture" 
                                class="ov-slide-img" 
                                loading="lazy"
                            />
                        </div>

                    </div>

                    <!-- Navigation Arrows -->
                    <button class="ov-slider-btn ov-slider-prev" id="ovPrevBtn" aria-label="Previous Slide">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button class="ov-slider-btn ov-slider-next" id="ovNextBtn" aria-label="Next Slide">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>

                    <!-- Dot Indicators -->
                    <div class="ov-slider-dots" id="ovSliderDots">
                        <span class="ov-dot active" data-index="0"></span>
                        <span class="ov-dot" data-index="1"></span>
                        <span class="ov-dot" data-index="2"></span>
                        <span class="ov-dot" data-index="3"></span>
                    </div>
                </div>

                <!-- Right Column: Official Content from ighd.co.id/about-us -->
                <div class="ov-about-content">
                    <span class="ov-section-tag">ABOUT US</span>
                    <h2 class="ov-about-heading">PT Iida Group Holdings</h2>
                    
                    <p class="ov-desc-text">
                        PT Iida Group Holdings is a subsidiary of a Japanese developer company, established in July 2016, in Indonesia.
                    </p>
                    
                    <p class="ov-desc-text">
                        It’s parent company, Iida Group Holdings Co., Ltd. was formed through the integration of 50-years experienced 6 listed detached housing companies, namely :
                    </p>

                    <ul class="ov-company-list">
                        <li class="ov-company-item">
                            <span class="ov-bullet-chevron" aria-hidden="true">&#8250;</span>
                            <span>HAJIME CONSTRUCTION, CO.,LTD</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-bullet-chevron" aria-hidden="true">&#8250;</span>
                            <span>IIDA SANGYO CO., LTD</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-bullet-chevron" aria-hidden="true">&#8250;</span>
                            <span>TOUEI HOUSING CORPORATION TACT HOME CO.,LTD</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-bullet-chevron" aria-hidden="true">&#8250;</span>
                            <span>ARNEST ONE CORPORATION IO HOME CO.,LTD</span>
                        </li>
                    </ul>

                    <p class="ov-desc-text">
                        And also, it has consolidated 1 wood processing company, FIRST WOOD CO., LTD. as a part of its corporation.
                    </p>

                    <p class="ov-desc-text">
                        This company is owned 100% by IIDA GROUP HOLDINGS group and we aim to realize a market environment where all are able to afford a house, by means of contributing to the procurement of building materials to its subsidiaries and affiliated companies.
                    </p>

                    <a href="<?php echo esc_url(home_url('/aboutus/vision_mission/')); ?>" class="ov-btn-discover">
                        DISCOVER MORE
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================================================
         3. SECTION 2: BOARD OF DIRECTORS & TEAM (EXPANDING ACCORDION GALLERY)
         ======================================================================== -->
    <?php
    global $wpdb;
    $table_team = $wpdb->prefix . 'igh_leadership_team';
    $leadership_members = $wpdb->get_results("SELECT * FROM {$table_team} WHERE is_active = 1 ORDER BY sort_order ASC, id ASC", ARRAY_A);
    $total_members = !empty($leadership_members) ? count($leadership_members) : 0;
    ?>
    <section class="ov-leadership-section" id="leadership-team">
        <div class="ov-container">

            <div class="ov-team-showcase-split">
                <!-- Left Column: Heading, Subtitle & Action Controls -->
                <div class="ov-showcase-info">
                    <span class="ov-section-tag">LEADERSHIP &amp; GOVERNANCE</span>
                    <h2 class="ov-showcase-title">Board of Directors &amp; Management Team</h2>
                    <p class="ov-showcase-desc">
                        These individuals are the heart and soul of our corporate leadership, driving Japanese engineering precision, earthquake-resistant standards, and dedicated housing innovation across Indonesia.
                    </p>

                    <div class="ov-showcase-actions">
                        <a href="<?php echo esc_url(home_url('/aboutus/vision_mission/')); ?>" class="ov-team-cta-btn">
                            <span>Explore Our Vision</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <?php if ($total_members > 1): ?>
                    <!-- Navigation Controls for Expanding Gallery -->
                    <div class="ov-accordion-nav">
                        <button type="button" class="ov-acc-nav-btn" id="ovTeamPrev" aria-label="Previous Team Member">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button type="button" class="ov-acc-nav-btn" id="ovTeamNext" aria-label="Next Team Member">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                        <span class="ov-acc-nav-counter" id="ovTeamCounter">1 / <?php echo $total_members; ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Right Column: Interactive Animated Expanding Cards Gallery -->
                <div class="ov-showcase-gallery">
                    <div class="ov-accordion-track" id="ovAccordionTrack">
                        <?php 
                        if (!empty($leadership_members)):
                            $m_idx = 0;
                            foreach ($leadership_members as $member): 
                                $is_active = ($m_idx === 0) ? 'is-active' : '';
                                $photo_url = !empty($member['photo_url']) ? $member['photo_url'] : get_template_directory_uri() . '/images/team/sagiri-sakurai.jpg';
                        ?>
                        <div class="ov-acc-card <?php echo $is_active; ?>" data-index="<?php echo $m_idx; ?>" role="button" tabindex="0" aria-label="<?php echo esc_attr($member['name']); ?>">
                            <div class="ov-acc-inner">
                                <!-- Person Portrait -->
                                <div class="ov-acc-image-wrapper">
                                    <img 
                                        src="<?php echo esc_url($photo_url); ?>" 
                                        alt="<?php echo esc_attr($member['name']); ?>" 
                                        class="ov-acc-img"
                                        loading="lazy"
                                    />
                                    <div class="ov-acc-collapsed-hint">
                                        <span class="ov-acc-hint-text"><?php echo esc_html($member['name']); ?></span>
                                    </div>
                                </div>

                                <!-- Expanded Info Bottom Panel -->
                                <div class="ov-acc-card-info">
                                    <div class="ov-acc-info-header">
                                        <h3 class="ov-acc-member-name"><?php echo esc_html($member['name']); ?></h3>
                                        <p class="ov-acc-member-role"><?php echo esc_html($member['position']); ?></p>
                                    </div>
                                    <?php if (!empty($member['bio_short'])): ?>
                                    <p class="ov-acc-quote">
                                        <?php echo esc_html($member['bio_short']); ?>
                                    </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                                $m_idx++;
                            endforeach;
                        endif; 
                        ?>
                    </div>
                </div>
            </div>

            <!-- Corporate Team Strength & Regional Operations Summary -->
            <div class="ov-metrics-strip">
                <div class="ov-metric-box">
                    <div class="ov-metric-number">38</div>
                    <div class="ov-metric-label">Total Employees</div>
                    <div class="ov-metric-desc">As of March 31, 2025 across all operations</div>
                </div>
                <div class="ov-metric-box">
                    <div class="ov-metric-number">4</div>
                    <div class="ov-metric-label">Group Companies in Indonesia</div>
                    <div class="ov-metric-desc">Hajime, Perumnas Iida Group, Tact Home, Ione Home</div>
                </div>
                <div class="ov-metric-box">
                    <div class="ov-metric-number">2</div>
                    <div class="ov-metric-label">Manufacturing Facilities</div>
                    <div class="ov-metric-desc">Cileungsi &amp; Gunung Putri, Bogor</div>
                </div>
            </div>

        </div>
    </section>

</main>

<!-- Vanilla JS Lightweight Slider Controller -->
<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('ovSliderTrack');
    const slides = document.querySelectorAll('.ov-slide');
    const prevBtn = document.getElementById('ovPrevBtn');
    const nextBtn = document.getElementById('ovNextBtn');
    const dots = document.querySelectorAll('.ov-dot');
    const totalSlides = slides.length;
    let currentIndex = 0;
    let autoPlayTimer = null;

    function goToSlide(index) {
        if (index < 0) {
            currentIndex = totalSlides - 1;
        } else if (index >= totalSlides) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        
        if (track) {
            track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';
        }
        
        dots.forEach((dot, idx) => {
            if (idx === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            goToSlide(currentIndex - 1);
            resetAutoPlay();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            goToSlide(currentIndex + 1);
            resetAutoPlay();
        });
    }

    dots.forEach((dot) => {
        dot.addEventListener('click', function() {
            const idx = parseInt(this.getAttribute('data-index'), 10);
            goToSlide(idx);
            resetAutoPlay();
        });
    });

    function startAutoPlay() {
        autoPlayTimer = setInterval(function() {
            goToSlide(currentIndex + 1);
        }, 4500);
    }

    function resetAutoPlay() {
        if (autoPlayTimer) clearInterval(autoPlayTimer);
        startAutoPlay();
    }

    const sliderContainer = document.getElementById('ovSlider');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', function() {
            if (autoPlayTimer) clearInterval(autoPlayTimer);
        });
        sliderContainer.addEventListener('mouseleave', function() {
            startAutoPlay();
        });
    }

    startAutoPlay();

    // ----------------------------------------------------
    // Expanding Team Accordion Gallery Interactivity
    // ----------------------------------------------------
    const teamCards = document.querySelectorAll('.ov-acc-card');
    const teamPrevBtn = document.getElementById('ovTeamPrev');
    const teamNextBtn = document.getElementById('ovTeamNext');
    const teamCounter = document.getElementById('ovTeamCounter');
    const totalTeam = teamCards.length;
    let activeTeamIndex = 0;

    function activateCard(index) {
        if (totalTeam === 0) return;
        if (index < 0) {
            activeTeamIndex = totalTeam - 1;
        } else if (index >= totalTeam) {
            activeTeamIndex = 0;
        } else {
            activeTeamIndex = index;
        }

        teamCards.forEach((card, i) => {
            if (i === activeTeamIndex) {
                card.classList.add('is-active');
                if (window.innerWidth < 768) {
                    card.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            } else {
                card.classList.remove('is-active');
            }
        });

        if (teamCounter) {
            teamCounter.textContent = (activeTeamIndex + 1) + ' / ' + totalTeam;
        }
    }

    teamCards.forEach((card, idx) => {
        card.addEventListener('mouseenter', function() {
            activateCard(idx);
        });
        card.addEventListener('click', function() {
            activateCard(idx);
        });
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                activateCard(idx);
            }
        });
    });

    if (teamPrevBtn) {
        teamPrevBtn.addEventListener('click', function() {
            activateCard(activeTeamIndex - 1);
        });
    }

    if (teamNextBtn) {
        teamNextBtn.addEventListener('click', function() {
            activateCard(activeTeamIndex + 1);
        });
    }
});
</script>

<?php
get_footer();
?>
