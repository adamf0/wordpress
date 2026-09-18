<?php
/**
 * Template Name: Osaka Strong CB Detail
 */
get_header();
?>

<main class="">
    <!-- Banner Section -->
    <section class="relative w-screen h-[40vh] flex items-center justify-center bg-zinc-950 overflow-hidden text-white">
        <img class="absolute inset-0 w-full h-full object-cover object-center opacity-45" alt="Osaka Strong CB Banner" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_e39e29fad1d5c71512e7e27847d133e5.webp" fetchpriority="high" decoding="sync" />
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-zinc-950"></div>
        <div class="relative z-10 text-center space-y-4 px-6">
            <span class="text-primary font-bold text-xs uppercase tracking-widest bg-primary/10 px-3 py-1.5 rounded-full">Featured Innovation</span>
            <h1 class="text-3xl md:text-5xl font-extrabold font-lexend tracking-tight text-white">
                Osaka Strong CB
            </h1>
        </div>
    </section>

    <!-- Video Banner Section -->
    <section class="w-full bg-white border-b border-gray-100">
        <div class="w-full px-0 flex justify-center items-center">
            <div class="relative inline-block max-w-full group/video bg-transparent">
                <video
                    id="hero-video"
                    class="w-full h-auto max-h-[85vh] object-contain mx-auto block bg-transparent"
                    autoplay
                    muted
                    loop
                    playsinline
                    preload="auto"
                    disablepictureinpicture
                    controlslist="nodownload nofullscreen noremoteplayback">
                    <source
                        src="<?php echo get_template_directory_uri(); ?>/video/video_banner_our_product.mp4"
                        type="video/mp4">
                </video>
                <!-- Custom sound overlay button -->
                <button id="video-sound-btn" class="absolute bottom-6 right-6 z-20 flex items-center gap-2 px-4 py-2 bg-black/60 hover:bg-black/80 text-white rounded-lg text-sm font-medium transition-all backdrop-blur-sm cursor-pointer shadow-md select-none border border-white/10">
                    <span class="material-symbols-outlined text-[18px]" id="video-sound-icon">volume_off</span>
                    <span id="video-sound-text">Unmute</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <section class="w-full max-w-7xl mx-auto px-6 py-20 lg:px-8 space-y-20">
        
        <!-- Product Information -->
        <section id="product-information" class="space-y-10">
            <div class="border-l-4 border-primary pl-4">
                <h2 class="text-2xl md:text-3xl font-extrabold font-lexend text-deep-navy">
                    Product Information
                </h2>
                <p class="text-gray-500">
                    Innovative precast concrete solutions engineered with Japanese technology.
                </p>
            </div>
            <div class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-zinc-50 border-b border-zinc-200">
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Types</th>
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Thickness</th>
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Weight</th>
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Strength</th>
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Number / sqm</th>
                                <th class="px-6 py-4 text-left font-bold text-deep-navy">Minimum Order</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200">
                            <?php
                            global $wpdb;
                            $table_osaka = $wpdb->prefix . 'osaka_products';
                            $osaka_products = $wpdb->get_results("SELECT * FROM $table_osaka ORDER BY id ASC", ARRAY_A);
                            
                            $concrete_blocks = array();
                            $paving_blocks = array();
                            
                            if (!empty($osaka_products)) {
                                foreach ($osaka_products as $op) {
                                    if (strtolower($op['type_group']) === 'concrete block') {
                                        $concrete_blocks[] = $op;
                                    } else {
                                        $paving_blocks[] = $op;
                                    }
                                }
                            }
                            ?>
                            
                            <?php if (!empty($concrete_blocks)) : ?>
                                <tr>
                                    <td colspan="6" class="bg-primary px-6 py-3 font-bold text-white uppercase tracking-wider text-xs">
                                        Concrete Block
                                    </td>
                                </tr>
                                <?php foreach ($concrete_blocks as $p) : ?>
                                    <tr class="hover:bg-zinc-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col items-start gap-2">
                                                <img src="<?php echo esc_url($p['img']); ?>" class="h-24 w-24 rounded-xl object-[inherit] border border-zinc-200" alt="<?php echo esc_attr($p['name']); ?>">
                                                <span class="font-bold text-deep-navy text-xs"><?php echo esc_html($p['name']); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-800"><?php echo esc_html($p['thickness']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['weight']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['strength']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['num_per_sqm']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['min_order']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if (!empty($paving_blocks)) : ?>
                                <tr>
                                    <td colspan="6" class="bg-primary px-6 py-3 font-bold text-white uppercase tracking-wider text-xs">
                                        Paving Block
                                    </td>
                                </tr>
                                <?php foreach ($paving_blocks as $p) : ?>
                                    <tr class="hover:bg-zinc-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex flex-col items-start gap-2">
                                                <img src="<?php echo esc_url($p['img']); ?>" class="h-24 w-24 rounded-xl object-[inherit] border border-zinc-200" alt="<?php echo esc_attr($p['name']); ?>">
                                                <span class="font-bold text-deep-navy text-xs"><?php echo esc_html($p['name']); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-800"><?php echo esc_html($p['thickness']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['weight']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['strength']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['num_per_sqm']); ?></td>
                                        <td class="px-6 py-4 text-gray-600"><?php echo esc_html($p['min_order']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Factory Documentation -->
        <section class="space-y-8" id="factory-documentation">
            <div class="border-l-4 border-primary pl-4 space-y-2">
                <h2 class="text-2xl md:text-3xl font-extrabold font-lexend text-deep-navy">Factory Documentation</h2>
                <p class="text-gray-500">Visual highlights of our state-of-the-art concrete manufacturing plants and raw material logistics.</p>
            </div>
            <div class="relative group">
                <!-- Scroller Container -->
                <div id="doc-scroller" class="flex overflow-x-auto gap-4 scroll-smooth snap-x snap-mandatory no-scrollbar py-4 cursor-grab active:cursor-grabbing select-none">
                    <?php
                    $docs = array(
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-2.jpg', 'Factory Warehouse & Logistics'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-3.jpg', 'Raw Materials Processing Station'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-4.jpg', 'Automated Production Conveyor'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-5.jpg', 'Main Concrete Batching Plant'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/%E5%8E%9F%E6%9D%90%E6%96%99%E3%83%9B%E3%83%83%E3%83%91%E3%83%BC%EF%BC%86%E3%83%9B%E3%82%A4%E3%83%BC%E3%83%AB%E3%83%AD%E3%83%BC%E3%83%80%E3%83%BC.jpg', 'Raw Material Hopper & Loader'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/08/%E8%A3%BD%E9%80%A0%E6%A3%9F%EF%BC%86%E3%82%BB%E3%83%A1%E3%83%B3%E3%83%88%E3%82%B5%E3%82%A4%E3%83%AD.jpg', 'Cement Storage Silos'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6121.jpg', 'Machinery Integration Controls'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6117.jpg', 'Automated QC Operator Desk'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6113.jpg', 'Concrete Blocks Curing Stage'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6107.jpg', 'Finished Concrete Blocks Palletization'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6104.jpg', 'Seismic Block Stacking & Packing'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6095.jpg', 'Outdoor Stockyard Pallets'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6093.jpg', 'Quality Testing Lab'),
                        array('https://www.ighd.co.id/wp-content/uploads/2023/12/bg-header-product.jpg', 'Concrete Block Product Overview')
                    );
                    foreach ($docs as $index => $item) {
                        ?>
                        <div class="snap-start shrink-0 w-[85%] sm:w-[calc(50%-8px)] md:w-[calc(33.333%-11px)] aspect-[4/3] rounded-2xl overflow-hidden shadow-sm border border-zinc-200 bg-white group/item relative cursor-pointer" onclick="openLightbox('doc', <?php echo $index; ?>)">
                            <img src="<?php echo $item[0]; ?>" alt="<?php echo esc_attr($item[1]); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover/item:scale-105 pointer-events-none" loading="lazy" />
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/item:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="p-3 bg-white/20 backdrop-blur-md text-white rounded-full shadow-md">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path></svg>
                                </span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Carousel Controls -->
                <button id="slide-prev" class="absolute left-4 top-1/2 -translate-y-1/2 p-3 bg-white/95 text-zinc-800 border border-zinc-200 rounded-full shadow-md transition-all opacity-0 group-hover:opacity-100 focus:opacity-100 active:scale-95 hover:bg-primary hover:text-white hover:border-primary z-10 hidden md:flex" title="Previous Slide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button id="slide-next" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 bg-white/95 text-zinc-800 border border-zinc-200 rounded-full shadow-md transition-all opacity-0 group-hover:opacity-100 focus:opacity-100 active:scale-95 hover:bg-primary hover:text-white hover:border-primary z-10 hidden md:flex" title="Next Slide">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <!-- Pagination Dots -->
                <div id="doc-dots" class="flex justify-center gap-2 mt-4">
                    <?php foreach ($docs as $index => $item) { ?>
                        <button class="w-2 h-2 rounded-full bg-zinc-300 transition-all duration-300" onclick="scrollToSlide(<?php echo $index; ?>)"></button>
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- Certifications & Standards -->
        <section class="space-y-8" id="certifications">
            <div class="border-l-4 border-primary pl-4 space-y-2">
                <h2 class="text-2xl md:text-3xl font-extrabold font-lexend text-deep-navy">Certifications & Standards</h2>
                <p class="text-gray-500">Our production facilities and blocks comply with Indonesian National Standards (SNI) and rigorous Japanese QC metrics.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="space-y-4 text-gray-600 leading-relaxed text-base">
                    <p>
                        PT Iida Group Holdings takes quality assurance seriously. All structural Concrete Blocks (IG Strong CB) and Paving Blocks are manufactured under the supervision of Japanese technology specialists and checked against SNI guidelines.
                    </p>
                    <p>
                        Our concrete products meet the required threshold load capacities, offering supreme resistance to seismic activities and weathering. Certifications cover both compressive load testing and dimension consistency.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-white border border-zinc-200 rounded-2xl shadow-sm flex items-center justify-center cursor-pointer hover:shadow-md transition-shadow group/cert" onclick="openLightbox('cert', 0)">
                        <img src="https://www.ighd.co.id/wp-content/uploads/2023/08/SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg" alt="SNI Certificate Label" class="max-h-48 object-contain transition-transform duration-300 group-hover/cert:scale-102" />
                    </div>
                    <div class="p-4 bg-white border border-zinc-200 rounded-2xl shadow-sm flex items-center justify-center cursor-pointer hover:shadow-md transition-shadow group/cert" onclick="openLightbox('cert', 1)">
                        <img src="https://www.ighd.co.id/wp-content/uploads/2023/08/Lampiran-SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg" alt="SNI Attachment" class="max-h-48 object-contain transition-transform duration-300 group-hover/cert:scale-102" />
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="fixed inset-0 z-[3000] bg-black/95 hidden opacity-0 transition-opacity duration-300 flex flex-col justify-between select-none">
    <!-- Top Bar -->
    <div class="w-full flex justify-between items-center px-6 py-4 bg-gradient-to-b from-black/80 to-transparent text-white z-10">
        <span id="lightbox-counter" class="text-sm font-medium font-lexend">1 / 14</span>
        <div class="flex items-center gap-4">
            <!-- Zoom Controls -->
            <button id="lightbox-zoom-out" class="p-2 bg-white/10 hover:bg-white/20 active:scale-95 rounded-lg transition-all" title="Zoom Out">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path></svg>
            </button>
            <button id="lightbox-zoom-in" class="p-2 bg-white/10 hover:bg-white/20 active:scale-95 rounded-lg transition-all" title="Zoom In">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path></svg>
            </button>
            <button id="lightbox-zoom-reset" class="px-3 py-1.5 text-xs font-semibold bg-white/10 hover:bg-white/20 active:scale-95 rounded-lg transition-all font-lexend" title="Reset Zoom">
                Reset
            </button>
            <span class="text-zinc-600">|</span>
            <!-- Close Button -->
            <button id="lightbox-close" class="p-2 bg-white/10 hover:bg-white/20 active:scale-95 rounded-lg transition-all" title="Close (Esc)">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative flex-1 w-full flex items-center justify-center overflow-hidden cursor-grab active:cursor-grabbing" id="lightbox-viewport">
        <!-- Image Element -->
        <img id="lightbox-image" src="" alt="Lightbox View" class="max-h-[85vh] max-w-[90vw] object-contain transition-transform duration-200 ease-out origin-center select-none pointer-events-none" />
        
        <!-- Next/Prev Buttons -->
        <button id="lightbox-prev" class="absolute left-6 p-3 bg-black/40 hover:bg-black/60 text-white rounded-full transition-all active:scale-95 hover:scale-105 z-10" title="Previous Image">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button id="lightbox-next" class="absolute right-6 p-3 bg-black/40 hover:bg-black/60 text-white rounded-full transition-all active:scale-95 hover:scale-105 z-10" title="Next Image">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </div>

    <!-- Bottom Bar (Caption) -->
    <div class="w-full text-center py-6 bg-gradient-to-t from-black/80 to-transparent text-zinc-300 px-6 z-10 font-lexend text-sm" id="lightbox-caption">
        Image caption
    </div>
</div>

<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.lightbox-drag-active {
    cursor: grabbing !important;
}
</style>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
// Gallery datasets
const galleries = {
    doc: [
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-2.jpg', title: 'Factory Warehouse & Logistics' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-3.jpg', title: 'Raw Materials Processing Station' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-4.jpg', title: 'Automated Production Conveyor' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/img-parbrik-5.jpg', title: 'Main Concrete Batching Plant' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/%E5%8E%9F%E6%9D%90%E6%96%99%E3%83%9B%E3%83%83%E3%83%91%E3%83%BC%EF%BC%86%E3%83%9B%E3%82%A4%E3%83%BC%E3%83%AB%E3%83%AD%E3%83%BC%E3%83%80%E3%83%BC.jpg', title: 'Raw Material Hopper & Loader' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/%E8%A3%BD%E9%80%A0%E6%A3%9F%EF%BC%86%E3%82%BB%E3%83%A1%E3%83%B3%E3%83%88%E3%82%B5%E3%82%A4%E3%83%AD.jpg', title: 'Cement Storage Silos' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6121.jpg', title: 'Machinery Integration Controls' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6117.jpg', title: 'Automated QC Operator Desk' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6113.jpg', title: 'Concrete Blocks Curing Stage' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6107.jpg', title: 'Finished Concrete Blocks Palletization' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6104.jpg', title: 'Seismic Block Stacking & Packing' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6095.jpg', title: 'Outdoor Stockyard Pallets' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/IMG_6093.jpg', title: 'Quality Testing Lab' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/12/bg-header-product.jpg', title: 'Concrete Block Product Overview' }
    ],
    cert: [
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg', title: 'SNI Certificate Label - PT Iida Group Holdings' },
        { src: 'https://www.ighd.co.id/wp-content/uploads/2023/08/Lampiran-SNI-Label-PT-IIDA-GROUP-HOLDINGS.jpg', title: 'SNI Certificate Attachment - Specifications List' }
    ]
};

let currentGallery = 'doc';
let currentIndex = 0;
let scale = 1;
let translateX = 0;
let translateY = 0;
let isDragging = false;
let startX = 0;
let startY = 0;
let prevTranslateX = 0;
let prevTranslateY = 0;

const lightboxModal = document.getElementById('lightbox-modal');
const lightboxImage = document.getElementById('lightbox-image');
const lightboxCounter = document.getElementById('lightbox-counter');
const lightboxCaption = document.getElementById('lightbox-caption');
const lightboxViewport = document.getElementById('lightbox-viewport');

function openLightbox(galleryType, index) {
    currentGallery = galleryType;
    currentIndex = index;
    resetZoomState();
    updateLightboxContent();
    
    lightboxModal.classList.remove('hidden');
    lightboxModal.offsetHeight; // force reflow
    lightboxModal.classList.remove('opacity-0');
    lightboxModal.classList.add('opacity-100');
    document.body.classList.add('overflow-hidden');
    
    window.addEventListener('keydown', handleKeyDown);
}

function closeLightbox() {
    lightboxModal.classList.remove('opacity-100');
    lightboxModal.classList.add('opacity-0');
    document.body.classList.remove('overflow-hidden');
    setTimeout(() => {
        lightboxModal.classList.add('hidden');
    }, 300);
    window.removeEventListener('keydown', handleKeyDown);
}

function resetZoomState() {
    scale = 1;
    translateX = 0;
    translateY = 0;
    prevTranslateX = 0;
    prevTranslateY = 0;
    applyTransformations();
    updateCursorState();
}

function updateLightboxContent() {
    const item = galleries[currentGallery][currentIndex];
    lightboxImage.src = item.src;
    lightboxCaption.textContent = item.title;
    lightboxCounter.textContent = `${currentIndex + 1} / ${galleries[currentGallery].length}`;
}

function applyTransformations() {
    lightboxImage.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
}

function prevImage() {
    currentIndex = (currentIndex - 1 + galleries[currentGallery].length) % galleries[currentGallery].length;
    resetZoomState();
    updateLightboxContent();
}

function nextImage() {
    currentIndex = (currentIndex + 1) % galleries[currentGallery].length;
    resetZoomState();
    updateLightboxContent();
}

function zoomIn() {
    scale = Math.min(4.0, scale + 0.25);
    updateCursorState();
    applyTransformations();
}

function zoomOut() {
    scale = Math.max(1.0, scale - 0.25);
    if (scale === 1.0) {
        translateX = 0;
        translateY = 0;
        prevTranslateX = 0;
        prevTranslateY = 0;
    }
    updateCursorState();
    applyTransformations();
}

function updateCursorState() {
    if (scale > 1.0) {
        lightboxImage.classList.remove('cursor-zoom-in');
        lightboxImage.classList.add('cursor-move');
        lightboxViewport.classList.add('lightbox-drag-active');
    } else {
        lightboxImage.classList.remove('cursor-move');
        lightboxImage.classList.add('cursor-zoom-in');
        lightboxViewport.classList.remove('lightbox-drag-active');
    }
}

function handleKeyDown(e) {
    if (e.key === 'Escape') closeLightbox();
    else if (e.key === 'ArrowLeft') prevImage();
    else if (e.key === 'ArrowRight') nextImage();
}

// Pan & Drag event listeners
lightboxViewport.addEventListener('mousedown', (e) => {
    if (scale <= 1.0) return;
    isDragging = true;
    startX = e.clientX;
    startY = e.clientY;
    lightboxViewport.classList.add('lightbox-drag-active');
});

window.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    const dx = e.clientX - startX;
    const dy = e.clientY - startY;
    translateX = prevTranslateX + dx;
    translateY = prevTranslateY + dy;
    applyTransformations();
});

window.addEventListener('mouseup', () => {
    if (isDragging) {
        isDragging = false;
        prevTranslateX = translateX;
        prevTranslateY = translateY;
    }
});

// Touch controls for panning
lightboxViewport.addEventListener('touchstart', (e) => {
    if (scale <= 1.0 || e.touches.length !== 1) return;
    isDragging = true;
    startX = e.touches[0].clientX;
    startY = e.touches[0].clientY;
});

lightboxViewport.addEventListener('touchmove', (e) => {
    if (!isDragging || e.touches.length !== 1) return;
    const dx = e.touches[0].clientX - startX;
    const dy = e.touches[0].clientY - startY;
    translateX = prevTranslateX + dx;
    translateY = prevTranslateY + dy;
    applyTransformations();
});

lightboxViewport.addEventListener('touchend', () => {
    if (isDragging) {
        isDragging = false;
        prevTranslateX = translateX;
        prevTranslateY = translateY;
    }
});

// Mouse wheel zoom
lightboxViewport.addEventListener('wheel', (e) => {
    e.preventDefault();
    const delta = -e.deltaY;
    if (delta > 0) {
        scale = Math.min(4.0, scale + 0.15);
    } else {
        scale = Math.max(1.0, scale - 0.15);
        if (scale === 1.0) {
            translateX = 0;
            translateY = 0;
            prevTranslateX = 0;
            prevTranslateY = 0;
        }
    }
    updateCursorState();
    applyTransformations();
}, { passive: false });

document.getElementById('lightbox-close').addEventListener('click', closeLightbox);
document.getElementById('lightbox-prev').addEventListener('click', prevImage);
document.getElementById('lightbox-next').addEventListener('click', nextImage);
document.getElementById('lightbox-zoom-in').addEventListener('click', zoomIn);
document.getElementById('lightbox-zoom-out').addEventListener('click', zoomOut);
document.getElementById('lightbox-zoom-reset').addEventListener('click', resetZoomState);


// --- CAROUSEL SLIDER ENGINE ---
const scroller = document.getElementById('doc-scroller');
const prevBtn = document.getElementById('slide-prev');
const nextBtn = document.getElementById('slide-next');
const dots = document.getElementById('doc-dots').children;

function getSlideWidth() {
    const item = scroller.querySelector('.snap-start');
    if (!item) return 0;
    return item.offsetWidth + 16;
}

function scrollToSlide(index) {
    const slideWidth = getSlideWidth();
    scroller.scrollTo({
        left: index * slideWidth,
        behavior: 'smooth'
    });
}

if (prevBtn && nextBtn) {
    prevBtn.addEventListener('click', () => {
        scroller.scrollBy({ left: -getSlideWidth(), behavior: 'smooth' });
    });
    nextBtn.addEventListener('click', () => {
        scroller.scrollBy({ left: getSlideWidth(), behavior: 'smooth' });
    });
}

scroller.addEventListener('scroll', () => {
    const slideWidth = getSlideWidth();
    if (slideWidth === 0) return;
    const index = Math.round(scroller.scrollLeft / slideWidth);
    
    for (let i = 0; i < dots.length; i++) {
        if (i === index) {
            dots[i].classList.remove('bg-zinc-300');
            dots[i].classList.add('bg-primary', 'w-4');
        } else {
            dots[i].classList.remove('bg-primary', 'w-4');
            dots[i].classList.add('bg-zinc-300');
        }
    }
});

let isScrollerDragging = false;
let scrollerStartX;
let scrollerScrollLeft;

scroller.addEventListener('mousedown', (e) => {
    isScrollerDragging = true;
    scrollerStartX = e.pageX - scroller.offsetLeft;
    scrollerScrollLeft = scroller.scrollLeft;
});

scroller.addEventListener('mouseleave', () => {
    isScrollerDragging = false;
});

scroller.addEventListener('mouseup', () => {
    isScrollerDragging = false;
});

scroller.addEventListener('mousemove', (e) => {
    if (!isScrollerDragging) return;
    e.preventDefault();
    const x = e.pageX - scroller.offsetLeft;
    const walk = (x - scrollerStartX) * 1.5;
    scroller.scrollLeft = scrollerScrollLeft - walk;
});

if (dots.length > 0) {
    dots[0].classList.remove('bg-zinc-300');
    dots[0].classList.add('bg-primary', 'w-4');
}

// Video sound controls
const heroVideo = document.getElementById('hero-video');
const soundBtn = document.getElementById('video-sound-btn');
const soundIcon = document.getElementById('video-sound-icon');
const soundText = document.getElementById('video-sound-text');

if (soundBtn && heroVideo) {
    soundBtn.addEventListener('click', () => {
        heroVideo.muted = !heroVideo.muted;
        if (heroVideo.muted) {
            soundIcon.textContent = 'volume_off';
            soundText.textContent = 'Unmute';
        } else {
            heroVideo.volume = 1.0; // Ensure volume is up
            soundIcon.textContent = 'volume_up';
            soundText.textContent = 'Mute';
        }
    });
}
</script>

<?php get_footer(); ?>
