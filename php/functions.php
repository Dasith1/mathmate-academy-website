<?php

$hashFormat = "$2y$10$";
$salt = "Zml0aHViIGJ5YW5iMTE0Mg";
$hash_and_salt = $hashFormat . $salt;
function hasher($password)
{
    global $hash_and_salt;
    return crypt($password, $hash_and_salt);
}
function logout()
{
    unset($_COOKIE['id']);
    unset($_COOKIE['admin']);
    session_unset();
    session_destroy();
    header('location:index.php');
}
function checksession($admin = '0')
{
    global $conn;
    $name = 'id';
    $table = 'users';
    if ($admin == '1') {
        $name = 'admin';
        $table = 'admin';

    }
    if (isset($_COOKIE['admin'])) {
        $_SESSION['admin'] == $_COOKIE['admin'];
    }
    if (isset($_COOKIE['id'])) {
        $_SESSION['id'] == $_COOKIE['id'];
    }
    if (!isset($_SESSION[$name])) {
        header('location:./index.php');
    }

    $select = "SELECT * FROM `$table` WHERE `id` = '" . $_SESSION[$name] . "'";
    if (mysqli_num_rows(mysqli_query($conn, $select)) < 1) {
        logout();
    }
}

function login($email, $password, $rem = '0', $admin = '0')
{
    global $conn;
    $table = 'users';
    $name = 'id';
    if ($admin == '1') {
        $table = 'admin';
        $name = 'admin';
    }
    $select = "SELECT `id` FROM `$table` WHERE `email` = '$email'  && `password` = '$password'";
    $result = mysqli_query($conn, $select);
    $user = mysqli_fetch_assoc($result);
    if (empty($user)) {
        echo "<script>alert('Invalid Email or Password')</script>";
        return;
    }

    $userid = $user['id'];

    if ($rem == '1') {
        $_COOKIE[$name] = $userid;
    }
    $_SESSION[$name] = $userid;
    if ($admin == '1') {
        header('location:Admin.php');
    }
    header('location:Home.php');
}

?>