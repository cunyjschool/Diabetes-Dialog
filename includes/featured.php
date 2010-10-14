<div id="top">
    <div class="grid_12 alpha">
        <div id="featured">
            <div id="mygallery" class="stepcarousel">
                <div class="belt">
                
                    <?php query_posts("category_name=Featured&showposts=".get_option('woo_scroller_posts')); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
                
                    <div class="panel">
                    
                        <div style="float:left;width:700px;">
                                            

                           
                            <div class="grid_12 slider" style="background: url(<?php echo get_post_meta( $post->ID,"featured-image", $single=true ) ; ?>) no-repeat;">
                              <a id="featured-link" href="<?php the_permalink() ?>"></a>
                            <div class="featured_text_background"> 

                                <div class="featured_text">
                                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    <?php the_excerpt(); ?>
                                </div> <!-- / featured_text -->
                                </div> <!-- / featured_text_background -->
                            </div><!-- / #grid_12 -->
                        
                        </div>
                    
                        <br class="fix" />
            
                    </div><!-- / panel -->
                    
                    <?php endwhile; endif; ?>
                    
                </div><!-- / belt -->
            </div><!-- / mygallery -->
    
    <div class="grid_12 pi" id="slider_nav">
    <div class="grid_5 alpha">
    	<a href="javascript:stepcarousel.stepBy('mygallery', -1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-left.png" alt="Back" /> Previous</a>
    </div>
    <div class="grid_5 gamma" style="text-align:right;">
    	<a href="javascript:stepcarousel.stepBy('mygallery', 1)">Next <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arr-right.png" alt="Forward" /></a>
    </div>
    
</div>       <!-- /#slider_nav -->      
        </div><!-- / featured -->
    </div><!-- / grid_12 -->
        
        
    <div class="grid_4 alpha">
        <div id="about">
        
            <h2><?php echo stripslashes(get_option('woo_about_header')); ?></h2>      

<span style="font-size:0.6em;">(Photo: <a href="http://www.flickr.com/people/docsearls/">Doc Searls</a>)</span><br />     
            <p><?php if (get_option('woo_about_photo')) { ?><img alt="" class="about_image" src="<?php echo get_option('woo_about_photo'); ?>" /><?php } ?><?php echo stripslashes(get_option('woo_about_text')); ?></p>
             

        </div><!-- / #about -->
    </div><!-- / #grid_4 -->
            
</div><!-- / #top -->
           
 <br class="fix" />

        
        