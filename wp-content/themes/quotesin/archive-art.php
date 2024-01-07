<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QuotesIn
 */

get_header();

?>
<?php if ( have_posts() ) : ?>

    <div class="demo-wrap">
        <div class="wrapper">
            <div class="quote-archive">
                <?php
                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </div>
            <div class="masonry" id="scroll-wrapper">
                <?php echo do_shortcode('[art_posts posts_count="10" order="ASC" orderby="title" taxonomy="music" ]');//terms="1,2,3" photography ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>
<?php get_footer(); ?>
