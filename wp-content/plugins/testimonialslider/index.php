<?php
/*
Plugin Name: Testimonials Slider 
Plugin URI: http://www.NtechCorporate.com
Description: Best Responsive Testimonials slider. Manage and display testimonials for your blog, product or service.
Author: ntech-technologies
Author URI: http://www.NtechCorporate.com/
Version: 2.9.5
*/

function testimonials_init() {
    $args = array(
        'public' => true,
        'label' => 'Testimonials',
        'supports' => array(
            'title',
            'editor',
			'thumbnail'
        )
    );
    register_post_type('testimonials', $args);
}
 
add_action('init', 'testimonials_init');

include_once "inc/settings.php";


function ts_link_function($post) {
	//retrieve the meta data value if it exists
	$ts_link = get_post_meta( $post->ID, '_link', true );?>
	<input type="text" name="link" id="link" value="<?php echo esc_url($ts_link);?>" size="60" />
    <?php 
    return true;
}
 
add_action( 'add_meta_boxes', 'ts_link_create' );

function ts_link_create() {

	//create a custom meta box
	add_meta_box( 'ts-link-meta', 'Website Link', 'ts_link_function', 'testimonials', 'normal', 'high' );
	
}
//hook to save the meta box data
add_action( 'save_post', 'ts_link_save_meta' );

function ts_link_save_meta( $post_id ) {
	//verify the meta data is set
	if ( isset( $_POST['link'] ) ) {
	
		//save the meta data
		update_post_meta( $post_id, '_link', $_POST['link']);

	}
}
// Adding the Slide.js script and our script
function testimonials_register_scripts() {
    // Only add these script if we are not in the admin dashboard
    // Registering scripts		
	//wp_register_script('testimonials_slide_js', plugins_url('/js/jquery.bxslider.min.js', __FILE__), array('jquery') );	
	// Enqueing scripts	
	//wp_enqueue_script('testimonials_slide_js');
}
 
add_action('wp_print_scripts', 'testimonials_register_scripts');


// Adding the Slide.js script and our script
function testimonials_register_styles() {
    // Only add these script if we are not in the admin dashboard
	
	// Enqueing style
	wp_register_style('testimonials_bxslider_css', plugins_url('/css/jquery.bxslider.css', __FILE__));		
	wp_enqueue_style( 'testimonials_bxslider_css' );
}
 
add_action('wp_print_styles', 'testimonials_register_styles');

// Displaying the testimonials
function display_testimonial_slider($atts) {
 	$a = shortcode_atts( array(
        'type' => '',
    ), $atts );
	$data =  get_option( 'my_option_name' );
    // We only want posts of the testimonials type
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1
    );
	if($a['type']!="full")
	{
	?>
    <script type="text/javascript">
 	jQuery(document).ready(function() {
	
		
	});
	</script>
    <?php
	}
    // We create our html in the result variable
	$class = "testimonials-slider";
	if($a['type']=="full")
	{
		$class = "testimonials-slider-full";
	}
	
    $result ='<ul class="tslider '.$class.'">';
 
    $the_query = new WP_Query($args);
 
    // Creating a new side loop
    while ( $the_query->have_posts() ) : $the_query->the_post();
 
        $client_name_value =get_post_meta(get_the_ID(), 'Client Name', true);
		$link_value = get_post_meta(get_the_ID(), '_link', true);
 		$url =wp_get_attachment_thumb_url( get_post_thumbnail_id(@$post->ID) );
        $result .='<li>'; // Start Slide
 
		$result .='<div class="cbp-qtcontent">'; // Start Slide
 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		  $result .= '<img  src="'.$url.'" />';
		}
		$result .= '<blockquote>';
		$result .= '<p>'.apply_filters('the_content',get_the_content()).'</p>';
					// Displaying the author of the testimonial and also creating a link if the Link custom field is provided
        if ($link_value != '') {
           $result .= '<footer><a href="http://'.$link_value.'" >'.get_the_title().'</a></footer>';
        }
        else {
            $result .= '<footer>'.get_the_title().'</footer>';
		}
		$result .= '</blockquote>';
        $result .='</div>'; // End Slide
 
        $result .='</li>'; // End Slide
 
    endwhile;
   $result .= '</ul>';
 
    return $result;
}

// Adding shortcode
add_shortcode('show_testimonials', 'display_testimonial_slider');
 
?>