<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'programacion' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', '9012d31aff3277fcb373c5b8b863dd4d9800ea986c153c93' );

/** Database hostname */
define( 'DB_HOST', 'http://64.23.187.245/wordpress' );

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
define( 'AUTH_KEY',         'hg6[{6;CA78lZ-hN+D}j.4J`7-Sq0S4wU6[,h-Fz-hjB4^qdXu)SL21-]FL9Q#Tc' );
define( 'SECURE_AUTH_KEY',  'fn57!A2:d0ubR305K!h@yDfs9tJB$ffZ,ewjF1vnS?Ug2j*^+yoxP[`keL.OK8y`' );
define( 'LOGGED_IN_KEY',    'lvNKBs?QR6G!~ueNk.- R@oY#-5QE;&;`!9w5$KT;b$G{2+*v:u<.5HtP .c[ic*' );
define( 'NONCE_KEY',        'CVUQWMp4zrQI*,j@qf=y:<y#>cxRi;bTFKbFp-C:Tu<B3:%J1/.%2f[HV37Vw??[' );
define( 'AUTH_SALT',        'H>?M>rRNZnZT+!x]us)zrLSL`T/p9`g MX_ULmEFu<jn>}=096-.#bcA*^}u/BCb' );
define( 'SECURE_AUTH_SALT', 'H5WqNN/_a2+E,2K U`:(mB}84.ZBKp]V*UWm.}f&t(5Y2LsJez;7-M3a#N!nTy<H' );
define( 'LOGGED_IN_SALT',   'd<&P:M+M[OQ`_{&kNMKFG}X5S#pdbB.cGFI:75TPRvCZMu!wnmaTI&{w]P2?{y>-' );
define( 'NONCE_SALT',       '^~n}-EAE$42UUN/[vAIw/m#Tk0vPLAc#GabSmkUExmUja%pr{4Ad|H3AsH(c`Ok4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_content';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
