<?php

session_start();


$host="localhost";

$user="root";

$password="";

$db="musorproject";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['musor_cim'])
{
	$musor_cim=$_GET['musor_cim'];
	$sql="DELETE FROM musor WHERE cim='$musor_cim' ";
	$result=mysqli_query($data,$sql);


	if($result)
	{
		$_SESSION['message']='Delete Show is succesful';
		header("location:view_show.php");

	}
}

 ?>