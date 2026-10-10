<!-- Business CTA (Do Not Show on Home, Contact, or RAQ Pages) -->
<?php if ( !( is_page(4) || is_page(472) || is_page(13) || is_page(15) ) ) { ?>
<section id="business">
	<div class="wrap">
		<h2>Ready to do business? <strong>Work with us!</strong></h2>
		<a href="<?php echo get_permalink(15); ?>" class="btn white">Request A Quote</a>
	</div>
</section>
<? } else { ?>
<?php } ?>

<!-- Questions CTA -->
<?php if ( !( is_page(137) ) ) { ?>
<section id="questions">
	<div class="wrap">
		<h2>Still have Questions?</h2>
		<p>Visit our <a href="<?php echo get_permalink(137); ?>">Frequently Asked Questions</a> page or give us a call at <a href="tel:2488799000"><strong><span class="number">248-879-9000</span></strong></a></p>
	</div>
</section>
<? } else { ?>
<?php } ?>

<!-- BROUCHURE DOWNLOAD POPUP FORM -->
<section id="brochure-download" class="popup">
	<div class="vertical-center">
		<div id="popup-close" class="popup-close"></div>
		<?php echo do_shortcode('[gravityform id="4" title="false" description="false"]'); ?>
	</div>
</section>

<footer id="footer" class="source-org vcard copyright" role="contentinfo">
	<div class="wrap">
		<p>Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?></p>
		<?php wp_nav_menu( array('menu' => 'secondary') ); ?>
		<a href="https://element5digital.com" target="_blank">Website designed by Element5</a>
	</div>
</footer>

</div><!--#content-->

<?php wp_footer(); ?>

<!-- JS -->
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery.meanmenu.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/jquery.flexslider-min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/retina.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/library/js/functions.js"></script>
<!-- BROUCHURE DOWNLOAD POPUP FORM -->
<script>
	jQuery('#download-brochure').click(function(){
		jQuery('#brochure-download').addClass('activated');
	});
	jQuery('#popup-close').click(function(){
		jQuery('#brochure-download').removeClass('activated');
	});
</script>

</body>
</html>