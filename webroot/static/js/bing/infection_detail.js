//start map
var mapObj;
var markers = [];

function mapInit(){
	mapObj = new VEMap('mapContainer');
	mapObj.LoadMap(null, 4);
	//mapObj.HideDashboard();
    markMapInArea(allLocations);
}


function markMapInArea(locations){
	var curLocation;
	var curLocationID;
	
	if(!locations){
		return false;
	}

	var locationIDs = [];
	locationIDs = Util_Array.GetColunm(locations,'id','sub');
	
	for(var i in cases){
		curLocationID = cases[i]['location_id'];
		if(in_array(curLocationID,locationIDs)){
			curLocation = caseLocations[curLocationID];
			if(curLocation){
				mapAddTag(curLocation['lng'],Number(curLocation['lat']));
			}
		}
	}
	showTag();
	if(curLocation){
		var location = new VELatLong(curLocation['lat'], curLocation['lng']);
	} else {
		var location = new VELatLong(0, 0);
	}
	
	mapObj.SetCenterAndZoom(location, 2);
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
	var useCluster = false; //是否使用聚合
	
	if(useCluster){
		layer = new VEShapeLayer();
		for(var i in markers){
			var marker = markers[i];
			layer.AddShape(marker);
		}
		options = new VEClusteringOptions();
		options.Icon = new VECustomIconSpecification();
		
		options.Callback = function(clusters){
			for(var i in clusters){
				var clusterShape = clusters[i]['_clusterShape'];
				var locationCount = clusters[i]['Shapes'].length;
				clusterShape.SetCustomIcon("<div class='cluster_icon'><span class='cluster_txt'>" + locationCount+"</span></div>");
				dump(clusters[i]);
			}
			
		}
		layer.SetClusteringConfiguration(VEClusteringType.Grid,options);
		mapObj.AddShapeLayer(layer);
	} else {
		for(var i in markers){
			var marker = markers[i];
			mapObj.AddShape(marker);
		}
	}

}


//清除标点
function clearTag(){
	mapObj.Clear();
	markers = [];
}

function showLocationChange(lng,lat,level){
	dump(level);
	level =level ? level : 2;
	mapObj.SetCenterAndZoom(new VELatLong(lat,lng), level); //国家
}


function displayLocation(location){
	var level = 2;
	clearTag();
	markMapInArea([location]);
	
	switch(location['level']){
		case '2': //国家
			level = 4;
			break;
		case '3': //城市
			level = 7;
			break;
	}
	showLocationChange(location['lng'],location['lat'],level);	
}
/////////////////////end map