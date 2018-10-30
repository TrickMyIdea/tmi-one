<?php
get_header();
global $post;
while ( have_posts() ) {
    the_post();
?>
<article id="post-<?php the_ID(); ?>" class="tmi-page">
    <?php if(has_post_thumbnail()){ ?>
        <div class="tmi-title-box hasImage" style="background-image:url(<?php echo get_the_post_thumbnail_url( $post, 'full' );?>)" >
            <div class="<?php echo TMI_CONTAINER ?>">
                <h2 class="tmi-title"><?php the_title(); ?></h2>
            </div>
        </div>
    <?php }else{ ?>
        <div class="tmi-title-box">
            <div class="<?php echo TMI_CONTAINER ?>">
                <h2 class="tmi-title"><?php the_title(); ?></h2>
            </div>
        </div>
    <?php } ?>
    <div class="<?php echo TMI_CONTAINER ?>">
        <div class="tmi-content-box">
            <?php the_content(); ?>
        </div>
    </div>
</article>
<?php }
get_footer();
