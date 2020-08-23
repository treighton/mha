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
					<p><?php esc_html_e('Made with ♥ in Franklin, CA', 'mha') ?></p>
				</div>
				<div class="footer__copyright">
					<p>&copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url('https://treightonmauldin.com') ?>"><?php esc_html_e('Treighton Mualdin', 'mha') ?></a></p>
				</div>
				<div class="footer__contact">
					<ul class="footer__social">
						<li class="footer__twitter">
							<a href="">
								<?php echo mha_svg_icon('twitter-white') ?>
							</a>
						</li>
						<li class="footer__insta">
							<a href="">
								<?php echo mha_svg_icon('instagram-white') ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	</body>
</html>
