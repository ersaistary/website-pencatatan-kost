<?php 
include "connection.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$nama = $_POST['nama'];
		$nik = $_POST['nik'];
		$no_hp = $_POST['no_hp'];
		$jml = $_POST['jml'];
		$kontak = $_POST['kontak'];
		$no_kamar = $_POST['no_kamar'];

		if (empty ($nama||$nik||$no_hp||$jml||$kontak||$no_kamar)) {
			header("Location: create_profile.php?error=Harap Lengkapi Data");
			exit();
		}else{
			$sql = "INSERT INTO profile VALUES ('$_POST[nama]', '$_POST[nik]','$_POST[no_hp]','$_POST[jml]','$_POST[kontak]','$_POST[no_kamar]')";
			$result = mysqli_query($conn, $sql);
			header("Location: create_profile.php?error=Data Berhasil Ditambah");
			$conn->close();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="create_profile.css">
	<title>Tambah Data Penghuni</title>
</head>
<body>
	<form method="POST">
		<h1 style="padding-left: 490px; margin-top: 110px;">Tambah Data Penghuni</h1>
		<fieldset>
			Nama  :<br>
			<input type="text" name="nama">
			<br>
			NIK  :<br>
			<input type="text" name="nik">
			<br>
			No Handphone  :<br>
			<input type="text" name="no_hp">
			<br>
			Jumlah Penghuni  :<br>
			<input type="text" name="jml">
			<br>
			Kontak Darurat  :<br>
			<input type="text" name="kontak">
			<br>
			Nomor Kamar  :<br>
			<input type="text" name="no_kamar">
			<br>
			<?php if (isset($_GET['error'])) { ?>
     			<p class="error"><?php echo $_GET['error']; ?></p>
     		<?php }?>
			<button name="submit" value="submit">
				Insert
			</button>
		</fieldset>
		<button onclick="location.href='profile.php'" type="button" style="left: 800px; top: 20px;">
         Back</button>
	</form>
</body>
</html>