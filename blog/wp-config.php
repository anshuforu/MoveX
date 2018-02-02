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
define('DB_NAME', 'hirelekl_wp499');

/** MySQL database username */
define('DB_USER', 'hirelekl_wp499');

/** MySQL database password */
define('DB_PASSWORD', 'b0T[Sj3P)2');

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
define('AUTH_KEY',         'b9ni7f9cq9xfi2uwzi1gzrim2gobchgqkrp6uqqcaknyrusltvjgyqixncthhg8h');
define('SECURE_AUTH_KEY',  'o2oz9lyfiszle98gjrrrlf07qwz5oogh4f02hwsj5houhwgh2zojfvfs9fxvwyu2');
define('LOGGED_IN_KEY',    'qg6tksptffsi3hbzwdfeptsr9mpcpuukpzehufb30uhw7joaxp4rto7s4orluzdl');
define('NONCE_KEY',        'ynepnl3venlctzdqpnlschdqir5ggugqmrlue0abceb9fupzugfanrtfnxprx4pi');
define('AUTH_SALT',        'jwromuer6ycfzcqlbzeriafqe7ihaz1o9be1093yptdvmvvzhkzgc4jnpduqhhmg');
define('SECURE_AUTH_SALT', 'enffk6x9qwbt114rbds2qehbdr6r0wrla1yaq3g0tue87q03yhfasrjoj1pzdtrz');
define('LOGGED_IN_SALT',   'qegsvfo4awxhh7vuyxna5efmrliw3mw8n9hkhu6mxu7cshlxvivg4qtw3rnx9qov');
define('NONCE_SALT',       'uw6w89jvqrf09ysbes5zcjo957ts7j5lfc93kdjoa7dmjfqsic6jksz8sg4pjobb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpdu_';

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
