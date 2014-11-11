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
$yearCounts = $locationDetailInfo['year_counts'];

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

/////////////////图表
//统计
foreach ($infectionCases as $infectionCase){
	$infections[$infectionCase['infection_id']];
	$infections[$infectionCase['infection_id']]['case_num']++;
}

$totalChart = array(
	'tooltip' => array(
		'trigger' => 'axis'
	),
	'dataZoom' => array(
		'show' => false,
	),
);

$toolBox = array(
	'show' => true,
	'feature' => array(
		'dataView' => array(
			'show' => true,
			'readOnly' => false,
		),
		'magicType' => array(
			'show' => true,
			'type' => array('line', 'bar'),
			'title' => array(
				'line' => '折线图',
				'bar' => '柱状图',
			),
		),
		'restore' => array('show' => true),
		'saveAsImage' => array('show' => true),
	),
);
$totalChart['toolbox'] = $toolBox;
$xAxis = array('type' => 'category');
$series = array('name' => '传染病','type' => 'bar');
foreach ($infections as $infection){
	$name =  $infection['cname'];
	//$totalChart['data'][] = $name;
	$xAxis['data'][] = $name;
	$series['data'][] = $infection['case_num'];
}

$totalChart['xAxis'] = array($xAxis);
$totalChart['series'] = array($series);
$totalChart['yAxis'] = array(array('type'=>'value','name' => '记录次数'));


////分段统计
$infectionChart = array();

foreach ($yearCounts as $curInfectionID => $yearCount){
	$xAxis = array(
		'type' => 'category',
		'name' => '年份',
	);
	$series = array('name' => $infections[$curInfectionID]['cname'],'type' => 'line');
	
	$currentChart = $infectionChart[$curInfectionID];
	if(!$currentChart){
		$currentChart = array(
			'title' => array(
				'text' => $infections[$curInfectionID]['cname'] . '发病记录',
			),
			'tooltip' => array(
				'trigger' => 'axis'
			),
			'toolbox' => $toolBox,
			'dataZoom' => array(
				'show' => true,
				'realtime' => true,
			),
			'yAxis' => array(
				array(
					'type'=>'value',
					'name' => '发病人数',
				)
			),
		);

	}
	
	for($currentTime =$yearCount['start_time'];$currentTime<=$yearCount['end_time'];){
		$year = date('Y',$currentTime);
		$currentData = intval($yearCount['year'][$year]);
		$currentTime = mktime(0,0,0,1,1,$year + 1);
		$xAxis['data'][] = $year;
		$series['data'][] = $currentData;
	}
	$currentChart['xAxis'] = array($xAxis);
	$currentChart['series'] = array($series);
	$infectionChart[$curInfectionID] = $currentChart;
}

Template::Show();