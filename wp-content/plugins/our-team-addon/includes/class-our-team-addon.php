<?php


class Our_Team_Addon {

    public function __construct() {
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
    }
    public function register_widgets() {
        require_once( plugin_dir_path(__FILE__) . 'includes/class-our-team-widget.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Our_Team_Widget() );

    }
}
