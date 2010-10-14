<?php get_header(); ?>

			
			<div id="main" class="grid_8 alpha">
            
            <h1>Search Results</h1>
        
                <div class="entry">
                    
                    <p style="margin-bottom:0;">Your search topic <strong><?php echo wp_specialchars($s); ?></strong> returned the following articles:</p>
                    
                </div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
                <div class="entry">
                
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post_meta"><span>Posted in <?php the_category(', ') ?>. Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?></p>
                    
                    <?php the_excerpt() ?>
                    
                </div>
            
				<?php endwhile; else: ?>
        
                <div class="entry">
            
                        <p>Sorry, no posts matched your criteria.</p>
                                       
                </div>
    
				<?php endif; ?>
                				
				 <div class="more_entries">
					<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                    <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                    <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                    <br class="fix" />
                    <?php } ?>
                 </div>              
			
			</div><!-- / #main -->


<?php get_footer(); ?>