<?php

$id="";
$confirmed="";
$important="";

$database="webc";
// Gets data from URL parameters.
if(isset($_POST['submited']))
{
$id =  $_POST['id'];
$confirmed = $_POST['confirme'];
$important = $_POST['important'];
}

// Opens a connection to a MySQL server.

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



$query=  "update marker set location_status = '$confirmed',important='$important' WHERE id = '$id' ";
$result = mysqli_query($con,$query);
    echo "Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
mysqli_close($con);
header("Location:caption.php");
?>