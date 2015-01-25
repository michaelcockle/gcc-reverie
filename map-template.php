<?php
/**
 * Template Name: Map
 * @package WordPress
 * @subpackage GCC
 */

get_header(); ?>


<h1>Map</h1>

	<section class="row collapse">
		<div class="large-9 small-9 columns">
		<div id="map"></div>
		</div>
		<div class="large-3 small-3 columns">
		<ul id="markers"></ul>
		</div>
	</section>







<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">





	var map;
	var arrMarkers = [];
	var arrInfoWindows = [];

	function mapInit(){
		var centerCoord = new google.maps.LatLng(54.001387537213866, -1.422128677368164); // GCC
		var mapOptions = {
			zoom: 10,
			center: centerCoord,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map"), mapOptions);

		$.getJSON("http://goldsboroughcricketclub.co.uk/wp-content/themes/gcc-reverie/maps/map.json", {}, function(data){
			$.each(data.places, function(i, item){
				$("#markers").append('<li><a href="#" rel="' + i + '">' + item.title + '</a></li>');
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(item.lat, item.lng),
					map: map,
					title: item.title
				});
				arrMarkers[i] = marker;
				var infowindow = new google.maps.InfoWindow({
					content: "<h3 class='map-title'>"+ item.title +"</h3><p class='map-description'>"+ item.description +"</p>"
				});
				arrInfoWindows[i] = infowindow;
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map, marker);
				});
			});
		});
	}


	$(function(){
		// initialize map (create markers, infowindows and list)
		mapInit();

		// "live" bind click event
/*		$("#markers a").live("click", function(){
			var i = $(this).attr("rel");
			// this next line closes all open infowindows before opening the selected one
			for(x=0; x < arrInfoWindows.length; x++){ arrInfoWindows[x].close(); }
				arrInfoWindows[i].open(map, arrMarkers[i]);
		});*/

		$(document).on("click", "#markers a", function(){
			var i = $(this).attr("rel");
			for(x=0; x < arrInfoWindows.length; x++){ arrInfoWindows[x].close(); }
				arrInfoWindows[i].open(map, arrMarkers[i]);
		});



	});



</script>

<?php get_footer(); ?>
