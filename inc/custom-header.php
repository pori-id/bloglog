<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @package Minimal Grid
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses minimal_grid_header_style()
 */
function minimal_grid_custom_header_setup() {

	add_theme_support( 'custom-header', array(
		'default-text-color'     => '000000',
		'wp-head-callback'       => 'minimal_grid_header_style',
	) );

}
add_action( 'after_setup_theme', 'minimal_grid_custom_header_setup' );

if ( ! function_exists( 'minimal_grid_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see minimal_grid_custom_header_setup().
 */
function minimal_grid_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // minimal_grid_header_style