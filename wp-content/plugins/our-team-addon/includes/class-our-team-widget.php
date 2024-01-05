<?php
namespace YourVendor\OurTeamAddon\Widgets;

use Elementor\Widget_Base;

class Our_Team_Widget extends Widget_Base {

    public function get_name() {
        return 'our-team-widget';
    }

    public function get_title() {
        return 'Our Team';
    }

    public function get_icon() {
        return 'fa fa-users';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Our Team', 'text-domain'),
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => __('Team Members', 'text-domain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'member_image',
                        'label' => __('Image', 'text-domain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __('Name', 'text-domain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('John Doe', 'text-domain'),
                    ],
                    [
                        'name' => 'member_description',
                        'label' => __('Description', 'text-domain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('Description goes here.', 'text-domain'),
                    ],
                ],
                'default' => [
                    [
                        'member_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'member_name' => __('John Doe', 'text-domain'),
                        'member_description' => __('Description goes here.', 'text-domain'),
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'columns_per_row',
            [
                'label' => __('Columns Per Row', 'text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __('1 Column', 'text-domain'),
                    '2' => __('2 Columns', 'text-domain'),
                    '3' => __('3 Columns', 'text-domain'),
                    '4' => __('4 Columns', 'text-domain'),
                    '6' => __('6 Columns', 'text-domain'),
                ],
                'default' => '3',
                'prefix_class' => 'elementor-grid%s-columns-',
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();

        $this->register_styles();
    }

    protected function render() {
        $settings = $this->get_settings();
        $team_members = $settings['team_members'];
        $columns_per_row = $settings['columns_per_row'];

        echo '<div class="our-team-wrapper elementor-grid elementor-grid-' . esc_attr($columns_per_row) . '-columns">';

        foreach ($team_members as $index => $member) {
            echo '<div class="our-team-member elementor-grid-item">';

            // Display member image
            echo '<img src="' . esc_url($member['member_image']['url']) . '" alt="' . esc_attr($member['member_name']) . '">';

            // Display member name
            echo '<h3 class="our-team-member-name">' . esc_html($member['member_name']) . '</h3>';

            // Display member description
            echo '<p class="our-team-member-description">' . esc_html($member['member_description']) . '</p>';

            echo '</div>'; // Closing our-team-member div

            // Add a clear after each row
            if (($index + 1) % $columns_per_row === 0) {
                echo '<div class="elementor-clearfix"></div>';
            }
        }

        echo '</div>'; // Closing our-team-wrapper div
    }

    private function register_styles() {
        wp_register_style(
            'our-team-widget',
            plugin_dir_url(__FILE__) . 'our-team-widget.css',
            [],
            '1.0.0'
        );

        wp_enqueue_style('our-team-widget');
    }

}
