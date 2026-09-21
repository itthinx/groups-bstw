<?php
/**
 * groups-bstw.php
 *
 * This code is released under the GNU General Public License.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 * @package groups-bstw
 * @since groups-bstw 1.0.0
 *
 * Plugin Name: Groups - Black Studio TinyMCE Widget
 * Plugin URI: https://www.itthinx.com/
 * Description: Adds shortcode validation support for the Black Studio TinyMCE Widget.
 * Version: 1.0.0
 * Requires at least: 6.7
 * Requires PHP: 7.4
 * Author: itthinx
 * Author URI: https://www.itthinx.com
 * Donate-Link: https://www.itthinx.com/shop/
 * License: GPLv3
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class Groups_BSTW {

	public static function boot() {
		add_action( 'groups_shortcodes_widget_display_callback_widget_content', array( __CLASS__, 'groups_shortcodes_widget_display_callback_widget_content' ), 10, 4 );
	}

	public static function groups_shortcodes_widget_display_callback_widget_content( $content, $instance, $widget, $args ) {
		if (
			class_exists( 'WP_Widget_Black_Studio_TinyMCE' ) &&
			$widget instanceof WP_Widget_Black_Studio_TinyMCE
		) {
			if ( isset( $instance['text'] ) && is_string( $instance['text'] ) ) {
				$content = $instance['text'];
			}
		}
		return $content;
	}
}

Groups_BSTW::boot();
