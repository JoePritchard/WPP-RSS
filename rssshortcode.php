<?php
/*
Plugin Name: RSS Via Shortcode 
Version: 1.0
Plugin URI: https://github.com/JoePritchard/WPP-RSS
Description: Displays RSS feed on a page
Author: Joe Pritchard
Text Domain: rss-via-shortcode
Author URI: 
License: GPL-2
Usages: [rssonpage rss="URL" feeds="Number of Items"]
*/



function simple_get_rss($atts)
{

	extract(shortcode_atts(array(  
	   	"rss" 		=> '',  
		"feeds" 	=> '10'  
	), $atts));


include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( $rss);

$maxitems = 0;

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $feeds );

endif;

//	Start the output buffering

ob_start();

?>
<ul class="jp_simple_rss_feed_ul">
    <?php if ( $feeds == 0 ) : ?>
        <li class="jp_simple_rss_feed_li"><?php _e( 'No items found', 'rss-via-shortcode' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li class="jp_simple_rss_feed_li">
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'rss-via-shortcode' ), $item->get_date('j F Y | g:i a') ); ?>">
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

//	Add the shortcode
add_shortcode( 'jp-rssonpage', 'simple_get_rss' );
?>