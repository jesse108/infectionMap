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
	
	public static function Render($case,$location){
		$case = Util_Array::Trim($case);
		
		$case['case_rate'] = round($case['case_rate'],2);
		$case['ill_rate'] = round($case['ill_rate'],2);
		
		$case['location'] = $location['cname'];
		$case['start_date'] = date('Y-m-d',$case['start_time']);
		$case['end_date'] = date('Y-m-d',$case['end_time']);
		$case['case_rate'] .= ' /10万';
		$case['ill_rate'] .= ' /10万';
		
		if($case['comment_link']){
			$case['comment_link'] = "<a href='{$case['comment_link']}' target='_blank'>来源</a>";
		}
		
		$case['comment'] = $case['comment'] ? $case['comment_link'] . ' ' . $case['comment'] : $case['comment_link'];
		return $case;
	}
	
}