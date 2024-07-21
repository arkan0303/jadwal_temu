<?php 

    session_start();
    include_once "./php/config.php";
    include_once "./funcs/guardFuncs.php";

    checkAuth();
    checkRole($conn, "Admin", getUniqueId());

    $pageTitle = "Buku Tamu";
    $cssFiles = ["css/jadwal_janji.css", "css/dashboard.css", "css/badge.css", "css/alert.css", "css/modal.css", "css/buku_tamu.css"];
    $additionalLinks = ['<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />'];

    include "./layouts/header.php";
    include "./funcs/dateFuncs.php";
?>
    <!-- Navbar -->
    <?php include "./partials/_navbar.php" ?>
     <!-- Navbar -->
    <!-- Sidebar -->
    <?php include "./partials/_sidebar.php" ?>
    <!-- Sidebar -->
    <div>
        <h1 class="b" style="">Buku Tamu</h1>
        <div class="dropdown">
                <button class="dropbtn">Rekapan Pengunjung</button>
                <div class="dropdown-content">
                    <a href="#" id="exportExcel">Excel</a>
                    <a href="#" id="exportPdf">PDF</a>
                </div>
            </div>
        <div class="con" style="">
            <!-- <div style=" display: flex; gap: 10px; align-items: center; margin-top: 10px">
                <button id="tambahDataBtn" style=" width: 200px; height: 30px; border-radius: 5px;cursor:pointer;"><i class="fa-solid fa-plus"></i>Tambah Data</button>
            </div> -->
            
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
                <div class="sss">
                    <input type="text" id="search" name="search" class="sea" placeholder="Cari..." style="">
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
                    <th colspan="2" class="text-center">Cetak</th>
                </tr>
            </thead>
            <tbody id="data-container">
                <!-- <tr>
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
                    <td data-label="Edit"><button>PDF</button></td>
                    <td data-label="Hapus"><button>Excel</button></td>
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

</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/modal.js" defer></script>
    <script src="./js/table_reservasi_tamu.js" defer></script>
    <script>
        // script.js
        document.addEventListener('DOMContentLoaded', function() {
            const dropbtn = document.querySelector('.dropbtn');
            const dropdown = document.querySelector('.dropdown');
            
            dropbtn.addEventListener('click', function() {
                dropdown.classList.toggle('show');
            });

            document.getElementById('exportExcel').addEventListener('click', function() {
                window.location.href = 'php/export_excel.php';
            });

            document.getElementById('exportPdf').addEventListener('click', function() {
                window.location.href = 'php/export_pdf.php';
            });
            
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        });

    </script>
</html>