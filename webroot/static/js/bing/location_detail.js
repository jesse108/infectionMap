var mapObj;
var markers = [];

function mapInit(){
	mapObj = new VEMap('mapContainer');
	var location = new VELatLong(centerLocation['lat'], centerLocation['lng']);
	mapObj.LoadMap(location, 4);
	mapObj.SetCenter(location);
	marker = new VEShape(VEShapeType.Pushpin, location);
	marker.SetCustomIcon("<img src='/static/img/icon_maker.png' class='map_marker'/>");
	mapObj.AddShape(marker);
}