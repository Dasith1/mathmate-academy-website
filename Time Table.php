<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Time Table</title>
	<link rel="stylesheet" href="./css/Time Table.css" />
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
    session_start();
    require('./php/nav.php');
    ?>
	<table class="center">
		<tr>
			<th>Tuesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
			<th>Sunday</th>
		</tr>

		<tr>
			<td>6.30AM - 9.30AM / Grade 05</td>
			<td>6.30AM - 9.30AM / Grade 05</td>
			<td>6.30AM - 9.30AM / Grade 05</td>
			<td>6.30AM - 9.30AM / Grade 05</td>
			<td>6.30AM - 9.30AM / Grade 05</td>
		</tr>

		<tr>
			<td>10.00AM - 12.00PM / Grade 06</td>
			<td>10.00AM - 12.00PM / Grade 06</td>
			<td>10.00AM - 12.00PM / Grade 06</td>
			<td>10.00AM - 12.00PM / Grade 06</td>
			<td>10.00AM - 12.00PM / Grade 06</td>
		</tr>

		<tr>
			<td>12.00PM - 2.00PM / Grade 04</td>
			<td>12.00PM - 2.00PM / Grade 04</td>
			<td>12.00PM - 2.00PM / Grade 04</td>
			<td>12.00PM - 2.00PM / Grade 04</td>
			<td>12.00PM - 2.00PM / Grade 04</td>
		</tr>

		<tr>
			<td>2.00PM - 4.00PM / Grade 08</td>
			<td>2.00PM - 4.00PM / Grade 08</td>
			<td>2.00PM - 4.00PM / Grade 08</td>
			<td>2.00PM - 4.00PM / Grade 08</td>
			<td>2.00PM - 4.00PM / Grade 08</td>
		</tr>

		<tr>
			<td>4.00PM - 8.00PM / Grade 10</td>
			<td>4.00PM - 8.00PM / Grade 10</td>
			<td>4.00PM - 8.00PM / Grade 10</td>
			<td>4.00PM - 8.00PM / Grade 10</td>
			<td>4.00PM - 8.00PM / Grade 10</td>
		</tr>
	</table>
	<!-- footer -->
	<?php
    require('./php/footer.php');
    ?>
</body>

</html>