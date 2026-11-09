<?php
/**
 * Bricklet Theme Single Post Template (single.php)
 */

get_header();

$theme_uri      = get_template_directory_uri();
$fallback_image = $theme_uri . '/images/pdf/botania-2-residence.webp';
?>

<style type="text/css">
.single-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}
.single-sr-only {
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

/* Editorial Header */
.single-header-band {
    background-color: var(--color-surface);
    border-bottom: 1px solid var(--color-border);
    padding: clamp(32px, 5vw, 56px) 0 clamp(28px, 4vw, 44px);
}
.single-header-inner {
    max-width: 840px;
    margin: 0 auto;
}
.single-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-text-muted);
}
.single-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: var(--color-primary);
    text-decoration: none;
}
.single-breadcrumb a:hover {
    color: var(--color-primary-strong);
    text-decoration: underline;
}
.single-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 4px;
}
.single-cat-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 14px;
}
.single-cat-badge {
    display: inline-flex;
    align-items: center;
    min-height: 32px;
    padding: 4px 12px;
    border-radius: var(--radius-sm);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    text-decoration: none;
}
.single-cat-badge:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.single-cat-badge:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.single-title {
    margin: 0 0 18px;
    font-family: var(--font-display);
    font-size: clamp(1.75rem, 3.8vw, 2.75rem);
    font-weight: 700;
    line-height: 1.18;
    color: var(--color-text-heading);
}
.single-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px 18px;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    font-weight: 500;
}

/* Body & Featured Image */
.single-body-band {
    padding: clamp(32px, 5vw, 60px) 0 clamp(48px, 6vw, 84px);
    background-color: var(--color-surface);
}
.single-media-wrap {
    max-width: 920px;
    margin: 0 auto clamp(28px, 4vw, 44px);
}
.single-media-frame {
    border-radius: var(--radius-lg);
    overflow: hidden;
    border: 1px solid var(--color-border);
    background-color: var(--color-surface-sunken);
    box-shadow: var(--shadow-md);
}
.single-media-frame img {
    display: block;
    width: 100%;
    max-height: 520px;
    object-fit: cover;
}

.single-article-wrap {
    max-width: 780px;
    margin: 0 auto;
}
.single-prose {
    font-size: 1.0625rem;
    line-height: 1.75;
    color: var(--color-text-body);
    overflow-wrap: anywhere;
}
.single-prose p {
    margin: 0 0 1.25rem;
}
.single-prose h2 {
    margin: 2rem 0 0.875rem;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.5vw, 1.75rem);
    font-weight: 700;
    line-height: 1.25;
    color: var(--color-text-heading);
}
.single-prose h3 {
    margin: 1.6rem 0 0.75rem;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--color-text-heading);
}
.single-prose ul,
.single-prose ol {
    margin: 0 0 1.35rem;
    padding-left: 1.4rem;
}
.single-prose li {
    margin-bottom: 0.5rem;
}
.single-prose strong {
    color: var(--color-text-heading);
}
.single-prose a {
    color: var(--color-primary);
    font-weight: 600;
    text-decoration: underline;
}
.single-prose a:hover {
    color: var(--color-primary-strong);
}
.single-prose a:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.single-prose img,
.single-prose video,
.single-prose iframe {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
}
.single-prose blockquote {
    margin: 1.5rem 0;
    padding: 1rem 1.25rem;
    border-left: 3px solid var(--color-primary);
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
}

/* Navigation & Backlinks */
.single-nav-section {
    margin-top: 48px;
    padding-top: 32px;
    border-top: 1px solid var(--color-border-strong);
}
.single-nav-heading {
    margin: 0 0 16px;
    font-family: var(--font-display);
    font-size: 1.1875rem;
    font-weight: 700;
    color: var(--color-text-heading);
}
.single-adj-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 14px;
    margin-bottom: 24px;
}
@media (min-width: 640px) {
    .single-adj-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
.single-adj-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 64px;
    padding: 14px 18px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface-sunken);
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out),
                background-color var(--dur-fast) var(--ease-in-out);
}
.single-adj-card:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
}
.single-adj-card:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.single-adj-label {
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--color-primary);
    margin-bottom: 4px;
}
.single-adj-title {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-text-heading);
    line-height: 1.35;
}
.single-back-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.single-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    min-height: 44px;
    padding: 10px 20px;
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
.single-back-btn:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.single-back-btn--primary {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.single-back-btn--primary:hover {
    background-color: var(--color-primary-strong);
    border-color: var(--color-primary-strong);
    color: #ffffff;
}
.single-back-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .single-adj-card,
    .single-back-btn {
        transition: none;
    }
}
</style>

<main id="main-content" class="single-page">
<?php
$has_post_item = have_posts();
if ($has_post_item) {
    the_post();
    $post_id    = get_the_ID();
    $post_title = get_the_title();
    $categories = get_the_category($post_id);
    $image_url  = get_post_meta($post_id, '_featured_image_url', true);
    if (empty($image_url) && has_post_thumbnail($post_id)) {
        $image_url = get_the_post_thumbnail_url($post_id, 'full');
    }
    if (empty($image_url)) {
        $image_url = $fallback_image;
    }
    $prev_post = get_previous_post();
    $next_post = get_next_post();
} else {
    $post_title = 'Artikel Tidak Ditemukan';
    $categories = array();
    $image_url  = $fallback_image;
    $prev_post  = null;
    $next_post  = null;
}
?>
    <section class="single-header-band" aria-labelledby="single-post-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="single-header-inner">
                <nav class="single-breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                    <span aria-hidden="true">/</span>
                    <a href="<?php echo esc_url(home_url('/news/')); ?>">Berita</a>
                    <span aria-hidden="true">/</span>
                    <a href="<?php echo esc_url(home_url('/latest-updates/')); ?>">Latest Updates</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">Artikel</span>
                </nav>

                <?php if (!empty($categories)) : ?>
                    <div class="single-cat-list">
                        <?php foreach ($categories as $cat) : ?>
                            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="single-cat-badge">
                                <?php echo esc_html($cat->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <h1 id="single-post-title" class="single-title"><?php echo esc_html($post_title); ?></h1>

                <?php if ($has_post_item) : ?>
                    <div class="single-meta">
                        <span>Oleh <?php echo esc_html(get_the_author()); ?></span>
                        <span aria-hidden="true">&middot;</span>
                        <span>Dipublikasikan <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('d F Y')); ?></time></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="single-body-band" aria-labelledby="single-content-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <?php if ($has_post_item) : ?>
                <div class="single-media-wrap">
                    <figure class="single-media-frame">
                        <img src="<?php echo esc_url($image_url); ?>"
                             alt="<?php echo esc_attr($post_title); ?>"
                             fetchpriority="high" decoding="async" />
                    </figure>
                </div>
            <?php endif; ?>

            <article class="single-article-wrap">
                <?php if ($has_post_item) : ?>
                    <h2 id="single-content-heading" class="single-sr-only">Isi Artikel</h2>
                    <div class="single-prose">
                        <?php the_content(); ?>
                    </div>
                <?php else : ?>
                    <h2 id="single-content-heading" class="single-nav-heading">Publikasi Tidak Tersedia</h2>
                    <div class="single-prose">
                        <p>Publikasi berita yang Anda minta belum tersedia atau telah dipindahkan.</p>
                    </div>
                <?php endif; ?>

                <nav class="single-nav-section" aria-label="Navigasi artikel dan arsip berita">
                    <h2 class="single-nav-heading">Navigasi Berita &amp; Publikasi</h2>

                    <?php if ($prev_post || $next_post) : ?>
                        <div class="single-adj-grid">
                            <?php if ($prev_post) : ?>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="single-adj-card">
                                    <span class="single-adj-label">Artikel Sebelumnya</span>
                                    <span class="single-adj-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if ($next_post) : ?>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="single-adj-card">
                                    <span class="single-adj-label">Artikel Berikutnya</span>
                                    <span class="single-adj-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="single-back-actions">
                        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="single-back-btn single-back-btn--primary">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            <span>Kembali ke Berita (/news/)</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/latest-updates/')); ?>" class="single-back-btn">
                            Latest Updates
                        </a>
                        <a href="<?php echo esc_url(home_url('/latest-updates/e-newsletter/')); ?>" class="single-back-btn">
                            E-Newsletter &amp; Corporate Profile PDF
                        </a>
                    </div>
                </nav>
            </article>
        </div>
    </section>
</main>

<?php
get_footer();
?>
