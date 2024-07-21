<?php 
    session_start();
    include_once "./php/config.php";
    include_once "./funcs/guardFuncs.php";

    checkAuth();
    checkRole($conn, "Admin", getUniqueId());

    $pageTitle = "Karyawan";
    $cssFiles = ["css/dashboard.css", "css/jadwal_janji.css", "css/modal.css", "css/alert.css"];
    $additionalLinks = ['<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />'];

    include "./layouts/header.php";
?>
   <!-- Navbar -->
   <?php include "./partials/_navbar.php" ?>
     <!-- Navbar -->
    <!-- Sidebar -->
    <?php include "./partials/_sidebar.php" ?>
    <!-- Sidebar -->
    <div>
        <h1 class="j" style="">Data Karyawan</h1>
        <div class="data" style="">
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                <button data-id="tambahDataBtn" style="width: 200px; height: 30px; border-radius: 5px;cursor: pointer;" onclick="openModal('myModal')"><i class="fa-solid fa-plus"></i>Tambah Data</button>
            </div>
        </div>
        <div class="s" style=" ">
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
                <input type="text" id="search" name="search" placeholder="Cari..." class="se" style="">
            </div>
        </div>
    </div>
    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>NIP</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Departemen</th>
                </tr>
            </thead>
            <tbody id="data-container">
                <!-- <tr>
                    <td data-label="No">1</td>
                    <td data-label="Nama Karyawan">John Doe</td>
                    <td data-label="NIP">123456</td>
                    <td data-label="No Telepon">081234567890</td>
                    <td data-label="Email">john.doe@example.com</td>
                    <td data-label="Departemen">HR</td>
                    <td data-label="Edit"><button>Edit</button></td>
                    <td data-label="Hapus"><button>Hapus</button></td>
                </tr> -->
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
    <div id="pagination" style="" class="pagination">
        <!-- <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#" class="active">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a> -->
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Data Karyawan</h2>
            <div class="alert" style="display: none;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong id="message"></strong>
            </div>
            <form method="POST" id="form_tambah_karyawan">
                <label for="nama">Nama Karyawan:</label>
                <input type="text" id="nama" name="nama">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span id="showPassword" onclick="togglePassword(this, 'password')">Show</span>
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip">
                <label for="telpon">No Telepon:</label>
                <input type="text" id="telpon" name="telpon">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="departemen">Departemen:</label>
                <input type="text" id="departemen" name="departemen">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="5"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/modal.js" defer></script>
    <script src="./js/form_util.js"></script>
    <script src="./js/tambah_karyawan.js"></script>
    <script src="./js/fetch_data_karyawan.js"></script>
</body>

</html>