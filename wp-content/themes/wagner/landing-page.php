<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php

	/*
		Template Name: Landing Page
	*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<!--Site Content-->
	<section class="site-content" role="main">	 
	    <?php get_template_part( 'parts/shared/flexible-content' ); ?>
	</section>

<?php endwhile; ?>


<?php get_footer(); ?>
