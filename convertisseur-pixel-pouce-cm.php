<?php

/*
Plugin Name: Convertisseur Pixel Pouce Cm
Plugin URI: http://
Description: convertisseur pixels<=>pouces<=>cm entrer le short code [convertisseur] pour l'integrer
Version: 1.0
Author: 4charles2
Author URI: https://charles-tognol.fr
License: A "Slug" license name e.g. GPL2
*/


function convertisseur_shortCode(){

	return file_get_contents(plugin_dir_url(__FILE__).'view/formAire.html')
	       .file_get_contents(plugin_dir_url(__FILE__).'view/formHypotenuse.html')
	       ;
} add_shortcode('convertisseur', 'convertisseur_shortCode');


function convertisseurStyle(){
	wp_enqueue_style('convertisseurStyle', plugin_dir_url(__FILE__).'css/convertisseurStyle.css');
	wp_enqueue_script('convertisseurJs', plugin_dir_url(__FILE__).'js/convertisseurPoucesPixelsCm.js');
} add_action('wp_enqueue_scripts', 'convertisseurStyle');