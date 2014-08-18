<?php
/**
 * 
 * @author Jesse  jesse_108@163.com
 *
 */
class Lib_User{	
	const STATUS_NORMAL = 0; //正常状态
	const STATUS_INVITED = 1; //邀请中
	
	const TYPE_NORMAL = 0;
	const TYPE_MASTER = 1;
	
	public static $cookieExpire = 15; //单位天
	public static  $masterID = array(); //专家ID
	
	public static $error = '';
	public static $loginUser = array();
	
	
	public static function Fetch($userIDs,$key = 'id'){
		$dbUser = DB_Manage::createDBObj('user');
		return $dbUser->fetch($userIDs,$key);
	}
	
	
	public static function Login($name,$password,$autoLogin = false){
		if(!$name || !$password){
			return false;
		}
		$dbUser = DB_Manage::createDBObj('user');
		$user = $dbUser->fetch($name,'username');
		
		///没有则创建
		if(!$user && false){
			$user = array(
				'username' => $name,
				'pwd' => md5($password),
			);
			$userID = $dbUser->create($user);
			if(!$userID){
				System::AddError($dbUser->error);
				$user = false;
			} else {
				$user = self::Fetch($userID);
			}
		}
			
		if(!$user || $user['pwd'] != md5($password)){
			System::AddError("账号或密码错误");
			return false;
		}
		
		if($user['status'] != self::STATUS_NORMAL){
			System::AddError("用户状态错误");
			return false;			
		}
		
		Session::Set(SESSION_LOGIN_USER_ID, $user['id']);
		self::$loginUser = $user;
		if($autoLogin){
			Cookie::Set(COOKIE_LOGIN_USER_ID,$user['id'],self::$cookieExpire * 86400);
		}
		
		return $user;
	}
	
	public static function NeedLogin($redirectUrl = '/'){
		$loginUser = self::GetLoginUser();
		if(!$loginUser){
			System::AddError("请先登录");
			Utility::SetReturnUrl();
			Utility::Redirect($redirectUrl);
		}
		return $loginUser;
	}
	
	public static function GetLoginUser(){
		if(self::$loginUser){
			return self::$loginUser;
		}
		
		$loginUserID = Session::Get(SESSION_LOGIN_USER_ID);
		$loginUserID = $loginUserID ? $loginUserID : Cookie::Get(COOKIE_LOGIN_USER_ID);
		if(!$loginUserID){
			return false;
		}
		
		
		$dbUser = DB_Manage::createDBObj('user');
		$user = $dbUser->fetch($loginUserID);
		
		if($user['status'] != self::STATUS_NORMAL){
			self::Logout();
			return false;
		}
		return $user;
	}
	
	
	public static function Logout(){
		self::$loginUser = array();
		Session::Del(SESSION_LOGIN_USER_ID);
		Cookie::Del(COOKIE_LOGIN_USER_ID);
		return true;
	}
	
	public static function Create($user){
		$dbUser = DB_Manage::createDBObj('user');
		System::SetError('用户创建失败:'.$dbUser->error,System::MESSAGE_SYS);
		return $dbUser->create($user);
	}
	
}