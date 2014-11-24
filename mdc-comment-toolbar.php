<?php
/*
Plugin Name:	MDC Comment Toolbar
Description:	MDC Comment Toolbar enables rich editor toolbar with media uploader in comment field.
Plugin URI:		http://wordpress.org/plugins/mdc-comment-toolbar
Author:			Nazmul Ahsan
Author URI:		http://mukto.medhabi.com
Version:		1.0.0
*/

include "mdc-option-page.php";

if(get_option('is_comment_toolbar_enabled') == 1){
	add_filter('comment_form_field_comment', 'mdc_comment_toolbar' );
	add_filter('comment_form_defaults','hide_you_may_use_these_html_msg');
}

function mdc_comment_toolbar() {
  global $post;
 
  ob_start();
 
  wp_editor( '', 'comment', array(
    'textarea_rows' => textarea_rows(),
    'teeny' => is_teeny(),	//hide some icons
    'quicktags' => is_quick_tag(),	//enable html toolbar
    'media_buttons' => is_media_button()
	)
  );
 
  $toolbar = ob_get_contents();
 
  ob_end_clean();
 
  // make sure comment media is attached to parent post
  $toolbar = str_replace( 'post_id=0', 'post_id='.get_the_ID(), $toolbar );
 
  return $toolbar;
}

function textarea_rows(){
	return get_option('textarea_rows');
}
function is_teeny(){
	if(get_option('is_teeny') == 1){
		return true;
	}
	else{
		return false;
	}
}
function is_quick_tag(){
	if(get_option('is_quick_tag') == 1){
		return true;
	}
	else{
		return false;
	}
}
function is_media_button(){
	if(get_option('is_media_button') == 1){
		return true;
	}
	else{
		return false;
	}
}

function hide_you_may_use_these_html_msg($default) {
	if(get_option('hide_html_msg') == 1){
		unset($default['comment_notes_after']);
	}
	return $default;
}

function custom_admin_css(){
?>
	<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__); ?>css/style.css"></link>
<?php
}
add_action('admin_head', 'custom_admin_css');