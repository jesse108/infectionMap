<?php
/**
 * 默认数据库配置, 必须配置 rw:读写  ro:只读两个数据库
 * 若没有 ro 数据库,将只是用rw数据库
 */


$dbConfig = array();
////主数据库
$dbConfig['rw'] = array(
	'host' => '115.28.23.17',
	'user' => 'infection_test',
	'password' => '123456w',
	'name' => 'infection_map_test',//'dachequ',
);


//只读数据库
$dbConfig['ro'] = array(
	'host' => '115.28.23.17',
	'user' => 'infection_test',	
	'password' => '123456w',
	'name' => 'infection_map_test',//'dachequ',
);

$config['db'] = $dbConfig;