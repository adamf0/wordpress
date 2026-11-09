<?php
/**
 * Plugin Name: Security Upload Shield
 * Description: Mencegah RCE via file upload dengan memvalidasi ekstensi file, melarang format berbahaya (PHP, tar.gz, skrip executable), dan mendeteksi double extensions.
 * Version: 1.0.0
 * Author: Security Hardening
 */

// Cegah akses langsung ke file ini
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Filter MIME Types yang diizinkan oleh WordPress
 * Menghapus format arsip berisiko dan skrip yang berpotensi disalahgunakan untuk RCE.
 */
add_filter( 'upload_mimes', function( $mimes ) {
    // Daftar ekstensi berisiko yang harus diblokir dari MIME types
    $dangerous_extensions = array(
        'tar', 'gz', 'tar.gz', 'tgz', 'gzip', 'bz2',
        'rar', '7z',
        'php', 'php3', 'php4', 'php5', 'php7', 'php8', 'phtml', 'phps', 'phar',
        'exe', 'bin', 'sh', 'bash', 'bat', 'cmd', 'vbs',
        'py', 'pl', 'cgi',
        'html', 'htm', 'shtml',
        'svgz'
    );

    foreach ( $dangerous_extensions as $ext ) {
        if ( isset( $mimes[ $ext ] ) ) {
            unset( $mimes[ $ext ] );
        }
    }

    return $mimes;
}, 999 );

/**
 * 2. Pre-filter Upload File
 * Memeriksa nama file, null bytes, double extensions, dan ekstensi berbahaya sebelum file disimpan.
 */
add_filter( 'wp_handle_upload_prefilter', function( $file ) {
    if ( ! isset( $file['name'] ) || empty( $file['name'] ) ) {
        return $file;
    }

    $filename = $file['name'];

    // Deteksi Null Byte Injection
    if ( strpos( $filename, "\0" ) !== false || strpos( $filename, '%00' ) !== false ) {
        $file['error'] = 'Upload ditolak: Karakter null-byte terdeteksi.';
        return $file;
    }

    // Deteksi hidden files (diawali titik, misal .htaccess, .user.ini)
    if ( substr( basename( $filename ), 0, 1 ) === '.' ) {
        $file['error'] = 'Upload ditolak: File tersembunyi tidak diizinkan.';
        return $file;
    }

    // Daftar ekstensi terlarang (case-insensitive)
    $banned_extensions = array(
        'php', 'php3', 'php4', 'php5', 'php7', 'php8', 'phtml', 'phps', 'phar',
        'inc', 'sh', 'bash', 'cgi', 'pl', 'py', 'asp', 'aspx', 'jsp', 'jspx',
        'exe', 'bin', 'bat', 'cmd', 'vbs', 'com', 'msi',
        'tar', 'gz', 'tar.gz', 'tgz', 'bz2', '7z', 'rar',
        'sql', 'bak', 'old', 'backup', 'orig',
        'htaccess', 'htpasswd', 'user.ini'
    );

    $lower_name = strtolower( $filename );

    // Deteksi ekstensi berbahaya di akhir nama file
    foreach ( $banned_extensions as $banned_ext ) {
        if ( preg_match( '/\.' . preg_quote( $banned_ext, '/' ) . '$/i', $lower_name ) ) {
            $file['error'] = sprintf( 'Upload ditolak: Format file .%s dilarang demi keamanan server.', esc_html( $banned_ext ) );
            return $file;
        }
    }

    // Deteksi Double Extension yang menyisipkan skrip (misal: shell.php.jpg, backdoor.phtml.png)
    if ( preg_match( '/\.(php[0-9]?|phtml|phps|phar|inc|sh|cgi|pl|py|tar\.gz|tar|gz)\./i', $lower_name ) ) {
        $file['error'] = 'Upload ditolak: Pola ekstensi ganda (double extension) terdeteksi.';
        return $file;
    }

    return $file;
}, 10 );