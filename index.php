<?php get_header(); ?>







	<?php $GLOBALS['homepage'] = 'true';?>    



    <!-- Featured Slider -->



    <?php include(TEMPLATEPATH . '/includes/featured.php'); ?>



    



   <!-- Leaderboard Ad Starts -->



      <?php if (get_option('woo_ad_top') == 'true') include (TEMPLATEPATH . "/ads/home_leaderboard_ad.php"); ?>



   <!-- Leaderboard Ad Ends -->







<div id="main">






<div class="grid_18 alpha">

    <div id="albums">



           






            <?php 



                $exclude = get_exclude_categories("woo_cat_box_");



                



                $getcats = get_categories('hierarchical=0&hide_empty=0&exclude='. $exclude); 



                $track = array();



                foreach ( $getcats as $cat ) { ?>		



                    



                        <?php 



                        $count = 0; 



                        $cat_id = $cat->cat_ID;



                        query_posts("cat=$cat_id&showposts=100"); 



                        if (have_posts()) : while (have_posts()) : the_post(); 



                        if (!in_array($post->ID,$track) ) {



                        ?>



                        <div class="grid_4">



<?php echo get_cat_fields($cat_id, 'credit');?>



                            



						 	<div class="category-image-block" id="cat_<? echo $cat_id; ?>"><a href="<?php echo get_category_link($cat_id);?>"><?php 



                            



                            if(get_option('woo_cat_box_'. $cat_id .'_image')){



                                echo '<img class="thumbnail" height="150" width="220" alt="'. get_the_title() .'" src="'. get_bloginfo('template_url'). '/thumb.php?src=' . get_option('woo_cat_box_'. $cat_id .'_image') .'&h=150&w=220&zc=1&q=90" alt="" />';



                            }



                            else {



                                woo_get_image('image','220','150','thumbnail',90,$post->ID,'img'); 



                            }                            



                            ?></a></div>



                            <p class="category"><a href="<?php echo get_category_link($cat_id); ?>"><?php single_cat_title() ?></a></p>



                         



                         </div>



                         <?php



                        



                         $count++;



                         }



                         $track[] = $post->ID;



                         if($count >= 1) break;



                     



                      endwhile; endif; 



                      ?>







                    <?php } ?>	



              






             



                



                </div><!--/#albums -->



                



                <div id="footerWrap" class="container_blog">



    















        <div id="blog" class="widget">







            <h3 id="news"><a href="http://diabetesdialog.org/articles/category/latest_news/">Latest News</a></h3>



            







            



            <?php 



            $cat_id = get_option('woo_blog_cat');



            $post_count = get_option('woo_featured_posts');



            query_posts("cat=$cat_id&showposts=$post_count");



            



            if (have_posts()) :







              $counter = 0; $counter2 = 0;



              while (have_posts()) : the_post(); 



      



              $counter++; 



            ?>



           	 <div class="grid_17 alpha">



            



                <div class="box">



                    <div class="post_meta"><span class="credit" style="font-size:0.8em;"><?php if(get_post_meta($post->ID, credit, true) != "") { ?>(Photo:



<?php echo get_post_meta( $post->ID,"credit", $single=true ) ; ?>)



<?php } ?>  </span></div>



                    <div style="height:100px; margin-bottom:5px">



                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','200','100','thumbnail',90,null,'img',1,0,'','',false,false); ?></a>



                    </div>



                    <h4><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>



                    <p class="post_meta"><span class="date"><?php the_time('F jS, Y') ?></span></p>



                    <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>



                 



                </div><!-- / #box -->



        



           	 </div><!-- / #grid_5 -->







        



            <?php if ($counter == 0) { ?><div class="fix" style="margin-bottom:20px;"></div><?php } ?>



      



            <?php endwhile; ?>



     



            <?php else: ?>	



                <p>No posts yet.</p>



            <?php endif; ?>







        </div><!-- / #blog -->



</div>

              </div><!--/#grid_18 alpha -->






 </div><!-- /#main -->



 



              <div class="grid_4 alpha">



              



              <?php get_sidebar(); ?>



              </div> <!--/#grid_4 -->







 



			



<?php get_footer(); ?>