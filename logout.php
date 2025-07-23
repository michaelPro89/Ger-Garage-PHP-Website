<?php
ini_set('session.save_path', 'C:\xampp\session');
session_start();
session_destroy();
header("Location: login.php");
?>

