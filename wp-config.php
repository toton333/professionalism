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
define('DB_NAME', 'professional');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ladygaga123');

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
define('AUTH_KEY',         'D0mV--,Os`cQ{;0-nTCgqwhX+}n+9W6g%1)@sb!?f}Gc5/k$#|R*=@(/5NUtV5[b');
define('SECURE_AUTH_KEY',  '-%(]@F7TEEW}fq9?5f<LUN$2qw6q]?>Ie#DtONlSY?7v=xDdk+Zt6@NRD$$#Wxo~');
define('LOGGED_IN_KEY',    'D|B>`%rD7SGRb[1fFBIs;i6F[9|n/R7]kvgE30gkYf/d$y6Im99|wAf]XoLk7MWn');
define('NONCE_KEY',        'X:zY0wWAc%uDrU-xQ#nsSS.I=FE@W)F(P,|)W%z;/+e$Tv=0u3~$ST$NCjVV2Ui>');
define('AUTH_SALT',        'L] ^c?tk)Go<H$3LjO+Ijh,e7-6F+E0dnjg+g^w!ho)(LZ`[N9u9/-.X&qLG6Ur2');
define('SECURE_AUTH_SALT', 'E/(1YjCA:M=<JdV]=WQO9pCJ}HGz~+m!Q+3LkjNL&F~ZnpFG<2,| c|Qy+Z}k:__');
define('LOGGED_IN_SALT',   '&vXN+!J+&D1ObsW5agM-)]BXDl}<m/w&s|b2Ayp5+<9$]mvoLF&^o;|^p^9mP+k2');
define('NONCE_SALT',       '=oo+lK<$8z1H`6Y@@Lx&wEQa6vIAY8+89s1;9h:oxwpekz9)4=qkXe&@Y;wK[V*/');

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
