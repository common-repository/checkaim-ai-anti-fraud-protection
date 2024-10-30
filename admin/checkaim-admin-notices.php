<?php
/**
 * Shows some additional help text after saving the MID settings
 */
function checkaim_saved_notification() {
    $screen = get_current_screen();

    if ( $screen->id !== 'toplevel_page_checkaim' ) {
        return;
    }

    $old_auid = get_option( 'checkaim_mid', '' );
    $new_auid = isset( $_POST['checkaim_mid'] ) ? sanitize_text_field( $_POST['checkaim_mid'] ) : '';

    if ( $old_auid !== $new_auid && isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p>The customer ID has been saved successfully!</p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'checkaim_saved_notification' );

/**
 * Shows error notice text if Woocommerce don`t installed
 */
function checkaim_check_woocommerce() {
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        ?>
        <div class="error notice">
            <p>The CheckAIM plugin requires WooCommerce to be installed and activated.</p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'checkaim_check_woocommerce' );