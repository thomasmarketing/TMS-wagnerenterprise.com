
<!-- WP Home URL -->
<?php echo home_url(); ?>

<!-- WP Theme Template URL -->
<?php bloginfo('template_url'); ?>


<!-- WP Page Template Name -->
<?php
/*
Template Name: Home Page
*/
?>

<!-- Page Template Conditional -->
<?php 
	if(is_page('why-work-with-us')): include (TEMPLATEPATH . '/inc/testimonials.php' );
	else : '';
endif; ?>

<!-- WP Query Example (Use Multiple Times throughout Page) -->

<?php // Timeline Query
	$args = array('post_type' => 'timeline_event', 'orderby'=> 'title', 'order' => 'ASC');
	$timeline_query = new WP_Query($args);
	while($timeline_query->have_posts()) : $timeline_query->the_post(); ?>
	<li id="post-<?php the_ID(); ?>">
		<?php the_title(); ?>
		<ul>
			<li>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">Read More</a>
			</li>
		</ul>
	</li>
	<?php endwhile; wp_reset_postdata(); ?>	


<!-- Advanced Custom Field Conditional -->

<?php if( get_field('slide_title') ): ?>
	<h2><?php the_field('slide_title'); ?></h2>
<?php endif; ?>



<?php
//WP Common Functions

	//Register Custom Post Type
	function slide_post_type() {
	   
	   // Labels
		$labels = array(
			'name' => _x("Slides", "post type general name"),
			'singular_name' => _x("Slide", "post type singular name"),
			'menu_name' => 'Slides',
			'add_new' => _x("Add New", "slide item"),
			'add_new_item' => __("Add New Slide"),
			'edit_item' => __("Edit Slide"),
			'new_item' => __("New Slide"),
			'view_item' => __("View Slide"),
			'search_items' => __("Search Slides"),
			'not_found' =>  __("No Slides Found"),
			'not_found_in_trash' => __("No Slides Found in Trash"),
			'parent_item_colon' => ''
		);
		
		// Register post type
		register_post_type('slide' , array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'rewrite' => false,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'thumbnail'),		
 			'taxonomies' => array('category')
		) );
	}
	add_action( 'init', 'slide_post_type', 0 );




// Register Sidebar
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'New Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebarbox">', 
		'after_widget' => '</div>', 
		'before_title' => '<h2>', 
		'after_title' => '</h2>', 
	));




// Post Thumbnails
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-thumb', 360, 275 ); //Add Post-Thumb Size
	add_image_size( 'single-thumb', 680, 600, true ); //Add Larger Single Thumb Size
}




// Redirect admins to the dashboard and other users elsewhere
	add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
	function my_login_redirect( $redirect_to, $request, $user ) {
	    // Is there a user?
	    if ( is_array( $user->roles ) ) {
	        // Is it an administrator?
	        if ( in_array( 'administrator', $user->roles ) )
	            return home_url( '/wp-admin/' );
	        elseif ( in_array( 'editor', $user->roles ) )
	            return home_url( '/wp-admin/' );
	        elseif ( in_array( 'author', $user->roles ) )
	            return home_url( '/wp-admin/' );
	        elseif ( in_array( 'contributor', $user->roles ) )
	            return home_url( '/wp-admin/' );
	        else
	            return home_url();
	            // return home
	    }
	}



	//Customized WP Login Screen
	function my_login_logo() { ?>
	    <style type="text/css">
	        body.login div#login h1 a {
	        	width: 100px;
	        	height: 100px;
	        	margin: 0 auto;
	            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/logo.png);
	            padding-bottom: 30px;
	        }
	    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );



?>