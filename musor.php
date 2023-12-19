<?php

session_start();

	

	$host="localhost";

	$user="root";

	$password="";

	$db="musorproject";


	$data=mysqli_connect($host,$user,$password,$db);

	$sql="SELECT * FROM musor ORDER BY mikor ASC";

	$result=mysqli_query($data,$sql);


?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Műsorok</title>
<?php
include 'admin_css.php';
?>

	
</head>
<body>

	
	<center>

	<div class="content">
		
		<h1>Műsorújság</h1>

		<br>
	</br>

		<table border='1px'>
			<tr>
				<th style="padding: 20px; font-size: 15px;">Cím</th>
				<th style="padding: 20px; font-size: 15px;">Epizód</th>
				<th style="padding: 20px; font-size: 15px;">Szereplők</th>
				<th style="padding: 20px; font-size: 15px;">Ismertető</th>
				<th style="padding: 20px; font-size: 15px;">Mikor sugározzák?</th>
			</tr>

			<?php

				while($info=$result->fetch_assoc())
				{

			?>

			<tr>
				<td style="padding: 20px;">
					<?php echo "{$info['cim']}"; ?>
				</td>
				<td style="padding: 20px;">
					<?php echo "{$info['epizod']}"; ?>
				</td>
				<td style="padding: 20px;">
					<?php echo "{$info['szereplok']}"; ?>
				</td>
				<td style="padding: 20px;">
					<?php echo "{$info['ismerteto']}"; ?>
				</td>
				<td style="padding: 20px;">
					<?php echo "{$info['mikor']}"; ?>
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