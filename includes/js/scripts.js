jQuery(document).ready(function () {
     jQuery("#footerWrap .alpha").each(function(){
     var left_height = jQuery(this).children(".box").height();
     var right_height = jQuery(this).next(".omega").children(".box").height();
     if( left_height > right_height ){ jQuery(this).next(".omega").children(".box").css('height',left_height )  }
     if( left_height < right_height ){ jQuery(this).children(".box").css('height',right_height ) }
     });
     
     var max = null;

     jQuery(".row_wrap").each(function() {
        jQuery(this).children('.trim').children('.entry').each(function() {
          if ( !max || max.height() < jQuery(this).height() ){
            max = jQuery(this);
          }
          });
         var row_height = jQuery(max).height();
         jQuery(this).children('.trim').children('.entry').height(row_height);
        var max = null;
     }); 
 
     
	   
        
            jQuery('.category-image-block img').mouseover(function() {
                jQuery(this).stop().fadeTo(400, 0.2);
            });
            jQuery('.category-image-block img').mouseout(function() {
                jQuery(this).stop().fadeTo(500, 1.0);
            });
            
			   
        
        
            jQuery('.post-image-block img').mouseover(function() {
                jQuery(this).stop().fadeTo(400, 0.2);
            });
            jQuery('.post-image-block img').mouseout(function() {
                jQuery(this).stop().fadeTo(500, 1.0);
            });
            
            /*
            jQuery('.st-tag-cloud a').fadeTo("fast", 0.7);
            
            jQuery('.st-tag-cloud a').mouseover(function() {
                jQuery(this).fadeTo("fast", 1.0);
            });
            jQuery('.st-tag-cloud a').mouseout(function() {
                jQuery(this).fadeTo("fast", 0.7);
            });
        	*/
            
             jQuery('img.menu_class').click(function () {
                    jQuery('ul.the_menu').slideToggle('slow');
                });
            
   		});


/*
jQuery(document).ready(maininit);
    function maininit() {
        jQuery('a[@href^="#"]').click(function() {
            var parts        = this.href.split('#');
            var scrolltarget = '#' + parts[1];
            jQuery(scrolltarget).ScrollTo(1200);
            return false;
        });
};
*/