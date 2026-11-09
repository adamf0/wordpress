<?php
/**
 * Template Name: Milestone
 * Description: Sejarah dan tonggak pencapaian resmi Iida Group Holdings Co.,Ltd. & PT. Perumnas Iida Group (Nov 2023).
 */

get_header();

global $wpdb;
$table_milestones = $wpdb->prefix . 'igh_company_profile_milestones';
$db_milestones    = $wpdb->get_results("SELECT * FROM {$table_milestones} ORDER BY sort_order ASC, year ASC", ARRAY_A);

$theme_uri = get_template_directory_uri();
$pdf_img   = $theme_uri . '/images/pdf/';
$pdf_url   = home_url('/Indonesia_Company%20profile_20231025.pdf');

$fallback_milestones = array(
    array(
        'year'        => '2013',
        'title'       => 'Pendirian Iida Group Holdings Co.,Ltd.',
        'description' => 'Didirikan pada 1 November 2013 di Musashino-shi, Tokyo, Jepang, mengonsolidasikan 6 perusahaan konstruksi dan pengembang perumahan utama (Hajime Construction, Iida Sangyo, Touei Housing, Tact Home, Arnest One, dan ID Home).',
    ),
    array(
        'year'        => '2016',
        'title'       => 'Ekspansi Bisnis ke Indonesia',
        'description' => 'Iida Group Holdings memulai bisnis di Indonesia dengan mendirikan PT. Iida Group Holdings beserta jaringan entitas anak operasional: PT. Perumnas Iida Group, PT. Hajime Indonesia Jaya, PT. Ione Home Indonesia, dan PT. Tact Home Indonesia.',
    ),
    array(
        'year'        => '2017',
        'title'       => 'Pendirian PT. Perumnas Iida Group',
        'description' => 'Pendirian perusahaan patungan antara Iida Sangyo Co.,Ltd. (93%) dan PT. Propernas Griya Utama (7%, anak perusahaan Perum Perumnas) di Bekasi, bersama entitas anak PT. Abdiluhur Kawuloalit (99,99% Perumnas Iida Group dan 0,01% Iida Sangyo).',
    ),
    array(
        'year'        => '2018-2020',
        'title'       => 'Pabrik IG SCB, Sertifikasi SNI & Paten IDP000069171',
        'description' => 'Pengoperasian fasilitas manufaktur IG Strong Concrete Block (IG SCB), tersertifikasi Standar Nasional Indonesia (SNI), teruji ketahanan gempa hingga Magnitudo > 8,0, dan resmi meraih Sertifikat Paten Indonesia Nomor IDP000069171 pada 17 Juni 2020.',
    ),
    array(
        'year'        => '2023-Kini',
        'title'       => 'Realisasi Hunian & Pengembangan Proyek Bekasi',
        'description' => 'Penyelesaian proyek Botania 2 Residence dan Heartful-Town Depok, serta pengembangan proyek lanjutan Heartful-Town Bekasi (29 unit rumah 1 dan 2 lantai) dan apartemen Heartful Tower Bekasi.',
    ),
);

$milestones = !empty($db_milestones) ? $db_milestones : $fallback_milestones;

$milestone_meta = array(
    0 => array(
        'era'   => 'japan',
        'badge' => '1 November 2013 : Tokyo, Jepang',
        'image' => $pdf_img . 'iida-hq-tokyo.webp',
        'alt'   => 'Kantor Pusat Iida Group Holdings Co.,Ltd. di Musashino-shi, Tokyo, Jepang',
        'w'     => 953,
        'h'     => 863,
    ),
    1 => array(
        'era'   => 'indonesia',
        'badge' => '2016 : Ekspansi Nusantara',
        'image' => $pdf_img . 'botania-2-residence.webp',
        'alt'   => 'Proyek perumahan Botania 2 Residence oleh grup Iida di Indonesia',
        'w'     => 1218,
        'h'     => 994,
    ),
    2 => array(
        'era'   => 'indonesia',
        'badge' => '2017 : Joint Venture Bekasi',
        'image' => $pdf_img . 'heartful-town-depok-aerial.webp',
        'alt'   => 'Kawasan hunian Heartful-Town Depok hasil pengembangan PT. Perumnas Iida Group',
        'w'     => 1073,
        'h'     => 605,
    ),
    3 => array(
        'era'   => 'tech',
        'badge' => '17 Juni 2020 : Paten & SNI',
        'image' => $pdf_img . 'ig-scb-patent-idp000069171.webp',
        'alt'   => 'Sertifikat Paten Indonesia Nomor IDP000069171 untuk teknologi blok IG SCB',
        'w'     => 934,
        'h'     => 645,
    ),
    4 => array(
        'era'   => 'projects',
        'badge' => '2023 - Kini : Proyek Bekasi',
        'image' => $pdf_img . 'heartful-town-bekasi-facade.webp',
        'alt'   => 'Pengembangan proyek Heartful-Town Bekasi sebanyak 29 unit rumah',
        'w'     => 1188,
        'h'     => 794,
    ),
);
?>

<style>
/* ==========================================================================
   Milestone Page Layout (PT. Perumnas Iida Group / Iida Group Holdings)
   ========================================================================== */

.ms-page-wrapper {
    font-family: var(--font-body);
    color: var(--color-text-body);
    background-color: var(--color-surface);
    width: 100%;
    overflow-x: hidden;
}

/* 1. Hero Banner */
.ms-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: var(--color-deep-navy);
    overflow: hidden;
}
@media (min-width: 768px) {
    .ms-hero-banner {
        min-height: 390px;
    }
}
.ms-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    z-index: 1;
}
.ms-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.80) 55%, rgba(10, 31, 44, 0.68) 100%);
    z-index: 2;
}
.ms-hero-inner {
    position: relative;
    z-index: 3;
    max-width: var(--container-max);
    width: 100%;
    margin: 0 auto;
    padding: 3rem var(--gutter);
}
.ms-breadcrumb {
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
.ms-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    padding: 0 4px;
    color: #cbd5e1;
    text-decoration: none;
    transition: color var(--dur-fast) var(--ease-in-out);
}
.ms-breadcrumb a:hover,
.ms-breadcrumb a:focus-visible {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
}
.ms-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.ms-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.55);
}
.ms-breadcrumb .current {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #ffffff;
    font-weight: 700;
}
.ms-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 0.75rem;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.85);
}
.ms-hero-eyebrow-bar {
    width: 3px;
    height: 16px;
    border-radius: 2px;
    background-color: var(--color-action-cyan);
}
.ms-hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.15rem, 4.5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.12;
    letter-spacing: -0.025em;
    color: #ffffff;
    margin: 0 0 1rem;
}
.ms-hero-subtitle {
    margin: 0 0 1.75rem;
    max-width: 64ch;
    font-size: 1.05rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.85);
}
.ms-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.ms-btn-solid {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    background-color: #ffffff;
    color: var(--color-deep-navy);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                transform var(--dur-fast) var(--ease-spring);
}
.ms-btn-solid:hover {
    background-color: var(--color-primary-container);
    color: var(--color-deep-navy);
}
.ms-btn-ghost {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                border-color var(--dur-fast) var(--ease-in-out);
}
.ms-btn-ghost:hover {
    background-color: rgba(255, 255, 255, 0.12);
    border-color: #ffffff;
    color: #ffffff;
}
.ms-btn-solid:focus-visible,
.ms-btn-ghost:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

/* 2. Key Milestones Summary Strip */
.ms-summary-section {
    background-color: var(--color-surface-sunken);
    border-bottom: 1px solid var(--color-border);
    padding: 2.5rem var(--gutter);
}
.ms-container {
    max-width: var(--container-max);
    margin: 0 auto;
    width: 100%;
}
.ms-facts-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
    margin: 0;
}
@media (min-width: 640px) {
    .ms-facts-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .ms-facts-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}
.ms-fact-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    padding: 1.25rem 1.4rem;
    box-shadow: var(--shadow-xs);
}
.ms-fact-card dt {
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-primary);
    margin: 0 0 0.4rem;
}
.ms-fact-card dd {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.25;
}
.ms-fact-note {
    margin: 0.35rem 0 0;
    font-size: var(--text-sm);
    line-height: 1.5;
    color: var(--color-text-muted);
}

/* 3. Interactive Timeline Section */
.ms-timeline-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) var(--gutter);
    background-color: var(--color-surface);
}
.ms-section-head {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    margin-bottom: 2.75rem;
}
@media (min-width: 900px) {
    .ms-section-head {
        flex-direction: row;
        align-items: flex-end;
        justify-content: space-between;
    }
}
.ms-eyebrow {
    margin: 0 0 0.5rem;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-primary);
}
.ms-section-title {
    margin: 0 0 0.75rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.15;
}
.ms-section-desc {
    margin: 0;
    max-width: 60ch;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}

/* Era Filter Controls */
.ms-filter-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}
.ms-filter-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 0.55rem 1.15rem;
    border-radius: var(--radius-pill);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-body);
    font-family: var(--font-body);
    font-size: var(--text-sm);
    font-weight: 600;
    cursor: pointer;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                border-color var(--dur-fast) var(--ease-in-out),
                color var(--dur-fast) var(--ease-in-out);
}
.ms-filter-btn:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background-color: var(--color-primary-container);
}
.ms-filter-btn.is-active {
    background-color: var(--color-deep-navy);
    border-color: var(--color-deep-navy);
    color: #ffffff;
}
.ms-filter-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Chronological Timeline List */
.ms-timeline-list {
    position: relative;
    display: grid;
    gap: 1.75rem;
    margin: 0;
    padding: 0;
    list-style: none;
}
@media (min-width: 900px) {
    .ms-timeline-list::before {
        content: "";
        position: absolute;
        top: 0.5rem;
        bottom: 0.5rem;
        left: 22px;
        width: 2px;
        background-color: var(--color-border-strong);
    }
}
.ms-timeline-item {
    position: relative;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
.ms-timeline-item.is-hidden {
    display: none;
}
@media (min-width: 900px) {
    .ms-timeline-item {
        padding-left: 60px;
    }
}
.ms-timeline-marker {
    display: none;
}
@media (min-width: 900px) {
    .ms-timeline-marker {
        position: absolute;
        left: 8px;
        top: 1.65rem;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--color-primary);
        border: 4px solid var(--color-surface);
        box-shadow: 0 0 0 1px var(--color-border-strong);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 800;
        z-index: 2;
    }
}
.ms-card {
    display: grid;
    grid-template-columns: 1fr;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: border-color var(--dur-base) var(--ease-in-out),
                box-shadow var(--dur-base) var(--ease-in-out);
}
.ms-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
@media (min-width: 768px) {
    .ms-card {
        grid-template-columns: 1.35fr 0.85fr;
        align-items: stretch;
    }
}
.ms-card-body {
    padding: clamp(1.5rem, 3vw, 2.25rem);
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.ms-card-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.9rem;
}
.ms-year-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.35rem 0.9rem;
    border-radius: var(--radius-pill);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
    font-family: var(--font-display);
    font-size: var(--text-sm);
    font-weight: 800;
    letter-spacing: 0.02em;
}
.ms-era-tag {
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-text-muted);
}
.ms-card-title {
    margin: 0 0 0.75rem;
    font-family: var(--font-display);
    font-size: clamp(1.25rem, 2.2vw, 1.65rem);
    font-weight: 800;
    line-height: 1.25;
    color: var(--color-text-heading);
}
.ms-card-desc {
    margin: 0;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}
.ms-card-media {
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
    min-height: 220px;
    overflow: hidden;
}
@media (min-width: 768px) {
    .ms-card-media {
        border-top: 0;
        border-left: 1px solid var(--color-border);
        min-height: 240px;
    }
}
.ms-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* 4. Evidence & Current Projects Showcase */
.ms-proof-section {
    padding: clamp(3.5rem, 6vw, 5rem) var(--gutter);
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
}
.ms-proof-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-top: 2rem;
}
@media (min-width: 768px) {
    .ms-proof-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
.ms-proof-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-xs);
}
.ms-proof-img-wrap {
    aspect-ratio: 16 / 10;
    background-color: var(--color-surface-sunken);
    overflow: hidden;
}
.ms-proof-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.ms-proof-body {
    padding: 1.5rem;
}
.ms-proof-tag {
    margin: 0 0 0.45rem;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-primary);
}
.ms-proof-title {
    margin: 0 0 0.5rem;
    font-family: var(--font-display);
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--color-text-heading);
}
.ms-proof-text {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}

/* 5. Closing Navigation & CTA Band */
.ms-cta-section {
    padding: clamp(3rem, 5vw, 4.5rem) var(--gutter);
    background-color: var(--color-primary);
    color: #ffffff;
}
.ms-cta-inner {
    max-width: var(--container-max);
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    justify-content: space-between;
}
@media (min-width: 900px) {
    .ms-cta-inner {
        flex-direction: row;
        align-items: center;
    }
}
.ms-cta-title {
    margin: 0 0 0.5rem;
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 2.5vw, 2rem);
    font-weight: 800;
    color: #ffffff;
}
.ms-cta-desc {
    margin: 0;
    max-width: 56ch;
    font-size: var(--text-base);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.92);
}
.ms-cta-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

@media (prefers-reduced-motion: reduce) {
    .ms-card,
    .ms-filter-btn,
    .ms-btn-solid,
    .ms-btn-ghost {
        transition: none;
    }
}
</style>

<main id="main-content" class="ms-page-wrapper">

    <!-- 1. Hero Banner -->
    <section class="ms-hero-banner" aria-labelledby="ms-hero-title">
        <img
            src="<?php echo esc_url($theme_uri . '/images/vision-mission/bg-header-company-data.jpg'); ?>"
            alt="Gedung operasional PT. Iida Group Holdings"
            class="ms-hero-bg"
            width="1920"
            height="1080"
            fetchpriority="high"
            decoding="sync"
        />
        <div class="ms-hero-overlay" aria-hidden="true"></div>
        <div class="ms-hero-inner">
            <nav class="ms-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator" aria-hidden="true">/</span>
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>">About Us</a>
                <span class="separator" aria-hidden="true">/</span>
                <span class="current" aria-current="page">Milestone</span>
            </nav>

            <p class="ms-hero-eyebrow">
                <span class="ms-hero-eyebrow-bar" aria-hidden="true"></span>
                <span>Rekam Jejak Korporasi &middot; Nov 2023</span>
            </p>
            <h1 id="ms-hero-title" class="ms-hero-title">Tonggak Sejarah &amp; Pencapaian</h1>
            <p class="ms-hero-subtitle">
                Perjalanan strategis Iida Group Holdings Co.,Ltd. sejak konsolidasi di Musashino-shi, Tokyo pada 2013 hingga pendirian PT. Perumnas Iida Group, sertifikasi paten IG SCB, dan pengembangan proyek hunian di Indonesia.
            </p>
            <div class="ms-hero-actions">
                <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="ms-btn-solid">
                    Unduh Company Profile (PDF Nov 2023)
                </a>
                <a href="<?php echo esc_url(home_url('/development/')); ?>" class="ms-btn-ghost">
                    Lihat Portofolio Proyek
                </a>
            </div>
        </div>
    </section>

    <!-- 2. Key Historical Facts -->
    <section class="ms-summary-section" aria-label="Ringkasan Fakta Sejarah">
        <div class="ms-container">
            <dl class="ms-facts-grid">
                <div class="ms-fact-card">
                    <dt>1 November 2013</dt>
                    <dd>Konsolidasi IGHD</dd>
                    <p class="ms-fact-note">Berdiri di Musashino-shi, Tokyo dengan 6 anak perusahaan pengembang rumah utama Jepang.</p>
                </div>
                <div class="ms-fact-card">
                    <dt>Tahun 2016</dt>
                    <dd>Masuk Indonesia</dd>
                    <p class="ms-fact-note">Pendirian PT. Iida Group Holdings sebagai induk grup bagi entitas operasional di Indonesia.</p>
                </div>
                <div class="ms-fact-card">
                    <dt>Tahun 2017</dt>
                    <dd>PT. Perumnas Iida Group</dd>
                    <p class="ms-fact-note">Joint venture Iida Sangyo Co.,Ltd. (93%) &amp; PT. Propernas Griya Utama (7%) di Kota Bekasi.</p>
                </div>
                <div class="ms-fact-card">
                    <dt>17 Juni 2020</dt>
                    <dd>Paten IDP000069171</dd>
                    <p class="ms-fact-note">Pengakuan paten Indonesia &amp; sertifikasi SNI untuk teknologi blok pracetak tahan gempa IG SCB.</p>
                </div>
            </dl>
        </div>
    </section>

    <!-- 3. Chronological Timeline -->
    <section class="ms-timeline-section" aria-labelledby="ms-timeline-heading">
        <div class="ms-container">
            <div class="ms-section-head">
                <div>
                    <p class="ms-eyebrow">Kronologi Resmi Perusahaan</p>
                    <h2 id="ms-timeline-heading" class="ms-section-title">Dari Tokyo hingga Proyek Bekasi</h2>
                    <p class="ms-section-desc">
                        Setiap tahapan pertumbuhan di bawah ini merujuk pada dokumen resmi Corporate Profile Iida Group Holdings Co.,Ltd. dan PT. Perumnas Iida Group (November 2023).
                    </p>
                </div>
                <div class="ms-filter-bar" role="group" aria-label="Filter fase sejarah">
                    <button type="button" class="ms-filter-btn is-active" data-era="all" aria-pressed="true">Semua Fase</button>
                    <button type="button" class="ms-filter-btn" data-era="japan" aria-pressed="false">Jepang (2013)</button>
                    <button type="button" class="ms-filter-btn" data-era="indonesia" aria-pressed="false">Ekspansi Indonesia</button>
                    <button type="button" class="ms-filter-btn" data-era="tech" aria-pressed="false">Paten &amp; SNI</button>
                    <button type="button" class="ms-filter-btn" data-era="projects" aria-pressed="false">Proyek Kini</button>
                </div>
            </div>

            <ol class="ms-timeline-list" id="msTimelineList">
                <?php
                $total_ms = count($milestones);
                foreach ($milestones as $idx => $item) :
                    $meta = isset($milestone_meta[$idx]) ? $milestone_meta[$idx] : array(
                        'era'   => 'projects',
                        'badge' => $item['year'],
                        'image' => $pdf_img . 'botania-2-residence.webp',
                        'alt'   => $item['title'],
                        'w'     => 1218,
                        'h'     => 994,
                    );
                ?>
                <li class="ms-timeline-item" data-era="<?php echo esc_attr($meta['era']); ?>">
                    <span class="ms-timeline-marker" aria-hidden="true"><?php echo esc_html((string) ($idx + 1)); ?></span>
                    <article class="ms-card">
                        <div class="ms-card-body">
                            <div class="ms-card-meta">
                                <span class="ms-year-pill"><?php echo esc_html($item['year']); ?></span>
                                <span class="ms-era-tag"><?php echo esc_html($meta['badge']); ?></span>
                            </div>
                            <h3 class="ms-card-title"><?php echo esc_html($item['title']); ?></h3>
                            <p class="ms-card-desc"><?php echo esc_html($item['description']); ?></p>
                        </div>
                        <div class="ms-card-media">
                            <img
                                src="<?php echo esc_url($meta['image']); ?>"
                                alt="<?php echo esc_attr($meta['alt']); ?>"
                                width="<?php echo esc_attr((string) $meta['w']); ?>"
                                height="<?php echo esc_attr((string) $meta['h']); ?>"
                                loading="lazy"
                                decoding="async"
                            />
                        </div>
                    </article>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- 4. Documentary Proof: Ongoing & Upcoming Projects -->
    <section class="ms-proof-section" aria-labelledby="ms-proof-heading">
        <div class="ms-container">
            <div>
                <p class="ms-eyebrow">Realisasi Lapangan &amp; Pengembangan</p>
                <h2 id="ms-proof-heading" class="ms-section-title">Pencapaian Proyek &amp; Sertifikasi</h2>
                <p class="ms-section-desc">
                    Jejak proyek eksisting di Depok dan kawasan sekitar serta rencana pengembangan perumahan tapak dan apartemen di Bekasi.
                </p>
            </div>

            <div class="ms-proof-grid">
                <article class="ms-proof-card">
                    <div class="ms-proof-img-wrap">
                        <img
                            src="<?php echo esc_url($pdf_img . 'botania-2-residence.webp'); ?>"
                            alt="Fasad luar Botania 2 Residence"
                            width="1218"
                            height="994"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <div class="ms-proof-body">
                        <p class="ms-proof-tag">Proyek Eksisting &middot; Indonesia</p>
                        <h3 class="ms-proof-title">Botania 2 Residence &amp; Heartful-Town Depok</h3>
                        <p class="ms-proof-text">
                            Pengembangan perumahan dengan desain fasad luar dan perancangan interior berstandar Iida Group Holdings untuk menghadirkan hunian fungsional bagi keluarga Indonesia.
                        </p>
                    </div>
                </article>

                <article class="ms-proof-card">
                    <div class="ms-proof-img-wrap">
                        <img
                            src="<?php echo esc_url($pdf_img . 'heartful-tower-bekasi-exterior.webp'); ?>"
                            alt="Konsep eksterior apartemen Heartful Tower Bekasi"
                            width="870"
                            height="1145"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <div class="ms-proof-body">
                        <p class="ms-proof-tag">Pengembangan Berjalan &middot; Bekasi</p>
                        <h3 class="ms-proof-title">Heartful-Town Bekasi (29 Unit) &amp; Heartful Tower Bekasi</h3>
                        <p class="ms-proof-text">
                            Hadirnya rumah 1 dan 2 lantai di Heartful-Town Bekasi serta apartemen Heartful Tower Bekasi dengan 30% area hijau, pilihan Studio, 1 BR, dan 2 BR, Zen Garden, Gym, Kindergarden, serta Kolam Renang.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- 5. Closing CTA -->
    <section class="ms-cta-section" aria-labelledby="ms-cta-heading">
        <div class="ms-cta-inner">
            <div>
                <h2 id="ms-cta-heading" class="ms-cta-title">Telusuri Struktur Grup &amp; Tata Kelola Kami</h2>
                <p class="ms-cta-desc">
                    Pelajari jajaran Dewan Komisaris, Direksi, dan jaringan entitas perusahaan Iida Group Holdings di Jepang maupun Indonesia.
                </p>
            </div>
            <div class="ms-cta-actions">
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>" class="ms-btn-solid">
                    Kembali ke Overview
                </a>
                <a href="<?php echo esc_url(home_url('/about-us/awards/')); ?>" class="ms-btn-ghost">
                    Lihat Awards &amp; Sertifikasi
                </a>
            </div>
        </div>
    </section>

</main>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function () {
    var filterBtns = document.querySelectorAll('.ms-filter-btn');
    var items      = document.querySelectorAll('.ms-timeline-item');

    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var targetEra = btn.getAttribute('data-era');

            filterBtns.forEach(function (other) {
                var active = other === btn;
                other.classList.toggle('is-active', active);
                other.setAttribute('aria-pressed', active ? 'true' : 'false');
            });

            items.forEach(function (item) {
                var itemEra = item.getAttribute('data-era');
                var show    = (targetEra === 'all' || itemEra === targetEra);
                item.classList.toggle('is-hidden', !show);
            });
        });
    });
});
</script>

<?php
get_footer();
?>
