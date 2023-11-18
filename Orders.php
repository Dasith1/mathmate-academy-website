<?php
require('./php/db.php');
require('./php/functions.php');

checksession();

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Orders</title>
	<link rel="stylesheet" type="text/css" href="./css/Collection.css">
	<link rel="stylesheet" type="text/css" href="./css/Orders.css">
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
    require('./php/nav.php');
    ?>

	<section class="orders">

		<h2>Orders</h2>
		<?php
        $uid = mysqli_real_escape_string($conn, $_SESSION['id']);

        $q1 = "SELECT * FROM `orders` WHERE `userid`=" . $uid . ";";
        $r1 = mysqli_query($conn, $q1);

        if (mysqli_num_rows($r1) > 0) {
	        while ($row = mysqli_fetch_assoc($r1)) {

		        echo '<h3>Order ' . $row['id'] . '</h3><div class="feature-product-container">';
		        $total = 0;
		        $items = json_decode($row['items']);

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
								</div>
							
							</div></div>';
			        }
		        }
		        echo '</div>';
	        }
        }
        ?>
	</section>
	<?php
    require('./php/footer.php');
    ?>
</body>

</html>