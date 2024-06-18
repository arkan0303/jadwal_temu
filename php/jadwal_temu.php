<?php

include_once "./config.php";

$nama = mysqli_escape_string($conn, $_POST['nama']);
$alamat = mysqli_escape_string($conn, $_POST['alamat']);
$jenis_kelamin = mysqli_escape_string($conn, $_POST['jenis_kelamin']);
$telepon = mysqli_escape_string($conn, $_POST['telepon']);
$karyawan = mysqli_escape_string($conn, $_POST['karyawan']);
$keperluan = mysqli_escape_string($conn, $_POST['keperluan']);
$jam = mysqli_escape_string($conn, $_POST['jam']);
$tanggal = mysqli_escape_string($conn, $_POST['tanggal']);
$jumlah_orang = mysqli_escape_string($conn, $_POST['jumlah_orang']);
$email = mysqli_escape_string($conn, $_POST['email']);
$photo = mysqli_escape_string($conn, $_FILES['photo']['name']);