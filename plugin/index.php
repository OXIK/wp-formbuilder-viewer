<?php

/**
 * @package Wp_FormBuilder_Viewer
 * @version 0.1
 */

/*
Plugin Name: Wordpress FormBuilder Viewer
Plugin URI: 
Description: Test
Author: Alejandro Orta Sanz
Version: 0.1
*/

define('FORMVIEWER_FILENAME', basename(__FILE__));
define('FORMVIEWER_PLUGIN_PATH', str_replace(FORMVIEWER_FILENAME, "", __FILE__));

add_action('admin_menu', 'admin_menu_setup');

function admin_menu_setup() {
	add_menu_page('Resultados de Formularios', 'Formularios', 'manage_options', 'results-view', 'form_results_page', 'dashicons-welcome-write-blog');
}

function form_results_page() {
	include 'html/resultsView.php';
}

function no_plugin_installed_error_msg() {
	$class   = 'error';
	$message = '<a href="https://wordpress.org/plugins/formbuilder/">FormBuilder</a> no está instalado, por favor, instalelo y recarge la página.';

	echo '<div class=\"$class\"> <p>'.$message.'</p></div>';
}