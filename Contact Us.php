<?php
require('./php/db.php');
if (isset($_POST['contact'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);

	$query = "INSERT INTO `contact`( `name`, `email`, `msg`) VALUES ('$name','$email','$msg')";
	$result = mysqli_query($conn, $query);
	if ($result == 1) {
		echo "<script>alert('Message Sent!')</script>";
	} else {
		echo "<script>alert('Message Failed')</script>";
	}


}

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>Contact Us</title>
	<link rel="stylesheet" href="./css/Contact Us.css" />
	<link rel="shortcut icon" href="Photos/MMA Logo Final.png" />
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/b47a1fc140.js" crossorigin="anonymous"></script>

	<!-- Poppins font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet" />
</head>

<body>
	<?php
    require('./php/nav.php');
    ?>

	<!-- contact -->
	<section class="contact">
		<div class="content">
			<h2>Contact Us</h2>
			<p>Welcome to MMA Support Center</p>
		</div>

		<div class="container">
			<div class="contactInfo">
				<div class="box">
					<style>
						a {
							color: #ff4518;
						}
					</style>

					<div class="icon">
						<a href="https://www.google.lk/maps/place/7%C2%B001'48.2%22N+80%C2%B000'58.4%22E/@7.0298906,80.0159355,79m/data=!3m1!1e3!4m9!1m2!2m1!1sweliweriya+gampaha!3m5!1s0x0:0x661ad40040109b5!7e2!8m2!3d7.0300466!4d80.016207"
							target="new"><i class="fa-solid fa-location-dot"></i></a>
					</div>
					<div class="text">
						<h3>
							<a href="https://www.google.lk/maps/place/7%C2%B001'48.2%22N+80%C2%B000'58.4%22E/@7.0298906,80.0159355,79m/data=!3m1!1e3!4m9!1m2!2m1!1sweliweriya+gampaha!3m5!1s0x0:0x661ad40040109b5!7e2!8m2!3d7.0300466!4d80.016207"
								target="new">Address</a>
						</h3>
						<p>Weliweriya, Gampaha</p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fas fa-phone"></i></div>
					<div class="text">
						<h3>Phone</h3>
						<p>(071)4398375</p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fa-solid fa-envelope"></i></div>
					<div class="text">
						<h3>Email</h3>
						<p>warshaavangi@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="contactForm">
				<form action="Contact Us.php" method="post" name="frmcontact">
					<h2>Send Message</h2>
					<div class="inputBox">
						<input type="text" name="name" id="full_name" required="required" />
						<span>Full Name </span>
					</div>

					<div class="inputBox">
						<input type="text" name="email" required="required" id="email" />
						<span>Email</span>
					</div>

					<div class="inputBox">
						<textarea required="required" name="msg" id="message"></textarea>
						<span>Type Your Message</span>
					</div>

					<div class="inputBox">
						<input type="submit" name="contact" value="Send" />
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