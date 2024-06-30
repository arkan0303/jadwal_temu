<?php

session_start();
include_once "./config.php";

if (isset($_SESSION['unique_id'])) {
    header("location: /dashboard");
}

$full_name = mysqli_real_escape_string($conn, $_POST['register_full_name']);
$email = mysqli_real_escape_string($conn, $_POST['register_email']);
$password = mysqli_real_escape_string($conn, $_POST['register_password']);

if (empty($full_name)) {
    echo "Full Name is required";
}
if (empty($email)) {
    echo "Email is required";
}
if (empty($password)) {
    echo "Password is required";
}

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is not valid";
    return;
}

$checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
if (mysqli_num_rows($checkEmail) > 0) {
    echo "Email is already exist";
    return;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$roleQuery = mysqli_query($conn, "SELECT id FROM roles WHERE name = 'Admin'");
$roleRow = mysqli_fetch_assoc($roleQuery);
$roleId = $roleRow['id'];

mysqli_begin_transaction($conn);

$unique_id = uniqid().microtime();

$userSQL = "INSERT INTO users (email, password, role_id, unique_id) VALUES (?, ?, ?, ?)";
$userStmt = mysqli_prepare($conn, $userSQL);
mysqli_stmt_bind_param($userStmt, "ssis", $email, $hashedPassword, $roleId, $unique_id);

$userExec = mysqli_stmt_execute($userStmt);

if (!$userExec) {
    mysqli_rollback($conn);
    echo "Register Gagal";
    return;
}

$userId = mysqli_insert_id($conn);

$adminSQL = "INSERT INTO admins (full_name, user_id) VALUES (?, ?)";
$adminStmt = mysqli_prepare($conn, $adminSQL);
mysqli_stmt_bind_param($adminStmt, "si", $full_name, $userId);

$adminExec = mysqli_stmt_execute($adminStmt);

if (!$adminExec) {
    mysqli_rollback($conn);
    echo "Register Gagal";
    return;
}

mysqli_commit($conn);
echo "Register berhasil.";
return;