
<?php
	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['message'])
	{
		$message=$_SESSION['message'];

		echo "<script type='text/javascript'>

		alert('$message');

		  </script>";
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Musorujsag</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">Műsorújság</label>

		<ul>
			<li><a href="">Home</a></li>
			
			<li><a href="musor.php" >Műsorújság</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>


	<div class="section1">
		
		<label class="img_text">Böngéssze a műsorújságunkat</label>
		<img class="main_img" src="school_management.jpg">
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="welcome_img" src="school2.jpg">
				
			</div>

			<div class="col-md-8">

				<h1>Üdvözöljük a műsorújságnál</h1>

				<p>
					Kérem böngésszen a tévécsatornák műsorkínálatában.
				</p>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1>Csatornák</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="teacher1.jpg">

				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher2.jpg">
				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher3.jpg">
				
				
			</div>
			

		</div>
		

	</div>






	<center>
		<h1>Főbb műsorok</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="web.jpg">
				<h3>Sztárban Sztár</h3>
				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="graphic.jpg">
				<h3>Survivor</h3>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="marketing.jpg">
				<h3>Labdarúgás</h3>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1 class="adm">Regisztrálás</h1>

	</center>


	<div align="center" class="admission_form">

		<form action="data_check.php" method="POST">
			
		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="name">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="email">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="text" name="phone">
		</div>

		<div class="adm_int">
			<label class="label_text">Message</label>
			<textarea class="input_txt" name="message"></textarea>
		</div>
		

		<div class="adm_int" >
			
			<input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply" >
		</div>


		</form>
		
	</div>


	<footer>
		<h3 class="footer_text">All @copyright reserved by Máté Csányi</h3>
	</footer>


</body>
</html>
