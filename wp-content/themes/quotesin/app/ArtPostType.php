<?php

namespace Quotesin;

class ArtPostType {
    public function __construct() {
        add_action('init', array($this, 'register_art_post_type'));

        add_action('init', array($this, 'register_music_taxonomy'));
        add_action('init', array($this, 'register_photography_taxonomy'));
    }

    public function register_art_post_type() {
        $labels = array(
            'name'               => __('Art', 'quotesin'),
            'singular_name'      => __('Art', 'quotesin'),
            'menu_name'          => __('Art', 'quotesin'),
            'name_admin_bar'     => __('Art', 'quotesin'),
            'add_new'            => __('Add New', 'quotesin'),
            'add_new_item'       => __('Add New Art', 'quotesin'),
            'new_item'           => __('New Art', 'quotesin'),
            'edit_item'          => __('Edit Art', 'quotesin'),
            'view_item'          => __('View Art', 'quotesin'),
            'all_items'          => __('All Art', 'quotesin'),
            'search_items'       => __('Search Art', 'quotesin'),
            'parent_item_colon'  => __('Parent Art:', 'quotesin'),
            'not_found'          => __('No art found.', 'quotesin'),
            'not_found_in_trash' => __('No art found in Trash.', 'quotesin')
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'art'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        );

        register_post_type('art', $args);
    }
    public function register_music_taxonomy() {
        $labels = array(
            'name'              => __('Music', 'quotesin'),
            'singular_name'     => __('Music', 'quotesin'),
            'search_items'      => __('Search Music', 'quotesin'),
            'all_items'         => __('All Music', 'quotesin'),
            'parent_item'       => __('Parent Music', 'quotesin'),
            'parent_item_colon' => __('Parent Music:', 'quotesin'),
            'edit_item'         => __('Edit Music', 'quotesin'),
            'update_item'       => __('Update Music', 'quotesin'),
            'add_new_item'      => __('Add New Music', 'quotesin'),
            'new_item_name'     => __('New Music Name', 'quotesin'),
            'menu_name'         => __('Music', 'quotesin'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'music'),
        );

        register_taxonomy('music', 'art', $args);
    }

    public function register_photography_taxonomy() {
        $labels = array(
            'name'              => __('Photography', 'quotesin'),
            'singular_name'     => __('Photography', 'quotesin'),
            'search_items'      => __('Search Photography', 'quotesin'),
            'all_items'         => __('All Photography', 'quotesin'),
            'parent_item'       => __('Parent Photography', 'quotesin'),
            'parent_item_colon' => __('Parent Photography:', 'quotesin'),
            'edit_item'         => __('Edit Photography', 'quotesin'),
            'update_item'       => __('Update Photography', 'quotesin'),
            'add_new_item'      => __('Add New Photography', 'quotesin'),
            'new_item_name'     => __('New Photography Name', 'quotesin'),
            'menu_name'         => __('Photography', 'quotesin'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'photography'),
        );

        register_taxonomy('photography', 'art', $args);
    }
}
