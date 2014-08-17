<?php
/**
 * 地点信息详情页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$contientID = $_GET['contient_id'];
$countryID = $_GET['country_id'];

$allLocations = Lib_Location::GetAllLocation(0,true,true);


if($contientID){
	$cities = array();
	foreach ($allLocations[$contientID]['sub'] as $country){
		if($country['sub']){
			$cities = array_merge($cities,$country['sub']);
		}
	}
} else if($countryID){
	$cities = $allLocations[$contientID]['sub'][$countryID]['sub'];
}

Template::Show();
