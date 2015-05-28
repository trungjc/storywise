<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php
$args = array( 'post_type' => 'home-section', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
?>
<?php while ($loop->have_posts() ) : $loop->the_post()?>
    <?php if (has_post_thumbnail($post->ID)) { ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'full')); ?>
        <?php
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
        $class ='has-bg';
        $style = "background: url('" . $image[0] . "') no-repeat center center fixed; background-attachment: fixed; -webkit-background-size: cover; -moz-background-size: cover;  -o-background-size: cover;  background-size: cover; "    ?>
        <?php
    } else {
        $style = "";
    }
    ?>
     <?php
        if ($post->ID == 45) { ?>
        <div style="<?php  echo $style ?>" class="banner" id="homeBanner">
			<div class="container">
				<div class="banner-inner">
				<div id="bannerText" class="scrolling">
					 <?php the_content(); ?>
					<p></p><center>

					<a href="<?php $key="link-video"; echo get_post_meta($post->ID, $key, true); ?>" class="fancybox-media-project play op "></a></center>
					<br>
					
				<p></p>
				</div>
				</div>
			</div>
		</div>


        <?php 
    	}
        else {
    ?>

    <div id="<?php echo the_slug(); ?>" class="section <?php echo $class ;?> "  >
        <div class="<?php echo the_slug(); ?>-inner">
            <div class="content">
                <?php the_content(); ?>
            </div>
            
        </div> <!--.story-->
    </div> <!--#intro-->


    <?php
}
endwhile;
?>	
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jcarousel.responsive.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jcarousel.responsive.js"></script>

<?php get_footer(); ?>
