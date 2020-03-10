<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_GET['username'];
$password = $_GET['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$result = mysqli_query($conn,"select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($result);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['id'] = $row["id"];
	header("location:feed.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>