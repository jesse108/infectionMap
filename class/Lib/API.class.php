<?php
class Lib_API{
	public static $class = "action";
	public static $method = "method";
	
	public static function HandleRequest(){
		$result = self::GetRequestResult();
		$result = self::Format($result);
		
		$callback= $_REQUEST['callback'];
		if($callback){
			$result = $callback . "({$result})";
		}
		return $result;
	}
	
	private static function GetRequestResult(){
		$action = $_REQUEST['action'];
		$method = $_REQUEST['method'];
		
		if(!$action || !$method){
			return array( 'code' => ERROR_CODE_FAIL,'message' => 'Lack Parameters');
		}
		$action = ucfirst(strtolower($action)); 
		$className = "API_{$action}";
		
		if(!class_exists($className)){ //不存在action
			return array( 'code' => ERROR_CODE_FAIL,'message' => 'Action not exists');
		}
		
		if(!method_exists($className, $method)){
			return array( 'code' => ERROR_CODE_FAIL,'message' => 'Method not exists');
		}
		
		$obj = new $className();
		$result = $obj->$method();
		
		$errorMsg = System::GetError(System::MESSAGE_ALL);
		$errorMsg = $errorMsg ? $errorMsg : 'Fail';

		if(!$result){
			$result = array('code' => ERROR_CODE_FAIL,'message' => $errorMsg);
		}
		
		if(!$result['code']){
			$result = array('code' => ERROR_CODE_SUCESS,'result' => $result);
		}
		
		if($result['code'] != ERROR_CODE_SUCESS && !$result['message']){
			$result['message'] = $errorMsg;
		}
		
		return $result;
	}
	
	public static function Format($result,$format = 'json'){
		switch ($format){
			case 'json':
			default:
				$result = Util_String::jsonEncode($result);
				break;
		}
		return $result;
	}
}