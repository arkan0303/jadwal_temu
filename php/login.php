<?php

session_start();
include_once "./config.php";

$email = mysqli_real_escape_string($conn, $_POST["login_email"]);
$password = mysqli_real_escape_string($conn, $_POST["login_password"]);

if (empty($email)) {
    echo "Email tidak boleh kosong";
    return;
}

if (empty($password)) {
    echo "Password tidak boleh kosong";
    return;
} 

$query = mysqli_query($conn, "SELECT email, password, role_id, unique_id FROM users WHERE email = '$email'");
if (mysqli_num_rows($query) === 0) {
    echo "Email salah";
    return;
}

$row = mysqli_fetch_assoc($query);
$hashedPassword = $row['password'];

if (!password_verify($password, $hashedPassword)) {
    echo "Password salah";
    return;
}

$_SESSION['unique_id'] = $row['unique_id'];
echo "Berhasil Login";
return;