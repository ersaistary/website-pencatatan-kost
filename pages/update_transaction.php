<?php 
include 'connection.php';

if (isset($_POST['update'])) {
		$nama = $_POST['nama'];
		$tanggal = $_POST['tanggal'];
		$total = $_POST['total'];
		$id = $_POST['id'];

		// write the update query
		$sql = "UPDATE `transaksi` SET `nama`='$nama',`tanggal`='$tanggal',`total`='$total' WHERE `id`='$id'";

		// execute the query
		$result = mysqli_query($conn, $sql);
		if ($result == TRUE) {
			header("Location: update_transaction_verify.php?");
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


if(isset($_GET['id'])){
		$id = $_GET['id'];

		// write SQL to get user data
		$sql = "SELECT * FROM `transaksi` WHERE `id`='$id'";

		//Execute the sql
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
		
			while ($row = $result->fetch_assoc()) {
				$nama = $row['nama'];
				$tanggal = $row['tanggal'];
				$total = $row['total'];
				$id  = $row['id'];
			}
?>

			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" type="text/css" href="create_transaction.css">
				<title>Update Transaksi</title>
			</head>
			<body>
					<form method="post">
						<h1 style="padding-left: 490px; margin-top: 110px;">Update Data Transaksi</h1>
						<fieldset>
						    Nama  :<br>
							<input type="text" name="nama" value="<?php echo $nama; ?>">
							<br>
							Tanggal  :<br>
							<input type="date" name="tanggal" value="<?php echo $tanggal; ?>">
							<br>
							Total  :<br>
							<input type="text" name="total" value="<?php echo $total; ?>">
							<br>
							Id  :<br>
							<input type="text" name="id" value="<?php echo $id; ?>">
							<br>
							<?php if (isset($_GET['error'])) { ?>
				     			<p class="error"><?php echo $_GET['error']; ?></p>
				     		<?php }?>
				     		<button type="submit" name="update" value="update">
								Update
							</button>
						</fieldset>
					  
					  <button onclick="location.href='transaction.php'" type="button" style="left: 800px; top: 20px;">
			         Back</button>
					</form>
			</body>
			</html>

<?php
		} else{
			// If the 'id' value is not valid, redirect the user back to view.php page
			header('Location: transaction.php');
		}

	}
?>