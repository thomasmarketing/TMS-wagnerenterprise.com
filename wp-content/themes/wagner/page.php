<?php get_header(); ?>

<?php get_template_part('library/partials/header-interior'); ?>

<div class="wrap">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="post <?php echo $post->post_name;?>" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<?php if ( is_page(276) ) {?>
				
			<?php } ?>
			<?php the_content(); ?>
		</div>
	</article>
	<?php endwhile; endif; ?>
</div>

<?php if ( ( is_page(11)) ) { ?>
	<!-- Our Team -->
	<?php if( get_field('our_team') ): ?>
		<section id="team">
			<div class="wrap">
				<?php the_field('our_team'); ?>
			</div>
		</section>
	<?php endif; ?>
<? } else { ?>
<?php } ?>

<?php if ( ( is_page(13) || is_page(15) ) ) { ?>
	<!-- Contact/RAQ Form Section -->
	<?php if( get_field('content_block') ): ?>
		<section id="form">
			<div class="wrap">
				<?php the_field('content_block'); ?>
			</div>
		</section>
	<?php endif; ?>
<? } else { ?>
<?php } ?>

<?php get_footer(); ?>
