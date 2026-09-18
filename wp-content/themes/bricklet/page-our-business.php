<?php
/**
 * Template Name: Our Business
 */
get_header();
?>

<main class="">
    <!-- Hero Section -->
    <section class="relative h-[60vh] [@media(max-width:505px)]:h-auto flex items-center bg-deep-navy overflow-hidden">
        <div class="absolute inset-0 opacity-40">
            <img class="w-full h-full object-cover" data-alt="A cinematic, wide-angle shot of a high-tech industrial manufacturing facility during the golden hour." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_4e7dcb7a7dc7f918cf46601d23a5b81a.webp" fetchpriority="high" decoding="sync"/>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10 text-white">
            <span class="font-label-bold text-label-bold text-action-cyan tracking-widest block mb-4">OUR CAPABILITIES</span>
            <h1 class="font-display-lg text-display-lg mb-6 max-w-2xl leading-tight">Precision Operations &amp; Manufacturing</h1>
            <p class="font-body-lg text-body-lg text-surface-variant/80 max-w-xl">Harnessing Japanese engineering standards to redefine residential construction through industrial efficiency and quality control.</p>
        </div>
    </section>

    <!-- Operational Philosophy -->
    <section class="py-margin-desktop-alt max-w-container-max mx-auto px-margin-desktop-alt">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">
            <div class="md:col-span-5 reveal-on-scroll">
                <span class="font-label-bold text-label-bold text-primary mb-4 block uppercase">Manufacturing Excellence</span>
                <h2 class="font-headline-lg text-headline-lg mb-8 text-deep-navy">Japanese Engineering Excellence</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-6 leading-relaxed">
                    At PT Iida Group, we translate decades of Japanese architectural precision into the Indonesian landscape. Our business model integrates cutting-edge prefabrication technology with localized operational expertise, ensuring every home meets a global standard of stability and longevity.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded bg-primary-container/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">precision_manufacturing</span>
                        </div>
                        <div>
                            <h4 class="font-body-md font-bold text-deep-navy">Precision Prefabrication</h4>
                            <p class="font-body-sm text-on-surface-variant">Standardized manufacturing processes that eliminate manual errors on-site.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded bg-primary-container/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">verified</span>
                        </div>
                        <div>
                            <h4 class="font-body-md font-bold text-deep-navy">ISO Standard QC</h4>
                            <p class="font-body-sm text-on-surface-variant">Rigorous multi-stage quality control at our specialized factory locations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-7 reveal-on-scroll" style="transition-delay: 200ms;">
                <div class="aspect-video bg-surface-container-low border border-structural-gray overflow-hidden relative group">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A detailed, close-up photograph of a skilled engineer examining a technical architectural blueprint in a bright, modern office." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_b68ffdfe716f242be7e093970eba92c8.webp"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-deep-navy/40 to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Partnership Section -->
    <section class="bg-surface-container-low py-margin-desktop-alt">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-24 items-center">
                <div class="order-2 md:order-1 reveal-on-scroll">
                    <div class="rounded-lg overflow-hidden border border-structural-gray bg-white p-2">
                        <img class="w-full h-[400px] object-cover" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_6c9ec96a796c905cd4e46e0348e114fe.webp"/>
                    </div>
                </div>
                <div class="order-1 md:order-2 reveal-on-scroll" style="transition-delay: 200ms;">
                    <span class="font-label-bold text-label-bold text-primary mb-4 block uppercase">Institutional Synergy</span>
                    <h2 class="font-headline-lg text-headline-lg mb-6 text-deep-navy">Partnership with PERUMNAS</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                        In collaboration with PERUMNAS, we are scaling the provision of high-quality, resilient housing across the archipelago. This strategic alliance combines national reach with Iida Group's technical superiority to deliver communities that stand the test of time.
                    </p>
                    <div class="grid grid-cols-2 gap-4 border-t border-structural-gray pt-8">
                        <div>
                            <div class="text-primary font-display-md text-display-md">2.5k+</div>
                            <div class="font-caption text-caption text-outline uppercase tracking-wider">Housing Units</div>
                        </div>
                        <div>
                            <div class="text-primary font-display-md text-display-md">15+</div>
                            <div class="font-caption text-caption text-outline uppercase tracking-wider">Joint Projects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Factory Showcase Section (The Bento Grid) -->
    <section class="py-margin-desktop-alt max-w-container-max mx-auto px-margin-desktop-alt">
        <div class="text-center mb-16 reveal-on-scroll">
            <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4">Our Operational Hubs</h2>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">Strategically located facilities equipped with the latest industrial technology to support regional development.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-auto md:h-[600px]">
            <!-- Main Factory -->
            <div class="md:col-span-8 relative group overflow-hidden border border-structural-gray reveal-on-scroll bg-white">
                <div class="h-full w-full">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" data-alt="An expansive aerial view of a large, state-of-the-art industrial factory complex." src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_0c29579ec227f5c81de2a3d3b6a4aa60.webp"/>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                    <h3 class="font-headline-md text-headline-md mb-2">Main Production Facility</h3>
                    <p class="font-body-sm text-surface-container-lowest/80 mb-4 max-w-md">Our primary hub for heavy pre-cast elements and structural engineering assembly.</p>
                    <div class="flex items-center gap-6">
                        <span class="font-label-bold text-label-bold flex items-center gap-2"><span class="material-symbols-outlined text-sm">location_on</span> Karawang, West Java</span>
                        <span class="font-label-bold text-label-bold flex items-center gap-2"><span class="material-symbols-outlined text-sm">settings_suggest</span> Fully Automated</span>
                    </div>
                </div>
            </div>
            <!-- Cileungsi Factory Content and Photo -->
            <div class="md:col-span-4 grid grid-rows-2 gap-gutter h-full">
                <div class="relative group overflow-hidden border border-structural-gray reveal-on-scroll">
                    <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_6cf6b8e07d2c4c48f9d206d683ffa89e.webp"/>
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <div class="p-8 bg-deep-navy text-white flex flex-col justify-center reveal-on-scroll">
                    <h3 class="font-headline-md text-headline-md mb-4 text-action-cyan">Cileungsi Factory</h3>
                    <p class="font-body-sm mb-6 text-surface-container-low/80 text-xs">Specialized in precision finishing and modular interior components, Cileungsi ensures the "Last Mile Quality" of our residential products.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2 text-xs"><span class="material-symbols-outlined text-action-cyan text-sm">check_circle</span> 24/7 Monitoring</li>
                        <li class="flex items-center gap-2 text-xs"><span class="material-symbols-outlined text-action-cyan text-sm">check_circle</span> Sustainable Material Sourcing</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Standards Table -->
    <section class="py-margin-desktop-alt bg-surface">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="bg-white border border-structural-gray p-8 md:p-12 reveal-on-scroll">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4">Quality Control Standards</h2>
                        <p class="font-body-md text-on-surface-variant max-w-lg">Transparent technical benchmarks that define our operational output.</p>
                    </div>
                    <a href="#" class="border-2 border-deep-navy text-deep-navy px-8 py-3 font-label-bold text-label-bold hover:bg-deep-navy hover:text-white transition-all text-center">Download Audit Report</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-structural-gray">
                                <th class="pb-4 font-label-bold text-label-bold text-outline">CRITERIA</th>
                                <th class="pb-4 font-label-bold text-label-bold text-outline">SPECIFICATION</th>
                                <th class="pb-4 font-label-bold text-label-bold text-outline">FREQUENCY</th>
                                <th class="pb-4 font-label-bold text-label-bold text-outline">STATUS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-structural-gray/50">
                            <tr>
                                <td class="py-6 font-body-md font-bold text-deep-navy">Structural Integrity</td>
                                <td class="py-6 font-body-md text-on-surface-variant">JIS A 5373 Precast Concrete</td>
                                <td class="py-6 font-body-sm text-on-surface-variant">Every Batch</td>
                                <td class="py-6"><span class="px-3 py-1 bg-green-100 text-green-700 font-label-bold text-[10px] rounded uppercase">Compliant</span></td>
                            </tr>
                            <tr>
                                <td class="py-6 font-body-md font-bold text-deep-navy">Earthquake Resistance</td>
                                <td class="py-6 font-body-md text-on-surface-variant">Seismic Intensity Scale 7 (JPN)</td>
                                <td class="py-6 font-body-sm text-on-surface-variant">Quarterly Test</td>
                                <td class="py-6"><span class="px-3 py-1 bg-green-100 text-green-700 font-label-bold text-[10px] rounded uppercase">Compliant</span></td>
                            </tr>
                            <tr>
                                <td class="py-6 font-body-md font-bold text-deep-navy">Environmental Impact</td>
                                <td class="py-6 font-body-md text-on-surface-variant">ISO 14001:2015 Certification</td>
                                <td class="py-6 font-body-sm text-on-surface-variant">Annual Audit</td>
                                <td class="py-6"><span class="px-3 py-1 bg-green-100 text-green-700 font-label-bold text-[10px] rounded uppercase">Compliant</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-margin-desktop-alt max-w-container-max mx-auto px-margin-desktop-alt text-center">
        <div class="reveal-on-scroll">
            <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-6">Explore Our Strategic Vision</h2>
            <div class="flex flex-wrap justify-center gap-gutter">
                <a class="bg-primary text-white px-10 py-4 font-label-bold text-label-bold rounded shadow-lg hover:bg-primary/90 transition-all text-center" href="<?php echo esc_url(home_url('/group-company/')); ?>">View Group Companies</a>
                <a class="border-2 border-structural-gray text-on-surface-variant px-10 py-4 font-label-bold text-label-bold rounded hover:border-primary hover:text-primary transition-all text-center" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Operations</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
