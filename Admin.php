<?php
require('./php/db.php');
require('./php/functions.php');
checksession('1');

if (isset($_POST['del'])) {
    if ($_POST['table'] == 'collection') {
        $query = "UPDATE `" . $_POST['table'] . "` SET `unlisted`='1' WHERE id = '" . $_POST['id'] . "'";
        $result = mysqli_query($conn, $query);

    } else {
        $q1 = "DELETE FROM `" . $_POST['table'] . "` WHERE `id`='" . $_POST['id'] . "' ";
        $r1 = mysqli_query($conn, $q1);
        if (isset($_POST['photo'])) {
            if (file_exists($_POST['photo'])) {
                unlink($_POST['photo']);
            }
        }
    }


}


if (isset($_POST['update'])) {
    $query = "UPDATE `" . $_POST['table'] . "` SET ";
    foreach (json_decode($_POST['names']) as $name) {
        if ($name == 'photo' || $name == 'id') {
            continue;
        }
        $query .= "`$name` = '" . mysqli_real_escape_string($conn, $_POST[$name]) . "',";
    }
    $query = rtrim($query, ',');
    $query .= " WHERE id = '" . $_POST['id'] . "'";

    $result = mysqli_query($conn, $query);
    if ($result == 1) {
        echo "<script>alert('Edited')</script>";
    } else {
        echo "<script>alert('Failed to edit')</script>";
    }
}
function makeTable($title, $table, $edit, $ths, $names)
{
    global $conn;

    echo '<div class="' . $table . '"><h1>' . $title . ' Table</h1><table><tr>';
    foreach ($ths as $th) {
        echo '<th>' . $th . '</th>';
    }
    echo '<th></th>';
    echo '</tr>';

    $sql = "SELECT * FROM `$table`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($names as $name) {
                if ($name == 'photo' && !empty($row[$name])) {
                    echo '<td><a target="new" href="' . $row[$name] . '">Click to open</a></td>';

                } else if ($name == 'items') {
                    $items = json_decode($row[$name]);
                    $itemnames = '';
                    foreach ($items as $i => $item) {
                        $q3 = "SELECT `name` FROM `collection` WHERE `id`='$item' ";
                        $r3 = mysqli_query($conn, $q3);
                        $row2 = mysqli_fetch_assoc($r3);
                        if ($i + 1 == count($items)) {
                            $itemnames .= $row2['name'];
                        } else {
                            $itemnames .= $row2['name'] . ',';
                        }
                    }
                    echo "<td>" . $itemnames . "</td>";

                } else if ($name == 'getname') {
                    $q3 = "SELECT `name` FROM `users` WHERE `id`='" . $row['userid'] . "' ";
                    $r3 = mysqli_query($conn, $q3);
                    $row3 = mysqli_fetch_assoc($r3);
                    echo "<td>" . $row3['name'] . "</td>";

                } else {
                    echo "<td>" . $row[$name] . "</td>";
                }
            }
            echo '<td>
            <form action="" method="post">
            <input style="display:none;" type="text" name="table" value="' . $table . '">
            <input style="display:none;" type="text" name="id" value="' . $row['id'] . '">
            ';
            if (isset($row['photo'])) {
                if (!empty($row['photo'])) {
                    echo '<input style="display:none;" type="text" name="photo" value="' . $row['photo'] . '">';
                }
            }
            if ($table !== 'collection' || ($table == 'collection' && $row['unlisted'] == '0')) {
                echo '
                    <button type="submit" name="del">
                        <i class="fas fa-trash"></i>
                    </button>
                ';
            }

            if ($edit == '1') {
                echo "
                <input style='display:none;' type='text' name='names' value='" . json_encode($names) . "'>
                <input style='display:none;' type='text' name='ths' value='" . json_encode($ths) . "'>
                <button type='submit' name='edit'>
                    <i class='fas fa-edit'></i>
                </button>";

            }

            echo '</form>
            </td>';
            echo "</tr>";
            ;
        }
    }
    echo '</table></div>';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="./css/Admin.css" />
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
    <section class="admin">
        <?php

        if (isset($_POST['edit'])) {
            $q1 = "SELECT * FROM `" . $_POST['table'] . "` WHERE `id`='" . $_POST['id'] . "' ";
            $r1 = mysqli_query($conn, $q1);
            $row = mysqli_fetch_assoc($r1);
            echo '<div class="content-box">
            <div class="form-box">
            <form action="" method="post">';
            foreach (json_decode($_POST['names']) as $i => $name) {
                if ($name == 'photo') {
                    continue;
                }


                if ($name == 'id') {
                    echo '
                    <div  style="display:none;" class="input-box">
						<span> ' . json_decode($_POST['ths'])[$i] . ' </span>
                        <input type="text" name="' . $name . '" value="' . $row[$name] . '">
                    </div>
                    ';
                } else if ($name == 'dob') {
                    echo '
                    <div  class="input-box">
						<span> ' . json_decode($_POST['ths'])[$i] . ' </span>
                        <input " type="date" name="' . $name . '" value="' . $row[$name] . '">
                    </div>
                    ';
                } else {
                    echo '
                    <div class="input-box">
						<span> ' . json_decode($_POST['ths'])[$i] . ' </span>
                        <input  type="text" name="' . $name . '" value="' . $row[$name] . '">
                    </div>
                    ';
                }
            }
            echo "
            <input style='display:none;' type='text' name='table' value='" . $_POST['table'] . "'>
            <input style='display:none;' type='text' name='names' value='" . $_POST['names'] . "'>
            <div class='input-box'>     <input type='submit' name='update' value='Update'></div>
            </form></div></div>";
        }

        makeTable('User', 'users', '1', ['ID', 'Name', 'Email', 'Birthday', 'Grade', 'Address'], ['id', 'name', 'email', 'dob', 'grade', 'address']);
        makeTable('Collection', 'collection', '1', ['ID', 'Name', 'Price', 'Unlisted', 'Photo'], ['id', 'name', 'price', 'unlisted', 'photo']);
        makeTable('Orders', 'orders', '0', ['UserID', 'Name', 'Items', 'Photo'], ['userid', 'getname', 'items', 'photo']);
        makeTable('Contact messeges', 'contact', '0', ['Name', 'Email', 'Message'], ['name', 'email', 'msg']);
        ?>

    </section>

    <!-- footer -->
    <?php

    require('./php/footer.php');
    ?>

</body>

</html>