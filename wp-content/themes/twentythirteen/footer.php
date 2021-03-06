<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		
	
		<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="clearfix footer-inner ">
				<div class="left-footer pull-left">
				<?php get_sidebar( 'main' ); ?>
				<?php echo wpfai_social(); ?>	
				</div>
				
			</div>
		</div>
	</footer> 
	<?php wp_footer(); ?>
	
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/theme_trust.js"></script>
</body>
</html>