<?php
/*
TemplateName: CoolPeople Cat Archives
*/
?>


<?php get_header(); ?> 
			
			<div id="main" class="grid_12 alpha">

			<h2 class="arh"><?php echo single_cat_title(); ?></h2>
            
                            <?php query_posts($query_string . '&showposts=30'); ?>    
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php $wp_query->is_home = false; ?>
<div class="grid_3 alpha">
<div class="post_meta"><span class="credit" style="font-size:0.8em;"><?php if(get_post_meta($post->ID, credit, true) != "") { ?>(Photo:
<?php echo get_post_meta( $post->ID,"credit", $single=true ) ; ?>)
<?php } ?>  </span></div>
                    <div>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','150','90','thumbnail',90,null,'img',1,0,'','',false,false); ?></a>
                    </div>
</div>
                                <div class="entry">
                                <h3 style="margin-bottom:10px;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <p class="post_meta"><span class="date"><?php the_time('j F Y') ?></span> <span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></p>
                                <?php the_excerpt() ?>
                                </div>
                            
                            <?php endwhile; endif; ?>
                            
                    <div class="more_entries">
						<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                        <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                        <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                        <br class="fix" />
                        <?php } ?>
                    </div>	
			
			</div><!-- / #main -->


<?php get_footer(); ?>
