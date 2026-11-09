<?php
/**
 * Template Name: Vision & Mission
 * Description: Visi, Misi resmi PT. Perumnas Iida Group, Slogan & 3 Ciri Perusahaan Iida Group Holdings, serta prinsip standarisasi HPIS Highest Grade (Nov 2023).
 */

get_header();

$theme_uri = get_template_directory_uri();
$pdf_url   = home_url('/Indonesia_Company%20profile_20231025.pdf');
?>

<style>
/* ==========================================================================
   Vision & Mission Page Layout (PT. Perumnas Iida Group / IGHD)
   ========================================================================== */

.vm-page-wrapper {
    font-family: var(--font-body);
    color: var(--color-text-body);
    background-color: var(--color-surface);
    width: 100%;
    overflow-x: hidden;
}

.vm-container {
    max-width: var(--container-max);
    margin: 0 auto;
    width: 100%;
    padding-left: var(--gutter);
    padding-right: var(--gutter);
}

/* 1. HERO BANNER */
.vm-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: var(--color-deep-navy);
    overflow: hidden;
}
@media (min-width: 768px) {
    .vm-hero-banner {
        min-height: 390px;
    }
}
.vm-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    z-index: 1;
}
.vm-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.80) 55%, rgba(10, 31, 44, 0.68) 100%);
    z-index: 2;
}
.vm-hero-inner {
    position: relative;
    z-index: 3;
    max-width: var(--container-max);
    width: 100%;
    margin: 0 auto;
    padding: 3rem var(--gutter);
}
.vm-breadcrumb {
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
.vm-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    padding: 0 4px;
    color: #cbd5e1;
    text-decoration: none;
    transition: color var(--dur-fast) var(--ease-in-out);
}
.vm-breadcrumb a:hover,
.vm-breadcrumb a:focus-visible {
    color: #ffffff;
    text-decoration: underline;
    text-underline-offset: 4px;
}
.vm-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.vm-breadcrumb .separator {
    color: rgba(255, 255, 255, 0.55);
}
.vm-breadcrumb .current {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #ffffff;
    font-weight: 700;
}
.vm-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 0.75rem;
}
.vm-hero-tag-bar {
    width: 3px;
    height: 16px;
    background-color: var(--color-action-cyan);
    border-radius: 2px;
}
.vm-hero-tag-text {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.85);
}
.vm-hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.15rem, 4.5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.12;
    color: #ffffff;
    letter-spacing: -0.025em;
    margin: 0 0 0.9rem;
}
.vm-hero-subtitle {
    margin: 0;
    max-width: 62ch;
    font-size: 1.05rem;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.85);
}

/* 2. CORPORATE SLOGAN BANNER (PDF Hal. 5) */
.vm-slogan-band {
    background-color: var(--color-surface-sunken);
    border-bottom: 1px solid var(--color-border);
    padding: clamp(2.5rem, 4vw, 3.75rem) 0;
}
.vm-slogan-box {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-left: 5px solid var(--color-primary);
    border-radius: var(--radius-lg);
    padding: clamp(1.75rem, 3.5vw, 2.75rem);
    box-shadow: var(--shadow-xs);
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}
@media (min-width: 900px) {
    .vm-slogan-box {
        grid-template-columns: 1.2fr 0.8fr;
        align-items: center;
        gap: 2.5rem;
    }
}
.vm-eyebrow {
    display: block;
    margin: 0 0 0.5rem;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-primary);
}
.vm-slogan-quote {
    margin: 0;
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 2.8vw, 2.25rem);
    font-weight: 800;
    line-height: 1.2;
    color: var(--color-text-heading);
}
.vm-slogan-note {
    margin: 0;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}

/* 3. VISION & MISSION SPLIT CARDS (PDF Hal. 7) */
.vm-content-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.vm-cards-stack {
    display: flex;
    flex-direction: column;
    gap: clamp(2.5rem, 4.5vw, 4rem);
}
.vm-split-card {
    display: grid;
    grid-template-columns: 1fr;
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border);
    background-color: var(--color-surface);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}
@media (min-width: 900px) {
    .vm-split-card {
        grid-template-columns: 1fr 1fr;
        align-items: stretch;
    }
}
.vm-visual-col {
    position: relative;
    width: 100%;
    min-height: 260px;
    background-color: var(--color-deep-navy);
    overflow: hidden;
}
@media (min-width: 900px) {
    .vm-visual-col {
        min-height: 430px;
    }
}
.vm-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
}
.vm-visual-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 2rem;
    background: linear-gradient(180deg, rgba(10, 31, 44, 0.52) 0%, rgba(10, 31, 44, 0.78) 100%);
    z-index: 2;
}
.vm-overlay-kicker {
    margin: 0 0 0.5rem;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: #cbd5e1;
}
.vm-overlay-heading {
    font-family: var(--font-display);
    font-size: clamp(1.85rem, 3.2vw, 2.5rem);
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.015em;
    margin: 0;
    line-height: 1.2;
}
.vm-text-col {
    padding: clamp(1.75rem, 4vw, 3.25rem);
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 1.25rem;
}
.vm-vision-bg {
    background-color: var(--color-primary-container);
}
.vm-mission-bg {
    background-color: var(--color-surface);
}
.vm-statement-quote {
    margin: 0;
    font-family: var(--font-display);
    font-size: clamp(1.3rem, 2.2vw, 1.75rem);
    font-weight: 800;
    line-height: 1.35;
    color: var(--color-text-heading);
    border-left: 4px solid var(--color-primary);
    padding-left: 1.15rem;
}
.vm-points-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    gap: 0.85rem;
}
.vm-points-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: var(--text-base);
    line-height: 1.6;
    color: var(--color-text-body);
}
.vm-vision-bg .vm-points-item {
    color: var(--color-on-primary-container);
}
.vm-points-icon {
    color: var(--color-primary);
    font-size: 20px;
    margin-top: 2px;
    flex-shrink: 0;
}
@media (max-width: 899px) {
    .vm-order-image {
        order: 1;
    }
    .vm-order-text {
        order: 2;
    }
}

/* 4. THREE CHARACTERISTICS OF COMPANY (PDF Hal. 5) */
.vm-pillars-section {
    padding: clamp(3.5rem, 6vw, 5rem) 0;
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
    border-bottom: 1px solid var(--color-border);
}
.vm-section-head {
    max-width: 46rem;
    margin-bottom: 2.5rem;
}
.vm-section-title {
    margin: 0 0 0.75rem;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3vw, 2.4rem);
    font-weight: 800;
    line-height: 1.15;
    color: var(--color-text-heading);
}
.vm-section-desc {
    margin: 0;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}
.vm-pillars-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media (min-width: 768px) {
    .vm-pillars-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
.vm-pillar-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 1.75rem;
    box-shadow: var(--shadow-xs);
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}
.vm-pillar-num {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: var(--color-primary-container);
    color: var(--color-primary);
    font-family: var(--font-display);
    font-size: var(--text-sm);
    font-weight: 800;
}
.vm-pillar-title {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--color-text-heading);
}
.vm-pillar-text {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.65;
    color: var(--color-text-body);
}

/* 5. HPIS HIGHEST GRADE QUALITY STANDARDIZATION (PDF Hal. 14-15) */
.vm-hpis-section {
    padding: clamp(3.5rem, 6vw, 5.5rem) 0;
    background-color: var(--color-surface);
}
.vm-hpis-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
    margin-bottom: 2.5rem;
}
@media (min-width: 640px) {
    .vm-hpis-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .vm-hpis-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
.vm-hpis-card {
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    padding: 1.5rem;
}
.vm-hpis-grade {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-pill);
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.04em;
    margin-bottom: 0.75rem;
}
.vm-hpis-title {
    margin: 0 0 0.5rem;
    font-family: var(--font-display);
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--color-text-heading);
}
.vm-hpis-desc {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}

/* 5-Stage Inspection Bar */
.vm-inspection-box {
    background-color: var(--color-deep-navy);
    color: #ffffff;
    border-radius: var(--radius-lg);
    padding: clamp(1.75rem, 3.5vw, 2.5rem);
}
.vm-inspection-title {
    margin: 0 0 0.5rem;
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 800;
    color: #ffffff;
}
.vm-inspection-sub {
    margin: 0 0 1.5rem;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: #cbd5e1;
}
.vm-steps-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr;
    gap: 0.85rem;
}
@media (min-width: 640px) {
    .vm-steps-list {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .vm-steps-list {
        grid-template-columns: repeat(5, 1fr);
    }
}
.vm-step-item {
    background-color: rgba(255, 255, 255, 0.07);
    border: 1px solid rgba(255, 255, 255, 0.16);
    border-radius: var(--radius-md);
    padding: 1rem;
}
.vm-step-num {
    display: block;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-action-cyan);
    margin-bottom: 0.35rem;
}
.vm-step-name {
    margin: 0;
    font-size: var(--text-sm);
    font-weight: 700;
    color: #ffffff;
    line-height: 1.4;
}

.vm-actions-footer {
    margin-top: 2.5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.vm-btn-primary {
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
.vm-btn-primary:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.vm-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-pill);
    border: 1.5px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out), color var(--dur-fast) var(--ease-in-out);
}
.vm-btn-secondary:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
}
.vm-btn-primary:focus-visible,
.vm-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .vm-btn-primary,
    .vm-btn-secondary,
    .vm-breadcrumb a {
        transition: none;
    }
}
</style>

<main id="main-content" class="vm-page-wrapper">

    <!-- 1. HERO BANNER -->
    <section class="vm-hero-banner" aria-labelledby="vm-hero-title">
        <img
            src="<?php echo esc_url($theme_uri . '/images/vision-mission/bg-header-company-data.jpg'); ?>"
            alt="Gedung PT. Iida Group Holdings"
            class="vm-hero-bg"
            width="1920"
            height="1080"
            fetchpriority="high"
            decoding="sync"
        />
        <div class="vm-hero-overlay" aria-hidden="true"></div>
        <div class="vm-hero-inner">
            <nav class="vm-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator" aria-hidden="true">/</span>
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>">About Us</a>
                <span class="separator" aria-hidden="true">/</span>
                <span class="current" aria-current="page">Vision &amp; Mission</span>
            </nav>

            <p class="vm-hero-tag">
                <span class="vm-hero-tag-bar" aria-hidden="true"></span>
                <span class="vm-hero-tag-text">PT. Perumnas Iida Group &middot; Company Profile Nov 2023</span>
            </p>
            <h1 id="vm-hero-title" class="vm-hero-title">Visi, Misi &amp; Filosofi Kualitas</h1>
            <p class="vm-hero-subtitle">
                Pedoman korporasi resmi PT. Perumnas Iida Group dan Iida Group Holdings Co.,Ltd. dalam menghadirkan perumahan ramah lingkungan, terjangkau, dan berstandar kualitas tertinggi HPIS.
            </p>
        </div>
    </section>

    <!-- 2. CORPORATE SLOGAN (PDF Hal. 5) -->
    <section class="vm-slogan-band" aria-label="Slogan Perusahaan">
        <div class="vm-container">
            <div class="vm-slogan-box">
                <div>
                    <span class="vm-eyebrow">Slogan Grup Iida Holdings (PDF Hal. 5)</span>
                    <p class="vm-slogan-quote">&ldquo;Realizing a society where anyone can own a house&rdquo;</p>
                </div>
                <p class="vm-slogan-note">
                    Mewujudkan masyarakat di mana setiap orang dapat memiliki rumah. Kami berupaya menurunkan beban biaya kepemilikan rumah agar semakin banyak keluarga memperoleh hunian yang layak, aman, dan berkelanjutan.
                </p>
            </div>
        </div>
    </section>

    <!-- 3. OFFICIAL VISION & MISSION OF PT. PERUMNAS IIDA GROUP (PDF Hal. 7) -->
    <section class="vm-content-section" aria-labelledby="vm-vision-heading">
        <div class="vm-container">
            <div class="vm-cards-stack">

                <!-- VISI PERUSAHAAN -->
                <article class="vm-split-card">
                    <div class="vm-visual-col vm-order-image">
                        <img
                            src="<?php echo esc_url($theme_uri . '/images/vision-mission/Vision.jpg'); ?>"
                            alt="Visi PT. Perumnas Iida Group"
                            class="vm-card-img"
                            width="2000"
                            height="947"
                            loading="lazy"
                            decoding="async"
                        />
                        <div class="vm-visual-overlay">
                            <p class="vm-overlay-kicker">PT. Perumnas Iida Group &middot; Hal. 7</p>
                            <h2 id="vm-vision-heading" class="vm-overlay-heading">Visi Perusahaan</h2>
                        </div>
                    </div>

                    <div class="vm-text-col vm-vision-bg vm-order-text">
                        <span class="vm-eyebrow">Visi Resmi Perusahaan</span>
                        <blockquote class="vm-statement-quote">
                            &ldquo;Menyediakan banyak perumahan dengan kualitas baik dan harga terjangkau kepada masyarakat.&rdquo;
                        </blockquote>
                        <ul class="vm-points-list">
                            <li class="vm-points-item">
                                <span class="material-symbols-outlined vm-points-icon" aria-hidden="true">check_circle</span>
                                <span>Menggabungkan keunggulan manufaktur dan pengalaman perumahan Jepang dari Iida Group Holdings bersama jaringan perumahan nasional Perum Perumnas.</span>
                            </li>
                            <li class="vm-points-item">
                                <span class="material-symbols-outlined vm-points-icon" aria-hidden="true">check_circle</span>
                                <span>Mengendalikan biaya pembangunan melalui integrasi rantai pasok dan standarisasi produk agar harga tetap kompetitif bagi masyarakat Indonesia.</span>
                            </li>
                        </ul>
                    </div>
                </article>

                <!-- MISI PERUSAHAAN -->
                <article class="vm-split-card">
                    <div class="vm-text-col vm-mission-bg vm-order-text">
                        <span class="vm-eyebrow">Misi Resmi Perusahaan</span>
                        <blockquote class="vm-statement-quote">
                            &ldquo;Melalui pendirian pabrik, memperluas pembangunan rumah ramah lingkungan dan aman secara kualitas untuk menyediakan banyak perumahan dengan harga terjangkau kepada masyarakat.&rdquo;
                        </blockquote>
                        <ul class="vm-points-list">
                            <li class="vm-points-item">
                                <span class="material-symbols-outlined vm-points-icon" aria-hidden="true">factory</span>
                                <span>Mengoperasikan fasilitas pabrik komponen konstruksi <strong>IG Strong Concrete Block (IG SCB)</strong> dengan kontrol kualitas industri di Indonesia.</span>
                            </li>
                            <li class="vm-points-item">
                                <span class="material-symbols-outlined vm-points-icon" aria-hidden="true">verified_user</span>
                                <span>Menjaga keselamatan struktur bangunan tahan gempa dan pengurangan limbah material konstruksi untuk mendukung pembangunan perumahan ramah lingkungan.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="vm-visual-col vm-order-image">
                        <img
                            src="<?php echo esc_url($theme_uri . '/images/vision-mission/Mission.jpg'); ?>"
                            alt="Misi PT. Perumnas Iida Group"
                            class="vm-card-img"
                            width="2000"
                            height="957"
                            loading="lazy"
                            decoding="async"
                        />
                        <div class="vm-visual-overlay">
                            <p class="vm-overlay-kicker">PT. Perumnas Iida Group &middot; Hal. 7</p>
                            <h2 class="vm-overlay-heading">Misi Perusahaan</h2>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- 4. THREE CHARACTERISTICS OF COMPANY (PDF Hal. 5) -->
    <section class="vm-pillars-section" aria-labelledby="vm-pillars-heading">
        <div class="vm-container">
            <div class="vm-section-head">
                <span class="vm-eyebrow">Pilar Nilai Pelanggan (PDF Hal. 5)</span>
                <h2 id="vm-pillars-heading" class="vm-section-title">3 Ciri Utama Perusahaan</h2>
                <p class="vm-section-desc">
                    Tiga prinsip dasar yang dijaga konsisten pada setiap pengembangan kawasan perumahan oleh grup perusahaan Iida.
                </p>
            </div>

            <div class="vm-pillars-grid">
                <article class="vm-pillar-card">
                    <span class="vm-pillar-num" aria-hidden="true">01</span>
                    <h3 class="vm-pillar-title">Lokasi yang Strategis</h3>
                    <p class="vm-pillar-text">
                        Pengembangan kawasan hunian dipilih pada lokasi yang memiliki prospek pertumbuhan serta kemudahan akses menuju pusat aktivitas, transportasi, dan layanan harian masyarakat.
                    </p>
                </article>

                <article class="vm-pillar-card">
                    <span class="vm-pillar-num" aria-hidden="true">02</span>
                    <h3 class="vm-pillar-title">Harga yang Terjangkau</h3>
                    <p class="vm-pillar-text">
                        Efisiensi manufaktur blok beton pracetak di pabrik dan daya beli grup skala besar menekan biaya bangunan sehingga hunian tetap terjangkau tanpa mengorbankan keselamatan.
                    </p>
                </article>

                <article class="vm-pillar-card">
                    <span class="vm-pillar-num" aria-hidden="true">03</span>
                    <h3 class="vm-pillar-title">Kualitas yang Tinggi</h3>
                    <p class="vm-pillar-text">
                        Pengawasan mutu ketat dari tahap desain hingga serah terima serta penggunaan material berstandar SNI dan paten konstruksi tahan gempa Indonesia.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <!-- 5. HPIS QUALITY PRINCIPLES (PDF Hal. 14-15) -->
    <section class="vm-hpis-section" aria-labelledby="vm-hpis-heading">
        <div class="vm-container">
            <div class="vm-section-head">
                <span class="vm-eyebrow">Standarisasi Kualitas Jepang (PDF Hal. 14-15)</span>
                <h2 id="vm-hpis-heading" class="vm-section-title">Prinsip HPIS Highest Grade &amp; 5 Tahap Inspeksi</h2>
                <p class="vm-section-desc">
                    Standar <strong>Housing Performance Indication System (HPIS)</strong> dari Pemerintah Jepang menilai 10 faktor performa bangunan (termasuk 4 faktor wajib) untuk mencapai peringkat tertinggi <strong>Highest Grade</strong>.
                </p>
            </div>

            <div class="vm-hpis-grid">
                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Wajib : Grade 3 / Grade 2</span>
                    <h3 class="vm-hpis-title">Structure Resistance (Ketahanan Struktur)</h3>
                    <p class="vm-hpis-desc">
                        Penilaian ketahanan gempa hingga Grade 3 dan ketahanan beban angin Grade 2 guna memastikan keselamatan penghuni pada kondisi ekstrem.
                    </p>
                </article>

                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Wajib : Grade 3</span>
                    <h3 class="vm-hpis-title">Less Prone to Degradation</h3>
                    <p class="vm-hpis-desc">
                        Ketahanan komponen struktur terhadap pelapukan dan keausan usia pakai agar bangunan tetap kokoh lintas generasi.
                    </p>
                </article>

                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Wajib : Grade 3</span>
                    <h3 class="vm-hpis-title">Easy to Maintain &amp; Renew</h3>
                    <p class="vm-hpis-desc">
                        Kemudahan inspeksi, pembersihan, dan pembaruan instalasi pemipaan air maupun utilitas rumah tanpa merusak struktur utama.
                    </p>
                </article>

                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Wajib : Insulasi Gr. 4 / Energi Gr. 5</span>
                    <h3 class="vm-hpis-title">Thermal Environment</h3>
                    <p class="vm-hpis-desc">
                        Performa insulasi panas (Grade 4) dan efisiensi konsumsi energi primer bangunan (Grade 5) untuk kenyamanan termal dan hemat energi.
                    </p>
                </article>

                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Evaluasi Kualitas : Grade 3</span>
                    <h3 class="vm-hpis-title">Air Environment</h3>
                    <p class="vm-hpis-desc">
                        Pengendalian kandungan emisi bahan bangunan dan dukungan sirkulasi udara sehat di dalam setiap ruang hunian.
                    </p>
                </article>

                <article class="vm-hpis-card">
                    <span class="vm-hpis-grade">Indonesia : SNI &amp; Paten</span>
                    <h3 class="vm-hpis-title">Adaptasi Kualitas IG SCB</h3>
                    <p class="vm-hpis-desc">
                        Di Indonesia, standar mutu diterjemahkan melalui IG Strong Concrete Block bersertifikasi SNI dan Paten No. IDP000069171 (teruji gempa &gt; 8,0 Magnitudo).
                    </p>
                </article>
            </div>

            <div class="vm-inspection-box">
                <h3 class="vm-inspection-title">5 Tahap Inspeksi Konstruksi Berjenjang (PDF Hal. 15)</h3>
                <p class="vm-inspection-sub">
                    Pemeriksaan mutu independen dilakukan secara bertahap dari perencanaan hingga rumah siap huni.
                </p>
                <ol class="vm-steps-list">
                    <li class="vm-step-item">
                        <span class="vm-step-num">Tahap 01</span>
                        <p class="vm-step-name">Design &amp; Spesifikasi Teknis</p>
                    </li>
                    <li class="vm-step-item">
                        <span class="vm-step-num">Tahap 02</span>
                        <p class="vm-step-name">Pembangunan Pondasi</p>
                    </li>
                    <li class="vm-step-item">
                        <span class="vm-step-num">Tahap 03</span>
                        <p class="vm-step-name">Kerangka Selesai</p>
                    </li>
                    <li class="vm-step-item">
                        <span class="vm-step-num">Tahap 04</span>
                        <p class="vm-step-name">Sebelum Pekerjaan Interior (Finishing)</p>
                    </li>
                    <li class="vm-step-item">
                        <span class="vm-step-num">Tahap 05</span>
                        <p class="vm-step-name">Finishing &amp; Serah Terima</p>
                    </li>
                </ol>
            </div>

            <div class="vm-actions-footer">
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>" class="vm-btn-primary">
                    Kembali ke Overview &amp; Direksi
                </a>
                <a href="<?php echo esc_url(home_url('/product-osaka-strong-cb/')); ?>" class="vm-btn-secondary">
                    Pelajari Teknologi IG SCB
                </a>
                <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer" class="vm-btn-secondary">
                    Unduh Company Profile (PDF Nov 2023)
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
