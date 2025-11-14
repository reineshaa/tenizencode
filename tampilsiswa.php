<?php
require_once("koneksi.php");
$sql = "select * from siswa";
$res = mysqli_query(mysql: $conn, query: $sql);
$result = array();

while ($row = mysqli_fetch_assoc(result: $res)){
    $foto_path = "upload/" . $row["foto"];
    $foto_base64 = file_exists(filename: $foto_path) ? base64_encode(string: file_get_contents(filename: $foto_path)) :

    $result[] = array(
        "nis" => $row ["nis"],
        "namasiswa" => $row ["namasiswa"],
        "jk" => $row ["jk"],
        "alamat" => $row ["alamat"],
        "tanggallahir" => $row ["tanggallahir"],
        "foto" => $foto_base64
    );
}

//output json
header(header: 'Content-type:application/json');
echo json_encode(value: array('result' => $result));    