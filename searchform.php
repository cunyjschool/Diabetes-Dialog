<div class="widget"><form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<fieldset>
		<h3><label for="s"><?php _e('Search for'); ?></label></h3>
		<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="submit" id="searchsubmit" value="Search" /></p>
	</fieldset>
</form>
</div>
