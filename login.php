<?php	

	session_start();
		//koneksi database
	require 'function.php';

	//cek apakah tombol submit sudah ditekan
	if(isset($_POST["login"])){
			$username = $_POST["username"];
			$password = $_POST["password"];



			$result = mysqli_query($conn, "SELECT * FROM `login` WHERE userLogin = '$username' and pwdLogin = '$password'");
			$cek = mysqli_num_rows($result);

			if($cek > 0){
				
				if($_SESSION['login'] = false){
					echo "<script> 
						alert('Username/Password Salah');
				</script>
			";
					
				}else{
					
					header("location: index.php");
			}
			}
// 			//cek username
// 			if(mysqli_num_rows($result)===1){

// 				//cek password 
// 				$row = mysqli_fetch_assoc($result);
// var_dump($row["pwdLogin"]);
// 				if(password_verify('321',$row["pwdLogin"])){
// 					var_dump($row["pwdLogin"]);
// 					//set session
// 					$_SESSION["login"]= true;

// 					header('Location: index.php');
// 					exit;
// 				}	
// 			}


			$error = true;
}
?>		

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
</head>
<body>
	<h1>LOGIN FORM</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username 	:</label>
				<input type="text" name="username" id="username" required>
			</li>

			<li>
				<label for="password">Password :</label>
				<input type="text" name="password" id="password" required>
			</li>
		</ul>
		<button type="submit" name="login">LOGIN</button>
	</form>
</body>
</html>