<?php
require('./php/db.php');
$userid = mysqli_real_escape_string($conn, $_SESSION['id']);

$q1 = "SELECT * FROM `cart` WHERE `userid`=" . $userid . ";";
$r1 = mysqli_query($conn, $q1);

if (mysqli_num_rows($r1) > 0) {
	$items = json_decode(mysqli_fetch_assoc($r1)['items']);
}

if (isset($_POST['cartremove'])) {
	unset($items[array_search($_POST['item'], $items)]);
	array_unshift($items, "");
	$items = array_slice($items, 1, null);
	$newitems = mysqli_real_escape_string($conn, json_encode($items));
	$q2 = "UPDATE `cart` SET `items`='$newitems' WHERE `userid`='$userid'";
	$r2 = mysqli_query($conn, $q2);

	if ($r2 == 1) {
		echo "<script>alert('Removed from cart')</script>";

	} else {
		echo "<script>alert('Failed remove from card')</script>";
	}

}


if (isset($_POST['buy'])) {
	$photo = $_FILES['photo'];
	if ($photo['size'] > 0) {
		$newitems = mysqli_real_escape_string($conn, json_encode($items));

		$q3 = "INSERT INTO `orders`(`userid`,`items`) VALUES ('$userid','$newitems')";
		$r3 = mysqli_query($conn, $q3);

		$q4 = "SELECT * FROM `orders` WHERE `id`=(SELECT max(id) FROM `orders`)";
		$r4 = mysqli_query($conn, $q4);
		$row = mysqli_fetch_assoc($r4);
		$id = $row['id'];

		$type = explode('/', $photo['type'])[1];
		$loc = "./orderphotos/" . $id . '.' . $type;
		move_uploaded_file($photo['tmp_name'], $loc);
		$loc = mysqli_real_escape_string($conn, $loc);

		$q5 = "UPDATE `orders` SET `photo`='$loc' WHERE id = '$id'";
		$r5 = mysqli_query($conn, $q5);


		$q6 = "DELETE FROM `cart` WHERE `userid`=" . $userid . ";";
		$r6 = mysqli_query($conn, $q6);

		if ($r6 == 1) {
			echo "<script>alert('Made order')</script>";
			header('location:./Cart.php');
		} else {
			echo "<script>alert('Failed make order')</script>";
			return;
		}
	} else {
		echo "<script>alert('Invalid photo')</script>";
		return;
	}
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="./css/Cart.css">
	<link rel="stylesheet" type="text/css" href="./css/Collection.css">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="Photos/MMA Logo Final.png">

	<!-- Poppins font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
</head>

<body>
	<!--navigation-->
	<?php
    require('./php/nav.php'); ?>
	<section class="cart">
		<?php
        if (mysqli_num_rows($r1) > 0) {

	        echo '<div class="feature-product-container">';
	        $total = 0;

	        foreach ($items as $item) {
		        $sql = "SELECT * FROM `collection` WHERE `id`='$item'";
		        $r = mysqli_query($conn, $sql);


		        while ($row = mysqli_fetch_assoc($r)) {
			        echo '
            
        <div class="feature-product-box">
        <!-- img -->
		 <div class="product-feature-img">
            <img src="' . $row['photo'] . '" alt="" />
        </div>
		 <!-- text container -->
        <div class="product-feature-text-container">
            <!-- text -->
            <div class="product-feature-text">
                <strong>' . $row['name'] . '</strong>
                <span>LKR ' . $row['price'] . '</span>
            </div>
            <!-- cart like icon -->
            <form class="cart-like" action="./Cart.php" method="post">
            <!-- cart icon -->
                    <input type="text" name="item" value="' . $row['id'] . '" style="display: none;">
                    <button name="cartremove" type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </div></div>';
			        $total += $row['price'];
		        }
	        }
	        echo '</div>';


        ?>
		<div class="buy">
			<p>Total: LKR
				<?php echo $total; ?>
			</p>
			<form action="./Cart.php" method="post" enctype="multipart/form-data">
				<div class="input-box">
					<p> Receipt Photo </p>
					<input type="file" name="photo" required>
				</div>
				<button type="submit" name="buy">Buy</button>
			</form>
		</div>
	</section>
	<?php

        } else {
	        echo '<h2 style="text-align:center;">No items in cart</h2>';
        } ?>
	<!-- footer -->
	<?php
    require('./php/footer.php');
    ?>
</body>

</html>