<?php
include 'koneksi.php';

session_start();
if ($_SESSION['username'] == null) {
    header('location:login.php');

    $nama = $_SESSION['username'];
}

// Query untuk mendapatkan jumlah kategori
$sql_kategori = "SELECT COUNT(*) as jumlah_kategori FROM tb_kategori";
$result_kategori = mysqli_query($koneksi, $sql_kategori);
$data_kategori = mysqli_fetch_assoc($result_kategori);
$jumlah_kategori = $data_kategori['jumlah_kategori'];

// Query untuk mendapatkan jumlah pembeli
$sql_pembeli = "SELECT COUNT(DISTINCT nomorhp) as jumlah_pembeli FROM tb_transaksi";
$result_pembeli = mysqli_query($koneksi, $sql_pembeli);
$data_pembeli = mysqli_fetch_assoc($result_pembeli);
$jumlah_pembeli = $data_pembeli['jumlah_pembeli'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Breeze.png" />
    <link rel="stylesheet" href="css/admin.css" />
    <link href=https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Breeze Store</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Breeze Store</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="categories/categories.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="transaction/transaction.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Logout</span>
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
            <h2><span id="text"></span> <?php echo $_SESSION['username']; ?></h2>
            <h3 id="date"></h3>

            <div class="widget-card">
                <span class="title">Jumlah Kategori Game :</span>
                <h3 class="description"><?php echo $jumlah_kategori; ?></h3>
            </div>
            <div class="widget-card">
                <span class="title">Jumlah Pembeli :</span>
                <h3 class="description"><?php echo $jumlah_pembeli; ?></h3>
            </div>
        </div>


    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };

        function myFunction() {
            const months = ["Januari", "Februari", "Maret", "April", "Mei",
                "Juni", "Juli", "Agustus", "September", "Oktober",
                "November", "Desember"
            ];
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
                "Jumat", "Sabtu"
            ];
            let date = new Date();
            let jam = date.getHours();
            let tanggal = date.getDate();
            let hari = days[date.getDay()];
            let bulan = months[date.getMonth()];
            let tahun = date.getFullYear();

            let m = date.getMinutes();
            let s = date.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
            requestAnimationFrame(myFunction);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        window.onload = function() {
            let jam = new Date().getHours();
            if (jam >= 4 && jam <= 10) {
                document.getElementById("text").innerHTML = `Selamat Pagi`;
            } else if (jam >= 11 && jam <= 14) {
                document.getElementById("text").innerHTML = `Selamat Siang`;
            } else if (jam >= 15 && jam <= 18) {
                document.getElementById("text").innerHTML = `Selamat Sore`;
            } else {
                document.getElementById("text").innerHTML = `Selamat Malam`;
            }
            myFunction();
        };
    </script>
</body>

</html>