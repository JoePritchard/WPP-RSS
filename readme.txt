This is a VERY simple Wordpress Plugin designed to do one thing; get the most recent 'n' entries from a specified feed and display them in a list structure on a Wordpress Page. I wrote it because I deeded something very straight forward that worked 'out of the box'. It doesn't store feed details in a database anywhere, just whacks them on the screen when needed.

Shortcode is [rssonpage rss="URL" feeds="Number of Items"]

The list is created as a list.

The UL tag is styled by a class called jp_simple_rss_feed_ul

The LI tag is styled by a class called jp_simple_rss_feed_li

If these classes are not found in the CSS for the theme, then the default Theme CSS for these elements will be used.

If you wish to use custom CSS, then add the custom CSS to the theme / child theme style.css file or use whatever tools the theme offers for adding bespoke CSS.