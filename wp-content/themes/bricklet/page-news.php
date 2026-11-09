<?php
/**
 * Template Name: News List Page
 */
get_header();

$theme_uri = get_template_directory_uri();
$fallback_image = $theme_uri . '/images/pdf/botania-2-residence.webp';
$hero_bg = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';

// Resolve initial category filter from query string (?pressReleaseData=1 or ?category=...)
$initial_filter = 'all';
if (isset($_GET['pressReleaseData']) && sanitize_text_field(wp_unslash($_GET['pressReleaseData'])) === '1') {
    $initial_filter = 'press-release';
} elseif (isset($_GET['category'])) {
    $cat_param = sanitize_title(wp_unslash($_GET['category']));
    if (in_array($cat_param, array('company-news', 'press-release'), true)) {
        $initial_filter = $cat_param;
    }
}

$paged = get_query_var('paged') ? max(1, (int) get_query_var('paged')) : 1;
$news_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'post_status'    => 'publish',
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
));

$all_posts_data = array();
if ($news_query->have_posts()) {
    while ($news_query->have_posts()) {
        $news_query->the_post();
        $post_id = get_the_ID();
        $feat_image = get_post_meta($post_id, '_featured_image_url', true);
        if (empty($feat_image)) {
            $feat_image = has_post_thumbnail($post_id)
                ? get_the_post_thumbnail_url($post_id, 'large')
                : $fallback_image;
        }
        $cats = get_the_category($post_id);
        $cat_slugs = array();
        $cat_names = array();
        if (!empty($cats)) {
            foreach ($cats as $cat) {
                $cat_slugs[] = $cat->slug;
                $cat_names[] = $cat->name;
            }
        }
        $raw_excerpt = get_the_excerpt();
        if (empty($raw_excerpt)) {
            $raw_excerpt = get_the_content();
        }
        $all_posts_data[] = array(
            'id'        => $post_id,
            'title'     => get_the_title(),
            'permalink' => get_permalink($post_id),
            'date'      => get_the_date('d M Y'),
            'datetime'  => get_the_date('c'),
            'image'     => $feat_image,
            'cat_slugs' => $cat_slugs,
            'cat_label' => !empty($cat_names) ? implode(', ', $cat_names) : 'Company News',
            'excerpt'   => wp_trim_words(wp_strip_all_tags($raw_excerpt), 24, '...'),
        );
    }
    $max_pages = $news_query->max_num_pages;
    wp_reset_postdata();
} else {
    $max_pages = 0;
}

$visible_count = 0;
foreach ($all_posts_data as $item) {
    if ($initial_filter === 'all' || in_array($initial_filter, $item['cat_slugs'], true)) {
        $visible_count++;
    }
}
?>

<style type="text/css">
.news-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}

/* Hero Banner */
.news-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.news-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.news-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.news-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.9) 100%);
}
.news-hero-inner {
    position: relative;
    z-index: 1;
}
.news-hero-eyebrow {
    margin: 0 0 10px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-action-cyan);
}
.news-hero h1 {
    margin: 0 0 14px;
    max-width: 24ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.25rem);
    font-weight: 700;
    line-height: 1.12;
    color: #ffffff;
}
.news-hero-lede {
    margin: 0 0 24px;
    max-width: 58ch;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
}
.news-hero-link {
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
.news-hero-link:hover {
    background-color: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}
.news-hero-link:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
}

/* Main Feed Section */
.news-feed-section {
    padding: clamp(44px, 6vw, 80px) 0;
    background-color: var(--color-surface);
}
.news-toolbar {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    padding-bottom: 24px;
    margin-bottom: 32px;
    border-bottom: 1px solid var(--color-border);
}
.news-section-title {
    margin: 0 0 6px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.6vw, 2rem);
    font-weight: 700;
    color: var(--color-text-heading);
}
.news-count-status {
    margin: 0;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.news-filter-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.news-filter-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 10px 20px;
    border-radius: var(--radius-pill);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-family: var(--font-body);
    font-size: var(--text-sm);
    font-weight: 600;
    cursor: pointer;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                color var(--dur-fast) var(--ease-in-out),
                border-color var(--dur-fast) var(--ease-in-out);
}
.news-filter-btn:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.news-filter-btn.is-active {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.news-filter-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Grid & Cards */
.news-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
@media (min-width: 640px) {
    .news-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .news-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
.news-card {
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
.news-card[hidden] {
    display: none;
}
.news-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.news-card-media {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    background-color: var(--color-surface-sunken);
}
.news-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.news-card-date {
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
.news-card-body {
    padding: 20px 22px 22px;
    display: flex;
    flex-direction: column;
    flex: 1;
}
.news-card-cat {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.news-card-title {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: 1.1875rem;
    font-weight: 700;
    line-height: 1.35;
    color: var(--color-text-heading);
}
.news-card-title a {
    color: inherit;
    text-decoration: none;
}
.news-card-title a:hover {
    color: var(--color-primary);
}
.news-card-title a:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 3px;
}
.news-card-excerpt {
    margin: 0 0 18px;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
    flex: 1;
}
.news-card-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 44px;
    padding-top: 10px;
    border-top: 1px solid var(--color-border);
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-primary);
    text-decoration: none;
}
.news-card-link:hover {
    color: var(--color-primary-strong);
    text-decoration: underline;
}
.news-card-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 4px;
}

/* Empty State */
.news-empty {
    padding: 44px 24px;
    text-align: center;
    background-color: var(--color-surface-sunken);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
}
.news-empty[hidden] {
    display: none;
}
.news-empty h3 {
    margin: 0 0 8px;
    font-size: 1.1875rem;
    color: var(--color-text-heading);
}
.news-empty p {
    margin: 0 auto 20px;
    max-width: 50ch;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
.news-reset-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 44px;
    padding: 10px 22px;
    border: 0;
    border-radius: var(--radius-md);
    background-color: var(--color-primary);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
}
.news-reset-btn:hover {
    background-color: var(--color-primary-strong);
    color: #ffffff;
}
.news-reset-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Pagination */
.news-pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
}
.news-pagination .page-numbers {
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
.news-pagination .page-numbers.current {
    background-color: var(--color-primary);
    border-color: var(--color-primary);
    color: #ffffff;
}
.news-pagination a.page-numbers:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.news-pagination a.page-numbers:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

@media (prefers-reduced-motion: reduce) {
    .news-card,
    .news-filter-btn,
    .news-hero-link {
        transition: none;
    }
}
</style>

<main id="main-content" class="news-page">

    <section class="news-hero" aria-labelledby="news-page-title">
        <div class="news-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="news-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt news-hero-inner">
            <p class="news-hero-eyebrow">Latest Updates</p>
            <h1 id="news-page-title">Berita &amp; Rilis Pers Perusahaan</h1>
            <p class="news-hero-lede">
                Informasi resmi terkait pengembangan proyek perumahan, inovasi material tahan gempa IG Strong CB, riset konstruksi, serta pengumuman korporasi PT. Perumnas Iida Group.
            </p>
            <a href="<?php echo esc_url(home_url('/latest-updates/e-newsletter/')); ?>" class="news-hero-link">
                <span>Buka E-Newsletter &amp; Corporate Profile PDF</span>
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </section>

    <section class="news-feed-section" aria-labelledby="news-list-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">

            <div class="news-toolbar">
                <div>
                    <h2 id="news-list-heading" class="news-section-title">
                        <?php
                        if ($initial_filter === 'press-release') {
                            echo 'Press Release Resmi';
                        } elseif ($initial_filter === 'company-news') {
                            echo 'Company News';
                        } else {
                            echo 'Semua Publikasi Berita';
                        }
                        ?>
                    </h2>
                    <p id="news-count-status" class="news-count-status" role="status" aria-live="polite">
                        Menampilkan <?php echo (int) $visible_count; ?> artikel
                    </p>
                </div>

                <div class="news-filter-group" role="group" aria-label="Filter kategori berita">
                    <button type="button"
                            class="news-filter-btn<?php echo $initial_filter === 'all' ? ' is-active' : ''; ?>"
                            data-filter="all"
                            aria-pressed="<?php echo $initial_filter === 'all' ? 'true' : 'false'; ?>">
                        Semua Berita
                    </button>
                    <button type="button"
                            class="news-filter-btn<?php echo $initial_filter === 'company-news' ? ' is-active' : ''; ?>"
                            data-filter="company-news"
                            aria-pressed="<?php echo $initial_filter === 'company-news' ? 'true' : 'false'; ?>">
                        Company News
                    </button>
                    <button type="button"
                            class="news-filter-btn<?php echo $initial_filter === 'press-release' ? ' is-active' : ''; ?>"
                            data-filter="press-release"
                            aria-pressed="<?php echo $initial_filter === 'press-release' ? 'true' : 'false'; ?>">
                        Press Release
                    </button>
                </div>
            </div>

            <?php if (!empty($all_posts_data)) : ?>
                <div class="news-grid" id="news-cards-grid">
                    <?php foreach ($all_posts_data as $item) :
                        $matches_initial = ($initial_filter === 'all' || in_array($initial_filter, $item['cat_slugs'], true));
                        $cats_attr = !empty($item['cat_slugs']) ? implode(' ', $item['cat_slugs']) : 'company-news';
                    ?>
                        <article class="news-card"
                                 data-categories="<?php echo esc_attr($cats_attr); ?>"
                                 <?php echo $matches_initial ? '' : 'hidden'; ?>>
                            <div class="news-card-media">
                                <img src="<?php echo esc_url($item['image']); ?>"
                                     alt="<?php echo esc_attr($item['title']); ?>"
                                     loading="lazy" decoding="async" />
                                <time class="news-card-date" datetime="<?php echo esc_attr($item['datetime']); ?>">
                                    <?php echo esc_html($item['date']); ?>
                                </time>
                            </div>
                            <div class="news-card-body">
                                <p class="news-card-cat"><?php echo esc_html($item['cat_label']); ?></p>
                                <h3 class="news-card-title">
                                    <a href="<?php echo esc_url($item['permalink']); ?>"><?php echo esc_html($item['title']); ?></a>
                                </h3>
                                <p class="news-card-excerpt"><?php echo esc_html($item['excerpt']); ?></p>
                                <a href="<?php echo esc_url($item['permalink']); ?>" class="news-card-link">
                                    <span>Baca Selengkapnya</span>
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div id="news-filter-empty" class="news-empty" role="status" <?php echo $visible_count > 0 ? 'hidden' : ''; ?>>
                    <h3>Belum Ada Artikel pada Kategori Ini</h3>
                    <p>Tidak ditemukan artikel yang cocok dengan filter yang dipilih saat ini. Tampilkan seluruh berita untuk melihat arsip lengkap.</p>
                    <button type="button" id="news-reset-filter" class="news-reset-btn">Tampilkan Semua Berita</button>
                </div>

                <?php if ($max_pages > 1) : ?>
                    <nav class="news-pagination" aria-label="Navigasi halaman berita">
                        <?php
                        echo paginate_links(array(
                            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'format'    => '?paged=%#%',
                            'current'   => $paged,
                            'total'     => $max_pages,
                            'prev_text' => '&laquo; Sebelumnya',
                            'next_text' => 'Berikutnya &raquo;',
                            'type'      => 'plain',
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
            <?php else : ?>
                <div class="news-empty" role="status">
                    <h3>Belum Ada Artikel Berita</h3>
                    <p>Saat ini belum ada artikel berita atau rilis pers yang diterbitkan.</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="news-reset-btn">Kembali ke Beranda</a>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
(function () {
    'use strict';

    var filterButtons = document.querySelectorAll('.news-filter-btn');
    var cards         = document.querySelectorAll('#news-cards-grid .news-card');
    var headingEl     = document.getElementById('news-list-heading');
    var statusEl      = document.getElementById('news-count-status');
    var emptyEl       = document.getElementById('news-filter-empty');
    var resetBtn      = document.getElementById('news-reset-filter');

    if (!filterButtons.length || !cards.length) {
        return;
    }

    var labels = {
        'all':           'Semua Publikasi Berita',
        'company-news':  'Company News',
        'press-release': 'Press Release Resmi'
    };

    function applyFilter(filterKey, updateUrl) {
        var visible = 0;

        cards.forEach(function (card) {
            var rawCats = card.getAttribute('data-categories') || '';
            var cats = rawCats.split(/\s+/).filter(Boolean);
            var matches = (filterKey === 'all') || (cats.indexOf(filterKey) !== -1);
            card.hidden = !matches;
            if (matches) {
                visible += 1;
            }
        });

        filterButtons.forEach(function (btn) {
            var isMatch = btn.getAttribute('data-filter') === filterKey;
            btn.classList.toggle('is-active', isMatch);
            btn.setAttribute('aria-pressed', isMatch ? 'true' : 'false');
        });

        if (headingEl && labels[filterKey]) {
            headingEl.textContent = labels[filterKey];
        }
        if (statusEl) {
            statusEl.textContent = 'Menampilkan ' + visible + ' artikel';
        }
        if (emptyEl) {
            emptyEl.hidden = visible > 0;
        }

        if (updateUrl && window.history && window.history.replaceState) {
            var url = new URL(window.location.href);
            url.searchParams.delete('pressReleaseData');
            url.searchParams.delete('category');
            if (filterKey === 'press-release') {
                url.searchParams.set('pressReleaseData', '1');
            } else if (filterKey === 'company-news') {
                url.searchParams.set('category', 'company-news');
            }
            window.history.replaceState({}, '', url.toString());
        }
    }

    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var key = btn.getAttribute('data-filter') || 'all';
            applyFilter(key, true);
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            applyFilter('all', true);
        });
    }
})();
</script>

<?php
get_footer();
?>
