<?php
require('./php/db.php');
require('./php/collection.php');

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Home Page</title>

	<!-- style sheet page icon -->
	<link rel="stylesheet" type="text/css" href="./css/Home.css" />
	<link rel="shortcut icon" href="Photos/MMA Logo Final.png" />
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

	<!-- Poppins font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet" />
	<!-- <link rel="stylesheet" href="./css/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
</head>

<body>
	<!--navigation-->
	<?php

    require('./php/nav.php');
    ?>
	<!--  main section  -->
	<section id="main">
		<!-- main content -->
		<div class="main-content">
			<!-- text -->
			<div class="main-text">
				<span>Vision</span>
				<h1>Become an Expert from an Expert Teacher</h1>
				<p>Our Vision is to Achieve High Pass in the Subjects as well as a Genius in those Subjects</p>
				<a href="Sign Up.php">Register Now</a>
			</div>

			<!-- main img -->
			<div class="main-img">
				<img src="Photos/Logo PNG.png" id="mimg" alt="MMA Logo" />
			</div>
		</div>
	</section>

	<!-- Grades -->
	<section id="grades">
		<!-- heading -->
		<h2>School Test Papers</h2>

		<!-- box container -->
		<div class="grade-container">
			<!-- box 1 -->
			<a href="https://drive.google.com/drive/folders/1akWCZbq7g4D4ItS3YPQcp_pDb6xPf9Cy" target="new"
				class="grade-box">
				<img src="Photos/Grade-5.jpg" alt="Grade 5" />
				<span>Grade 5</span>
			</a>

			<!-- box 2 -->
			<a href="https://drive.google.com/drive/folders/1d2pm6pogsX5XlqyyCnwLAgkz-KofogmE" target="new"
				class="grade-box">
				<img src="Photos/Grade-6.jpg" alt="Grade 6" />
				<span>Grade 6</span>
			</a>

			<!-- box 3 -->
			<a href="https://drive.google.com/drive/folders/1NevtfyuDI0wRLMio3bMX22e9haunRq20" target="new"
				class="grade-box">
				<img src="Photos/Grade-7.jpg" alt="Grade 7" />
				<span>Grade 7</span>
			</a>

			<!-- box 4 -->
			<a href="https://drive.google.com/drive/folders/1yEf4F8xfDY-WvGlQv6DAJnRaTlnWb94Y" target="new"
				class="grade-box">
				<img src="Photos/Grade-8.jpg" alt="Grade 8" />
				<span>Grade 8</span>
			</a>

			<!-- box 5 -->
			<a href="https://drive.google.com/drive/folders/1hzcFHerN3cvBxMsVfwoGbzwhF1zj4Fbe" target="new"
				class="grade-box">
				<img src="Photos/Grade-9.jpg" alt="Grade 9" />
				<span>Grade 9</span>
			</a>

			<!-- box 6 -->
			<a href="https://drive.google.com/drive/folders/1FQgu7z8C5K45vjd0arQ7rlfVRHxx7U8H" target="new"
				class="grade-box">
				<img src="Photos/Grade-10.jpg" alt="Grade 10" />
				<span>Grade 10</span>
			</a>

			<!-- box 7 -->
			<a href="https://drive.google.com/drive/folders/1VE0x38-2SqGgJi_3BY3SQDmv6g4bf1rf" target="new"
				class="grade-box">
				<img src="Photos/Grade-11.jpg" alt="Grade 11" />
				<span>Grade 11</span>
			</a>
		</div>
	</section>

	<!-- Feature Products -->
	<section id="feature-product">
		<!-- heading -->
		<h2>Bundles of Past Papers and Tutes</h2>

		<!-- box container -->

		<?php
        renderCollection('3', '1');
        ?>

	</section>

	<!-- Banner -->
	<section id="banner">
		<!-- text -->
		<div class="banner-text">
			<strong>HOW TO JOIN WITH MATH MATE ACADEMY</strong>
			<span>Using your Device</span>
			<p>
				Math Mate Academy Online Learning System has Modern, Creative features that all Students need
				to carry out their Learning Online Seamlessly, So Learning Online is now Very Easy.
			</p>
			<a href="Sign Up.php">Join Now</a>
		</div>

		<!-- video -->
		<div class="banner-video">
			<iframe class="embed-responsive-item" src="Photos/Video.mp4"></iframe>
		</div>
	</section>

	<!-- Discount -->
	<section id="news">
		<!-- heading -->
		<h3>Latest News</h3>

		<!-- container -->
		<div class="news-box-container">
			<!-- box 1 -->
			<div class="news-box">
				<!-- img -->
				<div class="news-img">
					<img src="Photos/paper class.jpg" alt="paper class" />

					<!-- labale -->
					<div class="news-lable">New</div>
				</div>

				<!-- text -->
				<div class="news-text">
					<strong>Paper Class</strong>

					<span> Grade 10 | Group 01 </span>

					<a href="#">Read More</a>
				</div>
			</div>

			<!-- box 2 -->
			<div class="news-box">
				<!-- img -->
				<div class="news-img">
					<img src="Photos/group class grade 6.jpg" alt="news" />

					<!-- labale -->
					<div class="news-lable">New</div>
				</div>

				<!-- text -->
				<div class="news-text">
					<strong>Group Class</strong>

					<span> Grade 06 | Group 02 </span>

					<a href="#">Read More</a>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<?php
    require('./php/footer.php');
    ?>

	<!-- Dark Mode Java Script Part -->

	<script>
		var dmode = document.getElementById("dmode");
		dmode.onclick = function () {
			document.body.classList.toggle("dark-theme");

			if (document.body.classList.contains("dark-theme")) {
				mimg.src = "Photos/Logo Illustrator.png";
			} else {
				mimg.src = "Photos/Logo PNG.png";
			}

			if (document.body.classList.contains("dark-theme")) {
				dmode.src = "Photos/sun.png";
			} else {
				dmode.src = "Photos/moon.png";
			}
		};</script>
</body>

</html>