<?php
/**
 * Bricklet Admin CRUD Panels - Database Integration for PT Iida Group
 */

// ----------------------------------------------------
// 1. Database Schema Creation & Seeding
// ----------------------------------------------------
function bricklet_setup_database() {
    global $wpdb;
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $charset_collate = $wpdb->get_charset_collate();
    
    // Original DB version 1.0 setup
    if (get_option('bricklet_db_installed') !== '1.0') {
        $table_categories = $wpdb->prefix . 'construction_categories';
        $sql_categories = "CREATE TABLE $table_categories (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            category_id varchar(50) NOT NULL,
            brand varchar(50) NOT NULL,
            name varchar(255) NOT NULL,
            PRIMARY KEY  (id),
            KEY category_id (category_id),
            KEY brand (brand)
        ) $charset_collate;";
        dbDelta($sql_categories);
        
        $table_products = $wpdb->prefix . 'construction_products';
        $sql_products = "CREATE TABLE $table_products (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            brand varchar(50) NOT NULL,
            category_id varchar(50) NOT NULL,
            code varchar(100) NOT NULL,
            name varchar(255) NOT NULL,
            spec text NOT NULL,
            price int(11) NOT NULL DEFAULT 0,
            img varchar(255) NOT NULL,
            PRIMARY KEY  (id),
            KEY brand (brand),
            KEY category_id (category_id)
        ) $charset_collate;";
        dbDelta($sql_products);
        
        $table_osaka = $wpdb->prefix . 'osaka_products';
        $sql_osaka = "CREATE TABLE $table_osaka (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            type_group varchar(100) NOT NULL,
            name varchar(255) NOT NULL,
            thickness varchar(50) NOT NULL,
            weight varchar(50) NOT NULL,
            strength varchar(100) NOT NULL,
            num_per_sqm varchar(50) NOT NULL,
            min_order varchar(50) NOT NULL,
            img varchar(255) NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_osaka);
        update_option('bricklet_db_installed', '1.0');
    }

    // New DB version 3.0 setup (Custom pages CRUD)
    if (get_option('bricklet_db_installed_v2') !== '3.0') {
        $table_hero = $wpdb->prefix . 'igh_homepage_hero';
        $sql_hero = "CREATE TABLE $table_hero (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            hero_mode varchar(20) NOT NULL DEFAULT 'static',
            badge_text varchar(255) NOT NULL DEFAULT '',
            title varchar(255) NOT NULL DEFAULT '',
            subtitle text NOT NULL,
            btn1_text varchar(100) NOT NULL DEFAULT '',
            btn1_link varchar(255) NOT NULL DEFAULT '',
            btn2_text varchar(100) NOT NULL DEFAULT '',
            btn2_link varchar(255) NOT NULL DEFAULT '',
            static_image_url varchar(255) NOT NULL DEFAULT '',
            video_url varchar(255) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_hero);

        $table_hero_slides = $wpdb->prefix . 'igh_homepage_hero_slides';
        $sql_hero_slides = "CREATE TABLE $table_hero_slides (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            slide_image_url varchar(255) NOT NULL DEFAULT '',
            badge_text varchar(255) NOT NULL DEFAULT '',
            title varchar(255) NOT NULL DEFAULT '',
            subtitle text NOT NULL,
            btn1_text varchar(100) NOT NULL DEFAULT '',
            btn1_link varchar(255) NOT NULL DEFAULT '',
            btn2_text varchar(100) NOT NULL DEFAULT '',
            btn2_link varchar(255) NOT NULL DEFAULT '',
            sort_order int(11) NOT NULL DEFAULT 0,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_hero_slides);

        $table_company = $wpdb->prefix . 'igh_company_profile';
        $sql_company = "CREATE TABLE $table_company (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            hero_bg_image varchar(255) NOT NULL DEFAULT '',
            hero_badge varchar(255) NOT NULL DEFAULT '',
            hero_title varchar(255) NOT NULL DEFAULT '',
            hero_subtitle text NOT NULL,
            hero_btn1_text varchar(100) NOT NULL DEFAULT '',
            hero_btn1_link varchar(255) NOT NULL DEFAULT '',
            hero_btn2_text varchar(100) NOT NULL DEFAULT '',
            hero_btn2_link varchar(255) NOT NULL DEFAULT '',
            about_badge varchar(255) NOT NULL DEFAULT '',
            about_title varchar(255) NOT NULL DEFAULT '',
            about_desc1 text NOT NULL,
            about_desc2 text NOT NULL,
            about_image varchar(255) NOT NULL DEFAULT '',
            about_stat1_val varchar(100) NOT NULL DEFAULT '',
            about_stat1_lbl varchar(255) NOT NULL DEFAULT '',
            about_stat2_val varchar(100) NOT NULL DEFAULT '',
            about_stat2_lbl varchar(255) NOT NULL DEFAULT '',
            about_overlay_title varchar(255) NOT NULL DEFAULT '',
            about_overlay_lbl varchar(255) NOT NULL DEFAULT '',
            leader_image varchar(255) NOT NULL DEFAULT '',
            leader_name varchar(255) NOT NULL DEFAULT '',
            leader_title varchar(255) NOT NULL DEFAULT '',
            leader_quote text NOT NULL,
            leader_quote_desc text NOT NULL,
            leader_quote_source varchar(255) NOT NULL DEFAULT '',
            framework_title varchar(255) NOT NULL DEFAULT '',
            framework_desc text NOT NULL,
            vision_title varchar(255) NOT NULL DEFAULT '',
            vision_desc text NOT NULL,
            vision_icon varchar(100) NOT NULL DEFAULT 'visibility',
            mission_title varchar(255) NOT NULL DEFAULT '',
            mission_desc text NOT NULL,
            mission_icon varchar(100) NOT NULL DEFAULT 'rocket_launch',
            value1_title varchar(100) NOT NULL DEFAULT '',
            value1_icon varchar(100) NOT NULL DEFAULT 'verified',
            value2_title varchar(100) NOT NULL DEFAULT '',
            value2_icon varchar(100) NOT NULL DEFAULT 'eco',
            value3_title varchar(100) NOT NULL DEFAULT '',
            value3_icon varchar(100) NOT NULL DEFAULT 'group',
            value4_title varchar(100) NOT NULL DEFAULT '',
            value4_icon varchar(100) NOT NULL DEFAULT 'precision_manufacturing',
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_company);

        $table_milestones = $wpdb->prefix . 'igh_company_profile_milestones';
        $sql_milestones = "CREATE TABLE $table_milestones (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            year varchar(50) NOT NULL DEFAULT '',
            title varchar(255) NOT NULL DEFAULT '',
            description text NOT NULL,
            sort_order int(11) NOT NULL DEFAULT 0,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_milestones);

        $table_group = $wpdb->prefix . 'igh_group_company';
        $sql_group = "CREATE TABLE $table_group (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            hero_bg_image varchar(255) NOT NULL DEFAULT '',
            hero_badge varchar(255) NOT NULL DEFAULT '',
            hero_title varchar(255) NOT NULL DEFAULT '',
            hero_subtitle text NOT NULL,
            grid_title varchar(255) NOT NULL DEFAULT '',
            grid_desc text NOT NULL,
            grid_side_text varchar(255) NOT NULL DEFAULT '',
            collab_image varchar(255) NOT NULL DEFAULT '',
            collab_stat_val varchar(100) NOT NULL DEFAULT '',
            collab_stat_lbl varchar(255) NOT NULL DEFAULT '',
            collab_badge varchar(255) NOT NULL DEFAULT '',
            collab_title varchar(255) NOT NULL DEFAULT '',
            collab_desc text NOT NULL,
            collab_f1_icon varchar(100) NOT NULL DEFAULT 'handshake',
            collab_f1_title varchar(255) NOT NULL DEFAULT '',
            collab_f1_desc text NOT NULL,
            collab_f2_icon varchar(100) NOT NULL DEFAULT 'verified',
            collab_f2_title varchar(255) NOT NULL DEFAULT '',
            collab_f2_desc text NOT NULL,
            collab_btn_text varchar(255) NOT NULL DEFAULT '',
            collab_btn_link varchar(255) NOT NULL DEFAULT '',
            stat1_val varchar(100) NOT NULL DEFAULT '',
            stat1_lbl varchar(255) NOT NULL DEFAULT '',
            stat2_val varchar(100) NOT NULL DEFAULT '',
            stat2_lbl varchar(255) NOT NULL DEFAULT '',
            stat3_val varchar(100) NOT NULL DEFAULT '',
            stat3_lbl varchar(255) NOT NULL DEFAULT '',
            stat4_val varchar(100) NOT NULL DEFAULT '',
            stat4_lbl varchar(255) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_group);

        $table_entities = $wpdb->prefix . 'igh_group_company_entities';
        $sql_entities = "CREATE TABLE $table_entities (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL DEFAULT '',
            icon varchar(100) NOT NULL DEFAULT 'domain',
            description text NOT NULL,
            link_text varchar(100) NOT NULL DEFAULT '',
            link_url varchar(255) NOT NULL DEFAULT '',
            sort_order int(11) NOT NULL DEFAULT 0,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_entities);

        // Seed new tables
        // 1. Homepage Hero
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_hero") == 0) {
            $wpdb->insert($table_hero, array(
                'hero_mode' => 'static',
                'badge_text' => 'Japanese Engineering Standards',
                'title' => 'Adorning you at every edge',
                'subtitle' => 'PT Iida Group Holdings delivers earthquake-resistant construction and premium building materials, bringing world-class Japanese reliability to Indonesia\'s growing infrastructure.',
                'btn1_text' => 'Discover More',
                'btn1_link' => '/company-profile/',
                'btn2_text' => 'Our Portfolio',
                'btn2_link' => '/products/',
                'static_image_url' => get_template_directory_uri() . '/images/layout/lh3_5b0daa7c91a4685f526611b90707ee34.webp',
                'video_url' => get_template_directory_uri() . '/images/Konstruksi-Media-Video-Short.mp4'
            ));
        }

        // 2. Homepage Hero Slides
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_hero_slides") == 0) {
            $wpdb->insert($table_hero_slides, array(
                'slide_image_url' => get_template_directory_uri() . '/images/layout/lh3_5b0daa7c91a4685f526611b90707ee34.webp',
                'sort_order' => 1
            ));
            $wpdb->insert($table_hero_slides, array(
                'slide_image_url' => get_template_directory_uri() . '/images/layout/timber-house-collaboration.webp',
                'sort_order' => 2
            ));
            $wpdb->insert($table_hero_slides, array(
                'slide_image_url' => get_template_directory_uri() . '/images/layout/lh3_200c8e9568e0d3681efcc487d0b0f5f8.webp',
                'sort_order' => 3
            ));
        }

        // 3. Company Profile
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_company") == 0) {
            $wpdb->insert($table_company, array(
                'hero_bg_image' => get_template_directory_uri() . '/images/layout/timber-house-collaboration.webp',
                'hero_badge' => 'JAPANESE ENGINEERING EXCELLENCE',
                'hero_title' => 'Defining the Future of Modern Infrastructure',
                'hero_subtitle' => 'Guided by centuries of Japanese architectural wisdom and powered by cutting-edge industrial innovation.',
                'hero_btn1_text' => 'VIEW PROJECTS',
                'hero_btn1_link' => '/products/',
                'hero_btn2_text' => 'OUR STORY',
                'hero_btn2_link' => '/our-business/',
                'about_badge' => 'Foundation',
                'about_title' => 'Engineering Trust Through Heritage',
                'about_desc1' => 'PT Iida Group stands as a premier subsidiary of Iida Group Holdings Co., Ltd., Japan\'s leading provider of wooden detached housing. We carry forward a legacy of precision and reliability that has defined Japanese construction for generations.',
                'about_desc2' => 'In Indonesia, we bridge the gap between international engineering standards and local expertise. Our mission is to provide sustainable, safe, and modern housing solutions that empower communities and foster national development.',
                'about_image' => get_template_directory_uri() . '/images/layout/lh3_a318a3984ad34a8acaa0c8561594acc0.webp',
                'about_stat1_val' => '40,000+',
                'about_stat1_lbl' => 'Homes Annually (Global)',
                'about_stat2_val' => '#1',
                'about_stat2_lbl' => 'Housing Market Share',
                'about_overlay_title' => '30+ Years',
                'about_overlay_lbl' => 'Industry Leadership',
                'leader_image' => get_template_directory_uri() . '/images/layout/lh3_d038fce4e1889d85acf5a9263aabd6c1.webp',
                'leader_name' => 'Sagiri Sakurai',
                'leader_title' => 'President Director',
                'leader_quote' => 'Sustainability is not just a goal; it is our foundation.',
                'leader_quote_desc' => 'As we navigate the complexities of modern infrastructure, our commitment remains anchored in the Japanese spirit of Monozukuri—the art of making things with heart and precision. We are here to build more than just buildings; we are building legacies for Indonesian families.',
                'leader_quote_source' => 'PT IIDA GROUP HOLDINGS',
                'framework_title' => 'Strategic Framework',
                'framework_desc' => 'Our path forward is guided by a clear vision for the urban landscape and a steadfast mission to uphold the highest technical standards.',
                'vision_title' => 'Our Vision',
                'vision_desc' => 'To become the gold standard for residential development in Southeast Asia, recognized for integrating advanced Japanese automation with localized architectural aesthetics.',
                'vision_icon' => 'visibility',
                'mission_title' => 'Our Mission',
                'mission_desc' => 'Providing high-quality, earthquake-resistant housing through continuous innovation, ensuring every Indonesian family has access to a safe and premium living environment.',
                'mission_icon' => 'rocket_launch',
                'value1_title' => 'QUALITY FIRST',
                'value1_icon' => 'verified',
                'value2_title' => 'SUSTAINABILITY',
                'value2_icon' => 'eco',
                'value3_title' => 'INTEGRITY',
                'value3_icon' => 'group',
                'value4_title' => 'PRECISION',
                'value4_icon' => 'precision_manufacturing'
            ));
        }

        // 4. Company Profile Milestones
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_milestones") == 0) {
            $wpdb->insert($table_milestones, array(
                'year' => '2014',
                'title' => 'Foundation',
                'description' => 'PT Iida Group established as a strategic subsidiary to bring Japanese detached housing expertise to the Indonesian market.',
                'sort_order' => 1
            ));
            $wpdb->insert($table_milestones, array(
                'year' => '2017',
                'title' => 'Expansion',
                'description' => 'Successfully completed the first large-scale residential project, setting a new benchmark for prefab construction quality.',
                'sort_order' => 2
            ));
            $wpdb->insert($table_milestones, array(
                'year' => '2021',
                'title' => 'Innovation',
                'description' => 'Integration of smart home technologies and eco-friendly Japanese building materials across all new developments.',
                'sort_order' => 3
            ));
            $wpdb->insert($table_milestones, array(
                'year' => '2024',
                'title' => 'Strategic Partnership',
                'description' => 'Kick-off of the Academic Collaboration initiative with top Indonesian and Japanese universities for forest product development.',
                'sort_order' => 4
            ));
        }

        // 5. Group Company
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_group") == 0) {
            $wpdb->insert($table_group, array(
                'hero_bg_image' => get_template_directory_uri() . '/images/layout/lh3_8fd019d8c64698e40616091ba7757ef7.webp',
                'hero_badge' => 'Global Network',
                'hero_title' => 'Our Global Synergy',
                'hero_subtitle' => 'Harnessing the collective expertise of Japan\'s leading construction and housing pioneers to deliver unparalleled urban development solutions across Southeast Asia.',
                'grid_title' => 'Pioneers of Excellence',
                'grid_desc' => 'PT Iida Group Holdings unites the most respected names in the Japanese housing industry, each bringing specialized technical capabilities to our global operations.',
                'grid_side_text' => '6 CORE ENTITIES',
                'collab_image' => get_template_directory_uri() . '/images/layout/lh3_50aaa41fd8ed5784100470983bbd7d87.webp',
                'collab_stat_val' => '15K+',
                'collab_stat_lbl' => 'HOUSING UNITS',
                'collab_badge' => 'Special Strategic Partnership',
                'collab_title' => 'Perumnas Iida Group',
                'collab_desc' => 'A landmark collaboration between the state-owned housing developer Perumnas and Iida Group Holdings. This partnership serves as a cornerstone for national housing development in Indonesia, merging local market knowledge with Japanese engineering excellence.',
                'collab_f1_icon' => 'handshake',
                'collab_f1_title' => 'National Synergy',
                'collab_f1_desc' => 'Supporting the government\'s program for affordable and high-quality housing for the Indonesian people.',
                'collab_f2_icon' => 'verified',
                'collab_f2_title' => 'Global Standards',
                'collab_f2_desc' => 'Implementing JIS (Japanese Industrial Standards) in local development to ensure durability and safety.',
                'collab_btn_text' => 'VIEW COLLABORATION PROJECTS',
                'collab_btn_link' => '/products/',
                'stat1_val' => '40+',
                'stat1_lbl' => 'YEARS EXPERIENCE',
                'stat2_val' => '1M+',
                'stat2_lbl' => 'HOMES DELIVERED',
                'stat3_val' => '12',
                'stat3_lbl' => 'COUNTRIES',
                'stat4_val' => '1st',
                'stat4_lbl' => 'MARKET SHARE'
            ));
        }

        // 6. Group Company Entities
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_entities") == 0) {
            $wpdb->insert($table_entities, array(
                'name' => 'Iida Sangyo Co., Ltd.',
                'icon' => 'domain',
                'description' => 'A leader in large-scale residential development with a focus on community-centric design and sustainable infrastructure.',
                'link_text' => 'ESTABLISHED 1977',
                'link_url' => 'https://www.iidasangyo.co.jp/iida_en/',
                'sort_order' => 1
            ));
            $wpdb->insert($table_entities, array(
                'name' => 'Hajime Construction Co., Ltd.',
                'icon' => 'architecture',
                'description' => 'Specializing in high-efficiency residential construction and innovative housing systems that redefine modern living standards.',
                'link_text' => 'JAPAN HQ',
                'link_url' => 'https://www.hajime-kensetsu.co.jp/en/',
                'sort_order' => 2
            ));
            $wpdb->insert($table_entities, array(
                'name' => 'Tact Home Co., Ltd.',
                'icon' => 'foundation',
                'description' => 'Innovative prefab solutions and swift delivery systems that maintain rigorous Japanese structural integrity standards.',
                'link_text' => 'FAST-TRACK CONST.',
                'link_url' => 'https://www.tacthome.co.id/',
                'sort_order' => 3
            ));
            $wpdb->insert($table_entities, array(
                'name' => 'Touei Housing Corporation',
                'icon' => 'home_work',
                'description' => 'Expertise in premium urban housing, focusing on architectural aesthetics and high-durability construction techniques.',
                'link_text' => 'URBAN DESIGN',
                'link_url' => 'https://www.ighd.co.jp/en/corporate/group/touei_housing.html',
                'sort_order' => 4
            ));
            $wpdb->insert($table_entities, array(
                'name' => 'Arnest One Corporation',
                'icon' => 'engineering',
                'description' => 'Driving technical R&D in earthquake-resistant structures and thermal insulation technology for diverse climates.',
                'link_text' => 'TECH R&D',
                'link_url' => 'https://www.ighd.co.jp/en/corporate/group/arnest_one.html',
                'sort_order' => 5
            ));
            $wpdb->insert($table_entities, array(
                'name' => 'IO Home Co., Ltd.',
                'icon' => 'landscape',
                'description' => 'Comprehensive property management and after-sales support ensuring long-term value for every Iida homeowner.',
                'link_text' => 'SERVICE & CARE',
                'link_url' => 'https://idhome.co.jp/recruit-en/about',
                'sort_order' => 6
            ));
        }

        update_option('bricklet_db_installed_v2', '3.0');
    }

    // New DB version 4.0 setup (About Us CRUD)
    if (get_option('bricklet_db_installed_v3') !== '4.0') {
        $table_about = $wpdb->prefix . 'igh_homepage_about';
        $sql_about = "CREATE TABLE $table_about (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            badge_text varchar(255) NOT NULL DEFAULT '',
            title varchar(255) NOT NULL DEFAULT '',
            paragraph1 text NOT NULL,
            paragraph2 text NOT NULL,
            check_1 varchar(255) NOT NULL DEFAULT '',
            check_2 varchar(255) NOT NULL DEFAULT '',
            check_3 varchar(255) NOT NULL DEFAULT '',
            btn_text varchar(255) NOT NULL DEFAULT '',
            btn_link varchar(255) NOT NULL DEFAULT '',
            image_url varchar(255) NOT NULL DEFAULT '',
            experience_years varchar(100) NOT NULL DEFAULT '',
            experience_text varchar(255) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
        ) $charset_collate;";
        dbDelta($sql_about);

        // Seed homepage about section
        if ($wpdb->get_var("SELECT COUNT(*) FROM $table_about") == 0) {
            $wpdb->insert($table_about, array(
                'badge_text' => 'About Us',
                'title' => 'PT Iida Group Holdings',
                'paragraph1' => 'PT Iida Group Holdings is a subsidiary of a prestigious Japanese developer company, established in July 2016 in Indonesia.',
                'paragraph2' => 'Our parent company, Iida Group Holdings Co., Ltd., integrates over 50 years of experience across six listed detached housing companies. We aim to realize a market environment where all are able to afford a high-quality house through innovative Japanese housing technology.',
                'check_1' => '100% Owned by Iida Group Holdings Group',
                'check_2' => 'Earthquake-resistant Japanese Technology',
                'check_3' => 'National Collaboration with PERUMNAS',
                'btn_text' => 'Learn More About Our Journey',
                'btn_link' => '/company-profile/',
                'image_url' => get_template_directory_uri() . '/images/layout/timber-house-collaboration.webp',
                'experience_years' => '50+ Years',
                'experience_text' => 'Japanese Engineering Heritage'
            ));
        }

        update_option('bricklet_db_installed_v3', '4.0');
    }
}
add_action('after_switch_theme', 'bricklet_setup_database');
add_action('init', 'bricklet_setup_database');


// ----------------------------------------------------
// 2. Admin Menu Registration
// ----------------------------------------------------
function bricklet_admin_crud_menus() {
    add_menu_page(
        'Construction Products',
        'Construction Products',
        'manage_options',
        'bricklet-construction-products',
        'bricklet_render_construction_products_page',
        'dashicons-hammer',
        25
    );
    
    add_submenu_page(
        'bricklet-construction-products',
        'All Products',
        'All Products',
        'manage_options',
        'bricklet-construction-products',
        'bricklet_render_construction_products_page'
    );
    
    add_submenu_page(
        'bricklet-construction-products',
        'Categories',
        'Categories',
        'manage_options',
        'bricklet-construction-categories',
        'bricklet_render_construction_categories_page'
    );
    
    add_menu_page(
        'Osaka Products',
        'Osaka Products',
        'manage_options',
        'bricklet-osaka-products',
        'bricklet_render_osaka_products_page',
        'dashicons-grid-view',
        26
    );

    // New Custom Pages CRUD
    add_menu_page(
        'Page Content Settings',
        'Page Content Settings',
        'manage_options',
        'igh-homepage-hero',
        'bricklet_render_homepage_hero_page',
        'dashicons-admin-customizer',
        27
    );
    
    add_submenu_page(
        'igh-homepage-hero',
        'Homepage Hero',
        'Homepage Hero',
        'manage_options',
        'igh-homepage-hero',
        'bricklet_render_homepage_hero_page'
    );
    
    add_submenu_page(
        'igh-homepage-hero',
        'Company Profile',
        'Company Profile',
        'manage_options',
        'igh-company-profile',
        'bricklet_render_company_profile_page'
    );
    
    add_submenu_page(
        'igh-homepage-hero',
        'Group Company',
        'Group Company',
        'manage_options',
        'igh-group-company',
        'bricklet_render_group_company_page'
    );
    
    add_submenu_page(
        'igh-homepage-hero',
        'Homepage About Us',
        'Homepage About Us',
        'manage_options',
        'igh-homepage-about',
        'bricklet_render_homepage_about_page'
    );
}
add_action('admin_menu', 'bricklet_admin_crud_menus');


// ----------------------------------------------------
// 3. Helper Functions
// ----------------------------------------------------
function bricklet_get_all_categories() {
    global $wpdb;
    $table = $wpdb->prefix . 'construction_categories';
    return $wpdb->get_results("SELECT * FROM $table ORDER BY name ASC", ARRAY_A);
}


// ----------------------------------------------------
// 4. Construction Products CRUD Page
// ----------------------------------------------------
function bricklet_render_construction_products_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_products = $wpdb->prefix . 'construction_products';
    
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Process Form Submissions
    if (isset($_POST['bricklet_submit_product'])) {
        check_admin_referer('bricklet_product_nonce', 'bricklet_product_nonce_field');
        
        $product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        
        $img_url = isset($_POST['img_existing']) ? esc_url_raw($_POST['img_existing']) : '';
        
        if (!empty($_FILES['img_file']['name'])) {
            $product_name = sanitize_text_field($_POST['name']);
            $clean_name = str_replace(array('/', '\\', ':', '*', '?', '"', '<', '>', '|'), '-', $product_name);
            $clean_name = html_entity_decode($clean_name, ENT_QUOTES, 'UTF-8');
            $clean_name = wp_strip_all_tags($clean_name);
            $clean_name = trim(preg_replace('/\s+/', ' ', $clean_name));
            if (empty($clean_name)) {
                $clean_name = 'unnamed-product';
            }
            
            $dest_dir = get_template_directory() . '/Construction Products/' . $clean_name;
            if (!file_exists($dest_dir)) {
                mkdir($dest_dir, 0755, true);
            }
            
            $filename = sanitize_file_name($_FILES['img_file']['name']);
            $dest_path = $dest_dir . '/' . $filename;
            
            if (move_uploaded_file($_FILES['img_file']['tmp_name'], $dest_path)) {
                $img_url = get_template_directory_uri() . '/Construction Products/' . rawurlencode($clean_name) . '/' . rawurlencode($filename);
            } else {
                echo '<div class="notice notice-error"><p>Failed to save uploaded image.</p></div>';
            }
        }
        
        $data = array(
            'brand' => sanitize_text_field($_POST['brand']),
            'category_id' => sanitize_text_field($_POST['category_id']),
            'code' => sanitize_text_field($_POST['code']),
            'name' => sanitize_text_field($_POST['name']),
            'spec' => sanitize_textarea_field($_POST['spec']),
            'price' => intval($_POST['price']),
            'img' => $img_url
        );
        
        if ($product_id > 0) {
            $wpdb->update($table_products, $data, array('id' => $product_id));
            echo '<div class="notice notice-success is-dismissible"><p>Product updated successfully.</p></div>';
        } else {
            $wpdb->insert($table_products, $data);
            echo '<div class="notice notice-success is-dismissible"><p>Product created successfully.</p></div>';
        }
        $action = ''; // return to list
    }
    
    // Process Deletion
    if ($action === 'delete' && $product_id > 0) {
        check_admin_referer('bricklet_delete_product_' . $product_id);
        $wpdb->delete($table_products, array('id' => $product_id));
        echo '<div class="notice notice-success is-dismissible"><p>Product deleted successfully.</p></div>';
        $action = ''; // return to list
    }
    
    // RENDER SCREENS
    if ($action === 'add' || $action === 'edit') {
        $product = array('id' => '', 'brand' => '', 'category_id' => '', 'code' => '', 'name' => '', 'spec' => '', 'price' => 0, 'img' => '');
        if ($action === 'edit' && $product_id > 0) {
            $fetched = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_products WHERE id = %d", $product_id), ARRAY_A);
            if ($fetched) {
                $product = $fetched;
            }
        }
        
        $categories = bricklet_get_all_categories();
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo $action === 'add' ? 'Add New Product' : 'Edit Product'; ?></h1>
            <a href="?page=bricklet-construction-products" class="page-title-action">Back to List</a>
            
            <form method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                <?php wp_nonce_field('bricklet_product_nonce', 'bricklet_product_nonce_field'); ?>
                <input type="hidden" name="id" value="<?php echo esc_attr($product['id']); ?>" />
                
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="brand">Brand</label></th>
                            <td>
                                <select name="brand" id="brand" required>
                                    <option value="rucika" <?php selected($product['brand'], 'rucika'); ?>>Rucika</option>
                                    <option value="rbshera" <?php selected($product['brand'], 'rbshera'); ?>>RB Shera</option>
                                    <option value="granito" <?php selected($product['brand'], 'granito'); ?>>GRANITO</option>
                                    <option value="terraco" <?php selected($product['brand'], 'terraco'); ?>>Terraco Rapi</option>
                                    <option value="dusaspun" <?php selected($product['brand'], 'dusaspun'); ?>>Dusaspun</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="category_id">Subcategory</label></th>
                            <td>
                                <select name="category_id" id="category_id" required>
                                    <?php foreach ($categories as $cat) : ?>
                                        <option value="<?php echo esc_attr($cat['category_id']); ?>" <?php selected($product['category_id'], $cat['category_id']); ?>>
                                            <?php echo esc_html(strtoupper($cat['brand']) . ' - ' . html_entity_decode($cat['name'])); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="code">Product Code / SKU</label></th>
                            <td>
                                <input name="code" type="text" id="code" value="<?php echo esc_attr($product['code']); ?>" class="regular-text" required />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="name">Product Name</label></th>
                            <td>
                                <input name="name" type="text" id="name" value="<?php echo esc_attr($product['name']); ?>" class="regular-text" required />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="spec">Specifications / Detail</label></th>
                            <td>
                                <textarea name="spec" id="spec" rows="5" cols="50" class="large-text" required><?php echo esc_textarea($product['spec']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="price">Price (IDR)</label></th>
                            <td>
                                <input name="price" type="number" id="price" value="<?php echo esc_attr($product['price']); ?>" class="regular-text" min="0" required />
                                <p class="description">Set to 0 to show "Hubungi Kami".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="img_file">Upload Image</label></th>
                            <td>
                                <input type="hidden" name="img_existing" value="<?php echo esc_attr($product['img']); ?>" />
                                <input name="img_file" type="file" id="img_file" <?php echo empty($product['img']) ? 'required' : ''; ?> />
                                <?php if (!empty($product['img'])) : ?>
                                    <p class="description">Current image:</p>
                                    <img src="<?php echo esc_url($product['img']); ?>" style="max-height: 100px; margin-top: 10px; border: 1px solid #ccc; border-radius: 4px;" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <p class="submit">
                    <input type="submit" name="bricklet_submit_product" id="submit" class="button button-primary" value="Save Product" />
                </p>
            </form>
        </div>
        <?php
    } else {
        // LIST SCREEN
        $per_page = 20;
        $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
        $offset = ($current_page - 1) * $per_page;
        
        $search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
        $brand_filter = isset($_GET['brand']) ? sanitize_text_field($_GET['brand']) : '';
        
        $where = " WHERE 1=1 ";
        if (!empty($search)) {
            $where .= $wpdb->prepare(" AND (code LIKE %s OR name LIKE %s OR spec LIKE %s) ", '%' . $search . '%', '%' . $search . '%', '%' . $search . '%');
        }
        if (!empty($brand_filter)) {
            $where .= $wpdb->prepare(" AND brand = %s ", $brand_filter);
        }
        
        $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_products $where");
        $products = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_products $where ORDER BY id DESC LIMIT %d OFFSET %d", $per_page, $offset), ARRAY_A);
        $total_pages = ceil($total_items / $per_page);
        
        $categories_map = array();
        foreach (bricklet_get_all_categories() as $c) {
            $categories_map[$c['category_id']] = $c['name'];
        }
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">Construction Materials</h1>
            <a href="?page=bricklet-construction-products&action=add" class="page-title-action">Add New Product</a>
            
            <hr class="wp-header-end">
            
            <!-- Filters & Search Form -->
            <form method="get" style="margin: 20px 0; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                <input type="hidden" name="page" value="bricklet-construction-products" />
                
                <input type="text" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Search code, name, specs..." class="regular-text" style="margin:0; height: 30px;" />
                
                <select name="brand" style="margin:0; height: 30px;">
                    <option value="">All Brands</option>
                    <option value="rucika" <?php selected($brand_filter, 'rucika'); ?>>Rucika</option>
                    <option value="rbshera" <?php selected($brand_filter, 'rbshera'); ?>>RB Shera</option>
                    <option value="granito" <?php selected($brand_filter, 'granito'); ?>>GRANITO</option>
                    <option value="terraco" <?php selected($brand_filter, 'terraco'); ?>>Terraco Rapi</option>
                    <option value="dusaspun" <?php selected($brand_filter, 'dusaspun'); ?>>Dusaspun</option>
                </select>
                
                <input type="submit" class="button button-primary" value="Filter / Search" />
                <?php if (!empty($search) || !empty($brand_filter)) : ?>
                    <a href="?page=bricklet-construction-products" class="button">Reset</a>
                <?php endif; ?>
                
                <span class="displaying-num" style="margin-left: auto; color: #666; font-style: italic;">Total: <?php echo intval($total_items); ?> products</span>
            </form>
            
            <table class="wp-list-table widefat fixed striped table-view-list posts">
                <thead>
                    <tr>
                        <th scope="col" class="manage-column" style="width: 70px;">Image</th>
                        <th scope="col" class="manage-column" style="width: 130px;">Code / SKU</th>
                        <th scope="col" class="manage-column">Product Details</th>
                        <th scope="col" class="manage-column" style="width: 100px;">Brand</th>
                        <th scope="col" class="manage-column" style="width: 150px;">Subcategory</th>
                        <th scope="col" class="manage-column" style="width: 130px;">Price</th>
                        <th scope="col" class="manage-column" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr><td colspan="7">No products found.</td></tr>
                    <?php else : ?>
                        <?php foreach ($products as $p) : ?>
                            <tr>
                                <td>
                                    <img src="<?php echo esc_url($p['img']); ?>" style="width: 45px; height: 45px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;" />
                                </td>
                                <td><strong><?php echo esc_html($p['code']); ?></strong></td>
                                <td>
                                    <strong style="font-size: 1.05em; color: #1d2327;"><?php echo esc_html(html_entity_decode($p['name'])); ?></strong>
                                    <p style="margin: 4px 0 0 0; color: #666; font-size: 0.9em;"><?php echo esc_html(html_entity_decode($p['spec'])); ?></p>
                                </td>
                                <td><span class="tag" style="background: #eef2f7; padding: 4px 8px; border-radius: 4px; font-weight: bold; text-transform: uppercase; font-size: 0.85em;"><?php echo esc_html($p['brand']); ?></span></td>
                                <td><?php echo esc_html(html_entity_decode(isset($categories_map[$p['category_id']]) ? $categories_map[$p['category_id']] : $p['category_id'])); ?></td>
                                <td>
                                    <?php if ($p['price'] > 0) : ?>
                                        <strong style="color: #005a9c;">Rp <?php echo number_format($p['price'], 0, ',', '.'); ?></strong>
                                    <?php else : ?>
                                        <span style="color: #888; font-style: italic;">Hubungi Kami</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="?page=bricklet-construction-products&action=edit&id=<?php echo $p['id']; ?>" class="button button-small">Edit</a>
                                    <a href="<?php echo wp_nonce_url('?page=bricklet-construction-products&action=delete&id=' . $p['id'], 'bricklet_delete_product_' . $p['id']); ?>" class="button button-small button-link-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1) : ?>
                <div class="tablenav bottom">
                    <div class="tablenav-pages">
                        <span class="pagination-links">
                            <?php
                            echo paginate_links(array(
                                'base' => add_query_arg('paged', '%#%'),
                                'format' => '',
                                'prev_text' => __('&laquo; Previous'),
                                'next_text' => __('Next &raquo;'),
                                'total' => $total_pages,
                                'current' => $current_page
                            ));
                            ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}


// ----------------------------------------------------
// 5. Construction Categories CRUD Page
// ----------------------------------------------------
function bricklet_render_construction_categories_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_categories = $wpdb->prefix . 'construction_categories';
    
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $cat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Process form submissions
    if (isset($_POST['bricklet_submit_category'])) {
        check_admin_referer('bricklet_category_nonce', 'bricklet_category_nonce_field');
        
        $cat_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        
        $data = array(
            'category_id' => sanitize_text_field($_POST['category_id']),
            'brand' => sanitize_text_field($_POST['brand']),
            'name' => sanitize_text_field($_POST['name'])
        );
        
        if ($cat_id > 0) {
            $wpdb->update($table_categories, $data, array('id' => $cat_id));
            echo '<div class="notice notice-success is-dismissible"><p>Category updated successfully.</p></div>';
        } else {
            $wpdb->insert($table_categories, $data);
            echo '<div class="notice notice-success is-dismissible"><p>Category created successfully.</p></div>';
        }
        $action = '';
    }
    
    // Process deletion
    if ($action === 'delete' && $cat_id > 0) {
        check_admin_referer('bricklet_delete_category_' . $cat_id);
        $wpdb->delete($table_categories, array('id' => $cat_id));
        echo '<div class="notice notice-success is-dismissible"><p>Category deleted successfully.</p></div>';
        $action = '';
    }
    
    if ($action === 'add' || $action === 'edit') {
        $category = array('id' => '', 'category_id' => '', 'brand' => '', 'name' => '');
        if ($action === 'edit' && $cat_id > 0) {
            $fetched = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_categories WHERE id = %d", $cat_id), ARRAY_A);
            if ($fetched) {
                $category = $fetched;
            }
        }
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo $action === 'add' ? 'Add New Category' : 'Edit Category'; ?></h1>
            <a href="?page=bricklet-construction-categories" class="page-title-action">Back to List</a>
            
            <form method="post" style="margin-top: 20px;">
                <?php wp_nonce_field('bricklet_category_nonce', 'bricklet_category_nonce_field'); ?>
                <input type="hidden" name="id" value="<?php echo esc_attr($category['id']); ?>" />
                
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="brand">Brand</label></th>
                            <td>
                                <select name="brand" id="brand" required>
                                    <option value="rucika" <?php selected($category['brand'], 'rucika'); ?>>Rucika</option>
                                    <option value="rbshera" <?php selected($category['brand'], 'rbshera'); ?>>RB Shera</option>
                                    <option value="granito" <?php selected($category['brand'], 'granito'); ?>>GRANITO</option>
                                    <option value="terraco" <?php selected($category['brand'], 'terraco'); ?>>Terraco Rapi</option>
                                    <option value="dusaspun" <?php selected($category['brand'], 'dusaspun'); ?>>Dusaspun</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="category_id">Category ID (Numeric or Unique tag)</label></th>
                            <td>
                                <input name="category_id" type="text" id="category_id" value="<?php echo esc_attr($category['category_id']); ?>" class="regular-text" required />
                                <p class="description">Used in database linking. Example: "24", "uditch", "palazzo".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="name">Category Name</label></th>
                            <td>
                                <input name="name" type="text" id="name" value="<?php echo esc_attr($category['name']); ?>" class="regular-text" required />
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <p class="submit">
                    <input type="submit" name="bricklet_submit_category" id="submit" class="button button-primary" value="Save Category" />
                </p>
            </form>
        </div>
        <?php
    } else {
        // List screen
        $categories = $wpdb->get_results("SELECT * FROM $table_categories ORDER BY brand ASC, name ASC", ARRAY_A);
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">Construction Categories</h1>
            <a href="?page=bricklet-construction-categories&action=add" class="page-title-action">Add New Category</a>
            
            <hr class="wp-header-end">
            
            <table class="wp-list-table widefat fixed striped table-view-list posts" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col" class="manage-column" style="width: 150px;">Brand</th>
                        <th scope="col" class="manage-column" style="width: 150px;">Category ID</th>
                        <th scope="col" class="manage-column">Category Name</th>
                        <th scope="col" class="manage-column" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($categories)) : ?>
                        <tr><td colspan="4">No categories found.</td></tr>
                    <?php else : ?>
                        <?php foreach ($categories as $c) : ?>
                            <tr>
                                <td><span class="tag" style="background: #eef2f7; padding: 4px 8px; border-radius: 4px; font-weight: bold; text-transform: uppercase; font-size: 0.85em;"><?php echo esc_html($c['brand']); ?></span></td>
                                <td><code><?php echo esc_html($c['category_id']); ?></code></td>
                                <td><strong><?php echo esc_html(html_entity_decode($c['name'])); ?></strong></td>
                                <td>
                                    <a href="?page=bricklet-construction-categories&action=edit&id=<?php echo $c['id']; ?>" class="button button-small">Edit</a>
                                    <a href="<?php echo wp_nonce_url('?page=bricklet-construction-categories&action=delete&id=' . $c['id'], 'bricklet_delete_category_' . $c['id']); ?>" class="button button-small button-link-delete" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}


// ----------------------------------------------------
// 6. Osaka Products CRUD Page
// ----------------------------------------------------
function bricklet_render_osaka_products_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_osaka = $wpdb->prefix . 'osaka_products';
    
    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    // Process form submissions
    if (isset($_POST['bricklet_submit_osaka'])) {
        check_admin_referer('bricklet_osaka_nonce', 'bricklet_osaka_nonce_field');
        
        $product_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        
        $img_url = isset($_POST['img_existing']) ? esc_url_raw($_POST['img_existing']) : '';
        
        if (!empty($_FILES['img_file']['name'])) {
            $product_name = sanitize_text_field($_POST['name']);
            $clean_name = str_replace(array('/', '\\', ':', '*', '?', '"', '<', '>', '|'), '-', $product_name);
            $clean_name = html_entity_decode($clean_name, ENT_QUOTES, 'UTF-8');
            $clean_name = wp_strip_all_tags($clean_name);
            $clean_name = trim(preg_replace('/\s+/', ' ', $clean_name));
            if (empty($clean_name)) {
                $clean_name = 'unnamed-product';
            }
            
            $dest_dir = get_template_directory() . '/Osaka Products/' . $clean_name;
            if (!file_exists($dest_dir)) {
                mkdir($dest_dir, 0755, true);
            }
            
            $filename = sanitize_file_name($_FILES['img_file']['name']);
            $dest_path = $dest_dir . '/' . $filename;
            
            if (move_uploaded_file($_FILES['img_file']['tmp_name'], $dest_path)) {
                $img_url = get_template_directory_uri() . '/Osaka Products/' . rawurlencode($clean_name) . '/' . rawurlencode($filename);
            } else {
                echo '<div class="notice notice-error"><p>Failed to save uploaded image.</p></div>';
            }
        }
        
        $data = array(
            'type_group' => sanitize_text_field($_POST['type_group']),
            'name' => sanitize_text_field($_POST['name']),
            'thickness' => sanitize_text_field($_POST['thickness']),
            'weight' => sanitize_text_field($_POST['weight']),
            'strength' => sanitize_text_field($_POST['strength']),
            'num_per_sqm' => sanitize_text_field($_POST['num_per_sqm']),
            'min_order' => sanitize_text_field($_POST['min_order']),
            'img' => $img_url
        );
        
        if ($product_id > 0) {
            $wpdb->update($table_osaka, $data, array('id' => $product_id));
            echo '<div class="notice notice-success is-dismissible"><p>Osaka product updated successfully.</p></div>';
        } else {
            $wpdb->insert($table_osaka, $data);
            echo '<div class="notice notice-success is-dismissible"><p>Osaka product created successfully.</p></div>';
        }
        $action = '';
    }
    
    // Process deletion
    if ($action === 'delete' && $product_id > 0) {
        check_admin_referer('bricklet_delete_osaka_' . $product_id);
        $wpdb->delete($table_osaka, array('id' => $product_id));
        echo '<div class="notice notice-success is-dismissible"><p>Osaka product deleted successfully.</p></div>';
        $action = '';
    }
    
    if ($action === 'add' || $action === 'edit') {
        $product = array('id' => '', 'type_group' => 'Concrete Block', 'name' => '', 'thickness' => '', 'weight' => '', 'strength' => '', 'num_per_sqm' => '', 'min_order' => '', 'img' => '');
        if ($action === 'edit' && $product_id > 0) {
            $fetched = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_osaka WHERE id = %d", $product_id), ARRAY_A);
            if ($fetched) {
                $product = $fetched;
            }
        }
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline"><?php echo $action === 'add' ? 'Add New Osaka Product' : 'Edit Osaka Product'; ?></h1>
            <a href="?page=bricklet-osaka-products" class="page-title-action">Back to List</a>
            
            <form method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                <?php wp_nonce_field('bricklet_osaka_nonce', 'bricklet_osaka_nonce_field'); ?>
                <input type="hidden" name="id" value="<?php echo esc_attr($product['id']); ?>" />
                
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="type_group">Type Group</label></th>
                            <td>
                                <select name="type_group" id="type_group" required>
                                    <option value="Concrete Block" <?php selected($product['type_group'], 'Concrete Block'); ?>>Concrete Block</option>
                                    <option value="Paving Block" <?php selected($product['type_group'], 'Paving Block'); ?>>Paving Block</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="name">Product Name</label></th>
                            <td>
                                <input name="name" type="text" id="name" value="<?php echo esc_attr($product['name']); ?>" class="regular-text" required />
                                <p class="description">Example: "Yoko Block", "P3 Block".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="thickness">Thickness</label></th>
                            <td>
                                <input name="thickness" type="text" id="thickness" value="<?php echo esc_attr($product['thickness']); ?>" class="regular-text" required />
                                <p class="description">Example: "15 cm", "8 cm".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="weight">Weight</label></th>
                            <td>
                                <input name="weight" type="text" id="weight" value="<?php echo esc_attr($product['weight']); ?>" class="regular-text" required />
                                <p class="description">Example: "12.5 kg/pcs", "1.5 kg/pcs".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="strength">Strength</label></th>
                            <td>
                                <input name="strength" type="text" id="strength" value="<?php echo esc_attr($product['strength']); ?>" class="regular-text" required />
                                <p class="description">Example: "More than 8 N/mm²", "More than 150 kg/cm²".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="num_per_sqm">Number / sqm</label></th>
                            <td>
                                <input name="num_per_sqm" type="text" id="num_per_sqm" value="<?php echo esc_attr($product['num_per_sqm']); ?>" class="regular-text" required />
                                <p class="description">Example: "12.5", "98".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="min_order">Minimum Order</label></th>
                            <td>
                                <input name="min_order" type="text" id="min_order" value="<?php echo esc_attr($product['min_order']); ?>" class="regular-text" required />
                                <p class="description">Example: "576 pcs", "48 sqm".</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="img_file">Upload Image</label></th>
                            <td>
                                <input type="hidden" name="img_existing" value="<?php echo esc_attr($product['img']); ?>" />
                                <input name="img_file" type="file" id="img_file" <?php echo empty($product['img']) ? 'required' : ''; ?> />
                                <?php if (!empty($product['img'])) : ?>
                                    <p class="description">Current image:</p>
                                    <img src="<?php echo esc_url($product['img']); ?>" style="max-height: 100px; margin-top: 10px; border: 1px solid #ccc; border-radius: 4px;" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <p class="submit">
                    <input type="submit" name="bricklet_submit_osaka" id="submit" class="button button-primary" value="Save Osaka Product" />
                </p>
            </form>
        </div>
        <?php
    } else {
        // List screen
        $products = $wpdb->get_results("SELECT * FROM $table_osaka ORDER BY type_group ASC, id ASC", ARRAY_A);
        ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">Osaka Strong CB Products</h1>
            <a href="?page=bricklet-osaka-products&action=add" class="page-title-action">Add New Osaka Product</a>
            
            <hr class="wp-header-end">
            
            <table class="wp-list-table widefat fixed striped table-view-list posts" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col" class="manage-column" style="width: 70px;">Image</th>
                        <th scope="col" class="manage-column" style="width: 150px;">Type Group</th>
                        <th scope="col" class="manage-column">Name</th>
                        <th scope="col" class="manage-column" style="width: 100px;">Thickness</th>
                        <th scope="col" class="manage-column" style="width: 100px;">Weight</th>
                        <th scope="col" class="manage-column" style="width: 180px;">Strength</th>
                        <th scope="col" class="manage-column" style="width: 110px;">Number / sqm</th>
                        <th scope="col" class="manage-column" style="width: 110px;">Min Order</th>
                        <th scope="col" class="manage-column" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)) : ?>
                        <tr><td colspan="9">No products found.</td></tr>
                    <?php else : ?>
                        <?php foreach ($products as $p) : ?>
                            <tr>
                                <td>
                                    <img src="<?php echo esc_url($p['img']); ?>" style="width: 45px; height: 45px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;" />
                                </td>
                                <td><span class="tag" style="background: #eef2f7; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85em;"><?php echo esc_html($p['type_group']); ?></span></td>
                                <td><strong><?php echo esc_html($p['name']); ?></strong></td>
                                <td><?php echo esc_html($p['thickness']); ?></td>
                                <td><?php echo esc_html($p['weight']); ?></td>
                                <td><code><?php echo esc_html($p['strength']); ?></code></td>
                                <td><?php echo esc_html($p['num_per_sqm']); ?></td>
                                <td><?php echo esc_html($p['min_order']); ?></td>
                                <td>
                                    <a href="?page=bricklet-osaka-products&action=edit&id=<?php echo $p['id']; ?>" class="button button-small">Edit</a>
                                    <a href="<?php echo wp_nonce_url('?page=bricklet-osaka-products&action=delete&id=' . $p['id'], 'bricklet_delete_osaka_' . $p['id']); ?>" class="button button-small button-link-delete" onclick="return confirm('Are you sure you want to delete this Osaka product?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

// ====================================================
// 7. File Upload & Caching Helpers
// ====================================================
function bricklet_handle_file_upload($file_key) {
    if (empty($_FILES[$file_key]['name'])) {
        return '';
    }
    
    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }
    
    $uploaded_file = $_FILES[$file_key];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploaded_file, $upload_overrides);
    
    if ($movefile && !isset($movefile['error'])) {
        return $movefile['url'];
    } else {
        return '';
    }
}

function bricklet_clear_page_cache() {
    $cache_dir = ABSPATH . 'wp-content/cache/simple-cache';
    if (is_dir($cache_dir)) {
        $files = glob($cache_dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
    }
}

// ====================================================
// 8. Custom Pages Admin CRUD Panels
// ====================================================

// 8a. Homepage Hero CRUD Page
function bricklet_render_homepage_hero_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_hero = $wpdb->prefix . 'igh_homepage_hero';
    $table_slides = $wpdb->prefix . 'igh_homepage_hero_slides';

    // Run dynamic DB upgrade check to ensure extra columns exist in the slides table
    $cols = $wpdb->get_col("DESCRIBE $table_slides");
    if (!in_array('badge_text', $cols)) {
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN badge_text varchar(255) NOT NULL DEFAULT ''");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN title varchar(255) NOT NULL DEFAULT ''");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN subtitle text NOT NULL");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN btn1_text varchar(100) NOT NULL DEFAULT ''");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN btn1_link varchar(255) NOT NULL DEFAULT ''");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN btn2_text varchar(100) NOT NULL DEFAULT ''");
        $wpdb->query("ALTER TABLE $table_slides ADD COLUMN btn2_link varchar(255) NOT NULL DEFAULT ''");
    }

    // Run dynamic DB upgrade check to ensure use_global_card exists in hero table
    $cols_hero = $wpdb->get_col("DESCRIBE $table_hero");
    if (!in_array('use_global_card', $cols_hero)) {
        $wpdb->query("ALTER TABLE $table_hero ADD COLUMN use_global_card tinyint(1) NOT NULL DEFAULT 0");
    }

    // Form 1: Handle Hero Mode Settings
    if (isset($_POST['bricklet_submit_hero_mode'])) {
        check_admin_referer('bricklet_hero_mode_nonce', 'bricklet_hero_mode_nonce_field');

        $wpdb->update($table_hero, array(
            'hero_mode' => sanitize_text_field($_POST['hero_mode'])
        ), array('id' => 1));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Hero Mode updated successfully.</p></div>';
    }

    // Form 2: Handle global hero card settings update
    if (isset($_POST['bricklet_submit_card'])) {
        check_admin_referer('bricklet_card_nonce', 'bricklet_card_nonce_field');

        $use_global_card = isset($_POST['use_global_card']) ? 1 : 0;

        $wpdb->update($table_hero, array(
            'badge_text' => sanitize_text_field($_POST['badge_text']),
            'title' => sanitize_text_field($_POST['title']),
            'subtitle' => sanitize_textarea_field($_POST['subtitle']),
            'btn1_text' => sanitize_text_field($_POST['btn1_text']),
            'btn1_link' => sanitize_text_field($_POST['btn1_link']),
            'btn2_text' => sanitize_text_field($_POST['btn2_text']),
            'btn2_link' => sanitize_text_field($_POST['btn2_link']),
            'use_global_card' => $use_global_card
        ), array('id' => 1));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Hero Card Content settings updated successfully.</p></div>';
    }

    // Form 3A: Handle Static Background Image Update
    if (isset($_POST['bricklet_submit_static_image'])) {
        check_admin_referer('bricklet_static_image_nonce', 'bricklet_static_image_nonce_field');

        $static_image_url = esc_url_raw($_POST['static_image_existing']);
        $uploaded_static = bricklet_handle_file_upload('static_image_file');
        if (!empty($uploaded_static)) {
            $static_image_url = $uploaded_static;
        }

        $wpdb->update($table_hero, array(
            'static_image_url' => $static_image_url
        ), array('id' => 1));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Static Background Image updated successfully.</p></div>';
    }

    // Form 3B: Handle Background Video Update
    if (isset($_POST['bricklet_submit_video'])) {
        check_admin_referer('bricklet_video_nonce', 'bricklet_video_nonce_field');

        $video_url = esc_url_raw($_POST['video_existing']);
        $uploaded_video = bricklet_handle_file_upload('video_file');
        if (!empty($uploaded_video)) {
            $video_url = $uploaded_video;
        }

        $wpdb->update($table_hero, array(
            'video_url' => $video_url
        ), array('id' => 1));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Background Video updated successfully.</p></div>';
    }

    // Form 3C: Handle Slider Slide Add
    if (isset($_POST['bricklet_add_slide'])) {
        check_admin_referer('bricklet_slide_nonce', 'bricklet_slide_nonce_field');
        $uploaded_slide = bricklet_handle_file_upload('slide_image_file');
        if (!empty($uploaded_slide)) {
            $max_order = $wpdb->get_var("SELECT MAX(sort_order) FROM $table_slides");
            $wpdb->insert($table_slides, array(
                'slide_image_url' => $uploaded_slide,
                'badge_text' => sanitize_text_field($_POST['slide_badge_text']),
                'title' => sanitize_text_field($_POST['slide_title']),
                'subtitle' => sanitize_textarea_field($_POST['slide_subtitle']),
                'btn1_text' => sanitize_text_field($_POST['slide_btn1_text']),
                'btn1_link' => sanitize_text_field($_POST['slide_btn1_link']),
                'btn2_text' => sanitize_text_field($_POST['slide_btn2_text']),
                'btn2_link' => sanitize_text_field($_POST['slide_btn2_link']),
                'sort_order' => intval($max_order) + 1
            ));
            bricklet_clear_page_cache();
            echo '<div class="notice notice-success is-dismissible"><p>New slide with overlay content added successfully.</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Failed to upload slide image.</p></div>';
        }
    }

    // Handle Slide Delete
    if (isset($_GET['action']) && $_GET['action'] === 'delete_slide' && isset($_GET['slide_id'])) {
        $slide_id = intval($_GET['slide_id']);
        check_admin_referer('bricklet_delete_slide_' . $slide_id);
        $wpdb->delete($table_slides, array('id' => $slide_id));
        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Slide deleted successfully.</p></div>';
    }

    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $slide_id = isset($_GET['slide_id']) ? intval($_GET['slide_id']) : 0;

    // Handle Slide Edit Submission
    if (isset($_POST['bricklet_update_slide'])) {
        check_admin_referer('bricklet_edit_slide_nonce', 'bricklet_edit_slide_nonce_field');
        $s_id = intval($_POST['edit_slide_id']);
        $slide_image_url = esc_url_raw($_POST['slide_image_existing']);
        $uploaded_slide = bricklet_handle_file_upload('edit_slide_image_file');
        if (!empty($uploaded_slide)) {
            $slide_image_url = $uploaded_slide;
        }

        $wpdb->update($table_slides, array(
            'slide_image_url' => $slide_image_url,
            'badge_text' => sanitize_text_field($_POST['edit_slide_badge_text']),
            'title' => sanitize_text_field($_POST['edit_slide_title']),
            'subtitle' => sanitize_textarea_field($_POST['edit_slide_subtitle']),
            'btn1_text' => sanitize_text_field($_POST['edit_slide_btn1_text']),
            'btn1_link' => sanitize_text_field($_POST['edit_slide_btn1_link']),
            'btn2_text' => sanitize_text_field($_POST['edit_slide_btn2_text']),
            'btn2_link' => sanitize_text_field($_POST['edit_slide_btn2_link'])
        ), array('id' => $s_id));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Slide updated successfully.</p></div>';
        $action = '';
        $slide_id = 0;
    }

    // Fetch data
    $hero = $wpdb->get_row("SELECT * FROM $table_hero WHERE id = 1", ARRAY_A);
    $slides = $wpdb->get_results("SELECT * FROM $table_slides ORDER BY sort_order ASC", ARRAY_A);

    $edit_slide = null;
    if ($action === 'edit_slide' && $slide_id > 0) {
        $edit_slide = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_slides WHERE id = %d", $slide_id), ARRAY_A);
    }
    ?>

    <div class="wrap">
        <h1>Homepage Hero Settings</h1>
        <p class="description">Manage background elements and overlays for the homepage hero area across three distinct sections.</p>
        
        <div style="display: grid; grid-template-columns: 1fr; gap: 30px; margin-top: 20px; max-width: 1000px;">
            
            <!-- SECTION 1: Hero Mode settings -->
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; box-shadow: 0 1px 1px rgba(0,0,0,0.04);">
                <h2 style="margin-top:0; border-bottom: 1px solid #eee; padding-bottom: 10px;">Section 1: Hero Mode Settings</h2>
                <form method="post">
                    <?php wp_nonce_field('bricklet_hero_mode_nonce', 'bricklet_hero_mode_nonce_field'); ?>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="hero_mode">Hero Mode</label></th>
                            <td>
                                <select name="hero_mode" id="hero_mode" style="width: 25rem;">
                                    <option value="static" <?php selected($hero['hero_mode'], 'static'); ?>>Static Image</option>
                                    <option value="slider" <?php selected($hero['hero_mode'], 'slider'); ?>>Image Slider</option>
                                    <option value="video" <?php selected($hero['hero_mode'], 'video'); ?>>Video Background</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <p class="submit" style="margin-top: 10px; padding-bottom: 0;">
                        <input type="submit" name="bricklet_submit_hero_mode" class="button button-primary" value="Save Hero Mode" />
                    </p>
                </form>
            </div>

            <!-- SECTION 2: Hero Card settings -->
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; box-shadow: 0 1px 1px rgba(0,0,0,0.04);">
                <h2 style="margin-top:0; border-bottom: 1px solid #eee; padding-bottom: 10px;">Section 2: Hero Card Content</h2>
                <p class="description" style="margin-bottom: 15px;">Text overlays and actions that appear on the static/video backgrounds (and act as a fallback for slider images).</p>
                <form method="post">
                    <?php wp_nonce_field('bricklet_card_nonce', 'bricklet_card_nonce_field'); ?>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="use_global_card">Force Global Card Content</label></th>
                            <td>
                                <input name="use_global_card" type="checkbox" id="use_global_card" value="1" <?php checked(isset($hero['use_global_card']) && (int)$hero['use_global_card'] === 1); ?> />
                                <span class="description" style="margin-left: 8px;">Use this Section 2 content on all slider slides, overriding slide-specific overlays.</span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="badge_text">Badge Text</label></th>
                            <td><input name="badge_text" type="text" id="badge_text" value="<?php echo esc_attr($hero['badge_text']); ?>" class="large-text" style="width: 25rem;" /></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="title">Title</label></th>
                            <td><input name="title" type="text" id="title" value="<?php echo esc_attr($hero['title']); ?>" class="large-text" style="width: 25rem;" /></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="subtitle">Subtitle</label></th>
                            <td><textarea name="subtitle" id="subtitle" rows="3" class="large-text" style="width: 25rem;"><?php echo esc_textarea($hero['subtitle']); ?></textarea></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="btn1_text">Button 1 Text</label></th>
                            <td><input name="btn1_text" type="text" id="btn1_text" value="<?php echo esc_attr($hero['btn1_text']); ?>" style="width: 25rem;" /></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="btn1_link">Button 1 Link</label></th>
                            <td><input name="btn1_link" type="text" id="btn1_link" value="<?php echo esc_attr($hero['btn1_link']); ?>" style="width: 25rem;" /></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="btn2_text">Button 2 Text</label></th>
                            <td><input name="btn2_text" type="text" id="btn2_text" value="<?php echo esc_attr($hero['btn2_text']); ?>" style="width: 25rem;" /></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="btn2_link">Button 2 Link</label></th>
                            <td><input name="btn2_link" type="text" id="btn2_link" value="<?php echo esc_attr($hero['btn2_link']); ?>" style="width: 25rem;" /></td>
                        </tr>
                    </table>
                    <p class="submit">
                        <input type="submit" name="bricklet_submit_card" class="button button-primary" value="Save Card Settings" />
                    </p>
                </form>
            </div>

            <!-- SECTION 3: Background Media Resources (Static / Video / Slider) -->
            <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; box-shadow: 0 1px 1px rgba(0,0,0,0.04);">
                <h2 style="margin-top:0; border-bottom: 1px solid #eee; padding-bottom: 10px;">Section 3: Background Media Resources (Static / Video / Slider)</h2>
                
                <!-- 3A: Static Image Settings -->
                <div style="background: #fafafa; padding: 15px; border: 1px solid #e5e5e5; border-radius: 3px; margin-top: 15px; margin-bottom: 20px;">
                    <h3 style="margin-top:0; margin-bottom: 10px;">Static Background Image Settings</h3>
                    <form method="post" enctype="multipart/form-data">
                        <?php wp_nonce_field('bricklet_static_image_nonce', 'bricklet_static_image_nonce_field'); ?>
                        <input type="hidden" name="static_image_existing" value="<?php echo esc_attr($hero['static_image_url']); ?>" />
                        <div style="margin-bottom: 10px;">
                            <input type="file" name="static_image_file" />
                        </div>
                        <?php if (!empty($hero['static_image_url'])): ?>
                            <div style="margin-bottom: 10px;">
                                <img src="<?php echo esc_url($hero['static_image_url']); ?>" style="max-height: 100px; border: 1px solid #ddd; border-radius: 4px;" />
                            </div>
                        <?php endif; ?>
                        <input type="submit" name="bricklet_submit_static_image" class="button button-secondary" value="Save Static Image" />
                    </form>
                </div>

                <!-- 3B: Background Video Settings -->
                <div style="background: #fafafa; padding: 15px; border: 1px solid #e5e5e5; border-radius: 3px; margin-bottom: 20px;">
                    <h3 style="margin-top:0; margin-bottom: 10px;">Background Video Settings (MP4)</h3>
                    <form method="post" enctype="multipart/form-data">
                        <?php wp_nonce_field('bricklet_video_nonce', 'bricklet_video_nonce_field'); ?>
                        <input type="hidden" name="video_existing" value="<?php echo esc_attr($hero['video_url']); ?>" />
                        <div style="margin-bottom: 10px;">
                            <input type="file" name="video_file" />
                        </div>
                        <?php if (!empty($hero['video_url'])): ?>
                            <p class="description" style="margin-bottom:10px;">Current video file: <code><?php echo esc_html(basename($hero['video_url'])); ?></code></p>
                        <?php endif; ?>
                        <input type="submit" name="bricklet_submit_video" class="button button-secondary" value="Save Background Video" />
                    </form>
                </div>

                <!-- 3C: Slider Slides Settings -->
                <div style="background: #fafafa; padding: 15px; border: 1px solid #e5e5e5; border-radius: 3px;">
                    <h3 style="margin-top:0; margin-bottom: 10px;">Slider Slides Settings</h3>
                    
                    <?php if ($edit_slide): ?>
                        <!-- EDIT SLIDE FORM -->
                        <h4 style="margin-top:15px; margin-bottom: 5px; color: #007cba;">Edit Slide #<?php echo $edit_slide['id']; ?></h4>
                        <form method="post" enctype="multipart/form-data" style="margin-bottom: 30px; background: #fff; padding: 15px; border: 1px solid #e5e5e5; border-radius: 3px;">
                            <?php wp_nonce_field('bricklet_edit_slide_nonce', 'bricklet_edit_slide_nonce_field'); ?>
                            <input type="hidden" name="edit_slide_id" value="<?php echo $edit_slide['id']; ?>" />
                            <input type="hidden" name="slide_image_existing" value="<?php echo esc_attr($edit_slide['slide_image_url']); ?>" />
                            
                            <div style="margin-bottom: 10px;">
                                <label style="display:block; font-weight:600; margin-bottom:5px;">Change Slide Image</label>
                                <input type="file" name="edit_slide_image_file" />
                                <?php if (!empty($edit_slide['slide_image_url'])): ?>
                                    <br/><img src="<?php echo esc_url($edit_slide['slide_image_url']); ?>" style="max-height: 70px; margin-top: 10px; border: 1px solid #ddd; border-radius: 4px;" />
                                <?php endif; ?>
                            </div>
                            
                            <h4 style="margin-top:15px; margin-bottom: 5px; border-bottom: 1px dashed #ddd; padding-bottom: 5px;">Slide Hero Text Overlays</h4>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Badge Text</label>
                                    <input name="edit_slide_badge_text" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['badge_text']); ?>" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Title</label>
                                    <input name="edit_slide_title" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['title']); ?>" />
                                </div>
                                <div style="grid-column: span 2;">
                                    <label style="display:block; margin-bottom:3px;">Subtitle</label>
                                    <textarea name="edit_slide_subtitle" rows="2" style="width: 100%;"><?php echo esc_textarea($edit_slide['subtitle']); ?></textarea>
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 1 Text</label>
                                    <input name="edit_slide_btn1_text" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['btn1_text']); ?>" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 1 Link</label>
                                    <input name="edit_slide_btn1_link" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['btn1_link']); ?>" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 2 Text</label>
                                    <input name="edit_slide_btn2_text" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['btn2_text']); ?>" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 2 Link</label>
                                    <input name="edit_slide_btn2_link" type="text" style="width: 100%;" value="<?php echo esc_attr($edit_slide['btn2_link']); ?>" />
                                </div>
                            </div>
                            
                            <div style="margin-top: 15px; display: flex; gap: 10px;">
                                <input type="submit" name="bricklet_update_slide" class="button button-primary" value="Update Slide" />
                                <a href="?page=igh-homepage-hero" class="button button-secondary">Cancel</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- ADD NEW SLIDE FORM -->
                        <h4 style="margin-top:15px; margin-bottom: 5px;">Add New Slide</h4>
                        <form method="post" enctype="multipart/form-data" style="margin-bottom: 30px; background: #fff; padding: 15px; border: 1px solid #e5e5e5; border-radius: 3px;">
                            <?php wp_nonce_field('bricklet_slide_nonce', 'bricklet_slide_nonce_field'); ?>
                            
                            <div style="margin-bottom: 10px;">
                                <label style="display:block; font-weight:600; margin-bottom:5px;">Slide Image <span style="color:red;">*</span></label>
                                <input type="file" name="slide_image_file" required />
                            </div>
                            
                            <h4 style="margin-top:15px; margin-bottom: 5px; border-bottom: 1px dashed #ddd; padding-bottom: 5px;">Slide Hero Text Overlays (Optional)</h4>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Badge Text</label>
                                    <input name="slide_badge_text" type="text" style="width: 100%;" placeholder="e.g. Japanese Engineering Standards" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Title</label>
                                    <input name="slide_title" type="text" style="width: 100%;" placeholder="e.g. Adorning you at every edge" />
                                </div>
                                <div style="grid-column: span 2;">
                                    <label style="display:block; margin-bottom:3px;">Subtitle</label>
                                    <textarea name="slide_subtitle" rows="2" style="width: 100%;" placeholder="Slide caption text..."></textarea>
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 1 Text</label>
                                    <input name="slide_btn1_text" type="text" style="width: 100%;" placeholder="e.g. Discover More" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 1 Link</label>
                                    <input name="slide_btn1_link" type="text" style="width: 100%;" placeholder="e.g. /company-profile/" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 2 Text</label>
                                    <input name="slide_btn2_text" type="text" style="width: 100%;" placeholder="e.g. Our Portfolio" />
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom:3px;">Button 2 Link</label>
                                    <input name="slide_btn2_link" type="text" style="width: 100%;" placeholder="e.g. /products/" />
                                </div>
                            </div>
                            
                            <div style="margin-top: 15px;">
                                <input type="submit" name="bricklet_add_slide" class="button button-primary" value="Upload & Save Slide" />
                            </div>
                        </form>
                    <?php endif; ?>

                    <h4 style="margin-top:20px; border-bottom: 1px dashed #ddd; padding-bottom: 5px;">Existing Slides</h4>
                    <table class="wp-list-table widefat fixed striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 120px;">Slide Preview</th>
                                <th scope="col">Slide Card Overlay Details</th>
                                <th scope="col" style="width: 130px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($slides)): ?>
                                <tr><td colspan="3">No slides uploaded yet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($slides as $slide): ?>
                                    <tr>
                                        <td><img src="<?php echo esc_url($slide['slide_image_url']); ?>" style="max-height: 70px; border: 1px solid #ddd; border-radius: 4px;" /></td>
                                        <td>
                                            <?php if (!empty($slide['title'])): ?>
                                                <strong>Badge:</strong> <?php echo esc_html($slide['badge_text']); ?><br/>
                                                <strong>Title:</strong> <?php echo esc_html($slide['title']); ?><br/>
                                                <strong>Subtitle:</strong> <span class="description"><?php echo esc_html($slide['subtitle']); ?></span><br/>
                                                <strong>Button 1:</strong> <?php echo esc_html($slide['btn1_text']); ?> (<code><?php echo esc_html($slide['btn1_link']); ?></code>)<br/>
                                                <strong>Button 2:</strong> <?php echo esc_html($slide['btn2_text']); ?> (<code><?php echo esc_html($slide['btn2_link']); ?></code>)
                                            <?php else: ?>
                                                <span class="description">(No custom overlay text - uses global card settings fallback)</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="?page=igh-homepage-hero&action=edit_slide&slide_id=<?php echo $slide['id']; ?>" class="button button-secondary button-small" style="margin-bottom: 4px;">Edit</a>
                                            <a href="<?php echo wp_nonce_url('?page=igh-homepage-hero&action=delete_slide&slide_id=' . $slide['id'], 'bricklet_delete_slide_' . $slide['id']); ?>" class="button button-link-delete button-small" onclick="return confirm('Delete this slide?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <?php
}

// 8b. Company Profile CRUD Page
function bricklet_render_company_profile_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_company = $wpdb->prefix . 'igh_company_profile';
    $table_milestones = $wpdb->prefix . 'igh_company_profile_milestones';

    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $milestone_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Handle Milestone Actions (Add/Edit Form Submissions)
    if (isset($_POST['bricklet_submit_milestone'])) {
        check_admin_referer('bricklet_milestone_nonce', 'bricklet_milestone_nonce_field');
        $m_id = isset($_POST['milestone_id']) ? intval($_POST['milestone_id']) : 0;
        
        $data = array(
            'year' => sanitize_text_field($_POST['m_year']),
            'title' => sanitize_text_field($_POST['m_title']),
            'description' => sanitize_textarea_field($_POST['m_description']),
            'sort_order' => intval($_POST['m_sort_order'])
        );
        
        if ($m_id > 0) {
            $wpdb->update($table_milestones, $data, array('id' => $m_id));
        } else {
            $wpdb->insert($table_milestones, $data);
        }
        bricklet_clear_page_cache();
        $action = '';
    }

    // Handle Milestone Delete
    if ($action === 'delete_milestone' && $milestone_id > 0) {
        check_admin_referer('bricklet_delete_milestone_' . $milestone_id);
        $wpdb->delete($table_milestones, array('id' => $milestone_id));
        bricklet_clear_page_cache();
        $action = '';
    }

    // Handle Main Company Settings Form Submit
    if (isset($_POST['bricklet_submit_company'])) {
        check_admin_referer('bricklet_company_nonce', 'bricklet_company_nonce_field');

        $hero_bg_image = esc_url_raw($_POST['hero_bg_image_existing']);
        $uploaded_hero = bricklet_handle_file_upload('hero_bg_image_file');
        if (!empty($uploaded_hero)) {
            $hero_bg_image = $uploaded_hero;
        }

        $about_image = esc_url_raw($_POST['about_image_existing']);
        $uploaded_about = bricklet_handle_file_upload('about_image_file');
        if (!empty($uploaded_about)) {
            $about_image = $uploaded_about;
        }

        $leader_image = esc_url_raw($_POST['leader_image_existing']);
        $uploaded_leader = bricklet_handle_file_upload('leader_image_file');
        if (!empty($uploaded_leader)) {
            $leader_image = $uploaded_leader;
        }

        $data = array(
            'hero_badge' => sanitize_text_field($_POST['hero_badge']),
            'hero_title' => sanitize_text_field($_POST['hero_title']),
            'hero_subtitle' => sanitize_textarea_field($_POST['hero_subtitle']),
            'hero_btn1_text' => sanitize_text_field($_POST['hero_btn1_text']),
            'hero_btn1_link' => sanitize_text_field($_POST['hero_btn1_link']),
            'hero_btn2_text' => sanitize_text_field($_POST['hero_btn2_text']),
            'hero_btn2_link' => sanitize_text_field($_POST['hero_btn2_link']),
            
            'about_badge' => sanitize_text_field($_POST['about_badge']),
            'about_title' => sanitize_text_field($_POST['about_title']),
            'about_desc1' => sanitize_textarea_field($_POST['about_desc1']),
            'about_desc2' => sanitize_textarea_field($_POST['about_desc2']),
            'about_stat1_val' => sanitize_text_field($_POST['about_stat1_val']),
            'about_stat1_lbl' => sanitize_text_field($_POST['about_stat1_lbl']),
            'about_stat2_val' => sanitize_text_field($_POST['about_stat2_val']),
            'about_stat2_lbl' => sanitize_text_field($_POST['about_stat2_lbl']),
            'about_overlay_title' => sanitize_text_field($_POST['about_overlay_title']),
            'about_overlay_lbl' => sanitize_text_field($_POST['about_overlay_lbl']),

            'leader_name' => sanitize_text_field($_POST['leader_name']),
            'leader_title' => sanitize_text_field($_POST['leader_title']),
            'leader_quote' => sanitize_textarea_field($_POST['leader_quote']),
            'leader_quote_desc' => sanitize_textarea_field($_POST['leader_quote_desc']),
            'leader_quote_source' => sanitize_text_field($_POST['leader_quote_source']),

            'framework_title' => sanitize_text_field($_POST['framework_title']),
            'framework_desc' => sanitize_textarea_field($_POST['framework_desc']),
            'vision_title' => sanitize_text_field($_POST['vision_title']),
            'vision_desc' => sanitize_textarea_field($_POST['vision_desc']),
            'vision_icon' => sanitize_text_field($_POST['vision_icon']),
            'mission_title' => sanitize_text_field($_POST['mission_title']),
            'mission_desc' => sanitize_textarea_field($_POST['mission_desc']),
            'mission_icon' => sanitize_text_field($_POST['mission_icon']),

            'value1_title' => sanitize_text_field($_POST['value1_title']),
            'value1_icon' => sanitize_text_field($_POST['value1_icon']),
            'value2_title' => sanitize_text_field($_POST['value2_title']),
            'value2_icon' => sanitize_text_field($_POST['value2_icon']),
            'value3_title' => sanitize_text_field($_POST['value3_title']),
            'value3_icon' => sanitize_text_field($_POST['value3_icon']),
            'value4_title' => sanitize_text_field($_POST['value4_title']),
            'value4_icon' => sanitize_text_field($_POST['value4_icon']),

            'hero_bg_image' => $hero_bg_image,
            'about_image' => $about_image,
            'leader_image' => $leader_image
        );

        $wpdb->update($table_company, $data, array('id' => 1));
        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Company Profile settings updated.</p></div>';
    }

    // Render Milestone Add/Edit sub-view
    if ($action === 'add_milestone' || $action === 'edit_milestone') {
        $milestone = array('id' => '', 'year' => '', 'title' => '', 'description' => '', 'sort_order' => 0);
        if ($action === 'edit_milestone' && $milestone_id > 0) {
            $fetched = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_milestones WHERE id = %d", $milestone_id), ARRAY_A);
            if ($fetched) {
                $milestone = $fetched;
            }
        }
        ?>
        <div class="wrap">
            <h1><?php echo $action === 'add_milestone' ? 'Add Milestone Year' : 'Edit Milestone Year'; ?></h1>
            <a href="?page=igh-company-profile" class="button">Back to Company Settings</a>
            <form method="post" style="margin-top: 20px; background: #fff; padding: 20px; border: 1px solid #ccd0d4; max-width: 600px;">
                <?php wp_nonce_field('bricklet_milestone_nonce', 'bricklet_milestone_nonce_field'); ?>
                <input type="hidden" name="milestone_id" value="<?php echo esc_attr($milestone['id']); ?>" />
                <table class="form-table">
                    <tr>
                        <th>Year</th>
                        <td><input name="m_year" type="text" value="<?php echo esc_attr($milestone['year']); ?>" required /></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><input name="m_title" type="text" value="<?php echo esc_attr($milestone['title']); ?>" class="regular-text" required /></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea name="m_description" rows="4" class="large-text" required><?php echo esc_textarea($milestone['description']); ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Sort Order</th>
                        <td><input name="m_sort_order" type="number" value="<?php echo esc_attr($milestone['sort_order']); ?>" /></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" name="bricklet_submit_milestone" class="button button-primary" value="Save Milestone" /></p>
            </form>
        </div>
        <?php
        return;
    }

    // Fetch data for lists
    $company = $wpdb->get_row("SELECT * FROM $table_company WHERE id = 1", ARRAY_A);
    $milestones = $wpdb->get_results("SELECT * FROM $table_milestones ORDER BY sort_order ASC, year ASC", ARRAY_A);

    ?>
    <div class="wrap">
        <h1>Company Profile Settings</h1>
        <form method="post" enctype="multipart/form-data" style="margin-top: 20px; background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; max-width: 800px;">
            <?php wp_nonce_field('bricklet_company_nonce', 'bricklet_company_nonce_field'); ?>
            
            <!-- Section 1: Hero -->
            <h3>1. Hero Section</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Hero Background</th>
                    <td>
                        <input type="hidden" name="hero_bg_image_existing" value="<?php echo esc_attr($company['hero_bg_image']); ?>" />
                        <input type="file" name="hero_bg_image_file" />
                        <?php if(!empty($company['hero_bg_image'])): ?>
                            <br/><img src="<?php echo esc_url($company['hero_bg_image']); ?>" style="max-height: 80px; margin-top: 5px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Hero Badge</th>
                    <td><input name="hero_badge" type="text" value="<?php echo esc_attr($company['hero_badge']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Hero Title</th>
                    <td><input name="hero_title" type="text" value="<?php echo esc_attr($company['hero_title']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Hero Subtitle</th>
                    <td><textarea name="hero_subtitle" rows="2" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['hero_subtitle']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Button 1 (Text / Link)</th>
                    <td>
                        <input name="hero_btn1_text" type="text" value="<?php echo esc_attr($company['hero_btn1_text']); ?>" placeholder="Text" style="width: 10rem;" />
                        <input name="hero_btn1_link" type="text" value="<?php echo esc_attr($company['hero_btn1_link']); ?>" placeholder="Link" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Button 2 (Text / Link)</th>
                    <td>
                        <input name="hero_btn2_text" type="text" value="<?php echo esc_attr($company['hero_btn2_text']); ?>" placeholder="Text" style="width: 10rem;" />
                        <input name="hero_btn2_link" type="text" value="<?php echo esc_attr($company['hero_btn2_link']); ?>" placeholder="Link" style="width: 14.5rem;" />
                    </td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 2: About Us (Foundation) -->
            <h3>2. Foundation Section</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Badge</th>
                    <td><input name="about_badge" type="text" value="<?php echo esc_attr($company['about_badge']); ?>" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Title</th>
                    <td><input name="about_title" type="text" value="<?php echo esc_attr($company['about_title']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Description Paragraph 1</th>
                    <td><textarea name="about_desc1" rows="3" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['about_desc1']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Description Paragraph 2</th>
                    <td><textarea name="about_desc2" rows="3" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['about_desc2']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Foundation Image</th>
                    <td>
                        <input type="hidden" name="about_image_existing" value="<?php echo esc_attr($company['about_image']); ?>" />
                        <input type="file" name="about_image_file" />
                        <?php if(!empty($company['about_image'])): ?>
                            <br/><img src="<?php echo esc_url($company['about_image']); ?>" style="max-height: 80px; margin-top: 5px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Stat 1 (Value / Label)</th>
                    <td>
                        <input name="about_stat1_val" type="text" value="<?php echo esc_attr($company['about_stat1_val']); ?>" style="width: 10rem;" />
                        <input name="about_stat1_lbl" type="text" value="<?php echo esc_attr($company['about_stat1_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Stat 2 (Value / Label)</th>
                    <td>
                        <input name="about_stat2_val" type="text" value="<?php echo esc_attr($company['about_stat2_val']); ?>" style="width: 10rem;" />
                        <input name="about_stat2_lbl" type="text" value="<?php echo esc_attr($company['about_stat2_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Overlay Stat (Value / Label)</th>
                    <td>
                        <input name="about_overlay_title" type="text" value="<?php echo esc_attr($company['about_overlay_title']); ?>" style="width: 10rem;" />
                        <input name="about_overlay_lbl" type="text" value="<?php echo esc_attr($company['about_overlay_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 3: Leadership -->
            <h3>3. Leadership Section</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Leader Image</th>
                    <td>
                        <input type="hidden" name="leader_image_existing" value="<?php echo esc_attr($company['leader_image']); ?>" />
                        <input type="file" name="leader_image_file" />
                        <?php if(!empty($company['leader_image'])): ?>
                            <br/><img src="<?php echo esc_url($company['leader_image']); ?>" style="max-height: 80px; margin-top: 5px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Leader Name</th>
                    <td><input name="leader_name" type="text" value="<?php echo esc_attr($company['leader_name']); ?>" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Leader Title</th>
                    <td><input name="leader_title" type="text" value="<?php echo esc_attr($company['leader_title']); ?>" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Leader Quote</th>
                    <td><textarea name="leader_quote" rows="2" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['leader_quote']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Leader Detail Quote</th>
                    <td><textarea name="leader_quote_desc" rows="4" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['leader_quote_desc']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Quote Source</th>
                    <td><input name="leader_quote_source" type="text" value="<?php echo esc_attr($company['leader_quote_source']); ?>" style="width: 25rem;" /></td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 4: Framework -->
            <h3>4. Vision, Mission & Values (Strategic Framework)</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Section Title</th>
                    <td><input name="framework_title" type="text" value="<?php echo esc_attr($company['framework_title']); ?>" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Section Subtitle</th>
                    <td><textarea name="framework_desc" rows="2" class="large-text" style="width: 25rem;"><?php echo esc_textarea($company['framework_desc']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Vision (Icon / Title / Desc)</th>
                    <td>
                        <input name="vision_icon" type="text" value="<?php echo esc_attr($company['vision_icon']); ?>" style="width:10rem;" placeholder="Icon ID" />
                        <input name="vision_title" type="text" value="<?php echo esc_attr($company['vision_title']); ?>" style="width:14.5rem;" placeholder="Title" />
                        <br/><textarea name="vision_desc" rows="2" class="large-text" style="margin-top:5px; width: 25rem;"><?php echo esc_textarea($company['vision_desc']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Mission (Icon / Title / Desc)</th>
                    <td>
                        <input name="mission_icon" type="text" value="<?php echo esc_attr($company['mission_icon']); ?>" style="width:10rem;" placeholder="Icon ID" />
                        <input name="mission_title" type="text" value="<?php echo esc_attr($company['mission_title']); ?>" style="width:14.5rem;" placeholder="Title" />
                        <br/><textarea name="mission_desc" rows="2" class="large-text" style="margin-top:5px; width: 25rem;"><?php echo esc_textarea($company['mission_desc']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Value 1 (Title / Icon)</th>
                    <td>
                        <input name="value1_title" type="text" value="<?php echo esc_attr($company['value1_title']); ?>" style="width: 14.5rem;" />
                        <input name="value1_icon" type="text" value="<?php echo esc_attr($company['value1_icon']); ?>" style="width:10rem;" placeholder="Material Icon ID" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Value 2 (Title / Icon)</th>
                    <td>
                        <input name="value2_title" type="text" value="<?php echo esc_attr($company['value2_title']); ?>" style="width: 14.5rem;" />
                        <input name="value2_icon" type="text" value="<?php echo esc_attr($company['value2_icon']); ?>" style="width:10rem;" placeholder="Material Icon ID" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Value 3 (Title / Icon)</th>
                    <td>
                        <input name="value3_title" type="text" value="<?php echo esc_attr($company['value3_title']); ?>" style="width: 14.5rem;" />
                        <input name="value3_icon" type="text" value="<?php echo esc_attr($company['value3_icon']); ?>" style="width:10rem;" placeholder="Material Icon ID" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Value 4 (Title / Icon)</th>
                    <td>
                        <input name="value4_title" type="text" value="<?php echo esc_attr($company['value4_title']); ?>" style="width: 14.5rem;" />
                        <input name="value4_icon" type="text" value="<?php echo esc_attr($company['value4_icon']); ?>" style="width:10rem;" placeholder="Material Icon ID" />
                    </td>
                </tr>
            </table>

            <p class="submit"><input type="submit" name="bricklet_submit_company" class="button button-primary" value="Save Company Settings" /></p>
        </form>

        <hr style="margin: 40px 0;"/>

        <h2>Journey Milestones</h2>
        <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; max-width: 800px; margin-top: 20px;">
            <a href="?page=igh-company-profile&action=add_milestone" class="button button-primary">Add New Milestone</a>
            <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 80px;">Year</th>
                        <th scope="col" style="width: 150px;">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 80px;">Order</th>
                        <th scope="col" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($milestones)): ?>
                        <tr><td colspan="5">No milestones found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($milestones as $m): ?>
                            <tr>
                                <td><strong><?php echo esc_html($m['year']); ?></strong></td>
                                <td><strong><?php echo esc_html($m['title']); ?></strong></td>
                                <td><?php echo esc_html($m['description']); ?></td>
                                <td><?php echo intval($m['sort_order']); ?></td>
                                <td>
                                    <a href="?page=igh-company-profile&action=edit_milestone&id=<?php echo $m['id']; ?>" class="button button-small">Edit</a>
                                    <a href="<?php echo wp_nonce_url('?page=igh-company-profile&action=delete_milestone&id=' . $m['id'], 'bricklet_delete_milestone_' . $m['id']); ?>" class="button button-small button-link-delete" onclick="return confirm('Delete this milestone?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

// 8c. Group Company CRUD Page
function bricklet_render_group_company_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_group = $wpdb->prefix . 'igh_group_company';
    $table_entities = $wpdb->prefix . 'igh_group_company_entities';

    $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : '';
    $entity_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Handle Entity Add/Edit submissions
    if (isset($_POST['bricklet_submit_entity'])) {
        check_admin_referer('bricklet_entity_nonce', 'bricklet_entity_nonce_field');
        $e_id = isset($_POST['entity_id']) ? intval($_POST['entity_id']) : 0;

        $data = array(
            'name' => sanitize_text_field($_POST['e_name']),
            'icon' => sanitize_text_field($_POST['e_icon']),
            'description' => sanitize_textarea_field($_POST['e_description']),
            'link_text' => sanitize_text_field($_POST['e_link_text']),
            'link_url' => sanitize_text_field($_POST['e_link_url']),
            'sort_order' => intval($_POST['e_sort_order'])
        );

        if ($e_id > 0) {
            $wpdb->update($table_entities, $data, array('id' => $e_id));
        } else {
            $wpdb->insert($table_entities, $data);
        }
        bricklet_clear_page_cache();
        $action = '';
    }

    // Handle Entity Delete
    if ($action === 'delete_entity' && $entity_id > 0) {
        check_admin_referer('bricklet_delete_entity_' . $entity_id);
        $wpdb->delete($table_entities, array('id' => $entity_id));
        bricklet_clear_page_cache();
        $action = '';
    }

    // Handle Main Settings Form Submission
    if (isset($_POST['bricklet_submit_group'])) {
        check_admin_referer('bricklet_group_nonce', 'bricklet_group_nonce_field');

        $hero_bg_image = esc_url_raw($_POST['hero_bg_image_existing']);
        $uploaded_hero = bricklet_handle_file_upload('hero_bg_image_file');
        if (!empty($uploaded_hero)) {
            $hero_bg_image = $uploaded_hero;
        }

        $collab_image = esc_url_raw($_POST['collab_image_existing']);
        $uploaded_collab = bricklet_handle_file_upload('collab_image_file');
        if (!empty($uploaded_collab)) {
            $collab_image = $uploaded_collab;
        }

        $data = array(
            'hero_badge' => sanitize_text_field($_POST['hero_badge']),
            'hero_title' => sanitize_text_field($_POST['hero_title']),
            'hero_subtitle' => sanitize_textarea_field($_POST['hero_subtitle']),
            
            'grid_title' => sanitize_text_field($_POST['grid_title']),
            'grid_desc' => sanitize_textarea_field($_POST['grid_desc']),
            'grid_side_text' => sanitize_text_field($_POST['grid_side_text']),
            
            'collab_badge' => sanitize_text_field($_POST['collab_badge']),
            'collab_title' => sanitize_text_field($_POST['collab_title']),
            'collab_desc' => sanitize_textarea_field($_POST['collab_desc']),
            'collab_stat_val' => sanitize_text_field($_POST['collab_stat_val']),
            'collab_stat_lbl' => sanitize_text_field($_POST['collab_stat_lbl']),

            'collab_f1_icon' => sanitize_text_field($_POST['collab_f1_icon']),
            'collab_f1_title' => sanitize_text_field($_POST['collab_f1_title']),
            'collab_f1_desc' => sanitize_textarea_field($_POST['collab_f1_desc']),
            
            'collab_f2_icon' => sanitize_text_field($_POST['collab_f2_icon']),
            'collab_f2_title' => sanitize_text_field($_POST['collab_f2_title']),
            'collab_f2_desc' => sanitize_textarea_field($_POST['collab_f2_desc']),

            'collab_btn_text' => sanitize_text_field($_POST['collab_btn_text']),
            'collab_btn_link' => sanitize_text_field($_POST['collab_btn_link']),

            'stat1_val' => sanitize_text_field($_POST['stat1_val']),
            'stat1_lbl' => sanitize_text_field($_POST['stat1_lbl']),
            'stat2_val' => sanitize_text_field($_POST['stat2_val']),
            'stat2_lbl' => sanitize_text_field($_POST['stat2_lbl']),
            'stat3_val' => sanitize_text_field($_POST['stat3_val']),
            'stat3_lbl' => sanitize_text_field($_POST['stat3_lbl']),
            'stat4_val' => sanitize_text_field($_POST['stat4_val']),
            'stat4_lbl' => sanitize_text_field($_POST['stat4_lbl']),

            'hero_bg_image' => $hero_bg_image,
            'collab_image' => $collab_image
        );

        $wpdb->update($table_group, $data, array('id' => 1));
        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Group Company settings updated.</p></div>';
    }

    // Render Entity Add/Edit Form
    if ($action === 'add_entity' || $action === 'edit_entity') {
        $entity = array('id' => '', 'name' => '', 'icon' => 'domain', 'description' => '', 'link_text' => '', 'link_url' => '', 'sort_order' => 0);
        if ($action === 'edit_entity' && $entity_id > 0) {
            $fetched = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_entities WHERE id = %d", $entity_id), ARRAY_A);
            if ($fetched) {
                $entity = $fetched;
            }
        }
        ?>
        <div class="wrap">
            <h1><?php echo $action === 'add_entity' ? 'Add Core Entity' : 'Edit Core Entity'; ?></h1>
            <a href="?page=igh-group-company" class="button">Back to Group Settings</a>
            <form method="post" style="margin-top: 20px; background: #fff; padding: 20px; border: 1px solid #ccd0d4; max-width: 600px;">
                <?php wp_nonce_field('bricklet_entity_nonce', 'bricklet_entity_nonce_field'); ?>
                <input type="hidden" name="entity_id" value="<?php echo esc_attr($entity['id']); ?>" />
                <table class="form-table">
                    <tr>
                        <th>Entity Name</th>
                        <td><input name="e_name" type="text" value="<?php echo esc_attr($entity['name']); ?>" class="regular-text" required /></td>
                    </tr>
                    <tr>
                        <th>Material Icon Name</th>
                        <td><input name="e_icon" type="text" value="<?php echo esc_attr($entity['icon']); ?>" required /></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><textarea name="e_description" rows="4" class="large-text" required><?php echo esc_textarea($entity['description']); ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Link Label</th>
                        <td><input name="e_link_text" type="text" value="<?php echo esc_attr($entity['link_text']); ?>" /></td>
                    </tr>
                    <tr>
                        <th>Link URL</th>
                        <td><input name="e_link_url" type="text" value="<?php echo esc_attr($entity['link_url']); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th>Sort Order</th>
                        <td><input name="e_sort_order" type="number" value="<?php echo esc_attr($entity['sort_order']); ?>" /></td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" name="bricklet_submit_entity" class="button button-primary" value="Save Entity" /></p>
            </form>
        </div>
        <?php
        return;
    }

    $group = $wpdb->get_row("SELECT * FROM $table_group WHERE id = 1", ARRAY_A);
    $entities = $wpdb->get_results("SELECT * FROM $table_entities ORDER BY sort_order ASC, name ASC", ARRAY_A);

    ?>
    <div class="wrap">
        <h1>Group Company Settings</h1>
        <form method="post" enctype="multipart/form-data" style="margin-top: 20px; background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; max-width: 800px;">
            <?php wp_nonce_field('bricklet_group_nonce', 'bricklet_group_nonce_field'); ?>

            <!-- Section 1: Hero -->
            <h3>1. Hero Section</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Hero Background</th>
                    <td>
                        <input type="hidden" name="hero_bg_image_existing" value="<?php echo esc_attr($group['hero_bg_image']); ?>" />
                        <input type="file" name="hero_bg_image_file" />
                        <?php if(!empty($group['hero_bg_image'])): ?>
                            <br/><img src="<?php echo esc_url($group['hero_bg_image']); ?>" style="max-height: 80px; margin-top: 5px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Hero Badge</th>
                    <td><input name="hero_badge" type="text" value="<?php echo esc_attr($group['hero_badge']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Hero Title</th>
                    <td><input name="hero_title" type="text" value="<?php echo esc_attr($group['hero_title']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Hero Subtitle</th>
                    <td><textarea name="hero_subtitle" rows="2" class="large-text" style="width: 25rem;"><?php echo esc_textarea($group['hero_subtitle']); ?></textarea></td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 2: Grid Header -->
            <h3>2. Grid Introduction</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Grid Title</th>
                    <td><input name="grid_title" type="text" value="<?php echo esc_attr($group['grid_title']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Grid Description</th>
                    <td><textarea name="grid_desc" rows="3" class="large-text" style="width: 25rem;"><?php echo esc_textarea($group['grid_desc']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Grid Side Label</th>
                    <td><input name="grid_side_text" type="text" value="<?php echo esc_attr($group['grid_side_text']); ?>" style="width: 25rem;" /></td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 3: Collaboration -->
            <h3>3. Collaboration Section (Perumnas)</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Collaboration Image</th>
                    <td>
                        <input type="hidden" name="collab_image_existing" value="<?php echo esc_attr($group['collab_image']); ?>" />
                        <input type="file" name="collab_image_file" />
                        <?php if(!empty($group['collab_image'])): ?>
                            <br/><img src="<?php echo esc_url($group['collab_image']); ?>" style="max-height: 80px; margin-top: 5px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Stat Val / Label Overlay</th>
                    <td>
                        <input name="collab_stat_val" type="text" value="<?php echo esc_attr($group['collab_stat_val']); ?>" style="width: 10rem;" placeholder="15K+" />
                        <input name="collab_stat_lbl" type="text" value="<?php echo esc_attr($group['collab_stat_lbl']); ?>" style="width: 14.5rem;" placeholder="HOUSING UNITS" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Collab Badge</th>
                    <td><input name="collab_badge" type="text" value="<?php echo esc_attr($group['collab_badge']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Collab Title</th>
                    <td><input name="collab_title" type="text" value="<?php echo esc_attr($group['collab_title']); ?>" class="large-text" style="width: 25rem;" /></td>
                </tr>
                <tr>
                    <th scope="row">Collab Description</th>
                    <td><textarea name="collab_desc" rows="4" class="large-text" style="width: 25rem;"><?php echo esc_textarea($group['collab_desc']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Feature 1 (Icon / Title / Desc)</th>
                    <td>
                        <input name="collab_f1_icon" type="text" value="<?php echo esc_attr($group['collab_f1_icon']); ?>" style="width: 10rem;" placeholder="Icon ID" />
                        <input name="collab_f1_title" type="text" value="<?php echo esc_attr($group['collab_f1_title']); ?>" style="width: 14.5rem;" placeholder="Title" />
                        <br/><textarea name="collab_f1_desc" rows="2" class="large-text" style="margin-top: 5px; width: 25rem;"><?php echo esc_textarea($group['collab_f1_desc']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Feature 2 (Icon / Title / Desc)</th>
                    <td>
                        <input name="collab_f2_icon" type="text" value="<?php echo esc_attr($group['collab_f2_icon']); ?>" style="width: 10rem;" placeholder="Icon ID" />
                        <input name="collab_f2_title" type="text" value="<?php echo esc_attr($group['collab_f2_title']); ?>" style="width: 14.5rem;" placeholder="Title" />
                        <br/><textarea name="collab_f2_desc" rows="2" class="large-text" style="margin-top: 5px; width: 25rem;"><?php echo esc_textarea($group['collab_f2_desc']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Button Text / Link</th>
                    <td>
                        <input name="collab_btn_text" type="text" value="<?php echo esc_attr($group['collab_btn_text']); ?>" placeholder="Button Label" style="width: 10rem;" />
                        <input name="collab_btn_link" type="text" value="<?php echo esc_attr($group['collab_btn_link']); ?>" placeholder="URL" style="width: 14.5rem;" />
                    </td>
                </tr>
            </table>

            <hr style="margin: 30px 0;"/>

            <!-- Section 4: Counters -->
            <h3>4. Stats Counter</h3>
            <table class="form-table">
                <tr>
                    <th scope="row">Counter 1 (Value / Label)</th>
                    <td>
                        <input name="stat1_val" type="text" value="<?php echo esc_attr($group['stat1_val']); ?>" style="width: 10rem;" />
                        <input name="stat1_lbl" type="text" value="<?php echo esc_attr($group['stat1_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Counter 2 (Value / Label)</th>
                    <td>
                        <input name="stat2_val" type="text" value="<?php echo esc_attr($group['stat2_val']); ?>" style="width: 10rem;" />
                        <input name="stat2_lbl" type="text" value="<?php echo esc_attr($group['stat2_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Counter 3 (Value / Label)</th>
                    <td>
                        <input name="stat3_val" type="text" value="<?php echo esc_attr($group['stat3_val']); ?>" style="width: 10rem;" />
                        <input name="stat3_lbl" type="text" value="<?php echo esc_attr($group['stat3_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Counter 4 (Value / Label)</th>
                    <td>
                        <input name="stat4_val" type="text" value="<?php echo esc_attr($group['stat4_val']); ?>" style="width: 10rem;" />
                        <input name="stat4_lbl" type="text" value="<?php echo esc_attr($group['stat4_lbl']); ?>" style="width: 14.5rem;" />
                    </td>
                </tr>
            </table>

            <p class="submit"><input type="submit" name="bricklet_submit_group" class="button button-primary" value="Save Group Settings" /></p>
        </form>

        <hr style="margin: 40px 0;"/>

        <h2>Core Entities Grid</h2>
        <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; max-width: 800px; margin-top: 20px;">
            <a href="?page=igh-group-company&action=add_entity" class="button button-primary">Add New Entity</a>
            <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;">Icon</th>
                        <th scope="col" style="width: 220px;">Company Name</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 120px;">Link</th>
                        <th scope="col" style="width: 60px;">Order</th>
                        <th scope="col" style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($entities)): ?>
                        <tr><td colspan="6">No entities found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($entities as $e): ?>
                            <tr>
                                <td><span class="material-symbols-outlined"><?php echo esc_html($e['icon']); ?></span></td>
                                <td><strong><?php echo esc_html($e['name']); ?></strong></td>
                                <td><?php echo esc_html($e['description']); ?></td>
                                <td><a href="<?php echo esc_url($e['link_url']); ?>" target="_blank"><?php echo esc_html($e['link_text'] ?: 'Link'); ?></a></td>
                                <td><?php echo intval($e['sort_order']); ?></td>
                                <td>
                                    <a href="?page=igh-group-company&action=edit_entity&id=<?php echo $e['id']; ?>" class="button button-small">Edit</a>
                                    <a href="<?php echo wp_nonce_url('?page=igh-group-company&action=delete_entity&id=' . $e['id'], 'bricklet_delete_entity_' . $e['id']); ?>" class="button button-small button-link-delete" onclick="return confirm('Delete this entity?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}


// 8d. Homepage About Us CRUD Page
function bricklet_render_homepage_about_page() {
    global $wpdb;
    $_POST = wp_unslash($_POST);
    $table_about = $wpdb->prefix . 'igh_homepage_about';

    if (isset($_POST['bricklet_submit_about'])) {
        check_admin_referer('bricklet_about_nonce', 'bricklet_about_nonce_field');

        $image_url = esc_url_raw($_POST['image_url_existing']);
        $uploaded_image = bricklet_handle_file_upload('image_file');
        if (!empty($uploaded_image)) {
            $image_url = $uploaded_image;
        }

        $wpdb->update($table_about, array(
            'badge_text' => sanitize_text_field($_POST['badge_text']),
            'title' => sanitize_text_field($_POST['title']),
            'paragraph1' => sanitize_textarea_field($_POST['paragraph1']),
            'paragraph2' => sanitize_textarea_field($_POST['paragraph2']),
            'check_1' => sanitize_text_field($_POST['check_1']),
            'check_2' => sanitize_text_field($_POST['check_2']),
            'check_3' => sanitize_text_field($_POST['check_3']),
            'btn_text' => sanitize_text_field($_POST['btn_text']),
            'btn_link' => sanitize_text_field($_POST['btn_link']),
            'image_url' => $image_url,
            'experience_years' => sanitize_text_field($_POST['experience_years']),
            'experience_text' => sanitize_text_field($_POST['experience_text'])
        ), array('id' => 1));

        bricklet_clear_page_cache();
        echo '<div class="notice notice-success is-dismissible"><p>Homepage About Us settings updated successfully.</p></div>';
    }

    $about = $wpdb->get_row("SELECT * FROM $table_about WHERE id = 1", ARRAY_A);
    ?>
    <div class="wrap">
        <h1>Homepage About Us Settings</h1>
        <p class="description">Manage the content and media for the "About Us" section of the homepage.</p>
        
        <form method="post" enctype="multipart/form-data" style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; border-radius: 4px; box-shadow: 0 1px 1px rgba(0,0,0,0.04); max-width: 800px; margin-top: 20px;">
            <?php wp_nonce_field('bricklet_about_nonce', 'bricklet_about_nonce_field'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="badge_text">Section Badge</label></th>
                    <td><input name="badge_text" type="text" id="badge_text" value="<?php echo esc_attr($about['badge_text']); ?>" class="large-text" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="title">Title</label></th>
                    <td><input name="title" type="text" id="title" value="<?php echo esc_attr($about['title']); ?>" class="large-text" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="paragraph1">Paragraph 1</label></th>
                    <td><textarea name="paragraph1" id="paragraph1" rows="4" class="large-text" style="width: 30rem;"><?php echo esc_textarea($about['paragraph1']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="paragraph2">Paragraph 2</label></th>
                    <td><textarea name="paragraph2" id="paragraph2" rows="4" class="large-text" style="width: 30rem;"><?php echo esc_textarea($about['paragraph2']); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="check_1">Bullet 1</label></th>
                    <td><input name="check_1" type="text" id="check_1" value="<?php echo esc_attr($about['check_1']); ?>" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="check_2">Bullet 2</label></th>
                    <td><input name="check_2" type="text" id="check_2" value="<?php echo esc_attr($about['check_2']); ?>" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="check_3">Bullet 3</label></th>
                    <td><input name="check_3" type="text" id="check_3" value="<?php echo esc_attr($about['check_3']); ?>" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="btn_text">Button Text</label></th>
                    <td><input name="btn_text" type="text" id="btn_text" value="<?php echo esc_attr($about['btn_text']); ?>" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="btn_link">Button Link</label></th>
                    <td><input name="btn_link" type="text" id="btn_link" value="<?php echo esc_attr($about['btn_link']); ?>" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="image_file">Section Image</label></th>
                    <td>
                        <input type="hidden" name="image_url_existing" value="<?php echo esc_attr($about['image_url']); ?>" />
                        <input type="file" name="image_file" id="image_file" />
                        <?php if (!empty($about['image_url'])): ?>
                            <br/><img src="<?php echo esc_url($about['image_url']); ?>" style="max-height: 120px; margin-top: 10px; border: 1px solid #ddd; border-radius: 4px;" />
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="experience_years">Experience Years Badge</label></th>
                    <td><input name="experience_years" type="text" id="experience_years" value="<?php echo esc_attr($about['experience_years']); ?>" placeholder="e.g. 50+ Years" style="width: 30rem;" /></td>
                </tr>
                <tr>
                    <th scope="row"><label for="experience_text">Experience Label</label></th>
                    <td><input name="experience_text" type="text" id="experience_text" value="<?php echo esc_attr($about['experience_text']); ?>" placeholder="e.g. Japanese Engineering Heritage" style="width: 30rem;" /></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" name="bricklet_submit_about" class="button button-primary" value="Save About Settings" />
            </p>
        </form>
    </div>
    <?php
}

