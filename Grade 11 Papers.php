<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Grade 11 Papers</title>
	<link rel="stylesheet" href="./css/Grade 11 Papers.css">
	<link rel="shortcut icon" href="Photos/MMA Logo Final.png">

	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>


	<!-- Poppins font family -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<script src="https://kit.fontawesome.com/b47a1fc140.js" crossorigin="anonymous"></script>

	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
</head>

<body>

	<!--navigation-->
	<nav class="navigation">


		<!-- logo -->
		<a href="Index.html" class="logo"> MATH MATE ACADEMY </a>


		<!-- menu btn -->
		<input type="checkbox" class="menu-btn" id="menu-btn">
		<label for="menu-btn" class="menu-icon">

			<span class="nav-icon">

				<i class="fas fa-bars"></i>

			</span>

		</label>



		<!-- menu bar -->
		<ul class="menu">
			<li><a href="Home Page.html">Home</a></li>
			<li><a href="Time Table.html">Time Table</a></li>
			<li><a href="Store.html" class="active">Collection</a></li>
			<li><a href="About.html">About</a></li>
			<li><a href="Contact Us.html" target="new">Contact Us</a></li>
		</ul>

		<!--right-->
		<div class="right-elements">

			<!--search-->
			<a href="Search Button.html" target="new" class="search">

				<i class="fas fa-search"></i> </a>

			<!--cart-->
			<a href="#" class="cart">

				<i class="fas fa-shopping-bag"></i> </a>

			<!--user-->
			<a href="#" class="user">

				<i class="fas fa-user"></i>

			</a>





		</div>

	</nav>




	<!-- box -->
	<div class="flex-box">

		<div class="left">

			<div class="big-img">

				<img src="Photos/paper store main.jpg">

			</div>

			<div class="images">

				<div class="small-img">

					<img src="Photos/Paper store 1.jpg" onClick="showImg(this.src)">

				</div>

				<div class="small-img">

					<img src="Photos/paper store 2.jpg" onClick="showImg(this.src)">

				</div>

				<div class="small-img">

					<img src="Photos/paper store 3.jpg" onClick="showImg(this.src)">

				</div>

				<div class="small-img">

					<img src="Photos/paper store 4.png" onClick="showImg(this.src)">

				</div>

			</div>

		</div>

		<div class="right">

			<div class="url"> Collection / Grade 11 Papers </div>
			<div class="pname"> Maths Model Papers </div>
			<div class="ratings">

				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star"></i>
				<i class="fa-solid fa-star-half-stroke"></i>

			</div>

			<div class="price">LKR 1000</div>
			<!-- <div class="size">
				
				<p>Grade :</p>
				<div class="psize active">08</div>
				<div class="psize">09</div>
				<div class="psize">10</div>
				<div class="psize">11</div>
			
			</div> -->

			<div class="quantity">

				<p>Quantity :</p>
				<input type="number" min="1" max="5" value="1">

			</div>

			<div class="btn-box">

				<button class="cart-btn">Add to Cart</button>
				<button class="buy-btn">Buy Now</button>

			</div>

		</div>

	</div>



	<script>

		let bigImg = document.querySelector('.big-img img');
		function showImg(pic) {
			bigImg.src = pic;
		}

	</script>





	<!-- footer -->
	<footer>

		<div class="footer-container">

			<div class="footer-logo-container">


				<!-- logo -->
				<div class="footer-logo"> <a href="Index.html"> Math Mate Academy </a></div>

				<!-- text -->
				<span>Copyright 2022 - Team Infinity</span>

				<!-- social -->
				<div class="footer-social">

					<a href="#"><i class="fab fa-linkedin-in"></i></a>
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>

				</div>


			</div>

		</div>





	</footer>

</body>

</html>