<?php
/*
Template Name: Full Width Page Page
*/
?>

<?php get_header(); ?>
			
	<div id="main">
            		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<h2 class="single"><?php the_title(); ?></h2>
				
		<?php the_content(); ?>
        
		<?php endwhile; endif; ?>
			
	</div><!-- / #main -->

<?php get_footer(); ?>