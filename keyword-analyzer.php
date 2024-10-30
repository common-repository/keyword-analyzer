<?php
/*
Plugin Name: Keyword Analyzer
Plugin URI: 
Description: Keyword Analyzer is the latest plugin designed to report SEO keywords in the website as a pdf format to the user.
Version: 1.0
Author: VisualWebz LLC
Author URI: 
Text Domain: keyword-analyzer
License: GNU General Public License v2 or later
*/

if (!defined('ABSPATH')) exit; //Exit if accessed directly.

//KA stands for Keyword Analyzer

defined('ABSPATH') or die('No script kiddies please!');

//path of the plugin
define('KEYWORDANALYZER_PLUGIN_PATH', plugin_dir_path(__FILE__));

//adding menus to the admin menu
add_action('admin_menu', 'keywordanalyzer_setup_menu');

//function that creates menus
function keywordanalyzer_setup_menu()
{
    add_menu_page('Keyword Analyzer page', 'Keyword Analyzer', 'manage_options', 'keywordanalyzer_plugin_menu', 'keywordanalyzer_main_layout', '', 2);
    add_submenu_page('keywordanalyzer_plugin_menu', 'Keyword Analyzer Page', 'Keyword Analyzer', 'manage_options', 'keywordanalyzer_layout', 'keywordanalyzer_layout');
    remove_submenu_page('keywordanalyzer_plugin_menu', 'keywordanalyzer_plugin_menu');
}

//main layout of the plugin
function keywordanalyzer_main_layout()
{
    echo "<h1>Welcome to the home page of Plug-in</h1>";
}

//function that calls Page Creator Layout
function keywordanalyzer_layout()
{
    echo "<h1>Keyword Analyzer</h1>";
    include KEYWORDANALYZER_PLUGIN_PATH . 'view/ka_layout.php';
}


//adding all js scripts and styling to the header
function keywordanalyzer_enqueue_script($hook)
{
    if ('keyword-analyzer_page_keywordanalyzer_layout' != $hook) {
        return;
    }
	
	
    wp_enqueue_script('jquery');
	wp_enqueue_script('keywordanalyzer_html2pdf', plugins_url('assets/js/html2pdf.bundle.min.js', __FILE__));
    wp_enqueue_script('keywordanalyzer_functions_script', plugins_url('assets/js/ka_scripts.js', __FILE__));
    wp_enqueue_style('keywordanalyzer_custom_style', plugins_url('assets/css/ka_style.css', __FILE__));
}

//adding ka_enqueue_script to the admin page
add_action('admin_enqueue_scripts', 'keywordanalyzer_enqueue_script');
