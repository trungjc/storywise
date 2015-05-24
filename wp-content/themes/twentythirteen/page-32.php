<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div style="background: rgb(185, 222, 222) none repeat scroll center 0px;" class="banner withbg" id="homeBanner">
	<div class="container">
		<div class="banner-inner">
			<div class="package content"><br><br>
				<h2>Select Your Package</h2>
				<div class="clearfix your-package">
					<div data-value="BASIC" class="column active">
						<h2>BASIC</h2>
					</div>
					<div data-value="STANDARD" class="column">
						<h2>STANDARD</h2>
					</div>
					<div data-value="PRO" class="column">
						<h2>PRO</h2>
					</div>
					<div data-value="CUSTOM" class="column">
						<h2>CUSTOM</h2>
						
					</div>
				</div>
		
		
	</div>
			
		</div>
	</div>
</div>
	<div id="primary" class="site-main">
		<div id="content" class="container" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>