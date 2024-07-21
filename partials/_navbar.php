<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        /* Tambahan CSS untuk responsif */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar .logo img {
                margin: 7px 0 10px 45px;
                width: 50px;
            }
            .navbar .logo h1 {
                font-size: 15px;
            }
            .navbar .logout-button {
                margin-top: 14px;
                display: flex;
                align-items: center;
                background-color: transparent;
                border: none;
                padding: 0;
                cursor: pointer;
                
            }

            .navbar .logout-button span {
                display: none; 
            }

            .navbar .logout-button i {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/pln.jpg" alt="">
            <h1>PT.PLN(Persero) UP2B Kaltimra</h1>
        </div>
        <a class="logout-button" href="./logout.php">
            <span>Logout</span> <!-- Tambahkan elemen span untuk teks "Logout" -->
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </nav>
</body>
</html>
