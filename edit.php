<?php
	session_start();

if (!isset($_SESSION ["login"])) {

		header("Location: login.php");
		exit;
}
	//koneksi database
	require 'function.php';

	//ambil data di url
	$id = $_GET["userID"];
	
	//query data user berdasarkan id
	$user = query("SELECT *FROM user WHERE userID = $id")[0];

	//cek apakah tombol submit sudah ditekan
	if(isset($_POST["submit"])){

		//cek apakah data berhasil diubah
		if(edit($_POST)>0){
			echo "<script> 
						alert('Data berhasil diubah!');
						document.location.href='index.php';
				</script>
			";
		}else{
			echo "<script> 
						alert('Data gagal diubah!');
						document.location.href='index.php';
				</script>
			";
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>
	<h1>EDIT DATA</h1>

	<form action="" method="post">
		<ul>
			
				<input type="hidden" name="id" id="id" required value="<?= $user["userID"];?>">
		

			<li>
				<label for="name">Name 	:</label>
				<input type="text" name="name" id="name" required value="<?= $user["userName"];?>">
			</li>

			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $user["userEmail"];?>">
			</li>

			<li>
				<label for="telp">No. Telp 	:</label>
				<input type="text" name="telp" id="telp" required value="<?= $user["userTelp"];?>">
			</li>
		</ul>
		<button type="submit" name="submit">EDIT</button>
	</form>
</body>
</html>