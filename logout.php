<?php
session_start();

// Destroy the admin session and redirect to admin login page
session_destroy();
header("Location: login.php");
exit();
?>
