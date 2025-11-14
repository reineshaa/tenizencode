<?php

// header('Content-type:application/json');
// error_reporting(0);

// $json_str = file_get_contents('php://input');

// // Decode the JSON string into a PHP associative array or object
// // Setting the second parameter to 'true' decodes it into an associative array.
// // Omitting or setting it to 'false' decodes it into an object.
// $data = json_decode($json_str, true);

include 'koneksi.php';
// $email = $data['email'];
// $password = $data['password'];
$email = $_POST['email'];
$password = $_POST['password'];
// $password = md5($_POST['password']);

// echo json_encode([
//         // "email" => "$email",
//         // "password" => "$password",
//         "email2" => "$email2",
//         "password2" => "$password2"
//     ]);
//query cek user
$sql = "SELECT *FROM user WHERE email='$email' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    echo json_encode(
        [
            "status" => "success",
            "message" => "login berhasil",
            "otp" => $user['otp'],
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