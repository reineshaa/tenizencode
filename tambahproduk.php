<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $idproduk = $_POST['idproduk'];
    $namaproduk = $_POST['namaproduk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $barcodeBase64 = $_POST['barcode'];
    //$foto_base64 = $_POST['foto'];

    // dekode gambar barcode
    $imageData = base64_decode($barcodeBase64);

    // buat nama file
    $namafile = $idproduk . "produk.jpg";

    // path simpan
    $filePath = "uploadproduk/" . $namafile;

    //simpan gambar ke folder upload
    if (file_put_contents($filePath, $imageData)) {
        require_once('koneksi.php');

        $sql = "INSERT INTO produk(idproduk, namaproduk, jumlah, harga, barcode) VALUES ('$idproduk','$namaproduk','$jumlah','$harga','$namafile')";

        if (mysqli_query($conn, $sql)) {
            echo "berhasil menyimpan data produk";
        } else {
            echo "Gagal menyimpan data produk: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Gagal menyimpan foto";
    }
}