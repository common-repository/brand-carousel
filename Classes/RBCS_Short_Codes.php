<?php

namespace ResponsiveBrandCarousel;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class RBCS_Short_Codes
{
    // Init shortcode 
    public function __construct()
    {
        add_shortcode('brand-carousel', array($this, 'rbcs_brand_carousel'));
    }

    // Include carousel in the front-end
    public function rbcs_brand_carousel()
    {
        ob_start();
        include RBCS__PLUGIN_DIR . 'views/brand-carousel.php';
        $output = ob_get_clean();
        return $output;
    }
}
