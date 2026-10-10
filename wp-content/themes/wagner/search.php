<?php get_header(); ?>

<?php get_template_part('library/partials/header-interior'); ?>

<div class="wrap search">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php echo excerpt(35); ?>
					<a href="<?php the_permalink();?>">Read More</a>
				</div>
			</article>
		<?php endwhile; ?>
		<?php post_navigation(); ?>
	<?php else : ?>
		<h2><?php _e('Nothing Found','html5reset'); ?></h2>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
