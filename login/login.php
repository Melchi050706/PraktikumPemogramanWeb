<?php
session_start();

// Jika user sudah login → langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/dashboard.php");
    exit;
}

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;

    // Kredensial sederhana
    $valid_user = "trailblazer";
    $valid_pass = "hsr123";

    if ($username == $valid_user && $password == $valid_pass) {
        $_SESSION['username'] = $username;
        header("Location: ../dashboard/dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Honkai Star Rail CMS</title>
    <link rel="stylesheet" href="../login.css">
</head>
<body>
<header>
    <h1>🚀 Login - Honkai Star Rail CMS</h1>
</header>

<main>
    <section>
        <h2>Masuk ke Dashboard</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </section>
</main>

<footer>
    <p>© 2025 Honkai Star Rail CMS</p>
</footer>
</body>
</html>
