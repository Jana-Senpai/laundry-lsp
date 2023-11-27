<?php 

// Buat session
session_start();
    // buat variable session agar ketika melakukan pengiriman data yang sebelumnya tidak terhapus
    $_SESSION['nama'] = isset($_POST['NamaCustomer']) ? $_POST['NamaCustomer'] : '';
    $_SESSION['nomor'] = isset($_POST['NomorTransaksi']) ? $_POST['NomorTransaksi'] : '';
    $_SESSION['tanggal'] = isset($_POST['TanggalTransaksi']) ? $_POST['TanggalTransaksi'] : '';
    $_SESSION['tambahan'] = isset($_POST['Tambahan']) ? $_POST['Tambahan'] : '0';

    // jika tombol hitung total harga ditekan maka akan melakukan penjumlahan
    if(isset($_POST['btn-total'])){
        // buat variable dan tangkap nilai dari post yang dikirim sesuai dengan name yang dibuat
        $nama = $_POST['NamaCustomer']; 
        $nomor = $_POST['NomorTransaksi'];
        $tanggal = $_POST['TanggalTransaksi'];
        $tambahan = $_POST['Tambahan'];

        // Jika ada paket tambahan
        $PaketTambahan = (int) $tambahan; // (int) berguna untuk ubah value jadi integer
        $hargaPaket = isset($_GET['harga']) ? $_GET['harga'] : 0;
        $totalHarga = $hargaPaket + $PaketTambahan;
    }
    
    // jika tombol hitung kembalian ditekan maka akan melakukan pengurangan
    if(isset($_POST['btn-kembalian'])){
        $totalHarga = (int)$_POST['TotalHarga'];
        $_SESSION['pembayaran'] = (int)$_POST['Pembayaran'];
        $kembalian = (int)$_POST['Pembayaran'] - $totalHarga;
    }

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi | Laundry Farmasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-green">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Home</a> -->
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
    

    <div class="container bg-green py-5 rounded shadow-lg mt-5">
        <form action="" method="post">
            <div class="row fw-semibold">
                <div class="col-md-7">
                    <!-- No Transaksi -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="NomorTransaksi" class="form-label">No. Transaksi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="NomorTransaksi" class="form-control" value="<?= isset($_SESSION['nomor']) ? $_SESSION['nomor'] : '' ?>" id="NomorTransaksi">
                            </div>
                        </div>
                    </div>

                    <!-- Tanggal Transaksi -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="TanggalTransaksi" class="form-label">Tanggal Transaksi</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="TanggalTransaksi" class="form-control" value="<?= isset($_SESSION['tanggal']) ? $_SESSION['tanggal'] : '' ?>" id="TanggalTransaksi">
                            </div>
                        </div>
                    </div>

                    <!-- Nama Customer -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="NamaCustomer" class="form-label">Nama Customer</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="NamaCustomer" class="form-control" value="<?= isset($_SESSION['nama']) ? $_SESSION['nama'] : '' ?>" id="NamaCustomer">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pilihan Paket -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="PilihanPaket" class="form-label">Pilihan Paket</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="PilihanPaket" class="form-control" value="<?= isset($_GET['paket']) ? $_GET['paket'] : 'Pilih Paket terlebih dahulu' ?>" id="PilihanPaket" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Harga Paket -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="HargaPaket" class="form-label">Harga Paket</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="HargaPaket" class="form-control" value="<?= isset($_GET['harga']) ? $_GET['harga'] : 'Pilih Paket terlebih dahulu' ?>" id="HargaPaket" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Tambahan" id="exampleRadios1" value="0" <?= ($_SESSION['tambahan'] == '0') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="exampleRadios1">
                            Tidak ada tambahan - Rp.0
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Tambahan" id="exampleRadios2" value="10000" <?= ($_SESSION['tambahan'] == 10000) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Pelembut - Rp 10.000
                        </label>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-primary" name="btn-total" <?= isset($_GET['paket']) ? '' : 'disabled' ?>>Hitung Total Harga</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row fw-bold">
            <div class="col-md-5 bg-green rounded py-3 shadow-lg">
                <form action="" method="post">
                    <!-- Kirimkan input hidden agar ketika tombol kembalian di klik data yang diatas tidak hilang -->
                    <input type="hidden" name="NamaCustomer" value="<?= $nama ?>">
                    <input type="hidden" name="NomorTransaksi" value="<?= $nomor ?>">
                    <input type="hidden" name="TanggalTransaksi" value="<?= $tanggal ?>">
                    <input type="hidden" name="Tambahan" value="<?= $tambahan ?>">
                    <input type="hidden" name="TotalHarga" value="<?= $totalHarga ?>">
                    <!-- Total Harga -->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="TotalHarga" class="form-label">Total Harga</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="TotalHarga" class="form-control" value="<?= isset($totalHarga) ? $totalHarga : '0' ?>" id="TotalHarga" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Pembayaran -->
                    <div class="mb-3 ">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Pembayaran" class="form-label">Pembayaran</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="Pembayaran" value="<?= isset($_SESSION['pembayaran']) ? $_SESSION['pembayaran'] : '' ?>" class="form-control" id="Pembayaran">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" name="btn-kembalian" <?= isset($totalHarga) ? '' : 'disabled' ?>>Hitung Kembalian</button>
                </form>
            </div>
            
            <?php if(isset($kembalian)) : ?>
            <div class="col-md-6 offset-md-1 bg-green rounded py-3 shadow-lg">
                    <!-- Total Harga -->
                    <div class="mb-3">
                        <div class="row">
                            <h4 class="text-center mb-4">Pembayaran Berhasil</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Kembalian" class="form-label">Kembalian :</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" value="<?= isset($kembalian) ? $kembalian : '0' ?>" name="Kembalian" class="form-control" id="Kembalian" disabled>
                            </div>
                        </div>
                    </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSukses" <?= isset($_GET['paket']) ? '' : 'disabled' ?>>Simpan Transaksi</button>
            </div>
            <?php endif ?>
        </div>
    </div>

    <footer class="bg-primary py-3 mt-3">
        <p class="text-center text-white fw-bold">&copy; Copyright by Jana</p>
    </footer>


    <!-- Modal Transaksi Berhasil -->
    <div class="modal fade" id="modalSukses" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-body ">
                    <p>Transaksi Berhasil</p>
                    <p>Kembali ke Home</p>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mx-auto px-5" onclick="window.location.href = 'Home.php'">Ok</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>