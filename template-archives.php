<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>
			
			<div id="main" class="grid_8 alpha">
            
            <h2>Search options</h2>
            
            <div class="archive_options">
            
            <div class="grid_4">
                        
                <p>Categories</p>
            
                        <ul>
                        	<li id="categories">
                            <?php wp_dropdown_categories('show_option_none=Select category'); ?>
							<script type="text/javascript"><!--
   							 var dropdown = document.getElementById("cat");
							function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
							location.href = "<?php echo get_option('home');
							?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
   							}
   							dropdown.onchange = onCatChange;
							--></script>
							</li>
						</ul>
                        
               </div>	
                    
               <div class="grid_3">    
                    
               <p>Monthly Archives</p>
            
                        <select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=\"\"><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
                        
               </div>
               
               </div>
               
               <div class="clearfix"></div>
			
				<h2 style="padding-bottom:20px;border-bottom:1px solid #e4e4e4; margin-bottom:20px;">Last 30 posts</h2>
            
                            <?php query_posts('showposts=30'); ?>
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php $wp_query->is_home = false; ?>
                                <div class="entry">
                                <h4 style="margin-bottom:10px;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                <p class="post_meta"><span><?php the_category(', ') ?> - <?php the_time('j F Y') ?></span> - <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
                                <?php the_excerpt() ?>
                                </div>
                            
                            <?php endwhile; endif; ?>	
			
			</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<?php get_footer(); ?>