<?php
/**
 * 传染病详情页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$id = $_REQUEST['id'];

$infectionDetailInfo = Lib_Infection::GetInfectionDetail($id);

if(!$infectionDetailInfo){
	System::AddError("传染病ID 错误请查准后再访问 ");
	Utility::Redirect();
}

$infection = $infectionDetailInfo['infection'];
$infectionCases = $infectionDetailInfo['infection_cases'];
$locations = $infectionDetailInfo['location'];

$caseLoationIDs = Util_Array::GetColumn($infectionCases, 'location_id');
$caseLoctions = Lib_Location::Fetch($caseLoationIDs);
$caseLoctions = Util_Array::AssColumn($caseLoctions, 'id');



foreach ($infectionCases as $index => $case){
	$case['case_rate'] = round($case['case_rate'],2);
	$case['ill_rate'] = round($case['ill_rate'],2);
	
	$case['location'] = $caseLoctions[$case['location_id']]['cname'];
	$case['start_date'] = date('Y-m-d',$case['start_time']);
	$case['case_rate'] .= '%';
	$case['ill_rate'] .= '%';
	$infectionCases[$index] = $case;
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


$headerTitle = $infection['cname'];

$allLocations = Lib_Location::GetAllLocation();

Template::Show();