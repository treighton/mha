<?php
/**
 * WP Theme constants and setup functions
 *
 * @package mha
 */

// Useful global constants.
define( 'MHA_VERSION', '0.1.0' );
define( 'MHA_TEMPLATE_URL', get_template_directory_uri() );
define( 'MHA_PATH', get_template_directory() . '/' );
define( 'MHA_INC', MHA_PATH . 'includes/' );

require_once MHA_INC . 'core.php';
require_once MHA_INC . 'overrides.php';
require_once MHA_INC . 'template-tags.php';
require_once MHA_INC . 'utility.php';
require_once MHA_INC . 'blocks.php';

// Run the setup functions.
mha\Core\setup();
mha\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
