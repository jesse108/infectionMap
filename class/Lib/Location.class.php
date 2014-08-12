<?php
/**
 * 地点的业务逻辑
 * 
 * @author zhaojian01
 *
 */
class Lib_Location{
	public static $error;
	
	const DEFAULT_LNG = '116.397428';
	const DEFAULT_LAT = '39.90923';
	
	const LEVEL_CONTIENT = 1;
	const LEVEL_COUNTRY = 2;
	const LEVEL_CITY = 3;
	
	const STATUS_NORMAL = 0;
	
	
	public static function Fetch($locationID){
		$dbLocation = new DB_Location();
		$location =  $dbLocation->fetch($locationID);
		if(is_array($locationID)){
			$location = Util_Array::AssColumn($location, 'id');
		}
		return $location;
	}
	
	
	public static function Create($location){
		$dbLocation = new DB_Location();
		$id = $dbLocation->create($location);
		if(!$id){
			self::$error = $dbLocation->error;
		}
		return $id;
	}
	
	public static function Update($location,$oldLocation){
		$dbLocation = new DB_Location();
		$result = $dbLocation->update(array('id' => $oldLocation['id']), $location,$oldLocation);
		if(!$result){
			self::$error = $dbLocation->error;
		}
		return $result;
	}
	
	
	public static function GetAllLocation($maxLevel = 0,$format = true){
		$dbLocation = new DB_Location();
		$condition = array(
			'status' => self::STATUS_NORMAL,
		);
		if($maxLevel){
			$condition[] = "level <= {$maxLevel}";
		}
		
		$allLocation = $dbLocation->get($condition);
		$allLocation = Util_Array::AssColumn($allLocation, 'id');
		
		if($format){
			$allLocation = Util_Array::FormatInTree($allLocation);
		}
		return $allLocation;
	}
	
	public static function GetLocationDetail($locationID){
		if(!$locationID){
			return false;
		}
		$allLocations = self::GetAllLocation();
		$location = Util_Array::FindNodeInTree($allLocations, $locationID);
		
		if(!$location){
			return false;
		}

		$locationIDs = Util_Array::GetColumn(array($location), 'id','sub');
		$infectionCases = Lib_Infection::GetInfectionCase(null,$locationIDs);
		
		$yearCount = array();
		foreach ($infectionCases as $case){
			$year = date('Y',$case['start_time']);
			$yearCount[$year] ++;
		}
		
		$yearCount = $yearCount ? Util_Array::Sort($yearCount) : array();
		
		$result = array(
			'location' => $location,
			'infection_case' => $infectionCases,
			'year_count' => $yearCount,
		);
		
		return $result;
	}
	
	public static function GetLocationFromCName($cnames){
		$dbLocation = DB_Manage::createDBObj('location');
		$condition = array(
			'cname' => $cnames,
			'status' => self::STATUS_NORMAL,
		);
		$locations = $dbLocation->get($condition);
		return $locations;
	}
	
}