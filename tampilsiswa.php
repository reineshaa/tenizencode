<?php
require_once("koneksi.php");

$sql = "SELECT * FROM siswa";
$res = mysqli_query($conn, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($res)) {

    $foto_path = "upload/" . $row["foto"];

    // Jika file foto ada → encode, kalau tidak ya kosong
    if (file_exists($foto_path)) {
        $foto_base64 = base64_encode(file_get_contents($foto_path));
    } else {
        $foto_base64 = "";
    }

    $result[] = array(
        "nis"           => $row["nis"],
        "namasiswa"     => $row["namasiswa"],
        "jk"            => $row["jk"],
        "alamat"        => $row["alamat"],
        "tanggallahir"  => $row["tanggallahir"],
        "foto"          => $foto_base64
    );
}

// output json
header('Content-Type: application/json');
echo json_encode(array('result' => $result));
