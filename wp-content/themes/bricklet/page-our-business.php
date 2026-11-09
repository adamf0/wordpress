<?php
/**
 * Template Name: Our Business
 * Description: Skema Bisnis Terintegrasi, Teknologi IG SCB, Standar HPIS, dan Diversifikasi Lini Bisnis (Company Profile Nov 2023).
 */
get_header();

$theme_uri  = get_template_directory_uri();
$layout_img = $theme_uri . '/images/layout/';
$pdf_img    = $theme_uri . '/images/pdf/';
?>

<style type="text/css">
    /* ============================================================
       OUR BUSINESS PAGE SCOPED STYLES
       Tokens inherited from header.php (:root).
       ============================================================ */
    .ob-main {
        background-color: var(--color-background);
        color: var(--color-text-body);
    }

    /* Section Primitives */
    .ob-sec {
        padding-top: clamp(48px, 7vw, 96px);
        padding-bottom: clamp(48px, 7vw, 96px);
    }
    .ob-sec--light  { background-color: var(--color-surface); }
    .ob-sec--sunken { background-color: var(--color-surface-sunken); }
    .ob-sec--dark   { background-color: var(--color-deep-navy); color: #ffffff; }

    .ob-head {
        max-width: 66ch;
        margin-bottom: clamp(28px, 4vw, 48px);
    }
    .ob-kicker {
        margin: 0 0 10px;
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .ob-kicker--dark { color: var(--color-action-cyan); }

    .ob-title {
        margin: 0 0 14px;
        font-family: var(--font-display);
        font-size: clamp(1.625rem, 3.2vw, 2.5rem);
        font-weight: 700;
        line-height: 1.14;
        letter-spacing: -0.02em;
        color: var(--color-text-heading);
        text-wrap: balance;
    }
    .ob-title--dark { color: #ffffff; }

    .ob-lede {
        margin: 0;
        font-size: clamp(1rem, 1.3vw, 1.125rem);
        line-height: 1.65;
        color: var(--color-text-body);
        text-wrap: pretty;
    }
    .ob-lede--dark { color: rgba(255, 255, 255, 0.88); }

    /* Hero */
    .ob-hero {
        position: relative;
        isolation: isolate;
        background-color: var(--color-deep-navy);
        color: #ffffff;
        overflow: hidden;
    }
    .ob-hero-media {
        position: absolute;
        inset: 0;
        z-index: -2;
    }
    .ob-hero-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.34;
    }
    .ob-hero-scrim {
        position: absolute;
        inset: 0;
        z-index: -1;
        background: linear-gradient(105deg, rgba(10, 31, 44, 0.96) 0%, rgba(10, 31, 44, 0.82) 55%, rgba(10, 31, 44, 0.68) 100%);
    }
    .ob-hero-inner {
        padding-top: clamp(48px, 7vw, 96px);
        padding-bottom: clamp(48px, 7vw, 96px);
    }
    .ob-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        margin: 0 0 20px;
        font-size: var(--text-xs);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #cbd5e1;
    }
    .ob-breadcrumb a {
        display: inline-flex;
        align-items: center;
        min-height: 44px;
        color: #cbd5e1;
        text-decoration: none;
        transition: color var(--dur-fast) var(--ease-in-out);
    }
    .ob-breadcrumb a:hover { color: #ffffff; }
    .ob-breadcrumb a:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
        border-radius: 4px;
    }
    .ob-breadcrumb-current { color: #ffffff; }

    .ob-hero-copy { max-width: 48rem; }
    .ob-hero-h1 {
        margin: 0 0 18px;
        font-family: var(--font-display);
        font-size: clamp(2rem, 4.4vw, 3.375rem);
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -0.025em;
        color: #ffffff;
        text-wrap: balance;
    }
    .ob-hero-desc {
        margin: 0 0 28px;
        max-width: 42rem;
        font-size: clamp(1rem, 1.4vw, 1.125rem);
        line-height: 1.65;
        color: rgba(255, 255, 255, 0.88);
    }
    .ob-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Buttons (min-height >= 44px) */
    .ob-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 11px 22px;
        border-radius: var(--radius-pill);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid transparent;
        transition: background-color var(--dur-fast) var(--ease-in-out),
                    color var(--dur-fast) var(--ease-in-out),
                    border-color var(--dur-fast) var(--ease-in-out),
                    transform var(--dur-fast) var(--ease-spring);
    }
    .ob-btn:active { transform: scale(0.98); }
    .ob-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }
    .ob-btn--light-solid {
        background-color: #ffffff;
        color: var(--color-deep-navy);
    }
    .ob-btn--light-solid:hover {
        background-color: var(--color-primary-container);
        color: var(--color-deep-navy);
    }
    .ob-btn--light-ghost {
        background-color: rgba(255, 255, 255, 0.08);
        border-color: rgba(255, 255, 255, 0.38);
        color: #ffffff;
    }
    .ob-btn--light-ghost:hover {
        background-color: rgba(255, 255, 255, 0.16);
        border-color: #ffffff;
    }
    .ob-btn--primary {
        background-color: var(--color-primary);
        color: #ffffff;
    }
    .ob-btn--primary:hover {
        background-color: var(--color-primary-strong);
    }
    .ob-btn--outline {
        background-color: var(--color-surface);
        border-color: var(--color-border-strong);
        color: var(--color-text-heading);
    }
    .ob-btn--outline:hover {
        border-color: var(--color-primary);
        color: var(--color-primary);
        background-color: var(--color-primary-container);
    }
    .ob-btn--outline:focus-visible,
    .ob-btn--primary:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }

    /* Section 1: Integrated Business Scheme (7 Steps + 4 Pillars) */
    .ob-chain {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1px;
        margin: 0 0 clamp(32px, 4vw, 48px);
        padding: 0;
        list-style: none;
        background-color: var(--color-border);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
        overflow: hidden;
    }
    @media (min-width: 560px) {
        .ob-chain { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 820px) {
        .ob-chain { grid-template-columns: repeat(4, minmax(0, 1fr)); }
    }
    @media (min-width: 1120px) {
        .ob-chain { grid-template-columns: repeat(7, minmax(0, 1fr)); }
    }
    .ob-chain-step {
        display: flex;
        flex-direction: column;
        gap: 6px;
        padding: 20px 18px;
        background-color: var(--color-surface);
    }
    .ob-chain-num {
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        color: var(--color-primary);
        font-variant-numeric: tabular-nums;
    }
    .ob-chain-name {
        font-family: var(--font-display);
        font-size: var(--text-base);
        font-weight: 700;
        line-height: 1.25;
        color: var(--color-text-heading);
    }
    .ob-chain-sub {
        font-size: var(--text-xs);
        line-height: 1.45;
        color: var(--color-text-muted);
    }

    .ob-pillars-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .ob-pillars-grid > *,
    .ob-tech-layout > *,
    .ob-hpis-layout > *,
    .ob-b2b-grid > *,
    .ob-resort-grid > *,
    .ob-finance-panel > * {
        min-width: 0;
    }
    @media (min-width: 720px) {
        .ob-pillars-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .ob-pillar-card {
        padding: clamp(22px, 3vw, 30px);
        background-color: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .ob-pillar-meta {
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .ob-pillar-title {
        margin: 0;
        font-family: var(--font-display);
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-pillar-list {
        margin: 4px 0 0;
        padding: 0 0 0 18px;
        display: grid;
        gap: 8px;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: var(--color-text-body);
    }

    /* Section 2: IG SCB Technology & Manufacturing */
    .ob-tech-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: clamp(28px, 4vw, 52px);
        align-items: start;
    }
    @media (min-width: 960px) {
        .ob-tech-layout { grid-template-columns: 1.2fr 1fr; }
    }
    .ob-tech-points {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        gap: 16px;
    }
    .ob-tech-point {
        padding: 20px 22px;
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: var(--radius-md);
    }
    .ob-tech-point-head {
        display: flex;
        align-items: baseline;
        gap: 12px;
        margin-bottom: 6px;
    }
    .ob-tech-idx {
        font-family: var(--font-display);
        font-size: var(--text-sm);
        font-weight: 700;
        color: var(--color-action-cyan);
        font-variant-numeric: tabular-nums;
    }
    .ob-tech-point h3 {
        margin: 0;
        font-size: var(--text-lg);
        font-weight: 700;
        color: #ffffff;
    }
    .ob-tech-point p {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.6;
        color: #cbd5e1;
    }

    .ob-compare-box {
        margin-top: 20px;
        padding: 20px 22px;
        border-radius: var(--radius-md);
        background-color: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.16);
    }
    .ob-compare-title {
        margin: 0 0 10px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #f0c44d;
    }
    .ob-compare-list {
        margin: 0;
        padding: 0 0 0 18px;
        display: grid;
        gap: 8px;
        font-size: var(--text-sm);
        line-height: 1.55;
        color: rgba(255, 255, 255, 0.86);
    }

    /* Specs card */
    .ob-specs-card {
        padding: clamp(22px, 3vw, 32px);
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: var(--radius-lg);
    }
    .ob-specs-heading {
        margin: 0 0 16px;
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--color-action-cyan);
    }
    .ob-spec-dl {
        margin: 0;
        display: grid;
        gap: 0;
    }
    .ob-spec-row {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }
    .ob-spec-row:last-child { border-bottom: 0; }
    .ob-spec-row dt {
        font-size: var(--text-xs);
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #cbd5e1;
    }
    .ob-spec-row dd {
        margin: 0;
        font-size: var(--text-base);
        font-weight: 600;
        color: #ffffff;
        font-variant-numeric: tabular-nums;
    }

    .ob-cert-panel {
        margin-top: 20px;
        padding: 18px 20px;
        border-radius: var(--radius-md);
        background-color: rgba(196, 158, 43, 0.14);
        border: 1px solid rgba(240, 196, 77, 0.45);
    }
    .ob-cert-kicker {
        margin: 0 0 4px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #f0c44d;
    }
    .ob-cert-num {
        margin: 0 0 4px;
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 700;
        color: #ffffff;
    }
    .ob-cert-sub {
        margin: 0;
        font-size: var(--text-xs);
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.88);
    }
    .ob-tech-actions {
        margin-top: 22px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .ob-tech-actions .ob-btn { width: 100%; }

    /* IG SCB 3 Visual Documents Gallery */
    .ob-visual-grid {
        margin-top: clamp(32px, 5vw, 48px);
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 700px) {
        .ob-visual-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1024px) {
        .ob-visual-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .ob-figure-card {
        margin: 0;
        padding: 14px;
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: var(--radius-md);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 12px;
    }
    .ob-figure-frame {
        border-radius: var(--radius-sm);
        overflow: hidden;
        background-color: #ffffff;
        aspect-ratio: 16 / 11;
    }
    .ob-figure-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .ob-figure-frame--contain img {
        object-fit: contain;
        padding: 6px;
    }
    .ob-figure-cap {
        margin-top: 12px;
        font-size: var(--text-sm);
        font-weight: 600;
        line-height: 1.45;
        color: #ffffff;
    }
    .ob-figure-meta {
        display: block;
        margin: 4px 0 0;
        font-size: var(--text-xs);
        font-weight: 400;
        line-height: 1.5;
        color: #cbd5e1;
    }
    .ob-zoom-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 44px;
        width: 100%;
        padding: 10px 14px;
        border-radius: var(--radius-sm);
        border: 1px solid rgba(255, 255, 255, 0.28);
        background-color: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        font-family: var(--font-body);
        font-size: var(--text-xs);
        font-weight: 600;
        cursor: pointer;
        transition: background-color var(--dur-fast) var(--ease-in-out), border-color var(--dur-fast) var(--ease-in-out);
    }
    .ob-zoom-btn:hover {
        background-color: rgba(255, 255, 255, 0.18);
        border-color: var(--color-action-cyan);
    }
    .ob-zoom-btn:focus-visible {
        outline: 2px solid var(--color-action-cyan);
        outline-offset: 2px;
    }

    /* Native Lightbox Dialog */
    .ob-dialog {
        max-width: min(92vw, 960px);
        width: 100%;
        margin: auto;
        padding: 0;
        border: 1px solid var(--color-border-strong);
        border-radius: var(--radius-lg);
        background-color: var(--color-surface);
        color: var(--color-text-heading);
        box-shadow: var(--shadow-lg);
    }
    .ob-dialog::backdrop {
        background-color: rgba(10, 31, 44, 0.8);
    }
    .ob-dialog-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 16px 20px;
        border-bottom: 1px solid var(--color-border);
    }
    .ob-dialog-title {
        margin: 0;
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-dialog-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        min-height: 44px;
        padding: 0 14px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--color-border-strong);
        background-color: var(--color-surface);
        color: var(--color-text-heading);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 600;
        cursor: pointer;
    }
    .ob-dialog-close:hover {
        background-color: var(--color-surface-sunken);
        border-color: var(--color-primary);
    }
    .ob-dialog-close:focus-visible {
        outline: 2px solid var(--color-primary);
        outline-offset: 2px;
    }
    .ob-dialog-body {
        padding: 20px;
        background-color: var(--color-surface-sunken);
        text-align: center;
    }
    .ob-dialog-body img {
        max-height: 70vh;
        width: auto;
        max-width: 100%;
        margin: 0 auto;
        border-radius: var(--radius-sm);
        border: 1px solid var(--color-border);
        background-color: #ffffff;
    }
    .ob-dialog-cap {
        margin: 12px 0 0;
        font-size: var(--text-sm);
        color: var(--color-text-body);
    }

    /* Section 3: Housing Performance Indication System (HPIS) */
    .ob-hpis-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: clamp(28px, 4vw, 56px);
        align-items: start;
    }
    @media (min-width: 960px) {
        .ob-hpis-layout { grid-template-columns: 1.05fr 1fr; }
    }
    .ob-grade-card {
        padding: 22px;
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
    }
    .ob-grade-banner {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px 18px;
        margin-bottom: 18px;
        border-radius: var(--radius-md);
        background-color: #fef3c7;
        border: 1px solid #d97706;
    }
    .ob-grade-banner-title {
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 800;
        color: #78350f;
    }
    .ob-grade-banner-sub {
        font-size: var(--text-xs);
        font-weight: 600;
        color: #78350f;
    }
    .ob-grade-table-wrap {
        width: 100%;
        overflow-x: auto;
    }
    .ob-grade-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: var(--text-sm);
    }
    .ob-grade-table th {
        padding: 10px 12px;
        border-bottom: 2px solid var(--color-border-strong);
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--color-text-muted);
    }
    .ob-grade-table td {
        padding: 11px 12px;
        border-bottom: 1px solid var(--color-border);
        color: var(--color-text-body);
        vertical-align: top;
    }
    .ob-grade-pill {
        display: inline-block;
        padding: 3px 10px;
        border-radius: var(--radius-pill);
        background-color: var(--color-primary-container);
        color: var(--color-on-primary-container);
        font-size: var(--text-xs);
        font-weight: 700;
        white-space: normal;
        text-align: center;
    }
    @media (max-width: 520px) {
        .ob-grade-table th,
        .ob-grade-table td {
            padding: 9px 8px;
            font-size: var(--text-xs);
        }
    }
    .ob-grade-pill--gold {
        background-color: #f0c44d;
        color: #0a1f2c;
    }
    .ob-hpis-footnote {
        margin: 14px 0 0;
        font-size: var(--text-xs);
        line-height: 1.55;
        color: var(--color-text-muted);
    }

    /* 5 Inspection Stages */
    .ob-inspect-box {
        margin-top: 24px;
        padding: 22px;
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
    }
    .ob-inspect-heading {
        margin: 0 0 14px;
        font-family: var(--font-display);
        font-size: var(--text-base);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-inspect-list {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    @media (min-width: 560px) {
        .ob-inspect-list { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .ob-inspect-item {
        display: flex;
        align-items: baseline;
        gap: 10px;
        padding: 10px 12px;
        background-color: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-sm);
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--color-text-heading);
    }
    .ob-inspect-num {
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-primary);
        font-variant-numeric: tabular-nums;
    }

    /* 10 Factors List */
    .ob-factors-panel {
        padding: clamp(22px, 3vw, 30px);
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
    }
    .ob-factors-title {
        margin: 0 0 14px;
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-factors-list {
        margin: 0;
        padding: 0;
        list-style: none;
        border-top: 1px solid var(--color-border);
    }
    .ob-factors-list li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid var(--color-border);
        font-size: var(--text-sm);
        line-height: 1.45;
        color: var(--color-text-heading);
    }
    .ob-factor-main {
        display: flex;
        align-items: baseline;
        gap: 12px;
        min-width: 0;
    }
    .ob-factor-no {
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--color-text-muted);
        font-variant-numeric: tabular-nums;
    }
    .ob-badge-wajib {
        flex: 0 0 auto;
        padding: 3px 9px;
        border-radius: var(--radius-pill);
        background-color: var(--color-primary-container);
        color: var(--color-on-primary-container);
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    /* Section 4: Business Lain / Diversifikasi Lini Bisnis */
    .ob-b2b-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        margin-bottom: 24px;
    }
    @media (min-width: 720px) {
        .ob-b2b-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .ob-b2b-band {
        padding: 24px 26px;
        background-color: var(--color-surface-sunken);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
    }
    .ob-b2b-tag {
        margin: 0 0 6px;
        font-size: var(--text-xs);
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--color-primary);
    }
    .ob-b2b-band h3 {
        margin: 0 0 8px;
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-b2b-band p {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: var(--color-text-body);
    }

    .ob-resort-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        margin-bottom: 24px;
    }
    @media (min-width: 860px) {
        .ob-resort-grid { grid-template-columns: 0.9fr 1.1fr; }
    }
    .ob-div-card {
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    .ob-div-photos {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2px;
        background-color: var(--color-border);
    }
    .ob-div-photos--split {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    @media (max-width: 520px) {
        .ob-div-photos--split { grid-template-columns: 1fr; }
    }
    .ob-div-photos img {
        width: 100%;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        display: block;
    }
    .ob-div-body {
        padding: clamp(20px, 3vw, 28px);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .ob-div-body h3 {
        margin: 0;
        font-size: var(--text-xl);
        font-weight: 700;
        color: var(--color-text-heading);
    }
    .ob-div-body p {
        margin: 0;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: var(--color-text-body);
    }
    .ob-mini-facts {
        margin: 8px 0 0;
        padding: 12px 0 0;
        border-top: 1px solid var(--color-border);
        display: flex;
        flex-wrap: wrap;
        gap: 12px 24px;
        font-size: var(--text-sm);
        color: var(--color-text-heading);
    }

    /* Finance Highlight Panel (Family Life Service) */
    .ob-finance-panel {
        padding: clamp(24px, 3.5vw, 36px);
        background-color: var(--color-primary-container);
        border: 1px solid var(--color-border-strong);
        border-radius: var(--radius-lg);
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        align-items: center;
    }
    @media (min-width: 900px) {
        .ob-finance-panel { grid-template-columns: 1.15fr 1fr; }
    }
    .ob-finance-copy h3 {
        margin: 0 0 10px;
        font-size: clamp(1.375rem, 2.4vw, 1.75rem);
        font-weight: 700;
        color: var(--color-on-primary-container);
    }
    .ob-finance-copy p {
        margin: 0 0 18px;
        font-size: var(--text-sm);
        line-height: 1.65;
        color: var(--color-on-primary-container);
    }
    .ob-finance-facts {
        margin: 0;
        padding: 0;
        list-style: none;
        display: grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    @media (min-width: 560px) {
        .ob-finance-facts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    .ob-finance-facts li {
        padding: 14px 16px;
        background-color: var(--color-surface);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
    }
    .ob-finance-val {
        display: block;
        font-family: var(--font-display);
        font-size: var(--text-lg);
        font-weight: 800;
        color: var(--color-primary-strong);
        font-variant-numeric: tabular-nums;
    }
    .ob-finance-lbl {
        display: block;
        margin-top: 2px;
        font-size: var(--text-xs);
        line-height: 1.4;
        color: var(--color-text-muted);
    }

    /* Section 5: Closing CTA Band */
    .ob-cta {
        padding-top: clamp(48px, 6vw, 80px);
        padding-bottom: clamp(48px, 6vw, 80px);
        background-color: var(--color-primary);
        color: #ffffff;
    }
    .ob-cta-inner {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }
    .ob-cta-title {
        margin: 0 0 8px;
        font-family: var(--font-display);
        font-size: clamp(1.5rem, 2.6vw, 2.125rem);
        font-weight: 700;
        color: #ffffff;
    }
    .ob-cta-desc {
        margin: 0;
        max-width: 52ch;
        font-size: var(--text-base);
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.92);
    }
    .ob-cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
</style>

<main id="main-content" class="ob-main">

    <!-- ============================================================
         HERO
         ============================================================ -->
    <section class="ob-hero" aria-labelledby="ob-hero-title">
        <div class="ob-hero-media">
            <img src="<?php echo esc_url( $layout_img . 'lh3_4e7dcb7a7dc7f918cf46601d23a5b81a.webp' ); ?>"
                 alt="Operasional terintegrasi dan manufaktur material bangunan Iida Group Holdings"
                 width="1024" height="576"
                 fetchpriority="high" decoding="sync">
        </div>
        <div class="ob-hero-scrim" aria-hidden="true"></div>

        <div class="max-w-container-max mx-auto px-margin-desktop-alt ob-hero-inner">
            <nav class="ob-breadcrumb" aria-label="Navigasi halaman">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <span aria-hidden="true">/</span>
                <span class="ob-breadcrumb-current" aria-current="page">Our Business</span>
            </nav>

            <div class="ob-hero-copy">
                <h1 id="ob-hero-title" class="ob-hero-h1">
                    Skema Bisnis Terintegrasi, Teknologi IG SCB &amp; Standar Mutu HPIS
                </h1>
                <p class="ob-hero-desc">
                    Dari riset dan pengembangan, pengadaan lahan, perancangan, manufaktur komponen pracetak tahan gempa di bawah pengawasan tenaga ahli Jepang, hingga layanan purna jual dan diversifikasi lini bisnis grup.
                </p>
                <div class="ob-hero-actions">
                    <a href="#skema-bisnis" class="ob-btn ob-btn--light-solid">Rantai Bisnis 7 Tahapan</a>
                    <a href="#teknologi-ig-scb" class="ob-btn ob-btn--light-ghost">Spesifikasi IG SCB</a>
                    <a href="#standar-hpis" class="ob-btn ob-btn--light-ghost">Standar HPIS</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         1. SKEMA BISNIS TERINTEGRASI (PDF p.13)
         ============================================================ -->
    <section class="ob-sec ob-sec--light" id="skema-bisnis" aria-labelledby="ob-scheme-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="ob-head">
                <p class="ob-kicker">Skema Bisnis Group Perusahaan</p>
                <h2 id="ob-scheme-title" class="ob-title">
                    Satu Sistem Terintegrasi dari R&amp;D hingga After Sales Service
                </h2>
                <p class="ob-lede">
                    Produk hunian yang sampai ke tangan pelanggan ditangani dalam satu kesatuan sistem yang telah terintegrasi secara menyeluruh di seluruh rantai nilai operasional grup.
                </p>
            </header>

            <ol class="ob-chain" aria-label="Tujuh tahapan rantai bisnis terintegrasi">
                <li class="ob-chain-step">
                    <span class="ob-chain-num">01</span>
                    <span class="ob-chain-name">R&amp;D</span>
                    <span class="ob-chain-sub">Riset material &amp; struktur tahan gempa</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">02</span>
                    <span class="ob-chain-name">Pembelian Lahan</span>
                    <span class="ob-chain-sub">Land Purchase di lokasi strategis</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">03</span>
                    <span class="ob-chain-name">Design</span>
                    <span class="ob-chain-sub">Perancangan hunian terstandarisasi</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">04</span>
                    <span class="ob-chain-name">Material Procurement</span>
                    <span class="ob-chain-sub">Pengadaan material terintegrasi grup</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">05</span>
                    <span class="ob-chain-name">Construction</span>
                    <span class="ob-chain-sub">Konstruksi cepat berstandar Jepang</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">06</span>
                    <span class="ob-chain-name">Sales</span>
                    <span class="ob-chain-sub">Penjualan transparan berbasis standar</span>
                </li>
                <li class="ob-chain-step">
                    <span class="ob-chain-num">07</span>
                    <span class="ob-chain-name">After Sales Service</span>
                    <span class="ob-chain-sub">Pemeliharaan purna jual berkelanjutan</span>
                </li>
            </ol>

            <div class="ob-pillars-grid">
                <article class="ob-pillar-card">
                    <span class="ob-pillar-meta">Pilar 01 &middot; Perancangan</span>
                    <h3 class="ob-pillar-title">Design</h3>
                    <ul class="ob-pillar-list">
                        <li>Bangunan telah terstandarisasi sehingga tidak memerlukan keterampilan khusus dalam perancangan (<em>Design</em>).</li>
                        <li>Proses merancang berjalan dalam waktu yang lebih singkat sekaligus menekan biaya perancangan.</li>
                    </ul>
                </article>

                <article class="ob-pillar-card">
                    <span class="ob-pillar-meta">Pilar 02 &middot; Konstruksi</span>
                    <h3 class="ob-pillar-title">Construction</h3>
                    <ul class="ob-pillar-list">
                        <li>Proses konstruksi telah terstandarisasi sehingga tidak bergantung pada keterampilan khusus tenaga rekayasa lapangan.</li>
                        <li>Memungkinkan pembangunan berlangsung dalam waktu lebih singkat dengan biaya yang lebih hemat dan terkendali.</li>
                    </ul>
                </article>

                <article class="ob-pillar-card">
                    <span class="ob-pillar-meta">Pilar 03 &middot; Penjualan</span>
                    <h3 class="ob-pillar-title">Sales</h3>
                    <ul class="ob-pillar-list">
                        <li>Produk hunian telah terstandarisasi sehingga tim pemasaran dapat menjelaskan secara jelas kelebihan dan keunggulan teknis setiap unit kepada pelanggan.</li>
                    </ul>
                </article>

                <article class="ob-pillar-card">
                    <span class="ob-pillar-meta">Pilar 04 &middot; Purna Jual</span>
                    <h3 class="ob-pillar-title">After Sales Service</h3>
                    <ul class="ob-pillar-list">
                        <li>Produk yang telah terjual sudah terstandarisasi sehingga tidak memerlukan keterampilan khusus dalam menangani layanan purna jual dan mampu mengurangi beban biaya pemeliharaan.</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <!-- ============================================================
         2. TEKNOLOGI & MANUFAKTUR IG SCB (PDF p.10-12)
         ============================================================ -->
    <section class="ob-sec ob-sec--dark" id="teknologi-ig-scb" aria-labelledby="ob-tech-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="ob-head">
                <p class="ob-kicker ob-kicker--dark">Teknologi &amp; Manufaktur Material</p>
                <h2 id="ob-tech-title" class="ob-title ob-title--dark">
                    IG SCB (Iida Group Strong Concrete Block)
                </h2>
                <p class="ob-lede ob-lede--dark">
                    Bahan bangunan khusus yang dirancang dengan teknologi tersendiri dan telah melalui uji coba tahan gempa hingga magnitudo &gt; 8,0. Produksi di Indonesia (pabrik Gunung Putri, Kab. Bogor) diawasi secara ketat oleh tenaga ahli dari Jepang guna menjaga mutu blok sesuai standar di Jepang.
                </p>
            </header>

            <div class="ob-tech-layout">
                <div>
                    <ul class="ob-tech-points" aria-label="Tiga keunggulan utama IG SCB">
                        <li class="ob-tech-point">
                            <div class="ob-tech-point-head">
                                <span class="ob-tech-idx">01</span>
                                <h3>CB dengan Interlocking Sistem</h3>
                            </div>
                            <p>Mempermudah proses instalasi blok beton secara presisi sekaligus meningkatkan ketahanan dinding struktur terhadap gaya gempa.</p>
                        </li>
                        <li class="ob-tech-point">
                            <div class="ob-tech-point-head">
                                <span class="ob-tech-idx">02</span>
                                <h3>Pengembangan Balok Khusus</h3>
                            </div>
                            <p>Meningkatkan kekuatan struktural dan ketahanan terhadap gempa, serta menjaga kualitas bangunan tetap seragam karena proses konstruksi yang terstandar.</p>
                        </li>
                        <li class="ob-tech-point">
                            <div class="ob-tech-point-head">
                                <span class="ob-tech-idx">03</span>
                                <h3>Penggunaan Material Baja</h3>
                            </div>
                            <p>Meringankan beban struktural dan meningkatkan ketahanan gempa sekaligus mempermudah pemasangan guna mempertahankan mutu bangunan.</p>
                        </li>
                    </ul>

                    <div class="ob-compare-box">
                        <p class="ob-compare-title">Perbandingan dengan CB Konvensional / Lokal</p>
                        <ul class="ob-compare-list">
                            <li><strong>Rentan terhadap goncangan:</strong> Apabila tidak diperkuat oleh tulangan tambahan, CB konvensional mudah rusak akibat goncangan sehingga kurang sesuai untuk wilayah rawan gempa atau angin topan.</li>
                            <li><strong>Proses konstruksi yang rumit:</strong> Mempertahankan konsistensi mutu bangunan sulit dilakukan karena instalasi CB konvensional menuntut keterampilan khusus lapangan.</li>
                        </ul>
                    </div>
                </div>

                <aside class="ob-specs-card" aria-label="Spesifikasi teknis dan sertifikasi IG SCB">
                    <h3 class="ob-specs-heading">Spesifikasi Teknis IG SCB</h3>
                    <dl class="ob-spec-dl">
                        <div class="ob-spec-row">
                            <dt>Jenis Produk</dt>
                            <dd>CB 15 cm (rumah 2 lantai) &middot; CB 10 cm (rumah 1 lantai)</dd>
                        </div>
                        <div class="ob-spec-row">
                            <dt>Berat</dt>
                            <dd>&plusmn;12,5 Kg / CB</dd>
                        </div>
                        <div class="ob-spec-row">
                            <dt>Ukuran (Dimensi)</dt>
                            <dd>390 &times; 190 &times; 150 mm</dd>
                        </div>
                        <div class="ob-spec-row">
                            <dt>Compressive Strength (Kuat Tekan)</dt>
                            <dd>8 N/mm&sup2;</dd>
                        </div>
                        <div class="ob-spec-row">
                            <dt>Material Komposisi</dt>
                            <dd>Semen, Pasir, &amp; Ash Stone</dd>
                        </div>
                        <div class="ob-spec-row">
                            <dt>Uji Ketahanan Gempa</dt>
                            <dd>Teruji hingga Magnitudo &gt; 8,0</dd>
                        </div>
                    </dl>

                    <div class="ob-cert-panel">
                        <p class="ob-cert-kicker">Sertifikasi &amp; Paten Resmi di Indonesia</p>
                        <p class="ob-cert-num">Nomor Paten: IDP000069171 &amp; SNI</p>
                        <p class="ob-cert-sub">
                            Sertifikat Paten Kementerian Hukum dan Hak Asasi Manusia RI tertanggal 17 Juni 2020 (penerimaan 01 Juli 2015) atas nama IIDA GROUP HOLDINGS CO., LTD., serta telah tersertifikasi Standar Nasional Indonesia (SNI).
                        </p>
                    </div>

                    <div class="ob-tech-actions">
                        <a href="<?php echo esc_url( home_url( '/product-osaka-strong-cb/' ) ); ?>" class="ob-btn ob-btn--light-solid">
                            Lihat Halaman Produk IG Strong CB
                        </a>
                        <a href="<?php echo esc_url( home_url( '/product-construction-material/' ) ); ?>" class="ob-btn ob-btn--light-ghost">
                            Katalog Material Konstruksi
                        </a>
                    </div>
                </aside>
            </div>

            <!-- 3 Visual Documentation Figures from PDF p.10-12 -->
            <div class="ob-visual-grid">
                <figure class="ob-figure-card">
                    <div>
                        <div class="ob-figure-frame">
                            <img src="<?php echo esc_url( $pdf_img . 'ig-scb-earthquake-diagram.webp' ); ?>"
                                 alt="Diagram simulasi dan pengujian ketahanan gempa IG Strong Concrete Block hingga magnitudo lebih dari 8,0"
                                 width="879" height="567" loading="lazy" decoding="async">
                        </div>
                        <figcaption class="ob-figure-cap">
                            Uji Ketahanan Gempa hingga Magnitudo &gt; 8,0
                            <span class="ob-figure-meta">Pengujian struktur blok beton pracetak dengan sistem interlocking dan perkuatan baja.</span>
                        </figcaption>
                    </div>
                    <button type="button"
                            class="ob-zoom-btn"
                            data-lightbox-src="<?php echo esc_attr( esc_url( $pdf_img . 'ig-scb-earthquake-diagram.webp' ) ); ?>"
                            data-lightbox-title="Uji Ketahanan Gempa IG SCB (> 8,0 Magnitudo)"
                            data-lightbox-caption="Simulasi dan uji konstruksi IG Strong Concrete Block hingga magnitudo lebih dari 8,0.">
                        Perbesar Diagram Uji Gempa
                    </button>
                </figure>

                <figure class="ob-figure-card">
                    <div>
                        <div class="ob-figure-frame ob-figure-frame--contain">
                            <img src="<?php echo esc_url( $pdf_img . 'ig-scb-mockup-150.webp' ); ?>"
                                 alt="Mockup instalasi struktur CB ukuran 15 cm dengan komponen balok khusus dan baja tulangan"
                                 width="647" height="414" loading="lazy" decoding="async">
                        </div>
                        <figcaption class="ob-figure-cap">
                            Mockup Instalasi CB 15 cm (390 &times; 190 &times; 150 mm)
                            <span class="ob-figure-meta">Konstruksi dinding interlocking dengan pengisian kolom beton dan tulangan baja.</span>
                        </figcaption>
                    </div>
                    <button type="button"
                            class="ob-zoom-btn"
                            data-lightbox-src="<?php echo esc_attr( esc_url( $pdf_img . 'ig-scb-mockup-150.webp' ) ); ?>"
                            data-lightbox-title="Mockup Struktur IG SCB Ukuran 15 cm"
                            data-lightbox-caption="Dimensi 390 x 190 x 150 mm, berat +-12,5 Kg/CB, kuat tekan 8 N/mm2.">
                        Perbesar Mockup Struktur CB 15 cm
                    </button>
                </figure>

                <figure class="ob-figure-card">
                    <div>
                        <div class="ob-figure-frame ob-figure-frame--contain">
                            <img src="<?php echo esc_url( $pdf_img . 'ig-scb-patent-idp000069171.webp' ); ?>"
                                 alt="Dokumen Sertifikat Paten Nomor IDP000069171 tanggal 17 Juni 2020 dan tanda sertifikasi SNI untuk IG SCB"
                                 width="934" height="645" loading="lazy" decoding="async">
                        </div>
                        <figcaption class="ob-figure-cap">
                            Sertifikat Paten IDP000069171 &amp; SNI
                            <span class="ob-figure-meta">Diberikan 17 Juni 2020 oleh Kemenkumham RI untuk blok konstruksi dan struktur dinding.</span>
                        </figcaption>
                    </div>
                    <button type="button"
                            class="ob-zoom-btn"
                            data-lightbox-src="<?php echo esc_attr( esc_url( $pdf_img . 'ig-scb-patent-idp000069171.webp' ) ); ?>"
                            data-lightbox-title="Sertifikat Paten IDP000069171 &amp; SNI"
                            data-lightbox-caption="Paten Indonesia IDP000069171 tertanggal 17 Juni 2020 atas nama Iida Group Holdings Co., Ltd. beserta sertifikasi SNI.">
                        Perbesar Sertifikat Paten &amp; SNI
                    </button>
                </figure>
            </div>
        </div>
    </section>

    <!-- ============================================================
         3. HOUSING PERFORMANCE INDICATION SYSTEM (HPIS, PDF p.14-15)
         ============================================================ -->
    <section class="ob-sec ob-sec--sunken" id="standar-hpis" aria-labelledby="ob-hpis-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="ob-head">
                <p class="ob-kicker">Kualitas &amp; Standarisasi Rumah Pemerintah Jepang</p>
                <h2 id="ob-hpis-title" class="ob-title">
                    Housing Performance Indication System (HPIS)
                </h2>
                <p class="ob-lede">
                    Berdasarkan sistem penilaian performa rumah yang ditetapkan oleh Pemerintah Jepang, seluruh hunian yang dibangun oleh grup kami meraih peringkat tertinggi (<strong>Highest Grade</strong>) beserta pencapaian <strong>Insulation Grade 4</strong> dan <strong>Primary Energy Consumption Grade 5</strong>.
                </p>
            </header>

            <div class="ob-hpis-layout">
                <div>
                    <div class="ob-grade-card">
                        <div class="ob-grade-banner">
                            <div>
                                <div class="ob-grade-banner-title">Peringkat Tertinggi (Highest Grade)</div>
                                <div class="ob-grade-banner-sub">Standar Penilaian Rumah Pemerintah Jepang (berlaku per 1 April 2022)</div>
                            </div>
                        </div>

                        <div class="ob-grade-table-wrap">
                            <table class="ob-grade-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Bidang Penilaian</th>
                                        <th scope="col">Item Indikator</th>
                                        <th scope="col">Capaian Grup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Structure resistance</td>
                                        <td>Ketahanan gempa &amp; stabilitas struktur (angin Grade 2)</td>
                                        <td><span class="ob-grade-pill ob-grade-pill--gold">Grade 3 (Highest)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Less prone to degradation</td>
                                        <td>Pencegahan degradasi material struktur</td>
                                        <td><span class="ob-grade-pill ob-grade-pill--gold">Grade 3 (Highest)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Easy to maintain and renew</td>
                                        <td>Kemudahan pemeliharaan &amp; pembaharuan</td>
                                        <td><span class="ob-grade-pill ob-grade-pill--gold">Grade 3 (Highest)</span></td>
                                    </tr>
                                    <tr>
                                        <td>Insulation environment</td>
                                        <td>Performa insulasi termal bangunan</td>
                                        <td><span class="ob-grade-pill">Insulation Grade 4</span></td>
                                    </tr>
                                    <tr>
                                        <td>Energy consumption</td>
                                        <td>Efisiensi konsumsi energi primer</td>
                                        <td><span class="ob-grade-pill">Energy Grade 5</span></td>
                                    </tr>
                                    <tr>
                                        <td>Air environment</td>
                                        <td>Pengendalian kadar formaldehida udara ruang</td>
                                        <td><span class="ob-grade-pill ob-grade-pill--gold">Grade 3 (Highest)</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="ob-hpis-footnote">
                            Mencakup rumah tapak baru dari Hajime Construction, Iida Sangyo, Touei Housing, Tact Home, Arnest One, dan ID Home (tidak termasuk konstruksi kontrak eksternal, properti di luar Jepang, serta transaksi perantara).
                        </p>
                    </div>

                    <div class="ob-inspect-box">
                        <h3 class="ob-inspect-heading">5 Kali Tahap Inspeksi Ketat</h3>
                        <ol class="ob-inspect-list">
                            <li class="ob-inspect-item"><span class="ob-inspect-num">01</span><span>Saat proses Design</span></li>
                            <li class="ob-inspect-item"><span class="ob-inspect-num">02</span><span>Saat Pembangunan Pondasi</span></li>
                            <li class="ob-inspect-item"><span class="ob-inspect-num">03</span><span>Saat Proses Kerangka Selesai</span></li>
                            <li class="ob-inspect-item"><span class="ob-inspect-num">04</span><span>Sebelum Finishing Interior</span></li>
                            <li class="ob-inspect-item"><span class="ob-inspect-num">05</span><span>Saat Finishing Akhir</span></li>
                        </ol>
                    </div>
                </div>

                <div class="ob-factors-panel">
                    <h3 class="ob-factors-title">10 Faktor Penilaian HPIS (4 Faktor Wajib)</h3>
                    <ol class="ob-factors-list">
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">01</span><span>Stabilitas struktural bangunan</span></div>
                            <span class="ob-badge-wajib">Wajib</span>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">02</span><span>Keamanan jika terjadi kebakaran</span></div>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">03</span><span>Mengurangi kerusakan</span></div>
                            <span class="ob-badge-wajib">Wajib</span>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">04</span><span>Pemeliharaan &amp; pembaharuan bangunan</span></div>
                            <span class="ob-badge-wajib">Wajib</span>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">05</span><span>Thermal Environment (Insulation Grade 4 &amp; Primary Energy Consumption Grade 5)</span></div>
                            <span class="ob-badge-wajib">Wajib</span>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">06</span><span>Lingkungan udara (ventilasi)</span></div>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">07</span><span>Pencahayaan &amp; visualisasi</span></div>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">08</span><span>Lingkungan suara</span></div>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">09</span><span>Pertimbangan untuk lansia</span></div>
                        </li>
                        <li>
                            <div class="ob-factor-main"><span class="ob-factor-no">10</span><span>Keamanan</span></div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         4. BUSINESS LAIN / DIVERSIFIKASI LINI BISNIS (PDF p.23-24)
         ============================================================ -->
    <section class="ob-sec ob-sec--light" id="business-lain" aria-labelledby="ob-other-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <header class="ob-head">
                <p class="ob-kicker">Diversifikasi Lini Bisnis</p>
                <h2 id="ob-other-title" class="ob-title">
                    Business Lain Iida Group Holdings
                </h2>
                <p class="ob-lede">
                    Selain bisnis utama perumahan, grup menjalankan layanan konstruksi kontrak, pengadaan material terintegrasi, lapangan golf, resor tepi laut, serta layanan pembiayaan dan asuransi perumahan.
                </p>
            </header>

            <!-- Contract Construction & Material Procurement -->
            <div class="ob-b2b-grid">
                <article class="ob-b2b-band">
                    <p class="ob-b2b-tag">Konstruksi Kontrak</p>
                    <h3>Contract Construction</h3>
                    <p>
                        Layanan konstruksi kontrak untuk bangunan residensial maupun komersial yang menerapkan standar pengendalian mutu, efisiensi waktu pengerjaan, serta dukungan jaringan rekayasa teknis grup.
                    </p>
                </article>

                <article class="ob-b2b-band">
                    <p class="ob-b2b-tag">Rantai Pasok Terintegrasi</p>
                    <h3>Material Procurement Business</h3>
                    <p>
                        Sistem pengadaan material konstruksi terintegrasi untuk menjaga stabilitas pasokan bahan bangunan berkualitas tinggi dan menghasilkan sinergi efisiensi biaya bagi anak usaha maupun mitra proyek.
                    </p>
                </article>
            </div>

            <!-- Eastwood Country Club & Seawood Hotel Okinawa -->
            <div class="ob-resort-grid">
                <article class="ob-div-card">
                    <div class="ob-div-photos">
                        <img src="<?php echo esc_url( $pdf_img . 'eastwood-golf-club.webp' ); ?>"
                             alt="Lapangan Golf Eastwood Country Club seluas 107 Ha milik Iida Group Holdings"
                             width="874" height="551" loading="lazy" decoding="async">
                    </div>
                    <div class="ob-div-body">
                        <p class="ob-b2b-tag">Golf Field Business</p>
                        <h3>Eastwood Country Club</h3>
                        <p>
                            Pengelolaan lapangan golf dan fasilitas clubhouse terpadu yang memadukan lanskap alam dan layanan hospitality berstandar Jepang.
                        </p>
                        <div class="ob-mini-facts">
                            <span><strong>Luas Area:</strong> 107 Ha</span>
                            <span><strong>Lini:</strong> Lapangan Golf &amp; Clubhouse</span>
                        </div>
                    </div>
                </article>

                <article class="ob-div-card">
                    <div class="ob-div-photos ob-div-photos--split">
                        <img src="<?php echo esc_url( $pdf_img . 'seawood-hotel-aerial.webp' ); ?>"
                             alt="Pemandangan udara kawasan Seawood Hotel Okinawa seluas 13 Ha tepi laut"
                             width="572" height="491" loading="lazy" decoding="async">
                        <img src="<?php echo esc_url( $pdf_img . 'seawood-hotel-villa.webp' ); ?>"
                             alt="Vila kolam renang pribadi di Seawood Hotel Okinawa"
                             width="571" height="451" loading="lazy" decoding="async">
                    </div>
                    <div class="ob-div-body">
                        <p class="ob-b2b-tag">Resort Business</p>
                        <h3>Seawood Hotel, Okinawa</h3>
                        <p>
                            Resor tepi laut di Okinawa seluas 13 Ha dengan total keseluruhan 169 kamar, lengkap dengan fasilitas Restaurant, Gym, dan layanan pendukung lainnya.
                        </p>
                        <div class="ob-mini-facts">
                            <span><strong>Luas Resor:</strong> 13 Ha</span>
                            <span><strong>Total Kamar:</strong> 169 Kamar</span>
                            <span><strong>Private Pool:</strong> 102 Kamar</span>
                            <span><strong>Private Jacuzzi:</strong> 5 Kamar</span>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Family Life Service (Finance & Insurance Business, PDF p.24) -->
            <article class="ob-finance-panel" aria-labelledby="ob-fls-title">
                <div class="ob-finance-copy">
                    <p class="ob-kicker">Finance &amp; Insurance Business</p>
                    <h3 id="ob-fls-title">Family Life Service Co., Ltd.</h3>
                    <p>
                        Perusahaan layanan keuangan dalam grup yang bergerak khusus menangani pembiayaan pembelian rumah dan kredit kepemilikan hunian di Jepang dengan proses pengajuan cepat serta tanpa memerlukan penjamin.
                    </p>
                    <a href="https://www.familyls.jp/"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="ob-btn ob-btn--primary">
                        Kunjungi Situs Resmi Family Life Service (familyls.jp)
                    </a>
                </div>

                <ul class="ob-finance-facts" aria-label="Capaian dan keunggulan pembiayaan Family Life Service">
                    <li>
                        <span class="ob-finance-val">&gt;75.000 Kali</span>
                        <span class="ob-finance-lbl">Hasil transaksi peminjaman terealisasi</span>
                    </li>
                    <li>
                        <span class="ob-finance-val">&gt;10 Product</span>
                        <span class="ob-finance-lbl">Pilihan skema produk kredit &amp; asuransi</span>
                    </li>
                    <li>
                        <span class="ob-finance-val">Max 35 Tahun</span>
                        <span class="ob-finance-lbl">Suku bunga tetap tidak berubah &amp; tanpa penjamin</span>
                    </li>
                    <li>
                        <span class="ob-finance-val">Max 80 Juta Yen</span>
                        <span class="ob-finance-lbl">&plusmn; Rp 8,5 Miliar dengan proses cepat dan mudah</span>
                    </li>
                </ul>
            </article>
        </div>
    </section>

    <!-- ============================================================
         5. CLOSING CTA
         ============================================================ -->
    <section class="ob-cta" aria-labelledby="ob-cta-title">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt ob-cta-inner">
            <div>
                <h2 id="ob-cta-title" class="ob-cta-title">
                    Jelajahi Proyek Hunian &amp; Konsultasikan Kebutuhan Material
                </h2>
                <p class="ob-cta-desc">
                    Temukan proyek perumahan PT. Perumnas Iida Group di Indonesia maupun kondominium grup di Jepang, atau hubungi tim kami di Bekasi dan pabrik Gunung Putri, Kab. Bogor.
                </p>
            </div>
            <div class="ob-cta-actions">
                <a href="<?php echo esc_url( home_url( '/development/' ) ); ?>" class="ob-btn ob-btn--light-solid">
                    Lihat Proyek Perumahan
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ob-btn ob-btn--light-ghost">
                    Hubungi Tim Operasional
                </a>
            </div>
        </div>
    </section>

</main>

<!-- Native Lightbox Dialog for Technical Documents -->
<dialog id="ob-doc-dialog" class="ob-dialog" aria-labelledby="ob-dialog-title">
    <div class="ob-dialog-head">
        <h2 id="ob-dialog-title" class="ob-dialog-title">Dokumen Teknis IG SCB</h2>
        <button type="button" id="ob-dialog-close" class="ob-dialog-close" aria-label="Tutup pratinjau gambar">
            Tutup
        </button>
    </div>
    <div class="ob-dialog-body">
        <img id="ob-dialog-img" alt="">
        <p id="ob-dialog-cap" class="ob-dialog-cap"></p>
    </div>
</dialog>

<script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
(function () {
    'use strict';

    var dialog   = document.getElementById('ob-doc-dialog');
    var closeBtn = document.getElementById('ob-dialog-close');
    var imgEl    = document.getElementById('ob-dialog-img');
    var titleEl  = document.getElementById('ob-dialog-title');
    var capEl    = document.getElementById('ob-dialog-cap');
    var triggers = document.querySelectorAll('[data-lightbox-src]');
    var lastTrigger = null;

    if (!dialog || !imgEl || !titleEl || !capEl) {
        return;
    }

    function openLightbox(trigger) {
        var src     = trigger.getAttribute('data-lightbox-src') || '';
        var title   = trigger.getAttribute('data-lightbox-title') || 'Dokumen Teknis IG SCB';
        var caption = trigger.getAttribute('data-lightbox-caption') || '';
        if (!src) { return; }

        lastTrigger = trigger;
        imgEl.setAttribute('src', src);
        imgEl.setAttribute('alt', title);
        titleEl.textContent = title;
        capEl.textContent   = caption;

        if (typeof dialog.showModal === 'function') {
            dialog.showModal();
        } else {
            dialog.setAttribute('open', 'open');
        }
        if (closeBtn) {
            closeBtn.focus();
        }
    }

    function closeLightbox() {
        if (typeof dialog.close === 'function') {
            if (dialog.open) {
                dialog.close();
            }
        } else {
            dialog.removeAttribute('open');
        }
        imgEl.removeAttribute('src');
        if (lastTrigger && typeof lastTrigger.focus === 'function') {
            lastTrigger.focus();
        }
    }

    triggers.forEach(function (btn) {
        btn.addEventListener('click', function () {
            openLightbox(btn);
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeLightbox);
    }

    dialog.addEventListener('click', function (e) {
        if (e.target === dialog) {
            closeLightbox();
        }
    });

    dialog.addEventListener('close', function () {
        imgEl.removeAttribute('src');
        if (lastTrigger && typeof lastTrigger.focus === 'function') {
            lastTrigger.focus();
        }
    });
})();
</script>

<?php
get_footer();
?>
