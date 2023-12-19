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

	$nev=$_GET['csatorna_nev'];

	$sql="SELECT * FROM csatorna WHERE nev='$nev' ";

	$result=mysqli_query($data,$sql);

	$info=$result->fetch_assoc();


	if (isset($_POST['update'])) 
	{
		$nev=$_POST['nev'];
		$kategoria=$_POST['kategoria'];
		$leiras=$_POST['leiras'];
		

		$query="UPDATE csatorna SET nev='$nev',kategoria='$kategoria',leiras='$leiras' WHERE nev='$nev' ";

		$result2=mysqli_query($data,$query);

		if ($result2) 
		{
			header("location:view_channel.php");	
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
		
		<h1>Update Channel</h1>

		<div class="div_deg">

			<form action="#" method="POST">
				

				<div>
					<label >nev</label>
					<input type="text" name="nev" value="<?php echo "{$info['nev']}"; ?>">
				</div>
					<div>
					<label >kategoria</label>
					<input type="text" name="kategoria" value="<?php echo "{$info['kategoria']}"; ?>">
				</div>
					<div>
					<label >leiras</label>
					<input type="text" name="leiras" value="<?php echo "{$info['leiras']}"; ?>">
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