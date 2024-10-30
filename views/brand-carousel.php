<div class="rbcs-wrapper mx-auto">
    <?php
    global $post;
    $args = array('post_type' => 'rbcs_carousels', 'posts_per_page' => -1);
    $your_post = get_posts($args);
    if ($your_post) :
    ?>
        <div class="responsive-brand-carousel">

            <?php
            foreach ($your_post as $post) :
            ?>
                <?php if (has_post_thumbnail($post->ID)) : ?>
                    <div><?php the_post_thumbnail('', ['alt' => get_the_title()]); ?></div>
                <?php else : ?>
                    <p class="rbcs-no-image">No image.</p>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    <?php else :  ?>
        <p class="rbcs-alert"><?php _e('Sorry, no Brand/Slide found. Please add Brand/Slide.'); ?></p>
    <?php endif; ?>
</div>

<style>
    .rbcs-wrapper {
        max-width: 1400px !important;
        width: <?php echo rbcs_option_val('rbcs_wrapper_width'); ?>px !important;
        padding: 15px 10px 15px 10px !important;
    }

    .slick-slide img {
        display: block;
        max-width: <?php echo rbcs_option_val('rbcs_image_width'); ?>px;
        max-height: <?php echo rbcs_option_val('rbcs_image_height'); ?>px;
        margin: 0 auto;
    }

    .slick-slide {
        margin: 0 <?php echo rbcs_option_val('rbcs_gap_between_brand'); ?>px;
    }

    .slick-list {
        margin: 0 -<?php echo rbcs_option_val('rbcs_gap_between_brand'); ?>px;
    }
</style>