<?php
if (isset($_POST['displaypost'])) {
	


	$db = mysqli_connect("localhost","root","","demo");
	$row = mysqli_fetch_array($result);
	
	$lng =$row['lng'];
	$lat = $row['ltd'];
	$description = $row['description'];


	
	$sql = "INSERT INTO markers( description,lng,lat) VALUES ('$lng','$lat','$description')";
	mysqli_query($db,$sql);

	if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
	{
		$msg = "Image uploaded successfully";
	}

	else
	{
		$msg = "There was a problem in uploading the image";


	} 	 

}
?>
	