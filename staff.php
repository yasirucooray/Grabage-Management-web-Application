<?php

include_once 'staff_location_model.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff page</title>
  <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
	<style type="text/css">
	body{
		background-color: lightgreen;
	}
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
 /* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
    #map {
        height: 100%;
margin: 50px auto 0px;
    }
		.head {


   width: 97.4%;

  color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}

.log{
	width: 97.9%;
	display: inline-block;
	color: white;
    background: black;
	text-align: right;
	border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 0px 0px 10px 10px;
	padding: 10px;
}
.news{
	height:500px;
  width: 100%;
  color: black;
  background: white;
  text-align-left:top;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 10px 10px;
  
  margin: 50px auto 0px;

}
.instruction
{
   margin: 30px auto 0px;
}
	</style>
}



</head>
<body>
	<div class="head">
		<img src="smart_garbage_collection_pmc.png" style="width:30%;height:20%;" >
		<h1>Colombo Garbage Collection project</h1>
	</div>
	<div class="log">
	<button class="logout"><a href=logout.php  style="text-decoration: none;">Log Out</a></button>
	</div>
  <div class="instruction">
    <h3><img src="http://maps.google.com/mapfiles/ms/icons/red-dot.png"> Need to clean immediate
    <img src="https://www.google.com/mapfiles/marker_green.png">  Not immediate</h3>
  </div>
	<div id="map" ></div>
	<script>
    var map;
    var marker;
    var infowindow;
    var locations = <?php get_all_locations() ?>;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var b_icon="https://www.google.com/mapfiles/marker_green.png";

    function initMap() {
       map = new google.maps.Map(document.getElementById('map'), {
         center: new google.maps.LatLng(6.927417, 79.861071),
                zoom: 15,
        });

       var infowindow = new google.maps.InfoWindow();
        var i ; 
        for (i = 0; i < locations.length; i++) {

          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][3], locations[i][4]),
          map: map,
          icon :   locations[i][7] === ' immediate' ?  red_icon:b_icon,
          });
          
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
          infowindow.setContent(locations[i][1],);
          infowindow.open(map, marker);
          }
          })(marker, i));
        }
      }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap">
</script>
</body>
</html>