<?php 

// Buat variable error
$error = '';

// Cek apakah tombol Login dipencet
if(isset($_POST["Login"])){
    // Buat variable untuk menampung username dan password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek jika username dan password benar maka akan diarahkan ke Home.php
    if($username === "userlsp" && $password === "smkfarmasibjm"){
        header("Location: Home.php");
        exit;
    } else { // Jika gagal maka akan dilakukan pengecekan lagi

        // Cek jika username atau password Kosong
        if($username == '' || $password == ''){
            $error = 'Username atau Password tidak boleh kosong.';
        } else { //Jika tidak kosong maka artinya password salah
            $error = "Username atau Password yang Anda Masukkan Salah";
        }
    }
}
?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Laundry Farmasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- My file CSS -->
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div class="container">
        <img src="./img/Logo.jpg" alt="Logo" width="150" class="img-fluid rounded-circle d-block mx-auto">
        <P class="text-center fw-bold">SELAMAT DATANG DI LAUNDRY</P>
        <P class="text-center fw-bold">SMK FARMASI BANJARMASIN</P>
        <div class="row justify-content-center">
            <div class="card bg-green" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <!-- Cek jika pesan error ada isinya maka akan ditampilkan -->
                    <?php if($error !== '') : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="my-4 mx-auto form-floating">
                            <input id="username" type="text" name="username" class="form-control" placeholder="Username" >
                            <label for="username">Username</label>
                        </div>
                        <div class="my-4 mx-auto input-group">
                            <div class="form-floating">
                                <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                            <span id="showPassword" class="input-group-text"><i id="icon" class="bi bi-eye-fill"></i></span>
                        </div>
    
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-primary">Register</a>
                            <button type="submit" class="btn btn-primary" name="Login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- My Script JS -->
    <script>
        // Ambil element sesuai id untuk membuat button show Password
        var Password = document.getElementById("password");
        var togglePassword = document.getElementById("showPassword");
        var icon = document.getElementById("icon");
        
        // Jika icon show password ditekan maka akan melakukan pengecekan
        togglePassword.addEventListener("click", () => {
            // Jika type dari input password adalah password maka akan diubah menjadi text
            if(Password.type == "password"){
                Password.type = "text";
                icon.classList.remove("bi-eye-fill"); // hapus icon sebelumnya
                icon.classList.add("bi-eye-slash-fill") // ganti jadi icon yang baru
            } else { //Jika type dari input adalah text maka akan diubah menjadi password
                Password.type = "password";
                icon.classList.add("bi-eye-fill"); // ganti jadi icon yang baru
                icon.classList.remove("bi-eye-slash-fill") // hapus icon sebelumnya
            }
        })
    </script>
  </body>
</html>