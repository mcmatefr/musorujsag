<?php

error_reporting(0);
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

	$sql="SELECT * FROM szereplok";

	$result=mysqli_query($data,$sql);

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
	
	.table_th
	{
		padding: 20px; 
		font-size: 20px;
	}

	.table_td
	{
		padding: 20px; 
		background-color: skyblue;
	}
</style>

</head>
<body>

	<?php
	include 'admin_sidebar.php';

	?>


	<div class="content">

		<center>
		
		<h1>Character Data</h1>

		<?php
			if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}

			unset( $_SESSION['message']);


		?>

		<br> </br>

		<table border='1px'>
			<tr>
				<th class="table_th">Név</th>
				<th class="table_th">Születési dátum</th>
				<th class="table_th" >Nemzetiség</th>
				<th class="table_th" >Foglalkozás</th>
				
				<th class="table_th" >Delete</th>
				<th class="table_th" >Update</th>
			</tr>



			<?php

				while($info=$result->fetch_assoc())
				{

			?>

			<tr>
				<td class="table_td">
					<?php echo "{$info['nev']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['datum']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['nemzetiseg']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['foglalkozas']}"; ?>
				</td>
				

				<td class="table_td">
					<?php echo "<a onClick=\" javascript:return confirm('Are You Sure to Delete This?'); \" class='btn btn-danger' href='delete_character.php?szereplok_nev={$info['nev']}'> Delete </a>"; ?>
				</td>

				<td class="table_td">
					<?php echo "<a class='btn btn-primary' href='update_character.php?szereplok_nev={$info['nev']}'> Update </a>"; ?>
				</td>

			</tr>

			<?php

		}

			?>
			
		</table>

	</center>	


	</div>

</body>
</html>