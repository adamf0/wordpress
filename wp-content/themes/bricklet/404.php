<?php
/**
 * The template for displaying 404 pages (Not Found)
 * Professional, informative, and high-utility UI/UX design matching corporate theme.
 */

get_header();
$theme_uri = get_template_directory_uri();
?>

<style>
/* ==========================================================================
   404 Page Not Found Layout
   ========================================================================== */

.pnf-wrapper {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #1e293b;
    background-color: #ffffff;
    width: 100%;
    min-height: 80vh;
    overflow-x: hidden;
}

/* --------------------------------------------------------------------------
   1. HERO ERROR SECTION
   -------------------------------------------------------------------------- */
.pnf-hero-section {
    position: relative;
    padding: 5rem 1.5rem 4rem;
    background: radial-gradient(circle at 50% 10%, #f8fafc 0%, #f1f5f9 100%);
    border-bottom: 1px solid #e2e8f0;
    text-align: center;
    overflow: hidden;
}
@media (min-width: 768px) {
    .pnf-hero-section {
        padding: 6.5rem 2rem 5rem;
    }
}

.pnf-hero-inner {
    max-width: 780px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

/* Big 404 Number */
.pnf-code {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(5rem, 14vw, 9.5rem);
    font-weight: 900;
    line-height: 0.95;
    letter-spacing: -0.05em;
    margin: 0 0 1rem 0;
    background: linear-gradient(135deg, rgb(10 31 44) 0%, #006491 55%, #00b3ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 12px 30px rgba(10, 31, 44, 0.1);
}

/* Heading & Subtitle */
.pnf-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    color: #0a1f2c;
    letter-spacing: -0.02em;
    line-height: 1.25;
    margin: 0 0 1rem 0;
}
.pnf-desc {
    font-size: 1.0625rem;
    color: #475569;
    line-height: 1.65;
    max-width: 620px;
    margin: 0 auto;
}

/* --------------------------------------------------------------------------
   2. POPULAR DESTINATIONS GRID (INFORMATIVE SECTION)
   -------------------------------------------------------------------------- */
.pnf-destinations-section {
    padding: 5rem 1.5rem 6.5rem;
    background-color: #ffffff;
}
@media (min-width: 1024px) {
    .pnf-destinations-section {
        padding: 6rem 3rem 7.5rem;
    }
}
.pnf-container {
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
}

.pnf-dest-header {
    text-align: center;
    max-width: 680px;
    margin: 0 auto 3.5rem;
}
.pnf-dest-tag {
    font-size: 0.8125rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: #006491;
    margin-bottom: 0.75rem;
    display: block;
}
.pnf-dest-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(1.75rem, 3vw, 2.25rem);
    font-weight: 800;
    color: #0a1f2c;
    letter-spacing: -0.02em;
    margin: 0 0 0.75rem 0;
}
.pnf-dest-subtitle {
    font-size: 0.95rem;
    color: #64748b;
    line-height: 1.6;
    margin: 0;
}

/* Grid of Cards */
.pnf-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}
@media (min-width: 640px) {
    .pnf-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (min-width: 1024px) {
    .pnf-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Destination Card */
.pnf-card {
    background-color: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 2rem 1.75rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
    text-decoration: none;
    color: inherit;
    position: relative;
    overflow: hidden;
}
.pnf-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: transparent;
    transition: background 0.3s ease;
}
.pnf-card:hover {
    transform: translateY(-5px);
    border-color: #00b3ff;
    box-shadow: 0 16px 36px -10px rgba(0, 100, 145, 0.16);
}
.pnf-card:hover::before {
    background: linear-gradient(90deg, #006491, #00b3ff);
}

.pnf-card-icon-box {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    background-color: #f0f9ff;
    color: #006491;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.25rem;
    transition: all 0.3s ease;
}
.pnf-card:hover .pnf-card-icon-box {
    background-color: rgb(10 31 44 / var(--tw-bg-opacity, 1));
    color: #00b3ff;
    transform: scale(1.08);
}

.pnf-card-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: 1.15rem;
    font-weight: 700;
    color: #0a1f2c;
    margin: 0 0 0.5rem 0;
    letter-spacing: -0.01em;
}
.pnf-card-desc {
    font-size: 0.875rem;
    color: #64748b;
    line-height: 1.55;
    margin: 0 0 1.25rem 0;
}
.pnf-card-link-text {
    font-size: 0.8125rem;
    font-weight: 600;
    color: #006491;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap 0.2s ease;
}
.pnf-card:hover .pnf-card-link-text {
    gap: 10px;
    color: #00b3ff;
}
</style>

<main class="pnf-wrapper">

    <!-- ========================================================================
         1. HERO 404 STATUS SECTION
         ======================================================================== -->
    <section class="pnf-hero-section">
        <div class="pnf-hero-inner">
            <div class="pnf-code" aria-hidden="true">404</div>

            <h1 class="pnf-title">Maaf, Halaman yang Anda Cari Tidak Tersedia</h1>
            <p class="pnf-desc">
                Tautan yang Anda tuju mungkin salah ketik, telah diperbarui strukturnya, atau halaman sudah tidak tersedia lagi di server kami.
            </p>
        </div>
    </section>

    <!-- ========================================================================
         2. INFORMATIVE POPULAR DESTINATIONS
         ======================================================================== -->
    <section class="pnf-destinations-section">
        <div class="pnf-container">

            <div class="pnf-dest-header">
                <span class="pnf-dest-tag">NAVIGASI REKOMENDASI</span>
                <h2 class="pnf-dest-title">Mungkin Anda Mencari Halaman Ini</h2>
                <p class="pnf-dest-subtitle">
                    Temukan akses langsung ke halaman-halaman utama PT Iida Group Holdings di bawah ini.
                </p>
            </div>

            <div class="pnf-grid">

                <!-- 1. Overview / About Us -->
                <a href="<?php echo esc_url(home_url('/aboutus/overview')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                <line x1="9" y1="22" x2="9" y2="22.01"></line>
                                <line x1="15" y1="22" x2="15" y2="22.01"></line>
                                <line x1="9" y1="6" x2="9" y2="6.01"></line>
                                <line x1="15" y1="6" x2="15" y2="6.01"></line>
                                <line x1="9" y1="10" x2="9" y2="10.01"></line>
                                <line x1="15" y1="10" x2="15" y2="10.01"></line>
                                <line x1="9" y1="14" x2="9" y2="14.01"></line>
                                <line x1="15" y1="14" x2="15" y2="14.01"></line>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Tentang Kami (Overview)</h3>
                        <p class="pnf-card-desc">Profil resmi korporat, konsolidasi 6 pengembang Jepang ternama, dan jajaran dewan direksi.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

                <!-- 2. Vision & Mission -->
                <a href="<?php echo esc_url(home_url('/aboutus/vision_mission')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Visi &amp; Misi Perusahaan</h3>
                        <p class="pnf-card-desc">Komitmen mutu, filosofi integritas, dan standar konstruksi bangunan tahan gempa di Indonesia.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

                <!-- 3. Awards -->
                <a href="<?php echo esc_url(home_url('/aboutus/awards')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="8" r="7"></circle>
                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Awards &amp; Recognition</h3>
                        <p class="pnf-card-desc">Rekam jejak 79 penghargaan nasional dari kementerian dan lembaga independen (2017–2025).</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

                <!-- 4. Residentials & Development -->
                <a href="<?php echo esc_url(home_url('/development/residentials')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Kawasan Residensial</h3>
                        <p class="pnf-card-desc">Portofolio perumahan modern dengan konstruksi presisi dan lingkungan berkelanjutan.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

                <!-- 5. Latest Updates & News -->
                <a href="<?php echo esc_url(home_url('/news?newsData=1')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1m2 13a2 2 0 0 1-2-2V7m2 13a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Berita &amp; Rilis Pers</h3>
                        <p class="pnf-card-desc">Informasi terbaru seputar proyek, serah terima unit, dan kabar korporasi terkini.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

                <!-- 6. Contact Us -->
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="pnf-card">
                    <div>
                        <div class="pnf-card-icon-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <h3 class="pnf-card-title">Kontak &amp; Layanan Bantuan</h3>
                        <p class="pnf-card-desc">Hubungi tim perwakilan kami untuk informasi properti, kemitraan, atau pertanyaan lainnya.</p>
                    </div>
                    <span class="pnf-card-link-text">
                        <span>Buka Halaman</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </span>
                </a>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();
