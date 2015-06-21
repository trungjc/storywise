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
<div id="homeBanner" class="banner withbg" style="background:#b9dede;height:100px ">
		<div class="container">
			<div class="banner-inner" >
				<div id="bannerText">
					<h1 class="entry-title" style="display:none"><?php the_title(); ?></h1>
				</div>
				
				
			</div>
		</div>
	</div>
	<div id="primary" class="site-main" style="padding-bottom:0">
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
		<div class="help" >
		<div class="container center">
<h2>Have a project? We're here to help you create it</h2>
<a  class="button contact-trigger" href="#contact-form">Contact Us</a>
</div>
</div>
	</div><!-- #primary -->

<?php get_footer(); ?>