<?php
/**
 * Bricklet Theme Main Fallback Template (index.php)
 * This is the mandatory fallback template file in WordPress.
 */

get_header();
?>

<!-- Hero Header -->
<section class="w-screen bg-gray-900 text-white py-20 px-4 md:px-8 mt-16 relative overflow-hidden">
    <!-- Overlay Pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(249,115,22,0.1),transparent_70%)] z-0"></div>
    <div class="max-w-7xl mx-auto text-center space-y-4 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-lexend">
            <?php 
            if (is_archive()) {
                the_archive_title();
            } else {
                echo 'News / Topics';
            }
            ?>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Stay updated with PT. Iida Group Holdings' latest press releases, corporate announcements, webinar events, and research developments in Indonesia.
        </p>
    </div>
</section>

<!-- Main Feed Section -->
<section class="max-w-7xl mx-auto px-4 py-16 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            // Get meta thumbnail url
            $image_url = get_post_meta(get_the_ID(), '_featured_image_url', true);
            if (empty($image_url)) {
                $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://images.unsplash.com/photo-1548795179-8bfc5c1ebb24?q=80&w=600';
            }
            ?>
            <article class="bg-white rounded-xl shadow-md overflow-hidden border border-zinc-200 flex flex-col justify-between transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                <!-- Image -->
                <div class="relative w-full h-52 overflow-hidden group">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500" />
                    <span class="absolute top-4 left-4 z-10 px-3 py-1 bg-primary text-white text-xs font-semibold rounded-full uppercase">
                        <?php echo get_the_date('M d, Y'); ?>
                    </span>
                </div>
                
                <!-- Content -->
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="text-xs font-bold text-primary uppercase tracking-wider">
                            <?php the_category(', '); ?>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 hover:text-primary transition-colors line-clamp-2 h-14">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">
                            <?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?>
                        </p>
                    </div>
                    
                    <div class="pt-4 border-t border-zinc-100 flex items-center justify-between">
                        <span class="text-xs text-gray-400">By <?php the_author(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="text-primary font-bold hover:text-primary/70 transition-colors flex items-center gap-1.5 text-sm">
                            Read Article
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </article>
        <?php endwhile; else: ?>
            <div class="col-span-full text-center py-16 px-4 bg-gray-50 rounded-2xl border border-gray-200">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke-width="1.75"></circle>
                        <line x1="12" y1="8" x2="12" y2="12" stroke-width="1.75" stroke-linecap="round"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16" stroke-width="2" stroke-linecap="round"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Konten Ditemukan</h3>
                <p class="text-gray-500 text-sm max-w-md mx-auto mb-6">Artikel atau topik yang Anda cari saat ini belum tersedia atau sedang dalam proses pembaruan.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-2 bg-deep-navy hover:bg-primary text-white px-6 py-2.5 rounded-full font-semibold text-sm transition-all shadow-sm border border-transparent hover:border-[#00b3ff]">
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        <?php
        echo paginate_links(array(
            'prev_text' => '<span class="px-4 py-2 border rounded-full hover:bg-primary hover:text-white transition-colors">&laquo; Previous</span>',
            'next_text' => '<span class="px-4 py-2 border rounded-full hover:bg-primary hover:text-white transition-colors">Next &raquo;</span>',
            'type'      => 'plain',
        ));
        ?>
    </div>
</section>

<?php
get_footer();
?>
