<?php
/**
 * Plugin Name: Real Estate Manager
 * Description: Plugin to manage real estate properties with ACF fields, shortcode, and widget.
 * Version: 1.0
 * Author: Vitaliy
 */


class RealEstateManager
{

    public function __construct()
    {
        add_action('wp_dashboard_setup', array($this, 'add_dashboard_widget'));

        // Register custom post type and taxonomy
        add_action('init', array($this, 'register_real_estate_post_type'));
        add_action('init', array($this, 'register_district_taxonomy'));

        // Add ACF fields for Real Estate Property
        add_action('acf/init', array($this, 'add_acf_fields'));

        // Display ACF fields on the single page
        add_action('wp_footer', array($this, 'display_real_estate_details'));

        // Add shortcode for the filter
        add_shortcode('real_estate_filter', array($this, 'real_estate_filter_shortcode'));

        // Register widget for the filter
        add_action('widgets_init', array($this, 'register_real_estate_filter_widget'));
    }


    public function add_dashboard_widget()
    {
        $this->register_real_estate_filter_widget();

        wp_add_dashboard_widget(
            'real_estate_filter_widget',
            'Real Estate Filter',
            array($this, 'render_dashboard_widget')
        );
    }

    public function register_real_estate_post_type()
    {
        $labels = array(
            'name' => 'Real Estate Properties',
            'singular_name' => 'Real Estate Property',
            'menu_name' => 'Real Estate',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Real Estate Property',
            'edit_item' => 'Edit Real Estate Property',
            'new_item' => 'New Real Estate Property',
            'view_item' => 'View Real Estate Property',
            'search_items' => 'Search Real Estate Properties',
            'not_found' => 'No Real Estate Properties found',
            'not_found_in_trash' => 'No Real Estate Properties found in trash',
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-home', // Icon for admin menu
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'taxonomies' => array('district'), // Associate with the "District" taxonomy
        );

        register_post_type('real_estate', $args);
    }

    // Registering a new taxonomy "District"
    public function register_district_taxonomy()
    {
        $labels = array(
            'name' => 'Districts',
            'singular_name' => 'District',
            'search_items' => 'Search Districts',
            'all_items' => 'All Districts',
            'parent_item' => 'Parent District',
            'parent_item_colon' => 'Parent District:',
            'edit_item' => 'Edit District',
            'update_item' => 'Update District',
            'add_new_item' => 'Add New District',
            'new_item_name' => 'New District Name',
            'menu_name' => 'Districts',
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
        );

        register_taxonomy('district', array('real_estate'), $args);
    }

    // ACF fields for Real Estate Property
    public function add_acf_fields()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group(array(
                'key' => 'group_61c3e7c42523e',
                'title' => 'Real Estate Details',
                'fields' => array(
                    array(
                        'key' => 'field_61c3e7c4b8de1',
                        'label' => 'House Name',
                        'name' => 'house_name',
                        'type' => 'text',
                        'instructions' => 'Enter the name of the house.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_61c3e7c4b8de2',
                        'label' => 'Location Coordinates',
                        'name' => 'location_coordinates',
                        'type' => 'text',
                        'instructions' => 'Enter the coordinates of the location.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_61c3e7c4b8de3',
                        'label' => 'Number of Floors',
                        'name' => 'number_of_floors',
                        'type' => 'number',
                        'instructions' => 'Select the number of floors (1-20).',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 1,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_61c3e7c4b8de4',
                        'label' => 'Building Type',
                        'name' => 'building_type',
                        'type' => 'radio',
                        'instructions' => 'Select the type of building.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'panel' => 'Panel',
                            'brick' => 'Brick',
                            'foam_block' => 'Foam Block',
                        ),
                        'allow_null' => 0,
                        'other_choice' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                        'save_other_choice' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'real_estate',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'shortcode' => 'real_estate_filter', // Shortcode for the filter
            ));

        endif;
    }

// Display ACF fields on the single page
    function display_real_estate_details()
    {
        if (is_singular('real_estate')) {
            $house_name = get_field('house_name');
            $location_coordinates = get_field('location_coordinates');
            $number_of_floors = get_field('number_of_floors');
            $building_type = get_field('building_type');

            echo '<div class="real-estate-details">';
            echo '<h2>Real Estate Details</h2>';
            echo '<p><strong>House Name:</strong> ' . esc_html($house_name) . '</p>';
            echo '<p><strong>Location Coordinates:</strong> ' . esc_html($location_coordinates) . '</p>';
            echo '<p><strong>Number of Floors:</strong> ' . esc_html($number_of_floors) . '</p>';
            echo '<p><strong>Building Type:</strong> ' . esc_html($building_type) . '</p>';
            echo '</div>';
        }
    }


    public function real_estate_filter_shortcode()
    {
        ob_start();
        ?>
        <!-- Filter HTML goes here -->
        <?php
        return ob_get_clean();
    }

    public function register_real_estate_filter_widget()
    {
        require_once plugin_dir_path(__FILE__) . 'widget-real-estate-filter.php';
        register_widget('RealEstateFilterWidget');
    }


}

// Initialize the plugin
$real_estate_manager = new RealEstateManager();


