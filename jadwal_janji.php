<?php 
    $pageTitle = "Jadwal Janji";
    $cssFiles = ["css/jadwal_janji.css", "css/dashboard.css"];
    $additionalLinks = ['<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />'];

    include "./layouts/header.php";
    include "./funcs/dateFuncs.php";
?>

    <nav class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="">
            <h1>PT.PLN(Persero) UP2B Kaltimra</h1>
        </div>
        <button class="logout-button">Logout
            <i class="fa-solid fa-right-from-bracket"></i>
        </button>
    </nav>
    <!-- Sidebar -->
    <?php include "./partials/_sidebar.php" ?>
    <!-- Sidebar -->
    <div>
        <h1 style="margin-left: 260px; margin-top: 40px; font-weight: bold; font-size: 40px">Jadwal Janji</h1>
        <div style="width : 1000px; display: flex; align-items: center; justify-content: space-between; margin-left: 260px; margin-top: 10px ">
            <div style=" display: flex; gap: 10px; align-items: center; margin-top: 10px">
                <p style="font-weight: bold; font-size: 20px; ">show</p>
                <select name="show" id="show" style="width: 60px; height: 30px; border-radius: 5px">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <p style="font-weight: bold; font-size: 20px; ">entries</p>
            </div>
            <div>
                <input type="text" id="search" name="search" placeholder="Cari..." style="width: 200px; height: 30px; border-radius: 5px; margin-left: 260px; margin-top: 10px; padding-left: 10px">
            </div>
        </div>
    </div>
    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Bertemu Dengan</th>
                    <th>Keperluan</th>
                    <th>Jam Masuk</th>
                    <th>Tanggal</th>
                    <th>Jumlah Orang</th>
                    <th>Foto Tamu</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No">1</td>
                    <td data-label="Nama">John Doe</td>
                    <td data-label="Alamat">Jl. Kebon Jeruk No. 5</td>
                    <td data-label="Jenis Kelamin">Laki-laki</td>
                    <td data-label="Telepon">081234567890</td>
                    <td data-label="Bertemu Dengan">Mr. Smith</td>
                    <td data-label="Keperluan">Meeting</td>
                    <td data-label="Jam Masuk">09:00</td>
                    <td data-label="Tanggal">2023-06-08</td>
                    <td data-label="Jumlah Orang">1</td>
                    <td data-label="Foto Tamu"><img src="https://via.placeholder.com/50" alt="Foto John"></td>
                    <td data-label="Edit"><button>Setujui</button></td>
                    <td data-label="Hapus"><button class="decline">Tolak</button></td>
                </tr>
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
    <div style="margin-left: 550px " class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#" class="active">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</body>

</html>