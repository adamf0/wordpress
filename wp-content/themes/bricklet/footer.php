    <!-- ============================================================
         SITE FOOTER
         Contact data sourced from the corporate profile (Nov 2023)
         and operational office records.
         ============================================================ -->
    <style type="text/css">
        .site-footer {
            background: var(--color-deep-navy);
            color: #cbd5e1;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
        .footer-inner {
            padding-top: 72px;
            padding-bottom: 32px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
        }
        @media (min-width: 768px) {
            .footer-grid { grid-template-columns: 1.5fr 1fr 1.1fr 1.25fr; gap: 32px; }
        }
        .footer-brand img {
            height: 38px;
            width: auto;
            margin-bottom: 20px;
        }
        .footer-brand p {
            font-size: var(--text-sm);
            line-height: 1.65;
            max-width: 36ch;
            color: #cbd5e1;
        }
        .footer-slogan {
            margin-top: 20px;
            padding-left: 14px;
            border-left: 2px solid var(--color-tertiary);
            font-size: var(--text-sm);
            font-style: italic;
            color: #f8fafc;
        }
        .footer-col h3 {
            margin: 0 0 16px;
            font-family: var(--font-body);
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #ffffff;
        }
        .footer-col ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 10px;
        }
        .footer-col a {
            color: #cbd5e1;
            font-size: var(--text-sm);
            text-decoration: none;
            transition: color var(--dur-fast) var(--ease-in-out);
        }
        .footer-col a:hover { color: #ffffff; }
        .footer-col a:focus-visible {
            outline: 2px solid var(--color-action-cyan);
            outline-offset: 2px;
            border-radius: 3px;
        }
        .footer-contact li {
            display: flex;
            gap: 10px;
            font-size: var(--text-sm);
            line-height: 1.55;
            color: #cbd5e1;
        }
        .footer-contact svg {
            flex: 0 0 auto;
            width: 16px;
            height: 16px;
            margin-top: 3px;
            color: var(--color-action-cyan);
        }
        .footer-contact address { font-style: normal; }
        .footer-bottom {
            margin-top: 56px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: var(--text-xs);
            color: #cbd5e1;
        }
        .footer-bottom a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color var(--dur-fast) var(--ease-in-out);
        }
        .footer-bottom a:hover { color: #ffffff; }
    </style>

    <footer class="site-footer">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt footer-inner">
            <div class="footer-grid">

                <!-- Brand -->
                <div class="footer-brand">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/PT_Perumnas_Iida_Group_Logo3_white_text.png' ); ?>"
                         alt="PT Perumnas Iida Group"
                         width="1128" height="190"
                         decoding="async">
                    <p>
                        Joint venture antara Iida Sangyo Co., Ltd. (93%, anak perusahaan Iida Group Holdings Co.,Ltd.)
                        dan PT. Propernas Griya Utama (7%, anak perusahaan Perum Perumnas) di bidang properti perumahan di Indonesia sejak 2017.
                    </p>
                    <p class="footer-slogan">
                        &ldquo;Realizing a society where anyone can own a house&rdquo;
                    </p>
                </div>

                <!-- Company -->
                <div class="footer-col">
                    <h3>Perusahaan</h3>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/overview/' ) ); ?>">Overview</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/company-profile/' ) ); ?>">Company Profile</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/vision-mission/' ) ); ?>">Vision &amp; Mission</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/milestone/' ) ); ?>">Milestone</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about-us/awards/' ) ); ?>">Awards</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/group-company/' ) ); ?>">Group Network</a></li>
                    </ul>
                </div>

                <!-- Business & Updates -->
                <div class="footer-col">
                    <h3>Proyek &amp; Publikasi</h3>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/our-business/' ) ); ?>">Our Business</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/development/' ) ); ?>">Proyek Perumahan</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/product-osaka-strong-cb/' ) ); ?>">IG Strong CB</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/product-construction-material/' ) ); ?>">Material Konstruksi</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/latest-updates/e-newsletter/' ) ); ?>">E-Newsletter &amp; PDF</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/news/?pressReleaseData=1' ) ); ?>">Press Release</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="footer-col">
                    <h3>Kantor Resmi</h3>
                    <ul class="footer-contact">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <address>
                                <strong>Kantor Pusat (Bekasi):</strong><br>
                                Jl. Caringin Raya, RT.010/RW.002,<br>
                                Kec. Rawalumbu, Kota Bekasi, Jawa Barat
                            </address>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75" />
                            </svg>
                            <address>
                                <strong>Pabrik IG SCB (Bogor):</strong><br>
                                Jl. Pancasila I, Cicadas,<br>
                                Gunung Putri, Kab. Bogor, Jawa Barat
                            </address>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <a href="tel:+622186869299">+62 21 8686 9299</a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <a href="mailto:info@perumnas-iidagroup.com">info@perumnas-iidagroup.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> PT. Perumnas Iida Group &middot; Bagian dari Iida Group Holdings Co.,Ltd.</span>
                <span>
                    <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">Berita</a> &middot;
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Hubungi Kami</a>
                </span>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

