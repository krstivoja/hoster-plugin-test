<?php

/**
 * Plugin Name:       hoster-plugin-test
 * Description:       Notifications Block (Info, Tip, Warning, Error)
 * Requires at least: 6.3.0
 * Requires PHP:      7.4
 * Version:           0.0.3
 * Author:            devusrmk
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hoster_plugin_test
 * Website:           
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$plugin_prefix = 'HOSTERPLUGINTEST';

define($plugin_prefix . '_DIR', plugin_basename(__DIR__));
define($plugin_prefix . '_BASE', plugin_basename(__FILE__));
define($plugin_prefix . '_PATH', plugin_dir_path(__FILE__));
define($plugin_prefix . '_VER', '0.0.3');
define($plugin_prefix . '_CACHE_KEY', 'hoster_plugin_test-cache-key-for-plugin');
define($plugin_prefix . '_REMOTE_URL', 'https://dplugins.dev/hoster/wp-content/uploads/downloads/41/info.json');

require constant($plugin_prefix . '_PATH') . 'inc/update.php';

new DPUpdateChecker(
	constant($plugin_prefix . '_DIR'),
	constant($plugin_prefix . '_VER'),
	constant($plugin_prefix . '_CACHE_KEY'),
	constant($plugin_prefix . '_REMOTE_URL'),
	constant($plugin_prefix . '_BASE')
);



/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_example_static_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_example_static_block_init' );
