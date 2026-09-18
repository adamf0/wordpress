<?php
/**
 * Bricklet Theme Single Post Template (single.php)
 */

get_header();
?>

<!-- Article Header Section -->
<section class="max-w-4xl mx-auto px-4 pb-8 text-center mt-16 space-y-4">
    <div class="text-xs font-bold text-primary uppercase tracking-widest">
        <?php the_category(', '); ?>
    </div>
    <h1 class="text-3xl md:text-5xl font-bold font-lexend text-gray-800 leading-tight">
        <?php the_title(); ?>
    </h1>
    <div class="flex items-center justify-center gap-4 text-gray-400 text-sm">
        <span>By <?php the_author(); ?></span>
        <span>&bull;</span>
        <span>Published <?php echo get_the_date('F d, Y'); ?></span>
    </div>
</section>

<!-- Article Image -->
<?php
$image_url = get_post_meta(get_the_ID(), '_featured_image_url', true);
if (empty($image_url) && has_post_thumbnail()) {
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
if (!empty($image_url)) :
?>
<section class="max-w-5xl mx-auto px-4 mb-12">
    <div class="relative w-full h-[300px] md:h-[500px] rounded-2xl overflow-hidden shadow-lg">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="object-cover w-full h-full" />
    </div>
</section>
<?php endif; ?>

<!-- Article Body Content -->
<article class="max-w-3xl mx-auto px-4 pb-20">
    <div class="prose prose-cyan lg:prose-xl max-w-none text-on-surface-variant leading-relaxed text-lg md:text-xl space-y-6">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </div>

    <!-- Back to Blog Navigation -->
    <div class="pt-12 border-t border-zinc-200 mt-12 flex justify-between items-center">
        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="flex items-center gap-2 text-primary font-bold hover:text-deep-navy transition-colors">
            <span class="material-symbols-outlined text-sm">arrow_back</span>
            <span>Back to News</span>
        </a>
    </div>
</article>

<?php
get_footer();
?>
