=== RSS Shortcode ===
Contributors: JoePritchard
Donate link: 
Stable tag : trunk
Tags: rss feed
Requires at least: 4.0
Tested up to: 6.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provides a means of displaying an RSS feed via a shortcode.

== Description ==

This is a VERY simple Wordpress Plugin designed to do one thing; get the most recent 'n' entries from a specified feed and display them in a list structure on a Wordpress Page. I wrote it because I needed something very straight forward that worked 'out of the box'. It doesn't store feed details in a database anywhere, just whacks them on the screen when needed.

Shortcode is [jp-rssonpage rss="URL" feeds="Number of Items"]

The list is created as a list.


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/jp-rssshortcode` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Put the Shortcode wherever you need it on a page or in a post or in a 'Text Widget'.


== Frequently Asked Questions ==

= Can I change the style of the list? =

The UL tag is styled by a class called jp_simple_rss_feed_ul

The LI tag is styled by a class called jp_simple_rss_feed_li

If these classes are not found in the CSS for the theme, then the default Theme CSS for these elements will be used.

= Where should I add custom CSS? =

If you wish to use custom CSS, then add the custom CSS to the theme / child theme style.css file or use whatever tools the theme offers for adding bespoke CSS.


== Changelog ==

= 1.0 =
* Initial release
