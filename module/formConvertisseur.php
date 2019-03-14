<?php


/**
 * Class formConvertisseur
 *
 * génére un formulaire pour la convertion des unites pixels cm pouces
 * puis le retourne avec la méthode show();
 *
 * Le constructeur prend en parametre le type du formulaire (aire | hypotenuse)
 *
 * insere dans le formulaire une nonce pour la sécurité
 *
 */
class formConvertisseur{

    private $dataAire = [
            'idForm' => 'aireForm',
            'propertyInputs' => [
                'lenght' => 'La lonngueur de l\'ecran :',
                'width' => 'La largeur de l\'écran',
                'dpi' => 'Dpi de l\'écran (Résolution)'
            ],
            'nonce' => ['action' => 'convertie-aire', 'name' => 'aireForm-verif']
        ];
    private $dataHypotenuse = [
            'idForm' => 'hypotenuseForm',
            'propertyInputs' => [
                'hypotenuse' => 'Taille de la diagonal (généralement en pixels)',
                'dpi' => 'Dpi de l\'écran (Résolution)'
            ],
            'nonce' => ['action' => 'convertie-hypotenuse', 'name' => 'hypotenuseForm-verif']
        ];

	/**
	 * formConvertisseur constructor.
	 *
	 * @param string $type ('aire' | 'hypotenuse')
	 */
    function __construct(string $type) {
	   try {
		   $this->form = "<form method='post' class='myForm' action='#'";
		   switch ( $type ) {
			   case( "aire" ):
			   	//remplis l'id du formulaire puis ferme le tag form
				   $this->form .= 'id="' . $this->dataAire['idForm'] . '" >';
				   //genere les inputs groupe avec les labels et les inputs à l'intérieur
				   $this->generateInputGroup( $this->dataAire );
				   //Genere le inputs groupe avec le select des unites de mesure
				   $this->uniteMesure();
				   //Genere les nonces pour la securite (géré par wordpress)
				   $this->nonce( $this->dataAire['nonce'] );
				   //genere le input submit
				   $this->submitInput( $this->dataAire['idForm'] );
				   break;
			   case( 'hypotenuse' ):
				   $this->form .= 'id="' . $this->dataHypotenuse['idForm'] . '" >';
				   $this->generateInputGroup( $this->dataHypotenuse );
				   $this->uniteMesure();
				   $this->nonce( $this->dataHypotenuse['nonce'] );
				   $this->submitInput( $this->dataHypotenuse['idForm'] );
				   break;
			   default:
			   	    throw new Exception('Mauvais paramètre soit "aire" ou "hypotenuse" ! ');
			        break;
		   }
	   }catch (Exception $e){
			echo 'Exception du constructeur de formConvertisseur ', $e->getMessage();
	   }
    }
    function generateInputGroup($propertys){
        foreach ($propertys['propertyInputs'] as $key => $value)
            $this->form .= "<div class='input-group'>
                                <label for='".$key."'>".$value."</label>
                                <input type='number' class='input' name='".$key."' id='".$key."' placeholder='".$key."' required>
                            </div>";

    }
	function uniteMesure(){
		$this->form .= "
            <div class='input-group'>
                <label for='unite'>Les unites de mesure (cm, pouces, pixels)</label>
                <select class='input' name='unite' id='unite' required>
                    <option value='CM'>cm</option>
                    <option value='PIXELS' selected>pixels</option>
                    <option value='POUCES'>pouces</option>
                </select>
            </div>";
	}
	function nonce($property){
        $this->form .= wp_nonce_field($property->action, $property->name, true, false);
    }
    function submitInput($name){
	    $this->form .= "<input type='submit' value='valider' name='".$name."'/>";
    }

	function show() {
		return $this->form.'</form>';
	}
        //"<h3>Convertie les informations entrées :</h3>


}

/*
        if (isset($_GET['erreur'])){
          echo  "<div class='view alert'>
                    <p>Vous devez rentrer une valeur numérique et supérieure à zéro</p>
                 </div>";
        }
