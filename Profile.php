<?php
require('./php/db.php');
require('./php/functions.php');

checksession();

$uid = mysqli_real_escape_string($conn, $_SESSION['id']);

$sql = "SELECT * FROM `users` WHERE `id`='$uid';";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);



if (isset($_POST['update'])) {
    $password = hasher($_POST['password']);

    if ($_POST['newpassword'] !== $_POST['newpasswordconfirm']) {
        echo "<script>alert('Passwords don't match')</script>";
        return;
    }

    $query = "UPDATE `users` SET ";

    foreach (['email', 'name', 'dob', 'grade', 'notes', 'address'] as $name) {
        if ($_POST[$name] !== $user[$name]) {
            $query .= "`$name` = '" . mysqli_real_escape_string($conn, $_POST[$name]) . "',";
        }
    }
    $query = rtrim($query, ',');

    $newpassword = mysqli_real_escape_string($conn, hasher($_POST['newpassword']));
    if ($newpassword !== '') {
        $query .= ",`password` = '$newpassword'";
    }

    $photo = $_FILES['photo'];

    if ($photo['size'] > 0) {
        $type = explode('/', $photo['type'])[1];
        $loc = "./dp/" . $uid . '.' . $type;
        move_uploaded_file($photo['tmp_name'], $loc);

        $loc = mysqli_real_escape_string($conn, $loc);
        $query .= ",`photo` = '$loc'";
    }


    $query .= " WHERE id = '$uid'";

    $result = mysqli_query($conn, $query);

    if ($result == 1) {
        header('location:Profile.php');

    } else {
        echo "<script>alert('Failed to update')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="stylesheet" href="./css/Profile.css" />
    <link rel="stylesheet" href="./css/Collection.css" />
    <link rel="shortcut icon" href="Photos/MMA Logo Final.png" />
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

    <!-- Poppins font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!--navigation-->
    <?php
    require('./php/nav.php');
    ?>


    <section>

        <div class="image-box">
            <img src="Photos/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png">

        </div>

        <div class="content-box">
            <div class="form-box">

                <h2> Profile </h2>
                <form action="Profile.php" method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <img class="dp" src="<?php echo $user['photo'] ?>" alt="">
                        <p> Photo </p>
                        <input type="file" name="photo">
                    </div>

                    <div class="input-box">
                        <span> Email </span>
                        <input type="email" name="email" value="<?php echo $user['email'] ?>" required>
                    </div>
                    <div class="input-box">
                        <span> Full Name </span>
                        <input type="text" name="name" value="<?php echo $user['name'] ?>" required>
                    </div>
                    <div class="input-box">
                        <p> Grade </p>
                        <input type="number" name="grade" min="5" max="11" value="5"
                            value="<?php echo $user['grade'] ?>" required>
                    </div>

                    <div class="input-box">
                        <span> Birthday </span>
                        <input type="date" name="dob" value="<?php echo $user['dob'] ?>" required>
                    </div>

                    <div class="input-box">
                        <span> Address </span>
                        <textarea name="address" required><?php echo $user['address'] ?></textarea>
                    </div>


                    <div class="input-box">
                        <span> Notes </span>
                        <textarea name="notes" required><?php echo $user['notes'] ?></textarea>
                    </div>




                    <div class="input-box">
                        <span> You need the Password to Confirm Update </span>
                        <input type="password" name="password" required>
                    </div>

                    <div class="input-box">
                        <span> New Password (Only type if you're changing it) </span>
                        <input type="password" name="newpassword">
                    </div>
                    <div class="input-box">
                        <span> New Password Confirm (Only if you're changing it) </span>
                        <input type="password" name="newpasswordconfirm">
                    </div>

                    <br>

                    <div class="input-box">
                        <input type="submit" value="Update" name="update" required>
                    </div>


                </form>


            </div>
        </div>

    </section>

    <!-- footer -->
    <?php

    require('./php/footer.php');
    ?>
</body>

</html>