<?php 
include "connection.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$nama = $_POST['nama'];
		$tanggal = $_POST['tanggal'];
		$total = $_POST['total'];
		$id = $_POST['id'];

		if (empty ($nama||$tanggal||$total||$id)) {
			header("Location: create_transaction.php?error=Harap Lengkapi Data");
			exit();
		}else{
			$sql = "INSERT INTO transaksi VALUES ('$_POST[nama]', '$_POST[tanggal]','$_POST[total]','$_POST[id]')";
			$result = mysqli_query($conn, $sql);
			header("Location: create_transaction.php?error=Data Berhasil Ditambah");
			$conn->close();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="create_transaction.css">
	<title>Tambah Data Transaksi</title>
</head>
<body>
	<form method="POST">
		<h1 style="padding-left: 490px; margin-top: 175px;">Tambah Data Transaksi</h1>
		<fieldset>
			Nama  :<br>
			<input type="text" name="nama">
			<br>
			Tanggal  :<br>
			<input type="date" name="tanggal">
			<br>
			Total  :<br>
			<input type="text" name="total">
			<br>
			Id  :<br>
			<input type="text" name="id">
			<br>
			<?php if (isset($_GET['error'])) { ?>
     			<p class="error"><?php echo $_GET['error']; ?></p>
     		<?php }?>
			<button name="submit" value="submit">
				Insert
			</button>
		</fieldset>
		<button onclick="location.href='transaction.php'" type="button" style="left: 800px; top: 20px;">
         Back</button>
	</form>
</body>
</html>