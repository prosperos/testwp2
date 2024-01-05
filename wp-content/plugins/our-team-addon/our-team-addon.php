<?php
/*
Plugin Name: Our Team Addon
Description: Custom Elementor addon to display team members.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

add_action('plugins_loaded', 'our_team_addon_init');

function our_team_addon_init() {
    if (class_exists('YourVendor\\OurTeamAddon\\Our_Team_Addon')) {

        $our_team_addon = new YourVendor\OurTeamAddon\Our_Team_Addon();

        $our_team_addon->init();
    }
}
