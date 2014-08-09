<?php
class Lib_Validator_Infection{
	public static $error;
	
	public static function checkInfectionUpdate($infection,$oldInfection = null){
		
		return true;
	}
	
	
	public static function SetError($error){
		self::$error = $error;
	}
	
	public static function GetError(){
		return self::$error;
	}
}