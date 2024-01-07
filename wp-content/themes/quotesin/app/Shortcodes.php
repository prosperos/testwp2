<?php

namespace Quotesin;

class Shortcodes
{
    public function __construct()
    {
        add_shortcode('art_posts', array($this, 'art_posts_shortcode'));
    }

    public function art_posts_shortcode($atts)
    {
        $atts = shortcode_atts(
            array(
                'posts_count' => -1,
                'order' => 'DESC',
                'taxonomy' => '',
                'orderby' => 'title',
                'terms' => $atts['terms'],
            ),
            $atts,
            'art_posts'
        );

        $query_args = array(
            'post_type' => 'art',
            'posts_per_page' => intval($atts['posts_count']),
            'order' => strtoupper($atts['order']),
            'orderby' => $atts['orderby'],
            'tax_query' => [
                'taxonomy' => $atts['taxonomy'],
                'field' => 'slug',
            ],
        );


        if (!empty($atts['taxonomy'])) {
            $terms = !empty($atts['terms']) ? explode(',', $atts['terms']) : array();

            if (empty($terms)) {
                $terms = get_terms(array('taxonomy' => $atts['taxonomy'], 'hide_empty' => false));
                $terms = wp_list_pluck($terms, 'slug');
            }

            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => $atts['taxonomy'],
                    'field' => 'slug',
                    'terms' => $terms,
                ),
            );
        }

        $query = new \WP_Query($query_args);

        if ($query->have_posts()) {
            echo '<div class="masonry" id="scroll-wrapper">';
            while ($query->have_posts()) {
                $query->the_post();
                $output = get_template_part( 'template-parts/content-art', get_post_type() , ['taxonomy' => $atts['taxonomy']] );
            }
            echo '</div>';
            wp_reset_postdata();
        } else {
            $output = 'No posts found';
        }

        return $output;
    }
}
