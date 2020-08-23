<?php
/**
 * Custom template tags for this theme.
 *
 * This file is for custom template tags only and it should not contain
 * functions that will be used for filtering or adding an action.
 *
 * All functions should be prefixed with mha in order to prevent
 * pollution of the global namespace and potential conflicts with functions
 * from plugins.
 * Example: `mha_function()`
 *
 * @package mha\Template_Tags
 *
 */

// phpcs:ignoreFile


/**
 * An svg template helper.
 *
 * @param  string  $name The SVG Name.
 * @param  boolean $echo Either return or echo the SVG Icon string.
 * @return html
 */
function mha_svg_icon( $name, $echo = false ) {
	$file_path = MHA_PATH . 'dist/svg/' . $name . '.svg';

	if ( ! file_exists( $file_path ) ) {
		return $file_path;
	}

	$svg_icon = file_get_contents( $file_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( $echo ) {
		echo wp_kses(
			$svg_icon,
			[
				'svg'     => [
					'version'           => true,
					'class'             => true,
					'fill'              => true,
					'height'            => true,
					'xml:space'         => true,
					'xmlns'             => true,
					'xmlns:xlink'       => true,
					'viewbox'           => true,
					'enable-background' => true,
					'width'             => true,
					'x'                 => true,
					'y'                 => true,
				],
				'path'    => [
					'clip-rule'    => true,
					'd'            => true,
					'fill'         => true,
					'fill-rule'    => true,
					'stroke'       => true,
					'stroke-width' => true,
				],
				'g'       => [
					'clip-rule'    => true,
					'd'            => true,
					'transform'    => true,
					'fill'         => true,
					'fill-rule'    => true,
					'stroke'       => true,
					'stroke-width' => true,
				],
				'polygon' => [
					'clip-rule'    => true,
					'd'            => true,
					'fill'         => true,
					'fill-rule'    => true,
					'stroke'       => true,
					'stroke-width' => true,
					'points'       => true,
				],
				'circle'  => [
					'clip-rule'    => true,
					'd'            => true,
					'fill'         => true,
					'fill-rule'    => true,
					'stroke'       => true,
					'stroke-width' => true,
					'cx'           => true,
					'cy'           => true,
					'r'            => true,
				],
			]
		);
		return;
	}

	return $svg_icon;
}

/**
 * Add Schema.org Image properties for Featured Image
 *
 * @param $attachment_id
 * @param $img_size
 * @param $attrs
 */
function display_schema_image( $attachment_id, $img_size = 'rwd-rect-xlg', $attrs ) {
	$meta   = wp_get_attachment_image_src( $attachment_id, $img_size );
	$img    = ! empty( $meta[0] ) ? $meta[0] : get_the_post_thumbnail_url( $img_size );
	$width  = ! empty( $meta[1] ) ? $meta[1] : '1600';
	$height = ! empty( $meta[2] ) ? $meta[2] : '900';
	?>
	<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
		<?php echo wp_get_attachment_image( $attachment_id, $img_size, false, $attrs ); ?>
		<meta itemprop="url" content="<?php echo esc_url( $img ); ?>" />
		<meta itemprop="width" content="<?php echo esc_attr( $width ); ?>" />
		<meta itemprop="height" content="<?php echo esc_attr( $height ); ?>" />
	</div>
	<?php
}


/**
 * Display Schema.org Properties for datePublished, dateModified, publisher, author
 */
function display_schema_properties() {
	?>
	<time itemprop="datePublished" content="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>" pubdate></time>
	<time itemprop="dateModified" content="<?php echo esc_attr( get_the_modified_time( 'Y-m-d' ) ); ?>" datetime="<?php echo esc_attr( get_the_modified_time( 'Y-m-d' ) ); ?>" pubdate></time>
	<div itemprop="publisher" itemscope="itemscope" itemtype="https://schema.org/Organization">
		<meta itemprop="name" content="<?php esc_attr_e( 'My Homestead Academia', 'mha' ); ?>" />
	</div><!--/.itemprop=publisher-->
	<meta itemprop="author" content="<?php esc_attr_e( get_the_author(), 'mha' ); ?>"/>
	<?php
}
