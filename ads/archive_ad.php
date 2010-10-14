<div class="content_advert grid_16 alpha">

	<?php if (get_option('woo_ad_content_adsense') <> "") { echo stripslashes(get_option('woo_ad_content_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_content_url'); ?>"><img src="<?php echo get_option('woo_ad_content_image'); ?>" width="728" height="90" alt="advert" /></a>
		
	<?php } ?>	

</div>