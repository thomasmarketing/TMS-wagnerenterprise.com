<?php
/**
 * Template Name: Two Column
 */
 get_header(); ?>

<?php get_template_part('library/partials/header-interior'); ?>

<div class="wrap page-twocolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="post" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<?php the_content(); ?>
		</div>
	</article>
	<?php endwhile; endif; ?>

	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>
