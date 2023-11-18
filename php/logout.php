<?php
session_start();
unset($_COOKIE['id']);
unset($_COOKIE['admin']);
session_unset();
session_destroy();
header('location:../index.php');
?>