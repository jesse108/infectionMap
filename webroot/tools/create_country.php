<?php
include_once dirname(dirname(dirname(__FILE__))).'/app.php';


////加载国家
$filePath = ROOT_PATH . '/doc/country.txt';
$file = new File($filePath);

$coutryInfos = $file->readALL();

$coutries = array();

$continets = array();
$curCont = '';

foreach ($coutryInfos as $info){
	$info = trim($info);
	if(!$info){
		continue;
	}
	if(strstr($info, '、') === false && strstr($info, ':') === false){
		$curCont = $info;
		$curCont = preg_replace(array("/\\(.*\\)/"), array(''), $curCont);
		$continets[] = $curCont;
		continue;
	}
	if(!$curCont){
		continue;
	}
	
	$info = preg_replace(array("/.*:/"), array(''), $info);
	$infos = explode('、', $info);
	$curCont = trim($curCont);
	foreach ($infos as $one){
		$coutries[$curCont][$one] = $one;
	}
}



///加载经纬度
$filePath = ROOT_PATH . '/doc/coor.txt';
$file = new File($filePath);
$coorArray = $file->readALL();
$count = 0;
$countryCoor = array();
foreach ($coorArray as $coorInfo){
	$coorInfo = trim($coorInfo);
	$coorInfo = preg_replace(array("/[0-9]+\./"), array(''), $coorInfo,1);
	$coorInfo = trim($coorInfo);
	if(!$coorInfo){
		continue;
	}
	
	/*
	if(! (strstr($coorInfo, 'S') || strstr($coorInfo, 'N'))
			|| !(strstr($coorInfo, 'W') || strstr($coorInfo, 'N'))
	){
		continue;
	}
	*/
	if(!strstr($coorInfo, '*')){
		continue;
	}
	$country = explode(' ', $coorInfo,2)[0];
	$country = preg_replace(array('/[a-zA-Z]+/'), array(''), $country);
	
	//经纬度
	$pattern= "/[0-9]+ [0-9]+\*(N|S) [0-9]+ [0-9]+\*(E|W)/";
	preg_match($pattern,$coorInfo,$matches);
	$coordsr = explode(' ', $matches[0]);
	$y = $coordsr[0] . '.' . $coordsr[1];
	$x = $coordsr[2] . '.' . $coordsr[3];
	if(strstr($x, 'W')){
		$x = '-'.$x;
	}
	
	if(strstr($y, 'S')){
		$y = '-'.$y;
	}
	
	$x = preg_replace(array('/\*.*/'), array(''), $x);
	$y = preg_replace(array('/\*.*/'), array(''), $y);
	$countryCoor[$country] = array(
		'x' => $x,
		'y' => $y,
	);
	$count ++;
}

$count = 0;
$unDetectedCountry = array();
foreach ($coutries as $continet => $countrys){
	foreach ($countrys as $index => $country){
		if(!$countryCoor[$country]){
			$unDetectedCountry[] = $country;
			unset($countrys[$index]);
		} else {
			$country = $countryCoor[$country];
			$countrys[$index] = $country;
			$count++;
		}
	}
	$coutries[$continet] = $countrys;
}

////////////////入库
$continets = Lib_Location::GetLocationFromCName($continets);
$continets = Util_Array::AssColumn($continets, 'cname');

$count = 0;
DB::Debug();
foreach ($coutries as $contiCname => $cous){
	$continet = $continets[$contiCname];
	if(!$continet){
		echo $contiCname . "不存在 <br> \r\n";
		continue;
	}
	
	foreach ($cous as $countryCname => $coord){
		$location = array(
				'cname' => $countryCname,
				'lng' => $coord['x'],
				'lat' => $coord['y'],
				'info' => '',
				'comment' => '',
				'parent_id' => $continet['id'],
				'level' => Lib_Location::LEVEL_COUNTRY,
		);
		Lib_Location::Create($location);
	}
}