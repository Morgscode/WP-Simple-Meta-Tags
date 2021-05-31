<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://luke-morgan.com
 * @since      1.0.0
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/admin
 * @author     Luke Morgan <morgan.luke94@gmail.com>
 */
class Wp_Simple_Seo_Tags_Admin {

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
		$this->screens = get_post_types();
    $this->page_atts_field_keys = [
      'post-html-page-title',
      'post-html-meta-description',
      'post-canonical-url',
      'post-robots-directives',
			'post-social-media-image-url',
    ];
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
		 * defined in Wp_Simple_Seo_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Simple_Seo_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-simple-seo-tags-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wp_Simple_Seo_Tags_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Simple_Seo_Tags_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-simple-seo-tags-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function post_seo_atts_meta_boxes() 
  {
    foreach ( $this->screens as $screen ) {
      add_meta_box(
        'post-seo-atts',
        'SEO HTML Page Attributes',
        [$this, 'post_seo_metabox_html'],
        $screen,
      );
    }
  }

  public function update_post_seo_atts()
  {
    global $post;

		// lets check its the wp nonce for this function
    if( ! isset($_POST['post_seo_atts_meta_box_nonce'])) {
      return;
    }
		
		// lets verify the nonce against the current fucnction
    if( ! wp_verify_nonce( $_POST['post_seo_atts_meta_box_nonce'], 'update_post_seo_atts') ) {
      return;
    }

		// boiletplate stuff
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
      return;
    }
  
    if ( ! current_user_can('edit_post', $post->ID)) {
      return;
    }

		// lets define an array to store our values
    $post_seo_atts = array();

		// we've predefined our array keys for safety
    foreach ( $this->page_atts_field_keys as $key ) {
			// for another layer of security, let's only check for present values against the keys we've defined 
			if ( array_key_exists( $key, $_POST ) ) {
				// sanitize the value and mutate our empty array
				$post_seo_atts[$key] = sanitize_text_field($_POST[$key]);
			}	
    }

    // update the meta field value
    update_post_meta( $post->ID, 'post-seo-atts', $post_seo_atts );
	
  }
  
  public function post_seo_metabox_html() 
  {
		// lets grab the html in our admin display.
		require plugin_dir_path(__FILE__).'partials/wp-simple-seo-tags-admin-display.php';
  }

}
