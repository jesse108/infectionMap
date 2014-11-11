<?php
class Lib_Search{
		
	public static function SearchInfection($keyWord){
		$keyWord = trim($keyWord);
		if(!$keyWord){
			return false;
		}
		
		$dbInfection = new DB_Infection();
		$condition = array(
			"or" => array(
				"locate(lower('{$keyWord}'),lower(cname))",
				"locate(lower('{$keyWord}'),lower(ename))",
				"locate(lower('{$keyWord}'),lower(pathogen_cname))",
				"locate(lower('{$keyWord}'),lower(pathogen_ename))",
				"locate(lower('{$keyWord}'),lower(taxonomy))",
				"locate(lower('{$keyWord}'),lower(infection_source))",
 				"locate(lower('{$keyWord}'),lower(susceptible_pop))",
 				"locate(lower('{$keyWord}'),lower(infection_path))",
 				"locate(lower('{$keyWord}'),lower(judge_standard))",
 				"locate(lower('{$keyWord}'),lower(prevention))",
 				"locate(lower('{$keyWord}'),lower(treatment))",
			),
			'status' => Lib_Infection::INFECTION_STATUS_NORMAL,
		);
		
		$result = $dbInfection->get($condition);
		return $result;
	}
	
	public static function SearchLocation($keyWord,$isPort = 0){
		$keyWord = trim($keyWord);
		if(!$keyWord){
			return false;
		}
		
		$dbLocation = new DB_Location();
		$condition = array(
			"or" => array(
				"locate(lower('{$keyWord}'),lower(cname))",
				"locate(lower('{$keyWord}'),lower(ename))",
				"locate(lower('{$keyWord}'),lower(info))",
				"locate(lower('{$keyWord}'),lower(comment))",
			),
			'status' => Lib_Location::STATUS_NORMAL,
		);
		if($isPort){
			$condition['is_port'] = 1;
		}
		
		$result = $dbLocation->get($condition);
		return $result;		
	}
	
}