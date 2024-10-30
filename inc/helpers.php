<?php

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

// Die and dump 
if (!function_exists('rbcs_dd')) {
    function rbcs_dd($data)
    {
        echo '<pre>';
        die(highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>"));
        echo '</pre>';
    }
}

// Message function to show in the front-end 
if (!function_exists('rbcs_option_val')) {
    function rbcs_option_val($option_id)
    {
        return esc_html(carbon_get_theme_option($option_id));
    }
}
