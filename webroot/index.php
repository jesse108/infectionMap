<?php
include_once dirname(dirname(__FILE__)).'/app.php';

$allInfections = Lib_Infection::GetALLInfection(); //所有传染病
$allLocations = Lib_Location::GetAllLocation(); //所有地区

$title ="传染病地图";
Template::Show();