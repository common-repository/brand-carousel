<?php

namespace ResponsiveBrandCarousel;

if (!defined('ABSPATH')) {

    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Carbon_Fields;

class RBCS_Carbon_Fields
{

    // Boot carbon fields plugin 
    public function rbcs_crb_load()
    {
        Carbon_Fields::boot();
    }

    // Register carbon fields and init submenu page 
    public function __construct()
    {
        add_action('carbon_fields_register_fields', array($this, 'rbcs_attach_theme_options'));
        add_action('after_setup_theme', array($this, 'rbcs_crb_load'));
    }

    // Declare carbon fields options
    public function rbcs_attach_theme_options()
    {
        !current_user_can('manage_options');

        Container::make('theme_options', __('Carousel Settings', 'brand_carousel'))
            ->set_page_parent('edit.php?post_type=rbcs_carousels')
            ->add_fields(array(
                Field::make('html', 'rbcs_config_help_text')
                    ->set_html('
                    <h2 class="note">Note:</h2>
                    <span>Use this shortcode to show the carousel <strong>[brand-carousel]</strong><br/> If you want add more options or want to edit the look and feel, color etc of the carousel? Then contact the plugin owner <strong>faferdaus@gmail.com</strong></span>
                '),
                Field::make('text', 'rbcs_wrapper_width', __('Carousel Wrapper Width', 'brand_carousel'))
                    ->set_attribute('placeholder', __('e.g. 500', 'brand_carousel'))
                    ->set_help_text(__('Insert total width of the carousel.', 'brand_carousel'))
                    ->set_default_value('500'),
                Field::make('text', 'rbcs_image_width', __('Carousel Image Width', 'brand_carousel'))
                    ->set_attribute('placeholder', __('e.g. 100', 'brand_carousel'))
                    ->set_help_text(__('Insert brands/slide image width.', 'brand_carousel'))
                    ->set_default_value('150'),
                Field::make('text', 'rbcs_image_height', __('Carousel Image Height', 'brand_carousel'))
                    ->set_attribute('placeholder', __('e.g. 100', 'brand_carousel'))
                    ->set_help_text(__('Insert brands/slide image height.', 'brand_carousel'))
                    ->set_default_value('100'),
                Field::make('text', 'rbcs_how_many_brand', __('How many brands/slide to show at a time?', 'brand_carousel'))
                    ->set_attribute('placeholder', __('e.g. 3', 'brand_carousel'))
                    ->set_help_text(__('Insert, how many brands you want to show at a time?.', 'brand_carousel'))
                    ->set_default_value('3'),
                Field::make('text', 'rbcs_gap_between_brand', __('Gap between brand/slide.', 'brand_carousel'))
                    ->set_attribute('placeholder', __('e.g. 10', 'brand_carousel'))
                    ->set_help_text(__('Insert, how much gap need between brands/slide?.', 'brand_carousel'))
                    ->set_default_value('10'),
                Field::make('radio', 'rbcs_activate_auto_slide', __('Auto Slide?'))
                    ->set_help_text(__('Would you like to slide the carousel automatically? Then select yes.', 'brand_carousel'))
                    ->add_options(array(
                        'yes' => __('Yes'),
                        'no' => __('No'),
                    )),
                Field::make('radio', 'rbcs_activate_arrows', __('Show arrow icon?'))
                    ->set_help_text(__('Would you like to show left and right arrows? Then select yes.', 'brand_carousel'))
                    ->add_options(array(
                        'yes' => __('Yes'),
                        'no' => __('No'),
                    )),
                Field::make('radio', 'rbcs_activate_dots', __('Show dots?'))
                    ->set_help_text(__('Would you like to show dots below the carousel? Then select yes.', 'brand_carousel'))
                    ->add_options(array(
                        'yes' => __('Yes'),
                        'no' => __('No'),
                    ))
            ));
    }
}
