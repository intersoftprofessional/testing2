<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress38');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'u4*89c.Tebh[[zHs mC iDjuQTH$093],mFZ0ASM]d[)]WR}ZAOU9Keht:8]p7Ns');
define('SECURE_AUTH_KEY',  '%6clU:(@X<KuIKVu7tW=lYq`.Pn_[rb?oN 0YQ{:$+lMxU5jsv1*/n^`10=E?ok;');
define('LOGGED_IN_KEY',    'H=8Ex%)%KV]-$PWMw;CQ]d61)!JMv_APEn*hy8pWH*F?S-je|<X|UQIy#RXKQ|&j');
define('NONCE_KEY',        'k!AF@ZO BC]^;e6>(U`+Wq52H~Qe&&1qaV*e?2fQz_!ZUi1*W%-({#SA+>8q60qg');
define('AUTH_SALT',        ':o:Ps/672U3cu3YPwOBQ,8NYZXY1tMyLtsxE^eV^@C&cBcVzAq#Qspu3ko)xW,>K');
define('SECURE_AUTH_SALT', ' *I>vM|Jw_obN=pmS.Y?61o4,K4EnkERU?Ebwj7E_v[Yd.gT-1g&zR_,.uGFf26h');
define('LOGGED_IN_SALT',   'tO$bv7 Ed*.DSMNAbawvO~V9I^q9`:ROMW?xzL&PzMAgB.O]u|0v?Z]!g<8&f4]}');
define('NONCE_SALT',       ':+:l._ +~Bd6?:) ;D%%CU5rKeKO~L`NrZ 3l{3@jw6Z}eR~X}_~^[;#ph=}OWPf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
