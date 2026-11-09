<?php
/**
 * Template Name: Construction Material Detail
 *
 * Katalog Material Procurement Business (Rucika, RB Shera, GRANITO, Terraco Rapi, Dusaspun).
 * Menggunakan tabel wp_construction_categories & wp_construction_products (1.710+ produk)
 * serta disinkronkan dengan Skema Bisnis & Material Procurement Business (Nov 2023, hal. 13 & 23).
 */
get_header();

global $wpdb;
$table_categories = $wpdb->prefix . 'construction_categories';
$table_products   = $wpdb->prefix . 'construction_products';

$db_categories = $wpdb->get_results( "SELECT * FROM $table_categories", ARRAY_A );
$db_products   = $wpdb->get_results( "SELECT * FROM $table_products", ARRAY_A );

$catalog     = array();
$brands_keys = array(
    'rucika'   => 'Rucika',
    'rbshera'  => 'RB Shera',
    'granito'  => 'GRANITO',
    'terraco'  => 'Terraco Rapi',
    'dusaspun' => 'Dusaspun',
);

foreach ( $brands_keys as $key => $name ) {
    $catalog[ $key ] = array(
        'name'          => $name,
        'subcategories' => array(),
        'products'      => array(),
    );
}

if ( ! empty( $db_categories ) ) {
    foreach ( $db_categories as $c ) {
        $brand = $c['brand'];
        if ( isset( $catalog[ $brand ] ) ) {
            $catalog[ $brand ]['subcategories'][] = array(
                'id'   => $c['category_id'],
                'name' => $c['name'],
            );
        }
    }
}

$total_products_count = 0;
if ( ! empty( $db_products ) ) {
    foreach ( $db_products as $p ) {
        $brand = $p['brand'];
        if ( isset( $catalog[ $brand ] ) ) {
            $catalog[ $brand ]['products'][] = array(
                'code'     => $p['code'],
                'category' => $p['category_id'],
                'name'     => $p['name'],
                'spec'     => $p['spec'],
                'price'    => intval( $p['price'] ),
                'img'      => $p['img'],
            );
            $total_products_count++;
        }
    }
}

$theme_uri = get_template_directory_uri();
?>

<style type="text/css">
    .cm-page {
        background: var(--color-surface);
        color: var(--color-text-body);
    }

    /* Hero Banner */
    .cm-hero {
        position: relative;
        isolation: isolate;
        min-height: clamp(260px, 36vh, 380px);
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--color-deep-navy);
        color: #ffffff;
        padding: clamp(44px, 6vw, 68px) 0;
    }
    .cm-hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.32;
        z-index: -2;
    }
    .cm-hero-scrim {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 31, 44, 0.72) 0%, rgba(10, 31, 44, 0.92) 100%);
        z-index: -1;
    }
    .cm-hero-inner {
        max-width: 48rem;
        margin: 0 auto;
        text-align: center;
    }
    .cm-hero-badge {
        display: inline-block;
        margin-bottom: 14px;
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
    .cm-hero-title {
        margin: 0 0 12px;
        font-size: clamp(2rem, 4.4vw, 3.15rem);
        font-weight: 800;
        color: #ffffff;
        line-height: 1.1;
    }
    .cm-hero-sub {
        margin: 0 auto;
        max-width: 40rem;
        font-size: clamp(0.95rem, 1.3vw, 1.075rem);
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.88);
    }

    /* Material Procurement Business Intro Strip */
    .cm-intro-strip {
        background: var(--color-surface-sunken);
        border-bottom: 1px solid var(--color-border);
        padding: 28px 0;
    }
    .cm-intro-box {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        align-items: center;
        padding: 22px 24px;
        border-radius: var(--radius-lg);
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        box-shadow: var(--shadow-xs);
    }
    @media (min-width: 960px) {
        .cm-intro-box { grid-template-columns: 1.4fr 0.6fr; gap: 32px; }
    }
    .cm-eyebrow {
        margin: 0 0 6px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .cm-intro-title {
        margin: 0 0 8px;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .cm-intro-desc {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: var(--color-text-body);
    }
    .cm-intro-stats {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }
    .cm-stat-pill {
        padding: 14px 16px;
        border-radius: var(--radius-md);
        background: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
    }
    .cm-stat-val {
        margin: 0;
        font-family: var(--font-display);
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--color-primary);
    }
    .cm-stat-lbl {
        margin: 2px 0 0;
        font-size: var(--text-xs);
        font-weight: 600;
        color: var(--color-text-muted);
    }

    /* Catalog Section */
    .cm-section {
        padding-top: clamp(40px, 5vw, 64px);
        padding-bottom: clamp(40px, 5vw, 64px);
    }
    .cm-catalog-layout {
        display: flex;
        flex-direction: column;
        gap: 28px;
    }
    @media (min-width: 1024px) {
        .cm-catalog-layout { flex-direction: row; align-items: flex-start; }
    }
    .cm-sidebar {
        width: 100%;
    }
    @media (min-width: 1024px) {
        .cm-sidebar { width: 270px; flex: 0 0 270px; }
    }
    .cm-sidebar-card {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: 16px;
        box-shadow: var(--shadow-xs);
    }
    .cm-sidebar-heading {
        margin: 0 0 12px;
        padding: 0 8px;
        font-size: var(--text-xs);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--color-text-muted);
    }
    .cm-brand-list {
        display: flex;
        flex-direction: row;
        gap: 8px;
        overflow-x: auto;
        padding-bottom: 4px;
    }
    @media (min-width: 1024px) {
        .cm-brand-list { flex-direction: column; overflow-x: visible; padding-bottom: 0; }
    }
    .cm-brand-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        width: 100%;
        min-height: 44px;
        padding: 10px 14px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border);
        background: var(--color-surface);
        color: var(--color-text-body);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        white-space: nowrap;
        text-align: left;
        cursor: pointer;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out);
    }
    .cm-brand-btn:hover {
        background: var(--color-surface-sunken);
        border-color: var(--color-primary);
        color: var(--color-primary);
    }
    .cm-brand-btn.is-active {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #ffffff;
    }
    .cm-brand-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .cm-brand-count {
        font-size: var(--text-xs);
        font-weight: 700;
        padding: 2px 8px;
        border-radius: var(--radius-pill);
        background: var(--color-surface-sunken);
        color: var(--color-text-muted);
    }
    .cm-brand-btn.is-active .cm-brand-count {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    /* Main Catalog Column */
    .cm-main-col {
        flex: 1;
        min-width: 0;
        display: grid;
        gap: 20px;
    }
    .cm-filter-panel {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: 20px;
        box-shadow: var(--shadow-xs);
        display: grid;
        gap: 16px;
    }
    .cm-search-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    .cm-sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }
    .cm-search-wrap {
        position: relative;
        flex: 1 1 280px;
        max-width: 480px;
    }
    .cm-search-icon {
        position: absolute;
        inset: 0 auto 0 12px;
        display: flex;
        align-items: center;
        color: var(--color-text-muted);
        pointer-events: none;
    }
    .cm-search-input {
        width: 100%;
        min-height: 44px;
        padding: 10px 14px 10px 42px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        color: var(--color-text-heading);
        font-family: var(--font-body);
        font-size: var(--text-sm);
    }
    .cm-search-input::placeholder {
        color: var(--color-text-muted);
    }
    .cm-search-input:focus {
        outline: 2px solid var(--color-primary);
        outline-offset: 1px;
        border-color: var(--color-primary);
    }
    .cm-result-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-text-muted);
    }
    .cm-subcat-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding-top: 12px;
        border-top: 1px solid var(--color-border);
    }
    .cm-subcat-btn {
        display: inline-flex;
        align-items: center;
        min-height: 44px;
        padding: 8px 16px;
        border-radius: var(--radius-pill);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        color: var(--color-text-body);
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 600;
        cursor: pointer;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out);
    }
    .cm-subcat-btn:hover {
        border-color: var(--color-primary);
        color: var(--color-primary);
        background: var(--color-surface-sunken);
    }
    .cm-subcat-btn.is-active {
        background: var(--color-primary-container);
        border-color: var(--color-primary);
        color: var(--color-on-primary-container);
        font-weight: 700;
    }
    .cm-subcat-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }

    /* Product Table */
    .cm-table-card {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
    }
    .cm-table-scroll {
        overflow: auto;
        max-height: 520px;
    }
    .cm-table {
        width: 100%;
        min-width: 680px;
        border-collapse: collapse;
        font-size: var(--text-sm);
    }
    .cm-table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        padding: 14px 20px;
        text-align: left;
        font-weight: 700;
        color: var(--color-text-heading);
        background: var(--color-surface-sunken);
        border-bottom: 1px solid var(--color-border-strong);
    }
    .cm-table thead th.cm-th-center {
        text-align: center;
    }
    .cm-table tbody tr {
        border-bottom: 1px solid var(--color-border);
        transition: background-color var(--dur-fast) var(--ease-in-out);
    }
    .cm-table tbody tr:hover {
        background: var(--color-surface-sunken);
    }
    .cm-table tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        color: var(--color-text-body);
    }
    .cm-code-pill {
        display: inline-block;
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        background: var(--color-surface-sunken);
        border: 1px solid var(--color-border-strong);
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .cm-prod-name {
        margin: 0 0 4px;
        font-size: var(--text-base);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .cm-prod-spec {
        margin: 0;
        max-width: 54ch;
        font-size: var(--text-sm);
        line-height: 1.5;
        color: var(--color-text-muted);
    }
    .cm-price-val {
        font-weight: 700;
        color: var(--color-primary);
        white-space: nowrap;
    }
    .cm-price-inquiry {
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-text-muted);
        white-space: nowrap;
    }
    .cm-thumb-cell {
        text-align: center;
    }
    .cm-thumb-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        padding: 0;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        overflow: hidden;
        cursor: pointer;
    }
    .cm-thumb-btn:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-sm);
    }
    .cm-thumb-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .cm-thumb-btn img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .cm-no-thumb {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        border-radius: var(--radius-md);
        border: 1px dashed var(--color-border-strong);
        background: var(--color-surface-sunken);
        color: var(--color-text-muted);
        font-size: var(--text-xs);
        font-weight: 600;
    }
    .cm-empty-state {
        padding: 48px 24px;
        text-align: center;
        color: var(--color-text-muted);
    }
    .cm-empty-state[hidden] {
        display: none;
    }

    /* Ordering & Return Workflow Section */
    .cm-workflow-section {
        padding-bottom: clamp(56px, 7vw, 88px);
    }
    .cm-workflow-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
    }
    @media (min-width: 1024px) {
        .cm-workflow-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .cm-workflow-card {
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: 28px;
        box-shadow: var(--shadow-sm);
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .cm-wf-head {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .cm-wf-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: var(--radius-md);
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
        flex: 0 0 auto;
    }
    .cm-wf-title {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .cm-wf-desc {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-muted);
    }
    .cm-flow-btn {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
        overflow: hidden;
        background: var(--color-surface-sunken);
        aspect-ratio: 16 / 10;
        cursor: pointer;
    }
    .cm-flow-btn:hover {
        border-color: var(--color-primary);
    }
    .cm-flow-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .cm-flow-btn img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .cm-flow-zoom-pill {
        position: absolute;
        right: 12px;
        bottom: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: var(--radius-pill);
        background: rgba(10, 31, 44, 0.88);
        color: #ffffff;
        font-size: var(--text-xs);
        font-weight: 600;
    }
    /* Return flow visual schematic replacing legacy bitmap that held a personal email */
    .cm-return-schematic {
        display: grid;
        gap: 10px;
        padding: 18px;
        border-radius: var(--radius-md);
        background: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
    }
    .cm-return-node {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: var(--radius-md);
        background: var(--color-surface);
        border: 1px solid var(--color-border);
    }
    .cm-return-node-num {
        width: 28px;
        height: 28px;
        border-radius: var(--radius-pill);
        background: var(--color-deep-navy);
        color: #ffffff;
        font-size: var(--text-xs);
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }
    .cm-return-node strong {
        display: block;
        font-size: var(--text-sm);
        color: var(--color-text-heading);
    }
    .cm-return-node span {
        font-size: var(--text-xs);
        color: var(--color-text-muted);
    }
    .cm-step-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 14px;
    }
    .cm-step-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        font-size: var(--text-sm);
        line-height: 1.55;
        color: var(--color-text-body);
    }
    .cm-step-badge {
        width: 26px;
        height: 26px;
        border-radius: var(--radius-pill);
        background: var(--color-primary);
        color: #ffffff;
        font-size: var(--text-xs);
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
        margin-top: 2px;
    }
    .cm-step-item strong {
        display: block;
        color: var(--color-text-heading);
    }
    .cm-step-item a {
        color: var(--color-primary);
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .cm-cta-row {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: auto;
        padding-top: 8px;
    }
    .cm-action-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 10px 18px;
        border-radius: var(--radius-md);
        background: var(--color-primary);
        color: #ffffff;
        font-size: var(--text-sm);
        font-weight: 600;
        text-decoration: none;
    }
    .cm-action-link:hover {
        background: var(--color-primary-strong);
        color: #ffffff;
    }
    .cm-action-link--outline {
        background: var(--color-surface);
        border: 1px solid var(--color-border-strong);
        color: var(--color-text-heading);
    }
    .cm-action-link--outline:hover {
        background: var(--color-surface-sunken);
        border-color: var(--color-primary);
        color: var(--color-primary);
    }

    /* Accessible Lightbox */
    .cm-lightbox {
        position: fixed;
        inset: 0;
        z-index: 3000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: rgba(10, 31, 44, 0.95);
        color: #ffffff;
        overscroll-behavior: contain;
    }
    .cm-lightbox[hidden] {
        display: none;
    }
    .cm-lb-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 20px;
        background: rgba(10, 31, 44, 0.92);
        border-bottom: 1px solid rgba(255, 255, 255, 0.14);
    }
    .cm-lb-title {
        font-size: var(--text-sm);
        font-weight: 700;
        color: #ffffff;
    }
    .cm-lb-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        min-height: 44px;
        padding: 8px;
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.12);
        color: #ffffff;
        cursor: pointer;
    }
    .cm-lb-close:hover {
        background: rgba(255, 255, 255, 0.24);
    }
    .cm-lb-close:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .cm-lb-stage {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        overflow: hidden;
    }
    .cm-lb-stage img {
        max-height: 82vh;
        max-width: 90vw;
        object-fit: contain;
        border-radius: var(--radius-md);
        background: #ffffff;
        box-shadow: var(--shadow-lg);
    }
</style>

<main id="main-content" class="cm-page">
    <!-- Banner Section -->
    <section class="cm-hero" aria-labelledby="cm-hero-title">
        <img class="cm-hero-bg"
             src="<?php echo esc_url( $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp' ); ?>"
             alt="Persediaan Material Konstruksi Terstandarisasi"
             width="512"
             height="512"
             fetchpriority="high"
             decoding="sync" />
        <div class="cm-hero-scrim" aria-hidden="true"></div>

        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="cm-hero-inner">
                <span class="cm-hero-badge">Material Procurement Business</span>
                <h1 id="cm-hero-title" class="cm-hero-title">
                    Material Konstruksi
                </h1>
                <p class="cm-hero-sub">
                    Sistem pengadaan material bangunan terstandarisasi sebagai bagian dari Skema Bisnis terintegrasi Iida Group Holdings dan PT. Perumnas Iida Group.
                </p>
            </div>
        </div>
    </section>

    <!-- Material Procurement Business Context Strip (PDF hal. 13 & 23) -->
    <section class="cm-intro-strip" aria-labelledby="cm-procurement-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="cm-intro-box">
                <div>
                    <p class="cm-eyebrow">Skema Bisnis &amp; Bisnis Lain (Company Profile Hal. 13 &amp; 23)</p>
                    <h2 id="cm-procurement-title" class="cm-intro-title">
                        Material Procurement Business: Sistem Suplai Stabil &amp; Efisien
                    </h2>
                    <p class="cm-intro-desc">
                        Dalam skema bisnis grup dari R&amp;D hingga After Sales Service, lini <strong>Material Procurement Business</strong> berperan membangun sistem pasokan material konstruksi yang stabil, efisien, dan terstandarisasi langsung dari pabrikan utama di Indonesia.
                    </p>
                </div>
                <div class="cm-intro-stats">
                    <div class="cm-stat-pill">
                        <p class="cm-stat-val"><?php echo esc_html( number_format( $total_products_count, 0, ',', '.' ) ); ?></p>
                        <p class="cm-stat-lbl">Item Material Katalog</p>
                    </div>
                    <div class="cm-stat-pill">
                        <p class="cm-stat-val">5 Brand</p>
                        <p class="cm-stat-lbl">Pemasok Terstandarisasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="cm-section" aria-label="Katalog Material Konstruksi">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="cm-catalog-layout">
                <!-- Left Sidebar: Brand Tabs -->
                <aside class="cm-sidebar" aria-label="Filter merek material konstruksi">
                    <div class="cm-sidebar-card">
                        <h2 class="cm-sidebar-heading">Merek Material</h2>
                        <div class="cm-brand-list" id="brand-tabs-list"></div>
                    </div>
                </aside>

                <!-- Main Content Area -->
                <div class="cm-main-col">
                    <!-- Search & Subcategory Filter -->
                    <div class="cm-filter-panel">
                        <div class="cm-search-bar">
                            <div class="cm-search-wrap">
                                <label for="catalog-search" class="cm-sr-only">Cari nama produk, kode, atau spesifikasi</label>
                                <span class="cm-search-icon" aria-hidden="true">
                                    <span class="material-symbols-outlined">search</span>
                                </span>
                                <input type="text"
                                       id="catalog-search"
                                       placeholder="Cari nama produk, kode, atau spesifikasi..."
                                       class="cm-search-input" />
                            </div>
                            <div id="catalog-results-meta" class="cm-result-meta" aria-live="polite">
                                Memuat katalog...
                            </div>
                        </div>

                        <div class="cm-subcat-list" id="subcategory-tabs-list" role="group" aria-label="Filter subkategori produk"></div>
                    </div>

                    <!-- Products Table Area -->
                    <div class="cm-table-card">
                        <div class="cm-table-scroll">
                            <table class="cm-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Product Details</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" class="cm-th-center">Image</th>
                                    </tr>
                                </thead>
                                <tbody id="product-rows-container"></tbody>
                            </table>
                        </div>

                        <div id="empty-state" class="cm-empty-state" hidden>
                            <span class="material-symbols-outlined" aria-hidden="true">inventory_2</span>
                            <p>Tidak ada produk yang sesuai dengan kata kunci pencarian Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ordering & Return Workflows Section -->
    <section class="cm-workflow-section" aria-label="Prosedur Pemesanan dan Pengembalian Barang">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="cm-workflow-grid">
                <!-- Ordering Process Card -->
                <div class="cm-workflow-card">
                    <div class="cm-wf-head">
                        <span class="cm-wf-icon" aria-hidden="true">
                            <span class="material-symbols-outlined">shopping_cart</span>
                        </span>
                        <h2 class="cm-wf-title">Alur Pemesanan</h2>
                    </div>

                    <p class="cm-wf-desc">
                        Prosedur pemesanan material konstruksi resmi yang terstruktur dan langsung dikoordinasikan untuk kebutuhan proyek Anda.
                    </p>

                    <button type="button"
                            id="ordering-flow-btn"
                            class="cm-flow-btn"
                            aria-label="Perbesar diagram Alur Pemesanan">
                        <img src="<?php echo esc_url( $theme_uri . '/ordering_process_flow.webp' ); ?>"
                             alt="Diagram 8 langkah Alur Pemesanan material konstruksi"
                             width="1024"
                             height="1024"
                             loading="lazy"
                             decoding="async" />
                        <span class="cm-flow-zoom-pill">
                            <span class="material-symbols-outlined" aria-hidden="true">zoom_in</span>
                            <span>Perbesar Diagram</span>
                        </span>
                    </button>

                    <ol class="cm-step-list">
                        <li class="cm-step-item">
                            <span class="cm-step-badge">1</span>
                            <div><strong>Pemesanan</strong>Pelanggan mengajukan permintaan pesanan sesuai kebutuhan proyek.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">2</span>
                            <div><strong>Mengkonfirmasi Order</strong>Tim penjualan meninjau dan memverifikasi ketersediaan serta data pesanan.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">3</span>
                            <div><strong>Konfirmasi Order</strong>Pesanan disetujui dan dokumen konfirmasi resmi dikirimkan ke pelanggan.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">4</span>
                            <div><strong>Pengaturan Pengiriman</strong>Perencanaan rute logistik dan armada pengiriman disiapkan.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">5</span>
                            <div><strong>Konfirmasi Tanggal Pengiriman</strong>Pelanggan dihubungi untuk konfirmasi jadwal perkiraan kedatangan.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">6</span>
                            <div><strong>Invoicing</strong>Faktur tagihan (invoice) resmi diterbitkan dan dikirimkan ke pelanggan.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">7</span>
                            <div><strong>Pelunasan Pembayaran 100%</strong>Pelanggan menyelesaikan pelunasan pembayaran secara penuh sebelum pengiriman.</div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">8</span>
                            <div><strong>Pengiriman</strong>Material konstruksi dikirim langsung ke lokasi proyek tujuan.</div>
                        </li>
                    </ol>
                </div>

                <!-- Return Process Card -->
                <div class="cm-workflow-card">
                    <div class="cm-wf-head">
                        <span class="cm-wf-icon" aria-hidden="true">
                            <span class="material-symbols-outlined">assignment_return</span>
                        </span>
                        <h2 class="cm-wf-title">Cara Pengembalian Barang</h2>
                    </div>

                    <p class="cm-wf-desc">
                        Garansi penanganan resmi atas material yang mengalami kerusakan saat pengiriman atau ketidaksesuaian spesifikasi pesanan.
                    </p>

                    <div class="cm-return-schematic" aria-label="Ringkasan alur pengembalian barang 3 langkah">
                        <div class="cm-return-node">
                            <span class="cm-return-node-num">1</span>
                            <div>
                                <strong>Foto &amp; Dokumentasi Barang</strong>
                                <span>Catat nomor kode barang, jumlah unit, dan bukti visual kondisi material.</span>
                            </div>
                        </div>
                        <div class="cm-return-node">
                            <span class="cm-return-node-num">2</span>
                            <div>
                                <strong>Kirim ke info@perumnas-iidagroup.com</strong>
                                <span>Lampirkan dokumentasi &amp; rincian pesanan ke kontak resmi perusahaan.</span>
                            </div>
                        </div>
                        <div class="cm-return-node">
                            <span class="cm-return-node-num">3</span>
                            <div>
                                <strong>Menunggu Konfirmasi dari Tim</strong>
                                <span>Tim operasional mengevaluasi laporan dan memproses penggantian barang.</span>
                            </div>
                        </div>
                    </div>

                    <ol class="cm-step-list">
                        <li class="cm-step-item">
                            <span class="cm-step-badge">1</span>
                            <div>
                                <strong>Foto &amp; Dokumentasi Barang</strong>
                                Ambil foto atau video kondisi barang yang rusak atau tidak sesuai dengan rincian kode produk.
                            </div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">2</span>
                            <div>
                                <strong>Email ke <a href="mailto:info@perumnas-iidagroup.com">info@perumnas-iidagroup.com</a></strong>
                                Kirimkan bukti dokumentasi beserta rincian pesanan melalui email resmi perusahaan atau formulir di halaman <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Hubungi Kami</a>.
                            </div>
                        </li>
                        <li class="cm-step-item">
                            <span class="cm-step-badge">3</span>
                            <div>
                                <strong>Menunggu Konfirmasi dari Tim</strong>
                                Tim support kami akan melakukan verifikasi dan segera menindaklanjuti penukaran barang.
                            </div>
                        </li>
                    </ol>

                    <div class="cm-cta-row">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cm-action-link">
                            Hubungi Pengadaan Material
                        </a>
                        <a href="<?php echo esc_url( home_url( '/product-osaka-strong-cb/' ) ); ?>" class="cm-action-link cm-action-link--outline">
                            Lihat IG Strong CB
                        </a>
                        <a href="<?php echo esc_url( home_url( '/our-business/' ) ); ?>" class="cm-action-link cm-action-link--outline">
                            Skema Our Business
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Accessible Lightbox Modal -->
<div id="product-lightbox"
     class="cm-lightbox"
     role="dialog"
     aria-modal="true"
     aria-labelledby="lightbox-title"
     hidden>
    <div class="cm-lb-header">
        <span id="lightbox-title" class="cm-lb-title">Pratinjau Produk</span>
        <button type="button" id="lightbox-close-btn" class="cm-lb-close" aria-label="Tutup pratinjau gambar">
            <span class="material-symbols-outlined" aria-hidden="true">close</span>
        </button>
    </div>
    <div id="product-lightbox-stage" class="cm-lb-stage">
        <img id="lightbox-img-element" src="" alt="" />
    </div>
</div>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
(function() {
    const catalogData = <?php echo wp_json_encode( $catalog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>;
    const orderingFlowUrl = <?php echo wp_json_encode( $theme_uri . '/ordering_process_flow.webp' ); ?>;

    const namedEntities = {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'",
        '&apos;': "'",
        '&nbsp;': ' '
    };

    function decodeEntities(str) {
        if (typeof str !== 'string') {
            return '';
        }
        return str
            .replace(/&(amp|lt|gt|quot|#039|apos|nbsp);/g, function(m) {
                return namedEntities[m] || m;
            })
            .replace(/&#(\d+);/g, function(_, num) {
                return String.fromCharCode(parseInt(num, 10));
            })
            .replace(/&#x([0-9a-fA-F]+);/g, function(_, hex) {
                return String.fromCharCode(parseInt(hex, 16));
            });
    }

    function clearNode(node) {
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }

    let currentBrand = 'rucika';
    let currentSubcategory = 'all';
    let searchQuery = '';
    let lastTriggerEl = null;

    const brandTabsList        = document.getElementById('brand-tabs-list');
    const subcategoryTabsList  = document.getElementById('subcategory-tabs-list');
    const productRowsContainer = document.getElementById('product-rows-container');
    const catalogSearch        = document.getElementById('catalog-search');
    const resultsMeta          = document.getElementById('catalog-results-meta');
    const emptyState           = document.getElementById('empty-state');
    const productLightbox      = document.getElementById('product-lightbox');
    const lightboxStage        = document.getElementById('product-lightbox-stage');
    const lightboxImgElement   = document.getElementById('lightbox-img-element');
    const lightboxTitle        = document.getElementById('lightbox-title');
    const lightboxCloseBtn     = document.getElementById('lightbox-close-btn');
    const orderingFlowBtn      = document.getElementById('ordering-flow-btn');

    function openLightbox(url, name, triggerEl) {
        if (!url || !productLightbox) {
            return;
        }
        lastTriggerEl = triggerEl || document.activeElement;
        const cleanTitle = decodeEntities(name || 'Pratinjau Produk');
        lightboxImgElement.src = url;
        lightboxImgElement.alt = cleanTitle;
        lightboxTitle.textContent = cleanTitle;

        productLightbox.hidden = false;
        document.body.style.overflow = 'hidden';
        window.addEventListener('keydown', handleLightboxKeydown);
        lightboxCloseBtn.focus();
    }

    function closeLightbox() {
        if (!productLightbox || productLightbox.hidden) {
            return;
        }
        productLightbox.hidden = true;
        document.body.style.overflow = '';
        window.removeEventListener('keydown', handleLightboxKeydown);
        if (lastTriggerEl && typeof lastTriggerEl.focus === 'function') {
            lastTriggerEl.focus();
        }
    }

    function handleLightboxKeydown(e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            closeLightbox();
        } else if (e.key === 'Tab') {
            e.preventDefault();
            lightboxCloseBtn.focus();
        }
    }

    function renderBrandTabs() {
        clearNode(brandTabsList);
        Object.keys(catalogData).forEach((key) => {
            const brand = catalogData[key];
            const isCurr = (key === currentBrand);
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cm-brand-btn' + (isCurr ? ' is-active' : '');
            btn.setAttribute('aria-pressed', isCurr ? 'true' : 'false');

            const nameSpan = document.createElement('span');
            nameSpan.textContent = decodeEntities(brand.name);

            const countSpan = document.createElement('span');
            countSpan.className = 'cm-brand-count';
            countSpan.textContent = String((brand.products || []).length);

            btn.appendChild(nameSpan);
            btn.appendChild(countSpan);
            btn.addEventListener('click', () => selectBrand(key));
            brandTabsList.appendChild(btn);
        });
    }

    function renderSubcategoryTabs() {
        clearNode(subcategoryTabsList);
        const brand = catalogData[currentBrand];
        if (!brand) {
            return;
        }

        const items = [{ id: 'all', name: 'Semua Kategori' }].concat(brand.subcategories || []);
        items.forEach((sub) => {
            const isCurr = (currentSubcategory === sub.id);
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cm-subcat-btn' + (isCurr ? ' is-active' : '');
            btn.dataset.subcat = sub.id;
            btn.setAttribute('aria-pressed', isCurr ? 'true' : 'false');
            btn.textContent = decodeEntities(sub.name);
            btn.addEventListener('click', () => {
                currentSubcategory = sub.id;
                updateSubcategoryHighlights();
                renderProducts();
            });
            subcategoryTabsList.appendChild(btn);
        });
    }

    function updateSubcategoryHighlights() {
        Array.from(subcategoryTabsList.children).forEach((btn) => {
            const isCurr = (btn.dataset.subcat === currentSubcategory);
            btn.classList.toggle('is-active', isCurr);
            btn.setAttribute('aria-pressed', isCurr ? 'true' : 'false');
        });
    }

    function renderProducts() {
        clearNode(productRowsContainer);
        const brand = catalogData[currentBrand];
        if (!brand || !brand.products) {
            emptyState.hidden = false;
            resultsMeta.textContent = '0 produk';
            return;
        }

        const filteredList = brand.products.filter((p) => {
            const matchesCategory = (currentSubcategory === 'all' || p.category === currentSubcategory);
            if (!matchesCategory) {
                return false;
            }
            if (!searchQuery) {
                return true;
            }
            const nameText = decodeEntities(p.name).toLowerCase();
            const codeText = decodeEntities(p.code).toLowerCase();
            const specText = decodeEntities(p.spec).toLowerCase();
            return nameText.includes(searchQuery) || codeText.includes(searchQuery) || specText.includes(searchQuery);
        });

        resultsMeta.textContent = 'Menampilkan ' + filteredList.length + ' dari ' + brand.products.length + ' produk (' + decodeEntities(brand.name) + ')';

        if (filteredList.length === 0) {
            emptyState.hidden = false;
            return;
        }
        emptyState.hidden = true;

        const fragment = document.createDocumentFragment();

        filteredList.forEach((p) => {
            const cleanName = decodeEntities(p.name);
            const cleanSpec = decodeEntities(p.spec);
            const cleanCode = decodeEntities(p.code);

            const tr = document.createElement('tr');

            const tdCode = document.createElement('td');
            const codeBadge = document.createElement('span');
            codeBadge.className = 'cm-code-pill';
            codeBadge.textContent = cleanCode;
            tdCode.appendChild(codeBadge);

            const tdDetails = document.createElement('td');
            const h3 = document.createElement('h3');
            h3.className = 'cm-prod-name';
            h3.textContent = cleanName;
            const pSpec = document.createElement('p');
            pSpec.className = 'cm-prod-spec';
            pSpec.textContent = cleanSpec;
            tdDetails.appendChild(h3);
            tdDetails.appendChild(pSpec);

            const tdPrice = document.createElement('td');
            const priceEl = document.createElement('span');
            if (!p.price || p.price === 0) {
                priceEl.className = 'cm-price-inquiry';
                priceEl.textContent = 'Hubungi Kami';
            } else {
                priceEl.className = 'cm-price-val';
                priceEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(p.price);
            }
            tdPrice.appendChild(priceEl);

            const tdImg = document.createElement('td');
            tdImg.className = 'cm-thumb-cell';
            if (p.img) {
                const thumbBtn = document.createElement('button');
                thumbBtn.type = 'button';
                thumbBtn.className = 'cm-thumb-btn';
                thumbBtn.setAttribute('aria-label', 'Perbesar gambar produk ' + cleanName);
                const img = document.createElement('img');
                img.src = p.img;
                img.alt = cleanName;
                img.width = 64;
                img.height = 64;
                img.loading = 'lazy';
                img.decoding = 'async';
                thumbBtn.appendChild(img);
                thumbBtn.addEventListener('click', () => {
                    openLightbox(p.img, cleanName + ' (' + cleanCode + ')', thumbBtn);
                });
                tdImg.appendChild(thumbBtn);
            } else {
                const noThumb = document.createElement('span');
                noThumb.className = 'cm-no-thumb';
                noThumb.textContent = 'N/A';
                tdImg.appendChild(noThumb);
            }

            tr.appendChild(tdCode);
            tr.appendChild(tdDetails);
            tr.appendChild(tdPrice);
            tr.appendChild(tdImg);
            fragment.appendChild(tr);
        });

        productRowsContainer.appendChild(fragment);
    }

    function selectBrand(brandKey) {
        currentBrand = brandKey;
        currentSubcategory = 'all';
        renderBrandTabs();
        renderSubcategoryTabs();
        renderProducts();
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (!catalogData[currentBrand]) {
            const keys = Object.keys(catalogData);
            if (keys.length > 0) {
                currentBrand = keys[0];
            }
        }
        selectBrand(currentBrand);

        catalogSearch.addEventListener('input', (e) => {
            searchQuery = e.target.value.toLowerCase().trim();
            renderProducts();
        });

        if (orderingFlowBtn) {
            orderingFlowBtn.addEventListener('click', () => {
                openLightbox(orderingFlowUrl, 'Alur Pemesanan Material Konstruksi', orderingFlowBtn);
            });
        }

        lightboxCloseBtn.addEventListener('click', closeLightbox);
        productLightbox.addEventListener('click', (e) => {
            if (e.target === productLightbox || e.target === lightboxStage) {
                closeLightbox();
            }
        });
    });
})();
</script>

<?php get_footer(); ?>
