<?php
/**
 * Template Name: Vision & Mission
 * Description: Vision & Mission page matching exact content from ighd.co.id with premium professional UI/UX layout.
 */

get_header();
?>

<style>
/* ==========================================================================
   Vision & Mission Professional Corporate Layout (PT Iida Group Holdings)
   ========================================================================== */

.vm-page-wrapper {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    color: #1e293b;
    background-color: #ffffff;
    width: 100%;
    overflow-x: hidden;
}

/* --------------------------------------------------------------------------
   1. HERO BANNER
   -------------------------------------------------------------------------- */
.vm-hero-banner {
    position: relative;
    width: 100%;
    min-height: 340px;
    display: flex;
    align-items: center;
    background-color: #0a1f2c;
    overflow: hidden;
}
@media (min-width: 768px) {
    .vm-hero-banner {
        min-height: 400px;
    }
}
.vm-hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 35%;
    z-index: 1;
}
.vm-hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(7, 23, 34, 0.88) 0%, rgba(10, 31, 44, 0.70) 50%, rgba(7, 23, 34, 0.60) 100%);
    z-index: 2;
}
.vm-hero-inner {
    position: relative;
    z-index: 3;
    max-width: 1280px;
    width: 100%;
    margin: 0 auto;
    padding: 3rem 1.5rem;
}
@media (min-width: 1024px) {
    .vm-hero-inner {
        padding: 4.5rem 3rem;
    }
}
.vm-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0.85rem;
}
.vm-hero-tag-bar {
    width: 3px;
    height: 18px;
    background-color: #03c5f0;
    border-radius: 2px;
}
.vm-hero-tag-text {
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}
.vm-hero-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    font-weight: 800;
    line-height: 1.15;
    color: #ffffff;
    letter-spacing: -0.02em;
    margin: 0;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

/* --------------------------------------------------------------------------
   2. CARDS SECTION WRAPPER & GRID
   -------------------------------------------------------------------------- */
.vm-content-section {
    padding: 4rem 1.5rem;
    background-color: #ffffff;
}
@media (min-width: 1024px) {
    .vm-content-section {
        padding: 5.5rem 3rem;
    }
}
.vm-container {
    max-width: 1240px;
    margin: 0 auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 4rem;
}
@media (min-width: 1024px) {
    .vm-container {
        gap: 5.5rem;
    }
}

/* Master Split Card */
.vm-split-card {
    display: grid;
    grid-template-columns: 1fr;
    border-radius: 16px;
    border: 1px solid #e2e8f0;
    background-color: #ffffff;
    overflow: hidden;
    box-shadow: 0 12px 36px -8px rgba(15, 23, 42, 0.08), 0 4px 12px rgba(15, 23, 42, 0.03);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
@media (min-width: 900px) {
    .vm-split-card {
        grid-template-columns: 1fr 1fr;
        align-items: stretch;
    }
}
.vm-split-card:hover {
    box-shadow: 0 20px 48px -10px rgba(15, 23, 42, 0.12), 0 6px 16px rgba(15, 23, 42, 0.04);
}

/* Visual Column with Overlay Title */
.vm-visual-col {
    position: relative;
    width: 100%;
    min-height: 280px;
    background-color: #0f172a;
    overflow: hidden;
}
@media (min-width: 900px) {
    .vm-visual-col {
        min-height: 520px;
    }
}
.vm-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}
.vm-split-card:hover .vm-card-img {
    transform: scale(1.04);
}
.vm-visual-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 2rem;
    background: linear-gradient(180deg, rgba(10, 31, 44, 0.45) 0%, rgba(10, 31, 44, 0.65) 100%);
    backdrop-filter: blur(1.5px);
    z-index: 2;
}
.vm-overlay-heading {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(2rem, 3.5vw, 2.75rem);
    font-weight: 800;
    color: #ffffff;
    letter-spacing: -0.01em;
    margin: 0;
    line-height: 1.2;
    text-shadow: 0 4px 16px rgba(0, 0, 0, 0.6);
}

/* Content Columns */
.vm-text-col {
    padding: 2.25rem 1.75rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
@media (min-width: 640px) {
    .vm-text-col {
        padding: 3rem 2.5rem;
    }
}
@media (min-width: 1024px) {
    .vm-text-col {
        padding: 3.5rem 3.25rem;
    }
}

/* Vision Specific Styling: Pale Blue Card */
.vm-vision-bg {
    background-color: #f0f6ff;
}
.vm-vision-list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 1.1rem;
}
@media (min-width: 1024px) {
    .vm-vision-list {
        gap: 1.25rem;
    }
}
.vm-vision-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}
.vm-chevron-icon {
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #006491;
    font-size: 1.25rem;
    font-weight: 800;
    line-height: 1;
    margin-top: 2px;
    user-select: none;
}
.vm-vision-text {
    margin: 0;
    font-size: 0.9375rem;
    line-height: 1.6;
    color: #334155;
    font-weight: 450;
}
@media (min-width: 1024px) {
    .vm-vision-text {
        font-size: 0.975rem;
    }
}

/* Mission Specific Styling: Clean White Editorial Card */
.vm-mission-bg {
    background-color: #ffffff;
}
.vm-mission-text-wrap {
    position: relative;
    max-width: 520px;
    margin: 0 auto;
}
.vm-mission-quote-mark {
    font-family: Georgia, serif;
    font-size: 4.5rem;
    line-height: 0.8;
    color: rgba(0, 100, 145, 0.15);
    margin-bottom: 0.5rem;
    user-select: none;
}
.vm-mission-text {
    font-family: 'Hanken Grotesk', -apple-system, sans-serif;
    font-size: clamp(1.2rem, 2.2vw, 1.55rem);
    font-weight: 600;
    line-height: 1.65;
    color: #0a1f2c;
    letter-spacing: -0.01em;
    margin: 0;
    border-left: 3px solid #006491;
    padding-left: 1.25rem;
}

/* Mobile Ordering Helper */
@media (max-width: 899px) {
    .vm-order-image {
        order: 1;
    }
    .vm-order-text {
        order: 2;
    }
}
</style>

<main class="vm-page-wrapper">

    <!-- ========================================================================
         1. HERO BANNER (With official PT. Iida Group Holdings building)
         ======================================================================== -->
    <section class="vm-hero-banner">
        <img 
            src="<?php echo esc_url(get_template_directory_uri() . '/images/vision-mission/bg-header-company-data.jpg'); ?>" 
            alt="PT. Iida Group Holdings Building" 
            class="vm-hero-bg" 
            fetchpriority="high"
            decoding="sync"
        />
        <div class="vm-hero-overlay"></div>
        <div class="vm-hero-inner">
            <h1 class="vm-hero-title">Vision &amp; Mission</h1>
        </div>
    </section>

    <!-- ========================================================================
         2. CORE CONTENT: CORPORATE VISION & CORPORATE MISSION
         ======================================================================== -->
    <section class="vm-content-section">
        <div class="vm-container">

            <!-- ----------------------------------------------------------------
                 BLOCK 1: CORPORATE VISION
                 Image left, 8 Vision Statements right
                 ---------------------------------------------------------------- -->
            <div class="vm-split-card">
                
                <!-- Left: Official Vision Image with Overlay Title -->
                <div class="vm-visual-col vm-order-image">
                    <img 
                        src="<?php echo esc_url(get_template_directory_uri() . '/images/vision-mission/Vision.jpg'); ?>" 
                        alt="Corporate Vision" 
                        class="vm-card-img" 
                        loading="lazy"
                    />
                    <div class="vm-visual-overlay">
                        <h2 class="vm-overlay-heading">Corporate Vision</h2>
                    </div>
                </div>

                <!-- Right: The 8 Official Statements from ighd.co.id -->
                <div class="vm-text-col vm-vision-bg vm-order-text">
                    <ul class="vm-vision-list">
                        
                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We aim at the sound development and improvement of build-for-sale housing industry and contribute to expand and develop its housing market.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We work as an excellent group to be the market creator who will always strive to open doors to a new age and build a life-long trust and respect in communities.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We will become a group which can readily foresee how social needs change and quickly respond to such changes with high levels of adaptability.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We pursue business efficiency and creativity of new values by taking advantage of the Group&#8217;s expertise and know-how.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We comply with all laws and regulations, and also pay regards to social justice and norms, developing fair business activities.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We provide professionally active and attractive workplace environment where employees can prove themselves with pride.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We aim to lead cost reductions of all real estate industry to realize the environment where customers are able to obtain high-quality houses at affordable prices.
                            </p>
                        </li>

                        <li class="vm-vision-item">
                            <span class="vm-chevron-icon" aria-hidden="true">&#8250;</span>
                            <p class="vm-vision-text">
                                We strive to gain greater trust as a leading company of the build-for-sale housing industry and endeavors to improve and increase our corporate value.
                            </p>
                        </li>

                    </ul>
                </div>

            </div>

            <!-- ----------------------------------------------------------------
                 BLOCK 2: CORPORATE MISSION
                 Mission Statement left, Official Mission Image right
                 ---------------------------------------------------------------- -->
            <div class="vm-split-card">
                
                <!-- Left: Official Corporate Mission Statement -->
                <div class="vm-text-col vm-mission-bg vm-order-text">
                    <div class="vm-mission-text-wrap">
                        <div class="vm-mission-quote-mark">&ldquo;</div>
                        <p class="vm-mission-text">
                            To contribute in the nurturing of an affluent society through the creation of a living environment where a greater number of people can live truly fulfilling lives.
                        </p>
                    </div>
                </div>

                <!-- Right: Official Mission Image with Overlay Title -->
                <div class="vm-visual-col vm-order-image">
                    <img 
                        src="<?php echo esc_url(get_template_directory_uri() . '/images/vision-mission/Mission.jpg'); ?>" 
                        alt="Corporate Mission" 
                        class="vm-card-img" 
                        loading="lazy"
                    />
                    <div class="vm-visual-overlay">
                        <h2 class="vm-overlay-heading">Corporate Mission</h2>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();
?>
