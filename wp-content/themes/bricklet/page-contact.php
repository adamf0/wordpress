<?php
/**
 * Template Name: Contact Page
 */
get_header();

$theme_uri = get_template_directory_uri();
$hero_bg   = $theme_uri . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp';

$posted_dest    = isset($_POST['unit_destination']) ? sanitize_text_field(wp_unslash($_POST['unit_destination'])) : '';
$posted_name    = isset($_POST['fullname']) ? sanitize_text_field(wp_unslash($_POST['fullname'])) : '';
$posted_email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
$posted_phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
$posted_subject = isset($_POST['subject_type']) ? sanitize_text_field(wp_unslash($_POST['subject_type'])) : '';
$posted_message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
?>

<style type="text/css">
.contact-page {
    background-color: var(--color-background);
    color: var(--color-text-body);
}

/* Hero */
.contact-hero {
    position: relative;
    overflow: hidden;
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 84px) 0;
}
.contact-hero-media {
    position: absolute;
    inset: 0;
    z-index: 0;
}
.contact-hero-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.contact-hero-scrim {
    position: absolute;
    inset: 0;
    background: linear-gradient(120deg, rgba(10, 31, 44, 0.94) 0%, rgba(10, 31, 44, 0.84) 60%, rgba(10, 31, 44, 0.91) 100%);
}
.contact-hero-inner {
    position: relative;
    z-index: 1;
}
.contact-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #cbd5e1;
}
.contact-breadcrumb a {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: #cbd5e1;
    text-decoration: none;
}
.contact-breadcrumb a:hover {
    color: #ffffff;
    text-decoration: underline;
}
.contact-breadcrumb a:focus-visible {
    outline: 2px solid var(--color-action-cyan);
    outline-offset: 2px;
    border-radius: 4px;
}
.contact-hero h1 {
    margin: 0 0 14px;
    max-width: 24ch;
    font-family: var(--font-display);
    font-size: clamp(2rem, 4.2vw, 3.25rem);
    font-weight: 700;
    line-height: 1.12;
    color: #ffffff;
}
.contact-hero-lede {
    margin: 0;
    max-width: 58ch;
    font-size: var(--text-lg);
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.88);
}

/* Main Split Grid */
.contact-main-section {
    padding: clamp(44px, 6vw, 80px) 0;
}
.contact-layout {
    display: grid;
    grid-template-columns: 1fr;
    gap: clamp(28px, 4vw, 48px);
    align-items: start;
}
@media (min-width: 1024px) {
    .contact-layout {
        grid-template-columns: 1.05fr 0.95fr;
    }
}

/* Form Panel */
.contact-form-panel {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border-strong);
    border-radius: var(--radius-lg);
    padding: clamp(24px, 4vw, 44px);
    box-shadow: var(--shadow-sm);
}
.contact-eyebrow {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--color-primary);
}
.contact-heading {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.5vw, 1.875rem);
    font-weight: 700;
    line-height: 1.25;
    color: var(--color-text-heading);
}
.contact-intro {
    margin: 0 0 28px;
    font-size: var(--text-sm);
    line-height: 1.65;
    color: var(--color-text-muted);
}

.contact-form {
    display: grid;
    gap: 20px;
}
.contact-form-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
}
@media (min-width: 640px) {
    .contact-form-row {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
.contact-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.contact-label {
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: var(--color-text-heading);
}
.contact-required {
    color: #b91c1c;
    font-weight: 700;
}
.contact-input,
.contact-select,
.contact-textarea {
    width: 100%;
    min-height: 44px;
    padding: 11px 14px;
    border: 1px solid #6b7280;
    border-radius: var(--radius-md);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-family: var(--font-body);
    font-size: var(--text-sm);
    line-height: 1.5;
    transition: border-color var(--dur-fast) var(--ease-in-out),
                box-shadow var(--dur-fast) var(--ease-in-out),
                background-color var(--dur-fast) var(--ease-in-out);
}
.contact-input::placeholder,
.contact-textarea::placeholder {
    color: var(--color-text-muted);
    opacity: 1;
}
.contact-input:focus-visible,
.contact-select:focus-visible,
.contact-textarea:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-color: var(--color-primary);
}
.contact-input.is-invalid,
.contact-textarea.is-invalid {
    border-color: #b91c1c;
    background-color: #fef2f2;
}
.contact-field-error {
    margin: 0;
    font-size: var(--text-xs);
    font-weight: 600;
    color: #991b1b;
}
.contact-field-error[hidden] {
    display: none;
}

.contact-select-wrap {
    position: relative;
}
.contact-select {
    appearance: none;
    padding-right: 40px;
    cursor: pointer;
}
.contact-select-chevron {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    width: 18px;
    height: 18px;
    color: var(--color-text-heading);
    pointer-events: none;
}
.contact-textarea {
    min-height: 120px;
    resize: vertical;
}

/* Inline Feedback Banners */
.contact-feedback {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 16px;
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    line-height: 1.55;
    font-weight: 500;
}
.contact-feedback[hidden] {
    display: none;
}
.contact-feedback svg {
    flex: 0 0 auto;
    width: 20px;
    height: 20px;
    margin-top: 2px;
}
.contact-feedback--error {
    background-color: #fef2f2;
    border: 1px solid #b91c1c;
    color: #991b1b;
}
.contact-feedback--success {
    background-color: #ecfdf5;
    border: 1px solid #065f46;
    color: #065f46;
}
.contact-feedback p {
    margin: 0;
}

.contact-submit-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 16px;
    padding-top: 4px;
}
.contact-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 46px;
    min-width: 180px;
    padding: 12px 28px;
    border: 0;
    border-radius: var(--radius-md);
    background-color: var(--color-primary);
    color: #ffffff;
    font-family: var(--font-body);
    font-size: var(--text-sm);
    font-weight: 700;
    cursor: pointer;
    box-shadow: var(--shadow-sm);
    transition: background-color var(--dur-fast) var(--ease-in-out),
                opacity var(--dur-fast) var(--ease-in-out);
}
.contact-submit-btn:hover:not(:disabled) {
    background-color: var(--color-primary-strong);
}
.contact-submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}
.contact-submit-btn:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
.contact-form-note {
    margin: 0;
    font-size: var(--text-xs);
    color: var(--color-text-muted);
}

/* Right Office Directory */
.contact-directory {
    display: grid;
    gap: 18px;
}
.contact-directory-head {
    margin-bottom: 4px;
}
.contact-card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-lg);
    padding: 22px 24px;
    box-shadow: var(--shadow-xs);
}
.contact-card--featured {
    border: 2px solid var(--color-primary);
    box-shadow: var(--shadow-sm);
}
.contact-card-head {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 14px;
}
.contact-card-icon {
    flex: 0 0 auto;
    width: 44px;
    height: 44px;
    border-radius: var(--radius-md);
    background-color: var(--color-primary-container);
    color: var(--color-primary);
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.contact-card-badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 10px;
    border-radius: var(--radius-sm);
    background-color: var(--color-deep-navy);
    color: #ffffff;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    margin-bottom: 6px;
}
.contact-card-badge--soft {
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
    border: 1px solid var(--color-border-strong);
}
.contact-card-title {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--color-text-heading);
}
.contact-card-address {
    margin: 0 0 14px;
    font-style: normal;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}
.contact-meta-list {
    list-style: none;
    margin: 0;
    padding: 12px 0 0;
    border-top: 1px solid var(--color-border);
    display: grid;
    gap: 6px;
}
.contact-meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: var(--text-sm);
    color: var(--color-text-body);
}
.contact-meta-item svg {
    flex: 0 0 auto;
    width: 17px;
    height: 17px;
    color: var(--color-primary);
}
.contact-meta-link {
    display: inline-flex;
    align-items: center;
    min-height: 44px;
    color: var(--color-text-heading);
    font-weight: 600;
    text-decoration: none;
}
.contact-meta-link:hover {
    color: var(--color-primary);
    text-decoration: underline;
}
.contact-meta-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
    border-radius: 4px;
}
.contact-hours {
    display: inline-flex;
    align-items: center;
    min-height: 36px;
    color: var(--color-text-muted);
    font-size: var(--text-sm);
}
.contact-card-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 14px;
    padding-top: 14px;
    border-top: 1px solid var(--color-border);
}
.contact-action-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    min-height: 44px;
    padding: 8px 16px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border-strong);
    background-color: var(--color-surface);
    color: var(--color-text-heading);
    font-size: var(--text-xs);
    font-weight: 700;
    text-decoration: none;
    transition: background-color var(--dur-fast) var(--ease-in-out),
                border-color var(--dur-fast) var(--ease-in-out);
}
.contact-action-link:hover {
    border-color: var(--color-primary);
    background-color: var(--color-primary-container);
    color: var(--color-on-primary-container);
}
.contact-action-link--wa {
    background-color: var(--color-primary-container);
    border-color: var(--color-primary);
    color: var(--color-on-primary-container);
}
.contact-action-link--wa:hover {
    background-color: var(--color-primary);
    color: #ffffff;
}
.contact-action-link:focus-visible {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}

/* Standards / Trust Banner */
.contact-trust {
    background-color: var(--color-deep-navy);
    color: #ffffff;
    padding: clamp(48px, 6vw, 72px) 0;
}
.contact-trust-head {
    text-align: center;
    max-width: 60ch;
    margin: 0 auto 36px;
}
.contact-trust-eyebrow {
    margin: 0 0 8px;
    font-size: var(--text-xs);
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--color-action-cyan);
}
.contact-trust-head h2 {
    margin: 0 0 10px;
    font-family: var(--font-display);
    font-size: clamp(1.375rem, 2.8vw, 2rem);
    font-weight: 700;
    color: #ffffff;
}
.contact-trust-head p {
    margin: 0;
    font-size: var(--text-sm);
    color: #cbd5e1;
}
.contact-trust-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
}
@media (min-width: 640px) {
    .contact-trust-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .contact-trust-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}
.contact-trust-item {
    padding: 22px 20px;
    border-radius: var(--radius-md);
    border: 1px solid rgba(255, 255, 255, 0.14);
    background-color: rgba(255, 255, 255, 0.04);
    text-align: center;
}
.contact-trust-value {
    display: block;
    margin-bottom: 6px;
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: #ffffff;
}
.contact-trust-label {
    display: block;
    font-size: var(--text-xs);
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: var(--color-action-cyan);
}

@media (prefers-reduced-motion: reduce) {
    .contact-input,
    .contact-select,
    .contact-textarea,
    .contact-submit-btn,
    .contact-action-link {
        transition: none;
    }
}
</style>

<main id="main-content" class="contact-page">

    <!-- Hero -->
    <section class="contact-hero" aria-labelledby="contact-page-title">
        <div class="contact-hero-media" aria-hidden="true">
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" fetchpriority="high" decoding="sync" />
            <div class="contact-hero-scrim"></div>
        </div>
        <div class="max-w-container-max mx-auto px-margin-desktop-alt contact-hero-inner">
            <nav class="contact-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">Contact</span>
            </nav>
            <h1 id="contact-page-title">Hubungi PT. Perumnas Iida Group</h1>
            <p class="contact-hero-lede">
                Layanan informasi resmi untuk Kantor Pusat Bekasi, Pabrik Produksi IG SCB Bogor, serta unit bisnis perumahan Heartful-Town di Jabodetabek.
            </p>
        </div>
    </section>

    <!-- Main Form & Directory -->
    <section class="contact-main-section" aria-label="Formulir kontak dan daftar kantor">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="contact-layout">

                <!-- Left: Contact Form -->
                <section class="contact-form-panel" aria-labelledby="contact-form-heading">
                    <p class="contact-eyebrow">Formulir Komunikasi Resmi</p>
                    <h2 id="contact-form-heading" class="contact-heading">Kirim Pesan &amp; Konsultasi</h2>
                    <p class="contact-intro">
                        Pilih tujuan kantor atau unit bisnis serta topik pertanyaan Anda. Tim kami akan memproses pesan yang dikirimkan ke alamat email resmi perusahaan.
                    </p>

                    <form class="contact-form" id="contact-ajax-form" method="post" novalidate>
                        <?php wp_nonce_field('send_contact_message', 'contact_nonce'); ?>

                        <div class="contact-field">
                            <label for="unit_destination" class="contact-label">
                                Tujuan Kantor / Unit Bisnis <span class="contact-required" aria-hidden="true">*</span>
                            </label>
                            <div class="contact-select-wrap">
                                <select id="unit_destination" name="unit_destination" class="contact-select" required>
                                    <option value="Kantor Pusat Bekasi (PT. Perumnas Iida Group)" <?php selected($posted_dest, 'Kantor Pusat Bekasi (PT. Perumnas Iida Group)'); ?>>
                                        Kantor Pusat Bekasi (PT. Perumnas Iida Group)
                                    </option>
                                    <option value="Pabrik IG SCB Gunung Putri, Bogor" <?php selected($posted_dest, 'Pabrik IG SCB Gunung Putri, Bogor'); ?>>
                                        Pabrik IG SCB Gunung Putri, Bogor
                                    </option>
                                    <option value="Unit Bisnis Heartful-Town Bekasi" <?php selected($posted_dest, 'Unit Bisnis Heartful-Town Bekasi'); ?>>
                                        Unit Bisnis Heartful-Town Bekasi
                                    </option>
                                    <option value="Unit Bisnis Heartful-Town Depok" <?php selected($posted_dest, 'Unit Bisnis Heartful-Town Depok'); ?>>
                                        Unit Bisnis Heartful-Town Depok
                                    </option>
                                    <option value="Unit Bisnis Heartful-Town Taman Mini" <?php selected($posted_dest, 'Unit Bisnis Heartful-Town Taman Mini'); ?>>
                                        Unit Bisnis Heartful-Town Taman Mini
                                    </option>
                                </select>
                                <svg class="contact-select-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>

                        <div class="contact-form-row">
                            <div class="contact-field">
                                <label for="fullname" class="contact-label">
                                    Nama Lengkap <span class="contact-required" aria-hidden="true">*</span>
                                </label>
                                <input id="fullname" name="fullname" type="text" class="contact-input" autocomplete="name"
                                       placeholder="Nama lengkap Anda"
                                       value="<?php echo esc_attr($posted_name); ?>"
                                       aria-describedby="error-fullname"
                                       required />
                                <p id="error-fullname" class="contact-field-error" hidden>Nama lengkap wajib diisi.</p>
                            </div>

                            <div class="contact-field">
                                <label for="email" class="contact-label">
                                    Alamat Email <span class="contact-required" aria-hidden="true">*</span>
                                </label>
                                <input id="email" name="email" type="email" class="contact-input" autocomplete="email"
                                       placeholder="nama@email.com"
                                       value="<?php echo esc_attr($posted_email); ?>"
                                       aria-describedby="error-email"
                                       required />
                                <p id="error-email" class="contact-field-error" hidden>Masukkan alamat email yang valid.</p>
                            </div>
                        </div>

                        <div class="contact-form-row">
                            <div class="contact-field">
                                <label for="phone" class="contact-label">Nomor Telepon / WhatsApp</label>
                                <input id="phone" name="phone" type="tel" class="contact-input" autocomplete="tel"
                                       placeholder="Nomor telepon atau WhatsApp aktif"
                                       value="<?php echo esc_attr($posted_phone); ?>" />
                            </div>

                            <div class="contact-field">
                                <label for="subject_type" class="contact-label">Topik Pertanyaan</label>
                                <div class="contact-select-wrap">
                                    <select id="subject_type" name="subject_type" class="contact-select">
                                        <option value="Heartful-Town Bekasi" <?php selected($posted_subject, 'Heartful-Town Bekasi'); ?>>Heartful-Town Bekasi</option>
                                        <option value="Heartful Tower Bekasi" <?php selected($posted_subject, 'Heartful Tower Bekasi'); ?>>Heartful Tower Bekasi</option>
                                        <option value="Heartful-Town Depok" <?php selected($posted_subject, 'Heartful-Town Depok'); ?>>Heartful-Town Depok</option>
                                        <option value="Botania 2 Residence" <?php selected($posted_subject, 'Botania 2 Residence'); ?>>Botania 2 Residence</option>
                                        <option value="IG Strong Concrete Block (CB 15 cm / CB 10 cm)" <?php selected($posted_subject, 'IG Strong Concrete Block (CB 15 cm / CB 10 cm)'); ?>>IG Strong Concrete Block (CB 15 cm / CB 10 cm)</option>
                                        <option value="Material Konstruksi" <?php selected($posted_subject, 'Material Konstruksi'); ?>>Material Konstruksi</option>
                                        <option value="Kemitraan Bisnis" <?php selected($posted_subject, 'Kemitraan Bisnis'); ?>>Kemitraan Bisnis</option>
                                    </select>
                                    <svg class="contact-select-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="contact-field">
                            <label for="message" class="contact-label">
                                Pesan / Kebutuhan Anda <span class="contact-required" aria-hidden="true">*</span>
                            </label>
                            <textarea id="message" name="message" class="contact-textarea" rows="5"
                                      placeholder="Tuliskan pertanyaan Anda mengenai proyek perumahan, spesifikasi IG SCB, material konstruksi, atau kemitraan bisnis..."
                                      aria-describedby="error-message"
                                      required><?php echo esc_textarea($posted_message); ?></textarea>
                            <p id="error-message" class="contact-field-error" hidden>Pesan tidak boleh kosong.</p>
                        </div>

                        <!-- Inline Accessible Feedback Banners -->
                        <div id="contact-feedback-error" class="contact-feedback contact-feedback--error" role="alert" aria-live="assertive" hidden>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                            <p id="contact-feedback-error-text"></p>
                        </div>

                        <div id="contact-feedback-success" class="contact-feedback contact-feedback--success" role="status" aria-live="polite" hidden>
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p id="contact-feedback-success-text"></p>
                        </div>

                        <div class="contact-submit-row">
                            <button type="submit" id="contact-submit-btn" class="contact-submit-btn">Kirim Pesan</button>
                            <p class="contact-form-note">Kolom bertanda * wajib diisi.</p>
                        </div>
                    </form>
                </section>

                <!-- Right: Office Directory -->
                <aside class="contact-directory" aria-labelledby="contact-directory-heading">
                    <div class="contact-directory-head">
                        <p class="contact-eyebrow">Direktori Alamat</p>
                        <h2 id="contact-directory-heading" class="contact-heading">Kantor Resmi &amp; Unit Bisnis</h2>
                    </div>

                    <!-- 1. Kantor Pusat Bekasi (Corporate Profile Nov 2023 p.7) -->
                    <article class="contact-card contact-card--featured">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </div>
                            <div>
                                <span class="contact-card-badge">Kantor Pusat (Head Office)</span>
                                <h3 class="contact-card-title">PT. Perumnas Iida Group - Bekasi</h3>
                            </div>
                        </div>

                        <address class="contact-card-address">
                            Jl. Caringin Raya, RT.010/RW.002, Kota Bekasi, Kec. Rawalumbu, Kota Bekasi, Jawa Barat
                        </address>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253" />
                                </svg>
                                <a href="https://www.perumnas-iida.com/" target="_blank" rel="noopener noreferrer" class="contact-meta-link">https://www.perumnas-iida.com/</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+622186869299" class="contact-meta-link">+62 21 8686 9299</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:info@perumnas-iidagroup.com" class="contact-meta-link">info@perumnas-iidagroup.com</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Senin - Jumat: 08.30 - 17.30 WIB</span>
                            </li>
                        </ul>
                    </article>

                    <!-- 2. Pabrik Produksi IG SCB Bogor -->
                    <article class="contact-card">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75" />
                                </svg>
                            </div>
                            <div>
                                <span class="contact-card-badge contact-card-badge--soft">Fasilitas Produksi Resmi</span>
                                <h3 class="contact-card-title">Pabrik Produksi IG SCB Bogor</h3>
                            </div>
                        </div>

                        <address class="contact-card-address">
                            Jl. Pancasila I, Cicadas, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16964
                        </address>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+622186869299" class="contact-meta-link">+62 21 8686 9299</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:info@perumnas-iidagroup.com" class="contact-meta-link">info@perumnas-iidagroup.com</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Senin - Jumat: 08.30 - 17.30 WIB</span>
                            </li>
                        </ul>

                        <div class="contact-card-actions">
                            <a href="https://maps.google.com/maps?ll=-6.443159,106.922777&amp;z=10&amp;t=m&amp;hl=en&amp;gl=ID&amp;mapclient=embed&amp;cid=13211956695535904105" target="_blank" rel="noopener noreferrer" class="contact-action-link">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Petunjuk Arah Google Maps</span>
                            </a>
                        </div>
                    </article>

                    <!-- 3. Unit Bisnis Bekasi -->
                    <article class="contact-card">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                </svg>
                            </div>
                            <div>
                                <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Bekasi</span>
                                <h3 class="contact-card-title">Heartful-Town Bekasi</h3>
                            </div>
                        </div>

                        <address class="contact-card-address">
                            Jl. Manggis, RT.003/RW.005, Kel. Padurenan, Kec. Mustikajaya, Kota Bekasi, Jawa Barat 17156
                        </address>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+6281288336230" class="contact-meta-link">+62 812-8833-6230</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:info@perumnas-iidagroup.com" class="contact-meta-link">info@perumnas-iidagroup.com</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Setiap Hari: 09.00 - 17.00 WIB</span>
                            </li>
                        </ul>

                        <div class="contact-card-actions">
                            <a href="https://www.google.com/maps?cid=1159015091722877150" target="_blank" rel="noopener noreferrer" class="contact-action-link">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Google Maps</span>
                            </a>
                            <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful-Town%20Bekasi" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa">
                                <span>WhatsApp Bekasi</span>
                            </a>
                        </div>
                    </article>

                    <!-- 4. Unit Bisnis Depok -->
                    <article class="contact-card">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                </svg>
                            </div>
                            <div>
                                <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Depok</span>
                                <h3 class="contact-card-title">Heartful-Town Depok</h3>
                            </div>
                        </div>

                        <address class="contact-card-address">
                            Jl. Arco Raya No. 7, Kel. Duren Seribu, Kec. Bojongsari, Kota Depok, Jawa Barat 16518
                        </address>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+6281288336230" class="contact-meta-link">+62 812-8833-6230</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:info@perumnas-iidagroup.com" class="contact-meta-link">info@perumnas-iidagroup.com</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Setiap Hari: 09.00 - 17.00 WIB</span>
                            </li>
                        </ul>

                        <div class="contact-card-actions">
                            <a href="https://www.google.com/maps?cid=6290130985202860703" target="_blank" rel="noopener noreferrer" class="contact-action-link">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Google Maps</span>
                            </a>
                            <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful-Town%20Depok" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa">
                                <span>WhatsApp Depok</span>
                            </a>
                        </div>
                    </article>

                    <!-- 5. Unit Bisnis Taman Mini -->
                    <article class="contact-card">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                </svg>
                            </div>
                            <div>
                                <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Taman Mini</span>
                                <h3 class="contact-card-title">Heartful-Town Taman Mini</h3>
                            </div>
                        </div>

                        <address class="contact-card-address">
                            Jl. Pinang Ranti I No. 22, Kel. Pinang Ranti, Kec. Makasar, Jakarta Timur, DKI Jakarta 13560
                        </address>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+6281288336230" class="contact-meta-link">+62 812-8833-6230</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:info@perumnas-iidagroup.com" class="contact-meta-link">info@perumnas-iidagroup.com</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Setiap Hari: 09.00 - 17.00 WIB</span>
                            </li>
                        </ul>

                        <div class="contact-card-actions">
                            <a href="https://maps.google.com/?q=Heartful+Town+Taman+Mini" target="_blank" rel="noopener noreferrer" class="contact-action-link">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Google Maps</span>
                            </a>
                            <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful-Town%20Taman%20Mini" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa">
                                <span>WhatsApp Taman Mini</span>
                            </a>
                        </div>
                    </article>

                </aside>
            </div>
        </div>
    </section>

    <!-- Trust / Engineering Standards Banner -->
    <section class="contact-trust" aria-labelledby="contact-trust-heading">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="contact-trust-head">
                <p class="contact-trust-eyebrow">Legalitas &amp; Standar Konstruksi</p>
                <h2 id="contact-trust-heading">Standar Rekayasa PT. Perumnas Iida Group</h2>
                <p>Data teknis terverifikasi dari Corporate Profile PT. Perumnas Iida Group (Edisi November 2023).</p>
            </div>
            <div class="contact-trust-grid">
                <div class="contact-trust-item">
                    <span class="contact-trust-value">Paten IDP000069171</span>
                    <span class="contact-trust-label">Tersertifikasi SNI (IG SCB)</span>
                </div>
                <div class="contact-trust-item">
                    <span class="contact-trust-value">Uji Gempa &gt; 8,0</span>
                    <span class="contact-trust-label">Simulasi Struktur Tahan Gempa</span>
                </div>
                <div class="contact-trust-item">
                    <span class="contact-trust-value">HPIS Highest Grade</span>
                    <span class="contact-trust-label">Standar Kinerja Hunian Jepang</span>
                </div>
                <div class="contact-trust-item">
                    <span class="contact-trust-value">Joint Venture</span>
                    <span class="contact-trust-label">Iida Sangyo 93% &amp; Propernas 7%</span>
                </div>
            </div>
        </div>
    </section>

</main>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
(function () {
    'use strict';

    var form        = document.getElementById('contact-ajax-form');
    var submitBtn   = document.getElementById('contact-submit-btn');
    var errBanner   = document.getElementById('contact-feedback-error');
    var errText     = document.getElementById('contact-feedback-error-text');
    var okBanner    = document.getElementById('contact-feedback-success');
    var okText      = document.getElementById('contact-feedback-success-text');

    if (!form) {
        return;
    }

    var fieldMap = {
        fullname: {
            input: document.getElementById('fullname'),
            error: document.getElementById('error-fullname')
        },
        email: {
            input: document.getElementById('email'),
            error: document.getElementById('error-email')
        },
        message: {
            input: document.getElementById('message'),
            error: document.getElementById('error-message')
        }
    };

    function clearFeedback() {
        if (errBanner) {
            errBanner.hidden = true;
            errText.textContent = '';
        }
        if (okBanner) {
            okBanner.hidden = true;
            okText.textContent = '';
        }
        Object.keys(fieldMap).forEach(function (key) {
            var pair = fieldMap[key];
            if (pair.input) {
                pair.input.classList.remove('is-invalid');
                pair.input.removeAttribute('aria-invalid');
            }
            if (pair.error) {
                pair.error.hidden = true;
            }
        });
    }

    function showBanner(isSuccess, message) {
        if (isSuccess) {
            if (errBanner) { errBanner.hidden = true; }
            if (okBanner && okText) {
                okText.textContent = message;
                okBanner.hidden = false;
            }
        } else {
            if (okBanner) { okBanner.hidden = true; }
            if (errBanner && errText) {
                errText.textContent = message;
                errBanner.hidden = false;
            }
        }
    }

    function setFieldInvalid(key, customMsg) {
        var pair = fieldMap[key];
        if (!pair) return;
        if (pair.input) {
            pair.input.classList.add('is-invalid');
            pair.input.setAttribute('aria-invalid', 'true');
        }
        if (pair.error) {
            if (customMsg) {
                pair.error.textContent = customMsg;
            }
            pair.error.hidden = false;
        }
    }

    function isValidEmail(val) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
    }

    Object.keys(fieldMap).forEach(function (key) {
        var pair = fieldMap[key];
        if (!pair.input) return;
        pair.input.addEventListener('input', function () {
            pair.input.classList.remove('is-invalid');
            pair.input.removeAttribute('aria-invalid');
            if (pair.error) {
                pair.error.hidden = true;
            }
        });
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        clearFeedback();

        var fullnameVal = fieldMap.fullname.input ? fieldMap.fullname.input.value.trim() : '';
        var emailVal    = fieldMap.email.input ? fieldMap.email.input.value.trim() : '';
        var messageVal  = fieldMap.message.input ? fieldMap.message.input.value.trim() : '';

        var firstInvalid = null;

        if (!fullnameVal) {
            setFieldInvalid('fullname', 'Nama lengkap wajib diisi.');
            firstInvalid = firstInvalid || fieldMap.fullname.input;
        }
        if (!emailVal || !isValidEmail(emailVal)) {
            setFieldInvalid('email', 'Masukkan alamat email yang valid (contoh: nama@email.com).');
            firstInvalid = firstInvalid || fieldMap.email.input;
        }
        if (!messageVal) {
            setFieldInvalid('message', 'Pesan atau kebutuhan Anda wajib diisi.');
            firstInvalid = firstInvalid || fieldMap.message.input;
        }

        if (firstInvalid) {
            showBanner(false, 'Mohon lengkapi atau perbaiki kolom yang ditandai sebelum mengirim pesan.');
            firstInvalid.focus();
            return;
        }

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';
        }

        var formData = new FormData(form);
        formData.append('action', 'bricklet_contact');

        fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', {
            method: 'POST',
            credentials: 'same-origin',
            body: formData
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (res) {
            if (res && res.success) {
                var okMsg = (res.data && res.data.message)
                    ? res.data.message
                    : 'Pesan berhasil terkirim. Tim kami akan segera menghubungi Anda.';
                showBanner(true, okMsg);
                form.reset();
            } else {
                var errMsg = (res && res.data && res.data.message)
                    ? res.data.message
                    : 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.';
                showBanner(false, errMsg);
            }
        })
        .catch(function () {
            showBanner(false, 'Gagal terhubung ke server. Periksa koneksi internet Anda lalu coba kembali.');
        })
        .finally(function () {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim Pesan';
            }
        });
    });
})();
</script>

<?php
get_footer();
?>
