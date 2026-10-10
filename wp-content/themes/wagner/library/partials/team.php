<ul>
<?php // Team Query
	$args = array('post_type' => 'team', 'orderby'=> 'title', 'order' => 'ASC');
	$team_query = new WP_Query($args);
	while($team_query->have_posts()) : $team_query->the_post(); ?>
	<li id="post-<?php the_ID(); ?>">
		<div>
		<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('team'); ?>
			<?php } else { ?>
			<img src="<?php bloginfo('template_directory'); ?>/library/images/default.png" alt="<?php the_title(); ?>" />
			<?php } ?>
		<h3><?php the_title(); ?></h3>
		<span><?php the_field('title'); ?></span>
		<?php the_content(); ?>
		</div>
	</li>
	<?php endwhile; wp_reset_postdata(); ?>
</ul>	