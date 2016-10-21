<?php 
/**
 * @Author: halink
 * @Date:   2016-10-18 10:42:54
 * @Last Modified by:   halink0803
 * @Last Modified time: 2016-10-21 23:46:40
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
	print_r($courses);
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
						<h2 class="hd hd-2 sr" id="details-heading-11.126x_2">Course details</h2>
						<div class="wrapper-course-image" aria-hidden="true">
							<a href="/courses/course-v1:MITx+11.126x_2+1T2016/info" data-course-key="course-v1:MITx+11.126x_2+1T2016" class="cover">
								<img src="<?php echo $image[0]; ?>" class="course-image" alt="11.126x_2 Introduction to Game Design Home Page">
							</a>
						</div>
						<div class="wrapper-course-details">
							<h3 class="course-title">
								<a href="<?php echo $course->guid ?>" target="_blank"><?php echo $course->post_title ?></a>
							</h3>
							<div class="course-info">
								<span class="info-university"></span>
								<span class="info-course-id"></span>
								<span class="info-date-block" data-tooltip="Hi">
								</span>
							</div>
							<div class="wrapper-course-actions">
								<div class="course-actions">
								<a href="" class="enter-course archived" data-course-key="">View Archived Course<span class="sr"><?php ?></span></a>				                
									<div class="wrapper-action-more" data-course-key="course-v1:MITx+11.126x_2+1T2016">
										<button type="button" class="action action-more" id="actions-dropdown-link-0" aria-haspopup="true" aria-expanded="false" aria-controls="actions-dropdown-0" data-course-number="11.126x_2" data-course-name="Introduction to Game Design" data-dashboard-index="0">
											<span class="sr">Course options for</span>
											<span class="sr">&nbsp;
												Introduction to Game Design
											</span>
											<span class="fa fa-cog" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</section>
					<footer class="wrapper-messages-primary">
						<ul class="messages-list">
							<div class="message message-related-programs is-shown">
								<span class="related-programs-preface" tabindex="0">Related Programs:</span>
								<ul>
									<li>
										<span class="category-icon xseries-icon" aria-hidden="true"></span>
										<span><a href="/dashboard/programs/35/edtechx-educational-technology"></a></span>
									</li>
								</ul>
							</div>
							<div class="message message-status course-status-processing is-shown">
								<p class="message-copy">Your final grade:
									<span class="grade-value">0%</span>.
								</p>
							</div>
						</ul>
					</footer>
				</article>
			</div>
		</li>
		<?php	
	endforeach;
	echo "</ul>";
}