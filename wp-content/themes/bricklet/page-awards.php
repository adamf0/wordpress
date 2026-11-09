<?php
/**
 * Template Name: Awards & Recognition
 * Description: Daftar Penghargaan Korporasi (79 Awards: 2017-2025) serta Sertifikasi Paten Resmi IG SCB IDP000069171 & SNI.
 */

get_header();

$awards_by_year = function_exists('bricklet_get_awards_data') ? bricklet_get_awards_data() : array();

$all_awards = array();
$year_counts = array();
$years_desc = array_keys($awards_by_year);
rsort($years_desc);

foreach ($years_desc as $yr) {
    $items = $awards_by_year[$yr];
    $year_counts[$yr] = count($items);
    foreach ($items as $item) {
        $item['year'] = $yr;
        $all_awards[] = $item;
    }
}
$total_awards_count = count($all_awards);
$spotlight_awards = array_slice($all_awards, 0, 5);
$theme_uri = get_template_directory_uri();
$fallback_award_img = $theme_uri . '/images/pdf/ig-scb-patent-idp000069171.webp';
$pdf_url = home_url('/Indonesia_Company%20profile_20231025.pdf');
?>

<style>
/* ==========================================================================
   Awards, Recognition & Certifications Layout
   ========================================================================== */

.aw-page-wrapper {
    font-family: var(--font-body);
    color: var(--color-text-body);
    background-color: var(--color-surface);
    width: 100%;
    overflow-x: hidden;
}

.aw-container {
    max-width: var(--container-max);
    margin: 0 auto;
    width: 100%;
    padding-left: var(--gutter);
    padding-right: var(--gutter);
}

.aw-visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip-path: inset(50%);
    white-space: nowrap;
    border: 0;
}

/* 1. HERO BANNER */
.aw-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: var(--color-deep-navy);
    overflow: hidden;
}
@media (min-width: 768px) {
    .aw-hero-banner {
        min-height: 390px;
    }
}
.aw-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    z-index: 1;
}
.aw-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.80) 55%, rgba(10, 31, 44, 0.68) 100%);
    z-index: 2;
}
.aw-hero-inner {
    position: relative;
    z-index: 3;
    max-width: var(--container-max);
    width: 100%;
    margin: 0 auto;
    padding: 3rem var(--gutter);
}
.aw-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 6px;
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #cbd5e1;
    margin-bottom: 1.25rem;
}
.aw-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    padding: 0 4px;
    color: #cbd5e1;
    text-decoration: none;
    transition: color var(--dur-fast) var(--ease-in-out);
}
.aw-breadcrumb a:hover,
.aw-breadcrumb a:focus-visible {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
}
.aw-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.aw-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.55);
}
.aw-breadcrumb .current {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #ffffff;
    font-weight: 700;
}
.aw-hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.15rem, 4.5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.12;
    color: #ffffff;
    letter-spacing: -0.025em;
    margin: 0 0 0.9rem;
}
.aw-hero-subtitle {
    font-size: 1.05rem;
    color: rgba(255, 255, 255, 0.85);
    max-width: 62ch;
    line-height: 1.65;
    margin: 0;
}

/* 2. SPOTLIGHT SECTION */
.aw-spotlight-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.aw-spotlight-split {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    align-items: center;
}
@media (min-width: 1024px) {
    .aw-spotlight-split {
        grid-template-columns: 380px 1fr;
        gap: 3.5rem;
    }
}
@media (min-width: 1280px) {
    .aw-spotlight-split {
        grid-template-columns: 400px 1fr;
        gap: 4rem;
    }
}
.aw-section-tag {
    display: block;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-primary);
    margin-bottom: 0.7rem;
}
.aw-spotlight-title {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.3vw, 2.6rem);
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.15;
    letter-spacing: -0.02em;
    margin: 0 0 1.1rem;
}
.aw-spotlight-desc {
    font-size: var(--text-base);
    color: var(--color-text-body);
    line-height: 1.65;
    margin: 0 0 1.75rem;
}
.aw-spotlight-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 1.75rem;
}
.aw-spotlight-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    min-height: 44px;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 700;
    padding: 0.75rem 1.6rem;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.aw-spotlight-cta:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.aw-spotlight-cta:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

.aw-accordion-nav {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}
.aw-acc-nav-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1.5px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: border-color var(--dur-fast) var(--ease-in-out), background-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
}
.aw-acc-nav-btn:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background-color: var(--color-primary-container);
}
.aw-acc-nav-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-acc-nav-counter {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-muted);
    min-width: 48px;
    text-align: center;
}

/* Expanding Spotlight Gallery */
.aw-spotlight-gallery {
    width: 100%;
    overflow: hidden;
}
.aw-accordion-track {
    display: flex;
    gap: 1rem;
    height: 490px;
    width: 100%;
    align-items: stretch;
}
@media (max-width: 767px) {
    .aw-accordion-track {
        height: 450px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding-bottom: 0.75rem;
        -webkit-overflow-scrolling: touch;
    }
}
.aw-acc-card {
    position: relative;
    flex: 1;
    min-width: 78px;
    height: 100%;
    border-radius: var(--radius-lg);
    overflow: hidden;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    transition: flex 0.5s var(--ease-out-expo), box-shadow var(--dur-base) var(--ease-in-out), border-color var(--dur-base) var(--ease-in-out);
}
@media (max-width: 767px) {
    .aw-acc-card {
        flex: 0 0 280px;
        scroll-snap-align: center;
    }
}
.aw-acc-card.is-active {
    flex: 3.4;
    min-width: 280px;
    max-width: 390px;
    border-color: var(--color-primary);
    box-shadow: var(--shadow-lg);
}
@media (max-width: 767px) {
    .aw-acc-card.is-active {
        flex: 0 0 300px;
    }
}
.aw-acc-card:has(.aw-acc-trigger:focus-visible) {
    outline: 3px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-acc-inner {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    background-color: var(--color-surface);
}
.aw-acc-image-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
    transition: height 0.5s var(--ease-out-expo);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2.5rem 1.25rem 1.25rem;
}
.aw-acc-card.is-active .aw-acc-image-wrapper {
    height: 56%;
    padding: 2.25rem 1.25rem 1rem;
}
.aw-acc-img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    display: block;
}
.aw-acc-badge-year {
    position: absolute;
    top: 12px;
    left: 12px;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 700;
    padding: 4px 11px;
    border-radius: var(--radius-pill);
    z-index: 4;
    letter-spacing: 0.04em;
    pointer-events: none;
}
.aw-acc-collapsed-hint {
    position: absolute;
    bottom: 14px;
    left: 6px;
    right: 6px;
    display: flex;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--dur-fast) var(--ease-in-out);
    pointer-events: none;
}
.aw-acc-card:not(.is-active):hover .aw-acc-collapsed-hint {
    opacity: 1;
}
.aw-acc-hint-text {
    background-color: rgba(10, 31, 44, 0.9);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 600;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    white-space: nowrap;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
}
.aw-acc-card.is-active .aw-acc-collapsed-hint {
    display: none;
}
.aw-acc-card-info {
    width: 100%;
    height: 44%;
    background-color: var(--color-primary-container);
    border-top: 2px solid var(--color-primary);
    padding: 1.15rem 1.35rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-sizing: border-box;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.35s var(--ease-in-out);
}
.aw-acc-card.is-active .aw-acc-card-info {
    opacity: 1;
    pointer-events: auto;
}
.aw-acc-award-name {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--color-text-heading);
    margin: 0 0 4px;
    line-height: 1.25;
}
.aw-acc-trigger {
    background: transparent;
    border: 0;
    padding: 0;
    font: inherit;
    color: inherit;
    text-align: left;
    cursor: pointer;
}
.aw-acc-trigger::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 3;
}
.aw-acc-trigger:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-acc-award-desc {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-on-primary-container);
    margin: 0;
    line-height: 1.4;
}
.aw-acc-quote {
    font-size: var(--text-xs);
    color: var(--color-primary-strong);
    font-weight: 700;
    line-height: 1.4;
    margin: 0.5rem 0 0;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Metrics Strip */
.aw-metrics-strip {
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 1.75rem 1.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-top: 3.5rem;
}
@media (min-width: 768px) {
    .aw-metrics-strip {
        grid-template-columns: repeat(3, 1fr);
        padding: 2.25rem 2rem;
    }
}
.aw-metric-box {
    text-align: center;
    padding: 0.5rem 1rem;
}
@media (min-width: 768px) {
    .aw-metric-box:not(:last-child) {
        border-right: 1px solid var(--color-border-strong);
    }
}
.aw-metric-number {
    font-family: var(--font-display);
    font-size: 2.1rem;
    font-weight: 800;
    color: var(--color-primary);
    line-height: 1.1;
    margin-bottom: 0.45rem;
}
.aw-metric-label {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--color-text-heading);
    margin-bottom: 0.25rem;
}
.aw-metric-desc {
    font-size: var(--text-sm);
    line-height: 1.5;
    color: var(--color-text-muted);
}

/* 3. PATENT & SNI SECTION (PDF Hal. 10-12) */
.aw-patent-section {
    padding: clamp(3.5rem, 6vw, 5rem) 0;
    background-color: var(--color-deep-navy);
    color: #ffffff;
}
.aw-patent-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(2rem, 4vw, 3.5rem);
    align-items: center;
}
@media (min-width: 960px) {
    .aw-patent-grid {
        grid-template-columns: 1.1fr 0.9fr;
    }
}
.aw-patent-kicker {
    display: block;
    margin: 0 0 0.65rem;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-action-cyan);
}
.aw-patent-title {
    margin: 0 0 1rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.4rem);
    font-weight: 800;
    line-height: 1.15;
    color: #ffffff;
}
.aw-patent-desc {
    margin: 0 0 1.5rem;
    font-size: var(--text-base);
    line-height: 1.65;
    color: #cbd5e1;
}
.aw-patent-list {
    list-style: none;
    margin: 0 0 1.75rem;
    padding: 0;
    display: grid;
    gap: 0.75rem;
}
.aw-patent-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: var(--text-sm);
    line-height: 1.55;
    color: #ffffff;
}
.aw-patent-item .material-symbols-outlined {
    color: var(--color-action-cyan);
    font-size: 20px;
    margin-top: 2px;
    flex-shrink: 0;
}
.aw-patent-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.aw-btn-light {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    background-color: #ffffff;
    color: var(--color-deep-navy);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.aw-btn-light:hover {
    background-color: var(--color-primary-container);
    color: var(--color-deep-navy);
}
.aw-btn-outline-light {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out);
}
.aw-btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.12);
    border-color: #ffffff;
    color: #ffffff;
}
.aw-patent-frame {
    background-color: #ffffff;
    border-radius: var(--radius-lg);
    padding: 1rem;
    box-shadow: var(--shadow-lg);
}
.aw-patent-frame img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: var(--radius-sm);
}

/* 4. AWARDS DIRECTORY & FILTER */
.aw-directory-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0 clamp(4.5rem, 7vw, 6.5rem);
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
}
.aw-dir-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 2.5rem;
}
.aw-dir-title {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: var(--color-text-heading);
    letter-spacing: -0.02em;
    margin: 0 0 0.85rem;
}
.aw-dir-subtitle {
    font-size: var(--text-base);
    color: var(--color-text-muted);
    line-height: 1.65;
    margin: 0;
}

.aw-toolbar {
    display: flex;
    flex-direction: column;
    gap: 1.35rem;
    margin-bottom: 3rem;
    align-items: center;
}
.aw-tabs-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 0.55rem;
    justify-content: center;
    width: 100%;
}
.aw-tab-btn {
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-body);
    font-family: var(--font-body);
    font-size: var(--text-sm);
    font-weight: 600;
    min-height: 44px;
    padding: 0.5rem 1.2rem;
    border-radius: var(--radius-pill);
    cursor: pointer;
    transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.aw-tab-btn:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background-color: var(--color-primary-container);
}
.aw-tab-btn.is-active {
    background-color: var(--color-deep-navy);
    color: #ffffff;
    border-color: var(--color-deep-navy);
}
.aw-tab-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-tab-count {
    font-size: var(--text-xs);
    font-weight: 700;
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
    padding: 1px 7px;
    border-radius: var(--radius-pill);
}
.aw-tab-btn.is-active .aw-tab-count {
    background: rgba(255, 255, 255, 0.22);
    color: #ffffff;
}

.aw-search-box {
    position: relative;
    max-width: 480px;
    width: 100%;
}
.aw-search-input {
    width: 100%;
    min-height: 44px;
    padding: 0.75rem 1.25rem 0.75rem 2.85rem;
    border-radius: var(--radius-pill);
    border: 1.5px solid var(--color-border-strong);
    background-color: var(--color-surface);
    font-family: var(--font-body);
    font-size: var(--text-base);
    color: var(--color-text-heading);
    box-sizing: border-box;
}
.aw-search-input::placeholder {
    color: var(--color-text-muted);
    opacity: 1;
}
.aw-search-input:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-color: var(--color-primary);
}
.aw-search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-text-muted);
    pointer-events: none;
}

.aw-cards-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media (min-width: 640px) {
    .aw-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .aw-cards-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (min-width: 1280px) {
    .aw-cards-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.aw-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: border-color var(--dur-base) var(--ease-in-out), box-shadow var(--dur-base) var(--ease-in-out);
    box-shadow: var(--shadow-xs);
    position: relative;
}
.aw-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.aw-card:has(.aw-card-trigger:focus-visible) {
    outline: 3px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-card-media {
    position: relative;
    height: 220px;
    background-color: var(--color-surface);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2.25rem 1.25rem 1.25rem;
    overflow: hidden;
    border-bottom: 1px solid var(--color-border);
}
.aw-card-img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    position: relative;
    z-index: 1;
}
.aw-card-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 700;
    padding: 4px 11px;
    border-radius: var(--radius-pill);
    letter-spacing: 0.04em;
    z-index: 4;
    pointer-events: none;
}
.aw-card-body {
    padding: 1.25rem 1.35rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
    background-color: var(--color-surface);
}
.aw-card-title {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.35;
    margin: 0 0 0.45rem;
}
.aw-card-trigger {
    background: transparent;
    border: 0;
    padding: 0;
    font: inherit;
    color: inherit;
    text-align: left;
    cursor: pointer;
}
.aw-card-trigger::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 3;
}
.aw-card-trigger:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-card-desc {
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    line-height: 1.5;
    margin: 0;
}

.aw-empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3.5rem 1.5rem;
    display: none;
}
.aw-empty-state.is-visible {
    display: block;
}
.aw-empty-icon {
    width: 52px;
    height: 52px;
    color: var(--color-text-muted);
    margin: 0 auto 0.85rem;
}
.aw-empty-text {
    font-size: 1.05rem;
    font-weight: 600;
    color: var(--color-text-body);
}

/* 5. NATIVE ACCESSIBLE LIGHTBOX DIALOG */
.aw-dialog {
    padding: 0;
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    max-width: 680px;
    width: calc(100% - 2rem);
    background-color: var(--color-surface);
    color: var(--color-text-body);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    margin: auto;
}
.aw-dialog:modal {
    overscroll-behavior: contain;
    max-height: 90dvh;
    overflow-y: auto;
}
.aw-dialog::backdrop {
    background-color: rgba(10, 31, 44, 0.82);
    overflow: hidden;
    overscroll-behavior: contain;
}
.aw-modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 1.5px solid var(--color-border-strong);
    color: var(--color-text-heading);
    font-size: 1.15rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: background-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
}
.aw-modal-close:hover {
    background-color: var(--color-deep-navy);
    border-color: var(--color-deep-navy);
    color: #ffffff;
}
.aw-modal-close:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.aw-modal-image-box {
    background-color: var(--color-surface-sunken);
    padding: 2.25rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 280px;
    max-height: 400px;
    border-bottom: 1px solid var(--color-border);
}
.aw-modal-image-box img {
    max-width: 100%;
    max-height: 340px;
    object-fit: contain;
}
.aw-modal-body {
    padding: 1.5rem 1.75rem;
    background-color: var(--color-surface);
}
.aw-modal-year {
    display: inline-block;
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
    font-size: var(--text-xs);
    font-weight: 700;
    padding: 4px 12px;
    border-radius: var(--radius-pill);
    margin-bottom: 0.7rem;
}
.aw-modal-title {
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.3;
    margin: 0 0 0.5rem;
}
.aw-modal-desc {
    font-size: var(--text-base);
    color: var(--color-text-body);
    line-height: 1.55;
    margin: 0;
}

@media (prefers-reduced-motion: reduce) {
    .aw-acc-card,
    .aw-acc-image-wrapper,
    .aw-acc-collapsed-hint,
    .aw-acc-card-info,
    .aw-tab-btn,
    .aw-card,
    .aw-modal-close,
    .aw-spotlight-cta,
    .aw-btn-light,
    .aw-btn-outline-light {
        transition: none;
    }
}
</style>

<main id="main-content" class="aw-page-wrapper">

    <!-- 1. HERO BANNER -->
    <section class="aw-hero-banner" aria-labelledby="aw-hero-title">
        <img
            src="<?php echo esc_url($theme_uri . '/images/vision-mission/bg-header-company-data.jpg'); ?>"
            alt="Gedung PT. Iida Group Holdings"
            class="aw-hero-bg"
            width="1920"
            height="1080"
            fetchpriority="high"
            decoding="sync"
        />
        <div class="aw-hero-overlay" aria-hidden="true"></div>

        <div class="aw-hero-inner">
            <nav class="aw-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator" aria-hidden="true">/</span>
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>">About Us</a>
                <span class="separator" aria-hidden="true">/</span>
                <span class="current" aria-current="page">Awards</span>
            </nav>

            <h1 id="aw-hero-title" class="aw-hero-title">Awards, Paten &amp; Sertifikasi</h1>
            <p class="aw-hero-subtitle">
                Apresiasi korporasi (2017 - 2025) serta pengakuan paten resmi Indonesia No. IDP000069171 dan sertifikasi SNI untuk teknologi konstruksi tahan gempa IG Strong Concrete Block.
            </p>
        </div>
    </section>

    <!-- 2. SECTION 1: SPOTLIGHT SHOWCASE -->
    <section class="aw-spotlight-section" aria-labelledby="aw-spotlight-title">
        <div class="aw-container">

            <div class="aw-spotlight-split">
                <div>
                    <span class="aw-section-tag">Honors &amp; Recognition</span>
                    <h2 id="aw-spotlight-title" class="aw-spotlight-title">Prestasi &amp; Penghargaan Bergengsi</h2>
                    <p class="aw-spotlight-desc">
                        Apresiasi ini menjadi bukti konsistensi kami dalam menghadirkan hunian berkualitas tinggi, keunggulan tata kelola korporat, inovasi transformasi digital, serta komitmen keberlanjutan bagi masyarakat Indonesia.
                    </p>

                    <div class="aw-spotlight-actions">
                        <a href="#awardsDirectory" class="aw-spotlight-cta">
                            <span>Jelajahi Seluruh Arsip (<?php echo esc_html((string) $total_awards_count); ?>)</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                        </a>
                    </div>

                    <?php if (count($spotlight_awards) > 1) : ?>
                    <div class="aw-accordion-nav">
                        <button type="button" class="aw-acc-nav-btn" id="awSpotPrev" aria-label="Penghargaan Sebelumnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button type="button" class="aw-acc-nav-btn" id="awSpotNext" aria-label="Penghargaan Berikutnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                        <span class="aw-acc-nav-counter" id="awSpotCounter" aria-live="polite">1 / <?php echo esc_html((string) count($spotlight_awards)); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="aw-spotlight-gallery">
                    <div class="aw-accordion-track" id="awAccordionTrack">
                        <?php
                        $s_idx = 0;
                        foreach ($spotlight_awards as $spot) :
                            $is_active = ($s_idx === 0) ? ' is-active' : '';
                            $img_src = !empty($spot['img_local']) ? $theme_uri . '/' . $spot['img_local'] : $fallback_award_img;
                        ?>
                        <article class="aw-acc-card<?php echo $is_active; ?>" data-index="<?php echo esc_attr((string) $s_idx); ?>">
                            <div class="aw-acc-inner">
                                <div class="aw-acc-image-wrapper">
                                    <span class="aw-acc-badge-year"><?php echo esc_html($spot['year']); ?></span>
                                    <img
                                        src="<?php echo esc_url($img_src); ?>"
                                        alt="<?php echo esc_attr($spot['title']); ?>"
                                        class="aw-acc-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                    <div class="aw-acc-collapsed-hint" aria-hidden="true">
                                        <span class="aw-acc-hint-text"><?php echo esc_html($spot['year']); ?> &middot; <?php echo esc_html(mb_strimwidth($spot['title'], 0, 24, '...')); ?></span>
                                    </div>
                                </div>

                                <div class="aw-acc-card-info">
                                    <div>
                                        <h3 class="aw-acc-award-name">
                                            <button
                                                type="button"
                                                class="aw-acc-trigger"
                                                aria-expanded="<?php echo $s_idx === 0 ? 'true' : 'false'; ?>"
                                            >
                                                <?php echo esc_html($spot['title']); ?>
                                            </button>
                                        </h3>
                                        <p class="aw-acc-award-desc"><?php echo esc_html($spot['desc']); ?></p>
                                    </div>
                                    <div class="aw-acc-quote">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                        <span>Prestasi Utama <?php echo esc_html($spot['year']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php
                            $s_idx++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>

            <!-- Corporate Metrics Strip -->
            <div class="aw-metrics-strip" aria-label="Ringkasan Prestasi">
                <div class="aw-metric-box">
                    <div class="aw-metric-number">79+</div>
                    <div class="aw-metric-label">Penghargaan Nasional</div>
                    <div class="aw-metric-desc">Pengakuan resmi dari kementerian, BUMN &amp; lembaga independen</div>
                </div>
                <div class="aw-metric-box">
                    <div class="aw-metric-number">IDP000069171</div>
                    <div class="aw-metric-label">Sertifikat Paten Resmi</div>
                    <div class="aw-metric-desc">Diterbitkan 17 Juni 2020 untuk sistem blok pracetak IG SCB</div>
                </div>
                <div class="aw-metric-box">
                    <div class="aw-metric-number">SNI &amp; HPIS</div>
                    <div class="aw-metric-label">Standar Mutu &amp; Seismik</div>
                    <div class="aw-metric-desc">Tersertifikasi SNI, uji gempa Magnitudo &gt; 8,0 &amp; standar Highest Grade</div>
                </div>
            </div>

        </div>
    </section>

    <!-- 3. SECTION 2: OFFICIAL PATENT & SNI CERTIFICATION (PDF Hal. 10-12) -->
    <section class="aw-patent-section" aria-labelledby="aw-patent-title">
        <div class="aw-container">
            <div class="aw-patent-grid">
                <div>
                    <span class="aw-patent-kicker">Hak Kekayaan Intelektual &amp; Uji Mutu Resmi (PDF Hal. 10-12)</span>
                    <h2 id="aw-patent-title" class="aw-patent-title">Paten Indonesia IDP000069171 &amp; Sertifikasi SNI IG SCB</h2>
                    <p class="aw-patent-desc">
                        Teknologi struktur dinding beton bertautan <strong>IG Strong Concrete Block (IG SCB)</strong> yang diproduksi oleh PT. Perumnas Iida Group telah memperoleh pengakuan hukum resmi di Indonesia serta lolos pengujian standar nasional dan ketahanan gempa ekstrem.
                    </p>

                    <ul class="aw-patent-list">
                        <li class="aw-patent-item">
                            <span class="material-symbols-outlined" aria-hidden="true">workspace_premium</span>
                            <span><strong>Nomor Paten Resmi:</strong> IDP000069171, ditetapkan pada tanggal <strong>17 Juni 2020</strong> di Indonesia.</span>
                        </li>
                        <li class="aw-patent-item">
                            <span class="material-symbols-outlined" aria-hidden="true">verified</span>
                            <span><strong>Sertifikasi SNI:</strong> Blok beton IG SCB diproduksi secara presisi di fasilitas pabrik sesuai Standar Nasional Indonesia.</span>
                        </li>
                        <li class="aw-patent-item">
                            <span class="material-symbols-outlined" aria-hidden="true">shield</span>
                            <span><strong>Pengujian Seismik &amp; HPIS:</strong> Teruji ketahanan terhadap gempa hingga <strong>Magnitudo &gt; 8,0</strong> serta mengikuti prinsip kualitas Jepang <strong>HPIS Highest Grade</strong>.</span>
                        </li>
                    </ul>

                    <div class="aw-patent-actions">
                        <a href="<?php echo esc_url(home_url('/product-osaka-strong-cb/')); ?>" class="aw-btn-light">
                            Pelajari Spesifikasi IG SCB
                        </a>
                        <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="aw-btn-outline-light">
                            Unduh Company Profile (PDF Nov 2023)
                        </a>
                    </div>
                </div>

                <div class="aw-patent-frame">
                    <img
                        src="<?php echo esc_url($theme_uri . '/images/pdf/ig-scb-patent-idp000069171.webp'); ?>"
                        alt="Sertifikat Paten Indonesia Nomor IDP000069171 tertanggal 17 Juni 2020 untuk IG Strong Concrete Block"
                        width="934"
                        height="645"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>
        </div>
    </section>

    <!-- 4. SECTION 3: AWARDS ARCHIVE & DIRECTORY -->
    <section class="aw-directory-section" id="awardsDirectory" aria-labelledby="aw-dir-title">
        <div class="aw-container">

            <div class="aw-dir-header">
                <span class="aw-section-tag">Awards Directory</span>
                <h2 id="aw-dir-title" class="aw-dir-title">Arsip Lengkap Penghargaan</h2>
                <p class="aw-dir-subtitle">
                    Koleksi lengkap <?php echo esc_html((string) $total_awards_count); ?> penghargaan resmi yang diterima sejak tahun 2017 hingga 2025. Gunakan filter tahun atau kolom pencarian untuk menemukan penghargaan spesifik.
                </p>
            </div>

            <div class="aw-toolbar">
                <div class="aw-tabs-wrap" id="awYearTabs" role="group" aria-label="Filter penghargaan berdasarkan tahun">
                    <button type="button" class="aw-tab-btn is-active" data-year="all" aria-pressed="true">
                        <span>Semua</span>
                        <span class="aw-tab-count"><?php echo esc_html((string) $total_awards_count); ?></span>
                    </button>
                    <?php foreach ($years_desc as $yr) : ?>
                    <button type="button" class="aw-tab-btn" data-year="<?php echo esc_attr($yr); ?>" aria-pressed="false">
                        <span><?php echo esc_html($yr); ?></span>
                        <span class="aw-tab-count"><?php echo esc_html((string) $year_counts[$yr]); ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>

                <div class="aw-search-box">
                    <label for="awSearchInput" class="aw-visually-hidden">Cari nama penghargaan, kategori, atau penyelenggara</label>
                    <svg class="aw-search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input
                        type="search"
                        id="awSearchInput"
                        class="aw-search-input"
                        placeholder="Cari nama penghargaan, kategori, atau penyelenggara..."
                    />
                </div>
            </div>

            <div class="aw-cards-grid" id="awCardsGrid">
                <?php
                foreach ($all_awards as $award) :
                    $card_img = !empty($award['img_local']) ? $theme_uri . '/' . $award['img_local'] : $fallback_award_img;
                    $search_text = strtolower($award['title'] . ' ' . $award['desc'] . ' ' . $award['year']);
                ?>
                <article
                    class="aw-card"
                    data-year="<?php echo esc_attr($award['year']); ?>"
                    data-search="<?php echo esc_attr($search_text); ?>"
                >
                    <div class="aw-card-media">
                        <span class="aw-card-badge"><?php echo esc_html($award['year']); ?></span>
                        <img
                            src="<?php echo esc_url($card_img); ?>"
                            alt="<?php echo esc_attr($award['title']); ?>"
                            class="aw-card-img"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>

                    <div class="aw-card-body">
                        <div>
                            <h3 class="aw-card-title">
                                <button
                                    type="button"
                                    class="aw-card-trigger"
                                    data-img="<?php echo esc_url($card_img); ?>"
                                    data-year="<?php echo esc_attr($award['year']); ?>"
                                    data-title="<?php echo esc_attr($award['title']); ?>"
                                    data-desc="<?php echo esc_attr($award['desc']); ?>"
                                >
                                    <?php echo esc_html($award['title']); ?>
                                </button>
                            </h3>
                            <?php if (!empty($award['desc'])) : ?>
                            <p class="aw-card-desc"><?php echo esc_html($award['desc']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>

                <div class="aw-empty-state" id="awEmptyState" role="status" aria-live="polite">
                    <svg class="aw-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <p class="aw-empty-text">Tidak ditemukan penghargaan yang sesuai dengan kata kunci pencarian.</p>
                </div>
            </div>

        </div>
    </section>

</main>

<!-- Native Accessible Lightbox Dialog -->
<dialog class="aw-dialog" id="awModal" closedby="any" aria-labelledby="awModalTitle">
    <button type="button" class="aw-modal-close" id="awModalClose" aria-label="Tutup Detail">&#x2715;</button>
    <div class="aw-modal-image-box">
        <img id="awModalImg" src="<?php echo esc_url($fallback_award_img); ?>" alt="Visual Penghargaan" />
    </div>
    <div class="aw-modal-body">
        <span class="aw-modal-year" id="awModalYear">2025</span>
        <h2 class="aw-modal-title" id="awModalTitle">Detail Penghargaan</h2>
        <p class="aw-modal-desc" id="awModalDesc">Penyelenggara / Kategori</p>
    </div>
</dialog>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function () {
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 1. Expanding Spotlight Cards Gallery
    var spotCards = document.querySelectorAll('.aw-acc-card');
    var spotTriggers = document.querySelectorAll('.aw-acc-trigger');
    var spotPrevBtn = document.getElementById('awSpotPrev');
    var spotNextBtn = document.getElementById('awSpotNext');
    var spotCounter = document.getElementById('awSpotCounter');
    var totalSpot = spotCards.length;
    var activeSpotIndex = 0;

    function activateSpot(index) {
        if (totalSpot === 0) return;
        if (index < 0) {
            activeSpotIndex = totalSpot - 1;
        } else if (index >= totalSpot) {
            activeSpotIndex = 0;
        } else {
            activeSpotIndex = index;
        }

        spotCards.forEach(function (card, i) {
            var active = (i === activeSpotIndex);
            card.classList.toggle('is-active', active);
            var trigger = card.querySelector('.aw-acc-trigger');
            if (trigger) {
                trigger.setAttribute('aria-expanded', active ? 'true' : 'false');
            }
            if (active && window.innerWidth < 768) {
                card.scrollIntoView({
                    behavior: prefersReduced ? 'auto' : 'smooth',
                    inline: 'center',
                    block: 'nearest'
                });
            }
        });

        if (spotCounter) {
            spotCounter.textContent = (activeSpotIndex + 1) + ' / ' + totalSpot;
        }
    }

    spotCards.forEach(function (card, idx) {
        card.addEventListener('mouseenter', function () {
            activateSpot(idx);
        });
        card.addEventListener('click', function () {
            activateSpot(idx);
        });
    });

    spotTriggers.forEach(function (btn, idx) {
        btn.addEventListener('focus', function () {
            activateSpot(idx);
        });
    });

    if (spotPrevBtn) {
        spotPrevBtn.addEventListener('click', function () {
            activateSpot(activeSpotIndex - 1);
        });
    }

    if (spotNextBtn) {
        spotNextBtn.addEventListener('click', function () {
            activateSpot(activeSpotIndex + 1);
        });
    }

    // 2. Archive Filtering & Realtime Search
    var tabBtns = document.querySelectorAll('.aw-tab-btn');
    var searchInput = document.getElementById('awSearchInput');
    var awardCards = document.querySelectorAll('.aw-card');
    var emptyState = document.getElementById('awEmptyState');
    var currentYear = 'all';
    var searchQuery = '';

    function filterCards() {
        var visibleCount = 0;
        awardCards.forEach(function (card) {
            var cardYear = card.getAttribute('data-year');
            var searchData = card.getAttribute('data-search') || '';
            var matchesYear = (currentYear === 'all' || cardYear === currentYear);
            var matchesSearch = (!searchQuery || searchData.indexOf(searchQuery) !== -1);

            if (matchesYear && matchesSearch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyState) {
            emptyState.classList.toggle('is-visible', visibleCount === 0);
        }
    }

    tabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            tabBtns.forEach(function (other) {
                var active = other === btn;
                other.classList.toggle('is-active', active);
                other.setAttribute('aria-pressed', active ? 'true' : 'false');
            });
            currentYear = btn.getAttribute('data-year');
            filterCards();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            searchQuery = searchInput.value.trim().toLowerCase();
            filterCards();
        });
    }

    // 3. Native <dialog> Lightbox Controller
    var modal = document.getElementById('awModal');
    var modalClose = document.getElementById('awModalClose');
    var modalImg = document.getElementById('awModalImg');
    var modalYear = document.getElementById('awModalYear');
    var modalTitle = document.getElementById('awModalTitle');
    var modalDesc = document.getElementById('awModalDesc');
    var cardTriggers = document.querySelectorAll('.aw-card-trigger');

    function openModal(btn) {
        if (!modal || typeof modal.showModal !== 'function') return;
        modalImg.src = btn.getAttribute('data-img') || '';
        modalImg.alt = btn.getAttribute('data-title') || 'Visual Penghargaan';
        modalYear.textContent = btn.getAttribute('data-year') || '';
        modalTitle.textContent = btn.getAttribute('data-title') || '';
        modalDesc.textContent = btn.getAttribute('data-desc') || '';
        modal.showModal();
    }

    cardTriggers.forEach(function (btn) {
        btn.addEventListener('click', function () {
            openModal(btn);
        });
    });

    if (modalClose && modal) {
        modalClose.addEventListener('click', function () {
            modal.close();
        });
    }

    // Light-dismiss fallback when closedby="any" is unsupported
    if (modal && !('closedBy' in HTMLDialogElement.prototype)) {
        var isOutside = function (e) {
            var r = modal.getBoundingClientRect();
            return e.clientX < r.left || e.clientX > r.right || e.clientY < r.top || e.clientY > r.bottom;
        };
        var pressedOutside = false;
        modal.addEventListener('pointerdown', function (e) {
            pressedOutside = isOutside(e);
        });
        modal.addEventListener('pointerup', function (e) {
            if (pressedOutside && isOutside(e)) {
                modal.close();
            }
            pressedOutside = false;
        });
    }
});
</script>

<?php
get_footer();
?>
