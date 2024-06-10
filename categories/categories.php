<?php
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
	<title>Breeze Store Admin | Categories</title>
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
			<h3>Kategori</h3>
			<button type="button" class="btn btn-tambah">
				<a href="categories-entry.php"><i class='bx bx-add-to-queue'></i>Tambah Data</a>
			</button>
			<button type="button" class="btn btn-cetak">
				<a href="categories-cetak.php"><i class='bx bxs-printer'></i>Cetak</a>
			</button>
			<table class="table-data">
				<thead>
					<tr>
						<th scope="col" style="width: 25%">Produk</th>
						<th scope="col" style="width: 15%">Kategori</th>
						<th scope="col" style="width: 5%">Harga</th>
						<th scope="col" style="width: 20%">Deskripsi</th>
						<th scope="col" style="width: 30%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include '../koneksi.php';
					$sql = "SELECT * FROM tb_kategori";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
			   		<tr>
						<td colspan='5' align='center'>
                        Data Kosong
                        </td>
			   		</tr>";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
                    <td>
                        <img src='../img_categories/$data[photo]' width='200px'>
                    </td>
                      <td>$data[kategori]</td>
					  <td>$data[harga]</td>
                      <td>$data[deskripsi]</td>
                      <td >
                        <a id='btn-edit' href=categories-edit.php?id_kategori=$data[id_kategori]>
                            Edit
                        </a> | 
                        <a id='btn-delete' href=categories-hapus.php?id_kategori=$data[id_kategori]>
                            Hapus
                        </a>
                      </td>
                    </tr>
                  ";
					}
					?>
				</tbody>
			</table>
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