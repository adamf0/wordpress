<?php
/**
 * Bricklet Theme Blog Index Template (home.php)
 */

get_header();
?>

<!-- Hero Header -->
<section class="w-screen bg-gray-900 text-white py-20 px-4 md:px-8 mt-16 relative overflow-hidden">
    <!-- Overlay Pattern -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(249,115,22,0.1),transparent_70%)] z-0"></div>
    <div class="max-w-7xl mx-auto text-center space-y-4 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold font-lexend">News / Topics</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Stay updated with PT. Iida Group Holdings' latest press releases, corporate announcements, webinar events, and research developments in Indonesia.
        </p>
    </div>
</section>

<!-- Blog Grid Section -->
<section class="max-w-7xl mx-auto px-4 py-16 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            // Get meta thumbnail url
            $image_url = get_post_meta(get_the_ID(), '_featured_image_url', true);
            if (empty($image_url)) {
                $image_url = 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&auto=format&fit=crop&q=60';
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
                        <h2 class="text-xl font-bold text-primary hover:text-primary/70 transition-colors line-clamp-2 h-14">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-gray-500 text-sm md:text-base line-clamp-3 leading-relaxed">
                            <?php echo esc_html(get_the_excerpt()); ?>
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
        <?php endwhile; endif; ?>
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
