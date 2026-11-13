<?php
/**
 * Template Name: Development
 *
 * Portofolio Proyek Perumahan Indonesia, Kondominium Jepang, dan 6 Brand Rumah Grup.
 * Seluruh data dan citra bersumber dari Company Profile resmi (Nov 2023).
 */
get_header();

$pdf_img = get_template_directory_uri() . '/images/pdf/';

$projects = array(
    array(
        'id'            => 'botania-2',
        'category'      => 'indonesia-existing',
        'categoryLabel' => 'Indonesia Eksisting',
        'statusLabel'   => 'Eksisting',
        'title'         => 'Botania 2 Residence',
        'location'      => 'Indonesia',
        'developer'     => 'PT. Perumnas Iida Group / Iida Group',
        'summary'       => 'Proyek perumahan eksisting di Indonesia dengan pekerjaan desain fasad luar oleh tim arsitektur Jepang.',
        'highlights'    => array(
            'Pekerjaan desain fasad luar (External Facade Design Work)',
            'Sentuhan estetika hunian modern Jepang untuk iklim tropis Indonesia',
        ),
        'specs'         => array(
            array( 'Kategori', 'Proyek Perumahan Eksisting (Indonesia)' ),
            array( 'Cakupan Pekerjaan', 'Desain Fasad Luar (External Facade)' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 9' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'botania-2-residence.webp',
                'alt'   => 'Fasad luar proyek perumahan Botania 2 Residence di Indonesia',
                'label' => 'Fasad Proyek',
                'w'     => 1218,
                'h'     => 994,
            ),
        ),
    ),
    array(
        'id'            => 'depok',
        'category'      => 'indonesia-existing',
        'categoryLabel' => 'Indonesia Eksisting',
        'statusLabel'   => 'Eksisting',
        'title'         => 'Heartful-Town Depok',
        'location'      => 'Depok, Jawa Barat',
        'developer'     => 'PT. Perumnas Iida Group / Iida Group',
        'summary'       => 'Kawasan perumahan eksisting dengan cakupan pekerjaan desain fasad luar dan desain interior hunian lengkap.',
        'highlights'    => array(
            'Pekerjaan desain fasad luar kawasan residensial',
            'Pekerjaan desain interior terintegrasi (Interior Design Work)',
        ),
        'specs'         => array(
            array( 'Kategori', 'Proyek Perumahan Eksisting (Indonesia)' ),
            array( 'Lokasi', 'Depok, Jawa Barat' ),
            array( 'Cakupan Pekerjaan', 'Desain Fasad Luar & Desain Interior' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 9' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => 'https://www.heartfultown-depok.com/',
        'externalLabel' => 'Kunjungi Situs Resmi (heartfultown-depok.com)',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'heartful-town-depok-aerial.webp',
                'alt'   => 'Tampak udara kawasan perumahan Heartful-Town Depok',
                'label' => 'Kawasan Depok',
                'w'     => 1073,
                'h'     => 605,
            ),
        ),
    ),
    array(
        'id'            => 'bekasi',
        'category'      => 'indonesia-upcoming',
        'categoryLabel' => 'Indonesia Akan Datang',
        'statusLabel'   => '29 Unit · Proses Berjalan',
        'title'         => 'Heartful-Town Bekasi',
        'location'      => 'Bekasi, Jawa Barat',
        'developer'     => 'PT. Perumnas Iida Group',
        'summary'       => 'Pengembangan perumahan 1 Lantai & 2 Lantai berjumlah 29 Unit dengan pengerjaan desain fasad dan interior yang sedang berlangsung.',
        'highlights'    => array(
            'Total 29 Unit dengan pilihan rumah 1 Lantai dan 2 Lantai',
            'Pengerjaan Fasad (On Progress) dan Desain Interior (On Progress)',
        ),
        'specs'         => array(
            array( 'Kategori', 'Proyek Akan Datang (Indonesia)' ),
            array( 'Lokasi', 'Bekasi, Jawa Barat' ),
            array( 'Pilihan Rumah', '1 Lantai & 2 Lantai' ),
            array( 'Total Unit', '29 Unit' ),
            array( 'Status Pengerjaan', 'Desain Fasad & Interior On Progress' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 26' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => 'https://www.heartfultown-bekasi.com/',
        'externalLabel' => 'Kunjungi Situs Resmi (heartfultown-bekasi.com)',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'heartful-town-bekasi-facade.webp',
                'alt'   => 'Ilustrasi fasad unit rumah Heartful-Town Bekasi 29 unit',
                'label' => 'Fasad Proyek',
                'w'     => 1188,
                'h'     => 794,
            ),
        ),
    ),
    array(
        'id'            => 'heartful-tower-bekasi',
        'category'      => 'indonesia-upcoming',
        'categoryLabel' => 'Indonesia Akan Datang',
        'statusLabel'   => 'Greenery Area 30%',
        'title'         => 'Heartful Tower Bekasi',
        'location'      => 'Bekasi, Jawa Barat',
        'developer'     => 'Iida Group Holdings / PT. Perumnas Iida Group',
        'summary'       => '"Apartemen dengan Harga Terbaik oleh Developer Jepang" dengan Greenery Area 30%, 3 pilihan tipe unit, serta 6 fasilitas pendukung penghuni.',
        'highlights'    => array(
            'Konsep utama: Apartemen dengan Harga Terbaik oleh Developer Jepang',
            'Rasio ruang hijau kawasan: Greenery Area 30%',
            'Pilihan 3 tipe unit: UNIT STUDIO, UNIT 1 BR, dan UNIT 2 BR',
            '6 Fasilitas: Zen Garden, Ruang Serbaguna, Kindergarden, Gym, Kolam Renang, Minimarket',
        ),
        'specs'         => array(
            array( 'Kategori', 'Proyek Apartemen Akan Datang (Indonesia)' ),
            array( 'Lokasi', 'Bekasi, Jawa Barat' ),
            array( 'Tagline Resmi', 'Apartemen dengan Harga Terbaik oleh Developer Jepang' ),
            array( 'Area Hijau', 'Greenery Area 30%' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 27' ),
        ),
        'unitTypes'     => array(
            array( 'type' => 'UNIT STUDIO', 'nett' => '21,50 m²', 'semigross' => '25,03 m²' ),
            array( 'type' => 'UNIT 1 BR',   'nett' => '28,67 m²', 'semigross' => '33,38 m²' ),
            array( 'type' => 'UNIT 2 BR',   'nett' => '37,89 m²', 'semigross' => '44,11 m²' ),
        ),
        'facilities'    => array(
            'Zen Garden',
            'Ruang Serbaguna',
            'Kindergarden',
            'Gym',
            'Kolam Renang',
            'Minimarket',
        ),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'heartful-tower-bekasi-exterior.webp',
                'alt'   => 'Eksterior menara apartemen Heartful Tower Bekasi',
                'label' => 'Eksterior Tower',
                'w'     => 870,
                'h'     => 1145,
            ),
            array(
                'url'   => $pdf_img . 'heartful-tower-bekasi-overview.webp',
                'alt'   => 'Overview unit Studio, 1 BR, 2 BR serta fasilitas Heartful Tower Bekasi',
                'label' => 'Overview Unit & Fasilitas',
                'w'     => 1378,
                'h'     => 1153,
            ),
        ),
    ),
    array(
        'id'            => 'presis-kumagaya',
        'category'      => 'japan-condo',
        'categoryLabel' => 'Kondominium Jepang',
        'statusLabel'   => 'Ongoing · >5 Type',
        'title'         => 'PRESIS KUMAGAYA GINZA',
        'location'      => 'Kumagaya, Saitama, Jepang',
        'developer'     => 'Hajime Construction Co., Ltd.',
        'summary'       => 'Proyek kondominium di Central Zone & Residential Zone dengan >5 tipe unit, termasuk tipe 3LDK+S+FIC+WIC seluas 71,37 m².',
        'highlights'    => array(
            'Lokasi strategis di Central Zone dan Residential Zone',
            'Menawarkan lebih dari 5 tipe unit (>5 Type)',
            'Contoh tipe unggulan: 3LDK+S+FIC+WIC (71,37 m²)',
        ),
        'specs'         => array(
            array( 'Pengembang Grup', 'Hajime Construction Co., Ltd.' ),
            array( 'Zona Lokasi', 'Central Zone & Residential Zone' ),
            array( 'Variasi Unit', '>5 Type (termasuk 3LDK+S+FIC+WIC 71,37 m²)' ),
            array( 'Skala Grup Jepang', '±1.700 Unit Kondominium / Tahun' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 19' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'condo-presis-kumagaya.webp',
                'alt'   => 'Kondominium PRESIS KUMAGAYA GINZA oleh Hajime Construction',
                'label' => 'Tampak Bangunan',
                'w'     => 1073,
                'h'     => 905,
            ),
        ),
    ),
    array(
        'id'            => 'century-tobu',
        'category'      => 'japan-condo',
        'categoryLabel' => 'Kondominium Jepang',
        'statusLabel'   => 'Ongoing · >5 Type',
        'title'         => 'Century Tobudobutsukoen "BLUE SKY RESIDENCE"',
        'location'      => 'Saitama, Jepang',
        'developer'     => 'Iida Sangyo Co., Ltd.',
        'summary'       => 'Kondominium oleh Iida Sangyo yang menghadap ke arah selatan dengan pemandangan Gunung Fuji dan lebih dari 5 tipe unit.',
        'highlights'    => array(
            'Orientasi unit menghadap ke selatan untuk pencahayaan optimal',
            'Panorama langsung menuju Gunung Fuji',
            'Menawarkan >5 pilihan tipe tata ruang unit',
        ),
        'specs'         => array(
            array( 'Pengembang Grup', 'Iida Sangyo Co., Ltd.' ),
            array( 'Orientasi & Panorama', 'Menghadap Selatan & Pemandangan Gunung Fuji' ),
            array( 'Variasi Unit', '>5 Type' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 20' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'condo-century-tobu.webp',
                'alt'   => 'Kondominium Century Tobudobutsukoen BLUE SKY RESIDENCE',
                'label' => 'Tampak Bangunan',
                'w'     => 980,
                'h'     => 979,
            ),
        ),
    ),
    array(
        'id'            => 'suncradle-nippori',
        'category'      => 'japan-condo',
        'categoryLabel' => 'Kondominium Jepang',
        'statusLabel'   => 'Ongoing · Studio & 2LDK',
        'title'         => 'SUNCRADLE NISHI NIPPORI II · III',
        'location'      => 'Nishi Nippori, Tokyo, Jepang',
        'developer'     => 'Arnest One Co., Ltd.',
        'summary'       => 'Kondominium urban dekat dengan 3 rute kereta di sekitarnya, menyediakan pilihan unit tipe Studio dan 2LDK.',
        'highlights'    => array(
            'Akses mobilitas tinggi dekat 3 rute kereta di sekitarnya',
            'Pilihan tipe unit praktis: Studio dan 2LDK',
        ),
        'specs'         => array(
            array( 'Pengembang Grup', 'Arnest One Co., Ltd.' ),
            array( 'Aksesibilitas', 'Dekat 3 Rute Kereta Sekitarnya' ),
            array( 'Tipe Unit', 'Studio & 2LDK' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 21' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'condo-suncradle-nippori.webp',
                'alt'   => 'Kondominium SUNCRADLE NISHI NIPPORI II dan III oleh Arnest One',
                'label' => 'Tampak Bangunan',
                'w'     => 960,
                'h'     => 1080,
            ),
        ),
    ),
    array(
        'id'            => 'asaka-pieces',
        'category'      => 'japan-condo',
        'categoryLabel' => 'Kondominium Jepang',
        'statusLabel'   => 'Ongoing · >28 Type',
        'title'         => 'ASAKA PIECES PROJECT',
        'location'      => 'Asaka, Saitama, Jepang',
        'developer'     => 'Iida Sangyo Co., Ltd.',
        'summary'       => 'Proyek kondominium dengan konsep "4 Musim di kawasan ASAKA" yang menyediakan lebih dari 28 variasi tipe hunian.',
        'highlights'    => array(
            'Konsep rancangan "4 Musim di kawasan ASAKA"',
            'Ragam pilihan lebih dari 28 tipe unit (>28 Type)',
        ),
        'specs'         => array(
            array( 'Pengembang Grup', 'Iida Sangyo Co., Ltd.' ),
            array( 'Konsep Kawasan', '4 Musim di kawasan ASAKA' ),
            array( 'Variasi Unit', '>28 Type' ),
            array( 'Referensi Profil', 'Company Profile Nov 2023, hal. 22' ),
        ),
        'unitTypes'     => array(),
        'facilities'    => array(),
        'externalUrl'   => '',
        'externalLabel' => '',
        'images'        => array(
            array(
                'url'   => $pdf_img . 'condo-asaka-pieces.webp',
                'alt'   => 'Kondominium ASAKA PIECES PROJECT oleh Iida Sangyo',
                'label' => 'Tampak Bangunan',
                'w'     => 1247,
                'h'     => 1267,
            ),
        ),
    ),
);
?>

<style type="text/css">
    .dev-page {
        background: var(--color-surface);
        color: var(--color-text-body);
    }

    /* Hero */
    .dev-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background: var(--color-deep-navy);
        color: #ffffff;
        padding-top: clamp(56px, 8vw, 96px);
        padding-bottom: clamp(48px, 6vw, 72px);
    }
    .dev-hero-bg {
        position: absolute;
        inset: 0;
        z-index: -1;
    }
    .dev-hero-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.28;
    }
    .dev-hero-scrim {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(10, 31, 44, 0.78) 0%, rgba(10, 31, 44, 0.92) 100%);
    }
    .dev-hero-inner {
        max-width: 48rem;
        margin: 0 auto;
        text-align: center;
    }
    .dev-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 0 0 18px;
        padding: 6px 14px;
        border-radius: var(--radius-pill);
        border: 1px solid rgba(3, 197, 240, 0.35);
        background: rgba(3, 197, 240, 0.12);
        color: var(--color-action-cyan);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }
    .dev-hero-title {
        margin: 0 0 18px;
        font-size: clamp(2rem, 4.4vw, 3.25rem);
        font-weight: 800;
        line-height: 1.1;
        color: #ffffff;
        text-wrap: balance;
    }
    .dev-hero-lede {
        margin: 0 auto 30px;
        max-width: 40rem;
        font-size: clamp(1rem, 1.4vw, 1.125rem);
        line-height: 1.65;
        color: rgba(255, 255, 255, 0.88);
    }
    .dev-hero-actions {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
    }
    .dev-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 11px 22px;
        border-radius: var(--radius-md);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid transparent;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out),
                    transform var(--dur-fast) var(--ease-spring);
    }
    .dev-btn:active { transform: scale(0.98); }
    .dev-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .dev-btn--light {
        background: #ffffff;
        color: var(--color-deep-navy);
    }
    .dev-btn--light:hover {
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
    }
    .dev-btn--outline-dark {
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(255, 255, 255, 0.35);
        color: #ffffff;
    }
    .dev-btn--outline-dark:hover {
        border-color: #ffffff;
        background: rgba(255, 255, 255, 0.14);
    }
    .dev-btn--primary {
        background: var(--color-primary);
        color: #ffffff;
    }
    .dev-btn--primary:hover {
        background: var(--color-primary-strong);
        color: #ffffff;
    }
    .dev-btn--secondary {
        background: var(--color-surface);
        border-color: var(--color-border-strong);
        color: var(--color-text-heading);
    }
    .dev-btn--secondary:hover {
        background: var(--color-surface-sunken);
        border-color: var(--color-primary);
        color: var(--color-primary);
    }
    .dev-btn--disabled,
    .dev-btn--disabled:hover,
    .dev-btn--disabled:active {
        background: var(--color-surface-sunken);
        border-color: var(--color-border-strong);
        color: var(--color-text-muted);
        cursor: not-allowed;
        transform: none;
    }
    .dev-btn[hidden],
    .dev-dialog-thumbs[hidden] {
        display: none;
    }
    .dev-btn .material-symbols-outlined,
    .dev-detail-trigger .material-symbols-outlined,
    .dev-ext-link .material-symbols-outlined {
        font-size: 1.125rem;
        line-height: 1;
    }

    /* Hero summary metrics */
    .dev-metrics-bar {
        margin-top: clamp(32px, 5vw, 52px);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: var(--radius-lg);
        background: rgba(10, 31, 44, 0.85);
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    @media (min-width: 900px) {
        .dev-metrics-bar {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
    .dev-metric-item {
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
    }
    @media (min-width: 900px) {
        .dev-metric-item { border-bottom: 0; }
        .dev-metric-item:last-child { border-right: 0; }
    }
    .dev-metric-label {
        margin: 0 0 4px;
        font-size: var(--text-xs);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgba(255, 255, 255, 0.85);
    }
    .dev-metric-value {
        margin: 0;
        font-family: var(--font-display);
        font-size: clamp(1.35rem, 2.2vw, 1.75rem);
        font-weight: 700;
        color: #ffffff;
        font-variant-numeric: tabular-nums;
    }
    .dev-metric-note {
        margin: 4px 0 0;
        font-size: var(--text-xs);
        color: rgba(255, 255, 255, 0.85);
    }

    /* Catalog Sections & Filter Bar */
    .dev-section {
        padding-top: clamp(48px, 6vw, 80px);
        padding-bottom: clamp(48px, 6vw, 80px);
    }
    .dev-section--sunken {
        background: var(--color-surface-sunken);
        border-top: 1px solid var(--color-border);
        border-bottom: 1px solid var(--color-border);
    }
    .dev-head {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }
    .dev-eyebrow {
        margin: 0 0 8px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .dev-title {
        margin: 0 0 10px;
        font-size: clamp(1.5rem, 2.8vw, 2.25rem);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-subtitle {
        margin: 0;
        max-width: 60ch;
        font-size: var(--text-base);
        color: var(--color-text-body);
    }
    .dev-count-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: var(--radius-pill);
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
        font-size: var(--text-xs);
        font-weight: 700;
        white-space: nowrap;
    }

    .dev-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 36px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--color-border);
    }
    .dev-filter-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 10px 18px;
        border-radius: var(--radius-pill);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        color: var(--color-text-body);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        cursor: pointer;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out);
    }
    .dev-filter-btn:hover {
        border-color: var(--color-primary);
        color: var(--color-primary);
        background: var(--color-surface-sunken);
    }
    .dev-filter-btn.is-active {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #ffffff;
    }
    .dev-filter-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }

    /* Project Cards Grid */
    .dev-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 28px;
    }
    @media (min-width: 768px) {
        .dev-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1120px) {
        .dev-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .dev-card {
        display: flex;
        flex-direction: column;
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-xs);
        scroll-margin-top: 112px;
        transition: border-color var(--dur-base) var(--ease-out-expo),
                    box-shadow var(--dur-base) var(--ease-out-expo),
                    transform var(--dur-base) var(--ease-out-expo);
    }
    .dev-card:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }
    .dev-card.is-hidden {
        display: none;
    }
    .dev-card.is-highlighted {
        outline: 3px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-card-media {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--color-surface-sunken);
        border-bottom: 1px solid var(--color-border);
    }
    .dev-card-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .dev-card-media--portrait img {
        object-position: center 22%;
    }
    .dev-card-body {
        padding: 22px 24px 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .dev-card-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }
    .dev-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        background: var(--color-primary-container);
        color: var(--color-on-primary-container);
        font-size: var(--text-xs);
        font-weight: 700;
    }
    .dev-status-tag {
        display: inline-block;
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        background: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        color: var(--color-text-muted);
        font-size: var(--text-xs);
        font-weight: 600;
    }
    .dev-card-title {
        margin: 0 0 6px;
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--color-text-heading);
        line-height: 1.25;
    }
    .dev-card-dev {
        margin: 0 0 12px;
        font-size: var(--text-xs);
        font-weight: 600;
        color: var(--color-text-muted);
    }
    .dev-card-desc {
        margin: 0 0 18px;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }
    .dev-card-foot {
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid var(--color-border);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }
    .dev-detail-trigger {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        min-height: 44px;
        padding: 8px 12px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-primary);
        background: var(--color-surface);
        color: var(--color-primary);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        cursor: pointer;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out);
    }
    .dev-detail-trigger:hover {
        background: var(--color-primary);
        color: #ffffff;
    }
    .dev-detail-trigger:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-ext-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        min-height: 44px;
        padding: 8px 10px;
        border-radius: var(--radius-md);
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 600;
        line-height: 1.25;
        color: var(--color-primary);
        text-decoration: underline;
        text-underline-offset: 3px;
    }
    .dev-ext-link:hover {
        color: var(--color-primary-strong);
    }
    .dev-ext-link:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-ext-link--disabled,
    .dev-ext-link--disabled:hover {
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface-sunken);
        color: var(--color-text-muted);
        text-decoration: none;
        cursor: not-allowed;
    }

    /* Cross-Link Strip to IG SCB, Material Konstruksi, Contact */
    .dev-links-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 900px) {
        .dev-links-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .dev-link-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 24px;
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        text-decoration: none;
        box-shadow: var(--shadow-xs);
        transition: border-color var(--dur-fast) var(--ease-in-out),
                    box-shadow var(--dur-fast) var(--ease-in-out);
    }
    .dev-link-card:hover {
        border-color: var(--color-primary);
        box-shadow: var(--shadow-md);
    }
    .dev-link-card:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-link-card-label {
        margin: 0 0 6px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .dev-link-card-title {
        margin: 0 0 8px;
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-link-card-desc {
        margin: 0 0 16px;
        font-size: var(--text-sm);
        line-height: 1.55;
        color: var(--color-text-body);
    }
    .dev-link-card-cta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--color-primary);
    }

    /* Native Accessible Detail Dialog */
    dialog.dev-dialog {
        width: min(820px, calc(100vw - 24px));
        max-height: min(90vh, 860px);
        margin: auto;
        padding: 0;
        border: 1px solid var(--color-border-strong);
        border-radius: var(--radius-lg);
        background: var(--color-surface);
        color: var(--color-text-body);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        overscroll-behavior: contain;
    }
    dialog.dev-dialog::backdrop {
        background: rgba(10, 31, 44, 0.72);
        backdrop-filter: blur(4px);
    }
    .dev-dialog-shell {
        display: flex;
        flex-direction: column;
        max-height: min(90vh, 860px);
    }
    .dev-dialog-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 24px;
        background: var(--color-surface);
        border-bottom: 1px solid var(--color-border);
    }
    .dev-dialog-eyebrow {
        margin: 0 0 4px;
        font-size: var(--text-xs);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--color-primary);
    }
    .dev-dialog-title {
        margin: 0;
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-dialog-close {
        flex: 0 0 auto;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        color: var(--color-text-heading);
        cursor: pointer;
    }
    .dev-dialog-close:hover {
        background: var(--color-surface-sunken);
        border-color: var(--color-primary);
        color: var(--color-primary);
    }
    .dev-dialog-close:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-dialog-body {
        padding: 24px;
        overflow-y: auto;
        overscroll-behavior: contain;
        display: grid;
        gap: 20px;
    }
    .dev-dialog-image-box {
        border-radius: var(--radius-md);
        overflow: hidden;
        border: 1px solid var(--color-border);
        background: var(--color-surface-sunken);
    }
    .dev-dialog-image-box img {
        width: 100%;
        max-height: 420px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
        background: var(--color-surface-sunken);
    }
    .dev-dialog-thumbs {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }
    .dev-thumb-btn {
        min-height: 44px;
        padding: 8px 14px;
        border-radius: var(--radius-md);
        border: 1px solid var(--color-border-strong);
        background: var(--color-surface);
        color: var(--color-text-body);
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 600;
        cursor: pointer;
    }
    .dev-thumb-btn.is-active {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #ffffff;
    }
    .dev-thumb-btn:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .dev-dialog-summary {
        margin: 0;
        font-size: var(--text-base);
        line-height: 1.65;
        color: var(--color-text-body);
    }
    .dev-dialog-panel {
        padding: 18px 20px;
        border-radius: var(--radius-md);
        background: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
    }
    .dev-dialog-panel-title {
        margin: 0 0 12px;
        font-size: var(--text-sm);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-spec-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px 24px;
        margin: 0;
    }
    @media (min-width: 640px) {
        .dev-spec-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .dev-spec-row {
        display: flex;
        flex-direction: column;
        padding-bottom: 8px;
        border-bottom: 1px solid var(--color-border);
    }
    .dev-spec-row dt {
        font-size: var(--text-xs);
        font-weight: 600;
        color: var(--color-text-muted);
    }
    .dev-spec-row dd {
        margin: 2px 0 0;
        font-size: var(--text-sm);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-unit-table {
        width: 100%;
        border-collapse: collapse;
        font-size: var(--text-sm);
        background: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-sm);
        overflow: hidden;
    }
    .dev-unit-table th,
    .dev-unit-table td {
        padding: 10px 12px;
        text-align: left;
        border-bottom: 1px solid var(--color-border);
    }
    .dev-unit-table th {
        background: var(--color-surface-sunken);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .dev-unit-table td {
        color: var(--color-text-body);
    }
    .dev-facility-list {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .dev-facility-chip {
        padding: 6px 12px;
        border-radius: var(--radius-pill);
        background: var(--color-surface);
        border: 1px solid var(--color-border-strong);
        color: var(--color-text-heading);
        font-size: var(--text-xs);
        font-weight: 600;
    }
    .dev-dialog-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        padding-top: 4px;
    }
</style>

<main id="main-content" class="dev-page">
    <!-- Hero Section -->
    <section class="dev-hero" aria-labelledby="dev-hero-title">
        <div class="dev-hero-bg" aria-hidden="true">
            <img src="<?php echo esc_url( $pdf_img . 'heartful-town-bekasi-facade.webp' ); ?>"
                 alt=""
                 width="1188"
                 height="794"
                 fetchpriority="high"
                 decoding="sync" />
            <div class="dev-hero-scrim"></div>
        </div>

        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="dev-hero-inner">
                <span class="dev-hero-eyebrow">Portofolio Resmi · Iida Group Holdings</span>
                <h1 id="dev-hero-title" class="dev-hero-title">
                    Proyek Perumahan &amp; Kondominium
                </h1>
                <p class="dev-hero-lede">
                    Pengembangan perumahan tapak dan apartemen di Indonesia oleh PT. Perumnas Iida Group bersama Iida Group Holdings, dilengkapi portofolio kondominium serta enam brand rumah utama grup di Jepang.
                </p>
                <div class="dev-hero-actions">
                    <a class="dev-btn dev-btn--light" href="#portfolio-catalog">
                        Jelajahi Portofolio Proyek
                    </a>
                    <a class="dev-btn dev-btn--outline-dark" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                        Konsultasi Penjualan
                    </a>
                </div>
            </div>

            <dl class="dev-metrics-bar" aria-label="Ringkasan skala proyek berdasarkan profil perusahaan">
                <div class="dev-metric-item">
                    <dt class="dev-metric-label">Proyek Indonesia</dt>
                    <dd class="dev-metric-value">4 Kawasan</dd>
                    <p class="dev-metric-note">2 Eksisting &amp; 2 Akan Datang</p>
                </div>
                <div class="dev-metric-item">
                    <dt class="dev-metric-label">Kondominium Jepang</dt>
                    <dd class="dev-metric-value">&plusmn;1.700 Unit</dd>
                    <p class="dev-metric-note">Dipasarkan setiap tahun (hal. 18)</p>
                </div>
                <div class="dev-metric-item">
                    <dt class="dev-metric-label">Pangsa Pasar Jepang</dt>
                    <dd class="dev-metric-value">30%</dd>
                    <p class="dev-metric-note">&plusmn;46.000 rumah terjual per tahun</p>
                </div>
                <div class="dev-metric-item">
                    <dt class="dev-metric-label">Brand Rumah Grup</dt>
                    <dd class="dev-metric-value">6 Brand</dd>
                    <p class="dev-metric-note">Enam pengembang utama di Jepang</p>
                </div>
            </dl>
        </div>
    </section>

    <!-- Main Filterable Portfolio Catalog -->
    <section class="dev-section" id="portfolio-catalog" aria-labelledby="catalog-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="dev-head">
                <div>
                    <p class="dev-eyebrow">Indonesia &amp; Jepang</p>
                    <h2 id="catalog-heading" class="dev-title">Katalog Proyek Hunian</h2>
                    <p class="dev-subtitle">
                        Saring daftar proyek berdasarkan status pengembangan di Indonesia maupun kondominium yang sedang berjalan di Jepang.
                    </p>
                </div>
                <div id="catalog-count" class="dev-count-badge" aria-live="polite">
                    Menampilkan 8 proyek
                </div>
            </div>

            <!-- Category Filter Buttons -->
            <div class="dev-filters" role="group" aria-label="Filter kategori portofolio">
                <button type="button" class="dev-filter-btn is-active" data-filter="all" aria-pressed="true">
                    Semua
                </button>
                <button type="button" class="dev-filter-btn" data-filter="indonesia-existing" aria-pressed="false">
                    Indonesia Eksisting (2)
                </button>
                <button type="button" class="dev-filter-btn" data-filter="indonesia-upcoming" aria-pressed="false">
                    Indonesia Akan Datang (2)
                </button>
                <button type="button" class="dev-filter-btn" data-filter="japan-condo" aria-pressed="false">
                    Kondominium Jepang (4)
                </button>
            </div>

            <!-- Projects Grid -->
            <div id="projects-block" class="dev-projects-block">
                <div class="dev-grid" id="projects-grid">
                    <?php foreach ( $projects as $idx => $proj ) :
                        $primary_img = $proj['images'][0];
                        $is_portrait = ( $primary_img['h'] > $primary_img['w'] );
                    ?>
                        <article id="<?php echo esc_attr( $proj['id'] ); ?>"
                                 class="dev-card"
                                 data-cat="<?php echo esc_attr( $proj['category'] ); ?>">
                            <div class="dev-card-media<?php echo $is_portrait ? ' dev-card-media--portrait' : ''; ?>">
                                <img src="<?php echo esc_url( $primary_img['url'] ); ?>"
                                     alt="<?php echo esc_attr( $primary_img['alt'] ); ?>"
                                     width="<?php echo esc_attr( $primary_img['w'] ); ?>"
                                     height="<?php echo esc_attr( $primary_img['h'] ); ?>"
                                     loading="lazy"
                                     decoding="async" />
                            </div>
                            <div class="dev-card-body">
                                <div class="dev-card-meta">
                                    <span class="dev-badge"><?php echo esc_html( $proj['categoryLabel'] ); ?></span>
                                    <span class="dev-status-tag"><?php echo esc_html( $proj['statusLabel'] ); ?></span>
                                </div>
                                <h3 class="dev-card-title"><?php echo esc_html( $proj['title'] ); ?></h3>
                                <p class="dev-card-dev"><?php echo esc_html( $proj['developer'] ); ?> &middot; <?php echo esc_html( $proj['location'] ); ?></p>
                                <p class="dev-card-desc"><?php echo esc_html( $proj['summary'] ); ?></p>
                                <div class="dev-card-foot">
                                    <button type="button"
                                            class="dev-detail-trigger"
                                            data-project-index="<?php echo esc_attr( $idx ); ?>"
                                            aria-label="Lihat detail proyek <?php echo esc_attr( $proj['title'] ); ?>">
                                        <span>Lihat Detail</span>
                                        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                                    </button>
                                    <?php if ( ! empty( $proj['externalUrl'] ) ) : ?>
                                        <a href="<?php echo esc_url( $proj['externalUrl'] ); ?>"
                                           class="dev-ext-link"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           aria-label="Kunjungi situs resmi <?php echo esc_attr( $proj['title'] ); ?> (tab baru)">
                                            <span>Kunjungi Situs</span>
                                            <span class="material-symbols-outlined" aria-hidden="true">open_in_new</span>
                                        </a>
                                    <?php else : ?>
                                        <?php // TODO: Aktifkan tautan situs proyek saat website resmi tersedia. ?>
                                        <button type="button"
                                                class="dev-ext-link dev-ext-link--disabled"
                                                disabled
                                                aria-disabled="true"
                                                title="Situs belum tersedia">
                                            Situs Belum Tersedia
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Cross-Navigation Strip -->
    <section class="dev-section dev-section--sunken" aria-labelledby="related-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="dev-head">
                <div>
                    <p class="dev-eyebrow">Teknologi &amp; Layanan Terkait</p>
                    <h2 id="related-heading" class="dev-title">Eksplorasi Produk &amp; Konsultasi Proyek</h2>
                </div>
            </div>

            <div class="dev-links-grid">
                <a href="<?php echo esc_url( home_url( '/product-osaka-strong-cb/' ) ); ?>" class="dev-link-card">
                    <div>
                        <p class="dev-link-card-label">Teknologi Konstruksi</p>
                        <h3 class="dev-link-card-title">IG Strong Concrete Block (IG SCB)</h3>
                        <p class="dev-link-card-desc">
                            Blok beton interlock tahan gempa hingga magnitudo &gt; 8,0 dengan Paten IDP000069171 dan sertifikasi SNI.
                        </p>
                    </div>
                    <span class="dev-link-card-cta">
                        Lihat Spesifikasi IG SCB
                        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                    </span>
                </a>

                <a href="<?php echo esc_url( home_url( '/product-construction-material/' ) ); ?>" class="dev-link-card">
                    <div>
                        <p class="dev-link-card-label">Material Procurement Business</p>
                        <h3 class="dev-link-card-title">Katalog Material Konstruksi</h3>
                        <p class="dev-link-card-desc">
                            Suplai material bangunan terstandarisasi dari merek Rucika, RB Shera, Granito, Terraco, dan Dusaspun.
                        </p>
                    </div>
                    <span class="dev-link-card-cta">
                        Buka Katalog Material
                        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                    </span>
                </a>

                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="dev-link-card">
                    <div>
                        <p class="dev-link-card-label">Hubungi Kami</p>
                        <h3 class="dev-link-card-title">Konsultasi Proyek &amp; Kemitraan</h3>
                        <p class="dev-link-card-desc">
                            Terhubung dengan kantor pusat PT. Perumnas Iida Group di Bekasi untuk pertanyaan proyek atau pengadaan.
                        </p>
                    </div>
                    <span class="dev-link-card-cta">
                        Kirim Pertanyaan
                        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Accessible Detail Dialog -->
    <dialog id="dev-project-dialog" class="dev-dialog" aria-labelledby="dev-dialog-title" aria-describedby="dev-dialog-desc">
        <div class="dev-dialog-shell">
            <div class="dev-dialog-head">
                <div>
                    <p id="dev-dialog-category" class="dev-dialog-eyebrow"></p>
                    <h3 id="dev-dialog-title" class="dev-dialog-title"></h3>
                </div>
                <button type="button" id="dev-dialog-close" class="dev-dialog-close" aria-label="Tutup detail proyek">
                    <span class="material-symbols-outlined" aria-hidden="true">close</span>
                </button>
            </div>
            <div class="dev-dialog-body">
                <div>
                    <div class="dev-dialog-image-box">
                        <img id="dev-dialog-img" src="" alt="" />
                    </div>
                    <div id="dev-dialog-thumbs" class="dev-dialog-thumbs" hidden></div>
                </div>

                <p id="dev-dialog-desc" class="dev-dialog-summary"></p>

                <div id="dev-dialog-specs-wrap" class="dev-dialog-panel">
                    <h4 class="dev-dialog-panel-title">Informasi &amp; Spesifikasi Resmi</h4>
                    <dl id="dev-dialog-specs" class="dev-spec-grid"></dl>
                </div>

                <div id="dev-dialog-units-wrap" class="dev-dialog-panel" hidden>
                    <h4 class="dev-dialog-panel-title">Tipe Unit Apartemen</h4>
                    <div style="overflow-x: auto;">
                        <table class="dev-unit-table">
                            <thead>
                                <tr>
                                    <th>Tipe Unit</th>
                                    <th>Luas Nett</th>
                                    <th>Luas Semigross</th>
                                </tr>
                            </thead>
                            <tbody id="dev-dialog-units-body"></tbody>
                        </table>
                    </div>
                </div>

                <div id="dev-dialog-facilities-wrap" class="dev-dialog-panel" hidden>
                    <h4 class="dev-dialog-panel-title">Fasilitas Kawasan (6 Fasilitas)</h4>
                    <ul id="dev-dialog-facilities" class="dev-facility-list"></ul>
                </div>

                <div class="dev-dialog-actions">
                    <a id="dev-dialog-ext-link"
                       href="#"
                       class="dev-btn dev-btn--primary"
                       target="_blank"
                       rel="noopener noreferrer"
                       hidden>
                        <span>Kunjungi Situs Resmi</span>
                        <span class="material-symbols-outlined" aria-hidden="true">open_in_new</span>
                    </a>
                    <?php // TODO: Aktifkan tombol situs resmi di modal saat URL proyek tersedia. ?>
                    <button type="button"
                            id="dev-dialog-ext-disabled"
                            class="dev-btn dev-btn--disabled"
                            disabled
                            aria-disabled="true"
                            hidden>
                        Situs Belum Tersedia
                    </button>
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="dev-btn dev-btn--primary">
                        Hubungi Tim Penjualan
                    </a>
                    <button type="button" id="dev-dialog-dismiss" class="dev-btn dev-btn--secondary">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </dialog>
</main>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
(function() {
    const projectsData = <?php echo wp_json_encode( $projects, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>;

    const filterButtons = Array.from(document.querySelectorAll('.dev-filter-btn'));
    const projectCards  = Array.from(document.querySelectorAll('#projects-grid .dev-card'));
    const countBadge    = document.getElementById('catalog-count');

    const dialog        = document.getElementById('dev-project-dialog');
    const dialogClose   = document.getElementById('dev-dialog-close');
    const dialogDismiss = document.getElementById('dev-dialog-dismiss');
    const dialogCat     = document.getElementById('dev-dialog-category');
    const dialogTitle   = document.getElementById('dev-dialog-title');
    const dialogImg     = document.getElementById('dev-dialog-img');
    const dialogThumbs  = document.getElementById('dev-dialog-thumbs');
    const dialogDesc    = document.getElementById('dev-dialog-desc');
    const dialogSpecs   = document.getElementById('dev-dialog-specs');
    const unitsWrap     = document.getElementById('dev-dialog-units-wrap');
    const unitsBody     = document.getElementById('dev-dialog-units-body');
    const facWrap       = document.getElementById('dev-dialog-facilities-wrap');
    const facList       = document.getElementById('dev-dialog-facilities');
    const extLink       = document.getElementById('dev-dialog-ext-link');
    const extDisabled   = document.getElementById('dev-dialog-ext-disabled');

    let lastTriggerEl = null;

    function applyFilter(filterKey) {
        filterButtons.forEach((btn) => {
            const active = btn.dataset.filter === filterKey;
            btn.classList.toggle('is-active', active);
            btn.setAttribute('aria-pressed', active ? 'true' : 'false');
        });

        let visibleCount = 0;

        projectCards.forEach((card) => {
            const matches = (filterKey === 'all' || card.dataset.cat === filterKey);
            card.classList.toggle('is-hidden', !matches);
            if (matches) {
                visibleCount += 1;
            }
        });

        if (countBadge) {
            countBadge.textContent = 'Menampilkan ' + visibleCount + ' proyek';
        }
    }

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            applyFilter(btn.dataset.filter);
        });
    });

    function clearElement(el) {
        while (el.firstChild) {
            el.removeChild(el.firstChild);
        }
    }

    function openProjectDialog(index, triggerEl) {
        const proj = projectsData[index];
        if (!proj || !dialog) {
            return;
        }

        lastTriggerEl = triggerEl || document.activeElement;

        dialogCat.textContent = proj.categoryLabel + ' · ' + proj.statusLabel;
        dialogTitle.textContent = proj.title;
        dialogDesc.textContent = proj.summary;

        // Primary image + thumbnail switcher when >1 image exists
        const imgs = proj.images || [];
        clearElement(dialogThumbs);
        if (imgs.length > 0) {
            dialogImg.src = imgs[0].url;
            dialogImg.alt = imgs[0].alt;
        }
        if (imgs.length > 1) {
            dialogThumbs.hidden = false;
            imgs.forEach((imgObj, i) => {
                const thumbBtn = document.createElement('button');
                thumbBtn.type = 'button';
                thumbBtn.className = 'dev-thumb-btn' + (i === 0 ? ' is-active' : '');
                thumbBtn.textContent = imgObj.label;
                thumbBtn.addEventListener('click', () => {
                    dialogImg.src = imgObj.url;
                    dialogImg.alt = imgObj.alt;
                    Array.from(dialogThumbs.children).forEach((b, bi) => {
                        b.classList.toggle('is-active', bi === i);
                    });
                });
                dialogThumbs.appendChild(thumbBtn);
            });
        } else {
            dialogThumbs.hidden = true;
        }

        // Specs list
        clearElement(dialogSpecs);
        (proj.specs || []).forEach((pair) => {
            const row = document.createElement('div');
            row.className = 'dev-spec-row';
            const dt = document.createElement('dt');
            dt.textContent = pair[0];
            const dd = document.createElement('dd');
            dd.textContent = pair[1];
            row.appendChild(dt);
            row.appendChild(dd);
            dialogSpecs.appendChild(row);
        });

        // Apartment unit types (Heartful Tower Bekasi)
        clearElement(unitsBody);
        if (proj.unitTypes && proj.unitTypes.length > 0) {
            unitsWrap.hidden = false;
            proj.unitTypes.forEach((u) => {
                const tr = document.createElement('tr');
                const tdType = document.createElement('td');
                tdType.textContent = u.type;
                const tdNett = document.createElement('td');
                tdNett.textContent = u.nett;
                const tdSemi = document.createElement('td');
                tdSemi.textContent = u.semigross;
                tr.appendChild(tdType);
                tr.appendChild(tdNett);
                tr.appendChild(tdSemi);
                unitsBody.appendChild(tr);
            });
        } else {
            unitsWrap.hidden = true;
        }

        // Facilities (Heartful Tower Bekasi)
        clearElement(facList);
        if (proj.facilities && proj.facilities.length > 0) {
            facWrap.hidden = false;
            proj.facilities.forEach((f) => {
                const li = document.createElement('li');
                li.className = 'dev-facility-chip';
                li.textContent = f;
                facList.appendChild(li);
            });
        } else {
            facWrap.hidden = true;
        }

        // External link if present
        if (proj.externalUrl) {
            extLink.hidden = false;
            extLink.href = proj.externalUrl;
            const spanLabel = extLink.querySelector('span');
            if (spanLabel) {
                spanLabel.textContent = proj.externalLabel || 'Kunjungi Situs Resmi';
            }
            if (extDisabled) {
                extDisabled.hidden = true;
            }
        } else {
            // TODO: Aktifkan tombol situs resmi di modal saat URL proyek tersedia.
            extLink.hidden = true;
            extLink.removeAttribute('href');
            if (extDisabled) {
                extDisabled.hidden = false;
            }
        }

        document.body.style.overflow = 'hidden';
        if (typeof dialog.showModal === 'function') {
            dialog.showModal();
        } else {
            dialog.setAttribute('open', '');
        }
        dialogClose.focus();
    }

    function closeProjectDialog() {
        if (!dialog) {
            return;
        }
        if (typeof dialog.close === 'function' && dialog.open) {
            dialog.close();
        } else {
            dialog.removeAttribute('open');
            document.body.style.overflow = '';
            if (lastTriggerEl && typeof lastTriggerEl.focus === 'function') {
                lastTriggerEl.focus();
            }
        }
    }

    document.querySelectorAll('.dev-detail-trigger').forEach((btn) => {
        btn.addEventListener('click', () => {
            const idx = parseInt(btn.dataset.projectIndex, 10);
            openProjectDialog(idx, btn);
        });
    });

    if (dialog) {
        dialogClose.addEventListener('click', closeProjectDialog);
        dialogDismiss.addEventListener('click', closeProjectDialog);
        dialog.addEventListener('click', (e) => {
            if (e.target === dialog) {
                closeProjectDialog();
            }
        });
        dialog.addEventListener('close', () => {
            document.body.style.overflow = '';
            if (lastTriggerEl && typeof lastTriggerEl.focus === 'function') {
                lastTriggerEl.focus();
            }
        });
    }

    // Hash anchor handling (e.g. /development/#bekasi or #heartful-tower-bekasi)
    function handleHashTarget() {
        if (!window.location.hash) {
            return;
        }
        const targetId = window.location.hash.substring(1);
        const targetEl = document.getElementById(targetId);
        if (!targetEl || !targetEl.dataset || !targetEl.dataset.cat) {
            return;
        }
        applyFilter('all');
        const motionBehavior = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';
        setTimeout(() => {
            targetEl.scrollIntoView({ behavior: motionBehavior, block: 'center' });
            targetEl.classList.add('is-highlighted');
            setTimeout(() => {
                targetEl.classList.remove('is-highlighted');
            }, 2500);
        }, 200);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', handleHashTarget);
    } else {
        handleHashTarget();
    }
    window.addEventListener('hashchange', handleHashTarget);
})();
</script>

<?php
get_footer();
?>
