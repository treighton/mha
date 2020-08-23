<?php
/**
 * The main template file
 *
 * @package mha
 */

global $post;
$author_id = $post->post_author;

$menu = wp_nav_menu( array(
	'theme_location' => 'primary',
	'echo' => false
) );

$term_list = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'all' ) );

$author = get_the_author_meta('user_firstname', $author_id);

$post_date = get_the_date( 'l F j, Y' );

get_header();

?>
	<div class="hero">
		<div class="wrapper">
			<div class="hero__title">
				<h1><?php the_title() ?></h1>
			</div>
			<div class="hero__nav">
				<ul class="aligncenter">
					<li class="post-author">
						by: <?php echo $author  ?>
					</li>
					<li class="post-date">
						 <?php echo $post_date; ?>
					</li>
					<?php foreach($term_list as $cat): ?>
						<li>
							<a href="<?php echo esc_url( get_term_link( $cat ) )  ?>">
								<?php echo $cat->name ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="main-content">

		<div class="wrapper">


			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article itemscope itemtype="<?php echo esc_url( 'https://schema.org/BlogPosting' ); ?>">

						<div  itemprop="mainEntityOfPage">

							<div itemprop="articleBody">

								<?php the_content(); ?>

							</div>

						</div>

					</article>

				<?php endwhile; ?>

			<?php endif; ?>


		</div>
	</div>
<?php
get_footer();
