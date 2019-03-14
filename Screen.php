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
	private $aire;
	private $unite;
	private $dpi;
	private $hypotenuse;

	/**
	 *
	 * hydrate l'objet avec les valeurs passé en paramètre dans un tableau
	 * If aucune erreur return true sinon false
	 *
	 * @param array $datas
	 *
	 * @return bool
	 */
	function hydrate(array $datas): bool{
		foreach ($datas as $key => $value){
			if($key !== 'unite' && is_numeric($value) && $value > 0) {
				$methode = 'set' . ucfirst( $key );
				if ( method_exists( $this, $methode ) ) {
					$this->$methode( $value );
				}
			}else{
				return false;
			}
		}
		return true;
	}
	public function aire(){
		$this->lenght['cm'] = $this->toCM($this->lenght);
		$this->width['cm'] = $this->toCM($this->width);

		$this->lenght['pouces'] = self::CM_TO_POUCES($this->lenght['cm']);
		$this->width['pouces'] = self::CM_TO_POUCES($this->width['cm']);

		$this->width['pixels'] = self::CM_TO_PIXELS($this->width['cm'], $this->dpi);
		$this->lenght['pixels'] = self::CM_TO_PIXELS($this->lenght['cm'], $this->dpi);

		$this->hypotenuse["cm"] = hypot($this->lenght['cm'], $this->width['cm']);
		$this->hypotenuse['pouces'] = self::CM_TO_POUCES($this->hypotenuse['cm']);
		$this->hypotenuse['pixels'] = self::CM_TO_PIXELS($this->hypotenuse['cm'], $this->dpi);

		$this->aire['cm'] = $this->width['cm'] * $this->lenght['cm'];
		$this->aire['pouces'] = $this->width['pouces'] * $this->lenght['pouces'];
		$this->aire['pixels'] = $this->width['pixels'] * $this->width['pixels'];

	}
	public function hypotenuse(){
		$this->hypotenuse['cm'] = $this->toCM($this->hypotenuse);
		$this->hypotenuse['pouces'] = self::CM_TO_POUCES($this->hypotenuse['cm']);
		$this->hypotenuse['pixels'] = self::CM_TO_PIXELS($this->hypotenuse['cm'], $this->dpi);
	}
	public function toCM($size){
		$methode = strtoupper($this->unite)."_TO_CM";
		if($this->unite !== "cm" && method_exists($this, $methode))
			return $methode($size, $this->dpi);
		else
			return $size;
	}
	/**
	 * @return mixed
	 */
	public function getWith() {
		return $this->width;
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