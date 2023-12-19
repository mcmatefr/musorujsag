<?php

session_start();


$host="localhost";

$user="root";

$password="";

$db="musorproject";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['szereplok_nev'])
{
	$szereplok_nev=$_GET['szereplok_nev'];
	$sql="DELETE FROM szereplok WHERE nev='$szereplok_nev' ";
	$result=mysqli_query($data,$sql);


	if($result)
	{
		$_SESSION['message']='Delete Character is succesful';
		header("location:view_character.php");

	}
}

 ?>