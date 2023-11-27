<?php 

// Array data Paket mencuci
$dataPaket = [
    ["Paket A", "cuci kering biasa", 40000],
    ["Paket B", "Cuci kering dan lipat", 45000],
    ["Paket C", "Cuci kering, setrika, dan lipat", 50000],
    ["Paket D", "Cuci kering, setrika, pengharum, lipat", 55000],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Laundry Farmasi</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- My Style CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-green">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-3">
                            <a class="nav-link fw-bold " href="Home.php"><i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link fw-bold " href="Transaksi.php">Transaksi</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="Login.php" class="nav-link fw-bold"><i class="bi bi-box-arrow-left"></i> Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navbar -->

    <!-- Gambar -->
    <div class="container mt-5 text-center ">
        <img src="./img/laundry.jpg" class="img-fluid object-fit-cover img-thumbnail" alt="Banner">
    </div>
    <!-- Gambar -->

    <div class="container-fluid px-5 mt-5">
        <div class="row">
            <h3>Daftar Paket Laundry</h3>
            <!-- Lakukan perulangan sesuai dengan array menggunakan foreach -->
            <?php foreach($dataPaket as $data) : ?>
                <div class="col-md-3">
                    <div class="card bg-green-two py-4" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data[0] ?></h5> <!-- Tampilkan data index 0 yaitu nama paket -->
                            <p class="card-text my-3"><?= $data[1] ?></p> <!-- Tampilkan data index 1 yaitu penjelasan paket -->
                            <p class="card-text">Harga : Rp.<?= $data[2] ?></p> <!-- Tampilkan data index 2 yaitu harga paket -->
                        </div>
                    </div>
                    <!-- Kirim data index 0 yaitu nama paket dan data index 2 yaitu harga paket sebagai parameter di Transaksi -->
                    <a href="./Transaksi.php?paket=<?= $data[0] ?>&harga=<?= $data[2] ?>" class="btn btn-primary w-100 mt-3">Pilih Paket</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="bg-primary py-3 mt-3">
        <p class="text-center text-white fw-bold">&copy; Copyright by Jana</p>
    </footer>


    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>