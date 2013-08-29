tweetable-text
==============

A WordPress plugin that lets you choose specific phrases or sentences for one-click tweeting.

Based on <a href="http://wordpress.org/plugins/tweetable-text/">Tweetable Text</a> by Salim Virani, with additions by Joshua Benton of Nieman Lab.

Lets you highlight specific parts of a WordPress post for one-click tweeting. Use:

<blockquote>Schardt says that <strong>&#91;tweetable&#93;</strong>finding creative journalists with an awareness of what technologies are available to them is half the battle.<strong>&#91;/tweetable&#93;</strong> The advancements themselves outpace the average newsroom's awareness and ability, but funding continues to be overwhelmingly aimed at furthering these platforms — while journalists struggle to keep up.</blockquote>

Optionally, you can include an <code>alt</code> tag in the shortcode if you want the text of the tweet to be different than the exact text you're highlighting:

<blockquote>Schardt says that <strong>&#91;tweetable alt=&#34;This is actually the text that will show up in the tweet.&#34;&#93;</strong>finding creative journalists with an awareness of what technologies are available to them is half the battle.<strong>&#91;/tweetable&#93;</strong> The advancements themselves outpace the average newsroom's awareness and ability, but funding continues to be overwhelmingly aimed at furthering these platforms — while journalists struggle to keep up.</blockquote>

You can also add hashtags to the tweet:

<blockquote>Schardt says that <strong>&#91;tweetable hashtag=&#34;#journalism #publicmedia&#34;&#93;</strong>finding creative journalists with an awareness of what technologies are available to them is half the battle.<strong>&#91;/tweetable&#93;</strong> The advancements themselves outpace the average newsroom's awareness and ability, but funding continues to be overwhelmingly aimed at furthering these platforms — while journalists struggle to keep up.</blockquote>

As written, this requires <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a> for the Twitter bird; if you don't want to use Font Awesome, just delete <code>&amp;thinsp;&lt;i class='icon-twitter' style='color: #ed2e24;'&gt;&lt;/i&gt;</code>. (You can replace it with an image call if you'd like.) Colors and other layout choices are editable in the CSS block at the bottom of the file.
