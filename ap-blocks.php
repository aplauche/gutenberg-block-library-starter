<?php
/**
 * Plugin Name:       AP Blocks
 * Description:       Starter blocks library
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Anton Plauche
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ap-blocks
 *
 * @package           ap
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */


function ap_block_library_init() {

	$blocklist = file_get_contents(plugin_dir_path( __FILE__ ) . "blocks.json");
	$json = json_decode($blocklist, true);

	$blocks = array();

	foreach ($json['blocks'] as $item) {
		array_push($blocks, array(
			'directory' => $item . "/",
			'render' => "ap_" . str_replace('-', '_', $item) . "_render"
		));
	}

	foreach( $blocks as $block ) {
		
		if(array_key_exists('render', $block)){

			include_once(plugin_dir_path( __FILE__ ) . 'blocks/' . $block['directory'] . 'render.php');

			register_block_type( plugin_dir_path( __FILE__ ) . 'blocks/' . $block['directory'], array(
				'render_callback' => $block['render']
			) );

		} else {
			register_block_type( plugin_dir_path( __FILE__ ) . 'blocks/' . $block['directory'] );
		}
	}
}
add_action( 'init', 'ap_block_library_init' );
