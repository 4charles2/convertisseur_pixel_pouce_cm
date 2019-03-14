<?php
/**
 * Created by PhpStorm.
 * User: 4charles2
 * Date: 2019-03-09
 * Time: 13:39
 */

/**
 * Class ConvertPoucesPixelsCm
 * Convertir les pixels en cm ou pouces les cm en pixels ou en pouces
 *
 */
class ConvertPoucesPixelsCm {

	static $CM_POUCES = 2.54;

	/**
	 * Convertie les pixels en cm
	 *
	 * @param $pixel
	 * @param $dpi
	 *
	 * @return float|int
	 */
	static function PIXELS_TO_CM($pixel, $dpi) {
		return $pixel * self::$CM_POUCES/$dpi;
	}

	/**
	 * convertie les pixels en pouces
	 *
	 * @param $pixels
	 *
	 * @return float|int
	 */
	static function PIXELS_TO_POUCES($pixels, $dpi){
		return $pixels/$dpi;
	}

	/**
	 * convertie les cm en pixels
	 *
	 * @param $cm
	 * @param $dpi
	 *
	 * @return float
	 */
	static function CM_TO_PIXELS($cm, $dpi){
		return $cm * $dpi / self::$CM_POUCES;
	}

	/**
	 * Convertie les cm en pouces
	 *
	 * @param $cm
	 *
	 * @return float|int
	 */
	static function CM_TO_POUCES($cm){
		return $cm / self::$CM_POUCES;
	}

	/**
	 * Convertie les pouces en cm
	 *
	 * @param $pouces
	 *
	 * @return float
	 */
	static function POUCES_TO_CM($pouces){
		return $pouces * self::$CM_POUCES;
	}

	/**
	 * Convertie les pouces en pixels
	 *
	 * @param $pouces
	 * @param $dpi
	 *
	 * @return float
	 */
	static function POUCES_TO_PIXELS($pouces, $dpi){
		return $pouces * $dpi;
	}
}