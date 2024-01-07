<?php
/**
 * @package QuotesIn
 */
?>

<div>
    <div class="quotesingle">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('quotesin-page', array('class' => 'featured-image')); ?></a>

        <h2 class="quotetitle"><?php the_title(); ?></h2>

        <div class="qauthor">
            <?php the_category(' '); ?>
        </div>
    </div>

    <?php
    the_content();
    ?>
    <div id="topicmeta">
        <?php the_tags(__('Topics: ', 'quotesin'), '  ', ''); ?>
    </div>
    <?php quotesin_post_nav(); ?>

	