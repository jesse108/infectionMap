<?php
class DB_Infection extends DB_ModelBase{
	public $tableName = 'infection';
	
	public function create($condition,$duplicateCondition = null,$actorType = 0,$actorID = 0){
		if($condition['cname']){
			$condition['frist_char'] = Util_String::getFristCharOfCNStr($condition['cname']);
		}
		
		if($duplicateCondition && $duplicateCondition['cname']){
			$duplicateCondition['frist_char'] = Util_String::getFristCharOfCNStr($duplicateCondition['cname']);
		}
		
		return parent::create($condition,$duplicateCondition,$actorType,$actorID);
	}
	
	
	public function update($condition, $updateRow,$oldRow = null,$actorType = 0,$actorID = 0){
		if($updateRow['cname']){
			$updateRow['frist_char'] = Util_String::getFristCharOfCNStr($updateRow['cname']);
		}
		
		return parent::update($condition, $updateRow,$oldRow,$actorType,$actorID);
	}
}