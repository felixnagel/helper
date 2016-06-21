<?php 

namespace LuckyNail\Helper;

class Chrono{
	protected static $_aStart = [];
	protected static $_aSum = [];

	public static function start($sId){
		self::$_aStart[$sId] = microtime(true);
		if(!isset(self::$_aSum[$sId])){
			self::$_aSum[$sId] = 0;
		}
	}

	public static function stop($sId){
		if(isset(self::$_aStart[$sId]))[
			self::$_aSum[$sId] += (microtime(true) - self::$_aStart[$sId]);
		}
		unset(self::$_aStart[$sId]);
	}

	public static function read($sId){
		self::stop($sId);
		self::start($sId);
		return self::_aSum($sId);
	}
}
