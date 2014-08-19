var mapObj;
var markers = [];

 $(function(){
   mapInit();
 });
 
function mapInit(){
	mapObj = new VEMap('mapContainer');
	mapObj.LoadMap(null, 4);
	if(cities){
		markMapInArea(cities);
	}
	
	
	center = center ? center : {level : 1,lat:50,lng:100}
	
	if(center){
		var location = new VELatLong(center['lat'], center['lng']);
		if(center['level'] == 1){
			mapObj.SetCenterAndZoom(location, 2); //大洲
		} else {
			mapObj.SetCenterAndZoom(location, 3); //国家
		}
		
	}
}

function markMapInArea(locations){
	var curLocation;
	var curLocationID;
	
	if(!locations){
		return false;
	}
	
	for(var i in locations){
		curLocation = locations[i];
		mapAddTag(curLocation['lng'],Number(curLocation['lat']));	
	}
	showTag();

}

//向地图添加标点
function mapAddTag(lng,lat){
	var location = new VELatLong(lat, lng);
	marker = new VEShape(VEShapeType.Pushpin, location);
	marker.SetCustomIcon("<img src='/static/img/icon_maker.png' class='map_marker' />");
	markers.push(marker);
}

//显示标点
var options;
function showTag(){
	for(var i in markers){
		var marker = markers[i];
		mapObj.AddShape(marker);
	}
}