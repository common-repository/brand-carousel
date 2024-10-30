<?php

namespace ResponsiveBrandCarousel;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class RBCS_Data_PHP_To_Js
{

    // Enqueue script to pass data from PHP to JS file
    public function enqueue_rbcs_php_to_js_data()
    {
        wp_localize_script(

            'rbcs-main', //Enqueued JS file handle
            'rbcs_option_data', //Localized ID that need to use in the JS file

            array(
                'dots' => rbcs_option_val('rbcs_activate_dots'),
                'auto_slide' => rbcs_option_val('rbcs_activate_auto_slide'),
                'how_many_brand' => rbcs_option_val('rbcs_how_many_brand'),
                'activate_arrows' => rbcs_option_val('rbcs_activate_arrows'),
            )
        );
    }
}
