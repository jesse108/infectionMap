<?php
class DB_InfectionCase extends DB_ModelBase{
	public $tableName = 'infection_case';
	
	
	
	public function getCases($infectionID = null,$locationID = null){
		$locationStatus = Lib_Location::STATUS_NORMAL;
		$infectionStatus = Lib_Infection::INFECTION_STATUS_NORMAL;
		$sql = "
			select infection_case.*
			from infection_case  join location on location.id = infection_case.location_id and location.status = {$locationStatus}
				 join infection on infection_case.infection_id = infection.id and infection.status = {$infectionStatus}
			where 1 = 1
		";
		if($infectionID){
			$sql .= "and infection_id = {$infectionID} ";
		}
		
		if($locationID){
			$sql .= "and infection_id = {$locationID} ";
		}
		
		$result = DB::GetQueryResult($sql);
		return $result;
	}
}