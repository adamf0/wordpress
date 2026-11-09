<?php
/**
 * Bricklet Theme Standard Page Template (page.php)
 */

get_header();

$theme_uri    = get_template_directory_uri();
$default_hero = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';
?>

<style type="text/css">
.std-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}
.std-sr-only {
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

/* Hero Banner */
.std-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.std-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.std-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.std-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.91) 100%);
}
.std-hero-inner {
    position: relative;
    z-index: 1;
}
.std-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 16px;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.std-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #cbd5e1;
    text-decoration: none;
}
.std-breadcrumb a:hover {
    color: #ffffff;
    text-decoration: underline;
}
.std-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.std-hero h1 {
    margin: 0;
    max-width: 26ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.125rem);
    font-weight: 700;
    line-height: 1.15;
    color: #ffffff;
}

/* Body Container */
.std-body-section {
    padding: clamp(44px, 6vw, 80px) 0;
    background-color: var(--color-surface);
}
.std-content-wrap {
    max-width: 840px;
    margin: 0 auto;
}
.std-prose {
    font-size: 1.0625rem;
    line-height: 1.75;
    color: var(--color-text-body);
    overflow-wrap: anywhere;
}
.std-prose h2 {
    margin: 2rem 0 0.875rem;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.5vw, 1.875rem);
    font-weight: 700;
    line-height: 1.25;
    color: var(--color-text-heading);
}
.std-prose h3 {
    margin: 1.6rem 0 0.75rem;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--color-text-heading);
}
.std-prose p {
    margin: 0 0 1.25rem;
}
.std-prose ul,
.std-prose ol {
    margin: 0 0 1.35rem;
    padding-left: 1.4rem;
}
.std-prose li {
    margin-bottom: 0.5rem;
}
.std-prose a {
    color: var(--color-primary);
    font-weight: 600;
    text-decoration: underline;
}
.std-prose a:hover {
    color: var(--color-primary-strong);
}
.std-prose a:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.std-prose img,
.std-prose video,
.std-prose iframe {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
    margin: 1.5rem 0;
}
.std-prose blockquote {
    margin: 1.5rem 0;
    padding: 1rem 1.25rem;
    border-left: 3px solid var(--color-primary);
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
}
.std-prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}
.std-prose th,
.std-prose td {
    padding: 10px 12px;
    border: 1px solid var(--color-border-strong);
    text-align: left;
}
.std-prose th {
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
    font-weight: 700;
}

/* Footer Quick Navigation */
.std-footer-nav {
    margin-top: 48px;
    padding-top: 28px;
    border-top: 1px solid var(--color-border);
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}
.std-footer-nav h2 {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-text-heading);
}
.std-footer-links {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.std-nav-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 10px 18px;
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
.std-nav-btn:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.std-nav-btn--primary {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.std-nav-btn--primary:hover {
    background-color: var(--color-primary-strong);
    border-color: var(--color-primary-strong);
    color: #ffffff;
}
.std-nav-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .std-nav-btn {
        transition: none;
    }
}
</style>

<main id="main-content" class="std-page">
<?php
$has_post_item = have_posts();
if ($has_post_item) {
    the_post();
    $page_title = get_the_title();
    $hero_bg    = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : $default_hero;
    if (empty($hero_bg)) {
        $hero_bg = $default_hero;
    }
} else {
    $page_title = 'Halaman Tidak Ditemukan';
    $hero_bg    = $default_hero;
}
?>
    <section class="std-hero" aria-labelledby="std-page-title">
        <div class="std-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="std-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt std-hero-inner">
            <nav class="std-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page"><?php echo esc_html($page_title); ?></span>
            </nav>
            <h1 id="std-page-title"><?php echo esc_html($page_title); ?></h1>
        </div>
    </section>

    <section class="std-body-section" aria-labelledby="std-content-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="std-content-wrap">
                <?php if ($has_post_item) : ?>
                    <article class="std-prose">
                        <h2 id="std-content-heading" class="std-sr-only">Konten Halaman</h2>
                        <?php
                        the_content();
                        wp_link_pages(array(
                            'before' => '<nav class="std-footer-links" aria-label="Halaman artikel">',
                            'after'  => '</nav>',
                        ));
                        ?>
                    </article>
                <?php else : ?>
                    <div class="std-prose">
                        <h2 id="std-content-heading">Konten Tidak Tersedia</h2>
                        <p>Konten halaman yang Anda tuju belum tersedia atau telah dipindahkan.</p>
                    </div>
                <?php endif; ?>

                <nav class="std-footer-nav" aria-label="Navigasi lanjutan">
                    <h2>Tautan Resmi Lainnya</h2>
                    <div class="std-footer-links">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="std-nav-btn std-nav-btn--primary">Beranda</a>
                        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="std-nav-btn">Berita (/news/)</a>
                        <a href="<?php echo esc_url(home_url('/latest-updates/')); ?>" class="std-nav-btn">Latest Updates</a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="std-nav-btn">Hubungi Kami</a>
                    </div>
                </nav>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
