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
	<div id="primary" class="site-main">
		<div id="content" class="container" role="main">
<div id="freewall" class="free-wall">
		<?php if ( have_posts() ) : ?>
			
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (has_post_thumbnail($post->ID)) { ?>
			        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'full')); ?>
			        <?php
			        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
			       // $class ='has-bg';
			        $style = "width: 205px; height: 205px;background: url('" . $image[0] . "') no-repeat center center ; -webkit-background-size: cover; -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; "    ?>
			        <?php
			    } else {
			        $style = "width: 205px; height: 205px;";
			    }
			    ?>

				<div style="<?php echo $style ?>" class="cell play-c">
					<div class="mask-layer"><a class="play-icon"></a></div>
					<a rel="media-project" class="fancybox-media-project" href="<?php $key="link-video"; echo get_post_meta($post->ID, $key, true); ?>"></a>
					<div class="project-detail" style="display:none;color:white">
						<h2 style="color:white;margin:5px 0 5px 0;font-weight:400;text-transform:uppercase;  font-size: 16px;"><?php the_title(); ?></h2>
						<p style="color:white;">	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia sit, repellat assumenda excepturi minima debitis atque nulla quibusdam iste eligendi voluptas, obcaecati nihil necessitatibus vel illum itaque ea molestias vero!
						</p>
					</div>
				</div>	

			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
</div><!-- #content -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/freewall.js"></script>
<script type="text/javascript">
			jQuery.noConflict();
jQuery(document).ready(function(){
	jQuery('.fancybox-media-project').attr('rel', 'media-project')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',
					arrows : false,
					centerOnScroll: true,  
					autoDimensions: true,
					helpers : {
						media : {},
						buttons : {}
					},
					afterLoad : function() {
						console.log(this);				
						this.content = this.element.next('.project-detail').html();
						
					}
				});
				var wall = new freewall("#freewall");
				wall.reset({
					selector: '.cell',
					animate: true,
					cellW: 200,
					cellH: 200,
					onResize: function() {
						wall.refresh();
					}
				});
				wall.fitWidth();
				// for scroll bar appear;
				jQuery(window).trigger("resize");
			

})
			
			
		</script>
<?php get_footer(); ?>