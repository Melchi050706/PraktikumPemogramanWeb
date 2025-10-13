<?php
include '../koneksi.php';
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit;
}

// Ambil data dari tabel karakter
$query = "SELECT * FROM karakter ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karakter - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="lihat.css">
</head>
<body>
<header>
    <h1>📜 Daftar Karakter - Honkai Star Rail CMS</h1>
</header>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="../tambahdata/tambah.php">➕ Tambah Karakter</a></li>
            <li><a href="../lihatdata/lihat.php" class="active">📜 Lihat Karakter</a></li>
            <li><a href="../updatedata/update.php">✏️ Edit Karakter</a></li>
            <li><a href="../hapusdata/delete.php">🗑️ Hapus Karakter</a></li>
            <li><a href="../logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Konten Utama -->
    <main class="content">
        <section>
            <h2>🌠 Data Karakter Honkai: Star Rail</h2>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karakter</th>
                            <th>Path</th>
                            <th>Elemen</th>
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
