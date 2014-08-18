<?php
/**
 * 地点信息详情页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$loginUser = Lib_User::GetLoginUser();
$contientID = $_GET['contient_id'];
$countryID = $_GET['country_id'];

$allLocations = Lib_Location::GetAllLocation(0,true,true);

if($countryID){
	$location = $allLocations[$contientID]['sub'][$countryID];
	$cities = $location['sub'];
} else if($contientID){
	$location = $allLocations[$contientID];
	$cities = array();
	foreach ($allLocations[$contientID]['sub'] as $country){
		if($country['sub']){
			$cities = array_merge($cities,$country['sub']);
		}
	}
}


Template::Show();
