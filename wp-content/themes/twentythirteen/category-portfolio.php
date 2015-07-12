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
	<div class="mediaContainer row"><iframe style="display:none" width="100%" height="450" src="" class="inlineMedia"></iframe><div class="inner"></div></div>
<div id="freewalls" class="free-walls clearfix">
		<?php if ( have_posts() ) : ?>
			
			<?php /* The loop */ ?>
			<?php $i = 1; echo "<div class='row'>"; while ( have_posts() ) : the_post(); ?>
				<?php if (has_post_thumbnail($post->ID)) { ?>
			        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'full')); ?>
			        <?php
			        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
			       // $class ='has-bg';
			        $style = "background: url('" . $image[0] . "') no-repeat center center ; -webkit-background-size: cover; -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; "    ?>
			        <?php
			    } else {
			             $style = "background: url('" .  get_template_directory_uri() . "/images/no-image-available.jpg') no-repeat center center ; -webkit-background-size: cover; -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; ";
			
			    }
			    ?>
			   			<?php $media="media"; $media_data= get_post_meta($post->ID,$media, true); ?>
	            		<?php $designer="designer"; $designer_data= get_post_meta($post->ID,$designer, true); ?>
	            		<?php $target="target-audience"; $target_data= get_post_meta($post->ID,$target, true); ?>
	            		<?php $package="package"; $package_data= get_post_meta($post->ID,$package, true); ?>
	            		<?php $duration="duaration"; $duration_data= get_post_meta($post->ID,$duration, true); ?>
	            		<?php $delivery="delivery-time"; $delivery_data= get_post_meta($post->ID,$delivery, true); ?>
	            		<?php $avatar="avatar"; $avatar_data= get_post_meta($post->ID,$avatar, true); ?>
	            		
				<div style="<?php echo $style ?>" class="play-c">
					<div class="mask-layer">
						<a  class="mediaSource detail-icon" href="<?php $key="link-video"; echo get_post_meta($post->ID, $key, true); ?>"></a>
					
						<div class="project-detail" >
							<h2 style="margin:5px 0px 5px;color:white;font-weight:400;text-transform:uppercase;  " class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="desc" style="color:white"><?php the_excerpt( ); ?></div>
						</div>
						<div class="project-more">
							<?php if($designer_data != null) { ?>
							<div class="name">
							<h3><i>Designer</i></h3>
							<?php echo $designer_data; ?></div>
							<?php } ?>
							<?php if($target_data != null) { ?>
							<div class="target">
							<h3><i>Target audience</i></h3>
							<?php echo $target_data; ?></div>
							<?php } ?>
							<?php if($media_data != null) { ?>
							<div class="media">
							<h3><i>Media</i></h3>
							<?php echo $media_data; ?></div>
							<?php } ?>
						</div>
						<div class="content-post" style="display: none">
							<h2 style="margin:30px 0 15px"><a style="text-transform:upppercase;"><?php the_title(); ?></a></h2>
							<div class="clearfix row">
								<div class="col-30">
									<?php if($designer_data != null) { ?>
									<div class="name">
									<h3><i>Designer</i></h3>
									<?php echo $designer_data; ?>
									</div>
									<?php } ?>
									<?php if($avatar_data != null) { ?>
									<div class="clearfix">
										<div class="pull-right">
											<img src="<?php echo $avatar_data; ?>" />
										</div>									
									</div>
									<?php } else {?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/avatar-default.png" />
									<?php }?>
								</div>
								<div class="col-30">									
									<?php the_content(); ?>
									<?php echo wpfai_social(); ?>
								</div>
								<div class="col-30">
									<?php if($target_data != null) { ?>

										<div class="target">
										<h3><i>target audience</i></h3>
										<?php echo $target_data; ?></div>
										<?php } ?>
										<?php if($media_data != null) { ?>
										<div class="media">
										<h3><i>media</i></h3>
										<?php echo $media_data; ?></div>
										<?php } ?>
										<?php if($package_data != null) { ?>
										<div class="packages">
										<h3><i>package</i></h3>
										<?php echo $package_data; ?></div>
										<?php } ?>

										<?php if($duration_data != null) { ?>
										<div class="duration">
										<h3><i>duration</i></h3>
										<?php echo $duration_data; ?></div>
										<?php } ?>

										<?php if($delivery_data != null) { ?>
										<div class="Delivery">
										<h3><i>Delivery time</i></h3>
										<?php echo $delivery_data; ?></div>
										<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>	
 <?php if($i % 3 == 0) {echo '</div><div class="row">';} $i++; ?>
			<?php endwhile; ?>
			<?php echo '</div>'; ?>
			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
</div><!-- #content -->
		</div><!-- #content -->
	</div><!-- #primary -->
<script type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function(){

			jQuery('.mediaSource').on('click', function(e) {
					var $source = jQuery(e.target);
					console.log($source[0]);
					var mediaHelper = jQuery.fancybox.helpers.media;
					mediaHelper.beforeLoad(mediaHelper.defaults, $source[0]);
					var tem=jQuery(this).parents('.row');
					var masklayer=jQuery(this).parents('.mask-layer').find('.content-post').html();
					
					jQuery('.mediaContainer .inner *').remove();
					//tem.before('<div class="mediaContainer row"></div>');

					if(jQuery(this).attr('href') !='') {
						//var ifr = "<iframe width='100%' height='450' class='inlineMedia' src='" + e.target.href + "'></iframe>";
						jQuery('.mediaContainer').find('.inlineMedia').css('display','block').attr('src',e.target.href);
						jQuery('.mediaContainer .inner').append(masklayer);
						jQuery('.full-content').removeClass('active');
						jQuery('html, body').animate({
        						scrollTop: jQuery(".mediaContainer").offset().top - 150
    					}, 2000,function(){
    						
    					});
						
						
						   

					}else {
						jQuery('.mediaContainer').html('<h1 style="text-align:center;padding:20px">no video</h1>').append(masklayer);
						jQuery('html, body').animate({
        						scrollTop: jQuery(".mediaContainer").offset().top - 150
    					}, 2000);
					}
					jQuery('.readmore').on('click', function(event) {
						event.stopPropagation();
						jQuery('.full-content').toggleClass('active');	
						//jQuery('.full-content').addClass('active');	
					});
				
					return false;
				});
			


})
		
			
		</script>
<?php get_footer(); ?>
