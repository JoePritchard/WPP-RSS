<?php
/*
Plugin Name: RSS Via Shortcode 
Version: 1.0
Plugin URI: https://github.com/JoePritchard/WPP-RSS
Description: Displays RSS feed on a page
Author: Joe Pritchard
Author URI: 
License: 
Usages: [rssonpage rss="URL" feeds="Number of Items"]
*/



function simple_get_rss($atts)
{

	extract(shortcode_atts(array(  
	   	"rss" 		=> '',  
		"feeds" 	=> '10',  
		"excerpt" 	=> true,
		"target"	=> '_blank'
	), $atts));


include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( $rss);

$maxitems = 0;

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 5 ); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;

//	Start the output buffering

ob_start();

?>




<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

<?php

$output = ob_get_contents();
ob_end_clean();

return $output;

}




add_shortcode( 'rssonpage', 'simple_get_rss' );




?>