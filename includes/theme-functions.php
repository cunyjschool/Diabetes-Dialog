<?php

// Category News Boxes
function get_exclude_categories($label) {
    
    $include = array();
    $counter = 0;
    $cats = get_categories('hide_empty=0');
    
    foreach ($cats as $cat) {
        
        $counter++;
        
        if ( get_option( $label.$cat->cat_ID ) == 'true') {
            
                $exclude[] = $cat->cat_ID;
            }
        }
        if(!empty($exclude)){
        $exclude = implode(',',$exclude);
        }
    return $exclude;

}

?>