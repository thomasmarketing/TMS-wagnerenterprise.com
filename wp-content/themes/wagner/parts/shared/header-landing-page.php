<header class="header-landing-page" id="header">
    <div class="inner-wrap-new">
        <div class="header-landing-page-inner">
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php $logo = get_field('global_company_logo','option');
                if( !empty($logo) ): ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" title="<?php echo $logo['alt']; ?>">
                <?php endif;?>
            </a>
            <div class="header-block-right">
                <?php $string = get_field('global_phone_number','option');$string = preg_replace("/[^0-9]/", '', $string);?>
                <?php if(get_field('global_phone_number','option')):?>
                    <a class="btn-primary" href="tel:<?php echo $string;?>">CALL NOW: <span><?php echo get_field('global_phone_number','option'); ?></span></a>
                <?php endif; ?>

                <?php
                    $global_button_link = get_field('global_button_link', 'option');
                    if($global_button_link):
                    $link_url = $global_button_link['url'];
                    $link_title = $global_button_link['title'];
                    $link_target = $global_button_link['target'] ? $global_button_link['target'] : '_self';
                    ?>
                    <a class="btn-transparent" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html($link_title); ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>