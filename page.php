<?php get_header(); ?>

	<div id="main" class="grid_12 alpha">
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<h2 class="single"><?php the_title(); ?></h2>
		
        <div class="entry">
			<?php the_content(); ?>
        </div>
        
		<?php endwhile; endif; ?>
			
	</div><!-- / #main -->



<?php get_footer(); ?>