<?php
include_once dirname(dirname(dirname(__FILE__))).'/app.php';

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$autoLogin = $_POST['auto_login'];

$loginUser = Lib_User::Login($username, $pwd,$autoLogin);

if($loginUser){
	System::AddNotice("登陆成功");
}

Utility::Redirect();