<?php
/**
 * One-off Image Migration Script for PT Iida Group
 */

// Prevent execution via browser for security
if (php_sapi_name() !== 'cli') {
    die('This script can only be run via Command Line Interface (CLI).');
}

// Bootstrap WordPress
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php';

global $wpdb;
$table_products = $wpdb->prefix . 'construction_products';
$table_osaka = $wpdb->prefix . 'osaka_products';

// Helper function to sanitize folder names safely
function clean_folder_name($name) {
    $name = str_replace(array('/', '\\', ':', '*', '?', '"', '<', '>', '|'), '-', $name);
    $name = html_entity_decode($name, ENT_QUOTES, 'UTF-8');
    $name = wp_strip_all_tags($name);
    // Replace multiple spaces/dashes with a single space
    $name = preg_replace('/\s+/', ' ', $name);
    return trim($name);
}

// Helper to download image and save it
function download_and_save_image($url, $category_folder, $product_name) {
    if (empty($url)) {
        return '';
    }
    
    // Check if it's already a local URL pointing to the theme folder
    if (strpos($url, get_template_directory_uri()) !== false) {
        return $url; // already migrated
    }
    
    // If it's a relative URL or remote, try to download
    if (strpos($url, 'http') !== 0) {
        $url = 'https://www.ighd.co.id' . $url;
    }
    
    // Clean folder name
    $clean_prod_name = clean_folder_name($product_name);
    if (empty($clean_prod_name)) {
        $clean_prod_name = 'unnamed-product';
    }
    
    // Setup destination directory
    $dest_dir = get_template_directory() . '/' . $category_folder . '/' . $clean_prod_name;
    if (!file_exists($dest_dir)) {
        mkdir($dest_dir, 0755, true);
    }
    
    // Extract filename and extension
    $path_parts = pathinfo(parse_url($url, PHP_URL_PATH));
    $filename = isset($path_parts['basename']) ? $path_parts['basename'] : 'image.jpg';
    $filename = sanitize_file_name($filename);
    
    $dest_path = $dest_dir . '/' . $filename;
    
    global $downloaded_urls;
    if (!isset($downloaded_urls)) {
        $downloaded_urls = array();
    }
    
    // Cache check: if file already exists, register it in downloaded_urls and return
    if (file_exists($dest_path) && filesize($dest_path) > 0) {
        $downloaded_urls[$url] = $dest_path;
        return get_template_directory_uri() . '/' . $category_folder . '/' . rawurlencode($clean_prod_name) . '/' . rawurlencode($filename);
    }
    
    // If we already downloaded this URL to another location, copy it locally
    if (isset($downloaded_urls[$url]) && file_exists($downloaded_urls[$url]) && filesize($downloaded_urls[$url]) > 0) {
        if (copy($downloaded_urls[$url], $dest_path)) {
            $downloaded_urls[$url] = $dest_path; // update to latest local path (or keep previous, doesn't matter)
            return get_template_directory_uri() . '/' . $category_folder . '/' . rawurlencode($clean_prod_name) . '/' . rawurlencode($filename);
        }
    }
    
    // Download using curl (with retry mechanism and sleep to prevent rate limiting)
    $max_retries = 3;
    $attempt = 0;
    $data = '';
    $http_code = 0;
    
    while ($attempt < $max_retries) {
        $attempt++;
        if ($attempt > 1) {
            echo "Retrying download ($attempt/$max_retries) for: $url...\n";
            sleep(1); // wait 1 second before retrying
        } else {
            usleep(300000); // 300ms base delay between new requests
        }
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'curl/8.6.0');
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200 && !empty($data)) {
            break;
        }
    }
    
    if ($http_code === 200 && !empty($data)) {
        file_put_contents($dest_path, $data);
        $downloaded_urls[$url] = $dest_path;
        return get_template_directory_uri() . '/' . $category_folder . '/' . rawurlencode($clean_prod_name) . '/' . rawurlencode($filename);
    } else {
        echo "Failed to download: $url (HTTP code: $http_code)\n";
        return ''; 
    }
}

echo "Starting Image Migration...\n";

// 1. Process Osaka Products
echo "Migrating Osaka Products...\n";
$osaka_products = $wpdb->get_results("SELECT id, name, img FROM $table_osaka", ARRAY_A);
if (!empty($osaka_products)) {
    foreach ($osaka_products as $op) {
        echo "Processing Osaka product: {$op['name']}...\n";
        $local_url = download_and_save_image($op['img'], 'Osaka Products', $op['name']);
        if (!empty($local_url)) {
            $wpdb->update($table_osaka, array('img' => $local_url), array('id' => $op['id']));
            echo "  Updated to: $local_url\n";
        }
    }
}

// 2. Process Construction Products
echo "Migrating Construction Products...\n";
$construction_products = $wpdb->get_results("SELECT id, name, img FROM $table_products", ARRAY_A);
if (!empty($construction_products)) {
    $count = 0;
    foreach ($construction_products as $cp) {
        $count++;
        if ($count % 50 === 0) {
            echo "Progress: $count / " . count($construction_products) . "\n";
        }
        $local_url = download_and_save_image($cp['img'], 'Construction Products', $cp['name']);
        if (!empty($local_url)) {
            $wpdb->update($table_products, array('img' => $local_url), array('id' => $cp['id']));
        }
    }
}

echo "Image Migration Completed!\n";
