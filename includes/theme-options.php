<?php
function woo_options(){
// VARIABLES
$themename = "Aperture";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/aperture/';
$shortname = "woo";



$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

$ad_template = "advertising";
$nav_template = "nav";
$image_template = "image";

$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$all_uploads_path = get_bloginfo('home') . '/wp-content/uploads/';
$all_uploads = get_option('woo_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// ALBUM CATEGORIES BOXES (homepage)
function category_boxes($options) {        
    $cats = get_categories('hide_empty=0');
    foreach ($cats as $cat) {
        $options[] = array(    "name" =>  $cat->cat_name,
                    "desc" => "Check this box if you wish to exclude this category in the photo album categories",
                    "id" => "woo_cat_box_".$cat->cat_ID,
                    "std" => "",
                    "type" => "checkbox");                    
    }
    return $options;
    
}// ALBUM CATEGORIES BOXES IMAGES (homepage)
function category_boxes_images($options) {        
    $cats = get_categories('hide_empty=0');
    foreach ($cats as $cat) {
        $options[] = array(    "name" =>  $cat->cat_name,
                    "desc" => "Upload an image to replace the dynamic homepage images.",
                    "id" => "woo_cat_box_".$cat->cat_ID.'_image',
                    "std" => "",
                    "type" => "upload");                    
    }
    return $options;
}

// THIS IS THE DIFFERENT FIELDS

$options = array();
$options[] = array(    "name" => "General Settings",
                    "type" => "heading");
                        
$options[] = array(    "name" => "Theme Stylesheet",
                                        "desc" => "Select your themes alternative color scheme.",
                                        "id" => $shortname."_alt_stylesheet",
                                        "std" => "default.css",
                                        "type" => "select",
                                        "options" => $alt_stylesheets);

$options[] = array(    "name" => "Custom Logo",
                                        "desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
                                        "id" => $shortname."_logo",
                                        "std" => "",
                                        "type" => "upload");                                                     

 $options[] = array(    "name" => "Custom Favicon",
                                        "desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
                                        "id" => $shortname."_custom_favicon",
                                        "std" => "",
                                        "type" => "upload"); 
                                        
$options[] = array(    "name" => "Tracking Code",
                                        "desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
                                        "id" => $shortname."_google_analytics",
                                        "std" => "",
                                        "type" => "textarea");        

$options[] = array(    "name" => "RSS URL",
                                    "desc" => "Enter your preferred RSS URL. (Feedburner or other)",
                                    "id" => $shortname."_feedburner_url",
                                    "std" => "",
                                    "type" => "text");
                                    
$options[] = array( "name" => "Custom CSS",
                                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                                    "id" => $shortname."_custom_css",
                                    "std" => "",
                                    "type" => "textarea");
                    
$options[] = array(    "name" => "Layout Options",
                                    "type" => "heading");    
                    
$options[] = array( "name" => "Exclude Pages from Navigation",
                                    "desc" => "Enter a comma-separated list of <a href='http://support.wordpress.com/pages/8/'>ID's</a> that you'd like to exclude from the top navigation. (e.g. 12,23,27,44)",
                                    "id" => $shortname."_nav_exclude",
                                    "std" => "",
                                    "type" => "text"); 
                   
$options[] = array(        "name" => "Dynamic Images",
                                       "type" => "heading");    

$options[] = array(    "name" => "Enable Dynamic Image Resizer",
                                        "desc" => "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
                                        "id" => $shortname."_resize",
                                        "std" => "true",
                                        "type" => "checkbox");    
                    
$options[] = array(    "name" => "Automatic Image Thumbs",
                                    "desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
                                    "id" => $shortname."_auto_img",
                                    "std" => "false",
                                    "type" => "checkbox");    
                                                            
$options[] = array(    "name" => "Home Page Options",
                                        "type" => "heading");
                                        
$options[] = array(    "name" => "Home Page Slider Posts",
                                        "desc" => "Select the number of posts to display in your home page slider.",
                                        "id" => $shortname."_scroller_posts",
                                        "std" => "Select a number:",
                                        "type" => "select",
                                        "options" => $other_entries);
                        
    
$options[] = array(    "name" => "About Title",
                                        "desc" => "Include a short title for your about module on the home page.",
                                        "id" => $shortname."_about_header",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "About Text",
                                        "desc" => "Include a short paragraph of text describing your product/service/company.",
                                        "id" => $shortname."_about_text",
                                        "std" => "",
                                        "type" => "textarea");    
                    
$options[] = array(    "name" => "Read More Button Text",
                                        "desc" => "Please enter the text you want to appear on the first button. Leave empty to remove.",
                                        "id" => $shortname."_about_button",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "Read More Button URL",
                                        "desc" => "Please enter the URL of the page you want linked to button 1",
                                        "id" => $shortname."_button_link",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "About Photo",
                                        "desc" => "Please enter the url of the photo you would like to appear in the about module. Leave empty to remove.",
                                        "id" => $shortname."_about_photo",
                                        "std" => "",
                                        "type" => "text");    
                                        
$options[] = array(    "name" =>  "Homepage Category Boxes To Exclude",
                                        "type" => "heading");
                    

$options = category_boxes($options);    

$options[] = array(    "name" =>  "Homepage Category Box Images",
                                        "type" => "heading");
                    
$options = category_boxes_images($options);    

$options[] = array(    "name" => "Blog Setup",
                                        "type" => "heading");        

$options[] = array(    "name" => "Add Blog Link to Main Navigation?",
                                        "desc" => "If checked, this option will add a blog link to your main navigation next to the Home link.",
                                        "id" => $shortname."_blog_navigation",
                                        "std" => "false",
                                        "type" => "checkbox");                                                                                                                                            
                    
$options[] = array(    "name" => "Add blog categories as a drop-down to top navigation link?",
                                        "desc" => "If checked, this option will add a drop-down menu - with all your blog categories - to the blog link in the top navigation.",
                                        "id" => $shortname."_blog_subnavigation",
                                        "std" => "false",
                                        "type" => "checkbox");    
                                        
$options[] = array( "name" => "Blog Permalink",
                                    "desc" => "Please enter the permalink to your blog parent category (i.e. /category/blog/). If you are not using <a href='http://codex.wordpress.org/Using_Permalinks'>Pretty Permalinks</a> then you can use (/?cat=X) where X is your blog category ID.",
                                    "id" => $shortname."_blog_permalink",
                                    "std" => "",
                                    "type" => "text");                                                                                                                        
                        
$options[] = array( "name" => "Blog Category ID",
                                    "desc" => "Please enter the ID of your main blog category. Only the sub-categories of this category will be displayed in the category drop-down.",
                                    "id" => $shortname."_blog_cat",
                                    "std" => "",
                                    "type" => "text"); 
                    
$options[] = array(    "name" => "Blog posts on the home page",
                                        "desc" => "Select the number of blog posts you'd like to display on the home page. <br />NOTE: Set total number of posts to show on home page in WordPress admin under Settings -> Reading -> Blog posts to show at most.",
                                        "id" => $shortname."_featured_posts",
                                        "std" => "Select a number:",
                                        "type" => "select",
                                        "options" => $other_entries);    
                                        
//Advertising

// - Header Banner (468x60px)
$options[] = array(    "name" => "Ads - Header Banner (468x60px)",
                    "type" => "heading");

$options[] = array(    "name" => "Enable this Ad",
                    "desc" => "Enable this Ad space, but disable the Recent Post insert.",
                    "id" => $shortname."_ad_header",
                    "std" => "false",
                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                    "desc" => "Enter your adsense code (or other ad network code) here.",
                    "id" => $shortname."_ad_header_code",
                    "std" => "",
                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                    "desc" => "Enter or upload the Ad Image from here.",
                    "id" => $shortname."_ad_header_image",
                    "std" => "http://www.woothemes.com/ads/468x60a.jpg",
                    "type" => "upload");

$options[] = array(    "name" => "Image Destination",
                    "desc" => "Enter the destination URL for this banner advert.",
                    "id" => $shortname."_ad_header_url",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");   
                                        
// - Home Page Leaderboard Ad (728x90px)  
                    
$options[] = array( "name" => "Ads - Home Page Leaderboard Ad (728 x 90px)",
                    "type" => "heading");

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_top",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/468x60a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");  
					
// - Archive Leaderboard Ad (728x90px)                       

$options[] = array( "name" => "Ads - Archive Leaderboard Ad (728 x 90px)",
					"type" => "heading");

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_content",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_content_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_content_image",
					"std" => "http://www.woothemes.com/ads/728x90a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_content_url",
					"std" => "http://www.woothemes.com",
					"type" => "text"); 
					
// - Sodebar Widget Ad (220px width)                          

$options[] = array( "name" => "Ads - Sidebar Widget (220px width)",
					"type" => "heading");

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_300_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL for this banner ad. Please note this advert needs to have a maximum width of 220 pixels in order to fit into the widgetized footer or sidebar spaces.",
					"id" => $shortname."_ad_300_image",
					"std" => "http://www.woothemes.com/ads/300x250a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_300_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");    


$woo_metaboxes = array(


        "image" => array (
            "name"        => "image",
            "std"     => "",
            "label"     => "Image",
            "type"         => "upload",
            "desc"      => "Upload a file for image to be used by the Dynamic Image resizer."
        )
    );
    
                        
        update_option('woo_template',$options);
        update_option('woo_themename',$themename);      
        update_option('woo_shortname',$shortname ); 
        update_option('woo_manual',$manualurl ); 
        
update_option('woo_custom_template',$woo_metaboxes);
 
 
    
}

add_action('init','woo_options')
 
?>