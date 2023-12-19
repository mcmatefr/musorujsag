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


	if(isset($_POST['add_show']))

{
	$cim=$_POST['cim'];
	$epizod=$_POST['epizod'];
	$szereplok=$_POST['szereplok'];
	$ismerteto=$_POST['ismerteto'];
	$mikor=$_POST['mikor'];

	$check="SELECT * FROM musor WHERE cim='$cim' ";
	$check_user=mysqli_query($data,$check);
	$row_count=mysqli_num_rows($check_user);

	if($row_count==1)
	{
		echo "<script type='text/javascript'> 

	alert('Username already exist. Try another one.')

	 	</script>";
		
	}
	else{



	$sql="INSERT INTO musor(cim,epizod,szereplok,ismerteto,mikor) VALUES ('$cim','$epizod','$szereplok','$ismerteto','$mikor')";

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
		<h1>Add Show</h1>


		<div class="div_deg">
			
			<form action="#" method="POST">
				<div>
				<label>Cím</label>
				<input type="text" name="cim">
				</div>
				<div>
				<label>Epizód</label>
				<input type="text" name="epizod">
				</div>
				<div>
				<label>Szereplők</label>
				<input type="text" name="szereplok">
				</div>
				<div>
				<label>Ismertető</label>
				<input type="text" name="ismerteto">
				</div>
				<div>
				<label>Mikor játszák?</label>
				<input type="datetime" name="mikor">
				</div>
				<div>
				
				<input type="submit" class="btn btn-primary" name="add_show" value="Add Show">
				</div>
			</form>
		</div>

		
		</center>

	</div>

</body>
</html>