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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'anderskallberg_db' );

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
define( 'AUTH_KEY',         '@RDG`i$%%t_7ngN7(B,x$fUW}!igYm#jm!N6F?mDckOP754*Nx<M$daU^O(__:uR' );
define( 'SECURE_AUTH_KEY',  'ps$.=q`m0i#h,6G4ap]~Z0ZAM98Ue{?4mwnCQK4QRw#qXV4}/]=lNO3:A1Rr8V<}' );
define( 'LOGGED_IN_KEY',    '%_>ToZ|YO]JJqJqO[)1S}c=E]PzfMIBDb(1+Jk$FITROy-@XJWEY>no*>z=)/&xy' );
define( 'NONCE_KEY',        '3Bqzz,9rH-!ZIptbO}TDvS[6veD<T%uB[jocZ_ayPC6=1]OeGpyqm>0%gHsC8Q7X' );
define( 'AUTH_SALT',        '_fJr4mK}.rbk)(lxf[StMF=58c3T[tZBc_%eJBDu#&c=AB].l|`8VbM5k2CJCW.K' );
define( 'SECURE_AUTH_SALT', 'j?9Z}nL0rZOC6=FP/Q7 L]B&>gN#D=o|V%8M B30]oE_hJ5WA;rKm1@r&|s(Mn@,' );
define( 'LOGGED_IN_SALT',   '7LUWy&  ;t8j5!S+|yVZ|$GvrL{hY)G:{Y,.Y6phUuu&&?8~q[OmjdPOI%rz2p0t' );
define( 'NONCE_SALT',       'U]`>^Di!+Jo_,i%X;UfZbl**pXttcT:`_%MiBeuUA8-;Gw4[{2pfx!;SNPJdtM#w' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
