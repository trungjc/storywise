<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div id="homeBanner" class="banner withbg" style="height:auto ">
		<div class="container">
			<div class="banner-inner" >
				<div id="bannerText">
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
					<hr style="margin: 20px 0;heigt:0;border:none;border-bottom:1px solid #858585" />
				</div>
				
				
			</div>
		</div>
	</div>
	<div id="primary" class="site-main">
		<div id="content" class="container" role="main">
		<?php get_sidebar(); ?>
<div class="category-layout">
		<?php if ( have_posts() ) : ?>
			
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
</div><!-- #content -->

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>
