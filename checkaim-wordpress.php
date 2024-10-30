<?php

/*
 * @wordpress-plugin
 * Plugin Name: CheckAIM - AI Anti Fraud Protection
 * Plugin URI: https://checkaim.com
 * Description: Revenues using our REVOLUTIONARY AI & Machine Learning System. Trusted Cross device, behavioural brand protection!
 * Version: 1.0.0
 * Author: Searlco
 * Author URI: https://www.searlco.com/
 * License: GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce Checkaim main class.
 */
class CheckAIM {
    /**
     * Constructor
     * Init menu item.
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'checkaim_menu' ));
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }
    /**
     * Register menu item
     */
    public function checkaim_menu() {
        add_menu_page(
            "CheckAIM",
            "CheckAIM",
            "manage_options",
            "checkaim",
            array( $this, 'checkaim_admin_view' ),
            "dashicons-shield",
            99
        );
    }
    /**
     * Admin view for CheckAIM
     */
    public function checkaim_admin_view()
    {
        include "admin/checkaim-admin-view.php";
    }
    /**
     * Register settings field CheckAIM MID
     */
    public function register_settings() {
        register_setting( 'checkaim', 'checkaim_mid' );
    }
}

new CheckAIM();

// Notification
include "admin/checkaim-admin-notices.php";

// Includes
include "includes/checkaim-track-image.php";

/**
 * Load styles for admin view
 */
function checkaim_load_admin_styles() {
    wp_enqueue_style( 'checkaim_admin_css', plugins_url('assets/style-admin.css',__FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'checkaim_load_admin_styles' );

/**
 * Load styles for image on frontend
 */
function checkaim_load_styles() {
    wp_enqueue_style( 'checkaim_admin_css', plugins_url('assets/style-view.css',__FILE__ ) );
}
add_action( 'enqueue_scripts', 'checkaim_load_styles' );
