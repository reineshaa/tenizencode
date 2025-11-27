<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $namasiswa = $_POST['namasiswa'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $tgllahir = $_POST['tgllahir']; // Tambahkan ini

    $sql = "UPDATE siswa SET namasiswa='$namasiswa', jk='$jk', alamat='$alamat', tanggallahir='$tgllahir' WHERE nis='$nis'";
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
