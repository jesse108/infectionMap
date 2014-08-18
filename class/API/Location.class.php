<?php
class API_Location{
	public function del(){
		$locationID = $_REQUEST['location_id'];
		$location = Lib_Location::Fetch($locationID);
		
		if(!$location){
			System::AddError("找不到对应地点~");
			return false;			
		}

		$result = Lib_Location::DelLocation($location);
		return $result;
	}
}