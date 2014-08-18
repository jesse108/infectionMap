<?php
/**
 * 搜索结果页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$loginUser = Lib_User::GetLoginUser();
$keyword = $_GET['keyword'];
$type = $_GET['type'];

switch($type){
	case 2: //搜地区
		$locationResult = Lib_Search::SearchLocation($keyword);
		break;
	case 1://搜集疾病
	default:
		$infectionResult = Lib_Search::SearchInfection($keyword);
		break;
}

Template::Show();