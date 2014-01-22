<?php

/*
Plugin Name: Tweetable Text
Description: Make your posts more shareable. Add a Tweet button to key sentences right inside each blog post with a simple [tweetable] tag.
Version: 1.1
Author: Salim Virani (original), updated by Joshua Benton of Nieman Lab
*/


//Stops WordPress from converting your quote symbols into smartquotes, since they are not compatible with the Twitter Share button. (The urlencoding of single quotes / apostrophes breaks in the tweet.)
remove_filter('the_content', 'wptexturize');

class TweetableText{
 function makeTweetable($atts, $content = "") {
   extract(shortcode_atts(array(
      'alt' => '',
      'hashtag' => '',
   ), $atts));
   global $wpdb, $post;




	if(get_post_type($post) == "post") {
		$post_id = $post->ID;
		$permalink = get_permalink($post_id);

		$tweetcontent = ucfirst(strip_tags($content));

		if ($alt != '') $tweetcontent = $alt;
		if ($hashtag != '') $tweetcontent .= " " . $hashtag;

		$ret = "<span class='tweetable'>";
		$ret .= "<a href='https://twitter.com/intent/tweet?original_referer=".urlencode($permalink)."&source=tweetbutton&text=".rawurlencode(($tweetcontent)) ."&url=".urlencode($permalink)."'>$content&thinsp;<i class='fa fa-twitter'></i>";
		$ret .= "</a>";
		$ret .= "<span class='sharebuttons'>";

		$ret .= "<a href='https://twitter.com/intent/tweet?original_referer=".urlencode($permalink)."&source=tweetbutton&text=".rawurlencode(($tweetcontent)) ."&url=".urlencode($permalink)."'>TWEET";
		$ret .= "</a>";


		$ret .= "</span>";
		$ret .= "</span>";
            return $ret;
	} else {
		return $content;
	}
     }
}

add_shortcode( 'tweetable', array('TweetableText', 'makeTweetable') );

function tweetable_scripts() {
	wp_enqueue_style('tweetable_styles', plugins_url( $path, __FILE__ ) . '/assets/styles.css', false, false);
	wp_enqueue_style('tweetable-fa', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', false, false);
	wp_register_script('tweetable_scripts', plugins_url( $path, __FILE__ ) . '/assets/scripts.js', 'jquery', '', true);
	wp_enqueue_script('tweetable_scripts');
}
add_action('wp_enqueue_scripts', 'tweetable_scripts', 100);
?>
