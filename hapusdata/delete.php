<?php
include '../koneksi.php';
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit;
}

// Proses hapus data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM karakter WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data karakter berhasil dihapus!'); window.location='delete.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
}

// Ambil semua data
$query = "SELECT * FROM karakter ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Karakter - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="delete.css">
</head>
<body>
<header>
    <h1>🗑️ Hapus Karakter - Honkai Star Rail CMS</h1>
</header>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="../tambahdata/tambah.php">➕ Tambah Karakter</a></li>
            <li><a href="../lihatdata/lihat.php">📜 Lihat Karakter</a></li>
            <li><a href="../updatedata/update.php">✏️ Edit Karakter</a></li>
            <li><a href="../hapusdata/delete.php" class="active">🗑️ Hapus Karakter</a></li>
            <li><a href="../logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Konten Utama -->
    <main class="content">
        <section>
            <h2>⚠️ Pilih Data yang Ingin Dihapus</h2>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karakter</th>
                            <th>Path</th>
                            <th>Elemen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['path']) ?></td>
                                <td><?= htmlspecialchars($row['elemen']) ?></td>
                                <td>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn"
                                       onclick="return confirm('Yakin ingin menghapus karakter <?= htmlspecialchars($row['nama']) ?>?')">
                                       ❌ Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: #ffd700;">Belum ada data karakter.</p>
            <?php endif; ?>
        </section>
    </main>
</div>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
