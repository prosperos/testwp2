<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package QuotesIn
 */

?>
<div <?php post_class('item'); ?>>

    <div class="quotebox">
        <h2 class="quotetitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="quotebox__excerpt">
            <?php the_excerpt();?>
        </div>
        <?php
         $post_img = get_the_post_thumbnail_url();
         if ($post_img){?>
        <div class="quotebox__image">
            <img src="<?php echo $post_img;?>" alt="<?php the_title(); ?>">
        </div>
        <?php }?>
        <div class="qauthor">
            <?php the_terms(get_the_ID(), $args['taxonomy'], 'Category: ', ', ', '');
            ?>
        </div>
    </div>
    <div class="qtopic">
        <?php the_tags(__('Topics: ', 'quotesin'), ', ', '<br/>'); ?>
    </div>
</div>
