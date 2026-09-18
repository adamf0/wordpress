<?php
/**
 * Template Name: Construction Material Detail
 */
get_header();
?>

<main class="">
    <!-- Banner Section -->
    <section class="relative w-screen h-[40vh] flex items-center justify-center bg-zinc-950 overflow-hidden text-white">
        <img class="absolute inset-0 w-full h-full object-cover object-center opacity-45" alt="Construction Materials Banner" src="<?php echo get_template_directory_uri(); ?>/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp" fetchpriority="high" decoding="sync" />
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-transparent to-zinc-950"></div>
        <div class="relative z-10 text-center space-y-4 px-6">
            <span class="text-primary font-bold text-xs uppercase tracking-widest bg-primary/10 px-3 py-1.5 rounded-full">Global Standards</span>
            <h1 class="text-3xl md:text-5xl font-extrabold font-lexend tracking-tight text-white">
                Construction Materials
            </h1>
        </div>
    </section>

    <!-- Catalog Section -->
    <section class="w-full max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Sidebar - Brand Tabs -->
            <aside class="w-full lg:w-64 shrink-0">
                <div class="bg-white rounded-xl border border-zinc-200 p-4 shadow-sm space-y-2">
                    <h2 class="text-xs font-bold text-zinc-400 uppercase tracking-wider px-3 mb-4">Brands</h2>
                    <div class="flex flex-row overflow-x-auto lg:flex-col gap-2 pb-2 lg:pb-0 scrollbar-none" id="brand-tabs-list">
                        <!-- Loaded dynamically via JS -->
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 space-y-6">
                <!-- Search & Filters Header -->
                <div class="bg-white rounded-xl border border-zinc-200 p-6 shadow-sm space-y-6">
                    <!-- Search Input -->
                    <div class="relative max-w-md">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-zinc-400">
                            <span class="material-symbols-outlined text-[20px]">search</span>
                        </span>
                        <input 
                            type="text" 
                            id="catalog-search" 
                            placeholder="Search product name, code, or specification..."
                            class="w-full pl-11 pr-4 py-3 rounded-lg border border-zinc-200 focus:outline-none focus:border-primary text-sm transition-colors text-gray-700"
                        />
                    </div>

                    <!-- Top Subcategory Tabs -->
                    <div class="border-b border-zinc-100 pb-2">
                        <div class="flex flex-wrap gap-2" id="subcategory-tabs-list">
                            <!-- Loaded dynamically via JS -->
                        </div>
                    </div>
                </div>

                <!-- Products Table Area -->
                <div class="bg-white rounded-xl border border-zinc-200 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto max-h-[300px] overflow-y-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="bg-zinc-50 border-b border-zinc-200 sticky top-0 z-10 shadow-[inset_0_-1px_0_rgba(228,228,231,1)]">
                                    <th class="px-6 py-4 text-left font-bold text-deep-navy w-32 bg-zinc-50">Product Code</th>
                                    <th class="px-6 py-4 text-left font-bold text-deep-navy bg-zinc-50">Product Details</th>
                                    <th class="px-6 py-4 text-left font-bold text-deep-navy w-36 bg-zinc-50">Price</th>
                                    <th class="px-6 py-4 text-center font-bold text-deep-navy w-28 bg-zinc-50">Image</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200" id="product-rows-container">
                                <!-- Loaded dynamically via JS -->
                            </tbody>
                        </table>
                    </div>
                    <!-- Empty State -->
                    <div id="empty-state" class="hidden text-center py-16 px-4 space-y-3">
                        <span class="material-symbols-outlined text-4xl text-zinc-300">inventory_2</span>
                        <p class="text-zinc-500 font-medium">No products found matching your search criteria.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ordering & Return Workflows Section -->
    <section class="w-full max-w-7xl mx-auto px-4 pb-24 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Ordering Process Card -->
            <div class="bg-white rounded-2xl border border-zinc-200 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition-all duration-300">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="p-3 bg-primary/10 text-primary rounded-xl">
                            <span class="material-symbols-outlined text-[24px]">shopping_cart</span>
                        </span>
                        <h2 class="text-xl font-bold text-deep-navy font-lexend">Alur Pemesanan</h2>
                    </div>
                    <p class="text-zinc-500 text-sm">
                        Prosedur pemesanan material konstruksi resmi yang mudah, aman, dan langsung dari distributor untuk proyek Anda.
                    </p>
                    <div class="relative rounded-xl overflow-hidden border border-zinc-100 aspect-video cursor-zoom-in" onclick="triggerLightbox('<?php echo get_template_directory_uri(); ?>/ordering_process_flow.webp', 'Alur Pemesanan')">
                        <img src="<?php echo get_template_directory_uri(); ?>/ordering_process_flow.webp" alt="Alur Pemesanan" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500" width="640" height="360" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="p-3 bg-white/20 backdrop-blur-md text-white rounded-full shadow-md">
                                <span class="material-symbols-outlined text-[20px]">zoom_in</span>
                            </span>
                        </div>
                    </div>
                    <ol class="space-y-4 text-sm text-zinc-600">
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">1</span>
                            <div>
                                <strong class="text-deep-navy block">Pemesanan</strong>
                                Pelanggan mengajukan permintaan pesanan.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">2</span>
                            <div>
                                <strong class="text-deep-navy block">Mengkonfirmasi Order</strong>
                                Tim penjualan meninjau dan memverifikasi data pesanan.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">3</span>
                            <div>
                                <strong class="text-deep-navy block">Konfirmasi Order</strong>
                                Pesanan disetujui, konfirmasi resmi dikirimkan ke pelanggan.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">4</span>
                            <div>
                                <strong class="text-deep-navy block">Pengaturan Pengiriman</strong>
                                Perencanaan rute logistik dan armada pengiriman disiapkan.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">5</span>
                            <div>
                                <strong class="text-deep-navy block">Konfirmasi tanggal Pengiriman</strong>
                                Pelanggan dihubungi untuk konfirmasi jadwal perkiraan pengiriman.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">6</span>
                            <div>
                                <strong class="text-deep-navy block">Invoicing</strong>
                                Faktur tagihan (invoice) resmi diterbitkan dan dikirim ke pelanggan.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">7</span>
                            <div>
                                <strong class="text-deep-navy block">Pelunasan Pembayaran 100%</strong>
                                Pelanggan menyelesaikan pelunasan pembayaran secara penuh.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">8</span>
                            <div>
                                <strong class="text-deep-navy block">Pengiriman</strong>
                                Material konstruksi dikirim langsung ke lokasi proyek tujuan.
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Return Process Card -->
            <div class="bg-white rounded-2xl border border-zinc-200 p-8 shadow-sm flex flex-col justify-between group hover:shadow-md transition-all duration-300">
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <span class="p-3 bg-primary/10 text-primary rounded-xl">
                            <span class="material-symbols-outlined text-[24px]">assignment_return</span>
                        </span>
                        <h2 class="text-xl font-bold text-deep-navy font-lexend">Cara Pengembalian Barang</h2>
                    </div>
                    <p class="text-zinc-500 text-sm">
                        Garansi kepuasan pelanggan dengan jaminan penggantian barang cepat untuk material yang cacat atau tidak sesuai spesifikasi.
                    </p>
                    <div class="relative rounded-xl overflow-hidden border border-zinc-100 aspect-video cursor-zoom-in" onclick="triggerLightbox('<?php echo get_template_directory_uri(); ?>/return_process_flow.webp', 'Cara Pengembalian Barang')">
                        <img src="<?php echo get_template_directory_uri(); ?>/return_process_flow.webp" alt="Proses Pengembalian Barang" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500" width="640" height="360" />
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="p-3 bg-white/20 backdrop-blur-md text-white rounded-full shadow-md">
                                <span class="material-symbols-outlined text-[20px]">zoom_in</span>
                            </span>
                        </div>
                    </div>
                    <ol class="space-y-4 text-sm text-zinc-600">
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">1</span>
                            <div>
                                <strong class="text-deep-navy block">Foto & Dokumentasi Barang</strong>
                                Lakukan pengambilan foto atau dokumentasi visual untuk barang yang rusak atau tidak sesuai.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">2</span>
                            <div>
                                <strong class="text-deep-navy block">Email ke joevan1015@gmail.com</strong>
                                Kirimkan bukti dokumentasi dan keluhan pesanan melalui email resmi kami.
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex-shrink-0 w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xs">3</span>
                            <div>
                                <strong class="text-deep-navy block">Menunggu Konfirmasi dari Tim</strong>
                                Tim support kami akan mengevaluasi keluhan dan segera memproses penukaran barang.
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox Modal for Product Images -->
<div id="product-lightbox" class="fixed inset-0 z-[3000] bg-black/95 hidden opacity-0 transition-opacity duration-300 flex flex-col justify-between select-none">
    <div class="w-full flex justify-between items-center px-6 py-4 bg-gradient-to-b from-black/80 to-transparent text-white z-10">
        <span id="lightbox-title" class="text-sm font-medium font-lexend">Product Image</span>
        <button id="lightbox-close-btn" class="p-2 bg-white/10 hover:bg-white/20 active:scale-95 rounded-lg transition-all" title="Close">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <div class="flex-1 w-full flex items-center justify-center p-6">
        <img id="lightbox-img-element" src="" alt="Product Detail" class="max-h-[80vh] max-w-[90vw] object-contain rounded-lg shadow-2xl transition-transform duration-200 ease-out origin-center" />
    </div>
</div>

<script nonce="<?php echo bricklet_get_nonce(); ?>">
// HTML entity decoder helper
function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

// Price formatter helper
function formatPrice(price) {
    if (!price || price === 0) {
        return '<span class="text-zinc-400 font-medium text-xs sm:text-sm">Hubungi Kami</span>';
    }
    return '<span class="text-primary font-bold text-sm sm:text-base">Rp ' + new Intl.NumberFormat('id-ID').format(price) + '</span>';
}

// Catalog Data structure loaded dynamically from MySQL database
const catalogData = <?php
global $wpdb;
$table_categories = $wpdb->prefix . 'construction_categories';
$table_products = $wpdb->prefix . 'construction_products';

$db_categories = $wpdb->get_results("SELECT * FROM $table_categories", ARRAY_A);
$db_products = $wpdb->get_results("SELECT * FROM $table_products", ARRAY_A);

$catalog = array();
$brands_keys = array(
    'rucika' => 'Rucika', 
    'rbshera' => 'RB Shera', 
    'granito' => 'GRANITO', 
    'terraco' => 'Terraco Rapi', 
    'dusaspun' => 'Dusaspun'
);

foreach ($brands_keys as $key => $name) {
    $catalog[$key] = array(
        'name' => $name,
        'subcategories' => array(),
        'products' => array()
    );
}

if (!empty($db_categories)) {
    foreach ($db_categories as $c) {
        $brand = $c['brand'];
        if (isset($catalog[$brand])) {
            $catalog[$brand]['subcategories'][] = array(
                'id' => $c['category_id'],
                'name' => $c['name']
            );
        }
    }
}

if (!empty($db_products)) {
    foreach ($db_products as $p) {
        $brand = $p['brand'];
        if (isset($catalog[$brand])) {
            $catalog[$brand]['products'][] = array(
                'code' => $p['code'],
                'category' => $p['category_id'],
                'name' => $p['name'],
                'spec' => $p['spec'],
                'price' => intval($p['price']),
                'img' => $p['img']
            );
        }
    }
}

echo json_encode($catalog, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>;

// Current State
let currentBrand = "rucika";
let currentSubcategory = "all";
let searchQuery = "";

// DOM Elements
const brandTabsList = document.getElementById("brand-tabs-list");
const subcategoryTabsList = document.getElementById("subcategory-tabs-list");
const productRowsContainer = document.getElementById("product-rows-container");
const catalogSearch = document.getElementById("catalog-search");
const emptyState = document.getElementById("empty-state");
const productLightbox = document.getElementById("product-lightbox");
const lightboxImgElement = document.getElementById("lightbox-img-element");
const lightboxTitle = document.getElementById("lightbox-title");

// Init Catalog
function initCatalog() {
    renderBrandTabs();
    selectBrand(currentBrand);

    catalogSearch.addEventListener("input", (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        renderProducts();
    });

    // Lightbox triggers
    document.getElementById("lightbox-close-btn").addEventListener("click", closeLightbox);
    productLightbox.addEventListener("click", (e) => {
        if (e.target === productLightbox) closeLightbox();
    });
}

// Render left brand sidebar
function renderBrandTabs() {
    brandTabsList.innerHTML = "";
    Object.keys(catalogData).forEach(key => {
        const brand = catalogData[key];
        const btn = document.createElement("button");
        btn.className = `w-full text-left px-4 py-3 rounded-lg text-sm font-medium transition-all shrink-0 whitespace-nowrap lg:whitespace-normal ${
            key === currentBrand 
                ? "bg-primary text-white shadow-md font-bold" 
                : "text-zinc-600 hover:bg-zinc-50 hover:text-primary border border-transparent"
        }`;
        btn.textContent = decodeHtml(brand.name);
        btn.addEventListener("click", () => selectBrand(key));
        brandTabsList.appendChild(btn);
    });
}

// Select active brand
function selectBrand(brandKey) {
    currentBrand = brandKey;
    currentSubcategory = "all";
    renderBrandTabs();
    renderSubcategoryTabs();
    renderProducts();
}

// Render top subcategory list
function renderSubcategoryTabs() {
    subcategoryTabsList.innerHTML = "";
    const brand = catalogData[currentBrand];
    if (!brand) return;

    // "All" option
    const allBtn = document.createElement("button");
    allBtn.className = `px-4 py-2 text-xs font-semibold rounded-full border transition-all ${
        currentSubcategory === "all"
            ? "bg-primary-container text-on-primary-container border-primary-container font-bold"
            : "bg-white border-zinc-200 text-zinc-600 hover:border-primary hover:text-primary"
    }`;
    allBtn.textContent = "All Products";
    allBtn.addEventListener("click", () => {
        currentSubcategory = "all";
        updateSubcategoryTabs();
        renderProducts();
    });
    subcategoryTabsList.appendChild(allBtn);

    // Dynamic options
    if (brand.subcategories) {
        brand.subcategories.forEach(sub => {
            const btn = document.createElement("button");
            btn.className = `px-4 py-2 text-xs font-semibold rounded-full border transition-all ${
                currentSubcategory === sub.id
                    ? "bg-primary-container text-on-primary-container border-primary-container font-bold"
                    : "bg-white border-zinc-200 text-zinc-600 hover:border-primary hover:text-primary"
            }`;
            btn.textContent = decodeHtml(sub.name);
            btn.addEventListener("click", () => {
                currentSubcategory = sub.id;
                updateSubcategoryTabs();
                renderProducts();
            });
            subcategoryTabsList.appendChild(btn);
        });
    }
}

// Update top subcategory tab highlights
function updateSubcategoryTabs() {
    const btns = subcategoryTabsList.children;
    const brand = catalogData[currentBrand];
    if (!brand) return;

    // Update all
    Array.from(btns).forEach((btn, index) => {
        const id = index === 0 ? "all" : brand.subcategories[index - 1].id;
        if (currentSubcategory === id) {
            btn.className = "px-4 py-2 text-xs font-semibold rounded-full border bg-primary-container text-on-primary-container border-primary-container font-bold transition-all";
        } else {
            btn.className = "px-4 py-2 text-xs font-semibold rounded-full border bg-white border-zinc-200 text-zinc-600 hover:border-primary hover:text-primary transition-all";
        }
    });
}

// Render dynamic rows in table
function renderProducts() {
    productRowsContainer.innerHTML = "";
    const brand = catalogData[currentBrand];
    if (!brand || !brand.products) {
        emptyState.classList.remove("hidden");
        return;
    }
    
    // Filter
    let filteredList = brand.products.filter(p => {
        const matchesCategory = (currentSubcategory === "all" || p.category === currentSubcategory);
        const matchesSearch = (
            p.name.toLowerCase().includes(searchQuery) ||
            p.code.toLowerCase().includes(searchQuery) ||
            p.spec.toLowerCase().includes(searchQuery)
        );
        return matchesCategory && matchesSearch;
    });

    if (filteredList.length === 0) {
        emptyState.classList.remove("hidden");
        return;
    }
    emptyState.classList.add("hidden");

    filteredList.forEach(p => {
        const tr = document.createElement("tr");
        tr.className = "hover:bg-zinc-50 transition-colors";
        
        const formattedPrice = formatPrice(p.price);
        tr.innerHTML = `
            <td class="px-6 py-5 align-middle">
                <span class="inline-block px-2.5 py-1 text-xs font-mono font-bold bg-zinc-100 text-zinc-800 rounded border border-zinc-200">
                    ${p.code}
                </span>
            </td>
            <td class="px-6 py-5 align-middle space-y-1">
                <h3 class="font-bold text-deep-navy text-sm sm:text-base">${decodeHtml(p.name)}</h3>
                <p class="text-zinc-500 text-xs sm:text-sm leading-relaxed max-w-xl">${decodeHtml(p.spec)}</p>
            </td>
            <td class="px-6 py-5 align-middle font-semibold text-gray-800">
                ${formattedPrice}
            </td>
            <td class="px-6 py-5 align-middle text-center w-28">
                <div class="inline-block relative w-16 h-16 rounded-xl border border-zinc-200 overflow-hidden shadow-sm hover:shadow-md cursor-pointer transition-shadow" onclick="triggerLightbox('${p.img}', '${p.name}')">
                    <img src="${p.img}" alt="${p.name}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300" loading="lazy" width="64" height="64" />
                </div>
            </td>
        `;
        productRowsContainer.appendChild(tr);
    });
}

// Lightbox controller
function triggerLightbox(url, name) {
    // If the image is a WordPress generated thumbnail, try to get the original/large size.
    const largeUrl = url.replace(/-150x150\.(png|jpg|jpeg|webp)$/i, '.$1')
                        .replace(/-300x300\.(png|jpg|jpeg|webp)$/i, '.$1');
    lightboxImgElement.src = largeUrl;
    lightboxTitle.textContent = decodeHtml(name);
    productLightbox.classList.remove("hidden");
    productLightbox.offsetHeight; // trigger reflow
    productLightbox.classList.remove("opacity-0");
    productLightbox.classList.add("opacity-100");
    document.body.classList.add("overflow-hidden");
}

function closeLightbox() {
    productLightbox.classList.remove("opacity-100");
    productLightbox.classList.add("opacity-0");
    document.body.classList.remove("overflow-hidden");
    setTimeout(() => {
        productLightbox.classList.add("hidden");
    }, 300);
}

// Start on DOM ready
document.addEventListener("DOMContentLoaded", initCatalog);
</script>

<?php get_footer(); ?>
