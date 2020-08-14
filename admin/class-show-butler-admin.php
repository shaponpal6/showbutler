<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/shapon-pal/
 * @since      1.0.0
 *
 * @package    Show_Butler
 * @subpackage Show_Butler/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Show_Butler
 * @subpackage Show_Butler/admin
 * @author     Shapon pal <mrassistant247@gmail.com>
 */
class Show_Butler_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Show_Butler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Show_Butler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/show-butler-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Show_Butler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Show_Butler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/show-butler-admin.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function register_shortcodes() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Show_Butler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Show_Butler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_shortcode('showbutler', array($this, 'showbutler_function'));
	}

	/**
	 * Execute shortcode
	 *
	 * @since    1.0.0
	 */
	public function showbutler_function($atts, $content = null) {

		/**
		 *Show Button
		 *[showbutler type="show" show_date="15 August 2020" show_time="01:34:00" hide_date="15 August 2020" hide_time="01:55:00"]
		 *<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
		 *[/showbutler]


		 *Hide Button

		 *[showbutler type="hide" hide_date="15 August 2020" hide_time="01:55:00"]
		 *<a href="" class="showbutler-btn" style="width:100px;background:#444;">Join Metting</a>
		 *[/showbutler]
		 */
		// Check and return
		if(!$content || $content === "" ) return '';

		extract(shortcode_atts(array(
			'type' => 'show',
			'show_date' => '',
			'show_time' => '00:00:00',
			'hide_date' => '',
			'hide_time' => '00:00:00',
		 ), $atts));

		 // Hide on time
		 if($atts['type'] === "hide"){
			// Show on time
			return $this->showbutler_hide($atts, $content);
		}

		
		 if($atts['show_date'] === "" ) return '';
		 $accessTime = $this->make_shortcodes_timestamp($atts['show_date'], $atts['show_time']);
		 if(!$accessTime) return '';

		 // Disable button when Time is over minimum 1 seconds.
		if($atts['type'] === "show" && ((int)current_time('timestamp') - (int) $accessTime) >= 0){
			// Show on time
			return $this->showbutler_hide($atts, $content);
		}

		return "";

	}


	/**
	 * Hide button on hide time
	 *
	 * @since    1.0.0
	 */
	public function showbutler_hide($atts, $content = null) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Show_Butler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Show_Butler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		extract(shortcode_atts(array(
			'type' => 'show',
			'show_date' => '',
			'show_time' => '00:00:00',
			'hide_date' => '',
			'hide_time' => '00:00:00',
		 ), $atts));
		
		 if($atts['hide_date'] === "" ) return $content;
		 $accessTime = $this->make_shortcodes_timestamp($atts['hide_date'], $atts['hide_time']);
		 if(!$accessTime) return $content;
		

		 // Disable button when Time is over minimum 1 seconds.
		if( ((int) $accessTime -(int) current_time('timestamp')) >= 0){
			return $content;
		} 

		return "";

	}
 
		/**
	 * Create shortcode time with validation
	 *
	 * @since    1.0.0
	 */
	public function make_shortcodes_timestamp($date, $time='00:00:00') {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Show_Butler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Show_Butler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 // Month Array
		 $months = array(
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July ',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',
		);

		try{
			$date = trim($date);

			// Check time
			if($date !== "" && preg_match("/^[0-9]{2} \w+ [0-9]{4}$/", $date)){
				$time = ($time !== "") ? $time : '00:00:00';
				$pieces = explode(" ", $date);
				$key = array_search(trim($pieces[1]), $months);
				
				// Check Month
				if(!!$key && 1 <= $key && $key <= 12){ 
					$dateString = "{$pieces[0]} {$pieces[1]} {$pieces[2]} {$time}";
					return strtotime($dateString);
				}
			}
		}catch(Exception $e){

		}
		return null;

	}


}
