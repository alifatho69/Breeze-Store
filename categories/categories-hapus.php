<?php
include '../koneksi.php';
$id = $_GET['id_kategori'];
if (!isset($_GET['id_kategori'])) {
    echo "
    <script>
        alert('Tidak ada ID yang Terdeteksi');
        
    </script>
    ";
}

$sql = "SELECT * FROM tb_kategori WHERE id_kategori = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

session_start();
if ($_SESSION['username'] == null) {
    header('location:../login.php');
    $nama = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Breeze Store Admin | Categories Entry</title>
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
            <h3>Edit Kategori</h3>
            <div class="form-login">
                <h4>Ingin Menghapus Data ?</h4>
                <form action="categories-proses.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">
                    <button type="submit" class="btn" name="hapus" style="margin-top: 50px;">
                        Iya
                    </button>
                    <button type="submit" class="btn" name="tidak">
                        Tidak
                    </button>
                </form>
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
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>
</html>