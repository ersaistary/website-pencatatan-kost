<?php 
include 'connection.php';

if (isset($_POST['update'])) {
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$no_hp = $_POST['no_hp'];
		$jml = $_POST['jml'];
		$kontak = $_POST['kontak'];
		$no_kamar = $_POST['no_kamar'];

		// write the update query
		$sql = "UPDATE `profile` SET `nama`='$nama',`no_hp`='$no_hp',`jml`='$jml',`kontak`='$kontak',`no_kamar`='$no_kamar' WHERE `nik`='$nik'";

		// execute the query
		$result = mysqli_query($conn, $sql);
		if ($result == TRUE) {
			header("Location: update_profile_verify.php?");
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


if(isset($_GET['nik'])){
		$nik = $_GET['nik'];

		// write SQL to get user data
		$sql = "SELECT * FROM `profile` WHERE `nik`='$nik'";

		//Execute the sql
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
		
			while ($row = $result->fetch_assoc()) {
				$nama = $row['nama'];
				$nik = $row['nik'];
				$no_hp = $row['no_hp'];
				$jml  = $row['jml'];
				$kontak = $row['kontak'];
				$no_kamar = $row['no_kamar'];
			}
?>

			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="update_profile.css">
				<title>Update Profile</title>
			</head>
			<body>
					<form method="post">
						<h1 style="padding-left: 490px; margin-top: 110px;">Update Data Penghuni</h1>
						<fieldset>
						    Nama  :<br>
							<input type="text" name="nama" value="<?php echo $nama; ?>">
							<br>
							NIK  :<br>
							<input type="text" name="nik" value="<?php echo $nik; ?>">
							<br>
							No Handphone  :<br>
							<input type="text" name="no_hp" value="<?php echo $no_hp; ?>">
							<br>
							Jumlah Penghuni  :<br>
							<input type="text" name="jml" value="<?php echo $jml; ?>">
							<br>
							Kontak Darurat  :<br>
							<input type="text" name="kontak" value="<?php echo $kontak; ?>">
							<br>
							Nomor Kamar  :<br>
							<input type="text" name="no_kamar" value="<?php echo $no_kamar; ?>">
							<br>
							<?php if (isset($_GET['error'])) { ?>
				     			<p class="error"><?php echo $_GET['error']; ?></p>
				     		<?php }?>
				     		<button type="submit" name="update" value="update">
								Insert
							</button>
						</fieldset>
					  
					  <button onclick="location.href='profile.php'" type="button" style="left: 800px; top: 20px;">
			         Back</button>
					</form>
			</body>
			</html>

<?php
		} else{
			// If the 'id' value is not valid, redirect the user back to view.php page
			header('Location: profile.php');
		}

	}
?>