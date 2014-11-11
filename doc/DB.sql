create table if not exists `user`(
	`id` bigint(20) not null primary key auto_increment,
	`username` varchar(32) NOT NULL comment '用户名',
	`pwd` varchar(124) not null comment '密码',
	`email` varchar(64),
	`sex` tinyint(1) not null default 0 comment '0:未知 1:男 2:女',
	`mobile` varchar(24),
	`create_time` int(10) not null default 0,
	`update_time` int(10) not null default 0,
	`login_time` int(10) not null default 0,
	`login_ip` varchar(32),
	`status` tinyint(2) not null default 0 comment '0:正常',
	key(`mobile`),
	key(`email`)
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin comment '用户表';


create table if not exists `location`(
	`id` bigint(20) not null primary key auto_increment,
	`cname` varchar(32) not null comment '中文名',
	`ename` varchar(256) not null comment '英文名',
	`lng` decimal(10,7) not null default 0 comment '纬度',
	`lat` decimal(10,7) not null default 0 comment '经度',
	`info` varchar(500),
	`comment` varchar(500),
	`level` tinyint(2) not null default 0,
	`status` tinyint(2) not null default 0,
	`parent_id` bigint(20) not null default 0,
	`is_port` tinyint(1) not null default 0 comment '是否是港口',
	key(`lng`,`lat`)
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin comment '地点信息';


create table if not exists `infection`(
	`id` bigint(20) not null primary key auto_increment,
	`status` tinyint(2) not null default 0,
	`cname` varchar(40) not null default '' comment '中文名',
	`frist_char` char(1) not null default '' comment '首字母',
	`ename` varchar(100) not null default '' comment '英文名',
	`pathogen_cname` varchar(40) not null default '' comment '病原体中文名',
	`pathogen_ename` varchar(100) not null default '' comment '病原体英文名',
	`taxonomy` varchar(40) comment '分类学地位',
	`infection_source` varchar(40)  comment '传染源',
	`susceptible_pop` varchar(40)  comment '易感人群',
	`infection_path` varchar(40) comment '传染途径',
	`judge_standard` varchar(500) comment '判断标准',
	`prevention` varchar(500) comment '预防措施',
	`treatment` varchar(500) comment '治疗措施',
	`comment` varchar(500) comment '备注'
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin comment '传染病信息';



create table if not exists `infection_case`(
	`id` bigint(20) not null primary key auto_increment,
	`location_id` bigint(20) not null default 0,
	`infection_id` bigint(20) not null default 0,
	`start_time` int(10) not null default 0 comment '发病时间',
	`end_time` int(10) not null default 0 comment '发病结束时间',
	`case_number` int(10) not null default 0 comment '发病人数',
	`case_rate` decimal(10,4) not null default 0 comment '发病率',
	`ill_number` int(10) not null default 0 comment '患病人数',
	`ill_rate` decimal(10,4) not null default 0 comment '患病率',
	`comment` varchar(500) comment '备注',
	`comment_link` varchar(500) comment '备注来源',
	key(`location_id`),
	key(`infection_id`),
	key(`start_time`)
)ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_bin comment '传染病案例';









