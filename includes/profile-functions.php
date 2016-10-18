<?php 
/**
 * @Author: halink
 * @Date:   2016-10-18 10:42:54
 * @Last Modified by:   halink
 * @Last Modified time: 2016-10-18 15:16:44
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
	$user_id = get_current_user_id();
	$courses = learn_press_get_enrolled_courses($user_id);
	// print_r($courses);
	foreach($courses as $course):
		?>
			<div>
				<a href="<?php echo $course->guid ?>"><?php echo $course->post_title ?></a>
			</div>
		<?php	
	endforeach;
}