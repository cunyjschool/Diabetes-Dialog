<div id="footer">
				
                <?php 
		
				if ( $GLOBALS['homepage'] )
                    include( TEMPLATEPATH . '/footer-home.php');
                else
                    include( TEMPLATEPATH . '/footer-normal.php');
				
                ?>
                

                
                

                </div><!-- / #footer -->
            </div><!-- / #contentWrap -->
        </div><!-- / #content -->
    </div><!-- / #wrap -->
        
    <div class="container_16 clearfix">
        <div class="grid_16 credits">
            <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Icons by <strong><a href="http://wefunction.com/2008/07/function-free-icon-set/">Wefunction</a></strong>. Designed by <a href="http://www.woothemes.com"><img src="<?php bloginfo('template_url'); ?>/images/woo-themes.png" alt="Woo Themes" title="" /></a>. Customized by <a href="http://rosaleenortiz.net">Rosaleen Ortiz</a></p>
        </div><!-- / #credits -->
    </div><!-- / #container_16 -->
    
<?php wp_footer(); ?>
<?php if ( get_option('woo_google_analytics') <> "" ) { echo stripslashes(get_option('woo_google_analytics')); } ?>

<!-- Category dropdown --> 
<script type="text/javascript">
<!--
function showlayer(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none" || myLayer.style.display==""){
    myLayer.style.display="block";
} else {
    myLayer.style.display="none";
}
}            
-->
</script>
    <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11010028-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>