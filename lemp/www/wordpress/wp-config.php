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
define('DB_NAME', 'wpsql');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123');

/** MySQL hostname */
define('DB_HOST', 'mariadb');

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
define('AUTH_KEY',         'd|Z%!R(A0v0=OGfd0_Iig[AHSP(rkK/aYcK;PfI-gAUnz|qM8(g7jhHk@)q i(vL');
define('SECURE_AUTH_KEY',  '^a*a/Ra|M{Ca<xn`nrbFbG9bI}Eq6B(K^,+>4tU|jDdo${,hH+sd!0qph[Y+n4-%');
define('LOGGED_IN_KEY',    'ImVcX-UUm#4ibOx{y}vTp2QS,;z0I@4x(kwtj>EFr6&4-)#vdODr.Nf]pA9u_;9Z');
define('NONCE_KEY',        '>V@7Ef_p!&tqe>waDxP<6X.Z_4R&} W8w#_7ipvMp(Z>!s5>/p RCv]eR%DclY E');
define('AUTH_SALT',        '`K<?tog&y)D,%OBx1BAfP1qv_c$XAa7KQN<(,:%jVu1ZQ>d(+2~uRPv.iw_mix:Q');
define('SECURE_AUTH_SALT', '{$0-RfQc4YLHIj/T.,>t@@=;E?^F~{_{]oTmXWqe+;[+y8adzFD0z>.,(*R1HTQ4');
define('LOGGED_IN_SALT',   'G)woZ1-|:nF>}#d(#8v=%V;sm>M@{lW;v0fy2AmN@3#0Th#3RWkH$c{&TXG[55T|');
define('NONCE_SALT',       'C(,BULbc[)k;}MhLp^gr)B{vKw5z4#(Y}V6+* X+7 =1D)<~_V7/8UwpRP5j1:^i');

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


