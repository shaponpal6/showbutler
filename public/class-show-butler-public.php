<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/shapon-pal/
 * @since      1.0.0
 *
 * @package    Show_Butler
 * @subpackage Show_Butler/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Show_Butler
 * @subpackage Show_Butler/public
 * @author     Shapon pal <mrassistant247@gmail.com>
 */
class Show_Butler_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/show-butler-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/show-butler-public.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function async_enqueue_scripts() {

		//echo '<script src="'.plugin_dir_url( __FILE__ ) . 'js/show-butler-public.js'.'"/>';

		?>
<script>
(function($) {
    "use strict";

    $(document).ready(function() {
        // Hide Event Handeller
        let hideEventTrigger = (id) => {
            const target = $("#" + id);
            // const accessTime = target.data('accessTime');
            const currentTime = target.data("currentTime");
            const hideTime = target.data("hideTime");
            const diff = hideTime - currentTime;

            $("#" + id)
                .fadeIn()
                .delay(diff * 1000)
                .queue(function(next) {
                    $("#" + id).hide();
                    $("#" + id).hide("slow", function() {
                        // console.log(id, "a>>>Animation complete. hhhhhhhhhhhh");
                    });
                });
        };

        // Show event Handeller
        let showEventHandeler = (id, diff) => {
            setTimeout(() => {
                $("#" + id).show("slow", function() {
                    hideEventTrigger(id);
                });
            }, diff * 1000);
        };

        // Hide Event Handeller
        let eventHandeler = (id, diff) => {
            $("#" + id)
                .fadeIn()
                .delay(diff * 1000)
                .queue(function(next) {
                    $("#" + id).hide();
                    $("#" + id).hide("slow", function() {
                        // console.log(id, "Animation complete. hhhhhhhhhhhh");
                    });
                });
        };

        // All Events Triggers
        $(".showButlerEventHandeler").each(function() {
            const id = $(this).attr("id");
            const accessTime = $(this).data("accessTime");
            const currentTime = $(this).data("currentTime");
            const hideTime = $(this).data("hideTime");
            const diff = accessTime - currentTime;
            if (accessTime <= currentTime && currentTime <= hideTime) {
                eventHandeler(id, hideTime - currentTime);
            } else {
                showEventHandeler(id, accessTime - currentTime);
            }
        });
    });
})(jQuery);
</script>
<?php
	}




}