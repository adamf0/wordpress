<?php
/**
 * Bricklet Theme Blog Index Template (home.php)
 */

get_header();

$theme_uri      = get_template_directory_uri();
$fallback_image = $theme_uri . '/images/pdf/botania-2-residence.webp';
$hero_bg        = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';
?>

<style type="text/css">
.blog-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}

/* Hero */
.blog-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.blog-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.blog-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.blog-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.91) 100%);
}
.blog-hero-inner {
    position: relative;
    z-index: 1;
}
.blog-hero-eyebrow {
    margin: 0 0 10px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-action-cyan);
}
.blog-hero h1 {
    margin: 0 0 14px;
    max-width: 24ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.25rem);
    font-weight: 700;
    line-height: 1.12;
    color: #ffffff;
}
.blog-hero-lede {
    margin: 0 0 24px;
    max-width: 58ch;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
}
.blog-hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.blog-hero-link {
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
.blog-hero-link:hover {
    background-color: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}
.blog-hero-link:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

/* Feed Section */
.blog-feed-section {
    padding: clamp(44px, 6vw, 80px) 0;
    background-color: var(--color-surface);
}
.blog-section-head {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    justify-content: space-between;
    gap: 16px;
    padding-bottom: 20px;
    margin-bottom: 32px;
    border-bottom: 1px solid var(--color-border);
}
.blog-section-title {
    margin: 0 0 6px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.6vw, 2rem);
    font-weight: 700;
    color: var(--color-text-heading);
}
.blog-section-sub {
    margin: 0;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.blog-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
@media (min-width: 640px) {
    .blog-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .blog-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
.blog-card {
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
.blog-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.blog-card-media {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
}
.blog-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.blog-card-date {
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
.blog-card-body {
    padding: 20px 22px 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.blog-card-cat {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.blog-card-cat a {
    color: inherit;
    text-decoration: none;
}
.blog-card-cat a:hover {
    text-decoration: underline;
}
.blog-card-title {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: 1.1875rem;
    font-weight: 700;
    line-height: 1.35;
    color: var(--color-text-heading);
}
.blog-card-title a {
    color: inherit;
    text-decoration: none;
}
.blog-card-title a:hover {
    color: var(--color-primary);
}
.blog-card-title a:focus-visible,
.blog-card-cat a:focus-visible,
.blog-card-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.blog-card-excerpt {
    margin: 0 0 18px;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
    flex: 1;
}
.blog-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding-top: 10px;
    border-top: 1px solid var(--color-border);
}
.blog-card-author {
    font-size: var(--text-xs);
    font-weight: 500;
    color: var(--color-text-muted);
}
.blog-card-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 44px;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-primary);
    text-decoration: none;
}
.blog-card-link:hover {
    color: var(--color-primary-strong);
    text-decoration: underline;
}

/* Empty State */
.blog-empty {
    padding: 44px 24px;
    text-align: center;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
}
.blog-empty h2 {
    margin: 0 0 8px;
    font-size: 1.25rem;
    color: var(--color-text-heading);
}
.blog-empty p {
    margin: 0 auto 20px;
    max-width: 52ch;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.blog-empty-btn {
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
.blog-empty-btn:hover {
    background-color: var(--color-primary-strong);
    color: #ffffff;
}
.blog-empty-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Pagination */
.blog-pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
}
.blog-pagination .page-numbers {
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
.blog-pagination .page-numbers.current {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.blog-pagination a.page-numbers:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.blog-pagination a.page-numbers:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .blog-card,
    .blog-hero-link {
        transition: none;
    }
}
</style>

<main id="main-content" class="blog-page">

    <section class="blog-hero" aria-labelledby="blog-page-title">
        <div class="blog-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="blog-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt blog-hero-inner">
            <p class="blog-hero-eyebrow">Latest Updates</p>
            <h1 id="blog-page-title">Berita &amp; Publikasi Korporasi</h1>
            <p class="blog-hero-lede">
                Pembaruan terbaru seputar pengembangan kawasan hunian, inovasi konstruksi tahan gempa IG Strong CB, webinar industri, serta rilis pers PT. Perumnas Iida Group di Indonesia.
            </p>
            <div class="blog-hero-actions">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="blog-hero-link">Kanal Berita (/news/)</a>
                <a href="<?php echo esc_url(home_url('/latest-updates/')); ?>" class="blog-hero-link">Latest Updates</a>
                <a href="<?php echo esc_url(home_url('/latest-updates/e-newsletter/')); ?>" class="blog-hero-link">E-Newsletter &amp; Profil PDF</a>
            </div>
        </div>
    </section>

    <section class="blog-feed-section" aria-labelledby="blog-list-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">

            <div class="blog-section-head">
                <div>
                    <h2 id="blog-list-heading" class="blog-section-title">Arsip Berita Terbaru</h2>
                    <p class="blog-section-sub">Artikel publikasi resmi dari seluruh kategori Company News dan Press Release.</p>
                </div>
            </div>

            <?php if (have_posts()) : ?>
                <div class="blog-grid">
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
                        <article class="blog-card">
                            <div class="blog-card-media">
                                <img src="<?php echo esc_url($image_url); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     loading="lazy" decoding="async" />
                                <time class="blog-card-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('d M Y')); ?>
                                </time>
                            </div>

                            <div class="blog-card-body">
                                <div class="blog-card-cat">
                                    <?php the_category(', '); ?>
                                </div>
                                <h3 class="blog-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="blog-card-excerpt"><?php echo esc_html($clean_excerpt); ?></p>

                                <div class="blog-card-footer">
                                    <span class="blog-card-author">Oleh <?php echo esc_html(get_the_author()); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="blog-card-link">
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
                    <nav class="blog-pagination" aria-label="Navigasi halaman berita">
                        <?php echo $pagination; ?>
                    </nav>
                <?php endif; ?>
            <?php else : ?>
                <div class="blog-empty" role="status">
                    <h2>Belum Ada Artikel Terbit</h2>
                    <p>Saat ini belum ada artikel berita atau rilis pers yang diterbitkan di arsip ini.</p>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="blog-empty-btn">Buka Halaman Berita</a>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php
get_footer();
?>
