<?php
/*
Plugin Name: CEC Paywall Plugin
Description: Plugin to implement a paywall in WordPress
Version: 1.0
Author: Enrique
*/

if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/user-roles.php';
require_once plugin_dir_path(__FILE__) . 'includes/post-metabox.php';
require_once plugin_dir_path(__FILE__) . 'includes/paywall-gate.php';
require_once plugin_dir_path(__FILE__) . 'includes/premium-content.php';

// Plugin activation
register_activation_hook(__FILE__, 'cec_paywall_activate');

function cec_paywall_activate() {
    add_user_roles();
}

// Deactivating the plugin
register_deactivation_hook(__FILE__, 'cec_paywall_deactivate');

function cec_paywall_deactivate() {
    remove_user_roles();
}

// Load styles
add_action('wp_enqueue_scripts', 'cec_paywall_enqueue_styles');

function cec_paywall_enqueue_styles() {
    wp_enqueue_style('cec-paywall-styles', plugin_dir_url(__FILE__) . 'style.css');
}