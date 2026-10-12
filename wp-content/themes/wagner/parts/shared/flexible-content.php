
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
    while ( have_rows('flexible_content') ) : the_row(); ?>

	    <?php if( get_row_layout() == 'hero_banner_form_module' ): ?>
		<section class="hero-banner-form-module" <?php if( get_sub_field('bg_color_hbfm')): ?>style="background-color: <?php echo get_sub_field('bg_color_hbfm'); ?>"<?php endif; ?>>
		 	<div class="inner-wrap-new">
                <div class="hero-banner-form-inner">
                    <div class="hero-banner-form-details">
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

                        <?php if( have_rows('service_list_hbfm') ): ?>
                            <ul class="hero-banner-form-service-list">
                                <?php while( have_rows('service_list_hbfm') ): the_row(); 
                                    $title_service = get_sub_field('title_service');
                                ?>
                                 <?php if( $title_service ): ?>
                                    <li class="hero-banner-form-service-item">
                                        <span class="hero-banner-form-service-title"><?php echo $title_service; ?></span>                                    
                                    </li>
                                <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="hero-banner-form-iframe">
                        <?php
                            $form_id = get_sub_field('form_id_hbfm');

                            if ($form_id) {
                                echo do_shortcode(
                                    '[gravityform id="' . (int) $form_id . '" title="true" description="true"]'
                                );
                            }
                        ?>
                    </div>
                </div>
            </div>
 		</section>	

        <?php elseif( get_row_layout() == 'cards_image_module' ): ?> 
        <section class="cards-image-module">
		 	<div class="inner-wrap-new">
                <div class="cards-image-inner">
                    <div class="cards-image-header">
                        <?php if( get_sub_field('subtitle_cim') ): ?>
                            <span class="cards-image-subtitle"><?php echo get_sub_field('subtitle_cim'); ?></span>
                        <?php endif; ?>

                        <?php if( get_sub_field('title_cim') ): ?>
                            <h2 class="cards-image-title"><?php echo get_sub_field('title_cim'); ?></h2>
                        <?php endif; ?>

                        <?php if( get_sub_field('description_cim') ): ?>
                            <div class="cards-image-description"><?php echo get_sub_field('description_cim'); ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if( have_rows('cards_list_cim') ): ?>
						<ul class="cards-image-list">
							<?php while( have_rows('cards_list_cim') ): the_row(); 
								$feature_image_card_cim = get_sub_field('feature_image_card_cim');
								$title_card_cim = get_sub_field('title_card_cim');
								$description_card_cim = get_sub_field('description_card_cim');
							?>
							<li class="cards-image-item">
                                <?php
                                    $card_link_cim = get_sub_field('card_link_cim');
                                    if($card_link_cim):
                                    $link_url = $card_link_cim['url'];
                                    $link_title = $card_link_cim['title'];
                                    $link_target = $card_link_cim['target'] ? $card_link_cim['target'] : '_self';
                                    ?>
                                    <a class="cards-image-item-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <?php if( $feature_image_card_cim ): ?>
                                            <img class="cards-image-feature-img" src="<?php echo esc_url($feature_image_card_cim['url']); ?>" alt="<?php echo esc_attr($feature_image_card_cim['alt']); ?>" />
                                        <?php endif; ?>
                                        
                                        <div class="cards-image-item-content">
                                            <?php if( $title_card_cim ): ?>
                                                <h3 class="cards-image-item-title"><?php echo $title_card_cim; ?></h3>
                                            <?php endif; ?>

                                            <?php if( $description_card_cim ): ?>
                                                <div class="cards-image-item-description"><?php echo $description_card_cim; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
								<?php endif; ?>
							</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
                </div>
            </div>
 		</section>	

        <?php elseif( get_row_layout() == 'cards_icon_module' ): ?> 
        <section class="cards-icon-module" <?php if( get_sub_field('bg_color_cdim')): ?>style="background-color: <?php echo get_sub_field('bg_color_cdim'); ?>"<?php endif; ?>>
		 	<div class="inner-wrap-new">
                <div class="cards-icon-inner">
                    <div class="cards-icon-header">
                        <?php if( get_sub_field('subtitle_cdim') ): ?>
                            <span class="cards-icon-subtitle"><?php echo get_sub_field('subtitle_cdim'); ?></span>
                        <?php endif; ?>

                        <?php if( get_sub_field('title_cdim') ): ?>
                            <h2 class="cards-icon-title"><?php echo get_sub_field('title_cdim'); ?></h2>
                        <?php endif; ?>
                    </div>

                    <?php if( have_rows('cards_list_cdim') ): ?>
						<ul class="cards-icon-list">
							<?php while( have_rows('cards_list_cdim') ): the_row(); 
								$icon_card_cdim = get_sub_field('icon_card_cdim');
								$title_card_cdim = get_sub_field('title_card_cdim');
								$description_card_cdim = get_sub_field('description_card_cdim');
							?>
							<li class="cards-icon-item">
                                <?php if( $icon_card_cdim ): ?>
                                    <div class="cards-icon-feature-img">
                                        <img src="<?php echo esc_url($icon_card_cdim['url']); ?>" alt="<?php echo esc_attr($icon_card_cdim['alt']); ?>" />
                                    </div>
                                <?php endif; ?>
                                
                                <div class="cards-icon-item-content">
                                    <?php if( $title_card_cdim ): ?>
                                        <h3 class="cards-icon-item-title"><?php echo $title_card_cdim; ?></h3>
                                    <?php endif; ?>

                                    <?php if( $description_card_cdim ): ?>
                                        <div class="cards-icon-item-description"><?php echo $description_card_cdim; ?></div>
                                    <?php endif; ?>
                                </div>
							</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
                </div>
            </div>
 		</section>	
        

<?php endif; ?>
<?php endwhile; echo '</section>'; ?>
<?php endif; ?>




