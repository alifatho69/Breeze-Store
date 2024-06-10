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
$sql = "SELECT * FROM tb_transaksi";
$result = $koneksi->query($sql);

// Create HTML content for PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
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
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "
            <tr>
                <td>{$row['nama_pembeli']}</td>
                <td>{$row['nomorhp']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['kategori']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['status']}</td>
                <td>{$row['tanggal']}</td>
            </tr>";
    }
} else {
    $html .= "<tr><td colspan='7'>Belum Ada Transaksi</td></tr>";
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render PDF
$dompdf->render();

// Get current date
$current_date = date('Y-m-d');

// Output the generated PDF to Browser with the current date in the file name
$dompdf->stream("Laporan_Transaksi_$current_date.pdf", array("Attachment" => 0));
?>
