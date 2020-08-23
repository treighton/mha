<?php
/**
 * The template for displaying the header.
 *
 * @package mha
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<header role="banner" class="header">
			<div class="wrapper">
				<div class="header__logo">
					<a href="<?php echo esc_url( get_site_url() ) ?>"><?php echo mha_svg_icon( 'MHA_Logo-1.5' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
				</div>
			</div>
		</header>
