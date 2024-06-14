<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Janji Temu - PT PLN</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1717321677309-8916f9b0a1d6?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .container {
            border: 1px solid #fff;
            position: relative;
            z-index: 2;
            width: 600px;
            background-color: rgba(0, 0, 0, 0.5);
            /* Ubah opacity menjadi 0.5 untuk membuatnya transparan */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-height: 90vh;
            overflow-y: auto;
        }

        h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-group-left {
            flex: 50%;
            display: flex;
            flex-direction: column;
        }

        .form-group-right {
            flex: 50%;
            display: flex;
            flex-direction: column;
        }

        .form-group-left label {
            color: #fff;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group-left input,
        select {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        .form-group-right label {
            color: #fff;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group-right input {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        .send {
            width: 20%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 600;
        }

        .send:hover {
            background-color: #2980b9;
        }

        .cancel {
            width: 20%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 600;
        }

        .cancel:hover {
            background-color: #2980b9;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            width: calc(50% - 10px);
        }

        @media (max-width: 600px) {
            .form-row .form-group {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h2>Jadwal Janji Temu</h2>
        <form action="#" method="POST">
            <div class="form-row">
                <div class="form-group-left">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group-right">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group-left">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group-right">
                    <label for="telepon">Telepon</label>
                    <input type="tel" id="telepon" name="telepon" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group-left">
                    <label for="karyawan">Karyawan yang Dituju</label>
                    <select id="karyawan" name="karyawan" required>
                        <option value="" disabled selected>Pilih Karyawan</option>
                        <option value="karyawan1">Karyawan 1</option>
                        <option value="karyawan2">Karyawan 2</option>
                        <option value="karyawan3">Karyawan 3</option>
                        <option value="karyawan4">Karyawan 4</option>
                    </select>
                </div>

                <div class="form-group-right">
                    <label for="keperluan">Keperluan</label>
                    <input type="text" id="keperluan" name="keperluan" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group-left">
                    <label for="jam">Jam Janji</label>
                    <input type="time" id="jam" name="jam" required>
                </div>

                <div class="form-group-right">
                    <label for="tanggal">Tanggal Janji</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group-left">
                    <label for="jumlah_orang">Jumlah Orang yang Hadir</label>
                    <input type="number" id="jumlah_orang" name="jumlah_orang" required>
                </div>

                <div class="form-group-right">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div style="margin-top: 10px; display: flex; justify-content: center; gap: 20px">
                <button class="send" type="submit">send</button>
                <button class="cancel" type="submit">cancel</button>
            </div>
        </form>
    </div>
</body>

</html>