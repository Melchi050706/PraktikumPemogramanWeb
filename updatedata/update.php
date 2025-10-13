<?php
include '../koneksi.php';
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit;
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $path = $_POST['path'];
    $elemen = $_POST['elemen'];

    $query = "UPDATE karakter SET nama='$nama', path='$path', elemen='$elemen' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data karakter berhasil diperbarui!'); window.location='../lihatdata/lihat.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data karakter.');</script>";
    }
}

// Ambil semua data karakter untuk dropdown
$query = "SELECT * FROM karakter ORDER BY id ASC";
$result = mysqli_query($conn, $query);

// Ambil data karakter tertentu untuk diedit
$karakter = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM karakter WHERE id='$id'");
    $karakter = mysqli_fetch_assoc($data);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karakter - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<header>
    <h1>✏️ Edit Karakter - Honkai Star Rail CMS</h1>
</header>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="../tambahdata/tambah.php">➕ Tambah Karakter</a></li>
            <li><a href="../lihatdata/lihat.php">📜 Lihat Karakter</a></li>
            <li><a href="../updatedata/update.php" class="active">✏️ Edit Karakter</a></li>
            <li><a href="../hapusdata/delete.php">🗑️ Hapus Karakter</a></li>
            <li><a href="../logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Konten Utama -->
    <main class="content">
        <section>
            <h2>🧭 Pilih Karakter yang Ingin Diedit</h2>

            <form method="get" class="select-form">
                <label for="id">Pilih Karakter:</label>
                <select name="id" id="id" required>
                    <option value="">-- Pilih Karakter --</option>
                    <?php 
                    $no = 1; // Mulai nomor urut dari 1
                    while ($row = mysqli_fetch_assoc($result)): 
                    ?>
                        <option value="<?= $row['id'] ?>" <?= isset($karakter['id']) && $karakter['id'] == $row['id'] ? 'selected' : '' ?>>
                            <?= $no++ ?>. <?= htmlspecialchars($row['nama']) ?> (<?= htmlspecialchars($row['path']) ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
                <button type="submit">Pilih</button>
            </form>

            <?php if ($karakter): ?>
                <h3>🪶 Formulir Edit Karakter</h3>
                <form method="post" class="edit-form">
                    <input type="hidden" name="id" value="<?= $karakter['id'] ?>">

                    <label>Nama Karakter:</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($karakter['nama']) ?>" required>

                    <label>Path:</label>
                    <input type="text" name="path" value="<?= htmlspecialchars($karakter['path']) ?>" required>

                    <label>Elemen:</label>
                    <input type="text" name="elemen" value="<?= htmlspecialchars($karakter['elemen']) ?>" required>

                    <button type="submit" name="update">💾 Simpan Perubahan</button>
                </form>
            <?php endif; ?>
        </section>
    </main>
</div>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
