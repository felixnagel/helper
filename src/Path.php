<?php 

namespace LuckyNail\Helper;

class Path{
	public static function to_path_part($sString){
		$sString = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $sString);
		return DIRECTORY_SEPARATOR.trim($sString, DIRECTORY_SEPARATOR);
	}
	public static function to_abs_path($sString){
		$sString = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $sString);
		return realpath($sString);
	}
	public static function to_url_part($sString){
		$sString = str_replace([DIRECTORY_SEPARATOR, '\\'], '/', $sString);
		return trim($sString, '/');
	}
	
	/**
	 * Gibt die Extension eines Dateinamens zurück (ohne Punkt).
	 * @param 	string 	$sFileName 	Der Dateiname (NICHT Pfad)
	 * @return 	string 				Die Dateiextension (ohne Punkt)
	 */
	public static function get_file_extension($sFileName){
		preg_match("=[^\.]+$=i", $sFileName, $aMatches);
		return array_pop($aMatches);
	}	
}
