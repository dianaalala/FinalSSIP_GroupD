<?php
	session_start();

if (!isset($_SESSION ["login"])) {

		header("Location: login.php");
		exit;
}
	//koneksi database
	require 'function.php';

	//cek apakah tombol submit sudah ditekan
	if(isset($_POST["submit"])){

		//cek apakah data berhasil ditambah
		if(add($_POST)>0){
			echo "<script> 
						alert('Data berhasil ditambahkan!');
						document.location.href='index.php';
				</script>
			";
		}else{
			echo "<script> 
						alert('Data gagal ditambahkan!');
						document.location.href='index.php';
				</script>
			";
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
</head>
<body>
	<h1>ADDITIONAL DATA</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="name">Name 	:</label>
				<input type="text" name="name" id="name" required>
			</li>

			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required>
			</li>

			<li>
				<label for="telp">No. Telp 	:</label>
				<input type="text" name="telp" id="telp" required>
			</li>
		</ul>
		<button type="submit" name="submit">ADD</button>
	</form>
</body>
</html>