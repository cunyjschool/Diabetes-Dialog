<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="all" />


<!--[if IE 6]>
<script src="<?php bloginfo('template_url'); ?>/includes/js/DD_belatedPNG_0.0.7a-min.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('img');
</script>
<![endif]--> 
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/menu.js"></script>
<![endif]-->



<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAEXpRTCOibkeQcBPp-3twABTkUJvYdylUWEAitRe0nLSUCXLnBBT7V5xGXLd0bq-YKfAF18rOtX3bAw" type="text/javascript"></script>
 
 

 

</head>

<body onLoad="load()" onUnload="GUnload()" <?php if ( is_front_page() ) { ?> id="home"<?php } ?> class="custom">

	<div id="wrap">
    
        <div id="nav_wrapper">
            <ul id="nav">
                <li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
                
                <?php if ( get_option('woo_blog_navigation') == 'true' && get_option('woo_blog_subnavigation') =='false' ) { ?>
                <li <?php if ( is_category() || is_single() || is_tag() || is_archive() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); echo get_option('woo_blog_permalink'); ?>" title="Blog"><span class="left"></span>Latest News<span class="right"></span></a></li><?php } ?>
                
                <?php if ( get_option('woo_blog_subnavigation') == 'true' && get_option('woo_blog_navigation' ) =='true' ) { ?><?php wp_list_categories('child_of=' . get_option( 'woo_blog_cat' ) . '&hide_empty=&title_li=<a href="' . get_option('home') . get_option('woo_blog_permalink') .'" title="Blog"><span class="left"></span>Latest News<span class="right"></span></a>'); ?><?php } ?>
            
                <?php wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); ?>

     <a href="http://www.journalism.cuny.edu"><img src="http://diabetesdialog.org/wp-content/uploads/2009/10/cunylogo-bluebkg.jpg" align="right" /></a>
   			 </ul> <!--/#nav -->

        </div><!-- / #nav_wrapper -->
        
        <div id="cats_wrapper">
            <ul id="cats">
            
            <li><h2>Explore:</h2></li>
            <?php
if  (!is_page() && !is_home()){
	$catsy = get_the_category();
	$myCat = $catsy[0]->cat_ID;
	$currentcategory = '&current_category='.$myCat;
}
wp_list_categories('sort_column=menu_order&depth=3&title_li='.$currentcategory.'&exclude='.get_option('woo_nav_exclude')); ?>

                          
             </ul> <!--/#cats -->
             
            
        </div><!-- / #cats_wrapper -->
        
		<div id="header">
                
            <div class="container_16">
                <div class="grid_8 alpha">
                
                    <h1 id="logo"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a><?php bloginfo('description'); ?> </h1>
                    

            
                </div><!-- / #grid_8 -->
                <div class="grid_8 omega">
                
               <!-- Top Banner Ad or Dropdown Starts -->
                <?php 
             $ad_yes =     get_option('woo_ad_header');
             $ad_code =      get_option('woo_ad_header_code');
             $ad_image =     get_option('woo_ad_header_image');
             $ad_url =      get_option('woo_ad_header_url');
             
             if($ad_yes == 'true'){
             ?>
            <div class="header_banner_ad">
            <?php 
            if($ad_code != ''){ echo stripcslashes($ad_code); }
            else { 
            ?>
            <a href="<?php echo $ad_url;  ?>" title="Advert"><img class="title" src="<?php echo $ad_image; ?>" alt="" /></a>
            <?php
             } 
             ?>
            </div>
            <?php }
            
            else {
              ?>
                   
                   
                   
                 
             
        <div id="search-3" class="block widget widget_search"><div class="widget"><form method="get" id="searchform" action="http://diabetesdialog.org/">
	<fieldset>
		<p><input type="submit" id="searchsubmit" value="Search" /><input type="text" value="" name="s" id="s" /></p>
	</fieldset>
	</form>
	</div><!-- / #search-3 -->
    </div><!-- / .widget -->
	
           
            
            <?php } ?>
            
             <!-- Top Banner Ad or Dropdown Ends -->                  
    
                </div><!-- / #grid_8 -->
                
                
            </div><!-- / #container_16 -->
            
            
        
		</div><!-- / #header -->

        <div id="content">
			<div id="contentWrap" class="container_16">