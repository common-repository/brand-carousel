<?php

namespace ResponsiveBrandCarousel;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

use ResponsiveBrandCarousel\RBCS_Data_PHP_To_Js;

class RBCS_Enqueue_Scripts
{
    // Init scripts 
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_rbcs_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'crb_enqueue_custom_carbon_fields_styles'));
    }

    // Enqueue scripts
    public function enqueue_rbcs_scripts()
    {
        wp_enqueue_style('rbcs-slick', RBCS__PLUGIN_URL  . 'assets/css/slick.css', array(), RBCS_VERSION, 'all');
        $this->rbcs_enqueue_style_if_not_enqueued('slick-theme.css');

        if (!wp_script_is('jquery', 'enqueued')) {
            wp_enqueue_script('jquery');
        }

        $this->rbcs_enqueue_script_if_not_enqueued('slick.min.js', 'jquery');
        wp_enqueue_script('rbcs-main', RBCS__PLUGIN_URL . 'assets/js/rbcs-main.js', array('jquery'), RBCS_VERSION, false);

        (new RBCS_Data_PHP_To_Js)->enqueue_rbcs_php_to_js_data();
    }

    // Enqueue carbon-fields css
    public function crb_enqueue_custom_carbon_fields_styles()
    {
        wp_enqueue_style('carbon-fields-custom-theme', RBCS__PLUGIN_URL  . 'assets/css/carbon-fields-theme.css', array(), '1.0.0', 'all');
    }


    protected function rbcs_enqueue_style_if_not_enqueued($file_name)
    {
        global $wp_scripts;

        foreach ($wp_scripts->queue as $handle) {

            $src = $wp_scripts->registered[$handle]->src;

            if (strpos($src, $file_name) === false) {
                wp_enqueue_style($file_name, RBCS__PLUGIN_URL  . 'assets/css/' . $file_name, array(), RBCS_VERSION, 'all');
            }
        }
    }

    protected function rbcs_enqueue_script_if_not_enqueued($file_name, $rbcs_enqueue_dependency = null)
    {
        global $wp_scripts;

        foreach ($wp_scripts->queue as $handle) {

            $src = $wp_scripts->registered[$handle]->src;

            if (strpos($src, $file_name) === false) {
                wp_enqueue_script($file_name, RBCS__PLUGIN_URL  . 'assets/js/' . $file_name, array($rbcs_enqueue_dependency), RBCS_VERSION, 'all');
            }
        }
    }
}
