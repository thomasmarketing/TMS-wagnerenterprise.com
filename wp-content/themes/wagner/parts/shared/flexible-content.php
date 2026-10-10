
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
    while ( have_rows('flexible_content') ) : the_row(); ?>

	<?php if( get_row_layout() == 'hero_banner_form_module' ): ?>
		<section class="hero-banner-form-module" <?php if( get_sub_field('bg_color_hbfm')): ?>style="background-color: <?php echo get_sub_field('bg_color_hbfm'); ?>"<?php endif; ?>>
		 	<div class="inner-wrap-new">
                <div class="hero-banner-form-inner">
                    <?php if( get_sub_field('subtitle_hbfm') ): ?>
                        <span class="hero-banner-form-subtitle"><?php echo get_sub_field('subtitle_hbfm'); ?></span>
                    <?php endif; ?>

                    <?php if( get_sub_field('title_hbfm') ): ?>
                        <h2 class="hero-banner-form-title"><?php echo get_sub_field('title_hbfm'); ?></h2>
                    <?php endif; ?>

                    <?php if( get_sub_field('description_hbfm') ): ?>
                        <div class="hero-banner-form-description"><?php echo get_sub_field('description_hbfm'); ?></div>
                    <?php endif; ?>

                    <?php
                    	$button_link_1_hbfm = get_sub_field('button_link_1_hbfm');
						$button_link_2_hbfm = get_sub_field('button_link_2_hbfm');
                        if( $button_link_1_hbfm || $button_link_2_hbfm ): ?>
                        <div class="hero-banner-form-buttons">
                            <?php if( $button_link_1_hbfm ): ?>
                                <a 
                                    href="<?php echo esc_url($button_link_1_hbfm['url']); ?>"
                                    class="btn-primary"
                                    target="<?php echo esc_attr($button_link_1_hbfm['target'] ?: '_self'); ?>"
                                >
                                    <?php echo esc_html($button_link_1_hbfm['title']); ?>
                                </a>

                            <?php endif; ?>

                            <?php if( $button_link_2_hbfm ): ?>
                                <a 
                                    href="<?php echo esc_url($button_link_2_hbfm['url']); ?>"
                                    class="btn-transparent"
                                    target="<?php echo esc_attr($button_link_2_hbfm['target'] ?: '_self'); ?>"
                                >
                                    <?php echo esc_html($button_link_2_hbfm['title']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
 		</section>	

<?php endif; ?>
<?php endwhile; echo '</section>'; ?>
<?php endif; ?>




