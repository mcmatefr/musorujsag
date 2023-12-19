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

	$sql="SELECT * FROM musor ORDER BY mikor ASC ";

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
		
		<h1>Show Data</h1>

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
				<th class="table_th">Cím</th>
				<th class="table_th">Epizód</th>
				<th class="table_th" >Szereplők</th>
				<th class="table_th" >Ismertető</th>
				<th class="table_th" >Mikor?</th>
				<th class="table_th" >Delete</th>
				<th class="table_th" >Update</th>
			</tr>



			<?php

				while($info=$result->fetch_assoc())
				{

			?>

			<tr>
				<td class="table_td">
					<?php echo "{$info['cim']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['epizod']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['szereplok']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['ismerteto']}"; ?>
				</td>
				<td class="table_td">
					<?php echo "{$info['mikor']}"; ?>
				</td>

				<td class="table_td">
					<?php echo "<a onClick=\" javascript:return confirm('Are You Sure to Delete This?'); \" class='btn btn-danger' href='delete_show.php?musor_cim={$info['cim']}'> Delete </a>"; ?>
				</td>

				<td class="table_td">
					<?php echo "<a class='btn btn-primary' href='update_show.php?musor_cim={$info['cim']}'> Update </a>"; ?>
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