<?php
require('./php/db.php');
require('./php/functions.php');
if (isset($_POST['sign'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, hasher($_POST['password']));

	if (isset($_POST['rem'])) {
		login($email, $password, strval($_POST['rem']), '1');
	} else {
		login($email, $password, '0', '1');
	}


}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin Sign in</title>
	<link rel="stylesheet" type="text/css" href="./css/Sign in.css" />
	<link rel="shortcut icon" href="Photos/logo.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<section>

		<div class="image-box">
			<img src="Photos/Sign In.jpg">
		</div>


		<div class="content-box">
			<div class="form-box">

				<h2>Admin Sign In </h2>

				<form action="Admin Sign in.php" method="post">

					<div class="input-box">
						<span>Email</span>
						<input type="email" name="email" required>
					</div>

					<div class="input-box">
						<span>Password</span>
						<input type="password" name="password" required>
					</div>

					<div class="remember">
						<label><input type="checkbox" value="1" name="rem"> Remember Me </label>
					</div>

					<div class="input-box">
						<input type="submit" value="Sign in" name="sign">
					</div>

					<div class="input-box">
						<p> Don't have an account? <a href="Sign Up.php" target="new">Sign up</a></p>
					</div>

				</form>

				<h3>Login with Social Media</h3>
				<div class="social-media">

					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>

				</div>
			</div>
		</div>

	</section>

</body>

</html>