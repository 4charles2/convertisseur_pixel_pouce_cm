<?php

/*
Plugin Name: Convertisseur Pixel Pouce Cm
Plugin URI: http://
Description: convertisseur pixels<=>pouces<=>cm entrer le short code [convertisseur] pour l'integrer
			 Il y a deux type de formulaire un à partir de l'hypotenuse l'autre des longueur et largeur
Version: 1.0
Author: 4charles2
Author URI: https://charles-tognol.fr
License: A "Slug" license name e.g. GPL2
*/

include 'module/formConvertisseur.php';
include 'Screen.php';


/**
 *
 * Genere les formulaires de convertion si le shortcode [convertisseur]
 * est integré dans le code
 *
 * @return string
 */
function convertisseur_shortCode($attr){
	//Les fichiers sont insérer apres les elements visuel du DOM uniquement si un shortcode est présent sur la page
	wp_enqueue_style('convertisseurStyle', plugin_dir_url(__FILE__).'css/convertisseurStyle.css');
	wp_enqueue_script('convertisseurJs', plugin_dir_url(__FILE__).'js/convertisseurPoucesPixelsCm.js');
	wp_enqueue_script('ajax', plugin_dir_url(__FILE__).'js/ajax.js');

	$formAire = new formConvertisseur('aire');
	$formHypotenuse = new formConvertisseur('hypotenuse');

	return $formAire->show().$formHypotenuse->show();
	//file_get_contents(plugin_dir_url(__FILE__).'view/formConvertisseur.php');
	       //.file_get_contents(plugin_dir_url(__FILE__).'view/formHypotenuse.php')
	       //;
} add_shortcode('convertisseur', 'convertisseur_shortCode');


/**
 * Integre les feuilles de styles css et script js dans le header pour manipuler les convertisseurs
 * Probleme ils sont insérer sur toutes les page même si il n'y en à pas besoin
 * J'ai donc deplacer les wp_enqueue(style&scripts) dans l'action add_shortcode(convertisseur)

function convertisseurStyle(){

} add_action('wp_enqueue_scripts', 'convertisseurStyle');
*/

function process_post(){
	/*
	if(isset($_POST['hypotenuseForm']) && isset($_POST['hypotenuseForm-verif'])
	   && wp_verify_nonce($_POST['hypotenuseForm-verif'], 'convertie-hypotenuse')){
			$screen = new Screen();
			if($screen->hydrate($_POST))
				wp_safe_redirect(add_query_arg('OK', 'BienReçu', wp_get_referer()));
			else
				wp_safe_redirect(add_query_arg('erreur', 'Merci de vérifier que vous avez entré les bonnes valeurs', wp_get_referer()));

	}else*/if (isset($_POST['aireForm']) && isset($_POST['aireForm-verif'])
	    && wp_verify_nonce( $_POST['aireForm-verif'], 'convertie-aire' ) ) {
			$screen = new Screen();
			if ( $screen->hydrate( $_POST ) ) {
				wp_safe_redirect( add_query_arg( 'OK', 'BienReçu', wp_get_referer() ) );
			} else {
				wp_safe_redirect( add_query_arg( 'erreur', 'Merci de vérifier que vous avez entré les bonnes valeurs', wp_get_referer() ) );
			}
	/*}else{
		wp_safe_redirect(add_query_arg('erreur', 'Vous esseyez de manipuler le formulaire hors de son contexte initiale.', wp_get_referer()));
	}*/
}add_action('template_redirect', 'process_post');