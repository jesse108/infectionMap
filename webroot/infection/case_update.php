<?php
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$id = $_REQUEST['id'];
$locationID = $_REQUEST['location_id'];
$infectionID = $_REQUEST['infection_id'];

if($id){
	$oldInfectionCase = $infectionCase  = Lib_InfectionCase::Fetch($id);
	if(!$infectionCase){
		System::SetError('传染病ID错误');
		Utility::Redirect();
	}
	$locationID = $infectionCase['location_id'];
	$infectionID = $infectionCase['infection_id'];
	if($infectionCase['start_time']){
		$startDate = date('Y-m-d',$infectionCase['start_time']);
	}
}

$allLocations = Lib_Location::GetAllLocation();
$allInfections = Lib_Infection::GetALLInfection();

if($_POST){
	$locationID = $_POST['location_id'];
	$infectionID = $_POST['infection_id'];
	$startDate = $_POST['start_date'];
	
	$infectionCase = array(
		'location_id' => $locationID,
		'infection_id' => $infectionID,
		'start_time' => strtotime($startDate),
		'case_number' => intval($_POST['case_number']),
		'case_rate' => doubleval($_POST['case_rate']),
		'ill_number' => intval($_POST['ill_number']),
		'ill_rate' => doubleval($_POST['ill_rate']),
		'comment' => $_POST['comment'],
	);
	if($id){
		$result = Lib_InfectionCase::Update($infectionCase, $oldInfectionCase);
	} else {
		$result = $id = Lib_InfectionCase::Create($infectionCase);
	}
	if($result){
		System::AddNotice("更新成功, <a href='/infection/case_update.php?location_id={$locationID}&infection_id={$infectionID}'> 创建新纪录 </a>");
		Utility::Redirect("/infection/case_update.php?id={$id}");
	}
}





Template::Show();