<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blogs' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '?;-T-scRw#/~&MkN%MY!InB-O(a-Ke{p%i~&QLIt160,/BibvNAYX/he&OY/B[V-' );
define( 'SECURE_AUTH_KEY',  'BcG<O{~}V5(VU#=T jFgGFY;7]xM)6NR*x58kRJPl%9MN(``F{mODIPf 6kee[uh' );
define( 'LOGGED_IN_KEY',    'mkKRSKQSYoC~&jMxQ&,%H4s_5R~<fu]Gfwaq&^$bNNi)PrrzD= P!^|iPB;::GA}' );
define( 'NONCE_KEY',        '0Q&asJF-f D!5v]U=b9O:?{Vfe{l[1%%g.2x3!moG(YB2i&aX1ewG9336NWysW#z' );
define( 'AUTH_SALT',        '9^-r`^^!/Hm6V8OyMvAs$C4x*R|DoQU46f1|1ORefG1uZzv{y{Y^EtMS*}{jGXpe' );
define( 'SECURE_AUTH_SALT', '%TP$p-5,Lx9V(&J|8+N-Au9IP$bI^n~-!Z`/qrE`Go4~YnA=(ni]u^:V,iQequjN' );
define( 'LOGGED_IN_SALT',   'EkI!:1E{8_J7lKLo5>>J7Zi>k+DxN!Bzr)Ge5W`67vI<KHQ7nH227S5+Z#L05&l6' );
define( 'NONCE_SALT',       'EKfSx#k8T8nA.N#-7ZwD/mO!mtz=@4>n.q_P:33!G-},g8RIIRf3cIIh,N{<!J^W' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
