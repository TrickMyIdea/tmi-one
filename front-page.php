<?php get_header();
while ( have_posts() ) {
    the_post();

    if(get_theme_mod('tmiEnableTopbar' ) == 1){
        tmiSlider();
    }
?>
<div class="<?php echo TMI_CONTAINER ?>">
    <article id="post-<?php the_ID(); ?>">
	       <?php the_content(); ?>
	</article>
</div>

<?php }
 get_footer( ); ?>
