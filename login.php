<?php

header('Content-type:application/json');
error_reporting(0);
include 'koneksi.php';
$email = $_POST['email'];
$password = md5($_POST['password']);

//query cek user
$sql = "SELECT *FROM user WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    echo json_encode(
        [
            "status" => "sukses",
            "message" => "login berhasil",
            "data" => [
                "iduser" => $user['iduser'],
                "username" => $user['username'],
                "email" => $user['email'],
                //password tidak ditampilkan
            ]
        ]
    );
} else {
    echo json_encode([
        "status" => "error",
        "message" => "email atau password salah"
    ]);
}