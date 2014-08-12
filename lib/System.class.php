<?php
class System{
	const MESSAGE_ALL = 0;
	const MESSAGE_INDEX = 1;
	const MESSAGE_ADMIN = 2;
	const MESSAGE_SYS = 3; //系统消息 一般不给前端显示
	
	public static $messageKey = "System_message";
	
	public static function SetError($message,$type = self::MESSAGE_INDEX){
		$key = self::$messageKey . "_error_{$type}";
		Session::Set($key, $message);
	}
	
	public static function AddError($message,$type = self::MESSAGE_INDEX){
		$error = strval(self::GetError($type,true));
		$error = "{$error},{$message}";
		self::SetError($error,$type);
	}
	
	public static function GetError($types = self::MESSAGE_INDEX,$once = true){
		if($types == self::MESSAGE_ALL){ //获取所有
			$types = array(self::MESSAGE_INDEX,self::MESSAGE_ADMIN,self::MESSAGE_SYS);
		} else if(!is_array($types)){
			$types = array($types);
		} 
		
		$value = '';
		foreach ($types as $type){
			$key = self::$messageKey . "_error_{$type}";
			$currentValue = Session::Get($key,$once);
			if($currentValue){
				$value = "{$value},{$currentValue}";
			}
		}
		$value = trim($value,', ');
		return $value;
	}
	
	
	public static function SetNotice($message,$type = self::MESSAGE_INDEX){
		$key = self::$messageKey . "_notice_{$type}";
		Session::Set($key, $message);
	}
	
	public static function AddNotice($message,$type = self::MESSAGE_INDEX){
		$notice = strval(self::GetNotice($type,false));
		$notice = "{$notice},{$message}";
		self::SetNotice($notice,$type);
	}
	
	public static function GetNotice($type = self::MESSAGE_INDEX,$once = true){
		$key = self::$messageKey . "_notice_{$type}";
		$value = Session::Get($key,$once);
		$value = trim($value,', ');
		return $value;
	}
}