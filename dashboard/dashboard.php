<?php
session_start();

// Jika belum login → redirect ke login.php
if (!isset($_SESSION['username'])) {
    header("Location: login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<header>
    <h1>🌠 Dashboard - Honkai Star Rail CMS</h1>
</header>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="../tambahdata/tambah.php">➕ Tambah Karakter</a></li>
            <li><a href="../lihatdata/lihat.php">📜 Lihat Karakter</a></li>
            <li><a href="../updatedata/update.php">✏️ Edit Karakter</a></li>
            <li><a href="../hapusdata/delete.php">🗑️ Hapus Karakter</a></li>
            <li><a href="../logout.php" class="logout">🚪 Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <section>
            <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p style="color:lightgreen;">Login berhasil! Selamat datang kembali, Trailblazer.</p>
            <p>Anda sekarang berada di dashboard pribadi Anda. Gunakan menu di sebelah kiri untuk mengelola data karakter Honkai: Star Rail.</p>
            <div class="info-card">
                <h3>✨ Info Sistem</h3>
                <p>Sistem ini memungkinkan Anda untuk melakukan CRUD data karakter dengan mudah. Jelajahi menu di kiri untuk memulai!</p>
            </div>
        </section>
    </main>
</div>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
