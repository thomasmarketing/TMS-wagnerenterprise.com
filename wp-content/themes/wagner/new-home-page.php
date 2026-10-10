<?php
/**
 * Template Name: New Home Page
 */
 get_header(); ?>

<!-- Slider -->
<section id="slider">
	<div class="flexslider">
		<ul class="slides">
			<?php // Slide Query
			$args = array('post_type' => 'slide', 'order'=> 'ASC', 'showposts' => -1);
			$slides_query = new WP_Query($args);
			while($slides_query->have_posts()) : $slides_query->the_post(); ?>
			<?php 
			//Use Post Thumb as Background Graphic
			$post_image_id = get_post_thumbnail_id($post_to_use->ID);
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'slide', false);
				if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			} ?>
			<li style="background: url('<?php echo $thumbnail; ?>') no-repeat center center; background-size: cover;">
				<div class="slidecontent">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
				<div class="overlay"></div>
			</li>
		<?php endwhile; wp_reset_postdata(); ?>	
		</ul>
	</div>
	<a href="#homecontent" class="scroll"><span>Scroll Down</span></a>
</section>

<!-- Home Content -->
<section id="homecontent">
	<div class="wrap homecontent">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; endif; ?>
	</div>
</section>

<!-- Services -->
<section id="services">
	<div class="wrap">
		<?php the_field('services'); ?>
	</div>
</section>

<?php get_footer(); ?>