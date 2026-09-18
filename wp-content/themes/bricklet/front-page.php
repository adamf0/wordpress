<?php
/**
 * Bricklet Theme Front Page Template - PT Iida Group Holdings Edition
 */

get_header();

global $wpdb;
$table_hero = $wpdb->prefix . 'igh_homepage_hero';
$table_slides = $wpdb->prefix . 'igh_homepage_hero_slides';
$table_about = $wpdb->prefix . 'igh_homepage_about';

$hero = $wpdb->get_row("SELECT * FROM $table_hero WHERE id = 1", ARRAY_A);
$slides = $wpdb->get_results("SELECT * FROM $table_slides ORDER BY sort_order ASC", ARRAY_A);
$about = $wpdb->get_row("SELECT * FROM $table_about WHERE id = 1", ARRAY_A);
?>

<main class="">
    <!-- Hero Section -->
    <?php if ($hero['hero_mode'] === 'video' && !empty($hero['video_url'])): ?>
        <!-- Video Hero Mode (Transparent background with centered video) -->
        <section class="w-full bg-white border-b border-gray-100">
            <div class="w-full px-0 flex justify-center items-center">
                <div class="relative inline-block max-w-full group/video bg-transparent">
                    <video id="hero-video" class="w-full h-auto max-h-[85vh] object-contain mx-auto block bg-transparent" autoplay muted loop playsinline preload="auto" disablepictureinpicture controlslist="nodownload nofullscreen noremoteplayback">
                        <source src="<?php echo esc_url($hero['video_url']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <!-- Custom sound overlay button -->
                    <button id="video-sound-btn" class="absolute bottom-6 right-6 z-20 flex items-center gap-2 px-4 py-2 bg-black/60 hover:bg-black/80 text-white rounded-lg text-sm font-medium transition-all backdrop-blur-sm cursor-pointer shadow-md select-none border border-white/10">
                        <span class="material-symbols-outlined text-[18px]" id="video-sound-icon">volume_off</span>
                        <span id="video-sound-text">Unmute</span>
                    </button>
                </div>
            </div>
        </section>
    <?php else: ?>
        <!-- Non-Video Hero Mode (Static / Slider) -->
        <section class="relative h-[85vh] flex items-center overflow-hidden bg-deep-navy" style="clip-path: polygon(0 0, 100% 0, 100% 93%, 0 100%); -webkit-clip-path: polygon(0 0, 100% 0, 100% 93%, 0 100%);">
            <?php if ($hero['hero_mode'] === 'slider' && !empty($slides)): ?>
                <!-- Slider Background Mode -->
                <div class="absolute inset-0">
                    <?php foreach ($slides as $index => $slide): ?>
                        <div class="hero-slide absolute inset-0 w-full h-full transition-opacity duration-1000 <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0'; ?>">
                            <!-- Image Background -->
                            <img class="absolute inset-0 w-full h-full object-cover object-center" src="<?php echo esc_url($slide['slide_image_url']); ?>" alt="Slide <?php echo $index; ?>" />
                            <div class="absolute inset-0 bg-gradient-to-r from-deep-navy via-deep-navy/60 to-transparent"></div>
                            
                            <!-- Slide Overlay Text Content -->
                            <?php
                            $use_global = isset($hero['use_global_card']) && (int)$hero['use_global_card'] === 1;
                            $badge = $use_global ? $hero['badge_text'] : $slide['badge_text'];
                            $title = $use_global ? $hero['title'] : $slide['title'];
                            $subtitle = $use_global ? $hero['subtitle'] : $slide['subtitle'];
                            $btn1_text = $use_global ? $hero['btn1_text'] : $slide['btn1_text'];
                            $btn1_link = $use_global ? $hero['btn1_link'] : $slide['btn1_link'];
                            $btn2_text = $use_global ? $hero['btn2_text'] : $slide['btn2_text'];
                            $btn2_link = $use_global ? $hero['btn2_link'] : $slide['btn2_link'];
                            ?>
                            <?php if (!empty($title)): ?>
                                <div class="absolute inset-0 flex items-center">
                                    <div class="max-w-container-max mx-auto w-full px-margin-desktop-alt">
                                        <div class="max-w-2xl text-white">
                                            <?php if (!empty($badge)): ?>
                                                <span class="inline-block text-action-cyan font-label-bold tracking-[0.2em] mb-4 uppercase"><?php echo esc_html($badge); ?></span>
                                            <?php endif; ?>
                                            <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight"><?php echo esc_html($title); ?></h1>
                                            <?php if (!empty($subtitle)): ?>
                                                <p class="font-body-lg text-body-lg text-outline-variant mb-10 leading-relaxed">
                                                    <?php echo esc_html($subtitle); ?>
                                                </p>
                                            <?php endif; ?>
                                            <div class="flex flex-wrap gap-4">
                                                <?php if (!empty($btn1_text) && !empty($btn1_link)): ?>
                                                    <a href="<?php echo bricklet_get_button_url($btn1_link); ?>" class="bg-primary-container text-on-primary-container px-8 py-4 rounded font-label-bold uppercase hover:brightness-110 transition-all text-center inline-block">
                                                        <?php echo esc_html($btn1_text); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (!empty($btn2_text) && !empty($btn2_link)): ?>
                                                    <a href="<?php echo bricklet_get_button_url($btn2_link); ?>" class="border-2 border-white text-white px-8 py-4 rounded font-label-bold uppercase hover:bg-white/10 transition-all text-center inline-block">
                                                        <?php echo esc_html($btn2_text); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- Static Image Background Mode (Default) -->
                <div class="absolute inset-0 opacity-40">
                    <img class="w-full h-full object-cover object-center" alt="Hero Static Background" src="<?php echo esc_url($hero['static_image_url']); ?>" fetchpriority="high" decoding="sync" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-deep-navy via-deep-navy/60 to-transparent"></div>
                
                <div class="relative z-10 max-w-container-max mx-auto w-full px-margin-desktop-alt">
                    <div class="max-w-2xl text-white">
                        <span class="inline-block text-action-cyan font-label-bold tracking-[0.2em] mb-4 uppercase"><?php echo esc_html($hero['badge_text']); ?></span>
                        <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight"><?php echo esc_html($hero['title']); ?></h1>
                        <p class="font-body-lg text-body-lg text-outline-variant mb-10 leading-relaxed">
                            <?php echo esc_html($hero['subtitle']); ?>
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <?php if (!empty($hero['btn1_text']) && !empty($hero['btn1_link'])): ?>
                                <a href="<?php echo bricklet_get_button_url($hero['btn1_link']); ?>" class="bg-primary-container text-on-primary-container px-8 py-4 rounded font-label-bold uppercase hover:brightness-110 transition-all text-center inline-block">
                                    <?php echo esc_html($hero['btn1_text']); ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($hero['btn2_text']) && !empty($hero['btn2_link'])): ?>
                                <a href="<?php echo bricklet_get_button_url($hero['btn2_link']); ?>" class="border-2 border-white text-white px-8 py-4 rounded font-label-bold uppercase hover:bg-white/10 transition-all text-center inline-block">
                                    <?php echo esc_html($hero['btn2_text']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <!-- About Us Section -->
    <section class="max-w-container-max mx-auto px-margin-desktop-alt py-margin-desktop-alt">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
            <div class="order-2 lg:order-1 reveal-on-scroll">
                <span class="text-primary font-label-bold tracking-widest uppercase mb-4 block"><?php echo esc_html(wp_unslash($about['badge_text'])); ?></span>
                <h2 class="font-display-md text-display-md text-deep-navy mb-8"><?php echo esc_html(wp_unslash($about['title'])); ?></h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-6 leading-relaxed">
                    <?php echo esc_html(wp_unslash($about['paragraph1'])); ?>
                </p>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8 leading-relaxed">
                    <?php echo esc_html(wp_unslash($about['paragraph2'])); ?>
                </p>
                <ul class="space-y-4 mb-10">
                    <?php if (!empty($about['check_1'])): ?>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-action-cyan" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            <span class="font-body-md"><?php echo esc_html(wp_unslash($about['check_1'])); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($about['check_2'])): ?>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-action-cyan" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            <span class="font-body-md"><?php echo esc_html(wp_unslash($about['check_2'])); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (!empty($about['check_3'])): ?>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-action-cyan" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            <span class="font-body-md"><?php echo esc_html(wp_unslash($about['check_3'])); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!empty($about['btn_text']) && !empty($about['btn_link'])): ?>
                    <a class="inline-flex items-center gap-2 text-primary font-label-bold uppercase border-b-2 border-primary-container pb-1 hover:border-primary transition-all" href="<?php echo bricklet_get_button_url($about['btn_link']); ?>">
                        <?php echo esc_html(wp_unslash($about['btn_text'])); ?>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="order-1 lg:order-2 relative reveal-on-scroll" style="transition-delay: 200ms;">
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-primary-container/10 -z-10 rounded-full"></div>
                <?php if (!empty($about['image_url'])): ?>
                    <img alt="<?php echo esc_attr(wp_unslash($about['title'])); ?>" class="rounded-lg shadow-xl w-full object-cover aspect-[4/3] border border-structural-gray" src="<?php echo esc_url($about['image_url']); ?>" width="640" height="480"/>
                <?php endif; ?>
                <?php if (!empty($about['experience_years']) || !empty($about['experience_text'])): ?>
                    <div class="absolute -bottom-8 -left-8 bg-white p-6 shadow-lg border border-structural-gray hidden lg:block rounded-2xl">
                        <?php if (!empty($about['experience_years'])): ?>
                            <div class="text-primary font-headline-md font-bold text-lg"><?php echo esc_html(wp_unslash($about['experience_years'])); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($about['experience_text'])): ?>
                            <div class="text-on-surface-variant text-caption"><?php echo esc_html(wp_unslash($about['experience_text'])); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="bg-surface-container-low py-margin-desktop-alt px-margin-desktop-alt">
        <div class="max-w-container-max mx-auto">
            <div class="text-center mb-16 reveal-on-scroll">
                <span class="text-primary font-label-bold tracking-[0.2em] uppercase">Our Services</span>
                <h2 class="font-display-md text-display-md text-deep-navy mt-4">Pioneering Building Solutions</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Service Card 1 -->
                <div class="group bg-white border border-structural-gray rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 reveal-on-scroll">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img alt="Our Products" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo get_template_directory_uri(); ?>/images/layout/our-products.webp" width="640" height="360"/>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md mb-3 text-deep-navy">Our Products</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 text-xs">High-performance earthquake resistant concrete and paving blocks.</p>
                        <a class="flex items-center gap-2 text-primary font-label-bold uppercase group-hover:text-action-cyan transition-colors" href="<?php echo esc_url(home_url('/products/')); ?>">
                            View Catalog
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
                <!-- Service Card 2 -->
                <div class="group bg-white border border-structural-gray rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 reveal-on-scroll" style="transition-delay: 100ms;">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img alt="Our Business" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_6cf6b8e07d2c4c48f9d206d683ffa89e.webp" width="640" height="360"/>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md mb-3 text-deep-navy">Our Business</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 text-xs">Innovative development strategies for modern housing needs.</p>
                        <a class="flex items-center gap-2 text-primary font-label-bold uppercase group-hover:text-action-cyan transition-colors" href="<?php echo esc_url(home_url('/our-business/')); ?>">
                            Explore
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
                <!-- Service Card 3 -->
                <div class="group bg-white border border-structural-gray rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img alt="Group Company" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_6c9ec96a796c905cd4e46e0348e114fe.webp" width="640" height="360"/>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md mb-3 text-deep-navy">Group Company</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 text-xs">A synergy of industry leaders under one corporate umbrella.</p>
                        <a class="flex items-center gap-2 text-primary font-label-bold uppercase group-hover:text-action-cyan transition-colors" href="<?php echo esc_url(home_url('/group-company/')); ?>">
                            Our Network
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
                <!-- Service Card 4 -->
                <div class="group bg-white border border-structural-gray rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 reveal-on-scroll" style="transition-delay: 300ms;">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img alt="Contact Us" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_6a6f22c0f99b72467d0d3015a72c5168.webp" width="640" height="360"/>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md mb-3 text-deep-navy">Contact Us</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 text-xs">Connect with our engineering experts for your next project.</p>
                        <a class="flex items-center gap-2 text-primary font-label-bold uppercase group-hover:text-action-cyan transition-colors" href="<?php echo esc_url(home_url('/contact/')); ?>">
                            Get In Touch
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News / Topics Section -->
    <section class="bg-mesh relative overflow-hidden py-margin-desktop-alt px-margin-desktop-alt">
        <div class="max-w-container-max mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-4 reveal-on-scroll">
                <div>
                    <span class="text-primary font-label-bold tracking-widest uppercase">Insights &amp; Updates</span>
                    <h2 class="font-display-md text-display-md text-deep-navy mt-4">News / Topics</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="flex items-center gap-2 text-primary font-label-bold uppercase hover:text-deep-navy transition-colors">
                    View All News
                    <span class="material-symbols-outlined text-sm">list</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <?php
                // Fetch dynamic news from database
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
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
                                <img alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?php echo esc_url($feat_image); ?>" width="450" height="300"/>
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
                    wp_reset_postdata();
                else :
                    // Fallback to static mock posts from home.html
                    ?>
                    <!-- News Item 1 -->
                    <article class="bg-white p-4 border border-structural-gray group reveal-on-scroll">
                        <div class="relative aspect-[1.5] overflow-hidden mb-6">
                            <img alt="Earthquake Resistant Construction" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_d038fce4e1889d85acf5a9263aabd6c1.webp" width="450" height="300"/>
                            <div class="absolute top-4 left-4 bg-deep-navy text-white text-caption px-3 py-1 font-label-bold">APRIL 8, 2026</div>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 line-clamp-2 hover:text-primary transition-colors cursor-pointer">Earthquake Resistant Building Construction with IG Strong CB</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 line-clamp-3 text-xs">
                            PT Iida Group Holdings reaffirmed its commitment to advancing earthquake-resistant construction solutions in Indonesia...
                        </p>
                        <a class="inline-block text-primary font-label-bold uppercase border-b border-primary hover:text-action-cyan hover:border-action-cyan transition-all" href="#">Read More</a>
                    </article>
                    <!-- News Item 2 -->
                    <article class="bg-white p-4 border border-structural-gray group reveal-on-scroll" style="transition-delay: 100ms;">
                        <div class="relative aspect-[1.5] overflow-hidden mb-6">
                            <img alt="Staff Seminar Webinar" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_5c5e1e171f2eb73fe5ce623c77f72206.webp" width="450" height="300"/>
                            <div class="absolute top-4 left-4 bg-deep-navy text-white text-caption px-3 py-1 font-label-bold">DEC 23, 2025</div>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 line-clamp-2 hover:text-primary transition-colors cursor-pointer">Japanese Construction Technology in Webinar on Advancement</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 line-clamp-3 text-xs">
                            Knowledge sharing session with Mr. Raden Rukyat Hendrawan focusing on innovation and Japanese engineering excellence...
                        </p>
                        <a class="inline-block text-primary font-label-bold uppercase border-b border-primary hover:text-action-cyan hover:border-action-cyan transition-all" href="#">Read More</a>
                    </article>
                    <!-- News Item 3 -->
                    <article class="bg-white p-4 border border-structural-gray group reveal-on-scroll" style="transition-delay: 200ms;">
                        <div class="relative aspect-[1.5] overflow-hidden mb-6">
                            <img alt="New Business Line Announcement" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_350b5ef48a2ce4e56a0dc2b69b991533.webp" width="450" height="300"/>
                            <div class="absolute top-4 left-4 bg-deep-navy text-white text-caption px-3 py-1 font-label-bold">OCT 1, 2025</div>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-4 line-clamp-2 hover:text-primary transition-colors cursor-pointer">Launch of New Business Line – Construction Materials</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-6 line-clamp-3 text-xs">
                            Officially launching our dedicated Construction Materials Business division to better serve the growing Indonesian market...
                        </p>
                        <a class="inline-block text-primary font-label-bold uppercase border-b border-primary hover:text-action-cyan hover:border-action-cyan transition-all" href="#">Read More</a>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Collaboration Section -->
    <section class="py-margin-desktop-alt bg-deep-navy text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/20 -skew-x-12 transform translate-x-1/2"></div>
        <div class="max-w-container-max mx-auto relative z-10 px-margin-desktop-alt">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-gutter text-center lg:text-left reveal-on-scroll">
                <div class="max-w-2xl">
                    <span class="text-action-cyan font-label-bold tracking-[0.2em] uppercase mb-4 block">Let's Collaborate!</span>
                    <h2 class="font-display-md text-display-md mb-8">Bring your ideas to life with precision engineering</h2>
                    <p class="font-body-lg text-body-lg text-outline-variant mb-0 opacity-80">
                        Partner with us to create safer, sustainable, and reliable building environments.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 shrink-0 mt-8 lg:mt-0">
                    <a class="bg-primary-container text-on-primary-container px-10 py-5 rounded font-label-bold uppercase shadow-xl hover:scale-105 active:scale-95 transition-all text-center" href="<?php echo esc_url(home_url('/contact/')); ?>">
                        Get Started Now
                    </a>
                    <a class="flex items-center justify-center gap-3 border border-white/30 px-10 py-5 rounded font-label-bold uppercase hover:bg-white/5 transition-all" href="tel:622186869299">
                        <span class="material-symbols-outlined">phone</span>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        // Slider Background Loop (cycles opacity and z-index for clickability)
        const slides = document.querySelectorAll('.hero-slide');
        if (slides.length > 1) {
            let current = 0;
            setInterval(() => {
                slides[current].classList.remove('opacity-100', 'z-10');
                slides[current].classList.add('opacity-0', 'z-0');
                current = (current + 1) % slides.length;
                slides[current].classList.remove('opacity-0', 'z-0');
                slides[current].classList.add('opacity-100', 'z-10');
            }, 5000);
        }

        // Video sound controls
        const heroVideo = document.getElementById('hero-video');
        const soundBtn = document.getElementById('video-sound-btn');
        const soundIcon = document.getElementById('video-sound-icon');
        const soundText = document.getElementById('video-sound-text');
        
        if (soundBtn && heroVideo) {
            soundBtn.addEventListener('click', () => {
                heroVideo.muted = !heroVideo.muted;
                if (heroVideo.muted) {
                    soundIcon.textContent = 'volume_off';
                    soundText.textContent = 'Unmute';
                } else {
                    heroVideo.volume = 1.0; // Ensure volume is up
                    soundIcon.textContent = 'volume_up';
                    soundText.textContent = 'Mute';
                }
            });
        }
    });
</script>

<?php
get_footer();
?>
