<?php
/**
 * @Since 1.0.0
 *
 * Register Used Shortcode
 * Author => Mohamed Ali
 */

function cdb_button_shortcode()
{
    $options = get_option('cdb_data', []);
    if (!$options || !isset($options['button_text']) || !isset($options['button_day']) || !isset($options['button_url'])) {
        return 'Button settings are not configured yet.';
    }
    $button_html = '<button id="customDayButton">' . esc_html($options['button_text']) . '</button>';
    return $button_html;
}
add_shortcode('custom_day_button', 'cdb_button_shortcode');
