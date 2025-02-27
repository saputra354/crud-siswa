<?php
require 'koneksi.php';
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$sekolah = $_POST["sekolah"];
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "INSERT INTO loginn (fullname, username, sekolah, email, password) 
            VALUES ('$fullname', '$username', '$sekolah', '$email', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: index.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
