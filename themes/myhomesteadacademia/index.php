<?php
/**
 * The main template file
 *
 * @package mha
 */

$menu = wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'echo' => false,
	)
);

get_header(); ?>
	<div class="hero">
		<div class="wrapper">
			<div class="hero__title">
				<h1><?php esc_html_e( 'My Homestead Academia', 'mha' ); ?></h1>
			</div>
			<div class="hero__nav">
				<nav>
					<?php echo wp_kses_post( $menu ); ?>
				</nav>
			</div>
		</div>
	</div>
	<div class="main-content">
		<div class="wrapper">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article itemscope itemtype="https://schema.org/BlogPosting" class="article-card">

						<?php if ( has_post_thumbnail() ) : ?>

							<?php
								display_schema_image( get_post_thumbnail_id(), 'thumbnail', array( 'class' => 'card__header' ) )
							?>
						<?php endif; ?>

						<div class="card__meta">
							<?php display_schema_properties(); ?>
						</div>
						<div class="card__content">
							<h2 itemprop="headline"><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
							<div class="excerpt" itemprop="description">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

<?php
get_footer();
