<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>

<style type="text/css">
.pnf-wrapper {
    background-color: var(--color-background);
    color: var(--color-text-body);
    width: 100%;
    overflow-x: hidden;
}

/* 1. Hero Error Section */
.pnf-hero-section {
    padding: clamp(56px, 7vw, 88px) 0 clamp(44px, 6vw, 68px);
    background-color: var(--color-surface-sunken);
    border-bottom: 1px solid var(--color-border);
    text-align: center;
}
.pnf-hero-inner {
    max-width: 720px;
    margin: 0 auto;
}
.pnf-code {
    display: inline-block;
    padding: 6px 16px;
    margin-bottom: 18px;
    border-radius: var(--radius-pill);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
    font-family: var(--font-display);
    font-size: var(--text-sm);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
}
.pnf-title {
    margin: 0 0 14px;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.125rem);
    font-weight: 700;
    color: var(--color-text-heading);
    line-height: 1.15;
}
.pnf-desc {
    margin: 0 auto 28px;
    max-width: 56ch;
    font-size: var(--text-base);
    line-height: 1.65;
    color: var(--color-text-muted);
}
.pnf-hero-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
}
.pnf-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    background-color: var(--color-primary);
    color: #ffffff;
    font-size: var(--text-sm);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out);
}
.pnf-btn-primary:hover {
    background-color: var(--color-primary-strong);
    color: #ffffff;
}
.pnf-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-sm);
    font-weight: 600;
    text-decoration: none;
    transition: border-color var(--dur-fast) var(--ease-in-out),
                background-color var(--dur-fast) var(--ease-in-out);
}
.pnf-btn-secondary:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.pnf-btn-primary:focus-visible,
.pnf-btn-secondary:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* 2. Canonical Navigation Grid */
.pnf-destinations-section {
    padding: clamp(48px, 6vw, 80px) 0;
    background-color: var(--color-surface);
}
.pnf-dest-header {
    text-align: center;
    max-width: 640px;
    margin: 0 auto 36px;
}
.pnf-dest-tag {
    display: block;
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-primary);
}
.pnf-dest-title {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: clamp(1.5rem, 3vw, 2.125rem);
    font-weight: 700;
    color: var(--color-text-heading);
    line-height: 1.2;
}
.pnf-dest-subtitle {
    margin: 0;
    font-size: var(--text-sm);
    line-height: 1.65;
    color: var(--color-text-muted);
}

.pnf-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}
@media (min-width: 640px) {
    .pnf-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .pnf-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

.pnf-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 24px;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xs);
    text-decoration: none;
    color: inherit;
    transition: border-color var(--dur-base) var(--ease-in-out),
                box-shadow var(--dur-base) var(--ease-in-out);
}
.pnf-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}
.pnf-card:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.pnf-card-icon-box {
    width: 46px;
    height: 46px;
    border-radius: var(--radius-md);
    background-color: var(--color-primary-container);
    color: var(--color-primary);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                color var(--dur-fast) var(--ease-in-out);
}
.pnf-card:hover .pnf-card-icon-box {
    background-color: var(--color-deep-navy);
    color: #ffffff;
}
.pnf-card-title {
    margin: 0 0 8px;
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-text-heading);
    line-height: 1.3;
}
.pnf-card-desc {
    margin: 0 0 18px;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-muted);
}
.pnf-card-link-text {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    min-height: 44px;
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-primary);
    border-top: 1px solid var(--color-border);
    padding-top: 10px;
}
.pnf-card:hover .pnf-card-link-text {
    color: var(--color-primary-strong);
    text-decoration: underline;
}

/* Contact Support Strip (Canonical /contact/) */
.pnf-contact-bar {
    margin-top: 24px;
    padding: 24px 28px;
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface-sunken);
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}
.pnf-contact-bar h3 {
    margin: 0 0 6px;
    font-family: var(--font-display);
    font-size: 1.1875rem;
    font-weight: 700;
    color: var(--color-text-heading);
}
.pnf-contact-bar p {
    margin: 0;
    max-width: 60ch;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}

@media (prefers-reduced-motion: reduce) {
    .pnf-card,
    .pnf-card-icon-box,
    .pnf-btn-primary,
    .pnf-btn-secondary {
        transition: none;
    }
}
</style>

<main id="main-content" class="pnf-wrapper">

    <!-- 1. Hero Error Status -->
    <section class="pnf-hero-section" aria-labelledby="pnf-page-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="pnf-hero-inner">
                <span class="pnf-code">Error 404</span>
                <h1 id="pnf-page-title" class="pnf-title">Halaman yang Anda Cari Tidak Ditemukan</h1>
                <p class="pnf-desc">
                    Tautan yang Anda tuju mungkin telah berubah struktur alamatnya atau halaman tidak tersedia di server kami. Gunakan navigasi resmi di bawah ini untuk menemukan informasi yang dibutuhkan.
                </p>
                <div class="pnf-hero-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="pnf-btn-primary">Kembali ke Beranda</a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="pnf-btn-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Canonical Destinations Grid -->
    <section class="pnf-destinations-section" aria-labelledby="pnf-dest-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">

            <div class="pnf-dest-header">
                <span class="pnf-dest-tag">Navigasi Halaman Utama</span>
                <h2 id="pnf-dest-heading" class="pnf-dest-title">Halaman Resmi PT. Perumnas Iida Group</h2>
                <p class="pnf-dest-subtitle">
                    Akses cepat menuju informasi perusahaan, pengembangan kawasan hunian, produk konstruksi IG Strong CB, dan berita terbaru.
                </p>
            </div>

            <div class="pnf-grid">

                <!-- 1. /about-us/overview/ -->
                <a href="<?php echo esc_url(home_url('/about-us/overview/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                <line x1="9" y1="6" x2="9" y2="6.01"></line>
                                <line x1="15" y1="6" x2="15" y2="6.01"></line>
                                <line x1="9" y1="10" x2="9" y2="10.01"></line>
                                <line x1="15" y1="10" x2="15" y2="10.01"></line>
                                <line x1="9" y1="14" x2="9" y2="14.01"></line>
                                <line x1="15" y1="14" x2="15" y2="14.01"></line>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Tentang Kami (Overview)</h3>
                        <p class="pnf-card-desc">Profil PT. Perumnas Iida Group sebagai perusahaan patungan Iida Sangyo dan Perumnas sejak 2017.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Overview</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

                <!-- 2. /company-profile/ -->
                <a href="<?php echo esc_url(home_url('/company-profile/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Company Profile</h3>
                        <p class="pnf-card-desc">Struktur korporasi, kepemilikan saham, filosofi bisnis, dan profil grup induk dari Tokyo.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Lihat Company Profile</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

                <!-- 3. /development/ -->
                <a href="<?php echo esc_url(home_url('/development/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Proyek Pengembangan</h3>
                        <p class="pnf-card-desc">Kawasan Heartful-Town Bekasi, Heartful Tower Bekasi, Heartful-Town Depok, dan Botania 2 Residence.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Jelajahi Proyek</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

                <!-- 4. /product-osaka-strong-cb/ -->
                <a href="<?php echo esc_url(home_url('/product-osaka-strong-cb/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Produk IG Strong CB</h3>
                        <p class="pnf-card-desc">Teknologi dinding beton pracetak tahan gempa berpaten IDP000069171 dan tersertifikasi SNI.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Pelajari IG Strong CB</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

                <!-- 5. /group-company/ -->
                <a href="<?php echo esc_url(home_url('/group-company/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Group Company</h3>
                        <p class="pnf-card-desc">Jaringan enam perusahaan inti Iida Group Holdings dan entitas operasional di Jepang serta Asia.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Lihat Jaringan Grup</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

                <!-- 6. /news/ -->
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1m2 13a2 2 0 0 1-2-2V7m2 13a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Berita &amp; Rilis Pers</h3>
                        <p class="pnf-card-desc">Arsip berita resmi perusahaan, rilis pers, serta publikasi E-Newsletter dan Corporate Profile PDF.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman Berita</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>

            </div>

            <!-- 7. /contact/ -->
            <div class="pnf-contact-bar">
                <div>
                    <h3>Butuh Bantuan atau Informasi Proyek?</h3>
                    <p>
                        Kunjungi halaman kontak resmi untuk menghubungi Kantor Pusat Bekasi, Pabrik IG SCB Bogor, atau Unit Bisnis Heartful-Town.
                    </p>
                </div>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="pnf-btn-primary">Buka Halaman Kontak</a>
            </div>

        </div>
    </section>

</main>

<?php
get_footer();
?>
