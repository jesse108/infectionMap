var mapObj;
var marker;
var locationSearch;




/////////////map
function mapInit(lng,lat){
	mapObj = new VEMap('mapContainer');
	var location = new VELatLong(lat, lng);
	mapObj.LoadMap(location, 4);
	
	marker = new VEShape(VEShapeType.Pushpin, location);
	marker.SetCustomIcon("<img src='/static/img/icon_maker.png' class='map_marker'/>");
	mapObj.AddShape(marker);
	
	//点击事件
	mapObj.AttachEvent("onclick", function(e){
		var mapX = e.mapX;
		var mapY = e.mapY;
		var pixel  = new VEPixel(mapX,mapY);
		var latlog = mapObj.PixelToLatLong(pixel);
		$('#lngX').val(latlog['Longitude']);
		$('#latY').val(latlog['Latitude']);
		marker.SetPoints(latlog);
	});
}

function citySearch(){
	var cityName = $('#cname').val();
	if(cityName){
        try
        {
           results = mapObj.Find(null, //what
                              cityName, //where
                              null, //findType
                              null, //shapeLayer
                              0, // start index
                              1, //result num
                              false, //show result
                              false, //create result
                              true,  //useDefaultDisambiguation
                              false, //setBestMapView
                              searchReturn);
        }
        catch(e)
        {
        }
	}
}

function showLocationChange(lng,lat,type){
	var zoomLevel = type ? 3 : 2;
	mapObj.SetCenterAndZoom(new VELatLong(lat, lng), zoomLevel);
}

function searchReturn(layer,result,place){
	if(place){
		place = place[0];
		var latlog = place['LatLong'];
		$('#lngX').val(latlog['Longitude']);
		$('#latY').val(latlog['Latitude']);
		mapObj.SetCenterAndZoom(latlog, 9);
		marker.SetPoints(latlog);
	}
}
///////////////map end







