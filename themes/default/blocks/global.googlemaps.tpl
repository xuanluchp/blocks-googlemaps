<!-- BEGIN: main -->
<style type="text/css">
#map_canvas {height: {DATA.height};width: {DATA.width} }
</style>
<script type="text/javascript">
function initialize() {
    var myLatlng = new google.maps.LatLng({DATA.toado});
    var myOptions = {
      zoom: {DATA.zoom},
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	// Biến text chứa nội dung sẽ được hiển thị
	var text;
	text= "<img style='width:50px;' src='{DATA.logo}' />" + "<p style='color:#00F;font-size:12px;margin-left:5px;text-align:center'>{DATA.info}</p>";
	var infowindow = new google.maps.InfoWindow({
		content: text,
		size: new google.maps.Size(100,50),
		position: myLatlng
	});
	infowindow.open(map);
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title:"{DATA.tieude}"
	});
}
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	document.body.appendChild(script);
}
window.onload = loadScript;
</script>
<div id="map_canvas"></div>
<!-- END: main -->