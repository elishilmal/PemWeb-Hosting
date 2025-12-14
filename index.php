<?php
$nama = "Elis Hilmal Muhibah Syawalah";
$nim = "23552011313";
$matkul = "Pemrograman Web 1";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title>TUGAS PEMWEB 1</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="background"></div>


<header class="fade-down">
<h1>👨‍💻 Dashboard</h1>
<span class="subtitle">Pemrograman Web 1</span>
</header>


<main class="container">
<section class="card glass slide-left">
<h2>Pengenalan Diri</h2>
<p><strong>Nama:</strong> <?php echo $nama; ?></p>
<p><strong>NIM:</strong> <?php echo $nim; ?></p>
<p><strong>Mata Kuliah:</strong> <?php echo $matkul; ?></p>
</section>


<section class="card glass slide-right">
<h2>Tugas Pemrograman Web 1</h2>
<p>
Website ini dibuat sebagai tugas mata kuliah <strong>Pemrograman Web 1</strong>
</p>
<button onclick="showAlert()">🚀 Klik ini</button>
</section>
</main>


<footer class="fade-up">
© 2025 • Tugas Pemrograman Web 1
</footer>


<script src="js/script.js"></script>
</body>
</html>