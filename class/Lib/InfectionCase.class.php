<?php
class Lib_InfectionCase{
	public static $error;
	
	public static function Fetch($id){
		$dbInfectionCase = new DB_InfectionCase();
		return $dbInfectionCase->fetch($id);
	}
	

	public static function Create($infectionCase){
		$dbInfectionCase = new DB_InfectionCase();
		$insertID = $dbInfectionCase->create($infectionCase);
		
		if(!$insertID){
			System::AddError($dbInfectionCase->error);
		}
		return $insertID;
	}
	
	public static function Update($updateRow,$oldInfectionCase){
		if(!$oldInfectionCase && !$oldInfectionCase['id']){
			System::AddError("更新错误,记录ID 错误");
			return false;
		}
		$dbInfectionCase = new DB_InfectionCase();
		$result = $dbInfectionCase->update(array('id' => $oldInfectionCase['id']), $updateRow,$oldInfectionCase);
		if(!$result){
			System::AddError($dbInfectionCase->error);
		}
		return $result;
	}
	
}