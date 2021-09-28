<?php
$db_server = "localhost";
$db_username = "root";
$db_pass = "";
$db_nama = "datasekolah";

$conn = new mysqli($db_server, $db_username, $db_pass, $db_nama);

function register($data){
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $result = mysqli_query($conn, "SELECT nisn FROM datasiswa WHERE nisn = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('NISN sudah ada')</script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO datasiswa VALUES ('$username', '$nama', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>