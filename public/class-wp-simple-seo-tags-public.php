<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://luke-morgan.com
 * @since      1.0.0
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/public
 * @author     Luke Morgan <morgan.luke94@gmail.com>
 */
class Wp_Simple_Seo_Tags_Public
{

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
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-simple-seo-tags-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-simple-seo-tags-public.js', array('jquery'), $this->version, true);
	}

	public function enable_plugins_title_tag_management()
	{
		add_theme_support('title-tag');
	}

	public function filter_document_title($title)
	{
		global $post;

		$page_seo_atts = get_post_meta($post->ID, 'post-seo-atts', false);

		if (isset($page_seo_atts[0]['post-html-page-title'])) {
			$title = $page_seo_atts[0]['post-html-page-title'];
		}

		return $title;
	}

	public function generate_meta_description()
	{
		global $post;
		$page_seo_atts = get_post_meta($post->ID, 'post-seo-atts', false);

		if (isset($page_seo_atts[0]['post-html-meta-description'])) { ?>
			<meta name="description" content="<?php echo $page_seo_atts[0]['post-html-meta-description']; ?>" />
		<?php
		} else { ?>
			<meta name="description" content="<?php echo bloginfo('description'); ?>" />
<?php
		}
	}

	public function filter_canonical_post_url($canonical_url)
	{
		global $post;

		$page_seo_atts = get_post_meta($post->ID, 'post-seo-atts', false);

		// let's only mutate the canonical url if the user has explicity set one.
		if (isset($page_seo_atts[0]['post-canonical-url'])) {
			$canonical_url = $page_seo_atts[0]['post-canonical-url'];
		} else {
			$canonical_url;
		}

		return $canonical_url;
	}

	public function filter_robots_directives($robots)
	{
		global $post;

		$page_seo_atts = get_post_meta($post->ID, 'post-seo-atts', false);

		// we only really want to touch this for pages where users have explicity deinfed some directives
		if (isset($page_seo_atts[0]['post-robots-directives']) && !empty($page_seo_atts[0]['post-robots-directives'])) {

			// let's clear any default generated directives
			$robots = array();

			// lets mutate the field value into an array we can work with
			$robots_atts = explode(',', $page_seo_atts[0]['post-robots-directives']);

			foreach ($robots_atts as $robot) {
				$robots[$robot] = true;
			}
		}

		return $robots;
	}
}
