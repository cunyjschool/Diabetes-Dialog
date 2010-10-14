	<div id="sidebar2" class="grid_4 omega">
            
            <!-- Add you sidebar manual code here to show above the widgets -->
            <div id="widget">
            <h3>Related Posts</h3>
            <?php similar_posts(); ?>
            </div><!-- / #widget -->

            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) )  ?>		           

			<!-- Add you sidebar manual code here to show below the widgets -->
			
	</div><!-- / #sidebar2 -->
			