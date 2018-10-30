<?php
add_action( 'init', 'tmiCreateContentAreaPost' );
/**
 * Register a Content Area post type.
 */
function tmiCreateContentAreaPost() {
	$labels = array(
		'name'               => _x( 'Content Areas', 'post type general name', 'tmi' ),
		'singular_name'      => _x( 'Content Area', 'post type singular name', 'tmi' ),
		'menu_name'          => _x( 'Content Areas', 'admin menu', 'tmi' ),
		'name_admin_bar'     => _x( 'Content Area', 'add new on admin bar', 'tmi' ),
		'add_new'            => _x( 'Add New', 'Content Area', 'tmi' ),
		'add_new_item'       => __( 'Add New Content Area', 'tmi' ),
		'new_item'           => __( 'New Content Area', 'tmi' ),
		'edit_item'          => __( 'Edit Content Area', 'tmi' ),
		'view_item'          => __( 'View Content Area', 'tmi' ),
		'all_items'          => __( 'All Content Areas', 'tmi' ),
		'search_items'       => __( 'Search Content Areas', 'tmi' ),
		'parent_item_colon'  => __( 'Parent Content Areas:', 'tmi' ),
		'not_found'          => __( 'No Content Areas found.', 'tmi' ),
		'not_found_in_trash' => __( 'No Content Areas found in Trash.', 'tmi' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'tmi' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Content Area' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor')
	);
	register_post_type( 'tmi-content-Area', $args );
}

/** Short code for Content box **/
function tmiContentAreaShortCode( $atts) {
    $atts = shortcode_atts( array(
    	'id' => '0',
    	'slug' => ''
    	), $atts, 'tmiContentArea' );
    $args = array('post_type'   => 'tmi-content-Area',
        'post_status' => 'publish',
        'numberposts' => 1);
    if($atts['id'] != '0'){
        $args['ID'] = $atts['id'];
    }elseif($atts['slug'] != ''){
        $args['name'] = $atts['slug'];
    }else{
        return 'Please sepecify attribute ID or slug for shortcode';
    }
    // tmiDebug($args);
    $content = get_posts($args);
    if(is_array($content) && count($content) > 0){
        // tmiDebug($content);
        return  apply_filters( 'the_content', $content[0]->post_content);
    }
	return "No data found";
 }
 add_shortcode( 'tmiContentArea', 'tmiContentAreaShortCode' );


 /*** Fetch list of active content areas **/
function tmiGetContentAreas() {
   global $wpdb;

   $postType = 'tmi-content-area'; // define your custom post type slug here

   $results = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = %s and post_status = 'publish'", $postType ));

   // Return null if we found no results
   if ( ! $results )
       return;
   return $results;
}

///////////////////////////////////////////////////////////////////////////////////////////
/**
 * Adds Content Area widget.
 */
class TmiContentAreaWidget extends WP_Widget {

   /**
    * Register widget with WordPress.
    */
   function __construct() {
       parent::__construct(
           'tmi-content-area-widget', // Base ID
           esc_html__( 'Content Area', 'tmi' ), // Name
           array( 'description' => esc_html__( 'Display content data', 'tmi' ), ) // Args
       );
   }

   /**
    * Front-end display of widget.
    *
    * @see WP_Widget::widget()
    *
    * @param array $args     Widget arguments.
    * @param array $instance Saved values from database.
    */
   public function widget( $args, $instance ) {
       echo $args['before_widget'];
       if ( ! empty( $instance['tmiContentId'] ) ) {

           $content = get_post($instance['tmiContentId']);
           if($content && $content->post_status == 'publish'){
               echo  apply_filters( 'the_content', $content->post_content);
           }
       }

       echo $args['after_widget'];
   }

   /**
    * Back-end widget form.
    *
    * @see WP_Widget::form()
    *
    * @param array $instance Previously saved values from database.
    */
   public function form( $instance ) {
       $tmiContentId = ! empty( $instance['tmiContentId'] ) ? $instance['tmiContentId'] : esc_html__( '0', 'tmi' );
       ?>
       <p>
       <label for="<?php echo esc_attr( $this->get_field_id( 'tmiContentId' ) ); ?>"><?php esc_attr_e( 'Content Area:', 'tmi' ); ?></label>
       <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tmiContentId' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tmiContentId' ) ); ?>" >
           <?php $contentAreas = tmiGetContentAreas();
           foreach ($contentAreas as $content) {
               $selected = "";
               if($tmiContentId ==  $content->ID) { $selected = " selected ";}
               printf("<option value='%s' %s>%s</option>\n", $content->ID,$selected, $content->post_title);
           }?>
       </select>
       </p>
       <?php
   }

   /**
    * Sanitize widget form values as they are saved.
    *
    * @see WP_Widget::update()
    *
    * @param array $new_instance Values just sent to be saved.
    * @param array $old_instance Previously saved values from database.
    *
    * @return array Updated safe values to be saved.
    */
   public function update( $new_instance, $old_instance ) {
       $instance = array();
       $instance['tmiContentId'] = ( ! empty( $new_instance['tmiContentId'] ) ) ? strip_tags( $new_instance['tmiContentId'] ) : '';
       return $instance;
   }

} // class Content Area

add_action( 'widgets_init', function(){	register_widget( 'TmiContentAreaWidget' );});
