<?php

session_start();
include_once "./config.php";
include_once "../funcs/guardFuncs.php";

checkAuth();

$id = $conn->escape_string($_POST['id']);
$jenis = $conn->escape_string($_POST['jenis']);

$query = $conn->query("SELECT * FROM reservasi_tamu WHERE jenis_reservasi = '$jenis' AND id = $id");

$row = $query->fetch_assoc();

$response = [
    'nama_tamu' => $row['nama_tamu'],
    'alamat' => $row['alamat'],
    'jenis_kelamin' => $row['jenis_kelamin'],
    'karyawan_id' => $row['karyawan_id'],
    'nomor_telepon' => $row['nomor_telepon'],
    'jam' => $row['jam'],
    'tanggal' => $row['tanggal'],
    'jumlah_orang' => $row['jumlah_orang'],
    'instansi' => $row['instansi'],
    'foto'=> $row['foto'],
    'email_pemohon' => $row['email_pemohon'],
    'keperluan' => $row['keperluan'],
    'id' => $row['id']
];

echo json_encode($response);

$conn->close();