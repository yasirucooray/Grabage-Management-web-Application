<?php
include_once'header.php';
include_once 'spots-locations.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<style type="text/css">
		html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color:lightgreen;
      }
		#map {
        height: 100%;
        margin: 30px auto 0px;
      }
		.head{
				width: 98.3%;
				color: black;
				background: white;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				border-radius: 10px 10px 0px 0px;
				padding: 1%;
				font-size: 9px;
			}
		.log{
				width: 98.7%;
				display:inline-block;
				color: white;
				background: black;
				text-align: right;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				border-radius: 0px 0px 10px 10px;
				padding: 10px;

			}
	 .logout{
				background-color: lightblue;
			}
	 .short {
				width: 98.3%;
				color: black;
				background: white;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				padding: 1%;
				margin: 30px auto 0px;
				text-align-left:top;
			}	
		.con{
				background-color: lightblue;
				height :45px;
				width :8%;
			}
		.for{
  width: 98.3%;
color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}
		.add{
				width: 98.3%;
				color: black;
				background: white;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				padding: 1%;
				margin: 30px auto 0px;
				text-align-left:top;
			}
	   .news{
		      width: 98.3%;
				color: black;
				background: white;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				padding: 1%;
				margin: 30px auto 0px;
				text-align-left:top;
			}
	</style>
</head>
<body>
	<div class="head">
		<img src="smart_garbage_collection_pmc.png" style="width:22%; height:10%;" >
		<h1>Colombo Garbadge Collection project</h1>
		<h1 style=" text-align: center; font-size: 30px; ">Admin Page</h1>
	</div>	
	<div class="log">
	
	<button class="logout"><a href=logout.php  style="text-decoration: none; ">Log Out</a></button>
    </div>
     <h2 style="margin: 50px auto 0px";>Add Grabage dumps in Colombo</h2>
	<div id="map" height="460px" width="100%"></div>
    
   
<div id="for" style="display: none">
<form id="form" method="GET" action="spots.php">
      <table>
      <tr><td>Name   :<br><input type='text' name='name'/> </td> </tr>
  	  <tr><td>lat:<br><input type="text" name="lt" id="lt"></tr></td><tr><td>lng:<br><input type="text" name="lg" id="lg"></td> </tr>
      <tr><td><button name="submited" onclick="myFunction()">Get Location and save</button></td></tr>
      </table>
</form>
</div>


    <script>
      var map;
      var marker;
      var infowindow;
       var locations = <?php get_all_locations() ?>;
	
      function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
         center: new google.maps.LatLng(6.927417, 79.861071),
                zoom: 15,
        });
        
        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });

     
        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map

          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });});

   	 var i ; 
          for (i = 0; i < locations.length; i++) {

          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][2], locations[i][3]),
          map: map,
          
          });
         
        }

      }

    </script>
	<script>
		function myFunction() {
  		var latlng = marker.getPosition();
  		document.getElementById("lt").value = latlng.lat();
  		document.getElementById("lg").value = latlng.lng();
		}
	</script>
	

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM0t5kVaz4vJBow1xYe5AQaPhclD5dquE&callback=initMap">
    </script>
	<div class="short">
	<h3> Shortcuts</h3>
	<h4> See other pages</h4>
	<button class="con"><a href=caption.php  style="text-decoration: none; ">Caption page</a></button>
	<button class="con"><a href=members.php  style="text-decoration: none; ">Member page</a></button>
	<button class="con"><a href=staff.php  style="text-decoration: none; ">Staff page</a></button>

	</div>
	
	<div class="add">
	<h3> New Accounts</h3>
	<h4> Creating new accounts for Caption and staff to log web site </h4>
	<a href=register.php  style="text-decoration: none; ">CREATE ACCOUNTS</a>
	</div>
	<div class="news">
	 <h3> Add News And Articals </h3>
	 
	<div id="com-form">
		<form  action="news.php" method="POST" >
			
			<p><label>Name</label>
			<input type='text' name='name'/></p>
			<p>News  or Articals</p><textarea  name='discription' rows="5" cols="40" placeholder="Write a comment..."></textarea>
			<input  type="submit" name='submit' value="Submit">
			
		</form>
	</div>

</body>
</html>