<?php
class Lib_Validator_Infection{
	public static $error;
	
	public static function checkInfectionUpdate($infection,$oldInfection = null){
		if(!$oldInfection){
			$condition = array(
				'cname' => $infection['cname'],
				'status' => Lib_Infection::INFECTION_STATUS_NORMAL,
			);
			
			$dbInfection = DB_Manage::createDBObj('infection');
			if($dbInfection->exsits($condition)){
				self::$error = "已经存在此疾病";
				return false;
			}
		}
		
		return true;
	}
	
	
	public static function SetError($error){
		self::$error = $error;
	}
	
	public static function GetError(){
		return self::$error;
	}
}