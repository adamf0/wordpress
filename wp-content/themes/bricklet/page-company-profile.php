<?php
/**
 * Template Name: Company Profile
 * Description: Profil Perusahaan resmi Iida Group Holdings Co.,Ltd. & PT. Perumnas Iida Group (Nov 2023).
 */
get_header();

global $wpdb;
$table_company    = $wpdb->prefix . 'igh_company_profile';
$table_milestones = $wpdb->prefix . 'igh_company_profile_milestones';

$db_company    = $wpdb->get_row("SELECT * FROM $table_company WHERE id = 1", ARRAY_A);
$db_milestones = $wpdb->get_results("SELECT * FROM $table_milestones ORDER BY sort_order ASC, year ASC", ARRAY_A);

$theme_uri = get_template_directory_uri();
$pdf_img   = $theme_uri . '/images/pdf/';
$pdf_url   = home_url('/Indonesia_Company%20profile_20231025.pdf');

$company_defaults = array(
    'hero_bg_image'       => $pdf_img . 'iida-hq-tokyo.webp',
    'hero_badge'          => 'COMPANY PROFILE · NOV 2023',
    'hero_title'          => 'Iida Group Holdings & PT. Perumnas Iida Group',
    'hero_subtitle'       => 'Mewujudkan masyarakat di mana setiap orang dapat memiliki rumah di lokasi strategis, harga terjangkau, dan kualitas tinggi berstandar Jepang.',
    'hero_btn1_text'      => 'Lihat Proyek Hunian',
    'hero_btn1_link'      => '/development/',
    'hero_btn2_text'      => 'Skema Bisnis & IG SCB',
    'hero_btn2_link'      => '/our-business/',
    'about_badge'         => 'Profil Korporasi Resmi',
    'about_title'         => 'Dari Musashino Tokyo untuk Hunian Berkualitas di Indonesia',
    'about_desc1'         => 'Iida Group Holdings Co.,Ltd. berdiri pada 1 November 2013 di Musashino-shi, Tokyo, Jepang dengan 13.353 karyawan (per 31 Maret 2023). Grup ini memadukan 6 perusahaan properti utama dan melayani pasar Jepang melalui lebih dari 400 cabang penjualan dengan pangsa pasar 30% atau sekitar 46.000 rumah terjual setiap tahun.',
    'about_desc2'         => 'Di Indonesia, grup memulai bisnis sejak tahun 2016 melalui pendirian PT. Iida Group Holdings, lalu pada tahun 2017 mendirikan PT. Perumnas Iida Group bersama PT. Propernas Griya Utama (anak perusahaan Perum Perumnas) yang berkantor pusat di Jl. Caringin Raya, RT.010/RW.002, Kec. Rawalumbu, Kota Bekasi, Jawa Barat.',
    'about_image'         => $pdf_img . 'botania-2-residence.webp',
    'about_stat1_val'     => '30%',
    'about_stat1_lbl'     => 'Pangsa Pasar Jepang (±46.000 Unit/Thn)',
    'about_stat2_val'     => '13.353',
    'about_stat2_lbl'     => 'Karyawan Grup (31 Mar 2023)',
    'about_overlay_title' => '1 Nov 2013',
    'about_overlay_lbl'   => 'Didirikan di Musashino-shi, Tokyo',
    'leader_image'        => $pdf_img . 'iida-hq-tokyo.webp',
    'leader_name'         => 'Masashi Kanei & Kenichiro Watanabe',
    'leader_title'        => 'President & Representative Director IGHD / President Director PT. Perumnas Iida Group',
    'leader_quote'        => 'Mewujudkan masyarakat dimana setiap orang dapat memiliki rumah.',
    'leader_quote_desc'   => 'Dengan pengalaman panjang pengembangan rumah tapak di Jepang serta sinergi bersama PT. Propernas Griya Utama di Indonesia, kami berkomitmen membangun lingkungan perumahan ramah lingkungan yang aman secara kualitas, berada di lokasi strategis, dan terjangkau bagi masyarakat luas.',
    'leader_quote_source' => 'Corporate Profile Nov 2023 : Iida Group Holdings Co.,Ltd. & PT. Perumnas Iida Group',
    'framework_title'     => 'Visi & Misi PT. Perumnas Iida Group',
    'framework_desc'      => 'Pedoman resmi perusahaan patungan PT. Perumnas Iida Group dalam menghadirkan hunian terjangkau dan ramah lingkungan di Indonesia (Profil Perusahaan, Hal. 7).',
    'vision_title'        => 'Visi Perusahaan',
    'vision_desc'         => 'Menyediakan banyak perumahan dengan kualitas baik dan harga terjangkau kepada masyarakat.',
    'vision_icon'         => 'visibility',
    'mission_title'       => 'Misi Perusahaan',
    'mission_desc'        => 'Melalui pendirian pabrik, memperluas pembangunan rumah ramah lingkungan dan aman secara kualitas untuk menyediakan banyak perumahan dengan harga terjangkau kepada masyarakat.',
    'mission_icon'        => 'factory',
    'value1_title'        => 'Lokasi yang Strategis',
    'value1_icon'         => 'location_on',
    'value2_title'        => 'Harga yang Terjangkau',
    'value2_icon'         => 'savings',
    'value3_title'        => 'Kualitas yang Tinggi',
    'value3_icon'         => 'verified',
    'value4_title'        => 'Ramah Lingkungan',
    'value4_icon'         => 'eco',
);

$company = $company_defaults;
if (is_array($db_company)) {
    foreach ($company_defaults as $key => $default_val) {
        if (!empty($db_company[$key])) {
            $val = $db_company[$key];
            if (strpos($val, 'timber-house-collaboration') !== false) {
                $val = $default_val;
            }
            $company[$key] = $val;
        }
    }
}

$fallback_milestones = array(
    array(
        'year'        => '2013',
        'title'       => 'Pendirian Iida Group Holdings Co.,Ltd.',
        'description' => 'Didirikan pada 1 November 2013 di Musashino-shi, Tokyo, Jepang, mengonsolidasikan 6 perusahaan konstruksi dan pengembang perumahan utama.',
    ),
    array(
        'year'        => '2016',
        'title'       => 'Ekspansi Bisnis ke Indonesia',
        'description' => 'Memulai bisnis di Indonesia melalui pendirian PT. Iida Group Holdings bersama PT. Hajime Indonesia Jaya, PT. Ione Home Indonesia, dan PT. Tact Home Indonesia.',
    ),
    array(
        'year'        => '2017',
        'title'       => 'Pendirian PT. Perumnas Iida Group',
        'description' => 'Perusahaan patungan antara Iida Sangyo Co.,Ltd. (93%) dan PT. Propernas Griya Utama (7%, anak usaha Perum Perumnas) di Bekasi, bersama anak usaha PT. Abdiluhur Kawuloalit.',
    ),
    array(
        'year'        => '2018-2020',
        'title'       => 'Pabrik IG SCB, SNI & Paten IDP000069171',
        'description' => 'Pengoperasian pabrik IG Strong Concrete Block (IG SCB), sertifikasi SNI, uji ketahanan gempa hingga Magnitudo > 8,0, dan penerbitan Paten IDP000069171 (17 Juni 2020).',
    ),
    array(
        'year'        => '2023-Kini',
        'title'       => 'Realisasi & Pengembangan Proyek Bekasi',
        'description' => 'Penyelesaian proyek Botania 2 Residence dan Heartful-Town Depok, serta pengembangan proyek Heartful-Town Bekasi (29 unit) dan apartemen Heartful Tower Bekasi.',
    ),
);

$milestones = !empty($db_milestones) ? $db_milestones : $fallback_milestones;
?>

<style>
/* ==========================================================================
   Company Profile Page Layout (Design Tokens from header.php)
   ========================================================================== */

.cp-page-wrapper {
    font-family: var(--font-body);
    color: var(--color-text-body);
    background-color: var(--color-surface);
    width: 100%;
    overflow-x: hidden;
}

.cp-container {
    max-width: var(--container-max);
    margin: 0 auto;
    padding-left: var(--gutter);
    padding-right: var(--gutter);
}

/* 1. Hero Section */
.cp-hero {
    position: relative;
    background-color: var(--color-deep-navy);
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    overflow: hidden;
}
.cp-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.cp-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    display: block;
}
.cp-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.80) 58%, rgba(10, 31, 44, 0.58) 100%);
    z-index: 1;
}
.cp-hero-inner {
    position: relative;
    z-index: 2;
    max-width: 46rem;
}
.cp-breadcrumb {
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
.cp-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    padding: 0 4px;
    color: #cbd5e1;
    text-decoration: none;
    transition: color var(--dur-fast) var(--ease-in-out);
}
.cp-breadcrumb a:hover,
.cp-breadcrumb a:focus-visible {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
}
.cp-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.55);
}
.cp-breadcrumb .current {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #ffffff;
    font-weight: 700;
}
.cp-hero-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.4rem 0.9rem;
    border-radius: var(--radius-sm);
    background-color: var(--color-action-cyan);
    color: var(--color-deep-navy);
    font-size: var(--text-xs);
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 1.25rem;
}
.cp-hero-title {
    margin: 0 0 1rem;
    font-family: var(--font-display);
    font-size: clamp(2.1rem, 4.4vw, 3.4rem);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -0.025em;
    color: #ffffff;
}
.cp-hero-subtitle {
    margin: 0 0 2rem;
    font-size: 1.075rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.85);
}
.cp-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.cp-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.6rem;
    border-radius: var(--radius-pill);
    background-color: #ffffff;
    color: var(--color-deep-navy);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out), transform var(--dur-fast) var(--ease-spring);
}
.cp-btn-primary:hover {
    background-color: var(--color-primary-container);
    color: var(--color-deep-navy);
}
.cp-btn-outline {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.6rem;
    border-radius: var(--radius-pill);
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out);
}
.cp-btn-outline:hover {
    background-color: rgba(255, 255, 255, 0.12);
    border-color: #ffffff;
    color: #ffffff;
}
.cp-btn-primary:focus-visible,
.cp-btn-outline:focus-visible,
.cp-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

/* 2. Foundation & Corporate Identity Section */
.cp-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.cp-section--sunken {
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
    border-bottom: 1px solid var(--color-border);
}
.cp-about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: center;
}
@media (min-width: 960px) {
    .cp-about-grid {
        grid-template-columns: 1.1fr 0.9fr;
    }
}
.cp-eyebrow {
    display: block;
    margin: 0 0 0.65rem;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.cp-heading {
    margin: 0 0 1.25rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 800;
    line-height: 1.15;
    color: var(--color-text-heading);
}
.cp-prose {
    display: grid;
    gap: 1rem;
    font-size: var(--text-base);
    line-height: 1.7;
    color: var(--color-text-body);
}
.cp-prose p {
    margin: 0;
}
.cp-stats-row {
    margin-top: 2rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
@media (min-width: 560px) {
    .cp-stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
}
.cp-stat-box {
    border-left: 4px solid var(--color-primary);
    padding: 0.25rem 0 0.25rem 1.25rem;
}
.cp-stat-box--accent {
    border-left-color: var(--color-action-cyan);
}
.cp-stat-val {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 800;
    line-height: 1.1;
    color: var(--color-text-heading);
}
.cp-stat-lbl {
    margin-top: 0.35rem;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-text-muted);
}

.cp-media-wrap {
    position: relative;
}
.cp-media-frame {
    aspect-ratio: 4 / 3;
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--color-border);
    background-color: var(--color-surface-sunken);
    box-shadow: var(--shadow-md);
}
.cp-media-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.cp-overlay-card {
    margin-top: 1rem;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: 1.25rem 1.5rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-lg);
}
@media (min-width: 768px) {
    .cp-overlay-card {
        position: absolute;
        bottom: -1.5rem;
        left: -1.5rem;
        margin-top: 0;
        max-width: 260px;
    }
}
.cp-overlay-title {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 0.25rem;
}
.cp-overlay-lbl {
    margin: 0;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #cbd5e1;
}

/* Official Entity Data Cards */
.cp-entities-grid {
    margin-top: 3.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media (min-width: 900px) {
    .cp-entities-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
.cp-entity-card {
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 1.75rem;
}
.cp-entity-title {
    margin: 0 0 1rem;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--color-text-heading);
    padding-bottom: 0.75rem;
    border-bottom: 2px solid var(--color-primary);
}
.cp-dl {
    margin: 0;
    display: grid;
    gap: 0.85rem;
}
.cp-dl-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.2rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--color-border);
}
.cp-dl-row:last-child {
    border-bottom: 0;
    padding-bottom: 0;
}
@media (min-width: 520px) {
    .cp-dl-row {
        grid-template-columns: 170px 1fr;
        gap: 1rem;
    }
}
.cp-dl-row dt {
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--color-text-muted);
}
.cp-dl-row dd {
    margin: 0;
    font-size: var(--text-sm);
    font-weight: 500;
    line-height: 1.55;
    color: var(--color-text-heading);
}
.cp-dl-row a {
    color: var(--color-primary);
    font-weight: 600;
    text-decoration: underline;
    text-underline-offset: 3px;
}

/* 3. Leadership Highlight (Dark Navy) */
.cp-leader-section {
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
}
.cp-leader-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(2rem, 4vw, 4rem);
    align-items: center;
}
@media (min-width: 960px) {
    .cp-leader-grid {
        grid-template-columns: 0.9fr 1.1fr;
    }
}
.cp-leader-visual {
    position: relative;
}
.cp-leader-frame {
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.16);
}
.cp-leader-frame img {
    width: 100%;
    height: auto;
    display: block;
}
.cp-leader-badge {
    margin-top: 1rem;
    background-color: #ffffff;
    padding: 1.15rem 1.4rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-lg);
}
.cp-leader-name {
    margin: 0 0 0.25rem;
    font-family: var(--font-display);
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--color-text-heading);
}
.cp-leader-role {
    margin: 0;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-primary);
}
.cp-leader-eyebrow {
    display: block;
    margin-bottom: 0.75rem;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.cp-leader-quote {
    margin: 0 0 1.25rem;
    font-family: var(--font-display);
    font-size: clamp(1.6rem, 3vw, 2.35rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
}
.cp-leader-desc {
    margin: 0 0 1.75rem;
    font-size: var(--text-lg);
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.85);
}
.cp-leader-source {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.cp-leader-line {
    width: 40px;
    height: 2px;
    background-color: var(--color-action-cyan);
    flex-shrink: 0;
}

/* 4. Vision, Mission & Values */
.cp-center-head {
    text-align: center;
    max-width: 42rem;
    margin: 0 auto 3rem;
}
.cp-vm-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media (min-width: 768px) {
    .cp-vm-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
.cp-vm-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: clamp(1.75rem, 3vw, 2.5rem);
    box-shadow: var(--shadow-xs);
}
.cp-vm-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background-color: var(--color-primary-container);
    color: var(--color-primary);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
}
.cp-vm-title {
    margin: 0 0 0.75rem;
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--color-text-heading);
}
.cp-vm-desc {
    margin: 0;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}
.cp-values-grid {
    margin-top: 1.5rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
}
@media (min-width: 640px) {
    .cp-values-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .cp-values-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}
.cp-value-item {
    display: flex;
    align-items: center;
    gap: 0.85rem;
    padding: 1.15rem 1.25rem;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
}
.cp-value-item .material-symbols-outlined {
    color: var(--color-primary);
    font-size: 24px;
}
.cp-value-label {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-heading);
}
.cp-section-link-wrap {
    margin-top: 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
}
.cp-btn-dark {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.cp-btn-dark:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.cp-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
}
.cp-btn-secondary:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.cp-btn-dark:focus-visible,
.cp-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* 5. Interactive Milestones Section */
.cp-milestone-head {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
    margin-bottom: 2.25rem;
}
@media (min-width: 768px) {
    .cp-milestone-head {
        flex-direction: row;
        align-items: flex-end;
        justify-content: space-between;
    }
}
.cp-milestone-controls {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.75rem;
}
.cp-nav-btn {
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
    transition: background-color var(--dur-fast) var(--ease-in-out),
                border-color var(--dur-fast) var(--ease-in-out),
                color var(--dur-fast) var(--ease-in-out);
}
.cp-nav-btn:hover:not(:disabled) {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-primary);
}
.cp-nav-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
}
.cp-nav-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.cp-nav-counter {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-muted);
    min-width: 48px;
    text-align: center;
}
.cp-milestone-track {
    display: flex;
    gap: 1.25rem;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding: 0.5rem 0.25rem 1.25rem;
    -webkit-overflow-scrolling: touch;
}
.cp-milestone-card {
    flex: 0 0 min(320px, 85vw);
    scroll-snap-align: start;
    background-color: var(--color-surface);
    border: 1.5px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 1.75rem;
    text-align: left;
    cursor: pointer;
    transition: border-color var(--dur-fast) var(--ease-in-out),
                box-shadow var(--dur-fast) var(--ease-in-out),
                background-color var(--dur-fast) var(--ease-in-out);
}
@media (min-width: 1024px) {
    .cp-milestone-card {
        flex: 0 0 340px;
    }
}
.cp-milestone-card:hover {
    border-color: var(--color-primary);
}
.cp-milestone-card.is-active {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    box-shadow: var(--shadow-md);
}
.cp-milestone-card:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.cp-milestone-year {
    display: inline-block;
    font-family: var(--font-display);
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-bottom: 0.65rem;
}
.cp-milestone-card.is-active .cp-milestone-year {
    color: var(--color-on-primary-container);
}
.cp-milestone-title {
    margin: 0 0 0.65rem;
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--color-text-heading);
    line-height: 1.3;
}
.cp-milestone-desc {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}
.cp-milestone-detail {
    margin-top: 1.25rem;
    padding: 1.25rem 1.5rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border);
    background-color: var(--color-surface-sunken);
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}
@media (min-width: 768px) {
    .cp-milestone-detail {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
}
.cp-milestone-detail-text {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}
.cp-milestone-detail-text strong {
    color: var(--color-text-heading);
}

/* 6. CTA Section */
.cp-cta {
    background-color: var(--color-primary);
    padding: clamp(3.5rem, 6vw, 5rem) 0;
    text-align: center;
    color: #ffffff;
}
.cp-cta-title {
    margin: 0 0 0.85rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.5rem);
    font-weight: 800;
    color: #ffffff;
}
.cp-cta-desc {
    margin: 0 auto 2rem;
    max-width: 40rem;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.92);
}
.cp-cta-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
}

@media (prefers-reduced-motion: reduce) {
    .cp-btn-primary,
    .cp-btn-outline,
    .cp-nav-btn,
    .cp-milestone-card {
        transition: none;
    }
}
</style>

<main id="main-content" class="cp-page-wrapper">

    <!-- 1. Hero Section -->
    <section class="cp-hero" aria-labelledby="cp-hero-title">
        <div class="cp-hero-media">
            <img
                src="<?php echo esc_url($company['hero_bg_image']); ?>"
                alt="Kantor Pusat Iida Group Holdings Co.,Ltd. di Musashino-shi, Tokyo"
                width="953"
                height="863"
                fetchpriority="high"
                decoding="sync"
            />
        </div>
        <div class="cp-hero-scrim" aria-hidden="true"></div>
        <div class="cp-container">
            <div class="cp-hero-inner">
                <nav class="cp-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span class="separator" aria-hidden="true">/</span>
                    <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>">About Us</a>
                    <span class="separator" aria-hidden="true">/</span>
                    <span class="current" aria-current="page">Company Profile</span>
                </nav>

                <span class="cp-hero-badge"><?php echo esc_html($company['hero_badge']); ?></span>
                <h1 id="cp-hero-title" class="cp-hero-title"><?php echo esc_html($company['hero_title']); ?></h1>
                <p class="cp-hero-subtitle"><?php echo esc_html($company['hero_subtitle']); ?></p>
                <div class="cp-hero-actions">
                    <?php if (!empty($company['hero_btn1_text']) && !empty($company['hero_btn1_link'])) : ?>
                        <a href="<?php echo esc_url(home_url($company['hero_btn1_link'])); ?>" class="cp-btn-primary">
                            <?php echo esc_html($company['hero_btn1_text']); ?>
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($company['hero_btn2_text']) && !empty($company['hero_btn2_link'])) : ?>
                        <a href="<?php echo esc_url(home_url($company['hero_btn2_link'])); ?>" class="cp-btn-outline">
                            <?php echo esc_html($company['hero_btn2_text']); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="cp-btn-outline">
                        Unduh PDF Nov 2023
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Foundation & Corporate Identity -->
    <section class="cp-section" aria-labelledby="cp-about-title">
        <div class="cp-container">
            <div class="cp-about-grid">
                <div>
                    <span class="cp-eyebrow"><?php echo esc_html($company['about_badge']); ?></span>
                    <h2 id="cp-about-title" class="cp-heading"><?php echo esc_html($company['about_title']); ?></h2>
                    <div class="cp-prose">
                        <p><?php echo esc_html($company['about_desc1']); ?></p>
                        <p><?php echo esc_html($company['about_desc2']); ?></p>
                    </div>
                    <div class="cp-stats-row">
                        <div class="cp-stat-box">
                            <div class="cp-stat-val"><?php echo esc_html($company['about_stat1_val']); ?></div>
                            <div class="cp-stat-lbl"><?php echo esc_html($company['about_stat1_lbl']); ?></div>
                        </div>
                        <div class="cp-stat-box cp-stat-box--accent">
                            <div class="cp-stat-val"><?php echo esc_html($company['about_stat2_val']); ?></div>
                            <div class="cp-stat-lbl"><?php echo esc_html($company['about_stat2_lbl']); ?></div>
                        </div>
                    </div>
                </div>

                <div class="cp-media-wrap">
                    <div class="cp-media-frame">
                        <img
                            src="<?php echo esc_url($company['about_image']); ?>"
                            alt="Kawasan hunian PT. Perumnas Iida Group di Indonesia"
                            width="1218"
                            height="994"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <?php if (!empty($company['about_overlay_title']) && !empty($company['about_overlay_lbl'])) : ?>
                        <div class="cp-overlay-card">
                            <div class="cp-overlay-title"><?php echo esc_html($company['about_overlay_title']); ?></div>
                            <p class="cp-overlay-lbl"><?php echo esc_html($company['about_overlay_lbl']); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Official Corporate Fact Sheets (PDF p.3 & p.7) -->
            <div class="cp-entities-grid" aria-label="Identitas Perusahaan Resmi">
                <article class="cp-entity-card">
                    <h3 class="cp-entity-title">Iida Group Holdings Co.,Ltd. (Jepang)</h3>
                    <dl class="cp-dl">
                        <div class="cp-dl-row">
                            <dt>Nama Perusahaan</dt>
                            <dd>Iida Group Holdings Co.,Ltd.</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Tanggal Berdiri</dt>
                            <dd>1 November 2013 (Musashino-shi, Tokyo, Jepang)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Perwakilan</dt>
                            <dd>Masashi Kanei (President &amp; Representative Director)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Jumlah Karyawan</dt>
                            <dd>13.353 Orang (Per 31 Maret 2023, seluruh grup)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>6 Anak Perusahaan</dt>
                            <dd>Hajime Construction, Iida Sangyo, Touei Housing, Tact Home, Arnest One, dan ID Home</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Situs Resmi</dt>
                            <dd><a href="https://www.ighd.co.jp/en/" target="_blank" rel="noopener noreferrer">https://www.ighd.co.jp/en/</a></dd>
                        </div>
                    </dl>
                </article>

                <article class="cp-entity-card">
                    <h3 class="cp-entity-title">PT. Perumnas Iida Group (Indonesia)</h3>
                    <dl class="cp-dl">
                        <div class="cp-dl-row">
                            <dt>Nama Perusahaan</dt>
                            <dd>PT. Perumnas Iida Group</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Tahun Berdiri</dt>
                            <dd>2017 (Grup masuk Indonesia: 2016 via PT. Iida Group Holdings)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Presiden Direktur</dt>
                            <dd>Kenichiro Watanabe</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Pemegang Saham</dt>
                            <dd>Iida Sangyo Co.,Ltd. (93%) &amp; PT. Propernas Griya Utama (7%, anak usaha Perum Perumnas)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Anak Perusahaan</dt>
                            <dd>PT. Abdiluhur Kawuloalit (99,99% PT. Perumnas Iida Group &amp; 0,01% Iida Sangyo)</dd>
                        </div>
                        <div class="cp-dl-row">
                            <dt>Alamat Kantor</dt>
                            <dd>Jl. Caringin Raya, RT.010/RW.002, Kota Bekasi, Kec. Rawalumbu, Kota Bekasi, Jawa Barat (<a href="https://www.perumnas-iida.com/" target="_blank" rel="noopener noreferrer">perumnas-iida.com</a>)</dd>
                        </div>
                    </dl>
                </article>
            </div>
        </div>
    </section>

    <!-- 3. Executive Leadership Quote -->
    <section class="cp-leader-section" aria-labelledby="cp-leader-heading">
        <div class="cp-container">
            <div class="cp-leader-grid">
                <div class="cp-leader-visual">
                    <div class="cp-leader-frame">
                        <img
                            src="<?php echo esc_url($company['leader_image']); ?>"
                            alt="<?php echo esc_attr($company['leader_name']); ?>"
                            width="953"
                            height="863"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                    <div class="cp-leader-badge">
                        <h3 class="cp-leader-name"><?php echo esc_html($company['leader_name']); ?></h3>
                        <p class="cp-leader-role"><?php echo esc_html($company['leader_title']); ?></p>
                    </div>
                </div>

                <div>
                    <span class="cp-leader-eyebrow">Arah &amp; Komitmen Kepemimpinan</span>
                    <h2 id="cp-leader-heading" class="cp-leader-quote">&ldquo;<?php echo esc_html($company['leader_quote']); ?>&rdquo;</h2>
                    <p class="cp-leader-desc"><?php echo esc_html($company['leader_quote_desc']); ?></p>
                    <div class="cp-leader-source">
                        <span class="cp-leader-line" aria-hidden="true"></span>
                        <span><?php echo esc_html($company['leader_quote_source']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Vision, Mission & Pillars -->
    <section class="cp-section cp-section--sunken" aria-labelledby="cp-framework-title">
        <div class="cp-container">
            <div class="cp-center-head">
                <span class="cp-eyebrow">Landasan Korporasi</span>
                <h2 id="cp-framework-title" class="cp-heading"><?php echo esc_html($company['framework_title']); ?></h2>
                <p class="cp-prose"><?php echo esc_html($company['framework_desc']); ?></p>
            </div>

            <div class="cp-vm-grid">
                <article class="cp-vm-card">
                    <div class="cp-vm-icon" aria-hidden="true">
                        <span class="material-symbols-outlined"><?php echo esc_html($company['vision_icon']); ?></span>
                    </div>
                    <h3 class="cp-vm-title"><?php echo esc_html($company['vision_title']); ?></h3>
                    <p class="cp-vm-desc"><?php echo esc_html($company['vision_desc']); ?></p>
                </article>

                <article class="cp-vm-card">
                    <div class="cp-vm-icon" aria-hidden="true">
                        <span class="material-symbols-outlined"><?php echo esc_html($company['mission_icon']); ?></span>
                    </div>
                    <h3 class="cp-vm-title"><?php echo esc_html($company['mission_title']); ?></h3>
                    <p class="cp-vm-desc"><?php echo esc_html($company['mission_desc']); ?></p>
                </article>
            </div>

            <div class="cp-values-grid" aria-label="Nilai dan Ciri Utama Perusahaan">
                <div class="cp-value-item">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($company['value1_icon']); ?></span>
                    <span class="cp-value-label"><?php echo esc_html($company['value1_title']); ?></span>
                </div>
                <div class="cp-value-item">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($company['value2_icon']); ?></span>
                    <span class="cp-value-label"><?php echo esc_html($company['value2_title']); ?></span>
                </div>
                <div class="cp-value-item">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($company['value3_icon']); ?></span>
                    <span class="cp-value-label"><?php echo esc_html($company['value3_title']); ?></span>
                </div>
                <div class="cp-value-item">
                    <span class="material-symbols-outlined" aria-hidden="true"><?php echo esc_html($company['value4_icon']); ?></span>
                    <span class="cp-value-label"><?php echo esc_html($company['value4_title']); ?></span>
                </div>
            </div>

            <div class="cp-section-link-wrap">
                <a href="<?php echo esc_url(home_url('/about-us/vision-mission/')); ?>" class="cp-btn-dark">
                    Pelajari Visi, Misi &amp; Standar HPIS
                </a>
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>" class="cp-btn-secondary">
                    Lihat Struktur Direksi &amp; Komisaris
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Interactive Milestones Timeline -->
    <section class="cp-section" aria-labelledby="cp-milestones-title">
        <div class="cp-container">
            <div class="cp-milestone-head">
                <div>
                    <span class="cp-eyebrow">Rekam Jejak Perusahaan</span>
                    <h2 id="cp-milestones-title" class="cp-heading">Tonggak Sejarah Utama</h2>
                </div>
                <div class="cp-milestone-controls">
                    <button
                        type="button"
                        class="cp-nav-btn"
                        id="milestone-prev"
                        aria-label="Tidak ada milestone sebelumnya"
                        disabled
                    >
                        <span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
                    </button>
                    <span class="cp-nav-counter" id="milestone-counter" aria-live="polite">
                        1 / <?php echo esc_html((string) count($milestones)); ?>
                    </span>
                    <button
                        type="button"
                        class="cp-nav-btn"
                        id="milestone-next"
                        aria-label="Milestone berikutnya"
                    >
                        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                    </button>
                    <a href="<?php echo esc_url(home_url('/about-us/milestone/')); ?>" class="cp-btn-secondary">
                        Halaman Milestone Lengkap
                    </a>
                </div>
            </div>

            <?php if (!empty($milestones)) : ?>
                <div class="cp-milestone-track" id="milestone-track" role="tablist" aria-label="Daftar tonggak sejarah perusahaan">
                    <?php foreach ($milestones as $idx => $m) : ?>
                        <button
                            type="button"
                            class="cp-milestone-card<?php echo $idx === 0 ? ' is-active' : ''; ?>"
                            role="tab"
                            aria-selected="<?php echo $idx === 0 ? 'true' : 'false'; ?>"
                            data-index="<?php echo esc_attr((string) $idx); ?>"
                            data-year="<?php echo esc_attr($m['year']); ?>"
                            data-title="<?php echo esc_attr($m['title']); ?>"
                            data-desc="<?php echo esc_attr($m['description']); ?>"
                        >
                            <span class="cp-milestone-year"><?php echo esc_html($m['year']); ?></span>
                            <h3 class="cp-milestone-title"><?php echo esc_html($m['title']); ?></h3>
                            <p class="cp-milestone-desc"><?php echo esc_html($m['description']); ?></p>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="cp-milestone-detail" aria-live="polite">
                    <p class="cp-milestone-detail-text" id="milestone-active-summary">
                        <strong><?php echo esc_html($milestones[0]['year'] . ' : ' . $milestones[0]['title']); ?></strong> &middot;
                        <?php echo esc_html($milestones[0]['description']); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/about-us/milestone/')); ?>" class="cp-btn-dark">
                        Jelajahi Detail Milestone
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 6. CTA Section -->
    <section class="cp-cta" aria-labelledby="cp-cta-title">
        <div class="cp-container">
            <h2 id="cp-cta-title" class="cp-cta-title">Hubungi Tim PT. Perumnas Iida Group</h2>
            <p class="cp-cta-desc">
                Konsultasikan kebutuhan proyek perumahan, spesifikasi material konstruksi IG SCB, atau peluang kerja sama strategis bersama kami di Bekasi dan Bogor.
            </p>
            <div class="cp-cta-actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cp-btn-primary">
                    Hubungi Kami
                    <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                </a>
                <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="cp-btn-outline">
                    Unduh Company Profile (PDF)
                </a>
            </div>
        </div>
    </section>

</main>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
document.addEventListener('DOMContentLoaded', function () {
    var track    = document.getElementById('milestone-track');
    var cards    = Array.prototype.slice.call(document.querySelectorAll('.cp-milestone-card'));
    var prevBtn  = document.getElementById('milestone-prev');
    var nextBtn  = document.getElementById('milestone-next');
    var counter  = document.getElementById('milestone-counter');
    var summary  = document.getElementById('milestone-active-summary');

    if (!cards.length) {
        return;
    }

    var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var activeIndex    = 0;

    function selectMilestone(index, shouldScroll) {
        if (index < 0 || index >= cards.length) {
            return;
        }
        activeIndex = index;

        cards.forEach(function (card, i) {
            var isCurrent = (i === activeIndex);
            card.classList.toggle('is-active', isCurrent);
            card.setAttribute('aria-selected', isCurrent ? 'true' : 'false');
        });

        var activeCard = cards[activeIndex];

        if (shouldScroll && track && activeCard) {
            var targetLeft = activeCard.offsetLeft - track.offsetLeft;
            track.scrollTo({
                left: Math.max(0, targetLeft),
                behavior: prefersReduced ? 'auto' : 'smooth'
            });
        }

        if (counter) {
            counter.textContent = (activeIndex + 1) + ' / ' + cards.length;
        }

        if (summary && activeCard) {
            var year  = activeCard.getAttribute('data-year') || '';
            var title = activeCard.getAttribute('data-title') || '';
            var desc  = activeCard.getAttribute('data-desc') || '';
            summary.textContent = '';
            var strong = document.createElement('strong');
            strong.textContent = year + ' : ' + title;
            summary.appendChild(strong);
            summary.appendChild(document.createTextNode(' \u00B7 ' + desc));
        }

        if (prevBtn) {
            var atStart = (activeIndex === 0);
            prevBtn.disabled = atStart;
            if (atStart) {
                prevBtn.setAttribute('aria-label', 'Tidak ada milestone sebelumnya');
            } else {
                var prevYear = cards[activeIndex - 1].getAttribute('data-year') || '';
                prevBtn.setAttribute('aria-label', 'Milestone sebelumnya: ' + prevYear);
            }
        }

        if (nextBtn) {
            var atEnd = (activeIndex === cards.length - 1);
            nextBtn.disabled = atEnd;
            if (atEnd) {
                nextBtn.setAttribute('aria-label', 'Sudah di milestone terakhir');
            } else {
                var nextYear = cards[activeIndex + 1].getAttribute('data-year') || '';
                nextBtn.setAttribute('aria-label', 'Milestone berikutnya: ' + nextYear);
            }
        }
    }

    cards.forEach(function (card, idx) {
        card.addEventListener('click', function () {
            selectMilestone(idx, true);
        });
        card.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight') {
                e.preventDefault();
                var nextIdx = Math.min(cards.length - 1, idx + 1);
                selectMilestone(nextIdx, true);
                cards[nextIdx].focus();
            } else if (e.key === 'ArrowLeft') {
                e.preventDefault();
                var prevIdx = Math.max(0, idx - 1);
                selectMilestone(prevIdx, true);
                cards[prevIdx].focus();
            }
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            selectMilestone(activeIndex - 1, true);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            selectMilestone(activeIndex + 1, true);
        });
    }

    selectMilestone(0, false);
});
</script>

<?php
get_footer();
?>
