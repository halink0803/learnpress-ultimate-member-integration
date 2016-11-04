<?php
/*
 * Plugin Name: LearnPress Ultimate Member Integration
 * Version: 1.0
 * Plugin URI: http://www.halink.space/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Ha Link
 * Author URI: http://www.halink.space/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: learnpress-ultimate-member-integration
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-learnpress-ultimate-member-integration.php' );
require_once( 'includes/class-learnpress-ultimate-member-integration-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-learnpress-ultimate-member-integration-admin-api.php' );
require_once( 'includes/lib/class-learnpress-ultimate-member-integration-post-type.php' );
require_once( 'includes/lib/class-learnpress-ultimate-member-integration-taxonomy.php' );

require_once( 'includes/profile-functions.php' );

/**
 * Returns the main instance of LearnPress_Ultimate_Member_Integration to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object LearnPress_Ultimate_Member_Integration
 */
function LearnPress_Ultimate_Member_Integration () {
	$instance = LearnPress_Ultimate_Member_Integration::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = LearnPress_Ultimate_Member_Integration_Settings::instance( $instance );
	}

	return $instance;
}

LearnPress_Ultimate_Member_Integration();