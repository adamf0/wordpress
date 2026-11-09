<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'WP_HOME', 'http://localhost/wordpress' );

define( 'WP_SITEURL', 'http://localhost/wordpress' );

define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Nv?DX&Tvq$O:;TQco)Xfm^ozY6yThC&Iz>70oG!M[1vElkGAp|Be&=+*r`L&.285' );
define( 'SECURE_AUTH_KEY',  'XV]7NC>YVmmDL4Z!3jMc9c sHv3Ll-jkvAS90:=N7(WFCBb8DGoHyiiz63Df8@8N' );
define( 'LOGGED_IN_KEY',    't>7pFB~_1>$ }oX#4`d5a;R%ekWj.QhIv>1Ti:m)qw_U`lDri`<Dx{Ml#@p3M)}=' );
define( 'NONCE_KEY',        '}j@P!^U5IL%bYg*[bxV4PLe=2Vi[41oEDkx.>1$9;zmWHxo_1:j+iM3ekFdv,[W,' );
define( 'AUTH_SALT',        '?AVr?vI)I$GZ5_Rh,mM(9mg{k46AV p>BPHERKaW}#Nc(6q_^^@xiUyS#TDKlLej' );
define( 'SECURE_AUTH_SALT', '#6=EC7#hRofdlXT^(ucQi>$Z4U(KKt4Q_#XB$K$,S(NDu5h@6E6!|rf|J3{Z7DxH' );
define( 'LOGGED_IN_SALT',   'b=+9Jb!f590V7Af;9kclH@ubVd]0{kDX]a0m#t-eA3+nl=Om1klQvdp3xls24|kQ' );
define( 'NONCE_SALT',       'QD?OPv4m(5^:[m04B`M[fh2NZ5h:PtU<&9IvQD=:EKsB4B0J ];gBjH[huZ)7J~}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );
/* Add any custom values between this line and the "stop editing" line. */
// Security Hardening: Mencegah eksekusi dan modifikasi file langsung
define( 'DISALLOW_FILE_EDIT', true );        // Nonaktifkan theme & plugin editor di dashboard WP-Admin
define( 'ALLOW_UNFILTERED_UPLOADS', false ); // Larang upload file tanpa filter MIME type (bahkan untuk admin)
define( 'WP_HTTP_BLOCK_EXTERNAL', true );
define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org,downloads.wordpress.org' );
define( 'DISALLOW_FILE_MODS', true ); 
define('FS_METHOD', 'direct');

/* Add any custom values between this line and the "stop editing" line. */

// Load environment variables from .env file
$env_file = __DIR__ . '/.env';
if ( file_exists( $env_file ) ) {
    $lines = file( $env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
    foreach ( $lines as $line ) {
        $line = trim( $line );
        if ( empty( $line ) || strpos( $line, '#' ) === 0 ) {
            continue;
        }
        if ( strpos( $line, '=' ) !== false ) {
            list( $name, $value ) = explode( '=', $line, 2 );
            $name  = trim( $name );
            $value = trim( $value );
            // Strip quotes if present
            $value = trim( $value, '"\'' );
            $_ENV[ $name ] = $value;
            putenv( "{$name}={$value}" );
        }
    }
}

// SMTP Mail Configuration from environment
define( 'WP_SMTP_HOST',   getenv( 'WP_SMTP_HOST' ) ? getenv( 'WP_SMTP_HOST' ) : 'smtp.gmail.com' );
define( 'WP_SMTP_PORT',   getenv( 'WP_SMTP_PORT' ) ? (int) getenv( 'WP_SMTP_PORT' ) : 587 );
define( 'WP_SMTP_SECURE', getenv( 'WP_SMTP_SECURE' ) ? getenv( 'WP_SMTP_SECURE' ) : 'tls' );
define( 'WP_SMTP_AUTH',   true );
define( 'WP_SMTP_USER',   getenv( 'WP_SMTP_USER' ) ? getenv( 'WP_SMTP_USER' ) : '' );
define( 'WP_SMTP_PASS',   getenv( 'WP_SMTP_PASS' ) ? getenv( 'WP_SMTP_PASS' ) : '' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
