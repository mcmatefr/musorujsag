<?php

session_start();


$host="localhost";

$user="root";

$password="";

$db="musorproject";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['csatorna_nev'])
{
	$csatorna_nev=$_GET['csatorna_nev'];
	$sql="DELETE FROM csatorna WHERE nev='$csatorna_nev' ";
	$result=mysqli_query($data,$sql);


	if($result)
	{
		$_SESSION['message']='Delete Channel is succesful';
		header("location:view_channel.php");

	}
}

 ?>