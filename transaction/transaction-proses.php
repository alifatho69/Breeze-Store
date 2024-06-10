<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['info-nama']; //nama_pembeli
    $nomor = $_POST['info-nomor']; //nomorhp
    $alamat = $_POST['info-alamat']; //alamat
    $kategori = $_POST['info-kategori']; //kategori
    $harga = $_POST['info-harga']; //harga
    $status = $_POST['info-status']; //status
    $tanggal = date('Y-m-d'); //tanggal

    $sql = "INSERT INTO tb_transaksi VALUES(null, '$nama','$nomor','$alamat', '$kategori', '$harga', '$status','$tanggal' )";

    if (empty($nama) || empty($nomor) || empty($alamat) || empty($kategori) || empty($harga) ||  empty($status) || empty($tanggal)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = '../index.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Transaction Berhasil');
                window.location = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = '../index.php';
            </script>
        ";
    }
} else {
    header('location: ../index.php');
}
