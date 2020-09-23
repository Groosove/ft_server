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
define( 'DB_NAME', 'my_wp_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '|Fi]=PUhchIc/SOU>Zt)-3_GV{+avvBB$ q/Z-i-uW>rE*[eVV4Zw_|hysE6rb{K');
define('SECURE_AUTH_KEY',  'atp|*;^`,)y6YuenD&C Gi$I}6{~1fMP<rALxK_2dhYa2EdX=w=|(-ce7nw;{k)W');
define('LOGGED_IN_KEY',    ',Chq-W k|#z6rFnd$y^)yH|W^U<b2zQ:{TNdQU_@|T<~A[D%-Ph4infT MZJCImy');
define('NONCE_KEY',        '@9*sv3ixF1*H*|EUVarExwJg#V]BUc<<I>tMVypX3,m|*EYImN`9;:|~|a7Gp4G!');
define('AUTH_SALT',        '$4Aj*:G?{A`@-(uEPm1-vCq>krBxH,-u}Zi]L[iE.}K|Vb97Q_ aY9A~F+3yu0So');
define('SECURE_AUTH_SALT', 'KdFY&nDE]w=CB:URtU|8~{rB.R7Dh X;l|a$H-BM/I[.i<(a<,)H)^87jYPY78!]');
define('LOGGED_IN_SALT',   '#Dna}eRL-PK3x#no/3-|2I~l!&MB}Pzkt;JKWL2RHb#QjL:-zW@M3N=wt{w#Lycz');
define('NONCE_SALT',       'e*uUeiMH7OMS@Nx=TzrZ&eW+*,9-I[M9id*W)mlDDLtUev#Xf|IH+0n>,CN):dkD');

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