<?php
/**
 * The template for displaying the footer.
 *
 * @package mha
 */

?>
	<div class="footer">
		<div class="wrapper">
			<div class="footer__content">
				<div class="footer__colophon">
					<p><?php esc_html_e( 'Made with ♥ in Franklin, CA', 'mha' ); ?></p>
				</div>
				<div class="footer__copyright">
					<?php
					printf(
						'<p>&copy; %s <a href="%s">%s</a></p>',
						esc_attr( gmdate( 'Y' ) ),
						esc_url( 'https://treightonmauldin.com' ),
						esc_html__( 'Treighton Mauldin' )
					);
					?>
				</div>
				<div class="footer__contact">
					<a href="mailto:treighton@gmail.com">
						treighton@gmail.com
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	</body>
</html>
