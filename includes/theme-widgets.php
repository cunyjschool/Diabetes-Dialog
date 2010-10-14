<?php

function widget_Twidget_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	function widget_Twidget($args) {

		// "$args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys." - These are set up by the theme
		extract($args);

		// These are our own options
		$options = get_option('widget_Twidget');
		$account = $options['account'];  // Your Twitter account name
		$title = $options['title'];  // Title in sidebar for widget
		$show = $options['show'];  // # of Updates to show

        // Output
		echo $before_widget ;

		// start
		echo '<h3 id="twitter">Twitter</h3>';              
		echo '<ul id="twitter_update_list"><li></li></ul><div class="follow"><a href="http://www.twitter.com/'.$account.'/" title="Follow us on Twitter">Follow us on Twitter</a></div>
		      <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$account.'.json?callback=twitterCallback2&amp;count='.$show.'"></script>';


		// echo widget closing tag
		echo $after_widget;
	}

	// Settings form
	function widget_Twidget_control() {

		// Get options
		$options = get_option('widget_Twidget');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('account'=>'woothemes', 'title'=>'Twitter Updates', 'show'=>'3');

        // form posted?
		if ( $_POST['Twitter-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['account'] = strip_tags(stripslashes($_POST['Twitter-account']));
			$options['title'] = strip_tags(stripslashes($_POST['Twitter-title']));
			$options['show'] = strip_tags(stripslashes($_POST['Twitter-show']));
			update_option('widget_Twidget', $options);
		}

		// Get options for form fields to show
		$account = htmlspecialchars($options['account'], ENT_QUOTES);
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);

		// The form fields
		echo '<p style="text-align:right;">
				<label for="Twitter-account">' . __('Account:') . '
				<input style="width: 200px;" id="Twitter-account" name="Twitter-account" type="text" value="'.$account.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-title">' . __('Title:') . '
				<input style="width: 200px;" id="Twitter-title" name="Twitter-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="Twitter-show">' . __('Show:') . '
				<input style="width: 200px;" id="Twitter-show" name="Twitter-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<input type="hidden" id="Twitter-submit" name="Twitter-submit" value="1" />';
	}


	// Register widget for use
	register_sidebar_widget(array('Woo Twitter', 'widgets'), 'widget_Twidget');

	// Register settings for use, 300x200 pixel form
	register_widget_control(array('Woo Twitter', 'widgets'), 'widget_Twidget_control', 300, 200);
}

// Run code and init
add_action('widgets_init', 'widget_Twidget_init');

// =============================== Flickr widget ======================================
function flickrWidget()
{
	$settings = get_option("widget_flickrwidget");

	$id = $settings['id'];
	$number = $settings['number'];

?>

<div class="widget flickr">
	<h3 id="flickr">Flickr photos</h3>
        <div class="flickr_photos">
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
        </div>        
		<div class="clearfix"></div>
</div>
<div style="clear:both"></div>

<?php
}

function flickrWidgetAdmin() {

	$settings = get_option("widget_flickrwidget");

	// check if anything's been sent
	if (isset($_POST['update_flickr'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['flickr_id']));
		$settings['number'] = strip_tags(stripslashes($_POST['flickr_number']));

		update_option("widget_flickrwidget",$settings);
	}

	echo '<p>
			<label for="flickr_id">Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):
			<input id="flickr_id" name="flickr_id" type="text" class="widefat" value="'.$settings['id'].'" /></label></p>';
	echo '<p>
			<label for="flickr_number">Number of photos:
			<input id="flickr_number" name="flickr_number" type="text" class="widefat" value="'.$settings['number'].'" /></label></p>';
	echo '<input type="hidden" id="update_flickr" name="update_flickr" value="1" />';

}

register_sidebar_widget('Woo - Flickr', 'flickrWidget');
register_widget_control('Woo - Flickr', 'flickrWidgetAdmin', 400, 200);


// =============================== Feedburner Subscribe widget ======================================

function feedburnerWidget()
{
	$settings = get_option("widget_feedburnerwidget");

	$id = $settings['id'];
	$title = $settings['title'];
	$text = $settings['text'];	
	$google = $settings['google'];	

?> 

	<div class="widget subscribe">	
    
		<h3 id="subscribe"><?php echo $title; ?></h3>
        
		<form action="<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify<?php } else { ?>http://www.feedburner.com/fb/a/emailverify<?php } ?>" method="post" target="popupwindow" onsubmit="window.open('<?php if ($google) { ?>http://feedburner.google.com/fb/a/mailverify?uri=<?php } else { ?>http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php } ?><?php echo $id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        
			<p class="fields">
					<input class="field text" type="text" name="email" value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}" />
					<input type="hidden" value="<?php echo $id; ?>" name="uri"/>
					<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
					<input type="hidden" name="loc" value="en_US"/>
				<button class="replace" type="submit">Sign</button>
			</p>
            
             <p><?php echo $text; ?></p>
             
		</form>
	</div>

<?php
}

function feedburnerWidgetAdmin() {

	$settings = get_option("widget_feedburnerwidget");

	// check if anything's been sent
	if (isset($_POST['update_feedburner'])) {
		$settings['id'] = strip_tags(stripslashes($_POST['feedburner_id']));
		$settings['title'] = strip_tags(stripslashes($_POST['feedburner_title']));
        $settings['text'] = strip_tags(stripslashes($_POST['feedburner_text']));        
		$settings['google'] = strip_tags(stripslashes($_POST['subscribe_google']));		

		update_option("widget_feedburnerwidget",$settings);
	}
    
    
    $title =  $settings['title'];
    if(empty($title)){$title = 'Signup';}

	echo '<p>
			<label for="feedburner_title">Title:
			<input id="feedburner_title" name="feedburner_title" type="text" class="widefat" value="'. $title .'" /></label></p>'; 
            
    echo '<p>
            <label for="feedburner_id">Feedburner ID:
            <input id="feedburner_id" name="feedburner_id" type="text" class="widefat" value="'. $settings['id'] .'" /></label></p>'; 
            
	echo '<p>
			<label for="feedburner_text">Text Below Feedburner Input Box:
			<input id="feedburner_text" name="feedburner_text" type="text" class="widefat" value="'.$settings['text'].'" /></label></p>';

	if ( $settings['google'] ) {
	
		echo '<p>
				<label for="subscribe_google">Use Feedburner Google URL?:
				<input id="subscribe_google" name="subscribe_google" type="checkbox" checked="checked" /></label></p>';			

	} else {
    
		echo '<p>
				<label for="subscribe_google">Use Feedburner Google URL?:
				<input id="subscribe_google" name="subscribe_google" type="checkbox" /></label></p>';			
	
	}

	echo '<input type="hidden" id="update_feedburner" name="update_feedburner" value="1" />';


}

// =============================== Popular Posts widget ======================================

function popularpostsWidget()
{
    $settings = get_option("widget_popularposts");

    $text = $settings['title'];
    if ($text == '' or $text == null) $text = 'Popular Posts'; 
    $amount = $settings['amount'];
    if ($amount == '' or $amount == null) $amount = 5;    

?>

    <div class="widget">

    <h3 id="popular"><?php echo $text; ?></h3>

        <ul class="news">

        <?php
        global $wpdb;
         $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $amount");
        foreach ($result as $post) {
        setup_postdata($post);
        $postid = $post->ID;
        $commentcount = $post->comment_count;
        if ($commentcount != 0) { ?>

        <li>
            <a title="<?php echo get_the_title($postid); ?>" href="<?php echo get_permalink($postid); ?>"><?php woo_get_image('image','50','50','thumbnail',90,$postid,'img'); ?></a>  
            <div class="content">
                <h4><a href="<?php echo get_permalink($postid); ?>"><?php echo get_the_title($postid); ?></a></h4>
                <p class="post_meta"><?php comments_number('No comments','1 comment','% comments'); ?>.</p>
            </div>
            <div style="clear:both"></div>
        </li>
        <?php } } ?>

        </ul>

    </div><!-- / #widget -->

<?php
}

function popularpostsWidgetAdmin() {

    $settings = get_option("widget_popularposts");

    // check if anything's been sent
    if (isset($_POST['update_popularposts'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['popularposts_title']));        
        $settings['amount'] = strip_tags(stripslashes($_POST['popularposts_amount']));        

        update_option("widget_popularposts",$settings);
    }
    
    echo '<p>
            <label for="popularposts_title">Title:
            <input id="popularposts_title" name="popularposts_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';         
    echo '<p>
            <label for="popularposts_amount">Amount of Posts:
            <input id="popularposts_amount" name="popularposts_amount" type="text" class="widefat" value="'.$settings['amount'].'" /></label></p>';         
    echo '<input type="hidden" id="update_popularposts" name="update_popularposts" value="1" />';

}

// =============================== Recent Albums Widget ======================================

function recentAlbumsWidget()
{
    $settings = get_option("widget_recentalbums");

    $text = $settings['title'];
    if ($text == '' or $text == null) $text = 'Recent Albums'; 
    $amount = $settings['amount'];
    if ($amount == '' or $amount == null) $amount = 5;    

?>

   <div class="widget">
   <h3 id="photos"><?php echo $text; ?></h3>
        <ul class="news">
             <?php 
            
             $blog_cat = get_option('woo_blog_cat');
             $posts = query_posts('cat=-'.$blog_cat.'&showposts=5'); 
             
             foreach($posts as $post):
             setup_postdata($post);

             $id = $post->ID;
  
             $do_not_duplicate = $id; 
             $preview = get_post_meta($post->ID, 'preview', true); ?>
                <li>
                    <a href="<?php echo get_permalink($id) ?>"><?php woo_get_image('image','50','50','thumbnail',90,$id,'img'); ?></a>
                    <div class="content">
                    <h4><a href="<?php echo get_permalink($id) ?>" rel="bookmark" title="Permanent Link to <?php echo get_the_title($id); ?>"><?php echo get_the_title($id); ?></a></h4>
                    <p class="post_meta"><?php echo get_the_time('F jS, Y',$id) ?></p>
                    </div>
                    <div style="clear:both"></div>
                </li>
                
            <?php endforeach; ?>
        </ul>
    </div>

<?php
}

function recentAlbumsWidgetAdmin() {

    $settings = get_option("widget_recentalbums");

    // check if anything's been sent
    if (isset($_POST['update_recentalbums'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['recentalbums_title']));        
        $settings['amount'] = strip_tags(stripslashes($_POST['recentalbums_amount']));        

        update_option("widget_recentalbums",$settings);
    }
    
    echo '<p>
            <label for="recentalbums_title">Title:
            <input id="recentalbums_title" name="recentalbums_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';         
    echo '<p>
            <label for="recentalbums_amount">Amount of Posts:
            <input id="recentalbums_amount" name="recentalbums_amount" type="text" class="widefat" value="'.$settings['amount'].'" /></label></p>';         
    echo '<input type="hidden" id="update_recentalbums" name="update_recentalbums" value="1" />';

}

// =============================== Recent Blog Posts Widget ======================================

function recentBlogsWidget()
{
    $settings = get_option("widget_recentblogs");

    $text = $settings['title'];
    if ($text == '' or $text == null) $text = 'Recent Blog Posts'; 
    $amount = $settings['amount'];
    if ($amount == '' or $amount == null) $amount = 5;    

?>

   <div class="widget">
   <h3 id="photos"><?php echo $text; ?></h3>
        <ul class="news">
             <?php 
            
             $blog_cat = get_option('woo_blog_cat');
             
             $posts = get_posts('cat='.$blog_cat.'&showposts=5'); 
             
             foreach($posts as $post):
             //setup_postdata($post);

             $id = $post->ID;
  
             $do_not_duplicate = $id; 
             $preview = get_post_meta($post->ID, 'preview', true); ?>
                <li>
                    <a href="<?php echo get_permalink($id) ?>"><?php woo_get_image('image','50','50','thumbnail',90,$id,'img'); ?></a>
                    <div class="content">
                    <h4><a href="<?php echo get_permalink($id) ?>" rel="bookmark" title="Permanent Link to <?php echo get_the_title($id); ?>"><?php echo get_the_title($id); ?></a></h4>
                    <p class="post_meta"><?php echo get_the_time('F jS, Y',$id) ?></p>
                    </div>
                    <div style="clear:both"></div>
                </li>
                
            <?php endforeach; ?>
        </ul>
    </div>

<?php
}


function recentBlogsWidgetAdmin() {

    $settings = get_option("widget_recentblogs");

    // check if anything's been sent
    if (isset($_POST['update_recentblogs'])) {
        $settings['title'] = strip_tags(stripslashes($_POST['recentblogs_title']));        
        $settings['amount'] = strip_tags(stripslashes($_POST['recentblogs_amount']));        

        update_option("widget_recentblogs",$settings);
    }
    
    echo '<p>
            <label for="recentblogs_title">Title:
            <input id="recentblogs_title" name="recentblogs_title" type="text" class="widefat" value="'.$settings['title'].'" /></label></p>';         
    echo '<p>
            <label for="recentalbums_amount">Amount of Posts:
            <input id="recentblogs_amount" name="recentblogs_amount" type="text" class="widefat" value="'.$settings['amount'].'" /></label></p>';         
    echo '<input type="hidden" id="update_recentblogs" name="update_recentblogs" value="1" />';

}




// =============================== Ad 200x200 widget ======================================
function ad300Widget()
{
include(TEMPLATEPATH . '/ads/widget_300_ad.php');
}
register_sidebar_widget('Woo - Ad 300x250', 'ad300Widget');

// =============================== Search widget ======================================

function searchWidget()
{
include(TEMPLATEPATH . '/searchform.php');
}



register_sidebar_widget('Woo - Search', 'SearchWidget');
register_sidebar_widget('Woo - Feedburner Subscription', 'feedburnerWidget');
register_widget_control('Woo - Feedburner Subscription', 'feedburnerWidgetAdmin', 400, 200);
register_sidebar_widget('Woo - Popular Posts', 'popularpostsWidget');
register_widget_control('Woo - Popular Posts', 'popularpostsWidgetAdmin', 400, 200);
register_sidebar_widget('Woo - Recent Albums', 'recentAlbumsWidget');
register_widget_control('Woo - Recent Albums', 'recentAlbumsWidgetAdmin', 400, 200);
register_sidebar_widget('Woo - Recent Blog Posts', 'recentBlogsWidget');
register_widget_control('Woo - Recent Blog Posts', 'recentBlogsWidgetAdmin', 400, 200);
register_sidebar_widget('Woo - Flickr Photos', 'FlickrBox');
register_sidebar_widget('Woo - Email Subscription', 'email_subscription');

?>