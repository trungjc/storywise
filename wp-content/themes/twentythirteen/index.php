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

get_header();  ?>

<?php
$args = array( 'post_type' => 'home-section', 'posts_per_page' => -1 ,'orderby'=> 'date','order'=>'asc');
$loop = new WP_Query( $args );
?>
<?php while ($loop->have_posts() ) : $loop->the_post()?>
    <?php if (has_post_thumbnail($post->ID)) { ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID, 'full')); ?>
        <?php
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
        $class ='has-bg';
        $style = "background-image: url('" . $image[0] . "') ;position:relative"    ?>
        <?php
    } else {
        $style = "";
    }
    ?>
     <?php
        if ($post->ID == 45) { ?>
        <div style="<?php $style ?>" class="banner" id="homeBanner">
            <img style="position:absolute;width:100%;height:auto;z-index:1" src="<?php echo $image[0] ?>" / >
			<div class="container">
				<div class="banner-inner" style="position:relative;z-index:2">
                <div class="video-mobile" style="display:none">
                    <?php $key="video-mobile"; echo get_post_meta($post->ID, $key, true); ?>
                </div>
				<div id="bannerText" class="scrolling">
					 <?php the_content(); ?>
					<center>
                   <a href="<?php $key="link-video"; echo get_post_meta($post->ID, $key, true); ?>" class="fancybox-media-project play op "></a></center>
                                    
					
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

<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
    <script type="text/javascript" >

    jQuery('.featured-post-slider').slick({
        speed: 500,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: false,
        autoplay: true,
            autoplaySpeed: 3000,
        adaptiveHeight: true,
        responsive : [
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
              }
            },
            {
              breakpoint: 479,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
              }
            }
        ]
    });
    </script> -->
  
<?php get_footer(); ?>
