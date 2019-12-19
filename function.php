<?php 
		
//konesi database
$conn = mysqli_connect("localhost","root","","infodata");
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

function query($query){
	//membuat $conn menjadi var global
	global $conn;
	//melakukan koneksi databae dengan query
	$result = mysqli_query($conn,$query);
	$rows = [];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}

function add($data){
	//membuat $conn menjadi var global
	global $conn;
	//ambil data dari setiap elemen form
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$telp = htmlspecialchars($data["telp"]);

	//insert data
	$query = "INSERT INTO `user`(`userName`, `userEmail`, `userTelp`) VALUES ('$name','$email',$telp)";
	//melakukan koneksi databae dengan query
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function delete($id){
	//membuat $conn menjadi var global
	global $conn;
	//melakukan koneksi databae dengan query
	mysqli_query($conn, "DELETE FROM user WHERE userID = $id");
	return mysqli_affected_rows($conn);
}

function edit($data){
	global $conn;
	//ambil data dari setiap elemen form
	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$email = htmlspecialchars($data["email"]);
	$telp = htmlspecialchars($data["telp"]);

	//insert data
	$query = "UPDATE `user` SET `userID`='$id',`userName`='$name',`userEmail`='$email',`userTelp`='$telp' WHERE userID = '$id'";
	//melakukan koneksi databae dengan query
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function search($keyword){
	$query = "SELECT *FROM user WHERE 
	userName LIKE '%$keyword%' OR
	userEmail LIKE '%$keyword%' OR
	userTelp LIKE '%$keyword%'
	";

	return query($query);
}
?>