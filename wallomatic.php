<?php
/**
 * Plugin Name: Wallomatic
 * Plugin URI: https://jeffersonreal.uk
 * Description: wallOMatic randomly generates wallpaper on load.
 * Version: 0.2
 * Author: Jefferson Real
 * Author URI: https://jeffersonreal.uk
 * License: GPL2
 *
 * @package wallomatic
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2021, Jefferson Real
 * @license GPL2+
 * @link https://jeffersonreal.uk
 */


/**
 * Register the scripts and styles
 */
function wallomatic_scripts_and_styles() {
    wp_register_script( 'wallomatic_generator_js', plugins_url ( 'js/generator.js', __FILE__ ), array(), '0.5', true );
    wp_register_style( 'wallomatic_wallpaper_css', plugins_url ( 'css/wallpaper.css', __FILE__ ), array(), '0.5', 'all' );
    wp_register_style( 'wallomatic_widget_css', plugins_url ( 'css/widget.css', __FILE__ ), array(), '0.5', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wallomatic_scripts_and_styles' );


/**
* Init the widget
*/
include( plugin_dir_path( __FILE__ ) . 'parts/widget.php');


function shortcode_wallomatic() {
	wp_enqueue_script( 'wallomatic_generator_js');
	wp_enqueue_style( 'wallomatic_wallpaper_css');
}
add_shortcode( 'wallomatic', 'shortcode_wallomatic' );
