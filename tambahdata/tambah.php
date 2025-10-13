<?php
include '../koneksi.php';
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit;
}

// Proses tambah data
if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $path = trim($_POST['path']);
    $elemen = trim($_POST['elemen']);

    if (!empty($nama) && !empty($path) && !empty($elemen)) {
        $query = "INSERT INTO karakter (nama, path, elemen) VALUES ('$nama', '$path', '$elemen')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('✅ Karakter berhasil ditambahkan!'); window.location='../lihatdata/lihat.php';</script>";
        } else {
            echo "<script>alert('❌ Gagal menambahkan karakter!');</script>";
        }
    } else {
        echo "<script>alert('⚠️ Semua field harus diisi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karakter - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
<header>
    <h1>➕ Tambah Karakter - Honkai Star Rail CMS</h1>
</header>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="../tambahdata/create.php" class="active">➕ Tambah Karakter</a></li>
            <li><a href="../lihatdata/lihat.php">📜 Lihat Karakter</a></li>
            <li><a href="../updatedata/update.php">✏️ Edit Karakter</a></li>
            <li><a href="../hapusdata/delete.php">🗑️ Hapus Karakter</a></li>
            <li><a href="../logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Konten Utama -->
    <main class="content">
        <section>
            <h2>🌟 Form Tambah Karakter</h2>
            <form method="POST" class="form-container">
                <label for="nama">Nama Karakter:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama karakter" required>

                <label for="path">Path:</label>
                <input type="text" id="path" name="path" placeholder="Contoh: The Hunt, Destruction, dll." required>

                <label for="elemen">Elemen:</label>
                <input type="text" id="elemen" name="elemen" placeholder="Contoh: Fire, Ice, Lightning, dll." required>

                <button type="submit" name="submit">Tambah Karakter</button>
            </form>
        </section>
    </main>
</div>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
