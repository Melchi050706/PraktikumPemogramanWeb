<?php
session_start();
session_unset();
session_destroy();

// Redirect ke login.php
header("Location: login/login.php?logout=success");
exit;
