<?php
/**
 * @Since 1.0.0
 *
 * Admin Notices
 * Author => Mohamed Ali
 */

function cdb_admin_notices()
{
    $screen = get_current_screen();
    if ($screen->id !== 'toplevel_page_custom_day_button') {
        return;
    }

    if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Settings saved successfully.', 'custom-day-button');?></p>
        </div>
        <?php
}
}
add_action('admin_notices', 'cdb_admin_notices');