<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'talonlod_wo6963');

/** MySQL database username */
define('DB_USER', 'talonlod_wo6963');

/** MySQL database password */
define('DB_PASSWORD', 'r1lHWP0hjXWJ');

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
define('AUTH_KEY', 'qTCVI;O^RKomQE/D-u<KpoKPxo!vaY&_vYR}j}wl&/YV*g}RyW$RHPl!bO(BPhYl@x_kXJhNSFLYZyc_%-xi^!$k[?mCfsiD{nvBo[;*xM+OYH^-vJFw{zJ]EBj|=/mE');
define('SECURE_AUTH_KEY', 'TM?AJ;vviAhceNxawX{rFn_oeZxeP)&xzl}s][te|!aCLxNu&Bg}YMVsLDWTHK%ImIegYuBe!oPdoPJ[}NMF-;UCBfiS(SHAWqXAh=lkvSdK{B|r%d|iuh;|gJC]<zXb');
define('LOGGED_IN_KEY', '=LOo_T[>?QsI^okHImeRFt>Di]vQ|GAvv@jq^exv%*-sIj&xjDJz_yCHESJdqwS^}P=pT?k{%;yjxJq+eaE>>io}|*ikUueD/Emj<TKs;LrrxkU=[}@B$UN&rIrVGVXb');
define('NONCE_KEY', 'ySQJaY!TUjh&cPBxU(GO>hd@@AzS-BtRDrU$De&-@=|f)cbqnVK_dKUs/hN|Nt{DiBfWZ@gUJ$wnfLcpSXSrUF@{]=fYRNwytt*]SfuYs[A+=JOi]!i/QaLHQHo}Q+<b');
define('AUTH_SALT', 'tE+aAK(jkmcLvXg[OVGlN/he-_)<_We!?+f<D_U|r}Jgb&{Uiwd<W*a*Sf=nr*sjKx&f>oLVnBQ=Md;kGM&KLOH<$XXcA[+Y%qUxSvyXHe[JjbLx+IN(^wD%RB}Wd[J=');
define('SECURE_AUTH_SALT', 'lsgcy)kmotQQaAwbDBTJ@E+OQoTR)<{n/]LsGjwlMsl/Nz@(dC}lJ%KM+/}g@Yj}Gba;LTUUbiljz^zXQpmQCMo=YX+z(<]WB$|VZ|hXvnZleCJ-?eARZU{QTU[ZAGR)');
define('LOGGED_IN_SALT', 'JI-P-r<GKZ)koQSkfU/rRv))xf^>]UUrQQ*<AcD]BsfwUFjQ;g[S*ss/h+gplPpVIMq=Dyb>%/-{-P{}LkB(HYi)P&)F&?|lS(yULr}IR?ceyXq$j%p_T-f[e|j!{Poq');
define('NONCE_SALT', 'AP&HMtZSsswLlwJS[mC}Yn<{pXfqyopgDvt(yJyQcYGk?TbHNvlUwtOkKfRy]lgx/[V<!;Yly)?lj_<Acr>bAiq!F(R[Tx+AQwZVRe/Nq{*ky<?=UwlY+(TTYKmAII;C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_rnmq_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
