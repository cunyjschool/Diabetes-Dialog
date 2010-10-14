<div class="advert home_leaderboard container_16">

	<?php if (get_option('woo_ad_top_adsense') <> "") { echo stripslashes(get_option('woo_ad_top_adsense')); ?>
	
	<?php } else { ?>
	
		<a href="<?php echo get_option('woo_ad_top_url'); ?>"><img src="<?php echo get_option('woo_ad_top_image'); ?>" width="728" height="90" alt="advert" /></a>
		
	<?php } ?>	

</div>