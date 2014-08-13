<?php
/**
 * 地点更新/创建页
 * 
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';

$allLocations = Lib_Location::GetAllLocation($maxLevel = 2);
$id = $_REQUEST['id'];

$countryID = 0;
$continentID = 0;
if($id){
	$location = $oldLocation = Lib_Location::Fetch($id);
	if(!$location){
		System::SetError('找不对对应的地点,请从正确入口进入~');
		Utility::Redirect();
	}
	
	switch ($location['level']){
		case Lib_Location::LEVEL_CITY:
			$countryID = $location['parent_id'];
			$country = Lib_Location::Fetch($countryID);
			$continentID = $country['parent_id'];
			break;
		case Lib_Location::LEVEL_COUNTRY:
			$continentID = $location['parent_id'];
			break;
		case Lib_Location::LEVEL_CONTIENT:
			
			break;
	}
	
} else {
	$location['lat'] = Lib_Location::DEFAULT_LAT;
	$location['lng'] = Lib_Location::DEFAULT_LNG;
	$location['cname'] = $_REQUEST['cname'];
}


if($_POST){
	$location = array(
		'cname' => $_POST['cname'],
		'lng' => $_POST['lng'],
		'lat' => $_POST['lat'],
		'info' => $_POST['info'],
		'comment' => strval($_POST['comment']),
	);
	
	$continentID = $_POST['continent_id'];
	$countryID = $_POST['country_id'];
	
	if(!$countryID){
		System::AddError('您必须选择一个国家');
	} else {
		if($countryID){
			$location['parent_id'] = $countryID;
			$location['level'] = Lib_Location::LEVEL_CITY;
		} else if($continentID){
			$location['parent_id'] = $continentID;
			$location['level'] = Lib_Location::LEVEL_COUNTRY;
		} else {
			$location['parent_id'] = 0;
			$location['level'] = Lib_Location::LEVEL_CONTIENT;
		}
		if($id){
			$result = Lib_Location::Update($location, $oldLocation);
			if($result){
				System::SetNotice('地点更新成功');
				Utility::Redirect("/location/update.php?id={$id}");
			}
		} else {
			$id = Lib_Location::Create($location);
			if($id){
				System::SetNotice('地点创建成功' . " <a href='/location/update.php'>创建新的地点</a>");
				Utility::Redirect("/location/update.php?id={$id}");
			}
		}
		System::AddError('更新失败:'.Lib_Location::$error);
	}
}

$title = "创建修改地点";
Template::Show();