<?php

class RealEstateFilterWidget extends WP_Widget
{
    function __construct()
    {

        parent::__construct(
            'real_estate_filter_widget',
            __('Real Estate Filter', 'text_domain'),
            array('description' => __('Display a filter for real estate properties.', 'text_domain'))
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Output filter HTML
        echo '<div class="real-estate-filter-widget">';
        echo '<h2>Filter Real Estate</h2>';
        // Add your filter form or content here
        echo '</div>';

        echo $args['after_widget'];
    }
}
// Register the widget
function register_real_estate_filter_widget() {
    register_widget('RealEstateFilterWidget');
}
add_action('widgets_init', 'register_real_estate_filter_widget');



