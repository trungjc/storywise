<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Testimonials"
		add_submenu_page(
			'edit.php?post_type=testimonials', 
			'settings', 
			'Settings', 
			'manage_options', 
			'testimonials_settings', array( $this, 'create_testimonials_settings_page' ));
    }

    /**
     * Options page callback
     */
    public function create_testimonials_settings_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <?php echo screen_icon(); ?>
            <h2>Testimonials Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );   
                do_settings_sections( 'testimonials_settings' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            '', // Title
            array( $this, 'print_section_info' ), // Callback
            'testimonials_settings' // Page
        );  

        add_settings_field(
            'mode', // ID
            'Mode', // Title 
            array( $this, 'mode_callback' ), // Callback
            'testimonials_settings', // Page
            'setting_section_id' // Section           
        );  
		
		add_settings_field(
            'speed', // ID
            'Speed', // Title 
            array( $this, 'speed_callback' ), // Callback
            'testimonials_settings', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'controls', 
            'Controls', 
            array( $this, 'controls_callback' ), 
            'testimonials_settings', 
            'setting_section_id'
        );    
		add_settings_field(
            'pager', 
            'Pager', 
            array( $this, 'pager_callback' ), 
            'testimonials_settings', 
            'setting_section_id'
        );  
		add_settings_field(
            'randomstart', 
            'Random Start', 
            array( $this, 'randomstart_callback' ), 
            'testimonials_settings', 
            'setting_section_id'
        );    
		
		add_settings_field(
            'auto', 
            'Auto', 
            array( $this, 'auto_callback' ), 
            'testimonials_settings', 
            'setting_section_id',
			'true'
        );     
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['mode'] ) )
            $new_input['mode'] = sanitize_text_field( $input['mode'] );

        if( isset( $input['speed'] ) )
            $new_input['speed'] = sanitize_text_field( $input['speed'] );
			
		if( isset( $input['controls'] ) )
            $new_input['controls'] = sanitize_text_field( $input['controls'] );
		else
			$new_input['controls'] = 'false';	
		
		if( isset( $input['pager'] ) )
            $new_input['pager'] = sanitize_text_field( $input['pager'] );
		else
			$new_input['pager'] = 'false';	
			
		if( isset( $input['randomstart'] ) )
            $new_input['randomstart'] = sanitize_text_field( $input['randomstart'] );
		else
			$new_input['randomstart'] = 'false';
			
		if( isset( $input['auto'] ) )
            $new_input['auto'] = sanitize_text_field( $input['auto'] );
		else
			$new_input['auto'] = 'false';			

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function mode_callback()
    {
     
		$html = '<select id="mode" name="my_option_name[mode]">';
			$html .= '<option value="horizontal"' . selected( $this->options['mode'], 'horizontal', false) . '>Horizontal</option>';
			$html .= '<option value="vertical"' . selected( $this->options['mode'], 'vertical', false) . '>Vertical</option>';
			$html .= '<option value="fade"' . selected( $this->options['mode'], 'fade', false) . '>Fade</option>';
		$html .= '</select>';
		$html .= '<p class="description">Type of transition between slides</p>';
		 
		echo $html;
    }
	
	/** 
     * Get the settings option array and print one of its values
     */
    public function speed_callback()
    {
		
        $speed = (isset($this->options['speed']) and (!empty($this->options['speed']))) ? esc_attr( $this->options['speed']) : "500";
		$html = '<input type="text" id="speed" name="my_option_name[speed]" value="'.$speed.'"  />';
		$html .= '<p class="description">Slide transition duration (in ms) (default:500)</p>';
		 
		echo $html;
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function controls_callback()
    {
        $html = '<input type="checkbox" id="controls" name="my_option_name[controls]" value="true" '.checked( $this->options['controls'], 'true', false).'   />';
        $html .= '<p class="description">If true, "Next" / "Prev" controls will be added</p>';
		
		echo $html;
    }
	
	 /** 
     * Get the settings option array and print one of its values
     */
    public function pager_callback()
    {
        $html = '<input type="checkbox" id="pager" name="my_option_name[pager]" value="true" '.checked( $this->options['pager'], 'true', false).'   />';
        $html .= '<p class="description">If true, a pager will be added</p>';
		
		echo $html;
    }
	
	 public function randomstart_callback()
    {
        $html = '<input type="checkbox" id="randomstart" name="my_option_name[randomstart]" value="true" '.checked( $this->options['randomstart'], 'true', false).'   />';
        $html .= '<p class="description">Start Slider on a Random Slide</p>';
		
		echo $html;
    }
	 public function auto_callback($arg)
    {
		$auto = isset($this->options['auto']) ? $this->options['auto'] : "true";
        $html = '<input type="checkbox" id="auto" name="my_option_name[auto]" value="true" '.checked($auto , 'true', false).'   />';
        $html .= '<p class="description">Slides will automatically transition</p>';
		
		echo $html;
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();