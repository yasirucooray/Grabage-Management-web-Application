<?php
include_once'header.php';
include_once 'locations_model.php';
?>
<!DOCTYPE html>
<head>
    <title>caption page</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

	<style type="text/css">
	body{
		background-color: lightgreen;
	}
#map {
        height: 685px;
        width: 70%;
        margin: 50px auto 0px;
        position:absolute; right: : 300px; 
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
.for{
  width: 99%;
color: black;
  background: white;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 1%;
}
.logout{
background-color: lightblue;
}
#locations{
  height:660px;
  width: 30%;
  color: black;
  background: #808080;
  border: 1px solid #B0C4DE;
  border-bottom: none;
 
 text-align: :left;
  margin: 50px auto 0px;
position:absolute; left: 70%; 

}
.info{
  text-align: justify;
  height: 95%;
  background-color: lightgray;
  text-align: center;
  
  border-width: 5px;
  width: 100%;
  color:black;
  font-size: 22px;

 overflow:auto;

    }
    
	</style>




</head>
<body>
	<div class="head">
		<img src="smart_garbage_collection_pmc.png" style="width:30%;height:20%;" >
		<h1>Colombo Garbage Collection project</h1>
	</div>	
	<div class="log">
	<p>Loging As Captain</p>
	<button class="logout"><a href=logout.php  style="text-decoration: none;">Log Out</a></button>

	</div>
 	
<h3 style="margin: 50px auto 0px;"> Members Add Locations</h3>

<script type="text/javascript">
  function required()
{
var empt = document.forms["form"]["id"].value;
    if (empt == "")
    {
          alert("Please input a Value");
          return false;
    }
    else 
    {
          alert('Confirme  the location successfuly');
          return true; 
    }
}
</script>
<div id="map" ></div>
<div id="for" style="display: none">
       <form id="form" method="POST" action="con_location.php?" onsubmit="required()">
      <table>
      <tr><td>Location id  :<br><input type='text' name='id'/> </td> </tr>
      <tr><td>Important :<br><input type='text' name='important' placeholder="immediate or Not"/> </td> </tr>
      <tr><td>Confirmed :<br><input type='text' name='confirme' placeholder="Yes/No" size="3" maxlength="3" /></td></tr>
      <tr><td><button name="submited" >Get Location and save</button></td></tr>
      </table>
</form>
</div>
<!------ Include the above in your HEAD tag ---------->
<script>
    var map;
    var marker;
    var infowindow;
    var locations = <?php get_all_locations() ?>;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var g_icon="https://www.google.com/mapfiles/marker_green.png";

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
          
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
           
          infowindow.setContent(form);
          icon :   locations[i][6] === 'yes' ?  red_icon:g_icon,
          infowindow.open(map, marker);
          }
          })(marker, i));
        }
     

      }
</script>
<script>
function myFunction() {
  var latlng = marker.getid();
  document.getElementById("id").value = latlng.id();
  

}
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap">
</script>
<div id="locations">
  <h4>GTF Members Add locations</h4>
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

$sql = "SELECT id, name,image,lat,lng,description,location_status FROM marker order by id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
     echo '<div class="info">';
    while($row = $result->fetch_assoc()) {
echo "<br>";
 
$s=$row['image'];
  

   echo '<img src="'.$s.'" style="width:250px;height:100px;">';
echo "<h5><p>";
        echo " ID          :    " . $row["id"]. "<br>";
        echo " NAME        :    " . $row["name"]. "<br>";
        
        echo " LATITUDE    :    " . $row["lat"]. "<br>";
        echo " LANGATIUTE  :    " . $row["lng"]. "<br>";
        echo " Description :    " . $row["description"]. "<br>";
        echo " CONFIRMED   =    " . $row["location_status"]. "<hr>";
        echo "</p></h5>";
    }
    echo "</div>";
}  


else {
    echo "0 results";
}
$conn->close();
?>

</div>



</body>
</html>