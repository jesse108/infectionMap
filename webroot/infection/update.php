<?php
/**
 * 传染病 更新/创建 页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';
$id = $_REQUEST['id'];

if($id){
	$oldInfection = $infection = Lib_Infection::Fetch($id);
	if(!$infection){
		System::SetError('传染病ID不正确,请从正确入口进入~');
		Utility::Redirect();
	}
}

if($_POST){
	$infection = array(
		'cname' => $_POST['cname'],
		'ename' => $_POST['ename'],
		'pathogen_cname' => $_POST['pathogen_cname'],
		'pathogen_ename' => $_POST['pathogen_ename'],
		'taxonomy' => $_POST['taxonomy'],
		'infection_source' => $_POST['infection_source'],
		'susceptible_pop' => $_POST['susceptible_pop'],
		'infection_path' => $_POST['infection_path'],
		'judge_standard' => $_POST['judge_standard'],
		'prevention' => $_POST['prevention'],
		'treatment' => $_POST['treatment'],
	);
	
	if($id){
		//update
		$result = Lib_Infection::UpdateInfection($infection,$oldInfection);
		if($result){
			System::SetNotice("更新成功");
			Utility::Redirect("/infection/update.php?id={$id}");
		}
	} else {
		//create
		$id = Lib_Infection::CreateInfection($infection);
		if($id){
			System::SetNotice("创建成功");
			Utility::Redirect("/infection/update.php?id={$id}");
		}
	}
	System::SetError("更新失败:" . Lib_Infection::GetError());
}

Template::Show();