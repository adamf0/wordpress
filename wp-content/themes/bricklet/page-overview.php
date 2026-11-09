<?php
/**
 * Template Name: Overview / About Us
 * Description: Corporate Overview & Official Governance of Iida Group Holdings Co.,Ltd. and PT. Perumnas Iida Group (Nov 2023).
 */

get_header();

$theme_uri = get_template_directory_uri();
$pdf_img   = $theme_uri . '/images/pdf/';
$pdf_url   = home_url('/Indonesia_Company%20profile_20231025.pdf');

global $wpdb;
$table_team = $wpdb->prefix . 'igh_leadership_team';
$leadership_members = $wpdb->get_results(
    "SELECT id, name, position, photo_url, bio_short FROM {$table_team} WHERE is_active = 1 ORDER BY sort_order ASC, id ASC",
    ARRAY_A
);

if (empty($leadership_members)) {
    $leadership_members = array(
        array(
            'name'      => 'Ms. Sagiri Sakurai',
            'position'  => 'President Director',
            'photo_url' => $theme_uri . '/images/team/sagiri-sakurai.jpg',
            'bio_short' => 'Memimpin operasional manajemen PT. Iida Group Holdings di Indonesia dengan prinsip kualitas dan tata kelola Jepang.',
        ),
        array(
            'name'      => 'Mr. Hiroshi Nishino',
            'position'  => 'Director',
            'photo_url' => $theme_uri . '/images/team/hiroshi-nishino.jpg',
            'bio_short' => 'Executive Board Director & Representative Director IGHD Jepang yang membina sinergi manajemen grup di Indonesia.',
        ),
        array(
            'name'      => 'Mr. Takahiro Kakuta',
            'position'  => 'Director',
            'photo_url' => $theme_uri . '/images/team/takahiro-kakuta.jpg',
            'bio_short' => 'Mengkoordinasikan pengembangan proyek hunian dan integrasi rantai pasok konstruksi berstandar Iida Group.',
        ),
        array(
            'name'      => 'Mr. Hiroshi Tomishima',
            'position'  => 'Board of Commissioners',
            'photo_url' => $theme_uri . '/images/team/hiroshi-tomishima.jpg',
            'bio_short' => 'Senior Managing Director IGHD yang menjalankan fungsi pengawasan tata kelola korporasi di Indonesia.',
        ),
        array(
            'name'      => 'Dr. Budi D. Notowidjojo',
            'position'  => 'Senior Advisor',
            'photo_url' => $theme_uri . '/images/team/budi-notowidjojo.jpg',
            'bio_short' => 'Memberikan pendampingan strategis terkait regulasi, kemitraan nasional, dan pengembangan kawasan hunian di Indonesia.',
        ),
        array(
            'name'      => 'Dr. Ir. Maryoko Hadi, Dipl.E.Eng., MT.',
            'position'  => 'Senior Advisor',
            'photo_url' => $theme_uri . '/images/team/maryoko-hadi.jpg',
            'bio_short' => 'Mendukung standarisasi teknis konstruksi, sertifikasi SNI, serta penerapan sistem bangunan tahan gempa di Indonesia.',
        ),
    );
}
$total_members = count($leadership_members);

$slides = array(
    array(
        'src'     => $pdf_img . 'iida-hq-tokyo.webp',
        'alt'     => 'Kantor Pusat Iida Group Holdings Co.,Ltd. di Musashino-shi, Tokyo, Jepang',
        'caption' => 'Kantor Pusat Iida Group Holdings Co.,Ltd. : Musashino-shi, Tokyo, Jepang',
        'w'       => 953,
        'h'       => 863,
    ),
    array(
        'src'     => $pdf_img . 'botania-2-residence.webp',
        'alt'     => 'Botania 2 Residence hasil pengembangan grup di Indonesia',
        'caption' => 'Botania 2 Residence : Proyek hunian eksisting berstandar Jepang di Indonesia',
        'w'       => 1218,
        'h'       => 994,
    ),
    array(
        'src'     => $pdf_img . 'heartful-town-depok-aerial.webp',
        'alt'     => 'Tampak udara kawasan perumahan Heartful-Town Depok',
        'caption' => 'Heartful-Town Depok : Pengembangan kawasan perumahan PT. Perumnas Iida Group',
        'w'       => 1073,
        'h'       => 605,
    ),
    array(
        'src'     => $pdf_img . 'heartful-town-bekasi-facade.webp',
        'alt'     => 'Fasad proyek hunian Heartful-Town Bekasi sebanyak 29 unit',
        'caption' => 'Heartful-Town Bekasi : Proyek 29 unit rumah 1 dan 2 lantai di Bekasi',
        'w'       => 1188,
        'h'       => 794,
    ),
);
?>

<style>
/* ==========================================================================
   Overview & Governance Page Layout (PT. Perumnas Iida Group / IGHD)
   ========================================================================== */

.ov-page-wrapper {
    font-family: var(--font-body);
    color: var(--color-text-body);
    background-color: var(--color-surface);
    width: 100%;
    overflow-x: hidden;
}

.ov-container {
    max-width: var(--container-max);
    margin: 0 auto;
    width: 100%;
    padding-left: var(--gutter);
    padding-right: var(--gutter);
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
    background-color: var(--color-deep-navy);
    overflow: hidden;
}
@media (min-width: 768px) {
    .ov-hero-banner {
        min-height: 390px;
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
    background: linear-gradient(90deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.80) 55%, rgba(10, 31, 44, 0.68) 100%);
    z-index: 2;
}
.ov-hero-inner {
    position: relative;
    z-index: 3;
    max-width: var(--container-max);
    width: 100%;
    margin: 0 auto;
    padding: 3rem var(--gutter);
}
.ov-breadcrumb {
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
.ov-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    padding: 0 4px;
    color: #cbd5e1;
    text-decoration: none;
    transition: color var(--dur-fast) var(--ease-in-out);
}
.ov-breadcrumb a:hover,
.ov-breadcrumb a:focus-visible {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
}
.ov-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.ov-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.55);
}
.ov-breadcrumb .current {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #ffffff;
    font-weight: 700;
}
.ov-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 0.75rem;
}
.ov-hero-tag-bar {
    width: 3px;
    height: 16px;
    background-color: var(--color-action-cyan);
    border-radius: 2px;
}
.ov-hero-tag-text {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.85);
}
.ov-hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.15rem, 4.5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.12;
    color: #ffffff;
    letter-spacing: -0.025em;
    margin: 0 0 0.9rem;
}
.ov-hero-subtitle {
    margin: 0;
    max-width: 62ch;
    font-size: 1.05rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.85);
}

/* --------------------------------------------------------------------------
   2. SECTION 1: CORPORATE OVERVIEW & RESIDENTIAL SLIDER
   -------------------------------------------------------------------------- */
.ov-main-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.ov-about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: start;
}
@media (min-width: 992px) {
    .ov-about-grid {
        grid-template-columns: 0.95fr 1.05fr;
    }
}

/* Slider Component */
.ov-slider-container {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    background-color: var(--color-deep-navy);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--color-border);
}
.ov-slider-track {
    display: flex;
    transition: transform 0.5s var(--ease-out-expo);
    width: 100%;
}
.ov-slide {
    min-width: 100%;
    position: relative;
    aspect-ratio: 4 / 3;
    background-color: var(--color-deep-navy);
}
.ov-slide-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.ov-slide-caption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 2.25rem 1.25rem 3.5rem;
    background: linear-gradient(180deg, rgba(10, 31, 44, 0) 0%, rgba(10, 31, 44, 0.88) 70%);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    line-height: 1.45;
}

.ov-slider-btn {
    position: absolute;
    top: 44%;
    transform: translateY(-50%);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.94);
    color: var(--color-deep-navy);
    border: 1px solid var(--color-border-strong);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out);
    box-shadow: var(--shadow-sm);
}
.ov-slider-btn:hover {
    background-color: var(--color-primary-container);
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.ov-slider-btn:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}
.ov-slider-prev {
    left: 12px;
}
.ov-slider-next {
    right: 12px;
}
.ov-slider-dots {
    position: absolute;
    bottom: 6px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 4px;
    z-index: 10;
}
.ov-dot {
    position: relative;
    min-width: 44px;
    min-height: 44px;
    padding: 0;
    border: 0;
    background: transparent;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.ov-dot::after {
    content: "";
    width: 10px;
    height: 10px;
    border-radius: var(--radius-pill);
    background-color: rgba(255, 255, 255, 0.55);
    transition: width var(--dur-fast) var(--ease-in-out), background-color var(--dur-fast) var(--ease-in-out);
}
.ov-dot.active::after {
    width: 26px;
    background-color: var(--color-action-cyan);
}
.ov-dot:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: -4px;
    border-radius: var(--radius-sm);
}

/* Content Column */
.ov-section-tag {
    display: block;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-primary);
    margin-bottom: 0.65rem;
}
.ov-about-heading {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: var(--color-text-heading);
    letter-spacing: -0.02em;
    margin: 0 0 1.25rem;
    line-height: 1.15;
}
.ov-desc-text {
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
    margin: 0 0 1.15rem;
}
.ov-sublist-title {
    margin: 1.25rem 0 0.75rem;
    font-family: var(--font-display);
    font-size: var(--text-base);
    font-weight: 700;
    color: var(--color-text-heading);
}
.ov-company-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1.35rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.65rem;
}
@media (min-width: 560px) {
    .ov-company-list {
        grid-template-columns: repeat(2, 1fr);
    }
}
.ov-company-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
    padding: 0.75rem 0.9rem;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-sm);
}
.ov-company-name {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-heading);
}
.ov-company-brand {
    font-size: var(--text-xs);
    font-weight: 600;
    color: var(--color-primary);
}
.ov-indonesia-box {
    margin: 1.25rem 0 1.5rem;
    padding: 1.1rem 1.25rem;
    border-left: 4px solid var(--color-primary);
    background-color: var(--color-primary-container);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    color: var(--color-on-primary-container);
    font-size: var(--text-sm);
    line-height: 1.65;
}
.ov-action-row {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 0.5rem;
}
.ov-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 700;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.ov-btn-primary:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.ov-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border: 1.5px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 700;
    border-radius: var(--radius-pill);
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
}
.ov-btn-secondary:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.ov-btn-primary:focus-visible,
.ov-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Metrics Strip (4 Verified PDF Metrics) */
.ov-metrics-strip {
    margin-top: 3.5rem;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 1.75rem 1.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
@media (min-width: 640px) {
    .ov-metrics-strip {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .ov-metrics-strip {
        grid-template-columns: repeat(4, 1fr);
        padding: 2rem;
    }
}
.ov-metric-box {
    padding: 0.5rem 0.75rem;
}
@media (min-width: 1024px) {
    .ov-metric-box:not(:last-child) {
        border-right: 1px solid var(--color-border-strong);
    }
}
.ov-metric-number {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 800;
    color: var(--color-primary);
    line-height: 1.1;
    margin-bottom: 0.4rem;
}
.ov-metric-label {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--color-text-heading);
    margin-bottom: 0.25rem;
}
.ov-metric-desc {
    font-size: var(--text-sm);
    line-height: 1.5;
    color: var(--color-text-muted);
}

/* --------------------------------------------------------------------------
   3. SECTION 2: OFFICIAL GOVERNANCE BOARDS (PDF p.6 & p.8)
   -------------------------------------------------------------------------- */
.ov-governance-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
    border-bottom: 1px solid var(--color-border);
}
.ov-section-header {
    max-width: 48rem;
    margin-bottom: 2.5rem;
}
.ov-section-title {
    margin: 0 0 0.75rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.4rem);
    font-weight: 800;
    line-height: 1.15;
    color: var(--color-text-heading);
}
.ov-gov-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.75rem;
}
@media (min-width: 1024px) {
    .ov-gov-grid {
        grid-template-columns: repeat(2, 1fr);
        align-items: start;
    }
}
.ov-gov-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}
.ov-gov-card-head {
    padding: 1.5rem 1.75rem;
    background-color: var(--color-deep-navy);
    color: #ffffff;
}
.ov-gov-date {
    margin: 0 0 0.35rem;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.ov-gov-title {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.3rem;
    font-weight: 800;
    color: #ffffff;
}
.ov-gov-table-wrap {
    overflow-x: auto;
}
.ov-gov-table {
    width: 100%;
    border-collapse: collapse;
    font-size: var(--text-sm);
}
.ov-gov-table caption {
    position: absolute;
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip-path: inset(50%);
}
.ov-gov-table th,
.ov-gov-table td {
    padding: 0.9rem 1.5rem;
    text-align: left;
    vertical-align: top;
    border-bottom: 1px solid var(--color-border);
}
.ov-gov-table thead th {
    background-color: var(--color-surface-sunken);
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--color-text-muted);
}
.ov-gov-table tbody th {
    font-weight: 700;
    color: var(--color-primary);
    width: 44%;
}
.ov-gov-table tbody td {
    color: var(--color-text-heading);
    font-weight: 500;
    line-height: 1.55;
}
.ov-gov-table tbody tr:last-child th,
.ov-gov-table tbody tr:last-child td {
    border-bottom: 0;
}
.ov-gov-card-foot {
    padding: 1rem 1.5rem;
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
    font-size: var(--text-sm);
    line-height: 1.55;
    color: var(--color-text-muted);
}

/* --------------------------------------------------------------------------
   4. SECTION 3: MANAJEMEN PT. IIDA GROUP HOLDINGS (INDONESIA)
   -------------------------------------------------------------------------- */
.ov-leadership-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.ov-team-showcase-split {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2.5rem;
    align-items: center;
}
@media (min-width: 1024px) {
    .ov-team-showcase-split {
        grid-template-columns: 370px 1fr;
        gap: 3.5rem;
    }
}
.ov-showcase-title {
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3.2vw, 2.35rem);
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.15;
    margin: 0 0 1rem;
}
.ov-showcase-desc {
    font-size: var(--text-base);
    color: var(--color-text-body);
    line-height: 1.65;
    margin: 0 0 1.75rem;
}
.ov-showcase-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.75rem;
}
.ov-accordion-nav {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
}
.ov-acc-nav-btn {
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
.ov-acc-nav-btn:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background-color: var(--color-primary-container);
}
.ov-acc-nav-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.ov-acc-nav-counter {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-muted);
    min-width: 48px;
    text-align: center;
}

.ov-showcase-gallery {
    width: 100%;
    overflow: hidden;
}
.ov-accordion-track {
    display: flex;
    gap: 1rem;
    height: 500px;
    width: 100%;
    align-items: stretch;
}
@media (max-width: 767px) {
    .ov-accordion-track {
        height: 460px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding-bottom: 0.75rem;
        -webkit-overflow-scrolling: touch;
    }
}
.ov-acc-card {
    position: relative;
    flex: 1;
    min-width: 78px;
    height: 100%;
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--color-border);
    background-color: var(--color-surface-sunken);
    transition: flex 0.5s var(--ease-out-expo), border-color var(--dur-base) var(--ease-in-out), box-shadow var(--dur-base) var(--ease-in-out);
}
@media (max-width: 767px) {
    .ov-acc-card {
        flex: 0 0 280px;
        scroll-snap-align: center;
    }
}
.ov-acc-card.is-active {
    flex: 3.4;
    min-width: 280px;
    max-width: 390px;
    border-color: var(--color-primary);
    box-shadow: var(--shadow-lg);
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
    background-color: var(--color-surface);
}
.ov-acc-image-wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
    transition: height 0.5s var(--ease-out-expo);
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
}
.ov-acc-collapsed-hint {
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
.ov-acc-card:not(.is-active):hover .ov-acc-collapsed-hint {
    opacity: 1;
}
.ov-acc-hint-text {
    background-color: rgba(10, 31, 44, 0.9);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 600;
    padding: 4px 10px;
    border-radius: var(--radius-pill);
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.ov-acc-card.is-active .ov-acc-collapsed-hint {
    display: none;
}
.ov-acc-card-info {
    width: 100%;
    height: 42%;
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
.ov-acc-card.is-active .ov-acc-card-info {
    opacity: 1;
    pointer-events: auto;
}
.ov-acc-member-name {
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--color-text-heading);
    margin: 0 0 2px;
    line-height: 1.25;
}
.ov-acc-member-role {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-primary);
    margin: 0;
    line-height: 1.3;
}
.ov-acc-quote {
    font-size: var(--text-sm);
    color: var(--color-on-primary-container);
    line-height: 1.45;
    margin: 0.45rem 0 0;
}
.ov-acc-trigger {
    background: transparent;
    border: 0;
    padding: 0;
    font: inherit;
    color: inherit;
    text-align: left;
    cursor: pointer;
}
.ov-acc-trigger::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 3;
}
.ov-acc-trigger:focus-visible {
    outline: 3px solid var(--color-primary);
    outline-offset: -3px;
}
.ov-acc-card:has(.ov-acc-trigger:focus-visible) {
    outline: 3px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .ov-slider-track,
    .ov-dot::after,
    .ov-acc-card,
    .ov-acc-image-wrapper,
    .ov-acc-collapsed-hint,
    .ov-acc-card-info,
    .ov-btn-primary,
    .ov-btn-secondary,
    .ov-slider-btn,
    .ov-acc-nav-btn {
        transition: none;
    }
}
</style>

<main id="main-content" class="ov-page-wrapper">

    <!-- 1. HERO BANNER -->
    <section class="ov-hero-banner" aria-labelledby="ov-hero-title">
        <img
            src="<?php echo esc_url($theme_uri . '/images/vision-mission/bg-header-company-data.jpg'); ?>"
            alt="Gedung PT. Iida Group Holdings"
            class="ov-hero-bg"
            width="1920"
            height="1080"
            fetchpriority="high"
            decoding="sync"
        />
        <div class="ov-hero-overlay" aria-hidden="true"></div>
        <div class="ov-hero-inner">
            <nav class="ov-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator" aria-hidden="true">/</span>
                <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About Us</a>
                <span class="separator" aria-hidden="true">/</span>
                <span class="current" aria-current="page">Overview</span>
            </nav>

            <p class="ov-hero-tag">
                <span class="ov-hero-tag-bar" aria-hidden="true"></span>
                <span class="ov-hero-tag-text">Company Profile &middot; Nov 2023</span>
            </p>
            <h1 id="ov-hero-title" class="ov-hero-title">Overview &amp; Tata Kelola Perusahaan</h1>
            <p class="ov-hero-subtitle">
                Struktur grup Iida Group Holdings Co.,Ltd. di Jepang, jaringan bisnis di Indonesia sejak 2016, serta susunan resmi Dewan Komisaris dan Direksi PT. Perumnas Iida Group.
            </p>
        </div>
    </section>

    <!-- 2. SECTION 1: CORPORATE OVERVIEW & RESIDENTIAL SLIDER -->
    <section class="ov-main-section" aria-labelledby="ov-about-heading">
        <div class="ov-container">
            <div class="ov-about-grid">

                <!-- Left Column: Accessible Image Slider -->
                <div class="ov-slider-container" id="ovSlider" role="region" aria-roledescription="carousel" aria-label="Galeri Kantor Pusat dan Proyek Hunian">
                    <div class="ov-slider-track" id="ovSliderTrack">
                        <?php foreach ($slides as $s_idx => $slide) : ?>
                        <div class="ov-slide">
                            <img
                                src="<?php echo esc_url($slide['src']); ?>"
                                alt="<?php echo esc_attr($slide['alt']); ?>"
                                class="ov-slide-img"
                                width="<?php echo esc_attr((string) $slide['w']); ?>"
                                height="<?php echo esc_attr((string) $slide['h']); ?>"
                                <?php echo $s_idx === 0 ? 'fetchpriority="high" decoding="sync"' : 'loading="lazy" decoding="async"'; ?>
                            />
                            <div class="ov-slide-caption"><?php echo esc_html($slide['caption']); ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <button type="button" class="ov-slider-btn ov-slider-prev" id="ovPrevBtn" aria-label="Slide Sebelumnya">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button type="button" class="ov-slider-btn ov-slider-next" id="ovNextBtn" aria-label="Slide Berikutnya">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>

                    <div class="ov-slider-dots" id="ovSliderDots" role="group" aria-label="Pilih slide">
                        <?php foreach ($slides as $d_idx => $slide) : ?>
                        <button
                            type="button"
                            class="ov-dot<?php echo $d_idx === 0 ? ' active' : ''; ?>"
                            data-index="<?php echo esc_attr((string) $d_idx); ?>"
                            aria-label="Pilih slide <?php echo esc_attr((string) ($d_idx + 1)); ?> dari <?php echo esc_attr((string) count($slides)); ?>"
                            aria-pressed="<?php echo $d_idx === 0 ? 'true' : 'false'; ?>"
                        ></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right Column: Verified Overview Text (PDF Nov 2023) -->
                <div>
                    <span class="ov-section-tag">Ikhtisar Grup</span>
                    <h2 id="ov-about-heading" class="ov-about-heading">Iida Group Holdings Co.,Ltd. &amp; PT. Perumnas Iida Group</h2>

                    <p class="ov-desc-text">
                        <strong>Iida Group Holdings Co.,Ltd.</strong> didirikan pada <strong>1 November 2013</strong> di Musashino-shi, Tokyo, Jepang (dipimpin oleh President &amp; Representative Director Masashi Kanei). Dengan <strong>13.353 karyawan</strong> per 31 Maret 2023 dan lebih dari <strong>400 cabang penjualan</strong>, grup ini menguasai <strong>30% pangsa pasar</strong> rumah tapak di Jepang (sekitar <strong>46.000 unit rumah per tahun</strong>, atau 1 dari setiap 3 pembeli rumah di Jepang).
                    </p>

                    <h3 class="ov-sublist-title">6 Anak Perusahaan Konstruksi &amp; Properti Utama di Jepang</h3>
                    <ul class="ov-company-list">
                        <li class="ov-company-item">
                            <span class="ov-company-name">Hajime Construction Co., Ltd.</span>
                            <span class="ov-company-brand">Merek: Livele Garden</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-company-name">Iida Sangyo Co., Ltd.</span>
                            <span class="ov-company-brand">Merek: Heartful-Town</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-company-name">Touei Housing Corporation</span>
                            <span class="ov-company-brand">Merek: Blooming Garden</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-company-name">Tact Home Co., Ltd.</span>
                            <span class="ov-company-brand">Merek: GRAFARE</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-company-name">Arnest One Corporation</span>
                            <span class="ov-company-brand">Merek: Cradle garden</span>
                        </li>
                        <li class="ov-company-item">
                            <span class="ov-company-name">ID Home Co., Ltd.</span>
                            <span class="ov-company-brand">Merek: LIGNAGE</span>
                        </li>
                    </ul>

                    <p class="ov-desc-text">
                        Grup juga mengonsolidasikan perusahaan pengolahan kayu <strong>First Wood Co., Ltd.</strong> (kepemilikan 100% grup) guna menjamin pasokan material konstruksi berkualitas tinggi dan efisien bagi seluruh anak perusahaan.
                    </p>

                    <div class="ov-indonesia-box">
                        <strong>Ekspansi di Indonesia (2016) &amp; Joint Venture (2017):</strong>
                        Grup mulai beroperasi di Indonesia pada 2016 dengan mendirikan <strong>PT. Iida Group Holdings</strong> yang membawahi <strong>PT. Perumnas Iida Group</strong>, <strong>PT. Hajime Indonesia Jaya</strong>, <strong>PT. Ione Home Indonesia</strong>, dan <strong>PT. Tact Home Indonesia</strong>. Pada 2017 berdiri <strong>PT. Perumnas Iida Group</strong> (Iida Sangyo Co.,Ltd. 93% dan PT. Propernas Griya Utama 7%) bersama anak usaha <strong>PT. Abdiluhur Kawuloalit</strong> (99,99% Perumnas Iida Group, 0,01% Iida Sangyo) di Jl. Caringin Raya, RT.010/RW.002, Rawalumbu, Kota Bekasi.
                    </div>

                    <div class="ov-action-row">
                        <a href="<?php echo esc_url(home_url('/about-us/vision-mission/')); ?>" class="ov-btn-primary">
                            Lihat Visi, Misi &amp; HPIS
                        </a>
                        <a href="<?php echo esc_url(home_url('/about-us/milestone/')); ?>" class="ov-btn-secondary">
                            Lihat Tonggak Sejarah
                        </a>
                        <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="ov-btn-secondary">
                            Unduh PDF Nov 2023
                        </a>
                    </div>
                </div>

            </div>

            <!-- Verified PDF Metrics Strip -->
            <div class="ov-metrics-strip" aria-label="Indikator Resmi Grup (PDF Nov 2023)">
                <div class="ov-metric-box">
                    <div class="ov-metric-number">13.353</div>
                    <div class="ov-metric-label">Karyawan Grup (31 Mar 2023)</div>
                    <div class="ov-metric-desc">Total tenaga kerja grup di bawah Iida Group Holdings Co.,Ltd.</div>
                </div>
                <div class="ov-metric-box">
                    <div class="ov-metric-number">30%</div>
                    <div class="ov-metric-label">Pangsa Pasar Jepang</div>
                    <div class="ov-metric-desc">&plusmn;46.000 unit rumah per tahun melalui lebih dari 400 cabang</div>
                </div>
                <div class="ov-metric-box">
                    <div class="ov-metric-number">2017</div>
                    <div class="ov-metric-label">PT. Perumnas Iida Group</div>
                    <div class="ov-metric-desc">Saham: Iida Sangyo Co.,Ltd. (93%) &amp; PT. Propernas Griya Utama (7%)</div>
                </div>
                <div class="ov-metric-box">
                    <div class="ov-metric-number">4 Entitas</div>
                    <div class="ov-metric-label">Grup Indonesia (Sejak 2016)</div>
                    <div class="ov-metric-desc">Perumnas Iida Group, Hajime, Ione Home, dan Tact Home Indonesia</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. SECTION 2: OFFICIAL GOVERNANCE BOARDS (PDF Hal. 6 & 8) -->
    <section class="ov-governance-section" aria-labelledby="ov-gov-heading">
        <div class="ov-container">
            <div class="ov-section-header">
                <span class="ov-section-tag">Struktur Kepemimpinan Resmi</span>
                <h2 id="ov-gov-heading" class="ov-section-title">Dewan Komisaris &amp; Direksi Resmi (PDF Nov 2023)</h2>
                <p class="ov-desc-text">
                    Susunan lengkap Dewan Komisaris dan Direksi sesuai dokumen resmi Company Profile Iida Group Holdings Co.,Ltd. (Hal. 6) dan PT. Perumnas Iida Group (Hal. 8).
                </p>
            </div>

            <div class="ov-gov-grid">

                <!-- PT. Perumnas Iida Group Board (PDF Hal. 8) -->
                <article class="ov-gov-card">
                    <div class="ov-gov-card-head">
                        <p class="ov-gov-date">Per 24 Agustus 2023 &middot; Company Profile Hal. 8</p>
                        <h3 class="ov-gov-title">PT. Perumnas Iida Group (Indonesia)</h3>
                    </div>
                    <div class="ov-gov-table-wrap">
                        <table class="ov-gov-table">
                            <caption>Susunan Dewan Komisaris dan Direksi PT. Perumnas Iida Group per 24 Agustus 2023</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Nama Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Presiden Komisaris</th>
                                    <td>Shigehiko Tsukiji</td>
                                </tr>
                                <tr>
                                    <th scope="row">Komisaris</th>
                                    <td>Jun Ishimaru</td>
                                </tr>
                                <tr>
                                    <th scope="row">Komisaris</th>
                                    <td>Hakiki Sudrajat</td>
                                </tr>
                                <tr>
                                    <th scope="row">Komisaris</th>
                                    <td>Aries Widiyatmoko</td>
                                </tr>
                                <tr>
                                    <th scope="row">Presiden Direktur</th>
                                    <td>Kenichiro Watanabe</td>
                                </tr>
                                <tr>
                                    <th scope="row">Chairman &amp; Representative</th>
                                    <td>Kazuhiko Mori</td>
                                </tr>
                                <tr>
                                    <th scope="row">Direktur</th>
                                    <td>Kenichi Mori</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ov-gov-card-foot">
                        <strong>Anak Perusahaan:</strong> PT. Abdiluhur Kawuloalit (99,99% PT. Perumnas Iida Group &amp; 0,01% Iida Sangyo Co.,Ltd.).
                    </div>
                </article>

                <!-- Iida Group Holdings Co.,Ltd. Board (PDF Hal. 6) -->
                <article class="ov-gov-card">
                    <div class="ov-gov-card-head">
                        <p class="ov-gov-date">Per 27 Juni 2023 &middot; Company Profile Hal. 6</p>
                        <h3 class="ov-gov-title">Iida Group Holdings Co.,Ltd. (Jepang)</h3>
                    </div>
                    <div class="ov-gov-table-wrap">
                        <table class="ov-gov-table">
                            <caption>Susunan Dewan Direksi dan Auditor Iida Group Holdings Co.,Ltd. per 27 Juni 2023</caption>
                            <thead>
                                <tr>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Nama Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Honorary Chairman</th>
                                    <td>Kazuhiko Mori</td>
                                </tr>
                                <tr>
                                    <th scope="row">President &amp; Rep. Director</th>
                                    <td>Masashi Kanei</td>
                                </tr>
                                <tr>
                                    <th scope="row">Exec. Board &amp; Rep. Director</th>
                                    <td>Hiroshi Nishino</td>
                                </tr>
                                <tr>
                                    <th scope="row">Executive Board Director</th>
                                    <td>Tadayoshi Horiguchi</td>
                                </tr>
                                <tr>
                                    <th scope="row">Board Directors</th>
                                    <td>Shigeyuki Matsubayashi, Kazuhiro Kodera, Chihiro Sato, Shigehiko Tsukiji</td>
                                </tr>
                                <tr>
                                    <th scope="row">Outside Directors</th>
                                    <td>Toshihiko Sasaki, Nanako Murata, Shinichi Sasaki, Takaya Imai</td>
                                </tr>
                                <tr>
                                    <th scope="row">Corporate Auditors</th>
                                    <td>Ikuko Ishimaru, Makoto Shimazaki</td>
                                </tr>
                                <tr>
                                    <th scope="row">Outside Auditors</th>
                                    <td>Chikara Tanaka, Koji Fujita</td>
                                </tr>
                                <tr>
                                    <th scope="row">Senior Managing / Managing</th>
                                    <td>Hiroshi Tomishima (Senior Managing Director), Kenichi Nakajima (Managing Director)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ov-gov-card-foot">
                        <strong>Kantor Pusat Jepang:</strong> Musashino-shi, Tokyo, Jepang (didirikan 1 November 2013).
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- 4. SECTION 3: MANAJEMEN PT. IIDA GROUP HOLDINGS (INDONESIA) -->
    <section class="ov-leadership-section" id="leadership-team" aria-labelledby="ov-indo-mgmt-heading">
        <div class="ov-container">
            <div class="ov-team-showcase-split">

                <div class="ov-showcase-info">
                    <span class="ov-section-tag">Kepemimpinan Operasional</span>
                    <h2 id="ov-indo-mgmt-heading" class="ov-showcase-title">Manajemen PT. Iida Group Holdings (Indonesia)</h2>
                    <p class="ov-showcase-desc">
                        Tim pimpinan dan penasihat senior PT. Iida Group Holdings di Indonesia yang mengoordinasikan standar rekayasa Jepang, konstruksi tahan gempa, dan operasional pengembangan hunian di dalam negeri.
                    </p>

                    <div class="ov-showcase-actions">
                        <a href="<?php echo esc_url(home_url('/about-us/awards/')); ?>" class="ov-btn-primary">
                            Lihat Penghargaan &amp; Paten
                        </a>
                    </div>

                    <?php if ($total_members > 1) : ?>
                    <div class="ov-accordion-nav">
                        <button type="button" class="ov-acc-nav-btn" id="ovTeamPrev" aria-label="Pimpinan Sebelumnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </button>
                        <button type="button" class="ov-acc-nav-btn" id="ovTeamNext" aria-label="Pimpinan Berikutnya">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </button>
                        <span class="ov-acc-nav-counter" id="ovTeamCounter" aria-live="polite">1 / <?php echo esc_html((string) $total_members); ?></span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="ov-showcase-gallery">
                    <div class="ov-accordion-track" id="ovAccordionTrack">
                        <?php
                        $m_idx = 0;
                        foreach ($leadership_members as $member) :
                            $is_active = ($m_idx === 0) ? ' is-active' : '';
                            $photo_url = !empty($member['photo_url']) ? $member['photo_url'] : $theme_uri . '/images/team/sagiri-sakurai.jpg';
                        ?>
                        <article class="ov-acc-card<?php echo $is_active; ?>" data-index="<?php echo esc_attr((string) $m_idx); ?>">
                            <div class="ov-acc-inner">
                                <div class="ov-acc-image-wrapper">
                                    <img
                                        src="<?php echo esc_url($photo_url); ?>"
                                        alt="<?php echo esc_attr($member['name'] . ' - ' . $member['position']); ?>"
                                        class="ov-acc-img"
                                        width="600"
                                        height="800"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                    <div class="ov-acc-collapsed-hint" aria-hidden="true">
                                        <span class="ov-acc-hint-text"><?php echo esc_html($member['name']); ?></span>
                                    </div>
                                </div>

                                <div class="ov-acc-card-info">
                                    <div>
                                        <h3 class="ov-acc-member-name">
                                            <button
                                                type="button"
                                                class="ov-acc-trigger"
                                                aria-expanded="<?php echo $m_idx === 0 ? 'true' : 'false'; ?>"
                                            >
                                                <?php echo esc_html($member['name']); ?>
                                            </button>
                                        </h3>
                                        <p class="ov-acc-member-role"><?php echo esc_html($member['position']); ?></p>
                                    </div>
                                    <?php if (!empty($member['bio_short'])) : ?>
                                    <p class="ov-acc-quote"><?php echo esc_html($member['bio_short']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                        <?php
                            $m_idx++;
                        endforeach;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function () {
    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 1. Hero Residential Slider
    var track = document.getElementById('ovSliderTrack');
    var slides = document.querySelectorAll('.ov-slide');
    var prevBtn = document.getElementById('ovPrevBtn');
    var nextBtn = document.getElementById('ovNextBtn');
    var dots = document.querySelectorAll('.ov-dot');
    var totalSlides = slides.length;
    var currentIndex = 0;
    var autoPlayTimer = null;

    function goToSlide(index) {
        if (!totalSlides) return;
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

        dots.forEach(function (dot, idx) {
            var active = (idx === currentIndex);
            dot.classList.toggle('active', active);
            dot.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
    }

    function stopAutoPlay() {
        if (autoPlayTimer) {
            clearInterval(autoPlayTimer);
            autoPlayTimer = null;
        }
    }

    function startAutoPlay() {
        if (prefersReduced || totalSlides <= 1) return;
        stopAutoPlay();
        autoPlayTimer = setInterval(function () {
            goToSlide(currentIndex + 1);
        }, 4500);
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            goToSlide(currentIndex - 1);
            startAutoPlay();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            goToSlide(currentIndex + 1);
            startAutoPlay();
        });
    }

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            var idx = parseInt(dot.getAttribute('data-index'), 10);
            if (!isNaN(idx)) {
                goToSlide(idx);
                startAutoPlay();
            }
        });
    });

    var sliderContainer = document.getElementById('ovSlider');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopAutoPlay);
        sliderContainer.addEventListener('mouseleave', startAutoPlay);
        sliderContainer.addEventListener('focusin', stopAutoPlay);
        sliderContainer.addEventListener('focusout', startAutoPlay);
    }

    startAutoPlay();

    // 2. Expanding Team Accordion Gallery
    var teamCards = document.querySelectorAll('.ov-acc-card');
    var teamTriggers = document.querySelectorAll('.ov-acc-trigger');
    var teamPrevBtn = document.getElementById('ovTeamPrev');
    var teamNextBtn = document.getElementById('ovTeamNext');
    var teamCounter = document.getElementById('ovTeamCounter');
    var totalTeam = teamCards.length;
    var activeTeamIndex = 0;

    function activateCard(index) {
        if (totalTeam === 0) return;
        if (index < 0) {
            activeTeamIndex = totalTeam - 1;
        } else if (index >= totalTeam) {
            activeTeamIndex = 0;
        } else {
            activeTeamIndex = index;
        }

        teamCards.forEach(function (card, i) {
            var active = (i === activeTeamIndex);
            card.classList.toggle('is-active', active);
            var trigger = card.querySelector('.ov-acc-trigger');
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

        if (teamCounter) {
            teamCounter.textContent = (activeTeamIndex + 1) + ' / ' + totalTeam;
        }
    }

    teamCards.forEach(function (card, idx) {
        card.addEventListener('mouseenter', function () {
            activateCard(idx);
        });
        card.addEventListener('click', function () {
            activateCard(idx);
        });
    });

    teamTriggers.forEach(function (btn, idx) {
        btn.addEventListener('focus', function () {
            activateCard(idx);
        });
    });

    if (teamPrevBtn) {
        teamPrevBtn.addEventListener('click', function () {
            activateCard(activeTeamIndex - 1);
        });
    }

    if (teamNextBtn) {
        teamNextBtn.addEventListener('click', function () {
            activateCard(activeTeamIndex + 1);
        });
    }
});
</script>

<?php
get_footer();
?>
