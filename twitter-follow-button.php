<?php
/*
Plugin Name: Twitter Follow Button for WordPress
Plugin URI: http://www.darkomitrovic.com/wp-plugin/twitter-follow-button/
Description: Add the Follow Button to your website to increase engagement and create a lasting connection with your audience.
Version: 1.0
Author: Darko Mitrovic
Author URI: http://www.darkomitrovic.com/
License: GPL2
*/

class TwitterFollowButtonWidget extends WP_Widget
{
  function TwitterFollowButtonWidget()
  {
    $widget_ops = array('classname' => 'TwitterFollowButtonWidget', 'description' => 'Displays a Twitter Follow Button' );
    $this->WP_Widget('TwitterFollowButtonWidget', 'Twitter Follow Button', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => 'Follow', 'username' => 'DarkoMitrovic', 'background' => 'blue', 'count' => 'false', 'lang' => 'en' ) );
    $title = $instance['title'];
    $username = $instance['username'];
    $background = $instance['background'];
    $count = $instance['count'];
    $lang = $instance['lang'];
?>





<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
	Title: 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
	</label>
</p>


<p>
	<label for="<?php echo $this->get_field_id('username'); ?>">
	What's your user name? 
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo attribute_escape($username); ?>" />
	</label>
</p>


<p>
	<label for="<?php echo $this->get_field_id('background'); ?>">
	Your background color is<br />
		<input type="radio" id="<?php echo $this->get_field_name('background'); ?>" name="<?php echo $this->get_field_name('background'); ?>" value="blue" <?php if($instance['background'] == blue) {echo 'checked="checked"';} ?> />
		<label>Light</label>
		<input type="radio" id="<?php echo $this->get_field_name('background'); ?>" name="<?php echo $this->get_field_name('background'); ?>" value="grey" <?php if($instance['background'] == grey) {echo 'checked="checked"';} ?> />		
		<label>Dark</label>
	</label>
</p>


<p>
	<label for="<?php echo $this->get_field_id('count'); ?>">
	Show follower count?<br />
		<input type="radio" id="<?php echo $this->get_field_name('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="false" <?php if($instance['count'] == 'false') {echo 'checked="checked"';} ?> />
		<label>No</label>
		<input type="radio" id="<?php echo $this->get_field_name('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="true" <?php if($instance['count'] == 'true') {echo 'checked="checked"';} ?> />		
		<label>Yes</label>
	</label>
</p>
 
 
 
<p>
	<label for="<?php echo $this->get_field_id('lang'); ?>">
	Language:
	</label>
	<select id="<?php echo $this->get_field_id( 'lang' ); ?>" name="<?php echo $this->get_field_name( 'lang' ); ?>">
		<option value="en" <?php if($instance['lang'] == en) {echo 'selected="selected"';} ?>>English</option>
		<option value="fr" <?php if($instance['lang'] == fr) {echo 'selected="selected"';} ?>>French</option>
		<option value="de" <?php if($instance['lang'] == de) {echo 'selected="selected"';} ?>>German</option>
		<option value="it" <?php if($instance['lang'] == it) {echo 'selected="selected"';} ?>>Italian</option>
		<option value="ja" <?php if($instance['lang'] == ja) {echo 'selected="selected"';} ?>>Japanese</option>
		<option value="ko" <?php if($instance['lang'] == ko) {echo 'selected="selected"';} ?>>Korean</option>
		<option value="ru" <?php if($instance['lang'] == ru) {echo 'selected="selected"';} ?>>Russian</option>
		<option value="es" <?php if($instance['lang'] == es) {echo 'selected="selected"';} ?>>Spanish</option>
		<option value="tr" <?php if($instance['lang'] == tr) {echo 'selected="selected"';} ?>>Turkish</option>
	</select>			
</p>


 
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['username'] = $new_instance['username'];
    $instance['background'] = $new_instance['background'];
    $instance['count'] = $new_instance['count'];
    $instance['lang'] = $new_instance['lang'];
   return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;


	$username = $instance['username'];
	$background = $instance['background'];
	$count = $instance['count'];
	$lang = $instance['lang'];


 
    // WIDGET CODE GOES HERE
	if($instance['background'] == blue) {
    echo '<a href="http://twitter.com/'.$username.'" class="twitter-follow-button" data-show-count="'.$count.'" data-lang="'.$lang.'">Follow @'.$username.'</a>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
	}
	
	else if($instance['background'] == grey) {
    echo '<a href="http://twitter.com/'.$username.'" class="twitter-follow-button" data-button="grey" data-text-color="#FFFFFF" data-link-color="#00AEFF" data-show-count="'.$count.'" data-lang="'.$lang.'">Follow @'.$username.'</a>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
	}
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("TwitterFollowButtonWidget");') );
?>