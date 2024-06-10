<?php
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

include '../koneksi.php';

// Initialize dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Fetch data from database
$sql = "SELECT * FROM tb_kategori";
$result = mysqli_query($koneksi, $sql);

// Create HTML content for PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Laporan Kategori</h2>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Convert image to base64
        $image_path = realpath("../img_categories/{$row['photo']}");
        $image_data = base64_encode(file_get_contents($image_path));
        $src = 'data:'.mime_content_type($image_path).';base64,'.$image_data;

        $html .= "
            <tr>
                <td><img src='$src'></td>
                <td>{$row['kategori']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['deskripsi']}</td>
            </tr>";
    }
} else {
    $html .= "<tr><td colspan='4' align='center'>Data Kosong</td></tr>";
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Get current date
$current_date = date('Y-m-d');

// Output the generated PDF to Browser with the current date in the file name
$dompdf->stream("Laporan_Kategori_$current_date.pdf", array("Attachment" => 0));
?>