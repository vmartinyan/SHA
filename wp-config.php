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
define('DB_NAME', 'dev-sha');

/** MySQL database username */
define('DB_USER', 'sha');

/** MySQL database password */
define('DB_PASSWORD', 'Temp1234');

/** MySQL hostname */
/*for 109.75.36.168*/
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '| -ZOIQMFhzLC%E L:ZusMB/<^v6B7%^253j6v7LZJB.5Hz8I#3>G!%=5h -#+[)');
define('SECURE_AUTH_KEY',  'd~v%lpCIpd8syE|^Vwr8VIxP)`kQH4Hxo_P?~PNgX}D5ZmSA+6m;[=ex!7a$j:X,');
define('LOGGED_IN_KEY',    'v=%~#04Q,~=</]Ccsy9@0:x6?BYY|3dkVa581lIIo}m3> @fsRGpDGjMEM^<huca');
define('NONCE_KEY',        'QLcdFm=*}Kgb,C,~|V^Cgo<biFOclZp[M.p#!$oZg/e?|gqKc*niZis)vI`#UXyf');
define('AUTH_SALT',        '=9?Ig!7JT$Io)6liS[{~KHR(H_ox)5I3=jEJWC /#6[DLP|H3H|49xL;XC)8I @w');
define('SECURE_AUTH_SALT', '#XCFAaQCq^5Ep<jB1yOgRQ3Ec.w[J*+C+%}]WAL)K]@f]B>u4*[z;SmEjzNwCr0&');
define('LOGGED_IN_SALT',   'LGH6<E8IMH)|t^*?)O.]]@ph95BpN}g<Y}QiEPN#a9!-dae&3Ru~%GiLorAE#)UL');
define('NONCE_SALT',       '~ba7X?0gb=b&*P6W]=lgE[C[sKf*c{SG[?Z/&asb%8+`7fbj-|K70j1RH`I9Rg+z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
