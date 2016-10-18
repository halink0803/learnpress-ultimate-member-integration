<?php 
/**
 * @Author: halink
 * @Date:   2016-10-18 10:42:54
 * @Last Modified by:   halink
 * @Last Modified time: 2016-10-18 11:03:37
 */

/* add a custom tab to show user pages */
add_filter('um_profile_tabs', 'pages_tab', 1000 );
function pages_tab( $tabs ) {
	
	$tabs['pages'] = array(
		'name' => 'Courses',
		'icon' => 'um-faicon-pencil',
		'custom' => true
	);	
	return $tabs;
}

/* Tell the tab what to display */
add_action('um_profile_content_pages_default', 'um_profile_content_pages_default');
function um_profile_content_pages_default( $args ) {
	echo "Hello world.";
}