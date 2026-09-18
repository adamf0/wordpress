<?php
/**
 * Bricklet Theme Page Template (page.php)
 */

get_header();
?>

<!-- Banner Section -->
<section class="relative w-screen h-[30vh] mt-16 flex items-center justify-center bg-zinc-950 overflow-hidden text-white">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40" style="background-image: url('https://images.unsplash.com/photo-1548795179-8bfc5c1ebb24?q=80&w=1200');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-zinc-950"></div>
    <div class="relative z-10 text-center space-y-2 px-6">
        <h1 class="text-3xl md:text-5xl font-extrabold font-lexend tracking-tight">
            <?php the_title(); ?>
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="w-full max-w-4xl mx-auto px-6 py-20 lg:px-8">
    <article class="prose prose-cyan max-w-none text-gray-700 leading-relaxed text-base md:text-lg space-y-6">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile; endif;
        ?>
    </article>
</section>

<?php
get_footer();
?>
