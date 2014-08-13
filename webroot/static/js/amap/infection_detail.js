//start map
var mapObj;
var markers = [];

function mapInit(){
    mapObj = new AMap.Map("mapContainer",{
    	zoom:2//地图显示的缩放级别
    });
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
				mapAddTag(curLocation['lng'],curLocation['lat']);
			}
		}
	}
	showTag();
	mapObj.setCenter(new AMap.LngLat(curLocation['lng'], curLocation['lat']));
}

//向地图添加标点
function mapAddTag(lng,lat){
	var marker = new AMap.Marker({
		position:new AMap.LngLat(lng,lat) ,//基点位置
		icon:"/static/img/icon_maker.png" //marker图标，直接传递地址url
	});
	markers.push(marker);
}

//显示标点
function showTag(){
	mapObj.plugin(["AMap.MarkerClusterer"],function(){
		cluster = new AMap.MarkerClusterer(mapObj,markers);
	});
}


//清除标点
function clearTag(){
    if(cluster) {
        cluster.setMap(null);
    }
	markers= [];
}



function showLocationChange(lng,lat){
	//mapObj.setZoomAndCenter(4,new AMap.LngLat(lng,lat));
}

/////////////////////end map