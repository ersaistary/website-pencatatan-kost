<?php 
include "connection.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['nik'])) {
	$user_id = $_GET['nik'];

	// write delete query
	$sql = "DELETE FROM `profile` WHERE `nik`='$user_id'";

	// Execute the query

	$result = mysqli_query($conn, $sql);

	if ($result == TRUE) {
		//echo "Record deleted successfully.";
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		fieldset{
			position: absolute;
			top: 130px;
			font-size: 13px;
			width: 710px;
			border-radius: 15px;
			border-radius: 15px;
			background-color: #F5F5F5;
			border-color: transparent;
			margin-left: 300px;
			margin-top: 100px;
			padding: 10px;
		}

		h1{
			margin-left: 200px;
		}

		button{
			position: absolute;
			top: 300px;
			width: 200px;
			border-radius: 15px;
			background-color: #AC3737;
			color: white;
			border-color: transparent;
			margin-left: 250px;
			padding: 3px;
			font-size: 12px;
			cursor: pointer;
		}
	</style>
</head>
<body style="font-family: poppins; background-image: url(vector.png); background-size: 1400px;">
	<fieldset>
		<h1>Data Telah Terhapus</h1>
	</fieldset>
	<button onclick="location.href='profile.php'" type="button" style="left: 800px; top: 20px;">
         Back</button>
</body>
</html>