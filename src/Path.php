<?php 

namespace LuckyNail\Helper;

class Path{
	public static function to_path_part($sString){
		return trim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $sString), DIRECTORY_SEPARATOR);
	}
	public static function to_abs_path($sString){
		return realpath(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $sString));
	}
	public static function to_url_part($sString){
		return trim(str_replace([DIRECTORY_SEPARATOR, '\\'], '/', $sString), '/');
	}
	public static function get_file_extension($sFileName){
		preg_match("=[^\.]+$=i", $sFileName, $aMatches);
		return array_pop($aMatches);
	}	
	public static function collect_hierarchic_files($aHierarchy, $sBasePath = '', &$aFiles = []){
		foreach($aHierarchy as $mFolderName => $mFileOrFolder){
			if(!is_array($mFileOrFolder)){
				$sFilePath = realpath($sBasePath.DIRECTORY_SEPARATOR.$mFileOrFolder);
				if($sFilePath){
					$aFiles[] = $sFilePath;
				}
			}else{
				$sBasePath .= DIRECTORY_SEPARATOR.self::to_path_part($mFolderName);
				self::collect_hierarchic_files($mFileOrFolder, $sBasePath, $aFiles);
			}
		}
		return $aFiles;
	}


}
