<?php
require('./php/db.php');
require('./php/functions.php');

if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
	header('location:./Home.php');
}

if (isset($_POST['sign'])) {

	if ($_POST['password'] !== $_POST['passwordconfirm']) {
		echo "<script>alert('Passwords don't match')</script>";
		return;
	}

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, hasher($_POST['password']));
	$grade = mysqli_real_escape_string($conn, $_POST['grade']);

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('Email isn't valid')</script>";
		return;
	}
	$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email`='$email'");
	if (mysqli_num_rows($select)) {
		exit('This email is already being used');
	}
	$query = "INSERT INTO `users`(`name`,`address`,`email`,`password`,`grade`) VALUES ";
	$query .= "('$name','$address','$email','$password','$grade')";
	$result = mysqli_query($conn, $query);


	if ($result == 1) {
		login($email, $password);
	} else {
		echo "<script>alert('Failed to Sign up')</script>";
		return;
	}

	login($email, $password);
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="./css/Sign Up.css" />
	<link rel="shortcut icon" href="Photos/logo.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
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
	<section style="margin-top:50px">

		<div class="image-box">
			<img src="Photos/Sign up.jpg">
		</div>


		<div class="content-box">
			<div class="form-box">

				<h2> Sign Up </h2>

				<form action="Sign up.php" method="post">

					<div class="input-box">
						<span> Full Name </span>
						<input type="text" name="name" required>
					</div>
					<div class="input-box">
						<span> Address </span>
						<textarea name="address" required></textarea>
					</div>


					<div class="input-box">
						<p> Grade </p>
						<input type="number" name="grade" min="5" max="11" value="5" required>
					</div>

					<div class="input-box">
						<span> Email </span>
						<input type="email" name="email" required>
					</div>
					<div class="input-box">
						<span> Create Password </span>
						<input type="password" name="password" required>
					</div>

					<div class="input-box">
						<span> Confirm Password </span>
						<input type="password" name="passwordconfirm" required>
					</div>

					<br><br>

					<div class="input-box">
						<input type="submit" value="Sign up" name="sign" required>
					</div>

					<div class="input-box">
						<p> Already have an account? <a href="Sign in.php">Sign in</a></p>
					</div>

				</form>


			</div>
		</div>

	</section>



</body>

</html>