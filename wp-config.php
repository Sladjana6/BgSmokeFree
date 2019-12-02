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
define( 'DB_NAME', "bgsmokefree" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '7(6Zzrb7nO!.c)QldFRy^p<&|bG_VSWw:W)Sq8sRCso~j;W_zST}q.r5S6wA>^A]' );
define( 'SECURE_AUTH_KEY',   'Zyq<~jf!tTpysLAVvrTT/,_aQ2~7R><MLSNbqFPI~MekP+zwOVCTU5zBBI+/),&s' );
define( 'LOGGED_IN_KEY',     '%.X7g89mYy:dn@Tu>Zx|&-5B.^HtKOnC0dth7?bY,)+&!+?bZC:X$fqSZ|7sJBhB' );
define( 'NONCE_KEY',         '`x5!=} 123XdDUm(.booFQT=8f=]6znIetzoJX|*+5k$Q|W0%b0rxpY2gG(kZkld' );
define( 'AUTH_SALT',         '^Ir_s` %gH>0}WD:Y@:LrA|r[S]Fa0}H3IN!J)5g#{%]G.pYe4Y;;J JG7e-MiYP' );
define( 'SECURE_AUTH_SALT',  'D}:Kmon=?K!mR7HCcDhfh:B,E%2Wj8>(aQDMXakgV(mXsuw-/t qb|CzCkM.YI`8' );
define( 'LOGGED_IN_SALT',    'YpX@k:>TGxE`y5<$JgwVK_F&E.a-i`E85Y<E2Q`+ELh2a0F3F]UPH<Ja<@5,QQ.o' );
define( 'NONCE_SALT',        'J=Yht,:V1dW9LX5=47q@&9niy0.A?]7@!r%-+/3zMt:%P.r^=>LrK,(%$3(.[l:u' );
define( 'WP_CACHE_KEY_SALT', 'U7nz?7%IB:5)F#EY<ZG 4H2`G*$v83M*nLx{/[BTdiP1td!0k27EZz}ebcFwf_JC' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
