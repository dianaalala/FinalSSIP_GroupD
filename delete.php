<?php
session_start();

if (!isset($_SESSION ["login"])) {

		header("Location: login.php");
		exit;
}
//koneksi database
require 'function.php';

//mendapatkan id
$id = $_GET["userID"];

//pengkondisian yang dimana function delete akan mengambil data id
//dan kemudian menghapus
if (delete($id)>0) {
	echo "<script> 
						alert('Data berhasil dihapus!');
						document.location.href='index.php';
				</script>
			";
}else{
	echo "<script> 
						alert('Data gagal dihapus!');
						document.location.href='index.php';
				</script>
			";
}

  ?>