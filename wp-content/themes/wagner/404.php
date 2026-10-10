<?php get_header(); ?>

<?php get_template_part('library/partials/header-interior'); ?>

<div class="wrap">
	<article class="post">
		<div class="entry">
			<h2><?php _e('Error 404 - Page Not Found','html5reset'); ?></h2>
			<p>We're sorry, but the page you're requesting cannot be found. Please <a href="<?php echo home_url(); ?>">click here</a> to return to the home page and try again.</p>
		</div>
	</article>
</div>

<?php get_footer(); ?>