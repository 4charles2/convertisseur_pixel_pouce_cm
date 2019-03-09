<?php
/**
 * Created by PhpStorm.
 * User: 4charles2
 * Date: 2019-03-09
 * Time: 16:04
 */

/**
 * Class Screen
 * Caracteristique d'un écran longeur largeur dpi hypotenuse
 */
class Screen extends ConvertPoucesPixelsCm{

	private $width;
	private $lenght;
	private $unite;
	private $dpi;
	private $hypotenuse;

	function hydrate(array $datas){
		foreach ($datas as $key => $value){
			$methode = 'set'.ucfirst($key);
			if(method_exists(this, $methode)){
				$this->$methode($value);
			}
		}
	}
	public function calcul(){
		if(!empty($this->unite))
			switch($){

			}
	}
	/**
	 * @return mixed
	 */
	public function getWith() {
		return $this->with;
	}

	/**
	 * @param mixed $with
	 */
	private function setWith( $width ): void {
		if(is_numeric($width) && $width > 0)
			$this->width = $width;
	}

	/**
	 * @return mixed
	 */
	public function getLenght() {
		return $this->lenght;
	}

	/**
	 * @param mixed $lenght
	 */
	private function setLenght( $lenght ): void {
		if(is_numeric($lenght) && $lenght > 0)
			$this->lenght = $lenght;
	}

	/**
	 * @return mixed
	 */
	public function getDpi() {
		return $this->dpi;
	}

	/**
	 * @param mixed $dpi
	 */
	private function setDpi( int $dpi ): void {
		if(is_numeric($dpi) && $dpi > 0)
			$this->dpi = $dpi;
	}

	/**
	 * @return mixed
	 */
	public function getHypotenuse() {
		return $this->hypotenuse;
	}

	/**
	 * @param mixed $hypotenuse
	 */
	private function setHypotenuse( $hypotenuse ): void {
		if(is_numeric($hypotenuse) && $hypotenuse > 0)
			$this->hypotenuse = $hypotenuse;
	}
	private function getUnite(){
		return $this->unite;
	}
	private function setUnite( $unite ): void{
		$this->unite = $unite;
	}
}