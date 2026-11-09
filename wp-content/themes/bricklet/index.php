<?php
/**
 * Bricklet Theme Main Fallback Template (index.php)
 * Mandatory fallback template in WordPress hierarchy.
 */

get_header();

$theme_uri      = get_template_directory_uri();
$fallback_image = $theme_uri . '/images/pdf/botania-2-residence.webp';
$hero_bg        = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';

$page_heading = 'Berita & Publikasi Korporasi';
if (is_category()) {
    $page_heading = single_cat_title('Kategori: ', false);
} elseif (is_tag()) {
    $page_heading = single_tag_title('Topik: ', false);
} elseif (is_archive()) {
    $page_heading = wp_strip_all_tags(get_the_archive_title());
} elseif (is_search()) {
    $page_heading = 'Hasil Pencarian: ' . get_search_query();
}
?>

<style type="text/css">
.archive-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}

/* Hero */
.archive-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.archive-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.archive-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.archive-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.91) 100%);
}
.archive-hero-inner {
    position: relative;
    z-index: 1;
}
.archive-hero-eyebrow {
    margin: 0 0 10px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-action-cyan);
}
.archive-hero h1 {
    margin: 0 0 14px;
    max-width: 26ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.25rem);
    font-weight: 700;
    line-height: 1.12;
    color: #ffffff;
}
.archive-hero-lede {
    margin: 0 0 24px;
    max-width: 58ch;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
}
.archive-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.archive-hero-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    min-height: 44px;
    padding: 10px 20px;
    border-radius: var(--radius-md);
    border: 1px solid rgba(255, 255, 255, 0.45);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.archive-hero-link:hover {
    background-color: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}
.archive-hero-link:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

/* Feed Section */
.archive-feed-section {
    padding: clamp(44px, 6vw, 80px) 0;
    background-color: var(--color-surface);
}
.archive-section-head {
    padding-bottom: 20px;
    margin-bottom: 32px;
    border-bottom: 1px solid var(--color-border);
}
.archive-section-title {
    margin: 0 0 6px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.6vw, 2rem);
    font-weight: 700;
    color: var(--color-text-heading);
}
.archive-section-sub {
    margin: 0;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.archive-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
@media (min-width: 640px) {
    .archive-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .archive-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
.archive-card {
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
.archive-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.archive-card-media {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
}
.archive-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.archive-card-date {
    position: absolute;
    top: 14px;
    left: 14px;
    padding: 5px 12px;
    border-radius: var(--radius-sm);
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 600;
}
.archive-card-body {
    padding: 20px 22px 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.archive-card-cat {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.archive-card-cat a {
    color: inherit;
    text-decoration: none;
}
.archive-card-cat a:hover {
    text-decoration: underline;
}
.archive-card-title {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: 1.1875rem;
    font-weight: 700;
    line-height: 1.35;
    color: var(--color-text-heading);
}
.archive-card-title a {
    color: inherit;
    text-decoration: none;
}
.archive-card-title a:hover {
    color: var(--color-primary);
}
.archive-card-title a:focus-visible,
.archive-card-cat a:focus-visible,
.archive-card-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.archive-card-excerpt {
    margin: 0 0 18px;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
    flex: 1;
}
.archive-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 10px;
    border-top: 1px solid var(--color-border);
}
.archive-card-author {
    font-size: var(--text-xs);
    font-weight: 500;
    color: var(--color-text-muted);
}
.archive-card-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 44px;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-primary);
    text-decoration: none;
}
.archive-card-link:hover {
    color: var(--color-primary-strong);
    text-decoration: underline;
}

/* Empty State */
.archive-empty {
    padding: 44px 24px;
    text-align: center;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
}
.archive-empty h2 {
    margin: 0 0 8px;
    font-size: 1.25rem;
    color: var(--color-text-heading);
}
.archive-empty p {
    margin: 0 auto 20px;
    max-width: 52ch;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.archive-empty-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
}
.archive-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 10px 22px;
    border-radius: var(--radius-md);
    background-color: var(--color-primary);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
}
.archive-btn-primary:hover {
    background-color: var(--color-primary-strong);
    color: #ffffff;
}
.archive-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 10px 22px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
}
.archive-btn-secondary:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.archive-btn-primary:focus-visible,
.archive-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Pagination */
.archive-pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
}
.archive-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    min-height: 44px;
    padding: 8px 14px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
}
.archive-pagination .page-numbers.current {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.archive-pagination a.page-numbers:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.archive-pagination a.page-numbers:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .archive-card,
    .archive-hero-link {
        transition: none;
    }
}
</style>

<main id="main-content" class="archive-page">

    <section class="archive-hero" aria-labelledby="archive-page-title">
        <div class="archive-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="archive-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt archive-hero-inner">
            <p class="archive-hero-eyebrow">Latest Updates</p>
            <h1 id="archive-page-title"><?php echo esc_html($page_heading); ?></h1>
            <p class="archive-hero-lede">
                Informasi resmi PT. Perumnas Iida Group dan Iida Group Holdings mengenai proyek hunian, rilis pers, serta perkembangan teknologi konstruksi di Indonesia.
            </p>
            <div class="archive-hero-actions">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="archive-hero-link">Semua Berita</a>
                <a href="<?php echo esc_url(home_url('/latest-updates/')); ?>" class="archive-hero-link">Latest Updates</a>
                <a href="<?php echo esc_url(home_url('/latest-updates/e-newsletter/')); ?>" class="archive-hero-link">E-Newsletter &amp; Profil PDF</a>
            </div>
        </div>
    </section>

    <section class="archive-feed-section" aria-labelledby="archive-list-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">

            <div class="archive-section-head">
                <h2 id="archive-list-heading" class="archive-section-title">Daftar Publikasi</h2>
                <p class="archive-section-sub">Menampilkan arsip artikel yang tersedia pada kategori atau kueri ini.</p>
            </div>

            <?php if (have_posts()) : ?>
                <div class="archive-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        $post_id = get_the_ID();
                        $image_url = get_post_meta($post_id, '_featured_image_url', true);
                        if (empty($image_url)) {
                            $image_url = has_post_thumbnail($post_id)
                                ? get_the_post_thumbnail_url($post_id, 'large')
                                : $fallback_image;
                        }
                        $raw_excerpt = get_the_excerpt();
                        if (empty($raw_excerpt)) {
                            $raw_excerpt = get_the_content();
                        }
                        $clean_excerpt = wp_trim_words(wp_strip_all_tags($raw_excerpt), 24, '...');
                    ?>
                        <article class="archive-card">
                            <div class="archive-card-media">
                                <img src="<?php echo esc_url($image_url); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     loading="lazy" decoding="async" />
                                <time class="archive-card-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('d M Y')); ?>
                                </time>
                            </div>

                            <div class="archive-card-body">
                                <div class="archive-card-cat">
                                    <?php the_category(', '); ?>
                                </div>
                                <h3 class="archive-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="archive-card-excerpt"><?php echo esc_html($clean_excerpt); ?></p>

                                <div class="archive-card-footer">
                                    <span class="archive-card-author">Oleh <?php echo esc_html(get_the_author()); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="archive-card-link">
                                        <span>Baca Artikel</span>
                                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                $pagination = paginate_links(array(
                    'prev_text' => '&laquo; Sebelumnya',
                    'next_text' => 'Berikutnya &raquo;',
                    'type'      => 'plain',
                ));
                if (!empty($pagination)) :
                ?>
                    <nav class="archive-pagination" aria-label="Navigasi halaman arsip">
                        <?php echo $pagination; ?>
                    </nav>
                <?php endif; ?>
            <?php else : ?>
                <div class="archive-empty" role="status">
                    <h2>Belum Ada Konten Ditemukan</h2>
                    <p>Artikel atau topik yang Anda cari saat ini belum tersedia pada arsip ini.</p>
                    <div class="archive-empty-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="archive-btn-primary">Kembali ke Beranda</a>
                        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="archive-btn-secondary">Lihat Semua Berita</a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php
get_footer();
?>
