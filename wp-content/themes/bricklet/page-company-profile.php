<?php
/**
 * Template Name: Company Profile
 */
get_header();

global $wpdb;
$table_company = $wpdb->prefix . 'igh_company_profile';
$table_milestones = $wpdb->prefix . 'igh_company_profile_milestones';

$company = $wpdb->get_row("SELECT * FROM $table_company WHERE id = 1", ARRAY_A);
$milestones = $wpdb->get_results("SELECT * FROM $table_milestones ORDER BY sort_order ASC, year ASC", ARRAY_A);
?>

<main class="">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-deep-navy py-margin-desktop-alt">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover brightness-75" src="<?php echo esc_url($company['hero_bg_image']); ?>" fetchpriority="high" decoding="sync" />
            <div class="absolute inset-0 bg-gradient-to-r from-deep-navy/80 via-deep-navy/40 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-margin-desktop-alt w-full">
            <div class="max-w-2xl text-white">
                <span class="inline-block px-4 py-1 bg-action-cyan text-deep-navy font-label-bold mb-6 rounded-sm"><?php echo esc_html($company['hero_badge']); ?></span>
                <h1 class="font-display-lg text-display-lg mb-6 leading-tight"><?php echo esc_html($company['hero_title']); ?></h1>
                <p class="font-body-lg text-body-lg text-surface-variant/90 mb-8"><?php echo esc_html($company['hero_subtitle']); ?></p>
                <div class="flex flex-wrap gap-4">
                    <?php if (!empty($company['hero_btn1_text']) && !empty($company['hero_btn1_link'])): ?>
                        <a href="<?php echo esc_url(home_url($company['hero_btn1_link'])); ?>" class="bg-primary-container text-on-primary-container px-8 py-3 rounded-lg font-label-bold tracking-widest hover:brightness-105 transition-all inline-block text-center"><?php echo esc_html($company['hero_btn1_text']); ?></a>
                    <?php endif; ?>
                    <?php if (!empty($company['hero_btn2_text']) && !empty($company['hero_btn2_link'])): ?>
                        <a href="<?php echo esc_url(home_url($company['hero_btn2_link'])); ?>" class="border-2 border-white/40 text-white px-8 py-3 rounded-lg font-label-bold tracking-widest hover:bg-white/10 transition-all inline-block text-center"><?php echo esc_html($company['hero_btn2_text']); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="py-margin-desktop-alt bg-surface">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter items-center">
                <div class="reveal-on-scroll">
                    <span class="text-primary font-label-bold uppercase tracking-[0.2em] block mb-4"><?php echo esc_html($company['about_badge']); ?></span>
                    <h2 class="font-headline-lg text-headline-lg mb-8 text-deep-navy"><?php echo esc_html($company['about_title']); ?></h2>
                    <div class="space-y-6 text-on-surface-variant font-body-md text-body-md leading-relaxed">
                        <p><?php echo esc_html($company['about_desc1']); ?></p>
                        <p><?php echo esc_html($company['about_desc2']); ?></p>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8">
                        <?php if (!empty($company['about_stat1_val']) && !empty($company['about_stat1_lbl'])): ?>
                            <div class="border-l-4 border-primary pl-6">
                                <div class="text-3xl font-bold text-deep-navy"><?php echo esc_html($company['about_stat1_val']); ?></div>
                                <div class="text-sm font-label-bold text-outline uppercase mt-1"><?php echo esc_html($company['about_stat1_lbl']); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($company['about_stat2_val']) && !empty($company['about_stat2_lbl'])): ?>
                            <div class="border-l-4 border-action-cyan pl-6">
                                <div class="text-3xl font-bold text-deep-navy"><?php echo esc_html($company['about_stat2_val']); ?></div>
                                <div class="text-sm font-label-bold text-outline uppercase mt-1"><?php echo esc_html($company['about_stat2_lbl']); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="relative reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="aspect-square bg-surface-container-high rounded-xl overflow-hidden shadow-sm border border-structural-gray">
                        <div class="w-full h-full bg-cover bg-center" style="background-image: url('<?php echo esc_url($company['about_image']); ?>')"></div>
                    </div>
                    <?php if (!empty($company['about_overlay_title']) && !empty($company['about_overlay_lbl'])): ?>
                        <div class="absolute -bottom-10 -left-10 bg-deep-navy p-10 text-white hidden md:block rounded-lg shadow-xl">
                            <div class="font-headline-md text-headline-md mb-2"><?php echo esc_html($company['about_overlay_title']); ?></div>
                            <p class="font-caption text-surface-variant/70 uppercase tracking-widest"><?php echo esc_html($company['about_overlay_lbl']); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Section: Sagiri Sakurai -->
    <section class="py-margin-desktop-alt bg-deep-navy relative overflow-hidden">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">
                <div class="lg:col-span-5 relative group reveal-on-scroll">
                    <div class="rounded-xl overflow-hidden border-4 border-white/10 group-hover:border-action-cyan/40 transition-all duration-500">
                        <img alt="<?php echo esc_attr($company['leader_name']); ?>" class="w-full grayscale group-hover:grayscale-0 transition-all duration-700" src="<?php echo esc_url($company['leader_image']); ?>"/>
                    </div>
                    <div class="absolute -bottom-6 right-6 bg-white py-4 px-8 shadow-2xl">
                        <h4 class="text-deep-navy font-bold text-xl uppercase tracking-tighter"><?php echo esc_html($company['leader_name']); ?></h4>
                        <p class="text-primary font-label-bold text-sm"><?php echo esc_html($company['leader_title']); ?></p>
                    </div>
                </div>
                <div class="lg:col-span-6 lg:col-start-7 text-white mt-16 lg:mt-0 reveal-on-scroll" style="transition-delay: 200ms;">
                    <span class="text-action-cyan font-label-bold uppercase tracking-[0.2em] block mb-6">Executive Insight</span>
                    <h2 class="font-display-md text-display-md mb-8">"<?php echo esc_html($company['leader_quote']); ?>"</h2>
                    <p class="font-body-lg text-body-lg text-surface-variant/80 mb-8 italic">"<?php echo esc_html($company['leader_quote_desc']); ?>"</p>
                    <div class="flex items-center gap-4">
                        <div class="h-[1px] w-12 bg-action-cyan"></div>
                        <span class="font-label-bold tracking-widest text-surface-bright"><?php echo esc_html($company['leader_quote_source']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-margin-desktop-alt bg-surface-container-low">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="text-center mb-20 reveal-on-scroll">
                <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4"><?php echo esc_html($company['framework_title']); ?></h2>
                <p class="text-on-surface-variant font-body-md max-w-2xl mx-auto"><?php echo esc_html($company['framework_desc']); ?></p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white p-12 border border-structural-gray rounded-lg hover:shadow-lg transition-shadow reveal-on-scroll">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-8">
                        <span class="material-symbols-outlined text-primary text-3xl"><?php echo esc_html($company['vision_icon']); ?></span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-deep-navy mb-6"><?php echo esc_html($company['vision_title']); ?></h3>
                    <p class="text-on-surface-variant font-body-md leading-relaxed"><?php echo esc_html($company['vision_desc']); ?></p>
                </div>
                <div class="bg-white p-12 border border-structural-gray rounded-lg hover:shadow-lg transition-shadow reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="w-16 h-16 bg-action-cyan/10 rounded-full flex items-center justify-center mb-8">
                        <span class="material-symbols-outlined text-action-cyan text-3xl"><?php echo esc_html($company['mission_icon']); ?></span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-deep-navy mb-6"><?php echo esc_html($company['mission_title']); ?></h3>
                    <p class="text-on-surface-variant font-body-md leading-relaxed"><?php echo esc_html($company['mission_desc']); ?></p>
                </div>
            </div>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-on-scroll" style="transition-delay: 300ms;">
                <div class="flex items-center gap-4 p-6 bg-surface-bright border border-structural-gray">
                    <span class="material-symbols-outlined text-primary"><?php echo esc_html($company['value1_icon']); ?></span>
                    <span class="font-label-bold text-deep-navy"><?php echo esc_html($company['value1_title']); ?></span>
                </div>
                <div class="flex items-center gap-4 p-6 bg-surface-bright border border-structural-gray">
                    <span class="material-symbols-outlined text-primary"><?php echo esc_html($company['value2_icon']); ?></span>
                    <span class="font-label-bold text-deep-navy"><?php echo esc_html($company['value2_title']); ?></span>
                </div>
                <div class="flex items-center gap-4 p-6 bg-surface-bright border border-structural-gray">
                    <span class="material-symbols-outlined text-primary"><?php echo esc_html($company['value3_icon']); ?></span>
                    <span class="font-label-bold text-deep-navy"><?php echo esc_html($company['value3_title']); ?></span>
                </div>
                <div class="flex items-center gap-4 p-6 bg-surface-bright border border-structural-gray">
                    <span class="material-symbols-outlined text-primary"><?php echo esc_html($company['value4_icon']); ?></span>
                    <span class="font-label-bold text-deep-navy"><?php echo esc_html($company['value4_title']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Milestones Section -->
    <section class="py-margin-desktop-alt bg-white overflow-hidden">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="flex justify-between items-end mb-16 reveal-on-scroll">
                <div>
                    <span class="text-primary font-label-bold uppercase tracking-widest block mb-4">Journey</span>
                    <h2 class="font-headline-lg text-headline-lg text-deep-navy">Key Milestones</h2>
                </div>
                <div class="hidden md:flex gap-4">
                    <button class="p-3 border border-structural-gray rounded-full hover:bg-surface transition-colors" id="milestone-prev">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                    <button class="p-3 border border-structural-gray rounded-full bg-deep-navy text-white hover:opacity-90 transition-opacity" id="milestone-next">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </div>
            
            <?php if (!empty($milestones)): ?>
                <div class="relative reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="absolute top-1/2 left-0 w-full h-px bg-structural-gray -translate-y-1/2 hidden lg:block"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter relative">
                        <?php foreach ($milestones as $m): ?>
                            <div class="bg-white p-8 border border-structural-gray lg:border-0 relative hover:bg-surface-container-low transition-colors duration-300">
                                <div class="w-4 h-4 bg-primary rounded-full absolute top-1/2 -left-2 -translate-y-1/2 hidden lg:block border-4 border-white"></div>
                                <div class="text-action-cyan font-bold text-4xl mb-6"><?php echo esc_html($m['year']); ?></div>
                                <h4 class="font-label-bold text-deep-navy uppercase mb-4"><?php echo esc_html($m['title']); ?></h4>
                                <p class="font-body-sm text-on-surface-variant"><?php echo esc_html($m['description']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-margin-desktop-alt bg-primary relative overflow-hidden">
        <div class="absolute inset-0 bg-deep-navy opacity-20"></div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10 text-center reveal-on-scroll">
            <h2 class="font-display-md text-display-md text-white mb-8">Ready to Build Your Legacy?</h2>
            <p class="text-white/80 font-body-lg max-w-2xl mx-auto mb-10">Connect with our engineering specialists to explore partnership opportunities or project inquiries.</p>
            <a class="inline-flex items-center gap-3 bg-white text-primary px-10 py-4 rounded-lg font-label-bold tracking-widest hover:bg-surface-container-lowest transition-all group" href="<?php echo esc_url(home_url('/contact/')); ?>">
                GET IN TOUCH
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
?>
