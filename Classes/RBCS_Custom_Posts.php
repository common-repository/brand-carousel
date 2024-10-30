<?php

namespace ResponsiveBrandCarousel;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class RBCS_Custom_Posts
{

    // Init custom posts
    public function __construct()
    {
        add_action('init', array($this, 'rbcs_carousel'));
        add_filter('manage_rbcs_carousels_posts_columns', array($this, 'rbcs_carousels_posts_columns'));
        add_action('manage_rbcs_carousels_posts_custom_column', array($this, 'fill_rbcs_carousels_column_data'), 10, 2);
        add_action('admin_init', array($this, 'modify_rbcs_carousels_search'));
        add_filter('enter_title_here', array($this, 'rbcs_change_title_text'));
    }

    // Register custom post
    public function rbcs_carousel()
    {
        $labels = array(
            'name'                => _x('Brands', 'Post Type General Name', 'brand_carousel'),
            'singular_name'       => _x('Brand', 'Post Type Singular Name', 'brand_carousel'),
            'menu_name'           => __('Brands Carousel', 'brand_carousel'),
            'add_new'             => __('Add New Brand', 'brand_carousel'),
            'add_new_item'        => __('Add a New Brand', 'brand_carousel'),
            'edit_item'           => __('Edit Brand', 'brand_carousel'),
            'not_found'           => __('No Brand Found', 'brand_carousel'),
            'insert_into_item'    => __('Insert into brand', 'brand_carousel'),
            'uploaded_to_this_item'    => __('Upload into brand', 'brand_carousel'),
            'featured_image'           => __('Brand Image', 'brand_carousel'),
            'set_featured_image'           => __('Set Brand Image', 'brand_carousel'),
            'remove_featured_image'           => __('Remove Brand Image', 'brand_carousel'),
            'use_featured_image'           => __('Use Brand Image', 'brand_carousel'),
            'search_items'           => __('Search Brand', 'brand_carousel'),
        );

        $args = array(
            'label'               => __('Brands', 'brand_carousel'),
            'labels'              => $labels,
            'supports'            => ['title', 'thumbnail'],
            'has_archive'         => true,
            'capability_type'     => 'post',
            'public' => true,
            'publicly_queryable'  => false,
            'map_meta_cap' => true,
            'menu_icon'           => 'dashicons-images-alt2',

        );

        // Registering your Custom Post Type
        register_post_type('rbcs_carousels', $args);
    }

    public function rbcs_change_title_text($title)
    {
        $screen = get_current_screen();

        if ('rbcs_carousels' == $screen->post_type) {
            $title = 'Enter brand name';
        }

        return $title;
    }

    // Add custom posts columns
    public function rbcs_carousels_posts_columns($columns)
    {
        $columns = [
            'cb' => $columns['cb'],
            'title' => __('Brand Name'),
            'image' => __('Brand Image'),
            'date' => $columns['date']
        ];

        return $columns;
    }

    // Add custom posts columns data
    public function fill_rbcs_carousels_column_data($column, $post_id)
    {
        switch ($column) {
            case 'image':
                echo get_the_post_thumbnail(absint($post_id), array(50, 50), true);
                break;
        }
    }

    // Modify custom posts search in admin area
    public function modify_rbcs_carousels_search()
    {
        global $typenow;

        if ($typenow == 'rbcs_carousels') {
            add_filter('posts_search', array($this, 'override_rbcs_carousels_search'), 10, 2);
        }
    }

    // Function custom posts search in admin area
    public function override_rbcs_carousels_search($search, $query)
    {
        global $wpdb;

        if ($query->is_main_query() && !empty($query->query['s'])) {
            $sql    = "
              or exists (
                  select * from {$wpdb->postmeta} where post_id={$wpdb->posts}.ID
                  and meta_key in ('title')
                  and meta_value like %s
              )
          ";
            $like   = '%' . $wpdb->esc_like($query->query['s']) . '%';
            $search = preg_replace(
                "#\({$wpdb->posts}.post_title LIKE [^)]+\)\K#",
                $wpdb->prepare($sql, $like),
                $search
            );
        }

        return $search;
    }
}
