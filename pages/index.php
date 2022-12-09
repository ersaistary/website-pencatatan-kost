<!DOCTYPE html>
<html>
<head>
	<title>IOKOST</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="font-family: poppins;">
	<img src="RemovedBG.png">
	<form action="login.php" method="POST">
		<div id="inside">	
			<p>Username :</p>
			<input type="Username" name="Username" placeholder="Username">
			<p>Password :</p>
			<input type="Password" name="Password" placeholder="Password">

			<?php if (isset($_GET['error'])) { ?>
     			<p class="error"><?php echo $_GET['error']; ?></p>
     		<?php } ?>
     		<h1>     </h1>
			<button>Login</button>
		</div>
	</form>
</body>
</html>
