<?php

function checkAuth() {
    if (!isset($_SESSION['unique_id'])) {
        header("location: /login.php");
        exit;
    }
}

function checkRole($conn, $role_name, $unique_id) {
    $user_query = mysqli_query($conn, "SELECT role_id FROM users WHERE unique_id = '$unique_id'");
    $user_result = mysqli_fetch_assoc($user_query);
    $role_id = $user_result['role_id'];
    
    $role_query = mysqli_query($conn, "SELECT name FROM roles WHERE id = '$role_id'");
    $role_result = mysqli_fetch_assoc($role_query);

    if ($role_result['name'] !== $role_name) {
        header("location: /forbidden.php");
        exit;
    }
}

function getUniqueId() {
    return $_SESSION['unique_id'];
}