<?php 

namespace LuckyNail\Helper;

class Path{
	public static function to_path_part($sString){
		$sString = str_replace('/', DIRECTORY_SEPARATOR, $sString);
		$sString = str_replace('\\', DIRECTORY_SEPARATOR, $sString);
		return trim($sString, DIRECTORY_SEPARATOR);
	}
	public static function to_url_part($sString){
		$sString = str_replace(DIRECTORY_SEPARATOR, '/', $sString);
		$sString = str_replace('\\', '/', $sString);
		return trim($sString, '/');
	}
}
