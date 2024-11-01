<?php
/**
 * Admin View: Custom Notices
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<style type="text/css">button.notice-dismiss {display: none;}</style>
<div class="notice notice-info is-dismissible notice-dismiss" style="padding:20px !important;">
	<p>
		Hello,<br/>
Thank you for installing WP Nearby Places Basic Version. Please help spread the news about our plugin by leaving a review on WordPress.org. Also, submit your site using WP Nearby Places for a chance to win a prize. Drawings are monthly. If you have any questions or suggestions, please contact us.<br/>
- The WP Nearby Places Plugin Team
	</p><br/>
	<a href="https://wordpress.org/plugins/wp-nearby-places-basic/#reviews">Leave a Review</a><br/>
	<a href="https://wpnearbyplaces.com/submit-your-site-and-win-a-prize/">Submit your Site and Win a Prize</a><br/>
	<a href="https://wpnearbyplaces.com/support/">Contact Us</a><br/>
	<a href="https://members.wpnearbyplaces.com/product/wp-nearby-places-premium/">Upgrade to Premium</a><br/>
	<a class="notice-dismiss" style="text-decoration: none;min-width: 60px;display: inline-flex;" href="<?php echo esc_url( add_query_arg( 'my-acf-notice-dismissed', 'Yes' )); ?>">Remind me in 30 days</a>
	<a class="notice-dismiss" style="text-decoration: none;min-width: 60px;display: inline-flex;" href="<?php echo esc_url( add_query_arg( 'my-acf-notice-dismissed', 'Yes' )); ?>">Never show again</a>
</div>