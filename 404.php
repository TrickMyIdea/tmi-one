<?php
get_header();
global $post;
while ( have_posts() ) {
    the_post();
?>
<article id="post-<?php the_ID(); ?>" class="tmi-page">
    
    <div class="tmi-title-box">
        <div class="<?php echo TMI_CONTAINER ?>">
            <h2 class="tmi-title">404 - File Not found</h2>
        </div>
    </div>

    <div class="<?php echo TMI_CONTAINER ?>">
        <div class="tmi-content-box">
          It looks like the link you are accessing is incorrect or has been expired.<br/>
          Please check with administrator.
          <p>You will be redirected to home page now. <a href="<?php echo site_url();?>">Click here</a>, if it doesn't redirects automatically.
        </div>
    </div>
</article>
<script type="text/javascript"> 
setTimeout(function(){window.location.href='<?php echo site_url()?>';}, 5000);
</script>
<?php }
get_footer();
