<?php
session_start();
require 'data/server.php';
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM datasiswa WHERE nisn = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            header("Location: loading.php");
            exit;
        }
    } 
    $error = true; 
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
        <p class="heading">Login</p>
        <div class="box">
            <p>NISN</p>
            <div>
                <input type="text" name="username" placeholder="NISN">
            </div>
        </div>
        <div class="box">
            <p>Password</p>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
        </div>
        <?php if(isset($error)) : ?>
            <p class="error">Username/Password salah</p>
        <?php endif; ?>  
        <button type="submit" class="login" name="login">Login</button>
        <p class="text">Belum punya akun? <a href="daftar.php">Daftar</a></p>
    </div>
    </form>
</body>

</html>