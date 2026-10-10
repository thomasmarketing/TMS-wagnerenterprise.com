<ul id="list">
<?php // Products Child Pages
$args = array('showposts' => -1, 'post_parent' => 7, 'post_type' => 'page', 'order'=>'ASC');
$products_query = new WP_Query($args);
while($products_query->have_posts()) : $products_query->the_post(); ?>
	<li class="<?php echo $post->post_name;?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><li>
<?php endwhile; wp_reset_postdata(); ?>	
</ul>