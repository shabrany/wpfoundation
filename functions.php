<?php


/**
* 
*/
class FoundationTheme
{

    private $styles = array();
    private $scripts = array();    
    private $locations = array();
    private $template_uri = '';
    
    public function __construct() {
        $this->template_uri = get_template_directory_uri() . '/';              
        
        $this->add_location('main-navigation', 'This is the main navigation menu');
        $this->add_location('footer-nav', 'This menu is displayed at the bottom of the page');  
        
        $this->add_style('foundation', 'css/foundation.min.css'); 
        
        $this->init_actions();
    }
    
    /**
     * Run all wordpress actions
     */
    private function init_actions() {
         // Register all defined nav locations
       add_action('init', array($this, 'register_menus'));        
       
       // Register all defined scripts
       add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
       
       // Register all defined scripts
       add_action('wp_enqueue_scripts', array($this, 'register_styles'));
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
            $source = $this->template_uri . $src;
            wp_enqueue_style($key, $source);
        }        
    }
    
    
    /**
     * Register all javascript files
     */
    public function register_scripts() {              
        foreach ($this->scripts as $key => $script) {
            $source = $this->template_uri . $script['src'];
            wp_enqueue_script($key, $source, $script['deps'], $script['ver'], true);
        }        
    }
    
    /**
     * Add menu locations
     * 
     * @param string $name
     * @param string $desc
     */
    public function add_location($name, $desc) {
        $this->locations[$name] = __($desc);                
    }

}


$f_theem = new FoundationTheme();
