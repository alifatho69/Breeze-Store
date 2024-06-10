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
    <title>Register | Breeze Store</title>
</head>
<body>
<!-- NAVBAR (Awal) -->
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
<!-- NAVBAR (Akhir) -->


<!-- Isi (Awal) -->
    <center>
        <div class="register-container">
            <h2>Register</h2>
            <p>Silakan isi formulir pendaftaran di bawah ini:</p>
            <form action="register-proses.php" method="post">
                <input class="input" type="text" name="username" placeholder="Nama Lengkap" required>
                <input class="input" type="email" name="email" placeholder="Email" required>
                <input class="input" type="password" name="password" placeholder="Password" required>
                <button class="input" type="submit" class="btn_login" name="register" id="register">Register</button>
            </form>
            <p>Sudah punya akun? <a href="login.php" class="acc">Login di sini</a></p>
        </div>
    </center>
<!-- Isi (Akhir) -->


<!-- Footer (Awal) -->
    <footer>
        <p>Website by Manusia | Copyright 2024</p>
    </footer>
<!-- Footer (Akhir) -->    
</body>
</html>

