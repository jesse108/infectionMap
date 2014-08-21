<?php
class Lib_Infection{
	public static $error;
	const INFECTION_STATUS_NORMAL = 0;
	const INFECTION_STATUS_DEL = 1;
	
	
	///////////////工具方法
	public static function Fetch($id){
		$dbInfection = new DB_Infection();
		$infection = $dbInfection->fetch($id);
		if(is_array($id)){
			$infection = Util_Array::AssColumn($infection, 'id');
		}
		return $infection;
	}
	
	
	/**
	 * 获取所有传染病
	 */
	public static function GetALLInfection($assFristChar = true){
		$dbInfection = new DB_Infection();
		$condition = array(
			'status' => self::INFECTION_STATUS_NORMAL,
		);
		
		$option = array(
			'order' => "order by id desc",
		);
		
		$allInfections = $dbInfection->get($condition,$option);
		
		$allInfections = Util_Array::AssColumn($allInfections, 'id');
		
		if($assFristChar){
			$allInfections = Util_Array::GroupInColum($allInfections, 'frist_char');
			$allInfections = Util_Array::Sort($allInfections);
		}
		return $allInfections;
	}
	
	
	public static function GetInfectionList(){
		
	}
	
	
	public static function GetInfectionDetail($infectionID){
		$infectionID = intval($infectionID);
		
		$dbInfection = new DB_Infection();
		$infection = $dbInfection->fetch($infectionID);
		
		if(!$infection){
			return false;
		}
		
		$infectionCases = self::GetInfectionCase($infectionID);
		
		if($infectionCases){
			$allLocations = Lib_Location::GetAllLocation();
			Util_Array::MarkTree($allLocations, Util_Array::GetColumn($infectionCases, 'location_id'));
		}

		$result = array(
			'infection' => $infection,
			'infection_cases' => $infectionCases,
			'location' => $allLocations,
		);
		return $result;
	}
	
	
	/**
	 * 创建传染病
	 */
	public static function CreateInfection($infection){
		$checkResult = Lib_Validator_Infection::checkInfectionUpdate($infection);
		
		if(!$checkResult){
			self::SetError(Lib_Validator_Infection::GetError());
			return false;
		}
		
		$dbInfection = new DB_Infection();
		$insertID = $dbInfection->create($infection);
		
		if(!$insertID){
			self::SetError($dbInfection->error);
		}
		return $insertID;
	}
	
	
	/**
	 * 更新传染病
	 */
	public static function UpdateInfection($infection,$oldInfection){
		$checkResult = Lib_Validator_Infection::checkInfectionUpdate($infection,$oldInfection);
		
		if(!$checkResult){
			self::SetError(Lib_Validator_Infection::GetError());
			return false;
		}
		
		$dbInfection = new DB_Infection();
		$result = $dbInfection->update(array('id' => $oldInfection['id']), $infection);
		return $result;
	}
	
	
	/**
	 * 获取传染病病例
	 */
	public static function GetInfectionCase($infectionID = null,$locationID = null){
		$dbInfectionCase = new DB_InfectionCase();
		$infectionCases = $dbInfectionCase->getCases($infectionID,$locationID);
		return $infectionCases;
	}
	
	/**
	 * 删除传染病
	 * 
	 * @param array $infectoin
	 * 
	 */
	public static function DeleteInfectoin($infection){
		$condition = array(
			'id' => $infection['id'],
		);
		$updateRow = array(
			'status' => self::INFECTION_STATUS_DEL,
		);
		
		$dbInfection = DB_Manage::createDBObj('infection');
		$result = $dbInfection->update($condition, $updateRow);
		if(!$result){
			System::AddError($dbInfection->error,System::MESSAGE_SYS);
		}
		return $result;
	}
	

	
	
	public static function SetError($error){
		self::$error = $error;
	}
	
	public static function GetError(){
		return self::$error;
	}
}