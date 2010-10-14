<?php
/*
TemplateName: Main Archive
*/
?>

<?php get_header(); ?>

            <div id="albums">

                <div class="container_16">

                 

                    <?php if (have_posts()) : ?>

                    <?php $post = $posts[0]; ?>

                    

                    <div class="grid_16 alpha">

                        <?php if (is_category()) { ?><h2 class="arh"><?php echo single_cat_title(); ?> </h2> 

                        <?php } elseif (is_day()) { ?><h2 class="arh">Archive for <?php the_time('F jS, Y'); ?></h2>

                        <?php } elseif (is_month()) { ?><h2 class="arh">Archive for <?php the_time('F, Y'); ?></h2>

                        <?php } elseif (is_year()) { ?><h2 class="arh">Archive for the year <?php the_time('Y'); ?></h2>

                        <?php } elseif (is_author()) { ?><h2 class="arh">Archive by Author</h2>

                        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="arh">Archives</h2>

                        <?php } elseif (is_tag()) { ?><h2 class="arh">Tag Archives: <?php echo single_tag_title('', true); ?></h2>	

						<?php } ?>

                        

                        <div class="cat_description"><?php $category = get_the_category(); echo $category[0]->category_description; ?></div>

                        

                    </div>

                    

                    

                    

                    <?php 

                    $counter = 0; $counter2 = 0; 

                    while (have_posts()) : the_post(); $counter++; $counter2++; ?>

                    	

                    <?php if ( $counter2%4 == 1 ) { ?><div class="row_wrap"><?php } ?>

                    

                    <div class="grid_4 <?php echo 'trim trim-' . $counter; if ($counter == 1) { echo ' alpha'; } elseif ($counter == 4) { echo ' omega'; $counter = 0; } ?>">



 <div class="post_meta"><span class="credit" style="font-size: 0.8em;"><?php if(get_post_meta($post->ID, credit, true) != "") { ?>(Photo:

<?php echo get_post_meta( $post->ID,"credit", $single=true ) ; ?>)

<?php } ?>  </span></div>

                        <div class="post-image-block"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','220','150','thumbnail',90,null,'img'); ?></a></div>

    

                        <div class="entry">

                            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                            <div class="excerpt"><?php the_excerpt(); ?></div>

                        </div>

                    

                    </div>

                    <?php if ( $counter2%4 == 0 ) { ?></div><?php } ?>

                    <?php if ( $counter == 0 ) { ?><div style="clear:both;height:1px;border-bottom:1px solid #eee;margin-bottom: 20px;"></div><?php } ?>

                    

                    <?php endwhile; 

                    if ($counter2%4 != 0){  ?>

                    </div><div style="clear:both;height:1px;border-bottom:0px solid #eee;margin-bottom: 20px;"></div>

                    <?php  } ?>

                    

                    <div class="more_entries">

						<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>

                        <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>

                        <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>

                        <br class="fix" />

                        <?php } ?>

                    </div>

                    

                    <?php else : ?>

                    

                    <h2>Not Found</h2>

                    

                    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

                    

                    <?php endif; ?>

                    

					 <!-- Leaderboard Ad Starts -->

               		  <?php if (get_option('woo_ad_content') == 'true') include (TEMPLATEPATH . "/ads/archive_ad.php"); ?>

               		 <!-- Leaderboard Ad Ends -->

    

                </div><!-- / #container_16 -->

            </div><!-- / #albums -->



<?php } get_footer(); ?>