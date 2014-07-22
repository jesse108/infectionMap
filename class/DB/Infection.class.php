<?php
class DB_Infection extends DB_Model{
	public $tableName = 'infection';
	
	public function create($condition,$duplicateCondition = null){
		if($condition['cname']){
			$condition['frist_char'] = Util_String::getFristCharOfCNStr($condition['cname']);
		}
		
		if($duplicateCondition && $duplicateCondition['cname']){
			$duplicateCondition['frist_char'] = Util_String::getFristCharOfCNStr($duplicateCondition['cname']);
		}
		
		return parent::create($condition,$duplicateCondition);
	}
	
	
	public function update($condition, $updateRow,$oldRow = null){
		if($updateRow['cname']){
			$updateRow['frist_char'] = Util_String::getFristCharOfCNStr($updateRow['cname']);
		}
		
		return parent::update($condition, $updateRow,$oldRow);
	}
}