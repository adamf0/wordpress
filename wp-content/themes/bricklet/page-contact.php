<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<!-- Hero Section -->
<header class="relative pt-32 md:pt-40 pb-20 overflow-hidden bg-deep-navy text-white">
    <div class="absolute inset-0 opacity-15 pointer-events-none">
        <img class="w-full h-full object-cover object-center mix-blend-overlay" alt="PT Perumnas Iida Group Background" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" decoding="sync" />
    </div>
    <div class="relative z-10 max-w-container-max mx-auto px-margin-desktop-alt">
        <div class="max-w-3xl">
            <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight">
                Hubungi PT Perumnas Iida Group
            </h1>
            <p class="font-body-lg text-body-lg text-surface-variant opacity-90 leading-relaxed">
                Pusat layanan informasi resmi terpadu untuk Kantor Pusat (Head Office) serta seluruh Unit Bisnis &amp; Marketing Gallery Heartful Town.
            </p>
        </div>
    </div>
</header>

<!-- Main Content: Split Screen Layout -->
<main class="max-w-container-max mx-auto px-margin-desktop-alt py-12 md:py-margin-desktop-alt">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        
        <!-- Left: Contact Form (7 Cols) -->
        <section class="lg:col-span-6 bg-white p-8 md:p-12 border border-structural-gray rounded-2xl shadow-sm">
            <div class="mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-[#006491] block mb-2">Formulir Komunikasi Resmi</span>
                <h2 class="font-headline-lg text-headline-lg text-deep-navy">Kirim Pesan &amp; Konsultasi</h2>
                <p class="text-sm text-on-surface-variant mt-2">
                    Pilih kantor pusat atau unit bisnis proyek yang ingin Anda tuju, tim konsultan kami akan segera merespons pertanyaan Anda.
                </p>
            </div>
            
            <form class="space-y-6" id="contact-ajax-form" method="post" novalidate>
                <?php wp_nonce_field('send_contact_message', 'contact_nonce'); ?>
                
                <!-- Destination Selection (Head Office or 3 Business Units) -->
                <div class="space-y-2">
                    <label for="unit_destination" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                        Tujuan Unit Bisnis / Kantor <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="unit_destination" name="unit_destination" class="w-full py-3.5 pl-4 pr-10 bg-slate-50 rounded-lg border border-slate-200 text-sm font-medium text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all appearance-none cursor-pointer">
                            <option value="Head Office PT Perumnas Iida Group" <?php selected(isset($_POST['unit_destination']) ? $_POST['unit_destination'] : '', 'Head Office PT Perumnas Iida Group'); ?>>
                                Head Office PT Perumnas Iida Group
                            </option>
                            <option value="Unit Bisnis Heartful Town Depok" <?php selected(isset($_POST['unit_destination']) ? $_POST['unit_destination'] : '', 'Unit Bisnis Heartful Town Depok'); ?>>
                                Unit Bisnis Heartful Town Depok
                            </option>
                            <option value="Unit Bisnis Heartful Town Taman Mini" <?php selected(isset($_POST['unit_destination']) ? $_POST['unit_destination'] : '', 'Unit Bisnis Heartful Town Taman Mini'); ?>>
                                Unit Bisnis Heartful Town Taman Mini
                            </option>
                            <option value="Unit Bisnis Heartful Town Bekasi" <?php selected(isset($_POST['unit_destination']) ? $_POST['unit_destination'] : '', 'Unit Bisnis Heartful Town Bekasi'); ?>>
                                Unit Bisnis Heartful Town Bekasi
                            </option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="fullname" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input id="fullname" name="fullname" class="w-full py-3.5 px-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all" placeholder="Contoh: Budi Santoso" type="text" value="<?php echo isset($_POST['fullname']) ? esc_attr($_POST['fullname']) : ''; ?>" required />
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                            Alamat Email <span class="text-red-500">*</span>
                        </label>
                        <input id="email" name="email" class="w-full py-3.5 px-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all" placeholder="nama@email.com" type="email" value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="phone" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                            Nomor Telepon / WhatsApp
                        </label>
                        <input id="phone" name="phone" class="w-full py-3.5 px-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all" placeholder="Contoh: 0812XXXXXXXX" type="tel" value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>" />
                    </div>
                    <div class="space-y-2">
                        <label for="subject_type" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                            Topik Pertanyaan
                        </label>
                        <div class="relative">
                            <select id="subject_type" name="subject_type" class="w-full py-3.5 pl-4 pr-10 bg-slate-50 rounded-lg border border-slate-200 text-sm text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all appearance-none cursor-pointer">
                                <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Konsultasi & Ketersediaan Unit'); ?>>Konsultasi &amp; Ketersediaan Unit</option>
                                <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Jadwal Survey Show Unit'); ?>>Jadwal Survey Show Unit</option>
                                <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Simulasi KPR & Promo Spesial'); ?>>Simulasi KPR &amp; Promo Spesial</option>
                                <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Kemitraan & Kerjasama Bisnis'); ?>>Kemitraan &amp; Kerjasama Bisnis</option>
                                <option <?php selected(isset($_POST['subject_type']) ? $_POST['subject_type'] : '', 'Pertanyaan Umum Lainnya'); ?>>Pertanyaan Umum Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="message" class="font-label-bold text-xs uppercase text-deep-navy block font-bold">
                        Pesan / Kebutuhan Anda <span class="text-red-500">*</span>
                    </label>
                    <textarea id="message" name="message" class="w-full py-3.5 px-4 bg-slate-50 rounded-lg border border-slate-200 text-sm text-deep-navy focus:outline-none focus:border-action-cyan focus:bg-white transition-all resize-none" placeholder="Tuliskan pertanyaan, tipe unit yang diminati, atau jadwal survey yang diinginkan..." rows="4" required><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                </div>

                <div class="pt-2">
                    <button class="w-full sm:w-auto bg-deep-navy text-white hover:bg-primary px-12 py-3 rounded-xl font-semibold text-sm transition-all shadow-md hover:shadow-lg cursor-pointer" type="submit">
                        Kirim
                    </button>
                </div>
            </form>
        </section>

        <!-- Right: Office Information & Business Units (6 Cols) -->
        <aside class="lg:col-span-6 flex flex-col gap-6">
            
            <!-- 1. Head Office Card -->
            <div class="bg-white border-2 border-action-cyan/40 p-6 md:p-8 rounded-2xl shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
                <div class="absolute top-0 right-0 w-32 h-32 bg-action-cyan/5 rounded-bl-full pointer-events-none"></div>
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-sky-50 text-[#006491] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#006491]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="bg-deep-navy text-white text-[10px] font-bold uppercase tracking-widest px-2.5 py-0.5 rounded">Head Office</span>
                            <span class="text-xs text-[#006491] font-semibold">Kantor Pusat</span>
                        </div>
                        <h3 class="font-headline-md text-xl font-bold text-deep-navy mb-3">PT Perumnas Iida Group</h3>
                        
                        <!-- Office Locations -->
                        <div class="space-y-3 mb-4 text-xs text-on-surface-variant">
                            <div class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                <div>
                                    <span class="font-bold text-deep-navy block mb-0.5">Head Office:</span>
                                    <address class="not-italic leading-relaxed text-slate-600">Jl. Pancasila I, Cicadas, Gunung Putri, Bogor District. 16964</address>
                                </div>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-[#006491] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                <div>
                                    <span class="font-bold text-deep-navy block mb-0.5">Branch Office:</span>
                                    <address class="not-italic leading-relaxed text-slate-600">Pondok Indah Office Tower 1, 3rd Floor Suite 304, Jl. Sultan Iskandar Muda Kav. VTA, Pondok Indah, South Jakarta 12310</address>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Details Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600 pt-3 border-t border-slate-100">
                            <a href="tel:+622186869299" class="flex items-center gap-2 text-deep-navy transition-colors">
                                <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                <span><span class="font-semibold text-deep-navy">+62-21-8686-9299</span></span>
                            </a>
                            <a href="mailto:sales@ptighd.co.id" class="flex items-center gap-2 text-deep-navy transition-colors">
                                <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                <span class="font-semibold text-deep-navy">sales@ptighd.co.id</span>
                            </a>
                            <div class="flex items-center gap-2 text-slate-500">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Senin – Jumat: 08.30 – 17.30</span>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap items-center gap-4">
                            <a href="https://maps.google.com/maps?ll=-6.443159,106.922777&amp;z=10&amp;t=m&amp;hl=en&amp;gl=ID&amp;mapclient=embed&amp;cid=13211956695535904105" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-deep-navy hover:text-[#006491] font-bold text-sm transition-colors py-1">
                                <svg class="w-5 h-5 text-deep-navy shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                <span>Petunjuk Arah Google Maps</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Units Section Header -->
            <div class="pt-2">
                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5 text-action-cyan shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21"/></svg>
                    <h3 class="text-base font-bold text-deep-navy uppercase tracking-wider">Unit Bisnis &amp; Marketing Gallery</h3>
                </div>

                <!-- 3 Business Units Cards Grid -->
                <div class="space-y-4">
                    
                    <!-- Unit 1: Depok -->
                    <div class="bg-white border border-structural-gray hover:border-action-cyan/50 p-6 rounded-2xl shadow-xs transition-all hover:shadow-md flex flex-col">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-sky-50 text-[#006491] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#006491]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path></svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <span class="text-xs font-bold text-deep-navy uppercase tracking-wider">Unit Bisnis Depok</span>
                                </div>
                                <h4 class="font-bold text-deep-navy text-base mb-1">Heartful Town Depok</h4>
                                <address class="not-italic text-xs text-on-surface-variant leading-relaxed mb-4">
                                    Jl. Arco Raya No. 7, Kel. Duren Seribu, Kec. Bojongsari, Kota Depok, Jawa Barat 16518
                                </address>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600 pt-3 border-t border-slate-100">
                                    <a href="tel:+6281288336230" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                        <span>+62 812-8833-6230</span>
                                    </a>
                                    <a href="mailto:info@heartfultowndepok.com" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                        <span>info@heartfultowndepok.com</span>
                                    </a>
                                    <div class="sm:col-span-2 flex items-center gap-2 text-slate-500">
                                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>Buka Setiap Hari: 09.00 – 17.00 WIB</span>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                                    <a href="https://www.google.com/maps?cid=6290130985202860703" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-deep-navy hover:text-[#006491] font-bold text-sm transition-colors py-1">
                                        <svg class="w-5 h-5 text-deep-navy shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                        <span>Petunjuk Arah Google Maps</span>
                                    </a>
                                    <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Depok" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#006491] hover:text-action-cyan transition-colors bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Unit 2: Taman Mini -->
                    <div class="bg-white border border-structural-gray hover:border-action-cyan/50 p-6 rounded-2xl shadow-xs transition-all hover:shadow-md flex flex-col">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-sky-50 text-[#006491] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#006491]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path></svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <span class="text-xs font-bold text-deep-navy uppercase tracking-wider">Unit Bisnis Taman Mini</span>
                                </div>
                                <h4 class="font-bold text-deep-navy text-base mb-1">Heartful Town Taman Mini</h4>
                                <address class="not-italic text-xs text-on-surface-variant leading-relaxed mb-4">
                                    Jl. Pinang Ranti I No. 22, Kel. Pinang Ranti, Kec. Makasar, Jakarta Timur, DKI Jakarta 13560
                                </address>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600 pt-3 border-t border-slate-100">
                                    <a href="tel:+6281288336230" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                        <span>+62 812-8833-6230</span>
                                    </a>
                                    <a href="mailto:info@perumnas-iidagroup.com" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                        <span>info@perumnas-iidagroup.com</span>
                                    </a>
                                    <div class="sm:col-span-2 flex items-center gap-2 text-slate-500">
                                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>Buka Setiap Hari: 09.00 – 17.00 WIB</span>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                                    <a href="https://maps.google.com/?q=Heartful+Town+Taman+Mini" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-deep-navy hover:text-[#006491] font-bold text-sm transition-colors py-1">
                                        <svg class="w-5 h-5 text-deep-navy shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                        <span>Petunjuk Arah Google Maps</span>
                                    </a>
                                    <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Taman%20Mini" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#006491] hover:text-action-cyan transition-colors bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Unit 3: Bekasi -->
                    <div class="bg-white border border-structural-gray hover:border-action-cyan/50 p-6 rounded-2xl shadow-xs transition-all hover:shadow-md flex flex-col">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-sky-50 text-[#006491] flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-[#006491]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path></svg>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <span class="text-xs font-bold text-deep-navy uppercase tracking-wider">Unit Bisnis Bekasi</span>
                                </div>
                                <h4 class="font-bold text-deep-navy text-base mb-1">Heartful Town Bekasi</h4>
                                <address class="not-italic text-xs text-on-surface-variant leading-relaxed mb-4">
                                    Jl. Manggis, RT.003/RW.005, Kel. Padurenan, Kec. Mustikajaya, Kota Bekasi, Jawa Barat 17156
                                </address>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-600 pt-3 border-t border-slate-100">
                                    <a href="tel:+6281288336230" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                        <span>+62 812-8833-6230</span>
                                    </a>
                                    <a href="mailto:marketing@perumnas-iidagroup.com" class="flex items-center gap-2 text-deep-navy hover:text-[#006491] transition-colors font-medium">
                                        <svg class="w-4 h-4 text-[#006491] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                        <span>marketing@perumnas-iidagroup.com</span>
                                    </a>
                                    <div class="sm:col-span-2 flex items-center gap-2 text-slate-500">
                                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>Buka Setiap Hari: 09.00 – 17.00 WIB</span>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                                    <a href="https://www.google.com/maps?cid=1159015091722877150" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-deep-navy hover:text-[#006491] font-bold text-sm transition-colors py-1">
                                        <svg class="w-5 h-5 text-deep-navy shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                        <span>Petunjuk Arah Google Maps</span>
                                    </a>
                                    <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Bekasi" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#006491] hover:text-action-cyan transition-colors bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg">
                                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        <span>WhatsApp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </aside>
    </div>
</main>

<!-- Trust Banner -->
<section class="bg-deep-navy py-16 text-white text-center">
    <div class="max-w-container-max mx-auto px-margin-desktop-alt">
        <h2 class="font-headline-md text-headline-md mb-8 opacity-70 uppercase tracking-[0.3em] text-xs">
            Standar Rekayasa Konstruksi &amp; Kualitas Terpercaya
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter opacity-60">
            <div class="flex flex-col items-center justify-center p-4">
                <span class="font-display-md text-2xl font-bold tracking-tight text-white mb-1">JIS Standard</span>
                <span class="text-xs text-action-cyan uppercase tracking-wider">Japan Industrial Standards</span>
            </div>
            <div class="flex flex-col items-center justify-center p-4">
                <span class="font-display-md text-2xl font-bold tracking-tight text-white mb-1">Anti-Seismic</span>
                <span class="text-xs text-action-cyan uppercase tracking-wider">Struktur Tahan Gempa</span>
            </div>
            <div class="flex flex-col items-center justify-center p-4">
                <span class="font-display-md text-2xl font-bold tracking-tight text-white mb-1">ISO 9001</span>
                <span class="text-xs text-action-cyan uppercase tracking-wider">Quality Management</span>
            </div>
            <div class="flex flex-col items-center justify-center p-4">
                <span class="font-display-md text-2xl font-bold tracking-tight text-white mb-1">Joint Venture</span>
                <span class="text-xs text-action-cyan uppercase tracking-wider">Perumnas &bull; Iida Group</span>
            </div>
        </div>
    </div>
</section>

<!-- Toast Notification -->
<div id="contact-toast" aria-live="polite" style="
    position: fixed;
    bottom: 28px;
    right: 28px;
    z-index: 9999;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    min-width: 300px;
    max-width: 420px;
    padding: 16px 20px;
    border-radius: 14px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.18);
    font-family: inherit;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
    opacity: 0;
    transform: translateY(16px);
    pointer-events: none;
    transition: opacity 0.3s ease, transform 0.3s ease;
    background: #ffffff;
    border: 1px solid #e2e8f0;
">
    <span id="contact-toast-icon" style="flex-shrink:0;margin-top:1px;"></span>
    <span id="contact-toast-msg"></span>
</div>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
(function () {
    var form    = document.getElementById('contact-ajax-form');
    var btn     = form ? form.querySelector('button[type="submit"]') : null;
    var toast   = document.getElementById('contact-toast');
    var toastMsg  = document.getElementById('contact-toast-msg');
    var toastIcon = document.getElementById('contact-toast-icon');
    var toastTimer = null;

    var ICON_OK  = '<svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#006491" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
    var ICON_ERR = '<svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#dc2626" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>';

    function showToast(message, isSuccess) {
        if (!toast) return;
        clearTimeout(toastTimer);

        toastMsg.textContent  = message;
        toastIcon.innerHTML   = isSuccess ? ICON_OK : ICON_ERR;
        toast.style.borderColor   = isSuccess ? '#00b3ff55' : '#fca5a555';
        toast.style.background    = isSuccess ? '#f0f9ff' : '#fff5f5';
        toast.style.color         = isSuccess ? '#0a1f2c'  : '#991b1b';

        toast.style.opacity         = '1';
        toast.style.transform       = 'translateY(0)';
        toast.style.pointerEvents   = 'auto';

        toastTimer = setTimeout(function() {
            toast.style.opacity       = '0';
            toast.style.transform     = 'translateY(16px)';
            toast.style.pointerEvents = 'none';
        }, isSuccess ? 5000 : 8000);
    }

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Basic client-side validation
        var fullname = form.querySelector('[name="fullname"]').value.trim();
        var email    = form.querySelector('[name="email"]').value.trim();
        var message  = form.querySelector('[name="message"]').value.trim();
        if (!fullname || !email || !message) {
            showToast('Mohon lengkapi seluruh kolom yang wajib diisi.', false);
            return;
        }

        // Disable button while sending
        if (btn) { btn.disabled = true; btn.textContent = 'Mengirim...'; }

        var data = new FormData(form);
        data.append('action', 'bricklet_contact');

        fetch('<?php echo esc_url(admin_url("admin-ajax.php")); ?>', {
            method: 'POST',
            credentials: 'same-origin',
            body: data
        })
        .then(function(r) { return r.json(); })
        .then(function(res) {
            if (res.success) {
                showToast(res.data.message, true);
                form.reset();
            } else {
                showToast(res.data.message || 'Terjadi kesalahan. Silakan coba lagi.', false);
            }
        })
        .catch(function() {
            showToast('Gagal terhubung ke server. Periksa koneksi internet Anda.', false);
        })
        .finally(function() {
            if (btn) { btn.disabled = false; btn.textContent = 'Kirim'; }
        });
    });
})();
</script>

<?php
get_footer();
?>

