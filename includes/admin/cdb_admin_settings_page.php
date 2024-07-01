<?php
/**
 * @Since 1.0.0
 *
 * Admin Settigns Sections
 * Author => Mohamed Ali
 */

function cdb_settings_page()
{
    ?>
     <div class="wrap">
         <h1>Custom Day Button Settings</h1>
         <form method="post" action="options.php">
             <?php
    settings_fields('cdb_options_group');
    do_settings_sections('custom_day_button');
    submit_button();
    ?>
         </form>
     </div>
     <?php
}

function cdb_section_text()
{
    echo '<p>Use <strong>[custom_day_button]</strong> Shortcode to display the button anywhere</p>';
}

function cdb_text_field($args)
{
    $options = get_option('cdb_data', []);
    $value = isset($options[$args[0]]) ? esc_attr($options[$args[0]]) : '';
    echo "<input id='" . $args[0] . "' name='cdb_data[" . $args[0] . "]' size='40' type='text' value='" . $value . "' />";
}

function cdb_day_field($args)
{
    $options = get_option('cdb_data', []);
    $currentValue = isset($options[$args[0]]) ? $options[$args[0]] : '';
    echo "<select id='" . $args[0] . "' name='cdb_data[" . $args[0] . "]'>";
    $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    foreach ($days as $day) {
        $selected = ($currentValue == $day) ? 'selected' : '';
        echo "<option value='$day' $selected>$day</option>";
    }
    echo "</select>";
}

function cdb_url_field($args)
{
    $options = get_option('cdb_data', []);
    $value = isset($options[$args[0]]) ? esc_attr($options[$args[0]]) : '';
    echo "<input id='" . $args[0] . "' name='cdb_data[" . $args[0] . "]' size='40' type='url' value='" . $value . "' />";
}

add_action('admin_init', 'cdb_register_settings');