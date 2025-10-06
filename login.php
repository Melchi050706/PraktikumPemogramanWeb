<?php

session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Login sederhana
$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Username & password hardcode (bisa dikembangkan pakai database)
    if ($user === "117" && $pass === "anjay") {
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - HSR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Login</h2>
        <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>
</html>
