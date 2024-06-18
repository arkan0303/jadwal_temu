<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Janji</title>
    <link rel="stylesheet" href="css/jadwal_janji.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Modal CSS */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
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

        /* Form CSS */
        .modal-content form {
            display: flex;
            flex-direction: column;
        }

        .modal-content form label {
            margin-top: 10px;
            font-weight: bold;
        }

        .modal-content form input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal-content form button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content form button:hover {
            background-color: #45a049;
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
    <!-- Sidebar -->
    <?php include "./partials/_sidebar.php" ?>
    <!-- Sidebar -->
    <div>
        <h1 style="margin-left: 260px; margin-top: 40px; font-weight: bold; font-size: 40px">Data Petugas</h1>
        <div style="width: 1000px; display: flex; align-items: center; justify-content: space-between; margin-left: 260px; margin-top: 10px;">
            <div style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                <button id="tambahDataBtn" style="width: 200px; height: 30px; border-radius: 5px;cursor: pointer;"><i class="fa-solid fa-plus"></i>Tambah Data</button>
            </div>
        </div>
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
                    <th>Nama Petugas</th>
                    <th>Shift</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="No">1</td>
                    <td data-label="Nama Karyawan">John Doe</td>
                    <td data-label="NIP">123456</td>
                    <td data-label="No Telepon">081234567890</td>
                    <td data-label="Email">john.doe@example.com</td>
                    <td data-label="Edit"><button>Edit</button></td>
                    <td data-label="Hapus"><button>Hapus</button></td>
                </tr>
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
    <div style="margin-left: 850px" class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#" class="active">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Tambah Data Petugas</h2>
            <form>
                <label for="nama">Nama Petugas:</label>
                <input type="text" id="nama" name="nama">
                <label for="nip">Shift:</label>
                <input type="text" id="nip" name="nip">
                <label for="telpon">No Telepon:</label>
                <input type="text" id="telpon" name="telpon">
                <label for="email">Email:</label>
                <input type="text" id="departemen" name="departemen">
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