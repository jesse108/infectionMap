var mapObj;
var markers = {};

 $(function(){
   mapInit();
 });
  
  
function mapInit(){
    mapObj = new AMap.Map("mapContainer",{
        view: new AMap.View2D({
            zoom:3 //地图显示的缩放级别
        })	
    });  
    
	if(cities){
		for(var i in cities){
			var city = cities[i];
	        var marker = new AMap.Marker({
	            map:mapObj,
	            icon:"/static/img/icon_maker.png",
	            offset:new AMap.Pixel(-9,-32),
	            position:new AMap.LngLat(city['lng'], city['lat'])   // 构造坐标集合
	          });
	       markers[city['id']] = marker;
		}
	}
	
	if(center){
		mapObj.setCenter(new AMap.LngLat(center['lng'], center['lat']));
		if(center['level'] == 2){
			mapObj.setZoom(5);
		}
	}
	
}

function hideMark(locationID){
	if(markers[locationID]){
		markers[locationID].hide();
	}
}

