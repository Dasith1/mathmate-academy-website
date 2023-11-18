<?php
require('./php/db.php');
require('./php/functions.php');

if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
	header('location:./Home.php');
}
if (isset($_POST['sign'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, hasher($_POST['password']));


	if (isset($_POST['rem'])) {
		login($email, $password, strval($_POST['rem']));
	} else {
		login($email, $password, '0');
	}


}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="./css/Sign in.css" />
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
    session_start();
    require('./php/nav.php');
    ?>
	<section style="margin-top:50px">

		<div class="image-box">
			<img src="Photos/Sign In.jpg">
		</div>


		<div class="content-box">
			<div class="form-box">

				<h2> Sign In </h2>

				<form action="Sign in.php" method="post">

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