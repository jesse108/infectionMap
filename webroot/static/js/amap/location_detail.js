var mapObj;
var markers = [];

function mapInit(){
  mapObj = new AMap.Map("mapContainer");

  var marker = new AMap.Marker({
    map:mapObj,
    icon:"/static/img/icon_maker.png",
    offset:new AMap.Pixel(-9,-32),
    position:new AMap.LngLat(centerLocation['lng'], centerLocation['lat'])   // 构造坐标集合
  });

  mapObj.setCenter(new AMap.LngLat(centerLocation['lng'], centerLocation['lat']));

}