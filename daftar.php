<?php
    require 'data/server.php';

    if(isset($_POST["daftar"])){
        if(register($_POST) > 0){
            echo "<script>
                alert('Data berhasil disimpan');
            </script>";
            header("Location: login.php");
            exit;
        } else{
            echo mysqli_error($conn);
        }
    }  
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
<form action="" method="POST">
    <div class="container">
        <p class="heading">Daftar</p>
        
            <div class="box">
                <p>Nama<?php if(isset($namaEr)) : ?>
                    <span class="error">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp *NISN tidak boleh kosong</span>
                    <?php endif; ?></p>
                <div>
                    <input type="text" name="nama" placeholder="Masukan Nama">
                </div>
            </div>
            <div class="box">
                <p>NISN<?php if(isset($usernameEr)) : ?><span class="error">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp *NISN tidak boleh kosong</span><?php endif; ?></p></p>
                <div>
                    <input type="text" name="username" placeholder="Masukan NISN">
                </div>
            </div>
            <div class="box">
                <p>Password<?php if(isset($passEr)) : ?><span class="error">&nbsp &nbsp &nbsp *Password tidak boleh kosong</span><?php endif; ?></p></p>
                <div>
                    <input type="password" name="password" placeholder="Masukan Password">
                </div>
            </div>
            <button type="submit" class="daftar" name="daftar">Daftar</button>
        
        <p class="text">Sudah punya akun? <a href="login.php">Masuk</a></p>
    </div>
    </form>
</body>

</html>