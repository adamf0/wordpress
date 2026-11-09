<?php
/**
 * Template Name: E-Newsletter
 */
get_header();

$theme_uri = get_template_directory_uri();
$fallback_image = $theme_uri . '/images/pdf/botania-2-residence.webp';
$hero_bg = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';
$pdf_url = home_url('/Indonesia_Company%20profile_20231025.pdf');
?>

<style type="text/css">
.enews-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}

/* Hero */
.enews-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.enews-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.enews-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.enews-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.9) 100%);
}
.enews-hero-inner {
    position: relative;
    z-index: 1;
}
.enews-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.enews-breadcrumb a {
    color: #cbd5e1;
    text-decoration: none;
    min-height: 44px;
    display: inline-flex;
    align-items: center;
}
.enews-breadcrumb a:hover {
    color: #ffffff;
    text-decoration: underline;
}
.enews-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.enews-hero h1 {
    margin: 0 0 16px;
    max-width: 24ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.25rem);
    font-weight: 700;
    line-height: 1.12;
    color: #ffffff;
}
.enews-hero-lede {
    margin: 0;
    max-width: 58ch;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
}

/* Shared section layout */
.enews-section {
    padding: clamp(48px, 6vw, 84px) 0;
}
.enews-section--white {
    background-color: var(--color-surface);
}
.enews-section--sunken {
    background-color: var(--color-surface-sunken);
    border-top: 1px solid var(--color-border);
}

.enews-section-eyebrow {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.enews-section-title {
    margin: 0 0 12px;
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 3vw, 2.25rem);
    font-weight: 700;
    line-height: 1.2;
    color: var(--color-text-heading);
}
.enews-section-desc {
    margin: 0;
    max-width: 62ch;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-muted);
}

/* Featured Corporate Profile Document */
.enews-doc-card {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(24px, 4vw, 48px);
    padding: clamp(24px, 4vw, 40px);
    background-color: var(--color-surface);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    align-items: center;
}
@media (min-width: 900px) {
    .enews-doc-card {
        grid-template-columns: 0.95fr 1.25fr;
    }
}
.enews-doc-visual {
    position: relative;
    border-radius: var(--radius-md);
    overflow: hidden;
    border: 1px solid var(--color-border);
    background-color: var(--color-deep-navy);
}
.enews-doc-visual img {
    display: block;
    width: 100%;
    height: auto;
    aspect-ratio: 4 / 3;
    object-fit: cover;
}
.enews-doc-caption {
    padding: 14px 18px;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    font-size: var(--text-xs);
    font-weight: 600;
}
.enews-doc-caption span:last-child {
    color: var(--color-action-cyan);
}
.enews-doc-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 14px;
}
.enews-meta-tag {
    display: inline-flex;
    align-items: center;
    padding: 5px 12px;
    border-radius: var(--radius-sm);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
    font-size: var(--text-xs);
    font-weight: 700;
}
.enews-meta-tag--neutral {
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
    border: 1px solid var(--color-border-strong);
}
.enews-doc-title {
    margin: 0 0 12px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.5vw, 1.875rem);
    font-weight: 700;
    line-height: 1.25;
    color: var(--color-text-heading);
}
.enews-doc-summary {
    margin: 0 0 18px;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-body);
}
.enews-topics {
    margin: 0 0 24px;
    padding: 0;
    list-style: none;
    display: grid;
    gap: 10px;
}
.enews-topics li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: var(--text-sm);
    line-height: 1.55;
    color: var(--color-text-body);
}
.enews-topics svg {
    flex: 0 0 auto;
    width: 18px;
    height: 18px;
    margin-top: 2px;
    color: var(--color-primary);
}
.enews-doc-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.enews-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 44px;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    background-color: var(--color-primary);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.enews-btn-primary:hover {
    background-color: var(--color-primary-strong);
    color: #ffffff;
}
.enews-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 12px 22px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out),
                background-color var(--dur-fast) var(--ease-in-out);
}
.enews-btn-secondary:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.enews-btn-primary:focus-visible,
.enews-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Archive Header & Grid */
.enews-archive-head {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 32px;
}
.enews-archive-links {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.enews-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
@media (min-width: 640px) {
    .enews-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .enews-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
.enews-card {
    display: flex;
    flex-direction: column;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-xs);
    transition: border-color var(--dur-base) var(--ease-in-out),
                box-shadow var(--dur-base) var(--ease-in-out);
}
.enews-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.enews-card-media {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
}
.enews-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.enews-card-body {
    padding: 20px 22px 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.enews-card-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
    font-size: var(--text-xs);
}
.enews-card-cat {
    font-weight: 700;
    color: var(--color-primary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.enews-card-date {
    color: var(--color-text-muted);
    font-weight: 500;
}
.enews-card-title {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    line-height: 1.35;
    color: var(--color-text-heading);
}
.enews-card-title a {
    color: inherit;
    text-decoration: none;
}
.enews-card-title a:hover {
    color: var(--color-primary);
}
.enews-card-title a:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.enews-card-excerpt {
    margin: 0 0 18px;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
    flex: 1;
}
.enews-card-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 44px;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-primary);
    text-decoration: none;
    border-top: 1px solid var(--color-border);
    padding-top: 10px;
}
.enews-card-link:hover {
    color: var(--color-primary-strong);
    text-decoration: underline;
}
.enews-card-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 4px;
}

/* Empty State */
.enews-empty {
    padding: 40px 24px;
    text-align: center;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
}
.enews-empty h3 {
    margin: 0 0 8px;
    font-size: 1.125rem;
    color: var(--color-text-heading);
}
.enews-empty p {
    margin: 0 auto 20px;
    max-width: 50ch;
    color: var(--color-text-muted);
    font-size: var(--text-sm);
}

/* Closing CTA Band */
.enews-cta {
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(44px, 6vw, 72px) 0;
}
.enews-cta-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}
.enews-cta h2 {
    margin: 0 0 8px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.6vw, 2rem);
    font-weight: 700;
    color: #ffffff;
}
.enews-cta p {
    margin: 0;
    max-width: 56ch;
    font-size: var(--text-base);
    color: #cbd5e1;
}
.enews-cta-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.enews-cta-btn-light {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    background-color: #ffffff;
    color: var(--color-deep-navy);
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
}
.enews-cta-btn-light:hover {
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.enews-cta-btn-outline {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    border: 1px solid rgba(255, 255, 255, 0.55);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
}
.enews-cta-btn-outline:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: #ffffff;
}
.enews-cta-btn-light:focus-visible,
.enews-cta-btn-outline:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .enews-card,
    .enews-btn-primary,
    .enews-btn-secondary {
        transition: none;
    }
}
</style>

<main id="main-content" class="enews-page">

    <section class="enews-hero" aria-labelledby="enews-page-title">
        <div class="enews-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="enews-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt enews-hero-inner">
            <nav class="enews-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                <span aria-hidden="true">/</span>
                <a href="<?php echo esc_url(home_url('/news/')); ?>">Latest Updates</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">E-Newsletter</span>
            </nav>
            <h1 id="enews-page-title">E-Newsletter &amp; Publikasi Resmi</h1>
            <p class="enews-hero-lede">
                Pusat dokumen resmi PT. Perumnas Iida Group, termasuk Corporate Profile (Edisi November 2023) serta arsip buletin Company News dan Press Release terbaru.
            </p>
        </div>
    </section>

    <section class="enews-section enews-section--white" aria-labelledby="enews-doc-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div style="margin-bottom: 28px;">
                <p class="enews-section-eyebrow">Sorotan Publikasi Korporasi</p>
                <h2 id="enews-doc-heading" class="enews-section-title">Corporate Profile PT. Perumnas Iida Group (Edisi November 2023)</h2>
                <p class="enews-section-desc">
                    Dokumen resmi perusahaan yang merangkum profil induk usaha di Jepang, perjalanan ekspansi Indonesia, teknologi konstruksi tahan gempa, hingga daftar proyek hunian.
                </p>
            </div>

            <article class="enews-doc-card">
                <div class="enews-doc-visual">
                    <img src="<?php echo esc_url($fallback_image); ?>"
                         alt="Botania 2 Residence, proyek perumahan PT. Perumnas Iida Group dalam dokumen Corporate Profile"
                         width="1218" height="994"
                         loading="eager" decoding="async" />
                    <div class="enews-doc-caption">
                        <span>Indonesia Company Profile</span>
                        <span>Edisi November 2023 (28 Halaman PDF)</span>
                    </div>
                </div>

                <div>
                    <div class="enews-doc-meta">
                        <span class="enews-meta-tag">Dokumen PDF Resmi</span>
                        <span class="enews-meta-tag enews-meta-tag--neutral">28 Halaman</span>
                        <span class="enews-meta-tag enews-meta-tag--neutral">Edisi November 2023</span>
                    </div>
                    <h3 class="enews-doc-title">Materi Lengkap dalam Dokumen Profil Perusahaan</h3>
                    <p class="enews-doc-summary">
                        Unduh salinan lengkap profil korporasi PT. Perumnas Iida Group untuk mempelajari struktur bisnis, sertifikasi teknis, dan portofolio pengembangan kawasan.
                    </p>
                    <ul class="enews-topics">
                        <li>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            <span>Profil Iida Group Holdings Co.,Ltd. (didirikan 1 November 2013 di Tokyo) serta ekspansi ke Indonesia pada 2016 dan pendirian PT. Perumnas Iida Group pada 2017.</span>
                        </li>
                        <li>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            <span>Teknologi tahan gempa IG Strong Concrete Block (IG SCB) dengan Paten IDP000069171 dan sertifikasi Standar Nasional Indonesia (SNI).</span>
                        </li>
                        <li>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            <span>Sistem penilaian kualitas Housing Performance Indication System (HPIS) peringkat Highest Grade.</span>
                        </li>
                        <li>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            <span>Pengembangan proyek residensial Indonesia, meliputi Heartful-Town Bekasi (29 unit), Heartful Tower Bekasi, Heartful-Town Depok, dan Botania 2 Residence.</span>
                        </li>
                    </ul>
                    <div class="enews-doc-actions">
                        <a href="<?php echo esc_url($pdf_url); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           download
                           class="enews-btn-primary">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span>Unduh Corporate Profile PDF (28 Halaman)</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/company-profile/')); ?>" class="enews-btn-secondary">
                            Baca Profil Perusahaan Online
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="enews-section enews-section--sunken" aria-labelledby="enews-archive-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="enews-archive-head">
                <div>
                    <p class="enews-section-eyebrow">Arsip Buletin &amp; Siaran Berita</p>
                    <h2 id="enews-archive-heading" class="enews-section-title">Buletin Terbaru (Company News &amp; Press Release)</h2>
                    <p class="enews-section-desc">
                        Artikel berita resmi yang dipublikasikan oleh PT. Perumnas Iida Group dan Iida Group Holdings di Indonesia.
                    </p>
                </div>
                <div class="enews-archive-links">
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="enews-btn-secondary">Semua Berita</a>
                    <a href="<?php echo esc_url(home_url('/news/?pressReleaseData=1')); ?>" class="enews-btn-secondary">Hanya Press Release</a>
                </div>
            </div>

            <?php
            $bulletin_query = new WP_Query(array(
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array('company-news', 'press-release'),
                        'operator' => 'IN',
                    ),
                ),
            ));

            if ($bulletin_query->have_posts()) :
            ?>
                <div class="enews-grid">
                    <?php
                    while ($bulletin_query->have_posts()) :
                        $bulletin_query->the_post();
                        $feat_image = get_post_meta(get_the_ID(), '_featured_image_url', true);
                        if (empty($feat_image)) {
                            $feat_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : $fallback_image;
                        }
                        $cats = get_the_category();
                        $cat_names = array();
                        if (!empty($cats)) {
                            foreach ($cats as $cat) {
                                $cat_names[] = $cat->name;
                            }
                        }
                        $cat_label = !empty($cat_names) ? implode(', ', $cat_names) : 'Company News';
                        $raw_excerpt = get_the_excerpt();
                        if (empty($raw_excerpt)) {
                            $raw_excerpt = get_the_content();
                        }
                        $clean_excerpt = wp_trim_words(wp_strip_all_tags($raw_excerpt), 22, '...');
                    ?>
                        <article class="enews-card">
                            <div class="enews-card-media">
                                <img src="<?php echo esc_url($feat_image); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     loading="lazy" decoding="async" />
                            </div>
                            <div class="enews-card-body">
                                <div class="enews-card-meta">
                                    <span class="enews-card-cat"><?php echo esc_html($cat_label); ?></span>
                                    <time class="enews-card-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo esc_html(get_the_date('d M Y')); ?>
                                    </time>
                                </div>
                                <h3 class="enews-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="enews-card-excerpt"><?php echo esc_html($clean_excerpt); ?></p>
                                <a href="<?php the_permalink(); ?>" class="enews-card-link">
                                    <span>Baca Artikel Selengkapnya</span>
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="enews-empty" role="status">
                    <h3>Belum Ada Buletin Terbit</h3>
                    <p>
                        Arsip berita kategori Company News dan Press Release belum tersedia saat ini. Anda tetap dapat mengunduh dokumen Corporate Profile PDF di atas atau meninjau halaman berita utama.
                    </p>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="enews-btn-primary">Buka Halaman Berita</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="enews-cta" aria-labelledby="enews-cta-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt enews-cta-inner">
            <div>
                <h2 id="enews-cta-title">Ingin Informasi Proyek atau Kemitraan Resmi?</h2>
                <p>
                    Kunjungi kanal berita perusahaan atau hubungi tim PT. Perumnas Iida Group untuk informasi hunian dan material konstruksi IG SCB.
                </p>
            </div>
            <div class="enews-cta-actions">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="enews-cta-btn-light">Jelajahi Semua Berita</a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="enews-cta-btn-outline">Hubungi Kami</a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
