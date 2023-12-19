<?php

session_start();

	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}

	elseif($_SESSION['usertype'] == 'student')
	{
		header("location:login.php");
	}

	$host="localhost";

	$user="root";

	$password="";

	$db="musorproject";


	$data=mysqli_connect($host,$user,$password,$db);

	$nev=$_GET['szereplok_nev'];

	$sql="SELECT * FROM szereplok WHERE nev='$nev' ";

	$result=mysqli_query($data,$sql);

	$info=$result->fetch_assoc();


	if (isset($_POST['update'])) 
	{
		$nev=$_POST['nev'];
		$datum=$_POST['datum'];
		$nemzetiseg=$_POST['nemzetiseg'];
		$foglalkozas=$_POST['foglalkozas'];

		$query="UPDATE szereplok SET nev='$nev',datum='$datum',nemzetiseg='$nemzetiseg',foglalkozas='$foglalkozas' WHERE nev='$nev' ";

		$result2=mysqli_query($data,$query);

		if ($result2) 
		{
			header("location:view_character.php");	
		}
	}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<?php
include 'admin_css.php';
?>

<style type="text/css">
	
	label
	{
		display: inline-block; 
		width: 100px;
		text-align: right;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.div_deg
	{
		background-color: skyblue;
		width: 400px;
		padding-bottom: 70px;
		padding-top: 70px;


	}

</style>

</head>
<body>

	<?php
	include 'admin_sidebar.php';

	?>


	<div class="content">

		<center>
		
		<h1>Update Character</h1>

		<div class="div_deg">

			<form action="#" method="POST">
				

				<div>
					<label >nev</label>
					<input type="text" name="nev" value="<?php echo "{$info['nev']}"; ?>">
				</div>
					<div>
					<label >datum</label>
					<input type="date" name="datum" value="<?php echo "{$info['datum']}"; ?>">
				</div>
					<div>
					<label >nemzetiseg</label>
					<input type="text" name="nemzetiseg" value="<?php echo "{$info['nemzetiseg']}"; ?>">
				</div>

				<div>
					<label >foglalkozas</label>
					<input type="text" name="foglalkozas" value="<?php echo "{$info['foglalkozas']}"; ?>">
				</div>
					
					<div>

					
					<input class="btn btn-success" type="submit" name="update" value="Update">
				</div>
			</form>




		</div>

		</center>


	</div>

</body>
</html>