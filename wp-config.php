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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ramsa_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'g$-g.mS?ma%HjQZv5kYKn4:xg48_B?,>EVtX~hiF^3=fdn(}1*;ZElXu&@EJ0nw?' );
define( 'SECURE_AUTH_KEY',  'H,p5%,6y:1W:4Zangk%!:LyQ+Yw^Hw/+tDaU`PU}$y1O<od[0BHaONbKZi45i=V7' );
define( 'LOGGED_IN_KEY',    '*&^?#!ZME~op|M}b^Ge U<g)ZX7x[7yJFBB$fa^-`Hu CD7Xfh}s*IX!.9`Jvw t' );
define( 'NONCE_KEY',        '%7*|km-9ORnvnSm_tj?qS]^q16uU2.Lb`H/Pg^*r.r4E@`<|((&Cj%=h. n+c9Q<' );
define( 'AUTH_SALT',        'la5DHr?Fg.jg{ z{69tn[Cfd _ACzeQ3iFJM#45ZCG{kAmhjHY/_ecM>}^ a( U+' );
define( 'SECURE_AUTH_SALT', 'SU3LRES.v9pNp:{8KKXltjkGxb!#;>2{$0:fZif+~4:[tmS@ntM0mlq_ws!0ssSw' );
define( 'LOGGED_IN_SALT',   'hI|jofD`(Tl@FX{V`+ofl_Cq6k&0K?j/5~vx]*&$n6{t$Mw&>u?PD~Cw!-JIE sm' );
define( 'NONCE_SALT',       '>G#?Cz5{p=}`yW4@$ v*kU=Y>i@=W~o^}pVqAb1qc}NX(ey@R:a&ot^D*]foK)?)' );

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
