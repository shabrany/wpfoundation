<?php


class FoundationTheme
{
	public $name = 'wpfoundation';

	private $styles = array();

	private $scripts = array();

	private $locations = array();

	private $sidebars = array();

	private $theme_uri = '';

	private $excerptLength = 0;

	public function __construct() {
		$this->theme_uri = get_template_directory_uri() . '/';
	}

	/**
	 * Start wordpress theme
	 *
	 */
	public function init() {
		// Register all defined nav locations
		add_action('init', array($this, 'register_menus'));

		// Register all defined scripts
		add_action('wp_enqueue_scripts', array($this, 'register_scripts'));

		// Register all defined scripts
		add_action('wp_enqueue_scripts', array($this, 'register_styles'));

		// Register all defined sidebars
		add_action('widgets_init', array($this, 'register_sidebars'));

		add_theme_support('post-thumbnails');
		add_image_size('masonry-size', 360, 360, ['center', 'center']);
		add_image_size('single-post', 1024, 450, true);

		$this->register_excerpt_length();
	}

	/**
	 * Register menus that are collected in Locations
	 */
	public function register_menus() {
		register_nav_menus($this->locations);
	}

	/**
	 * Add a javascript file
	 *
	 * @param string $handle
	 * @param string $src
	 * @param array $deps
	 * @param boolean $ver
	 */
	public function add_script($handle, $src, $deps = array(), $ver = false) {
		$this->scripts[$handle] = array(
			'src' => $src,
			'deps' => $deps,
			'ver' => $ver
		);
	}

	/**
	 * Add a css file
	 *
	 * @param string $handle
	 * @param string $src
	 */
	public function add_style($handle, $src) {
		$this->styles[$handle] = $src;
	}

	/**
	 * Register all css files
	 */
	public function register_styles() {
		foreach ($this->styles as $key => $src) {
			$source = $this->theme_uri . $src;
			wp_enqueue_style($key, $source);
		}
	}


	/**
	 * Register all javascript files
	 */
	public function register_scripts() {
		foreach ($this->scripts as $key => $script) {
			$source = $this->theme_uri . $script['src'];
			wp_enqueue_script($key, $source, $script['deps'], $script['ver'], true);
		}
	}

	/**
	 * Add navigation places
	 *
	 * @param string $name
	 * @param string $desc
	 */
	public function add_location($name, $desc) {
		$this->locations[$name] = __($desc);
	}

	/**
	 * @param string $id
	 * @param string $name
	 */
	public function add_sidebar($id, $name) {
		$this->sidebars[] = array(
			'name' => $name,
			'id' => $id
		);
	}

	/**
	 * Register the defined sidebars
	 */
	public function register_sidebars() {
		if (count($this->sidebars) == 0)
			return;

		foreach ($this->sidebars as $sidebar) {
			register_sidebar([
				'name' => $sidebar['name'],
				'id' => $sidebar['id'],
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			]);
		}
	}

	public function set_excerpt_length($length) {
		$this->excerptLength = intval($length);
	}

	public function register_excerpt_length() {
		if ($this->excerptLength > 0) {
			$excerptLength = $this->excerptLength;
			add_filter('excerpt_length', function() use ($excerptLength) {
				return $excerptLength;
			}, 999);
		}
	}
}