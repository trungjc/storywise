<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'storywise');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
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
define('AUTH_KEY',         '@i|8f=^u.DYk(5<G:-4p7jzCoBv8u#i}pTaW_IQ.PVY054O(rU99,csmUp>J}F(}');
define('SECURE_AUTH_KEY',  'C+]7BMBC-2Y}RfYuCbZI-=Ms~Ry8kb/SFto1m]{ceHAeC`0-s~_8)<1X|g2tZz0%');
define('LOGGED_IN_KEY',    '45L;?(ZlTOo2k~NQ!~]se#(njCj`OQ157O--F}RulEpO&>w{Tx6^)CV{A!9j)|Vc');
define('NONCE_KEY',        'lp(l5dT@@ U1Ml-+!;?~Y|5caP9k^VNw;]HtcFVxU>TvkwaRe6d19.|62)/(NPic');
define('AUTH_SALT',        '`a*R]F1D,f?-8]b^k_DZ2I8&$*&YC=h0}-tsd%fI, qqeZd {pO]]Se)e,#+E}iM');
define('SECURE_AUTH_SALT', '@D)Dfz.P4H0Y(>3o|/VGshF>$9Z_sM)X^Vt)#+WB&SUjnz|2LQX4=c--|lYgaoBy');
define('LOGGED_IN_SALT',   ']nti<<,o9-^wtz08y:e*9G81$D}z{Y) GG1: y$<2{zB1M`u8Dc1B9_zSes:&#%c');
define('NONCE_SALT',       'cc!*h}0-j).-c8EDPBa(# P/U|wY9)F;6+-zj#B*jwYU`19,KTab./r.V_G:gp@Q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jc_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
