<?php

/*
 ** Fired when the plugin is uninstalled
 ** Created: @version 1.0.0
 ** Updated: @version -----
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

global $wpdb;
$wpdb->delete($wpdb->options, array('option_name' => 'wpil_settings'));
$wpdb->delete($wpdb->options, array('option_name' => 'WPInstalogin_lic_Key'));
$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'WPInstalogin_lic_Key_%'");
