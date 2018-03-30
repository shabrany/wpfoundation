<?php

include __DIR__ . '/libs/theme.php';

$ftheme = new FoundationTheme();

$ftheme->add_location('main-navigation', 'This is the main navigation menu');
$ftheme->add_location('footer-nav', 'This menu is displayed at the bottom of the page');

$ftheme->add_sidebar('primary-sidebar', 'Default sidebar');
$ftheme->add_sidebar("footer-column-1", "Column footer 1");
$ftheme->add_sidebar("footer-column-2", "Column footer 2");
$ftheme->add_sidebar("footer-column-3", "Column footer 3");

$ftheme->add_style('foundation', 'css/foundation.min.css');
$ftheme->add_style('style', 'css/styles.css');

$ftheme->init();

/**
 * Returns the title for the current page. By default the blog name.
 * 
 * @return string
 */
function get_site_title()
{
	$tail = (is_front_page() ? get_bloginfo('description') : get_the_title());
	return get_bloginfo('name') . ' | ' . $tail;
}

/**
 * Returns the url of the current theme
 * 
 * @return string
 */
function theme_url()
{
	return get_template_directory_uri();
}
