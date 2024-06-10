<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets/Breeze.png" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<title>Breeze Store</title>
</head>

<body>
	<div class="container">
    <!-- NAVBAR -->
		<header>
			<nav>
				<div class="logo">
					<img src="assets/Breeze.png" alt="The Breeze" />
				</div>
				<input type="checkbox" id="click" />
				<label for="click" class="menu-btn">
					<i class="fas fa-bars"></i>
				</label>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="login.php" class="btn_login">Login</a></li>
				</ul>
			</nav>
		</header>
    <!-- NAVBAR -->

    <!-- ISI -->
		<main>
			<div class="jumbotron">
				<div class="jumbotron-text">
					<h1>Angin Segar Buat Para Gamer</h1>
					<p>Termurah dan Terpercaya hanya di Breeze Store</p>
					<button type="button" class="btn_getStarted">KLIK DISINI</button>
				</div>
				<div class="jumbotron-img">
					<img src="assets/gamers.png" alt="" />
				</div>
			</div>

            <!-- Jumbotron  -->
			<div class="cards-categories">
				<h2>Yang Paling Banyak Dibeli</h2>

				<!-- Apa yang dijual -->
				<div class="card-categories">
					<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM tb_kategori";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
						<h3 style='text-align: center; color: red;'>‼️ Data Kosong</h3>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
						<div class='card'>
							<div class='card-image'>
								<img src='img_categories/$data[photo]' alt='tidak ada gambar' />
							</div>
							<div class='card-content'>
								<h5>$data[kategori]</h5>
								<p class='description'>$data[deskripsi]</p>
								<p class='price'> Rp $data[harga] </p>
								<button class='btn_belanja' type='submit' onclick='bukaModal(\"id_kategori=$data[id_kategori]\")'>Beli</button>
							</div>
					</div>
                ";
					}
					?>
				</div>
			</div>

			<!-- Kode HTML untuk Modal -->
			<div id="myModal" class="modal-container" onclick="tutupModal()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title " style="color:  #ffb72b;">Formulir Pembayaran</h1>
							<button type="button" class="btn-close" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form>
								<input type="hidden" name="id_kategori" id="id_kategori" value="">
								<input type="hidden" name="kategori" id="kategori" value="">
								<input type="hidden" name="harga" id="harga" value="">
								<div class="form-group">
									<label class="labelmodal" for="terima_nama" class="col-form-label">Nama Kamu :</label>
									<input class="inputdata" type="text" class="form-control" id="terima_nama">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="terima_nohp" class="col-form-label">Nomer Hp :</label>
									<input class="inputdata" type="text" class="form-control" id="terima_nohp">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="terima_alamat" class="col-form-label">Alamat :</label>
									<textarea class="inputalamat" class="form-control" id="terima_alamat"></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
							<button type="button" class="btn btn-yellow" onclick="bukaModal2()">Lanjutkan</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Kode Modal 2 -->
			<div id="myModal2" class="modal-container" onclick="tutupModal2()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title" style="color:  #ffb72b;">Data Transaksi</h1>
							<button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
						</div>
						<form action="transaction/transaction-proses.php" method="post">
							<div class="modal-body">
								<h4>Kategori</h4>
								<div class="form-group">
									<label class="labelmodal" for="info-kategori" class="col-form-label">Kategori :</label>
									<input class="inputdata" type="text" name="info-kategori" class="form-control" id="info-kategori" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="info-harga" class="col-form-label">Harga :</label>
									<input class="inputdata" type="text" name="info-harga" class="form-control" id="info-harga" readonly>
								</div>
								<h4>Pembeli</h4>
								<div class="form-group">
									<label class="labelmodal" for="info-nama" class="col-form-label">Nama Pembeli :</label>
									<input class="inputdata" name="info-nama" type="text" class="form-control" id="info-nama" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="info-nomorhp" class="col-form-label">Nomor Hp :</label>
									<input class="inputdata" name="info-nomor" type="text" class="form-control" id="info-nomorhp" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="info-alamat" class="col-form-label">Alamat :</label>
									<textarea class="inputalamat" name="info-alamat" class="form-control" id="info-alamat" readonly></textarea>
								</div>
								<input type="hidden" name="info-status" value="✅ Sukses">

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali ke Halaman</button>
								<button name="simpan" type="submit" class="btn btn-yellow" onclick="lakukanPembayaran()">Lakukan Pembayaran</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		</div>
    <!-- ISI -->

    <!-- FOOTER -->
		<footer>
			<h4>&copy;2024 Breeze Store</h4>
		</footer>
    <!-- FOOTER -->
	<script>
		var selectedCategoryId;
		// Fungsi Modal
		function bukaModal(categoryId) {
			console.log('id_kategori : ', categoryId);
			selectedCategoryId = categoryId;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					var dataKategori = JSON.parse(xhr.responseText);

					// Perbarui input tersembunyi
					document.getElementById('id_kategori').value = dataKategori;
					document.getElementById('kategori').value = dataKategori.kategori;
					document.getElementById('harga').value = dataKategori.harga;
					document.getElementById("myModal").style.display = "flex";
				}
			};
			xhr.open("GET", "fungsi_get_kategori.php?" + categoryId, true);
			xhr.send();
		}

		function tutupModal() {
			document.getElementById("myModal").style.display = "none";
		}

		function tutupModal2() {
			document.getElementById("myModal2").style.display = "none";
		}

		function bukaModal2() {
			tutupModal(); // Tutup modal pertama
			document.getElementById("myModal2").style.display = "flex";

			var nama = document.getElementById("terima_nama").value;
			var nomorhp = document.getElementById("terima_nohp").value;
			var alamat = document.getElementById("terima_alamat").value;
			// Kategori
			var kategori = document.getElementById("kategori").value;
			var harga = document.getElementById("harga").value;

			document.getElementById("info-nama").value = nama;
			document.getElementById("info-nomorhp").value = nomorhp;
			document.getElementById("info-alamat").value = alamat;
			document.getElementById("info-kategori").value = kategori;
			document.getElementById("info-harga").value = harga;

		}

		function kembaliKeModalPertama() {
			tutupModal2();
			bukaModal();
		}

		function lakukanPembayaran() {
			alert("Pembayaran berhasil!");
			tutupModal2();
			document.getElementById("terima_nama").value = "";
			document.getElementById("terima_nohp").value = "";
			document.getElementById("terima_alamat").value = "";
		}
	</script>
	</div>
</body>

</html>