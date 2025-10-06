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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>🌠 Dashboard - Honkai Star Rail CMS</h1>
</header>

<main>
    <section>
        <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p style="color:lightgreen;">Login berhasil! Selamat datang kembali, Trailblazer.</p>
        <p>Anda sekarang berada di halaman dashboard pribadi Anda.</p>

        <a href="logout.php" class="btn btn-primary">Logout</a>
    </section>
</main>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
