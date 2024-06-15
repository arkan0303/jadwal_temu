<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/jadwal_janji.css">

<head>

</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="">
            <h1>PT.PLN(Persero) UP2B Kaltimra</h1>
        </div>
        <button class="logout-button">Logout
            <i class="fa-solid fa-right-from-bracket"></i>
        </button>
    </nav>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <div class="user-icon">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
                <p style="font-weight: bold; font-size: 20px">Nama Pengguna</p>
            </div>
            <ul>
                <div class="menu active" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                    <div>
                        <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-house-user"></i>
                    </div>
                    <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="dashboard.php">Dashboard</a></li>
                </div>
                <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                    <div>
                        <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-calendar-days"></i>
                    </div>
                    <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="jadwal_janji.php">Jadwal Janji</a></li>
                </div>
                <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                    <div>
                        <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-book-bookmark"></i>
                    </div>
                    <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="buku_tamu.php">Buku Tamu</a></li>
                </div>
                <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                    <div>
                        <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-user-tie"></i>
                    </div>
                    <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="karyawan.php">Karyawan</a></li>
                </div>
                <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                    <div>
                        <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-print"></i>
                    </div>
                    <li style="margin-top: 8px; font-size: 20px; font-weight: bold"><a href="petugas.php">Petugas</a></li>
                </div>
            </ul>
        </div>
        <div class="content">
            <h1>Dashboard Admin</h1>
            <p>Hari Ini, tgl/bulan/thn</p>
            <div style="display: flex; border-bottom: 1px solid #ccc; gap: 20px; margin-top: 35px;">
                <div class="container-cards">
                    <div class="card card-total-tamu">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div class="card-value">24</div>
                            <i style="font-size: 20px;" class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-title">Total Tamu</div>
                    </div>
                    <div class="card card-tamu-hari-ini">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div class="card-value">5</div>
                            <i style="font-size: 20px;" class="fa-solid fa-user"></i>
                        </div>
                        <div class="card-title">Tamu Hari Ini</div>
                    </div>
                    <div class="card card-jadwal-temu">
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <div class="card-value">2</div>
                            <i style="font-size: 20px;" class="fa-solid fa-clock"></i>
                        </div>
                        <div class="card-title">Jadwal janji temu</div>
                    </div>
                </div>
                <div style="margin-top: 2rem;">
                    <i style="font-size: 30px;" class="fa-solid fa-arrows-rotate"></i>
                </div>
            </div>
        </div>
    </div>
</body>

</html>