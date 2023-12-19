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


	if(isset($_POST['add_character']))

{
	$nev=$_POST['nev'];
	$datum=$_POST['datum'];
	$nemzetiseg=$_POST['nemzetiseg'];
	$foglalkozas=$_POST['foglalkozas'];
	

	$check="SELECT * FROM szereplok WHERE nev='$nev' ";
	$check_user=mysqli_query($data,$check);
	$row_count=mysqli_num_rows($check_user);

	if($row_count==1)
	{
		echo "<script type='text/javascript'> 

	alert('Username already exist. Try another one.')

	 	</script>";
		
	}
	else{



	$sql="INSERT INTO szereplok(nev,datum,nemzetiseg,foglalkozas) VALUES ('$nev','$datum','$nemzetiseg','$foglalkozas')";

$result=mysqli_query($data,$sql);

if($result)
{
	echo "<script type='text/javascript'> 

	alert('Data Upload Success')

	 	</script>";
}
else
{
	echo "Upload Failed";
}
}
}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<style type="text/css">
		
		label
{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.div_deg
		{
			background-color: skyblue;
			width: 400px;
			padding-top:70px;
			padding-bottom: 70px;
		}	
	</style>

	<?php
include 'admin_css.php';
?>

</head>
<body>

	<?php
	include 'admin_sidebar.php';

	?>


	<div class="content">
		<center>
		<h1>Add Character</h1>


		<div class="div_deg">
			
			<form action="#" method="POST">
				<div>
				<label>Név</label>
				<input type="text" name="nev">
				</div>
				<div>
				<label>Dátum</label>
				<input type="date" name="datum">
				</div>
				<div>
				<label>Nemzetiség</label>
				<input type="text" name="nemzetiseg">
				</div>
				<div>
				<label>Foglalkozás</label>
				<input type="text" name="foglalkozas">
				</div>
				
				<div>
				
				<input type="submit" class="btn btn-primary" name="add_character" value="Add Character">
				</div>
			</form>
		</div>

		
		</center>

	</div>

</body>
</html>