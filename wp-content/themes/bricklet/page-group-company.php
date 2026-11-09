<?php
/**
 * Template Name: Group Company
 * Description: Jaringan Perusahaan Iida Group Holdings (Jepang & Indonesia), 6 Pengembang & Brand Perumahan Terpadu, Struktur Kepemilikan PT. Perumnas Iida Group, dan BOC/BOD (Nov 2023).
 */
get_header();

global $wpdb;
$theme_uri  = get_template_directory_uri();
$pdf_img    = $theme_uri . '/images/pdf/';

$table_group    = $wpdb->prefix . 'igh_group_company';
$table_entities = $wpdb->prefix . 'igh_group_company_entities';

$group_row = $wpdb->get_row( "SELECT * FROM $table_group WHERE id = 1", ARRAY_A );
$group_defaults = array(
    'hero_bg_image'  => $pdf_img . 'iida-hq-tokyo.webp',
    'hero_badge'     => 'STRUKTUR ORGANISASI GRUP · NOV 2023',
    'hero_title'     => 'Jaringan Bisnis Iida Group Holdings',
    'hero_subtitle'  => 'Menyatukan 6 perusahaan pengembang utama dan entitas jasa/material terkonsolidasi di Jepang dengan 4 anak perusahaan operasional di Indonesia sejak tahun 2016.',
    'grid_title'     => '6 Perusahaan & Brand Perumahan Utama di Jepang',
    'grid_desc'      => 'Keenam anak perusahaan langsung Iida Group Holdings Co.,Ltd. beserta lini merek hunian tapak unggulannya di Jepang dan keterkaitannya dengan pasar Indonesia.',
    'grid_side_text' => '6 ENTITAS & BRAND UTAMA',
    'collab_image'   => $pdf_img . 'botania-2-residence.webp',
    'collab_stat_val'=> '93% / 7%',
    'collab_stat_lbl'=> 'Iida Sangyo & Propernas',
    'collab_badge'   => 'Perusahaan Patungan · Berdiri 2017',
    'collab_title'   => 'PT. Perumnas Iida Group',
    'collab_desc'    => 'Joint venture antara Iida Sangyo Co.,Ltd. (93%, anak usaha Iida Group Holdings) dan PT. Propernas Griya Utama (7%, anak usaha Perum Perumnas), dengan anak perusahaan PT. Abdiluhur Kawuloalit (99,99%).',
    'collab_f1_title'=> 'Alamat Kantor Resmi Bekasi',
    'collab_f1_desc' => 'Jl. Caringin Raya, RT.010/RW.002, Rawalumbu, Kota Bekasi, Jawa Barat.',
    'collab_f2_title'=> 'Entitas Operasional Indonesia (Sejak 2016)',
    'collab_f2_desc' => 'PT. Iida Group Holdings membawahi PT. Perumnas Iida Group, PT. Hajime Indonesia Jaya, PT. Ione Home Indonesia, dan PT. Tact Home Indonesia.',
    'collab_btn_text'=> 'Lihat Proyek Perumahan',
    'collab_btn_link'=> '/development/',
    'stat1_val'      => '13.353',
    'stat1_lbl'      => 'Karyawan Grup (per 31 Mar 2023)',
    'stat2_val'      => '400+',
    'stat2_lbl'      => 'Cabang Penjualan di Jepang',
    'stat3_val'      => '30%',
    'stat3_lbl'      => 'Pangsa Pasar Jepang (±46.000 rumah/tahun)',
    'stat4_val'      => '±1.700',
    'stat4_lbl'      => 'Unit Kondominium / Tahun',
);

$group = array();
foreach ( $group_defaults as $key => $fallback ) {
    $val = ( is_array( $group_row ) && isset( $group_row[ $key ] ) && trim( (string) $group_row[ $key ] ) !== '' )
        ? $group_row[ $key ]
        : $fallback;
    if ( stripos( (string) $val, 'unsplash.com' ) !== false ) {
        $val = $fallback;
    }
    $group[ $key ] = $val;
}

$entities = $wpdb->get_results( "SELECT * FROM $table_entities ORDER BY sort_order ASC, name ASC", ARRAY_A );
if ( empty( $entities ) ) {
    $entities = array(
        array(
            'name'        => 'Hajime Construction Co., Ltd.',
            'description' => 'Perusahaan inti di balik merek rumah tapak Livele Garden dan kondominium PRESIS; mengoperasikan cabang Indonesia melalui PT. Hajime Indonesia Jaya.',
            'link_text'   => 'Website Resmi',
            'link_url'    => 'https://www.hajime-kensetsu.co.jp/en/',
        ),
        array(
            'name'        => 'Iida Sangyo Co., Ltd.',
            'description' => 'Pengembang merek Heartful-Town dan kondominium Century sekaligus pemegang 93% saham usaha patungan PT. Perumnas Iida Group di Indonesia.',
            'link_text'   => 'Website Resmi',
            'link_url'    => 'https://www.iidasangyo.co.jp/iida_en/',
        ),
        array(
            'name'        => 'Touei Housing Corporation',
            'description' => 'Pengembang perumahan dengan merek rumah tapak unggulan Blooming Garden beserta jaringan anak usaha properti dan konstruksi di Jepang.',
            'link_text'   => 'Profil di IGHD',
            'link_url'    => 'https://www.ighd.co.jp/en/corporate/group/touei_housing.html',
        ),
        array(
            'name'        => 'Tact Home Co., Ltd.',
            'description' => 'Pengembang merek rumah tapak GRAFARE dengan entitas operasional di Indonesia melalui PT. Tact Home Indonesia.',
            'link_text'   => 'Situs Tact Home Indonesia',
            'link_url'    => 'https://www.tacthome.co.id/',
        ),
        array(
            'name'        => 'Arnest One Corporation',
            'description' => 'Pengembang merek rumah tapak Cradle garden dan kondominium SUNCRADLE di bawah grup Iida Group Holdings Co.,Ltd.',
            'link_text'   => 'Profil di IGHD',
            'link_url'    => 'https://www.ighd.co.jp/en/corporate/group/arnest_one.html',
        ),
        array(
            'name'        => 'ID Home Co., Ltd.',
            'description' => 'Pengembang merek rumah tapak LIGNAGE dan layanan konstruksi hunian dalam ekosistem Iida Group Holdings Co.,Ltd.',
            'link_text'   => 'Website Resmi',
            'link_url'    => 'https://idhome.co.jp/recruit-en/about',
        ),
    );
}

/* Data terpadu brand perumahan & afiliasi PDF hal. 4 & 16-18 per perusahaan inti */
$entity_affiliates = array(
    'hajime' => array(
        'brand_title' => 'Livele Garden',
        'condo'       => 'Kondominium PRESIS',
        'image'       => 'brand-livele-garden.webp',
        'alt'         => 'Perumahan brand Livele Garden oleh Hajime Construction Co., Ltd.',
        'w'           => 745,
        'h'           => 487,
        'affiliates'  => 'Jutakujohokan, Jutakujohokan Financial Service, Living Corporation, PT. Hajime Indonesia Jaya',
    ),
    'iida-sangyo' => array(
        'brand_title' => 'Heartful-Town',
        'condo'       => 'Kondominium Century',
        'image'       => 'brand-heartful-town.webp',
        'alt'         => 'Perumahan brand Heartful-Town oleh Iida Sangyo Co., Ltd.',
        'w'           => 748,
        'h'           => 489,
        'affiliates'  => 'Family Life Service, Paradise Resort, Universal Home',
    ),
    'touei' => array(
        'brand_title' => 'Blooming Garden',
        'condo'       => '',
        'image'       => 'brand-blooming-garden.webp',
        'alt'         => 'Perumahan brand Blooming Garden oleh Touei Housing Corporation',
        'w'           => 763,
        'h'           => 473,
        'affiliates'  => 'Toei Home Service, Toei Land, Daiichi Kougyou, Daiichi Kensho, Geo Rafter',
    ),
    'tact-home' => array(
        'brand_title' => 'GRAFARE',
        'condo'       => '',
        'image'       => 'brand-grafare.webp',
        'alt'         => 'Perumahan brand GRAFARE oleh Tact Home Co., Ltd.',
        'w'           => 764,
        'h'           => 468,
        'affiliates'  => 'Solidone, T-Around, PT. Tact Home Indonesia',
    ),
    'arnest-one' => array(
        'brand_title' => 'Cradle garden',
        'condo'       => 'Kondominium SUNCRADLE',
        'image'       => 'brand-cradle-garden.webp',
        'alt'         => 'Perumahan brand Cradle garden oleh Arnest One Corporation',
        'w'           => 749,
        'h'           => 469,
        'affiliates'  => 'Aone Plus',
    ),
    'id-home' => array(
        'brand_title' => 'LIGNAGE',
        'condo'       => '',
        'image'       => 'brand-lignage.webp',
        'alt'         => 'Perumahan brand LIGNAGE oleh ID Home Co., Ltd.',
        'w'           => 748,
        'h'           => 469,
        'affiliates'  => 'Pengembang rumah tapak terintegrasi grup di Jepang',
    ),
);

$legacy_link_labels = array(
    'JAPAN HQ',
    'ESTABLISHED 1977',
    'URBAN DESIGN',
    'FAST-TRACK CONST.',
    'TECH R&D',
    'SERVICE & CARE',
);
?>

<style type="text/css">
    /* ============================================================
       GROUP NETWORK PAGE SCOPED STYLES
       Tokens inherited from header.php (:root).
       ============================================================ */
    .gc-main {
        background-color: var(--color-background);
        color: var(--color-text-body);
    }

    .gc-sec {
        padding-top: clamp(48px, 7vw, 96px);
        padding-bottom: clamp(48px, 7vw, 96px);
    }
    .gc-sec--light  { background-color: var(--color-surface); }
    .gc-sec--sunken { background-color: var(--color-surface-sunken); }
    .gc-sec--dark   {
        background-color: var(--color-deep-navy);
        color: #ffffff;
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
    }

    .gc-head {
        max-width: 68ch;
        margin-bottom: clamp(28px, 4vw, 48px);
    }
    .gc-kicker {
        margin: 0 0 10px;
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .gc-kicker--dark { color: var(--color-action-cyan); }

    .gc-title {
        margin: 0 0 14px;
        font-family: var(--font-display);
        font-size: clamp(1.625rem, 3.2vw, 2.5rem);
        font-weight: 700;
        line-height: 1.14;
        letter-spacing: -0.02em;
        color: var(--color-text-heading);
        text-wrap: balance;
    }
    .gc-title--dark { color: #ffffff; }

    .gc-lede {
        margin: 0;
        font-size: clamp(1rem, 1.3vw, 1.125rem);
        line-height: 1.65;
        color: var(--color-text-body);
        text-wrap: pretty;
    }
    .gc-lede--dark { color: rgba(255, 255, 255, 0.88); }

    /* Hero + Metrics Strip */
    .gc-hero {
        position: relative;
        isolation: isolate;
        background-color: var(--color-deep-navy);
        color: #ffffff;
        overflow: hidden;
    }
    .gc-hero-bg {
        position: absolute;
        inset: 0;
        z-index: -2;
    }
    .gc-hero-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.35;
    }
    .gc-hero-scrim {
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(105deg, rgba(10, 31, 44, 0.96) 0%, rgba(10, 31, 44, 0.82) 55%, rgba(10, 31, 44, 0.68) 100%);
    }
    .gc-hero-inner {
        padding-top: clamp(48px, 7vw, 88px);
        padding-bottom: clamp(40px, 5vw, 64px);
    }
    .gc-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        margin: 0 0 20px;
        font-size: var(--text-xs);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #cbd5e1;
    }
    .gc-breadcrumb a {
        display: inline-flex;
        align-items: center;
        min-height: 44px;
        color: #cbd5e1;
        text-decoration: none;
        transition: color var(--dur-fast) var(--ease-in-out);
    }
    .gc-breadcrumb a:hover { color: #ffffff; }
    .gc-breadcrumb a:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
        border-radius: 4px;
    }
    .gc-breadcrumb-current { color: #ffffff; }

    .gc-hero-copy { max-width: 48rem; }
    .gc-hero-h1 {
        margin: 0 0 18px;
        font-family: var(--font-display);
        font-size: clamp(2rem, 4.4vw, 3.375rem);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -0.025em;
        color: #ffffff;
        text-wrap: balance;
    }
    .gc-hero-sub {
        margin: 0 0 28px;
        max-width: 44rem;
        font-size: clamp(1rem, 1.4vw, 1.125rem);
        line-height: 1.65;
        color: rgba(255, 255, 255, 0.88);
    }

    /* Buttons (min-height >= 44px) */
    .gc-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 11px 22px;
        border-radius: var(--radius-pill);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        text-decoration: none;
        border: 1px solid transparent;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    transform var(--dur-fast) var(--ease-spring);
    }
    .gc-btn:active { transform: scale(0.98); }
    .gc-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .gc-btn--light-solid {
        background-color: #ffffff;
        color: var(--color-deep-navy);
    }
    .gc-btn--light-solid:hover {
        background-color: var(--color-primary-container);
        color: var(--color-deep-navy);
    }
    .gc-btn--light-ghost {
        background-color: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.38);
        color: #ffffff;
    }
    .gc-btn--light-ghost:hover {
        background-color: rgba(255, 255, 255, 0.16);
        border-color: #ffffff;
    }
    .gc-btn--primary {
        background-color: var(--color-primary);
        color: #ffffff;
    }
    .gc-btn--primary:hover { background-color: var(--color-primary-strong); }
    .gc-btn--primary:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .gc-btn--outline {
        background-color: var(--color-surface);
        border-color: var(--color-border-strong);
        color: var(--color-text-heading);
    }
    .gc-btn--outline:hover {
        border-color: var(--color-primary);
        color: var(--color-primary);
        background-color: var(--color-primary-container);
    }
    .gc-btn--outline:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }

    .gc-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Key Metrics Band */
    .gc-metrics-band {
        border-top: 1px solid rgba(255, 255, 255, 0.14);
        background-color: rgba(10, 31, 44, 0.88);
    }
    .gc-metrics-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1px;
        margin: 0;
        background-color: rgba(255, 255, 255, 0.14);
    }
    @media (min-width: 560px) {
        .gc-metrics-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 960px) {
        .gc-metrics-grid { grid-template-columns: repeat(5, minmax(0, 1fr)); }
    }
    .gc-metric-cell {
        display: flex;
        flex-direction: column;
        padding: 20px 18px;
        background-color: var(--color-deep-navy);
    }
    .gc-metric-val {
        order: -1;
        margin: 0;
        font-family: var(--font-display);
        font-size: clamp(1.375rem, 2.2vw, 1.875rem);
        font-weight: 800;
        line-height: 1.15;
        color: #ffffff;
        font-variant-numeric: tabular-nums;
    }
    .gc-metric-lbl {
        margin: 6px 0 0;
        font-size: var(--text-xs);
        font-weight: 500;
        line-height: 1.45;
        color: #cbd5e1;
    }

    /* Section 2: Japan HQ Profile */
    .gc-hq-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: clamp(28px, 4vw, 56px);
        align-items: center;
    }
    .gc-hq-grid > *,
    .gc-entities-grid > *,
    .gc-id-grid > *,
    .gc-board-grid > * {
        min-width: 0;
    }
    @media (min-width: 920px) {
        .gc-hq-grid { grid-template-columns: 0.92fr 1.08fr; }
    }
    .gc-hq-media {
        margin: 0;
        padding: 12px;
        background-color: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
    }
    .gc-hq-media img {
        width: 100%;
        height: auto;
        border-radius: var(--radius-md);
        display: block;
    }
    .gc-hq-media figcaption {
        margin-top: 10px;
        padding: 0 4px;
        font-size: var(--text-xs);
        font-weight: 600;
        color: var(--color-text-muted);
    }
    .gc-facts-dl {
        margin: 22px 0 0;
        border-top: 1px solid var(--color-border);
    }
    .gc-fact-item {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4px;
        padding: 13px 0;
        border-bottom: 1px solid var(--color-border);
    }
    @media (min-width: 560px) {
        .gc-fact-item { grid-template-columns: 190px 1fr; gap: 16px; }
    }
    .gc-fact-item dt {
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--color-text-muted);
    }
    .gc-fact-item dd {
        margin: 0;
        font-size: var(--text-sm);
        font-weight: 600;
        line-height: 1.55;
        color: var(--color-text-heading);
    }
    .gc-biz-bullets {
        margin: 0;
        padding: 0 0 0 18px;
        font-weight: 500;
    }
    .gc-hq-actions {
        margin-top: 24px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Section 3: 6 Core Japanese Companies + Consolidated Material/Service Subsidiaries */
    .gc-section-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: clamp(24px, 3.5vw, 40px);
    }
    .gc-section-bar .gc-head { margin-bottom: 0; }
    .gc-side-tag {
        padding: 7px 14px;
        border-radius: var(--radius-pill);
        background-color: var(--color-primary-container);
        color: var(--color-on-primary-container);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .gc-entities-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 680px) {
        .gc-entities-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1080px) {
        .gc-entities-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .gc-entity-card {
        scroll-margin-top: 112px;
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: border-color var(--dur-base) var(--ease-in-out),
                    box-shadow var(--dur-base) var(--ease-in-out);
    }
    .gc-entity-card:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-sm);
    }
    .gc-entity-card.is-highlighted {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(0, 100, 145, 0.25);
    }
    .gc-entity-img {
        width: 100%;
        height: auto;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        display: block;
        background-color: var(--color-surface-sunken);
    }
    .gc-entity-content {
        padding: 20px 22px 22px;
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        gap: 12px;
    }
    .gc-entity-num {
        display: block;
        margin-bottom: 6px;
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        color: var(--color-text-muted);
        font-variant-numeric: tabular-nums;
    }
    .gc-entity-name {
        margin: 0 0 6px;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .gc-entity-brand {
        margin: 0;
        font-size: var(--text-sm);
        font-weight: 700;
        color: var(--color-primary-strong);
        line-height: 1.45;
    }
    .gc-entity-condo {
        color: var(--color-text-muted);
        font-weight: 500;
    }
    .gc-entity-desc {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }
    .gc-entity-meta {
        padding-top: 12px;
        border-top: 1px solid var(--color-border);
        font-size: var(--text-xs);
        line-height: 1.55;
        color: var(--color-text-muted);
    }
    .gc-entity-meta strong { color: var(--color-text-heading); }

    .gc-entity-foot {
        margin-top: auto;
        padding-top: 6px;
    }
    .gc-entity-link {
        display: inline-flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        min-height: 44px;
        padding: 10px 14px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--color-border-strong);
        background-color: var(--color-surface-sunken);
        color: var(--color-primary-strong);
        font-size: var(--text-xs);
        font-weight: 700;
        text-decoration: none;
        transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out);
    }
    .gc-entity-link:hover {
        background-color: var(--color-primary-container);
        border-color: var(--color-primary);
    }
    .gc-entity-link:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }

    /* Consolidated Service & Material Subsidiaries */
    .gc-subs-box {
        margin-top: clamp(32px, 5vw, 48px);
        padding: clamp(22px, 3vw, 32px);
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
    }
    .gc-subs-title {
        margin: 0 0 8px;
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .gc-subs-lede {
        margin: 0 0 20px;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }
    .gc-subs-grid {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }
    @media (min-width: 640px) {
        .gc-subs-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1024px) {
        .gc-subs-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .gc-sub-item {
        padding: 16px 18px;
        background-color: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
    }
    .gc-sub-name {
        display: block;
        font-family: var(--font-display);
        font-size: var(--text-base);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .gc-sub-role {
        display: block;
        margin-top: 4px;
        font-size: var(--text-xs);
        line-height: 1.5;
        color: var(--color-text-muted);
    }

    /* Section 4: Indonesia Structure, Ownership Chart, BOC/BOD */
    .gc-id-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: clamp(28px, 4vw, 52px);
        align-items: start;
    }
    @media (min-width: 960px) {
        .gc-id-grid { grid-template-columns: 0.95fr 1.05fr; }
    }
    .gc-collab-photo {
        position: relative;
        margin: 0;
        border-radius: var(--radius-lg);
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.16);
        background-color: rgba(255, 255, 255, 0.04);
    }
    .gc-collab-photo img {
        width: 100%;
        height: auto;
        display: block;
    }
    .gc-collab-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px 20px;
        background-color: var(--color-primary-container);
        color: var(--color-on-primary-container);
    }
    .gc-collab-ratio {
        font-family: var(--font-display);
        font-size: clamp(1.375rem, 2.4vw, 1.875rem);
        font-weight: 800;
        color: var(--color-deep-navy);
    }
    .gc-collab-ratio-lbl {
        font-size: var(--text-xs);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--color-on-primary-container);
    }

    .gc-id-holding {
        margin-top: 22px;
        padding: 20px 22px;
        border-radius: var(--radius-md);
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.16);
    }
    .gc-id-holding-kicker {
        margin: 0 0 6px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--color-action-cyan);
    }
    .gc-id-holding-name {
        margin: 0 0 12px;
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 700;
        color: #ffffff;
    }
    .gc-id-children {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }
    @media (min-width: 520px) {
        .gc-id-children { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .gc-id-children li {
        padding: 10px 12px;
        border-radius: var(--radius-sm);
        background-color: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.14);
        font-size: var(--text-sm);
        font-weight: 600;
        color: #ffffff;
    }

    /* Ownership Diagram Card */
    .gc-jv-panel {
        padding: clamp(22px, 3vw, 30px);
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: var(--radius-lg);
    }
    .gc-jv-badge {
        margin: 0 0 8px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-action-cyan);
    }
    .gc-jv-title {
        margin: 0 0 10px;
        font-size: clamp(1.5rem, 2.5vw, 2rem);
        font-weight: 700;
        color: #ffffff;
    }
    .gc-jv-desc {
        margin: 0 0 20px;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: #cbd5e1;
    }

    .gc-tree {
        display: grid;
        gap: 12px;
        margin: 0 0 22px;
    }
    .gc-tree-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    @media (min-width: 560px) {
        .gc-tree-row { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .gc-tree-node {
        padding: 14px 16px;
        border-radius: var(--radius-md);
        background-color: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    .gc-tree-parent {
        display: block;
        font-size: var(--text-xs);
        color: #cbd5e1;
    }
    .gc-tree-entity {
        display: block;
        margin-top: 3px;
        font-family: var(--font-display);
        font-size: var(--text-sm);
        font-weight: 700;
        color: #ffffff;
    }
    .gc-tree-share {
        display: inline-block;
        margin-top: 6px;
        padding: 2px 9px;
        border-radius: var(--radius-pill);
        background-color: #f0c44d;
        color: #0a1f2c;
        font-size: 0.75rem;
        font-weight: 800;
    }
    .gc-tree-core {
        padding: 16px 18px;
        border-radius: var(--radius-md);
        background-color: var(--color-primary);
        border: 1px solid rgba(255, 255, 255, 0.35);
        color: #ffffff;
    }
    .gc-tree-sub {
        padding: 14px 16px;
        border-radius: var(--radius-md);
        background-color: rgba(255, 255, 255, 0.04);
        border: 1px dashed rgba(255, 255, 255, 0.3);
        font-size: var(--text-sm);
        color: #ffffff;
    }
    .gc-tree-sub small {
        display: block;
        margin-top: 4px;
        font-size: var(--text-xs);
        color: #cbd5e1;
    }

    .gc-office-facts {
        margin: 0 0 22px;
        border-top: 1px solid rgba(255, 255, 255, 0.14);
    }
    .gc-office-row {
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
    }
    .gc-office-row dt {
        font-size: var(--text-xs);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--color-action-cyan);
    }
    .gc-office-row dd {
        margin: 4px 0 0;
        font-size: var(--text-sm);
        line-height: 1.55;
        color: #ffffff;
    }
    .gc-office-row dd a {
        display: inline-flex;
        align-items: center;
        min-height: 44px;
        padding: 6px 0;
        color: #ffffff;
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .gc-office-row dd a:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
        border-radius: 3px;
    }

    /* BOC & BOD Governance Strip */
    .gc-board-wrap {
        margin-top: clamp(32px, 5vw, 52px);
        padding-top: clamp(28px, 4vw, 40px);
        border-top: 1px solid rgba(255, 255, 255, 0.14);
    }
    .gc-board-head {
        margin-bottom: 20px;
    }
    .gc-board-head h3 {
        margin: 0 0 6px;
        font-size: clamp(1.25rem, 2.2vw, 1.625rem);
        font-weight: 700;
        color: #ffffff;
    }
    .gc-board-head p {
        margin: 0;
        font-size: var(--text-sm);
        color: #cbd5e1;
    }
    .gc-board-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 760px) {
        .gc-board-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .gc-board-card {
        padding: 22px 24px;
        border-radius: var(--radius-md);
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.14);
    }
    .gc-board-card h4 {
        margin: 0 0 14px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-action-cyan);
    }
    .gc-board-list {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        gap: 10px;
    }
    .gc-board-list li {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 6px 14px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: var(--text-sm);
    }
    .gc-board-list li:last-child {
        padding-bottom: 0;
        border-bottom: 0;
    }
    .gc-board-role { color: #cbd5e1; }
    .gc-board-name { font-weight: 700; color: #ffffff; }

    /* Brand Kondominium & CTA Strip inside Section 3 */
    .gc-condo-strip {
        margin-top: clamp(28px, 4vw, 40px);
        padding: 22px 24px;
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
    }
    .gc-condo-strip h3 {
        margin: 0 0 6px;
        font-size: var(--text-lg);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .gc-condo-strip p {
        margin: 0;
        max-width: 68ch;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }
    .gc-condo-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
</style>

<main id="main-content" class="gc-main">

    <!-- ============================================================
         HERO + GROUP METRICS
         ============================================================ -->
    <section class="gc-hero" aria-labelledby="gc-hero-title">
        <div class="gc-hero-bg">
            <img src="<?php echo esc_url( $group['hero_bg_image'] ); ?>"
                 alt="Kantor Pusat Iida Group Holdings Co.,Ltd. di Tokyo, Jepang"
                 width="953" height="863"
                 fetchpriority="high" decoding="sync">
        </div>
        <div class="gc-hero-scrim" aria-hidden="true"></div>

        <div class="max-w-container-max mx-auto px-margin-desktop-alt gc-hero-inner">
            <nav class="gc-breadcrumb" aria-label="Navigasi halaman">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <span aria-hidden="true">/</span>
                <span class="gc-breadcrumb-current" aria-current="page">Group Network</span>
            </nav>

            <div class="gc-hero-copy">
                <h1 id="gc-hero-title" class="gc-hero-h1">
                    <?php echo esc_html( $group['hero_title'] ); ?>
                </h1>
                <p class="gc-hero-sub">
                    <?php echo esc_html( $group['hero_subtitle'] ); ?>
                </p>
                <div class="gc-hero-actions">
                    <a href="#perusahaan-inti-jepang" class="gc-btn gc-btn--light-solid">6 Perusahaan &amp; Brand Utama</a>
                    <a href="#struktur-indonesia" class="gc-btn gc-btn--light-ghost">Struktur Grup di Indonesia</a>
                </div>
            </div>
        </div>

        <div class="gc-metrics-band">
            <div class="max-w-container-max mx-auto px-margin-desktop-alt">
                <dl class="gc-metrics-grid" aria-label="Metrik skala operasional grup">
                    <div class="gc-metric-cell">
                        <dt class="gc-metric-lbl"><?php echo esc_html( $group['stat1_lbl'] ); ?></dt>
                        <dd class="gc-metric-val"><?php echo esc_html( $group['stat1_val'] ); ?></dd>
                    </div>
                    <div class="gc-metric-cell">
                        <dt class="gc-metric-lbl"><?php echo esc_html( $group['stat2_lbl'] ); ?></dt>
                        <dd class="gc-metric-val"><?php echo esc_html( $group['stat2_val'] ); ?></dd>
                    </div>
                    <div class="gc-metric-cell">
                        <dt class="gc-metric-lbl"><?php echo esc_html( $group['stat3_lbl'] ); ?></dt>
                        <dd class="gc-metric-val"><?php echo esc_html( $group['stat3_val'] ); ?></dd>
                    </div>
                    <div class="gc-metric-cell">
                        <dt class="gc-metric-lbl"><?php echo esc_html( $group['stat4_lbl'] ); ?></dt>
                        <dd class="gc-metric-val"><?php echo esc_html( $group['stat4_val'] ); ?></dd>
                    </div>
                    <div class="gc-metric-cell">
                        <dt class="gc-metric-lbl">Struktur JV: <?php echo esc_html( $group['collab_stat_lbl'] ); ?></dt>
                        <dd class="gc-metric-val"><?php echo esc_html( $group['collab_stat_val'] ); ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- ============================================================
         PROFIL KANTOR PUSAT IIDA GROUP HOLDINGS (JEPANG, PDF p.3, 5, 6)
         ============================================================ -->
    <section class="gc-sec gc-sec--light" id="profil-ighd" aria-labelledby="gc-hq-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="gc-hq-grid">
                <figure class="gc-hq-media">
                    <img src="<?php echo esc_url( $pdf_img . 'iida-hq-tokyo.webp' ); ?>"
                         alt="Gedung Kantor Pusat Iida Group Holdings Co.,Ltd. di Musashino-shi, Tokyo, Jepang"
                         width="953" height="863" loading="lazy" decoding="async">
                    <figcaption>Kantor Pusat Iida Group Holdings Co.,Ltd., Musashino-shi, Tokyo, Jepang</figcaption>
                </figure>

                <div>
                    <p class="gc-kicker">Induk Usaha di Jepang</p>
                    <h2 id="gc-hq-title" class="gc-title">Iida Group Holdings Co.,Ltd.</h2>
                    <p class="gc-lede">
                        Berdiri pada <strong>1 November 2013</strong> melalui konsolidasi enam pengembang perumahan terkemuka di Jepang. Dengan slogan <em>&ldquo;Realizing a society where anyone can own a house&rdquo;</em>, 1 di antara 3 pembeli rumah tapak di Jepang memilih hunian Iida Group Holdings (pangsa pasar 30% atau &plusmn;46.000 rumah terjual setiap tahun melalui lebih dari 400 cabang penjualan).
                    </p>

                    <dl class="gc-facts-dl">
                        <div class="gc-fact-item">
                            <dt>Nama Perusahaan</dt>
                            <dd>Iida Group Holdings Co.,Ltd.</dd>
                        </div>
                        <div class="gc-fact-item">
                            <dt>Tanggal Berdiri</dt>
                            <dd>1 November 2013 &middot; Musashino-shi, Tokyo, Jepang</dd>
                        </div>
                        <div class="gc-fact-item">
                            <dt>Perwakilan Induk</dt>
                            <dd>Masashi Kanei (President &amp; Representative Director) &middot; Honorary Chairman: Kazuhiko Mori</dd>
                        </div>
                        <div class="gc-fact-item">
                            <dt>Jumlah Karyawan</dt>
                            <dd>13.353 Karyawan Grup (per 31 Maret 2023)</dd>
                        </div>
                        <div class="gc-fact-item">
                            <dt>Bidang Bisnis</dt>
                            <dd>
                                <ul class="gc-biz-bullets">
                                    <li>Built-for-sale detached houses</li>
                                    <li>Built-for-sale condominiums</li>
                                    <li>Contract construction</li>
                                    <li>Manajemen &amp; kendali anak perusahaan serta perusahaan grup terkait</li>
                                </ul>
                            </dd>
                        </div>
                    </dl>

                    <div class="gc-hq-actions">
                        <a href="https://www.ighd.co.jp/en/"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="gc-btn gc-btn--primary">
                            Situs Resmi Iida Group Holdings (ighd.co.jp)
                        </a>
                        <a href="<?php echo esc_url( home_url( '/company-profile/' ) ); ?>" class="gc-btn gc-btn--outline">
                            Profil Perusahaan &amp; Visi Misi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         6 PERUSAHAAN, BRAND PERUMAHAN & ANAK USAHA JEPANG (PDF p.3-4, 16-18)
         ============================================================ -->
    <section class="gc-sec gc-sec--sunken" id="perusahaan-inti-jepang" aria-labelledby="gc-entities-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="gc-section-bar">
                <header class="gc-head">
                    <p class="gc-kicker">Pengembang Inti &amp; Portofolio Merek di Jepang</p>
                    <h2 id="gc-entities-title" class="gc-title">
                        <?php echo esc_html( $group['grid_title'] ); ?>
                    </h2>
                    <p class="gc-lede">
                        <?php echo esc_html( $group['grid_desc'] ); ?>
                    </p>
                </header>
                <span class="gc-side-tag"><?php echo esc_html( $group['grid_side_text'] ); ?></span>
            </div>

            <div class="gc-entities-grid">
                <?php foreach ( $entities as $index => $e ) :
                    $entity_name = preg_replace( '/\bIO Home\b/i', 'ID Home', (string) $e['name'] );
                    $card_anchor = sanitize_title( $entity_name );
                    if ( stripos( $entity_name, 'iida sangyo' ) !== false ) {
                        $card_anchor = 'iida-sangyo';
                    } elseif ( stripos( $entity_name, 'hajime' ) !== false ) {
                        $card_anchor = 'hajime';
                    } elseif ( stripos( $entity_name, 'tact home' ) !== false ) {
                        $card_anchor = 'tact-home';
                    } elseif ( stripos( $entity_name, 'touei' ) !== false || stripos( $entity_name, 'toei' ) !== false ) {
                        $card_anchor = 'touei';
                    } elseif ( stripos( $entity_name, 'arnest' ) !== false ) {
                        $card_anchor = 'arnest-one';
                    } elseif ( stripos( $entity_name, 'id home' ) !== false ) {
                        $card_anchor = 'id-home';
                    }

                    $meta_info = isset( $entity_affiliates[ $card_anchor ] ) ? $entity_affiliates[ $card_anchor ] : null;

                    $raw_link_text = isset( $e['link_text'] ) ? trim( (string) $e['link_text'] ) : '';
                    $clean_label   = $raw_link_text;
                    if ( $clean_label === '' || in_array( strtoupper( $clean_label ), $legacy_link_labels, true ) ) {
                        $clean_label = ( ! empty( $e['link_url'] ) && strpos( $e['link_url'], 'ighd.co.jp' ) !== false )
                            ? 'Profil Resmi di IGHD'
                            : 'Kunjungi Situs Perusahaan';
                    }
                ?>
                    <article id="<?php echo esc_attr( $card_anchor ); ?>" class="gc-entity-card">
                        <?php if ( $meta_info && ! empty( $meta_info['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $pdf_img . $meta_info['image'] ); ?>"
                                 alt="<?php echo esc_attr( $meta_info['alt'] ); ?>"
                                 class="gc-entity-img"
                                 width="<?php echo esc_attr( (string) $meta_info['w'] ); ?>"
                                 height="<?php echo esc_attr( (string) $meta_info['h'] ); ?>"
                                 loading="lazy" decoding="async">
                        <?php endif; ?>

                        <div class="gc-entity-content">
                            <header>
                                <span class="gc-entity-num">0<?php echo (int) ( $index + 1 ); ?> &middot; Anak Perusahaan Langsung</span>
                                <h3 class="gc-entity-name"><?php echo esc_html( $entity_name ); ?></h3>
                                <?php if ( $meta_info && ! empty( $meta_info['brand_title'] ) ) : ?>
                                    <p class="gc-entity-brand">
                                        Brand Hunian: <?php echo esc_html( $meta_info['brand_title'] ); ?>
                                        <?php if ( ! empty( $meta_info['condo'] ) ) : ?>
                                            <span class="gc-entity-condo">&middot; <?php echo esc_html( $meta_info['condo'] ); ?></span>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            </header>

                            <p class="gc-entity-desc"><?php echo esc_html( $e['description'] ); ?></p>

                            <?php if ( $meta_info && ! empty( $meta_info['affiliates'] ) ) : ?>
                                <div class="gc-entity-meta">
                                    <strong>Entitas Terkait:</strong> <?php echo esc_html( $meta_info['affiliates'] ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( ! empty( $e['link_url'] ) ) : ?>
                                <footer class="gc-entity-foot">
                                    <a href="<?php echo esc_url( $e['link_url'] ); ?>"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="gc-entity-link">
                                        <span><?php echo esc_html( $clean_label ); ?></span>
                                        <span aria-hidden="true">&nearr;</span>
                                    </a>
                                </footer>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="gc-condo-strip">
                <div>
                    <h3>Brand Kondominium Iida Group (&plusmn;1.700 Unit/Tahun)</h3>
                    <p>
                        Melengkapi lini rumah tapak keenam pengembang inti, grup menghadirkan seri kondominium <strong>PRESIS</strong> (Hajime Construction), <strong>Century</strong> (Iida Sangyo), <strong>CENTURY</strong> (Paradise Resort), serta <strong>SUNCRADLE</strong> (Arnest One) di Saitama, Tokyo, dan kawasan metropolitan Jepang.
                    </p>
                </div>
                <div class="gc-condo-actions">
                    <a href="<?php echo esc_url( home_url( '/development/' ) ); ?>" class="gc-btn gc-btn--primary">
                        Lihat Portofolio Proyek
                    </a>
                    <a href="<?php echo esc_url( home_url( '/about-us/overview/' ) ); ?>" class="gc-btn gc-btn--outline">
                        Overview Perusahaan
                    </a>
                </div>
            </div>

            <!-- Anak Perusahaan Jasa & Material Terkonsolidasi -->
            <div class="gc-subs-box">
                <h3 class="gc-subs-title">Anak Perusahaan Jasa &amp; Material Terkonsolidasi di Jepang</h3>
                <p class="gc-subs-lede">
                    Selain enam pengembang utama, Iida Group Holdings membawahi jaringan perusahaan pengolahan kayu, manufaktur jendela, layanan transaksi properti, serta pengembangan kondominium dan resor untuk mendukung rantai pasok terintegrasi grup.
                </p>
                <ul class="gc-subs-grid">
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">First Wood Co., Ltd.</span>
                        <span class="gc-sub-role">Pengolahan kayu dan pengadaan material bangunan grup (membawahi First Ply Wood &amp; Aomori Ply Wood).</span>
                    </li>
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">Home Trade Center Co., Ltd.</span>
                        <span class="gc-sub-role">Layanan jasa transaksi dan perantara properti terintegrasi dalam jaringan penjualan grup di Jepang.</span>
                    </li>
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">I G Windows Co., Ltd.</span>
                        <span class="gc-sub-role">Manufaktur dan pengadaan komponen jendela serta bukaan hunian untuk efisiensi standar kualitas.</span>
                    </li>
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">First Plus Co., Ltd.</span>
                        <span class="gc-sub-role">Entitas layanan dukungan efisiensi bisnis, logistik, dan operasional grup.</span>
                    </li>
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">Orient Co., Ltd.</span>
                        <span class="gc-sub-role">Entitas pendukung penyediaan produk dan layanan konstruksi dalam konsolidasi Iida Group Holdings.</span>
                    </li>
                    <li class="gc-sub-item">
                        <span class="gc-sub-name">Paradise Resort Co., Ltd.</span>
                        <span class="gc-sub-role">Anak usaha di bawah Iida Sangyo Co.,Ltd.; pengembang kondominium seri Century dan pengelola resor Seawood Hotel Okinawa.</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ============================================================
         STRUKTUR GRUP DI INDONESIA, KEPEMILIKAN SAHAM & BOC/BOD (PDF p.4, 7-8)
         ============================================================ -->
    <section class="gc-sec gc-sec--dark" id="struktur-indonesia" aria-labelledby="gc-id-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="gc-head">
                <p class="gc-kicker gc-kicker--dark">Ekspansi Indonesia Sejak 2016</p>
                <h2 id="gc-id-title" class="gc-title gc-title--dark">
                    Struktur Grup di Indonesia &amp; <?php echo esc_html( $group['collab_title'] ); ?>
                </h2>
                <p class="gc-lede gc-lede--dark">
                    Memulai operasional di Indonesia pada tahun 2016 melalui pendirian <strong>PT. Iida Group Holdings</strong>, dilanjutkan dengan pembentukan 4 anak perusahaan operasional termasuk perusahaan patungan <strong>PT. Perumnas Iida Group</strong> pada tahun 2017 di Bekasi.
                </p>
            </header>

            <div class="gc-id-grid">
                <div>
                    <figure class="gc-collab-photo">
                        <img src="<?php echo esc_url( $group['collab_image'] ); ?>"
                             alt="Proyek Perumahan Botania 2 Residence hasil pengembangan PT. Perumnas Iida Group"
                             width="1218" height="994" loading="lazy" decoding="async">
                        <div class="gc-collab-bar">
                            <div>
                                <div class="gc-collab-ratio"><?php echo esc_html( $group['collab_stat_val'] ); ?></div>
                                <div class="gc-collab-ratio-lbl"><?php echo esc_html( $group['collab_stat_lbl'] ); ?></div>
                            </div>
                            <span>PT. Perumnas Iida Group &middot; Sejak 2017</span>
                        </div>
                    </figure>

                    <div class="gc-id-holding">
                        <p class="gc-id-holding-kicker">Holdings di Indonesia (Berdiri 2016)</p>
                        <p class="gc-id-holding-name">PT. Iida Group Holdings</p>
                        <ul class="gc-id-children" aria-label="Empat anak perusahaan di Indonesia">
                            <li>PT. Perumnas Iida Group</li>
                            <li>PT. Hajime Indonesia Jaya</li>
                            <li>PT. Ione Home Indonesia</li>
                            <li>PT. Tact Home Indonesia</li>
                        </ul>
                    </div>
                </div>

                <div class="gc-jv-panel">
                    <p class="gc-jv-badge"><?php echo esc_html( $group['collab_badge'] ); ?></p>
                    <h3 class="gc-jv-title"><?php echo esc_html( $group['collab_title'] ); ?></h3>
                    <p class="gc-jv-desc"><?php echo esc_html( $group['collab_desc'] ); ?></p>

                    <!-- Bagan Kepemilikan Saham (PDF p.8) -->
                    <div class="gc-tree" aria-label="Bagan kepemilikan saham PT. Perumnas Iida Group">
                        <div class="gc-tree-row">
                            <div class="gc-tree-node">
                                <span class="gc-tree-parent">Induk: Iida Group Holdings</span>
                                <span class="gc-tree-entity">Iida Sangyo Co.,Ltd.</span>
                                <span class="gc-tree-share">93% Saham</span>
                            </div>
                            <div class="gc-tree-node">
                                <span class="gc-tree-parent">Induk: Perum Perumnas</span>
                                <span class="gc-tree-entity">PT. Propernas Griya Utama</span>
                                <span class="gc-tree-share">7% Saham</span>
                            </div>
                        </div>

                        <div class="gc-tree-core">
                            <span class="gc-tree-parent" style="color: #e0f2fe;">Perusahaan Patungan (Joint Venture · Berdiri 2017)</span>
                            <span class="gc-tree-entity">PT. Perumnas Iida Group &middot; Properti Perumahan (Estate)</span>
                        </div>

                        <div class="gc-tree-sub">
                            <strong>Entitas Anak: PT. Abdiluhur Kawuloalit</strong>
                            <small>Kepemilikan: 99,99% oleh PT. Perumnas Iida Group &amp; 0,01% oleh Iida Sangyo Co.,Ltd.</small>
                        </div>
                    </div>

                    <dl class="gc-office-facts">
                        <div class="gc-office-row">
                            <dt><?php echo esc_html( $group['collab_f1_title'] ); ?></dt>
                            <dd><?php echo esc_html( $group['collab_f1_desc'] ); ?></dd>
                        </div>
                        <div class="gc-office-row">
                            <dt><?php echo esc_html( $group['collab_f2_title'] ); ?></dt>
                            <dd><?php echo esc_html( $group['collab_f2_desc'] ); ?></dd>
                        </div>
                        <div class="gc-office-row">
                            <dt>Situs Resmi Perusahaan Patungan</dt>
                            <dd>
                                <a href="https://www.perumnas-iida.com/" target="_blank" rel="noopener noreferrer">
                                    https://www.perumnas-iida.com/
                                </a>
                            </dd>
                        </div>
                    </dl>

                    <?php if ( ! empty( $group['collab_btn_text'] ) && ! empty( $group['collab_btn_link'] ) ) : ?>
                        <a href="<?php echo esc_url( home_url( $group['collab_btn_link'] ) ); ?>" class="gc-btn gc-btn--light-solid">
                            <?php echo esc_html( $group['collab_btn_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- BOC & BOD PT. Perumnas Iida Group (Per 24 Agustus 2023, PDF p.8) -->
            <div class="gc-board-wrap">
                <div class="gc-board-head">
                    <h3>Susunan Pengurus PT. Perumnas Iida Group</h3>
                    <p>Board of Commissioners (BOC) &amp; Board of Directors (BOD) resmi per tanggal 24 Agustus 2023.</p>
                </div>

                <div class="gc-board-grid">
                    <div class="gc-board-card">
                        <h4>Board of Commissioners (BOC)</h4>
                        <ul class="gc-board-list">
                            <li>
                                <span class="gc-board-role">Presiden Komisaris</span>
                                <span class="gc-board-name">Shigehiko Tsukiji</span>
                            </li>
                            <li>
                                <span class="gc-board-role">Komisaris</span>
                                <span class="gc-board-name">Jun Ishimaru</span>
                            </li>
                            <li>
                                <span class="gc-board-role">Komisaris</span>
                                <span class="gc-board-name">Hakiki Sudrajat</span>
                            </li>
                            <li>
                                <span class="gc-board-role">Komisaris</span>
                                <span class="gc-board-name">Aries Widiyatmoko</span>
                            </li>
                        </ul>
                    </div>

                    <div class="gc-board-card">
                        <h4>Board of Directors (BOD)</h4>
                        <ul class="gc-board-list">
                            <li>
                                <span class="gc-board-role">President Director</span>
                                <span class="gc-board-name">Kenichiro Watanabe</span>
                            </li>
                            <li>
                                <span class="gc-board-role">Chairman / Representative</span>
                                <span class="gc-board-name">Kazuhiko Mori</span>
                            </li>
                            <li>
                                <span class="gc-board-role">Director</span>
                                <span class="gc-board-name">Kenichi Mori</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
(function () {
    'use strict';

    var activeCard = null;
    var clearTimer = null;

    function highlightHashTarget() {
        if (!window.location.hash) {
            return;
        }
        var targetId = window.location.hash.substring(1);
        var targetEl = document.getElementById(targetId);
        if (!targetEl) {
            return;
        }
        if (activeCard) {
            activeCard.classList.remove('is-highlighted');
        }
        if (clearTimer) {
            window.clearTimeout(clearTimer);
        }
        var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        window.setTimeout(function () {
            targetEl.scrollIntoView({
                behavior: reduceMotion ? 'auto' : 'smooth',
                block: 'center'
            });
            targetEl.classList.add('is-highlighted');
            activeCard = targetEl;
            clearTimer = window.setTimeout(function () {
                targetEl.classList.remove('is-highlighted');
                if (activeCard === targetEl) {
                    activeCard = null;
                }
            }, 2500);
        }, 120);
    }

    document.addEventListener('DOMContentLoaded', highlightHashTarget);
    window.addEventListener('hashchange', highlightHashTarget);
})();
</script>

<?php
get_footer();
?>
