<?php

    /* URI names */
    const DASHBOARD = "/dashboard.php";
    const JADWAL_JANJI = "/jadwal_janji.php";
    const BUKU_TAMU = "/buku_tamu.php";
    const KARYAWAN = "/karyawan.php";
    const PETUGAS = "/petugas.php";

    function checkURI($uri) {
        return $_SERVER['REQUEST_URI'] === $uri ? "active" : "";
    }

    $unique_id = getUniqueId();
    $query = mysqli_query($conn, "SELECT nama_admin AS nama_pengguna FROM admin WHERE unique_id = '$unique_id'
                                UNION
                                SELECT nama_karyawan AS nama_pengguna FROM karyawan WHERE unique_id = '$unique_id'
                                UNION
                                SELECT nama_petugas AS nama_pengguna FROM petugas WHERE unique_id = '$unique_id'");
    $row = mysqli_fetch_assoc($query);
?>

<div class="sidebar">
    <div class="profile">
        <div class="user-icon">
            <img src="./images/no-user.png" alt="">
        </div>
        <p style="font-weight: bold; font-size: 20px"><?= $row['nama_pengguna']; ?></p>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        .hamburger-menu {
            display: none;
            cursor: pointer;
            font-size: 30px;
            padding: 10px;
            position: fixed;
            top: 10px;
            left: 1px;
            z-index: 1000;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
           
            background: #f4f4f4;
            transition: transform 0.3s ease;
            z-index: 999;
        }
        .sidebar.show {
            transform: translateX(0);
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }
            .hamburger-menu {
                display: block;
            }
        }
    </style>
</head>
<body>

    <div class="hamburger-menu" id="hamburger-menu">
        <i class="fa fa-bars"></i>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="profile">
            <div class="user-icon">
                <img src="./images/no-user.png" alt="">
            </div>
            <p style="font-weight: bold; font-size: 20px">Nama Pengguna</p>
        </div>
        <ul>
            <div class="menu <?= checkURI(DASHBOARD); ?>" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-house-user"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="dashboard.php">Dashboard</a></li>
            </div>
            <div class="menu <?= checkURI(JADWAL_JANJI); ?>" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-calendar-days"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="jadwal_janji.php">Jadwal Janji</a></li>
            </div>
            <div class="menu <?= checkURI(BUKU_TAMU); ?>" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-book-bookmark"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="buku_tamu.php">Buku Tamu</a></li>
            </div>
            <div class="menu <?= checkURI(KARYAWAN); ?>" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-user-tie"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="karyawan.php">Karyawan</a></li>
            </div>
            <div class="menu <?= checkURI(PETUGAS); ?>" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-print"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="petugas.php">Petugas</a></li>
            </div>
        </ul>
    </div>

    <script>
        document.getElementById('hamburger-menu').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
