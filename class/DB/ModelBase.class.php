<?php
class DB_ModelBase extends DB_Model{
	const ACTOR_TYPE_SYSTEM = 0;
	const ACTOR_TYPE_USER = 1;
	const ACTOR_TYPE_ADMIN = 2;
	
	public function getCurrentUser(){
		return false;
	}
}