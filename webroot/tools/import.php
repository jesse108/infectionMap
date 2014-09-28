<?php
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$file = TEMP_PATH . '/infections.xlsx';
$objPHPExcel = PHPExcel_IOFactory::load($file);

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
unset($sheetData[1]);
$names = Util_Array::GetColumn($sheetData,'A');
$locationNames = Util_Array::GetColumn($sheetData, 'B');

$infections   = Lib_Infection::Fetch($names,'cname');
$infections = Util_Array::AssColumn($infections, 'cname');


$condition = array(
	'cname' => $locationNames,
	'level' => 3,
);


$dbLocation = DB_Manage::createDBObj('location');
$locations = $dbLocation->get($condition);
$locations = Util_Array::AssColumn($locations, 'cname');


$dbInfectionCase = DB_Manage::createDBObj('infection_case');

$uncount = 0;
foreach ($sheetData as $data){
	$cname = $data['A'];
	$locationName = $data['B'];
	$startY = $data['C'];
	$startM = $data['D'];
	$endY = $data['E'];
	$endM = $data['F'];
	$peoNum = intval($data['G']);
	$rate = $data['H'];
	$source = $data['I'];
	$comment = $data['J'];
	
	$startTime = strtotime($startY . '-' . $startM . '-01');
	$endTime = strtotime($endY . '-' . $endM . '-01');
	
	$infection = $infections[$cname];
	$location = $locations[$locationName];
	
	if(!$infection || !$location){
		$uncount++;
		dump("-----------------------");
		dump($infection);
		dump($location);
		dump($data);
		continue;
	}
	
	$case = array(
		'location_id' => $location['id'],
		'infection_id' => $infection['id'],
		'start_time' => $startTime,
		'end_time' => $endTime,
		'case_number' => intval($peoNum),
		'case_rate' => doubleval($rate),
		'comment' => strval($comment),
	);
	if(trim($source)){
		$case['comment_link'] = $source;
	}
	
	if($_GET['action']){
		$condition = $case;
		unset($condition['comment']);
		unset($condition['comment_link']);
		if($dbInfectionCase->exsits($condition)){
			continue;
		}
		
		Lib_InfectionCase::Create($case);
	} else {
		//dump($case);
	}
		
}
dump($uncount);