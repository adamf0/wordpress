<?php
/**
 * Front Page — PT Perumnas Iida Group
 *
 * All copy, metrics and entity names are sourced from the official
 * corporate profile "Indonesia_Company profile_20231025.pdf" (Nov 2023).
 * No placeholder or invented content.
 */

get_header();

global $wpdb;
$table_hero  = $wpdb->prefix . 'igh_homepage_hero';
$table_slides = $wpdb->prefix . 'igh_homepage_hero_slides';

$hero   = $wpdb->get_row( "SELECT * FROM $table_hero WHERE id = 1", ARRAY_A );
$slides = $wpdb->get_results( "SELECT * FROM $table_slides ORDER BY sort_order ASC", ARRAY_A );

$img = get_template_directory_uri() . '/images/layout/';

/**
 * Hero video resolution.
 *
 * Priority: value saved in the admin (Homepage Hero → Section 1) → bundled
 * fallback asset. The corporate video is intentionally excluded from the
 * media library, so the fallback keeps the hero working even when the saved
 * URL no longer resolves (e.g. after a host or domain migration).
 */
$hero_video_fallback = '/wp-content/uploads/2026/06/Preview-IGHD-CP-r5-Full-Version_Compressed.mp4';
$hero_video_url      = ! empty( $hero['video_url'] ) ? $hero['video_url'] : '';

// Normalise a stored URL into an absolute filesystem path.
$resolve_hero_video = static function ( $url ) {
    if ( empty( $url ) ) {
        return '';
    }

    // Root-relative or bare path — resolve straight against the WP root.
    if ( strpos( $url, 'http' ) !== 0 ) {
        return ABSPATH . ltrim( $url, '/' );
    }

    $path        = wp_parse_url( $url, PHP_URL_PATH );
    $uploads     = wp_get_upload_dir();
    $uploads_uri = wp_parse_url( $uploads['baseurl'], PHP_URL_PATH ); // e.g. /wordpress/wp-content/uploads

    // Strip the site's own uploads prefix, then map it onto the filesystem.
    if ( $uploads_uri && strpos( $path, $uploads_uri ) === 0 ) {
        return untrailingslashit( $uploads['basedir'] ) . substr( $path, strlen( $uploads_uri ) );
    }

    // Fall back to the WordPress root for any other same-site URL.
    $home_uri = wp_parse_url( home_url(), PHP_URL_PATH );
    if ( $home_uri && strpos( $path, $home_uri ) === 0 ) {
        return ABSPATH . ltrim( substr( $path, strlen( $home_uri ) ), '/' );
    }

    return '';
};

$hero_video_path = $resolve_hero_video( $hero_video_url );

// Fall back to the bundled asset when the stored URL does not resolve.
if ( ! $hero_video_path || ! file_exists( $hero_video_path ) ) {
    $hero_video_url  = $hero_video_fallback;
    $hero_video_path = $resolve_hero_video( $hero_video_url );
}

$hero_video_exists = ( $hero_video_path && file_exists( $hero_video_path ) );
?>

<main id="main-content">

    <!-- ============================================================
         HERO

         Video Hero Mode — transparent background with a centered video,
         mirroring https://www.perumnasiidagroup.com/.
         The hero copy is kept as the accessible content layer while the
         corporate video plays as the centrepiece.
         ============================================================ -->
    <section class="hero<?php echo $hero_video_exists ? ' hero--video-center' : ''; ?>" aria-labelledby="hero-title">
        <?php if ( $hero_video_exists ) : ?>
            <div class="hero-stage">
                <div class="hero-video-frame">
                    <video id="hero-video"
                           class="hero-video"
                           autoplay muted loop playsinline preload="auto"
                           disablepictureinpicture
                           controlslist="nodownload nofullscreen noremoteplayback"
                           poster="<?php echo esc_url( $img . 'lh3_5b0daa7c91a4685f526611b90707ee34.webp' ); ?>">
                        <source src="<?php echo esc_url( $hero_video_url ); ?>" type="video/mp4">
                    </video>

                    <button type="button"
                            id="video-sound-btn"
                            class="video-sound-btn"
                            aria-pressed="false"
                            aria-label="Nyalakan suara video">
                        <span class="material-symbols-outlined" id="video-sound-icon" aria-hidden="true">volume_off</span>
                        <span id="video-sound-text">Unmute</span>
                    </button>
                </div>
            </div>
        <?php else : ?>
            <div class="hero-media">
                <img class="hero-image"
                     src="<?php echo esc_url( $img . 'lh3_5b0daa7c91a4685f526611b90707ee34.webp' ); ?>"
                     alt="Perumahan PT Perumnas Iida Group"
                     width="512" height="512"
                     fetchpriority="high" decoding="sync">
                <div class="hero-scrim" aria-hidden="true"></div>
            </div>
        <?php endif; ?>
    </section>

    <?php $pdf_img = get_template_directory_uri() . '/images/pdf/'; ?>

    <!-- ============================================================
         ABOUT — PT Perumnas Iida Group facts, Visi/Misi & 3 Ciri (PDF p.5, 7)
         ============================================================ -->
    <section class="section section--light" id="about" aria-labelledby="hero-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="about-grid">

                <div class="about-copy reveal">
                    <p class="eyebrow">Profil Perusahaan &middot; Joint Venture Indonesia</p>
                    <h1 id="hero-title" class="section-title">
                        PT. Perumnas Iida Group
                    </h1>
                    <p class="section-lede">
                        Didirikan pada 2017 sebagai perusahaan <em>joint venture</em> antara
                        <strong>Iida Sangyo Co., Ltd.</strong> (93%, anak usaha Iida Group Holdings)
                        dan <strong>PT. Propernas Griya Utama</strong> (7%, anak usaha Perum Perumnas).
                        Berfokus pada pengembangan properti perumahan (<em>estate</em>) berkualitas
                        dengan teknologi Jepang yang terjangkau bagi masyarakat Indonesia.
                    </p>

                    <dl class="fact-list">
                        <div class="fact">
                            <dt>Tahun berdiri</dt>
                            <dd>2017 (Masuk Indonesia: 2016)</dd>
                        </div>
                        <div class="fact">
                            <dt>Presiden Direktur</dt>
                            <dd>Kenichiro Watanabe</dd>
                        </div>
                        <div class="fact">
                            <dt>Struktur Pemegang Saham</dt>
                            <dd>Iida Sangyo (93%) &amp; PT Propernas Griya Utama (7%)</dd>
                        </div>
                        <div class="fact">
                            <dt>Anak Perusahaan &amp; Kantor</dt>
                            <dd>PT. Abdiluhur Kawuloalit (99,99%) &middot; Jl. Caringin Raya, RT.010/RW.002, Rawalumbu, Kota Bekasi, Jawa Barat</dd>
                        </div>
                    </dl>

                    <div class="link-row">
                        <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="link-arrow">
                            Selengkapnya Company Profile
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16m0 0-6-6m6 6-6 6" />
                            </svg>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/Indonesia_Company%20profile_20231025.pdf' ) ); ?>" target="_blank" rel="noopener noreferrer" class="link-arrow link-arrow--secondary">
                            Unduh Company Profile (PDF)
                        </a>
                    </div>
                </div>

                <div class="about-media reveal">
                    <img src="<?php echo esc_url( $pdf_img . 'botania-2-residence.webp' ); ?>"
                         alt="Botania 2 Residence, proyek perumahan PT Perumnas Iida Group di Indonesia"
                         width="1218" height="994"
                         loading="lazy" decoding="async">
                </div>
            </div>

            <!-- Vision & Mission (PDF p.7) -->
            <div class="vm-grid">
                <article class="vm-card reveal">
                    <p class="vm-label">Visi</p>
                    <p class="vm-text">
                        &ldquo;Menyediakan banyak perumahan dengan kualitas baik dan harga
                        terjangkau kepada masyarakat.&rdquo;
                    </p>
                </article>
                <article class="vm-card reveal">
                    <p class="vm-label">Misi</p>
                    <p class="vm-text">
                        &ldquo;Melalui pendirian pabrik, memperluas pembangunan rumah ramah
                        lingkungan dan aman secara kualitas untuk menyediakan banyak
                        perumahan dengan harga terjangkau kepada masyarakat.&rdquo;
                    </p>
                </article>
            </div>

            <!-- Corporate Slogan & 3 Pillars (PDF p.5) -->
            <div class="pillars-panel reveal">
                <div class="pillars-slogan">
                    <p class="vm-label">Slogan Perusahaan</p>
                    <p class="pillars-quote">&ldquo;Realizing a society where anyone can own a house&rdquo;</p>
                    <p class="pillars-quote-id">Mewujudkan masyarakat di mana setiap orang dapat memiliki rumah.</p>
                </div>
                <div class="pillars-list" aria-label="Tiga ciri perusahaan Iida Group">
                    <div class="pillar-item">
                        <span class="pillar-num">01</span>
                        <strong>Lokasi yang Strategis</strong>
                        <span>Pemilihan lahan yang dekat pusat aktivitas dan akses transportasi.</span>
                    </div>
                    <div class="pillar-item">
                        <span class="pillar-num">02</span>
                        <strong>Harga yang Terjangkau</strong>
                        <span>Efisiensi rantai pasok terintegrasi dari hulu ke hilir.</span>
                    </div>
                    <div class="pillar-item">
                        <span class="pillar-num">03</span>
                        <strong>Kualitas yang Tinggi</strong>
                        <span>Standar mutu Jepang dengan inspeksi ketat hingga pascaserah terima.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         GLOBAL & INDONESIA GROUP SCALE (PDF p.3-4, 7-8)
         ============================================================ -->
    <section class="section section--sunken" id="group-scale" aria-labelledby="group-scale-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="group-grid">
                <div class="group-media reveal">
                    <img src="<?php echo esc_url( $pdf_img . 'iida-hq-tokyo.webp' ); ?>"
                         alt="Kantor Pusat Iida Group Holdings Co.,Ltd. di Musashino-shi, Tokyo, Jepang"
                         width="953" height="863"
                         loading="lazy" decoding="async">
                </div>
                <div class="group-copy reveal">
                    <p class="eyebrow">Jaringan Global &amp; Indonesia</p>
                    <h2 id="group-scale-title" class="section-title">
                        Iida Group Holdings Co., Ltd.
                    </h2>
                    <p class="section-lede">
                        Dibentuk pada 1 November 2013 melalui konsolidasi enam pengembang rumah utama
                        di Musashino-shi, Tokyo, Jepang, dan dipimpin oleh President &amp; Representative
                        Director <strong>Masashi Kanei</strong>. Grup memasuki pasar Indonesia pada 2016
                        melalui pendirian <strong>PT. Iida Group Holdings</strong> yang membawahi
                        PT. Perumnas Iida Group, PT. Hajime Indonesia Jaya, PT. Ione Home Indonesia,
                        dan PT. Tact Home Indonesia.
                    </p>

                    <dl class="scale-metrics">
                        <div class="scale-metric">
                            <dt>Karyawan Grup</dt>
                            <dd>13.353</dd>
                            <span>Per 31 Maret 2023</span>
                        </div>
                        <div class="scale-metric">
                            <dt>Cabang Penjualan</dt>
                            <dd>400+</dd>
                            <span>Tersebar di seluruh Jepang</span>
                        </div>
                        <div class="scale-metric">
                            <dt>Pangsa Pasar Jepang</dt>
                            <dd>30%</dd>
                            <span>&plusmn;46.000 rumah/tahun (1 dari 3 pembeli)</span>
                        </div>
                        <div class="scale-metric">
                            <dt>Kondominium / Tahun</dt>
                            <dd>&plusmn;1.700</dd>
                            <span>Unit dikembangkan tiap tahun di Jepang</span>
                        </div>
                    </dl>

                    <div class="link-row">
                        <a href="<?php echo esc_url( home_url( '/group-company/' ) ); ?>" class="link-arrow">
                            Lihat struktur Group Network
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16m0 0-6-6m6 6-6 6" />
                            </svg>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/about-us/overview/' ) ); ?>" class="link-arrow link-arrow--secondary">
                            Dewan Direksi &amp; Komisaris
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         BUSINESS SCHEME — integrated value chain & other businesses (PDF p.13, 23-24)
         ============================================================ -->
    <section class="section section--light" id="business" aria-labelledby="business-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="section-head reveal">
                <p class="eyebrow">Skema Bisnis</p>
                <h2 id="business-title" class="section-title">
                    Satu sistem terintegrasi, dari R&amp;D hingga layanan purna jual
                </h2>
                <p class="section-lede">
                    Produk yang sampai ke tangan pelanggan ditangani dalam satu kesatuan
                    sistem yang telah terintegrasi secara menyeluruh.
                </p>
            </header>

            <ol class="chain reveal" aria-label="Tahapan rantai bisnis">
                <li class="chain-step"><span class="chain-num">01</span>R&amp;D</li>
                <li class="chain-step"><span class="chain-num">02</span>Pembelian Lahan</li>
                <li class="chain-step"><span class="chain-num">03</span>Design</li>
                <li class="chain-step"><span class="chain-num">04</span>Material Procurement</li>
                <li class="chain-step"><span class="chain-num">05</span>Construction</li>
                <li class="chain-step"><span class="chain-num">06</span>Sales</li>
                <li class="chain-step"><span class="chain-num">07</span>After Sales Service</li>
            </ol>

            <div class="cap-grid">
                <article class="cap-card reveal">
                    <h3 class="cap-title">Design</h3>
                    <p class="cap-text">
                        Bangunan telah terstandarisasi sehingga tidak memerlukan keterampilan khusus dalam
                        perancangan; perancangan berjalan lebih singkat sekaligus menekan biaya.
                    </p>
                </article>
                <article class="cap-card reveal">
                    <h3 class="cap-title">Construction</h3>
                    <p class="cap-text">
                        Proses konstruksi telah terstandarisasi sehingga tidak bergantung pada keterampilan khusus
                        lapangan, memungkinkan pembangunan lebih cepat dengan biaya efisien.
                    </p>
                </article>
                <article class="cap-card reveal">
                    <h3 class="cap-title">Sales</h3>
                    <p class="cap-text">
                        Produk yang terstandarisasi memudahkan penjelasan yang transparan kepada
                        pelanggan mengenai spesifikasi serta keunggulan setiap unit hunian.
                    </p>
                </article>
                <article class="cap-card reveal">
                    <h3 class="cap-title">After Sales Service</h3>
                    <p class="cap-text">
                        Standarisasi komponen rumah menyederhanakan proses pemeliharaan purna jual
                        sehingga kualitas terawat dengan beban biaya perawatan yang terkendali.
                    </p>
                </article>
            </div>

            <div class="other-biz-bar reveal">
                <div>
                    <p class="vm-label">Diversifikasi Lini Bisnis Grup</p>
                    <p class="other-biz-desc">
                        Selain pengembangan perumahan, grup menjalankan <strong>Contract Construction</strong>,
                        <strong>Material Procurement Business</strong>, lapangan golf <strong>Eastwood Country Club (107 Ha)</strong>,
                        <strong>Seawood Hotel Okinawa (13 Ha, 169 kamar)</strong>, serta pembiayaan perumahan
                        <strong>Family Life Service (&gt;75.000 kali peminjaman)</strong>.
                    </p>
                </div>
                <div class="link-row">
                    <a href="<?php echo esc_url( home_url( '/our-business/' ) ); ?>" class="link-arrow">
                        Eksplorasi Our Business
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16m0 0-6-6m6 6-6 6" />
                        </svg>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/product-construction-material/' ) ); ?>" class="link-arrow link-arrow--secondary">
                        Katalog Material Konstruksi
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         IG SCB — Iida Group Strong Concrete Block (PDF p.10-12)
         ============================================================ -->
    <section class="section section--dark" id="technology" aria-labelledby="tech-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="tech-grid">

                <div class="tech-copy reveal">
                    <p class="eyebrow eyebrow--on-dark">Teknologi Konstruksi</p>
                    <h2 id="tech-title" class="section-title section-title--on-dark">
                        IG SCB: Iida Group Strong Concrete Block
                    </h2>
                    <p class="section-lede section-lede--on-dark">
                        Bahan bangunan khusus yang dirancang dengan teknologi tersendiri dan telah
                        melalui uji ketahanan gempa hingga magnitudo &gt; 8,0. Produksi di pabrik
                        Indonesia diawasi ketat oleh tenaga ahli Jepang guna menjaga standar kualitas.
                    </p>

                    <ul class="tech-points">
                        <li>
                            <strong>CB Interlocking Sistem</strong>
                            Mempermudah proses instalasi presisi dan meningkatkan ketahanan dinding terhadap gaya gempa.
                        </li>
                        <li>
                            <strong>Pengembangan Balok Khusus</strong>
                            Meningkatkan kekuatan struktural bangunan dengan keseragaman kualitas blok pracetak.
                        </li>
                        <li>
                            <strong>Penggunaan Material Baja</strong>
                            Meringankan beban struktur, memperkuat daya tahan gempa, sekaligus mempercepat konstruksi.
                        </li>
                    </ul>

                    <div class="tech-visuals">
                        <figure class="tech-figure">
                            <img src="<?php echo esc_url( $pdf_img . 'ig-scb-earthquake-diagram.webp' ); ?>"
                                 alt="Diagram uji ketahanan gempa IG Strong Concrete Block hingga magnitudo lebih dari 8,0"
                                 width="879" height="567" loading="lazy" decoding="async">
                            <figcaption>Simulasi ketahanan gempa hingga Magnitudo &gt; 8,0</figcaption>
                        </figure>
                        <figure class="tech-figure">
                            <img src="<?php echo esc_url( $pdf_img . 'ig-scb-mockup-150.webp' ); ?>"
                                 alt="Mockup instalasi struktur CB 15 cm IG Strong Concrete Block"
                                 width="647" height="414" loading="lazy" decoding="async">
                            <figcaption>Pemasangan presisi dengan CB Interlocking Sistem</figcaption>
                        </figure>
                    </div>
                </div>

                <div class="tech-specs reveal">
                    <h3 class="specs-title">Spesifikasi Teknis IG SCB</h3>
                    <dl class="specs-list">
                        <div class="spec">
                            <dt>Jenis Blok</dt>
                            <dd>CB 15 cm (rumah 2 lantai) &middot; CB 10 cm (rumah 1 lantai)</dd>
                        </div>
                        <div class="spec">
                            <dt>Berat Satuan</dt>
                            <dd>&plusmn;12,5 Kg / CB</dd>
                        </div>
                        <div class="spec">
                            <dt>Dimensi (P &times; L &times; T)</dt>
                            <dd>390 &times; 190 &times; 150 mm</dd>
                        </div>
                        <div class="spec">
                            <dt>Compressive Strength</dt>
                            <dd>8 N/mm&sup2;</dd>
                        </div>
                        <div class="spec">
                            <dt>Komposisi Material</dt>
                            <dd>Semen, Pasir, &amp; Ash Stone</dd>
                        </div>
                    </dl>

                    <div class="cert-badge">
                        <p class="cert-label">Sertifikasi &amp; Paten Resmi</p>
                        <p class="cert-value">Nomor Paten: IDP000069171</p>
                        <p class="cert-note">Diberikan 17 Juni 2020 &middot; Tersertifikasi Standar Nasional Indonesia (SNI)</p>
                    </div>

                    <div class="tech-cta">
                        <a href="<?php echo esc_url( home_url( '/product-osaka-strong-cb/' ) ); ?>" class="btn-hero btn-hero--solid">
                            Lihat Katalog Produk IG Strong CB
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         PROJECTS — Authentic Indonesia & Japan portfolio (PDF p.9, 16-22, 26-27)
         ============================================================ -->
    <section class="section section--sunken" id="projects" aria-labelledby="projects-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="section-head reveal">
                <p class="eyebrow">Portofolio Proyek</p>
                <h2 id="projects-title" class="section-title">
                    Proyek Perusahaan di Indonesia &amp; Jepang
                </h2>
                <p class="section-lede">
                    Pengembangan kawasan hunian tapak dan apartemen di Indonesia beserta
                    proyek kondominium unggulan grup yang sedang berjalan di Jepang.
                </p>
            </header>

            <div class="project-grid">

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'botania-2-residence.webp' ); ?>"
                             alt="Botania 2 Residence dengan fasad desain Iida Group"
                             width="1218" height="994"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Eksisting &middot; Indonesia</p>
                        <h3 class="project-name">Botania 2 Residence</h3>
                        <p class="project-desc">
                            Proyek perumahan eksisting di Indonesia dengan pekerjaan desain
                            fasad luar berstandar kualitas Jepang.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'heartful-town-depok-aerial.webp' ); ?>"
                             alt="Kawasan Perumahan Heartful-Town Depok"
                             width="1073" height="605"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Eksisting &middot; Indonesia</p>
                        <h3 class="project-name">Heartful-Town Depok</h3>
                        <p class="project-desc">
                            Kawasan perumahan di Depok dengan cakupan pekerjaan desain
                            fasad luar dan perancangan interior hunian.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'heartful-town-bekasi-facade.webp' ); ?>"
                             alt="Heartful-Town Bekasi proyek 29 unit rumah 1 dan 2 lantai"
                             width="1188" height="794"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Akan Datang &middot; Bekasi</p>
                        <h3 class="project-name">Heartful-Town Bekasi</h3>
                        <p class="project-desc">
                            Tersedia 29 unit rumah pilihan 1 lantai dan 2 lantai; pengerjaan
                            desain fasad dan interior sedang berlangsung.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'heartful-tower-bekasi-exterior.webp' ); ?>"
                             alt="Heartful Tower Bekasi apartemen dengan 30 persen area hijau"
                             width="870" height="1145"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Akan Datang &middot; Bekasi</p>
                        <h3 class="project-name">Heartful Tower Bekasi</h3>
                        <p class="project-desc">
                            Apartemen dengan harga terbaik oleh developer Jepang. Area hijau 30%,
                            pilihan Unit Studio (21,50/25,03 m&sup2;), 1 BR (28,67/33,38 m&sup2;), &amp; 2 BR (37,89/44,11 m&sup2;),
                            dilengkapi Zen Garden, Gym, Kindergarden, Kolam Renang, &amp; Minimarket.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'condo-presis-kumagaya.webp' ); ?>"
                             alt="PRESIS KUMAGAYA GINZA oleh Hajime Construction"
                             width="1073" height="905"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Ongoing &middot; Jepang (Hajime Construction)</p>
                        <h3 class="project-name">PRESIS KUMAGAYA GINZA</h3>
                        <p class="project-desc">
                            Berlokasi di <em>central zone &amp; residential zone</em> dengan pilihan
                            lebih dari 5 tipe unit, termasuk 3LDK+S+FIC+WIC seluas 71,37 m&sup2;.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'condo-century-tobu.webp' ); ?>"
                             alt="Century Tobudobutsukoen Blue Sky Residence dengan panorama Gunung Fuji"
                             width="980" height="979"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Ongoing &middot; Jepang (Iida Sangyo)</p>
                        <h3 class="project-name">Blue Sky Residence</h3>
                        <p class="project-desc">
                            Century Tobudobutsukoen menghadap ke selatan dengan panorama
                            Gunung Fuji dan lebih dari 5 pilihan tipe unit hunian.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'condo-suncradle-nippori.webp' ); ?>"
                             alt="SUNCRADLE NISHI NIPPORI II dan III oleh Arnest One"
                             width="960" height="1080"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Ongoing &middot; Jepang (Arnest One)</p>
                        <h3 class="project-name">SUNCRADLE Nishi Nippori II &amp; III</h3>
                        <p class="project-desc">
                            Menawarkan tipe Studio dan 2LDK dengan akses langsung
                            ke 3 rute jalur kereta perkotaan di sekitarnya.
                        </p>
                    </div>
                </article>

                <article class="project-card reveal">
                    <div class="project-media">
                        <img src="<?php echo esc_url( $pdf_img . 'condo-asaka-pieces.webp' ); ?>"
                             alt="ASAKA PIECES PROJECT dengan konsep 4 Musim"
                             width="1247" height="1267"
                             loading="lazy" decoding="async">
                    </div>
                    <div class="project-body">
                        <p class="project-tag">Ongoing &middot; Jepang (Iida Sangyo)</p>
                        <h3 class="project-name">ASAKA PIECES PROJECT</h3>
                        <p class="project-desc">
                            Mengusung konsep &ldquo;4 Musim di kawasan Asaka&rdquo; dengan
                            lebih dari 28 variasi tipe tata ruang hunian.
                        </p>
                    </div>
                </article>
            </div>

            <div class="brand-block reveal">
                <p class="brand-heading">6 Brand Perumahan Grup di Jepang</p>
                <ul class="brand-list">
                    <li>Livele Garden (Hajime Construction)</li>
                    <li>Heartful-Town (Iida Sangyo)</li>
                    <li>Blooming Garden (Touei Housing)</li>
                    <li>GRAFARE (Tact Home)</li>
                    <li>Cradle garden (Arnest One)</li>
                    <li>LIGNAGE (ID Home Co., Ltd.)</li>
                </ul>
                <div class="link-row">
                    <a href="<?php echo esc_url( home_url( '/development/' ) ); ?>" class="link-arrow">
                        Lihat seluruh proyek &amp; spesifikasi lengkap
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16m0 0-6-6m6 6-6 6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         QUALITY & GOVERNANCE — Housing Performance Indication System (PDF p.14-15)
         ============================================================ -->
    <section class="section section--light" id="quality" aria-labelledby="quality-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="quality-grid">

                <div class="quality-copy reveal">
                    <p class="eyebrow">Kualitas &amp; Standar</p>
                    <h2 id="quality-title" class="section-title">
                        Housing Performance Indication System
                    </h2>
                    <p class="section-lede">
                        Berdasarkan standarisasi rumah yang ditetapkan oleh Pemerintah Jepang,
                        seluruh hunian grup kami meraih peringkat tertinggi,
                        <strong>Highest Grade</strong>, termasuk standar
                        <strong>Insulation Grade 4</strong> dan
                        <strong>Primary Energy Consumption Grade 5</strong>.
                    </p>
                    <p class="quality-note">
                        Penilaian mencakup 10 faktor (dengan 4 faktor wajib) dan dilakukan
                        sebanyak 5 kali inspeksi ketat: saat proses design, pembangunan pondasi,
                        saat proses kerangka selesai, sebelum finishing interior, hingga finishing akhir.
                    </p>
                </div>

                <div class="quality-factors reveal">
                    <h3 class="factors-title">10 Faktor Penilaian HPIS</h3>
                    <ol class="factors-list">
                        <li><span>Stabilitas struktural bangunan</span><em>Wajib</em></li>
                        <li><span>Keamanan jika terjadi kebakaran</span></li>
                        <li><span>Mengurangi kerusakan</span><em>Wajib</em></li>
                        <li><span>Pemeliharaan &amp; pembaharuan bangunan</span><em>Wajib</em></li>
                        <li><span>Thermal environment (Insulation Grade 4 / Energy Grade 5)</span><em>Wajib</em></li>
                        <li><span>Lingkungan udara (ventilasi)</span></li>
                        <li><span>Pencahayaan &amp; visualisasi</span></li>
                        <li><span>Lingkungan suara</span></li>
                        <li><span>Pertimbangan untuk lansia</span></li>
                        <li><span>Keamanan</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         CLOSING CTA
         ============================================================ -->
    <section class="cta-band" aria-labelledby="cta-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="cta-inner reveal">
                <div>
                    <h2 id="cta-title" class="cta-title">Tertarik dengan proyek &amp; produk kami?</h2>
                    <p class="cta-text">
                        Hubungi tim PT. Perumnas Iida Group di Bekasi maupun pabrik Bogor
                        untuk informasi unit, material konstruksi IG SCB, dan kerja sama.
                    </p>
                </div>
                <div class="cta-actions">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-hero btn-hero--solid">
                        Hubungi Kami
                    </a>
                    <a href="<?php echo esc_url( home_url( '/Indonesia_Company%20profile_20231025.pdf' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn-hero btn-hero--ghost">
                        Company Profile PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>

