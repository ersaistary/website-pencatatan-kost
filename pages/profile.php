<?php 
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="profile.css" />
</head>
<body>
	<div class="sidebar">
		<a href="homepage.php">
			<img src="homepage img.png" style="width: 150px; padding-left: 22px; padding-top: 10px;">
		</a>
      	<ul class="nav">
	        <li>
	        	<a href="profile.php">
	        		<img src="boy.png">
	        		<span style="padding-left: 73px;">Profile</span>
	        	</a>
	        </li>
	        <li>
	        	<a href="transaction.php">
	        		<img src="transaction.png">
	        		<span style="padding-left: 65px;">Transaksi</span>
	        	</a>
	        </li>
	        <li>
	        	<a href="index.php">
	        		<button>Logout</button>
	        	</a>
	        </li>
      	</ul>
    </div>
    <div class="main">
    	<img src="boy.png" style="width: 40px; float: left; padding-left: 350px; padding-top: 20px;">
    	<header>Data Penghuni</header>
    	<a href="create_profile.php">
	    	<button>Tambah Data</button>
    	</a>
    	
    	<table>
    		<tr style="font-weight: bold;">
    			<td>Nama</td>
				<td>NIK</td>
				<td>No Handphone</td>
				<td>Kontak Darurat</td>
				<td>Nomor Kamar</td>
				<td>Action</td>
    		</tr>
	    	<?php
	    	$sql = "SELECT * FROM profile";
			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
			?>
					<tr>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['nik']; ?></td>
						<td><?php echo $row['no_hp']; ?></td>
						<td><?php echo $row['kontak']; ?></td>
						<td><?php echo $row['no_kamar']; ?></td>
						<td>
							<a href="update_profile.php?nik=<?php echo $row['nik']; ?>">
								<img src="edit.png">
							</a>
							&nbsp;
							<a href="delete_profile.php?nik=<?php echo $row['nik']; ?>">
								<img src="delete.png">
							</a>
						</td>
					</tr>	
						
			<?php }
			}
			?>
    	</table>
    	
    </div>
</body>
</html>