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

	$sql="SELECT * FROM csatorna";

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
		
		<h1>Channel Data</h1>

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
				<th class="table_th">Kategória</th>
				<th class="table_th" >Leírás</th>
				
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
					<?php echo "{$info['kategoria']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['leiras']}"; ?>
				</td>
				

				<td class="table_td">
					<?php echo "<a onClick=\" javascript:return confirm('Are You Sure to Delete This?'); \" class='btn btn-danger' href='delete_channel.php?csatorna_nev={$info['nev']}'> Delete </a>"; ?>
				</td>

				<td class="table_td">
					<?php echo "<a class='btn btn-primary' href='update_channel.php?csatorna_nev={$info['nev']}'> Update </a>"; ?>
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