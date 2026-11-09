<?php
/**
 * Template Name: Development
 */
get_header();
?>

<main class="overflow-hidden">
    <!-- Hero Section (Preserving exact layout structure of products page) -->
    <section class="relative overflow-hidden bg-deep-navy py-margin-desktop-alt">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <img class="w-full h-full object-cover object-center mix-blend-overlay" alt="Heartful Town Residential Development" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" decoding="sync" />
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt relative z-10 text-center">
            <span class="text-action-cyan font-label-bold text-label-bold uppercase tracking-widest mb-4 block">
                Modern Japanese Living &amp; Engineering
            </span>
            <h1 class="text-white font-display-lg text-display-lg md:max-w-3xl mx-auto leading-tight mb-6">
                High-Quality Residential Developments
            </h1>
            <p class="text-surface-variant font-body-lg text-body-lg md:max-w-2xl mx-auto opacity-90 mb-10">
                Mengintegrasikan presisi rekayasa Jepang dengan gaya hidup tropis Indonesia untuk menghadirkan hunian berkualitas tinggi, tahan gempa, dan berkelanjutan bagi keluarga masa kini.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a class="bg-primary text-white hover:bg-primary-container hover:text-on-primary-container px-8 py-4 rounded font-body-md font-bold hover:shadow-lg transition-all" href="#product-grid">
                    Jelajahi Portofolio
                </a>
                <a class="border-2 border-white/20 text-white hover:border-action-cyan hover:text-action-cyan px-8 py-4 rounded font-body-md font-bold hover:bg-white/10 transition-all" href="<?php echo esc_url(home_url('/contact/')); ?>">
                    Konsultasi Penjualan
                </a>
            </div>
        </div>
    </section>

    <!-- Development / Product Grid Section -->
    <section class="py-margin-desktop-alt bg-surface" id="product-grid">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="mb-8 md:mb-16">
                <span class="text-xs uppercase tracking-widest text-[#006491] font-bold block mb-2">Our Masterpieces</span>
                <h2 class="font-headline-lg text-headline-lg text-deep-navy mb-4">Featured Residential Developments</h2>
                <div class="h-1 w-24 bg-action-cyan"></div>
            </div>

            <!-- 3 Product Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter items-stretch" id="projects-container">
                
                <!-- Card 1: Heartful Town Bekasi -->
                <article id="bekasi" data-category="bekasi" class="dev-card group bg-white border border-structural-gray rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-action-cyan/50 flex flex-col scroll-mt-28 reveal-on-scroll">
                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Heartful Town Bekasi" src="<?php echo get_template_directory_uri(); ?>/images/layout/image44.png" width="640" height="360" loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-3 left-4 right-4 z-10 flex items-center justify-between text-white text-xs">
                            <span class="flex items-center gap-1.5 font-medium drop-shadow-sm">
                                <svg class="w-4 h-4 text-action-cyan shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                Mustikajaya, Kota Bekasi
                            </span>
                            <span class="bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded text-[11px] font-semibold">Ready &amp; Indent</span>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 flex flex-col flex-1">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 group-hover:text-[#006491] transition-colors">
                            Heartful Town Bekasi
                        </h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">
                            Hunian modern berstandar konstruksi tahan gempa Jepang. Memadukan kenyamanan tropis dengan sistem tata ruang efisien, taman asri di setiap unit, serta akses cepat 15 menit ke Gerbang Tol Bekasi Timur &amp; Grand Galaxy.
                        </p>
                        
                        <div class="mt-auto flex items-center justify-end pt-4 border-t border-structural-gray">
                            <button type="button" onclick="openDevModal('modal-bekasi')" class="inline-flex items-center gap-2 text-primary hover:text-action-cyan font-label-bold group-hover:gap-3 transition-all cursor-pointer">
                                <span>Lihat Detail</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Card 2: Heartful Town Taman Mini -->
                <article id="taman-mini" data-category="taman-mini" class="dev-card group bg-white border border-structural-gray rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-action-cyan/50 flex flex-col scroll-mt-28 reveal-on-scroll" style="transition-delay: 100ms;">
                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Heartful Town Taman Mini" src="<?php echo get_template_directory_uri(); ?>/images/layout/heartful-town-taman-mini.webp" width="640" height="360" loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-3 left-4 right-4 z-10 flex items-center justify-between text-white text-xs">
                            <span class="flex items-center gap-1.5 font-medium drop-shadow-sm">
                                <svg class="w-4 h-4 text-action-cyan shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                Pinang Ranti, Jakarta Timur
                            </span>
                            <span class="bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded text-[11px] font-semibold">2 Lantai Premium</span>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 flex flex-col flex-1">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 group-hover:text-[#006491] transition-colors">
                            Heartful Town Taman Mini
                        </h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">
                            Klaster hunian mewah eksklusif 2 lantai bernuansa Jepang kontemporer di lokasi emas Jakarta Timur. Terkoneksi 1 menit ke Stasiun LRT Taman Mini, utilitas bawah tanah (underground cabling), dan sistem keamanan terpadu 24 jam.
                        </p>
                        
                        <div class="mt-auto flex items-center justify-end pt-4 border-t border-structural-gray">
                            <button type="button" onclick="openDevModal('modal-taman-mini')" class="inline-flex items-center gap-2 text-primary hover:text-action-cyan font-label-bold group-hover:gap-3 transition-all cursor-pointer">
                                <span>Lihat Detail</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Card 3: Heartful Town Depok -->
                <article id="depok" data-category="depok" class="dev-card group bg-white border border-structural-gray rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-action-cyan/50 flex flex-col scroll-mt-28 reveal-on-scroll" style="transition-delay: 200ms;">
                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Heartful Town Depok" src="<?php echo get_template_directory_uri(); ?>/images/layout/heartful-town-fg-ready-stock-1.jpg" width="640" height="360" loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                        <div class="absolute bottom-3 left-4 right-4 z-10 flex items-center justify-between text-white text-xs">
                            <span class="flex items-center gap-1.5 font-medium drop-shadow-sm">
                                <svg class="w-4 h-4 text-action-cyan shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                Bojongsari, Kota Depok
                            </span>
                            <span class="bg-white/20 backdrop-blur-xs px-2 py-0.5 rounded text-[11px] font-semibold">Kota Mandiri</span>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 flex flex-col flex-1">
                        <h3 class="font-headline-md text-headline-md text-deep-navy mb-2 group-hover:text-[#006491] transition-colors">
                            Heartful Town Depok
                        </h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">
                            Kawasan kota mandiri terpadu seluas 15 hektar yang memadukan keasrian alam dan teknologi struktur Jepang. Dilengkapi masjid kawasan, area komersial ritel, jogging track, taman bermain, dan akses tol Desari / JORR 2.
                        </p>
                        
                        <div class="mt-auto flex items-center justify-end pt-4 border-t border-structural-gray">
                            <button type="button" onclick="openDevModal('modal-depok')" class="inline-flex items-center gap-2 text-primary hover:text-action-cyan font-label-bold group-hover:gap-3 transition-all cursor-pointer">
                                <span>Lihat Detail</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>


    <!-- Call to Action Banner (Preserving exact layout and pattern) -->
    <section class="py-margin-desktop-alt animate-fade-in">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="bg-primary py-16 px-8 md:px-20 text-center rounded-2xl relative overflow-hidden reveal-on-scroll shadow-xl">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="w-full h-full bg-[length:400px_400px] bg-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/layout/lh3_138e322720c49ad45d683962ff83c4e3.webp')"></div>
                </div>
                <div class="relative z-10">
                    <span class="text-action-cyan uppercase tracking-widest text-xs font-bold block mb-3">Heartful Town Collection</span>
                    <h2 class="text-white font-headline-lg text-headline-lg mb-6">Siap Menemukan Rumah Idaman Anda?</h2>
                    <p class="text-white/90 font-body-lg text-body-lg mb-10 max-w-2xl mx-auto leading-relaxed">
                        Hubungi tim konsultan properti kami untuk ketersediaan unit terbaru, promo suku bunga KPR spesial, serta penjadwalan survey show unit langsung di lokasi.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="https://wa.me/6281288336230?text=Halo%20saya%20tertarik%20dengan%20proyek%20Heartful%20Town" target="_blank" rel="noopener noreferrer" class="bg-white text-[#006491] hover:bg-slate-50 px-10 py-4 rounded-lg font-body-md font-bold hover:shadow-2xl transition-all text-center flex items-center justify-center gap-2">
                            <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>Hubungi via WhatsApp</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="border-2 border-white/60 text-white hover:border-white hover:bg-white/10 px-10 py-4 rounded-lg font-body-md font-bold transition-all text-center">
                            Kirim Formulir Pertanyaan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Details Modals -->
    <!-- Modal 1: Heartful Town Bekasi -->
    <div id="modal-bekasi" class="dev-modal fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity duration-300">
        <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-200 relative animate-fade-in">
            <div class="sticky top-0 bg-white/95 backdrop-blur-md px-6 py-4 border-b border-slate-100 flex items-center justify-between z-20">
                <div>
                    <span class="text-xs uppercase tracking-wider text-[#006491] font-bold">Proyek Residensial</span>
                    <h3 class="text-xl font-bold text-deep-navy">Heartful Town Bekasi</h3>
                </div>
                <button type="button" onclick="closeDevModal('modal-bekasi')" class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-slate-800 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/layout/image44.png" alt="Heartful Town Bekasi Unit" class="w-full h-full object-cover" />
                    <div class="absolute bottom-3 left-4 bg-deep-navy/85 backdrop-blur-xs text-white text-xs px-3 py-1 rounded font-medium">
                        Padurenan, Mustikajaya, Kota Bekasi
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-deep-navy mb-2">Tentang Proyek</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">
                        Heartful Town Bekasi merupakan perwujudan hunian modern yang mengadopsi standar konstruksi tahan gempa Jepang. Memadukan tata ruang yang mengoptimalkan sirkulasi udara dan cahaya alami, setiap rumah dilengkapi taman tersendiri dan dibangun dengan material berkualitas tinggi demi kenyamanan keluarga generasi masa kini.
                    </p>
                </div>

                <div class="bg-surface-container-low rounded-xl p-5 border border-slate-200">
                    <h4 class="font-bold text-deep-navy text-sm mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-action-cyan text-[20px]">list</span>
                        Spesifikasi Bangunan &amp; Unit
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Tipe Rumah:</span>
                            <span class="font-semibold text-deep-navy">Tipe 36/60 &amp; 45/72</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Kamar Tidur / Mandi:</span>
                            <span class="font-semibold text-deep-navy">2 KT / 1 KM</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Struktur:</span>
                            <span class="font-semibold text-deep-navy">Beton Bertulang Tahan Gempa</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Dinding:</span>
                            <span class="font-semibold text-deep-navy">Bata Ringan / Strong CB</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Lantai:</span>
                            <span class="font-semibold text-deep-navy">Homogeneous Tile 60x60</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Daya Listrik:</span>
                            <span class="font-semibold text-deep-navy">1300 / 2200 VA</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Legalitas:</span>
                            <span class="font-semibold text-deep-navy">SHM &amp; PBG Lengkap</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Fasilitas Keamanan:</span>
                            <span class="font-semibold text-deep-navy">One Gate System &amp; Security 24H</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="https://wa.me/6281288336230?text=Halo%20saya%20tertarik%20dengan%20unit%20Heartful%20Town%20Bekasi" target="_blank" rel="noopener noreferrer" class="flex-1 bg-deep-navy text-white hover:bg-black py-3 px-6 rounded-lg text-center font-semibold text-sm transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Tanya Marketing via WhatsApp</span>
                    </a>
                    <button type="button" onclick="closeDevModal('modal-bekasi')" class="px-6 py-3 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 text-slate-700 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2: Heartful Town Taman Mini -->
    <div id="modal-taman-mini" class="dev-modal fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity duration-300">
        <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-200 relative animate-fade-in">
            <div class="sticky top-0 bg-white/95 backdrop-blur-md px-6 py-4 border-b border-slate-100 flex items-center justify-between z-20">
                <div>
                    <span class="text-xs uppercase tracking-wider text-[#006491] font-bold">Proyek Residensial Mewah</span>
                    <h3 class="text-xl font-bold text-deep-navy">Heartful Town Taman Mini</h3>
                </div>
                <button type="button" onclick="closeDevModal('modal-taman-mini')" class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-slate-800 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/layout/heartful-town-taman-mini.webp" alt="Heartful Town Taman Mini Unit" class="w-full h-full object-cover" />
                    <div class="absolute bottom-3 left-4 bg-deep-navy/85 backdrop-blur-xs text-white text-xs px-3 py-1 rounded font-medium">
                        Pinang Ranti, Makasar, Jakarta Timur
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-deep-navy mb-2">Tentang Proyek</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">
                        Heartful Town Taman Mini menghadirkan gaya hidup urban prestisius dengan hunian 2 lantai berarsitektur modern Jepang di episentrum Jakarta Timur. Mengusung konsep Transit-Oriented Development (TOD), proyek ini berada tepat di dekat Stasiun LRT Taman Mini serta jalan bebas hambatan Tol Jagorawi &amp; Tol JORR, memberikan mobilitas prima tanpa tanding.
                    </p>
                </div>

                <div class="bg-surface-container-low rounded-xl p-5 border border-slate-200">
                    <h4 class="font-bold text-deep-navy text-sm mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-action-cyan text-[20px]">list</span>
                        Spesifikasi Bangunan &amp; Unit
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Tipe Bangunan:</span>
                            <span class="font-semibold text-deep-navy">Rumah 2 Lantai Premium</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Kamar Tidur / Mandi:</span>
                            <span class="font-semibold text-deep-navy">3-4 KT / 2-3 KM</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Carport:</span>
                            <span class="font-semibold text-deep-navy">2 Mobil (Canopy Ready)</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Infrastruktur:</span>
                            <span class="font-semibold text-deep-navy">Underground Cables &amp; Fiber Optic</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Akses Utama:</span>
                            <span class="font-semibold text-deep-navy">1 Menit LRT Taman Mini &amp; Tol</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Daya Listrik:</span>
                            <span class="font-semibold text-deep-navy">3500 VA</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Legalitas:</span>
                            <span class="font-semibold text-deep-navy">SHM &amp; PBG Pecah Unit</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Fasilitas Klaster:</span>
                            <span class="font-semibold text-deep-navy">Smart Lock, CCTV, Playground</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="https://wa.me/6281288336230?text=Halo%20saya%20tertarik%20dengan%20unit%20Heartful%20Town%20Taman%20Mini" target="_blank" rel="noopener noreferrer" class="flex-1 bg-deep-navy text-white hover:bg-black py-3 px-6 rounded-lg text-center font-semibold text-sm transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Tanya Marketing via WhatsApp</span>
                    </a>
                    <button type="button" onclick="closeDevModal('modal-taman-mini')" class="px-6 py-3 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 text-slate-700 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3: Heartful Town Depok -->
    <div id="modal-depok" class="dev-modal fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/60 backdrop-blur-xs transition-opacity duration-300">
        <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-200 relative animate-fade-in">
            <div class="sticky top-0 bg-white/95 backdrop-blur-md px-6 py-4 border-b border-slate-100 flex items-center justify-between z-20">
                <div>
                    <span class="text-xs uppercase tracking-wider text-[#006491] font-bold">Kota Mandiri 15 Hektar</span>
                    <h3 class="text-xl font-bold text-deep-navy">Heartful Town Depok</h3>
                </div>
                <button type="button" onclick="closeDevModal('modal-depok')" class="p-2 rounded-full hover:bg-slate-100 text-slate-500 hover:text-slate-800 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="p-6 space-y-6">
                <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/layout/heartful-town-fg-ready-stock-1.jpg" alt="Heartful Town Depok Unit" class="w-full h-full object-cover" />
                    <div class="absolute bottom-3 left-4 bg-deep-navy/85 backdrop-blur-xs text-white text-xs px-3 py-1 rounded font-medium">
                        Jl. Arco Raya, Duren Seribu, Bojongsari, Depok
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-deep-navy mb-2">Tentang Proyek</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">
                        Heartful Town Depok adalah kawasan kota mandiri (masterplanned township) seluas 15 hektar yang dirancang untuk mewujudkan keseimbangan antara kenyamanan alam dan teknologi hunian maju. Dilengkapi infrastruktur lengkap mulai dari masjid raya kawasan, sentra kuliner dan ritel komersial, taman rekreasi anak, hingga jalur lari asri.
                    </p>
                </div>

                <div class="bg-surface-container-low rounded-xl p-5 border border-slate-200">
                    <h4 class="font-bold text-deep-navy text-sm mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-action-cyan text-[20px]">list</span>
                        Spesifikasi Bangunan &amp; Unit
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Total Luas Area:</span>
                            <span class="font-semibold text-deep-navy">15 Hektar Township</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Tipe Rumah:</span>
                            <span class="font-semibold text-deep-navy">Tipe 36/60 &amp; 45/72</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Kamar Tidur / Mandi:</span>
                            <span class="font-semibold text-deep-navy">2 KT / 1 KM</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Taman:</span>
                            <span class="font-semibold text-deep-navy">Front &amp; Backyard Private Garden</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Akses Transportasi:</span>
                            <span class="font-semibold text-deep-navy">Tol Sawangan &amp; Tol Pamulang-Serpong</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Daya Listrik:</span>
                            <span class="font-semibold text-deep-navy">1300 / 2200 VA</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Legalitas:</span>
                            <span class="font-semibold text-deep-navy">SHM &amp; PBG Lengkap</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-200">
                            <span class="text-slate-500">Fasilitas Kawasan:</span>
                            <span class="font-semibold text-deep-navy">Masjid Raya, Ritel, Jogging Track</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="https://wa.me/6281288336230?text=Halo%20saya%20tertarik%20dengan%20unit%20Heartful%20Town%20Depok" target="_blank" rel="noopener noreferrer" class="flex-1 bg-deep-navy text-white hover:bg-black py-3 px-6 rounded-lg text-center font-semibold text-sm transition-all flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Tanya Marketing via WhatsApp</span>
                    </a>
                    <button type="button" onclick="closeDevModal('modal-depok')" class="px-6 py-3 border border-slate-300 rounded-lg text-sm font-semibold hover:bg-slate-50 text-slate-700 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
    document.addEventListener("DOMContentLoaded", function() {
        // Hash link auto-scroll & highlight
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

    // Modal Handlers
    function openDevModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeDevModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    // Close on outside click or escape key
    window.addEventListener("click", function(e) {
        if (e.target.classList.contains("dev-modal")) {
            e.target.classList.add("hidden");
            e.target.classList.remove("flex");
            document.body.style.overflow = '';
        }
    });

    window.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            document.querySelectorAll(".dev-modal").forEach(m => {
                m.classList.add("hidden");
                m.classList.remove("flex");
            });
            document.body.style.overflow = '';
        }
    });
</script>

<?php
get_footer();
?>
