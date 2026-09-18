<?php
/**
 * Template Name: Products
 */
get_header();
?>

<main class="">
    <section class="relative overflow-hidden bg-deep-navy py-margin-desktop-alt">
        <div class="absolute inset-0 opacity-20">
            <img class="w-full h-full object-cover object-center mix-blend-overlay" alt="A cinematic aerial view of a massive construction material logistics hub at dawn." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" decoding="sync" />
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10 text-center">
            <span class="text-action-cyan font-label-bold text-label-bold uppercase tracking-widest mb-4 block">Engineered for Excellence</span>
            <h1 class="text-white font-display-lg text-display-lg md:max-w-3xl mx-auto leading-tight mb-6">High-Quality Construction Solutions</h1>
            <p class="text-surface-variant font-body-lg text-body-lg md:max-w-2xl mx-auto opacity-90 mb-10">
                Integrating Japanese precision with local expertise to deliver robust, sustainable, and earthquake-resistant structural materials for the Indonesian landscape.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a class="bg-primary-container text-on-primary-container px-8 py-4 rounded font-body-md font-bold hover:shadow-lg transition-all" href="#product-grid">Explore Portfolio</a>
                <a class="border-2 border-white/20 text-white px-8 py-4 rounded font-body-md font-bold hover:bg-white/10 transition-all" href="<?php echo esc_url(home_url('/contact/')); ?>">Technical Specs</a>
            </div>
        </div>
    </section>

    <section class="py-margin-desktop-alt bg-surface" id="product-grid">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 md:mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4">Industrial Components &amp; Structural Materials</h2>
                    <div class="h-1 w-24 bg-primary-container"></div>
                </div>
                <div class="flex gap-4 overflow-x-auto">
                    <button class="px-4 py-2 border border-structural-gray rounded bg-white text-on-surface-variant hover:border-primary transition-all">All Products</button>
                    <button class="px-4 py-2 border border-structural-gray rounded bg-white text-on-surface-variant hover:border-primary transition-all">Concrete</button>
                    <button class="px-4 py-2 border border-structural-gray rounded bg-white text-on-surface-variant hover:border-primary transition-all">Structural</button>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                <article class="product-card group bg-white border border-structural-gray rounded-lg overflow-hidden transition-all hover:shadow-xl reveal-on-scroll">
                    <div class="relative aspect-video overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Close-up architectural shot of IG Strong CB concrete blocks arranged in a precision pattern." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_e39e29fad1d5c71512e7e27847d133e5.webp" width="640" height="360"/>
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary px-3 py-1 text-white font-label-bold text-[10px] rounded uppercase">Featured Innovation</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-3">Osaka Strong CB</h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3">
                            High-performance earthquake-resistant concrete blocks engineered using proprietary reinforcement technology. Designed to withstand seismic forces while maintaining structural integrity in high-density urban environments.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-structural-gray">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">security</span>
                                <span class="text-caption font-caption text-outline">JIS Certified</span>
                            </div>
                            <a href="<?php echo esc_url(home_url('/product-osaka-strong-cb/')); ?>" class="flex items-center gap-2 text-primary font-label-bold group-hover:gap-4 transition-all">
                                View Details
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
                <article class="product-card group bg-white border border-structural-gray rounded-lg overflow-hidden transition-all hover:shadow-xl reveal-on-scroll" style="transition-delay: 100ms;">
                    <div class="relative aspect-video overflow-hidden">
                        <img alt="Osaka Expo 2025 Inspiration" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_3a74ae4d4007290b1022e3a9b0989537.webp" width="640" height="360"/>
                        <div class="absolute top-4 left-4">
                            <span class="bg-secondary px-3 py-1 text-white font-label-bold text-[10px] rounded uppercase">Infrastructure</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-3">Construction Material</h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3">
                            Comprehensive suite of premium building materials sourced and manufactured to global standards. From foundation to finish, our materials provide the skeletal strength for iconic architectural projects.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-structural-gray">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">architecture</span>
                                <span class="text-caption font-caption text-outline">High Durability</span>
                            </div>
                            <a href="<?php echo esc_url(home_url('/product-construction-material/')); ?>" class="flex items-center gap-2 text-primary font-label-bold group-hover:gap-4 transition-all">
                                View Details
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
                <article class="product-card group bg-white border border-structural-gray rounded-lg overflow-hidden transition-all hover:shadow-xl lg:col-span-1 reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="relative aspect-video overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A clean, industrial warehouse setting showcasing neatly stacked structural steel and concrete reinforcements." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_313de2930ff6bf791f41afe40f552749.webp" width="640" height="360"/>
                        <div class="absolute top-4 left-4">
                            <span class="bg-deep-navy px-3 py-1 text-white font-label-bold text-[10px] rounded uppercase">Custom Solutions</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-3">Modular Systems</h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3">
                            Prefabricated structural modules that accelerate construction timelines without compromising on structural safety or aesthetic finish. Ideal for large-scale development projects.
                        </p>
                        <div class="flex items-center justify-between pt-6 border-t border-structural-gray">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">precision_manufacturing</span>
                                <span class="text-caption font-caption text-outline">Modern Build</span>
                            </div>
                            <a href="#" class="flex items-center gap-2 text-primary font-label-bold group-hover:gap-4 transition-all">
                                View Details
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="py-margin-desktop-alt bg-surface-container-low overflow-hidden relative">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt grid grid-cols-1 lg:grid-cols-2 items-center gap-gutter">
            <div class="relative z-10 reveal-on-scroll">
                <h2 class="font-display-md text-display-md text-deep-navy mb-6">Commitment to Reliability</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-lg">
                    Our products undergo rigorous testing protocols to ensure they meet the highest safety standards. We believe that every brick and beam is a promise of stability for the families and businesses we serve.
                </p>
                <ul class="space-y-4 mb-10">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                        <div>
                            <strong class="text-deep-navy block font-semibold">Japanese Engineering Standards</strong>
                            <span class="text-body-sm text-on-surface-variant">Uncompromising quality control at every stage of production.</span>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                        <div>
                            <strong class="text-deep-navy block font-semibold">Sustainable Manufacturing</strong>
                            <span class="text-body-sm text-on-surface-variant">Minimizing environmental impact through efficient energy use.</span>
                        </div>
                    </li>
                </ul>
                <a class="inline-flex items-center justify-center bg-deep-navy text-white px-8 py-4 rounded font-body-md font-bold hover:bg-black transition-all" href="<?php echo esc_url(home_url('/contact/')); ?>">
                    Download Catalog (PDF)
                </a>
            </div>
            <div class="relative reveal-on-scroll" style="transition-delay: 200ms;">
                <div class="aspect-square bg-structural-gray rounded-xl overflow-hidden relative">
                    <img class="w-full h-full object-cover" data-alt="High-detail macro photograph of a cross-section of a high-strength concrete component." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_f6743e715b2f037507b08879b9ec0411.webp" width="800" height="800"/>
                </div>
                <div class="absolute -bottom-8 -left-8 bg-white p-8 border border-structural-gray shadow-xl hidden md:block max-w-xs">
                    <span class="text-display-md text-primary font-bold">15+</span>
                    <p class="text-label-bold text-on-surface-variant font-bold uppercase mt-2">Years of Engineering Excellence in Indonesia</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-margin-desktop-alt animate-fade-in">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="bg-primary py-16 px-8 md:px-20 text-center rounded-lg relative overflow-hidden reveal-on-scroll">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="w-full h-full bg-[length:400px_400px] bg-repeat" data-alt="Seamless technical pattern of blueprints and geometric construction lines." style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/layout/lh3_138e322720c49ad45d683962ff83c4e3.webp')"></div>
                </div>
                <div class="relative z-10">
                    <h2 class="text-white font-headline-lg text-headline-lg mb-6">Ready to Start Your Project?</h2>
                    <p class="text-primary-fixed font-body-lg text-body-lg mb-10 max-w-2xl mx-auto">
                        Connect with our technical consultants to discuss product specifications, custom solutions, and bulk procurement for your next development.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="bg-white text-primary px-10 py-4 rounded font-body-md font-bold hover:shadow-xl transition-all text-center">Get in Touch</a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="border-2 border-white/40 text-white px-10 py-4 rounded font-body-md font-bold hover:bg-white/10 transition-all text-center">Request a Sample</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
