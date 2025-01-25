<?php
/**
 * Plugin Name:       Assamese Font by Lachit
 * Plugin URI:        https://wordpress.org/plugins/assamese-font/
 * Description:       With this plugin installed, the Assamese text on your website will be as clear and beautiful as it appears in traditional books. It enhances the readability and appearance of Assamese content on your site.
 * Version:           1.0
 * Stable tag:        1.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Tested up to:      6.7
 * Author:            Lachit.Org
 * Author URI:        https://lachit.org/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('ASSAMESE_FONT_FILE', __FILE__);
define('ASSAMESE_FONT_URL', plugin_dir_url(__FILE__));

require_once plugin_dir_path(__FILE__) . 'admin/settings.php';

/**
 * Enqueue the selected Assamese font's CSS file.
 */
function assamese_fonts_enqueue_style() {
    $selected_font = get_option('assamese_font', 'Jyotirupa'); // Default font is Jyotirupa

    // Enqueue the respective font CSS file based on the selected option
    if ($selected_font === 'Jyotirupa') {
        wp_enqueue_style('assamese-fonts-jyotirupa', ASSAMESE_FONT_URL . 'assets/css/jyotirupa.css');
    } elseif ($selected_font === 'Rangmon') {
        wp_enqueue_style('assamese-fonts-rangmon', ASSAMESE_FONT_URL . 'assets/css/rangmon.css');
    }
}
add_action('wp_enqueue_scripts', 'assamese_fonts_enqueue_style');
