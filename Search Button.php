<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Search</title>
	<link rel="stylesheet" href="./css/Collection.css" />
	<link rel="stylesheet" href="./css/Orders.css" />
	<link rel="stylesheet" href="./css/Search Button.css" />
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
    require('./php/db.php');
    require('./php/nav.php');



    ?>
	<section class="orders">
		<form action="" method="post">
			<input type="text" name="query" placeholder="Search...">
			<button name="search">Search</button>
		</form>
		<?php
        require('./php/collection.php');
        if (isset($_POST['search'])) {
	        renderCollection('0', '1', $_POST['query']);
        }
        ?>
	</section>
	<!-- footer -->
	<?php
    require('./php/footer.php');
    ?>
</body>

</html>