<?php 
/**
 * @Author: halink
 * @Date:   2016-10-18 10:42:54
 * @Last Modified by:   halink0803
 * @Last Modified time: 2016-10-24 14:41:49
 */

/* add a custom tab to show user courses */
add_filter('um_profile_tabs', 'pages_tab', 1000 );
function pages_tab( $tabs ) {
	
	$tabs['courses'] = array(
		'name' => 'Courses',
		'icon' => 'um-faicon-pencil',
		'custom' => true
	);	
	return $tabs;
}

/* Tell the tab what to display */
add_action('um_profile_content_courses_default', 'um_profile_content_courses_default');
function um_profile_content_courses_default( $args ) {
	$user_id = get_current_user_id();
	$courses = learn_press_get_enrolled_courses($user_id);
	// print_r($courses);
	?>
	<ul class="courses-listing">
	<?php
	foreach($courses as $course):
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $course->ID ), 'single-post-thumbnail' );
		?>
		<li class="course-item">
			<div class="course-container">
				<article class="course audit">

					<section class="details" aria-labelledby="details-heading-11.126x_2">
						<h2 class="hd hd-2 sr" id="details-heading-11.126x_2"><?php _e('Course details', 'learnpress-ultimate-member-integration') ?></h2>
						<div class="wrapper-course-image" aria-hidden="true">
							<a href="<?php echo $course->guid ?>" class="cover">
								<img src="<?php echo $image[0]; ?>" class="course-image" alt="<?php echo $course->post_title ?>">
							</a>
						</div>
						<div class="wrapper-course-details">
							<h3 class="course-title">
								<a href="<?php echo $course->guid ?>" target="_blank"><?php echo $course->post_title ?></a>
							</h3>
							<div class="course-info">
								<span class="info-university">
								<?php um_fetch_user(5); ?><?php _e('Instructor:', 'learnpress-ultimate-member-integration')?>
								<a href="<?php echo um_user_profile_url(); um_reset_user(); ?>">
								<?php the_author_meta( 'user_nicename' , $course->post_author ); ?>
								</a>
								</span>
								<span class="info-course-id"></span>
								<span class="info-date-block" data-tooltip="Hi">
								</span>
							</div>
						</div>
					</section>
					<footer class="wrapper-messages-primary">
					</footer>
				</article>
			</div>
		</li>
		<?php	
	endforeach;
	echo "</ul>";
}