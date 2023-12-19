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

	$cim=$_GET['musor_cim'];

	$sql="SELECT * FROM musor WHERE cim='$cim' ";

	$result=mysqli_query($data,$sql);

	$info=$result->fetch_assoc();


	if (isset($_POST['update'])) 
	{
		$cim=$_POST['cim'];
		$epizod=$_POST['epizod'];
		$szereplok=$_POST['szereplok'];
		$ismerteto=$_POST['ismerteto'];
		$mikor=$_POST['mikor'];

		$query="UPDATE musor SET cim='$cim',epizod='$epizod',szereplok='$szereplok',ismerteto='$ismerteto',mikor='$mikor' WHERE cim='$cim' ";

		$result2=mysqli_query($data,$query);

		if ($result2) 
		{
			header("location:view_show.php");	
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
		
		<h1>Update Show</h1>

		<div class="div_deg">

			<form action="#" method="POST">
				

				<div>
					<label >cim</label>
					<input type="text" name="cim" value="<?php echo "{$info['cim']}"; ?>">
				</div>
					<div>
					<label >epizod</label>
					<input type="text" name="epizod" value="<?php echo "{$info['epizod']}"; ?>">
				</div>
					<div>
					<label >szereplok</label>
					<input type="text" name="szereplok" value="<?php echo "{$info['szereplok']}"; ?>">
				</div>
					<div>
					<label >ismerteto</label>
					<input type="text" name="ismerteto" value="<?php echo "{$info['ismerteto']}"; ?>">
				</div>

				<div>
					<label >mikor</label>
					<input type="datetime" name="mikor" value="<?php echo "{$info['mikor']}"; ?>">
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