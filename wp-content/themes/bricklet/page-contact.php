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
.contact-badge-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
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
}
.contact-card-badge--soft {
    background-color: var(--color-surface-sunken);
    color: var(--color-text-heading);
    border: 1px solid var(--color-border-strong);
    margin-bottom: 6px;
}
.contact-card-kicker {
    font-size: var(--text-xs);
    font-weight: 700;
    color: var(--color-primary);
}
.contact-card-title {
    margin: 0;
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--color-text-heading);
}
.contact-location-list {
    display: grid;
    gap: 12px;
    margin-bottom: 14px;
}
.contact-location-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}
.contact-location-item svg {
    flex: 0 0 auto;
    width: 17px;
    height: 17px;
    margin-top: 3px;
    color: var(--color-primary);
}
.contact-location-label {
    display: block;
    margin-bottom: 2px;
    font-size: var(--text-xs);
    font-weight: 700;
    color: var(--color-text-heading);
}
.contact-card-address {
    margin: 0 0 14px;
    font-style: normal;
    font-size: var(--text-sm);
    line-height: 1.6;
    color: var(--color-text-body);
}
.contact-location-item .contact-card-address {
    margin: 0;
}
.contact-units-group {
    display: grid;
    gap: 14px;
    padding-top: 6px;
}
.contact-units-heading {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
    font-family: var(--font-display);
    font-size: var(--text-sm);
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--color-text-heading);
}
.contact-units-heading svg {
    flex: 0 0 auto;
    width: 18px;
    height: 18px;
    color: var(--color-primary);
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
    min-width: 0;
    min-height: 44px;
    color: var(--color-text-heading);
    font-weight: 600;
    overflow-wrap: anywhere;
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
            <h1 id="contact-page-title">Hubungi PT Perumnas Iida Group</h1>
            <p class="contact-hero-lede">
                Pusat layanan informasi resmi terpadu untuk Kantor Pusat (Head Office), Kantor Cabang, serta seluruh Unit Bisnis &amp; Marketing Gallery Heartful Town.
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
                        Pilih kantor pusat atau unit bisnis proyek yang ingin Anda tuju. Tim konsultan kami akan memproses pesan yang dikirimkan ke alamat email resmi perusahaan.
                    </p>

                    <form class="contact-form" id="contact-ajax-form" method="post" novalidate>
                        <?php wp_nonce_field('send_contact_message', 'contact_nonce'); ?>

                        <div class="contact-field">
                            <label for="unit_destination" class="contact-label">
                                Tujuan Unit Bisnis / Kantor <span class="contact-required" aria-hidden="true">*</span>
                            </label>
                            <div class="contact-select-wrap">
                                <select id="unit_destination" name="unit_destination" class="contact-select" required>
                                    <option value="Head Office PT Perumnas Iida Group" <?php selected($posted_dest, 'Head Office PT Perumnas Iida Group'); ?>>
                                        Head Office PT Perumnas Iida Group
                                    </option>
                                    <option value="Unit Bisnis Heartful Town Depok" <?php selected($posted_dest, 'Unit Bisnis Heartful Town Depok'); ?>>
                                        Unit Bisnis Heartful Town Depok
                                    </option>
                                    <option value="Unit Bisnis Heartful Town Taman Mini" <?php selected($posted_dest, 'Unit Bisnis Heartful Town Taman Mini'); ?>>
                                        Unit Bisnis Heartful Town Taman Mini
                                    </option>
                                    <option value="Unit Bisnis Heartful Town Bekasi" <?php selected($posted_dest, 'Unit Bisnis Heartful Town Bekasi'); ?>>
                                        Unit Bisnis Heartful Town Bekasi
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
                                        <option value="Konsultasi & Ketersediaan Unit" <?php selected($posted_subject, 'Konsultasi & Ketersediaan Unit'); ?>>Konsultasi &amp; Ketersediaan Unit</option>
                                        <option value="Jadwal Survey Show Unit" <?php selected($posted_subject, 'Jadwal Survey Show Unit'); ?>>Jadwal Survey Show Unit</option>
                                        <option value="Simulasi KPR & Promo Spesial" <?php selected($posted_subject, 'Simulasi KPR & Promo Spesial'); ?>>Simulasi KPR &amp; Promo Spesial</option>
                                        <option value="Kemitraan & Kerjasama Bisnis" <?php selected($posted_subject, 'Kemitraan & Kerjasama Bisnis'); ?>>Kemitraan &amp; Kerjasama Bisnis</option>
                                        <option value="Pertanyaan Umum Lainnya" <?php selected($posted_subject, 'Pertanyaan Umum Lainnya'); ?>>Pertanyaan Umum Lainnya</option>
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

                <!-- Right: Office Information & Business Units -->
                <aside class="contact-directory" aria-labelledby="contact-directory-heading">
                    <div class="contact-directory-head">
                        <p class="contact-eyebrow">Direktori Alamat</p>
                        <h2 id="contact-directory-heading" class="contact-heading">Kantor Resmi &amp; Unit Bisnis</h2>
                    </div>

                    <!-- 1. Head Office Card -->
                    <article class="contact-card contact-card--featured">
                        <div class="contact-card-head">
                            <div class="contact-card-icon" aria-hidden="true">
                                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-badge-row">
                                    <span class="contact-card-badge">Head Office</span>
                                    <span class="contact-card-kicker">Kantor Pusat</span>
                                </div>
                                <h3 class="contact-card-title">PT Perumnas Iida Group</h3>
                            </div>
                        </div>

                        <div class="contact-location-list">
                            <div class="contact-location-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <div>
                                    <span class="contact-location-label">Head Office:</span>
                                    <address class="contact-card-address">Jl. Pancasila I, Cicadas, Gunung Putri, Bogor District. 16964</address>
                                </div>
                            </div>
                            <div class="contact-location-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                                <div>
                                    <span class="contact-location-label">Branch Office:</span>
                                    <address class="contact-card-address">Pondok Indah Office Tower 1, 3rd Floor Suite 304, Jl. Sultan Iskandar Muda Kav. VTA, Pondok Indah, South Jakarta 12310</address>
                                </div>
                            </div>
                        </div>

                        <ul class="contact-meta-list">
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                                <a href="tel:+622186869299" class="contact-meta-link">+62-21-8686-9299</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                <a href="mailto:sales@ptighd.co.id" class="contact-meta-link">sales@ptighd.co.id</a>
                            </li>
                            <li class="contact-meta-item">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="contact-hours">Senin - Jumat: 08.30 - 17.30 WIB</span>
                            </li>
                        </ul>

                        <div class="contact-card-actions">
                            <a href="https://maps.google.com/maps?ll=-6.443159,106.922777&amp;z=10&amp;t=m&amp;hl=en&amp;gl=ID&amp;mapclient=embed&amp;cid=13211956695535904105" target="_blank" rel="noopener noreferrer" class="contact-action-link" aria-label="Petunjuk Arah Google Maps Head Office PT Perumnas Iida Group">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <span>Petunjuk Arah Google Maps</span>
                            </a>
                        </div>
                    </article>

                    <!-- Business Units Section -->
                    <div class="contact-units-group" role="region" aria-labelledby="contact-units-heading">
                        <h3 id="contact-units-heading" class="contact-units-heading">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            <span>Unit Bisnis &amp; Marketing Gallery</span>
                        </h3>

                        <!-- Unit 1: Depok -->
                        <article class="contact-card">
                            <div class="contact-card-head">
                                <div class="contact-card-icon" aria-hidden="true">
                                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Depok</span>
                                    <h4 class="contact-card-title">Heartful Town Depok</h4>
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
                                    <a href="tel:+6281288336230" class="contact-meta-link" aria-label="Telepon +62 812-8833-6230 (Heartful Town Depok)">+62 812-8833-6230</a>
                                </li>
                                <li class="contact-meta-item">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <a href="mailto:info@heartfultowndepok.com" class="contact-meta-link">info@heartfultowndepok.com</a>
                                </li>
                                <li class="contact-meta-item">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="contact-hours">Buka Setiap Hari: 09.00 - 17.00 WIB</span>
                                </li>
                            </ul>

                            <div class="contact-card-actions">
                                <a href="https://www.google.com/maps/place/Heartful-Town/@-6.4337197,106.7492946,277m/data=!3m1!1e3!4m10!1m2!2m1!1sHeartful-Town+depok!3m6!1s0x2e69e95c64b55191:0x574b25b31f9dc29f!8m2!3d-6.4339858!4d106.7502404!15sChNIZWFydGZ1bC1Ub3duIGRlcG9rWhUiE2hlYXJ0ZnVsIHRvd24gZGVwb2uSARNjdXN0b21faG9tZV9idWlsZGVymgFEQ2k5RFFVbFJRVU52WkVOb2RIbGpSamx2VDJ0cmVWWnVWWFJXYTJSb1V6SldkbUpJYXpSVFJsWktWRmhXTUZSWVl4QULgAQD6AQQIFBBA!16s%2Fg%2F11h_ccf406?entry=ttu&g_ep=EgoyMDI2MTEwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="contact-action-link" aria-label="Petunjuk Arah Google Maps (Heartful Town Depok)">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                                <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Depok" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa" aria-label="WhatsApp (Marketing Heartful Town Depok)">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                    </svg>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </article>

                        <!-- Unit 2: Taman Mini -->
                        <article class="contact-card">
                            <div class="contact-card-head">
                                <div class="contact-card-icon" aria-hidden="true">
                                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Taman Mini</span>
                                    <h4 class="contact-card-title">Heartful Town Taman Mini</h4>
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
                                    <a href="tel:+6281288336230" class="contact-meta-link" aria-label="Telepon +62 812-8833-6230 (Heartful Town Taman Mini)">+62 812-8833-6230</a>
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
                                    <span class="contact-hours">Buka Setiap Hari: 09.00 - 17.00 WIB</span>
                                </li>
                            </ul>

                            <div class="contact-card-actions">
                                <a href="https://maps.google.com/?q=Heartful+Town+Taman+Mini" target="_blank" rel="noopener noreferrer" class="contact-action-link" aria-label="Petunjuk Arah Google Maps (Heartful Town Taman Mini)">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                                <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Taman%20Mini" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa" aria-label="WhatsApp (Marketing Heartful Town Taman Mini)">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                    </svg>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </article>

                        <!-- Unit 3: Bekasi -->
                        <article class="contact-card">
                            <div class="contact-card-head">
                                <div class="contact-card-icon" aria-hidden="true">
                                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="contact-card-badge contact-card-badge--soft">Unit Bisnis Bekasi</span>
                                    <h4 class="contact-card-title">Heartful Town Bekasi</h4>
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
                                    <a href="tel:+6281288336230" class="contact-meta-link" aria-label="Telepon +62 812-8833-6230 (Heartful Town Bekasi)">+62 812-8833-6230</a>
                                </li>
                                <li class="contact-meta-item">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    <a href="mailto:marketing@perumnas-iidagroup.com" class="contact-meta-link">marketing@perumnas-iidagroup.com</a>
                                </li>
                                <li class="contact-meta-item">
                                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="contact-hours">Buka Setiap Hari: 09.00 - 17.00 WIB</span>
                                </li>
                            </ul>

                            <div class="contact-card-actions">
                                <a href="https://www.google.com/maps/place/Heartful-Town+Bekasi/@-6.3254063,106.9971649,908m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2e6993289c86221b:0x1015a69c646678de!8m2!3d-6.3254063!4d106.9997398!16s%2Fg%2F11xgmhvr49?entry=ttu&g_ep=EgoyMDI2MTEwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="contact-action-link" aria-label="Petunjuk Arah Google Maps (Heartful Town Bekasi)">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                    <span>Petunjuk Arah Google Maps</span>
                                </a>
                                <a href="https://wa.me/6281288336230?text=Halo%20Marketing%20Heartful%20Town%20Bekasi" target="_blank" rel="noopener noreferrer" class="contact-action-link contact-action-link--wa" aria-label="WhatsApp (Marketing Heartful Town Bekasi)">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                    </svg>
                                    <span>WhatsApp</span>
                                </a>
                            </div>
                        </article>
                    </div>

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
