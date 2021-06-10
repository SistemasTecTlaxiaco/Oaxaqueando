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
define( 'DB_NAME', 'bttlrstie3bco4jbshqr' );

/** MySQL database username */
define( 'DB_USER', 'uj4csglerc2av4og' );

/** MySQL database password */
define( 'DB_PASSWORD', 'gYS4I9XHBlpTdnLUMUPt' );

/** MySQL hostname */
define( 'DB_HOST', 'bttlrstie3bco4jbshqr-mysql.services.clever-cloud.com' );

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
define( 'AUTH_KEY',         'Ro!mh*p6rJF0,gj6eKR?3@R0@Pv&T<|fUn& []um@C^V]V89U}T3apWJlPnPP~yN' );
define( 'SECURE_AUTH_KEY',  '&ZWWLe54VQ lXRbfQA (hsQiN.s%>s=G.l%Pi:Z+GXv&4SWNee5^S^S;5j K}I6>' );
define( 'LOGGED_IN_KEY',    '5&p6,aq(I$q,xn[acOG]N@IyIb>O&]*E!vqXpzyo>X7dvSYsjbN~*f9ugOF=C7#G' );
define( 'NONCE_KEY',        'H@miKE[V}B&tcd.x|PbhfP&i;:sTo9`NgbcWdPJ=CS#Qub!^l}=ZXyDnra*@WsCD' );
define( 'AUTH_SALT',        'bW]l$ia]xtj*Ks%d6&vOY3P)?^(rilcc9)r6^,3=u`?yQ}xfme,*wp,YiO`yWcAx' );
define( 'SECURE_AUTH_SALT', '<CH!{~#r)3(0Yy,3I8{%7yW|%FYDk[sj_(C,#S/U-@?cTbjHT3%e/,,]EA$K8I5[' );
define( 'LOGGED_IN_SALT',   'EV14yS%jBiwR h`In7v0b7s.Xpgls;g@Yasur^~v)]3^qinpYYG%|0tUdMVV)&5|' );
define( 'NONCE_SALT',       'H5I>?<&d*u4qQ?_ ])&8s_)PIXq77!8`-.f3fFg-Yx%0|M-*hQl&%dC5[ZmYe:dK' );

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
define ('WP_HOME', 'http://app-b5ac5bc9-a6b7-4800-8bf9-2f469b918258.cleverapps.io/');
define ('WP_SITEURL', 'http://app-b5ac5bc9-a6b7-4800-8bf9-2f469b918258.cleverapps.io/');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
