<?php 

$conn = mysqli_connect("localhost", "root", "", "jadwal_temu_pln");

if (!$conn) {
    echo "Database error : " . mysqli_connect_error();
}