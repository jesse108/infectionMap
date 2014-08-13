var mapObj;
var marker;
var locationSearch;




/////////////map
function mapInit(lng,lat){
    mapObj = new AMap.Map("mapContainer",{
        view: new AMap.View2D({
            center:new AMap.LngLat(lng,lat),//地图中心点
            zoom:4 //地图显示的缩放级别
        })	
    });
    marker = new AMap.Marker({                 
      map:mapObj,                 
      icon:"/static/img/icon_maker.png",                 
      offset:new AMap.Pixel(-9,-32)               
    });
    AMap.event.addListener(mapObj,'click',getLnglat); 
    
    mapObj.plugin(["AMap.DistrictSearch"], function() {
        var opts = {
            subdistrict: 0,   
            extensions: 'base',
            level:'city'
        };
   
        locationSearch = new AMap.DistrictSearch(opts); //查询成功时的回调函数，定义如何展示请求返回结果
        AMap.event.addListener(locationSearch, 'complete', function(e){
        	var city = e['districtList'][0];
        	var lat = city['center']['lat'];
        	var lng = city['center']['lng'];
        	var pos = new AMap.LngLat(lng,lat);
        	mapObj.setZoom(7);
        	mapObj.setCenter(pos);
        	marker.setPosition(pos);
        });
        
    });
}

function getLnglat(e){ 
    document.getElementById("lngX").value=e.lnglat.getLng(); 
    document.getElementById("latY").value=e.lnglat.getLat(); 

    var lnglat = e.lnglat;
    marker.setPosition(lnglat);
   	mapObj.setCenter(lnglat);  
}


function citySearch(){
	var cityName = $('#cname').val();
	if(cityName){
		locationSearch.search(cityName);
	}
}

function showLocationChange(lng,lat){
	mapObj.setZoomAndCenter(4,new AMap.LngLat(lng,lat));
}

///////////////map end







