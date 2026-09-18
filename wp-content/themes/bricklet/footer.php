    <!-- Footer Shell -->
    <footer class="w-full pt-20 pb-12 bg-deep-navy text-surface-bright border-t border-on-tertiary-fixed-variant">
        <div class="max-w-container-max mx-auto px-margin-desktop-alt">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-20">
                <div class="col-span-1 md:col-span-2">
                    <div class="font-headline-md text-headline-md font-bold text-white mb-6">PT IIDA GROUP</div>
                    <p class="text-on-secondary-container max-w-sm mb-8 leading-relaxed">
                        A global leader in housing and infrastructure development, bringing Japanese excellence to the heart of Indonesia.
                    </p>
                </div>
                <div>
                    <h5 class="font-label-bold text-white mb-6 uppercase tracking-widest">Navigation</h5>
                    <ul class="space-y-4 font-body-sm text-on-secondary-container">
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="<?php echo esc_url(home_url('/company-profile/')); ?>">About Us</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="<?php echo esc_url(home_url('/our-business/')); ?>">Our Business</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="<?php echo esc_url(home_url('/group-company/')); ?>">Group Network</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="<?php echo esc_url(home_url('/our-business/')); ?>">Sustainability</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-label-bold text-white mb-6 uppercase tracking-widest">Legal</h5>
                    <ul class="space-y-4 font-body-sm text-on-secondary-container">
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="#">Terms of Service</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="#">Cookie Policy</a></li>
                        <li><a class="hover:text-action-cyan transition-colors duration-200" href="<?php echo esc_url(home_url('/group-company/')); ?>">Global Network</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="font-body-sm text-on-secondary-container">
                    © <?php echo date('Y'); ?> PT Iida Group Holdings. All Rights Reserved.
                </div>
                <div class="flex gap-6">
                    <a class="text-on-secondary-container hover:text-white transition-colors" href="#"><span class="material-symbols-outlined">public</span></a>
                    <a class="text-on-secondary-container hover:text-white transition-colors" href="mailto:sales@ptighd.co.id"><span class="material-symbols-outlined">mail</span></a>
                    <a class="text-on-secondary-container hover:text-white transition-colors" href="tel:+622186869299"><span class="material-symbols-outlined">phone</span></a>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    <script type="text/javascript" nonce="<?php echo bricklet_get_nonce(); ?>">
        // Progress Bar & Header Scroll Behavior (SSEK-inspired)
        let isTicking = false;
        function updateHeaderOnScroll() {
            const winScroll = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;
            const scrollableHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = scrollableHeight > 0 ? (winScroll / scrollableHeight) * 100 : 0;

            const progressBar = document.getElementById("progressBar");
            if (progressBar && scrollableHeight > 0) {
                progressBar.style.width = scrollPercent + "%";
            }

            const header = document.querySelector('header');
            if (header) {
                // Trigger when scroll reaches 5% of document or winScroll > 40px
                if (scrollPercent >= 5 || winScroll > 40) {
                    header.classList.add('is-scrolled');
                    if (progressBar) progressBar.classList.add('is-scrolled');
                } else {
                    header.classList.remove('is-scrolled');
                    if (progressBar) progressBar.classList.remove('is-scrolled');
                }
            }
            isTicking = false;
        }

        window.addEventListener('scroll', function() {
            if (!isTicking) {
                window.requestAnimationFrame(updateHeaderOnScroll);
                isTicking = true;
            }
        }, { passive: true });

        // Run immediately in case page loads already scrolled
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', updateHeaderOnScroll);
        } else {
            updateHeaderOnScroll();
        }

        // Intersection Observer for scroll reveal effect
        document.addEventListener("DOMContentLoaded", function() {
            const reveals = document.querySelectorAll(".reveal-on-scroll");
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("active");
                        }
                    });
                }, { threshold: 0.1 });
                reveals.forEach(el => observer.observe(el));
            } else {
                reveals.forEach(el => el.classList.add("active"));
            }
        });
    </script>
</body>
</html>
