<?php
session_start();
require_once "koneksi.php";

$un = $_POST['username'];
$pw = md5($_POST['password']);

$sql = mysqli_query($konek,"SELECT*FROM pengguna WHERE username='$un' AND password='$pw' ");
$hasil = mysqli_fetch_assoc($sql);
$cek = mysqli_num_rows($sql);
if($cek == 0){
    header('location:login');
    $_SESSION['pesan'] = 'Username atau Password Anda SALAH !';
}else {
	$_SESSION['username'] = $hasil['username'];
    header('location:home');
}