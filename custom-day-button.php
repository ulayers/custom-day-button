<?php
/**
 *
 * @link              https://ulayers.com
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Day Button
 * Plugin URI:        https://www.ulayers.com/
 * Description:       Adds a button that is only active on a selected day of the week.
 * Version:           1.0.0
 * Author:            LAYERS
 * Author URI:        https://ulayers.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cdb-lang
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cdb_load_textdomain')) {
    function cdb_load_textdomain()
    {
        load_plugin_textdomain('cdb-lang', false, basename(dirname(__FILE__)) . '/languages');
    }
}
add_action('init', 'cdb_load_textdomain');

function cdb_enqueue_scripts() {
    wp_enqueue_script('cdb-custom-js', plugin_dir_url(__FILE__) . 'assets/cdb-custom.js', array(), '1.0', true);
    $options = get_option('cdb_data', []);
    wp_localize_script('cdb-custom-js', 'cdbObj', array(
        'today' => date('l'),
        'activeDay' => isset($options['button_day']) ? $options['button_day'] : '',
        'buttonURL' => isset($options['button_url']) ? esc_url($options['button_url']) : '',
        'alertMessage' => __('This button will be available next ', 'cdb-lang'),
    ));
}
add_action('wp_enqueue_scripts', 'cdb_enqueue_scripts');

require_once plugin_dir_path(__FILE__) . 'includes/admin/cdb_register_admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/cdb_admin_settings_page.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/cdb_register_shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/cdb_admin_notices.php';





