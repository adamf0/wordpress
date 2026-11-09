<?php
/**
 * Template Name: Group Company
 */
get_header();

global $wpdb;
$table_group = $wpdb->prefix . 'igh_group_company';
$table_entities = $wpdb->prefix . 'igh_group_company_entities';

$group = $wpdb->get_row("SELECT * FROM $table_group WHERE id = 1", ARRAY_A);
$entities = $wpdb->get_results("SELECT * FROM $table_entities ORDER BY sort_order ASC, name ASC", ARRAY_A);
?>

<main class="">
    <!-- Hero Section -->
    <section class="relative h-[716px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover object-center" alt="Group Company Hero Background" src="<?php echo esc_url($group['hero_bg_image']); ?>" fetchpriority="high" decoding="sync" />
            <div class="absolute inset-0 bg-gradient-to-r from-deep-navy/90 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-container-max mx-auto px-margin-desktop-alt w-full">
            <div class="max-w-2xl">
                <span class="inline-block py-1 px-3 bg-action-cyan/20 text-action-cyan font-label-bold text-label-bold mb-6 tracking-[0.2em] uppercase"><?php echo esc_html($group['hero_badge']); ?></span>
                <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight"><?php echo esc_html($group['hero_title']); ?></h1>
                <p class="font-body-lg text-body-lg text-surface-variant mb-10 opacity-90 leading-relaxed">
                    <?php echo esc_html($group['hero_subtitle']); ?>
                </p>
                <div class="flex gap-4">
                    <div class="h-1 w-24 bg-primary-container"></div>
                    <div class="h-1 w-12 bg-structural-gray/30"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Group Company Grid -->
    <section class="py-margin-desktop-alt bg-surface">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-gutter">
                <div class="max-w-xl">
                    <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4"><?php echo esc_html($group['grid_title']); ?></h2>
                    <p class="font-body-md text-body-md text-on-surface-variant"><?php echo esc_html($group['grid_desc']); ?></p>
                </div>
                <div class="text-primary font-label-bold text-label-bold tracking-widest flex items-center gap-2">
                    <?php echo esc_html($group['grid_side_text']); ?> <span class="material-symbols-outlined">corporate_fare</span>
                </div>
            </div>
            <?php if (!empty($entities)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($entities as $index => $e): 
                        $card_anchor = sanitize_title($e['name']);
                        if (stripos($e['name'], 'iida sangyo') !== false) {
                            $card_anchor = 'iida-sangyo';
                        } elseif (stripos($e['name'], 'hajime') !== false) {
                            $card_anchor = 'hajime';
                        } elseif (stripos($e['name'], 'tact home') !== false) {
                            $card_anchor = 'tact-home';
                        } elseif (stripos($e['name'], 'touei') !== false) {
                            $card_anchor = 'touei';
                        }
                    ?>
                        <div id="<?php echo esc_attr($card_anchor); ?>" class="bento-hover bg-white border border-structural-gray p-8 flex flex-col justify-between group reveal-on-scroll scroll-mt-28 transition-all hover:border-action-cyan/50 hover:shadow-xl rounded-xl" style="<?php echo $index > 0 ? "transition-delay: " . ($index * 100) . "ms;" : ""; ?>">
                            <div>
                                <div class="h-12 w-full mb-8 flex items-center">
                                    <span class="material-symbols-outlined text-primary text-4xl" data-weight="fill"><?php echo esc_html($e['icon']); ?></span>
                                </div>
                                <h3 class="font-headline-md text-headline-md text-deep-navy mb-4"><?php echo esc_html($e['name']); ?></h3>
                                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed text-xs font-body-sm"><?php echo esc_html($e['description']); ?></p>
                            </div>
                            <?php if (!empty($e['link_url'])): ?>
                                <a href="<?php echo esc_url($e['link_url']); ?>" target="_blank" rel="noopener noreferrer" class="mt-8 pt-6 border-t border-structural-gray flex justify-between items-center hover:opacity-85 transition-opacity">
                                    <span class="text-primary font-label-bold text-label-bold text-xs"><?php echo esc_html($e['link_text'] ?: 'VIEW WEBSITE'); ?></span>
                                    <span class="material-symbols-outlined text-on-surface-variant group-hover:translate-x-2 transition-transform">arrow_forward</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Perumnas Iida Collaboration Section -->
    <section class="py-margin-desktop-alt bg-deep-navy text-white relative overflow-hidden">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="relative group reveal-on-scroll">
                    <div class="aspect-[4/5] overflow-hidden rounded-sm border border-white/10">
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" style="background-image: url('<?php echo esc_url($group['collab_image']); ?>')"></div>
                    </div>
                    <?php if (!empty($group['collab_stat_val']) && !empty($group['collab_stat_lbl'])): ?>
                        <div class="absolute -bottom-10 -right-10 bg-primary-container p-12 hidden md:block">
                            <div class="text-5xl font-bold mb-2 text-deep-navy"><?php echo esc_html($group['collab_stat_val']); ?></div>
                            <div class="font-label-bold text-label-bold tracking-widest text-deep-navy text-sm"><?php echo esc_html($group['collab_stat_lbl']); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex flex-col gap-8 reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="flex items-center gap-4 text-action-cyan">
                        <div class="h-px w-12 bg-action-cyan"></div>
                        <span class="font-label-bold text-label-bold uppercase tracking-[0.3em] text-xs"><?php echo esc_html($group['collab_badge']); ?></span>
                    </div>
                    <h2 class="font-display-md text-display-md"><?php echo esc_html($group['collab_title']); ?></h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant/80 opacity-90 leading-relaxed font-light">
                        <?php echo esc_html($group['collab_desc']); ?>
                    </p>
                    <div class="space-y-6 mt-4">
                        <?php if (!empty($group['collab_f1_title']) && !empty($group['collab_f1_desc'])): ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-action-cyan"><?php echo esc_html($group['collab_f1_icon']); ?></span>
                                </div>
                                <div>
                                    <h4 class="font-headline-md text-[20px] mb-1"><?php echo esc_html($group['collab_f1_title']); ?></h4>
                                    <p class="font-body-sm text-surface-variant/70 text-xs"><?php echo esc_html($group['collab_f1_desc']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($group['collab_f2_title']) && !empty($group['collab_f2_desc'])): ?>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center shrink-0">
                                    <span class="material-symbols-outlined text-action-cyan"><?php echo esc_html($group['collab_f2_icon']); ?></span>
                                </div>
                                <div>
                                    <h4 class="font-headline-md text-[20px] mb-1"><?php echo esc_html($group['collab_f2_title']); ?></h4>
                                    <p class="font-body-sm text-surface-variant/70 text-xs"><?php echo esc_html($group['collab_f2_desc']); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($group['collab_btn_text']) && !empty($group['collab_btn_link'])): ?>
                        <div class="mt-8">
                            <a href="<?php echo esc_url(home_url($group['collab_btn_link'])); ?>" class="inline-flex bg-action-cyan text-deep-navy font-bold px-10 py-4 rounded-sm hover:brightness-110 transition-all items-center gap-3">
                                <?php echo esc_html($group['collab_btn_text']); ?>
                                <span class="material-symbols-outlined">north_east</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="py-margin-desktop-alt bg-surface-muted">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter text-center reveal-on-scroll">
                <div>
                    <div class="text-display-md text-primary mb-2"><?php echo esc_html($group['stat1_val']); ?></div>
                    <div class="font-label-bold text-label-bold text-on-surface-variant text-xs"><?php echo esc_html($group['stat1_lbl']); ?></div>
                </div>
                <div>
                    <div class="text-display-md text-primary mb-2"><?php echo esc_html($group['stat2_val']); ?></div>
                    <div class="font-label-bold text-label-bold text-on-surface-variant text-xs"><?php echo esc_html($group['stat2_lbl']); ?></div>
                </div>
                <div>
                    <div class="text-display-md text-primary mb-2"><?php echo esc_html($group['stat3_val']); ?></div>
                    <div class="font-label-bold text-label-bold text-on-surface-variant text-xs"><?php echo esc_html($group['stat3_lbl']); ?></div>
                </div>
                <div>
                    <div class="text-display-md text-primary mb-2"><?php echo esc_html($group['stat4_val']); ?></div>
                    <div class="font-label-bold text-label-bold text-on-surface-variant text-xs"><?php echo esc_html($group['stat4_lbl']); ?></div>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            const targetId = window.location.hash.substring(1);
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                setTimeout(() => {
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    targetEl.classList.add("ring-2", "ring-action-cyan");
                    setTimeout(() => {
                        targetEl.classList.remove("ring-2", "ring-action-cyan");
                    }, 2500);
                }, 300);
            }
        }
    });
</script>

<?php
get_footer();
?>
