<?php

/*
Plugin Name: Tweetable Text
Original Plugin URI: http://wordpress.org/extend/plugins/tweetable-text/
Description: Make your posts more shareable. Add a Tweet and Buffer button to key sentences right inside each blog post with a simple [tweetable] tag.
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
		$ret .= "<a href='https://twitter.com/intent/tweet?original_referer=".urlencode($permalink)."&source=tweetbutton&text=".rawurlencode(($tweetcontent)) ."&url=".urlencode($permalink)."'>$content&thinsp;<i class='icon-twitter' style='color: #ed2e24;'></i>";
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

function tweetabletext_header() {
?>
<script type="text/javascript">
jQuery(document).ready(function(){
  $(".tweetable").hover(
      function(){
            if ($(this).data('vis') != true) {
                    $(this).data('vis', true);
                    $(this).find('.sharebuttons').fadeIn(200);
            }
      },
      function(){
            if ($(this).data('vis') === true) {
                    $(this).find('.sharebuttons').clearQueue().delay(0).fadeOut(200);
                    $(this).data('vis', false);
                    $(this).data('leftSet', false);
            }
      });
});	
</script>
<style>
	.tweetable {position: relative;}
	.tweetable a { text-decoration: none; border-bottom: 0px dotted #ed2e24; color: #333; background: whitesmoke; }
	.tweetable a:hover { text-decoration: none; border-bottom: 0px dotted #ed2e24; color: #ed2e24;}
	.sharebuttons {display: none; position: absolute; top: -30px; left: 0px; z-index: 101;  width: 55px; background: #ed2e24; color: whitesmoke; border-radius: 3px; height: 20px; padding: 5px; text-align: center; font-family: 'helvetica neue', helvetica, arial, sans-serif; font-size: 14px; font-weight: bold; }
	.sharebuttons a { color: whitesmoke; background: #ed2e24; border: 0; }
	.sharebuttons a:hover { color: whitesmoke; background: #ed2e24; border: 0; }
	.sharebuttons span.brand a {font-size: 10px; color: whitesmoke; text-decoration:none; display: block; padding: 0 0 0 25px; margin: 0; border: none; height: 12px; }
</style>
<?
}

if (!is_admin()) {
	add_action(  'wp_head', 'tweetabletext_header' ); 
}
?>
