<?php
/**
 * 传染病列表页,  管理页
 */
include_once dirname(dirname(dirname(__FILE__))).'/app.php';

$infections = Lib_Infection::GetALLInfection(false);


Template::Show();