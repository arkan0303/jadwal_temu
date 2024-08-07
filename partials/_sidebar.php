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
?>

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
