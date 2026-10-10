<section id="headerimg" data-speed="2" style="<?php if( get_field('featured_header_image') ): ?>background: url(<?php the_field('featured_header_image'); ?>) no-repeat 0 0;<?php endif; ?> background-size: cover;">
		<?php if ( is_404() ) : ?>
		<h1>404 Error</h1>
		<?php elseif ( is_search() ) : ?>
		<h1>Search Results</h1>
		<?php elseif ( is_home() ) : ?>
		<h1>News</h1>
		<?php else : ?>
		<h1><?php the_title(); ?></h1>
		<?php endif; ?>
	<div id="bcbar">
		<?php if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
	</div>
</section>