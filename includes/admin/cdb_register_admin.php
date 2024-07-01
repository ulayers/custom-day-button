<?php

/**
 * @Since 1.0.0
 *
 * Register Admin Menu
 * Author => Mohamed Ali
 */

function cdb_add_admin_page()
{
    add_menu_page(
        'Custom Day Button Settings',
        'Day Button',
        'manage_options',
        'custom_day_button',
        'cdb_settings_page',
        'dashicons-admin-generic'
    );
}
add_action('admin_menu', 'cdb_add_admin_page');

function cdb_register_settings()
{
    register_setting('cdb_options_group', 'cdb_data', 'cdb_sanitize_options');
    add_settings_section('cdb_settings_section', 'Button Settings', 'cdb_section_text', 'custom_day_button');
    add_settings_field('button_text', 'Button Text', 'cdb_text_field', 'custom_day_button', 'cdb_settings_section', array('button_text'));
    add_settings_field('button_day', 'Active Day', 'cdb_day_field', 'custom_day_button', 'cdb_settings_section', array('button_day'));
    add_settings_field('button_url', 'Button URL', 'cdb_url_field', 'custom_day_button', 'cdb_settings_section', array('button_url'));
}
