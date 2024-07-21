<?php

include_once "./config.php";
include_once "../funcs/mailFuncs.php";

$nama = mysqli_escape_string($conn, $_POST['nama']);
$alamat = mysqli_escape_string($conn, $_POST['alamat']);
$jenis_kelamin = mysqli_escape_string($conn, $_POST['jenis_kelamin']);
$telepon = mysqli_escape_string($conn, $_POST['telepon']) ?? null;
$karyawan = mysqli_escape_string($conn, $_POST['karyawan']);
$keperluan = mysqli_escape_string($conn, $_POST['keperluan']);
$jam = mysqli_escape_string($conn, $_POST['jam']);
$tanggal = mysqli_escape_string($conn, $_POST['tanggal']);
$jumlah_orang = mysqli_escape_string($conn, $_POST['jumlah_orang']);
$email = mysqli_escape_string($conn, $_POST['email']);
$instansi = mysqli_escape_string($conn, $_POST['instansi']);
$jenis_reservasi = mysqli_escape_string($conn, $_POST['jenis_reservasi']);

if (!isset($_FILES['photo'])) {
    echo "Gambar tidak boleh kosong";
    exit;
}

if ($_FILES['photo']['error'] != UPLOAD_ERR_OK) {
    echo "Terjadi kesalahan dalam upload gambar";
    exit;
}

$photo = $_FILES['photo'];

$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$fileExt = pathinfo($photo['name'], PATHINFO_EXTENSION);
$filename = uniqid() . microtime(true) . '.' . $fileExt;
$uploadPath = $uploadDir.$filename;

if (!move_uploaded_file($photo['tmp_name'], $uploadPath)) {
    echo "Gagal upload gambar";
    exit;
}

$uploadPath = "php/".$uploadPath;

$sql = "INSERT INTO reservasi_tamu 
        (nama_tamu, alamat, jenis_kelamin, nomor_telepon, karyawan_id, keperluan, jam, tanggal, jumlah_orang, instansi, email_pemohon, foto, jenis_reservasi) 
        VALUES 
        ('$nama', '$alamat', '$jenis_kelamin', '$telepon', $karyawan, '$keperluan', '$jam', '$tanggal', $jumlah_orang, '$instansi', '$email', '$uploadPath', '$jenis_reservasi');
";

$query = mysqli_query($conn, $sql);

if ($query) {
    try {
        sendEmail(SUCCESS_EMAIL, $email, $nama);
    } catch (Exception $e) {
        throw $e;
    }
    echo "Berhasil menyimpan data";
    exit;
} else {
    unlink($uploadPath);
    echo "Gagal menyimpan data";
    exit;
}