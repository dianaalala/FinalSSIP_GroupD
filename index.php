<?php

session_start();

if (!isset($_SESSION ["login"])) {

		header("Location: login.php");
		exit;
}
//koneksi database
require 'function.php';

//memunculkan semua data pada table user
$user = query("SELECT *FROM user");

//tombol cari ditekan
if(isset($_POST["search"])){

	$user = search($_POST["keyword"]);

	}else{
		
		$user = query("SELECT *FROM user");
}
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>DATA USERS</title>
</head>
<body>
<button><a href="logout.php">Logout</a></button> 

<h1> DATA USER </h1>

<button><a href="add.php">Add Data</a></button> 
<br><br>

<form action="" method="post">
	
	<input type="text" name="keyword" size="20" autofocus placeholder="Masukkan kata pencarian" autocomplete="off">
	<button type="submit" name="search">Search</button>
	<br><br>

</form>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Telp</th>
		<th>Opsi</th>
	</tr>

	<?php $i =1;?>
	<?php foreach($user as $row):?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["userName"];?></td>
		<td><?= $row["userEmail"];?></td>
		<td><?= $row["userTelp"];?></td>
		<td>
			<a href="edit.php?userID=<?= $row["userID"]; ?>">Edit | </a>
			<a href="delete.php?userID=<?= $row["userID"];?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
		</td>
	</tr>
	<?php $i++ ?>
<?php endforeach;?>

</table>
</body>
</html>