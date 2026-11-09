<?php
/**
 * Template Name: Awards & Recognition
 * Description: Official Corporate Awards & Honors Directory (79 Awards: 2017 - 2025)
 *              Featuring interactive expanding spotlight cards and filterable archive.
 */

get_header();

// Fetch awards data
$awards_by_year = function_exists('bricklet_get_awards_data') ? bricklet_get_awards_data() : array();

// Flatten all awards and sort years
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

// Select top 5 spotlight awards for the Gambar 1-style expanding showcase
$spotlight_awards = array_slice($all_awards, 0, 5);
$theme_uri = get_template_directory_uri();
?>

<style>
/* ==========================================================================
   Awards & Recognition Corporate Layout (One Tone with Gambar 1)
   ========================================================================== */

.aw-page-wrapper {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #1e293b;
    background-color: #ffffff;
    width: 100%;
    overflow-x: hidden;
}

/* --------------------------------------------------------------------------
   1. HERO BANNER
   -------------------------------------------------------------------------- */
.aw-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: #0a1f2c;
    overflow: hidden;
}
@media (min-width: 768px) {
    .aw-hero-banner {
        min-height: 380px;
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
    background: linear-gradient(90deg, rgba(7, 23, 34, 0.90) 0%, rgba(10, 31, 44, 0.72) 50%, rgba(7, 23, 34, 0.65) 100%);
    z-index: 2;
}
.aw-hero-inner {
    position: relative;
    z-index: 3;
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 3.5rem 1.5rem;
}
@media (min-width: 1024px) {
    .aw-hero-inner {
        padding: 4.5rem 3rem;
    }
}
.aw-breadcrumb {
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
.aw-breadcrumb a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: color 0.2s ease;
}
.aw-breadcrumb a:hover {
    color: #03c5f0;
}
.aw-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.35);
}
.aw-breadcrumb .current {
    color: #ffffff;
    font-weight: 600;
}
.aw-hero-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    font-weight: 800;
    line-height: 1.15;
    color: #ffffff;
    letter-spacing: -0.02em;
    margin: 0 0 0.85rem 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}
.aw-hero-subtitle {
    font-size: 1.0625rem;
    color: rgba(255, 255, 255, 0.85);
    max-width: 680px;
    line-height: 1.6;
    margin: 0;
}

/* --------------------------------------------------------------------------
   2. SECTION 1: SPOTLIGHT SECTION (MATCHING GAMBAR 1)
   -------------------------------------------------------------------------- */
.aw-spotlight-section {
    padding: 5rem 1.5rem 5.5rem;
    background-color: #ffffff;
}
@media (min-width: 1024px) {
    .aw-spotlight-section {
        padding: 6.5rem 3rem 6.5rem;
    }
}
.aw-container {
    max-width: 1240px;
    margin: 0 auto;
    width: 100%;
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
        grid-template-columns: 410px 1fr;
        gap: 4.5rem;
    }
}

/* Left Column */
.aw-spotlight-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.aw-section-tag {
    font-size: 0.8125rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: #006491;
    margin-bottom: 0.85rem;
    display: block;
}
.aw-spotlight-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2rem, 3.5vw, 2.75rem);
    font-weight: 800;
    color: #0a1f2c;
    line-height: 1.15;
    letter-spacing: -0.025em;
    margin: 0 0 1.25rem 0;
}
.aw-spotlight-desc {
    font-size: 1rem;
    color: #475569;
    line-height: 1.65;
    margin: 0 0 2rem 0;
}
.aw-spotlight-actions {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}
.aw-spotlight-cta {
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
.aw-spotlight-cta:hover {
    background-color: #006491; /* primary */
    border-color: #00b3ff; /* theme action-cyan */
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0, 100, 145, 0.35);
}
.aw-spotlight-cta svg {
    transition: transform 0.2s ease;
}
.aw-spotlight-cta:hover svg {
    transform: translateY(2px);
}

/* Nav Controls */
.aw-accordion-nav {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}
.aw-acc-nav-btn {
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
.aw-acc-nav-btn:hover {
    border-color: #00b3ff;
    color: #006491;
    background-color: #f0f9ff;
    transform: scale(1.05);
}
.aw-acc-nav-counter {
    font-size: 0.875rem;
    font-weight: 600;
    color: #64748b;
    margin-left: 0.5rem;
    letter-spacing: 0.05em;
}

/* Right Column: Expanding Gallery (Gambar 1 Style) */
.aw-spotlight-gallery {
    width: 100%;
    overflow: hidden;
}
.aw-accordion-track {
    display: flex;
    gap: 1rem;
    height: 500px;
    width: 100%;
    align-items: stretch;
}
@media (max-width: 767px) {
    .aw-accordion-track {
        height: 460px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding-bottom: 1rem;
        -webkit-overflow-scrolling: touch;
    }
}

.aw-acc-card {
    position: relative;
    flex: 1;
    min-width: 80px;
    height: 100%;
    border-radius: 24px;
    overflow: hidden;
    cursor: pointer;
    background-color: #f8fafc;
    border: 1px solid #e2e8f0;
    transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.4s ease, border-color 0.4s ease;
    user-select: none;
}
@media (max-width: 767px) {
    .aw-acc-card {
        flex: 0 0 280px;
        scroll-snap-align: center;
    }
}
.aw-acc-card:hover:not(.is-active) {
    box-shadow: 0 10px 25px -6px rgba(15, 23, 42, 0.12);
    border-color: #cbd5e1;
}
.aw-acc-card.is-active {
    flex: 3.4;
    min-width: 300px;
    max-width: 380px;
    cursor: default;
    border-color: #00b3ff;
    box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.16);
}
@media (max-width: 767px) {
    .aw-acc-card.is-active {
        flex: 0 0 300px;
    }
}

.aw-acc-inner {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    background-color: #ffffff;
}

/* Image Wrapper */
.aw-acc-image-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    background: radial-gradient(circle at center, #ffffff 0%, #f1f5f9 100%);
    transition: height 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2.5rem 1.5rem 1.5rem;
}
.aw-acc-card.is-active .aw-acc-image-wrapper {
    height: 58%;
    padding: 2.25rem 1.25rem 1.25rem;
}
.aw-acc-img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    display: block;
    filter: drop-shadow(0 10px 18px rgba(0, 0, 0, 0.15));
    transition: transform 0.6s ease;
    position: relative;
    z-index: 1;
}
.aw-acc-card:hover .aw-acc-img {
    transform: scale(1.05);
}

.aw-acc-badge-year {
    position: absolute;
    top: 14px;
    left: 14px;
    background-color: rgb(10 31 44 / var(--tw-bg-opacity, 1)); /* deep-navy */
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 11px;
    border-radius: 9999px;
    z-index: 10;
    letter-spacing: 0.05em;
    box-shadow: 0 2px 8px rgba(10, 31, 44, 0.35);
    pointer-events: none;
}

/* Inactive Collapsed Hint */
.aw-acc-collapsed-hint {
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
.aw-acc-card:not(.is-active):hover .aw-acc-collapsed-hint {
    opacity: 1;
}
.aw-acc-hint-text {
    background: rgba(10, 31, 44, 0.85);
    color: #ffffff;
    font-size: 0.6875rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
    white-space: nowrap;
    backdrop-filter: blur(4px);
}
.aw-acc-card.is-active .aw-acc-collapsed-hint {
    display: none;
}

/* Active Bottom Info Box (Theme Palette: Soft Cyan / Navy) */
.aw-acc-card-info {
    width: 100%;
    height: 42%;
    background-color: #f0f9ff; /* Theme soft cyan surface */
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
.aw-acc-card.is-active .aw-acc-card-info {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}
.aw-acc-info-header {
    margin-bottom: 0.25rem;
}
.aw-acc-award-name {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: rgb(10 31 44 / var(--tw-text-opacity, 1)); /* deep-navy */
    margin: 0 0 3px 0;
    line-height: 1.25;
    letter-spacing: -0.01em;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.aw-acc-award-desc {
    font-size: 0.8125rem;
    font-weight: 500;
    color: #4b5563;
    margin: 0;
    line-height: 1.35;
}
.aw-acc-quote {
    font-size: 0.8125rem;
    color: #006491; /* primary corporate blue */
    font-weight: 600;
    line-height: 1.4;
    margin: 0.5rem 0 0 0;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Metrics Strip (One tone with Overview page) */
.aw-metrics-strip {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 2rem 1.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
    margin-top: 4rem;
}
@media (min-width: 768px) {
    .aw-metrics-strip {
        grid-template-columns: repeat(3, 1fr);
        padding: 2.5rem 2rem;
    }
}
.aw-metric-box {
    text-align: center;
    padding: 0.5rem 1rem;
}
@media (min-width: 768px) {
    .aw-metric-box:not(:last-child) {
        border-right: 1px solid #e2e8f0;
    }
}
.aw-metric-number {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 2.25rem;
    font-weight: 800;
    color: #006491; /* primary blue */
    line-height: 1;
    margin-bottom: 0.5rem;
}
.aw-metric-label {
    font-size: 0.8125rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #0a1f2c;
    margin-bottom: 0.25rem;
}
.aw-metric-desc {
    font-size: 0.75rem;
    color: #64748b;
}

/* --------------------------------------------------------------------------
   3. SECTION 2: COMPREHENSIVE AWARDS DIRECTORY & FILTER
   -------------------------------------------------------------------------- */
.aw-directory-section {
    padding: 5rem 1.5rem 7rem;
    background-color: #f8fafc;
    border-top: 1px solid #e2e8f0;
}
@media (min-width: 1024px) {
    .aw-directory-section {
        padding: 6rem 3rem 8rem;
    }
}

.aw-dir-header {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 3rem;
}
.aw-dir-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(1.85rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: #0a1f2c;
    letter-spacing: -0.02em;
    margin: 0 0 1rem 0;
}
.aw-dir-subtitle {
    font-size: 0.975rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0;
}

/* Filter Toolbar */
.aw-toolbar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 3.5rem;
    align-items: center;
}

/* Year Tabs */
.aw-tabs-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    width: 100%;
}
.aw-tab-btn {
    border: 1px solid #cbd5e1;
    background-color: #ffffff;
    color: #334155;
    font-size: 0.875rem;
    font-weight: 600;
    padding: 0.6rem 1.25rem;
    border-radius: 9999px;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.aw-tab-btn:hover {
    border-color: #00b3ff;
    color: #006491;
    background-color: #f0f9ff;
}
.aw-tab-btn.is-active {
    background-color: rgb(10 31 44 / var(--tw-bg-opacity, 1)); /* deep-navy */
    color: #ffffff;
    border-color: rgb(10 31 44 / var(--tw-border-opacity, 1));
    box-shadow: 0 4px 14px rgba(10, 31, 44, 0.25);
}
.aw-tab-count {
    font-size: 0.75rem;
    opacity: 0.85;
    font-weight: 700;
    background: rgba(0,0,0,0.08);
    padding: 1px 7px;
    border-radius: 9999px;
}
.aw-tab-btn.is-active .aw-tab-count {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}

/* Search Bar */
.aw-search-box {
    position: relative;
    max-width: 480px;
    width: 100%;
}
.aw-search-input {
    width: 100%;
    padding: 0.8rem 1.25rem 0.8rem 2.85rem;
    border-radius: 9999px;
    border: 1.5px solid #cbd5e1;
    background-color: #ffffff;
    font-size: 0.9375rem;
    color: #1e293b;
    outline: none;
    transition: all 0.2s ease;
    box-sizing: border-box;
}
.aw-search-input:focus {
    border-color: #00b3ff;
    box-shadow: 0 0 0 3px rgba(0, 179, 255, 0.2);
}
.aw-search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    pointer-events: none;
}

/* Grid of Cards */
.aw-cards-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.75rem;
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

/* Award Card (Matching Gambar 1 aesthetic) */
.aw-card {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
    cursor: pointer;
    position: relative;
}
.aw-card:hover {
    transform: translateY(-6px);
    border-color: #00b3ff;
    box-shadow: 0 16px 36px -10px rgba(0, 100, 145, 0.16);
}

/* Card Visual Header */
.aw-card-media {
    position: relative;
    height: 230px;
    background: radial-gradient(circle at center, #ffffff 0%, #f1f5f9 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2.25rem 1.25rem 1.25rem;
    overflow: hidden;
    border-bottom: 1px solid #f1f5f9;
}
.aw-card-img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.4s ease;
    filter: drop-shadow(0 6px 14px rgba(0, 0, 0, 0.12));
    position: relative;
    z-index: 1;
}
.aw-card:hover .aw-card-img {
    transform: scale(1.06);
}
.aw-card-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background-color: rgb(10 31 44 / var(--tw-bg-opacity, 1)); /* deep-navy */
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 11px;
    border-radius: 9999px;
    letter-spacing: 0.05em;
    box-shadow: 0 2px 8px rgba(10, 31, 44, 0.35);
    z-index: 10;
    pointer-events: none;
}
.aw-card-zoom-hint {
    position: absolute;
    bottom: 12px;
    right: 12px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e293b;
    opacity: 0;
    transform: scale(0.8);
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.aw-card:hover .aw-card-zoom-hint {
    opacity: 1;
    transform: scale(1);
}

/* Card Body */
.aw-card-body {
    padding: 1.35rem 1.4rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
    background-color: #ffffff;
}
.aw-card-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: #0a1f2c;
    line-height: 1.35;
    margin: 0 0 0.5rem 0;
    letter-spacing: -0.01em;
}
.aw-card-desc {
    font-size: 0.8125rem;
    color: #64748b;
    line-height: 1.45;
    margin: 0;
}

/* Empty State */
.aw-empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 1.5rem;
    display: none;
}
.aw-empty-state.is-visible {
    display: block;
}
.aw-empty-icon {
    width: 56px;
    height: 56px;
    color: #94a3b8;
    margin: 0 auto 1rem;
}
.aw-empty-text {
    font-size: 1.1rem;
    font-weight: 600;
    color: #475569;
}

/* --------------------------------------------------------------------------
   4. LIGHTBOX MODAL
   -------------------------------------------------------------------------- */
.aw-modal-backdrop {
    position: fixed;
    inset: 0;
    background-color: rgba(10, 31, 44, 0.85);
    backdrop-filter: blur(8px);
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.aw-modal-backdrop.is-open {
    display: flex;
    opacity: 1;
}
.aw-modal-content {
    background: #ffffff;
    border-radius: 24px;
    max-width: 680px;
    width: 100%;
    overflow: hidden;
    position: relative;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
    transform: scale(0.95);
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.aw-modal-backdrop.is-open .aw-modal-content {
    transform: scale(1);
}
.aw-modal-close {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid #e2e8f0;
    color: #0f172a;
    font-size: 1.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.2s ease;
}
.aw-modal-close:hover {
    background: rgb(10 31 44 / var(--tw-bg-opacity, 1)); /* deep-navy */
    color: #ffffff;
}
.aw-modal-image-box {
    background: radial-gradient(circle at center, #ffffff 0%, #f1f5f9 100%);
    padding: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 320px;
    max-height: 420px;
}
.aw-modal-image-box img {
    max-width: 100%;
    max-height: 360px;
    object-fit: contain;
    filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.18));
}
.aw-modal-body {
    padding: 1.75rem 2rem;
    background-color: #ffffff;
}
.aw-modal-year {
    display: inline-block;
    background-color: #e0f2fe;
    color: #006491;
    border: 1px solid rgba(0, 179, 255, 0.3);
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 9999px;
    margin-bottom: 0.75rem;
}
.aw-modal-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 1.35rem;
    font-weight: 800;
    color: #0a1f2c;
    line-height: 1.3;
    margin: 0 0 0.5rem 0;
}
.aw-modal-desc {
    font-size: 0.9375rem;
    color: #475569;
    line-height: 1.5;
    margin: 0;
}
</style>

<main class="aw-page-wrapper">

    <!-- ========================================================================
         1. HERO BANNER
         ======================================================================== -->
    <section class="aw-hero-banner">
        <img 
            src="<?php echo esc_url($theme_uri . '/images/vision-mission/bg-header-company-data.jpg'); ?>" 
            alt="Awards & Recognition" 
            class="aw-hero-bg" 
            fetchpriority="high"
        />
        <div class="aw-hero-overlay"></div>

        <div class="aw-hero-inner">
            <nav class="aw-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/aboutus/overview/')); ?>">About Us</a>
                <span class="separator">/</span>
                <span class="current" aria-current="page">Awards</span>
            </nav>

            <h1 class="aw-hero-title">Awards &amp; Recognition</h1>
            <p class="aw-hero-subtitle">
                Apresiasi dan rekam jejak pengakuan prestisius atas dedikasi tinggi, inovasi digital, serta komitmen mutu tanpa henti untuk Indonesia.
            </p>
        </div>
    </section>

    <!-- ========================================================================
         2. SECTION 1: SPOTLIGHT SECTION (MATCHING GAMBAR 1 TONE)
         ======================================================================== -->
    <section class="aw-spotlight-section">
        <div class="aw-container">

            <div class="aw-spotlight-split">
                <!-- Left Column -->
                <div class="aw-spotlight-info">
                    <span class="aw-section-tag">HONORS &amp; RECOGNITION</span>
                    <h2 class="aw-spotlight-title">Prestasi &amp; Penghargaan Bergengsi</h2>
                    <p class="aw-spotlight-desc">
                        Apresiasi ini menjadi bukti konsistensi kami dalam menghadirkan hunian berkualitas tinggi, keunggulan tata kelola korporat, inovasi transformasi digital, serta komitmen keberlanjutan bagi masyarakat Indonesia.
                    </p>

                    <div class="aw-spotlight-actions">
                        <a href="#awardsDirectory" class="aw-spotlight-cta">
                            <span>Jelajahi Seluruh Arsip (<?php echo $total_awards_count; ?>)</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                        </a>
                    </div>

                    <?php if (count($spotlight_awards) > 1): ?>
                    <!-- Gallery Controls -->
                    <div class="aw-accordion-nav">
                        <button type="button" class="aw-acc-nav-btn" id="awSpotPrev" aria-label="Penghargaan Sebelumnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button type="button" class="aw-acc-nav-btn" id="awSpotNext" aria-label="Penghargaan Berikutnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                        <span class="aw-acc-nav-counter" id="awSpotCounter">1 / <?php echo count($spotlight_awards); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Right Column: Interactive Expanding Accordion Gallery (Gambar 1) -->
                <div class="aw-spotlight-gallery">
                    <div class="aw-accordion-track" id="awAccordionTrack">
                        <?php 
                        $s_idx = 0;
                        foreach ($spotlight_awards as $spot):
                            $is_active = ($s_idx === 0) ? 'is-active' : '';
                            $img_src = !empty($spot['img_local']) ? $theme_uri . '/' . $spot['img_local'] : $spot['img_remote'];
                        ?>
                        <div class="aw-acc-card <?php echo $is_active; ?>" data-index="<?php echo $s_idx; ?>" role="button" tabindex="0" aria-label="<?php echo esc_attr($spot['title']); ?>">
                            <div class="aw-acc-inner">
                                <!-- Trophy Visual Container -->
                                <div class="aw-acc-image-wrapper">
                                    <span class="aw-acc-badge-year"><?php echo esc_html($spot['year']); ?></span>
                                    <img 
                                        src="<?php echo esc_url($img_src); ?>" 
                                        alt="<?php echo esc_attr($spot['title']); ?>" 
                                        class="aw-acc-img"
                                        loading="lazy"
                                    />
                                    <div class="aw-acc-collapsed-hint">
                                        <span class="aw-acc-hint-text"><?php echo esc_html($spot['year']); ?> &#8226; <?php echo esc_html(mb_strimwidth($spot['title'], 0, 24, '...')); ?></span>
                                    </div>
                                </div>

                                <!-- Expanded Info Bottom Panel (Gambar 1 Mint Container) -->
                                <div class="aw-acc-card-info">
                                    <div class="aw-acc-info-header">
                                        <h3 class="aw-acc-award-name"><?php echo esc_html($spot['title']); ?></h3>
                                        <p class="aw-acc-award-desc"><?php echo esc_html($spot['desc']); ?></p>
                                    </div>
                                    <div class="aw-acc-quote">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                        <span>Prestasi Utama <?php echo esc_html($spot['year']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $s_idx++;
                        endforeach; 
                        ?>
                    </div>
                </div>
            </div>

            <!-- Corporate Metrics Strip -->
            <div class="aw-metrics-strip">
                <div class="aw-metric-box">
                    <div class="aw-metric-number">79+</div>
                    <div class="aw-metric-label">Penghargaan Nasional</div>
                    <div class="aw-metric-desc">Pengakuan resmi dari kementerian, BUMN &amp; lembaga independen</div>
                </div>
                <div class="aw-metric-box">
                    <div class="aw-metric-number">9 Tahun</div>
                    <div class="aw-metric-label">Rekam Jejak Prestasi</div>
                    <div class="aw-metric-desc">Konsistensi pencapaian tanpa henti sejak 2017 hingga 2025</div>
                </div>
                <div class="aw-metric-box">
                    <div class="aw-metric-number">Gold &amp; Top 1</div>
                    <div class="aw-metric-label">Kategori Unggulan</div>
                    <div class="aw-metric-desc">Tata kelola, ESG lingkungan, human capital &amp; inovasi digital</div>
                </div>
            </div>

        </div>
    </section>

    <!-- ========================================================================
         3. SECTION 2: AWARDS ARCHIVE & DIRECTORY
         ======================================================================== -->
    <section class="aw-directory-section" id="awardsDirectory">
        <div class="aw-container">

            <div class="aw-dir-header">
                <span class="aw-section-tag">AWARDS DIRECTORY</span>
                <h2 class="aw-dir-title">Arsip Lengkap Penghargaan</h2>
                <p class="aw-dir-subtitle">
                    Koleksi lengkap 79 penghargaan resmi yang diterima sejak tahun 2017 hingga 2025. Gunakan filter tahun atau kolom pencarian untuk menemukan penghargaan spesifik.
                </p>
            </div>

            <!-- Filter Toolbar -->
            <div class="aw-toolbar">
                <!-- Year Tabs -->
                <div class="aw-tabs-wrap" id="awYearTabs">
                    <button type="button" class="aw-tab-btn is-active" data-year="all">
                        <span>Semua</span>
                        <span class="aw-tab-count"><?php echo $total_awards_count; ?></span>
                    </button>
                    <?php foreach ($years_desc as $yr): ?>
                    <button type="button" class="aw-tab-btn" data-year="<?php echo esc_attr($yr); ?>">
                        <span><?php echo esc_html($yr); ?></span>
                        <span class="aw-tab-count"><?php echo $year_counts[$yr]; ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>

                <!-- Search Input -->
                <div class="aw-search-box">
                    <svg class="aw-search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input 
                        type="text" 
                        id="awSearchInput" 
                        class="aw-search-input" 
                        placeholder="Cari nama penghargaan, kategori, atau penyelenggara..." 
                        aria-label="Cari Penghargaan"
                    />
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="aw-cards-grid" id="awCardsGrid">
                <?php 
                foreach ($all_awards as $award):
                    $card_img = !empty($award['img_local']) ? $theme_uri . '/' . $award['img_local'] : $award['img_remote'];
                    $full_img = !empty($award['img_remote']) ? $award['img_remote'] : $card_img;
                    $search_text = strtolower($award['title'] . ' ' . $award['desc'] . ' ' . $award['year']);
                ?>
                <div 
                    class="aw-card" 
                    data-year="<?php echo esc_attr($award['year']); ?>" 
                    data-search="<?php echo esc_attr($search_text); ?>"
                    data-img="<?php echo esc_url($card_img); ?>"
                    data-title="<?php echo esc_attr($award['title']); ?>"
                    data-desc="<?php echo esc_attr($award['desc']); ?>"
                    role="button"
                    tabindex="0"
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
                        <div class="aw-card-zoom-hint" title="Lihat Detail">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                    </div>

                    <div class="aw-card-body">
                        <div>
                            <h3 class="aw-card-title"><?php echo esc_html($award['title']); ?></h3>
                            <?php if (!empty($award['desc'])): ?>
                            <p class="aw-card-desc"><?php echo esc_html($award['desc']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Empty State -->
                <div class="aw-empty-state" id="awEmptyState">
                    <svg class="aw-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
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

<!-- Lightbox Modal -->
<div class="aw-modal-backdrop" id="awModalBackdrop" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="aw-modal-content">
        <button type="button" class="aw-modal-close" id="awModalClose" aria-label="Tutup Detail">&#x2715;</button>
        <div class="aw-modal-image-box">
            <img id="awModalImg" src="" alt="Award Trophy" />
        </div>
        <div class="aw-modal-body">
            <span class="aw-modal-year" id="awModalYear">2025</span>
            <h3 class="aw-modal-title" id="awModalTitle">Award Title</h3>
            <p class="aw-modal-desc" id="awModalDesc">Organizer / Category</p>
        </div>
    </div>
</div>

<!-- Vanilla JS Lightweight Controller -->
<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function() {
    // ----------------------------------------------------
    // 1. Expanding Spotlight Cards Gallery (Gambar 1 Style)
    // ----------------------------------------------------
    const spotCards = document.querySelectorAll('.aw-acc-card');
    const spotPrevBtn = document.getElementById('awSpotPrev');
    const spotNextBtn = document.getElementById('awSpotNext');
    const spotCounter = document.getElementById('awSpotCounter');
    const totalSpot = spotCards.length;
    let activeSpotIndex = 0;

    function activateSpot(index) {
        if (totalSpot === 0) return;
        if (index < 0) {
            activeSpotIndex = totalSpot - 1;
        } else if (index >= totalSpot) {
            activeSpotIndex = 0;
        } else {
            activeSpotIndex = index;
        }

        spotCards.forEach((card, i) => {
            if (i === activeSpotIndex) {
                card.classList.add('is-active');
                if (window.innerWidth < 768) {
                    card.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                }
            } else {
                card.classList.remove('is-active');
            }
        });

        if (spotCounter) {
            spotCounter.textContent = (activeSpotIndex + 1) + ' / ' + totalSpot;
        }
    }

    spotCards.forEach((card, idx) => {
        card.addEventListener('mouseenter', function() {
            activateSpot(idx);
        });
        card.addEventListener('click', function() {
            activateSpot(idx);
        });
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                activateSpot(idx);
            }
        });
    });

    if (spotPrevBtn) {
        spotPrevBtn.addEventListener('click', function() {
            activateSpot(activeSpotIndex - 1);
        });
    }

    if (spotNextBtn) {
        spotNextBtn.addEventListener('click', function() {
            activateSpot(activeSpotIndex + 1);
        });
    }

    // ----------------------------------------------------
    // 2. Archive Filtering & Realtime Search
    // ----------------------------------------------------
    const tabBtns = document.querySelectorAll('.aw-tab-btn');
    const searchInput = document.getElementById('awSearchInput');
    const awardCards = document.querySelectorAll('.aw-card');
    const emptyState = document.getElementById('awEmptyState');
    let currentYear = 'all';
    let searchQuery = '';

    function filterCards() {
        let visibleCount = 0;
        awardCards.forEach(card => {
            const cardYear = card.getAttribute('data-year');
            const searchData = card.getAttribute('data-search') || '';

            const matchesYear = (currentYear === 'all' || cardYear === currentYear);
            const matchesSearch = (!searchQuery || searchData.includes(searchQuery));

            if (matchesYear && matchesSearch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.classList.add('is-visible');
            } else {
                emptyState.classList.remove('is-visible');
            }
        }
    }

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('is-active'));
            this.classList.add('is-active');
            currentYear = this.getAttribute('data-year');
            filterCards();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            searchQuery = this.value.trim().toLowerCase();
            filterCards();
        });
    }

    // ----------------------------------------------------
    // 3. Lightbox Modal Controller
    // ----------------------------------------------------
    const modalBackdrop = document.getElementById('awModalBackdrop');
    const modalClose = document.getElementById('awModalClose');
    const modalImg = document.getElementById('awModalImg');
    const modalYear = document.getElementById('awModalYear');
    const modalTitle = document.getElementById('awModalTitle');
    const modalDesc = document.getElementById('awModalDesc');

    function openModal(data) {
        if (!modalBackdrop) return;
        modalImg.src = data.img;
        modalImg.alt = data.title;
        modalYear.textContent = data.year;
        modalTitle.textContent = data.title;
        modalDesc.textContent = data.desc;

        modalBackdrop.classList.add('is-open');
        modalBackdrop.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modalBackdrop) return;
        modalBackdrop.classList.remove('is-open');
        modalBackdrop.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    awardCards.forEach(card => {
        card.addEventListener('click', function() {
            openModal({
                img: this.getAttribute('data-img'),
                year: this.getAttribute('data-year'),
                title: this.getAttribute('data-title'),
                desc: this.getAttribute('data-desc')
            });
        });

        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openModal({
                    img: this.getAttribute('data-img'),
                    year: this.getAttribute('data-year'),
                    title: this.getAttribute('data-title'),
                    desc: this.getAttribute('data-desc')
                });
            }
        });
    });

    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function(e) {
            if (e.target === modalBackdrop) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});
</script>

<?php
get_footer();
