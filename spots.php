<?php
//$connection= mysqli_connect('localhost', 'root', '', 'webc');

$database="webc";
// Gets data from URL parameters.
$name = $_GET['name'];
$lat = $_GET['lt'];
$lng = $_GET['lg'];


// Opens a connection to a MySQL server.
/*$connection= mysqli_connect('localhost', 'root', '', 'webc');
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}

// Sets the active MySQL database.
$db_selected = mysqli_select_db($database,$connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}
*/
$con=mysqli_connect("localhost","root","","webc");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($con,"webc");

// ...some PHP code for database "test"...


// Inserts new row with place data.
$query = sprintf("INSERT INTO spots " .
         " (id, name,lat,lng ) " .
         " VALUES (NULL, '%s','%s','%s');",
         mysqli_real_escape_string($con, $name),
         mysqli_real_escape_string($con, $lat),
        mysqli_real_escape_string($con, $lng));
        
       
         
$result = mysqli_query($con, $query);
header("Location:admin.php");
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
mysqli_close($con);
?>