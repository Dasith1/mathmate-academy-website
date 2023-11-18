<?php
require('./php/db.php');
require('./php/collection.php');


if (isset($_POST['add'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);

	$photo = $_FILES['photo'];
	if ($photo['size'] > 0) {
		$query = "INSERT INTO `collection` (`name`, `price`) VALUES ('$name','$price')";
		$result = mysqli_query($conn, $query);

		$sql = "SELECT * FROM `collection` WHERE `id`=(SELECT max(id) FROM `collection`)";
		$r1 = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($r1);
		$id = $row['id'];

		$type = explode('/', $photo['type'])[1];
		$loc = "./collectionphotos/" . $id . '.' . $type;
		move_uploaded_file($photo['tmp_name'], $loc);
		$loc = mysqli_real_escape_string($conn, $loc);

		$q2 = "UPDATE `collection` SET `photo`='$loc' WHERE id = '$id'";
		$r2 = mysqli_query($conn, $q2);

	} else {
		echo "<script>alert('Invalid photo')</script>";
		return;
	}


	if ($result == 1) {
		echo "<script>alert('Created')</script>";

	} else {
		echo "<script>alert('Failed to create')</script>";
	}


}


if (isset($_POST['cartadd'])) {
	$userid = mysqli_real_escape_string($conn, $_SESSION['id']);
	$item = $_POST['item'];

	$q1 = "SELECT * FROM `cart` WHERE `userid`='$userid'";
	$r1 = mysqli_query($conn, $q1);

	// die();
	if (mysqli_num_rows($r1) == 0) {
		$items = json_encode([$item]);
		$items = mysqli_real_escape_string($conn, $items);

		$q2 = "INSERT INTO `cart`(`userid`,`items`) VALUES ('$userid','$items')";

	} else {
		$items = json_decode(mysqli_fetch_assoc($r1)['items']);
		array_push($items, $item);
		$items = mysqli_real_escape_string($conn, json_encode($items));

		$q2 = "UPDATE `cart` SET `items`='$items' WHERE `userid`='$userid'";
	}

	$r2 = mysqli_query($conn, $q2);


	if ($r2 == 1) {
		echo "<script>alert('Added to cart')</script>";
	} else {
		echo "<script>alert('Failed to add to card')</script>";
	}

}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Collection</title>
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css/Collection.css">
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

    require('./php/nav.php');
    ?>

	<br><br><br>
	<!-- Category -->
	<section id="Categories">

		<!-- heading -->
		<h2> Collection </h2>
		<div class="collection">
			<?php
            if (isset($_SESSION['admin'])) {
            ?>
			<section>
				<div class="content-box">
					<div class="form-box">

						<h2 style="text-align: center;"> Add Collection </h2>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="input-box">
								<span> Name </span>
								<input type="text" name="name" required>
							</div>

							<div class="input-box">
								<span> Price </span>
								<input type="text" name="price" min="1" required>
							</div>

							<div class="input-box">
								<p> Photo </p>
								<input type="file" name="photo" require>
							</div>

							<br>

							<div class="input-box">
								<input type="submit" value="Add to collection" name="add" required>
							</div>


						</form>


					</div>
				</div>
			</section>
			<?php } ?>
		</div>

		<!-- box container -->
		<?php
        if (isset($_SESSION['id'])) {
	        renderCollection();
        } else {
	        renderCollection($limit = '0', $home = '1');
        }
        ?>
		<a href="School Papers.php" target="new" class="category-box">

			<img src="Photos/free papers.jpg" alt="Category">
			<span>Free School Papers</span>

		</a>
	</section>


	<!-- footer -->
	<?php
    require('./php/footer.php');
    ?>

</body>

</html>