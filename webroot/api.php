<?php
/**
 * 对内API
 */
include_once dirname(dirname(__FILE__)).'/app.php';



$result = Lib_API::HandleRequest();
if ($_REQUEST['callbak']){
	header('Content-type: text/javascript; charset=UTF-8;');
} else {
	header('Content-type: application/json; charset=UTF-8;');
}
echo $result;