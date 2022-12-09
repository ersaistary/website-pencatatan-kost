<?php  
	session_start();
	require_once "connection.php";

	if (isset($_POST['Username'])&&isset($_POST['Password'])) {

		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$Username = validate($_POST['Username']);
		$Password = validate($_POST['Password']);

		if (empty($Username)) {
			header("Location: index.php?error=Username is required");
			exit();
		}elseif (empty($Password)) {
			header("Location: index.php?error=Password is required");
			exit();
		}else{
			$sql = "SELECT * FROM admin WHERE username ='$Username' AND password='$Password'";

			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_assoc($result);
				if($row['username'] === $Username && $row['password'] === $Password){
					$_SESSION['user_name'] = $row['user_name'];
            		$_SESSION['name'] = $row['name'];
            		$_SESSION['id'] = $row['id'];
            		header("Location: homepage.php");
		        	exit();
				}else{
					header("Location: index.php?error=Incorect User name or password");
		        	exit();
				}
			}else{
				header("Location: index.php?error=Incorect User name or password");
	    		exit();
			}
		}
	}else{
		header("Location: index.php");
		exit();
	}
?>