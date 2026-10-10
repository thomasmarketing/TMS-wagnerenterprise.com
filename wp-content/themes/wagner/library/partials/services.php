<?php // Product Child Pages
$args = array('showposts' => -1, 'post_type' => 'page', 'post_parent' => 7, 'order'=>'ASC');
$services_query = new WP_Query($args);
while($services_query->have_posts()) : $services_query->the_post(); ?>
<a href="<?php the_permalink(); ?>">
 <?php 
      //Use Post Thumb as Background Graphic
      $post_image_id = get_post_thumbnail_id($post_to_use->ID);
      if ($post_image_id) {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'services-mobile', false);
        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
      } ?>

	<article class="<?php echo $post->post_name;?>">
		<div class="learn">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('services'); ?>
			<?php } else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/library/images/default.png" alt="<?php the_title(); ?>" />
			<?php } ?>
			<div class="learnmore">Click to Learn More</div>
			</div>
		<h3><?php the_title(); ?></h3>
		<div class="overlay"></div>
		<div class="mobileimg" style="background: url(<?php echo $thumbnail; ?>) no-repeat 0 0; background-size: cover;"></div>
	</article>
</a>
<?php endwhile; wp_reset_postdata(); ?>	



<?php // Tank Services
$args = array('post_type' => 'page', 'page_id' => 9, 'posts_per_page' => 1);
$tanks_query = new WP_Query($args);
while($tanks_query->have_posts()) : $tanks_query->the_post(); ?>
<a href="<?php the_permalink(); ?>">
 <?php 
      //Use Post Thumb as Background Graphic
      $post_image_id = get_post_thumbnail_id($post_to_use->ID);
      if ($post_image_id) {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'services-mobile', false);
        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
      } ?>

	<article class="<?php echo $post->post_name;?>">
		<div class="learn">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('services'); ?>
			<?php } else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/library/images/default.png" alt="<?php the_title(); ?>" />
			<?php } ?>
			<div class="learnmore">Click to Learn More</div>
			</div>
		<h3><?php the_title(); ?></h3>
		<div class="overlay"></div>
		<div class="mobileimg" style="background: url(<?php echo $thumbnail; ?>) no-repeat 0 0; background-size: cover;"></div>
	</article>
</a>
<?php endwhile; wp_reset_postdata(); ?>	






