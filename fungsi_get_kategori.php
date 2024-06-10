<?php
include 'koneksi.php';

if (isset($_GET['id_kategori'])) {
    $categoryId = $_GET['id_kategori'];

    $sql = "SELECT * FROM tb_kategori WHERE id_kategori = '$categoryId'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Gagal untuk terima data kategori']);
    }
} else {
    echo json_encode(['error' => 'Category ID not provided.']);
}
?>
