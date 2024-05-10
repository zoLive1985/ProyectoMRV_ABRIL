<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'esteveza_mrv' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '$K^a2%cn}gbz!o9Awu/[0}]aD>fg#vHEC5a,E|a_=fzz&g@Q^b#A4^,E^kYr8t^*' );
define( 'SECURE_AUTH_KEY',  '%(lv8 :Y`Rw0`K-X/XD%:,@LI4@iWWo`P=Q7wy:RPN*(ZJ+N>q|pJgS$Py^N>XOF' );
define( 'LOGGED_IN_KEY',    '~9GNwMCc $GsOuc4m{Q4g7Uvsdf2SItP5P|MZ>&>w[Mt;z3neIfIiS_0jdT_=$Z5' );
define( 'NONCE_KEY',        '^N|~qSk[T@}s>yV$B&c>XES|(Uo@5IE,B.^+Vwu23nx59BV<INEd5J4^h>Usly)q' );
define( 'AUTH_SALT',        '=|>NU?2nb`P3,a5Dcq$$PTA*z;qyf)gu-z?$)}~arUd~NP|#Zz7AOL,_ZIu@~&:h' );
define( 'SECURE_AUTH_SALT', 'CK`ntBgh622Uf.ATcMF&OGb sD008t<xvO1P:!9~&60vE$Gxbt *r}eTPTAt7;NC' );
define( 'LOGGED_IN_SALT',   '$o>~5V|<spBh*S%g]al%FBWr{_5a6~t]>K1`nc4veII77T$y}HN)`)l.<~I/@mP@' );
define( 'NONCE_SALT',       'f!N>;!;(k`Eo!P?VzggAiZGo;k-M+}}2)D#,SxANak3*Y*y-Fj`)~jFJ[({:|6dT' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
#define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
