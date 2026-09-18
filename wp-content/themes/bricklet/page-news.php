<?php
/**
 * Template Name: News List Page
 */
get_header();
?>

<main class="">
    <!-- Hero Header Banner Section -->
    <section class="relative overflow-hidden bg-deep-navy py-margin-desktop-alt">
        <div class="absolute inset-0 opacity-20">
            <div class="w-full h-full bg-cover bg-center mix-blend-overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp')"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10 text-center">
            <span class="text-action-cyan font-label-bold text-label-bold uppercase tracking-widest mb-4 block">Insights & Updates</span>
            <h1 class="text-white font-display-lg text-display-lg md:max-w-3xl mx-auto leading-tight mb-6">Corporate News & Topics</h1>
            <p class="text-surface-variant font-body-lg text-body-lg md:max-w-2xl mx-auto opacity-90">
                Stay updated with the latest technological achievements, research collaborations, and business announcements from PT Iida Group.
            </p>
        </div>
    </section>

    <!-- News Grid List Section -->
    <section class="py-margin-desktop-alt bg-surface">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                <?php
                // Query all publish posts
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($news_query->have_posts()) :
                    $delay = 0;
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $feat_image = get_post_meta(get_the_ID(), '_featured_image_url', true);
                        if (empty($feat_image)) {
                            $feat_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1548795179-8bfc5c1ebb24?q=80&w=600';
                        }
                        ?>
                        <article class="bg-white p-4 border border-structural-gray group reveal-on-scroll" style="transition-delay: <?php echo $delay; ?>ms;">
                            <div class="relative aspect-[1.5] overflow-hidden mb-6">
                                <img alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?php echo esc_url($feat_image); ?>"/>
                                <div class="absolute top-4 left-4 bg-deep-navy text-white text-caption px-3 py-1 font-label-bold"><?php echo get_the_date('M d, Y'); ?></div>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 line-clamp-2 hover:text-primary transition-colors cursor-pointer">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 line-clamp-3 text-xs">
                                <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                            </p>
                            <a class="inline-block text-primary font-label-bold uppercase border-b border-primary hover:text-action-cyan hover:border-action-cyan transition-all" href="<?php the_permalink(); ?>">Read More</a>
                        </article>
                        <?php
                        $delay += 100;
                    endwhile;
                    
                    // Reset Query Data
                    $max_pages = $news_query->max_num_pages;
                    wp_reset_postdata();
                else :
                    $max_pages = 0;
                    ?>
                    <div class="col-span-3 text-center py-12 text-on-surface-variant">
                        No news articles found.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if ($max_pages > 1) : ?>
                <div class="flex justify-center gap-4 mt-16 font-body-md">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $max_pages,
                        'prev_text' => '<span class="material-symbols-outlined align-middle">chevron_left</span> Previous',
                        'next_text' => 'Next <span class="material-symbols-outlined align-middle">chevron_right</span>',
                        'type' => 'plain',
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>
