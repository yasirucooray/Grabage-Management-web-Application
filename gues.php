<?php
include_once'header.php';
include_once 'spots-locations.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>guess section</title>
	<style type="text/css">
	body{
		background-color: lightgreen;
	}
#map {
        height: 100%;
      }
		.head {


   width: 98.3%;

  color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}

.log{
	width: 98.7%;
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
  overflow: scroll;
  margin: 50px auto 0px;
  font-family:Times New Roman;

}
	</style>



</head>
<body>
	<div class="head">
		<img src="smart_garbage_collection_pmc.png" style="width:30%;height:20%;" >
		<h1>Colombo Garbage Collection project</h1>
	</div>
	<div class="log" >
		
		<h4>GTF member Registation <a href="register.php" style="text-decoration:none";>Sign up</a>
  	Login Here<a href="captainlogin.php" style="text-decoration:none";>    Login    </a></h4>
</div>

	 <h2 style="margin: 50px auto 0px";>Garbage Spots In Colombo</h2>
    <div id="map" ></div>
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

       var infowindow = new google.maps.InfoWindow();
        var i ; 
        for (i = 0; i < locations.length; i++) {

          marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][2], locations[i][3]),
          map: map,
          
          });
        
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {

          infowindow.setContent(locations[i][1]);
          infowindow.open(map, marker);
          }
          })(marker, i));
        }
     

      }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap">
</script>
<div class="news">
	<h1>News And Articals</h1>
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name,description FROM news order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " Name: " . $row["name"]. "<br>";
       echo " " . $row["description"]. "<br><br><hr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</div>


</body>
</html>