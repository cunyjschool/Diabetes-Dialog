<?php get_header(); ?>

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
            <div class="grid_16 alpha"> <h2 class="single"><?php the_title(); ?></h2></div>
            <div class="grid_4 alpha">

<p class="post_meta"><span class="byline"><?php if(get_post_meta($post->ID, byline, true) != "") { ?>By
<?php echo get_post_meta( $post->ID,"byline", $single=true ) ; ?>
<?php } ?>  </span></p>
            <p class="post_meta"><span class="date">Posted on <?php the_time('F jS, Y') ?></span></p>
            <p class="post_meta"><span class="details">Archived in <?php the_category(', ') ?></span></p>
            <p class="post_meta"><span class="comments"><a href="#respond">Leave a comment</a></span></p>
<p class="post_meta"><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?></p>
            <div style="clear:both;height:20px;border-bottom:1px solid #eee;margin-bottom: 20px;"></div>
            
  <?php get_sidebar("2"); ?>
            

            </div>
			<div id="main" class="grid_12 omega">
			
            <div class="entry">
                
                
				
				<?php the_content(); ?>
                
                 <?php edit_post_link(__('Edit this post.'), ' &#45; ', ''); ?>
                
            </div>
 

<?php comments_template(); ?>

<?php endwhile; endif; ?>
			
			</div><!-- / #main -->



<?php get_footer(); ?>