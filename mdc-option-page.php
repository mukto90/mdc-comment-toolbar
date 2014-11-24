<?php 
function mdc_option_page(){
	add_menu_page('MDC Comment Toolbar', 'Comment Toolbar', 'administrator', 'mdc-comment-toolbar', 'mdc_comment_toolbar_option_page', plugins_url( 'images/icon.png' , __FILE__ ), 61);
}
add_action('admin_menu', 'mdc_option_page');
function mdc_comment_toolbar_option_page(){
	?>
<div class="wrap">
	<h2>MDC Comment Toolbar Settings</h2>
	<?php if($_POST){
	update_option('is_comment_toolbar_enabled', $_POST['is_comment_toolbar_enabled']);
	update_option('is_teeny', $_POST['is_teeny']);
	update_option('is_quick_tag', $_POST['is_quick_tag']);
	update_option('is_media_button', $_POST['is_media_button']);
	update_option('textarea_rows', $_POST['textarea_rows']);
	update_option('hide_html_msg', $_POST['hide_html_msg']);
	?>
	<div class="updated settings-error" id="setting-error-settings_updated"> 
		<p><strong>Settings saved.</strong></p>
	</div>
	<?php } ?>
	<form action="" method="post">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="is_comment_toolbar_enabled">Enable Comment Toolbar</label></th>
					<td><input type="checkbox" value="1" id="is_comment_toolbar_enabled" name="is_comment_toolbar_enabled" <?php if(get_option('is_comment_toolbar_enabled') == 1){echo "checked";}?>>Enable plugin features.</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="is_teeny">Teeny Toolbar</label></th>
					<td><input type="checkbox" value="1" id="is_teeny" name="is_teeny" <?php if(get_option('is_teeny') == 1){echo "checked";}?>>If enabled, some icons like <i>Text Size, Text Colour, Special Character</i> etc. won't show.</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="is_quick_tag">Quick Tag</label></th>
					<td><input type="checkbox" value="1" id="is_quick_tag" name="is_quick_tag" <?php if(get_option('is_quick_tag') == 1){echo "checked";}?>>Enables quick tag HTML toolbar.</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="is_media_button">Media Button</label></th>
					<td><input type="checkbox" value="1" id="is_media_button" name="is_media_button" <?php if(get_option('is_media_button') == 1){echo "checked";}?>>Enables media uploader for comment toolbar. Users can upload images using default media uploader.</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="textarea_rows">Number of rows</label></th>
					<td><input type="text" class="regular-text" value="<?php echo get_option('textarea_rows');?>" id="textarea_rows" name="textarea_rows" placeholder="Default 15" /></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="hide_html_msg">Remove nag notice</label></th>
					<td><input type="checkbox" value="1" id="hide_html_msg" name="hide_html_msg" <?php if(get_option('hide_html_msg') == 1){echo "checked";}?>>Removes "<u>You may use these HTML tags and attributes..</u>" message from comment form.</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit">
		</p>
	</form>
</div>
<div class="clear"></div>
	<?php
}
?>