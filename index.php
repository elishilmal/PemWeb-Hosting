<?php
// ================== IDENTITAS ==================
$nama_mhs = "Elis Hilmal Muhibah Syawalah";
$nim = "23552011313";
$matkul = "Pemrograman Web 1";

// ================== KONEKSI DATABASE (RAILWAY) ==================
$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");
$db = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Koneksi gagal");
}

// ================== CRUD PROSES ==================
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (nama, email) VALUES ('$nama', '$email')");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET nama='$nama', email='$email' WHERE id='$id'");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM users WHERE id='$id'");
}

// ================== DATA EDIT ==================
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = $conn->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>TUGAS PEMWEB 1</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center
        }

        input,
        button {
            padding: 8px;
            margin: 5px
        }
    </style>
</head>

<body>

    <header>
        <h1>👨‍💻 Dashboard</h1>
        <p><?= $matkul ?></p>
    </header>

    <main class="container">

        <!-- ================== PROFIL ================== -->
        <section class="card">
            <h2>Pengenalan Diri</h2>
            <p><strong>Nama:</strong> <?= $nama_mhs ?></p>
            <p><strong>NIM:</strong> <?= $nim ?></p>
            <p><strong>Mata Kuliah:</strong> <?= $matkul ?></p>
        </section>

        <!-- ================== FORM CRUD ================== -->
        <section class="card">
            <h2>CRUD Data User</h2>

            <form method="post">
                <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">

                <input type="text" name="nama" placeholder="Nama" value="<?= $edit['nama'] ?? '' ?>" required>

                <input type="email" name="email" placeholder="Email" value="<?= $edit['email'] ?? '' ?>" required>

                <button type="submit" name="<?= $edit ? 'update' : 'simpan' ?>">
                    <?= $edit ? 'Update' : 'Simpan' ?>
                </button>
            </form>

            <!-- ================== TABEL DATA ================== -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $data = $conn->query("SELECT * FROM users");
                while ($row = $data->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </section>
    </main>

    <footer>
        © 2025 • Pemrograman Web 1
    </footer>

</body>

</html>