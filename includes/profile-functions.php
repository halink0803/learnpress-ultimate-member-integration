<?php 
/**
 * @Author: halink
 * @Date:   2016-10-18 10:42:54
 * @Last Modified by:   halink
 * @Last Modified time: 2016-10-18 10:43:52
 */

/* add a custom tab to show user pages */
add_filter('um_profile_tabs', 'pages_tab', 1000 );
function pages_tab( $tabs ) {
	
	$tabs['pages'] = array(
		'name' => 'Pages',
		'icon' => 'um-faicon-pencil',
		'custom' => true
	);	
	return $tabs;
}

/* Tell the tab what to display */
add_action('um_profile_content_pages_default', 'um_profile_content_pages_default');
function um_profile_content_pages_default( $args ) {
	global $ultimatemember;
	$loop = $ultimatemember->query->make('post_type=page&posts_per_page=10&offset=0&author=' . um_profile_id() );
	while ($loop->have_posts()) { $loop->the_post(); $post_id = get_the_ID();
	?>
	
		<div class="um-item">
			<div class="um-item-link"><i class="um-icon-ios-paper"></i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		</div>
		
	<?php
	}
}