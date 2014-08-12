<?php
class API_Infection{
	public function del(){
		$infectionID = $_REQUEST['infection_id'];
		$infection = Lib_Infection::Fetch($infectionID);
		if(!$infection){
			System::AddError("找不到对应传染病 ~");
			return false;
		}
		$result = Lib_Infection::DeleteInfectoin($infection);
		return $result;
	}
}