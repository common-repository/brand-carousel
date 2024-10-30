<?php
/*
Plugin Name: Brand Carousel
Description: Responsive Brand Carousel/Image Carousel is easy to use. You can add as many slide as you want. If you want to modify or want to add extra features, please contact the owner faferdaus@gmail.com..
Author: Ferdaus Alom
Author URI: https://ferdausalom.site
Version: 1.0.0
Requires at least: 5.0
Requires PHP: 5.0
Text Domain: brand_carousel
*/

// Make sure we don't expose any info if called directly
if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

// Load Composer autoloader
$rbcs_autoload_file = __DIR__ . '/vendor/autoload.php';
if (file_exists($rbcs_autoload_file)) {
    require_once $rbcs_autoload_file;
}

// Register your plugin's namespace with Composer
$loader = new \Composer\Autoload\ClassLoader();
$loader->addPsr4('ResponsiveBrandCarousel\\', __DIR__ . '/Classes');
$loader->register();

// Define plugin constants 
define('RBCS_VERSION', '1.0.0');
define('RBCS__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('RBCS__PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required classes 
use ResponsiveBrandCarousel\RBCS_Enqueue_Scripts;
use ResponsiveBrandCarousel\RBCS_Short_Codes;
use ResponsiveBrandCarousel\RBCS_Carbon_Fields;
use ResponsiveBrandCarousel\RBCS_Custom_Posts;


class Plugin_RBCS_Bootstrap
{
    // Init plugin 
    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'rbcs_run_classes'));
    }

    // Instantiate required classes 
    public function rbcs_run_classes()
    {
        new RBCS_Enqueue_Scripts;
        new RBCS_Short_Codes;
        new RBCS_Carbon_Fields;
        new RBCS_Custom_Posts;
    }
}

new Plugin_RBCS_Bootstrap;
