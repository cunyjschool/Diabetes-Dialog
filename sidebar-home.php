			<div id="sidebar" class="grid_8 omega">
			
				<h3 id="news">Recent company news</h3>
				
				<?php if (have_posts()) : ?>
                <?php query_posts("category_name=".get_option('woo_blog_cat')."&showposts=".get_option('woo_featured_posts')); ?>
                  <?php 
                  
                  $counter = 0; $counter2 = 0;
                  while (have_posts()) : the_post(); 
                  
                  ?>
                  
                  <?php $counter++; $counter2++; ?>
                                
                    <div class="grid_4 <?php if ($counter == 1) { echo 'alpha'; } else { echo 'omega'; $counter = 0; } ?>">

                            <?php woo_get_image('image','220','100'); ?>
                            <h4><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                            <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
                         
                    </div>
                    
                    <?php if ($counter == 0) { ?><div class="fix"></div><?php } ?>
                  
                 <?php endwhile; ?>
                 
                <?php else: ?>	
                    <p>No posts yet.</p>
                <?php endif; ?>

			</div><!-- / #sidebar -->
			