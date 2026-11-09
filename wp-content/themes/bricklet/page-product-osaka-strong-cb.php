<?php
/**
 * Template Name: Osaka Strong CB Detail
 *
 * Halaman produk IG Strong Concrete Block (IG SCB) dan Paving Block.
 * Data produk diambil dari tabel wp_osaka_products; narasi teknis, diagram,
 * spesifikasi, serta Paten IDP000069171 & SNI disinkronkan dengan Company Profile (Nov 2023).
 */
get_header();

global $wpdb;
$table_osaka    = $wpdb->prefix . 'osaka_products';
$osaka_products = $wpdb->get_results( "SELECT * FROM $table_osaka ORDER BY id ASC", ARRAY_A );

$concrete_blocks = array();
$paving_blocks   = array();

if ( ! empty( $osaka_products ) ) {
    foreach ( $osaka_products as $op ) {
        if ( strtolower( $op['type_group'] ) === 'concrete block' ) {
            $concrete_blocks[] = $op;
        } else {
            $paving_blocks[] = $op;
        }
    }
}

$theme_uri = get_template_directory_uri();
$pdf_img   = $theme_uri . '/images/pdf/';

$docs = array(
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-2.jpg', 'Gudang & Logistik Pabrik' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-3.jpg', 'Stasiun Pengolahan Bahan Baku' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-4.jpg', 'Konveyor Produksi Otomatis' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-5.jpg', 'Unit Batching Beton Utama' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/%E5%8E%9F%E6%9D%90%E6%96%99%E3%83%9B%E3%83%83%E3%83%91%E3%83%BC%EF%BC%86%E3%83%9B%E3%82%A4%E3%83%BC%E3%83%AB%E3%83%AD%E3%83%BC%E3%83%80%E3%83%BC.jpg', 'Hopper & Loader Bahan Baku' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/08/%E8%A3%BD%E9%80%A0%E6%A3%9F%EF%BC%86%E3%82%BB%E3%83%A1%E3%83%B3%E3%83%88%E3%82%B5%E3%82%A4%E3%83%AD.jpg', 'Silo Penyimpanan Semen' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6121.jpg', 'Kontrol Integrasi Mesin' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6117.jpg', 'Meja Operator Quality Control Otomatis' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6113.jpg', 'Tahap Curing Blok Beton' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6107.jpg', 'Paletisasi Blok Beton Jadi' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6104.jpg', 'Penataan & Pengemasan Blok Tahan Gempa' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6095.jpg', 'Area Penyimpanan Palet Terbuka' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6093.jpg', 'Laboratorium Pengujian Kualitas' ),
    array( 'https://www.ighd.co.id/wp-content/uploads/2023/12/bg-header-product.jpg', 'Ikhtisar Produk Concrete Block' ),
);

$certs = array(
    array(
        'src'   => $pdf_img . 'ig-scb-patent-idp000069171.webp',
        'alt'   => 'Sertifikat Paten Indonesia Nomor IDP000069171 untuk Iida Group Holdings Co., Ltd.',
        'title' => 'Sertifikat Paten Indonesia No. IDP000069171 (Diberikan 17 Juni 2020)',
        'w'     => 934,
        'h'     => 645,
        'badge' => 'Paten IDP000069171',
    ),
    array(
        'src'   => 'https://www.ighd.co.id/wp-content/uploads/2023/08/SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg',
        'alt'   => 'Sertifikat Label SNI PT Iida Group Holdings',
        'title' => 'Sertifikat Label SNI (Standar Nasional Indonesia) PT Iida Group Holdings',
        'w'     => 800,
        'h'     => 1100,
        'badge' => 'Sertifikasi SNI',
    ),
    array(
        'src'   => 'https://www.ighd.co.id/wp-content/uploads/2023/08/Lampiran-SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg',
        'alt'   => 'Lampiran Sertifikat SNI dan Daftar Spesifikasi Produk',
        'title' => 'Lampiran Sertifikat SNI: Daftar Spesifikasi Teknis',
        'w'     => 800,
        'h'     => 1100,
        'badge' => 'Lampiran SNI',
    ),
);

$tech_visuals = array(
    array(
        'src'     => $pdf_img . 'ig-scb-earthquake-diagram.webp',
        'alt'     => 'Diagram ketahanan gempa IG SCB hingga magnitudo lebih dari 8,0 dengan CB Interlocking Sistem dan sertifikasi SNI',
        'title'   => 'Diagram Keunggulan IG Strong Concrete Block (Uji Gempa > 8,0 & SNI)',
        'caption' => 'Konsep ketahanan gempa hingga Magnitudo > 8,0, interlocking system, dan sertifikasi SNI',
        'w'       => 879,
        'h'       => 567,
    ),
    array(
        'src'     => $pdf_img . 'ig-scb-mockup-150.webp',
        'alt'     => 'Mockup Strong CB 150 mm lengkap dengan tulangan baja vertikal-horizontal serta lapisan plesteran 15 mm, acian 3 mm, dan cat',
        'title'   => 'Mockup Strong CB 150 (CB 15 cm dengan tulangan baja & finishing dinding)',
        'caption' => 'Mockup Strong CB 150 (CB 15 cm): lapisan plesteran 15 mm, acian 3 mm, & cat',
        'w'       => 647,
        'h'       => 414,
    ),
);

$product_lightbox_items = array();
if ( ! empty( $osaka_products ) ) {
    foreach ( $osaka_products as $op ) {
        $product_lightbox_items[] = array(
            'src'   => $op['img'],
            'title' => $op['name'] . ' (' . $op['type_group'] . ' · ' . $op['thickness'] . ')',
        );
    }
}
?>

<style type="text/css">
    .scb-page {
        background: var(--color-surface);
        color: var(--color-text-body);
    }

    /* Hero Banner */
    .scb-hero {
        position: relative;
        isolation: isolate;
        min-height: clamp(280px, 38vh, 420px);
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--color-deep-navy);
        color: #ffffff;
        padding: clamp(48px, 6vw, 72px) 0;
    }
    .scb-hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.34;
        z-index: -2;
    }
    .scb-hero-scrim {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 31, 44, 0.72) 0%, rgba(10, 31, 44, 0.92) 100%);
        z-index: -1;
    }
    .scb-hero-inner {
        max-width: 48rem;
        margin: 0 auto;
        text-align: center;
    }
    .scb-hero-badge {
        display: inline-block;
        margin-bottom: 16px;
        padding: 6px 14px;
        border-radius: var(--radius-pill);
        background: rgba(3, 197, 240, 0.14);
        border: 1px solid rgba(3, 197, 240, 0.4);
        color: var(--color-action-cyan);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }
    .scb-hero-title {
        margin: 0 0 14px;
        font-size: clamp(2rem, 4.5vw, 3.25rem);
        font-weight: 800;
        color: #ffffff;
        line-height: 1.1;
    }
    .scb-hero-sub {
        margin: 0 auto;
        max-width: 38rem;
        font-size: clamp(0.95rem, 1.3vw, 1.1rem);
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.88);
    }

    /* Video Section */
    .scb-video-wrap {
        background: var(--color-surface);
        border-bottom: 1px solid var(--color-border);
        display: flex;
        justify-content: center;
    }
    .scb-video-stage {
        position: relative;
        display: inline-block;
        max-width: 100%;
    }
    .scb-video-el {
        display: block;
        width: 100%;
        height: auto;
        max-height: 82vh;
        object-fit: contain;
    }
    .scb-sound-btn {
        position: absolute;
        right: 20px;
        bottom: 20px;
        z-index: 10;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-width: 44px;
        min-height: 44px;
        padding: 10px 16px;
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.28);
        background: rgba(10, 31, 44, 0.82);
        color: #ffffff;
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        cursor: pointer;
        backdrop-filter: blur(6px);
    }
    .scb-sound-btn:hover {
        background: var(--color-deep-navy);
    }
    .scb-sound-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }

    /* Sections */
    .scb-section {
        padding-top: clamp(48px, 6vw, 76px);
        padding-bottom: clamp(48px, 6vw, 76px);
    }
    .scb-section--sunken {
        background: var(--color-surface-sunken);
        border-top: 1px solid var(--color-border);
        border-bottom: 1px solid var(--color-border);
    }
    .scb-section-head {
        border-left: 4px solid var(--color-primary);
        padding-left: 18px;
        margin-bottom: 28px;
    }
    .scb-eyebrow {
        margin: 0 0 6px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .scb-title {
        margin: 0 0 8px;
        font-size: clamp(1.5rem, 2.8vw, 2.15rem);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .scb-lede {
        margin: 0;
        max-width: 64ch;
        font-size: var(--text-base);
        line-height: 1.65;
        color: var(--color-text-body);
    }

    /* IG SCB Technical Overview (PDF p.10-12) */
    .scb-tech-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: start;
    }
    @media (min-width: 1024px) {
        .scb-tech-layout { grid-template-columns: 1.1fr 0.9fr; }
    }
    .scb-pillars {
        display: grid;
        gap: 16px;
    }
    .scb-pillar-card {
        padding: 20px 22px;
        border-radius: var(--radius-md);
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        box-shadow: var(--shadow-xs);
    }
    .scb-pillar-head {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 8px;
    }
    .scb-pillar-num {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: var(--radius-sm);
        background: var(--color-primary);
        color: #ffffff;
        font-size: var(--text-xs);
        font-weight: 700;
        flex: 0 0 auto;
    }
    .scb-pillar-title {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .scb-pillar-desc {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }
    .scb-compare-note {
        margin-top: 16px;
        padding: 16px 20px;
        border-radius: var(--radius-md);
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
        border: 1px solid rgba(0, 100, 145, 0.2);
        font-size: var(--text-sm);
        line-height: 1.6;
    }

    /* Official PDF Specs Summary Box + Figures */
    .scb-spec-summary {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: var(--shadow-sm);
    }
    .scb-spec-summary h3 {
        margin: 0 0 16px;
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .scb-spec-dl {
        margin: 0;
        border-top: 1px solid var(--color-border);
    }
    .scb-spec-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4px;
        padding: 12px 0;
        border-bottom: 1px solid var(--color-border);
    }
    @media (min-width: 520px) {
        .scb-spec-row { grid-template-columns: 170px 1fr; gap: 16px; }
    }
    .scb-spec-row dt {
        font-size: var(--text-xs);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--color-text-muted);
    }
    .scb-spec-row dd {
        margin: 0;
        font-size: var(--text-sm);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .scb-visual-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
        margin-top: 20px;
    }
    @media (min-width: 640px) {
        .scb-visual-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .scb-visual-btn {
        display: flex;
        flex-direction: column;
        width: 100%;
        padding: 0;
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
        background: var(--color-surface);
        overflow: hidden;
        text-align: left;
        cursor: pointer;
        box-shadow: var(--shadow-xs);
        transition: border-color var(--dur-fast) var(--ease-in-out),
                    box-shadow var(--dur-fast) var(--ease-in-out);
    }
    .scb-visual-btn:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-md);
    }
    .scb-visual-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .scb-visual-thumb {
        width: 100%;
        aspect-ratio: 16 / 10;
        background: var(--color-surface-sunken);
        border-bottom: 1px solid var(--color-border);
        overflow: hidden;
    }
    .scb-visual-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .scb-visual-caption {
        padding: 12px 14px;
        font-size: var(--text-xs);
        font-weight: 600;
        line-height: 1.45;
        color: var(--color-text-body);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    /* DB Product Catalog Table */
    .scb-table-wrap {
        overflow: hidden;
        border-radius: var(--radius-lg);
        border: 1px solid var(--color-border);
        background: var(--color-surface);
        box-shadow: var(--shadow-sm);
    }
    .scb-table-scroll {
        overflow-x: auto;
    }
    .scb-table {
        width: 100%;
        min-width: 720px;
        border-collapse: collapse;
        font-size: var(--text-sm);
    }
    .scb-table thead th {
        padding: 14px 20px;
        text-align: left;
        font-weight: 700;
        color: var(--color-text-heading);
        background: var(--color-surface-sunken);
        border-bottom: 1px solid var(--color-border);
    }
    .scb-table-group td {
        background: var(--color-primary);
        color: #ffffff;
        padding: 11px 20px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    .scb-table tbody tr.scb-product-row {
        border-bottom: 1px solid var(--color-border);
        transition: background-color var(--dur-fast) var(--ease-in-out);
    }
    .scb-table tbody tr.scb-product-row:hover {
        background: var(--color-surface-sunken);
    }
    .scb-table tbody td {
        padding: 16px 20px;
        color: var(--color-text-body);
        vertical-align: middle;
    }
    .scb-table-thumb-btn {
        display: inline-flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        min-width: 44px;
        min-height: 44px;
        padding: 4px;
        border: 0;
        background: transparent;
        cursor: pointer;
        text-align: left;
    }
    .scb-table-thumb-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
        border-radius: var(--radius-sm);
    }
    .scb-table-thumb-btn img {
        width: 96px;
        height: 96px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border);
        object-fit: cover;
        display: block;
    }
    .scb-table-name {
        font-weight: 700;
        font-size: var(--text-xs);
        color: var(--color-text-heading);
    }
    .scb-table-strong {
        font-weight: 700;
        color: var(--color-text-heading);
    }

    /* Factory Scroller */
    .scb-scroller-shell {
        position: relative;
    }
    .scb-scroller {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        padding: 8px 0 16px;
        scrollbar-width: none;
    }
    .scb-scroller::-webkit-scrollbar { display: none; }
    .scb-doc-card {
        position: relative;
        flex: 0 0 82%;
        scroll-snap-align: start;
        aspect-ratio: 4 / 3;
        padding: 0;
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        background: var(--color-surface);
        cursor: pointer;
        box-shadow: var(--shadow-xs);
    }
    @media (min-width: 640px) {
        .scb-doc-card { flex: 0 0 calc(50% - 8px); }
    }
    @media (min-width: 960px) {
        .scb-doc-card { flex: 0 0 calc(33.333% - 11px); }
    }
    .scb-doc-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform var(--dur-base) var(--ease-out-expo);
    }
    .scb-doc-card:hover img {
        transform: scale(1.04);
    }
    .scb-doc-card:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .scb-doc-overlay {
        position: absolute;
        inset: auto 0 0 0;
        padding: 12px 16px;
        background: linear-gradient(180deg, rgba(10, 31, 44, 0) 0%, rgba(10, 31, 44, 0.88) 100%);
        color: #ffffff;
        font-size: var(--text-xs);
        font-weight: 600;
        text-align: left;
    }
    .scb-carousel-btn {
        display: none;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-pill);
        border: 1px solid var(--color-border-strong);
        background: rgba(255, 255, 255, 0.96);
        color: var(--color-text-heading);
        box-shadow: var(--shadow-md);
        cursor: pointer;
    }
    @media (min-width: 768px) {
        .scb-carousel-btn { display: inline-flex; }
    }
    .scb-carousel-btn:hover {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #ffffff;
    }
    .scb-carousel-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .scb-carousel-btn--prev { left: 12px; }
    .scb-carousel-btn--next { right: 12px; }

    .scb-dots {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2px;
        margin-top: 8px;
    }
    .scb-dot-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        min-height: 44px;
        padding: 0;
        border: 0;
        background: transparent;
        cursor: pointer;
    }
    .scb-dot-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
        border-radius: var(--radius-sm);
    }
    .scb-dot-visual {
        width: 10px;
        height: 10px;
        border-radius: var(--radius-pill);
        background: var(--color-border-strong);
        transition: width var(--dur-fast) var(--ease-in-out), background-color var(--dur-fast) var(--ease-in-out);
    }
    .scb-dot-btn.is-active .scb-dot-visual {
        width: 24px;
        background: var(--color-primary);
    }

    /* Certifications & Patent IDP000069171 */
    .scb-cert-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        align-items: start;
    }
    @media (min-width: 960px) {
        .scb-cert-layout { grid-template-columns: 0.95fr 1.05fr; }
    }
    .scb-patent-box {
        padding: 20px 22px;
        border-radius: var(--radius-md);
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-left: 4px solid var(--color-primary);
        margin-top: 16px;
    }
    .scb-patent-box h3 {
        margin: 0 0 8px;
        font-size: 1rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .scb-patent-box ul {
        margin: 0;
        padding-left: 18px;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: var(--color-text-body);
    }
    .scb-cert-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }
    @media (min-width: 600px) {
        .scb-cert-cards { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .scb-cert-btn {
        display: flex;
        flex-direction: column;
        padding: 12px;
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
        background: var(--color-surface);
        cursor: pointer;
        text-align: center;
        box-shadow: var(--shadow-xs);
        transition: border-color var(--dur-fast) var(--ease-in-out),
                    box-shadow var(--dur-fast) var(--ease-in-out);
    }
    .scb-cert-btn:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-md);
    }
    .scb-cert-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .scb-cert-btn img {
        width: 100%;
        height: 180px;
        object-fit: contain;
        background: var(--color-surface-sunken);
        border-radius: var(--radius-sm);
        margin-bottom: 10px;
    }
    .scb-cert-label {
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-text-heading);
    }

    /* Cross-links */
    .scb-next-bar {
        padding: 28px;
        border-radius: var(--radius-lg);
        background: var(--color-deep-navy);
        color: #ffffff;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }
    .scb-next-bar h2 {
        margin: 0 0 6px;
        font-size: 1.35rem;
        color: #ffffff;
    }
    .scb-next-bar p {
        margin: 0;
        font-size: var(--text-sm);
        color: rgba(255, 255, 255, 0.85);
    }
    .scb-next-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .scb-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 10px 18px;
        border-radius: var(--radius-md);
        font-size: var(--text-sm);
        font-weight: 600;
        text-decoration: none;
    }
    .scb-cta-btn--solid {
        background: #ffffff;
        color: var(--color-deep-navy);
    }
    .scb-cta-btn--solid:hover {
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
    }
    .scb-cta-btn--ghost {
        border: 1px solid rgba(255, 255, 255, 0.45);
        color: #ffffff;
    }
    .scb-cta-btn--ghost:hover {
        background: rgba(255, 255, 255, 0.12);
    }

    /* Accessible Lightbox Modal */
    .scb-lightbox {
        position: fixed;
        inset: 0;
        z-index: 3000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: rgba(10, 31, 44, 0.96);
        color: #ffffff;
        user-select: none;
        overscroll-behavior: contain;
    }
    .scb-lightbox[hidden] {
        display: none;
    }
    .scb-lb-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 20px;
        background: rgba(10, 31, 44, 0.9);
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
        z-index: 10;
    }
    .scb-lb-counter {
        font-size: var(--text-sm);
        font-weight: 700;
        color: #ffffff;
    }
    .scb-lb-tools {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .scb-lb-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        min-height: 44px;
        padding: 8px 12px;
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 700;
        cursor: pointer;
    }
    .scb-lb-btn:hover {
        background: rgba(255, 255, 255, 0.22);
    }
    .scb-lb-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .scb-lb-viewport {
        position: relative;
        flex: 1;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 16px 12px;
    }
    @media (min-width: 640px) {
        .scb-lb-viewport { padding: 16px 68px; }
    }
    .scb-lb-img {
        max-height: 78vh;
        max-width: 88vw;
        object-fit: contain;
        transform-origin: center;
        transition: transform 180ms ease-out;
        pointer-events: none;
    }
    .scb-lb-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 48px;
        height: 48px;
        border-radius: var(--radius-pill);
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: rgba(10, 31, 44, 0.85);
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 12;
    }
    .scb-lb-nav:hover {
        background: var(--color-primary);
        border-color: var(--color-primary);
    }
    .scb-lb-nav:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .scb-lb-nav--prev { left: 16px; }
    .scb-lb-nav--next { right: 16px; }
    .scb-lb-bottom {
        padding: 16px 24px;
        text-align: center;
        background: rgba(10, 31, 44, 0.9);
        border-top: 1px solid rgba(255, 255, 255, 0.14);
        color: rgba(255, 255, 255, 0.92);
        font-size: var(--text-sm);
        font-weight: 500;
    }
    .lightbox-drag-active { cursor: grabbing !important; }
</style>

<main id="main-content" class="scb-page">
    <!-- Hero Banner Section -->
    <section class="scb-hero" aria-labelledby="scb-hero-title">
        <img class="scb-hero-bg"
             src="<?php echo esc_url( $theme_uri . '/images/layout/lh3_e39e29fad1d5c71512e7e27847d133e5.webp' ); ?>"
             alt="Struktur Blok Beton IG Strong Concrete Block"
             width="512"
             height="512"
             fetchpriority="high"
             decoding="sync" />
        <div class="scb-hero-scrim" aria-hidden="true"></div>

        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-hero-inner">
                <span class="scb-hero-badge">Teknologi Konstruksi Berpaten</span>
                <h1 id="scb-hero-title" class="scb-hero-title">
                    IG SCB (Osaka Strong CB)
                </h1>
                <p class="scb-hero-sub">
                    Iida Group Strong Concrete Block: blok beton pracetak dengan CB Interlocking Sistem, uji ketahanan gempa hingga magnitudo &gt; 8,0, Paten IDP000069171, dan sertifikasi SNI di bawah pengawasan tenaga ahli Jepang.
                </p>
            </div>
        </div>
    </section>

    <!-- Video Banner Section -->
    <section class="scb-video-wrap" aria-label="Video profil produksi IG Strong Concrete Block">
        <div class="scb-video-stage">
            <video id="hero-video"
                   class="scb-video-el"
                   autoplay
                   muted
                   loop
                   playsinline
                   preload="auto"
                   disablepictureinpicture
                   controlslist="nodownload nofullscreen noremoteplayback">
                <source src="<?php echo esc_url( $theme_uri . '/video/video_banner_our_product.mp4' ); ?>" type="video/mp4" />
            </video>
            <button type="button"
                    id="video-sound-btn"
                    class="scb-sound-btn"
                    aria-pressed="false"
                    aria-label="Aktifkan suara video">
                <span class="material-symbols-outlined" id="video-sound-icon" aria-hidden="true">volume_off</span>
                <span id="video-sound-text">Unmute</span>
            </button>
        </div>
    </section>

    <!-- IG SCB Technology & Specifications (PDF hal. 10-12) -->
    <section id="ig-scb-overview" class="scb-section scb-section--sunken" aria-labelledby="scb-overview-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-section-head">
                <p class="scb-eyebrow">Company Profile Hal. 10-11</p>
                <h2 id="scb-overview-title" class="scb-title">IG SCB: Iida Group Strong Concrete Block</h2>
                <p class="scb-lede">
                    Bahan bangunan khusus yang dirancang dengan teknologi Iida Group Holdings dan telah melalui uji ketahanan gempa hingga magnitudo &gt; 8,0. Seluruh produksi di pabrik Indonesia diawasi secara ketat oleh tenaga ahli Jepang demi menjaga mutu bangunan.
                </p>
            </div>

            <div class="scb-tech-layout">
                <div>
                    <div class="scb-pillars">
                        <article class="scb-pillar-card">
                            <div class="scb-pillar-head">
                                <span class="scb-pillar-num">01</span>
                                <h3 class="scb-pillar-title">CB Interlocking Sistem</h3>
                            </div>
                            <p class="scb-pillar-desc">
                                Mempermudah proses instalasi blok beton secara presisi sekaligus meningkatkan ketahanan dinding struktur terhadap gaya gempa.
                            </p>
                        </article>

                        <article class="scb-pillar-card">
                            <div class="scb-pillar-head">
                                <span class="scb-pillar-num">02</span>
                                <h3 class="scb-pillar-title">Pengembangan Balok Khusus</h3>
                            </div>
                            <p class="scb-pillar-desc">
                                Meningkatkan kekuatan struktural dan daya tahan gempa, sementara kemudahan pemasangan di lapangan menjaga konsistensi kualitas setiap unit rumah.
                            </p>
                        </article>

                        <article class="scb-pillar-card">
                            <div class="scb-pillar-head">
                                <span class="scb-pillar-num">03</span>
                                <h3 class="scb-pillar-title">Penggunaan Material Baja</h3>
                            </div>
                            <p class="scb-pillar-desc">
                                Penguatan baja vertikal dan horizontal meringankan beban struktural bangunan, memperkuat ketahanan gempa, serta mempercepat konstruksi.
                            </p>
                        </article>
                    </div>

                    <div class="scb-compare-note">
                        <strong>Perbandingan dengan CB Konvensional / Lokal:</strong> Concrete block konvensional umumnya rentan terhadap goncangan gempa serta menuntut proses konstruksi yang rumit dan bergantung pada keahlian individu tukang. IG SCB menyederhanakan pemasangan sekaligus memenuhi uji gempa hingga magnitudo &gt; 8,0.
                    </div>
                </div>

                <div>
                    <div class="scb-spec-summary">
                        <h3>Spesifikasi Teknis Standar IG SCB</h3>
                        <dl class="scb-spec-dl">
                            <div class="scb-spec-row">
                                <dt>Jenis Blok</dt>
                                <dd>CB 15 cm (rumah 2 lantai) &amp; CB 10 cm (rumah 1 lantai)</dd>
                            </div>
                            <div class="scb-spec-row">
                                <dt>Berat Satuan</dt>
                                <dd>&plusmn;12,5 Kg / CB</dd>
                            </div>
                            <div class="scb-spec-row">
                                <dt>Dimensi Ukuran</dt>
                                <dd>390 &times; 190 &times; 150 mm</dd>
                            </div>
                            <div class="scb-spec-row">
                                <dt>Compressive Strength</dt>
                                <dd>8 N/mm&sup2;</dd>
                            </div>
                            <div class="scb-spec-row">
                                <dt>Komposisi Material</dt>
                                <dd>Semen, Pasir, &amp; Ash Stone</dd>
                            </div>
                            <div class="scb-spec-row">
                                <dt>Standar &amp; Paten</dt>
                                <dd>Paten IDP000069171 (17 Juni 2020) &amp; Tersertifikasi SNI</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="scb-visual-grid">
                        <?php foreach ( $tech_visuals as $t_idx => $tv ) : ?>
                            <button type="button"
                                    class="scb-visual-btn lightbox-trigger"
                                    data-gallery="tech"
                                    data-index="<?php echo esc_attr( $t_idx ); ?>"
                                    aria-label="Perbesar <?php echo esc_attr( $tv['title'] ); ?>">
                                <div class="scb-visual-thumb">
                                    <img src="<?php echo esc_url( $tv['src'] ); ?>"
                                         alt="<?php echo esc_attr( $tv['alt'] ); ?>"
                                         width="<?php echo esc_attr( $tv['w'] ); ?>"
                                         height="<?php echo esc_attr( $tv['h'] ); ?>"
                                         loading="lazy"
                                         decoding="async" />
                                </div>
                                <span class="scb-visual-caption">
                                    <span><?php echo esc_html( $tv['caption'] ); ?></span>
                                    <span class="material-symbols-outlined" aria-hidden="true">zoom_in</span>
                                </span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Information Table (Database wp_osaka_products) -->
    <section id="product-information" class="scb-section" aria-labelledby="scb-catalog-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-section-head">
                <p class="scb-eyebrow">Katalog Spesifikasi Pabrik</p>
                <h2 id="scb-catalog-title" class="scb-title">Varian Produk Concrete Block &amp; Paving Block</h2>
                <p class="scb-lede">
                    Daftar varian Concrete Block (Yoko Block &amp; Sami Block) serta Paving Block pracetak berteknologi Jepang untuk kebutuhan konstruksi perumahan maupun kawasan.
                </p>
            </div>

            <div class="scb-table-wrap">
                <div class="scb-table-scroll">
                    <table class="scb-table">
                        <thead>
                            <tr>
                                <th scope="col">Types</th>
                                <th scope="col">Thickness</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Strength</th>
                                <th scope="col">Number / sqm</th>
                                <th scope="col">Minimum Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product_lb_idx = 0;
                            if ( ! empty( $concrete_blocks ) ) :
                            ?>
                                <tr class="scb-table-group">
                                    <td colspan="6">Concrete Block (IG Strong CB)</td>
                                </tr>
                                <?php foreach ( $concrete_blocks as $p ) : ?>
                                    <tr class="scb-product-row">
                                        <td>
                                            <button type="button"
                                                    class="scb-table-thumb-btn lightbox-trigger"
                                                    data-gallery="product"
                                                    data-index="<?php echo esc_attr( $product_lb_idx ); ?>"
                                                    aria-label="Perbesar foto <?php echo esc_attr( $p['name'] ); ?>">
                                                <img src="<?php echo esc_url( $p['img'] ); ?>"
                                                     alt="<?php echo esc_attr( $p['name'] ); ?>"
                                                     width="96"
                                                     height="96"
                                                     loading="lazy"
                                                     decoding="async" />
                                                <span class="scb-table-name"><?php echo esc_html( $p['name'] ); ?></span>
                                            </button>
                                        </td>
                                        <td class="scb-table-strong"><?php echo esc_html( $p['thickness'] ); ?></td>
                                        <td><?php echo esc_html( $p['weight'] ); ?></td>
                                        <td><?php echo esc_html( $p['strength'] ); ?></td>
                                        <td><?php echo esc_html( $p['num_per_sqm'] ); ?></td>
                                        <td><?php echo esc_html( $p['min_order'] ); ?></td>
                                    </tr>
                                <?php
                                    $product_lb_idx++;
                                endforeach;
                                ?>
                            <?php endif; ?>

                            <?php if ( ! empty( $paving_blocks ) ) : ?>
                                <tr class="scb-table-group">
                                    <td colspan="6">Paving Block</td>
                                </tr>
                                <?php foreach ( $paving_blocks as $p ) : ?>
                                    <tr class="scb-product-row">
                                        <td>
                                            <button type="button"
                                                    class="scb-table-thumb-btn lightbox-trigger"
                                                    data-gallery="product"
                                                    data-index="<?php echo esc_attr( $product_lb_idx ); ?>"
                                                    aria-label="Perbesar foto <?php echo esc_attr( $p['name'] ); ?>">
                                                <img src="<?php echo esc_url( $p['img'] ); ?>"
                                                     alt="<?php echo esc_attr( $p['name'] ); ?>"
                                                     width="96"
                                                     height="96"
                                                     loading="lazy"
                                                     decoding="async" />
                                                <span class="scb-table-name"><?php echo esc_html( $p['name'] ); ?></span>
                                            </button>
                                        </td>
                                        <td class="scb-table-strong"><?php echo esc_html( $p['thickness'] ); ?></td>
                                        <td><?php echo esc_html( $p['weight'] ); ?></td>
                                        <td><?php echo esc_html( $p['strength'] ); ?></td>
                                        <td><?php echo esc_html( $p['num_per_sqm'] ); ?></td>
                                        <td><?php echo esc_html( $p['min_order'] ); ?></td>
                                    </tr>
                                <?php
                                    $product_lb_idx++;
                                endforeach;
                                ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Factory Documentation -->
    <section id="factory-documentation" class="scb-section scb-section--sunken" aria-labelledby="scb-factory-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-section-head">
                <p class="scb-eyebrow">Pabrik Bogor (Gunung Putri)</p>
                <h2 id="scb-factory-title" class="scb-title">Dokumentasi Fasilitas Produksi</h2>
                <p class="scb-lede">
                    Rangkaian fasilitas manufaktur beton pracetak, pengolahan material, pengujian laboratorium, serta pengemasan blok di pabrik IG SCB.
                </p>
            </div>

            <div class="scb-scroller-shell">
                <div id="doc-scroller" class="scb-scroller">
                    <?php foreach ( $docs as $index => $item ) : ?>
                        <button type="button"
                                class="scb-doc-card lightbox-trigger"
                                data-gallery="doc"
                                data-index="<?php echo esc_attr( $index ); ?>"
                                aria-label="Buka pratinjau <?php echo esc_attr( $item[1] ); ?>">
                            <img src="<?php echo esc_url( $item[0] ); ?>"
                                 alt="<?php echo esc_attr( $item[1] ); ?>"
                                 width="600"
                                 height="450"
                                 loading="lazy"
                                 decoding="async" />
                            <span class="scb-doc-overlay"><?php echo esc_html( $item[1] ); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <button type="button"
                        id="slide-prev"
                        class="scb-carousel-btn scb-carousel-btn--prev"
                        aria-label="Slide dokumentasi sebelumnya">
                    <span class="material-symbols-outlined" aria-hidden="true">chevron_left</span>
                </button>
                <button type="button"
                        id="slide-next"
                        class="scb-carousel-btn scb-carousel-btn--next"
                        aria-label="Slide dokumentasi berikutnya">
                    <span class="material-symbols-outlined" aria-hidden="true">chevron_right</span>
                </button>

                <div id="doc-dots" class="scb-dots" role="tablist" aria-label="Navigasi slide dokumentasi pabrik">
                    <?php foreach ( $docs as $index => $item ) : ?>
                        <button type="button"
                                class="scb-dot-btn<?php echo $index === 0 ? ' is-active' : ''; ?>"
                                data-slide="<?php echo esc_attr( $index ); ?>"
                                aria-label="Ke slide <?php echo esc_attr( $index + 1 . ': ' . $item[1] ); ?>"
                                aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <span class="scb-dot-visual" aria-hidden="true"></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Patent IDP000069171 -->
    <section id="certifications" class="scb-section" aria-labelledby="scb-cert-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-section-head">
                <p class="scb-eyebrow">Legalitas Teknis &amp; Mutu</p>
                <h2 id="scb-cert-title" class="scb-title">Sertifikasi SNI &amp; Paten IDP000069171</h2>
                <p class="scb-lede">
                    Inovasi blok konstruksi IG SCB telah memperoleh hak paten resmi di Indonesia dan memenuhi Standar Nasional Indonesia (SNI).
                </p>
            </div>

            <div class="scb-cert-layout">
                <div>
                    <p class="scb-lede">
                        PT. Perumnas Iida Group dan Iida Group Holdings menerapkan pengendalian mutu berlapis pada seluruh blok beton struktural IG SCB serta Paving Block di bawah pengawasan spesialis teknis Jepang.
                    </p>
                    <div class="scb-patent-box">
                        <h3>Detail Paten Resmi Indonesia (Company Profile Hal. 12)</h3>
                        <ul>
                            <li><strong>Nomor Paten:</strong> IDP000069171</li>
                            <li><strong>Tanggal Pemberian:</strong> 17 Juni 2020 (Permohonan: 01 Juli 2015)</li>
                            <li><strong>Pemegang Paten:</strong> IIDA GROUP HOLDINGS CO., LTD.</li>
                            <li><strong>Judul Invensi:</strong> Blok Konstruksi dan Struktur Bagian Muka Dinding yang Menggunakan Blok Konstruksi</li>
                            <li><strong>Kepatuhan Mutu:</strong> Tersertifikasi Standar Nasional Indonesia (SNI) untuk beban tekan &amp; presisi dimensi.</li>
                        </ul>
                    </div>
                </div>

                <div class="scb-cert-cards">
                    <?php foreach ( $certs as $c_idx => $cert ) : ?>
                        <button type="button"
                                class="scb-cert-btn lightbox-trigger"
                                data-gallery="cert"
                                data-index="<?php echo esc_attr( $c_idx ); ?>"
                                aria-label="Perbesar <?php echo esc_attr( $cert['title'] ); ?>">
                            <img src="<?php echo esc_url( $cert['src'] ); ?>"
                                 alt="<?php echo esc_attr( $cert['alt'] ); ?>"
                                 width="<?php echo esc_attr( $cert['w'] ); ?>"
                                 height="<?php echo esc_attr( $cert['h'] ); ?>"
                                 loading="lazy"
                                 decoding="async" />
                            <span class="scb-cert-label"><?php echo esc_html( $cert['badge'] ); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Cross-navigation -->
    <section class="scb-section scb-section--sunken" aria-label="Tautan halaman terkait">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="scb-next-bar">
                <div>
                    <h2>Ingin Menggunakan IG SCB untuk Proyek Anda?</h2>
                    <p>Jelajahi proyek hunian kami, katalog material konstruksi, atau hubungi tim teknis di Bekasi &amp; Bogor.</p>
                </div>
                <div class="scb-next-actions">
                    <a href="<?php echo esc_url( home_url( '/development/' ) ); ?>" class="scb-cta-btn scb-cta-btn--ghost">
                        Proyek Perumahan
                    </a>
                    <a href="<?php echo esc_url( home_url( '/product-construction-material/' ) ); ?>" class="scb-cta-btn scb-cta-btn--ghost">
                        Material Konstruksi
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="scb-cta-btn scb-cta-btn--solid">
                        Hubungi Tim Teknis
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Accessible Lightbox Modal -->
<div id="lightbox-modal"
     class="scb-lightbox"
     role="dialog"
     aria-modal="true"
     aria-labelledby="lightbox-caption"
     hidden>
    <div class="scb-lb-top">
        <span id="lightbox-counter" class="scb-lb-counter">1 / 14</span>
        <div class="scb-lb-tools">
            <button type="button" id="lightbox-zoom-out" class="scb-lb-btn" aria-label="Perkecil gambar">
                <span class="material-symbols-outlined" aria-hidden="true">zoom_out</span>
            </button>
            <button type="button" id="lightbox-zoom-in" class="scb-lb-btn" aria-label="Perbesar gambar">
                <span class="material-symbols-outlined" aria-hidden="true">zoom_in</span>
            </button>
            <button type="button" id="lightbox-zoom-reset" class="scb-lb-btn" aria-label="Reset ukuran gambar">
                Reset
            </button>
            <button type="button" id="lightbox-close" class="scb-lb-btn" aria-label="Tutup pratinjau gambar">
                <span class="material-symbols-outlined" aria-hidden="true">close</span>
            </button>
        </div>
    </div>

    <div id="lightbox-viewport" class="scb-lb-viewport">
        <img id="lightbox-image" src="" alt="" class="scb-lb-img" />
        <button type="button" id="lightbox-prev" class="scb-lb-nav scb-lb-nav--prev" aria-label="Gambar sebelumnya">
            <span class="material-symbols-outlined" aria-hidden="true">chevron_left</span>
        </button>
        <button type="button" id="lightbox-next" class="scb-lb-nav scb-lb-nav--next" aria-label="Gambar berikutnya">
            <span class="material-symbols-outlined" aria-hidden="true">chevron_right</span>
        </button>
    </div>

    <div id="lightbox-caption" class="scb-lb-bottom">Pratinjau Gambar</div>
</div>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
(function() {
    const galleries = {
        doc: <?php
            $doc_items = array();
            foreach ( $docs as $d ) {
                $doc_items[] = array( 'src' => $d[0], 'title' => $d[1] );
            }
            echo wp_json_encode( $doc_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        ?>,
        cert: <?php
            $cert_items = array();
            foreach ( $certs as $c ) {
                $cert_items[] = array( 'src' => $c['src'], 'title' => $c['title'] );
            }
            echo wp_json_encode( $cert_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        ?>,
        tech: <?php
            $tech_items = array();
            foreach ( $tech_visuals as $tv ) {
                $tech_items[] = array( 'src' => $tv['src'], 'title' => $tv['title'] );
            }
            echo wp_json_encode( $tech_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
        ?>,
        product: <?php echo wp_json_encode( $product_lightbox_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>
    };

    let currentGallery = 'doc';
    let currentIndex = 0;
    let scale = 1;
    let translateX = 0;
    let translateY = 0;
    let isDragging = false;
    let startX = 0;
    let startY = 0;
    let prevTranslateX = 0;
    let prevTranslateY = 0;
    let lastTriggerEl = null;

    const lightboxModal    = document.getElementById('lightbox-modal');
    const lightboxImage    = document.getElementById('lightbox-image');
    const lightboxCounter  = document.getElementById('lightbox-counter');
    const lightboxCaption  = document.getElementById('lightbox-caption');
    const lightboxViewport = document.getElementById('lightbox-viewport');
    const lightboxClose    = document.getElementById('lightbox-close');
    const lightboxPrev     = document.getElementById('lightbox-prev');
    const lightboxNext     = document.getElementById('lightbox-next');

    function applyTransformations() {
        lightboxImage.style.transform = 'translate(' + translateX + 'px, ' + translateY + 'px) scale(' + scale + ')';
    }

    function updateCursorState() {
        if (scale > 1.0) {
            lightboxViewport.classList.add('lightbox-drag-active');
        } else {
            lightboxViewport.classList.remove('lightbox-drag-active');
        }
    }

    function resetZoomState() {
        scale = 1;
        translateX = 0;
        translateY = 0;
        prevTranslateX = 0;
        prevTranslateY = 0;
        applyTransformations();
        updateCursorState();
    }

    function updateLightboxContent() {
        const list = galleries[currentGallery] || [];
        const item = list[currentIndex];
        if (!item) {
            return;
        }
        lightboxImage.src = item.src;
        lightboxImage.alt = item.title;
        lightboxCaption.textContent = item.title;
        lightboxCounter.textContent = (currentIndex + 1) + ' / ' + list.length;

        const hasMultiple = list.length > 1;
        lightboxPrev.hidden = !hasMultiple;
        lightboxNext.hidden = !hasMultiple;
    }

    function handleKeyDown(e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            prevImage();
        } else if (e.key === 'ArrowRight') {
            nextImage();
        } else if (e.key === 'Tab') {
            const focusable = Array.from(lightboxModal.querySelectorAll('button:not([hidden])')).filter((el) => el.offsetParent !== null);
            if (focusable.length === 0) {
                return;
            }
            const first = focusable[0];
            const last = focusable[focusable.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    }

    function openLightbox(galleryType, index, triggerEl) {
        const list = galleries[galleryType];
        if (!list || !list[index]) {
            return;
        }
        lastTriggerEl = triggerEl || document.activeElement;
        currentGallery = galleryType;
        currentIndex = index;
        resetZoomState();
        updateLightboxContent();

        lightboxModal.hidden = false;
        document.body.style.overflow = 'hidden';
        window.addEventListener('keydown', handleKeyDown);
        lightboxClose.focus();
    }

    function closeLightbox() {
        if (lightboxModal.hidden) {
            return;
        }
        lightboxModal.hidden = true;
        document.body.style.overflow = '';
        window.removeEventListener('keydown', handleKeyDown);
        if (lastTriggerEl && typeof lastTriggerEl.focus === 'function') {
            lastTriggerEl.focus();
        }
    }

    function prevImage() {
        const list = galleries[currentGallery] || [];
        if (list.length < 2) {
            return;
        }
        currentIndex = (currentIndex - 1 + list.length) % list.length;
        resetZoomState();
        updateLightboxContent();
    }

    function nextImage() {
        const list = galleries[currentGallery] || [];
        if (list.length < 2) {
            return;
        }
        currentIndex = (currentIndex + 1) % list.length;
        resetZoomState();
        updateLightboxContent();
    }

    function zoomIn() {
        scale = Math.min(4.0, scale + 0.25);
        updateCursorState();
        applyTransformations();
    }

    function zoomOut() {
        scale = Math.max(1.0, scale - 0.25);
        if (scale === 1.0) {
            translateX = 0;
            translateY = 0;
            prevTranslateX = 0;
            prevTranslateY = 0;
        }
        updateCursorState();
        applyTransformations();
    }

    // Bind triggers via addEventListener (CSP safe, no inline onclick)
    document.querySelectorAll('.lightbox-trigger').forEach((btn) => {
        btn.addEventListener('click', () => {
            const gType = btn.dataset.gallery;
            const idx   = parseInt(btn.dataset.index, 10) || 0;
            openLightbox(gType, idx, btn);
        });
    });

    lightboxClose.addEventListener('click', closeLightbox);
    lightboxPrev.addEventListener('click', prevImage);
    lightboxNext.addEventListener('click', nextImage);
    document.getElementById('lightbox-zoom-in').addEventListener('click', zoomIn);
    document.getElementById('lightbox-zoom-out').addEventListener('click', zoomOut);
    document.getElementById('lightbox-zoom-reset').addEventListener('click', resetZoomState);

    lightboxViewport.addEventListener('click', (e) => {
        if (e.target === lightboxViewport && scale === 1.0) {
            closeLightbox();
        }
    });

    lightboxViewport.addEventListener('mousedown', (e) => {
        if (scale <= 1.0) {
            return;
        }
        isDragging = true;
        startX = e.clientX;
        startY = e.clientY;
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDragging) {
            return;
        }
        translateX = prevTranslateX + (e.clientX - startX);
        translateY = prevTranslateY + (e.clientY - startY);
        applyTransformations();
    });

    window.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            prevTranslateX = translateX;
            prevTranslateY = translateY;
        }
    });

    lightboxViewport.addEventListener('touchstart', (e) => {
        if (scale <= 1.0 || e.touches.length !== 1) {
            return;
        }
        isDragging = true;
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    }, { passive: true });

    lightboxViewport.addEventListener('touchmove', (e) => {
        if (!isDragging || e.touches.length !== 1) {
            return;
        }
        translateX = prevTranslateX + (e.touches[0].clientX - startX);
        translateY = prevTranslateY + (e.touches[0].clientY - startY);
        applyTransformations();
    }, { passive: true });

    lightboxViewport.addEventListener('touchend', () => {
        if (isDragging) {
            isDragging = false;
            prevTranslateX = translateX;
            prevTranslateY = translateY;
        }
    });

    lightboxViewport.addEventListener('wheel', (e) => {
        e.preventDefault();
        if (e.deltaY < 0) {
            zoomIn();
        } else {
            zoomOut();
        }
    }, { passive: false });

    // Carousel Slider Engine
    const scroller = document.getElementById('doc-scroller');
    const prevBtn  = document.getElementById('slide-prev');
    const nextBtn  = document.getElementById('slide-next');
    const dotBtns  = Array.from(document.querySelectorAll('#doc-dots .scb-dot-btn'));

    function getSlideWidth() {
        const item = scroller ? scroller.querySelector('.scb-doc-card') : null;
        return item ? item.offsetWidth + 16 : 0;
    }

    function setActiveDot(activeIdx) {
        dotBtns.forEach((dot, i) => {
            const isCurr = (i === activeIdx);
            dot.classList.toggle('is-active', isCurr);
            dot.setAttribute('aria-current', isCurr ? 'true' : 'false');
        });
    }

    dotBtns.forEach((dot) => {
        dot.addEventListener('click', () => {
            const idx = parseInt(dot.dataset.slide, 10) || 0;
            const slideWidth = getSlideWidth();
            if (scroller && slideWidth > 0) {
                scroller.scrollTo({ left: idx * slideWidth, behavior: 'smooth' });
            }
            setActiveDot(idx);
        });
    });

    if (prevBtn && nextBtn && scroller) {
        prevBtn.addEventListener('click', () => {
            scroller.scrollBy({ left: -getSlideWidth(), behavior: 'smooth' });
        });
        nextBtn.addEventListener('click', () => {
            scroller.scrollBy({ left: getSlideWidth(), behavior: 'smooth' });
        });
    }

    if (scroller) {
        scroller.addEventListener('scroll', () => {
            const slideWidth = getSlideWidth();
            if (slideWidth <= 0) {
                return;
            }
            const index = Math.min(dotBtns.length - 1, Math.max(0, Math.round(scroller.scrollLeft / slideWidth)));
            setActiveDot(index);
        });
    }

    // Video sound controls
    const heroVideo = document.getElementById('hero-video');
    const soundBtn  = document.getElementById('video-sound-btn');
    const soundIcon = document.getElementById('video-sound-icon');
    const soundText = document.getElementById('video-sound-text');

    if (soundBtn && heroVideo) {
        soundBtn.addEventListener('click', () => {
            heroVideo.muted = !heroVideo.muted;
            if (heroVideo.muted) {
                soundIcon.textContent = 'volume_off';
                soundText.textContent = 'Unmute';
                soundBtn.setAttribute('aria-pressed', 'false');
                soundBtn.setAttribute('aria-label', 'Aktifkan suara video');
            } else {
                heroVideo.volume = 1.0;
                soundIcon.textContent = 'volume_up';
                soundText.textContent = 'Mute';
                soundBtn.setAttribute('aria-pressed', 'true');
                soundBtn.setAttribute('aria-label', 'Bisukan suara video');
            }
        });
    }
})();
</script>

<?php get_footer(); ?>
