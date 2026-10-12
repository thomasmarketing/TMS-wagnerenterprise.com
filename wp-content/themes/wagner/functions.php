<?php

	// Options Framework
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/library/inc/options-framework.php';
	}

	// Theme Setup
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );
	
	// Scripts & Styles
	function html5reset_scripts_styles() {
		global $wp_styles;
		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );
	
	// WP Title
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() )
			return $title;
		//Add the site name.
		$title .= get_bloginfo( 'name' );
		//Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		//Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );




//OLD STUFF BELOW
	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}
	//ADD ORIGINAL THEME CSS
	function theme_styles() {
		wp_enqueue_style('og-theme-mainstyle', get_template_directory_uri().'/library/css/mainstyle.css');
		wp_enqueue_style ('og-theme-flexslider', get_template_directory_uri().'/library/css/flexslider.css');
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' );
	//EDITOR CSS
	function my_theme_add_editor_styles() {
		add_editor_style( 'library/css/custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

	//Register Custom Post Type
	function slide_post_type() {
	   
	   // Labels
		$labels = array(
			'name' => _x("Slides", "post type general name"),
			'singular_name' => _x("Slide", "post type singular name"),
			'menu_name' => 'Slider',
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

	//Register Team Members
	function team_post_type() {
	   
	   // Labels
		$labels = array(
			'name' => _x("Team", "post type general name"),
			'singular_name' => _x("Team", "post type singular name"),
			'menu_name' => 'Our Team',
			'add_new' => _x("Add New", "team member"),
			'add_new_item' => __("Add New Team Member"),
			'edit_item' => __("Edit Team Member"),
			'new_item' => __("New Team Member"),
			'view_item' => __("View Team Member"),
			'search_items' => __("Search Team Members"),
			'not_found' =>  __("No Team Members Found"),
			'not_found_in_trash' => __("No Team Members Found in Trash"),
			'parent_item_colon' => ''
		);
		
		// Register post type
		register_post_type('team' , array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => false,
			'rewrite' => true,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'thumbnail'),		
 			'taxonomies' => array('category')
		) );
	}
	add_action( 'init', 'team_post_type', 0 );

	//Add Shortcodes to Widgets
	add_filter('widget_text', 'do_shortcode');

	//Register Button Shortcode
    function custom_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'url'	=> '',
    'target'	=> '',
    'color'	=> '',
    'size'	=> '',
    'align'	=> '',
    'type' 	=> '',
    'download' => '',
    ), $atts));
 
	$color = ($color) ? ' '.$color. '' : '';
	$align = ($align) ? ' '.$align. '' : '';
	$size = ($size) ? ' '.$size. '' : '';
	$target = ($target == '_blank') ? ' target="_blank"' : '';
	$type = ($type) ? ' '.$type. '' : '';
	$target = ($target == 'true') ? ' download' : '';
 
	$out = '<a' .$download.$target. ' class="btn' .$color.$size.$align.$type. '" href="' .$url. '">' .do_shortcode($content). '</a>';
    
    return $out;
	}
	add_shortcode('button', 'custom_button');

	//Register Facebook Shortcode
    function facebook_social( $atts ) {
      $html = '<a class="social fb" href="#" target="_blank"><span>Facebook</span></a>';
          return $html;
    }
	add_shortcode('facebook', 'facebook_social');


	//Register Twitter Shortcode
    function twitter_social( $atts ) {
      $html = '<a class="social twitter" href="#" target="_blank">Twitter</a>';
          return $html;
    }
	add_shortcode('twitter', 'twitter_social');


	//Register LinkedIn
    function linkedin_social( $atts ) {
      $html = '<a class="social linkedin" href="https://www.linkedin.com/company/wagner-enterprise-inc-" target="_blank">LinkedIn</a>';
          return $html;
    }
	add_shortcode('linkedin', 'linkedin_social');


	//Register Google Plus Shortcode
    function gplus_social( $atts ) {
      $html = '<a class="social gplus" href="https://plus.google.com/115194830674187907661/" target="_blank">Google Plus</a>';
          return $html;
    }
	add_shortcode('googleplus', 'gplus_social');


	//Register Google Map Shortcode
    function google_map( $atts ) {
      $html = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11748.993044946203!2d-83.15113354030623!3d42.59247595149508!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8824c3ee40848511%3A0xec552382dbd04c4!2s70+W+Long+Lake+Rd%2C+Troy%2C+MI+48098!5e0!3m2!1sen!2sus!4v1418676876749" width="600" height="430" frameborder="0" style="border:0"></iframe>';
          return $html;
    }
	add_shortcode('googlemap', 'google_map');


	// Change GForm Submit to Button
	add_filter("gform_submit_button", "form_submit_button", 10, 2);

	function form_submit_button($button, $form) {
		$form_id = $form["id"];

		// Get submit button text from Gravity Forms settings
		$button_text = $form["button"]["text"] ?? "Submit";

		return "<button type='submit' class='button' id='gform_submit_button_{$form_id}'><span>" . esc_html($button_text) . "</span></button>";
	}

	//Register Phone Shortcode
	function phone_shortcode($atts, $content = null) {
	   return '<div class="phone">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('phone', 'phone_shortcode');

	//Register Email Shortocode
	function email_shortcode($atts, $content = null) {
	   return '<div class="email">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('email', 'email_shortcode');

	//Services Shortcode
	function services_shortcode( $attr ) {
	ob_start();
	get_template_part( 'library/partials/services' );
	return ob_get_clean();
	}
	add_shortcode( 'services', 'services_shortcode' );	


	//Services List Shortcode
	function services_list_shortcode( $attr ) {
	ob_start();
	get_template_part( 'library/partials/services-overview' );
	return ob_get_clean();
	}
	add_shortcode( 'serviceslist', 'services_list_shortcode' );	

	//Products List Shortcode
	function products_shortcode( $attr ) {
	ob_start();
	get_template_part( 'library/partials/products-overview' );
	return ob_get_clean();
	}
	add_shortcode( 'productslist', 'products_shortcode' );	



	//Team Members
	function team_shortcode( $attr ) {
	ob_start();
	get_template_part( 'library/partials/team' );
	return ob_get_clean();
	}
	add_shortcode( 'team', 'team_shortcode' );	

	//SideNav Shortcode
	function sidenav_shortcode( $attr ) {
	ob_start();
	get_template_part( 'library/partials/sidenav' );
	return ob_get_clean();
	}
	add_shortcode( 'sidenav', 'sidenav_shortcode' );
	

	//Add Search Input to WP_Nav Menu
	add_filter('wp_nav_menu_items','add_search_box', 10, 2);
	function add_search_box($items, $args) {
	 
	        ob_start();
	        get_search_form();
	        $searchform = ob_get_contents();
	        ob_end_clean();
	 
	        $items .= '<li class="menu-item menu-item-search">' . $searchform . '</li>';
	 
	    return $items;
	}



	//Add Auto Sub Menus Based on Custom WP Menu
	add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

	// filter_hook function to react on sub_menu flag
	function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
	  if ( isset( $args->sub_menu ) ) {
	    $root_id = 0;
	    
	    // find the current menu item
	    foreach ( $sorted_menu_items as $menu_item ) {
	      if ( $menu_item->current ) {
	        // set the root id based on whether the current menu item has a parent or not
	        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
	        break;
	      }
	    }
	    
	    // find the top level parent
	    if ( ! isset( $args->direct_parent ) ) {
	      $prev_root_id = $root_id;
	      while ( $prev_root_id != 0 ) {
	        foreach ( $sorted_menu_items as $menu_item ) {
	          if ( $menu_item->ID == $prev_root_id ) {
	            $prev_root_id = $menu_item->menu_item_parent;
	            // don't set the root_id to 0 if we've reached the top of the menu
	            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
	            break;
	          } 
	        }
	      }
	    }

	    $menu_item_parents = array();
	    foreach ( $sorted_menu_items as $key => $item ) {
	      // init menu_item_parents
	      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

	      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
	        // part of sub-tree: keep!
	        $menu_item_parents[] = $item->ID;
	      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
	        // not part of sub-tree: away with it!
	        unset( $sorted_menu_items[$key] );
	      }
	    }
	    
	    return $sorted_menu_items;
	  } else {
	    return $sorted_menu_items;
	  }
	}



	// Custom Excerpt
	function excerpt($limit) {
	  $excerpt = explode(' ', get_the_excerpt(), $limit);
	  if (count($excerpt)>=$limit) {
	    array_pop($excerpt);
	    $excerpt = implode(" ",$excerpt).'...';
	  } else {
	    $excerpt = implode(" ",$excerpt);
	  }	
	  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	  return $excerpt;
	}
	 
	function content($limit) {
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
	    array_pop($content);
	    $content = implode(" ",$content).'...';
	  } else {
	    $content = implode(" ",$content);
	  }	
	  $content = preg_replace('/\[.+\]/','', $content);
	  $content = apply_filters('the_content', $content); 
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}


	// Post Thumbnails
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'slide', 1500, 870, array( 'center', 'top' ) );
	add_image_size( 'services', 175, 175, array( 'center', 'top' ) );
	add_image_size( 'services-mobile', 715, 80, array( 'center', 'top' ) );
	add_image_size( 'team', 300, 300, array( 'center', 'top' ) );
	add_image_size( 'pdf', 300, 388, false);

	}
	

?>
