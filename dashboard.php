<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - HSR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dashboard Trailblazer</h1>
    </header>
    <main>
        <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Ini adalah dashboard sistem manajemen karakter Honkai: Star Rail.</p>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </main>
</body>
</html>
