<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quick Start - Leaflet</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://opengeo.tech/maps/leaflet-search/src/leaflet-search.css" />
	<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
	<script src="https://opengeo.tech/maps/leaflet-search/src/leaflet-search.js"></script>
	<link rel="stylesheet" href="style.css" />
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>
</head>
<body>
<div id="map" style="width: 600px; height: 400px;"></div>
<script>
	const map = L.map('map').setView([38.24905,21.73823], 18);
	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
	//sample data values for populate map
	var data = [
		{"loc":[38.24814,21.73832], "title":"andrikopoulos"},
		{"loc":[38.24547,21.73551], "title":"masoutis"},
		{"loc":[38.24863,21.73898], "title":"spar"},
	];
	var markersLayer = new L.LayerGroup();	//layer contain searched elements
	map.addLayer(markersLayer);
	var controlSearch = new L.Control.Search({
		position:'topright',
		layer: markersLayer,
		propertyName: "name",
		initial: false,
		zoom: 18,
		marker: false
	});
	map.addControl( controlSearch );
	////////////populate map with markers from sample data
function storeMarkers(stores) {
  for (i in stores) {
    let name = stores[i].name;
    let marker = L.marker(
      L.latLng([stores[i].latitude, stores[i].longtitude]),
      {
        name: name,
        icon: greenIcon,
      }
    );
    marker.bindPopup("<b>" + name + "</b>");
    marker.addTo(markersLayer);
  }
}

function discountStoreMarkers(discountStores) {
  for (i in discountStores) {
    let name = discountStores[i].name;
    let marker = L.marker(
      L.latLng([discountStores[i].latitude, discountStores[i].longtitude]),
      {
        name: name,
        icon: orangeIcon,
      }
    );
    marker.bindPopup("<b>" + name + "</b>");
    marker.addTo(markersLayer);
  }
}
</script>
</body>
</html>
