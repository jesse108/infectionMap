<?php
$mapConfig = array(
	'use_bing_map' => !true,
	
	'bing' => array(
		'host' => 'http://dev.ditu.live.com/mapcontrol/mapcontrol.ashx?v=6.2',
	//	'host' => 'http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3',
	),
		
	'amap' => array(
		'host' => 'http://webapi.amap.com/maps?v=1.3&key=dbb6bc63f724a1f9099ecd0a6acf3871',
	),
);

$config['map'] = $mapConfig;