<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="css/jadwal_janji.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal input,
        .modal select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .modal button {
            width: 100%;
            background-color: #009879;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal button:hover {
            background-color: #007a63;
        }
    </style>
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
    <div class="sidebar">
        <div class="profile">
            <div class="user-icon">
                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <p style="font-weight: bold; font-size: 20px ">Nama Pengguna</p>
        </div>
        <ul>
            <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-house-user"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px ; font-weight: bold"><a href="dashboard.php">Dashboard</a></li>
            </div>
            <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-calendar-days"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px ; font-weight: bold"><a href="jadwal_janji.php">Jadwal Janji</a></li>
            </div>
            <div class="menu active" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-book-bookmark"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px ; font-weight: bold"><a href="buku_tamu.php">Buku Tamu</a></li>
            </div>
            <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-user-tie"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px ; font-weight: bold"><a href="karyawan.php">Karyawan</a></li>
            </div>
            <div class="menu" style="display: flex; gap: 10px; padding-left: 10px; border-radius: 10px">
                <div>
                    <i style="font-size: 30px; margin-top: 8px;" class="fa-solid fa-print"></i>
                </div>
                <li style="margin-top: 8px; font-size: 20px ; font-weight: bold"><a href="petugas.php">Petugas</a></li>
            </div>
        </ul>
    </div>
    <div>
        <h1 style="margin-left: 260px; margin-top: 40px; font-weight: bold; font-size: 40px">Buku Tamu</h1>
        <div style="width : 1000px; display: flex; align-items: center; justify-content: space-between; margin-left: 260px; margin-top: 10px ">
            <div style=" display: flex; gap: 10px; align-items: center; margin-top: 10px">
                <button id="tambahDataBtn" style=" width: 200px; height: 30px; border-radius: 5px "><i class="fa-solid fa-plus"></i>Tambah Data</button>
            </div>
            <div>
                <button style=" width: 200px; height: 30px; border-radius: 5px "><i class="fa-solid fa-address-book"></i>Rekapan Pengunjung</button>
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
                    <th>Edit</th>
                    <th>Hapus</th>
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
                    <td data-label="Edit"><button>Edit</button></td>
                    <td data-label="Hapus"><button>Hapus</button></td>
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

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="tambahDataForm">
                <h2>Tambah Data</h2>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
                <label for="jenisKelamin">Jenis Kelamin:</label>
                <select id="jenisKelamin" name="jenisKelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="telepon">Telepon:</label>
                <input type="tel" id="telepon" name="telepon" required>
                <label for="bertemuDengan">Bertemu Dengan:</label>
                <input type="text" id="bertemuDengan" name="bertemuDengan" required>
                <label for="keperluan">Keperluan:</label>
                <input type="text" id="keperluan" name="keperluan" required>
                <label for="jamMasuk">Jam Masuk:</label>
                <input type="time" id="jamMasuk" name="jamMasuk" required>
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" required>
                <label for="jumlahOrang">Jumlah Orang:</label>
                <input type="number" id="jumlahOrang" name="jumlahOrang" required>
                <label for="fotoTamu">Foto Tamu:</label>
                <input type="file" id="fotoTamu" name="fotoTamu" accept="image/*" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("tambahDataBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>