<?php
include '../koneksi.php';

session_start();
if ($_SESSION['username'] == null) {
    header('location:login.php');

    $nama = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Breeze Store Admin | Transaction</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Breeze Store</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../categories/categories.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="../transaction/transaction.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Breeze Store Admin - <?php echo $_SESSION['username']; ?></span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Transaction</h3>
            <button type="button" class="btn btn-cetak">
                <a href="transaction-cetak.php"><i class='bx bxs-printer'></i>Cetak</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th style="width: 15%">Tanggal</th>
                        <th style="width: 15%">Nama</th>
                        <th style="width: 5%">Nomor HP</th>
                        <th style="width: 15%">Alamat</th>
                        <th style="width: 10%">Kategori</th>
                        <th>Harga</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM tb_transaksi";
                    $result = $koneksi->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
								<td>{$row['tanggal']}</td>
                                <td>{$row['nama_pembeli']}</td>
                                <td>{$row['nomorhp']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['kategori']}</td>
                                <td>{$row['harga']}</td>
                                <td>{$row['status']}</td>
                                <td>
                                    <button class='btn_detail' data-nomorhp='{$row['nomorhp']}' onclick='showDetails(\"{$row['id_transaksi']}\",\"{$row['tanggal']}\", \"{$row['nama_pembeli']}\", \"{$row['kategori']}\", \"{$row['harga']}\", \"{$row['status']}\")'><i class='bx bx-detail'></i> Detail</button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Belum Ada Transaksi</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
		// Function Untuk Melihat Detail
		function showDetails(id_transaksi,tanggal, nama, kategori, harga, status) {
            alert(
				"Detail Transaksi dari ID : " + id_transaksi + "\n" +
				"==============================" + "\n" +
                "Tanggal: " + tanggal + "\n" +
                "Nama Pembeli: " + nama + "\n" +
                "Kategori: " + kategori + "\n" +
                "Harga: " + harga + "\n" +
                "Status: " + status + "\n" +
				"=============================="
            );
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>

</html>
