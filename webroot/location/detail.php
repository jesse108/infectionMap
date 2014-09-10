<?php
/**
 * 地点信息详情页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$id = $_REQUEST['id'];
$loginUser = Lib_User::GetLoginUser();
$locationDetailInfo = Lib_Location::GetLocationDetail($id);
$infectionID = $_GET['infection_id'];

if(!$locationDetailInfo){
	System::SetError('请从正确入口进入');
	Utility::Redirect();
}
$location = $locationDetailInfo['location'];
$infectionCases = $locationDetailInfo['infection_case'];
$caseLoctions = Lib_Location::Fetch(Util_Array::GetColumn($infectionCases, 'location_id'));
$infections = Lib_Infection::Fetch(Util_Array::GetColumn($infectionCases, 'infection_id'));
$yearCount = $locationDetailInfo['year_count'];
$defaultYear = Date('Y');

switch ($location['level']){
	case Lib_Location::LEVEL_CITY:
		$city = $location;
		$country = Lib_Location::Fetch($city['parent_id']);
		$continent = Lib_Location::Fetch($country['parent_id']);
		
		$headerTitle = "{$city['cname']}({$continent['cname']},{$country['cname']})";
		break;
	case Lib_Location::LEVEL_COUNTRY:
		$country = $location;
		$continent = Lib_Location::Fetch($country['parent_id']);
		$headerTitle = "{$country['cname']}({$continent['cname']})";
		break;	
	case Lib_Location::LEVEL_CONTIENT:
		$continent = $location;
		$headerTitle = $continent['cname'];
		break;
}


foreach ($infectionCases as $index => $case){
	if($infectionID && $case['infection_id'] != $infectionID){
		unset($infectionCases[$index]);
		continue;
	}
	$infectionCases[$index] = Lib_InfectionCase::Render($case,$caseLoctions[$case['location_id']]);
}

$rowInfo = array(
		'location' => '地区',
		'start_date' => '发病日期',
		'case_number' => '发病人数',
		'case_rate' => '发病率',
		'ill_number' => '患病人数',
		'ill_rate' => '患病率',
		'comment' => '备注',
);
Template::Show();