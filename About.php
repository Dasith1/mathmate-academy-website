<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>About</title>
	<link rel="stylesheet" href="./css/About.css">
	<link rel="shortcut icon" href="Photos/MMA Logo Final.png">
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>


	<!-- Poppins font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
</head>

<body>
	<?php
    session_start();

    require('./php/nav.php');
    ?>
	<!-- about container -->
	<div class="container">

		<h1>MATH MATE ACADEMY IS A BEST MATHS ACADEMY LOCATED IN GAMPAHA</h1>
		<h2>Gain a Thorough Knowledge of the Subject with a New Perspective</h2>

		<div class="button">

			<a href="Sign Up.php" target="new">JOIN WITH US</a>

		</div>

		<div class="image">

			<img src="Photos/WhatsApp Image 2022-10-02 at 4.17.39 PM.jpeg" alt="Logo">

		</div>

		<h3>Who We Are</h3>
		<p>Our Mathematical Academy and Staff are Presented with Great Pride by Mathmate Academy. Each and Every Student
			that Works with us is held Accountable by Us. In Addition, the Teachers and Staff at Our School are Pleasant
			and Accurate People to Deal with. Let's Agree to Work Together and Sign. Let's soar with the Eagles, not the
			Geese, and keep Track of Your Objectives. We will be Available to Support you Mathematically.</p>

	</div>

	<!-- Values -->
	<section id="Categories">

		<!-- heading -->
		<h2> Our Values </h2>

		<!-- box container -->
		<div class="category-container">

			<!-- box 1 -->
			<a href="#" class="category-box">

				<img src="Photos/user.png" alt="Category">
				<span>Students Grow Up</span>
				<p>In October 2019 when the small group classes started there were only 2 children. Today, that
					migration has grown to over 100+ Students.</p>

			</a>

			<!-- box 2 -->
			<a href="#" class="category-box">

				<img src="Photos/good.png" alt="Category">
				<span>Student Happiness</span>
				<p>The End Result of Education is Happiness. Therefore, we have Good Knowledge about the Subject, Not
					only to Cover the Syllabus, But also an Environment where you can Learn Very Happily.</p>

			</a>

			<!-- box 3 -->
			<a href="#" class="category-box">

				<img src="Photos/heart.png" alt="Category">
				<span>Passion</span>
				<p>The only way to do great work is to love what you do. We work whole heartedly to deliver the very
					awesome platform by putting all our heart and soul into Math Mate Academy</p>

			</a>

			<!-- box 4 -->
			<a href="#" class="category-box">

				<img src="Photos/quality.png" alt="Category">
				<span>Good Results</span>
				<p>We achieve 100% results every year as a result of our guidance and students' interest and commitment.
				</p>

			</a>


		</div>

	</section>


	<!-- footer -->
	<?php
    require('./php/footer.php');

    ?>


</body>

</html>