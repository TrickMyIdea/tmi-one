<?php

add_action( 'init', 'tmiCreateSlidesPost' );
/**
 * Register a Slide post type.
 */
function tmiCreateSlidesPost() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'tmi' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'tmi' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'tmi' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'tmi' ),
		'add_new'            => _x( 'Add New', 'Slide', 'tmi' ),
		'add_new_item'       => __( 'Add New Slide', 'tmi' ),
		'new_item'           => __( 'New Slide', 'tmi' ),
		'edit_item'          => __( 'Edit Slide', 'tmi' ),
		'view_item'          => __( 'View Slide', 'tmi' ),
		'all_items'          => __( 'All Slides', 'tmi' ),
		'search_items'       => __( 'Search Slides', 'tmi' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'tmi' ),
		'not_found'          => __( 'No Slides found.', 'tmi' ),
		'not_found_in_trash' => __( 'No Slides found in Trash.', 'tmi' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Slides for slider', 'tmi' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);
	register_post_type( 'tmi-slides', $args );
}

/** Short code for Slider **/
function tmiSlider( ) {

    $args = array('post_type'   => 'tmi-slides',
        'post_status' => 'publish',
        'numberposts' => -1);
    // tmiDebug($args);
    $slides = get_posts($args);
    $out = "";
    ?>
    <div id="tmi-slider"  class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#tmi-slider" data-slide-to="0" class="active"></li>
          <li data-target="#tmi-slider" data-slide-to="1"></li>

        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
          <?php $i=0;  foreach ($slides as $slide) {
              $img = get_the_post_thumbnail_url($slide->ID, "full");
              if($img) {} else{$img = "";}
              $active = "";
              if($i == 0) $active = " active";
              $i++;
              ?>
              <div class="carousel-item <?php echo $active ?>">
                <img src="<?php echo $img ?>" alt="Los Angeles">
                  <div class="carousel-caption animate slideInLeft">
                      <h1><?php echo  $slide->post_title ?></h1>
                      <p><?php echo  $slide->post_content ?></p>
                  </div>
              </div>
        <?php  }   ?>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#tmi-slider" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#tmi-slider" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(){
            jQuery('.carousel').carousel({interval: 3000, keyboard: true, });
        });
    </script>
    <?php
 }
 add_shortcode( 'tmislider', 'tmiSlider' );


/*



<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="chicago.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

-------------------------
LC-micro
<div id="tmi-slider" style="width:100%;">
  <ul style="display: none;">
      <?php  foreach ($slides as $slide) {
          $img = get_the_post_thumbnail_url($slide->ID, "full");
          if($img) { $img =" lcms_img='". $img ."'";} else{$img = "";}
          ?>
          <li <?php echo $img ?>> <div class="tmi-slider-caption"><h1><?php echo  $slide->post_title ?></h1><p><?php echo  $slide->post_content ?></div></li>
    <?php  }   ?>
  </ul>
</div>
*/
